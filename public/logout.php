<?php require_once("../includes/includes.php"); ?>
<?php
if($session->is_logged_in())
        {
             $session->logout();
             redirect_to('login.php');
    }
    else        redirect_to('index.php');
?>
