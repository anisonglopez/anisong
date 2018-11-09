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
include "template/employee/empaction.php";
//etc
if(isset($_POST["search"])){
    $sql = "SELECT * FROM tm02_otherinc WHERE OthINCCode like '%".$_POST['search']."%' OR OthINCEDesc like '%".$_POST['search']."%' OR OthINCTDesc like '%".$_POST['search']."%'";
}else{
    $sql = "SELECT tm03_employee.EmplCode, tm03_employee.EmplType, tm03_employee.EmplTName, tm02_department.DeptTDesc, tm02_position.PosiTDesc, tm03_employee.Sex ";
    $sql .= "FROM tm03_employee ";
    $sql .= "INNER JOIN tm02_department ON tm03_employee.DeptCode=tm02_department.DeptCode ";
    $sql .= "INNER JOIN tm02_position ON tm03_employee.PosiCode=tm02_position.PosiCode ";
}



$DATA = mysqli_query($conn, $sql);

//page
$sql2 = "SELECT * FROM tm03_employee";
$query2 = mysqli_query($conn, $sql2);
$total_record = mysqli_num_rows($query2);
$total_page = ceil($total_record / $perpage);
//page

//etc
//and then call a template:
$title = "ข้อมูลพนักงาน";
$tpl = "";
$detail = "template/employee/emptable.php";
$modal = "template/employee/empmodal.php";
$script = "template/employee/empscript.php";
$footer = "";
include "template/layout.php";
//page

?>
