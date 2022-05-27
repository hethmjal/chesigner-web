<!DOCTYPE html>
<html>

<head>
    <title>{{ @$title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/chesigner.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body >
    @include('inc.navbar')
    @include('inc.messages')
    @yield('content')
    <footer>
        <div class="row">
            <div class="col-md-4 footer-content">
                <h2> chesigner </h2>
                <br>
                <h4> About us</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    <br> sed do eiusmod tempor ut labore et dolore magna
                    aliqua. </p>
                <br>
                <h4> Contact us</h4>
                <p>
                    9200000092
                    &nbsp; <i class="fa fa-phone icon "></i>
                </p>
                <p>
                    info@chesigner.com
                    &nbsp; <i class="fa fa-envelope icon "></i>
                </p>
            </div>
            <div class="col-md-3 footer-links text-left">
                <h4> Information</h4>
                <p><a href="">How we work</a></p>
                <p><a href="">Projects</a></p>
                <p><a href="">Challenges</a></p>
                <p><a href="">Designers</a></p>
                <p><a href="">Blog</a></p>
            </div>
            <div class="col-md-2 footer-links text-left">
                <h4> Helpful Links</h4>
                <p><a href="">Support</a></p>
                <p><a href="">Terms & Conditions</a></p>
                <p><a href="">Privacy Policy</a></p>
            </div>
            <div class="col-md-3 footer-links text-left">
                <h4> Subscripe more info</h4>
                <div class="Icon-inside">
                    <input class="input-field text-left borderd-feild" style="width: 72%" type="text" placeholder="Email" name="email">
                    <i class="fa fa-envelope icon "></i>  
                </div>
                <button class="button2" type="button">Subscripe</button>
            </div>
        </div>
        <hr>

        <div class="text-center social-apps">
            <div class="apps-circle">
                <i class="fa fa-twitter icon img-center"></i>
            </div>
            <div class="apps-circle">
                <i class="fa fa-youtube-play icon img-center "></i>
            </div>
            <div class="apps-circle">
               <i class="fa fa-linkedin icon img-center "></i>
            </div>
            <div class="apps-circle">
                <i class="fa fa-instagram icon img-center "></i>
            </div>
            <div class="apps-circle">
               <i class="fa fa-facebook icon img-center"></i>
            </div>
		</div>
		<br>
        <div class="text-center copywrite">
            <h6>جميع الحقوق محفوظة لتشيزاينر 2021 &copy;</h6>
        </div>
    </footer>
</body>
</html>
