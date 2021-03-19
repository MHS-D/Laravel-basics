<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ DB::table('website_settings')->value('title') }} | Home</title>
    <link  rel="icon" href="images/{{ DB::table('website_settings')->value('logo')}}"></head>
<body>
    <form action="name_logo" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">title</label>
        <input type="text" name="title"  > <br><br>
        <span style="color: red">@error('title'){{$message}}@enderror</span><br> 

        <label for="logo">choose logo</label>
  <input type="file" name="logo"  >
  <span style="color: red">@error('logo'){{$message}}@enderror</span><br> 

  <img id="previewImg" alt="profile image " src="{{asset('images')}}/{{DB::table('website_settings')->value('logo')}}" style="max-width: 130px; margin-top:20px;">
<br><br><button type="submit">Save</button>
    </form>
</body>
</html>