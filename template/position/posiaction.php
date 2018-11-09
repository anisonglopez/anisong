<?php 
error_reporting(0);
if(isset($_POST["create"])) {
    $ConvertPeriodDate = date("Ym", strtotime($_POST["period"]));
    $SysPgmID = "FM02_Position";
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $strSQL = "INSERT INTO tm02_position ";
    $strSQL .="(PosiCode, PosiEDesc, PosiTDesc, 
                PosiALW, FareALW_PD, M_ShftALW_D, E_ShftALW_D, 
                N_ShftALW_D, SysUpdDate, SysUserID, 
                SysPgmID) ";

    $strSQL .="VALUES ";

    $strSQL .="('".$_POST["PosiCode"]."',
  '".$_POST["PosiEDesc"]."',
  '".$_POST["PosiTDesc"]."',
  '".$_POST["PosiALW"]."',
  '"."0"."',
  '".$_POST["M_ShftALW_D"]."',
  '".$_POST["E_ShftALW_D"]."',
  '".$_POST["N_ShftALW_D"]."',
  '".$date."','".$_SESSION['UserID']."',
  '".$SysPgmID."' )";

     $objQuery = mysqli_query($conn, $strSQL);
    if($objQuery)
    {
        $result = '<script> alert("ทำการบันทึกข้อมูลสำเร็จ");</script>';
    }
    else
    {
        $result = '<script>alert("ขออภัย! เนื่องจากมีรหัสตำแหน่ง นี้แล้วในระบบ ไม่สามารถทำการบันทึกข้อมูลได้")</script>';
    }
    }
}
if(isset($_POST["edit_id"]))  
{  
    include "../../config/connect.php";
    $strSQL = "SELECT * FROM tm02_position WHERE PosiCode = '".$_POST["edit_id"]."'";   
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
        $ConvertPeriodDate = date("Y-m", strtotime($rows["Period"]));
        if ($rows["EmplType"] == M){
            $EmplString = "Monthly Employee";
        }
        else
        {
            $EmplString = "Daily Employee";
        }
    $output .= '<input type="hidden" name="id" value="'.$_POST["edit_id"].'">
    <br>
    <div class="row">
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">รหัสตำแหน่ง : <span class="field-required">*</span></dt>
            <dd class="col-sm-5 info-box-label">
            <input name="PosiCode" type="text" value="'.$rows["PosiCode"].'" data-placement="top" required  class="form-control"  disabled/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">ตำแหน่ง(ENG) : </dt>
            <dd class="col-sm-8 info-box-label">
            <input name="PosiEDesc" type="text" value="'.$rows["PosiEDesc"].'" data-placement="top" required  class="form-control" maxlength="50"  />
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">ตำแหน่ง(TH) : </dt>
            <dd class="col-sm-8 info-box-label">
            <input name="PosiTDesc" type="text" value="'.$rows["PosiTDesc"].'" data-placement="top"  required class="form-control"  maxlength="20"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">เบี้ยเลี้ยง/เดือน : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="PosiALW" value="'.$rows["PosiALW"].'" type="number" data-placement="top"  class="form-control" min="0"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
				<div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">เบี้ยเลี้ยง/วัน(เช้า) : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="M_ShftALW_D" value="'.$rows["M_ShftALW_D"].'" type="number" data-placement="top"  class="form-control" min="0"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">เบี้ยเลี้ยง/วัน(บ่าย) : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="E_ShftALW_D" value="'.$rows["E_ShftALW_D"].'" type="number" data-placement="top"  class="form-control" min="0"  maxlength="20"/>   
            </dd>
          </dl>
        </div> 
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">เบี้ยเลี้ยง/วัน(เย็น) : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="N_ShftALW_D" value="'.$rows["N_ShftALW_D"].'" type="number" data-placement="top"  class="form-control" min="0"  maxlength="20"/>   
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
    $strSQL = "UPDATE tm02_position ";
    $strSQL .= "SET PosiEDesc='".$_POST["PosiEDesc"]."',PosiTDesc='".$_POST["PosiTDesc"]."',PosiALW='".$_POST["PosiALW"]."',
                    FareALW_PD='".$_POST["FareALW_PD"]."',M_ShftALW_D='".$_POST["M_ShftALW_D"]."',E_ShftALW_D='".$_POST["E_ShftALW_D"]."',
                    N_ShftALW_D='".$_POST["N_ShftALW_D"]."',SysUpdDate='".$date."',SysUserID='".$_SESSION["UserID"]."',
                    SysPgmID='".$_POST["SysPgmID"]."'";
    $strSQL .= " WHERE PosiCode = '".$_POST["id"]."'";
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
    $strSQL = "DELETE FROM tm02_position ";
    $strSQL .="WHERE PosiCode = '".$_POST["delete"]."' ";
    $objQuery = mysqli_query($conn, $strSQL);
    if($objQuery)
  {
      echo '<script>window.location.href="position.php?page=1"</script>';
     // $result = '<script> alert("ทำการลบข้อมูลสำเร็จ");</script>';
    //$msgbox = '<span class="success fixed animated fadeIn">ลบข้อมูล สำเร็จ </span>';
  }
  else
  {
      $result = '<script>alert("ขออภัย! ไม่สามารถทำการลบข้อมูลได้")</script>';
  }
 }
?>