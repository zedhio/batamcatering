</section>
<footer id="footer">
	<?php echo "©2017 - " . (int)date('Y'). " Batam Catering. Al Fath Batam" ?>
</footer>
<!-- Page Loader -->
<div class="page-loader">
	<div class="preloader pls-blue">
		<svg class="pl-circular" viewBox="25 25 50 50">
			<circle class="plc-path" cx="50" cy="50" r="20"/>
		</svg>
		<p>Please wait...</p>
	</div>
</div>
<!-- Javascript Libraries -->
<script src="<?php echo base_url("assets/admin/js/jquery.min.js"); ?>" ></script>
<script src="<?php echo base_url("assets/admin/js/bootstrap.min.js"); ?>" ></script>
<script src="<?php echo base_url("assets/admin/js/jquery.flot.js"); ?>" ></script>
<script src="<?php echo base_url("assets/admin/js/jquery.flot.resize.js"); ?>" ></script>
<script src="<?php echo base_url("assets/admin/js/curvedLines.js"); ?>" ></script>
<script src="<?php echo base_url("assets/admin/js/jquery.sparkline.min.js"); ?>" ></script>
<script src="<?php echo base_url("assets/admin/js/jquery.easypiechart.min.js"); ?>" ></script>
<script src="<?php echo base_url("assets/admin/js/moment.min.js"); ?>" ></script>
<script src="<?php echo base_url("assets/admin/js/bootstrap-select.js"); ?>" ></script>
<script src="<?php echo base_url("assets/admin/js/fullcalendar.min.js"); ?>" ></script>
<script src="<?php echo base_url("assets/admin/js/jquery.simpleWeather.min.js"); ?>" ></script>
<script src="<?php echo base_url("assets/admin/js/waves.min.js"); ?>" ></script>
<script src="<?php echo base_url("assets/admin/js/bootstrap-growl.min.js"); ?>" ></script>
<script src="<?php echo base_url("assets/admin/js/jquery.mCustomScrollbar.concat.min.js"); ?>" ></script>
<script src="<?php echo base_url("assets/admin/js/bootstrap-notify.min.js"); ?>" ></script>
<script src="<?php echo base_url("assets/admin/js/chosen.jquery.js"); ?>" ></script>
<!-- datatable -->
<script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" >
	$(function () {
		$(".chosen").chosen();
		$('#myTable').DataTable();
	});
</script>
<script src="<?php echo base_url("assets/admin/js/app.min.js?1568650061"); ?>"></script>
<script src="<?php echo base_url("assets/admin/ckeditor/ckeditor.js"); ?>"></script>
<!-- <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js" defer></script> -->
<script>
	CKEDITOR.replace( 'deskripsi' );
	CKEDITOR.replace( 'faq' );
	CKEDITOR.replace( 'tentang' );
	CKEDITOR.replace( 'testimoni' );
</script>
</body>
</html>