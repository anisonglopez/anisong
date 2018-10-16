<?php 

if(isset($_POST["create"])) {
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $strSQL = "INSERT INTO tm02_otherinc ";
    $strSQL .="(OthINCCode, OthINCEDesc, OthINCTDesc, OthIncAmt, TaxCalFlag, SysUpdDate, SysUserID, SysPgmID) ";
    $strSQL .="VALUES ";
    $strSQL .="('".$_POST["othinccode"]."',
              '".$_POST["othincedesc"]."',
              '".$_POST["othinctdesc"]."',
              '".$_POST["othincamt"]."',
              '".$_POST["taxcalflag"]."',
              '".$date. "' , '" .$_POST["user_login"]."' , 'FM02_OtherINC' )";

    echo $strSQL;

    $objQuery = mysql_query($strSQL);
    if($objQuery)
    {
        $result = '<script>alert("ทำการบันทึกข้อมูลสำเร็จ")</script>';
        
    }
    else
    {
        $result = '<script>alert("ขออภัย! ไม่สามารถทำการบันทึกข้อมูลได้")</script>';
        
        //header("Location: " . $_SERVER['REQUEST_URI']);
       // header("location: ../../user.php");
    }
  }
}

?>