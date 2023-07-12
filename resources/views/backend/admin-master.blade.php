@include('backend/layouts/admin-header');
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@include('backend/layouts/admin-sidenav');
		<!--end sidebar wrapper -->
		<!--start header -->
		@include('backend/layouts/admin-nav');
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
            <div class="page-content">
                @yield('admin-section')
            </div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2021. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	@include('backend/layouts/admin-setting');
	<!--end switcher-->
	<!-- Bootstrap JS -->
@include('backend/layouts/admin-footer');