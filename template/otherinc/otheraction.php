<?php 
error_reporting(0);
if(isset($_POST["create"])) {
  if($_POST["TaxCalFlag"] != 1)
  {
    $_POST["TaxCalFlag"] = 0;
  } 
  $SysPgmID = "FM02_OtherINC";
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
              '".$date. "' , '" .$_POST["user_login"]."' , '" .$SysPgmID ."' )";

    $objQuery = mysqli_query($conn, $strSQL);
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
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) {    
      $taxflag =  ($rows["TaxCalFlag"] == 1 ? 'checked' : ''); 
    $output .= '<input type="hidden" name="id" value="'.$_POST["edit_id"].'">
    <div class="row">
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Income No  : <span class="field-required">*</span></dt>
            <dd class="col-sm-4 info-box-label">
            <input name="OthINCCode" type="text" value="'.$rows["OthINCCode"].'" data-placement="top" required  class="form-control" disabled/ >      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Description (EN) : </dt>
            <dd class="col-sm-8 info-box-label">
            <input name="OthINCEDesc" type="text" value="'.$rows["OthINCEDesc"].'" data-placement="top" required  class="form-control" maxlength="100"/>
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Description (TH) : </dt>
            <dd class="col-sm-8 info-box-label">
            <input name="OthINCTDesc" type="text" value="'.$rows["OthINCTDesc"].'" data-placement="top"  class="form-control"  maxlength="100"/ >      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Amount : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="OthIncAmt" type="number" value="'.$rows["OthIncAmt"].'" data-placement="top"  class="form-control" min="0"/ >   
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
    $strSQL = "DELETE FROM tm02_otherinc ";
    $strSQL .="WHERE OthINCCode = '".$_POST["delete"]."'";

    //echo $strSQL;

    $objQuery = mysqli_query($conn, $strSQL);
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