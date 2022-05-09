@extends('App.App')
@section('content')
    
<div class="m-body">
    <!-- start of statics  -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger ">
                    <i class="fas fa-business-time"></i>
                    </div>
                    <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pending Approval</h4>
                    </div>
                    <div class="card-body stats">
                        {{ number_format($Businessdata[0]->Pendingapproval,2)}}
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
        <div id="messagebox"  class="Errors  alert-dismissible show fade">
            <div class="alert-body tetx-center">
             <p id="message"></p>
            </div>
          </div>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3>CASH RETURN FORM</h3>
                    <hr>
                    <form id="CashReturnForm"  method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1" class="form-label">Return Amount</label>
                            <input name="amount" type="number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success form-control ">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function (argument) {
     $('#messagebox').attr("style", "display:none");
     $('#CashReturnForm').on('submit',function(event){
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
                  url: "/CashReturn",
                  method: "POST",
                  dataType : 'json',
                  data: form_data,
                  success:function(response)
                  {
                      $('#CashReturnForm')[0].reset();
                    console.log(response);
  
                      if(response.status == 200)
                      {
                        $('#messagebox').removeClass('alert alert-warning'); 
                          $('#messagebox').addClass('alert alert-success'); 
                          $('#messagebox').attr("style", "display:block");
                          $('#message').text(response.message);  
                          setTimeout(() => {
                             location.href = "/CashReturn";
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
                             location.href = "/CashReturn";
                         }, 1500);
                  }
              });
       
     });
   });
  </script>
    
@endsection