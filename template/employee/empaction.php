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
    $strSQL = "SELECT * FROM tm02_otherinc WHERE OthINCCode = '".$_POST["edit_id"]."'";   
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
         <input name="EmplCode" type="text" data-placement="top" required  class="form-control"  maxlength="20"/>      
         </dd>
       </dl>
      </div>
      <div class="col-md-8">
       <dl class="row">
        <dt class="col-sm-4 info-box-label">ชื่อพนักงาน(ไทย) : <span class="field-required">*</span></dt>
        <dd class="col-sm-8 info-box-label">
        <input name="EmplTName" type="text" data-placement="top" required  class="form-control" maxlength="20"/>
        </dd>
       </dl>
      </div>
      <div class="col-md-8">
       <dl class="row">
        <dt class="col-sm-4 info-box-label">ชื่อพนักงาน(ENG) : <span class="field-required">*</span></dt>
        <dd class="col-sm-8 info-box-label">
        <input name="EmplEName" type="text" data-placement="top"  class="form-control"  maxlength="20"/>      
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
                       <input name="DeptCode" type="text" data-placement="top" required  class="form-control"/>      
                      </dd>
                      <dt class="col-sm-2 info-box-label">ธนาคาร : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                       <input name="BankCode" type="date" data-placement="top" required  class="form-control"/>      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                     <dt class="col-sm-3 info-box-label">ตำแหน่ง : <span class="field-required">*</span></dt>
                     <dd class="col-sm-3 info-box-label">
                       <input name="Position" type="date" data-placement="top" required  class="form-control"/>      
                     </dd>
                     <dt class="col-sm-2 info-box-label">เลที่บัญชี : <span class="field-required">*</span></dt>
                     <dd class="col-sm-3 info-box-label">
                       <input name="BankAccCode" type="date" data-placement="top" required  class="form-control" />      
                     </dd>
                     <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">สาขา : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="BranchCode" type="date" data-placement="top" required  class="form-control"/>      
                      </dd>
                      <dt class="col-sm-2 info-box-label">กองทุนสำรองเลี้ยงชีพ : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="PF_Flag" type="date" data-placement="top" required  class="form-control" />      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">เงินเดือน : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Salary" type="date" data-placement="top" required  class="form-control"/>      
                      </dd>
                      <dt class="col-sm-2 info-box-label">รหัสสมาชิก : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="PF_MemNo" type="date" data-placement="top" required  class="form-control" />      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">วันที่เข้างาน : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="EnterDate" type="date" data-placement="top" required  class="form-control"/>      
                      </dd>
                      <dt class="col-sm-2 info-box-label">วันที่พ้นสถาพ : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="ProbDate" type="date" data-placement="top" required  class="form-control" />      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">วันที่ลาออก : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="ResignDate" type="date" data-placement="top" required  class="form-control"/>      
                      </dd>
                      <dt class="col-sm-2 info-box-label">พ้นสถาพ : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="ProbFlag" type="date" data-placement="top" required  class="form-control" />      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">เงื่อนไขภาษี : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="TaxCond" type="date" data-placement="top" required  class="form-control"/>      
                      </dd>
                      <dt class="col-sm-2 info-box-label"></dt>
                      <dd class="col-sm-3 info-box-label"></dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label"></dt>
                      <dd class="col-sm-3 info-box-label">
                       <label class="checkbox-inline"><input type="checkbox" name="UM_Flag" value="1">สมาชิกสหภาพฯ</label>      
                      </dd>
                      <dt class="col-sm-3 info-box-label">
                       <label class="checkbox-inline"><input type="checkbox" name="Cooperative_F" value="1">สมาชิกสหกรณ์ออมทรัพย์</label>
                      </dt>
                      <dd class="col-sm-3 info-box-label">
                       <label class="checkbox-inline"><input type="checkbox" name="GHB_F" value="1">สมาชิก ธอส.</label>      
                      </dd>
                  
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label"></dt>
                      <dd class="col-sm-3 info-box-label">
                       <label class="checkbox-inline"><input type="checkbox" name="Feneral_F" value="1">สมาชิกฌาปนกิจสงเคราะห์</label>      
                      </dd>
                      <dt class="col-sm-2 info-box-label">
                       <label class="checkbox-inline"><input type="checkbox" name="MoneyLoan_F" value="1">สมาชิก สินเชื่อเงินกู้</label>
                      </dt>
                      <dd class="col-sm-3 info-box-label"></dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
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
                       <input name="Marital" type="date" data-placement="top" required  class="form-control"/ >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">หมายเลขสมรถ : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                       <input name="MarriageNo" type="date" data-placement="top" required  class="form-control"/ >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                     <dt class="col-sm-3 info-box-label">วันที่สมรถ : <span class="field-required">*</span></dt>
                     <dd class="col-sm-3 info-box-label">
                       <input name="MarriagedDate" type="date" data-placement="top" required  class="form-control"/ >      
                     </dd>
                     <dt class="col-sm-2 info-box-label">ชื่อ-สกุลคู่สมรถ : <span class="field-required">*</span></dt>
                     <dd class="col-sm-3 info-box-label">
                       <input name="SpouseName" type="date" data-placement="top" required  class="form-control" / >      
                     </dd>
                     <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label"></dt>
                      <dd class="col-sm-3 info-box-label">
                        ข้อมูลบุตร      
                      </dd>
                      <dt class="col-sm-2 info-box-label"></dt>
                      <dd class="col-sm-3 info-box-label">
                              
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">กำลังศึกษา : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="ChildInEduc" type="date" data-placement="top" required  class="form-control"/ >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">ไม่ได้ศึกษา : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="ChildNotEduc" type="date" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label"></dt>
                      <dd class="col-sm-3 info-box-label">
                        ข้อมูลผู้ปกครอง(เลขประจำตัวประชาชน)      
                      </dd>
                      <dt class="col-sm-2 info-box-label"></dt>
                      <dd class="col-sm-3 info-box-label">
                              
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">บิดา : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Own_Fath_ID" type="date" data-placement="top" required  class="form-control"/ >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">มารดา : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Own_Moth_ID" type="date" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">บิดาคู่สมรถ : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="SP_Fath_ID" type="date" data-placement="top" required  class="form-control"/ >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">มารดาคู่สมรถ : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="SP_Moth_ID" type="date" data-placement="top" required  class="form-control" / >      
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
                       <input name="BirthDate" type="date" data-placement="top" required  class="form-control"/ >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">เลขประจำตัวประชาชน : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                       <input name="IDno" type="date" data-placement="top" required  class="form-control"/ >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                     <dt class="col-sm-3 info-box-label">สัญชาติ : <span class="field-required">*</span></dt>
                     <dd class="col-sm-3 info-box-label">
                       <input name="Nationality" type="date" data-placement="top" required  class="form-control"/ >      
                     </dd>
                     <dt class="col-sm-2 info-box-label">ศาสนา : <span class="field-required">*</span></dt>
                     <dd class="col-sm-3 info-box-label">
                       <input name="Religion" type="date" data-placement="top" required  class="form-control" / >      
                     </dd>
                     <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">น้ำหนัก : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Weight" type="date" data-placement="top" required  class="form-control"/ >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">ส่วนสูง : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Height" type="date" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">เพศ : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Sex" type="date" data-placement="top" required  class="form-control"/ >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">เบอร์โทรศัพท์ : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="HomePhone" type="date" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">ที่อยู่ : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                      <textarea class="form-control" rows="5" name="Address" id="comment"></textarea>      
                      </dd>
                      <dt class="col-sm-2 info-box-label">รหัสไปรษณีย์ : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="PostalCode" type="date" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">เลขประจำตัวผู้เสียภาษี : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="TaxID" type="date" data-placement="top" required  class="form-control"/ >      
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
                      <input name="L_C_Gross" type="date" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">Last Company Tax : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="L_C_Tax" type="date" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">Last Company Social : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="L_C_SOC" type="date" data-placement="top" required  class="form-control" / >     
                      </dd>
                      <dt class="col-sm-2 info-box-label">Company Loan/Month : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="CompLoan" type="date" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">Overtime Flag : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="OT_Cal_F" type="date" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">Attendance Flag : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="Attn_Cal_F" type="date" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">Office Shift : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="O_Shft_D_PM" type="date" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">Morning Shift : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="M_Shft_D_PM" type="date" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">Evening Shift : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="E_Shft_D_PM" type="date" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">Night Shift : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="N_Shft_D_PM" type="date" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dd class="col-sm-1 info-box-label"></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 info-box-label">Sick Leave : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                      <input name="SL_Day" type="date" data-placement="top" required  class="form-control" / >      
                      </dd>
                      <dt class="col-sm-2 info-box-label">A/L Remaining : <span class="field-required">*</span></dt>
                      <dd class="col-sm-3 info-box-label">
                        <input name="AL_Rem_Hrs" type="date" data-placement="top" required  class="form-control" / >      
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
        $strSQL .= "SET OthINCEDesc='".$_POST["OthINCEDesc"]."',OthINCTDesc='".$_POST["OthINCTDesc"]."',OthIncAmt='".$_POST["OthIncAmt"]."',TaxCalFlag='".$_POST["TaxCalFlag"]."'";
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