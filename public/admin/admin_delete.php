<?php
require_once '../../includes/includes.php';
if(isset($_GET['car_id']))
    {
    Car::delete_on_car_id($_GET['car_id']);
    redirect_to('admin_edit.php');
    }
    else
        redirect_to('admin_edit.php');
?>
