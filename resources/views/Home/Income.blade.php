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
              <th>Category Name</th>
              <th>Visibility</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody> 
              @php
                  $i=1;
              @endphp
          
            @foreach ($IncomeList as $item)
                
            
            <tr>
            	<td>
                {{ $i++}}
              </td>
              <td>
                {{ $item ->category_name }}
              </td>
              <td>
                  @if ( $item ->Visibility == 2 )
                  <p class="btn btn-success">Yes</p>
                      
                  @else
                      <p class="btn btn-danger">No</p>
                  @endif 
              </td>
              <td>
                <a href="/Incomes/{{ $item ->id }}/Edit" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>
@endsection