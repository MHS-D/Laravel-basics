<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>

@if (session('role')== 3)

    <form action="{{ route('travel.file.action') }}" method="POST" enctype="multipart/form-data">
     @csrf
     <h1>  airline trip  Files Form</h1>

     <input type="hidden" name="id" value="{{ $data->id }}">

    <label for="">Full name:</label>
    <input type="text" name="name" value="{{$data->name}}"  ><br><br>
    <span style="color: red">@error('name'){{ $message }} @enderror</span><br>

    <label for="">Phone Number:</label>
    <input type="text" name="phone" value="{{ $data->phone}}" ><br><br>
    <span style="color: red">@error('phone'){{ $message }} @enderror</span><br>

    <label for="">Passport image :</label><br>
    <img style="width: 30%;margin-left: 200px; margin-top: 10px" src="{{ asset('images')}}/{{ $data->passport }}" alt=""><br>
    <input type="file" name="passport" ><br><br>
    <span style="color: red">@error('passport'){{ $message }} @enderror</span><br>

    <label for="">Ministry of Health Acceptence Image :</label><br>
    <img style="width: 30%;margin-left: 200px; margin-top: 10px" src="{{ asset('images')}}/{{ $data->ministry_of_health_acceptance }}" alt=""><br>
    <input type="file" name="ministry_of_helath" ><br><br>
    <span style="color: red">@error('ministry_of_helath'){{ $message }} @enderror</span><br>


    <label for="">Visa Image :</label><br>
    <img style="width: 30%;margin-left: 200px; margin-top: 10px" src="{{ asset('images')}}/{{ $data->visa }}" alt=""><br>
    <input type="file" name="visa" ><br><br>
    <span style="color: red">@error('visa'){{ $message }} @enderror</span>


    <button type="submit">Update</button>
        </form>
@endif

@if (session('role')== 6)
<form action="{{ route('travel.file.message') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h1>  airline trip  Files Form</h1>

    <input type="hidden" name="id" value="{{ $data->id }}">

   <label for="">Full name:</label>
   <input type="text" name="name" value="{{$data->name}}"  readonly><br><br>

   <label for="">Phone Number:</label>
   <input type="text" name="phone" value="{{ $data->phone}}" ><br><br>

   <label for="">Passport image :</label><br>
   <img style="width: 30%;margin-left: 200px; margin-top: 10px" src="{{ asset('images')}}/{{ $data->passport }}" alt=""><br>

   <label for="">Ministry of Health Acceptence Image :</label><br>
   <img style="width: 30%;margin-left: 200px; margin-top: 10px" src="{{ asset('images')}}/{{ $data->ministry_of_health_acceptance }}" alt=""><br>


   <label for="">Visa Image :</label><br>
   <img style="width: 30%;margin-left: 200px; margin-top: 10px" src="{{ asset('images')}}/{{ $data->visa }}" alt=""><br>

   <label for="reason">write a message to user if any problem occurd: </label>
   <textarea name="message" cols="40" rows="5"></textarea><br><br>
   <span style="color: red">@error('message'){{ $message }} @enderror</span><br>
   <button type="submit">send message</button> <br> OR <br>



   <a href="{{ route('travel.file.accept',['id'=>$data->id]) }}" class="btn btn-warning btn-sm btn-just-icon">
    <i style="color:green" class="material-icons">Accept file</i></a>

       </form>
@endif
</body>
</html>

