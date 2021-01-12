<h1>add members</h1>
@if (session('user'))
<h2 style="color: green"> {{session('user')}} user has been added </h2>
    
@endif
<form action="addmember" method="POST">
@csrf

<input type="text" name="username" placeholder="enter username"> <br> <br>
<input type="password" name="password" placeholder="enter password"> <br> <br>
<input type="text" name="email" placeholder="enter email"> <br> <br>

<button>Add member</button>
</form>