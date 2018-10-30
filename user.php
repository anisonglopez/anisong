<?php
session_start();
if($_SESSION['UserID'] == "")
{
    header("location: ./template/login/login.php");
    exit();
}
$perpage = 20;
if (isset($_GET['page'])) {
$page = $_GET['page'];
} else {
$page = 1;
}
$start = ($page - 1) * $perpage;
//include our settings, connect to database etc.
//include dirname($_SERVER['DOCUMENT_ROOT']).'/cfg/settings.php';
//getting required data
//$DATA=dbgetarr("SELECT * FROM links");
include "config/connect.php";
include "template/user/useraction.php";
$sql = "SELECT * FROM tm01_user  ORDER BY UserID ASC LIMIT {$start} , {$perpage}";
$DATA = mysql_query($sql);
//etc
//page
$sql2 = "SELECT * FROM tm01_user ORDER BY UserID ASC";
$query2 = mysql_query($sql2);
$total_record = mysql_num_rows($query2);
$total_page = ceil($total_record / $perpage);

//page
//and then call a template:
$title = "จัดการผู้ใช้งาน";
$tpl = "";
$detail = "template/user/usertable.php";
$footer = "";
include "template/layout.php";

?>
