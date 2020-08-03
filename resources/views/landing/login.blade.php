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

    <!--Login Section-->
    <section class="login-section" style="padding:100px 0px !important;">
        <div class="auto-container">
            <div class="login-form">
                <div class="row clearfix">
                    <div class="form-column col-lg-6 col-md-12 col-sm-12">                    
                        <div class="inner-column">
                            <div class="title-box">
                                <h3>EDM - Login Page</h3>
                                <div class="text">Welcome Back, Please login to your account</div>
                            </div>

                            <!--Login Form-->
                            <form method="post" action="{{ route('login') }}">
                               @csrf
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-group check-box">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>&nbsp; 
                                    <label for="account-option-1">Remember Password</label>
                                </div>

                                <div class="form-group btn-box">
                                    <button class="theme-btn btn-style-three" type="submit" name="submit-form">Sign In</button>
                                </div>
                            </form> 
                        </div>
                    </div>

                    <div class="image-column col-lg-6 col-sm-12 col-sm-12">
                        <div class="image-box wow fadeIn">
                            <figure class="image"><img src="{{asset('/assets/landing/images/resource/login.jpg')}}" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
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