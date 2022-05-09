@extends('App.App')
@section('content')

 {{-- <script>
$(document).ready(function(){

   $("#sel_branch").change(function(){
       var deptid = $(this).val();

       $.ajax({
           url: 'SearchFsa.php',
           type: 'post',
           data: {depart:deptid},
           dataType: 'json',
           success:function(response){

               var len = response.length;

               $("#sel_fsa").empty();
               for( var i = 0; i<len; i++){
                   var id = response[i]['Fsa_Code'];
                   var name = response[i]['Fsa_Name'];
                   $("#sel_fsa").append("<option value='"+id+"'>"+name+"</option>");
               }
           }
       });
   });

});
</script> --}}
<style type="text/css" media="screen">
   
   .header-table th{
       color:white !important;
   }
</style>



<!-- //////////////////// -->

 {{-- <div id="NewStaffModel" class="modal">

 <!-- Modal content -->
 <div class="modal-content">
   <div class="text-center">
       <img src="assets/img/loading1.gif" width="100" alt="">
   </div>
   <h1 class="text-success text-bold text-center">Processing!!!</h1>
   <p>Please wait. Loading...............</p>
 </div>

</div> --}}
<!-- ///////////////////////// -->


<div class="m-body">
    <div id="messagebox"  class="Errors  alert-dismissible show fade">
        <div class="alert-body tetx-center">
         <p id="message"></p>
        </div>
      </div>

 <form method="post" id="NewStaffForm" autocomplete="off" accept-charset="utf-8">
   

   <div class="row m-1 card-body p-0">
       <div class="col-lg-6">
      <h3 class="text-success">Account Info</h3> 
      <hr>
      <div class="form-group">
           <label for="f_name" class="col-sm-3 control-label">First Name <span class="text-danger" style="color:red;">*</span></label>
           <div class="col-sm-9">
             <input type="text" class="form-control" id="first_name" name="first_name" required >
           </div>
       </div>

         <div class="form-group">
           <label for="m_name" class="col-sm-3 control-label">Middle Name </label>

           <div class="col-sm-9">
             <input type="text" class="form-control" id="middle_name" name="middle_name" >
           </div>
         </div>

         <div class="form-group">
           <label for="l_name" class="col-sm-3 control-label">Last Name <span class="text-danger" style="color:red;">*</span></label>

           <div class="col-sm-9">
             <input type="text" class="form-control" id="last_name" name="last_name" required >
           </div>
         </div>

         <div class="form-group">
           <label for="email" class="col-sm-3 control-label">Email Address <span class="text-danger" style="color:red;">*</span></label>

           <div class="col-sm-9">
             <input type="email" class="form-control" id="email" name="email" required >
           </div>
         </div>
         <div class="form-group">
           <label for="id_number" class="col-sm-3 control-label">ID Number <span class="text-danger" style="color:red;">*</span></label>

           <div class="col-sm-9">
             <input type="number" class="form-control" id="id_number" name="id_number" required >
           </div>
         </div>

         <div class="form-group">
           <label for="city" class="col-sm-3 control-label">City <span class="text-danger" style="color:red;">*</span></label>

           <div class="col-sm-9">
            <input type="text" class="form-control" id="city" name="city" required >
           </div>
         </div>
         <div class="form-group">

             <label for="village" class="form-label">Village<sup style="color:red;">*</sup></label>
             <div class="col-sm-9">
                <input type="text" class="form-control" id="village" name="village" required >
           </div>
         </div>

         <div class="form-group">
           <label for="file_no" class="col-sm-3 control-label">Personal File NO. <span class="text-danger" style="color:red;">*</span></label>

           <div class="col-sm-9">
             <input type="text" class="form-control" id="personal_file_no" name="personal_file_no" required >
           </div>
         </div>
     </div>
     <div class="col-lg-6">
       <h3 class="text-danger">Personal Info</h3> 
       <hr>
       <div class="form-group">
         <label for="gender" class="col-sm-3 control-label">Gender <span class="text-danger" style="color:red;">*</span></label>

         <div class="col-sm-9">
           <select class="form-control " id="gender" name="gender" required >
               <option value >Select Gender</option>
               <option value="Male">Male</option>
               <option value="Female">Female</option>
               <option value="Others">Others</option>
           </select>
         </div>
       </div>
         <div class="form-group">
           <label for="dob" class="col-sm-3 control-label">Date of Birth <span class="text-danger" style="color:red;">*</span></label>

           <div class="col-sm-9">
             <input type="date" class="form-control" name="dob" required >
           </div>
         </div>
         <div class="form-group">
           <label for="phone_number" class="col-sm-3 control-label">Phone Number 09.. or 01.. <span class="text-danger" style="color:red;">*</span></label>

           <div class="col-sm-9">
             <input type="text" class="form-control" id="phone" name="phone" required >
           </div>
         </div>
         <div class="form-group">
           <label for="huduma_number" class="col-sm-3 control-label">Huduma Number</label>

           <div class="col-sm-9">
             <input type="text" class="form-control" id="huduma_number" name="huduma_number">
           </div>
         </div>
         <div class="form-group">
           <label for="nhif_number" class="col-sm-3 control-label">NHIF Number <span class="text-danger" style="color:red;">*</span></label>

           <div class="col-sm-9">
             <input type="number" class="form-control" id="nhif_number" name="nhif_number"  >
           </div>
         </div>
         <div class="form-group">
           <label for="nssf_number" class="col-sm-3 control-label">NSSF Number <span class="text-danger" style="color:red;">*</span></label>

           <div class="col-sm-9">
             <input type="text" class="form-control" id="nssf_number" name="nssf_number"  >
           </div>
         </div>
         <div class="form-group">
           <label for="kra_pin" class="col-sm-3 control-label">KRA Pin <span class="text-danger" style="color:red;">*</span></label>

           <div class="col-sm-9">
             <input type="text" class="form-control" id="kra_pin" name="kra_pin"  >
           </div>
         </div>
         <div class="form-group">
           <label for="school_grade" class="col-sm-3 control-label">High School Grade <span class="text-danger" style="color:red;">*</span></label>

           <div class="col-sm-9">
             <select class="form-control " id="school_certificate_grades" name="school_certificate_grades" required  >
                 <option value="" >Select Grade</option>
                 <option value="A">A Plain</option>
                 <option value="A-">A-</option>
                 <option value="B+">B+</option>
                 <option value="B Plain">B Plain</option>
                 <option value="B-">B-</option>
                 <option value="C+">C+</option>
                 <option value="C Plain">C Plain</option>
                 <option value="C-">C-</option>
                 <option value="D+">D+</option>
                 <option value="D Plain">D Plain</option>
                 <option value="D-">D-</option>
                 <option value="E">E</option>
             </select>
           </div>
         </div>
         <div class="form-group">
           <label for="college_grade" class="col-sm-3 control-label">College Grade <span class="text-danger" style="color:red;">*</span></label>

           <div class="col-sm-9">
             <select class="form-control " id="college_certificates" name="college_certificates" required >
                 <option value="" >Select Grade</option>
                 <option value="Distinction">Distinction</option>
                 <option value="Credit">Credit</option>
                 <option value="Pass">Pass</option>
             </select>
           </div>
         </div>
         <div class="form-group">
           <input type="hidden" name="action" value="NewStaffEntry">
           <button type="reset" class="btn btn-danger">Reset Form</button>
           <button type="sbumit" id="BtnNewStaff" class="btn btn-success">Upload Info</button>
         </div>
     </div>
 </div>
  </form>
</div>



@endsection

@section('scripts')
<script>
$(document).ready(function (argument) {
      $('#messagebox').attr("style", "display:none");
     $('#NewStaffForm').on('submit',function(event){
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
                  url: "/New-Staff",
                  method: "POST",
                  dataType : 'json',
                  data: form_data,
                  success:function(response)
                  {
                      $('#NewStaffForm')[0].reset();
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
                  }
              });
       
     });
   });
  </script>
    
@endsection