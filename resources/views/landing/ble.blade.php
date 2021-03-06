<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>PT.EDI INDONESIA | CUSTOMER GATHERING EVENT</title>
<!-- Stylesheets -->
<link href="{{asset('/assets/landing/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('/assets/landing/css/style.css')}}" rel="stylesheet">
<link href="{{asset('/assets/landing/css/responsive.css')}}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="shortcut icon" href="{{asset('/assets/landing/images/favicon.png')}}" type="image/x-icon">
<link rel="icon" href="{{asset('/assets/landing/images/favicon.png')}}" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<!--[if lt IE 9]><script src=https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js></script><![endif]-->
<!--[if lt IE 9]><script src="{{asset('/assets/landing/js/respond.js')}}"></script><![endif]-->
</head>

<body>

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    <!-- Main Header-->
    <header class="main-header header-style-three">
    	<!--Header-Upper-->
        <div class="header-upper">
        	<div class="outer-container">
            	<div class="clearfix">
                	<div class="pull-left logo-box">
                    	<div class="logo"><a href="index-2.html"><img src="{{asset('/assets/landing/images/edii_white.png')}}" alt="" title=""width="150"></a></div>
                    </div>
                    {{-- <div class="pull-right logo-box" style="float:right !important;">
                    	<div class="logo"><a href="index-2.html"><img src="https://uziuy.stripocdn.email/content/guids/videoImgGuid/images/92011555002083963.png" alt="" title=""width="200" style="margin-top:17px;"></a></div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!--End Header Upper-->
    </header>
    <!--End Main Header -->

    <!--Form Back Drop-->
    <div class="form-back-drop"></div>

    <!-- Bnner Section -->
    <section class="banner-section-three" style="background-image:url(https://www.trade2gov.com/coffee-morning/assets/landing/images/main-slider/1.jpg);">
        <div class="auto-container clearfix">
            <div class="content-box" style="width:100%; max-width:100% !important; text-align:center;">
             
                <h2 id="device"> No Device Found </h2>
                <h2 id="uuid" style="display:none;">Your UUID</h2>
                <h2 id="name" style="display:none;"> Your Name</h2>
                {{-- <h3 style="color:#fff;">jakrhifa@gmail.com</h3> --}}
                {{-- <div class="text">Congratulation! You are the winner of doorprize.</div>
                <div class="btn-box" style="margin-bottom:30px;"><a href="#about_page" class="theme-btn btn-style-one">Go!</a></div> --}}
            </div>
        </div>
    </section>
    <!-- End Bnner Section -->

    <!-- Main Footer -->
    <div class="main-footer">    
        <div class="anim-icons">
            <span class="icon icon-twist-line-1 wow zoomIn"></span>
            <span class="icon icon-circle-6 wow zoomIn" data-wow-delay="400ms"></span>
            <span class="icon icon-twist-line-2 wow zoomIn" data-wow-delay="800ms"></span>
            <span class="icon icon-circle-8 wow zoomIn" data-wow-delay="1200ms"></span>
        </div>

    <br><br><br><br>
        <div class="auto-container">
            <!-- Copyright -->
            <br><br>
            <div class="copyright">Copyright &copy; 2019. PT Electronic Data Interchange Indonesia</div>
        </div>
    </div>
    <!-- End Footer -->
    

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>
<script data-cfasync="false" src="{{asset('/assets/landing/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script><script src="{{asset('/assets/landing/js/jquery.js')}}"></script>
<script src="{{asset('/assets/landing/js/popper.min.js')}}"></script>
<script src="{{asset('/assets/landing/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/landing/js/jquery-ui.js')}}"></script>
<script src="{{asset('/assets/landing/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('/assets/landing/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('/assets/landing/js/appear.js')}}"></script>
<script src="{{asset('/assets/landing/js/magnific-popup.min.js')}}"></script>
<script src="{{asset('/assets/landing/js/owl.js')}}"></script>
<script src="{{asset('/assets/landing/js/wow.js')}}"></script>
<script src="{{asset('/assets/landing/js/countdown.js')}}"></script>
<script src="{{asset('/assets/landing/js/script.js')}}"></script>
<!-- Sweet Alert -->
<script src="{{asset('/assets/admin/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
<!--Google Map APi Key-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBotRxv9z5zCBPzi5wsrE9MtazzgqJ2XxU"></script>
<script src="{{asset('/assets/landing/js/map-script.js')}}"></script>
<!--End Google Map APi-->
<script src="//js.pusher.com/3.1/pusher.min.js"></script>

<script>
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

    var notificationsCount = 0;

    var pusher = new Pusher('8efdf5378ac56a2f15e2', {
        encrypted: true,
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('bleuidreceiver');
      
    channel.bind('App\\Events\\ble', function(data) {
        // alert(data['bleuid']);
        // swal("Congratulation", 'Selamat datang Mr./Ms. ' + data['cmname'] + ' ('+ data['cmemail'] +')', "success");
        // swal(data['cmmsgtitle'], data['cmmsg'], data['cmmsgicon']);
        // setTimeout( 
        //         function() {
        //             window.location.reload(true);
        //         }, 1500);

        document.getElementById("device").innerHTML = "Device Found";
        document.getElementById("uuid").innerHTML = data['bleuid'];
        document.getElementById('uuid').style.display = 'block';

        // document.getElementById("major").innerHTML = data['major'];
        // document.getElementById("minor").innerHTML = data['minor'];


        if(data['bleuid'] == "ae8b6fd0-a0dc-47af-ae89-23a61eb60891"){
            document.getElementById("name").innerHTML = "Tiara Pitaloka";
            document.getElementById('name').style.display = 'block';

        }
            // else{
            //     document.getElementById("name").innerHTML = "Undefined Name";      
            //     document.getElementById('name').style.display = 'block';
            // }

    });

</script>
</body>
</html>
