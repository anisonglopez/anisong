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
$perpage = 10;
if (isset($_GET['page'])) {
$page = $_GET['page'];
} else {
$page = 1;
}
$start = ($page - 1) * $perpage;
//page
include "config/connect.php";
include "template/department/deptaction.php";

   // $sql = "SELECT * FROM tm02_department WHERE DeptCode like '%".$_POST['search']."%' OR DeptEDesc like '%".$_POST['search']."%' OR DeptTDesc like '%".$_POST['search']."%'";
$sql = "SELECT * FROM tm02_department ORDER BY DeptCode ASC LIMIT {$start} , {$perpage}";
$DATA = mysqli_query($conn,$sql);
//page
$sql2 = "SELECT * FROM tm02_department";
$query2 = mysqli_query($conn, $sql2);
$total_record = mysqli_num_rows($query2);
$total_page = ceil($total_record / $perpage);
//page

//etc
//and then call a template:
$title = "ข้อมูลแผนก";
$tpl = "";
$detail = "template/department/depttable.php";
$modal = "template/department/deptmodal.php";
$script = "template/department/deptscript.php";
$footer = "";
include "template/layout.php";
//page


//page
?>