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
$pagetitle = "Index";
//etc
$sql = "SELECT * FROM TM02_AttnCode";
$DATA = mysql_query($sql);
//and then call a template:
$tpl = "";
$detail = "template/attendance/atttable.php";
$footer = "";
include "template/layout.php";

?>