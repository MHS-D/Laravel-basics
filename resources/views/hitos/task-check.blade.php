<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task check</title>
</head>
<body>
    <form action="/is_complete" method="POST">
        @csrf
@foreach ($task as $task)
<fieldset>
    <legend>Task info:</legend>
<input type="hidden" name="id" value="{{$task->id}}">
<h1>  case name: {{DB::table('users')->where('id',$task->case_id)->value('name')}}</h1>
<h2>  title : {{$task->title}}</h2>
<h3>discription : {{$task->discription}}</h3>  
<h4>due date: {{$task->due_date}}</h4>

        <input type="checkbox"  name="complete" value="completed">
        <label for="vehicle1">Set Completed</label><br>
        <span style="color: red">@error('complete'){{$message}}@enderror</span><br> 

        <input type="submit" value="Submit">
        @endforeach
</fieldset>

    </form>
</body>
</html>