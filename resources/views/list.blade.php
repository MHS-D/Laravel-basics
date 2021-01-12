

<h1>member list</h1>

<table border="1">
    <tr>
        <td>id</td>
        <td>name</td>
        <td>password</td>
        <td>number</td>
        <td>operation</td>
        

    </tr>

    @foreach ($usert as $user)
    <tr>
        <td>{{$user['id']}}</td>
        <td>{{$user['username']}}</td>
        <td>{{$user['password']}}</td>
        <td>{{$user['number']}}</td> 
        <td><a href={{"deletedb/".$user['id']}}>delete</a> 
        <a href={{"edit/".$user['id']}}>update</a>    </td>


    </tr>
    @endforeach
</table>

<span>

    {{$usert->links()}}

</span>

<h2>Add member</h2>
<form action="insertdb" method="POST">
@csrf
    <input type="text" name="username" placeholder="enter username"> 
    <input type="text" name="password" placeholder="enter pass"> 
    <input type="text" name="number" placeholder="enter number">    
    <button type="submit">Add </button>
</form>


{{--
<h3>delete user</h3> 
    <form action="deletedb" method="POST">
    @csrf
        <input type="text" name="username" placeholder="enter username"> <br><br>
      
        <button type="submit">delete </button>
    </form>
 --}}
<style>
    .w-5{
        display: none;
    }
</style>