@extends('App.App')
@section('content')

    
<style type="text/css" media="screen">
	
	.header-table th{
		color:white !important;
	}
</style>
<div class="m-body">
	<div class="row m-1 card-body p-0">
	    <div class="table-responsive">
        <table class="table table-striped mb-0" id="table-1">
          <thead class="header-table bg-primary">
            <tr>
              <th>Id</th>
              <th>Staff Name</th>
              <th>Phone No.</th>
              <th>ID No.</th>
              <th>File No.</th>
              <th>Documents</th>
              <th>Roles</th>
              <th>Authentication</th>
              <th>Edit</th>
              <th>Freeze</th>
            </tr>
          </thead>
          <tbody> 
              @php
                 $i = 1; 
              @endphp
          
                @foreach ($staffs as $item)
            <tr>
            	<td>
                {{ $i++}}
              </td>
              <td>
                {{ $item->first_name.' '.$item->last_name}}
              </td>
              <td>
                {{ $item->phone}}
              </td>
              <td>
                {{ $item->id_number}}
              </td>
              <td>
                <span class="badge badge-success">{{ $item->personal_file_no}}</span>
              </td>
              <td class="text-center">
                  <img src="assets/img/foldera.png" width="28" height="25" alt="Files">
              </td>
              <td class="text-center">
                  <img src="assets/img/roles.png" width="25" height="25" alt="Files">
              </td>
              <td class="text-center">
                  <img src="assets/img/okay.png" width="25" height="25" alt="Files">
              </td>
              <td>
                <a href="/StaffEdit/{{ $item->id}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
              </td>
              <td>
                <button id="/StaffDelete/{{ $item->id}}" class="btn btn-danger btn-action mr-1" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>
@endsection