<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <form action="{{ route('travel.filesNeeded.action') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1>  airline trip  Files Form</h1>

<input type="hidden" name="type" value="{{ $type }}">{{-- parent/child --}}
<input type="hidden" name="trip_id" value="{{ $id }}"> {{-- trip id --}}
<input type="hidden" name="patient_id" value="{{ $userInfo->id }}"> {{-- patient id --}}

<label for="">Full name:</label>
<input type="text" name="name" value="{{ $type== 'parent'?$userInfo->name:'' }}"  ><br><br>
<span style="color: red">@error('name'){{ $message }} @enderror</span><br>

<label for="">Phone Number:</label>
<input type="text" name="phone" value="{{ $type== 'parent'?$userInfo->mobile:'' }}" ><br><br>
<span style="color: red">@error('phone'){{ $message }} @enderror</span><br>

<label for="">Passport image :</label>
<input type="file" name="passport" ><br><br>
<span style="color: red">@error('passport'){{ $message }} @enderror</span><br>

<label for="">Ministry of Health Acceptence Image :</label>
<input type="file" name="ministry_of_helath" ><br><br>
<span style="color: red">@error('ministry_of_helath'){{ $message }} @enderror</span><br>


<label for="">Visa Image :</label>
<input type="file" name="visa" ><br><br>
<span style="color: red">@error('visa'){{ $message }} @enderror</span>


@if ($type == 'parent')
<label for="doctor">Number of passengers: </label>
<select name="passengers" aria-valuemin="0" required>
    <option value="0">No person</option>
    <option value="1">One person</option>
    <option value="2">Two persons</option>
</select><br><br>
@endif

<button type="submit">Save</button>
    </form>
</body>
</html>

