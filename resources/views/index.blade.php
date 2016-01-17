@extends('layout')

@section('content')

    
        <!-- Begin text carousel intro section -->
        <section id="home">
            <div class="container1" style="height:auto;">
                <div id="myCarousel" class="carousel slide" style="margin-top: 70px;" data-ride="carousel" data-interval="3000" data-pause="false" >
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="img/banner1.jpg" class="mrgn" alt="">
                        </div>
                        <div class="item">
                            <img src="img/banner2.jpg" class="mrgn" alt="">
                        </div>
                        <div class="item active">
                            <img src="img/banner3.jpg" class="mrgn" alt="">
                        </div>
                        <div class="item">
                            <img src="img/banner4.jpg" class="mrgn" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Begin about section -->
        <section id="how_it_works" class="page text-center bg1">
            <!-- Begin page header-->
            <div class="page-header-wrapper">
                <div class="container">
                    <div class="page-header text-center wow fadeInUp" data-wow-delay="0.3s">
                        <h2>How It Works</h2>
                       <p style="font-size: 20px;"><i>seat</i><b>Hero</b> is an exclusive club that provides movie lovers with deep discount seats on last-minute unsold movie tickets.</p>
                        <p style="font-size: 20px;">Membership is <b>just $5 a month</b> with up to <b>three months free</b> when you sign up during our pre-launch period!</p>
                    </div>
                </div>
            </div>
            <!-- End page header-->

            <!-- Begin rotate box-1 -->
            <div class="rotate-box-2-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <a class="rotate-box-2 text-center square-icon wow zoomIn animated" data-wow-delay="0.2s">
                                <img src="{{ asset('/img/step1.png') }}" />
                                <div class="rotate-box-info">

                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <a class="rotate-box-2 text-center square-icon wow zoomIn" data-wow-delay="0.2s">
                                <img src="{{ asset('/img/step2.PNG') }}" />
                                <div class="rotate-box-info">

                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-3">
                            <a class="rotate-box-2 text-center square-icon wow zoomIn animated" data-wow-delay="0.2s">
                                <img src="{{ asset('/img/step3.PNG') }}" />
                                <div class="rotate-box-info">

                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <a class="rotate-box-2 text-center square-icon wow zoomIn" data-wow-delay="0.2s">
                                <img src="{{ asset('/img/step4.PNG') }}" />
                                <div class="rotate-box-info">

                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <a href="#signup" class="btn btn-lg btn-warning2 page-scroll col-sm-4 col-sm-offset-4">Signup</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /.container -->
            </div>
            <!-- End rotate box-1 -->
        </section>
        <!-- End about section -->

        <!-- Begin about section -->
        <section id="awesome_benifits" class="page text-center">
            <!-- Begin page header-->
            <div class="page-header-wrapper">
                <div class="container">
                    <div class="page-header text-center wow fadeInUp" data-wow-delay="0.3s">
                        <p style="color:#D80808;font-size: 30px;font-family:cursive;">Nearly 90% of Movie theater seats are empty</p>

                        <p>Wouldn't it be better if those seats were filled at a reasonable price? We think so.</p>
                        <h4>Awesome benefits include</h4>
                    </div>
                </div>
            </div>
            <!-- End page header-->

            <!-- Begin rotate box-1 -->
            <div class="rotate-box-2-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <a class="rotate-box-2 text-center square-icon wow zoomIn animated" data-wow-delay="0.2s">
                                <img src="{{ asset('/img/awesome-benifits1.PNG') }}" />
                                <div class="rotate-box-info">

                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <a class="rotate-box-2 text-center square-icon wow zoomIn" data-wow-delay="0.2s">
                                <img src="{{ asset('/img/awesome-benifits2.PNG') }}" />
                                <div class="rotate-box-info">

                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-3">
                            <a class="rotate-box-2 text-center square-icon wow zoomIn animated" data-wow-delay="0.2s">
                                <img src="{{ asset('/img/awesome-benifits3.PNG') }}" />
                                <div class="rotate-box-info">

                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.container -->
            </div>
            <!-- End rotate box-1 -->
        </section>
        <!-- End about section -->

        <!-- Begin about section -->
        <section id="get_3_months_free" class="page text-center bg2">
            <!-- Begin page header-->
            <div class="page-header-wrapper redstrip">
                <div class="container">
                    <div class="page-header text-center wow fadeInUp" data-wow-delay="0.3s">
                        <p class="h2white">Why sign up during our pre-launch period?</p>
                        <p class="para1">Get up  to 3 months free, and...</p>
                    </div>
                </div>
            </div>
            <!-- End page header-->

            <!-- Begin rotate box-1 -->
            <div class="rotate-box-2-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <a class="rotate-box-2 text-center square-icon wow zoomIn animated" data-wow-delay="0.2s">
                                <img src="{{ asset('/img/app-left.png') }}" />
                                <div class="rotate-box-info">

                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <a class="rotate-box-2 text-center square-icon wow zoomIn" data-wow-delay="0.2s">
                                <img src="{{ asset('/img/app-right.png') }}" />
                                <div class="rotate-box-info">

                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <a href="#signup" class="btn btn-lg btn-warning2 page-scroll col-sm-4 col-sm-offset-4">Signup</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /.container -->
            </div>
            <!-- End rotate box-1 -->
        </section>
        <!-- End about section -->



        <!-- Begin about section -->
        <section id="signup" class="page text-center">
            <!-- Begin page header-->
            <div class="page-header-wrapper">
                <div class="container">
                    <div class="page-header text-center wow fadeInUp" data-wow-delay="0.3s">
                        <h2>Sign up for just $5/<span style="font-size:16px">MONTH !</span> </h2>
                        <h5>Sign up now for exclusive early admission to <i>seat</i><b>HERO</b> when we launch and,</h5>
                        <h5> for limited time, receive up to <b>THREE MONTHS FREE!</b></h5>
                    </div>
                    <div class="col-md-offset-4">
                        <a href="{{url('facebook_signup')}}" type="button"><img class="img-responsive" src="{{ asset('/img/fb_button.jpg') }}" /> </a>
                    </div>
                    <div class="col-lg-12" style="margin-bottom:20px; margin-top:20px"><img src="img/or.png"></div>
                </div>
            </div>
            <!-- End page header-->

            <!-- Begin rotate box-1 -->
            <div class="rotate-box-2-wrapper">
                <div class="container">
                @include('errors_display')
                <form method="post" class="form-horizontal" enctype="multipart/form-data" novalidate="novalidate" action="signUp">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row  col-md-offset-3">
                        <div class="col-md-4 col-sm-4">
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" class="form-control input-box1" id="Name">
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" class="form-control input-box1" id="email">

                        </div>
                    </div>
                        <div class="clearfix"></div>
                    <div class="row col-md-offset-3">
                        <div class="col-md-4 col-sm-4">
                            <input type="password" name="password" value="{{ old('password') }}" placeholder="Password" class="form-control input-box1" id="password">
                        </div>
                        <div class="col-md-4 col-sm-4">

                            <input type="text" name="zip" value="{{ old('zip') }}" placeholder="Zip Code" class="form-control input-box1" id="zip">
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="col-md-offset-3">
                        <div class="col-md-8 col-sm-8 form-group">
                            <h5>Your preferred theaters : (You can select more than one)</h5>
                            <select name="preferred_theater[]" class=" selectpicker form-control input-box1"  multiple="multiple">
                            @foreach($theaters as $theater)
                                <option value="{{ $theater->theater_id }}">{{ $theater->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <button class="btn btn-lg btn-warning2 col-sm-4 col-sm-offset-4">Create Account</button>
                    </div>
                    <div class="clearfix"></div>
                   </form>
                </div>
                <!-- /.container -->
            </div>
            <!-- End rotate box-1 -->
        </section>
        <!-- End about section -->
    @endsection