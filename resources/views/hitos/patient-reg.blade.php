<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient register</title>
</head>
<body>
    <form action="patient-reg" method="POST">
        @csrf
        <h1>Patient register</h1>
        @if(session()->has('message'))
        <div class="alert alert-danger" style="color: green">
            {{ session()->get('message') }}
        </div>
    @endif
    First name <br>
    <input type="text" name="fname" placeholder="enter first name"> <br><br>
    <span style="color: red">@error('fname'){{$message}}@enderror</span><br> 
    
    Middle name <br>
    <input type="text" name="mname" placeholder="enter middle name"> <br><br>
    <span style="color: red">@error('mname'){{$message}}@enderror</span><br> 
    
    Last name <br>
    <input type="text" name="lname" placeholder="enter last name"> <br><br>
    <span style="color: red">@error('lname'){{$message}}@enderror</span><br> 


    Email <br>
    <input type="email" name="email" placeholder=" email address"> <br><br>
    <span style="color: red">@error('email'){{$message}}@enderror</span><br> 

    password <br>
    <input type="password" name="password" placeholder="enter password"> <br><br>
    <span style="color: red">@error('password'){{$message}}@enderror</span><br> 

    Confirm password <br>
    <input type="password" name="password_confirmation" placeholder="enter password"> <br><br>
    <span style="color: red">@error('password_confirmation'){{$message}}@enderror</span><br> 

    Mobile <br>
    <input type="text" name="mobile" placeholder="enter mobile number"> <br><br>
    <span style="color: red">@error('mobile'){{$message}}@enderror</span><br> 

    Country <br>
    <input type="text" name="country" placeholder="country name"> <br><br>
    <span style="color: red">@error('country'){{$message}}@enderror</span><br> 

    City <br>
    <input type="text" name="city" placeholder="city name"> <br><br>
    <span style="color: red">@error('city'){{$message}}@enderror</span><br> 

        <button type="submit">Submit</button>
</form>
</body>
</html>