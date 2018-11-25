	<div id="right_sidebar">

			
                            <?php
                                $car_last_added=Car::find_all();
                                shuffle(&$car_last_added);
                                $car_array = array_slice($car_last_added, 0, 5, TRUE)
                               

                            ?>
				<h2>Slucajni</h2>
                                <ul style="list-style: none">
                                    <?php
                            foreach ($car_array as $car )
                                {
                                 $car->setNames();
                                 echo "<li><a href='detaljan-pregled.php?id={$car->car_id}'>{$car->car_makes_name} {$car->car_model_name}</a></li>";
                                }
                                    ?>
				</ul>
				<div class="cl">&nbsp;</div>
		

		</div>