<h2>update member</h2>
<form action="/update" method="POST" enctype="multipart/form-data">
@csrf
<input type="hidden" name="id" value="{{$data['id']}}"> <br> <br>
    <input type="text" name="username" value="{{$data['username']}}"> <br> <br>
    <input type="text" name="password" value="{{$data['password']}}"> <br> <br>
    <input type="text" name="number" value="{{$data['number']}}">    <br> <br>
    <button type="submit" > <a href="login">update</a> update </button> 
</form>
