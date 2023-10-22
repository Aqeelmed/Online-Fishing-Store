<!DOCTYPE html>
<html lang="en" style="font-size:16px;">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sea-Bass</title>
    
</head>

@include('layout.head')

<body>
    <div class="loader">
      <img style="width: 20%" src="{{asset('images/circles.svg')}}"/>
    </div>
    @include('layout.navbar')
    @yield('content')
    @include('layout.footer')
    @include('layout.script')
</body>

</html>