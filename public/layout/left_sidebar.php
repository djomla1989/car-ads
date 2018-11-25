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
                            <?php
                                $car_last_added=Car::find_all();                                
                                $car_last_added=array_shift($car_last_added);
                                $car_last_added->setNames();
                                
                            ?>
				<h2>Poslednje</h2>
				<ul>
				    <li>
                                        <a href="#" class="image"><img src='<?php echo "images/".$car_last_added->car_pictures[0]; ?>' alt="" height="100px" width="140px"/></a>
				    	<div class="info">
					    	<h5><a href="#"><?php echo $car_last_added->car_makes_name." ".$car_last_added->car_model_name; ?></a></h5>
					    	<p><?php echo $car_last_added->car_description ?></p>
					    </div>
				    	<div class="cl">&nbsp;</div>
				    </li>
				
				</ul>
				<div class="cl">&nbsp;</div>
			</div>
			<!-- End Box Latest Posts -->

		</div>