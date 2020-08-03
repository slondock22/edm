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

{{-- <style>
.navbar{
    display: none !important;
}
</style> --}}

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
                    	<div class="logo"><a href="index-2.html"><img src="http://edi-indonesia.co.id/wp-content/uploads/2018/10/logo_transparant.png" alt="" title=""width="225"></a></div>
                    </div>
                    <div class="pull-right logo-box" style="float:right !important; margin-right: -15px !important;">
                    	<div class="logo"><a href="index-2.html"><img src="http://www.trade2gov.com/assets/front/img/brand/t2g-logo-brand.png" alt="" title=""width="270" style="margin-top:29px;"></a></div>
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
    <section class="banner-section-three">
        <div class="auto-container clearfix">
            <div class="content-box" style="width:100%; max-width:100% !important; text-align:center;">
                <div class="text" style="margin-bottom:55px; margin-top:-252px; font-size:5em; color:#12114a !important;">Doorprize </div>
                <iframe id="wheels" width="100%" height="800"></iframe>
            </div>
        </div>
    </section>
    <!-- End Bnner Section -->


    <!-- Main Footer -->
    {{-- <div class="main-footer">    
        <div class="anim-icons">
            <span class="icon icon-twist-line-1 wow zoomIn"></span>
            <span class="icon icon-circle-6 wow zoomIn" data-wow-delay="400ms"></span>
            <span class="icon icon-twist-line-2 wow zoomIn" data-wow-delay="800ms"></span>
            <span class="icon icon-circle-8 wow zoomIn" data-wow-delay="1200ms"></span>
        </div>
        <div class="auto-container">
            <div class="sec-title text-center light" style="margin-bottom:0px; margin-top:109px;">
                <h2>#CoffeeMorningTrade2Gov2019</h2>
                <br>
            </div>

            <!-- Copyright -->
            <div class="copyright">Copyright &copy; 2019. PT Electronic Data Interchange Indonesia</div>
        </div>
    </div> --}}
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

<script>
        $(document).ready(function () {
            // $("#wheels").attr("src", "https://wheelofnames.com");
            // $('#wheels').contents().find('.navbar').hide();

            $('#wheels').load(function() { 
                // $('#wheels').contents().find('.navbar').hide();
            }).attr('src','https://wheelofnames.com/');
        });
        
</script>
</body>
</html>