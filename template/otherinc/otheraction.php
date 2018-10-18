<?php 

if(isset($_POST["create"])) {
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $strSQL = "INSERT INTO tm02_otherinc ";
    $strSQL .="(OthINCCode, OthINCEDesc, OthINCTDesc, OthIncAmt, TaxCalFlag, SysUpdDate, SysUserID, SysPgmID) ";
    $strSQL .="VALUES ";
    $strSQL .="('".$_POST["OthINCCode"]."',
              '".$_POST["OthINCEDesc"]."',
              '".$_POST["OthINCTDesc"]."',
              '".$_POST["OthIncAmt"]."',
              '".$_POST["TaxCalFlag"]."',
              '".$date. "' , '" .$_POST["user_login"]."' , 'FM02_OtherINC' )";

    $objQuery = mysql_query($strSQL);
    if($objQuery)
    {
        $result = '<script>alert("ทำการบันทึกข้อมูลสำเร็จ")</script>';
        
    }
    else
    {
        $result = '<script>alert("ขออภัย! ไม่สามารถทำการบันทึกข้อมูลได้")</script>';
        
        //header("Location: " . $_SERVER['REQUEST_URI']);
       // header("location: ../../user.php");
    }
  }
}
if(isset($_POST["edit_id"]))  
{  
    include "../../config/connect.php";
    $strSQL = "SELECT * FROM tm02_otherinc WHERE OthINCCode = '".$_POST["edit_id"]."'";   
    $objQuery = mysql_query($strSQL); 
    while ($rows = mysql_fetch_array($objQuery)) {    
    $output .= '<input type="hidden" name="id" value="'.$_POST["edit_id"].'">
    <div class="row">
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">รหัสรายได้ : <span class="field-required">*</span></dt>
            <dd class="col-sm-4 info-box-label">
            <input name="OthINCCode" type="text" value="'.$rows["OthINCCode"].'" data-placement="top" required  class="form-control"  maxlength="20"/ >      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">ชื่อรายได้(EN) : </dt>
            <dd class="col-sm-4 info-box-label">
            <input name="OthINCEDesc" type="text" value="'.$rows["OthINCEDesc"].'" data-placement="top" required  class="form-control" maxlength="20"/>
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">ชื่อรายได้(TH) : </dt>
            <dd class="col-sm-4 info-box-label">
            <input name="OthINCTDesc" type="text" value="'.$rows["OthINCTDesc"].'" data-placement="top"  class="form-control"  maxlength="20"/ >      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">จำนวนเงินรายได้ : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="OthIncAmt" type="text" value="'.$rows["OthIncAmt"].'" data-placement="top"  class="form-control"  maxlength="20"/ >   
            </dd>
          </dl>
        </div>
				<div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">นำไปคำนวนภาษีภาษี : </dt>
            <dd class="col-sm-4 info-box-label">
			<input name="TaxCalFlag" type="text" data-placement="top" value="'.$rows["TaxCalFlag"].'"  class="form-control"  maxlength="20"/ >   
            </dd>
          </dl>
        </div>                
      </div>
                        </div>
                    </div>
                </div>
                       
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
        $strSQL = "UPDATE tm02_otherinc ";
        $strSQL .= "SET OthINCEDesc='".$_POST["OthINCEDesc"]."',OthINCTDesc='".$_POST["OthINCTDesc"]."',OthIncAmt='".$_POST["OthIncAmt"]."',TaxCalFlag='".$_POST["TaxCalFlag"]."'";
        $strSQL .= " WHERE OthINCCode = '".$_POST["id"]."'";

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
    $strSQL = "DELETE FROM tm02_otherinc ";
    $strSQL .="WHERE OthINCCode = '".$_POST["delete"]."'";

    //echo $strSQL;

    $objQuery = mysql_query($strSQL);
    if($objQuery)
  {
      echo '<script>window.location.href="otherinc.php"</script>';
     // $result = '<script> alert("ทำการลบข้อมูลสำเร็จ");</script>';
    //$msgbox = '<span class="success fixed animated fadeIn">ลบข้อมูล สำเร็จ </span>';
  }
  else
  {
      $result = '<script>alert("ขออภัย! ไม่สามารถทำการลบข้อมูลได้")</script>';
  }
 }  
?>