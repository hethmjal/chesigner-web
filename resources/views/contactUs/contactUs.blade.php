@extends('layouts.chesignerApp')

@section('content')

    <br>
    <br>
    <section class="header-bg">
        <div class="row">
            <div class="col-md-6 header-sec1">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">


                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="{{ asset('/images/bg1.png') }}" alt="Los Angeles" style="width:100%;">
                        </div>

                        <div class="item">
                            <img src="{{ asset('/images/bg2.png') }}" alt="" style="width:100%;">
                        </div>

                        <div class="item">
                            <img src="{{ asset('/images/bg3.png') }}" alt="New york" style="width:100%;">
                        </div>

                        <div class="item">
                            <img src="{{ asset('/images/bg4.png') }}" alt="New york" style="width:100%;">
                        </div>
                    </div>
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-6 header-sec2">
                <strong>
                    <h1>Why to get 1 design <br>
                        While you can get 9!</h1>
                </strong>
                <hr class="hr-slogan">
                <br>
                <p class="g-color">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                </p>
                <div class="Icon-inside-search">
                    <input class="input-field header-search" style="width: 45%" type="text"
                        placeholder=". . ابحث عن مصمم / تصميم ">
                    <i class="fa fa-search icon "></i>
                    <button class="button1" type="button">بحث</button>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <h1 class="header-title"> Contact Us </h1>
            <hr>
            <div class="col-sm-12" id="parent">
                <div class="col-sm-6">
                    <iframe width="100%" height="320px;" frameborder="0" style="border:0"
                        src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3625.36238693346!2d46.796699504368604!3d24.680066393143527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sMedical%20Consultants%20Clinics%20https%3A%2F%2Ffoursquare.com%2Fv%2F512b9801e4b01bb7687f2ca6!5e0!3m2!1sen!2ssa!4v1634841863124!5m2!1sen!2ssa"
                        allowfullscreen></iframe>
                </div>

                <div class="col-sm-6">
                    <form action="form.php" class="contact-form" method="post">

                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="nm" placeholder="Name" required=""
                                autofocus="">
                        </div>


                        <div class="form-group form_left">
                            <input type="email" class="form-control" id="email" name="em" placeholder="Email" required="">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="phone"
                                onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10"
                                placeholder="Mobile No." required="">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control textarea-contact" rows="5" id="comment" name="FB"
                                placeholder="Type Your Message/Feedback here..." required=""></textarea>
                            <br>
                            <button class="btn btn-default btn-send"> <span class="glyphicon glyphicon-send"></span> Send
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container second-portion">
            <div class="row">
                <!-- Boxes de Acoes -->
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="box">
                        <div class="icon">
                            <div class="image"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                            <div class="info">
                                <h3 class="title">MAIL & WEBSITE</h3>
                                <p>
                                    <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp info@chesigner.com
                                    <br>
                                    <br>
                                    <i class="fa fa-globe" aria-hidden="true"></i> &nbsp www.chesigner.com
                                </p>

                            </div>
                        </div>
                        <div class="space"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="box">
                        <div class="icon">
                            <div class="image"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                            <div class="info">
                                <h3 class="title">CONTACT</h3>
                                <p>
                                    <i class="fa fa-mobile" aria-hidden="true"></i> &nbsp (+966)-5050XXXXX
                                    <br>
                                    <br>
                                    <i class="fa fa-mobile" aria-hidden="true"></i> &nbsp (+966)-530505XXXX
                                </p>
                            </div>
                        </div>
                        <div class="space"></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="box">
                        <div class="icon">
                            <div class="image"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                            <div class="info">
                                <h3 class="title">ADDRESS</h3>
                                <p>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp 15/3 Junction Plot
                                    "Shree Krishna Krupa", Rajkot - 360001.
                                </p>
                            </div>
                        </div>
                        <div class="space"></div>
                    </div>
                </div>
                <!-- /Boxes de Acoes -->
            </div>
            <br>
            <br>
        </div>
    </div>

@endsection
