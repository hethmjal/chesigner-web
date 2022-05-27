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
                            <img src="{{ asset('/images/bg2.png') }}" alt="Chicago" style="width:100%;">
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
    <br>
    <div class="container">
        <div class="row ">
            <div class="col-md-12 text-center">
                <h3>كيف نعمل ؟</h3>
                <div class="hr-blue img-center"></div>
                <br>
                <p class="g-color">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    <br> labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <br>
                    laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
        </div>
        <br>
        <div class="row text-center">
            <div class="col-md-6">
                <h3>المنافسات</h3>
                <div class="hr-blue img-center"></div>
            </div>
            <div class="col-md-6">
                <h3>الاشتراكات</h3>
                <div class="hr-blue img-center"></div>
            </div>
            <div class="col-md-12">
                <br>
                <p class="g-color">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    <br> labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <br>
                    laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
        </div>
        <br>
        <div class="text-center">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/VVoHTLUDKK4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <br>
        <br>
    </div>
@endsection
