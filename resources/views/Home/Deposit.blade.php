@extends('App.App')
@section('content')
    <div class="m-body">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form id="SearchMember"  method="post" class="form-inline mr-auto">
                            <div class="row">
                            <div class="search-element">
                              <select id="memberid"  name="memberid" class="form-control select2" required>
                                <option value=""></option>
                                @foreach ($Members as $item)
                                    <option value="{{$item->id}}">{{ $item->first_name.' '.$item->second_name.' '.$item->last_name}}</option>
                                @endforeach
                                
                              </select>
                              <div class="search-backdrop"></div>
                            </div>
                            <button class="btn m-1"  type="submit"><i class="fas fa-filter"></i> Search Member</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="messagebox"  class="Errors  alert-dismissible show fade">
        <div class="alert-body tetx-center">
         <p id="message"></p>
        </div>
      </div>
    <section id="depositshow">
        <div class="row" >
            <div class="col-lg-4">
                <div class=" bg-primary card">
                    <div class="card-body">
                        <h4>Member Details</h4>
                        <hr>
                        <p>Name: <span id="membername"></span></p>
                        <p>Member ID: <span id="showid"></span></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div id="messagebox"  class="Errors  alert-dismissible show fade">
                    <div class="alert-body tetx-center">
                     <p id="message"></p>
                    </div>
                  </div>
                <div class=" bg-primary card">
                    <div class="card-body">
                        <h4>Deposit Cash</h4>
                        <hr>
                        <p>Choose Account: </p>
                        <form id="DepositForm" method="post">
                            <div class="row">
                                <div class="col-lg-8">
                                    <select class="form-control " name="accountid" id="myaccounts" required></select> 
                                </div>
                            </div>
                            <p>Enter Amount: </p>
                            <div class="row">
                                <div class="col-lg-8">
                                    <input class="form-control " type="number" name="amount" required>
                                    <input class="form-control " type="hidden" name="memberid" id="m_id" required>
                                </div>
                            </div>
                            <p>Deposit Mode</p>
                            <div class="row">
                                <div class="col-lg-8">
                                    <select class="form-control " name="modeid" id="mode" required></select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8 p-3">
                                    <button type="submit" id="btndeposit" class="btn form-control btn-success"> Deposit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection

@section('scripts')
<script>
$(document).ready(function (argument) {
      $('#messagebox').attr("style", "display:none");
      $('#depositshow').attr("style", "display:none");

     $('#SearchMember').on('submit',function(event){
       event.preventDefault();
       $("#btndeposit").attr("disabled", true);

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
                  url: "/DepositData",
                  method: "POST",
                  dataType : 'json',
                  data: form_data,
                  success:function(response)
                  {
                    $("#btndeposit").attr("disabled", false);
                    $('#depositshow').attr("style", "display:block");
                    $('#messagebox').attr("style", "display:none");
                    

                    $('#membername').text(response[0].first_name+' '+response[0].second_name+' '+response[0].last_name);
                    $('#showid').text(''+response[0].id);
                    $('#m_id').val(response[0].id);

                    $select = $('#myaccounts');
                    $select.find('option').remove();
                    $.each(response[0].Accounts, function (key, value) {
                      $('#myaccounts').append('<option value='+ value.accountid +'>' + value.account_name + '</option>')  ;
                    });

                    $mode = $('#mode');
                    $mode.find('option').remove();
                    $.each(response[0].Mode, function (key, value) {
                      $('#mode').append('<option value='+ value.id +'>' + value.modename + '</option>')  ;
                    });
  
                  }
              });
       
     });

     $('#DepositForm').on('submit',function(event){
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
                  url: "/DepositAccount",
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
                             $('#depositshow').attr("style", "display:none");
                             $('#DepositForm')[0].reset();
                         }, 100); 
                         setTimeout(() => {
                             $('#messagebox').attr("style", "display:none");
                         }, 800);

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

