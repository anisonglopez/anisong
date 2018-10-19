<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<h1>ข้อมูลพนักงาน</h1>
<hr>
<div class="container">
  <div class="row">
    <div class="col-sm">
    <button class="btn btn-success" data-toggle="modal" data-target="#modal_create">Create New</button>
    </div>
    <div class="col-sm" style="text-align: right;">
        <!--
    <form name="search_user" method="get"  action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
Search: <input type="text" name="txtKeyword" id="txtKeyword" class="" placeholder="ค้นหาผู้ใช้งาน" size="20" value="<?php echo $_GET["txtKeyword"];?>" /> 
<input type="submit" value="Search" class="btn btn-success"  style="display: inline-block"/>
<input type="submit" value="Print" class="btn btn-info"  style="display: inline-block"/>
</form>
-->
</div>
</div>
</div>
<div class="col-md-12"><br /></div>
<table class="table table-hover">
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
  ?>
  <tbody>
    <tr>
      <td><?php echo $EmplCode; ?></td>
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
        <h1 class="modal-title" id="modal_create_label">Create Prepare for Monthly Closing</h1>
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
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="modal_create_submit_btn">Save</button>
        </div> 
      </form>
    </div>
  </div>
<!--Modal Create-->
