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
    $strSQL = "INSERT INTO tm00_control ";
    $strSQL .="(Period, Term, EmplType, FmAttnDate, ToAttnDate, FmOVTDate, ToOVTDate, FmLevDate, ToLevDate,  PayDate, SysUpdDate, SysUserID, SysPgmID) ";
    $strSQL .="VALUES ";
    $strSQL .="('".$ConvertPeriodDate."', '".($_POST["term"])."', '".mysql_real_escape_string($_POST["emp_type"])."',
 '".($_POST["salary_date_from"])."', '".($_POST["salary_date_to"])."', '".($_POST["overtime_date_from"])."', '".($_POST["overtime_date_to"])."', 
 '".($_POST["lev_date_from"])."', '".($_POST["lev_date_to"])."', '".($_POST["paydate"])."', 
 '".$date. "' , '" .$_POST["user_login"]."' , '".$SysPgmID."')";
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
    <div class="col-md-6">
        <dl class="row">
            <dt class="col-sm-4 info-box-label">Period : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="period" type="month" value="'.$ConvertPeriodDate.'" data-placement="top" required  class="form-control"  disabled/ >      
            </dd>
        </dl>
    </div>
    <div class="col-md-6">
        <dl class="row">
            <dt class="col-sm-4 info-box-label">รอบ : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="term" type="number" value="'.$rows["Term"].'" data-placement="top" required  class="form-control"placeholder="ระบุรอบที่จ่าย" min="1" max="3" maxlength="1" disabled/>
            </dd>
        </dl>
    </div>
    <div class="col-md-6">
        <dl class="row">
            <dt class="col-sm-4 info-box-label">วันที่จ่าย : </dt>
            <dd class="col-sm-8 info-box-label">
            <input name="paydate" type="date"value="'.$rows["PayDate"].'"  data-placement="top"  class="form-control"  maxlength="20" / >      
            </dd>
        </dl>
    </div>
    <div class="col-md-6">
    <dl class="row">
            <dt class="col-sm-4 info-box-label">ประเภทพนักงาน : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <select class="form-control"  name="emp_type" required disabled>
            <option value="'.$rows["EmplType"].'">'.$EmplString.'</option>   
            <option value="D">Daily Employee</option>
            <option value="M">Monthly Employee</option>
            </select>   
            </dd>
        </dl>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-12">
<!--Start-->
<div class="add-pad">
        <div class="title-header-info-box add-pad">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active " data-toggle="tab" href="#tab1" id="tabspecification" role="tab">Period</a>
                </li>
            </ul>
        </div>
        <div class="warpper-table">
            <div class="tab-content">
            <br/>
                <!-- ///////////////////////////////Period Control///////////////////////////////////////// -->
                <div class="tab-pane active" id="tab1">
                    <div class="header-info-content-box content-box-padding">
                        <div class="row">
                        <div class="col-md-12">
        <dl class="row">
            <dt class="col-sm-3 info-box-label">Salary Date from : <span class="field-required">*</span></dt>
            <dd class="col-sm-3 info-box-label">
            <input name="salary_date_from" value="'.$rows["FmAttnDate"].'" type="date" data-placement="top" required  class="form-control" disabled/ >      
            </dd>
            <dt class="col-sm-1 info-box-label">To : <span class="field-required">*</span></dt>
            <dd class="col-sm-3 info-box-label">
            <input name="salary_date_to" type="date" value="'.$rows["ToAttnDate"].'" data-placement="top" required  class="form-control" disabled/ >      
            </dd>
            <dd class="col-sm-2 info-box-label"></dd>
           </dl>
    </div>
    <div class="col-md-12">
        <dl class="row">
            <dt class="col-sm-3 info-box-label">Overtime Date from : <span class="field-required">*</span></dt>
            <dd class="col-sm-3 info-box-label">
            <input name="overtime_date_from"  value="'.$rows["FmOVTDate"].'" type="date" data-placement="top" required  class="form-control" disabled/ >      
            </dd>
            <dt class="col-sm-1 info-box-label">To : <span class="field-required">*</span></dt>
            <dd class="col-sm-3 info-box-label">
            <input name="overtime_date_to"  value="'.$rows["ToOVTDate"].'" type="date" data-placement="top" required  class="form-control" disabled / >      
            </dd>
            <dd class="col-sm-2 info-box-label"></dd>
           </dl>
    </div>
    <div class="col-md-12">
        <dl class="row">
            <dt class="col-sm-3 info-box-label">Lev-Late-Shif Date from : <span class="field-required">*</span></dt>
            <dd class="col-sm-3 info-box-label">
            <input name="lev_date_from" type="date" value="'.$rows["FmLevDate"].'" data-placement="top" required  class="form-control" disabled/ >      
            </dd>
            <dt class="col-sm-1 info-box-label">To : <span class="field-required">*</span></dt>
            <dd class="col-sm-3 info-box-label">
            <input name="lev_date_to" type="date" value="'.$rows["ToLevDate"].'"  data-placement="top" required  class="form-control" disabled / >      
            </dd>
            <dd class="col-sm-2 info-box-label"></dd>
           </dl>
    </div>
                        </div>
                    </div>
                </div>
<!-- ///////////////////////////////Period Control///////////////////////////////////////// -->                         
<!--END-->

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
        $strSQL = "UPDATE tm00_control ";
        $strSQL .= "SET PayDate = '".($_POST["paydate"])."'";
        $strSQL .="WHERE auto_increment = '".$_POST["id"]."'";
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
    $strSQL = "DELETE FROM tm00_control ";
    $strSQL .="WHERE auto_increment = '".$_POST["delete_id"]."' ";
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