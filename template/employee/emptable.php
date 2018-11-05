<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<h1>Employee</h1>
<hr>
<div class="container">
  <div class="row">
    <div class="col-sm">
    <button class="btn btn-success" data-toggle="modal" data-target="#modal_create">Create New</button>
    </div>
    <div class="col-sm" style="text-align: right;">
    <form name="search" method="post"  action="<?php echo $_SERVER['PHP_SELF'];?>">Search: 
        <input type="text" name="search" id="search" class="" placeholder="ค้นหา" size="20" value="" /> 
        <input type="submit" value="Search" class="btn btn-success"  style="display: inline-block"/>
        <input type="submit" value="Print" class="btn btn-info"  style="display: inline-block"/>
    </form>
</div>
</div>
</div>
<div class="col-md-12"><br /></div>
<table class="table table-hover table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">รหัสพนักงาน</th>
      <th scope="col">ประเภทพนักงาน</th>
      <th scope="col">ชื่อพนักงาน</th>
      <th scope="col">แผนก</th>
      <th scope="col">ตำแหน่ง</th>
      <th scope="col">เพศ</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php while ($rows = mysql_fetch_array($DATA)) {
    $EmplCode = $rows['EmplCode'];
    $EmplType = $rows['EmplType'];
    $EmplTName = $rows['EmplTName'];
    $DeptTDesc = $rows['DeptTDesc'];
    $PosiTDesc = $rows['PosiTDesc'];
    $Sex = $rows['Sex'];

    if( $EmplType == "D"){
      $EmplType = "รายวัน";
    }
    else{
      $EmplType = "รายเดือน";
    }
    if( $Sex == "F"){
      $Sex = "หญิง";
    }
    else{
      $Sex = "ชาย";
    }
  ?>
  <tbody>
    <tr>
      <td class="mx-2"><?php echo $EmplCode; ?></td>
      <td><?php echo $EmplType; ?></td>
      <td><?php echo $EmplTName; ?></td>
      <td><?php echo $DeptTDesc;?></td>
      <td><?php echo $PosiTDesc; ?></td>
      <td><?php echo $Sex;?></td>
      <td><center>
    <button  class="btn btn-warning edit_id "  id="<?php echo $EmplCode; ?>">Edit</button>
  <button  class="btn btn-danger delete_id "  id="<?php echo $EmplCode; ?>">Delete</button>
  </center>
  </td>
    </tr>
  </tbody>
  <?php } ?>
  </table>
 <!--   Page List   -->
 <nav>
 <ul class="pagination">
 <li>
 <a href="systemcontrol.php?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span> 
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){?>
 <li><a class="btn btn-light" href="systemcontrol.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 <?php } ?>
 <li>
 <a href="systemcontrol.php?page=<?php echo  $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
 </nav>
   <!--   Page List   -->
      </div>
    </div>
  </div>
</div>


  <?php 
    echo $result;
    ?>  

<!--Modal Create-->
<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="modal_create_label" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 1000px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="modal_create_label">Create Employee</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal col-sm-12" name="create" method="post"  action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" autocomplete="off">
      <input type="hidden" name="create"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
      <div class="modal-body" >
      <br/>
      <div class="row">
        <div class="col-md-6">
         <dl class="row">
           <dt class="col-sm-4 info-box-label">รหัสพนักงาน : <span class="field-required">*</span></dt>
           <dd class="col-sm-8 info-box-label">
           <input name="EmplCode" type="text" data-placement="top" required  class="form-control"  maxlength="20"/>      
           </dd>
         </dl>
       
         <dl class="row">
          <dt class="col-sm-4 info-box-label">ชื่อพนักงาน(ไทย) : <span class="field-required">*</span></dt>
          <dd class="col-sm-8 info-box-label">
          <input name="EmplTName" type="text" data-placement="top" required  class="form-control" maxlength="20"/>
          </dd>
         </dl>
       
         <dl class="row">
          <dt class="col-sm-4 info-box-label">ชื่อพนักงาน(ENG) : <span class="field-required">*</span></dt>
          <dd class="col-sm-8 info-box-label">
          <input name="EmplEName" type="text" data-placement="top"  class="form-control"  maxlength="20"/>      
          </dd>
         </dl>
       
         <dl class="row">
          <dt class="col-sm-4 info-box-label">ประเภทพนักงาน : <span class="field-required">*</span></dt>
          <dd class="col-sm-8 info-box-label">
          <select class="form-control"  name="EmplType" required>
            <option value="">Select</option>   
            <option value="D">รานวัน</option>
            <option value="M">รายเดือน</option>
          </select>      
          </dd>
         </dl>
       
         <dl class="row">
          <dt class="col-sm-4 info-box-label">ประเภทกระบวนการ : <span class="field-required">*</span></dt>
          <dd class="col-sm-4 info-box-label">
          <select class="form-control"  name="ProcCode" required>
            <option value="">Select</option>   
            <option value="1">Automatic</option>
            <option value="2">Manual</option>
          </select>     
          </dd>
         </dl>
        </div>
        
        <div class="col-md-2">
        <img src="paris.jpg" alt="Paris" width="300" height="300">
        </div>
        <div class="col-md-12">
        <br>
<!--Start-->
         <div class="add-pad">
          <div class="title-header-info-box add-pad">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active " data-toggle="tab" href="#tab1" id="tabspecification" role="tab">ข้อมูลพื้นฐาน</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab2" id="tabspecification" role="tab">ข้อมูลครอบครัว</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab3" id="tabspecification" role="tab">ข้อมูลส่วนตัว</a>
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
                            <option value="<?=$objResuut["DeptCode"];?>"><?=$objResuut["DeptCode"]." - ".$objResuut["DeptTDesc"];?></option>
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
                       <dt class="col-sm-2 info-box-label">เลขที่บัญชี : <span class="field-required">*</span></dt>
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
                          <input name="Salary" type="text" data-placement="top" required  class="form-control"/>      
                        </dd>
                        <dt class="col-sm-2 info-box-label">รหัสสมาชิก : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="PF_MemNo" type="text" data-placement="top" required  class="form-control" />      
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
                          <input name="ProbFlag" type="text" data-placement="top" required  class="form-control" />      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">เงื่อนไขภาษี : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="TaxCond" type="text" data-placement="top" required  class="form-control"/>      
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
                         <input name="Marital" type="text" data-placement="top" required  class="form-control"/ >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">หมายเลขสมรถ : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                         <input name="MarriageNo" type="text" data-placement="top" required  class="form-control"/ >      
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
                         <input name="SpouseName" type="text" data-placement="top" required  class="form-control" / >      
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
                          <input name="ChildInEduc" type="text" data-placement="top" required  class="form-control"/ >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">ไม่ได้ศึกษา : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="ChildNotEduc" type="text" data-placement="top" required  class="form-control" / >      
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
                          <input name="Own_Fath_ID" type="text" data-placement="top" required  class="form-control"/ >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">มารดา : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="Own_Moth_ID" type="text" data-placement="top" required  class="form-control" / >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">บิดาคู่สมรถ : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="SP_Fath_ID" type="text" data-placement="top" required  class="form-control"/ >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">มารดาคู่สมรถ : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="SP_Moth_ID" type="text" data-placement="top" required  class="form-control" / >      
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
                         <input name="IDno" type="text" data-placement="top" required  class="form-control"/ >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                       <dt class="col-sm-3 info-box-label">สัญชาติ : <span class="field-required">*</span></dt>
                       <dd class="col-sm-3 info-box-label">
                         <input name="Nationality" type="text" data-placement="top" required  class="form-control"/ >      
                       </dd>
                       <dt class="col-sm-2 info-box-label">ศาสนา : <span class="field-required">*</span></dt>
                       <dd class="col-sm-3 info-box-label">
                         <input name="Religion" type="text" data-placement="top" required  class="form-control" / >      
                       </dd>
                       <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">น้ำหนัก : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="Weight" type="text" data-placement="top" required  class="form-control"/ >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">ส่วนสูง : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="Height" type="text" data-placement="top" required  class="form-control" / >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">เพศ : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="Sex" type="text" data-placement="top" required  class="form-control"/ >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">เบอร์โทรศัพท์ : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="HomePhone" type="text" data-placement="top" required  class="form-control" / >      
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
                          <input name="PostalCode" type="text" data-placement="top" required  class="form-control" / >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">เลขประจำตัวผู้เสียภาษี : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="TaxID" type="text" data-placement="top" required  class="form-control"/ >      
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
                        <input name="L_C_Gross" type="text" data-placement="top" required  class="form-control" / >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">Last Company Tax : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="L_C_Tax" type="text" data-placement="top" required  class="form-control" / >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">Last Company Social : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                        <input name="L_C_SOC" type="text" data-placement="top" required  class="form-control" / >     
                        </dd>
                        <dt class="col-sm-2 info-box-label">Company Loan/Month : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="CompLoan" type="text" data-placement="top" required  class="form-control" / >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">Overtime Flag : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                        <input name="OT_Cal_F" type="text" data-placement="top" required  class="form-control" / >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">Attendance Flag : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="Attn_Cal_F" type="text" data-placement="top" required  class="form-control" / >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">Office Shift : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                        <input name="O_Shft_D_PM" type="text" data-placement="top" required  class="form-control" / >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">Morning Shift : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="M_Shft_D_PM" type="text" data-placement="top" required  class="form-control" / >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">Evening Shift : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                        <input name="E_Shft_D_PM" type="text" data-placement="top" required  class="form-control" / >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">Night Shift : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="N_Shft_D_PM" type="text" data-placement="top" required  class="form-control" / >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">Sick Leave : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                        <input name="SL_Day" type="text" data-placement="top" required  class="form-control" / >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">A/L Remaining : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="AL_Rem_Hrs" type="text" data-placement="top" required  class="form-control" / >      
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
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="modal_create_submit_btn">Save</button>
        </div> 
      </form>
    </div>
  </div>
<!--Modal Create-->
