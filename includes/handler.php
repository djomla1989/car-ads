<?php require_once '../includes/includes.php'; ?>
<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
list($klasa, $metoda, $id) = explode("/", $_GET['call_json']);


eval('$var = '.$klasa.'::'.$metoda.'('.$id.');');
//$macka =  json_encode($klasa::$metoda($id));

//$macka = json_encode(CarModels::find_all_by_makes_id(3));
echo json_encode($var);

?>
