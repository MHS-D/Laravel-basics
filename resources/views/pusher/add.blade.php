<!DOCTYPE html>
<html lang="en">
<head>
   <script src="{{asset('js/app.js')}}"></script>

</head>
<body>
    <form action="realtime" method="POST">
        @csrf
        
        <input type="text" name="message" placeholder="enter username"> <br> <br>
        
        <button type="submit">submit</button>
        </form>
</body>
</html>
