<?php require_once '../../includes/includes.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Webiste</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
	<!--[if IE]>
		<style type="text/css" media="screen">
			.shell {background-image: none;filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='css/images/shell-bg.png', sizingMethod='scale');}
			.box{background-image: none;filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='css/images/dot.png', sizingMethod='scale');}
			.transparent-frame .frame{background-image: none;filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='css/images/transparent-frame.png', sizingMethod='image');}
			.search .field{padding-bottom:9px}
		</style>
	<![endif]-->
	<script src="../js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="../js/jquery-func.js" type="text/javascript"></script>
     

</head>
    <body>

<!-- Shell -->
<div class="shell">
	
	<!-- Header -->
	<?php include_layout_template_admin('admin_header.php'); ?>
	<!-- End Header -->
	
	
	<!-- Content -->
	<div id="content">
		
		<!-- Sidebar -->
		<div id="sidebar">
			
			<!-- Search -->
		
			<!-- End Sign In Links -->
			<?php include_layout_template_admin('admin_box.php'); ?>
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
				<h2>Editovanje - Brisanje</h2>
                             <ul>
                                <?php
                                      // 1. the current page number ($current_page)
                                        $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
                                        $year_from=!empty($_GET['year_from']) ? intval($_GET['year_from']): 1950;
                                        $year_to = !empty($_GET['year_to']) ? intval($_GET['year_to']): 2011;
                                        $sr_mark = !empty($_GET['sr_mark']) ? intval($_GET['sr_mark']): "%";
                                        $sr_model = !empty($_GET['sr_model']) ? intval($_GET['sr_model']): "%";

                                        // 2. records per page ($per_page)
                                        $per_page = 3;

                                        // 3. total record count ($total_count)
                                        $link = $_SERVER['PHP_SELF']."?".substr($_SERVER['QUERY_STRING'], '0', strrpos($_SERVER['QUERY_STRING'],strrchr($_SERVER['QUERY_STRING'],"=")));


                                        
                                    if(isset ($_GET['sr_mark']))
                                        {
                                        $total_count = Car::count_sql($sr_mark);
                                        $pagination = new Pagination($page, $per_page, $total_count);
                                        $car_array=Car::simple_search_pagination($sr_mark, $sr_model, $year_from ,$year_to,$per_page,$pagination->offset());
          
                                        }
                                        else{
                                        $total_count = Car::count_all();
                                        $pagination = new Pagination($page, $per_page, $total_count);
                                       $car_array=Car::find_all_pagination($per_page,$pagination->offset());
                                    }
                                        
                                    foreach ($car_array as $car_obj):
                                        $car_obj->setNames();


                                ?>

				         <li>
				    	<a href="#" class="image"><img src='<?php echo "../images/".$car_obj->car_pictures[0]; ?>' alt="" /></a>

                                        <table border=0 cellspacing="0" cellpadding="0" width="422px" style="padding-left: 10px;">
                                             <tr>
                                                 <td class="nametitle" width="100%"colspan="4"><h3><a href="#"><?php echo $car_obj->car_makes_name." ".$car_obj->car_model_name; ?></a></h3></td>
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
                                                <td>
                                                   <span style="font-size: 16px; font-weight: bold; color: yellow;">
                                                      <a onclick="return (confirm('Da li ste sigurno da zelite da obrisete ovaj oglas?'));" href='<?php echo 'admin_delete.php?car_id='.$car_obj->car_id;?>'>Obrisi</a>
                                                       / <a href='admin_edit_car.php?car_id=<?php echo $car_obj->car_id;?>'>Edit</a></span>

                                                </td>

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
                                                                  echo "<a href=\"{$link}=";
                                                                  echo $pagination->previous_page();
                                                                  echo "\">&laquo; Previous</a> ";
                                                                }

                                                        for($i=1; $i <= $pagination->total_pages(); $i++) {
                                                                if($i == $page) {
                                                                        echo " <span class=\"selected\">{$i}</span> ";
                                                                } else {
                                                                        echo " <a href=\"{$link}={$i}\">{$i}</a> ";
                                                                }
                                                        }

                                                        if($pagination->has_next_page()) {
                                                                echo " <a href=\"{$link}=";
                                                                echo $pagination->next_page();
                                                                echo "\">Next &raquo;</a> ";
                                            }

                                                }
                                        ?>
                                        </div>
                </div>
		<div class="cl">&nbsp;</div>
	</div>
	<!-- End Content -->
	</div>
        <div class="cl">&nbsp;</div>
	<!-- Footer -->
	<?php include_layout_template_admin('admin_footer.php'); ?>
	<!-- End Footer -->

</div>
<!-- End Shell -->
</body>
</html>