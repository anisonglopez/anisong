<?php 
error_reporting(0);
if(isset($_POST["create"])) {
  if($_POST["TaxCalFlag"] != 1)
  {
    $_POST["TaxCalFlag"] = 0;
  } 
    $ConvertPeriodDate = date("Ym", strtotime($_POST["period"]));
    $SysPgmID = "TM02_DeductType";
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $strSQL = "INSERT INTO tm02_deducttype ";
    $strSQL .="(DeductDesc, DeductTDesc, 
                DeductAmt, 
                DeductAmt2, 
                DeductAmt3, 
                DeductAmt4, 
                DeductAmt5, 
                TaxCalFlag, 
                SysUpdDate, 
                SysUserID, 
                SysPgmID) ";
    $strSQL .="VALUES ";
    $strSQL .="('".$_POST["DeductDesc"]."',
    '".$_POST["DeductTDesc"]."',
    '".$_POST["DeductAmt"]."',
    '".$_POST["DeductAmt2"]."',
    '".$_POST["DeductAmt3"]."',
    '".$_POST["DeductAmt4"]."',
    '".$_POST["DeductAmt5"]."',
    '".$_POST["TaxCalFlag"]."',
    '".$date."','".$_SESSION['UserID']."',
    '".$SysPgmID."')";
    //$strSQL .="('".mysqli_real_escape_string($_POST["period"])."', '"($_POST["term"])."', '".mysqli_real_escape_string($_POST["emp_type"])."', '".($_POST["salary_date_from"])."', '".$_POST["salary_date_to"]. "' , '" .$_POST["overtime_date_from"]."' ,'" .$_POST["overtime_date_to"]."' , '" .$_POST["user_login"]."' , 'FM01_User' )";
    $objQuery = mysqli_query($conn, $strSQL);
    if($objQuery)
    {
        $result = '<script> alert("ทำการบันทึกข้อมูลสำเร็จ");</script>';
    }
    else
    {
        $result = '<script>alert("ขออภัย! เนื่องจากมีรหัส นี้แล้วในระบบ ไม่สามารถทำการบันทึกข้อมูลได้")</script>';
        //header("Location: " . $_SERVER['REQUEST_URI']);
       // header("location: ../../user.php");
    }
    }
}
if(isset($_POST["edit_id"]))  
{  
    include "../../config/connect.php";
    $strSQL = "SELECT * FROM tm02_deducttype WHERE deductcode = '".$_POST["edit_id"]."'";   
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
   $taxflag =  ($rows["TaxCalFlag"] == 1 ? 'checked' : ''); 
    $output .= '<input type="hidden" name="id" value="'.$_POST["edit_id"].'">
    <br>
    <div class="row">
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Description (EN) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="DeductDesc" type="text" value="'.$rows["DeductDesc"].'" data-placement="top" required  class="form-control" maxlength="50" />
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Description (TH) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="DeductTDesc" type="text" value="'.$rows["DeductTDesc"].'" data-placement="top"  class="form-control"  maxlength="50"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Amount_1 : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="DeductAmt" type="number" value="'.$rows["DeductAmt"].'" data-placement="top"  class="form-control"  min="0"maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Amount_2 : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="DeductAmt2" type="number" value="'.$rows["DeductAmt2"].'" data-placement="top"  class="form-control"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Amount_3 : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="DeductAmt3" type="number" value="'.$rows["DeductAmt3"].'" data-placement="top"  class="form-control"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Amount_4 : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="DeductAmt4" type="number" value="'.$rows["DeductAmt4"].'" data-placement="top"  class="form-control"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Amount_5 : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="DeductAmt5" type="number" value="'.$rows["DeductAmt5"].'" data-placement="top"  class="form-control"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
				<div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Tax Calculate Flag : </dt>
            <dd class="col-sm-4">
            <div class="material-switch pull-right">
            <input id="TaxCalFlag" name="TaxCalFlag" type="checkbox" value="1" 
            '.$taxflag .'/>
             <label for="TaxCalFlag" class="label-success"></label>
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
  if($_POST["TaxCalFlag"] != 1)
  {
    $_POST["TaxCalFlag"] = 0;
  } 
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    $strSQL = "UPDATE tm02_deducttype ";
    $strSQL .= "SET DeductDesc='".$_POST["DeductDesc"]."',
    DeductTDesc='".$_POST["DeductTDesc"]."',
    DeductAmt='".$_POST["DeductAmt"]."',
    DeductAmt='".$_POST["DeductAmt"]."',
    DeductAmt2='".$_POST["DeductAmt2"]."',
    DeductAmt3='".$_POST["DeductAmt3"]."',
    DeductAmt4='".$_POST["DeductAmt4"]."',
    DeductAmt5='".$_POST["DeductAmt5"]."',
                    TaxCalFlag='".$_POST["TaxCalFlag"]."',SysUpdDate='".$date."',SysUserID='".$_SESSION["UserID"]."',
                    SysPgmID='".$_POST["SysPgmID"]."'";
    $strSQL .= " WHERE DeductCode = '".$_POST["id"]."'";
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
    $strSQL = "DELETE FROM tm02_deducttype ";
    $strSQL .="WHERE DeductCode = '".$_POST["delete"]."' ";
    $objQuery = mysqli_query($conn, $strSQL);
    if($objQuery)
  {
      echo '<script>window.location.href="deducttype.php"</script>';
     // $result = '<script> alert("ทำการลบข้อมูลสำเร็จ");</script>';
    //$msgbox = '<span class="success fixed animated fadeIn">ลบข้อมูล สำเร็จ </span>';
  }
  else
  {
      $result = '<script>alert("ขออภัย! ไม่สามารถทำการลบข้อมูลได้")</script>';
  }
 }
?>