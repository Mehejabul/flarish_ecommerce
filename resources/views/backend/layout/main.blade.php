<!DOCTYPE html>
<html lang="en" dir="ltr">

@includeIf('backend.layout.header')

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">

	<!--  WRAPPER  -->
	<div class="wrapper">

        @includeIf('backend.layout.sidenavbar')

		<!--  PAGE WRAPPER -->
		<div class="ec-page-wrapper">

			@includeIf('backend.layout.topnavbar')
            @yield('content')
			@includeIf('backend.layout.footer')
		</div> <!-- End Page Wrapper -->
	</div> <!-- End Wrapper -->
    @yield('js')
</body>

</html>
