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
        <div class="row text-center">
            <div class="col-md-2">
                <select id="searchall">
                    <option selected>Following</option>
                    <option value="popular">Popular</option>
                    <option value="new">New</option>
                    <option value="old">Old</option>
                </select>
            </div>

            <div class="col-md-8">
                <ul>
                    <li><a class="active" href="#">logos</a></li>
                    <li><a href="#">Interior Design</a></li>
                    <li><a href="#">Graphics</a></li>
                    <li><a href="#">Branding</a></li>
                    <li><a href="#">Products Design</a></li>
                    <li><a href="#">Media</a></li>
                    <li><a href="#">Animiations</a></li>
                </ul>
            </div>

            <div class="col-md-2">
                <button id="filterSearch"><i class="fa fa-filter"></i> Filter </button>
            </div>
        </div>

        <div class="row">
            @for ($i = 0; $i < 12; $i++)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <div style="100%; display:inline-flex">
                                <div style="wosth:40%">
                                    <img src="{{ asset('/images/p1.png') }}" alt="" style="width:95px;">
                                </div>
                                <div style="wosth:60%">
                                    <h4>Leena Alsafadi </h4>
                                    <div class="d-flex justify-content-between text-center">
                                        <div class="ratings">
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star"></i>
                                            <small> 3.5/5 </small>
                                        </div>
                                    </div>
                                    <h5> <b> مصمم خبير </b></h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="    padding: 0 5px 5px 0p !important;">
                            <div class="skills-show">
                                <p class="skill-box"> جرافيك ديزاين </p>
                                <p class="skill-box"> تصميم داخلي </p>
                                <p class="skill-box"> موشن جرافيك </p>
                            </div>
                        </div>
                        <br>
                        <div class="card-footer">
                            <div style="display: flex;width:100%;">
                                <button class="f-btn"> <i class="fa fa-star"></i> اضف الى المفضلة </button>
                                <button class="j-btn"> <i class="fa fa-plus"></i> اشترك </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
            <br>
            <div class="text-center">
                <button class="b-button"> Show more </button>
            </div>
            <br>
        </div>
    </div>
    <br>
    <br>
