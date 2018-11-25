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
	<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
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
		<?php include_layout_template('left_sidebar.php'); ?>
		<!-- End Sidebar -->

                <?php
                $id_car = !empty($_GET['id']) ? (int)$_GET['id'] : Car::radomCar()->car_id;

                if($car_obj= Car::find_by_id($id_car))
                $car_obj->setNames();
                else
                {
                    echo "<span id='span_obavestenje'>Ne postoji oglas</span>";
                    
                }


                ?>
		<!-- Main -->
                <div id="main">
                    	<div class="box" style="">
                    <?php                //                    var_dump($car_obj);?>
				<h2 style="width:565px">Rezultati pretrage</h2>

                                	<table width='100%' class="automobili" cellpadding="0">
                                             <tr>
                                                 <td class="nametitle" width="100%"colspan="4">
                                                     <h3 style="font-size: 16px">
                                                         <?php echo $car_obj->car_makes_name."&nbsp;&nbsp;".$car_obj->car_model_name."&nbsp;&nbsp;".$car_obj->type_name;?>
                                                     </h3>
                                                 </td>
                                            </tr>
		<tr>
			<td align="left" valign="top" class="odbidesno">
			<table cellpadding=0 cellspacing=0 width="100%">
                            <tr>
                                <td class="naziv">Proizvođač:</td>
                                <td class="opis"><?php echo $car_obj->car_makes_name;?></td>
                            </tr>
                            <tr>
                                <td class="naziv">Model:</td>
                                <td class="opis"><?php echo $car_obj->car_model_name;?></td>
                            </tr>
                            <tr>
                                <td class="naziv">Tip vozila:</td>
                                <td class="opis"><?php echo $car_obj->type_name;?></td>
                            </tr>
                            <tr>
                                <td class="naziv">Proizveden:</td>
                                <td class="opis"><?php echo $car_obj->car_age;?></td>
                            </tr>
                            <tr>
                                <td class="naziv">Snaga:</td>
                                <td class="opis"><?php echo $car_obj->car_kw;?> kw</td>
                            </tr>
                            <tr>
                                <td class="naziv">Kubikaza:</td>
                                <td class="opis"><?php echo $car_obj->car_ccm;?> ccm</td>
                            </tr>
                            <tr>
                                <td class="naziv">Menjac:</td>
                                <td class="opis"><?php echo $car_obj->car_transmission;?></td>
                            </tr>
                            <tr>
                                <td class="naziv">Gorivo:</td>
                                <td class="opis"><?php echo $car_obj->car_fuel_name;?></td>
                            </tr>
                            <tr>
                                <td class="naziv">Katalizator: </td>
                                <td class="opis"><?php echo $car_obj->type_name;?></td>
                            </tr>
                            <tr>
                                <td class="naziv">Boja: </td>
                                <td class="opis"><?php echo $car_obj->car_color;?></td>
                            </tr>
                            <tr>
                                <td class="naziv">Vrata: </td>
                                <td class="opis"><?php echo $car_obj->car_doors;?></td>
                            </tr>
                            <tr>
                                <td class="naziv">Kilometraža: </td>
                                <td class="opis"><?php echo $car_obj->car_mileage;?> km</td>
                            </tr>
                        </table>
                            <br/>
                        <h1>Opis</h1>
                            <div class="tekst">
                                <?php echo $car_obj->car_description;?>
                            </div>
                            <h1>Extra</h1>
                            <ul>
                                <li>El. podizaci</li>
                            </ul><br/>
                        </td>
                    <td width="30%"  align="left" valign="top" class="slika">
                        <div class="cena">
                            Cena: <?php echo $car_obj->car_price;?> Eura
                        </div>
                        <div id='slike'><script type="text/javascript">
				$(document).ready(function(){

					$(".thumbs a").click(function(){

						var largePath = $(this).attr("href");
						var largeUrl = $(this).attr("url");
						var largeAlt = $(this).attr("title");

						$("#large a").attr({ href: largeUrl });
						$("#largeImg").attr({ src: largePath, alt: largeAlt });
						$("p #large a").html(" (" + largePath + ")");
						$("h2 em").html(" (" + largeAlt + ")"); return false;
					});

				});
				</script>

				<p id=large>
                                    <a href="images/<?php echo $car_obj->car_pictures[0]?>">
                                        <img width='269' height='215' id="largeImg" src="images/<?php echo $car_obj->car_pictures[0]?>" /></a></p>
                            <p class="thumbs">
                                <?php         
                                       foreach ($car_obj->car_pictures as $key => $slike) {
                                        echo "<a title='Auto oglasi' url='images/{$slike}' href='images/{$slike}'><img src='images/{$slike}' width='56' height='44'/></a>";
                                          }
                                ?>
				
                            </p>

			</div>


				<table width='100%' cellpadding=0 cellspacing=0>
                                <tr>
                                                 <td class="nametitle" width="100%"colspan="4"><h3>Podaci o vlasniku</h3></td>
                                            </tr>
				<tr>
                                    <td class='naziv'>Ime:</td>
                                    <td class='opis'><?php echo $car_obj->owner_info->owner_name?></td>
                                </tr>
                                    <tr>
                                        <td class='naziv'>Prezime:</td>
                                        <td class='opis'><?php echo $car_obj->owner_info->owner_last_name?></td>
                                    </tr>
                                    <tr>
                                        <td class='naziv'>Adresa:</td>
                                        <td class='opis'><?php echo $car_obj->owner_info->owner_address?></td>
                                    </tr>
                                    <tr><td class='naziv'>Grad:</td>
                                        <td class='opis'><?php echo $car_obj->owner_info->owner_city?></td>
                                    </tr>
                                    <tr>
                                        <td class='naziv'>Telefon:</td>
                                        <td class='opis'><?php echo $car_obj->owner_info->owner_phone?></td>
                                    </tr>
                                      <tr><td class='naziv'>E-mail:</td>
                                        <td class='opis'><?php echo $car_obj->owner_info->owner_email?></td>
                                    </tr>
                                </table>

                    </td>
                </tr>
                   </table>                       
                                  <table>
                                     
                               <?php
                                if(isset($_POST['Dodaj']))
                                {
                                    if(isset($_SESSION['username']))
                                    {
                                    $komentar = new Comment();
                                    $komentar->car_id = $car_obj->car_id;
                                    $komentar->time = date("Y-m-d H:i:s");
                                    $komentar->user_id = $_SESSION['user_id'];
                                    $komentar->text = $_POST['comment'];
                                    $komentar->user_ip = $_SERVER['REMOTE_ADDR'];
                                    $komentar->save();
                                    unset ($_POST['Dodaj']);
                                     echo "<span id='span_obavestenje'>Uspesno ste dodali komentar</span>";
                                       
                                    }
                                    else
                                    {
                                          echo "<span id='span_obavestenje'>Samo registrovani korisnici mogu dodati komentar</span>";
                                    }

                                    
                                }
                                ?>
                                       <?php

                                $lista_komentara = Comment::find_all_by_car_id($car_obj->car_id);
                                if(!empty ($lista_komentara))
                                {
                                    foreach ($lista_komentara as $koment) {
                                        $koment->setUserName($koment->user_id);
                                       
                                         ?>
                                      <tr>
                                          <table class="tblcomment">
                                              <tr>
                                                  <td class="tdcommentusername"><?php echo $koment->user->username?></td>
                                                  <td class="tdcommenttime"> <?php echo $koment->time?></td>
                                              </tr>
                                              <tr>
                                                  <td colspan="2" class="tdcommenttext"><?php echo $koment->text?></td>                                           </td>
                                              </tr>
                                          </table>
                                      </tr>
                                <?php
                                    }
                                  
                                }?>
                                  </table>
                                 <form name="form" method="POST" action="detaljan-pregled.php?id=<?php echo $car_obj->car_id?>">
				<table cellpadding="0" cellspacing="3" border="0" width="575" bgcolor="#EEEEEE">
                                    <tr style="font-size:11px; background-color:#CCCCCC;">
                                        <td style="width:549px; height:20px; text-align:center;">
                                            <font color="#FFFFFF"><strong>Formular za dodavanje Vašeg komentara</strong></font>
                                        </td>
                                    </tr>
                                </table>

				<table cellpadding="0" cellspacing="5" border="0" width="575" bgcolor="#EEEEEE">
				<tr>
                                    <td align="center" valign="top"><textarea class="txtareacomment" name="comment" cols="80" rows="4" style=""></textarea></td></tr>
				<tr>
                                    <td style="text-align:center; vertical-align:top;">
                                        <table cellpadding="0" cellspacing="0" border="0" width="540">
                                            <tr>
                                                <td width="50"></td>
                                                <td width=300 align=right>&nbsp;<input name="Dodaj" value="Pošalji komentar" name="Dodaj" type="submit" style="font-size:11px; color:#444444; background-color:#FFFFFF; border:1px solid #999999;">&nbsp;</td></tr></table></td></tr>
				</table>
			</form>
                                <table cellpadding="5" cellspacing="0" border="0" width="575" bgcolor=#EEEEEE>
                                    <tr>
                                        <td class="comment_uslovi">
                                            Brišu se svi komentari koji sadrže sledeću sadržinu: psovanje, vređanje, VELIKA SLOVA, lične poruke, reklamiranje, cene u zemlji/inostranstvu, spominjanje admina.
                                        </td>
                                    </tr>
                                </table>
                              
			</div>
                    

		
			<!-- End Box Latest Posts -->

		  <?php include_layout_template('right_sidebar.php'); ?>
                      
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