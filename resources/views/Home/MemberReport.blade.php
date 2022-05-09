@extends('App.App')
@section('content')
<style type="text/css" media="screen">
	
	.header-table th{
		color:white !important;
	}
</style>
<div id="MemberReport">
    <div class="card card-body" style="text-align:center; background-color: transparent !important;" >
        <p><img width="100" height="100" src="assets/safina_logo.png" alt="safina_logo"></p>
        <h1>Member Report for Easy Go In</h1>
      </div>
      <div class="m-body">
          <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped mb-0 table-bordered" id="table-2" >
                <thead class="header-table bg-primary">
                  <tr>
                    <th>Id</th>
                    <th>Member Name</th>
                    <th>Identity No</th>
                    <th>Branch</th>
                    <th>Contact</th>
                    <th>Village</th>
                    <th>ID Number</th>
                  </tr>
                </thead>
                <tbody>
                 @php
                     $i=1;
                 @endphp
                 @empty(!$Members)
                    @foreach ($Members as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->first_name.' '.$item->second_name.' '.$item->last_name}}</td>
                        <td>{{ 'Q'.$item->id.'P'}}</td>
                        <td>{{ $item->branchid}}</td>
                        <td>{{ $item->mobile}}</td>
                        <td>{{ $item->village}}</td>
                        <td>{{ $item->national_id}}</td>
                    </tr>
                    @endforeach
                 @endempty
                </tbody>
            </table>
            </div>
            </div>
      </div>
  </div>  
@endsection