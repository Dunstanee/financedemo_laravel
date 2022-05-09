@extends('App.App')
@section('content')
    
<style type="text/css" media="screen">
	
	.header-table th{
		color:white !important;
	}
</style>

@php
    $counts = count($Members);
@endphp
<span id="{{$counts}}" class="counts" style="color:white"></span>


@if ($counts > 0)
    

@php
$Members = $Members[0];
@endphp  
<span id="{{$counts}}" class="counts" style="color:white"></span>
<span id="{{$Members->id}}" class="memberid" style="color:white"></span>
<span id="{{$Members->branchid}}" class="branchid" style="color:white"></span>
    <div class="m-body">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-5">
                    <h2>Member Details</h2>
                    <hr>
                    <p><b>Name</b>   :  {{$Members->first_name.' '.$Members->second_name.' '.$Members->last_name}} </p>
                    <p><b>Contact</b>   :{{'0'.$Members->mobile}} </p>
                    <p><b>Email</b>   :{{$Members->email}} </p>
                    <p><b>National ID</b>   :{{$Members->national_id}} </p>
                    <p><b>Member Status</b>   @if ($Members->status == 2)
                        <span class="bagde badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Dormant</span>
                    @endif </p>
                </div>
                <div class="col-lg-7">
                    <div id="messagebox"  class="Errors  alert-dismissible show fade">
                        <div class="alert-body tetx-center">
                        <p id="message"></p>
                        </div>
                    </div>
                    <table class="table table-striped mb-0 table-bordered" id="table-2" >
                        <thead class="header-table bg-primary">
                        <tr>
                            <th>Sno</th>
                            <th>Account Name</th>
                            <th>Operation</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=1;
                        @endphp
                        @empty(!$Accounts)
                            @foreach ($Accounts as $item)
                            <tr>
                                <td>{{ '#'.$i++ }}</td>
                                <td>{{ $item->account_name}}</td>
                                <td>
                                    @if (array_search($item->id,$OpenAccounts) == '')
                                        <button id="{{$item->id}}" type="button" class="btn OpenAccount btn-success">Open Account</button>  
                                    @else
                                        <button  type="button" class="btn  btn-primary">Account Active</button>  
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        @endempty
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  @endif
@endsection


    @section('scripts')
    <script>
       var count = $('.counts').attr("id");
       
       if(count != '0')
       {
           

            $(document).ready(function (argument) {
                $('#messagebox').attr("style", "display:none");
                $('.OpenAccount').on('click',function(event){
                event.preventDefault();
                    $('#messagebox').addClass('alert alert-warning');
                    $('#messagebox').attr("style", "display:block");
                    $('#message').text('Please wait. Loading...');
                var accountid = $(this).attr('id');
                 var memberid = $('.memberid').attr('id');
                 var branchid = $('.branchid').attr('id');
                var tenantid = {{session('staff')->tenantid}};
                
                    $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                
                        $.ajax({
                            url: "/OpenAccount",
                            method: "POST",
                            dataType : 'json',
                            data: {accountid:accountid,memberid:memberid,branchid:branchid,tenantid:tenantid},
                            success:function(response)
                            {
                                
                                console.log(response);
            
                                if(response.status == 200)
                                {
                                    $('#messagebox').removeClass('alert alert-warning'); 
                                    $('#messagebox').addClass('alert alert-success'); 
                                    $('#messagebox').attr("style", "display:block");
                                    $('#message').text(response.message);  
                                    setTimeout(location.reload(),5000);
                                }
                                if(response.status == 400)
                                {
                                    $('#messagebox').removeClass('alert alert-warning'); 
                                    $('#messagebox').addClass('alert alert-danger'); 
                                    $('#messagebox').attr("style", "display:block");
                                    $('#message').text(response.message);
                                    setTimeout(location.reload(),20000);
                                }

                            }
                        });
                
                });
            });
        }
    </script>
        
    @endsection