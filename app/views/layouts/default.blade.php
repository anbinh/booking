<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>


<div>    
        @include('includes.header')
    </div>

   <div>

            @yield('content')

   </div>

<div>
        @include('includes.footer')
  </div>


</body>
</html>