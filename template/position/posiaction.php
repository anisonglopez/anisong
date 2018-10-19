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
    $strSQL = "INSERT INTO tm02_position ";
    $strSQL .="(PosiCode, PosiEDesc, PosiTDesc, 
                PosiALW, M_ShftALW_D, E_ShftALW_D, 
                N_ShftALW_D, SysUpdDate, SysUserID, 
                SysPgmID) ";
    $strSQL .="VALUES ";
    $strSQL .="('".$_POST["PosiCode"]."','".$_POST["PosiEDesc"]."','".$_POST["PosiTDesc"]."',
                '".$_POST["PosiALW"]."','".$_POST["M_ShftALW_D"]."','".$_POST["E_ShftALW_D"]."',
                '".$_POST["N_ShftALW_D"]."','".$date."','".$_SESSION['UserID']."',
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
            <dt class="col-sm-4 info-box-label">รหัสตำแหน่ง : <span class="field-required">*</span></dt>
            <dd class="col-sm-4 info-box-label">
            <input name="PosiCode" type="text" value="'.$_POST["PosiCode"].'" data-placement="top" required  class="form-control" maxlength="20" pattern="\w+"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">ตำแหน่ง(ENG) : </dt>
            <dd class="col-sm-4 info-box-label">
            <input name="PosiEDesc" type="text" value="'.$_POST["PosiEDesc"].'" data-placement="top" required  class="form-control" maxlength="20"  pattern="\w+"/>
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">ตำแหน่ง(TH) : </dt>
            <dd class="col-sm-4 info-box-label">
            <input name="PosiTDesc" type="text" value="'.$_POST["PosiTDesc"].'" data-placement="top"  class="form-control"  maxlength="20"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">เบี้ยเลี้ยง/เดือน : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="PosiALW" value="'.$_POST["PosiALW"].'" type="text" data-placement="top"  class="form-control"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
				<div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">เบี้ยเลี้ยง/วัน(เช้า) : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="M_ShftALW_D" value="'.$_POST["M_ShftALW_D"].'" type="text" data-placement="top"  class="form-control"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">เบี้ยเลี้ยง/วัน(บ่าย) : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="E_ShftALW_D" value="'.$_POST["E_ShftALW_D"].'" type="text" data-placement="top"  class="form-control"  maxlength="20"/>   
            </dd>
          </dl>
        </div> 
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">เบี้ยเลี้ยง/วัน(เย็น) : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="N_ShftALW_D" value="'.$_POST["N_ShftALW_D"].'" type="text" data-placement="top"  class="form-control"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">SysPgmID : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="SysPgmID" value="'.$_POST["SysPgmID"].'" type="text" data-placement="top"  class="form-control"  maxlength="20"/>   
            </dd>
          </dl>
        </div>                   
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
    $strSQL = "DELETE FROM tm02_position ";
    $strSQL .="WHERE PosiCode = '".$_POST["delete"]."' ";
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