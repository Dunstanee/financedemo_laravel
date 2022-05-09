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
	      <form id="UpdateIncome" method="post" autocomplete="off" >
	        <div class="card-header">
	          <h4>Update Income Record</h4>
	        </div>
	        <div class="card-body">
	          <div class="form-group">
	            <label>Income Category</label>
	            <input id="Income_Name" value="{{$incomedata->category_name}}" type="text" name="Income_Name" class="form-control" required="">
	            <input id="id" value="{{$incomedata->id}}" type="hidden" name="incomeid" class="form-control" required="">
	          </div>
	          <div class="form-group">
	            <label>Visible</label>
	            <select id="Visibility" name="Visibility" class="form-control" required>
	            	<option @if ($incomedata->Visibility == 2) selected @endif value="2">Yes</option> 
	            	<option @if ($incomedata->Visibility == 1) selected @endif value="1">No</option>
	            	
              </select>
	          </div>
	        </div>
	        <div class="card-footer text-right">
	          <button type="submit" class="btn btn-primary">Update</button>
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
         $('#UpdateIncome').on('submit',function(event){
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
                      url: "/Incomes/Edit",
                      method: "POST",
                      dataType : 'json',
                      data: form_data,
                      success:function(response)
                      {
                          $('#UpdateIncome')[0].reset();
                        //   $('#members').prop('selectedIndex',-1);
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
                          location.href = '../../Income-List';
                      }
                  });
           
         });
       });
      </script>
@endsection