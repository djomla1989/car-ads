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
        <script src="js/multifile_compressed.js" type="text/javascript"></script>
        <script>
                 $(document).ready(function() {
               $('.sr_mark').change(function() {
                   var car_makes_id= $(this).val();
                   var s= document.getElementById('sr_model');
                   $('#sr_model >option').remove();
                   var url = location.href;
                   var baseURL = url.substring(0, url.indexOf('/', 14));
                   url=baseURL+"/DiplomskiRad/includes/handler.php?call_json=CarModels/find_all_by_makes_id/"+car_makes_id;

                  $.ajax({
                          type: "GET",
                          url: url,
                          async: false,
                          dataType:'json',
                          success:  function(data) {
                                var sel = $("#select");
                                sel.empty();
                                s.options[s.options.length]= new Option("Izaberi","0");
                                for (var i=0; i<data.length; i++) {
                                 s.options[s.options.length]= new Option(data[i].car_model_name, data[i].car_model_id);

                                }
                                }
                        });

                 });
                 });
            </script>
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
                    <br/>
                        <!-- Sve za registraciju -->
                        <form name='sr_auto' enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF']?>" method="POST">

                     
                            <h3>Karakteristike vozila</h3>
                                                         <hr/>

                                <table style="width: 600px; padding-left: 5px;">
                                    <tr>
                                        <td>
                                        <table cellspacing="1" cellpadding="0">
                                            <tr>
                                                 <td>
                                                     Proizvodac <span class="zvezdica">*</span>
                                                 </td>
                                            </tr>
                                             <tr>
                                                  <td>
                                                     <select class="sr_mark" name='sr_mark'>
                                                         <option value="0">Izaberi</option>
                                        <?php

                                        $car_makes_array = CarMakes::find_all();

                                        foreach ($car_makes_array as $car_makes )
                                        {
                                        echo "<option value='".$car_makes->car_makes_id."'>".$car_makes->car_name."</option>";
                                        }
                                        ?>

                                            </select>
                                                 </td>
                                            </tr>
                                     </table>
                                            </td>
                                        <td>
                             <table cellspacing="1" cellpadding="0">
                                        <tr>
                                            <td>
                                                Model <span class="zvezdica">*</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select id="sr_model" name='sr_model'>
                                                     <option value="0">Izaberi</option>
                                                 </select>
                                            </td>
                                                <!-- Script for adding models to option list-->
                                        </tr>
                              </table>
                                            </td>
                                        <td>
               <table cellspacing="1" cellpadding="0">
                                        <tr>
                                            <td>
                                                Godina proizvodnje <span class="zvezdica">*</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                    <select name="year"></select>
                                            </td>
                                        </tr>
               </table>
                 </td>
                 </tr>
                 <tr>
                     <td>
                             <table cellspacing="1" cellpadding="0">
                                                <tr>
                                                    <td>
                                                       Kubikaza (ccm) <span class="zvezdica">*</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" name="car_ccm" <?php if (isset($_POST['car_ccm'])) { ?> value="<?php echo $_POST['car_ccm']; ?>" <?php } ?>/>
                                                    </td>
                                                </tr>
                              </table>
               
                         </td>
                         <td>
                         <table cellspacing="1" cellpadding="0">
                                        <tr>
                                            <td>
                                                Predjeno km <span class="zvezdica">*</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" name="car_mileage" <?php if (isset($_POST['car_mileage'])) { ?> value="<?php echo $_POST['car_mileage']; ?>" <?php } ?>/>
                                            </td>
                                        </tr>
                         </table>
                         </td>
                         <td>
                         <table cellspacing="1" cellpadding="0">
                                        <tr>
                                            <td>
                                                Snaga kw <span class="zvezdica">*</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" name="car_kw" <?php if (isset($_POST['car_kw'])) { ?> value="<?php echo $_POST['car_kw']; ?>" <?php } ?>/>
                                            </td>
                                        </tr>
                      </table>
                      </td>
                 </tr>
                                 
         <!-- Script for adding years-->
                       <tr>
                          <td>
                                 <table cellspacing="1" cellpadding="0">
                                        <tr>
                                            <td>
                                                Gorivo <span class="zvezdica">*</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="car_fuel">
                                                      <option value="0">Izaberi...</option>
                                                      <option value="1" <?php if(isset($_POST['car_fuel']) && $_POST['car_fuel']==1) echo"selected"; ?>>Benzin</option>
                                                      <option value="2" <?php if(isset($_POST['car_fuel']) && $_POST['car_fuel']==2) echo"selected"; ?>>Benzin+TNT gas</option>
                                                      <option value="3" <?php if(isset($_POST['car_fuel']) && $_POST['car_fuel']==3) echo"selected"; ?>>Bezolovni</option>
                                                      <option value="4" <?php if(isset($_POST['car_fuel']) && $_POST['car_fuel']==4) echo"selected"; ?>>Dizel</option>
                                                      <option value="5" <?php if(isset($_POST['car_fuel']) && $_POST['car_fuel']==5) echo"selected"; ?>>Gass</option>
                                                 </select>
                                            </td>
                                        </tr>
                      </table>
                          
                           </td>
                           <td>
                         <table cellspacing="1" cellpadding="0">
                                        <tr>
                                            <td>
                                                Boja <span class="zvezdica">*</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                               <select name="car_color">
                                                  <option value="Izaberi">Izaberi...</option>
                                                  <option value="Crna" <?php if(isset($_POST['car_color']) && $_POST['car_color']=="Crna") echo"selected"; ?>>Crna</option>
                                                  <option value="Bela" <?php if(isset($_POST['car_color']) && $_POST['car_color']=="Bela") echo"selected"; ?>>Bela</option>
                                                  <option value="Plava" <?php if(isset($_POST['car_color']) && $_POST['car_color']=="Plava") echo"selected"; ?>>Plava</option>
                                                  <option value="Crvena" <?php if(isset($_POST['car_color']) && $_POST['car_color']=="Crvena") echo"selected"; ?>>Crvena</option>
                                                  <option value="Zelena" <?php if(isset($_POST['car_color']) && $_POST['car_color']=="Zelena") echo"selected"; ?>>Zelena</option>
                                                  <option value="Siva" <?php if(isset($_POST['car_color']) && $_POST['car_color']=="Siva") echo"selected"; ?>>Siva</option>
                                                  <option value="Braon" <?php if(isset($_POST['car_color']) && $_POST['car_color']=="Braon") echo"selected"; ?>>Braon</option>
                                                  <option value="Zuta" <?php if(isset($_POST['car_color']) && $_POST['car_color']=="Zuta") echo"selected"; ?>>Zuta</option>
                                                </select>
                                            </td>
                                        </tr>
                      </table>
                          </td>
                           <td>
                         <table cellspacing="1" cellpadding="0">
                                        <tr>
                                            <td>
                                                Broj Vrata: <span class="zvezdica">*</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="car_doors">
                                                  <option value="0">Izaberi...</option>
                                                  <option value="3" <?php if(isset($_POST['car_doors']) && $_POST['car_doors']==3) echo"selected"; ?>>3</option>
                                                  <option value="5" <?php if(isset($_POST['car_doors']) && $_POST['car_doors']==5) echo"selected"; ?>>5</option>
                                                 </select>
                                            </td>
                                        </tr>
                      </table>
                       </td>
                 </tr>
         
   <script>
              var all_years = new Array();
              all_years=["Izaberi...","2011","2010","2009","2008","2007","2006","2005","2004","2003","2002","2001","2000","1999","1998","1997","1996","1995","1994","1993","1992","1991","1990","1989","1988","1987","1986","1985","1984","1983","1982","1981","1980","1979","1978","1977","1976","1975","1974","1973","1972","1971","1970","1969","1968","1967","1966","1965","1964","1963","1962","1961","1960","1959","1958","1957","1956","1955","1954","1953","1952","1951","1950"];
             var year = document.sr_auto.year;
              var year_to = document.sr_auto.year_to;
        function update_year()
             {
                 for(i=0;i<all_years.length;i++)
                   {
                     year.options[i] = new Option(all_years[i], all_years[i]);
                     
                  }
             }

    </script>
                     <tr>
                         <td>
                      <table cellspacing="1" cellpadding="0">
                                        <tr>
                                            <td>
                                                Menjac: <span class="zvezdica">*</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="car_transmission">
                                                      <option value="Izaberi">Izaberi...</option>
                                                      <option value="Manuelni" <?php if(isset($_POST['car_type']) && $_POST['car_type']=="Manuelni") echo"selected"; ?>>Manuelni</option>
                                                      <option value="Automatski" <?php if(isset($_POST['car_type']) && $_POST['car_type']=="Automatski") echo"selected"; ?>>Automatski</option>

                                                 </select>
                                            </td>
                                        </tr>
                      </table>
                         </td>

                         <td>
                         <table cellspacing="1" cellpadding="0">
                                        <tr>
                                            <td>
                                                Tip <span class="zvezdica">*</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                               <select name="car_type">
                                                  <option value="0">Izaberi...</option>
                                                  <option value="1" <?php if(isset($_POST['car_type']) && $_POST['car_type']==1) echo"selected"; ?>>Havarisan</option>
                                                  <option value="2" <?php if(isset($_POST['car_type']) && $_POST['car_type']==2) echo"selected"; ?>>Kabriolet</option>
                                                  <option value="3" <?php if(isset($_POST['car_type']) && $_POST['car_type']==3) echo"selected"; ?>>Karavan</option>
                                                  <option value="4" <?php if(isset($_POST['car_type']) && $_POST['car_type']==4) echo"selected"; ?>>Limuzina</option>
                                                  <option value="5" <?php if(isset($_POST['car_type']) && $_POST['car_type']==5) echo"selected"; ?>>Pick up</option>
                                                  <option value="6" <?php if(isset($_POST['car_type']) && $_POST['car_type']==6) echo"selected"; ?>>Kupe</option>
                                                </select>
                                            </td>
                                        </tr>
                      </table>
                             </td>
                         <td>
                             <table cellspacing="1" cellpadding="0">
                                        <tr>
                                            <td>
                                                Cena (Evra) <span class="zvezdica">*</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" name="car_price" <?php if (isset($_POST['car_price'])) { ?> value="<?php echo $_POST['car_price']; ?>" <?php } ?>/>
                                            </td>
                                        </tr>
                         </table>
                      </td>
                    
                 </tr>
                                  
                       
         <table cellspacing="1" cellpadding="0" style="padding-left: 5px;">
                                        <tr>
                                            <td colspan="2">
                                               Opis <span class="zvezdica">*</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                 <textarea name="car_description" cols="50" rows="6"><?php if (isset($_POST['car_description'])) echo$_POST['car_description'];?></textarea>
                                            </td>
                                            <td style="text-align: center">
                                                 Ukupno na raspolaganju imate 500 karaktera!
                                            </td>
                                        </tr>
                        </table>
                   
                </table>
            <hr/>
            <table style="width: 570px; padding-left: 5px;">
                 
                 <tr>
                     <td><h3>Podaci o vlasniku</h3><br/>
                           <table>
                          
                           <tr>
                               <td>Ime: <span class="zvezdica">*</span></td>
                               <td><input type="text" name="owner_name"/></td>
                            </tr>
                             <tr>
                               <td>Prezime: <span class="zvezdica">*</span></td>
                               <td><input type="text" name="owner_last_name"/></td>
                            </tr>
                           <tr>
                               <td> Grad: <span class="zvezdica">*</span> </td>
                               <td><input type="text" name="owner_city"/></td>
                            </tr>
                           <tr>
                               <td>Adresa: <span class="zvezdica">*</span></td>
                               <td><input type="text" name="owner_address"/></td>
                            </tr>
                              <tr>
                               <td> Phone: <span class="zvezdica">*</span></td>
                               <td><input type="text" name="owner_phone"/></td>
                                </tr>
                           <tr>
                               <td> E-mail: <span class="zvezdica">*</span></td>
                               <td><input type="text" name="owner_email"/></td>
                                </tr>

                       </table>
                         </td>

                     <td><h3>Fotografije vozila</h3><br/>
                     <table>
                         <tr>
                             <td>
                                 <input id="my_file_element" type="file" name="file[]" />
                             </td>
                         </tr>
                         <tr>
                             <td>Files (max 4):</td>
                         </tr>
<!-- This is where the output will appear -->
                        <tr>
                            <td>
                                <div id="files_list"></div>
                            </td>
                        <script>
                                <!-- Create an instance of the multiSelector class, pass it the output target and the max number of files -->
                                var multi_selector = new MultiSelector( document.getElementById( 'files_list' ),4 );
                                <!-- Pass in the file element -->
                                multi_selector.addElement( document.getElementById( 'my_file_element' ) );
                        </script>
                        </tr>
                    </table>
                    </td>
            </tr>
 </table>
            <div style="color: red; width: 600px; text-align: center;"><input type="Submit" name="Dodaj" value="Dodaj"/></div>
</form>
                        <div id="error_message" style="color: red; width: 600px; text-align: center;">      <div id="obavestenje"><strong>Upozorenje: </strong>Na ovom sajtu mozete potpuno BESPLATNO da unesete Vas auto oglas sa vise slika.
                        Detaljno su uredjene opcije za prijavljivanje i trebalo bi da obuhvataju sve karakteristike
                        Vaseg automobila. Ovaj oglas ima rok trajanja 20 dana, posle koga ce on biti obrisan
                        . Ovaj sajt nije odgovoran za tacnost podataka koje unosite u Vas oglas i ne snosi
                        odgovornost ukoliko Vase podatke neko upotrijebi na drugom sajtu.Vas oglas ce biti
                        indeksiran na pretrazivacima i da ce tako biti dostupni i svi podaci.</div>   <?php
        if(isset ($_POST['Dodaj']))
                {

                //inic Car atributes
                    $car=new Car();

                            $today = strftime("%Y-%m-%d", time());
                            
                            $car->car_age=(int)$_POST['year'];
                            $car->car_ccm=(int)$_POST['car_ccm'];
                            $car->car_color=$_POST['car_color'];
                            $car->car_description=$_POST['car_description'];
                            $car->car_doors=(int)$_POST['car_doors'];
                            $car->car_fuel_id=(int)$_POST['car_fuel'];
                            $car->car_kw=(int)$_POST['car_kw'];
                            $car->car_makes_id=(int)$_POST['sr_mark'];
                            $car->car_mileage=(int)$_POST['car_mileage'];
                            $car->car_model_id=(int)$_POST['sr_model'];
                            $car->car_type_id=(int)$_POST['car_type'];

                            $car->car_price=$_POST['car_price'];
                            $car->car_transmission=$_POST['car_transmission'];

                       if($car->provera())
                           {
                                 $owner= new Owner();
                    $owner->owner_name=$_POST['owner_name'];
                    $owner->owner_last_name=$_POST['owner_last_name'];
                    $owner->owner_phone=$_POST['owner_phone'];
                    $owner->owner_email=$_POST['owner_email'];
                    $owner->owner_city=$_POST['owner_city'];
                    $owner->owner_address=$_POST['owner_address'];


                           if($owner->owner_provera())
                                   {

                                         $owner->save();
                                         $car->car_owner_id=$database->last_id();
                                         $car->save();
                                         $last_car_id=$database->last_id();
                                         $mark = CarMakes::find_by_id($_POST['sr_mark']);
                                         $model= CarModels::find_by_id($_POST['sr_model']);
                                         $pic=new Pictures();
                                         $pic->attach_file($_FILES["file"],$mark->car_name, $model->car_model_name,$last_car_id);
                                    }

                       }
                       echo "<br/>";
                       foreach ($car->errors as $key => $value) {
                           echo "<span id='span_obavestenje'>$value</span>";

                       }
               }

                    ?></div>


</div>
              

       
				
			
                    <!-- Inicialise object -->

  
                   
			<div class="cl">&nbsp;</div>
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