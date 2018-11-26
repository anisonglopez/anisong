<?php
error_reporting(0);
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
include "template/communication-allowance/communallow_action.php";
//include "template/communication-allowance/communallow.php";
$sql = "SELECT tt04_commuteallow. * , tm03_employee.EmplTName FROM tt04_commuteallow, tm03_employee WHERE tt04_commuteallow.EmplCode = tm03_employee.EmplCode ORDER by tt04_commuteallow.auto_increment ASC LIMIT {$start} , {$perpage}";
$DATA = mysqli_query($conn, $sql);
//page
/*
$sql2 = "SELECT * FROM tm00_control ORDER BY Period DESC";
$query2 = mysqli_query($sql2);
$total_record = mysqli_num_rows($query2);
$total_page = ceil($total_record / $perpage);
//page
*/
//etc
//and then call a template:
$title = "Communication Allowance";
$tpl = "";
$detail = "template/communication-allowance/communallow.php";
$modal = "template/communication-allowance/communallow_modal.php";
$script = "template/communication-allowance/communallow_script.php";
$footer = "";
include "template/layout.php";
//page


//page
?>


