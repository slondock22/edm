<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>PT.EDI INDONESIA | CUSTOMER GATHERING EVENT</title>
<!-- Stylesheets -->
<link href="{{asset('/assets/landing2/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('/assets/landing2/css/style.css')}}" rel="stylesheet">
<link href="{{asset('/assets/landing2/css/responsive.css')}}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">


<link rel="shortcut icon" href="{{asset('/assets/landing/images/favicon.png')}}" type="image/x-icon">
<link rel="icon" href="{{asset('/assets/landing/images/favicon.png')}}" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
<style>
.welcome-section{

    background: linear-gradient(45deg, rgba(225,19,123,1) 0%,rgba(255,138,1,1) 100%);
    background-size: cover;
    padding-left: 0;
    padding-top: 12%;
    padding-bottom: 20%;
   
}

</style>

</head>

<body>

<div class="page-wrapper">
 	
 	
    <!-- Main Header-->
    <header class="main-header header-style-seven">
        <div class="auto-container clearfix">
            <div class="logo-box">
                <a href="contact.html"><img src="{{asset('/assets/landing2/images/edii_white.png')}}" alt="" title=""  style="max-width:160px; margin-top:30px""></a>
            </div>
            <div class="outer-box">
                <div class="logo"><a href="index.html"><img src="{{asset('/assets/landing2')}}/images/logo-invent2-white.png" alt="" title="" style="max-width:180px; margin-top:30px"></a></div>

            </div>
        </div>
    </header>
    <!--End Main Header -->


    <!-- Register Section -->
    <section class="welcome-section" id="register">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sec-title light text-center">
                        <samp class="title" style="font-size:30pt">Welcome To</samp>
                            <h2>Coffee Morning IT Inventory Invent2 2019</h2>
                    </div>
                </div>
            </div><br><br>
            <div class="row">
                <div class="col-md-12">
                    <h1 id="name" style="color:white; font-weight:700; text-align:center; font-size:50pt;">Your Name</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1 id="company" style="color:white; font-weight:700;  text-align:center; font-size:50pt;">Your Company</h1>
                </div>
            </div>
           
        </div>
    </section>
    <!--End Register Section -->



</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>

<script src="{{asset('/assets/landing2')}}/js/jquery.js"></script>
<script src="{{asset('/assets/landing2')}}/js/popper.min.js"></script>
<script src="{{asset('/assets/landing2')}}/js/bootstrap.min.js"></script>
{{-- <script src="{{asset('/assets/landing2')}}/js/jquery-ui.js"></script> --}}
<script src="{{asset('/assets/landing2')}}/js/jquery.countdown.js"></script>
<script src="{{asset('/assets/landing2')}}/js/jquery.fancybox.js"></script>
<script src="{{asset('/assets/landing2')}}/js/appear.js"></script>
<script src="{{asset('/assets/landing2')}}/js/parallax.min.js"></script>
<script src="{{asset('/assets/landing2')}}/js/swiper.min.js"></script>
<script src="{{asset('/assets/landing2')}}/js/owl.js"></script>
<script src="{{asset('/assets/landing2')}}/js/wow.js"></script>
<script src="{{asset('/assets/landing2')}}/js/script.js"></script>
<script src="{{asset('/assets/admin/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

<!--Google Map APi Key-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBotRxv9z5zCBPzi5wsrE9MtazzgqJ2XxU"></script>
<script src="{{asset('/assets/landing2')}}/js/map-script.js"></script>
<script src="//js.pusher.com/3.1/pusher.min.js"></script>

<!--End Google Map APi-->

<script type="text/javascript">

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