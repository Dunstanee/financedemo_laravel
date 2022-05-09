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
    <div class="row">
        <div class="col-lg-4" >
            <div id="firstshow" class="card bg-primary">
                <div class="card-body">
                    <h4>Member Details</h4>
                    <hr>
                    <p>Name: <span id="membername"></span></p>
                    <p>Member ID: <span id="showid"></span></p>
                    <h4>Account</h4>
                    <hr>
                    <p>Choose Account: </p>
                    <form id="GetAccountForm" method="post">
                        <div class="row">
                            <div class="col-lg-8">
                                <select class="form-control select2" name="accountid" id="myaccounts"></select>
                                <input type="hidden" name="memberid" id="mid"> 
                            </div>
                            <div class="col-lg-4">
                                <button type="submit" class="m-1 btn btn-success">show</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
        <div class="col-lg-4">
            <div id="secondshow">
                <div class="row">
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                            <h4 id="accountname"></h4>
                            </div>
                            <div class="card-body stats ">
                            <span id="accountsum"></span>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                
                <div class="card ">
                    <div class="card-body">
                        <h4>Withdrawal Form</h4>
                        <hr>
                        <p>Enter Amount :  </p>
                        <form id="WithdrawFormCash" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <input class="form-control" type="number" name="amount" id="" required> 
                                </div>
                            </div>
                            <p>Withdrawal Mode</p>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <select class="form-control " name="modeid" id="mode" required></select>
                                        <input type="hidden" name="memberid" value="" id="m_id" required>
                                        <input type="hidden" name="accountid"  value="" id="ac_id" required>
                                    </div>
                                </div>
                            <div class="row p-3">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-success form-control">Withdraw Cash</button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div id="thirdshow" class="card bg-primary">
                <div class="card-body">
                    <h3>Transaction Cost Table</h3>
                    <hr>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
<script>
$(document).ready(function (argument) {
      $('#messagebox').attr("style", "display:none");
      $('#firstshow').attr("style", "display:none");
      $('#secondshow').attr("style", "display:none");
      $('#thirdshow').attr("style", "display:none");
     $('#SearchMember').on('submit',function(event){
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
                  url: "/WithdrawBalance",
                  method: "POST",
                  dataType : 'json',
                  data: form_data,
                  success:function(response)
                  {
                    console.log(response);
                    $('#messagebox').attr("style", "display:none");

                    $('#membername').text(response[0].first_name+' '+response[0].second_name+' '+response[0].last_name);
                    $('#showid').text(''+response[0].id);
                    $('#mid').val(''+response[0].id);
                    $('#m_id').val(''+response[0].id);
                    
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
                    $('#firstshow').attr("style", "display:block");
                  }
              });
       });
     $('#GetAccountForm').on('submit',function(event){
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
                  url: "/AccountSum",
                  method: "POST",
                  dataType : 'json',
                  data: form_data,
                  success:function(response)
                  {
                    $('#messagebox').attr("style", "display:none");
                    console.log(response);
                    $('#accountname').text(''+response.accountname);
                    $('#accountsum').text(''+response.totalbalance);
                    $('#ac_id').val(''+response.accountid);
                    $('#secondshow').attr("style", "display:block");
                    $('#thirdshow').attr("style", "display:block");
                    
                  }
              });
       });
     $('#WithdrawFormCash').on('submit',function(event){
       event.preventDefault();

       $('#messagebox').removeClass('alert alert-success');
         $('#messagebox').removeClass('alert alert-danger');
         $('#messagebox').removeClass('alert alert-warning');
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
                  url: "/WithdrawAccount",
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
                            $('#firstshow').attr("style", "display:none");
                            $('#secondshow').attr("style", "display:none");
                            $('#thirdshow').attr("style", "display:none");
                            $('#WithdrawFormCash')[0].reset();
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

