<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>PT.EDI INDONESIA | EVENT ORGANIZER MANAGE</title>
<!-- Stylesheets -->
<link href="{{asset('/assets/landing/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('/assets/landing/css/style.css')}}" rel="stylesheet">
<link href="{{asset('/assets/landing/css/responsive.css')}}" rel="stylesheet">

<link rel="shortcut icon" href="{{asset('/assets/landing/images/favicon.png')}}" type="image/x-icon">
<link rel="icon" href="{{asset('/assets/landing/images/favicon.png')}}" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="../assets/landing/js/respond.js"></script><![endif]-->
</head>

<body>

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>

     <!-- Coming Soon -->
    <section class="coming-soon" style="padding:100px 0px 50px !important;">
        <div class="anim-icons">
            <span class="icon icon-circle-11 wow zoomIn"></span>
            <!-- <span class="icon icon-twist-line-1 wow zoomIn" data-wow-delay="400ms"></span> -->
            <span class="icon icon-circle-3 wow zoomIn" data-wow-delay="800ms"></span>
            <span class="icon icon-cross-1 wow zoomIn" data-wow-delay="1200ms"></span>
            <span class="icon icon-circle-12 wow zoomIn" data-wow-delay="1600ms"></span>
            <span class="icon icon-circle-2 wow zoomIn" data-wow-delay="1800ms"></span>
            <span class="icon icon-twist-line-2 wow zoomIn" data-wow-delay="2200ms"></span>
        </div>
        <div class="auto-container">
            <div class="content">
               <!--Login Section-->
                <div class="login-section" style="padding:0px 0px 25px !important;">
                    <div class="auto-container">
                        <div class="login-form">
                            <div class="row clearfix">
                                <div class="form-column col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto p-4">                    
                                    <div class="inner-column" style="padding: 62px 0px 62px !important;">
                                        <div class="title-box">
                                            <h3>We're sorry to see you go!</h3>
                                            <div class="text" style="font-size: 16px; margin-bottom: 25px;">Before you go, did you know you can... Take a temporary break?</div>
                                        </div>

                                        <!--Login Form-->
                                        <form method="post" action="{{ route('login') }}">
                                           @csrf
                                            <div class="form-group text-left">
                                                 <input type="radio" class="form-check-input" name="optradio">I no longer wish to receive these email
                                            </div>
                                            
                                            <div class="form-group text-left">
                                                 <input type="radio" class="form-check-input" name="optradio">Stop sending emails for:
                                            </div>
                                            <div class="form-group text-left">
                                                <select class="form-control" id="sel1">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>
                                            </div>
                                            <div class="form-group text-left">
                                                 <input type="radio" class="form-check-input" name="optradio">I unsubscribed by accident! Please add me back to this list
                                            </div>

                                            <div class="form-group btn-box" style="margin-top: 40px;">
                                                <button class="theme-btn btn-style-three" type="submit" name="submit-form">Confirm</button>
                                            </div>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social-links">
                    <ul class="social-icon-two">
                        <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                        <li><a href="#"><span class="fab fa-behance"></span></a></li>
                        <li><a href="#"><span class="fab fa-dribbble"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Coming Soon -->
    
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
<script src="{{asset('/assets/landing/js/owl.js')}}"></script>
<script src="{{asset('/assets/landing/js/wow.js')}}"></script>
<script src="{{asset('/assets/landing/js/countdown.js')}}"></script>
<script src="{{asset('/assets/landing/js/script.js')}}"></script>
</body>

</html>