
    <div class="upper_main">
        <div class="advanced_search">
            <script>
                 $(document).ready(function() {
               $('.sr_mark').change(function() {
                   var car_makes_id= $(this).val();
                   var s= document.getElementById('sr_model');
                   $('#sr_model >option').remove();
                   var url = location.href;
                   //var baseURL = url.substring(0, url.indexOf('/', 14));
                   //url=baseURL+"/DiplomskiRad/includes/handler.php?call_json=CarModels/find_all_by_makes_id/"+car_makes_id;
                   url="../includes/handler.php?call_json=CarModels/find_all_by_makes_id/"+car_makes_id;
                   
                  $.ajax({
                          type: "GET",
                          url: url,
                          async: false,
                          dataType:'json',
                          success:  function(data) {
                                var sel = $("#select");
                                sel.empty();
                                s.options[s.options.length]= new Option("Sve","");
                                for (var i=0; i<data.length; i++) {
                                 s.options[s.options.length]= new Option(data[i].car_model_name, data[i].car_model_id);

                                }
                                }
                        });

                 });
                 });
            </script>
            <form name='sr_auto' method="GET" action="simple.php">
                          Proizvodjaci <br>
                       <select class="sr_mark" name='sr_mark'>
                           <option value="">Sve</option>
                                        <?php

                                        $car_makes_array = CarMakes::find_all();
                                        
                                        foreach ($car_makes_array as $car_makes )
                                        {
                                        echo "<option value='".$car_makes->car_makes_id."'>".$car_makes->car_name."</option>";
                                        }
                                        ?>

                                            </select>                          
                                      <br> Modeli<br> <select id="sr_model" name='sr_model'>
                                          <option value="">Izaberi model</option>

                                      </select>
                             <!-- Script for adding models to option list-->

                             <br> Godina proizvodnje <br>
                             <select name="year_from" style="width: 55px;">
                                 <option value="1950"> Sve </option>
                             </select>  -  <select name="year_to" style="width: 55px;">
                                 <option value="2011"> Sve </option>
                             </select>
                             <!-- Script for adding years-->
                             <br>
                             <input type="Submit" name="Trazi" value="Trazi"/>
                             <input type="hidden" name="page" value="1"/>
   <script>
              var all_years = new Array();
              all_years=["Sve","2011","2010","2009","2008","2007","2006","2005","2004","2003","2002","2001","2000","1999","1998","1997","1996","1995","1994","1993","1992","1991","1990","1989","1988","1987","1986","1985","1984","1983","1982","1981","1980","1979","1978","1977","1976","1975","1974","1973","1972","1971","1970","Ispod 1970"];
             var year_from = document.sr_auto.year_from;
              var year_to = document.sr_auto.year_to;
        function update_year()
             {
                 for(i=1;i<all_years.length;i++)
                   {
                     year_from.options[i] = new Option(all_years[i], all_years[i]);
                     year_to.options[i] = new Option(all_years[i], all_years[i]);
                  }
             }

    </script>
        </form>
        </div>
    <div class="transparent-frame">
        <!--Slide show script-->
               <script language="JavaScript1.1">
                        <!--

                            /*
                            JavaScript Image slideshow:
                            By JavaScript Kit (www.javascriptkit.com)
                            Over 200+ free JavaScript here!
                            */

                            var slideimages=new Array()                            
                      function slideshowimages(){
                            for (i=0;i<slideshowimages.arguments.length;i++)
                            {
                                 slideimages[i]=new Image()
                                 slideimages[i].src=slideshowimages.arguments[i]
                            }
                                                }

                    

                     function gotoshow(){
                            if (!window.winslide||winslide.closed)
                            winslide=window.open(slidelinks[whichlink])
                            else
                            winslide.location=slidelinks[whichlink]
                            winslide.focus()
                            }
//-->
                    </script>
       <img src="food1.jpg" name="slide" border=0 width=393 height=252>
        <script>
        <!--

                    //configure the paths of the images, plus corresponding target links
                    slideshowimages("css/images/car1.jpg","css/images/car2.jpg","css/images/car3.jpg","css/images/car4.jpg","css/images/car5.jpg");
                    //configure the speed of the slideshow, in miliseconds
                    var slideshowspeed=4000;

                    var whichimage=0;
                function slideit(){
                    if (!document.images)
                    return;
                        document.images.slide.src=slideimages[whichimage].src;                      
                    if (whichimage<slideimages.length-1)
                         whichimage++;
                    else
                          whichimage=0;
                    setTimeout("slideit()",slideshowspeed);
                                 }
                    slideit();

        //-->
        </script>

			</div>
    </div>
			<!-- Top Image -->
			
			
			<div class="cl">&nbsp;</div>
			<!-- End Top Image -->


			<!-- Box -->
			<div class="box">
                         <?php if(isset($_SESSION['username']))
                                 {?>
				<h2>Tuning</h2>
				<ul class="line">
				    <li>
				    	<a class="frm" href="#"><img src="css/images/car1.jpg" alt="" /></a>
				    	<a href="#">Sed elementum molesti</a>
		    		</li>
		    		<li>
				    	<a class="frm" href="#"><img src="css/images/car2.jpg" alt="" /></a>
				    	<a href="#">Dolor amet urna isque</a>
		    		</li>
		    		<li>
				    	<a class="frm" href="#"><img src="css/images/car3.jpg" alt="" /></a>
				    	<a href="#">Lorem ipsum dolo</a>
		    		</li>
				</ul>
				<div class="cl">&nbsp;</div>

                             <?php }else echo "nema nista sine, nisi ulogovan"; ?>

			</div>
			<!-- End Box -->

			<!-- Box -->
			<div class="box">
				<h2>Poslednje dodati</h2>
                             <ul>
                                <?php
                                      // 1. the current page number ($current_page)
                                        $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

                                        // 2. records per page ($per_page)
                                        $per_page = 5;

                                        // 3. total record count ($total_count)
                                        $total_count = Car::count_all();

                                        $pagination = new Pagination($page, $per_page, $total_count);

                                    $car_array=Car::find_all_pagination($per_page,$pagination->offset());
                                     
                                    foreach ($car_array as $car_obj):
                                        $car_obj->setNames();
                                    

                                ?>
				
				      <li>
				    	<a href="detaljan-pregled.php?id=<?php echo $car_obj->car_id?>" class="image"><img src='<?php echo "images/".$car_obj->car_pictures[0]; ?>' alt="" /></a>

                                        <table border=0 cellspacing="0" cellpadding="0" width="422px" style="padding-left: 10px;">
                                             <tr>
                                                 <td class="nametitle" width="100%"colspan="4"><h3><a href="detaljan-pregled.php?id=<?php echo $car_obj->car_id?>"><?php echo $car_obj->car_makes_name." ".$car_obj->car_model_name; ?></a></h3></td>
                                            </tr>
                                            <tr>
					<td>
                                        <table width='100%' border=0>

                                            <tr>
                                                <td class='semititle'>Godina</td>
                                                <td class='detail'><?php echo $car_obj->car_age;?></td>
                                            </tr>

                                            <tr>
                                                <td class='semititle'>Menjac</td>
                                                <td class='detail'><?php echo $car_obj->car_transmission;?></td>
                                            </tr>
                                            <tr>
                                                <td class='semititle'>Tip vozila</td>
                                                <td class='detail'><?php echo $car_obj->type_name;?></td>
                                            </tr>
                                        </table>
                                        </td>
                                                <td>
                                                    <table width='100%' border=0>
                                                        <tr>
                                                            <td class='semititle'>Cena</td>
                                                            <td class='cenabold'><?php echo $car_obj->car_price;?> Eura</td>
                                                        </tr>
                                                        <tr>
                                                            <td class='semititle'>Gorivo</td>
                                                            <td class='detail'><?php echo $car_obj->car_fuel_name;?></td>
                                                        </tr>
                                                       <tr>
                                                           <td class='semititle'>Grad</td>
                                                            <td class='detail'><?php echo $car_obj->owner_info->owner_city;?></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                    </table>

				    	<div class="cl">&nbsp;</div>
				    </li>
                                      <?php  endforeach; ?>
				</ul>
				
				<div class="cl">&nbsp;</div>
                             <div id="pagination" style="clear: both; text-align: center">
                                        <?php

                                                if($pagination->total_pages() > 1) {

                                                        if($pagination->has_previous_page())
                                                                {
                                                                  echo "<a href=\"{$_SERVER['PHP_SELF']}?page=";
                                                                  echo $pagination->previous_page();
                                                                  echo "\">&laquo; Previous</a> ";
                                                                }

                                                        for($i=1; $i <= $pagination->total_pages(); $i++) {
                                                                if($i == $page) {
                                                                        echo " <span class=\"selected\">{$i}</span> ";
                                                                } else {
                                                                        echo " <a href=\"{$_SERVER['PHP_SELF']}?page={$i}\">{$i}</a> ";
                                                                }
                                                        }

                                                        if($pagination->has_next_page()) {
                                                                echo " <a href=\"{$_SERVER['PHP_SELF']}?page=";
                                                                echo $pagination->next_page();
                                                                echo "\">Next &raquo;</a> ";
                                            }

                                                }

                                        ?>
                                        </div>

			</div>
			<!-- End Box -->

		