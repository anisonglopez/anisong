<?php 
    include "../../config/connect.php";
//if(isset($_POST["delete"])) {
    //if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $strSQL = "DELETE FROM `tm02_otherinc` WHERE `OthINCCode` = '".$_GET['id']."'";
    
    echo $strSQL;

    $objQuery = mysql_query($strSQL);
    if($objQuery)
    {
        echo '<script>alert("ทำการลบข้อมูลสำเร็จ")</script>';
        header('location:../../otherinc.php');
    }
    else
    {
        echo '<script>alert("ขออภัย! ไม่สามารถทำการลบข้อมูลได้")</script>';
        header('location:../../otherinc.php');
        //header("Location: " . $_SERVER['REQUEST_URI']);
       // header("location: ../../user.php");
    }
  //}
//}

?>