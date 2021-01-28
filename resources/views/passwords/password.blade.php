<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>reset password</title>
</head>
<body>
    <form action="/reset-password/" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
    <input type="email" name="email" placeholder="ur email"> <br>
    <span style="color: red">@error('email'){{$message}}@enderror</span><br> 

    <input type="password" name="password" placeholder="reset ur pass"> <br>
    <span style="color: red">@error('password'){{$message}}@enderror</span><br> 

    <input type="password" name="password_confirmation" placeholder="confirm pass"> <br>
    <span style="color: red">@error('password_confirmation'){{$message}}@enderror</span><br> 

    <button type="submit">Submit</button>
    @if(session()->has('error'))
    <div class="alert alert-danger" style="color: red">
        {{ session()->get('error') }}
    </div>
@endif
</form>

</body>
</html>