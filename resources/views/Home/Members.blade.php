@extends('App.App')
@section('content')
<style type="text/css" media="screen">
	
	.header-table th{
		color:white !important;
	}
</style>  
    <div class="m-body">
        <div id="MemberReport">
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
                            <th>Control </th>
                          </tr>
                        </thead>
                        <tbody>
                            @empty(!$Members)
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
                                  <p  class="btn btn-danger btn-action ml-1" data-toggle="tooltip" title="View"><i class="fas fa-user-lock"></i> Account Freezed</p>
                              @else
                                  <a href="/Member/{{$item->id}}/View"  class="btn btn-primary btn-action ml-1" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>
                                  <a href="/MemberSms"  class="btn btn-warning btn-action ml-1" data-toggle="tooltip" title="View"><i class="fas fa-envelope"></i></a>
                              @endif
                             </td>
                          </tr>'; 
                            @endforeach
                                
                            @endempty
                            
                          
                           </tbody>
                      </table>
                  </div>
                  </div>
            </div>
        </div>
        </div>
@endsection