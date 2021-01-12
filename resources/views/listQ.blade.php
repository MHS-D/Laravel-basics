<table border="1">
    <tr>
        <td>id</td>
        <td>name</td>
        <td>password</td>
        <td>number</td>
        

    </tr>

    @foreach ($data as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->username}}</td>
        <td>{{$item->password}}</td>
        <td>{{$item->number}}</td> 
       


    </tr>
    @endforeach
</table>