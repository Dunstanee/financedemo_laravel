@extends('App.App')
@section('content')
@if (count($Member) > 0)
@php
    $Member = $Member[0];
@endphp


<div class="m-body">
	<div class="section-body">
	    <h2 class="section-title">{{ $Member ->first_name.' '.$Member ->second_name.' '.$Member ->last_name}}</h2>
	    <p class="section-lead">
	     Member ID : <span class="memberid">{{ $Member -> id}}</span>
	    </p>
		<div class="row mt-sm-4">
		  <div class="col-12 col-md-12 col-lg-5">
		    <div class="card profile-widget">
		      <div class="profile-widget-header">                     
		        <img alt="image" src="{{url('Users/dan.png')}}" class="rounded-circle profile-widget-picture">
		        <div class="profile-widget-items">
		          <div class="profile-widget-item">
		            <div class="profile-widget-item-value m-1">Member Status : <b class="btn btn-success">{{ $Member ->status}}</b></div>
		            <div class="profile-widget-item-value">Member_Group : {{ $Member ->groupid}}</div>
		          </div>
		        </div>
		      </div>
		      <div class="profile-widget-description">
		        	<div class="profile-widget-name">Member Details </div>
		      		<table class="table table-striped">
		      			<tbody>
		      				<tr>
		      					<td>Email Address</td>
		      					<td>{{ $Member ->email}}</td>
		      				</tr>
		      				<tr>
		      					<td>Contact</td>
		      					<td>{{ $Member ->mobile}}</td>
		      				</tr>
		      				<tr>
		      					<td>Village</td>
		      					<td>{{ $Member ->village}}</td>
		      				</tr>
		      				<tr>
		      					<td>ID Number</td>
		      					<td>{{ $Member ->national_id}}</td>
		      				</tr>
		      				<tr>
		      					<td>Branch Name</td>
		      					<td>{{ $Member -> branchid}}</td>
		      				</tr>
		      				<tr>
		      					<td>Occupation</td>
		      					<td>{{ $Member -> occupation}}</td>
		      				</tr>
		      			</tbody>
		      		</table>
		      </div>
		    </div>
		    
		  </div>
		  <div class="col-12 col-md-12 col-lg-7">
			<div class="card card-body">
				<div class="row">
					<div class="col-lg-6 col-md-12  col-sm-12 col-12">
					  <div class="card">
						<div class="btn bg-primary text-light card-body pt-2 pb-2">
						  <div id="myWeather">My Accounts</div>
						</div>
					  </div>
					</div>
				</div>
				<div class="row table-responsive">
				<table class="table table-striped">
					  <thead>
						  <tr>
							  <th>Account Name</th>
							  <th>Controls</th>
						  </tr>
					  </thead>
					  <tbody>
						  	@foreach ($Member->Accounts as $account)
								<tr>
									<td>{{ $account->accountname }}</td>
									<td>
										<button disabled="disabled" class="btn btn-danger">Lock</button>
									</td>
								</tr>
							  @endforeach
					  </tbody>
				  </table>
				  </div>
			</div>
		    <div class="card card-body">
		    	<div class="row">
				    <div class="col-lg-6 col-md-12  col-sm-12 col-12">
				      <div class="card">
				        <div class="btn bg-warning text-light card-body pt-2 pb-2">
				          <div id="myWeather">Account Transactions</div>
				        </div>
				      </div>
				    </div>
				</div>
				
			      	<table class="table table-striped">
			      		<thead>
			      			<tr>
			      				<th>Account Name</th>
			      				<th>Account Balance</th>
			      				<th> View Transaction</th>
			      			</tr>
			      		</thead>
			      		<tbody>
							@foreach ($Member->Accounts as $account)
							<tr>
								<td>{{ $account->accountname }}</td>
								<td>{{ number_format($account->Balance,2) }}</td>
								<td>
									<button id="{{ $account->accountid }}" class="btn ViewTransaction btn-primary">View Transactions</button>
								</td>
							</tr>
						  @endforeach
			      		</tbody>
			      	</table>
			    
		      	<!-- loan schedule  -->
		      	<div class="row">
				    <div class="col-lg-6 col-md-12  col-sm-12 col-12">
				      <div class="card">
				        <div class="btn bg-info text-light card-body pt-2 pb-2">
				          <div id=" myWeather">My Loans</div>
				        </div>
				      </div>
				    </div>
				</div>
				<div class="row table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class="header-table-column bg-light">Month</th>
								<th>Loan Applied</th>
								<th>Expected Payment</th>
								<th>Loan Balance</th>
								<th>View</th>
							</tr>
						</thead>
						<tbody>
							{{-- <?php 
							if(!empty($Loan_List)){
	  			 	foreach($Loan_List AS $row){
							 ?>
							<tr>
								<td class="header-table-column"><?php echo $row['Loan_Duration'].' Months' ?></td>
								<td><?php echo number_format($row['Loan_Amount'],2) ?></td>
								<td><?php echo number_format($row['Total_Accumulation'],2) ?></td>
								<td><?php echo number_format($row['Total_Balance'],2) ?></td>
								<td>
									<?php 
				                	$Loan_Nos = $row['Loan_Number'];
				                	// View_Loan2($Loan_Nos,$page);
				                	 ?>
								<button id="<?php echo $Loan_Nos ?>" name="Btn_Loan_View" type="submit" class="btn btn-primary btn-action mr-1 ViewLoan" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></button>
								</td>
							</tr>
							<?php 
		 					}}
							 ?> --}}
						</tbody>
					</table>
				</div>
				<!-- end of loan schedule -->
		    </div>
		  </div>
		</div>
	</div>

	<!-- ///ACOUNT LIST  -->
	
</div>
    
@else
    <div   class="Errors  alert-dismissible show fade alert alert-danger">
    <div class="alert-body tetx-center">
     <p id="message">404 ERROR!! . User search not found.</p>
    </div>
  </div>
@endif

@endsection
@section('scripts')
	<script>
$(document).ready(function (argument) 
{
      
     $('.ViewTransaction').on('click',function(event)
	 {
  
      	var accountid = $(this).attr('id');
      	var m_id = $('.memberid').html();
      	$.ajaxSetup(
		{
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		location.href = '/Transactions/'+accountid+'/'+m_id+'/';
    });
});
	</script>
@endsection