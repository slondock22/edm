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

</head>

<body>

<div class="page-wrapper">
 	
    {{-- <!-- Preloader -->
    <div class="preloader"></div> --}}
 	
    <!-- Main Header-->
    <header class="main-header header-style-two">
        <div class="main-box">
        	<div class="auto-container clearfix">
            	<div class="logo-box">
                	<div class="logo"><a href="index.html"><img src="{{asset('/assets/landing2')}}/images/invent2.png" alt="" title="" style="max-width:110px"></a></div>
                </div>
               	
                   	<!--Nav Box-->
                <div class="nav-outer clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler"><span class="icon flaticon-menu-1"></span></div>
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="navbar-header">
                            <!-- Togg le Button -->      
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon flaticon-menu-button"></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li><a href="#">Home</a></li>
                                <li><a href="#about">About</a></li>
                                <li><a href="#rundown">Rundown</a></li>
                                <li><a href="#location">Location</a></li>
                                <li><a href="{{url('/policy')}}">Privacy & Policy</a></li>


                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->

                </div>

                <!-- Outer box -->
                <div class="outer-box">
                        <a href="contact.html"><img src="{{asset('/assets/landing2/images/edii_white.png')}}" alt="" title=""width="100"></a>
                </div>
            </div>
        </div>

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-cancel-1"></span></div>
            
            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            <nav class="menu-box">
                <div class="nav-logo"><a href="#"><img src="{{asset('/assets/landing2')}}/images/invent2.png" alt="" title="" style="max-width:100px"></a></div>
                
                <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
            </nav>
        </div><!-- End Mobile Menu -->
    </header>
    <!--End Main Header -->

    <!-- Banner Conference -->
    <section class="banner-conference">
        
        <!-- Shape Layers -->
        <div class="shape-layers">
            <div class="shape-1" style="background-image: url(/assets/landing2/images/main-slider/shape-1.png);"></div>
            <div class="shape-2" style="background-image: url(/assets/landing2/images/main-slider/shape-2.png);"></div>
        </div>

        <!-- Parallax Icons -->
        <div class="parallax-scene parallax-scene-1 anim-icons">
            <span data-depth="0.20" class="parallax-layer icon icon-dots-2"></span>
            <span data-depth="0.80" class="parallax-layer icon icon-speaker-3"></span>
            <span data-depth="0.30" class="parallax-layer icon twist-line-4"></span>
            <span data-depth="0.40" class="parallax-layer icon icon-square"></span>
            <span data-depth="0.20" class="parallax-layer icon icon-circle-3"></span>
            <span data-depth="0.40" class="parallax-layer icon icon-cross"></span>
        </div>

        <div class="auto-container">
            <div class="row">
                <!-- Contant Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <span class="title">Customer Gathering</span>
                        <h2>Kantor Regional<br>Jawa Tengah &amp; DIY 2020</h2>
                        <ul class="conference-info clearfix">
                            <li><span class="icon icon_clock_alt"></span> September 24th, 2019</li>
                            <li><span class="icon icon_pin_alt"></span> Holiday Inn Kemayoran, Jakarta - Indonesia</li>
                        </ul>
                        @if($exist!="")
                        <div class="btn-box">
                            @if($exist == 'unregistered')
                            <a href="#register" class="theme-btn btn-style-three">Register Now</a>
                            @elseif($attendance->sharing_status == 0)
                            <a href="#register" class="theme-btn btn-style-three">Share Invitation</a>
                            <div>*You are registered in this event, please check email for tickets!</div>
                            @elseif($attendance->sharing_status == 1)
                            <div>*You are registered in this event, please check email for tickets!</div>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="image-box wow fadeInRight" data-wow-delay="400ms">
                        <figure class="image"><img src="{{asset('/assets/landing2')}}/images/main-slider/content-img-1.png" alt="" style="margin-top:40px"></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Banner Section -->

    {{-- <!-- Countdown Section Two -->
    <section class="countdown-section-two" style="background-image: url(assets/landing2/images/background/1.jpg);">
        <div class="auto-container">
            <div class="sec-title light text-center style-two">
                <span class="title">Who Are Speaking</span>
                <h2>Book Your Ticket</h2>
            </div>

            <div class="time-counter"><div class="time-countdown clearfix" data-countdown="2019/10/19"></div></div>
        </div>
    </section> --}}

    <!-- About Section Two -->
    <section class="about-section-two" id="about">
        <div class="anim-icons">
            <span class="icon icon-shape-3"></span>
        </div>

        <div class="auto-container">
            <div class="row">
                <!-- Content Column -->
                <div class="content-column col-lg-7 col-md-12 col-sm-12 order-2">
                    <div class="inner-column">
                        <div class="sec-title style-two">
                            <span class="title">WHY ATTEND</span>
                            <h2>About The Event</h2>
                        </div>

                        <div class="row">

                            <!-- Feature Block -->
                            <div class="feature-block-two col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                                <div class="inner-box">
                                    <div class="icon-box"><span class="icon flaticon-partnership"></span></div>
                                    <h4><a href="about-event.html">Casual Talk Show</a></h4>
                                    <div class="text"> this event containts casual talk show to get know how bonded zones and similar companies can easily make an inventory report according to the latest customs regulations with a more sophisticated system.</div>
                                </div>
                            </div>

                            <!-- Feature Block -->
                            <div class="feature-block-two col-lg-6 col-md-6 col-sm-12 wow fadeInRight" data-wow-delay="400ms">
                                <div class="inner-box">
                                    <div class="icon-box"><span class="icon flaticon-karaoke"></span></div>
                                    <h4><a href="about-event.html">Great Speakers</a></h4>
                                    <div class="text">Customs will also be present as a speaker. You can do questions and answers as much as you want related to the current regulations.</div>
                                </div>
                            </div>

                            <!-- Feature Block -->
                            <div class="feature-block-two col-lg-6 col-md-6 col-sm-12 wow fadeInRight" data-wow-delay="400ms">
                                <div class="inner-box">
                                    <div class="icon-box"><span class="icon flaticon-rocket-ship"></span></div>
                                    <h4><a href="about-event.html">Connections</a></h4>
                                    <div class="text"> Get opportunities for cooperation between bonded zone or with other companies in this event!</div>
                                </div>
                            </div>

                            <!-- Feature Block -->
                            <div class="feature-block-two col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                                <div class="inner-box">
                                    <div class="icon-box"><span class="icon flaticon-money-bag"></span></div>
                                    <h4><a href="about-event.html">Doorprize</a></h4>
                                    <div class="text">Get lots of attractive prizes and one grand prize for lucky participants, don't miss it!!</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Video Column -->
                <div class="video-column col-lg-5 col-md-12 col-sm-12">
                    <div class="wow fadeInLeft" style="margin-top:130px;">
                        <figure class="image"><img src="{{asset('/assets/landing2/images/resource/coffee.png')}}" alt="" style="margin-top:130px;"></figure>
                        {{-- <a href="https://www.youtube.com/watch?v=-V2PpQnRFzA" class="btn-box" data-fancybox="gallery" data-caption=""><span class="icon flaticon-play-button"></span></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End About Section -->

    <!-- Fun Fact Section -->
    {{-- <section class="fun-fact-section">
        <div class="shape-layers">
            <span class="shape-layer-2"></span>
            <span class="shape-layer-1"></span>
        </div>
        <div class="auto-container">
            <div class="fact-counter">
                <div class="row clearfix">

                    <!--Column-->
                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                        <div class="count-box"><span class="count-text" data-speed="3000" data-stop="46">0</span>+</div>
                        <h4 class="counter-title">Our Visionary<br> Speakers</h4>
                    </div>

                    <!--Column-->
                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                        <div class="count-box"><span class="count-text" data-speed="3000" data-stop="29">0</span></div>
                        <h4 class="counter-title">International<br> Sponsors</h4>
                    </div>

                    <!--Column-->
                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                        <div class="count-box"><span class="count-text" data-speed="3000" data-stop="35">0</span>+</div>
                        <h4 class="counter-title">Workshops<br> We offer</h4>
                    </div>

                    <!--Column-->
                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="1200ms">
                        <div class="count-box"><span class="count-text" data-speed="3000" data-stop="706">0</span>+</div>
                        <h4 class="counter-title">Event <br>Participants</h4>
                    </div>Invent2
                </div>
            </div>
        </div>
    </section> --}}
    <!--End Fun Fact Section -->

    <!-- Schedule Section -->
    <section class="schedule-section style-two" id="rundown">
        <div class="anim-icons">
            <span class="icon icon-shape-2 wow zoomIn" data-wow-delay="600ms"></span>
        </div>
        <div class="auto-container">
            <div class="sec-title text-center style-two">
                <span class="title">Event Details</span>
                <h2>Rundown</h2>
            </div>

            <div class="schedule-tabs tabs-box">
                <div class="tabs-content">
                    <!--Tab-->
                    <div class="tab active-tab" id="tab-1">

                        <!-- Schedule Timeline -->
                        <div class="schedule-timeline">
                            <div class="inner-box">
                                <div class="icon-box"><span class="icon icon_ribbon_alt"></span></div>
                                <div class="time">09:00 AM TO 09:30 AM</div>
                                <h4>Registration and Coffee Break</h4>
                            </div>
                        </div>

                         <!-- Schedule Timeline -->
                        <div class="schedule-timeline">
                            <div class="inner-box">
                                <div class="icon-box"><span class="icon icon_clock_alt"></span></div>
                                <div class="time">09:30 AM TO 11:00 AM</div>
                                <h4>Talkshow (Speaker from Customs Facilities Directorate)</h4>
                            </div>
                        </div>

                        <!-- Schedule Timeline -->
                        <div class="schedule-timeline">
                            <div class="inner-box">
                                <div class="icon-box"><span class="icon icon_ribbon_alt"></span></div>
                                <div class="time">11:00 AM TO 11:30 AM</div>
                                <h4>Doorprize</h4>
                            </div>
                        </div>

                        <!-- Schedule Timeline -->
                        <div class="schedule-timeline">
                            <div class="inner-box">
                                <div class="icon-box"><span class="icon icon_clock_alt"></span></div>
                                <div class="time">11:30 AM TO 12:30 PM</div>
                                <h4>Closing and Lunch</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End schedule Section -->

    <!-- Speakers Section Two-->
    {{-- <section class="speakers-section-two">
        <div class="anim-icons">
            <span class="icon icon-shape wow zoomIn"></span>
        </div>
        <div class="auto-container">
            <div class="sec-title text-center style-two">
                <span class="title">Who Are Speaking</span>
                <h2>Who's Speaking?</h2>
            </div>

            <div class="row">
                <!-- Speaker Block -->
                <div class="speaker-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="image-box">
                        <figure class="image"><img src="{{asset('/assets/landing2')}}/images/resource/speaker-2-1.jpg" alt=""></figure>
                        <div class="overlay-box">
                            <div class="inner">
                                <div class="info-box">
                                    <h4 class="name"><a href="speakers-detail.html">Nathaneal Down</a></h4>
                                    <span class="designation">Developer Expert</span>
                                </div>
                                <ul class="social-links">
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-vimeo-v"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                    <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="caption-box">
                            <h4 class="name">Nathaneal Down</h4>
                            <span class="designation">Developer Expert</span>
                        </div>
                    </div>
                </div>

                <!-- Speaker Block -->
                <div class="speaker-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                    <div class="image-box">
                        <figure class="image"><img src="{{asset('/assets/landing2')}}/images/resource/speaker-2-2.jpg" alt=""></figure>
                        <div class="overlay-box">
                            <div class="inner">
                                <div class="info-box">
                                    <h4 class="name"><a href="speakers-detail.html">Fergus Douchebag</a></h4>
                                    <span class="designation">Event Manager</span>
                                </div>
                                <ul class="social-links">
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-vimeo-v"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                    <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="caption-box">
                            <h4 class="name">Fergus Douchebag</h4>
                            <span class="designation">Event Manager</span>
                        </div>
                    </div>
                </div>

                <!-- Speaker Block -->
                <div class="speaker-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                    <div class="image-box">
                        <figure class="image"><img src="{{asset('/assets/landing2')}}/images/resource/speaker-2-3.jpg" alt=""></figure>
                        <div class="overlay-box">
                            <div class="inner">
                                <div class="info-box">
                                    <h4 class="name"><a href="speakers-detail.html">Benjamin Evalent</a></h4>
                                    <span class="designation">Lead Designer</span>
                                </div>
                                <ul class="social-links">
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-vimeo-v"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                    <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="caption-box">
                            <h4 class="name">Benjamin Evalent</h4>
                            <span class="designation">Lead Designer</span>
                        </div>
                    </div>
                </div>

                <!-- Speaker Block -->
                <div class="speaker-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="image-box">
                        <figure class="image"><img src="{{asset('/assets/landing2')}}/images/resource/speaker-2-4.jpg" alt=""></figure>
                        <div class="overlay-box">
                            <div class="inner">
                                <div class="info-box">
                                    <h4 class="name"><a href="speakers-detail.html">Bailey Wonger</a></h4>
                                    <span class="designation">Marketar</span>
                                </div>
                                <ul class="social-links">
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-vimeo-v"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                    <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="caption-box">
                            <h4 class="name">Bailey Wonger</h4>
                            <span class="designation">Marketar</span>
                        </div>
                    </div>
                </div>

                <!-- Speaker Block -->
                <div class="speaker-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                    <div class="image-box">
                        <figure class="image"><img src="{{asset('/assets/landing2')}}/images/resource/speaker-2-5.jpg" alt=""></figure>
                        <div class="overlay-box">
                            <div class="inner">
                                <div class="info-box">
                                    <h4 class="name"><a href="speakers-detail.html">Gunther Beard</a></h4>
                                    <span class="designation">UI/UX Designer</span>
                                </div>
                                <ul class="social-links">
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-vimeo-v"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                    <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="caption-box">
                            <h4 class="name">Gunther Beard</h4>
                            <span class="designation">UI/UX Designer</span>
                        </div>
                    </div>
                </div>

                <!-- Speaker Block -->
                <div class="speaker-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                    <div class="image-box">
                        <figure class="image"><img src="{{asset('/assets/landing2')}}/images/resource/speaker-2-6.jpg" alt=""></figure>
                        <div class="overlay-box">
                            <div class="inner">
                                <div class="info-box">
                                    <h4 class="name"><a href="speakers-detail.html">Gunther Beard</a></h4>
                                    <span class="designation">UI/UX Designer</span>
                                </div>
                                <ul class="social-links">
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-vimeo-v"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                    <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="caption-box">
                            <h4 class="name">Gunther Beard</h4>
                            <span class="designation">UI/UX Designer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--End Speakers Section Two -->

    <!-- Pricing Section -->
    {{-- <section class="pricing-section-two" style="background-image: url(assets/landing2/images/background/2.jpg);">
        <div class="auto-container">
            <div class="sec-title style-two light text-center">
                <span class="title">Pricing Plans</span>
                <h2>Get your Ticket</h2>
            </div>

            <div class="row">
                <!-- Pricing Block Two -->
                <div class="pricing-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUpwebp">
                    <div class="inner-box">
                        <figure class="image"><img src="{{asset('/assets/landing2')}}/images/icons/day-pass-1.png" alt=""></figure>
                        <div class="price">$142</div>
                        <h4 class="title">Early Bird</h4>
                        <ul class="features">
                            <li>Conference Tickets</li>
                            <li>Free Lunch And Coffee</li>
                            <li>Easy Access</li>
                            <li>Certificate</li>
                            <li>Printed Metarials</li>
                        </ul>
                        <div class="btn-box">
                            <a href="contact.html" class="theme-btn">Buy Ticket</a>
                        </div>
                    </div>
                </div>

                <!-- Pricing Block Two -->
                <div class="pricing-block-two tagged col-lg-4 col-md-6 col-sm-12 wow fadeInDown">
                    <div class="inner-box">
                        <figure class="image"><img src="{{asset('/assets/landing2')}}/images/icons/day-pass-2.png" alt=""></figure>
                        <div class="price">$142</div>
                        <h4 class="title">Early Bird</h4>
                        <ul class="features">
                            <li>Conference Tickets</li>
                            <li>Free Lunch And Coffee</li>
                            <li>Easy Access</li>
                            <li>Certificate</li>
                            <li>Printed Metarials</li>
                        </ul>
                        <div class="btn-box">
                            <a href="contact.html" class="theme-btn">Buy Ticket</a>
                        </div>
                    </div>
                </div>

                <!-- Pricing Block Two -->
                <div class="pricing-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-box">
                        <figure class="image"><img src="{{asset('/assets/landing2')}}/images/icons/day-pass-3.png" alt=""></figure>
                        <div class="price">$142</div>
                        <h4 class="title">Early Bird</h4>
                        <ul class="features">
                            <li>Conference Tickets</li>
                            <li>Free Lunch And Coffee</li>
                            <li>Easy Access</li>
                            <li>Certificate</li>
                            <li>Printed Metarials</li>
                        </ul>
                        <div class="btn-box">
                            <a href="contact.html" class="theme-btn">Buy Ticket</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--End Pricing Section -->

    <!-- Clients Section -->
    {{-- <section class="clients-section-two">
        <div class="auto-container">
            <div class="sec-title text-center style-two">
                <span class="title">Event Sponsors</span>
                <h2>Partners & Sponsors</h2>
            </div>

            <!-- Sponsors Outer -->
            <div class="sponsors-outer wow fadeInUp">
                <div class="title-box"><h3>Platinum Sponsors</h3></div>
                <!--Sponsors -->
                <ul class="sponsors">
                    <li class="slide-item"><figure class="image"><a href="#"><img src="{{asset('/assets/landing2')}}/images/clients/1-1.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image"><a href="#"><img src="{{asset('/assets/landing2')}}/images/clients/1-2.png" alt=""></a></figure></li>
                </ul>
            </div>

            <!-- Sponsors Outer -->
            <div class="sponsors-outer wow fadeInUp">
                <div class="title-box"><h3>Gold Sponsors</h3></div>
                <!--Sponsors Carousel-->
                <ul class="sponsor-carousel owl-carousel owl-theme">
                    <li class="slide-item"><figure class="image"><a href="#"><img src="{{asset('/assets/landing2')}}/images/clients/gold-1.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image"><a href="#"><img src="{{asset('/assets/landing2')}}/images/clients/gold-2.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image"><a href="#"><img src="{{asset('/assets/landing2')}}/images/clients/gold-3.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image"><a href="#"><img src="{{asset('/assets/landing2')}}/images/clients/gold-4.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image"><a href="#"><img src="{{asset('/assets/landing2')}}/images/clients/gold-5.png" alt=""></a></figure></li>
                </ul>
            </div>

            <!-- Sponsors Outer -->
            <div class="sponsors-outer wow fadeInUp">
                <div class="title-box"><h3>Silver Sponsors</h3></div>
                <!--Sponsors-->
                <ul class="sponsors">
                    <li class="slide-item"><figure class="image"><a href="#"><img src="{{asset('/assets/landing2')}}/images/clients/silver-1.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image"><a href="#"><img src="{{asset('/assets/landing2')}}/images/clients/silver-2.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image"><a href="#"><img src="{{asset('/assets/landing2')}}/images/clients/silver-3.png" alt=""></a></figure></li>
                </ul>
            </div>

            <div class="bottom-box">
                <div class="btn-box"><a href="sponsor-detail.html" class="theme-btn btn-style-three">Become a Sponsor</a></div>
                <div class="text">Last Date: April 30, 2019</div>
            </div>
        </div>
    </section> --}}
    <!--End Clients Section -->
    @if($exist!="")
    <!-- Register Section -->
    <section class="register-section" id="register">
        <div class="auto-container">
            <div class="sec-title light text-center">
                <samp class="title">Join The Event</samp>
                @if($exist == 'unregistered')
                    <h2>Register</h2>
                @elseif($attendance->sharing_status == 0)
                    <h2>Share The Invitation</h2>
                @else
                     <h2>Thank You</h2>
                @endif
            </div>

            
            <!--Register Form-->
            @if($exist == 'unregistered')
            <div class="register-form">
                <form id="frmRegister" name="frmRegister" method="post" action="{{route('register')}}">
                    <input type="hidden" name="broadcast_event_id" id="broadcast_event_id" value="17">                        
                    <div class="row">
                        <input type="hidden" name="verif_code" id="verif_code" value="{{isset($attendance->verif_code)?$attendance->verif_code:""}}">                        
                        <div class="form-group col-lg-3 col-md-6 col-sm-12">
                            <input type="text" name="name" id="name" placeholder="Ful name" required="" autocomplete="false" value="{{isset($attendance->name)?$attendance->name:""}}">                           
                        </div>

                        <div class="form-group col-lg-3 col-md-6 col-sm-12">
                            <input type="email" name="email" id=="email" placeholder="Email" required="" autocomplete="false" readonly="" value="{{isset($attendance->email)?$attendance->email:""}}">                        
                        </div>

                        <div class="form-group col-lg-3 col-md-6 col-sm-12">
                            <input type="text" name="phone" id="phone" placeholder="Phone" required="" autocomplete="false" value="{{isset($attendance->phone)?$attendance->phone:""}}">                            
                        </div>

                        <div class="form-group col-lg-3 col-md-6 col-sm-12">
                            <input type="text" name="company" id="company" placeholder="Company" required="" autocomplete="false" value="{{isset($attendance->company)?$attendance->company:""}}">                            
                        </div>

                        <div class="form-group col-lg-12 text-center">
                            <button type="button" class="theme-btn btn-style-two" id="btn-save" name="submit-form" onclick="save_form(($(this).closest('form').attr('id')),(this.id))" style="cursor:pointer;"><span class="btn-title">Submit</span></button>
                        </div>
                    </div>
                </form>
            </div>
            @else
                @if($attendance->sharing_status)
                <div class="text-center">
                    <h2 style="color:white"> You are registered in this event, check your email for tickets!</h2>
                </div>
                @else
                <div class="register-form">
                    <form id="frmSharing" name="frmSharing" method="post" action="{{route('share')}}">       
                        <input type="hidden" name="verif_code" id="verif_code" value="{{isset($attendance->verif_code)?$attendance->verif_code:""}}">  
                        <input type="hidden" name="registration_type" id="registration_type" value="sharing">   
                        <input type="hidden" name="broadcast_event_id" id="broadcast_event_id" value="17">                        

                            <div class="form-group">
                                <input type="email" name="email" id=="email" required="" autocomplete="false" placeholder="Please input the recepient email">
                            </div>                        
                            <div class="form-group text-center">
                                <button class="theme-btn btn-style-two" id="btn-save" type="button" name="submit-form" onclick="save_form(($(this).closest('form').attr('id')),(this.id))" style="cursor:pointer;"><span class="btn-title">Submit</span></button>
                            </div>
                        </form>
                </div>
                @endif
            @endif
        </div>
    </section>
    <!--End Register Section -->
    @endif
    <!-- Event Info Section -->
    <section class="event-info-section" id="location">
        <div class="auto-container">
            <div class="row">
                <!-- Info Column -->
                <div class="info-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title style-two">
                            <span class="title">Reach us</span>
                            <h2>Event Location</h2>
                        </div>

                        <div class="event-info-tabs tabs-box">
                            <!--Tabs Box-->
                            <ul class="tab-buttons clearfix">
                                <li class="tab-btn active-btn" data-tab="#tab1" id="tab-venue">Venue</li>
                                <li class="tab-btn" data-tab="#tab2" id="tab-maps">Maps</li>
                                <li class="tab-btn" data-tab="#tab3 " id="tab-more">More information</li>
                            </ul>

                            <div class="tabs-content">
                                <!--Tab-->
                                <div class="tab active-tab" id="tab1">
                                    <h4>Holiday Inn Hotels</h4>
                                    <div class="text">
                                        Jl. Griya Utama, Sunter Agung, Jakarta, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14350<br>
                                        Phone: (021) 29568800
                                    </div>
                                </div>

                                <!--Tab-->
                                <div class="tab" id="tab2">
                                    <h4>How to get there</h4>
                                    <div class="text"><a href="">Open street direction in a map</a></div>
                                </div>

                                <!--Tab-->
                                <div class="tab" id="tab3">
                                    <h4>PT Electronic Data Interchange Indonesia</h4>
                                    <div class="text">
                                                Wisma SMR 10th Floor 
                                                Jl. Yos Sudarso Kav. 89
                                                Jakarta 14350<br>
                                            1. marketing-edii@edi-indonesia.co.id<br>
                                        2. product@edi-indonesia.co.id<br>
                                        - Anna (+62838-7746-2504)<br>
                                        - Alvi  (+62821-1255-0454)
                                    </div>
                                    <button onclick="authenticate().then(loadClient)">authorize and load</button>
                                    <button onclick="execute()">execute</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map Column -->
                <div class="map-column col-lg-6 col-md-12 col-sm-12" id="map" style="display:none">
                    <div class="map-outer">
                        <div class="map-canvas"
                            data-zoom="16"
                            data-lat="-6.140983"
                            data-lng="106.8519133"
                            data-type="roadmap"
                            data-hue="#ffc400"
                            data-title="Holiday Inn Kemayoran"
                            data-icon-path="{{asset('/assets/landing/images/icons/map-marker.png')}}"
                            data-content="Jl.Griya Utama, Sunter Agung, Jakarta Utara">
                        </div>
                    </div>
                </div>
                <div class="map-column col-lg-6 col-md-12 col-sm-12" id="venue">
                    <div class="map-outer wow fadeIn">
                        <div class="image-box">
                            <figure class="image"><img src="{{asset('/assets/landing2/images/location-image.jpg')}}" alt=""></figure>
                        </div>
                    </div>
                </div>
                {{-- <iframe src="http://localhost/apilogy/public/paa/embed-page" width="100%" height="450px"></iframe> --}}
            </div>
        </div>
    </section>
    <!--End Event Info Section -->

    <!-- Subscribe Section -->
    {{-- <section class="subscribe-section">
        <div class="auto-container">
            <div class="content-box">
                <div class="sec-title style-two light">
                    <span class="title">Subscribe to Newsletter</span>
                    <h2>Sign up for Our Newsletter</h2>
                </div>

                <!--Newsletter Form-->
                <div class="newsletter-form">
                    <form method="post" action="http://t.commonsupport.com/eventa/blog.html">
                        <div class="form-group">
                            <input type="email" name="field-name" value="" placeholder="Your Email" required>
                            <button type="submit" class="theme-btn btn-style-three">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}
    <!--End Subscribe Section -->

    <!-- Main Footer -->
    <footer class="main-footer style-two">
        <div class="auto-container">
            <!-- Footer Content -->
            <div class="footer-content">
                <div class="footer-logo"><a href="#"><img src="{{asset('/assets/landing2')}}/images/invent2.png" alt="" style="max-width:150px;"></a></div>

                <ul class="footer-nav">
                    <li><a href="#about">About</a></li>
                    <li><a href="#rundown">Rundown</a></li>
                    <li><a href="#register">Register</a></li>
                    <li><a href="#location">Location</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">Privacy & Policy</a></li>
                </ul>
                <ul class="social-icon-two">
                    <li><a href="https://edi-indonesia.co.id/"><span class="fab fa-dribbble"></span></a></li>
                    <li><a href="https://www.facebook.com/ptedii/"><span class="fab fa-facebook-f"></span></a></li>
                    <li><a href="https://twitter.com/ediindonesia"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="https://www.instagram.com/ediindonesia/"><span class="fab fa-instagram"></span></a></li>
                </ul>
                <div class="copyright-text">© Copyright 2019 by PT Electronic Data Interchange Indonesia</div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h1>Privacy Policy</h1>

                <p>Invent2 Coffee Morning ("us", "we", or "our") operates the research.edi-indonesia.co.id website (hereinafter referred to as the "Service").</p>

                <p>This page informs you of our policies regarding the collection, use, and disclosure of personal data when you use our Service and the choices you have associated with that data.</p>

                <p>We use your data to provide and improve the Service. By using the Service, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, the terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, accessible from research.edi-indonesia.co.id</p>

                <h2>Definitions</h2>
                <ul>
                    <li>
                        <p><strong>Service</strong></p>
                                <p>Service is the research.edi-indonesia.co.id website operated by Invent2 Coffee Morning</p>
                            </li>
                    <li>
                        <p><strong>Personal Data</strong></p>
                        <p>Personal Data means data about a living individual who can be identified from those data (or from those and other information either in our possession or likely to come into our possession).</p>
                    </li>
                    <li>
                        <p><strong>Usage Data</strong></p>
                        <p>Usage Data is data collected automatically either generated by the use of the Service or from the Service infrastructure itself (for example, the duration of a page visit).</p>
                    </li>
                    <li>
                        <p><strong>Cookies</strong></p>
                        <p>Cookies are small files stored on your device (computer or mobile device).</p>
                    </li>
                </ul>

                <h2>Information Collection and Use</h2>
                <p>We collect several different types of information for various purposes to provide and improve our Service to you.</p>

                <h3>Types of Data Collected</h3>

                <h4>Personal Data</h4>
                <p>While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you ("Personal Data"). Personally identifiable information may include, but is not limited to:</p>

                <ul>
                <li>First name and last name</li><li>Cookies and Usage Data</li>
                </ul>

                <h4>Usage Data</h4>

                <p>We may also collect information how the Service is accessed and used ("Usage Data"). This Usage Data may include information such as your computer's Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages, unique device identifiers and other diagnostic data.</p>

                <h4>Tracking &amp; Cookies Data</h4>
                <p>We use cookies and similar tracking technologies to track the activity on our Service and we hold certain information.</p>
                <p>Cookies are files with a small amount of data which may include an anonymous unique identifier. Cookies are sent to your browser from a website and stored on your device. Other tracking technologies are also used such as beacons, tags and scripts to collect and track information and to improve and analyse our Service.</p>
                <p>You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Service.</p>
                <p>Examples of Cookies we use:</p>
                <ul>
                    <li><strong>Session Cookies.</strong> We use Session Cookies to operate our Service.</li>
                    <li><strong>Preference Cookies.</strong> We use Preference Cookies to remember your preferences and various settings.</li>
                    <li><strong>Security Cookies.</strong> We use Security Cookies for security purposes.</li>
                </ul>

                <h2>Use of Data</h2>
                    
                <p>Invent2 Coffee Morning uses the collected data for various purposes:</p>    
                <ul>
                    <li>To provide and maintain the Service</li>
                    <li>To notify you about changes to our Service</li>
                    <li>To allow you to participate in interactive features of our Service when you choose to do so</li>
                    <li>To provide customer care and support</li>
                    <li>To provide analysis or valuable information so that we can improve the Service</li>
                    <li>To monitor the usage of the Service</li>
                    <li>To detect, prevent and address technical issues</li>
                </ul>

                <h2>Transfer Of Data</h2>
                <p>Your information, including Personal Data, may be transferred to - and maintained on - computers located outside of your state, province, country or other governmental jurisdiction where the data protection laws may differ than those from your jurisdiction.</p>
                <p>If you are located outside Indonesia and choose to provide information to us, please note that we transfer the data, including Personal Data, to Indonesia and process it there.</p>
                <p>Your consent to this Privacy Policy followed by your submission of such information represents your agreement to that transfer.</p>
                <p>Invent2 Coffee Morning will take all steps reasonably necessary to ensure that your data is treated securely and in accordance with this Privacy Policy and no transfer of your Personal Data will take place to an organization or a country unless there are adequate controls in place including the security of your data and other personal information.</p>

                <h2>Disclosure Of Data</h2>

                <h3>Legal Requirements</h3>
                <p>Invent2 Coffee Morning may disclose your Personal Data in the good faith belief that such action is necessary to:</p>
                <ul>
                    <li>To comply with a legal obligation</li>
                    <li>To protect and defend the rights or property of Invent2 Coffee Morning</li>
                    <li>To prevent or investigate possible wrongdoing in connection with the Service</li>
                    <li>To protect the personal safety of users of the Service or the public</li>
                    <li>To protect against legal liability</li>
                </ul>

                <p>As an European citizen, under GDPR, you have certain individual rights. You can learn more about these guides in the <a href="https://termsfeed.com/blog/gdpr/#Individual_Rights_Under_the_GDPR">GDPR Guide</a>.</p>

                <h2>Security of Data</h2>
                <p>The security of your data is important to us but remember that no method of transmission over the Internet or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.</p>

                <h2>Service Providers</h2>
                <p>We may employ third party companies and individuals to facilitate our Service ("Service Providers"), to provide the Service on our behalf, to perform Service-related services or to assist us in analyzing how our Service is used.</p>
                <p>These third parties have access to your Personal Data only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.</p>

                


                <h2>Links to Other Sites</h2>
                <p>Our Service may contain links to other sites that are not operated by us. If you click a third party link, you will be directed to that third party's site. We strongly advise you to review the Privacy Policy of every site you visit.</p>
                <p>We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services.</p>


                <h2>Children's Privacy</h2>
                <p>Our Service does not address anyone under the age of 18 ("Children").</p>
                <p>We do not knowingly collect personally identifiable information from anyone under the age of 18. If you are a parent or guardian and you are aware that your Child has provided us with Personal Data, please contact us. If we become aware that we have collected Personal Data from children without verification of parental consent, we take steps to remove that information from our servers.</p>


                <h2>Changes to This Privacy Policy</h2>
                <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>
                <p>We will let you know via email and/or a prominent notice on our Service, prior to the change becoming effective and update the "effective date" at the top of this Privacy Policy.</p>
                <p>You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>


                <h2>Contact Us</h2>
                <p>If you have any questions about this Privacy Policy, please contact us:</p>
                <ul>
                        <li>By email: rnd.ediindonesia@gmail.com</li>
                        
            </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal-->

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
<!--End Google Map APi-->

<script type="text/javascript">
$('#tab-maps').on('click',function(event){
    $('#venue').hide();
    $('#map').show();
});

$('#tab-venue').on('click',function(event){
    $('#map').hide();
    $('#venue').show();
});

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

function save_form(formid,buttonid){
    // console.log($('#'+formid).attr('action'));
    // return false;
        var actionType = $('#'+buttonid).val();
        $('#'+buttonid).html('Submitting..');
        
        $.ajax({
            data: new FormData($('#'+formid)[0]),
            url: $('#'+formid).attr('action'),
            type: "POST",
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data);
                // return false;
                if(data == 'Success'){
                    swal("Success","Thank you for registering, Please check your email to get your ticket!", {
                        icon : "success",
                        buttons: false,
                        html:true,
                    });
                }else if(data == 'Sharing'){
                    swal("Success","Your friend just get the invation!", {
                        icon : "success",
                        buttons: false,
                        html:true,
                    });
                }else if(data.code == 'Failed'){
                    swal(""+data.msg+"", {
                        icon : "error",
                        buttons: false,
                    });
                    $('#'+buttonid).html('Submit');
                }else{
                    if(data.errors){
                        
                        if(data.errors.name){
                           
                            swal(""+data.errors.name+"", {
                            icon : "error",
                            buttons: false,
                            });
                            $('#'+buttonid).html('Submit');
                        }
                        else if(data.errors.phone){
                            swal(""+data.errors.phone+"", {
                            icon : "error",
                            buttons: false,
                            });
                            $('#'+buttonid).html('Submit');
                        }
                        else if(data.errors.email){
                            swal(""+data.errors.email+"", {
                            icon : "error",
                            buttons: false,
                            });
                        }
                        else if(data.errors.company){
                            swal(""+data.errors.company+"", {
                            icon : "error",
                            buttons: false,
                            });
                            $('#'+buttonid).html('Submit');
                        }

                    }
                    setTimeout( 
                    function() {
                      window.location.reload(true);
                    }, 2000);
                }
                setTimeout( 
                    function() {
                      window.location.reload(true);
                    }, 2000);

            },
            error: function (data) {
                console.log('Error:', data);
                // return false;
                if(data.errors){
                    console.log(data.errors);
                    swal("Please check your details registration", {
                        icon : "error",
                        buttons: false,
                    });
                    $('#'+buttonid).html('Submit');
                }
                setTimeout( 
                    function() {
                      window.location.reload(true);
                    }, 9000);
                $('#'+buttonid).html('Submit');
            }
        });
}
</script>

<script src="https://apis.google.com/js/api.js"></script>   

<script>
    /**
     * Sample JavaScript code for youtube.comments.insert
     * See instructions for running APIs Explorer code samples locally:
     * https://developers.google.com/explorer-help/guides/code_samples#javascript
     */
  
    function authenticate() {
      return gapi.auth2.getAuthInstance()
          .signIn({scope: "https://www.googleapis.com/auth/youtube.force-ssl"})
          .then(function() { console.log("Sign-in successful"); },
                function(err) { console.error("Error signing in", err); });
    }
    function loadClient() {
      gapi.client.setApiKey("jVCfr8geWcIwat4KpoZ_xMe9");
      return gapi.client.load("https://www.googleapis.com/discovery/v1/apis/youtube/v3/rest")
          .then(function() { console.log("GAPI client loaded for API"); },
                function(err) { console.error("Error loading GAPI client for API", err); });
    }
    // Make sure the client is loaded and sign-in is complete before calling this method.
    function execute() {
      return gapi.client.youtube.comments.insert({
        "resource": {}
      })
          .then(function(response) {
                  // Handle the results here (response.result has the parsed body).
                  console.log("Response", response);
                },
                function(err) { console.error("Execute error", err); });
    }
    gapi.load("client:auth2", function() {
      gapi.auth2.init({client_id: "161311653511-sain1ll0q3fjedrcpt4nd3t3s8nmtbbs.apps.googleusercontent.com"});
    });
  </script>

</body>
</html>