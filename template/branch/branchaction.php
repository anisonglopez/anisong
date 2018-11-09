<?php 
error_reporting(0);
if(isset($_POST["create"])) {
    $SysPgmID = "FM02_Branch";
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $strSQL = "INSERT INTO tm02_branch ";
    $strSQL .="(BranchCode, BranchEName, BranchTName,Address,PhoneNo,
                SysUpdDate, SysUserID, SysPgmID) ";
    $strSQL .="VALUES ";
    $strSQL .="('".$_POST["BranchCode"]."','".$_POST["BranchEName"]."','".$_POST["BranchTName"]."','".$_POST["Address"]."','".$_POST["PhoneNo"]."',
                '".$date."','".$_SESSION['UserID']."','".$SysPgmID."')";
    $objQuery = mysqli_query($conn, $strSQL);
    if($objQuery)
    {
        $result = '<script> alert("ทำการบันทึกข้อมูลสำเร็จ");</script>';
    }
    else
    {
        $result = '<script>alert("ขออภัย! เนื่องจากมี รหัส นี้แล้วในระบบ ไม่สามารถทำการบันทึกข้อมูลได้")</script>';
        //header("Location: " . $_SERVER['REQUEST_URI']);
       // header("location: ../../user.php");
    }
    }
}
if(isset($_POST["edit_id"]))  
{  
    include "../../config/connect.php";
    $strSQL = "SELECT * FROM tm02_branch WHERE branchCode = '".$_POST["edit_id"]."'";   
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
    $output .= '<input type="hidden" name="id" value="'.$_POST["edit_id"].'">
    <div class="row">
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">รหัสสาขา : <span class="field-required">*</span></dt>
            <dd class="col-sm-4 info-box-label">
            <input name="BranchCode" type="text" value="'.$rows["BranchCode"].'"  class="form-control" disabled/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">ชื่อสาขา(ENG) : </dt>
            <dd class="col-sm-8 info-box-label">
            <input name="BranchEName" type="text" value="'.$rows["BranchEName"].'" data-placement="top" required  class="form-control" />
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">ชื่อสาขา(TH) : </dt>
            <dd class="col-sm-8 info-box-label">
            <input name="BranchTName" type="text" value="'.$rows["BranchTName"].'" data-placement="top"  class="form-control" />      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">ที่อยู่ : </dt>
            <dd class="col-sm-8 info-box-label">
						<textarea class="form-control" rows="5" name="Address" id="comment">'.$rows["Address"].'</textarea>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">เบอร์โทรศัพท์ : </dt>
            <dd class="col-sm-8 info-box-label">
						<input name="PhoneNo" type="text" value="'.$rows["PhoneNo"].'" data-placement="top"  class="form-control"  maxlength="20"/>   
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
    $strSQL = "UPDATE tm02_branch ";
    $strSQL .= "SET BranchEName='".$_POST["BranchEName"]."',BranchTName='".$_POST["BranchTName"]."',
                Address='".$_POST["Address"]."',PhoneNo='".$_POST["PhoneNo"]."',
                SysUpdDate='".$date."',SysUserID='".$_SESSION["UserID"]."'";
    $strSQL .= " WHERE BranchCode = '".$_POST["id"]."'";
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
    $strSQL = "DELETE FROM tm02_branch ";
    $strSQL .="WHERE BranchCode = '".$_POST["delete"]."' ";
    $objQuery = mysqli_query($conn, $strSQL);
    if($objQuery)
  {
      echo '<script>window.location.href="branch.php"</script>';
     // $result = '<script> alert("ทำการลบข้อมูลสำเร็จ");</script>';
    //$msgbox = '<span class="success fixed animated fadeIn">ลบข้อมูล สำเร็จ </span>';
  }
  else
  {
      $result = '<script>alert("ขออภัย! ไม่สามารถทำการลบข้อมูลได้")</script>';
  }
 }
?>