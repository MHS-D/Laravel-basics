<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>forgot password</title>
</head>
<body>
    <form action="{{url('/forget-password')}}" method="POST">
    {{ csrf_field()}}
    @csrf
    <input type="email" name="email" id="email"><br>
    <span style="color: red">@error('email'){{$message}}@enderror</span><br> 
    @if (session('Email_sent'))
    <span style="color: green">We have e-mailed your password reset link!</span> <br>

    @endif

    <button type="submit">Submit</button>
</form>
</body>
</html>