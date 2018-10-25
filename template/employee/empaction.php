<?php 

if(isset($_POST["create"])) {
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
                `CooperativeUnit02`) ";
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
    '".$_POST["CooperativeUnit02"]."')";

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
    $strSQL = "SELECT * FROM tm03_employee WHERE EmplCode = '".$_POST["edit_id"]."'";   
    $objQuery = mysql_query($strSQL); 
    while ($rows = mysql_fetch_array($objQuery)) {    
    $output .= '<input type="hidden" name="id" value="'.$_POST["edit_id"].'">
    <div class="modal-body" >
    <br/>
    <div class="row">
      <div class="col-md-8">
       <dl class="row">
         <dt class="col-sm-4 info-box-label">รหัสพนักงาน : <span class="field-required">*</span></dt>
         <dd class="col-sm-8 info-box-label">
         <input name="EmplCode" type="text" value="'.$rows["EmplCode"].'" data-placement="top" required  class="form-control"  maxlength="20"/>      
         </dd>
       </dl>
      </div>
      <div class="col-md-8">
       <dl class="row">
        <dt class="col-sm-4 info-box-label">ชื่อพนักงาน(ไทย) : <span class="field-required">*</span></dt>
        <dd class="col-sm-8 info-box-label">
        <input name="EmplTName" type="text" value="'.$rows["EmplTName"].'" data-placement="top" required  class="form-control" maxlength="20"/>
        </dd>
       </dl>
      </div>
      <div class="col-md-8">
       <dl class="row">
        <dt class="col-sm-4 info-box-label">ชื่อพนักงาน(ENG) : <span class="field-required">*</span></dt>
        <dd class="col-sm-8 info-box-label">
        <input name="EmplEName" type="text" value="'.$rows["EmplEName"].'" data-placement="top"  class="form-control"  maxlength="20"/>      
        </dd>
       </dl>
      </div>
      <div class="col-md-8">
       <dl class="row">
        <dt class="col-sm-4 info-box-label">ประเภทพนักงาน : <span class="field-required">*</span></dt>
        <dd class="col-sm-8 info-box-label">
        <select class="form-control"  name="EmplType" required>
          <option value="">Select</option>   
          <option value="D">Daily Employee</option>
          <option value="M">Monthly Employee</option>
        </select>      
        </dd>
       </dl>
      </div>
      <div class="col-md-8">
       <dl class="row">
        <dt class="col-sm-4 info-box-label">ประเภทกะบวนการ : <span class="field-required">*</span></dt>
        <dd class="col-sm-4 info-box-label">
        <select class="form-control"  name="ProcCode" required>
          <option value="">Select</option>   
          <option value="1">Automatic</option>
          <option value="2">Manual</option>
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
              <a class="nav-link active " data-toggle="tab" href="#tab1" id="tabspecification" role="tab">employee</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab2" id="tabspecification" role="tab">family</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab3" id="tabspecification" role="tab">personal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tab4" id="tabspecification" role="tab">other</a>
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
                  <dt class="col-sm-3 info-box-label">แผนก : <span class="field-required">*</span></dt>
                  <dd class="col-sm-3 info-box-label">
                   <select class="form-control"  name="DeptCode" required>
                    <?php
                    $strSQL = "SELECT * FROM tm02_department";
                   $objQuery = mysql_query($strSQL);
                    while($objResuut = mysql_fetch_array($objQuery))
                    {
                    ?>
                      <option value="'.$objResuut["DeptCode"].'">'.$objResuut["DeptCode"].' - '.$objResuut["DeptTDesc"].'></option>
                    <?php
                    }
                    ?>
                  </select>      
                  </dd>
                  <dt class="col-sm-2 info-box-label">ธนาคาร : <span class="field-required">*</span></dt>
                  <dd class="col-sm-3 info-box-label">
                  <select class="form-control"  name="BankCode" required>
                    <?php
                    $strSQL = "SELECT * FROM tm02_bank";
                   $objQuery = mysql_query($strSQL);
                    while($objResuut = mysql_fetch_array($objQuery))
                    {
                    ?>
                      <option value="<?=$objResuut["bankcode"];?>"><?=$objResuut["bankcode"]." - ".$objResuut["BankTName"];?></option>
                    <?php
                    }
                    ?>
                  </select>      
                  </dd>
                  <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>
              <div class="col-md-12">
                <dl class="row">
                 <dt class="col-sm-3 info-box-label">ตำแหน่ง : <span class="field-required">*</span></dt>
                 <dd class="col-sm-3 info-box-label">
                 <select class="form-control"  name="PosiCode" required>
                    <?php
                    $strSQL = "SELECT * FROM tm02_position";
                   $objQuery = mysql_query($strSQL);
                    while($objResuut = mysql_fetch_array($objQuery))
                    {
                    ?>
                      <option value="<?=$objResuut["PosiCode"];?>"><?=$objResuut["PosiCode"]." - ".$objResuut["PosiTDesc"];?></option>
                    <?php
                    }
                    ?>
                  </select>      
                 </dd>
                 <dt class="col-sm-2 info-box-label">เลที่บัญชี : <span class="field-required">*</span></dt>
                 <dd class="col-sm-3 info-box-label">
                   <input name="BankAccCode" type="text" data-placement="top" required  class="form-control" />      
                 </dd>
                 <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>
              <div class="col-md-12">
                <dl class="row">
                  <dt class="col-sm-3 info-box-label">สาขา : <span class="field-required">*</span></dt>
                  <dd class="col-sm-3 info-box-label">
                    <select class="form-control"  name="BranchCode" required>
                    <?php
                    $strSQL = "SELECT * FROM tm02_branch";
                   $objQuery = mysql_query($strSQL);
                    while($objResuut = mysql_fetch_array($objQuery))
                    {
                    ?>
                      <option value="<?=$objResuut["BranchCode"];?>"><?=$objResuut["BranchCode"]." - ".$objResuut["BranchTName"];?></option>
                    <?php
                    }
                    ?>
                  </select>      
                  </dd>
                  <dt class="col-sm-2 info-box-label">กองทุนสำรองเลี้ยงชีพ : <span class="field-required">*</span></dt>
                  <dd class="col-sm-3 info-box-label">
                    <input name="PF_Flag" type="text" data-placement="top" required  class="form-control" />      
                  </dd>
                  <dd class="col-sm-1 info-box-label"></dd>
                </dl>
              </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">เงินเดือน : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Salary" type="text" value="'.$rows["Salary"].'" data-placement="top" required  class="form-control"/>      
                      </dd>
                      <dt class="col-sm-2 info-box-label">รหัสสมาชิก : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="PF_MemNo" type="text" value="'.$rows["PF_MemNo"].'" data-placement="top" required  class="form-control" />      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">วันที่เข้างาน : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="EnterDate" type="date" value="'.$rows["EnterDate"].'" data-placement="top" required  class="form-control"/>      
                      </dd>
                      <dt class="col-sm-2 info-box-label">วันที่พ้นสถาพ : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="ProbDate" type="date" value="'.$rows["ProbDate"].'" data-placement="top" required  class="form-control" />      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">วันที่ลาออก : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="ResignDate" type="date" value="'.$rows["ResignDate"].'" data-placement="top" required  class="form-control"/>      
                      </dd>
                      <dt class="col-sm-2 info-box-label">พ้นสถาพ : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="ProbFlag" type="text" value="'.$rows["ProbFlag"].'" data-placement="top" required  class="form-control" />      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">เงื่อนไขภาษี : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="TaxCond" type="text" value="'.$rows["TaxCond"].'" data-placement="top" required  class="form-control"/>      
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
                            <tr>
                              <td><label class="checkbox-inline"><input type="checkbox" name="UM_Flag" value="1">สมาชิกสหภาพฯ</label></td>
                              <td><label class="checkbox-inline"><input type="checkbox" name="Cooperative_F" value="1">สมาชิกสหกรณ์ออมทรัพย์</label></td>
                              <td><label class="checkbox-inline"><input type="checkbox" name="GHB_F" value="1">สมาชิก ธอส.</label></td>
                            </tr>
                            <tr>
                              <td><label class="checkbox-inline"><input type="checkbox" name="Feneral_F" value="1">สมาชิกฌาปนกิจสงเคราะห์</label></td>
                              <td><label class="checkbox-inline"><input type="checkbox" name="MoneyLoan_F" value="1">สมาชิก สินเชื่อเงินกู้</label></td>
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
                      <dt class="col-sm-3 info-box-label">สถานะ : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                       <input name="Marital" type="text" value="'.$rows["Marital"].'" data-placement="top" required  class="form-control"/ >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">หมายเลขสมรถ : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                       <input name="MarriageNo" type="text" value="'.$rows["MarriageNo"].'" data-placement="top" required  class="form-control"/ >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                     <dt class="col-sm-3 info-box-label">วันที่สมรถ : <span class="field-required">*</span></dt>
                     <dd class="col-sm-3 info-box-label">
                       <input name="MarriagedDate" type="date" value="'.$rows["MarriagedDate"].'" data-placement="top" required  class="form-control"/ >      
                     </dd>
                     <dt class="col-sm-2 info-box-label">ชื่อ-สกุลคู่สมรถ : <span class="field-required">*</span></dt>
                     <dd class="col-sm-3 info-box-label">
                       <input name="SpouseName" type="text" value="'.$rows["SpouseName"].'" data-placement="top" required  class="form-control" / >      
                     </dd>
                     <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-1 info-box-label"></dt>
                        <dd class="col-sm-3">
                          <h3>ข้อมูลบุตร</h3>      
                        </dd>
                        
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">กำลังศึกษา : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="ChildInEduc" type="text" value="'.$rows["SpouseName"].'" data-placement="top" required  class="form-control"/ >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">ไม่ได้ศึกษา : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="ChildNotEduc" type="text" value="'.$rows["SpouseName"].'" data-placement="top" required  class="form-control" / >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-1 info-box-label"></dt>
                        <dd class="col-sm-4">
                          <h3>ข้อมูลผู้ปกครอง(เลขประจำตัวประชาชน)</h3>      
                        </dd>
                        
                        
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">บิดา : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="Own_Fath_ID" type="text" value="'.$rows["Own_Fath_ID"].'" data-placement="top" required  class="form-control"/ >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">มารดา : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="Own_Moth_ID" type="text" value="'.$rows["Own_Moth_ID"].'" data-placement="top" required  class="form-control" / >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">บิดาคู่สมรถ : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="SP_Fath_ID" type="text" value="'.$rows["SP_Fath_ID"].'" data-placement="top" required  class="form-control"/ >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">มารดาคู่สมรถ : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="SP_Moth_ID" type="text" value="'.$rows["SP_Moth_ID"].'" data-placement="top" required  class="form-control" / >      
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
                      <dt class="col-sm-3 info-box-label">วันเกิด : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                       <input name="BirthDate" type="date" value="'.$rows["BirthDate"].'" data-placement="top" required  class="form-control"/ >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">เลขประจำตัวประชาชน : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                       <input name="IDno" type="text" value="'.$rows["IDno"].'" data-placement="top" required  class="form-control"/ >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                     <dt class="col-sm-3 info-box-label">สัญชาติ : <span class="field-required">*</span></dt>
                     <dd class="col-sm-3 info-box-label">
                       <input name="Nationality" type="text" value="'.$rows["Nationality"].'" data-placement="top" required  class="form-control"/ >      
                     </dd>
                     <dt class="col-sm-2 info-box-label">ศาสนา : <span class="field-required">*</span></dt>
                     <dd class="col-sm-3 info-box-label">
                       <input name="Religion" type="text" value="'.$rows["Religion"].'" data-placement="top" required  class="form-control" / >      
                     </dd>
                     <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">น้ำหนัก : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Weight" type="text" value="'.$rows["Weight"].'" data-placement="top" required  class="form-control"/ >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">ส่วนสูง : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Height" type="text" value="'.$rows["Height"].'" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">เพศ : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Sex" type="text" value="'.$rows["Sex"].'" data-placement="top" required  class="form-control"/ >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">เบอร์โทรศัพท์ : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="HomePhone" type="text" value="'.$rows["HomePhone"].'" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">ที่อยู่ : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                      <textarea class="form-control" rows="5" value="'.$rows["Address"].'" name="Address" id="comment"></textarea>      
                      </dd>
                      <dt class="col-sm-2 info-box-label">รหัสไปรษณีย์ : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="PostalCode" type="text" value="'.$rows["PostalCode"].'" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">เลขประจำตัวผู้เสียภาษี : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="TaxID" type="text" value="'.$rows["TaxID"].'" data-placement="top" required  class="form-control"/ >      
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
                      <dt class="col-sm-3 info-box-label">Last Company Gross : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="L_C_Gross" type="text" value="'.$rows["L_C_Gross"].'" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">Last Company Tax : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="L_C_Tax" type="text" value="'.$rows["L_C_Tax"].'" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">Last Company Social : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="L_C_SOC" type="text" value="'.$rows["L_C_SOC"].'" data-placement="top" required  class="form-control" / >     
                      </dd>
                      <dt class="col-sm-2 info-box-label">Company Loan/Month : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="CompLoan" type="text" value="'.$rows["CompLoan"].'" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">Overtime Flag : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="OT_Cal_F" type="text" value="'.$rows["OT_Cal_F"].'" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">Attendance Flag : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Attn_Cal_F" type="text" value="'.$rows["Attn_Cal_F"].'" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">Office Shift : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="O_Shft_D_PM" type="text" value="'.$rows["O_Shft_D_PM"].'" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">Morning Shift : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="M_Shft_D_PM" type="text" value="'.$rows["M_Shft_D_PM"].'" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">Evening Shift : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="E_Shft_D_PM" type="text" value="'.$rows["E_Shft_D_PM"].'" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">Night Shift : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="N_Shft_D_PM" type="text" value="'.$rows["N_Shft_D_PM"].'" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">Sick Leave : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="SL_Day" type="text" value="'.$rows["SL_Day"].'" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">A/L Remaining : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="AL_Rem_Hrs" type="text" value="'.$rows["AL_Rem_Hrs"].'" data-placement="top" required  class="form-control" / >      
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
        $strSQL = "UPDATE tm03_employee ";
        $strSQL .= "`EmplType`='".$_POST["EmplType"]."',
                    `ProcCode`='".$_POST["ProcCode"]."',
                    `OT_Cal_F`='".$_POST["OT_Cal_F"]."',
                    `Attn_Cal_F`='".$_POST["Attn_Cal_F"]."',
                    `EmplTName`='".$_POST["EmplTName"]."',
                    `EmplEName`='".$_POST["EmplEName"]."',
                    `DeptCode`='".$_POST["DeptCode"]."',
                    `PosiCode`='".$_POST["PosiCode"]."',
                    `EnterDate`='".$_POST["EnterDate"]."',
                    `ProbFlag`='".$_POST["ProbFlag"]."',
                    `ProbDate`='".$_POST["ProbDate"]."',
                    `ResignDate`='".$_POST["ResignDate"]."',
                    `BankCode`='".$_POST["BankCode"]."',
                    `BankAccCode`='".$_POST["BankAccCode"]."',
                    `Sex`='".$_POST["Sex"]."',
                    `Salary`='".$_POST["Salary"]."',
                    `L_C_Gross`='".$_POST["L_C_Gross"]."',
                    `L_C_Tax`='".$_POST["L_C_Tax"]."',
                    `L_C_SOC`='".$_POST["L_C_SOC"]."',
                    `BranchCode`='".$_POST["BranchCode"]."',
                    `CompLoan`='".$_POST["CompLoan"]."',
                    `Marital`='".$_POST["Marital"]."',
                    `MarriageNo`='".$_POST["MarriageNo"]."',
                    `MarriagedDate`='".$_POST["MarriagedDate"]."',
                    `TaxID`='".$_POST["TaxID"]."',
                    `TaxCond`='".$_POST["TaxCond"]."',
                    `SpouseName`='".$_POST["SpouseName"]."',
                    `ChildInEduc`='".$_POST["ChildInEduc"]."',
                    `ChildNotEduc`='".$_POST["ChildNotEduc"]."',
                    `Own_Fath_Red_F`='".$_POST["Own_Fath_Red_F"]."',
                    `Own_Fath_ID`='".$_POST["Own_Fath_ID"]."',
                    `Own_Moth_Red_F`='".$_POST["Own_Moth_Red_F"]."',
                    `Own_Moth_ID`='".$_POST["Own_Moth_ID"]."',
                    `SP_Fath_Red_F`='".$_POST["SP_Fath_Red_F"]."',
                    `SP_Fath_ID`='".$_POST["SP_Fath_ID"]."',
                    `SP_Moth_Red_F`='".$_POST["SP_Moth_Red_F"]."',
                    `SP_Moth_ID`='".$_POST["SP_Moth_ID"]."',
                    `Address`='".$_POST["Address"]."',
                    `PostalCode`='".$_POST["PostalCode"]."',
                    `HomePhone`='".$_POST["HomePhone"]."',
                    `Nationality`='".$_POST["Nationality"]."',
                    `Ethnic`='".$_POST["Ethnic"]."',
                    `Religion`='".$_POST["Religion"]."',
                    `BirthDate`='".$_POST["BirthDate"]."',
                    `IDno`='".$_POST["IDno"]."',
                    `Height`='".$_POST["Height"]."',
                    `Weight`='".$_POST["Weight"]."',
                    `UM_Flag`='".$_POST["UM_Flag"]."',
                    `PF_Flag`='".$_POST["PF_Flag"]."',
                    `PF_MemNo`='".$_POST["PF_MemNo"]."',
                    `PF_EnterDate`='".$_POST["PF_EnterDate"]."',
                    `PF_E_Rate`='".$_POST["PF_E_Rate"]."',
                    `AL_Rem_Hrs`='".$_POST["AL_Rem_Hrs"]."',
                    `O_Shft_D_PM`='".$_POST["O_Shft_D_PM"]."',
                    `M_Shft_D_PM`='".$_POST["M_Shft_D_PM"]."',
                    `E_Shft_D_PM`='".$_POST["E_Shft_D_PM"]."',
                    `N_Shft_D_PM`='".$_POST["N_Shft_D_PM"]."',
                    `Attn_ALW_F`='".$_POST["Attn_ALW_F"]."',
                    `Attn_ALW_Accum`='".$_POST["Attn_ALW_Accum"]."',
                    `Attn_ALW_AccumNext`='".$_POST["Attn_ALW_AccumNext"]."',
                    `SL_Day`='".$_POST["SL_Day"]."',
                    `SysUpdDate`='".$_POST["SysUpdDate"]."',
                    `SysUserID`='".$_POST["SysUserID"]."',
                    `SysPgmID`='".$_POST["SysPgmID"]."',
                    `Feneral_F`='".$_POST["Feneral_F"]."',
                    `Cooperative_F`='".$_POST["Cooperative_F"]."',
                    `MoneyLoan_F`='".$_POST["MoneyLoan_F"]."',
                    `GHB_F`='".$_POST["GHB_F"]."',
                    `AccMoneyLoan`='".$_POST["AccMoneyLoan"]."',
                    `LoanType`='".$_POST["LoanType"]."',
                    `LoanAmt`='".$_POST["LoanAmt"]."',
                    `AccGHB`='".$_POST["AccGHB"]."',
                    `GHBType`='".$_POST["GHBType"]."',
                    `GHBAmt`='".$_POST["GHBAmt"]."',
                    `UnionMemberAmt`='".$_POST["UnionMemberAmt"]."',
                    `AwardAmt`='".$_POST["AwardAmt"]."',
                    `CooperativeAmt01`='".$_POST["CooperativeAmt01"]."',
                    `CooperativeMemId01`='".$_POST["CooperativeMemId01"]."',
                    `CooperativeUnit01`='".$_POST["CooperativeUnit01"]."',
                    `CooperativeAmt02`='".$_POST["CooperativeAmt02"]."',
                    `CooperativeMemId02`='".$_POST["CooperativeMemId02"]."',
                    `CooperativeUnit02`='".$_POST["CooperativeUnit02"]."' ";
        $strSQL .= " WHERE EmplCode = '".$_POST["id"]."'";

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
    $strSQL = "DELETE FROM tm03_employee ";
    $strSQL .="WHERE EmplCode = '".$_POST["delete"]."'";

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