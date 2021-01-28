<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=devide-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Nature Tours | Login</title>
        <!-- Custom fonts for this template -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <!-- Bootstrap -->
        <!--<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">-->
        <!-- Font Awesome -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="hero-auth">
            <img class="wave" src="">
            <div class="container">
                <div class="img img-auth">
                    <img src="assets/img/login_2.svg">
                </div>
              
                <div class="form-group">
                    <form action="hitos" method="POST">
                        @csrf
                       
                        <div class="img">
                            <img class="img-avatar" src="assets/img/avatar.svg">
                        </div>
                        <h2>Login</h2>
                        @if(session()->has('message'))
                        <div class="alert alert-danger" style="color: green">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                        <div class="input-group">
                            <div class="icon-input-field">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h5>Username</h5>
                                <input class="input-field" type="text" name="username">
                               
                            </div>
                        </div>
                        <span style="color: red">@error('username'){{$message}}@enderror</span><br> 

                        
                        <div class="input-group">
                            <div class="icon-input-field">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div>
                                <h5>Password</h5>
                                <input class="input-field" type="password" name="password">
                            </div>
                        </div>
                        @if(session()->has('error'))
                        <div class="alert alert-danger" style="color: red">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                        <span style="color: red">@error('password'){{$message}}@enderror</span><br>
                       


                        <a href="{{url('forget-password')}}" class="forgot-password">Forgot Password</a>
                        <input type="submit" class="btn-main" value="login">
                    </form>
                </div>
            </div>
        </div>
    </body>

    <script type="text/javascript" src="assets/js/script.js"></script>
</html>