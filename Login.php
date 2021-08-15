<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/login.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="build/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Sign In</title>
</head>

<body>

    <div class="card-body" id="card-body">
        <!-- This is the start of the sign up div -->
        <div class="form-login sign-in-container ">
            <form method="POST" action="">

                <h1 class="title">Sign Up</h1>
                <!-- <div class="social-container">
                    <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="social"><i class="fa fa-google"></i></a>
                    <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
                </div>
                <span class="text">or use another email account</span> -->


                <div class="col-md-6 mt-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror outline-none"
                        name="email" value="" placeholder="Email" required autocomplete="email">

                    
                    <span class="invalid-feedback" role="alert">
                        <!-- <strong>{{ $message }}</strong> -->
                    </span>
                    
                </div>





                <div class="col-md-6 mt-2">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror outline-none"
                        name="password" placeholder="Password" required autocomplete="new-password">                    
                    <span class="invalid-feedback" role="alert">
                        <!-- <strong>{{ $message }}</strong> -->
                    </span>
                  
                </div>

                <div class="col-md-6 mt-2">
                    <input id="password-confirm" type="password" class="form-control outline-none" name="password_confirmation"
                        placeholder="Confirm Password" required autocomplete="new-password">
                </div>

                
                   



                <div class="col-md-6">
                    <button type="button" class="btn btn-primary outline-none bg-red-800 px-3 py-1 rounded mb-2 mt-2">
                        Register
                    </button>
                </div>

            </form>
        </div>

        <!-- Start of Login Div -->

        <div class="form-login register-container ">
            <form method="POST" action="">
                <h1 class="title">Login</h1>
                <!-- <div class="social-container">
                    <a href="#" class="social"><i class="fa fa-facebook-f"></i></a>
                    <a href="{{ url('auth/google') }}" class="social"><i class="fa fa-google"></i></a>
                    <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
                </div>
                <span class="text">or use your email account</span>
 -->



                <div class="col-md-8 mt-3">
                    <input id="email_login" type="email" class="form-control @error('email') is-invalid @enderror outline-none p-2 rounded"
                        name="email" value="" placeholder="Email" required autocomplete="email"
                        autofocus>

                    
                    <span class="invalid-feedback" role="alert">
                        <!-- <strong>message</strong> -->
                    </span>
                </div>




                <div class="col-md-8">
                    <input id="password_login" type="password" class="form-control @error('password') is-invalid @enderror outline-none p-2 rounded"
                        name="password" placeholder="Password" required autocomplete="current-password">

                    
                    <span class="invalid-feedback" role="alert">
                        <!-- <strong>message</strong> -->
                    </span>
                
                </div>



                <div class="col-md-8">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                            ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>



                <div class="col-md-8">
                    <button type="button" class="btn btn-primary outline-none bg-red-800 px-3 py-1 rounded mb-2" onclick="login() ">
                        Login
                    </button>
                    <br>                    
                    <a class="btn btn-link frgt" href="{{ route('password.request') }}">
                    Forgot Your Password?
                    </a>
                
                </div>

            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">

                    <h1>Hello</h1>
                    <p>Sign in here to continue where we left off</p>
                    <button class="ghost" id="Back">Login</button>
                </div>
                <div class="overlay-panel overlay-right">

                    <h1>Welcome</h1>
                    <p>Sign up here and travel with us</p>
                    <button class="ghost" id="Reset">Sign Up</button>
                    <button class="ghost" id="cancel">Cancel</button>
                </div>
            </div>
        </div>
    </div>


    <script src="js/style.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.8.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.8.1/firebase-auth.js"></script>
    <script type="text/javascript" src="js/firebaseConfig.js"></script>

</body>

</html>