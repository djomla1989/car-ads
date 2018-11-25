<div id="header">
		<!-- Logo -->
		<h1 id="logo"><a href="#">autoportal your friend on the road</a></h1>
		<!-- End Logo -->

		<!-- Navigation -->
		<div id="nav">
			<ul>
                            <li><a href="../index.php" <?php echo ($_SERVER['PHP_SELF']=='/DiplomskiRad/public/index.php' ? "class='active'":''); ?> >Home</a></li>
                            <li><a href="../add_product.php" <?php echo ($_SERVER['PHP_SELF']=='/DiplomskiRad/public/add_product.php' ? "class='active'":''); ?>>Dodaj oglas</a></li>
			    <li><a href="../opstiuslovi.php" <?php echo ($_SERVER['PHP_SELF']=='/DiplomskiRad/public/opstiuslovi.php' ? "class='active'":''); ?> >Opsti uslovi</a></li>
			    <li><a href="../contact.php" <?php echo ($_SERVER['PHP_SELF']=='/DiplomskiRad/public/contact.php' ? "class='active'":''); ?> >Kontakt</a></li>
                            <li><a href="../register.php" <?php echo ($_SERVER['PHP_SELF']=='/DiplomskiRad/public/register.php' ? "class='active'":''); ?> >Register</a></li>
                            <?php
                            if(isset($_SESSION['username']) && $_SESSION['user_status']==1)
                                {
                                ?>
                                      <li><a href="admin.php" <?php echo ($_SERVER['PHP_SELF']=='/DiplomskiRad/public/admin/admin.php' ? "class='active'":''); ?> >Admin</a></li>
                                <?php
                                      }
                                ?>
			</ul>                  
		</div>
		<!-- End Navigation -->

	</div>
