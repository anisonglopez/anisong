
<?php
//include our settings, connect to database etc.
//include dirname($_SERVER['DOCUMENT_ROOT']).'/cfg/settings.php';
//getting required data
//$DATA=dbgetarr("SELECT * FROM links");

$pagetitle = "Index";
//etc

//and then call a template:
$tpl = "";
$detail = "template/employee/emptable.php";
$footer = "";
include "template/layout.php";

?>
