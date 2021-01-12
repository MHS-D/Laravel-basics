{{-- <h1>HELLO {{$user}}</h1>
 --}}
 
 
 {{-- <h1>hello {{count($value)}} </h1> --}}
 
 {{-- {{10+10}} --}}
 
 {{--  @if ($value == "mhs")
 <h1>hello {{$value}}</h1>
 
 @elseif ($value == "sam")
 <h1>la hala w la marhaba {{$value}}</h1>
 
 @else 
 <h1>MA FE 7AGA KDA</h1>
 @endif --}}
 
 
 {{--  @for ($i = 0; $i < 10; $i++)
    <h1>{{$i}}<h1/>
        @endfor --}}
        
        {{--  <?php 
 echo "mhs";
 ?> --}}

<x-header data="user component header" />
<h1>User page</h1>

 @foreach ($values as $value)
    <h1>{{$value}}</h1> 
 @endforeach