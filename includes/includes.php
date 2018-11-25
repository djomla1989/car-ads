<?php
 session_start();
 error_reporting(E_ALL);
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null :
	define('SITE_ROOT', '');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');

//config file

require_once (LIB_PATH.DS.'config.php');

//database
require_once (LIB_PATH.DS.'database.php');
require_once (LIB_PATH.DS.'user.php');
require_once (LIB_PATH.DS.'session.php');
require_once (LIB_PATH.DS.'functions.php');
require_once (LIB_PATH.DS.'car.php');
require_once (LIB_PATH.DS.'owner.php');
require_once (LIB_PATH.DS.'fuel.php');
require_once(LIB_PATH.DS.'model.php');
require_once(LIB_PATH.DS.'makes.php');
require_once(LIB_PATH.DS.'comment.php');
require_once(LIB_PATH.DS.'pagination.php');
?>
