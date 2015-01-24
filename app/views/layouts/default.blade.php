<!doctype html>
<html>
<head>
    @include('includes.head')
    @yield('cssfile')
</head>
<body>  
	@include('includes.header')

    @yield('content')
    
    @include('includes.footer')
    @yield('jsfile')
</body>
</html>