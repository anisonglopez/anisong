<?php 
error_reporting(0);
if(isset($_POST["create"])) {
  if($_POST["Ded_Flag"] != 1)
        {
          $_POST["Ded_Flag"] = 0;
        } 
    $ConvertPeriodDate = date("Ym", strtotime($_POST["period"]));
    $SysPgmID = "FM02_AttnCode";
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $strSQL = "INSERT INTO tm02_attncode ";
    $strSQL .="(AttnCode, AttnEDesc, AttnTDesc, 
                Ded_Flag, Ded_Rate, SysUpdDate, SysUserID, 
                SysPgmID) ";
    $strSQL .="VALUES ";
    $strSQL .="('".$_POST["AttnCode"]."','".$_POST["AttnEDesc"]."','".$_POST["AttnTDesc"]."',
                '".$_POST["Ded_Flag"]."','".$_POST["Ded_Rate"]."','".$date."','".$_SESSION['UserID']."',
                '".$SysPgmID ."' )";
    //$strSQL .="('".mysqli_real_escape_string($_POST["period"])."', '"($_POST["term"])."', '".mysqli_real_escape_string($_POST["emp_type"])."', '".($_POST["salary_date_from"])."', '".$_POST["salary_date_to"]. "' , '" .$_POST["overtime_date_from"]."' ,'" .$_POST["overtime_date_to"]."' , '" .$_POST["user_login"]."' , 'FM01_User' )";
    $objQuery = mysqli_query($conn, $strSQL);
    if($objQuery)
    {
        $result = '<script> alert("ทำการบันทึกข้อมูลสำเร็จ");</script>';
    }
    else
    {
        $result = '<script>alert("ขออภัย! เนื่องจากมี รหัสการลา นี้แล้วในระบบ ไม่สามารถทำการบันทึกข้อมูลได้")</script>';
        //header("Location: " . $_SERVER['REQUEST_URI']);
       // header("location: ../../user.php");
    }
    }
}
if(isset($_POST["edit_id"]))  
{  
    include "../../config/connect.php";
    $strSQL = "SELECT * FROM tm02_attncode WHERE AttnCode = '".$_POST["edit_id"]."'";   
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
   $deductFlg =  ($rows["Ded_Flag"] == 1 ? 'checked' : ''); 
    $output .= '<input type="hidden" name="id" value="'.$_POST["edit_id"].'">
    <br>
    <div class="row">
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">รหัสการลา : <span class="field-required">*</span></dt>
            <dd class="col-sm-5 info-box-label">
            <input name="AttnCode" type="text" value="'.$rows["AttnCode"].'" data-placement="top" required  class="form-control" maxlength="5" disabled />      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">คำอธิบาย(ENG) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="AttnEDesc" type="text" value="'.$rows["AttnEDesc"].'" data-placement="top" required  class="form-control" maxlength="50" />
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">คำอธิบาย(TH) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="AttnTDesc" type="text" value="'.$rows["AttnTDesc"].'" data-placement="top" required  class="form-control"  maxlength="50"/>      
            </dd>
          </dl>
        </div>
				<div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">อัตราหัก : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="Ded_Rate" type="text" value="'.$rows["Ded_Rate"].'" data-placement="top"  class="form-control"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
        <dl class="row">
          <dt class="col-sm-4 info-box-label">Deduct Flag : </dt>
          <dd class="col-sm-8">
          <div class="material-switch pull-right">
          <input id="Ded_Flag" name="Ded_Flag" type="checkbox" value="1" 
          '.$deductFlg.'/>
           <label for="Ded_Flag" class="label-success"></label>
       </div>
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
  $SysPgmID = "FM02_AttnCode";
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    $strSQL = "UPDATE tm02_attncode ";
    $strSQL .= "SET AttnEDesc='".$_POST["AttnEDesc"]."',AttnTDesc='".$_POST["AttnTDesc"]."',Ded_Flag='".$_POST["Ded_Flag"]."',
                  Ded_Rate='".$_POST["Ded_Rate"]."',SysUpdDate='".$date."',SysUserID='".$_SESSION["UserID"]."',
                    SysPgmID='".$SysPgmID."'";
    $strSQL .= " WHERE AttnCode = '".$_POST["id"]."'";
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
    $strSQL = "DELETE FROM tm02_attncode ";
    $strSQL .="WHERE AttnCode = '".$_POST["delete"]."' ";
    $objQuery = mysqli_query($conn, $strSQL);
    if($objQuery)
  {
      echo '<script>window.location.href="attendance.php"</script>';
     // $result = '<script> alert("ทำการลบข้อมูลสำเร็จ");</script>';
    //$msgbox = '<span class="success fixed animated fadeIn">ลบข้อมูล สำเร็จ </span>';
  }
  else
  {
      $result = '<script>alert("ขออภัย! ไม่สามารถทำการลบข้อมูลได้")</script>';
  }
 }
?>