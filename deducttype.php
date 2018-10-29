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
include "template/deducttype/dctaction.php";

if(isset($_POST["search"])){
    $sql = "SELECT * FROM tm02_deducttype WHERE DeductCode like '%".$_POST['search']."%' OR DeductEDesc like '%".$_POST['search']."%' OR DeductTDesc like '%".$_POST['search']."%'";
}else{
    $sql = "SELECT * FROM tm02_deducttype";
}

$DATA = mysql_query($sql);
//page
$sql2 = "SELECT * FROM tm02_deducttype";
$query2 = mysql_query($sql2);
$total_record = mysql_num_rows($query2);
$total_page = ceil($total_record / $perpage);
//page

//etc
//and then call a template:
$title = "ข้อมูลประเภทการหักเงิน";
$tpl = "";
$detail = "template/deducttype/dcttable.php";
$modal = "template/deducttype/dctmodal.php";
$script = "template/deducttype/dctscript.php";
$footer = "";
include "template/layout.php";
//page


//page
?>


