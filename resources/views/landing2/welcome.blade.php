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
    <header class="main-header header-style-three" style="background-color:#14194a !important;">
    	<!--Header-Upper-->
        <div class="header-upper">
        	<div class="outer-container">
            	<div class="clearfix">
                	<div class="pull-left logo-box">
                    	<div class="logo"><a href="index-2.html"><img src="{{asset('/assets/landing2/images/edii_white.png')}}" alt="" title=""width="150"></a></div>
                    </div>
                    <div class="pull-right logo-box" style="float:right !important;">
                    	<div class="logo"><a href="index-2.html"><img src="{{asset('/assets/landing2/images/logo-invent2-white.png')}}" alt="" title=""width="200"></a></div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Header Upper-->
    </header>
    <!--End Main Header -->

    <!--Form Back Drop-->
    <div class="form-back-drop"></div>

    <!-- Bnner Section -->
    <section class="banner-section-three" style="background-image:url(https://www.trade2gov.com/coffee-morning/assets/landing/images/main-slider/7.jpg);">
        <div class="auto-container clearfix">
            <div class="content-box" style="width:100%; max-width:100% !important; text-align:center;">
                <div class="text" style="margin-bottom:50px; margin-top:-100px; font-size:4em">Welcome To </div>
                <div class="text" style="margin-bottom:95px; font-size:4em">Coffee Morning IT Inventory Invent2 2019</div><br><br><br>
                <h2 id="name">Your Name</h2>
                {{-- <h3 style="color:#fff;">jakrhifa@gmail.com</h3> --}}
                <h2 id="company">Your Company</h2>
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
        <div class="auto-container">
            <div class="sec-title text-center light" style="margin-bottom:0px; margin-top:109px;">
                <h2>#CoffeeMorningInvent2</h2>
                <br>
            </div>

            <!-- Copyright -->
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

    var channel = pusher.subscribe('cmofficer');
      
    channel.bind('App\\Events\\coffeeMorningOfficer', function(data) {
        // swal("Congratulation", 'Selamat datang Mr./Ms. ' + data['cmname'] + ' ('+ data['cmemail'] +')', "success");
        // swal(data['cmmsgtitle'], data['cmmsg'], data['cmmsgicon']);
        // setTimeout( 
        //         function() {
        //             window.location.reload(true);
        //         }, 1500);

        document.getElementById("name").innerHTML = data['cmname'];
        document.getElementById("company").innerHTML = data['cmcompany'];

    });

</script>
</body>
</html>
