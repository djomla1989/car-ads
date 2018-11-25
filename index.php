<?php require_once '/includes/includes.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Webiste</title>
	<link rel="stylesheet" href="public/css/style.css" type="text/css" media="all" />
	<!--[if IE]>
		<style type="text/css" media="screen">
			.shell {background-image: none;filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='css/images/shell-bg.png', sizingMethod='scale');}
			.box{background-image: none;filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='css/images/dot.png', sizingMethod='scale');}
			.transparent-frame .frame{background-image: none;filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='css/images/transparent-frame.png', sizingMethod='image');}
			.search .field{padding-bottom:9px}
		</style>
	<![endif]-->
	<script src="/public/js/jquery-1.6.4.min.js" type="text/javascript"></script>
	<script src="/public/js/jquery-func.js" type="text/javascript"></script>
     

</head>
    <body onload="update_year();">

<!-- Shell -->
<div class="shell">
	
	<!-- Header -->
	<?php include_layout_template('header.php'); ?>
	<!-- End Header -->
	
	
	<!-- Content -->
	<div id="content">
		
		<!-- Sidebar -->
		<?php include_layout_template('left_sidebar.php'); ?>
		<!-- End Sidebar -->
		
		
		<!-- Main -->
                <div id="main">
		<?php include_layout_template('main.php'); ?>
                    </div>
		<!-- End Main -->
		
		<div class="cl">&nbsp;</div>
	</div>
	<!-- End Content -->
	
	<!-- Footer -->
	<?php include_layout_template('footer.php'); ?>
	<!-- End Footer -->
</div>
<!-- End Shell -->
</body>
</html>