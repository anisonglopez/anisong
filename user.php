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
include "template/user/useraction.php";
$sql = "SELECT * FROM tm01_user";
$DATA = mysql_query($sql);
//etc
//and then call a template:
$title = "จัดการผู้ใช้งาน";
$tpl = "";
$detail = "template/user/usertable.php";
$footer = "";
include "template/layout.php";

?>
