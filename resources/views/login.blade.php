<h1>User login</h1>

<form action="login" method="POST"> 
    {{method_field('POST')}} {{-- u can use 'delete' or 'put' method here (change also from routes) --}}
    @csrf
    <input type="text" name="username" placeholder="enter user id"> <br> 
            <span style="color: red">@error('username'){{$message}}@enderror</span><br> 

    <input type="password" name="password" placeholder="enter user pass"> <br>
    <span style="color: red">@error('password'){{$message}}@enderror</span><br> 

    <button type="submit">Login</button>
</form>