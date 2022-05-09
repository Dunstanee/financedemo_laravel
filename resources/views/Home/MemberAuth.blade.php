@extends('App.App')
@section('content')
<style type="text/css" media="screen">
	
	.header-table th{
		color:white !important;
	}
</style>  
    <div class="m-body">
        <div id="MemberReport">
        
            <div id="messagebox"  class="Errors  alert-dismissible show fade">
              <div class="alert-body tetx-center">
               <p id="message"></p>
              </div>
            </div>
            <a class="btn btn-primary btn-action m-1" data-toggle="tooltip" title="Delete"><i class="fas fa-envelope"></i> Bulk SMS</a>
            <div class="">
                <div class="card-body">
                <div class="table-data">
                    <table class="table table1 table-striped mb-0 table-bordered" id="table-2" >
                        <thead class="header-table bg-primary">
                          <tr>
                            <th class="data1">Sno</th>
                            <th>Member Name</th>
                            <th>Identity No</th>
                            <th>Branch</th>
                            <th>Contact</th>
                            <th>Village</th>
                            <th>ID Number</th>
                            <th>Operation </th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($Members as $item)
                              <tr>
                              <td class="data1" data-label="Sno">
                              {{$i++}}
                            </td>
                            <td data-label="Full Name">
                              {{ $item->first_name.' '.$item->second_name.' '.$item->last_name}}
                            </td>
                           <td data-label="Identity No.">
                              {{ $item->id}}
                            </td>
                            <td data-label="Financial Name">
                              {{ $item->branchid}}
                            </td>
                            <td data-label="Contact">
                              {{ $item->mobile}}
                            </td>
                            <td data-label="Village">
                              {{ $item->village}}
                            </td>
                            <td data-label="National ID">
                              {{ $item->national_id}}
                            </td>
                            <td data-label=""  class="d-flex p-1 ">
                              @if ($item->status == 1)
                                    <button id="{{$item->id}}" type="button" class="btn unfreeze btn-success">unFreeze Accounts</button>
                              @else
                                    <button id="{{$item->id}}" type="button" class="btn ml-2 freeze btn-danger">Freeze Accounts</button>
                                    <a href="/MemberAuth/{{$item->id}}/Accounts"  class="btn ml-1  btn-primary">Open Account</a>
                              @endif
                             </td>
                          </tr>'; 
                            @endforeach
                            
                          
                           </tbody>
                      </table>
                  </div>
                  </div>
            </div>
        </div>
        </div>
@endsection
@section('scripts')
<script>
  $(document).ready(function (argument) {
        $('#messagebox').attr("style", "display:none");
  $('.freeze').on('click',function(event){
         event.preventDefault();
         $('#messagebox').removeClass('alert alert-success');
         $('#messagebox').removeClass('alert alert-danger');
         $('#messagebox').removeClass('alert alert-warning');
            $('#messagebox').addClass('alert alert-warning');
            $('#messagebox').attr("style", "display:block");
            $('#message').text('Please wait. Loading...');
        var id = $(this).attr('id');
        
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
         
                $.ajax({
                    url: "/MemberFreeze",
                    method: "POST",
                    dataType : 'json',
                    data: {id:id},
                    success:function(response)
                    {
                      
    
                        if(response.status == 200)
                        {
                          $('#messagebox').removeClass('alert alert-warning'); 
                            $('#messagebox').addClass('alert alert-success'); 
                            $('#messagebox').attr("style", "display:block");
                            $('#message').text(response.message);
                            location.href = 'MemberAuth'; 
                        }
                        if(response.status == 400)
                        {
                          $('#messagebox').removeClass('alert alert-warning'); 
                            $('#messagebox').addClass('alert alert-danger'); 
                            $('#messagebox').attr("style", "display:block");
                            $('#message').text(response.message);
                            
                        }
                    }
                });
         
       });

       $('.unfreeze').on('click',function(event){
         event.preventDefault();
         $('#messagebox').removeClass('alert alert-success');
         $('#messagebox').removeClass('alert alert-danger');
         $('#messagebox').removeClass('alert alert-warning');
            $('#messagebox').addClass('alert alert-warning');
            $('#messagebox').attr("style", "display:block");
            $('#message').text('Please wait. Loading...');
        var id = $(this).attr('id');
        
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
         
                $.ajax({
                    url: "/MemberunFreeze",
                    method: "POST",
                    dataType : 'json',
                    data: {id:id},
                    success:function(response)
                    {
                      
    
                        if(response.status == 200)
                        {
                          $('#messagebox').removeClass('alert alert-warning'); 
                            $('#messagebox').addClass('alert alert-success'); 
                            $('#messagebox').attr("style", "display:block");
                            $('#message').text(response.message);
                            location.href = 'MemberAuth'; 
                        }
                        if(response.status == 400)
                        {
                          $('#messagebox').removeClass('alert alert-warning'); 
                            $('#messagebox').addClass('alert alert-danger'); 
                            $('#messagebox').attr("style", "display:block");
                            $('#message').text(response.message);
                            
                        }
                    }
                });
         
       });
     });
    </script>
@endsection