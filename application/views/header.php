<!DOCTYPE html>
<html lang="en">
<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo "ระบบสารสนเทศการฝึกงาน-ฝึกอาชีพวิทยาลัยเทคนิคชลบุรี"?></title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <?php 
   
         $css_url = "themes/ace_admin/css/";
         $asset_url = "themes/ace_admin/";
         $js_url = "themes/ace_admin/js/";
        ?>
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() . $asset_url; ?>font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>colorbox.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>bootstrap-colorpicker.min.css" />
		<!-- <link rel="stylesheet" href="assets/css/bootstrap-colorpicker.min.css" /> -->

		<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>dropzone.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo base_url() . $js_url; ?>ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		<script src="<?php echo base_url() . $js_url; ?>jquery-2.1.4.min.js"></script>

        <script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url() . $js_url; ?>jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

        <script src="<?php echo base_url() . $js_url; ?>wizard.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>jquery.validate.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>jquery-additional-methods.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>bootbox.js"></script>

		<script src="<?php echo base_url() . $js_url; ?>spinbox.min.js"></script>

		<script src="<?php echo base_url() . $js_url; ?>jquery.maskedinput.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>select2.min.js"></script>

		<script src="<?php echo base_url() . $js_url; ?>jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>jquery.dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>dataTables.buttons.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>buttons.flash.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>buttons.html5.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>buttons.print.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>buttons.colVis.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>dataTables.select.min.js"></script>


		<script src="<?php echo base_url() . $js_url; ?>jquery-ui.custom.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>jquery.easypiechart.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>jquery.sparkline.index.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>jquery.flot.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>jquery.flot.pie.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>jquery.flot.resize.min.js"></script>



		

		<script src="<?php echo base_url() . $js_url; ?>dropzone.min.js"></script>

		<script src="<?php echo base_url() . $js_url; ?>bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url() . $js_url; ?>jquery.colorbox.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>bootstrap-colorpicker.min.js"></script>

		<!-- ace scripts -->
		<script src="<?php echo base_url() . $js_url; ?>ace-elements.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>ace.min.js"></script>
	</head>