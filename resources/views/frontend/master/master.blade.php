<!DOCTYPE html>
<html>

<head>
    @include('frontend/master/layouts/head')
</head>
<body>
	<!-- header -->
	@include('frontend/master/layouts/header')
	<!-- end header -->
    
	<!--main-->
	@yield('main')
	<!-- end main-->


    <!-- subcribe -->
	@include('frontend/master/layouts/subcribe')
	<!--/. end subcribe -->

    <!-- footer -->
    @include('frontend/master/layouts/footer')
    <!--/. end footer -->

</body>

</html>