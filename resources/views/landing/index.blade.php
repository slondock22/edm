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
                   	
                   	<div class="nav-outer clearfix">
                    
						<!-- Main Menu -->
						<nav class="main-menu navbar-expand-md">
							<div class="navbar-header">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="navbar-collapse collapse scroll-nav clearfix" id="navbarSupportedContent">
								<ul class="navigation clearfix">
                                    <li><a href="#" role="navbar">Home</a></li>
                                    <li><a href="#about_page" role="navbar">About</a></li>
                                    {{-- <li><a href="#agenda_page" role="navbar">Agenda & Speakers</a></li> --}}
                                    <li><a href="#rundown_page" role="navbar">Rundown</a></li>
                                    {{-- <li><a href="#product_page" role="navbar">Promo</a></li> --}}
                                    <li><a href="#location_page" role="navbar">Location</a></li>
                                </ul>
							</div>
						</nav>
						
						<!-- btn box -->
						<div class="btn-box">

                            <!--Search Box-->
                            <div class="search-box-outer">
                                <div class="dropdown">
                                    <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flaticon-search-1"></span></button>
                                    <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                        <li class="panel-outer">
                                            <div class="form-container">
                                                <form method="post" action="#">
                                                    <div class="form-group">
                                                        <input type="search" name="field-name" value="" placeholder="Search Here" required>
                                                        <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
						</div>

					</div>
					<!--Outer Box-->
					<div class="outer-box">
                        <!-- Nav Toggler -->
                        <div class="nav-toggler">
	                        <button class="nav-btn"><span class="icon flaticon-arrows"></span></button>
	                    </div>
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
    <section class="banner-section-three" style="background-color: #4e55a4;">
        <div class="auto-container clearfix">
            <div class="content-box">
                <h2>Coffee Morning <br>Invent2 2019</h2>
                <div class="text">Come and join our event, will be held on September 24th, 2019 at Holiday Inn Hotel in Kemayoran, Jakarta-Indonesia.</div>
                <div class="btn-box" style="margin-bottom:30px;"><a href="#about_page" class="theme-btn btn-style-one">See Details</a></div>
            </div>
            <img src="{{asset('/assets/landing/images/main.png')}}" width="600">
            <div class="form-box wow slideInRight">
                <div class="title-box" style="background-color:#8B1A1C !important;">
                    @if(!$exist)
                        <h4>Register</h4>
                    @else
                        <h4>Share The Invitation</h4>
                    @endif
                    <div class="timer">
                        <div class="cs-countdown" data-countdown="4/25/2019 08:30:59"></div>            
                    </div>
                </div>
                @if(!$exist)
                <div class="register-form">
                    <form id="frmRegister" name="frmRegister" method="post" action="{{route('register')}}"> 
                        <input type="hidden" name="verif_code" id="verif_code" value="{{isset($attendance->verif_code)?$attendance->verif_code:""}}">                        
                        <div class="form-group">
                        <input type="text" name="name" id="name" placeholder="Ful name" required="" autocomplete="false" value="{{$attendance->name}}">
                        </div>
                        
                        <div class="form-group">
                            <input type="text" name="phone" id="phone" placeholder="Phone" required="" autocomplete="false" value="{{isset($attendance->phone)?$attendance->phone:""}}">
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" id=="email" placeholder="Email" required="" autocomplete="false" readonly="" value="{{isset($attendance->email)?$attendance->email:""}}">
                        </div>

                        <div class="form-group">
                            <input type="text" name="company" id="company" placeholder="Company" required="" autocomplete="false" value="{{isset($attendance->company)?$attendance->company:""}}">
                        </div>
                        
                        <div class="form-group">
                            <button class="theme-btn btn-style-two" id="btn-save" type="button" name="submit-form" onclick="save_form(($(this).closest('form').attr('id')),(this.id))">Register Now</button>
                        </div>
                    </form>
                </div>
                @else
                @if($attendance->sharing_status)
                <div class="register-form">
                       <h3 align="center"> Thank you, You are registered in this event! See you..</h3>
                    </div>
                @else
                <div class="register-form">
                        <form id="frmShareing" name="frmShareing" method="post" action="{{route('share')}}">       
                        <input type="hidden" name="verif_code" id="verif_code" value="{{isset($attendance->verif_code)?$attendance->verif_code:""}}">  
                        <input type="hidden" name="registration_type" id="registration_type" value="sharing">   
                        <input type="hidden" name="broadcast_event_id" id="broadcast_event_id" value="1">                        

                            <div class="form-group">
                                <input type="email" name="email" id=="email" required="" autocomplete="false" placeholder="Please input the recepient email">
                            </div>                        
                            <div class="form-group">
                                <button class="theme-btn btn-style-two" id="btn-save" type="button" name="submit-form" onclick="save_form(($(this).closest('form').attr('id')),(this.id))">Share</button>
                            </div>
                        </form>
                    </div>
                    @endif
                @endif
            </div>
        </div>
    </section>
    <!-- End Bnner Section -->

    {{-- <!--- Register Section -->
    <section class="about-section" id="register_page">
        <div class="form-box wow slideInRight">
            <div class="title-box">
                <h4>Register</h4>
                <div class="timer">
                    <div class="cs-countdown" data-countdown="4/24/2019 05:06:59"></div>            
                </div>
            </div>
            <div class="register-form">
                <form method="post" action="http://sitetemplate.demo.ithemeslab.com/fizcon/index.html"> 
                    <div class="form-group">
                        <input type="text" name="username" placeholder="Ful name" required="">
                    </div>
                    
                    <div class="form-group">
                        <input type="text" name="phone" placeholder="Phone" required="">
                    </div>

                    <div class="form-group">
                        <input type="text" name="email" placeholder="Email" readonly>
                    </div>

                    <div class="form-group">
                        <input type="text" name="price" placeholder="Company" required="">
                    </div>
                    
                    <div class="form-group">
                        <button class="theme-btn btn-style-two" type="submit" name="submit-form">Register Now</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- End register section --> --}}

    <!-- About Section -->
    <section class="about-section" id="about_page">
        <div class="anim-icons">
            <span class="icon icon-cross-1"></span>
            <span class="icon icon-circle-9"></span>
        </div>
        <span class="float-text">About The</span>
        <div class="auto-container">
            <div class="sec-title">
                <h2>About The Event</h2>
            </div>

            <div class="about-carousel owl-carousel owl-theme">
                <!-- Slide Item -->
                <div class="slide-item clearfix">
                    <div class="image-box">
                        <figure class="image"><img src="{{asset('/assets/landing/images/resource/about1.png')}}" alt=""></figure>
                    </div>
                    <div class="content-box">
                        <div class="inner-box">
                            <h3>Coffee Morning Invent2 2019</h3>
                            <div class="text">is EDII's forum discussion and talkshow. This event containts casual talk show to get know how bonded zones and similar companies can easily make an inventory report according to the latest customs regulations with a more sophisticated system.</div>
                            {{-- <div class="btn-box"><a href="contact.html" class="theme-btn btn-style-one">Register Now</a></div> --}}
                        </div> 
                    </div>
                </div>

                <!-- Slide Item -->
                <div class="slide-item clearfix">
                    <div class="image-box">
                        <figure class="image"><img src="{{asset('/assets/landing/images/resource/about2.png')}}" alt=""></figure>
                    </div>
                    <div class="content-box">
                        <div class="inner-box"> 
                            <h3>Meet with Customs Representative</h3>
                            <div class="text">in this event, customs will also be present as a speaker. You can do questions and answers as much as you want related to the current regulations.</div>
                            {{-- <div class="btn-box"><a href="contact.html" class="theme-btn btn-style-one">Register Now</a></div> --}}
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End About Section -->

    <!-- Feature -->
    {{-- <section class="feature-section-two style-two">
        <div class="auto-container">
            <div class="row">
                <!-- Feature Block Two -->
                <div class="feature-block-two col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-box">
                        <div class="icon"><img src="{{asset('/assets/landing/images/resource/feature-2-1.png')}}" alt=""></div>
                        <h4><a href="about.html">Great Speakers</a></h4>
                        <div class="text">Ex vim lorem homero. Te sit mutat graece deserunt ea has. Sumo</div>
                    </div>
                </div>

                <!-- Feature Block Two -->
                <div class="feature-block-two col-lg-3 col-md-6 col-sm-12 wow fadeInDown">
                    <div class="inner-box">
                        <div class="icon"><img src="{{asset('/assets/landing/images/resource/feature-2-2.png')}}" alt=""></div>
                        <h4><a href="about.html">Networking</a></h4>
                        <div class="text">Ex vim lorem homero. Te sit mutat graece deserunt ea has. Sumo</div>
                    </div>
                </div>

                <!-- Feature Block Two -->
                <div class="feature-block-two col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-box">
                        <div class="icon"><img src="{{asset('/assets/landing/images/resource/feature-2-3.png')}}" alt=""></div>
                        <h4><a href="about.html">Product Analysis</a></h4>
                        <div class="text">Ex vim lorem homero. Te sit mutat graece deserunt ea has. Sumo</div>
                    </div>
                </div>

                <!-- Feature Block Two -->
                <div class="feature-block-two col-lg-3 col-md-6 col-sm-12 wow fadeInDown">
                    <div class="inner-box">
                        <div class="icon"><img src="{{asset('/assets/landing/images/resource/feature-2-4.png')}}" alt=""></div>
                        <h4><a href="about.html">Questionnaire</a></h4>
                        <div class="text">Ex vim lorem homero. Te sit mutat graece deserunt ea has. Sumo</div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--End Feature -->

     <!-- Agenda and Speaker Section -->
    <section class="topics-section-two" id="rundown_page">
        <span class="float-text">Agenda & Run</span>
        <div class="anim-icons">
            <span class="icon icon-circle-3"></span>
            <span class="icon icon-circle-5"></span>
        </div>
        <div class="auto-container">
            <div class="sec-title">
                <h2>Agenda & Rundown</h2>
            </div>

            <!--Event Topics-->
            <div class="event-topics-tabs">
                <div class="tabs-box">
                    <!--Tab Btns-->
                    <ul class="tab-btns tab-buttons clearfix">
                        <li data-tab="#tab1" class="tab-btn active-btn"><div>Registration and Coffee Break</div></li>
                        <li data-tab="#tab2" class="tab-btn"><div>Talkshow</div></li>
                        <li data-tab="#tab3" class="tab-btn"><div>Doorprize</div></li>
                        <li data-tab="#tab4" class="tab-btn"><div>Closing And Lunch</div></li>
                    </ul>
                    
                    <!--Tabs Container-->
                    <div class="tabs-content">
                        <!--Tab-->
                        <div class="tab active-tab" id="tab1">
                            <div class="row">
                                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-column">
                                        <span class="date">09:00 AM - 09:30 AM</span>
                                        <h4>Registration and Coffee Break</h4>
                                        <div class="text">
                                                <p>Bring your own ticket (QR-Code) to event venue for verification purpose, if you do not bring your ticket you cannot enter to these event.</p>
                                                <p>Confirm your presence, take your coffee, and meet other export-import business actors in Indonesia, and find opportunities to work together and get more partnerships</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-column">
                                        <figure class="image"><img src="{{asset('/assets/landing/images/resource/register2.png')}}" alt=""></figure>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Tab / Active Tab-->
                        <div class="tab" id="tab2">
                            <div class="row">
                                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-column">
                                        <span class="date">09:30 AM - 11:00 PM</span>
                                        <h4>Talkshow</h4>
                                        <div class="text">
                                            <p>What are the issues that are being widely? Let’s discuss with fellow export-import business actors in Indonesia. </p>
                                            <p>This contains sharing Experience from Customer, Sharing Innovation from EDII and Discussion.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-column">
                                        <figure class="image"><img src="{{asset('/assets/landing/images/resource/talkshow2.png')}}" alt=""></figure>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Tab-->
                        <div class="tab" id="tab3">
                            <div class="row">
                                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-column">
                                        <span class="date">11:00 PM - 11:30 PM</span>
                                        <h4>Doorprize</h4>
                                        <div class="text">
                                            <p>Get lots of prizes from this event, don't waste it.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-column">
                                        <figure class="image"><img src="{{asset('/assets/landing/images/resource/gift.png')}}" alt=""></figure>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Tab-->
                        <div class="tab" id="tab4">
                            <div class="row">
                                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-column">
                                        <span class="date">11:30 PM - 12:30 PM</span>
                                        <h4>Closing And Lunch</h4>
                                        <div class="text">
                                            <p>Happy tummy is a happy soul, thank you for your time to join with us.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-column">
                                        <figure class="image"><img src="{{asset('/assets/landing/images/resource/lunch2.png')}}" alt=""></figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Product Info Tabs-->  
        </div>
    </section>
    <!--End Agenda and Speaker Section -->
    
    <!-- Rundown Section -->
    {{-- <section class="events-highlight style-three" id="agenda_page">
        <span class="float-text">Agenda & Sp </span>
        <div class="anim-icons">
            <span class="icon icon-circle-11"></span>
            <span class="icon icon-circle-2"></span>
            <span class="icon icon-circle-3"></span>
            <span class="icon icon-circle-4"></span>
        </div>
        <div class="auto-container">
            <div class="sec-title">
                <h2>Agenda & Speakers</h2>
            </div>

            <div class="events-tab tabs-box">
                <ul class="tab-buttons clearfix">
                    <li class="tab-btn active-btn" data-tab="#tab-1">1</li>
                    <li class="tab-btn" data-tab="#tab-2">2</li>
                    <li class="tab-btn" data-tab="#tab-3">3</li>
                </ul>

                <!--Tabs Content-->  
                <div class="tabs-content">
                    <!--Tab / Active Tab-->
                    <div class="tab active-tab" id="tab-1">
                        <div class="content">
                            <div class="row">
                                <!-- Shedule Column -->
                                <div class="shedule-column col-lg-5 col-md-12 col-sm-12">
                                    <div class="inner-column">
                                        <div class="shedule-box">
                                            <h3 class="day">DAY 1</h3>
                                            <span class="date">7th January, Wednesday </span>
                                            <div class="text">Ut quo decore libris erroribus, vel ne omnium invidunt, ut eos dicat aeque intellegat. Diam tota omnesque vim ad, sea et prim </div>
                                            <div class="link-box"><a href="schedule.html"><span class="fa fa-angle-right"></span> More Details</a></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Author Column -->
                                <div class="author-column col-lg-7 col-sm-12 col-sm-12">
                                    <div class="inner-column">
                                        <div class="row">
                                            <!-- Author block -->
                                            <div class="author-block col-lg-6 col-md-6 col-sm-12">
                                                <div class="inner-box">
                                                    <div class="thumb">
                                                        <img src="{{asset('/assets/landing/images/resource/author-thumb-1.png')}}" alt="">
                                                        <span class="name">Dominika</span>
                                                    </div>
                                                    <div class="info">
                                                        <h5 class="title"><a href="#">Mobile UX London</a></h5>
                                                        <span class="date">9:00am, 7 jan 2019</span>
                                                    </div>
                                                    <div class="text">Ut quo decore libris erroribus, vel ne omnium invidunt, ut eos dicat aeque int elle gat. Diam tota omnesqu Sed</div>
                                                </div>
                                            </div>

                                            <!-- Author block -->
                                            <div class="author-block col-lg-6 col-md-6 col-sm-12">
                                                <div class="inner-box">
                                                    <div class="thumb">
                                                        <img src="{{asset('/assets/landing/images/resource/author-thumb-2.png')}}" alt="">
                                                        <span class="name">Dominika</span>
                                                    </div>
                                                    <div class="info">
                                                        <h5 class="title"><a href="#">Big Data & Analytics </a></h5>
                                                        <span class="date">10:00am, 7 jan 2019</span>
                                                    </div>
                                                    <div class="text">Ut quo decore libris erroribus, vel ne omnium invidunt, ut eos dicat aeque int elle gat. Diam tota omnesqu Sed</div>
                                                </div>
                                            </div>

                                            <!-- Author block -->
                                            <div class="author-block col-lg-6 col-md-6 col-sm-12">
                                                <div class="inner-box">
                                                    <div class="thumb">
                                                        <img src="{{asset('/assets/landing/images/resource/author-thumb-5.png')}}" alt="">
                                                        <span class="name">Dominika</span>
                                                    </div>
                                                    <div class="info">
                                                        <h5 class="title"><a href="#">Mobile 360 MENA </a></h5>
                                                        <span class="date">12:00am, 7 jan 2019</span>
                                                    </div>
                                                    <div class="text">Ut quo decore libris erroribus, vel ne omnium invidunt, ut eos dicat aeque int elle gat. Diam tota omnesqu Sed</div>
                                                </div>
                                            </div>

                                            <!-- Author block -->
                                            <div class="author-block col-lg-6 col-md-6 col-sm-12">
                                                <div class="inner-box">
                                                    <div class="thumb">
                                                        <img src="{{asset('/assets/landing/images/resource/author-thumb-5.png')}}" alt="">
                                                        <span class="name">Dominika</span>
                                                    </div>
                                                    <div class="info">
                                                        <h5 class="title"><a href="#">Closing party</a></h5>
                                                        <span class="date">9:00am, 7 jan 2019</span>
                                                    </div>
                                                    <div class="text">Ut quo decore libris erroribus, vel ne omnium invidunt, ut eos dicat aeque int elle gat. Diam tota omnesqu Sed</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Tab-->
                    <div class="tab" id="tab-2">
                        <div class="content">
                            <div class="row">
                                <!-- Shedule Column -->
                                <div class="shedule-column col-lg-5 col-md-12 col-sm-12">
                                    <div class="inner-column">
                                        <div class="shedule-box">
                                            <h3 class="day">DAY 2</h3>
                                            <span class="date">8th January, Wednesday </span>
                                            <div class="text">Ut quo decore libris erroribus, vel ne omnium invidunt, ut eos dicat aeque intellegat. Diam tota omnesque vim ad, sea et prim </div>
                                            <div class="link-box"><a href="schedule.html"><span class="fa fa-angle-right"></span> More Details</a></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Author Column -->
                                <div class="author-column col-lg-7 col-sm-12 col-sm-12">
                                    <div class="inner-column">
                                        <div class="row">
                                            <!-- Author block -->
                                            <div class="author-block col-lg-6 col-md-6 col-sm-12">
                                                <div class="inner-box">
                                                    <div class="thumb">
                                                        <img src="{{asset('/assets/landing/images/resource/author-thumb-1.png')}}" alt="">
                                                        <span class="name">Dominika</span>
                                                    </div>
                                                    <div class="info">
                                                        <h5 class="title"><a href="#">Big Data & Analytics</a></h5>
                                                        <span class="date">10:00am, 7 jan 2019</span>
                                                    </div>
                                                    <div class="text">Ut quo decore libris erroribus, vel ne omnium invidunt, ut eos dicat aeque int elle gat. Diam tota omnesqu Sed</div>
                                                </div>
                                            </div>

                                            <!-- Author block -->
                                            <div class="author-block col-lg-6 col-md-6 col-sm-12">
                                                <div class="inner-box">
                                                    <div class="thumb">
                                                        <img src="{{asset('/assets/landing/images/resource/author-thumb-2.png')}}" alt="">
                                                        <span class="name">Dominika</span>
                                                    </div>
                                                    <div class="info">
                                                        <h5 class="title"><a href="#">Mobile 360 MENA</a></h5>
                                                        <span class="date">11:00am, 7 jan 2019</span>
                                                    </div>
                                                    <div class="text">Ut quo decore libris erroribus, vel ne omnium invidunt, ut eos dicat aeque int elle gat. Diam tota omnesqu Sed</div>
                                                </div>
                                            </div>

                                            <!-- Author block -->
                                            <div class="author-block col-lg-6 col-md-6 col-sm-12">
                                                <div class="inner-box">
                                                    <div class="thumb">
                                                        <img src="{{asset('/assets/landing/images/resource/author-thumb-3.png')}}" alt="">
                                                        <span class="name">Dominika</span>
                                                    </div>
                                                    <div class="info">
                                                        <h5 class="title"><a href="#">DAM San Diego</a></h5>
                                                        <span class="date">12:00am, 7 jan 2019</span>
                                                    </div>
                                                    <div class="text">Ut quo decore libris erroribus, vel ne omnium invidunt, ut eos dicat aeque int elle gat. Diam tota omnesqu Sed</div>
                                                </div>
                                            </div>

                                            <!-- Author block -->
                                            <div class="author-block col-lg-6 col-md-6 col-sm-12">
                                                <div class="inner-box">
                                                    <div class="thumb">
                                                        <img src="{{asset('/assets/landing/images/resource/author-thumb-4.png')}}" alt="">
                                                        <span class="name">Dominika</span>
                                                    </div>
                                                    <div class="info">
                                                        <h5 class="title"><a href="#">Mobile UX London</a></h5>
                                                        <span class="date">9:00am, 7 jan 2019</span>
                                                    </div>
                                                    <div class="text">Ut quo decore libris erroribus, vel ne omnium invidunt, ut eos dicat aeque int elle gat. Diam tota omnesqu Sed</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Tab-->
                    <div class="tab" id="tab-3">
                        <div class="content">
                            <div class="row">
                                <!-- Shedule Column -->
                                <div class="shedule-column col-lg-5 col-md-12 col-sm-12">
                                    <div class="inner-column">
                                        <div class="shedule-box">
                                            <h3 class="day">DAY 3</h3>
                                            <span class="date">9th January, Wednesday </span>
                                            <div class="text">Ut quo decore libris erroribus, vel ne omnium invidunt, ut eos dicat aeque intellegat. Diam tota omnesque vim ad, sea et prim </div>
                                            <div class="link-box"><a href="schedule.html"><span class="fa fa-angle-right"></span> More Details</a></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Author Column -->
                                <div class="author-column col-lg-7 col-sm-12 col-sm-12">
                                    <div class="inner-column">
                                        <div class="row">
                                            <!-- Author block -->
                                            <div class="author-block col-lg-6 col-md-6 col-sm-12">
                                                <div class="inner-box">
                                                    <div class="thumb">
                                                        <img src="{{asset('/assets/landing/images/resource/author-thumb-1.png')}}" alt="">
                                                        <span class="name">Dominika</span>
                                                    </div>
                                                    <div class="info">
                                                        <h5 class="title"><a href="#">Big Data & Analytics</a></h5>
                                                        <span class="date">10:00am, 7 jan 2019</span>
                                                    </div>
                                                    <div class="text">Ut quo decore libris erroribus, vel ne omnium invidunt, ut eos dicat aeque int elle gat. Diam tota omnesqu Sed</div>
                                                </div>
                                            </div>

                                            <!-- Author block -->
                                            <div class="author-block col-lg-6 col-md-6 col-sm-12">
                                                <div class="inner-box">
                                                    <div class="thumb">
                                                        <img src="{{asset('/assets/landing/images/resource/author-thumb-2.png')}}" alt="">
                                                        <span class="name">Dominika</span>
                                                    </div>
                                                    <div class="info">
                                                        <h5 class="title"><a href="#">Mobile 360 MENA</a></h5>
                                                        <span class="date">11:00am, 7 jan 2019</span>
                                                    </div>
                                                    <div class="text">Ut quo decore libris erroribus, vel ne omnium invidunt, ut eos dicat aeque int elle gat. Diam tota omnesqu Sed</div>
                                                </div>
                                            </div>

                                            <!-- Author block -->
                                            <div class="author-block col-lg-6 col-md-6 col-sm-12">
                                                <div class="inner-box">
                                                    <div class="thumb">
                                                        <img src="{{asset('/assets/landing/images/resource/author-thumb-3.png')}}" alt="">
                                                        <span class="name">Dominika</span>
                                                    </div>
                                                    <div class="info">
                                                        <h5 class="title"><a href="#">DAM San Diego</a></h5>
                                                        <span class="date">12:00am, 7 jan 2019</span>
                                                    </div>
                                                    <div class="text">Ut quo decore libris erroribus, vel ne omnium invidunt, ut eos dicat aeque int elle gat. Diam tota omnesqu Sed</div>
                                                </div>
                                            </div>

                                            <!-- Author block -->
                                            <div class="author-block col-lg-6 col-md-6 col-sm-12">
                                                <div class="inner-box">
                                                    <div class="thumb">
                                                        <img src="{{asset('/assets/landing/images/resource/author-thumb-4.png')}}" alt="">
                                                        <span class="name">Dominika</span>
                                                    </div>
                                                    <div class="info">
                                                        <h5 class="title"><a href="#">Mobile UX London</a></h5>
                                                        <span class="date">9:00am, 7 jan 2019</span>
                                                    </div>
                                                    <div class="text">Ut quo decore libris erroribus, vel ne omnium invidunt, ut eos dicat aeque int elle gat. Diam tota omnesqu Sed</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--End Rundown -->

    <!-- Promo Product Section -->
    {{-- <section class="pricing-section" id="product_page">
        <div class="anim-icons">
            <span class="icon icon-circle-1 wow zoomIn"></span>
            <span class="icon icon-circle-2 wow zoomIn" data-wow-delay="600ms"></span>
            <span class="icon icon-circle-3 wow zoomIn" data-wow-delay="1200ms"></span>
            <span class="icon icon-circle-4 wow zoomIn" data-wow-delay="1800ms"></span>
        </div>
        <span class="float-text">Product Promo</span>
        <div class="auto-container">
            <div class="sec-title light">
                <h2>Product Promo</h2>
            </div>

            <div class="row no-gutters">
                <!-- Pricing Block -->
                <div class="pricing-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-box">
                        <figure class="image"><img src="{{asset('/assets/landing/images/resource/e-reporting.jpg')}}" alt=""></figure>
                        <h4 class="title">E-Reporting</h4>
                        <ul class="features">
                            <li>Get Special Price For Our Product</li>
                            <li>Use the voucher code below</li>
                            <li>Tell our customer care for further info</li>
                            <li>Limited promo quota!</li>
                        </ul>
                        <div class="btn-box">
                            <a href="#" class="theme-btn">Show Voucher</a>
                        </div>
                    </div>
                </div>

                <!-- Pricing Block -->
                <div class="pricing-block col-lg-4 col-md-6 col-sm-12 wow fadeInDown">
                    <div class="inner-box">
                        <figure class="image"><img src="{{asset('/assets/landing/images/resource/e-declaration.jpg')}}" alt=""></figure>
                        <h4 class="title">E-Declaration</h4>
                        <ul class="features">
                            <li>Get Special Price For Our Product</li>
                            <li>Use the code below</li>
                            <li>Tell our customer care for further info</li>
                            <li>Limited promo quota!</li>
                        </ul>
                        <div class="btn-box">
                            <a href="#" class="theme-btn">Show Voucher</a>
                        </div>
                    </div>
                </div>

                <!-- Pricing Block -->
                <div class="pricing-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-box">
                        <figure class="image"><img src="{{asset('/assets/landing/images/resource/d-repo.jpg')}}" alt=""></figure>
                        <h4 class="title">d-Repo</h4>
                        <ul class="features">
                            <li>Get Special Price For Our Product</li>
                            <li>Use the code below</li>
                            <li>Tell our customer care for further info</li>
                            <li>Limited promo quota!</li>
                        </ul>
                        <div class="btn-box">
                            <a href="#" class="theme-btn">Show Voucher</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--End Promo Product Section -->
 
    <!-- Location Section -->
    <section class="location-section" id="location_page">
        <span class="float-text">Get Directio</span>
        <div class="anim-icons">
            <span class="icon icon-dots wow zoomIn"></span>
            <span class="icon icon-dots-2"></span>
            <span class="icon icon-lines"></span>
        </div>
        <div class="auto-container">
            <div class="sec-title">
                <h2>Locations</h2>
            </div>

            <div class="row">
                <!-- Block Column -->
                <div class="blocks-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Location Block -->
                        <div class="location-block wow fadeInUp">
                            <div class="inner-box">
                                <span class="icon icon-balloon"></span>
                                <h4><a href="#">Event Location</a></h4>
                                <div class="text"><b>Holiday Inn Kemayoran </b><br>
                                    Jl. Griya Utama, Sunter Agung, Jakarta, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14350<br>
                                    Phone: (021) 29568800</div>
                            </div>
                        </div>

                        <!-- Location Block -->
                        <div class="location-block wow fadeInUp">
                            <div class="inner-box">
                                <span class="icon icon-information"></span>
                                <h4><a href="#">Contact Us</a></h4>
                                <div class="text"><b>PT Electronic Data Interchange Indonesia</b><br>
                                    Wisma SMR 10th Floor 
                                    Jl. Yos Sudarso Kav. 89
                                    Jakarta 14350<br>
                                1. marketing-edii@edi-indonesia.co.id<br>
                            2. product@edi-indonesia.co.id<br>
                            - Anna (+62838-7746-2504)<br>
                            - Alvi  (+62821-1255-0454)</div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="map-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInRight">
                        <div class="image-box">
                            <figure class="image"><img src="{{asset('/assets/landing/images/resource/location-image.jpg')}}" alt=""></figure>
                        </div>
                        <div class="map-box">
                            <!--Map Canvas-->
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
                </div>
            </div>
        </div>
    </section>
    <!--End Location Section -->

    <!-- Sponsor Section -->
    {{-- <section class="sponsor-section style-three">
        <div class="anim-icons">
            <span class="icon icon-cross-1"></span>
            <span class="icon icon-circle-12"></span>
        </div>
        <span class="float-text">Our Sponsor</span>
        <div class="auto-container">
            <div class="sec-title"><h2>Our Sponsors</h2></div>
            <div class="row">
                <div class="client-logo col-lg-3 col-md-6 col-sm-12">
                    <figure class="image"><a href="#"><img src="{{asset('/assets/landing/images/clients/3-1.png')}}" alt=""></a></figure>
                </div>
                <div class="client-logo col-lg-3 col-md-6 col-sm-12">
                    <figure class="image"><a href="#"><img src="{{asset('/assets/landing/images/clients/3-2.png')}}" alt=""></a></figure>
                </div>
                <div class="client-logo col-lg-3 col-md-6 col-sm-12">
                    <figure class="image"><a href="#"><img src="{{asset('/assets/landing/images/clients/3-3.png')}}" alt=""></a></figure>
                </div>
                <div class="client-logo col-lg-3 col-md-6 col-sm-12">
                    <figure class="image"><a href="#"><img src="{{asset('/assets/landing/images/clients/3-4.png')}}" alt=""></a></figure>
                </div>
                <div class="client-logo col-lg-3 col-md-6 col-sm-12">
                    <figure class="image"><a href="#"><img src="{{asset('/assets/landing/images/clients/3-5.png')}}" alt=""></a></figure>
                </div>
                <div class="client-logo col-lg-3 col-md-6 col-sm-12">
                    <figure class="image"><a href="#"><img src="{{asset('/assets/landing/images/clients/3-6.png')}}" alt=""></a></figure>
                </div>
                <div class="client-logo col-lg-3 col-md-6 col-sm-12">
                    <figure class="image"><a href="#"><img src="{{asset('/assets/landing/images/clients/3-7.png')}}" alt=""></a></figure>
                </div>
                <div class="client-logo col-lg-3 col-md-6 col-sm-12">
                    <figure class="image"><a href="#"><img src="{{asset('/assets/landing/images/clients/3-8.png')}}" alt=""></a></figure>
                </div>
            </div>

            <div class="btn-box">
                <a href="#" class="theme-btn btn-style-four">Become a sponsor</a>
            </div>
        </div>
    </section> --}}
    <!--End Sponsor Section -->

    <!-- Main Footer -->
    <div class="main-footer">    
        <div class="anim-icons">
            <span class="icon icon-twist-line-1 wow zoomIn"></span>
            <span class="icon icon-circle-6 wow zoomIn" data-wow-delay="400ms"></span>
            <span class="icon icon-twist-line-2 wow zoomIn" data-wow-delay="800ms"></span>
            <span class="icon icon-circle-8 wow zoomIn" data-wow-delay="1200ms"></span>
        </div>
        <div class="auto-container">
            <div class="sec-title text-center light">
                <h2>#CoffeeMorningInvent2019</h2>
                <br>
                <span class="title">Find Us On</span>
            </div>

            <!-- Social Links -->
            <div class="social-links">
                <ul>

                    <li><a href="https://edi-indonesia.co.id/"><span class="fab fa-dribbble"></span></a></li>
                    <li><a href="https://www.facebook.com/ptedii/"><span class="fab fa-facebook-f"></span></a></li>
                    <li><a href="https://twitter.com/ediindonesia"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="https://www.instagram.com/ediindonesia/"><span class="fab fa-instagram"></span></a></li>
                </ul>
            </div>

            <!-- Footer Nav -->
            <div class="footer-nav">
                <ul>
                        <li><a href="#about_page" role="navbar">About</a></li>
                        {{-- <li><a href="#agenda_page" role="navbar">Agenda & Speakers</a></li> --}}
                        <li><a href="#rundown_page" role="navbar">Rundown</a></li>
                        {{-- <li><a href="#product_page" role="navbar">Promo</a></li> --}}
                        <li><a href="#location_page" role="navbar">Location</a></li>
                </ul>                                  
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
<script>
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

$('#navbarSupportedContent').find('a[href^="#"]').on('click', function(event) {
    //   alert('ini aku alert dong');
      var target = $( $(this).attr('href') );
      var href   = $(this).attr('href');
      var margin = (href == '#agenda_page' || href == '#rundown_page') ? -100 : 1;
      var role   = $(this).attr('role');
      
      if (role == 'navbar') {
        if( target.length ) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top+(margin)
            }, 800);
        }
      }
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
                }else{
                    if(data.errors){
                        
                        if(data.errors.name){
                           
                            swal(""+data.errors.name+"", {
                            icon : "error",
                            buttons: false,
                            });
                        }
                        else if(data.errors.phone){
                            swal(""+data.errors.phone+"", {
                            icon : "error",
                            buttons: false,
                            });
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
                    }, 6000);

            },
            error: function (data) {
                console.log('Error:', data);
                if(data.errors){
                    console.log(data.errors);
                    swal("Please check your details registration", {
                        icon : "error",
                        buttons: false,
                    });
                }
                setTimeout( 
                    function() {
                      window.location.reload(true);
                    }, 9000);
                $('#'+buttonid).html('REGISTER NOW');
            }
        });
}
</script>
</body>
</html>