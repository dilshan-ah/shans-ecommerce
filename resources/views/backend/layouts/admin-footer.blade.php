<script src="{{asset('backend')}}/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{asset('backend')}}/assets/js/jquery.min.js"></script>
	<script src="{{asset('backend')}}/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{asset('backend')}}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{asset('backend')}}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

	<script src="{{asset('backend')}}/assets/plugins/highcharts/js/highcharts.js"></script>
	<script src="{{asset('backend')}}/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>

	<script src="{{asset('backend')}}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="{{asset('backend')}}/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src="{{asset('backend')}}/assets/plugins/notifications/js/lobibox.min.js"></script>

	
	<script>
		$(document).ready(function() {
			$('#Transaction-History').DataTable({
				lengthMenu: [[6, 10, 20, -1], [6, 10, 20, 'Todos']]
			});
		  } );
	</script>
	<script src="{{asset('backend')}}/assets/js/dashboard-eCommerce.js"></script>
	<!--app JS-->
	<script src="{{asset('backend')}}/assets/js/app.js"></script>
	<script>
		new PerfectScrollbar('.product-list');
		new PerfectScrollbar('.customers-list');
	</script>
	<script src="{{asset('backend')}}/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>
	<script>
		$(document).ready(function () {
			$('#image-uploadify').imageuploadify();
		})
	</script>

	<script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
</body>

</html>