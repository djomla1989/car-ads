	               <form action="" class="search" method="post">
				<div class="cl">&nbsp;</div>
				<input type="text" class="field blink" value="search" title="search" />
				<div class="btnp"><input type="submit" value="go" /></div>
				<div class="cl">&nbsp;</div>
			</form>
			<!-- End Search -->
			
			<!-- Sign In Links -->
			<?php if(isset($_SESSION['username']) && ($_SESSION['user_status']==1))
                            {?>
                         <div class="links_login">
				<div class="cl">&nbsp;</div>
				<?php
                                   echo $_SESSION['username']." doborosoli na AutoPortal<br/><a style='font-size: 13px; 'href='../logout.php'>Log out</a>";
                             
                                ?>
				<div class="cl">&nbsp;</div>
			 </div>

                        <?php
                        }
                        else {
                        ?>
                            <div class="links">
				<div class="cl">&nbsp;</div>
				<a href="login.php" class="left">Sign In</a>				
				<div class="cl">&nbsp;</div>
			    </div>
                        <?php } ?>
                        <div class="cl">&nbsp;</div>
                    <div class="box_search">
				<h2>Pretraga</h2>
				<ul>
				   
				    <?php $database= new MySqlDatabase();
                                    $models=array();
                                    $models_id=array();
                                    
                                    $rez=$database->query("SELECT * FROM car_makes order by car_name");

                                    while ($car_list=$database->fetch_array($rez))
                                        { 
                                        
                                       // $models[$bla['car_makes_id']].="\"" .$bla["car_model_name"]."\", ";
                                       // $models_id[$bla['car_makes_id']].="\"" .$bla['car_model_id']."\", ";
                                       
                                       echo "<li><a href='admin_edit.php?sr_mark=".$car_list['car_makes_id']."&sr_model=&page=1'><h3>".$car_list['car_name']."</h3></a></li>";
                                        }
                                        //$niz=array($models,$models_id);
                                   //print_r($niz);

                                    ?>			   
                             
				
				</ul>
				
				<div class="cl">&nbsp;</div>
			</div>
                        	<div class="box">
				<h2>Latest Reviews</h2>
				<ul>
      
				   
				</ul>
				<a href="#" class="up">See more</a>
				<div class="cl">&nbsp;</div>
			</div>