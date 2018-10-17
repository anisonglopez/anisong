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
/*$perpage = 20;
if (isset($_GET['page'])) {
$page = $_GET['page'];
} else {
$page = 1;
}
$start = ($page - 1) * $perpage;
//page
*/
include "config/connect.php";
//include "template/systemcontrol/sysconaction.php";
$sql = "SELECT * FROM tm00_control ORDER BY Period DESC LIMIT {$start} , {$perpage}";
$DATA = mysql_query($sql);
//page
/*$sql2 = "SELECT * FROM tm00_control ORDER BY Period DESC";
$query2 = mysql_query($sql2);
$total_record = mysql_num_rows($query2);
$total_page = ceil($total_record / $perpage);
*/
//page

//etc
//and then call a template:
$title = "เงื่อนไขระบบ";
$tpl = "";
$detail = "template/systemcondition/syscondit.php";
//$modal = "template/systemcontrol/sysconmodal.php";
//$script = "template/systemcontrol/sysscript.php";
$footer = "";
include "template/layout.php";
?>


