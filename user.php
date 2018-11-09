<?php
error_reporting(0);
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
$DATA = mysqli_query($conn,$sql);
//etc
//page
$sql2 = "SELECT * FROM tm01_user";
$query2 = mysqli_query($conn, $sql2);
$total_record = mysqli_num_rows($query2);
$total_page = ceil($total_record / $perpage);

//page
//and then call a template:
$title = "จัดการผู้ใช้งาน";
$tpl = "";
$detail = "template/user/usertable.php";
$footer = "";
include "template/layout.php";

?>
