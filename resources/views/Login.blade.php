<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Easy Go In.</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{url('assets/favicon.ico')}}" type="image/icon type">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ url('assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
<!-- Start GA -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script> -->
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>

 <script type="text/javascript">
        window.onload = function () {
            var script = document.createElement("script");
            script.type = "text/javascript";
            script.src = "https://api.ipify.org?format=jsonp&callback=DisplayIP";
            document.getElementsByTagName("head")[0].appendChild(script);
        };
        function DisplayIP(response) {
          
          var inputF = document.getElementById("ipaddress");
          inputF.setAttribute('value', response.ip);
          
        }
    </script>

<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="assets/full_logo.png" alt="logo" width="200" >
            </div>

            <div class="card card-primary">
              <div id="messagebox"  class="Errors  alert-dismissible show fade">
                <div class="alert-body tetx-center">
                 <p id="message"></p>
                </div>
              </div>
              <div class="card-header"><h4>Staff Login</h4></div>

              <div class="card-body">
                <form method="POST" autocomplete="off" id="StaffLoginForm" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                     
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                     <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <button id="BtnStaff" type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>

              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Easy Go Initiative <?php echo date("Y") ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>
<script>
  $(document).ready(function (argument) {
        $('#messagebox').attr("style", "display:none");
       $('#StaffLoginForm').on('submit',function(event){
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
                    url: "/UserLogin",
                    method: "POST",
                    dataType : 'json',
                    data: form_data,
                    success:function(response)
                    {
                        $('#StaffLoginForm')[0].reset();
                      console.log(response);
    
                        if(response.status == 200)
                        {
                          $('#messagebox').removeClass('alert alert-warning'); 
                            $('#messagebox').addClass('alert alert-success'); 
                            $('#messagebox').attr("style", "display:block");
                            $('#message').text(response.message);
                            location.href = 'Dashboard'; 
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