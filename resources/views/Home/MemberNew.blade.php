@extends('App.App')
@section('content')
    
<div class="m-body">
    <div id="messagebox"  class="Errors  alert-dismissible show fade">
        <div class="alert-body tetx-center">
         <p id="message"></p>
        </div>
      </div>
    <form id="MemberForm" method="post" accept-charset="utf-8">
        <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                        <div class="card-header">
                          <h4>Member Registration</h4>
                        </div>
    
                        <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">First Name <sup style="color:red;">*</sup></label>
                    <input id="fname" name="first_name" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Second Name</label>
                    <input name="second_name" type="text" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Last Name <sup style="color:red;">*</sup></label>
                    <input name="last_name" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Village <sup style="color:red;">*</sup></label>
                    <input name="village" type="text" class="form-control" >
                </div>
              <div class="form-group">
                <label for="exampleFormControlInput1" class="form-label">Gender <sup style="color:red;">*</sup></label>
                <select class="form-control" name="gender" id="" required>
                    <option value=""></option>
                    <option value="MALE">MALE</option>
                    <option value="FEMALE">FEMALE</option>
                    <option value="OTHERS">OTHERS</option>
                </select>
                </div>
              <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Select Branch <sup style="color:red;">*</sup></label>
                    <select  name="branchid" class="form-control"  required>
                        <option value="1">Yoga Branch</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Disability<sup style="color:red;">*</sup></label>
                    <select class="form-select form-control" name="disability" id="" required>
                        <option value="NO">NO</option>
                        <option value="YES">YES</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Mobile <sup style="color:red;">*</sup></label>
                    <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      254
                    </div>
                  </div>
                    <input id="contact" name="mobile" type="number" class="form-control" required>
                </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Email <sup style="color:red;">*</sup></label>
                    <input name="email" type="text" class="form-control"  >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">National ID <sup style="color:red;">*</sup></label>
                    <input name="nationalid" type="number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Occupation <sup style="color:red;">*</sup></label>
                    <textarea id="message" name="occupation" class="form-control" required></textarea>
                </div>
    
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-body">
    <!-- // -->
                    <div class="form-group">
                <label for="exampleFormControlInput1" class="form-label">Huduma Number </label>
                <input name="huduma_number" type="text" class="form-control" value="0">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">KRA Pin </label>
                        <input name="kra_pin" type="text" class="form-control" value="0">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Date of Birth <sup style="color:red;">*</sup></label>
                        <input name="dob" type="date" class="form-control datetimepicker-input" data-target="#reservationdate" required/>
                    </div>
                    
                    <p>BENEFICIARY DETAILS</p>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Beneficiary Name </label>
                        <input name="ben_name" type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Beneficiary National ID </label>
                        <input name="ben_national_id" type="number" class="form-control" value="0">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Beneficiary Relation </label>
                        <select class="form-control" id="ben_relation" name="ben_relation" >
                        <option value="">--Please Select--</option>
                        <option value="Spouse">Spouse</option>
                        <option value="Parent">Parent</option>
                        <option value="Son/Daughter">Son/Daughter</option>
                        <option value="Brother/Sister">Brother/Sister</option>
                        <option value="Aunt/Uncle">Aunt/Uncle</option>
                        <option value="Grandparent">Grandparent</option>
                        <option value="Grandchild">Grandchild</option>
                        <option value="Cousin">Cousin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Beneficiary Contact </label>
                        <input name="ben_contact" type="number" class="form-control" >
                    </div>
                    <p><b>NEXT OF KIN DETAILS</b></p>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Next of Kin Name </label>
                        <input name="kin_name" type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Next of Kin Contact</label>
                        <input name="kin_contact" type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Next of Kin PASSPORT/ID</label>
                        <input name="kin_id" type="number" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Next of Kin Relation</label>
                        <select class="form-control" id="kin_relation" name="kin_relation" >
                            <option value="">--Please Select--</option>
                            <option value="Spouse">Spouse</option>
                            <option value="Son/Daughter">Son/Daughter</option>
                            <option value="Parent">Parent</option>
                            <option value="Brother/Sister">Brother/Sister</option>
                            <option value="Aunt/Uncle">Aunt/Uncle</option>
                            <option value="Grandparent">Grandparent</option>
                            <option value="Grandchild">Grandchild</option>
                            <option value="Cousin">Cousin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Select Group <sup style="color:red;">*</sup></label>
                        <select  name="group_id" class="form-control"  required>
                            <option value="1">UMOJA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        
                        <button  type="submit" class="form-control btn btn-success"> Submit Data</button>
                    </div>
                    <!-- // -->
                  </div>
            </div>
        </div>
    </div>
    </form>
    
    <!-- end post  -->
    </div>
@endsection

@section('scripts')
<script>
$(document).ready(function (argument) {
      $('#messagebox').attr("style", "display:none");
     $('#MemberForm').on('submit',function(event){
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
                  url: "/Member-New",
                  method: "POST",
                  dataType : 'json',
                  data: form_data,
                  success:function(response)
                  {
                      $('#MemberForm')[0].reset();
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