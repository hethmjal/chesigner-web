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

<body id="sign-bg">
    @include('inc.messages')

    <div class="container justify-content-md-center">
        <div class="col-md-3"></div>
        <div class="card-wrapper col-sm-6">
            <div class="card signForm">
                <h1 class="text-center">chesigner</h1>
                <div class="card-body">
                    <h2 class="text-left" style="font-family: secondFont"><b>Sign In</b></h2>
                    <hr class="hr-sign">
                    <br>
                    <form>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control inputCstm" name="email" required=""
                                autofocus="">
                        </div>

                        <div class="form-group">
                            <label for="password">Password
                            </label>
                            <input id="password" type="password" class="form-control inputCstm" name="password"
                                required="">
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="radioSpace" type="checkbox" id="remember" name="remember" value="HTML">
                                <label class="radioSpace" for="html"> Remember Me</label>
                                <a href="password-reset.html" class="fpass small">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>

                        <div class="form-group no-margin">
                            <a href="/index.html" class="btn btn1 btn-block">
                                Sign In
                            </a>
                        </div>
                        <div class=" mt-3 small">
                            Don't have an account? <a href="register.html">Sign Up</a>
                        </div>
                        <br>
                        <div class="separator"> OR </div>

                        <div class="form-group text-center">
                            <br>
                            <button type="button" class="google-signUp btn-block">
                                Sign in with Google
                            </button>
                            <button type="button" class="apple-signUp btn-block">
                                <div class="apple-icon">
                                    <i class="fa fa-apple fa-lg"></i>
                                </div>
                                Sign in with Apple
                            </button>
                            <button type="button" class="twitter-signUp btn-block">
                                <div class="twitter-icon">
                                    <i class="fa fa-twitter fa-lg"></i>
                                </div>
                                Sign in with Twitter
                            </button>
                            
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>


</body>

</html>
