<?php 
error_reporting(0);
if(isset($_POST["create"])) {
    $ConvertPeriodDate = date("Ym", strtotime($_POST["period"]));
    $SysPgmID = "FM02_Department";
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $strSQL = "INSERT INTO tm02_department ";
    $strSQL .="(DeptCode, DeptEDesc, DeptTDesc, 
                SysUpdDate, SysUserID, SysPgmID) ";
    $strSQL .="VALUES ";
    $strSQL .="('".$_POST["DeptCode"]."','".$_POST["DeptEDesc"]."','".$_POST["DeptTDesc"]."',
                '".$date."','".$_SESSION['UserID']."','".$SysPgmID."')";
    //$strSQL .="('".mysqli_real_escape_string($_POST["period"])."', '"($_POST["term"])."', '".mysqli_real_escape_string($_POST["emp_type"])."', '".($_POST["salary_date_from"])."', '".$_POST["salary_date_to"]. "' , '" .$_POST["overtime_date_from"]."' ,'" .$_POST["overtime_date_to"]."' , '" .$_POST["user_login"]."' , 'FM01_User' )";
    $objQuery = mysqli_query($conn, $strSQL);
    if($objQuery)
    {
        $result = '<script> alert("ทำการบันทึกข้อมูลสำเร็จ");</script>';
    }
    else
    {
        $result = '<script>alert("ขออภัย! เนื่องจากมีรหัสแผนก นี้แล้วในระบบ ไม่สามารถทำการบันทึกข้อมูลได้")</script>';
        //header("Location: " . $_SERVER['REQUEST_URI']);
       // header("location: ../../user.php");
    }
    }
}
if(isset($_POST["edit_id"]))  
{  
    include "../../config/connect.php";
    $strSQL = "SELECT * FROM tm02_department WHERE DeptCode = '".$_POST["edit_id"]."'";   
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
    $output .= '<input type="hidden" name="id" value="'.$_POST["edit_id"].'">
    <div class="row">
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">รหัสการหักเงิน : <span class="field-required">*</span></dt>
            <dd class="col-sm-4 info-box-label">
            <input name="DeptCode" type="text" value="'.$rows["DeptCode"].'" data-placement="top" required  class="form-control" disabled/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">คำอธิบาย(ENG) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="DeptEDesc" type="text" value="'.$rows["DeptEDesc"].'" data-placement="top" required  class="form-control" maxlength="100" />
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">คำอธิบาย(TH) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="DeptTDesc" type="text" value="'.$rows["DeptTDesc"].'" data-placement="top" required  class="form-control"  maxlength="100"/>      
            </dd>
          </dl>
        </div>

</div>

         ';  
}  
echo $output;  
}  
if(isset($_POST["delete_id"]))  {
    $output.= "<p>Are you confirm delete?</p>
    <input type='hidden' name='delete' value='".$_POST["delete_id"]."'/>
    ";
    echo $output;
}

if(isset($_POST["update"]))  {
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    $SysPgmID = "FM02_Department";
    $strSQL = "UPDATE tm02_department ";
    $strSQL .= "SET DeptEDesc='".$_POST["DeptEDesc"]."',DeptTDesc='".$_POST["DeptTDesc"]."',SysUpdDate='".$date."',SysUserID='".$_SESSION["UserID"]."',
                    SysPgmID='".$SysPgmID ."'";
    $strSQL .= " WHERE DeptCode = '".$_POST["id"]."'";
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

if(isset($_POST["delete"])) {    
    $strSQL = "DELETE FROM tm02_department ";
    $strSQL .="WHERE DeptCode = '".$_POST["delete"]."' ";
    $objQuery = mysqli_query($conn, $strSQL);
    if($objQuery)
  {
      echo '<script>window.location.href="department.php"</script>';
     // $result = '<script> alert("ทำการลบข้อมูลสำเร็จ");</script>';
    //$msgbox = '<span class="success fixed animated fadeIn">ลบข้อมูล สำเร็จ </span>';
  }
  else
  {
      $result = '<script>alert("ขออภัย! ไม่สามารถทำการลบข้อมูลได้")</script>';
  }
 }
?>