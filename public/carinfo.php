<?php require_once '../includes/includes.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Webiste</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!--[if IE]>
		<style type="text/css" media="screen">
			.shell {background-image: none;filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='css/images/shell-bg.png', sizingMethod='scale');}
			.box{background-image: none;filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='css/images/dot.png', sizingMethod='scale');}
			.transparent-frame .frame{background-image: none;filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='css/images/transparent-frame.png', sizingMethod='image');}
			.search .field{padding-bottom:9px}
		</style>
	<![endif]-->
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="js/jquery-func.js" type="text/javascript"></script>
     

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
		<div id="sidebar">
			
			<!-- Search -->
		
			<!-- End Sign In Links -->
			<?php include_layout_template('box.php'); ?>
			<!-- Box Latest News -->
		
			<!-- End Box Latest News -->
			
			<!-- Box Latest Reviews -->
		
			<!-- End Box Latest Reviews -->
			
			<!-- Box Latest Posts -->
			<div class="box">
				<h2>Latest Posts</h2>
				<ul>
				    <li>
				    	<h5><a href="#">Lorem ipsum dolo</a></h5>
				    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed elementum molestie urna, id scelerisque leo </p>
				    </li>
				    <li>
				    	<h5><a href="#">Dolor amet urna isque</a></h5>
				    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed elementum molestie urna, id scelerisque leo </p>
				    </li>
				    <li>
				    	<h5><a href="#">Molestie id sceler leo</a></h5>
				    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed elementum molestie urna, id scelerisque leo </p>
				    </li>
				    <li>
				    	<h5><a href="#">Sed elementum molesti</a></h5>
				    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed elementum molestie urna, id scelerisque leo </p>
				    </li>
				    <li>
				    	<h5><a href="#">Sed elementum molesti</a></h5>
				    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed elementum molestie urna, id scelerisque leo </p>
				    </li>
				</ul>
				<a href="#" class="up">See more</a>
				<div class="cl">&nbsp;</div>
			</div>
			<!-- End Box Latest Posts -->
			
		</div>
		<!-- End Sidebar -->
		
		
		<!-- Main -->
                <div id="main">
                    <div class="box">
                        <h2>Karakteristike vozila</h2>
                        Neki tekst</div>
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