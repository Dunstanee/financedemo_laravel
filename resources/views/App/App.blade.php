
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<link rel="icon" href="{{url('assets/safina_logo.png')}}" type="image/icon type">
	<title>Finance System</title>

	<!-- General CSS Files -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- <link rel="stylesheet" href="assets/modal_style.css"> -->
  <link rel="stylesheet" href="{{url('assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/modules/fontawesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/modules/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
   <script src="{{url('assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <link rel="stylesheet" href="{{url('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/modules/select2/dist/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/modules/jquery-selectric/selectric.css')}}">
 <link rel="stylesheet" href="{{url('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{url('assets/modules/jqvmap/dist/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/modules/weather-icon/css/weather-icons.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/modules/weather-icon/css/weather-icons-wind.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/modules/summernote/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{url('assets/modules/ionicons/css/ionicons.min.css')}}">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{url('assets/modules/prism/prism.css')}}">
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{url('assets/css/components.css')}}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script src="{{url('jquery.min.js')}}"></script>
 
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Electrolize&display=swap');
</style>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</head>
<body>

    <!--*******************
        Preloader end
    ********************-->
  <!--    <div class="preloader">
    <div class="wrapper1">
      <img style="background-color:#3498DB; border-radius: 10px;" src="./svg-loaders/ball-triangle.svg" width="50" alt="">
    </div>
  </div> -->
        <!--*******************
        Preloader start
    ********************-->
    <audio id="myAudio">
  <source src="assets/img/call.mp3" type="audio/ogg">
  <source src="assets/img/call.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
<!-- The Modal -->
<div id="AttemptMessage" class="modal">

  <!-- Modal content -->
  {{-- <div class="modal-content">
    <div class="text-center">
        <img src="assets/img/autherize.png" width="100" alt="">
    </div>
    <h1 class="text-danger text-bold text-center">Warning!!!</h1>
    <p>Their has been a security brigde attempt to Login into the system.</p>
    <div class="text-right">
        <button type="button" id="VeiwData" class="btn btn-danger ViewDataSecurity"> View Data --></button>
        
    </div>
  </div> --}}

</div>
@if (session('operation'))
    <span id="2" class="status"></span>
@else
<span id="1" class="status"></span>  
@endif

<div id="app">
   
    <div class="main-wrapper main-wrapper-1">
		<!-- Topbar	 -->
        @include('App.topbar')
        @include('App.sidebar')
<div class="main-content ">

	<section class="section">
        <div class="section-header">
            <h1>{{ $name}}</h1>
        </div>
        
            @yield('content')
       
    </section>
</div>
 	<footer class="bg-primary text-light main-footer">
        <div class="footer-left">
          Copyright &copy; 2021 <div class="bullet"></div> Reserved for <a href="" class="text-light"> SwapZone Limited</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
 	</div>
 </div>
 <!-- <script src="App/custom.min.js"></script> -->

  <!-- General JS Scripts -->
  <script src="{{ url('assets/modules/jquery.min.js')}}"></script>
  <script src="{{ url('assets/modules/popper.js')}}"></script>
  <script src="{{ url('assets/modules/tooltip.js')}}"></script>
  <script src="{{ url('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{ url('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{ url('assets/modules/moment.min.js')}}"></script>
  <script src="{{ url('assets/js/stisla.js')}}"></script>
  
  <!-- JS Libraies -->
  <script src="{{ url('assets/modules/simple-weather/jquery.simpleWeather.min.js')}}"></script>
  <script src="{{ url('assets/modules/chart.min.js')}}"></script>
  <script src="{{ url('assets/modules/jqvmap/dist/jquery.vmap.min.js')}}"></script>
  <script src="{{ url('assets/modules/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
  <script src="{{ url('assets/modules/summernote/summernote-bs4.js')}}"></script>
  <script src="{{ url('assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
   <!-- JS Libraies -->
  <script src="{{ url('assets/modules/datatables/datatables.min.js')}}"></script>
  <script src="{{ url('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{ url('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
  <script src="{{ url('assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>
  <script src="{{ url('assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
  <script src="{{ url('assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ url('assets/js/page/modules-datatables.js')}}"></script>
  <script src="{{ url('assets/js/page/forms-advanced-forms.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ url('assets/js/page/index-0.js')}}"></script>
  <script src="{{ url('assets/js/page/modules-ion-icons.js')}}"></script>
  <!-- JS Libraies -->
  <script src="{{ url('assets/modules/sweetalert/sweetalert.min.js')}}"></script>
  <script src="{{ url('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
  <script src="{{ url('assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <script src="{{ url('assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
  <script src="{{ url('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
  <script src="{{ url('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
  <script src="{{ url('assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
  <script src="{{ url('assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ url('assets/js/page/modules-sweetalert.js')}}"></script>
    <!-- JS Libraies -->
  <script src="{{ url('assets/modules/prism/prism.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ url('assets/js/page/bootstrap-modal.js')}}"></script>
  
  <!-- Template JS File -->
  <script src="{{ url('assets/js/scripts.js')}}"></script>
  <script src="{{ url('assets/js/custom.js')}}"></script>
   <!-- JS Libraies -->
   @yield('scripts')
<script>
   function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
    
    }

    showTime();
</script>
<script>
 $(window).on('load', function () {
        setTimeout(function () {
            $(".preloader").fadeOut('slow');
            var body = document.getElementById('app');
        body.style.visibility="visible";
        }, 1000)
        
    });   

// window.onload = function() {
//     setTimeout(function () {
//             $(".preloader").fadeOut('slow');
//         }, 3000)
//   var body = document.getElementById('app');
//   body.style.visibility="visible";
// };

 



    

$(document).ready(function (argument) {
// var x = document.getElementById("myAudio"); 

// function playAudio() { 
//   x.play(); 
// } 
// var  played = false;


      setInterval(GetAttempt, 5000);

      function GetAttempt() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: "/Checkstatus",
                method: "POST",
                dataType : 'json',
                success:function(response)
                {
                  if (response == 1) {
                    location.href = '/Signout';
                  }
                }
            });

      }


});

</script>



</body>
</html>