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
    echo "id ที่เรียก แล้วค่อยเอาไป Search หา คือ id".$_POST["edit_id"];
    $strSQL = "SELECT * FROM tm00_control WHERE auto_increment = '".$_POST["edit_id"]."'";   
    $objQuery = mysql_query($strSQL); 
    $output .= '<div class="table-responsive"> <label>รายละเอียดเพิ่มเติม</label> 
    <table class="table table-bordered"> 
    ';  
   
   
   
    while ($rows = mysql_fetch_array($objQuery)) {    
    $output .= '
     <tr>  
         <td width="20%" align="right"><label>ชื่อ</label></td>  
         <td width="80%">'.$rows["Period"].'</td> 
     </tr> 
    <tr>
         <td width="20%" align="right"><label>Email</label></td>
         <td width="80%">'.$rows["email"].'</td> 
     </tr>  
     <tr>
         <td width="20%" align="right"><label>ข้อความ</label></td>
         <td width="80%">'.$rows["message"].'</td> 
     </tr> 
     <tr>
         <td width="20%" align="right"><label>หมายเลข Ip</label></td>
         <td width="80%">'.$rows["ipaddress"].'</td> 
     </tr> 
     <tr>
         <td width="20%" align="right"><label>วันที่ส่งคำร้อง</label></td>
         <td width="80%">'.$rows["recievedate"].'</td> 
     </tr> 

         ';  
}  
$output .= '</table></div>';  
echo $output;  
}  
?>