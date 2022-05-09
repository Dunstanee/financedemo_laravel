@extends('App.App')
@section('content')
    
<div class="m-body">
    <!-- form income post  -->
    
    <div class="row">
        <div class="col-12 col-md-3 col-lg-3">
        </div>
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
              <form id="Post_Income" method="post" autocomplete="off" >
                <div class="card-header">
                  <h4>New Income Record</h4>
                </div>
                <div id="messagebox"  class="Errors  alert-dismissible show fade">
                    <div class="alert-body tetx-center">
                     <p id="message"></p>
                    </div>
                  </div>
                <div class="card-body m-1">
                    <!-- <p  class="Errors">Please Fill Completely</p> -->
                  <div class="form-group">
                    <label>Select Category</label>
                    <select id="category"  name="income_categoryid" class="form-control" required>
                           @foreach ($Incomelist as $item)
                               <option value="{{$item->id}}">{{$item->category_name}}</option>
                           @endforeach
                        
                      </select>
                  </div>
                  <div class="form-group">
                    <label>Enter Amount</label>
                    <input id="amount" name="Amount" type="number" class="form-control" required="">
                  </div>
                  <div class="form-group mb-0">
                    <label>Description/Naration</label>
                    <textarea id="message" name="description" class="form-control" required=""></textarea>
                  </div>
                  <div class="form-group">
                    <label>Payment Mode</label>
                    <select id="Modes" name="modeid" class="form-control" required>
                            @foreach ($Paymodes as $item)
                               <option value="{{$item ->id}}">{{$item ->modename}}</option>
                           @endforeach
                      </select>
                  </div>
                </div>
                <div class="card-footer text-right">
                    <input type="hidden" name="tenantid" id="action"  value="1">
                  <button  type="submit"   class="btn btn-primary BtnPost">Post</button>
                </div>
               
              </form>
            </div>
        </div>
        <div class="col-12 col-md-3 col-lg-3">
        </div>
    </div>
    <!-- end post  -->
    </div>
@endsection

@section('scripts')
<script>
$(document).ready(function (argument) {
      $('#messagebox').attr("style", "display:none");
     $('#Post_Income').on('submit',function(event){
       event.preventDefault();
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
                  url: "/Income-Post",
                  method: "POST",
                  dataType : 'json',
                  data: form_data,
                  success:function(response)
                  {
                      $('#Post_Income')[0].reset();
                    console.log(response);
  
                      if(response.status == 200)
                      {
                        $('#messagebox').removeClass('alert alert-warning'); 
                          $('#messagebox').addClass('alert alert-success'); 
                          $('#messagebox').attr("style", "display:block");
                          $('#message').text(response.message);  
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