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
include "template/bank/bankaction.php";

   // $sql = "SELECT * FROM tm02_bank WHERE bankcode like '%".$_POST['search']."%' OR BankEName like '%".$_POST['search']."%' OR BankTName like '%".$_POST['search']."%'";
$sql = "SELECT * FROM tm02_bank ORDER BY bankcode ASC  LIMIT {$start} ,$perpage";
$DATA = mysqli_query($conn, $sql);
//page
$sql2 = "SELECT * FROM tm02_bank";
$query2 = mysqli_query($conn, $sql2);
$total_record = mysqli_num_rows($query2);
$total_page = ceil($total_record / $perpage);
//page

//etc
//and then call a template:
$title = "ข้อมูลธนาคาร";
$tpl = "";
$detail = "template/bank/banktable.php";
$modal = "template/bank/bankmodal.php";
$script = "template/bank/bankscript.php";
$footer = "";
include "template/layout.php";
//page


//page
?>