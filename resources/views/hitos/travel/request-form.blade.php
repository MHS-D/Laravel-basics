<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
            <span style="color: red">@error('doctor_id'){{ $message }} @enderror</span>

            @foreach ($doctors as $doctor)
                @php
                // get doctor name
                $name = DB::table('users')->where('id',$doctor->doctor_id)->value('name');
                //get doctor medical center id
                $medical_center_id = DB::table('medical_centers_staffs')
                                    ->where('user_id',$doctor->doctor_id)->value('medical_center_id');
                @endphp
            <option id="doctor" value="{{ $doctor->doctor_id }}">{{ $name }}</option>
            @endforeach
        </select><br><br>


        <label for="">To medical center: </label>
        <select name="medical_id" id="medical" ></select><br>
        <input type="button" id="btn" value="show medical centers">
        <br><br>

        <input type="checkbox" name="urgent" value="1">
        <label for="urgent"> Is Urgent</label>

        <input type="checkbox" name="oxygen" value="1">
        <label for="oxygen">Need Oxygen </label>

        <input type="checkbox" name="chair" value="1" >
        <label for="chair"> Need Chair</label><br><br>

        <button type="submit">Send Request</button>

    </form>

    <script>
        $(document).ready(function(){
          // Search by userid
          $('#btn').click(function(){
             var userid = Number($('#doctor').val());

         if(userid > 0){
           fetchRecords(userid);
         }
         else{
          console.log("no user id is null or 0")
         }

          });

        });

        function fetchRecords(id){
          $.ajax({
            url: '/travel/getmedical_center/'+id,
            type: 'get',
            dataType: 'json',
            success: function(response){

              var len = 0;
              $('#medical option').remove(); // Empty <select>
              if(response['data'] != null){
                 len = response['data'].length;
              }
              console.log(len);
              if(len > 0){
                 for(var i=0; i<len; i++){
                    var id = response['data'][i].id;
                    var name = response['data'][i].name;

                    var tr_str = " <option value='"+id+"'>"+name+"<option>";

                    $("#medical").append(tr_str);
                 }
              }else{
                var tr_str = " <option>No medical center for this dr </option>";

                 $("#medical").append(tr_str);
              }

            }
          });
        }
        </script>

</body>
</html>
