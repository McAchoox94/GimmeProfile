<?php
if(isset($_GET['page']) && $_GET['page']=="logout") header('Location:https://gimmeprofile.com/usa/doctors/logout.php');
require ('xcrud/xcrud.php');

include_once("xcrud/functions.php");
 
require ('html/pagedata.php');

session_start();

//print_r($_SESSION);

 islogin();

//$theme = 'bootstrap';

//         Xcrud_config::$theme = 'bootstrap';

 $page = (isset($_GET['page']) && isset($pagedata[$_GET['page']])) ? $_GET['page'] : 'default';
extract($pagedata[$page]);



$file = dirname(__file__) . '/pages/' . $filename;

$code = file_get_contents($file);

include ('html/template.php');

