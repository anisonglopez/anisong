<?php 
error_reporting(0);
if(isset($_POST["create"])) {
 /*
$target_dir = "img/emp_pic/";
$target_file = $target_dir.basename($_FILES["emp_pic"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$check = getimagesize($_FILES["emp_pic"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
        
    } else {
      //$result = '<script>alert("File is not an image.")</script>';
        $uploadOk = 0;
    }
// Check if file already exists
if (file_exists($target_file)) {
  //$result = '<script>alert("ขออภัย! มีชื่อไฟล์รูปภาพนี้อยู่แล้วในระบบ")</script>';
  $uploadOk = 0;
}
// Check file size
if ($_FILES["emp_pic"]["size"] > 5000000) {
  $result = '<script>alert("ขออภัย! ขนาดของไฟล์ มีขนาดที่ใหญ่กว่า 5,000 KB")</script>';
  $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  //$result = '<script>alert("ขออภัย! only JPG, JPEG, PNG & GIF files are allowed.")</script>';
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  //$result = '<script>alert("Sorry, your file was not uploaded.")</script>';
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["emp_pic"]["tmp_name"], $target_file)) {
    //$pic_error = "The file ". basename( $_FILES["emp_pic"]["name"]). " has been uploaded.";
    
  } else {
    $result = '<script>alert("Sorry, there was an error uploading your file.")</script>';
  }
}
*/
date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $strSQL = "INSERT INTO tm03_employee ";
    $strSQL .="(`EmplCode`, 
                `EmplType`, 
                `ProcCode`, 
                `OT_Cal_F`, 
                `Attn_Cal_F`, 
                `EmplTName`, 
                `EmplEName`, 
                `DeptCode`, 
                `PosiCode`, 
                `EnterDate`, 
                `ProbFlag`, 
                `ProbDate`, 
                `ResignDate`, 
                `BankCode`, 
                `BankAccCode`, 
                `Sex`, 
                `Salary`, 
                `L_C_Gross`, 
                `L_C_Tax`, 
                `L_C_SOC`, 
                `BranchCode`, 
                `CompLoan`, 
                `Marital`, 
                `MarriageNo`, 
                `MarriagedDate`, 
                `TaxID`, 
                `TaxCond`, 
                `SpouseName`, 
                `ChildInEduc`, 
                `ChildNotEduc`, 
                `Own_Fath_Red_F`, 
                `Own_Fath_ID`, 
                `Own_Moth_Red_F`, 
                `Own_Moth_ID`, 
                `SP_Fath_Red_F`, 
                `SP_Fath_ID`, 
                `SP_Moth_Red_F`, 
                `SP_Moth_ID`, 
                `Address`, 
                `PostalCode`, 
                `HomePhone`, 
                `Nationality`, 
                `Ethnic`, 
                `Religion`, 
                `BirthDate`, 
                `IDno`, 
                `Height`, 
                `Weight`, 
                `UM_Flag`, 
                `PF_Flag`, 
                `PF_MemNo`, 
                `PF_EnterDate`, 
                `PF_E_Rate`, 
                `AL_Rem_Hrs`, 
                `O_Shft_D_PM`, 
                `M_Shft_D_PM`, 
                `E_Shft_D_PM`, 
                `N_Shft_D_PM`, 
                `Attn_ALW_F`, 
                `Attn_ALW_Accum`, 
                `Attn_ALW_AccumNext`, 
                `SL_Day`, 
                `SysUpdDate`, 
                `SysUserID`, 
                `SysPgmID`, 
                `Feneral_F`, 
                `Cooperative_F`, 
                `MoneyLoan_F`, 
                `GHB_F`, 
                `AccMoneyLoan`, 
                `LoanType`, 
                `LoanAmt`, 
                `AccGHB`, 
                `GHBType`, 
                `GHBAmt`, 
                `UnionMemberAmt`, 
                `AwardAmt`, 
                `CooperativeAmt01`, 
                `CooperativeMemId01`, 
                `CooperativeUnit01`, 
                `CooperativeAmt02`, 
                `CooperativeMemId02`, 
                `CooperativeUnit02`,
                `emp_pic`) ";
    $strSQL .="VALUES ";
    $strSQL .="('".$_POST["EmplCode"]."', 
    '".$_POST["EmplType"]."', 
    '".$_POST["ProcCode"]."', 
    '".$_POST["OT_Cal_F"]."', 
    '".$_POST["Attn_Cal_F"]."', 
    '".$_POST["EmplTName"]."', 
    '".$_POST["EmplEName"]."', 
    '".$_POST["DeptCode"]."', 
    '".$_POST["PosiCode"]."', 
    '".$_POST["EnterDate"]."', 
    '".$_POST["ProbFlag"]."', 
    '".$_POST["ProbDate"]."', 
    '".$_POST["ResignDate"]."', 
    '".$_POST["BankCode"]."', 
    '".$_POST["BankAccCode"]."', 
    '".$_POST["Sex"]."', 
    '".$_POST["Salary"]."', 
    '".$_POST["L_C_Gross"]."', 
    '".$_POST["L_C_Tax"]."', 
    '".$_POST["L_C_SOC"]."', 
    '".$_POST["BranchCode"]."', 
    '".$_POST["CompLoan"]."', 
    '".$_POST["Marital"]."', 
    '".$_POST["MarriageNo"]."', 
    '".$_POST["MarriagedDate"]."', 
    '".$_POST["TaxID"]."', 
    '".$_POST["TaxCond"]."', 
    '".$_POST["SpouseName"]."', 
    '".$_POST["ChildInEduc"]."', 
    '".$_POST["ChildNotEduc"]."', 
    '".$_POST["Own_Fath_Red_F"]."', 
    '".$_POST["Own_Fath_ID"]."', 
    '".$_POST["Own_Moth_Red_F"]."', 
    '".$_POST["Own_Moth_ID"]."', 
    '".$_POST["SP_Fath_Red_F"]."', 
    '".$_POST["SP_Fath_ID"]."', 
    '".$_POST["SP_Moth_Red_F"]."', 
    '".$_POST["SP_Moth_ID"]."', 
    '".$_POST["Address"]."', 
    '".$_POST["PostalCode"]."', 
    '".$_POST["HomePhone"]."', 
    '".$_POST["Nationality"]."', 
    '".$_POST["Ethnic"]."', 
    '".$_POST["Religion"]."', 
    '".$_POST["BirthDate"]."', 
    '".$_POST["IDno"]."', 
    '".$_POST["Height"]."', 
    '".$_POST["Weight"]."', 
    '".$_POST["UM_Flag"]."', 
    '".$_POST["PF_Flag"]."', 
    '".$_POST["PF_MemNo"]."', 
    '".$_POST["PF_EnterDate"]."', 
    '".$_POST["PF_E_Rate"]."', 
    '".$_POST["AL_Rem_Hrs"]."', 
    '".$_POST["O_Shft_D_PM"]."', 
    '".$_POST["M_Shft_D_PM"]."', 
    '".$_POST["E_Shft_D_PM"]."', 
    '".$_POST["N_Shft_D_PM"]."', 
    '".$_POST["Attn_ALW_F"]."', 
    '".$_POST["Attn_ALW_Accum"]."', 
    '".$_POST["Attn_ALW_AccumNext"]."', 
    '".$_POST["SL_Day"]."', 
    '".$date."', 
    '".$_POST["user_login"]."', 
    'ATCS', 
    '".$_POST["Feneral_F"]."', 
    '".$_POST["Cooperative_F"]."', 
    '".$_POST["MoneyLoan_F"]."', 
    '".$_POST["GHB_F"]."', 
    '".$_POST["AccMoneyLoan"]."', 
    '".$_POST["LoanType"]."', 
    '".$_POST["LoanAmt"]."', 
    '".$_POST["AccGHB"]."', 
    '".$_POST["GHBType"]."', 
    '".$_POST["GHBAmt"]."', 
    '".$_POST["UnionMemberAmt"]."', 
    '".$_POST["AwardAmt"]."', 
    '".$_POST["CooperativeAmt01"]."', 
    '".$_POST["CooperativeMemId01"]."', 
    '".$_POST["CooperativeUnit01"]."', 
    '".$_POST["CooperativeAmt02"]."', 
    '".$_POST["CooperativeMemId02"]."', 
    '".$_POST["CooperativeUnit02"]."',
    '".$_FILES["emp_pic"]["name"]."')";
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
    $strSQL = "SELECT * FROM tm03_employee WHERE EmplCode = '".$_POST["edit_id"]."'";   
    $objQuery = mysqli_query($conn, $strSQL); 
    while ($rows = mysqli_fetch_array($objQuery)) { 
      $deptcode = $rows["DeptCode"];
      $bankcode = $rows["BankCode"];
      $posicode = $rows["PosiCode"];
      $branchcode = $rows["BranchCode"];
      $Marital = $rows["Marital"];
      if ($rows["EmplType"] == "M"){
        $EmplMSe= "selected";
    }
    else
    {
        $EmplDSe= "selected";
    }

    if ($rows["ProcCode"] == 1){
      $ProcASe= "selected";
  }
  else
  {
      $ProcMSe = "selected";
  }
  if ($rows["TaxCond"] == "C"){
    $TaxCondCSe= "checked";
}
else
{
    $TaxCondESe = "checked";
}
    $output .= '<input type="hidden" name="id" value="'.$_POST["edit_id"].'">
    <div class="modal-body" >
    <br/>
    <div class="row">
      <div class="col-md-7">
       <dl class="row">
         <dt class="col-sm-4 info-box-label">รหัสพนักงาน : <span class="field-required">*</span></dt>
         <dd class="col-sm-4 info-box-label">
         <input name="EmplCode" type="text" value="'.$rows["EmplCode"].'" data-placement="top" required  class="form-control"  maxlength="10" disabled/>      
         </dd>
       </dl>
 

       <dl class="row">
        <dt class="col-sm-4 info-box-label">ชื่อ - นามสกุล (ไทย): <span class="field-required">*</span></dt>
        <dd class="col-sm-8 info-box-label">
        <input name="EmplTName" type="text" value="'.$rows["EmplTName"].'" data-placement="top" required  class="form-control" maxlength="50"/>
        </dd>
       </dl>


       <dl class="row">
        <dt class="col-sm-4 info-box-label">ชื่อ - นามสกลุ (English): : <span class="field-required">*</span></dt>
        <dd class="col-sm-8 info-box-label">
        <input name="EmplEName" type="text" value="'.$rows["EmplEName"].'" data-placement="top"  class="form-control"  maxlength="50"/>      
        </dd>
       </dl>


       <dl class="row">
        <dt class="col-sm-4 info-box-label">Employee Type : <span class="field-required">*</span></dt>
        <dd class="col-sm-4 info-box-label">
        <select class="form-control"  name="EmplType" required>
          <option value="D" '.$EmplDSe.'>Daily Employee</option>
          <option value="M" '.$EmplMSe.'>Monthly Employee</option>
        </select>      
        </dd>
       </dl>
       <dl class="row">
        <dt class="col-sm-4 info-box-label">Process Type : <span class="field-required">*</span></dt>
        <dd class="col-sm-4 info-box-label">
        <select class="form-control"  name="ProcCode" required>
          <option value="1" '.$ProcASe.'>Automatic</option>
          <option value="2" '.$ProcMSe.'>Manual</option>
        </select>     
        </dd>
       </dl>
      </div>
      <div class="col-md-2"></div>
      
      <div class="col-md-12">
      <br>
<!--Start-->
       <div class="add-pad">
        <div class="title-header-info-box add-pad">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active " data-toggle="tab" href="#tab1" id="tabspecification" role="tab">Employee Information</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab2" id="tabspecification" role="tab">Family</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab3" id="tabspecification" role="tab">Personal Info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab4" id="tabspecification" role="tab">Other Information</a>
            </li>
          </ul>
        </div>
        <div class="warpper-table">
          <div class="tab-content">
          <br/>
          <!-- ///////////////////////////////employee///////////////////////////////////////// -->
            <div class="tab-pane active" id="tab1">
              <div class="header-info-content-box content-box-padding">
                <div class="row">
                <div class="col-md-12">
                <dl class="row">
                  <dt class="col-sm-3 info-box-label">Dapartment : <span class="field-required">*</span></dt>
                  <dd class="col-sm-3 info-box-label">
                   <select class="form-control"  name="DeptCode" required>';
                    
                    $strSQL = "SELECT * FROM tm02_department";
                   $objQuery = mysqli_query($conn, $strSQL);
                    while($objResuut = mysqli_fetch_array($objQuery))
                    {
                    
                      if($objResuut["DeptCode"] == $deptcode)
                      {
                        $sel = "selected";
                      }
                      else
                      {
                        $sel = "";
                      }

                    $output.='<option value="'.$objResuut["DeptCode"].'" '.$sel.'>'.$objResuut["DeptCode"].' - '.$objResuut["DeptTDesc"].'</option>';
                    
                    }
                    
                  $output.='</select>      
                  </dd>
                  <dt class="col-sm-2 info-box-label">Bank : </dt>
                  <dd class="col-sm-3 info-box-label">
                  <select class="form-control"  name="BankCode" >
                  <option value="">Select</option>
                  ';                    
                  $strSQL_bank = "SELECT * FROM tm02_bank";
                   $objQuery_bank = mysqli_query($conn, $strSQL_bank);
                    while($objResuut = mysqli_fetch_array($objQuery_bank))
                    {
                      if($objResuut["bankcode"] == $bankcode)
                      {
                        $sel = "selected";
                      }
                      else
                      {
                        $sel = "";
                      }

                      $output.='<option value="'.$objResuut["bankcode"].'" '.$sel.'>'.$objResuut["bankcode"].' - '.$objResuut["BankTName"].'</option>';
                    } 
                    $output.='</select>      
                  </dd>
                  <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>
              <div class="col-md-12">
                <dl class="row">
                 <dt class="col-sm-3 info-box-label">Position : <span class="field-required">*</span></dt>
                 <dd class="col-sm-3 info-box-label">
                 <select class="form-control"  name="PosiCode" required>';
                    
                    $strSQL = "SELECT * FROM tm02_position";
                   $objQuery = mysqli_query($conn, $strSQL);
                    while($objResuut = mysqli_fetch_array($objQuery))
                    {
                    
                      if($objResuut["DeptCode"] == $posicode)
                      {
                        $sel = "selected";
                      }
                      else
                      {
                        $sel = "";
                      }
                      $output.='<option value="'.$objResuut["PosiCode"].'">'.$objResuut["PosiCode"].' - '.$objResuut["PosiTDesc"].'</option>';
                   
                    }
                    
                    $output.='</select>      
                 </dd>
                 <dt class="col-sm-2 info-box-label">เลขที่บัญชี : </dt>
                 <dd class="col-sm-3 info-box-label">
                   <input name="BankAccCode" type="text" data-placement="top"   class="form-control" maxlength="20" value="'.$rows["BankAccCode"].'" />      
                 </dd>
                 <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>
              <div class="col-md-12">
                <dl class="row">
                  <dt class="col-sm-3 info-box-label">สาขา : <span class="field-required">*</span></dt>
                  <dd class="col-sm-3 info-box-label">
                    <select class="form-control"  name="BranchCode" required>';
                    
                    $strSQL = "SELECT * FROM tm02_branch";
                   $objQuery = mysqli_query($conn, $strSQL);
                    while($objResuut = mysqli_fetch_array($objQuery))
                    {
                    
                      if($objResuut["DeptCode"] == $branchcode)
                      {
                        $sel = "selected";
                      }
                      else
                      {
                        $sel = "";
                      }
                      $output.='<option value="'.$objResuut["BranchCode"].'">'.$objResuut["BranchCode"].' - '.$objResuut["BranchTName"].'</option>';
                    
                    }
                    
                    $output.='</select>      
                  </dd>
                  <dt class="col-sm-2 info-box-label"></dt>
                  <dd class="col-sm-3 info-box-label">
                    
                  </dd>
                  <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">เงินเดือน : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Salary" type="number" value="'.$rows["Salary"].'" data-placement="top" required  class="form-control" min="0"/>      
                      </dd>
                      <dt class="col-sm-2 info-box-label"> </dt>
                      <dd class="col-sm-3 info-box-label">
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">วันที่เริ่มงาน : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="EnterDate" type="date" value="'.$rows["EnterDate"].'" data-placement="top" required  class="form-control"/>      
                      </dd>
                      <dt class="col-sm-3 info-box-label"> </dt>
                      <dd class="col-sm-3 info-box-label"></dd>
                      </dl>
                 </div>
                 ';
                 if ($rows["ProbFlag"] == 1){
                  $ProbFlag_ckk = "checked";
                  $disabled = "";
                }
                else{
                  $disabled = "disabled";
                }
                 $output .= '
                 <div class="col-md-12">
                      <dl class="row">
                      <dt class="col-sm-3 info-box-label">พ้นสถาพ :</dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="ProbFlag" id="ProbFlag" type="checkbox"  value="1" data-placement="top"   class="form-control" onclick="ProbFlag_Function()" '.$ProbFlag_ckk.' />     
                      </dd>
                      <dt class="col-sm-2 info-box-label">วันที่พ้นสถาพ :</dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="ProbDate" id="ProbDate" type="date" value="'.$rows["ProbDate"].'" data-placement="top"   class="form-control" '.$disabled .' />     
                      </dd>

                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">วันที่ลาออก :</dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="ResignDate" id="ResignDate" type="date" value="'.$rows["ResignDate"].'" data-placement="top"   class="form-control" '.$disabled .'/>      
                      </dd>
                      <dt class="col-sm-2 info-box-label"> </dt>
                      <dd class="col-sm-3 info-box-label">
                            
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
';
                      if ($rows["PF_Flag"] == 1){
                        $PF_Flag_ckk = "checked";
                        $disabled = "";
                      }
                      else{
                        $disabled = "disabled";
                      }
                    $output.= '
                 <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">กองทุนสำรองเลี้ยงชีพ : </dt>
                        <dd class="col-sm-3 info-box-label">
                        <input name="PF_Flag" type="checkbox" '.$PF_Flag_ckk.' data-placement="top"  class="form-control" id="PF_Flag" onclick="PF_Flag_edit_function()" value="1"/>       
                        </dd>
                        <dt class="col-sm-2 info-box-label">รหัสสมาชิกกองทุน : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="PF_MemNo" value="'.$rows["PF_MemNo"].'" type="text" data-placement="top"  class="form-control" id="PF_MemNo" '.$disabled .'/>      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>

                    <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">วันที่เป็นสมาชิกกองทุน : </dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="PF_EnterDate"  value="'.$rows["PF_EnterDate"].'"   type="date" data-placement="top"  class="form-control" id="PF_EnterDate" '.$disabled .' />       
                      </dd>
                      <dt class="col-sm-2 info-box-label">อัตราการหักเงินสำรองเลี้ยงชีพพนักงาน (%) : </dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="PF_E_Rate" value="'.$rows["PF_E_Rate"].'" type="number" data-placement="top"  class="form-control"   id="PF_E_Rate" '.$disabled .' min="0" max="100" />      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>

                    
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">เงื่อนไขภาษี : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3">
                        <input   type="radio" name="TaxCond" value="C" required '.$TaxCondCSe.'> Company 
                        <input type="radio" name="TaxCond" value="E" required '.$TaxCondESe.'> Employee
                      </dd>
                      <dt class="col-sm-2 info-box-label"></dt>
                      <dd class="col-sm-3 info-box-label"></dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                      <dl class="row">
                      <div class="col-sm-3"></div>
                      <div class="col-sm-9">
                      <table width="80%">
                          <tbody>
                            <tr>';

                            if($rows["UM_Flag"] == '1'){
                              $umcheck = "checked";
                            }else{
                              $umcheck = "";
                            }
                            if($rows["Cooperative_F"] == '1'){
                              $coopcheck = "checked";
                            }else{
                              $coopcheck = "";
                            }
                            if($rows["GHB_F"] == '1'){
                              $gbhcheck = "checked";
                            }else{
                              $gbhcheck = "";
                            }
                            if($rows["Feneral_F"] == '1'){
                              $fencheck = "checked";
                            }else{
                              $fencheck = "";
                            }
                            if($rows["MoneyLoan_F"] == '1'){
                              $mlcheck = "checked";
                            }else{
                              $mlcheck = "";
                            }

                            $output.='<td><label class="checkbox-inline"><input type="checkbox" name="UM_Flag" value="1" '.$umcheck.'>  สมาชิกสหภาพฯ</label></td>
                              <td><label class="checkbox-inline"><input type="checkbox" name="Cooperative_F" value="1" '.$coopcheck.'>  สมาชิกสหกรณ์ออมทรัพย์</label></td>
                              <td><label class="checkbox-inline"><input type="checkbox" name="GHB_F" value="1" '.$gbhcheck.'>  สมาชิก ธอส.</label></td>

                            </tr>
                            <tr>

                              <td><label class="checkbox-inline"><input type="checkbox" name="Feneral_F" value="1" '.$fencheck.'>  สมาชิกฌาปนกิจสงเคราะห์</label></td>
                              <td><label class="checkbox-inline"><input type="checkbox" name="MoneyLoan_F" value="1" '.$mlcheck.'>  สมาชิก สินเชื่อเงินกู้</label></td>

                              <td></td>
                            </tr>
                          </tbody>
                        </table>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          <!-- ///////////////////////////////employee///////////////////////////////////////// --> 
          
          <!-- ///////////////////////////////family///////////////////////////////////////// -->
          <div class="tab-pane" id="tab2">
              <div class="header-info-content-box content-box-padding">
                <div class="row">
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">สถานะ : </dt>
                      <dd class="col-sm-3 info-box-label">';
                      $Marital_1 = $Marital == "โสด" ? "selected" :  "" ;
                      $Marital_2 = $Marital == "แต่งงานแล้ว" ? "selected" :  "" ;
                      $Marital_3 = $Marital == "หม้าย" ? "selected" :  "" ;
                      $Marital_4 = $Marital == "หย่า" ? "selected" :  "" ;
                      $Marital_5 = $Marital == "แยกกันอยู่" ? "selected" :  "" ;
                      $output .='
                       <select class="form-control"  name="Marital">
                                  <option value="">Select</option>   
                                  <option value="โสด" '.$Marital_1 .'>โสด</option>
                                  <option value="แต่งงานแล้ว" '.$Marital_2.'>แต่งงานแล้ว</option>
                                  <option value="หม้าย" '.$Marital_3.'>หม้าย</option>
                                  <option value="หย่า" '.$Marital_4.'>หย่า</option>
                                  <option value="แยกกันอยู่" '.$Marital_5.'>แยกกันอยู่</option>
                        </select> 
                      </dd>
                      <dt class="col-sm-2 info-box-label">หมายเลขสมรถ :</dt>
                      <dd class="col-sm-3 info-box-label">
                       <input name="MarriageNo" type="text" value="'.$rows["MarriageNo"].'" data-placement="top"   class="form-control"/ >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                     <dt class="col-sm-3 info-box-label">วันที่สมรถ : </dt>
                     <dd class="col-sm-3 info-box-label">
                       <input name="MarriagedDate" type="date" value="'.$rows["MarriagedDate"].'" data-placement="top"   class="form-control"/ >      
                     </dd>
                     <dt class="col-sm-2 info-box-label">ชื่อ-สกุลคู่สมรถ : </dt>
                     <dd class="col-sm-3 info-box-label">
                       <input name="SpouseName" type="text" value="'.$rows["SpouseName"].'" data-placement="top"   class="form-control" / >      
                     </dd>
                     <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-1 info-box-label"></dt>
                        <dd class="col-sm-3">
                          <h3>ข้อมูลบุตร</h3>      
                          <hr>
                        </dd>
                        
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">จำนวนบุตรที่กำลังเรียน : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="ChildInEduc" type="number" value="'.$rows["ChildInEduc"].'" data-placement="top"   class="form-control" min="0"/ >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">จำนวนบุตรที่ไม่ได้เรียนแล้ว : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="ChildNotEduc" type="number" value="'.$rows["ChildNotEduc"].'" data-placement="top"   class="form-control" / >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-1 info-box-label"></dt>
                        <dd class="col-sm-4">
                          <h3>ข้อมูลผู้ปกครอง</h3>      
                          <hr>
                        </dd>
                        
                        
                      </dl>
                    </div>
                  ';
                  $checked = ($rows['Own_Fath_Red_F'] == '1') ? "checked" : "";
                  $output .='
                    <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">สิทธิลดหย่อนบิดา :</dt>
                      <dd class="col-sm-3">  
                        <input id="Own_Fath_Red_F" name="Own_Fath_Red_F" type="checkbox" value="1" '.$checked .'/>
                      </dd>
                      <dt class="col-sm-2 info-box-label">เลขประจำตัวประชาชนบิดา : </dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Own_Fath_ID" type="text" data-placement="top"   class="form-control" maxlength="13" value="'.$rows["Own_Fath_ID"].'"/ >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                      ';
                      $checked = ($rows['SP_Fath_Red_F'] == '1') ? "checked" : "";
                      $disabled = ($rows['SP_Fath_Red_F'] == '1') ? "" : "disabled";
                    $output .= '
                      <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">สิทธิลดหย่อนบิดาคู่สมรส :</dt>
                      <dd class="col-sm-3">  
                        <input id="SP_Fath_Red_F" name="SP_Fath_Red_F" type="checkbox" value="1" '.$checked.' onclick="SP_Fath_Red_F_function()"/>
                      </dd>
                      <dt class="col-sm-2 info-box-label">เลขประจำตัวประชาชนบิดาของคู่สมรส : </dt>
                      <dd class="col-sm-3 info-box-label">
                        <input  id="SP_Fath_ID" name="SP_Fath_ID" type="text" data-placement="top"   class="form-control" maxlength="13" '.$disabled.' value="'.$rows["SP_Fath_ID"].'"/ >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                    ';

                    $checked = ($rows['Own_Moth_Red_F'] == '1') ? "checked" : "";
                    $output.='
      <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">สิทธิลดหย่อนมารดา :</dt>
                      <dd class="col-sm-3">  
                        <input id="Own_Moth_Red_F" name="Own_Moth_Red_F" type="checkbox" value="1" '.$checked .'/>
                      </dd>
                      <dt class="col-sm-2 info-box-label">เลขประจำตัวประชาชนมารดา : </dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Own_Moth_ID" type="text" data-placement="top" value="'.$rows["Own_Moth_ID"].'"  class="form-control" maxlength="13"/ >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                      ';
                      $checked = ($rows['SP_Fath_Red_F'] == '1') ? "checked" : "";
                      $disabled = ($rows['SP_Fath_Red_F'] == '1') ? "" : "disabled";
                      $output.='
                   <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">สิทธิลดหย่อนมารดาคู่สมรส :</dt>
                      <dd class="col-sm-3">  
                        <input id="SP_Moth_Red_F" name="SP_Moth_Red_F" type="checkbox" '.$checked .' value="1" onclick="SP_Moth_Red_F_function()"/>
                      </dd>
                      <dt class="col-sm-2 info-box-label">เลขประจำตัวประชาชนมารดาของคู่สมรส : </dt>
                      <dd class="col-sm-3 info-box-label">
                        <input id="SP_Moth_ID" name="SP_Moth_ID" type="text" data-placement="top" value="'.$rows["SP_Moth_ID"].'"  class="form-control" maxlength="13" '.$disabled.'/>      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>


                </div>
              </div>
            </div>
          <!-- ///////////////////////////////family///////////////////////////////////////// -->
          
          <!-- ///////////////////////////////personal///////////////////////////////////////// -->
          <div class="tab-pane" id="tab3">
              <div class="header-info-content-box content-box-padding">
                <div class="row">
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">วันเกิด : </dt>
                      <dd class="col-sm-3 info-box-label">
                       <input name="BirthDate" type="date" value="'.$rows["BirthDate"].'" data-placement="top"   class="form-control"/ >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">เลขประจำตัวประชาชน : </dt>
                      <dd class="col-sm-3 info-box-label">
                       <input name="IDno" type="text" value="'.$rows["IDno"].'" data-placement="top"   class="form-control"/ >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                     <dt class="col-sm-3 info-box-label">สัญชาติ : </dt>
                     <dd class="col-sm-3 info-box-label">
                       <input name="Nationality" type="text" value="'.$rows["Nationality"].'" data-placement="top"   class="form-control"/ >      
                     </dd>
                     <dt class="col-sm-2 info-box-label">ศาสนา : </dt>
                     <dd class="col-sm-3 info-box-label">
                       <input name="Religion" type="text" value="'.$rows["Religion"].'" data-placement="top"   class="form-control" / >      
                     </dd>
                     <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">น้ำหนัก : </dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Weight" type="text" value="'.$rows["Weight"].'" data-placement="top"   class="form-control"/ >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">ส่วนสูง : </dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Height" type="text" value="'.$rows["Height"].'" data-placement="top"   class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">เพศ : </dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Sex" type="text" value="'.$rows["Sex"].'" data-placement="top"   class="form-control"/ >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">เบอร์โทรศัพท์ :</dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="HomePhone" type="text" value="'.$rows["HomePhone"].'" data-placement="top"   class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">ที่อยู่ : </dt>
                      <dd class="col-sm-3 info-box-label">
                      <textarea class="form-control" rows="5" value="'.$rows["Address"].'" name="Address" id="comment"></textarea>      
                      </dd>
                      <dt class="col-sm-2 info-box-label">รหัสไปรษณีย์ : </dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="PostalCode" type="text" value="'.$rows["PostalCode"].'" data-placement="top"   class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">เลขประจำตัวผู้เสียภาษี : </dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="TaxID" type="text" value="'.$rows["TaxID"].'" data-placement="top"   class="form-control"/ >      
                      </dd>
                      <dt class="col-sm-2 info-box-label"></dt>
                      <dd class="col-sm-3 info-box-label">
        
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                </div>
              </div>
            </div>
          <!-- ///////////////////////////////personal///////////////////////////////////////// -->
          
          <!-- ///////////////////////////////other///////////////////////////////////////// -->
          <div class="tab-pane" id="tab4">
              <div class="header-info-content-box content-box-padding">
                <div class="row">
                <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">Last Company Gross :</dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="L_C_Gross" type="text" value="'.$rows["L_C_Gross"].'" data-placement="top"   class="form-control" / >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">Last Company Tax : </dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="L_C_Tax" type="text" value="'.$rows["L_C_Tax"].'" data-placement="top"   class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">Last Company Social : </dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="L_C_SOC" type="text" value="'.$rows["L_C_SOC"].'" data-placement="top"   class="form-control" / >     
                      </dd>
                      <dt class="col-sm-2 info-box-label">Company Loan/Month : </dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="CompLoan" type="text" value="'.$rows["CompLoan"].'" data-placement="top"   class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">Overtime Flag : </dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="OT_Cal_F" type="text" value="'.$rows["OT_Cal_F"].'" data-placement="top"   class="form-control" / >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">Attendance Flag : </dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Attn_Cal_F" type="text" value="'.$rows["Attn_Cal_F"].'" data-placement="top"   class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">Office Shift : </dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="O_Shft_D_PM" type="text" value="'.$rows["O_Shft_D_PM"].'" data-placement="top"   class="form-control" / >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">Morning Shift : </dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="M_Shft_D_PM" type="text" value="'.$rows["M_Shft_D_PM"].'" data-placement="top"   class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">Evening Shift : </dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="E_Shft_D_PM" type="text" value="'.$rows["E_Shft_D_PM"].'" data-placement="top"   class="form-control" / >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">Night Shift : </dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="N_Shft_D_PM" type="text" value="'.$rows["N_Shft_D_PM"].'" data-placement="top"   class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">Sick Leave : </dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="SL_Day" type="text" value="'.$rows["SL_Day"].'" data-placement="top"   class="form-control" / >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">A/L Remaining : </dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="AL_Rem_Hrs" type="text" value="'.$rows["AL_Rem_Hrs"].'" data-placement="top"   class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                </div>
              </div>
            </div>
          <!-- ///////////////////////////////other///////////////////////////////////////// -->
          
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
  $strSQL = "UPDATE tm03_employee SET ";
  $strSQL .= "EmplType='".$_POST["EmplType"]."',
              ProcCode='".$_POST["ProcCode"]."',
              OT_Cal_F='".$_POST["OT_Cal_F"]."',
              Attn_Cal_F='".$_POST["Attn_Cal_F"]."',
              EmplTName='".$_POST["EmplTName"]."',
              EmplEName='".$_POST["EmplEName"]."',
              DeptCode='".$_POST["DeptCode"]."',
              PosiCode='".$_POST["PosiCode"]."',
              EnterDate='".$_POST["EnterDate"]."',
              ProbFlag='".$_POST["ProbFlag"]."',
              ProbDate='".$_POST["ProbDate"]."',
              ResignDate='".$_POST["ResignDate"]."',
              BankCode='".$_POST["BankCode"]."',
              BankAccCode='".$_POST["BankAccCode"]."',
              Sex='".$_POST["Sex"]."',
              Salary='".$_POST["Salary"]."',
              L_C_Gross='".$_POST["L_C_Gross"]."',
              L_C_Tax='".$_POST["L_C_Tax"]."',
              L_C_SOC='".$_POST["L_C_SOC"]."',
              BranchCode='".$_POST["BranchCode"]."',
              CompLoan='".$_POST["CompLoan"]."',
              Marital='".$_POST["Marital"]."',
              MarriageNo='".$_POST["MarriageNo"]."',
              MarriagedDate='".$_POST["MarriagedDate"]."',
              TaxID='".$_POST["TaxID"]."',
              TaxCond='".$_POST["TaxCond"]."',
              SpouseName='".$_POST["SpouseName"]."',
              ChildInEduc='".$_POST["ChildInEduc"]."',
              ChildNotEduc='".$_POST["ChildNotEduc"]."',
              Own_Fath_Red_F='".$_POST["Own_Fath_Red_F"]."',
              Own_Fath_ID='".$_POST["Own_Fath_ID"]."',
              Own_Moth_Red_F='".$_POST["Own_Moth_Red_F"]."',
              Own_Moth_ID='".$_POST["Own_Moth_ID"]."',
              SP_Fath_Red_F='".$_POST["SP_Fath_Red_F"]."',
              SP_Fath_ID='".$_POST["SP_Fath_ID"]."',
              SP_Moth_Red_F='".$_POST["SP_Moth_Red_F"]."',
              SP_Moth_ID='".$_POST["SP_Moth_ID"]."',
              Address='".$_POST["Address"]."',
              PostalCode='".$_POST["PostalCode"]."',
              HomePhone='".$_POST["HomePhone"]."',
              Nationality='".$_POST["Nationality"]."',
              Ethnic='".$_POST["Ethnic"]."',
              Religion='".$_POST["Religion"]."',
              BirthDate='".$_POST["BirthDate"]."',
              IDno='".$_POST["IDno"]."',
              Height='".$_POST["Height"]."',
              Weight='".$_POST["Weight"]."',
              UM_Flag='".$_POST["UM_Flag"]."',
              PF_Flag='".$_POST["PF_Flag"]."',
              PF_MemNo='".$_POST["PF_MemNo"]."',
              PF_EnterDate='".$_POST["PF_EnterDate"]."',
              PF_E_Rate='".$_POST["PF_E_Rate"]."',
              AL_Rem_Hrs='".$_POST["AL_Rem_Hrs"]."',
              O_Shft_D_PM='".$_POST["O_Shft_D_PM"]."',
              M_Shft_D_PM='".$_POST["M_Shft_D_PM"]."',
              E_Shft_D_PM='".$_POST["E_Shft_D_PM"]."',
              N_Shft_D_PM='".$_POST["N_Shft_D_PM"]."',
              Attn_ALW_F='".$_POST["Attn_ALW_F"]."',
              Attn_ALW_Accum='".$_POST["Attn_ALW_Accum"]."',
              Attn_ALW_AccumNext='".$_POST["Attn_ALW_AccumNext"]."',
              SL_Day='".$_POST["SL_Day"]."',
              SysUpdDate='".$_POST["SysUpdDate"]."',
              SysUserID='".$_POST["SysUserID"]."',
              SysPgmID='".$_POST["SysPgmID"]."',
              Feneral_F='".$_POST["Feneral_F"]."',
              Cooperative_F='".$_POST["Cooperative_F"]."',
              MoneyLoan_F='".$_POST["MoneyLoan_F"]."',
              GHB_F='".$_POST["GHB_F"]."',
              AccMoneyLoan='".$_POST["AccMoneyLoan"]."',
              LoanType='".$_POST["LoanType"]."',
              LoanAmt='".$_POST["LoanAmt"]."',
              AccGHB='".$_POST["AccGHB"]."',
              GHBType='".$_POST["GHBType"]."',
              GHBAmt='".$_POST["GHBAmt"]."',
              UnionMemberAmt='".$_POST["UnionMemberAmt"]."',
              AwardAmt='".$_POST["AwardAmt"]."',
              CooperativeAmt01='".$_POST["CooperativeAmt01"]."',
              CooperativeMemId01='".$_POST["CooperativeMemId01"]."',
              CooperativeUnit01='".$_POST["CooperativeUnit01"]."',
              CooperativeAmt02='".$_POST["CooperativeAmt02"]."',
              CooperativeMemId02='".$_POST["CooperativeMemId02"]."',
              CooperativeUnit02='".$_POST["CooperativeUnit02"]."' ";
  $strSQL .= " WHERE EmplCode = '".$_POST["id"]."'";
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
    $strSQL = "DELETE FROM tm03_employee ";
    $strSQL .="WHERE EmplCode = '".$_POST["delete"]."'";

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