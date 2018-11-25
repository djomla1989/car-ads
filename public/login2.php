<?php require_once '../includes/includes.php';

  $session=new Session();
              if($session->is_logged_in())
                      {
                        echo "<a href='logout.php'>Ulogovani ste</a>";
                      }
                      else "Niste ulogovani";
              if(isset($_POST['login']))
                  {
                    if(!$session->is_logged_in())
                            {

                                $user=User::authenticate($_POST['user_name'], $_POST['password']);
                                if($user)
                                    {
                                        $session->login($user);
                                        redirect_to('index.php');

                                    }
              else {
                         echo "Ne postoji ovakav user";
                   }
                            }
                            else echo $_SESSION['username']. " je vec ulogovan";
                  }

    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Webiste</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/style_login.css" type="text/css" media="all" />
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
                    <div class="box">
				<h2>Login</h2>                 
                               <div id="leftSide">
				  <fieldset>
                                            <legend>Login details</legend>
                                            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" class="form">
                                              <label for="username">Username</label>
                                                <div class="div_texbox">
                                                <input name="user_name" type="text" class="username" id="username" value="username" />
                                                    </div>
                                                     <label for="password">Password</label>
                                                <div class="div_texbox">
                                                <input name="password" type="password" class="password" id="password" value="password" />
                                                    </div>
                                                     <div style="padding: 10px 10px 10px 10px; margin: 10px 10px 10px 10px;">
                                                        
                                                        <input name="login" type="submit" value="Submit" class="buttons" />
                                                    </div>
                                            </form>
                                </fieldset>
                                </div>                   
			</div>
			
		</div>
		<!-- End Main -->
		
		<div class="cl">&nbsp;</div>
	</div>
	<!-- End Content -->
	
	<!-- Footer -->
	<div id="footer">
		<p>&copy; Sitename.com. Design by <a href="http://chocotemplates.com">ChocoTemplates.com</a></p>
	</div>
	<!-- End Footer -->
</div>
<!-- End Shell -->
</body>
</html>