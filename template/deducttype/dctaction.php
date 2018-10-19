<?php 
if(isset($_POST["create"])) {
  /*  echo "period = ".$_POST["period"]. "<br/>";
    echo "term = ".$_POST["term"]. "<br/>";
    echo "paydate = ".$_POST["paydate"]. "<br/>";
    echo "emp_type = ".$_POST["emp_type"]. "<br/>";
    echo "salary_date_from = ".$_POST["salary_date_from"]. "<br/>";
    echo "salary_date_to = ".$_POST["salary_date_to"]. "<br/>";
    echo "overtime_date_from = ".$_POST["overtime_date_from"]. "<br/>";
    echo "overtime_date_to = ".$_POST["overtime_date_to"]. "<br/>";
    echo "lev_date_from = ".$_POST["lev_date_from"]. "<br/>";
    echo "lev_date_to = ".$_POST["lev_date_to"]. "<br/>";
   */ 
    $ConvertPeriodDate = date("Ym", strtotime($_POST["period"]));
    $SysPgmID = "FT05_PrepareMonthlyData";
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $strSQL = "INSERT INTO tm02_deducttype ";
    $strSQL .="(DeductCode, DeductDesc, DeductTDesc, 
                DeductAmt, TaxCalFlag, 
                SysUpdDate, SysUserID, SysPgmID) ";
    $strSQL .="VALUES ";
    $strSQL .="('".$_POST["DeductCode"]."','".$_POST["DeductDesc"]."','".$_POST["DeductTDesc"]."',
                '".$_POST["DeductAmt"]."','".$_POST["TaxCalFlag"]."',
                '".$date."','".$_SESSION['UserID']."',
                '".$_POST["SysPgmID"]."', )";
    //$strSQL .="('".mysql_real_escape_string($_POST["period"])."', '"($_POST["term"])."', '".mysql_real_escape_string($_POST["emp_type"])."', '".($_POST["salary_date_from"])."', '".$_POST["salary_date_to"]. "' , '" .$_POST["overtime_date_from"]."' ,'" .$_POST["overtime_date_to"]."' , '" .$_POST["user_login"]."' , 'FM01_User' )";
    $objQuery = mysql_query($strSQL);
    if($objQuery)
    {
        $result = '<script> alert("ทำการบันทึกข้อมูลสำเร็จ");</script>';
    }
    else
    {
        $result = '<script>alert("ขออภัย! เนื่องจากมี Period นี้แล้วในระบบ ไม่สามารถทำการบันทึกข้อมูลได้")</script>';
        //header("Location: " . $_SERVER['REQUEST_URI']);
       // header("location: ../../user.php");
    }
    }
}
if(isset($_POST["edit_id"]))  
{  
    include "../../config/connect.php";
    $strSQL = "SELECT * FROM tm00_control WHERE auto_increment = '".$_POST["edit_id"]."'";   
    $objQuery = mysql_query($strSQL); 
    while ($rows = mysql_fetch_array($objQuery)) {    
        $ConvertPeriodDate = date("Y-m", strtotime($rows["Period"]));
        if ($rows["EmplType"] == M){
            $EmplString = "Monthly Employee";
        }
        else
        {
            $EmplString = "Daily Employee";
        }
    $output .= '<input type="hidden" name="id" value="'.$_POST["edit_id"].'">
    <div class="row">
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">รหัสประเภทการหักเงิน : <span class="field-required">*</span></dt>
            <dd class="col-sm-4 info-box-label">
            <input name="DeductCode" type="text" value="'.$_POST["DeductCode"].'" data-placement="top" required  class="form-control" maxlength="20" pattern="\w+"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">ประเภทการหักเงิน(ENG) : </dt>
            <dd class="col-sm-4 info-box-label">
            <input name="DeductDesc" type="text" value="'.$_POST["DeductDesc"].'" data-placement="top" required  class="form-control" maxlength="20"  pattern="\w+"/>
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">ประเภทการหักเงิน(ไทย) : </dt>
            <dd class="col-sm-4 info-box-label">
            <input name="DeductTDesc" type="text" value="'.$_POST["DeductTDesc"].'" data-placement="top"  class="form-control"  maxlength="20"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">จำนวน : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="DeductAmt" type="text" value="'.$_POST["DeductAmt"].'" data-placement="top"  class="form-control"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
				<div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">นำไปคำนวนภาษี : </dt>
            <dd class="col-sm-4 info-box-label">
						<label class="checkbox-inline"><input type="checkbox" name="TaxCalFlag" value="1"></label>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">SysPgmID : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="SysPgmID" type="text" value="'.$_POST["SysPgmID"].'" data-placement="top"  class="form-control"  maxlength="20"/>   
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
    $strSQL = "UPDATE tm02_deducttype ";
    $strSQL .= "SET DeductDesc='".$_POST["DeductDesc"]."',DeductTDesc='".$_POST["DeductTDesc"]."',DeductAmt='".$_POST["DeductAmt"]."',
                    TaxCalFlag='".$_POST["TaxCalFlag"]."',SysUpdDate='".$date."',SysUserID='".$_SESSION["UserID"]."',
                    SysPgmID='".$_POST["SysPgmID"]."'";
    $strSQL .= " WHERE DeductCode = '".$_POST["id"]."'";
        $objQuery = mysql_query($strSQL);    
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
    $objQuery = mysql_query($strSQL);
    if($objQuery)
  {
      echo '<script>window.location.href="systemcontrol.php"</script>';
     // $result = '<script> alert("ทำการลบข้อมูลสำเร็จ");</script>';
    //$msgbox = '<span class="success fixed animated fadeIn">ลบข้อมูล สำเร็จ </span>';
  }
  else
  {
      $result = '<script>alert("ขออภัย! ไม่สามารถทำการลบข้อมูลได้")</script>';
  }
 }
?>