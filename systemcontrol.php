<?php
session_start();
if($_SESSION['UserID'] == "")
{
    header("location: ./template/login/login.php");
    exit();
}

//include our settings, connect to database etc.
//include dirname($_SERVER['DOCUMENT_ROOT']).'/cfg/settings.php';
//getting required data
//$DATA=dbgetarr("SELECT * FROM links");
include "config/connect.php";
include "template/systemcontrol/sysconaction.php";
$sql = "SELECT * FROM tm00_control ORDER BY Period DESC";
$DATA = mysql_query($sql);
//etc
//and then call a template:
$title = "กำหนดค่าระบบ";
$tpl = "";
$detail = "template/systemcontrol/syscon.php";
$footer = "";
include "template/layout.php";

?>

