<?php 
error_reporting(0);
if(isset($_POST["create"])) {
    $ConvertPeriodDate = date("Ym", strtotime($_POST["period"]));
    $SysPgmID = "TM02_Bank";
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $strSQL = "INSERT INTO tm02_bank ";
    $strSQL .="(bankcode, BankEName, BankTName,Address,PhoneNo, 
                SysUpdDate, SysUserID, SysPgmID) ";
    $strSQL .="VALUES ";
    $strSQL .="('".$_POST["bankcode"]."','".$_POST["BankEName"]."','".$_POST["BankTName"]."','".$_POST["Address"]."','".$_POST["PhoneNo"]."',
                '".$date."','".$_SESSION['UserID']."','".$SysPgmID ."')";
    
    $objQuery = mysqli_query($conn, $strSQL);
    if($objQuery)
    {
        $result = '<script> alert("ทำการบันทึกข้อมูลสำเร็จ");</script>';
    }
    else
    {
        $result = '<script>alert("ขออภัย! เนื่องจากมีรหัสธนาคาร นี้แล้วในระบบ ไม่สามารถทำการบันทึกข้อมูลได้")</script>';
        //header("Location: " . $_SERVER['REQUEST_URI']);
       // header("location: ../../user.php");
    }
    }
}
if(isset($_POST["edit_id"]))  
{  
    include "../../config/connect.php";
    $strSQL = "SELECT * FROM tm02_bank WHERE bankcode = '".$_POST["edit_id"]."'";   
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
    $output .= '<input type="hidden" name="id" value="'.$_POST["edit_id"].'">
    <div class="row">
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">รหัสธนาคาร : <span class="field-required">*</span></dt>
            <dd class="col-sm-4 info-box-label">
            <input name="bankcode" type="text" value="'.$rows["bankcode"].'" data-placement="top" required  class="form-control" disabled/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">ชื่อธนาคาร(ENG) : </dt>
            <dd class="col-sm-8 info-box-label">
            <input name="BankEName" type="text" value="'.$rows["BankEName"].'" data-placement="top" required  class="form-control" maxlength="100" />
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">ชื่อธนาคาร(TH) : </dt>
            <dd class="col-sm-8 info-box-label">
            <input name="BankTName" type="text" value="'.$rows["BankTName"].'" data-placement="top"  class="form-control"  maxlength="100"/>      
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
            <dd class="col-sm-5 info-box-label">
            <input name="PhoneNo" type="text" value="'.$rows["PhoneNo"].'" data-placement="top"  class="form-control"  maxlength="50"/>      
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
  $SysPgmID = "TM02_Bank";
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    $strSQL = "UPDATE tm02_bank ";
    $strSQL .= "SET BankEName='".$_POST["BankEName"]."',BankTName='".$_POST["BankTName"]."',Address='".$_POST["Address"]."',PhoneNo='".$_POST["PhoneNo"]."',SysUpdDate='".$date."',SysUserID='".$_SESSION["UserID"]."',
                    SysPgmID='".$SysPgmID ."'";
    $strSQL .= " WHERE bankcode = '".$_POST["id"]."'";
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
    $strSQL = "DELETE FROM tm02_bank ";
    $strSQL .="WHERE bankcode = '".$_POST["delete"]."' ";
    $objQuery = mysqli_query($conn, $strSQL);
    if($objQuery)
  {
      echo '<script>window.location.href="bank.php"</script>';
     // $result = '<script> alert("ทำการลบข้อมูลสำเร็จ");</script>';
    //$msgbox = '<span class="success fixed animated fadeIn">ลบข้อมูล สำเร็จ </span>';
  }
  else
  {
      $result = '<script>alert("ขออภัย! ไม่สามารถทำการลบข้อมูลได้")</script>';
  }
 }
?>