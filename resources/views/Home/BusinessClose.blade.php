@extends('App.App')
@section('content')
  
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
 <div class="row">
	<div class="col-12 col-md-3 col-sm-12">
  </div>
  <div class="col-12 col-md-6 col-sm-12">
    @if (!session('operation'))
  	<h1 class="text-center"><i class="fas fa-exclamation-triangle warning-logo"></i></h1>
  	<h1 class="text-center">Operation Closed</h1>
  	<a href="O-C-Business.php" class=" form-control btn btn-danger">Close</a>
  	@else
    <div id="messagebox"  class="Errors  alert-dismissible show fade">
      <div class="alert-body tetx-center">
       <p id="message"></p>
      </div>
      </div>
    <div class="card">
      <div class="card-header">
        <h3>Closing Balance</h3>
      </div>
      <div class="card-body">
      	@if ($Businessdata[0]->Cashathand > 0)
             
          <h3 class="text-warning"><b class="text-danger">NOTICE : </b>Business operation can't close at the moment. Please ensure all cash from the cashier has been tranfered to safe. Thank you.</h1>
          @else
              
          
      	    <form id="CloseOperationForm"  method="post" accept-charset="utf-8">
                <div class="form-group text-right">
                    <label>Closing Balance</label>
                    <h1 class=" text-success  text-right">{{number_format($Businessdata[0]->safebalance,2)}}</h1>
                </div>
                <div class="form-group">
                <label>Narration</label>
                <textarea id="narration" class="summernote-simple" name="narration" required></textarea>
                </div>
	            <div class="row">
                    <div class="col-12 col-md-6 col-sm-12">
                        <button type="submit"  class="form-control btn btn-info">Close Business</button>
                    </div>
                    <div class=" col-12 col-md-6 col-sm-12">
                        <a href="/BusinessOperation" class=" form-control btn btn-danger">Back</a>
                    </div>
				</div>
			</form>
            @endif
        </div>
    </div>
    @endif
  </div>
  <div class="col-12 col-md-3 col-sm-12">
  </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function (argument) {
     $('#messagebox').attr("style", "display:none");
     $('#CloseOperationForm').on('submit',function(event){
       event.preventDefault();
       $('#messagebox').removeClass('alert alert-warning');
       $('#messagebox').removeClass('alert alert-danger');
       $('#messagebox').removeClass('alert alert-success');
          $('#messagebox').addClass('alert alert-warning');
          $('#messagebox').attr("style", "display:block");
          $('#message').text('Please wait. Loading...');
      var form_data = $(this).serialize();
      
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
       
              $.ajax({
                  url: "/BusinessClose",
                  method: "POST",
                  dataType : 'json',
                  data: form_data,
                  success:function(response)
                  {
                      $('#CloseOperationForm')[0].reset();
                    console.log(response);
  
                      if(response.status == 200)
                      {
                        $('#messagebox').removeClass('alert alert-warning'); 
                          $('#messagebox').addClass('alert alert-success'); 
                          $('#messagebox').attr("style", "display:block");
                          $('#message').text(response.message);  
                          setTimeout(() => {
                             location.href = "/CloseBusiness";
                         }, 1500);
                      }
                      if(response.status == 400)
                      {
                        $('#messagebox').removeClass('alert alert-warning'); 
                          $('#messagebox').addClass('alert alert-danger'); 
                          $('#messagebox').attr("style", "display:block");
                          $('#message').text(response.message);
                          
                      }
                      
                      
                      setTimeout(() => {
                             $('#messagebox').attr("style", "display:none");
                             
                         }, 1500);
                  }
              });
       
     });
   });
  </script>
    
@endsection