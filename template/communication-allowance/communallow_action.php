<?php 
if(isset($_POST["create"])) {
    $ConvertPeriodDate = date("Ym", strtotime($_POST["period"]));
    $SysPgmID = "FT04_CommuteAllow ";
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $strSQL = "INSERT INTO tt04_commuteallow ";
    $strSQL .="(`auto_increment`, `EmplCode`, `CommCode`, `CommAllow`, `Remark`, `SysUpdDate`, `SysUserID`, `SysPgmID`) ";
    $strSQL .="VALUES ";
    $strSQL .="('','".$_POST["EmplCode"]."','".$_POST["CommCode"]."',
                '".$_POST["CommAllow"]."',
                '".$_POST["Remark"]."',
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
    //$strSQL = "SELECT * FROM tt04_commuteallow WHERE auto_increment = '".$_POST["edit_id"]."'";   
    $strSQL = "SELECT tt04_commuteallow. * , tm03_employee.EmplTName FROM tt04_commuteallow, tm03_employee WHERE tt04_commuteallow.EmplCode = tm03_employee.EmplCode AND tt04_commuteallow.auto_increment ='".$_POST["edit_id"]."' ";
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
        $auto_increment = $rows["auto_increment"];
        $EmplTName = $rows["EmplTName"];
        $CommCode = $rows["CommCode"];
        $CommAllow = $rows["CommAllow"];
        $Remark = $rows["Remark"];
$output = "";
    $output .= '<input type="hidden" name="id" value="'.$auto_increment.'">
    <div class="row">
    <div class="col-md-6">
        <dl class="row">
            <dt class="col-sm-4 info-box-label">Employee Name : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">  
            <input  type="text" id="show_emp_name"  class="form-control" placeholder="ระบุพนักงาน" value="'.$EmplTName.'" disabled />
';

$output .='
            </dd>
        </dl>
    </div>
    <div class="col-md-6">
        <dl class="row">
            <dt class="col-sm-4 info-box-label">CommAllow : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="CommAllow" value="'.$CommAllow.'" type="number" data-placement="top" required  class="form-control" min="1"  value="0"/>
            </dd>
        </dl>
    </div>
    <div class="col-md-6">
        <dl class="row">
            <dt class="col-sm-4 info-box-label">CommCode : </dt>
            <dd class="col-sm-8 info-box-label">
            <input type="text" value="'.$CommCode.'"  name="CommCode" placeholder="ระบุ CommCode" class="form-control"/>
            </dd>
        </dl>
    </div>
    <div class="col-md-6">
        <dl class="row">
            <dt class="col-sm-4 info-box-label">Remark : </dt>
            <dd class="col-sm-8 info-box-label">
            <textarea  class="form-control"  rows="3" name="Remark" id="Remark" placeholder="ระบุหมายเหตุ">'.$Remark.'</textarea>
            </dd>
        </dl>
    </div>
   
</div>

         ';  
}  
echo $output;  
}  

if(isset($_POST["update"]))  {
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    $SysPgmID = "FT04_CommuteAllow";
    $strSQL = "UPDATE tt04_commuteallow ";
    $strSQL .= "SET CommCode='".$_POST["CommCode"]."',CommAllow='".$_POST["CommAllow"]."',
    Remark='".$_POST["Remark"]."',
    SysUpdDate='".$date."',SysUserID='".$_SESSION["UserID"]."',
                    SysPgmID='".$SysPgmID ."'";
    $strSQL .= " WHERE auto_increment = '".$_POST["id"]."'";
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
if(isset($_POST["delete_id"]))  {
    $output.= "<p>Are you confirm delete?</p>
    <input type='hidden' name='delete' value='".$_POST["delete_id"]."'/>
    ";
    echo $output;
}
if(isset($_POST["delete"])) {    
    $strSQL = "DELETE FROM tt04_commuteallow ";
    $strSQL .="WHERE auto_increment = '".$_POST["delete"]."' ";
    $objQuery = mysqli_query($conn, $strSQL);
    if($objQuery)
  {
      echo '<script>window.location.href="communication-allowance.php"</script>';
     // $result = '<script> alert("ทำการลบข้อมูลสำเร็จ");</script>';
    //$msgbox = '<span class="success fixed animated fadeIn">ลบข้อมูล สำเร็จ </span>';
  }
  else
  {
      $result = '<script>alert("ขออภัย! ไม่สามารถทำการลบข้อมูลได้")</script>';
  }
 }
?>