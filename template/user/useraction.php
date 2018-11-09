<?php 

if(isset($_POST["create"])) {
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $strSQL = "INSERT INTO tm01_user ";
    $strSQL .="(UserID, Password, UserEName, UserTName, SysUpdDate, SysUserID, SysPgmID) ";
    $strSQL .="VALUES ";
    $strSQL .="('".mysqli_real_escape_string($_POST["username"])."', '".mysqli_real_escape_string($_POST["password"])."', '".mysqli_real_escape_string($_POST["descTH"])."',
 '".mysqli_real_escape_string($_POST["descEN"])."', '".$date. "' , '" .$_POST["user_login"]."' , 'FM01_User' )";
    $objQuery = mysqli_query($conn, $strSQL);
    if($objQuery)
    {
        $result = '<script> alert("ทำการบันทึกข้อมูลสำเร็จ");</script>';
    }
    else
    {
        $result = '<script>alert("ขออภัย! ไม่สามารถทำการบันทึกข้อมูลได้")</script>';
        //header("Location: " . $_SERVER['REQUEST_URI']);
       // header("location: ../../user.php");
    }
    }
}
if(isset($_POST["delete_id"])) {
 $strSQL = "DELETE FROM tm01_user ";
  $strSQL .="WHERE UserID = '".$_POST["delete_id"]."' ";
  $objQuery = mysqli_query($conn, $strSQL);
  if($objQuery)
{
    echo '<script>window.location.href="user.php"</script>';
   // $result = '<script> alert("ทำการลบข้อมูลสำเร็จ");</script>';
  //$msgbox = '<span class="success fixed animated fadeIn">ลบข้อมูล สำเร็จ </span>';
}
else
{
    $result = '<script>alert("ขออภัย! ไม่สามารถทำการลบข้อมูลได้")</script>';
}
}
if(isset($_POST["edit_id"])) {
    if ($_POST["password"] == $_POST["confirm_password"] ){
        date_default_timezone_set("Asia/Bangkok");
        $date = date('Y-m-d H:i:s');
        $strSQL = "UPDATE tm01_user ";
        $strSQL .="SET Password = '".mysqli_real_escape_string($_POST["password"])."',
        UserEName = '".mysqli_real_escape_string($_POST["descEN"])."',
        UserTName = '".mysqli_real_escape_string($_POST["descTH"])."', 
        SysUserID = '".($_POST["user_login"])."',
        SysUpdDate = '".($date )."'
        ";
        $strSQL .="WHERE UserID = '".$_POST["edit_id"]."'";
        $objQuery = mysqli_query($conn, $strSQL);    
         if($objQuery)
       {
           $result = '<script>alert("ทำการแก้ไขข้อมูลสำเร็จ")</script>';
           //echo '<script>window.location.href="user.php"</script>';
       }
       else
       {
           $result = '<script>alert("ขออภัย! ไม่สามารถทำการอัปเดตข้อมูลได้")</script>';
       }
    }
else
{
    $result = '<script>alert("ขออภัย! ไม่สามารถทำการอัปเดตข้อมูลได้ รหัสผ่านไม่ตรงกัน")</script>';
}
 }
      

?>