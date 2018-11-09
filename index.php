<?php
session_start();
if($_SESSION['UserID'] == "")
{
    header("location: ./template/login/login.php");
    exit();
}
include "config/connect.php";
//include our settings, connect to database etc.
//include dirname($_SERVER['DOCUMENT_ROOT']).'/cfg/settings.php';
//getting required data
//$DATA=dbgetarr("SELECT * FROM links");
$Dashboad = "active";
$title = "Dashboard";
//etc

//and then call a template:
$tpl = "";
$detail = "template/api/api.php";
$footer = "";
include "template/layout.php";


?>