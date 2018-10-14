<?php 

if(isset($_POST["create"])) {
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $strSQL = "INSERT INTO tm01_user ";
    $strSQL .="(UserID, Password, UserEName, UserTName, SysUpdDate, SysUserID, SysPgmID) ";
    $strSQL .="VALUES ";
    $strSQL .="('".mysql_real_escape_string($_POST["username"])."', '".mysql_real_escape_string($_POST["password"])."', '".mysql_real_escape_string($_POST["descTH"])."',
 '".mysql_real_escape_string($_POST["descEN"])."', '".$date. "' , '" .$_POST["user_login"]."' , 'FM01_User' )";
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