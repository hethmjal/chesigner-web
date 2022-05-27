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
                    <h2 class="text-left" style="font-family: secondFont"><b>Sign Up</b></h2>
                    <hr class="hr-sign">
                    <br>
                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="text-left">
                        <label for="type">AccountType:</label>
                        <br>
                       <select name="type" class="form-control " id="type">
                           <option value="">select account type</option>
                           <option value="user">client</option>
                           <option value="designer">designer</option>
                       </select>
                       @error ("type")
                       <div class="alert alert-danger">
                          {{$message}}
                       </div>
                   @enderror
                       <br>
                    </div>
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input id="fname" type="fname" class="form-control inputCstm" name="fname" 
                                autofocus="">
                                @error ("fname")
                                <div class="alert alert-danger">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input id="lname" type="lname" class="form-control inputCstm" name="lname" 
                                autofocus="">
                                @error ("lname")
                                <div class="alert alert-danger">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control inputCstm" name="email" 
                                autofocus="">
                                @error ("email")
                                <div class="alert alert-danger">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password
                            </label>
                            <input id="password" type="password" class="form-control inputCstm" name="password"
                               >
                               @error ("password")
                               <div class="alert alert-danger">
                                  {{$message}}
                               </div>
                           @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Confirm Password
                            </label>
                            <input id="confirmPassword" type="password" class="form-control inputCstm" name="password_confirmation"
                                >
                                @error ("password_confirmation")
                                <div class="alert alert-danger">
                                   {{$message}}
                                </div>
                            @enderror
                        </div>


                        <div class="form-group no-margin">
                            <h6>By signing up, you agree to our <a href="">Terms of Service </a>
                                and have read and acknowledge the <a href="">Privacy Policy </a> </h6>
                            <button type="submit" class="btn_register form-control inputCstm btn btn1 btn-block">
                                Sign Up
                            </button>
                        </div>
                    </form>

                        <div class=" mt-3 small">
                            Already have an account? <a href="register.html">Sign In</a>
                        </div>
                        <br>
                        <div class="separator"> OR </div>

                        <div class="form-group text-center">
                            <br>
                            <button type="button" class="google-signUp btn-block">
                                Sign up with Google
                            </button>
                            <button type="button" class="apple-signUp btn-block">
                                <div class="apple-icon">
                                    <i class="fa fa-apple fa-lg"></i>
                                </div>
                                Sign up with Apple
                            </button>
                            <button type="button" class=" twitter-signUp btn-block">
                                <div class="twitter-icon">
                                    <i class="fa fa-twitter fa-lg"></i>
                                </div>
                                Sign up with Twitter
                            </button>

                        </div>

                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>


</body>

</html>
