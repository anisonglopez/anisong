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
<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Emp ID</th>
      <th scope="col">Employee Type</th>
      <th scope="col">Name - Lastname</th>
      <th scope="col">Department</th>
      <th scope="col">Position</th>
      <th scope="col">เพศ</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php while ($rows = mysqli_fetch_array($DATA)) {
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
      <td style="text-align: center;"><?php echo $EmplType; ?></td>
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
  <div class="modal-dialog" style="max-width: 1300px;" role="document">
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
        <div class="col-md-7">
         <dl class="row">
           <dt class="col-sm-4 info-box-label">รหัสพนักงาน : <span class="field-required">*</span></dt>
           <dd class="col-sm-4 info-box-label">
           <input name="EmplCode" type="text" data-placement="top" required  class="form-control"  maxlength="10"/>      
           </dd>
         </dl>
       
         <dl class="row">
          <dt class="col-sm-4 info-box-label">ชื่อ - นามสกุล (ไทย) : <span class="field-required">*</span></dt>
          <dd class="col-sm-8 info-box-label">
          <input name="EmplTName" type="text" data-placement="top" required  class="form-control" maxlength="50"/>
          </dd>
         </dl>

            <dl class="row">
         <dt class="col-sm-4 info-box-label">ชื่อ - นามสกลุ (English): <span class="field-required">*</span></dt>
         <dd class="col-sm-8 info-box-label">
          <input name="EmplEName" type="text" data-placement="top" required  class="form-control" maxlength="50"/>
          </dd>
         </dl>
      
       
         <dl class="row">
          <dt class="col-sm-4 info-box-label">Employee Type : <span class="field-required">*</span></dt>
          <dd class="col-sm-4 info-box-label">
          <select class="form-control"  name="EmplType" required>
            <option value="">Select</option>   
            <option value="D">รายวัน</option>
            <option value="M">รายเดือน</option>
          </select>      
          </dd>
         </dl>
       
         <dl class="row">
          <dt class="col-sm-4 info-box-label">Process Type : <span class="field-required">*</span></dt>
          <dd class="col-sm-4 info-box-label">
          <select class="form-control"  name="ProcCode" required>
            <option value="">Select</option>   
            <option value="1">Automatic</option>
            <option value="2">Manual</option>
          </select>     
          </dd>
         </dl>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
        <!--
        <form action="" method="post" enctype="multipart/form-data" name="personal_image" id="newHotnessForm">
    <p><label for="image">รูปประจำตัวพนักงาน :</label>
     <div id="preview">
            <img width="200px" height="250px" src="profile pic.jpg" id="blah" src="#" class="img-thumbnail-personal" />
        </div>
    <input type="file" onchange="readURL(this);" id="imageUpload" class="btn"/></p>
    <p>* ควรอัพโหลดเป็นรูปภาพแนวตั้ง</p>
    </form>
    -->
        </div>
<script>
  function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(250);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
        <div class="col-md-12">
        <br>
<!--Start-->
         <div class="add-pad">
          <div class="title-header-info-box add-pad">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active " data-toggle="tab" href="#tabEmp" id="tabspecification" role="tab">Employee Information</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabFamily" id="tabspecification" role="tab">Family</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabPersonal" id="tabspecification" role="tab">Personal Info</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabOther" id="tabspecification" role="tab">Other Information</a>
              </li>
            </ul>
          </div>
          <div class="warpper-table">
            <div class="tab-content">
            <br/>
            <!-- ///////////////////////////////employee///////////////////////////////////////// -->
              <div class="tab-pane active" id="tabEmp">
                <div class="header-info-content-box content-box-padding">
                  <div class="row">
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">Department : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                         <select class="form-control"  name="DeptCode" required>
                         <option value="">Select</option>   
                          <?php
                          $strSQL = "SELECT * FROM tm02_department";
                         $objQuery = mysqli_query($conn, $strSQL);
                          while($objResuut = mysqli_fetch_array($objQuery))
                          {
                          ?>
                            <option value="<?=$objResuut["DeptCode"];?>"><?=$objResuut["DeptCode"]." - ".$objResuut["DeptTDesc"];?></option>
                          <?php
                          }
                          ?>
                        </select>      
                        </dd>
                        <dt class="col-sm-2 info-box-label">Bank : </dt>
                        <dd class="col-sm-3 info-box-label">
                        <select class="form-control"  name="BankCode" \>
                        <option value="">Select</option>   
                          <?php
                          $strSQL = "SELECT * FROM tm02_bank";
                         $objQuery = mysqli_query($conn, $strSQL);
                          while($objResuut = mysqli_fetch_array($objQuery))
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
                       <dt class="col-sm-3 info-box-label">Position : <span class="field-required">*</span></dt>
                       <dd class="col-sm-3 info-box-label">
                       <select class="form-control"  name="PosiCode" required>
                       <option value="">Select</option>   
                          <?php
                          $strSQL = "SELECT * FROM tm02_position";
                         $objQuery = mysqli_query($conn, $strSQL);
                          while($objResuut = mysqli_fetch_array($objQuery))
                          {
                          ?>
                            <option value="<?=$objResuut["PosiCode"];?>"><?=$objResuut["PosiCode"]." - ".$objResuut["PosiTDesc"];?></option>
                          <?php
                          }
                          ?>
                        </select>      
                       </dd>
                       <dt class="col-sm-2 info-box-label">เลขที่บัญชี :</dt>
                       <dd class="col-sm-3 info-box-label">
                         <input name="BankAccCode" type="text" data-placement="top"   class="form-control" maxlength="20"/>      
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
                         $objQuery = mysqli_query($conn, $strSQL);
                          while($objResuut = mysqli_fetch_array($objQuery))
                          {
                          ?>
                            <option value="<?=$objResuut["BranchCode"];?>"><?=$objResuut["BranchCode"]." - ".$objResuut["BranchTName"];?></option>
                          <?php
                          }
                          ?>
                        </select>      
                        </dd>
                        <dt class="col-sm-2 info-box-label"> </dt>
                        <dd class="col-sm-3 info-box-label">
                       
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">เงินเดือน : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="Salary" type="number" data-placement="top" required  min="0" class="form-control" value="0"/>      
                        </dd>
                        <dt class="col-sm-2 info-box-label"></dt>
                        <dd class="col-sm-3 info-box-label"> 
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">วันที่เริ่มงาน : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="EnterDate" type="date" data-placement="top" required  class="form-control"/>      
                        </dd>
                        <!--
                        <dt class="col-sm-2 info-box-label">วันที่พ้นสถาพ : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="ProbDate" type="date" data-placement="top"   class="form-control" />      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">วันที่ลาออก : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="ResignDate" type="date" data-placement="top"   class="form-control"/>      
                        </dd>
                        <dt class="col-sm-2 info-box-label">สาเหตุการพ้นสถาพ : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="ProbFlag" type="text" data-placement="top"   class="form-control" />      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                        -->
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">กองทุนสำรองเลี้ยงชีพ : </dt>
                        <dd class="col-sm-3 info-box-label">
                        <input name="PF_Flag" type="checkbox" data-placement="top"  class="form-control" id="PF_Flag" onclick="PF_Flag_function()" value="1"/>       
                        </dd>
                        <dt class="col-sm-2 info-box-label">รหัสสมาชิกกองทุน : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="PF_MemNo" type="text" data-placement="top"  class="form-control" id="PF_MemNo" disabled="disabled" />      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>

                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">วันที่เป็นสมาชิกกองทุน : </dt>
                        <dd class="col-sm-3 info-box-label">
                        <input name="PF_EnterDate" type="date" data-placement="top"  class="form-control" id="PF_EnterDate" disabled="disabled" />       
                        </dd>
                        <dt class="col-sm-2 info-box-label">อัตราการหักเงินสำรองเลี้ยงชีพพนักงาน (%) : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="PF_E_Rate" type="number" data-placement="top"  class="form-control"   id="PF_E_Rate" disabled="disabled" min="0" max="100" />      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">เงื่อนไขภาษี : <span class="field-required">*</span></dt>
                        <dd class="col-sm-3">
                        <input   type="radio" name="TaxCond" value="C" required> Company 
                      <input type="radio" name="TaxCond" value="E" required> Employee
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
                              <td><label class="checkbox-inline"><input type="checkbox" name="UM_Flag" value="1"> สมาชิกสหภาพฯ</label></td>
                              <td><label class="checkbox-inline"><input type="checkbox" name="Cooperative_F" value="1"> สมาชิกสหกรณ์ออมทรัพย์</label></td>
                              <td><label class="checkbox-inline"><input type="checkbox" name="GHB_F" value="1"> สมาชิก ธอส.</label></td>
                            </tr>
                            <tr>
                              <td><label class="checkbox-inline"><input type="checkbox" name="Feneral_F" value="1"> สมาชิกฌาปนกิจสงเคราะห์</label></td>
                              <td><label class="checkbox-inline"><input type="checkbox" name="MoneyLoan_F" value="1"> สมาชิกสินเชื่อเงินกู้</label></td>
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
            <div class="tab-pane" id="tabFamily">
                <div class="header-info-content-box content-box-padding">
                  <div class="row">
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">สถานะ :</dt>
                        <dd class="col-sm-3 info-box-label">
                        <select class="form-control"  name="Marital">
            <option value="">Select</option>   
            <option value="โสด">โสด</option>
            <option value="แต่งงานแล้ว">แต่งงานแล้ว</option>
            <option value="หม้าย">หม้าย</option>
            <option value="หย่า">หย่า</option>
            <option value="แยกกันอยู่">แยกกันอยู่</option>
          </select>     
                        </dd>
                        <dt class="col-sm-2 info-box-label">หมายเลขสมรส : </dt>
                        <dd class="col-sm-3 info-box-label">
                         <input name="MarriageNo" type="text" data-placement="top"   class="form-control"/ >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                       <dt class="col-sm-3 info-box-label">วันที่สมรส : </dt>
                       <dd class="col-sm-3 info-box-label">
                         <input name="MarriagedDate" type="date" data-placement="top"   class="form-control"/ >      
                       </dd>
                       <dt class="col-sm-2 info-box-label">ชื่อ - สกุลคู่สมรส :</dt>
                       <dd class="col-sm-3 info-box-label">
                         <input name="SpouseName" type="text" data-placement="top"   class="form-control" / >      
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
                          <input name="ChildInEduc" type="number" data-placement="top"   class="form-control" min="0" max="20" / >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">จำนวนบุตรที่ไม่ได้เรียนแล้ว : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="ChildNotEduc" type="number" data-placement="top"   class="form-control" min="0" max="20"  / >      
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
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">ชื่อบิดา :</dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="Own_Fath_ID" type="text" data-placement="top"   class="form-control"/ >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">คู่สมรสของบิดา : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="SP_Fath_ID" type="text" data-placement="top"   class="form-control"/ >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>

                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">สิทธิลดหย่อนบิดา :</dt>
                        <dd class="col-sm-3">  
                          <input id="Own_Fath_Red_F" name="Own_Fath_Red_F" type="checkbox" value="1"/>
                        </dd>
                        <dt class="col-sm-2 info-box-label">เลขประจำตัวประชาชนบิดา : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="Own_Fath_ID" type="text" data-placement="top"   class="form-control" maxlength="13"/ >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>

                        <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">สิทธิลดหย่อนบิดาคู่สมรส :</dt>
                        <dd class="col-sm-3">  
                          <input id="SP_Fath_Red_F" name="SP_Fath_Red_F" type="checkbox" value="1" onclick="SP_Fath_Red_F_function()"/>
                        </dd>
                        <dt class="col-sm-2 info-box-label">เลขประจำตัวประชาชนบิดาของคู่สมรส : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input  id="SP_Fath_ID" name="SP_Fath_ID" type="text" data-placement="top"   class="form-control" maxlength="13" disabled="disabled"/ >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>

                    <div class="col-md-12">
                      <dl class="row">
                      <dt class="col-sm-3 info-box-label">ชื่อมารดา : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="Own_Moth_ID" type="text" data-placement="top"   class="form-control" / >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">คู่สมรสของมารดา : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="SP_Moth_ID" type="text" data-placement="top"   class="form-control" / >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>

        <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">สิทธิลดหย่อนมารดา :</dt>
                        <dd class="col-sm-3">  
                          <input id="Own_Moth_Red_F" name="Own_Moth_Red_F" type="checkbox" value="1"/>
                        </dd>
                        <dt class="col-sm-2 info-box-label">เลขประจำตัวประชาชนมารดา : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="Own_Moth_ID" type="text" data-placement="top"   class="form-control" maxlength="13"/ >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>

                     <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">สิทธิลดหย่อนมารดาคู่สมรส :</dt>
                        <dd class="col-sm-3">  
                          <input id="SP_Moth_Red_F" name="SP_Moth_Red_F" type="checkbox" value="1" onclick="SP_Moth_Red_F_function()"/>
                        </dd>
                        <dt class="col-sm-2 info-box-label">เลขประจำตัวประชาชนมารดาของคู่สมรส : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input id="SP_Moth_ID" name="SP_Moth_ID" type="text" data-placement="top"   class="form-control" maxlength="13" disabled="disabled"/>      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    
                    <!-- div -->
                  </div>
                </div>
              </div>
            <!-- ///////////////////////////////family///////////////////////////////////////// -->
            
            <!-- ///////////////////////////////personal///////////////////////////////////////// -->
            <div class="tab-pane" id="tabPersonal">
                <div class="header-info-content-box content-box-padding">
                  <div class="row">
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">วันเกิด : </dt>
                        <dd class="col-sm-3 info-box-label">
                         <input name="BirthDate" type="date" data-placement="top"   class="form-control"/ >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">เลขประจำตัวประชาชน :</dt>
                        <dd class="col-sm-3 info-box-label">
                         <input name="IDno" type="text" data-placement="top"   class="form-control" maxlength="13"/ >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                       <dt class="col-sm-3 info-box-label">สัญชาติ : </dt>
                       <dd class="col-sm-3 info-box-label">
                         <input name="Nationality" type="text" data-placement="top"   class="form-control"/ >      
                       </dd>
                       <dt class="col-sm-2 info-box-label">ชาติพันธ์ : </dt>
                       <dd class="col-sm-3 info-box-label">
                         <input name="Ethnic" type="text" data-placement="top"   class="form-control" / >      
                       </dd>
                       <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                       <dt class="col-sm-3 info-box-label">ศาสนา : </dt>
                       <dd class="col-sm-3 info-box-label">
                       <input name="Religion" type="text" data-placement="top"   class="form-control" / >     
                       </dd>
                       <dt class="col-sm-2 info-box-label"></dt>
                       <dd class="col-sm-3 info-box-label">
                              
                       </dd>
                       <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">น้ำหนัก : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="Weight" type="number" data-placement="top" min="0"   class="form-control"/ >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">ส่วนสูง : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="Height" type="number" data-placement="top"  min="0"   class="form-control" / >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">เพศ :</dt>
                        <dd class="col-sm-3 info-box-label">
                        <select class="form-control"  name="Sex" >
            <option value="">Select</option>   
            <option value="M">ชาย</option>
            <option value="F">หญิง</option>
          </select>     
              
                        </dd>
                        <dt class="col-sm-2 info-box-label">เบอร์โทรศัพท์ : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="HomePhone" type="text" data-placement="top"   class="form-control" / >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">ที่อยู่ : </dt>
                        <dd class="col-sm-3 info-box-label">
                        <textarea class="form-control" rows="5" name="Address" id="comment"></textarea>      
                        </dd>
                        <dt class="col-sm-2 info-box-label">รหัสไปรษณีย์ : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="PostalCode" type="text" data-placement="top"   class="form-control"  maxlength="5"/ >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">เลขประจำตัวผู้เสียภาษี : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="TaxID" type="text" data-placement="top"   class="form-control" maxlength="13"/ >      
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
            <div class="tab-pane" id="tabOther">
                <div class="header-info-content-box content-box-padding">
                  <div class="row">
                  <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">เงินได้สะสมจากบริษัทก่อนหน้า  (Last Company Gross) : </dt>
                        <dd class="col-sm-3 info-box-label">
                        <input name="L_C_Gross" type="number" data-placement="top"   class="form-control"  min="0"/>      
                        </dd>
                        <dt class="col-sm-2 info-box-label">เงินภาษีรวมที่หักไว้จากบริษัทก่อนหน้า (Last Company Tax) : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="L_C_Tax" type="number" data-placement="top"   class="form-control" min="0" />      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">เงินประกันสังคมสะสมที่หักไว้จากบริษัทก่อนหน้า (Last Company Social) : </dt>
                        <dd class="col-sm-3 info-box-label">
                        <input name="L_C_SOC" type="number" data-placement="top"   class="form-control"  min="0" / >     
                        </dd>
                        <dt class="col-sm-2 info-box-label">Company Loan/Month : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="CompLoan" type="number" data-placement="top"   class="form-control" min="0" />      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">Overtime Flag : </dt>
                        <dd class="col-sm-3"> 
                        <div class="material-switch pull-right">
               <input id="OT_Cal_F" name="OT_Cal_F" type="checkbox" value="1"/>
                <label for="OT_Cal_F" class="label-success"></label>
                   </div>
                        </dd>
                        <dt class="col-sm-2 info-box-label">Attendance Flag : </dt>
                        <dd class="col-sm-3">
                                    <div class="material-switch pull-right">
                        <input id="Attn_Cal_F" name="Attn_Cal_F" type="checkbox"value="1"/>
                          <label for="Attn_Cal_F" class="label-success"></label>
                                </div>   
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">เข้ากะในเวลาทำงาน(วัน) : </dt>
                        <dd class="col-sm-3 info-box-label">
                        <input name="O_Shft_D_PM" type="number" data-placement="top"   class="form-control" min="0" / >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">เข้ากะในช่วงเช้า(วัน) : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="M_Shft_D_PM" type="number" data-placement="top"   class="form-control" min="0"  / >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">เข้ากะในช่วงดึก(วัน) : </dt>
                        <dd class="col-sm-3 info-box-label">
                        <input name="E_Shft_D_PM" type="number" data-placement="top"   class="form-control"  min="0"/ >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">เข้ากะในเวลาเช้า(วัน) : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="N_Shft_D_PM" type="number" data-placement="top"   class="form-control"  min="0"/ >      
                        </dd>
                        <dd class="col-sm-1 info-box-label"></dd>
                      </dl>
                    </div>
                    <div class="col-md-12">
                      <dl class="row">
                        <dt class="col-sm-3 info-box-label">สิทธิ์ลาป่วย(วัน) : </dt>
                        <dd class="col-sm-3 info-box-label">
                        <input name="SL_Day" type="number" data-placement="top"   class="form-control" min="0" / >      
                        </dd>
                        <dt class="col-sm-2 info-box-label">จำนวนชั่วโมงวันลาพักร้อนคงเหลือ : </dt>
                        <dd class="col-sm-3 info-box-label">
                          <input name="AL_Rem_Hrs" type="text" data-placement="top"   class="form-control" disabled="disabled" / >      
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
