@extends('App.App')
@section('content')
<style type="text/css" media="screen">
	
	.header-table th{
		color:white !important;
	}
	.warning-logo{
		font-size: 10em;
		color: orange;
	}
	 #error_message{
    display: none;
}

#Loading{
		display:none;
	}
</style>
<div class="row">
	<div class="col-12 col-md-3 col-sm-12">
  </div>
  <div class="col-12 col-md-6 col-sm-12">
  	@if (session('operation'))
        <h1 class="text-center"><i class="fas fa-exclamation-triangle warning-logo"></i></h1>
  	<h1 class="text-center">Operation Activated</h1>
    <a href="/BusinessOperation" class=" form-control btn btn-danger">back</a>
    @else
    <div class="card">
      <div class="card-header">
        <h3>Openning Balance</h3>
      </div>
      <div class="card-body">
        <div id="messagebox"  class="Errors  alert-dismissible show fade">
            <div class="alert-body tetx-center">
             <p id="message"></p>
            </div>
        </div>
      	    <form id="OpenForm"  method="post" accept-charset="utf-8">
                <div class="form-group text-right">
                    <label>Opening Balance</label>
                    <h1 class="text-success">{{ number_format($Businessdata[0]->safebalance,2)}}</h1>
                </div>
	        
	            <div class="row">
	        	    <input type="hidden" name="openbalance" value="{{ $Businessdata[0]->safebalance}}">
                    <div class="col-12 col-md-6 col-sm-12">
                        <button type="submit" name="open_business" class="form-control btn btn-success">Open Business</button>
                    </div>
                    <div class=" col-12 col-md-6 col-sm-12">
                        <a href="/BusinessOperation" class=" form-control btn btn-danger">Cancel</a>
                    </div>
				</div>
			</form>
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
    
      $('#OpenForm').on('submit',function(event){
       event.preventDefault();

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
                  url: "/OpenOperations",
                  method: "POST",
                  dataType : 'json',
                  data: form_data,
                  success:function(response)
                  {
                    console.log(response);
  
                      if(response.status == 200)
                      {
                        $('#messagebox').removeClass('alert alert-warning'); 
                          $('#messagebox').addClass('alert alert-success'); 
                          $('#messagebox').attr("style", "display:block");
                          $('#message').text(response.message);  
                         
                         setTimeout(() => {
                             $('#messagebox').attr("style", "display:none");
                         }, 1500);

                      }
                      if(response.status == 400)
                      {
                        $('#messagebox').removeClass('alert alert-warning'); 
                          $('#messagebox').addClass('alert alert-danger'); 
                          $('#messagebox').attr("style", "display:block");
                          $('#message').text(response.message);
                          setTimeout(() => {
                             $('#messagebox').attr("style", "display:none");
                         }, 1500);
                      }
  
                  }
              });
       
     });
   });
  </script>
      
  @endsection