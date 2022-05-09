@extends('App.App')
@section('content')
    <!-- form income post  -->

<div class="row">
	<div class="col-12 col-md-3 col-lg-3">
	</div>
	<div class="col-12 col-md-6 col-lg-6">
		<div id="messagebox"  class="Errors  alert-dismissible show fade">
            <div class="alert-body tetx-center">
             <p id="message"></p>
            </div>
          </div>
	    <div class="card">
	      <form id="NewCategory" method="post" autocomplete="off" >
	        <div class="card-header">
	          <h4>New Income Category</h4>
	        </div>
	        <div class="card-body">
	          <div class="form-group">
	            <label>Income Category</label>
	            <input id="Income_Name"  type="text" name="Income_Name" class="form-control" required>
	          </div>
	          <div class="form-group">
	            <label>Visible</label>
	            <select id="Visibility" name="Visibility" class="form-control" required>
	            	<option value="2">Yes</option> 
	            	<option  value="1">No</option>
	            	
              </select>
	          </div>
	        </div>
	        <div class="card-footer text-right">
	          <button  type="submit" class="btn btn-primary">Save</button>
	        </div>
	      </form>
	    </div>
	</div>
	<div class="col-12 col-md-3 col-lg-3">
	</div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function (argument) {
          $('#messagebox').attr("style", "display:none");
         $('#NewCategory').on('submit',function(event){
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
                      url: "/Income-Category",
                      method: "POST",
                      dataType : 'json',
                      data: form_data,
                      success:function(response)
                      {
                          $('#NewCategory')[0].reset();
      
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