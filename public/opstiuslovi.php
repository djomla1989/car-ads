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
<body>

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
			
			<!-- Box Latest News -->
		<?php include_layout_template('box.php'); ?>
			<!-- End Box Latest News -->
			
			<!-- Box Latest Reviews -->
			<div class="box">
				<h2>Latest Reviews</h2>
				<ul>
				    <li>
				    	<a href="#" class="image"><img src="css/images/thumb5.jpg" alt="" /></a>
				    	<div class="info">
					    	<h5><a href="#">Lorem ipsum dolo</a></h5>
					    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed elementum molestie urna, id scelerisque leo </p>
					    </div>	
				    	<div class="cl">&nbsp;</div>
				    </li>
				    <li>
				    	<a href="#" class="image"><img src="css/images/thumb6.jpg" alt="" /></a>
				    	<div class="info">
					    	<h5><a href="#">Dolor amet urna isque</a></h5>
					    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed elementum molestie urna, id scelerisque leo </p>
					    </div>	
				    	<div class="cl">&nbsp;</div>
				    </li>
				    <li>
				    	<a href="#" class="image"><img src="css/images/thumb7.jpg" alt="" /></a>
				    	<div class="info">
					    	<h5><a href="#">Molestie id sceler leo</a></h5>
					    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed elementum molestie urna, id scelerisque leo </p>
					    </div>	
				    	<div class="cl">&nbsp;</div>
				    </li>
				    <li>
				    	<a href="#" class="image"><img src="css/images/thumb8.jpg" alt="" /></a>
				    	<div class="info">
					    	<h5><a href="#">Sed elementum molesti</a></h5>
					    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed elementum molestie urna, id scelerisque leo </p>
					    </div>	
				    	<div class="cl">&nbsp;</div>
				    </li>
				</ul>
				<a href="#" class="up">See more</a>
				<div class="cl">&nbsp;</div>
			</div>
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
                    <?php
                    if(isset($_POST['Register']))
                            {
                       $new_user=new User();
                       $new_user->first_name=$_POST['f_name'];
                       $new_user->last_name=$_POST['l_name'];
                       $new_user->password=$_POST['password'];
                       $new_user->username=$_POST['username'];
                       $new_user->user_email=$_POST['email'];
                       $new_user->user_phone=$_POST['telefon'];
                       $new_user->user_status=2;
                       
                      $new_user->provera($_POST['password_confirmation']);
                       }
                       
      
                      
                    ?>

                    <div class="box">
                        <form name="registracija" method="POST" action="<?php print $_SERVER['PHP_SELF']; ?>"
                              enctype="multipart/form-data">
			         <table>
                            <tr style=" width: 100%" >
                                <td colspan="2" style="text-align:center; font-size: 14px;padding: 10px 0px 10px 0px;">
                                    <strong>Registracija</strong></td>
                         </tr>
                           <tr>
                               <td>First Name:</td>
                               <td><input type="text" name="f_name"/></td>
                            </tr>
                             <tr>
                               <td>Last Name:</td>
                               <td><input type="text" name="l_name"/></td>
                            </tr>
                           <tr>
                               <td> User name:  </td>
                               <td><input type="text" name="username"/></td>
                            </tr>
                           <tr>
                               <td>Password:</td>
                               <td><input type="password" name="password"/></td>
                            </tr>
                           <tr>
                               <td>Re password: </td>
                               <td><input type="password" name="password_confirmation"/></td>
                            </tr>
                              <tr>
                               <td> Phone:</td>
                               <td><input type="text" name="telefon"/></td>
                                </tr>
                           <tr>
                               <td> E-mail:</td>
                               <td><input type="text" name="email"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:center; padding: 10px 0px 10px 65px;"><input type="submit" value="Register" name="Register"/>
                                    <input type="reset" value="Reset"/></td>
                                    
                               </tr>

                       </table>
                            </form>
				<div class="cl">&nbsp;</div>
			</div>
			
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