@extends('App.App')
@section('content')

<style type="text/css" media="screen">
	
	.header-table th{
		color:white !important;
	}
	.no-operation{
		font-size: 5em;
		color: red;
	}
	.yes-operation{
		font-size: 5em;
		color: green;
	}
</style>



<!-- loan statistics  -->
<div class="m-body">
<div class="row">
    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
      <div class="card" style="background-color: transparent !important;">
        <div class="card-body pt-2 pb-2">
            <div id="myWeather">
                @if (session('operation'))
                    
                <a href="/CloseBusiness" class="btn btn-danger"><i class="fas fa-business-time"></i> Close Business Operation</a>
                @else
                    
                <a href="/OpenBusiness" class="btn btn-success"> <i class="fas fa-book-open"></i> Open Business Operation</a>
                @endif
			</div>
        </div>
      </div>
    </div>
</div>


<div class="card">
  <div class="card-body">
    <ul class="nav nav-pills" id="myTab3" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Active Operation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Operation History</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="CashReturn-tab3" data-toggle="tab" href="#CashReturn3" role="tab" aria-controls="profile" aria-selected="false">Approve Cash (Return)</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="CashRequest-tab3" data-toggle="tab" href="#CashRequest3" role="tab" aria-controls="profile" aria-selected="false">Approve Cash (Request)</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent2">
    	<div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
    		<div class="row" >
					<div class="container">
					<h1 style="text-align: center;">OPEN - CLOSE OPERATIONS FOR {{ date('d M, Y')}}</h1>	
					</div>
				</div>
				<hr>
    		<!-- start of statics  -->
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
					  <div class="card card-statistic-1">
					    <div class="card-icon bg-primary">
					      <i class="fas fa-archway"></i>
					    </div>
					    <div class="card-wrap">
					      <div class="card-header">
					        <h4>Opening Balance</h4>
					      </div>
					      <div class="card-body stats ">
					        {{ number_format($Businessdata[0]->OpeningBalance,2)}}
					      </div>
					    </div>
					  </div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="card card-statistic-1">
					    <div class="card-icon bg-warning ">
					      <i class="fas fa-business-time"></i>
					    </div>
					    <div class="card-wrap">
					      <div class="card-header">
					        <h4>Cash in Safe</h4>
					      </div>
					      <div class="card-body stats">
					        {{ number_format($Businessdata[0]->safebalance,2)}}
					      </div>
					    </div>
					  </div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger ">
                              <i class="fas fa-business-time"></i>
                            </div>
                            <div class="card-wrap">
                              <div class="card-header">
                                <h4>Cashier Request</h4>
                              </div>
                              <div class="card-body stats">
                                {{ number_format($Businessdata[0]->RequestedCash,2)}}
                              </div>
                            </div>
                          </div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
					  <div class="card card-statistic-1">
					    <div class="card-icon bg-success ">
					      <i class="fas fa-dumbbell"></i>
					    </div>
					    <div class="card-wrap">
					      <div class="card-header">
					        <h4>Cash at Hand</h4>
					      </div>
					      <div class="card-body stats">
					        {{ number_format($Businessdata[0]->Cashathand,2)}}
					      </div>
					    </div>
					  </div>
					</div>                  
				</div>
				<!-- end of loan Statistics  -->
				<!-- body -->
				@if (session('operation'))
                    <h1 class="text-center"><i class="fas fa-bezier-curve yes-operation"></i></h1>
                    <h1 class="text-center">System is Opened</i></h1>
                @else
                    <h1 class="text-center"><i class="fas fa-ban no-operation"></i></h1>
                    <h1 class="text-center">No operation can be done at the moment</i></h1>
                @endif
				
				
				
				
				<!-- end body -->
    	</div>
    		<div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
    			<div class="row">
					<div class="col-lg-12 col-md-12  col-sm-12 col-12">
						<div class="table-responsive">
						<table class="table table-bordered " id="table-1">
							<thead>
								<tr>
									<th>Serial No.</th>
									<th>Open Date</th>
									<th>Open Time</th>
									<th>Opened By </th>
									<th>Open Balance</th>
									<th>Close Time</th>
									<th>Close Balance</th>
									<th>Close Date</th>
									<th>Closed By</th>
								</tr>
							</thead>
							<tbody>
								@php
                                    $i=1;
                                @endphp
								@foreach ($Businessdata[0]->operationhistory as $item)
                                    <tr>
                                        <td>{{ $i++}}</td>
                                        <td>{{ date('d M, Y',strtotime($item->open_date))}}</td>
                                        <td>{{ date('h:i:sa',strtotime($item->open_time))}}</td>
                                        <td>{{ strtoupper($item->first_name.' '.$item->middle_name.' '.$item->last_name) }}</td>
                                        <td>
                                            <span class="paid  text-success " style="font-size: 20px; font-weight: bold">{{ number_format($item->open_balance,2)}}</span>
                                        </td>
                                        <td>{{ date('h:i:sa',strtotime($item->close_time)) }}</td>
                                        <td>
                                            <span class="paid  text-danger ">{{ number_format($item->close_balance,2) }}</span>
                                        </td>
                                        <td>{{ date('d M, Y',strtotime($item->close_date))}}</td>
                                        <td>{{ strtoupper($item->closed_by) }}</td>
                                    </tr> 
                                @endforeach
								
							</tbody>
						</table>
						</div>
						
					</div>
				</div>
				<!-- end of tab 2  -->
            </div>
    		<div class="tab-pane fade" id="CashReturn3" role="tabpanel" aria-labelledby="CashReturn-tab3">
    			<div class="row">
					<div id="messagebox"  class="Errors  alert-dismissible show fade">
						<div class="alert-body tetx-center">
						 <p id="message"></p>
						</div>
					  </div>
					<div class="col-lg-12 col-md-12  col-sm-12 col-12">
						<div class="table-responsive">
						<table class="table table-bordered " id="table-2">
							<thead>
								<tr>
									<th>Serial No.</th>
									<th>Transact Date</th>
									<th>Transact By</th>
									<th>Return Amount </th>
									<th>Execution</th>
								</tr>
							</thead>
							<tbody>
								@php
                                    $i=1;
                                @endphp
								@foreach ($Businessdata[0]->SafeReturn as $item)
                                    <tr>
                                        <td>{{ $i++}}</td>
                                        <td>{{ date('d M, Y',strtotime($item->entry_date))}}</td>
                                        <td>{{ $item->first_name.' '.$item->middle_name.' '.$item->last_name}}</td>
                                        <td>{{ number_format($item->return_amount,2)}}</td>
                                        <td>
											@if ($item->request_status == 2)
												<span class="badge badge-success">Cash Approved</span>
											@elseif ($item->request_status == 3)
												<span class="badge badge-danger">Declined</span>
											@else
												<button id="{{$item->id}}" class="btn ApproveReturn btn-success">Approve</button>
                                            	<button id="{{$item->id}}" class="btn DeclineReturn btn-danger">Decline</button>
											@endif
                                        </td>
                                        
                                    </tr> 
                                @endforeach
								
							</tbody>
						</table>
						</div>
						
					</div>
				</div>
				<!-- end of tab 2  -->
            </div>
    		<div class="tab-pane fade" id="CashRequest3" role="tabpanel" aria-labelledby="CashRequest-tab3">
    			<div class="row">
					<div class="col-lg-12 col-md-12  col-sm-12 col-12">
						<div class="table-responsive">
						<table class="table table-bordered " id="table-1">
							<thead>
								<tr>
									<th>Serial No.</th>
									<th>Open Date</th>
									<th>Open Time</th>
									<th>Opened By </th>
									<th>Open Balance</th>
									<th>Close Time</th>
									<th>Close Balance</th>
									<th>Close Date</th>
									<th>Closed By</th>
								</tr>
							</thead>
							<tbody>
								@php
                                    $i=1;
                                @endphp
								@foreach ($Businessdata[0]->operationhistory as $item)
                                    <tr>
                                        <td>{{ $i++}}</td>
                                        <td>{{ date('d M, Y',strtotime($item->open_date))}}</td>
                                        <td>{{ date('h:i:sa',strtotime($item->open_time))}}</td>
                                        <td>{{ strtoupper($item->first_name.' '.$item->middle_name.' '.$item->last_name) }}</td>
                                        <td>
                                            <span class="paid  text-success " style="font-size: 20px; font-weight: bold">{{ number_format($item->open_balance,2)}}</span>
                                        </td>
                                        <td>{{ date('h:i:sa',strtotime($item->close_time)) }}</td>
                                        <td>
                                            <span class="paid  text-danger ">{{ number_format($item->close_balance,2) }}</span>
                                        </td>
                                        <td>{{ date('d M, Y',strtotime($item->close_date))}}</td>
                                        <td>{{ strtoupper($item->closed_by) }}</td>
                                    </tr> 
                                @endforeach
								
							</tbody>
						</table>
						</div>
						
					</div>
				</div>
				<!-- end of tab 2  -->
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
  $('.ApproveReturn').on('click',function(event){
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
                    url: "/ApproveReturn",
                    method: "POST",
                    dataType : 'json',
                    data: {id:id},
                    success:function(response)
                    {
						console.log(response);
                      if(response.status == 200)
                        {
                          $('#messagebox').removeClass('alert alert-warning'); 
                            $('#messagebox').addClass('alert alert-success'); 
                            $('#messagebox').attr("style", "display:block");
                            $('#message').text(response.message);
                            location.href = '/BusinessOperation'; 
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

       $('.DeclineReturn').on('click',function(event){
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
                    url: "/DeclineReturn",
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
                            location.href = '/BusinessOperation'; 
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