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
//page
$perpage = 20;
if (isset($_GET['page'])) {
$page = $_GET['page'];
} else {
$page = 1;
}
$start = ($page - 1) * $perpage;
//page
include "config/connect.php";
include "template/attendance/attaction.php";
$sql = "SELECT * FROM tm02_attncode";
$DATA = mysql_query($sql);
//page
$sql2 = "SELECT * FROM tm02_attncode";
$query2 = mysql_query($sql2);
$total_record = mysql_num_rows($query2);
$total_page = ceil($total_record / $perpage);
//page

//etc
//and then call a template:
$title = "ข้อมูลประเภทการลา";
$tpl = "";
$detail = "template/attendance/atttable.php";
$modal = "template/attendance/attmodal.php";
$script = "template/attendance/attscript.php";
$footer = "";
include "template/layout.php";
//page


//page
?>


