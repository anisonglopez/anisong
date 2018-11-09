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
include "template/otherinc/otheraction.php";

   // $sql = "SELECT * FROM tm02_otherinc WHERE OthINCCode like '%".$_POST['search']."%' OR OthINCEDesc like '%".$_POST['search']."%' OR OthINCTDesc like '%".$_POST['search']."%'";
    $sql = "SELECT * FROM tm02_otherinc ORDER BY OthINCCode ASC  LIMIT {$start} ,$perpage";

$DATA = mysqli_query($conn, $sql);
//page
$sql2 = "SELECT * FROM tm02_otherinc";
$query2 = mysqli_query($conn, $sql2);
$total_record = mysqli_num_rows($query2);
$total_page = ceil($total_record / $perpage);
//page

//etc
//and then call a template:
$title = "รายได้อื่นๆ";
$tpl = "";
$detail = "template/otherinc/othertable.php";
$modal = "template/otherinc/othermodal.php";
$script = "template/otherinc/otherscript.php";
$footer = "";
include "template/layout.php";
//page


//page
?>
