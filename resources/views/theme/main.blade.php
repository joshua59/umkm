<!DOCTYPE html>
<html dir="ltr" lang="en-US">
@include('theme.head')
<body class="stretched">
	<!-- Document Wrapper ============================================= -->
	<div id="wrapper" class="clearfix">
		<!-- Header ============================================= -->
		@include('theme.header')
        <!-- #header end -->
		<!-- Content ============================================= -->
		@yield('content')
        <!-- #content end -->
		<!-- Footer ============================================= -->
		@include('theme.footer')
        <!-- #footer end -->
	</div>
    <!-- #wrapper end -->
	<!-- Go To Top ============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>
	<!-- JavaScripts============================================= -->
	@include('theme.modal')
	@include('theme.script')
    @yield('custom_js')
</body>
</html>