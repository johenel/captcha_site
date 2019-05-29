@extends('layouts.default')
@section('content')
        <!-- Start header section -->
        <div class="header-inner">
            <header id="header">
                <!-- Header image -->
                <img src="/temp-rex/assets/images/header-bg.jpg" alt="img" style="height:800px;width: 100%;">
                <div class="header-overlay">
                    <div class="header-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-7">
                                    <h2 class="header-slide">Trihomebased
                                        <span>EARNING MONEY EASY</span>
                                        <span>WORK ANYTIME</span>
                                        <span>AWESOME PRODUCTS</span>
                                    </h2>
                                </div>
                                <div class="col-md-5">
                                    @if(session()->has('error'))
                                        <div style="background:red;color:white;padding: 10px;border-radius:5px;margin-bottom:20px;">
                                            @foreach(session()->get('error') as $e)
                                                <span>{{$e}}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="auth-box">
                                        @if(!empty($action))
                                            @if($action == 'signup')
                                                @include('includes.features.signup')
                                            @else
                                                @include('includes.features.login')
                                            @endif
                                        @else
                                            @include('includes.features.login')
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>

        <!-- Start menu section -->
        <section id="menu-area">
            <nav class="navbar navbar-default main-navbar" role="navigation">
                <div class="container">
                    <div id="navbar" class="navbar-collapse">
                        <ul id="top-menu" class="nav navbar-nav main-nav menu-scroll">
                            <li class="active"><a href="index.html">Home</a></li>
                            <li><a href="#about">ABOUT</a></li>
                            <li><a href="#how_it_works">HOW IT WORKS</a></li>
                            <li><a href="#faq">FAQ</a></li>
                            <li><a href="#contact">CONTACT</a></li>
                            <li><a href="#pricing-table">PINCODE STATUS</a></li>
                            <li><button class="btn btn-outline-primary" onclick="window.location.href='/?action=login';">Login</button></li>
                            <li><button class="btn btn-outline-success" onclick="window.location.href='/?action=signup';">Sign Up</button></li>

                        </ul>

                    </div><!--/.nav-collapse -->
                </div>
            </nav>
        </section>
        <!-- End menu section -->

        <!-- Start about section -->
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Start welcome area -->
                        <div class="welcome-area">
                            <div class="title-area">
                                <h2 class="tittle">Welcome to <span>Trihomebased</span></h2>
                                <span class="tittle-line"></span>
                                <p>
                                    Trihomebased is a hybrid website which offers guaranteed income by typing captcha and an online store
                                    which gives lots of privileges to its members.

                                    A website may generate income via google adsense through its traffic. Every time a user visits our website and does captcha encoding, trihomebased will generate income.

                                    Aside from that, we have tangible products that are available in our online store and with free delivery nationwide!
                                    Once you are a member, you will be getting up to 20% discount in all trihomebased products and earn extra income
                                    by doing direct selling. Non-members can also purchase in our online store, free
                                    delivery nationwide.

                                </p>
                            </div>
                            <div class="welcome-content">
                                <hr style="margin-bottom: 50px;">

                                <h1 style="margin-bottom: 20px">3 Ways to earn in Trihomebased</h1>
                                <div class="p-set-1">
                                    <h2 style="    color: black;text-align: center;">***REGISTRATION***</h2>
                                    <p>
                                        UPON SUCCESFUL REGISTRATION (AFTER PAYING 150)
                                        MAGKAKAROON AGAD NG 100 REWARD POINTS ANG NEWLY REGISTERED
                                        ACCOUNTS
                                    </p>
                                    <ul>
                                        <li>40 PESOS WILL GO TO CASH WALLET NG NAG REFER</li>
                                        <li>10 PESOS WILL BE CONVERTED INTO REWARD POINTS NG NAG REFER
                                            (1POINT = 1 PESO)
                                        </li>
                                    </ul>
                                    <p>-REWARD POINTS CAN BE USED TO PURCHASE OUR PRODUCTS</p>

                                </div>

                                <ul class="wc-table">
                                    <li>
                                        <div class="single-wc-content wow fadeInUp">
                                            <span class="fa fa-users wc-icon"></span>
                                            <h4 class="wc-tittle">1. CAPTCHA ENCODING</h4>
                                            <p>0.03 PESOS PER SUCCESSFUL CAPTCHA
                                                (captcha income will be automatically credited to cash wallet)
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-wc-content wow fadeInUp">
                                            <span class="fa fa-sellsy wc-icon"></span>
                                            <h4 class="wc-tittle">2. REFERRAL INCENTIVE</h4>
                                            <ul class="sub-item" style="    list-style-type: decimal;    margin-top: 20px;">
                                                <li>1ST LEVEL = 40 PESOS + 10 REWARD POINTS</li>
                                                <li>2ND LEVEL = 10 PESOS</li>
                                                <li>3RD LEVEL = 5 PESOS</li>
                                                <li>4TH LEVEL = 2.50</li>
                                                <li>5H LEVEL = 2.50</li>
                                            </ul>

                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-wc-content wow fadeInUp">
                                            <span class="fa fa-line-chart wc-icon"></span>
                                            <h4 class="wc-tittle">3. DIRECT SELLING (UP TO 20% DISCOUNT ON OUR PRODUCTS)</h4>
                                            <p>ONCE YOU ARE A MEMBER YOU WILL ENJOY 20% DISCOUNT ON ALL OUR
                                                PRODUCTS.
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End welcome area -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="about-area">
                            <div class="row">
                                <div class="col-md-5 col-sm-6 col-xs-12">
                                    <div class="about-left wow fadeInLeft">
                                        <img src="/temp-rex/assets/images/marketing.png" alt="img">
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-6 col-xs-12">
                                    <div class="about-right wow fadeInRight">
                                        <div class="title-area">
                                            <h2 class="tittle">How To Join <span>Trihomebased</span> Marketing?</h2>
                                            <span class="tittle-line"></span>
                                            <ul class="marketing-instruction">
                                                <li>1. FIND AN UPLINE AND GET HIS/HER REFERRAL LINK FOR YOU TO GAIN ACCESS FOR SIGNING UP.</li>
                                                <li>2. BUY PINCODE, IT IS USE FOR ACTIVATING YOUR BACK OFFICE ACCOUNT.</li>
                                                <li>3. TYPE CAPTCHA AS MUCH AS YOU WANT.</li>
                                            </ul>
                                            <div class="about-btn-area">
                                                <a href="?action=signup" class="button button-default" data-text="KNOW MORE"><span>GET STARTED</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End about section -->

        <!-- Start service section -->
        <section id="service">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="service-area">
                            <div class="title-area">
                                <h2 class="tittle">Trihomebased Platform</h2>
                                <span class="tittle-line"></span>
                                <p>perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam, eaque ipsa quae ab illo inventore</p>
                            </div>
                            <!-- service content -->
                            <div class="service-content">
                                <ul class="service-table">
                                    <li class="col-md-4 col-sm-6">
                                        <div class="single-service wow slideInUp">
                                            <h4 class="service-title">TYPING CAPTCHA / ENCODING</h4>
                                        </div>
                                    </li>
                                    <li class="col-md-4 col-sm-6">
                                        <div class="single-service wow slideInUp">
                                            <h4 class="service-title">.030 PER CAPTCHA NOT PER BATCH</h4>
                                        </div>
                                    </li>
                                    <li class="col-md-4 col-sm-6">
                                        <div class="single-service wow slideInUp">
                                            <h4 class="service-title">UNLIMITED INCOME</h4>
                                        </div>
                                    </li>
                                    <li class="col-md-4 col-sm-6">
                                        <div class="single-service wow slideInUp">
                                            <h4 class="service-title">NO ADS</h4>
                                        </div>
                                    </li>
                                    <li class="col-md-4 col-sm-6">
                                        <div class="single-service wow slideInUp">
                                            <h4 class="service-title">NO TIME INTERVAL</h4>
                                        </div>
                                    </li>
                                    <li class="col-md-4 col-sm-6">
                                        <div class="single-service wow slideInUp">
                                            <h4 class="service-title">NO LIMIT</h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End service section -->

        <!-- Start Contact section -->
        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="contact-left wow fadeInLeft">
                            <h2>Contact with us</h2>
                            <address class="single-address">
                                <h4>Postal address:</h4>
                                <p>PO Box 16122 Collins Street West Victoria 8007 Australia</p>
                            </address>
                            <address class="single-address">
                                <h4>Headquarters:</h4>
                                <p>121 King Street, Melbourne Victoria 3000 Australia</p>
                            </address>
                            <address class="single-address">
                                <h4>Phone</h4>
                                <p>Phone Number: (123) 456 7890</p>
                                <p>Fax Number: (123) 456 7890</p>
                            </address>
                            <address class="single-address">
                                <h4>E-Mail</h4>
                                <p>Support: Support@example.com</p>
                                <p>Sales: sales@example.com</p>
                            </address>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-6 col-xs-12">
                        <div class="contact-right wow fadeInRight">
                            <h2>Send a message</h2>
                            <form action="" class="contact-form">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control"></textarea>
                                </div>
                                <button type="submit" data-text="SUBMIT" class="button button-default"><span>SUBMIT</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact section -->

        <!-- Start Google Map -->
        <section id="google-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m8!1m3!1d6303.67022361714!2d144.955652!3d-37.817331!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d-37.8173306!2d144.9556518!5e0!3m2!1sen!2sbd!4v1442411159706" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
        </section>
        <!-- End Google Map -->

        <!-- Start Footer -->
        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p><a rel="nofollow" href="#">Trihomebased</a></p>
            </div>
        </footer>
        <!-- End Footer -->


        <!-- End header section -->
        {{--<div class="flex-center position-ref full-height">--}}
            {{--@if (Route::has('login'))--}}
                {{--<div class="top-right links">--}}
                    {{--<a href="{{ route('login') }}">Login</a>--}}
                    {{--@if (Route::has('register'))--}}
                        {{--<a href="{{ route('register') }}">Register</a>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--@endif--}}


        {{--</div>--}}

        <script>

        </script>

@endsection
