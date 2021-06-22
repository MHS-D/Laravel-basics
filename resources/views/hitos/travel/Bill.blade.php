<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
</head>
@php
    $from = DB::table('users')->where('id',$case->patient_id)->value('country_id')
@endphp
<body>
    <form action="{{ route('travel.sendRequest') }}" method="POST">
        @csrf
        <h1>Travel Request Form</h1> <br><br>
        <label for="case_id">Case ID: </label>
        <input type="text" name="case_id" value="{{ $case->id }}" readonly> <br><br>

        <label for="patient_id">Patient ID: </label>
        <input type="text" name="patient_id" value="{{ $case->patient_id }}" readonly> <br><br>

        <label for="country_id">Country ID: </label>
        <input type="text" name="country_id" value="{{ $from }}" readonly> <br><br>

        <label for="reason">Reason: </label>
        <textarea name="reason" cols="40" rows="5"></textarea><br><br>
        <span style="color: red">@error('reason'){{ $message }} @enderror</span>

        <label for="doctor">To Doctor: </label>
        <select  class="form-control" name="doctor_id" required>
            <option id="doctor" value="{{ $doctor->doctor_id }}">{{ $name }}</option>
        </select><br><br>


        <label for="">To medical center: </label>
        <select name="medical_id" id="medical" ></select><br>
        <br><br>

        <input type="checkbox" name="urgent" value="1">
        <label for="urgent"> Is Urgent</label>

        <input type="checkbox" name="oxygen" value="1">
        <label for="oxygen">Need Oxygen </label>

        <input type="checkbox" name="chair" value="1" >
        <label for="chair"> Need Chair</label><br><br>

        <button type="submit">Send Request</button>

    </form>




</body>
</html>
