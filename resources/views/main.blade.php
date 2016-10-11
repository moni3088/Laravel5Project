<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._head')
</head>
<body>

@include('partials._nav')

@yield('jumbotron')

<div class="container">

    @yield('content')

</div>
<!-- end of .container -->

@include('partials._footer')

@include('partials._javascript')

</body>

</html>