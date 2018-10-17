
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<h1>Prepare for Monthly Closing</h1>
<hr>
<div class="container">
  <div class="row">
    <div class="col-sm">
    <button class="btn btn-success" data-toggle="modal" data-target="#modal_create">Create New</button>
    </div>
    <div class="col-sm" style="text-align: right;">
    <form name="search_user" method="get"  action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
Search: <input type="text" name="txtKeyword" id="txtKeyword" class="" placeholder="ค้นหาผู้ใช้งาน" size="20" value="<?php echo $_GET["txtKeyword"];?>" /> 
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
      <th scope="col">Period</th>
      <th scope="col">รอบ</th>
      <th scope="col">ประเภทพนักงาน</th>
      <th scope="col">วันที่เริ่ม</th>
      <th scope="col">วันที่สิ้นสุด</th>
      <th scope="col">วันที่จ่าย</th>
      <th scope="col" style="text-align: center;">Action</th>
    </tr>
  </thead>
  </div>
  <?php 
  if($_GET["txtKeyword"] != "")
  {
  // Search By Name or Email
  $strSQL = "SELECT * FROM tm01_user ";
  $strSQL .="WHERE (UserID LIKE '%".$_GET["txtKeyword"]."%' or UserTName LIKE '%".$_GET["txtKeyword"]."%' or UserEName LIKE '%".$_GET["txtKeyword"]."%' )  ";
     $objQuery = mysql_query($strSQL);
     $DATA = $objQuery;
  }
  if(mysql_num_rows($DATA) > 0)
  while ($rows = mysql_fetch_array($DATA)) {
    $id = $rows['auto_increment'];
    $row1 = $rows['Period'];
    $row2 = $rows['Term'];
    $row3 = $rows['EmplType'];
    $row4 = $rows['FmAttnDate'];
    $row5 = $rows['ToAttnDate'];
    $row6 = $rows['PayDate'];
  ?>
  <tbody>
    <tr>
      <td><?php echo $row1; ?></td>
      <td><?php echo $row2; ?></td>
      <td><?php echo $row3; ?></td>
      <td><?php echo date("d/m/Y", strtotime($row4));?></td>
      <td><?php echo date("d/m/Y", strtotime($row5)); ?></td>
      <td><?php echo date("d/m/Y", strtotime($row6));?></td>
      <td>

      <button  class="btn btn-outline-warning edit_id "  id="<?php echo $id?>">Edit</button>
  |
    <a href="feedbackDelete.php?tracker=<?php echo $resultArray[tracker];?>" onclick="return set_confirm(this)">
      <a href="#delete<?php echo $row1;?>" class="btn btn-outline-danger " data-toggle="modal">Delete</a>
      <!--<button type="button" class="btn btn-outline-danger">Delete</button></td>-->
    </tr>
  </tbody>
  <?php } ?>


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
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">Period : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="period" type="month" data-placement="top" required  class="form-control" placeholder="ระบุ Username"  maxlength="20" title="กรุณาระบุชื่อผู้ใช้งานเป็นภาษาอังกฤษ" pattern="\w+"/ >      
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">รอบ : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="term" type="number" data-placement="top" required  class="form-control"placeholder="ระบุรอบที่จ่าย" min="1" max="3" maxlength="1"  pattern="\w+"  title="ระบุรหัสผ่านเป็นภาษาอังกฤษ 6 - 10 ตัวอักษร"/>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">วันที่จ่าย : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="paydate" type="date" data-placement="top"  class="form-control"  maxlength="20"/ >      
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                        <dl class="row">
                                <dt class="col-sm-4 info-box-label">ประเภทพนักงาน : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <select class="form-control"  name="emp_type" required>
                                <option value="">Select</option>   
                                <option value="D">Daily Employee</option>
                                <option value="M">Monthly Employee</option>
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
                                        <a class="nav-link active " data-toggle="tab" href="#tab1" id="tabspecification" role="tab">Period</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="warpper-table">
                                <div class="tab-content">
                                <br/>
                                    <!-- ///////////////////////////////Period Control///////////////////////////////////////// -->
                                    <div class="tab-pane active" id="tab1">
                                        <div class="header-info-content-box content-box-padding">
                                            <div class="row">
                                            <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-3 info-box-label">Salary Date from : <span class="field-required">*</span></dt>
                                <dd class="col-sm-3 info-box-label">
                                <input name="salary_date_from" type="date" data-placement="top" required  class="form-control"/ >      
                                </dd>
                                <dt class="col-sm-1 info-box-label">To : <span class="field-required">*</span></dt>
                                <dd class="col-sm-3 info-box-label">
                                <input name="salary_date_to" type="date" data-placement="top" required  class="form-control"/ >      
                                </dd>
                                <dd class="col-sm-2 info-box-label"></dd>
                               </dl>
                        </div>
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-3 info-box-label">Overtime Date from : <span class="field-required">*</span></dt>
                                <dd class="col-sm-3 info-box-label">
                                <input name="overtime_date_from" type="date" data-placement="top" required  class="form-control"/ >      
                                </dd>
                                <dt class="col-sm-1 info-box-label">To : <span class="field-required">*</span></dt>
                                <dd class="col-sm-3 info-box-label">
                                <input name="overtime_date_to" type="date" data-placement="top" required  class="form-control" / >      
                                </dd>
                                <dd class="col-sm-2 info-box-label"></dd>
                               </dl>
                        </div>
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-3 info-box-label">Lev-Late-Shif Date from : <span class="field-required">*</span></dt>
                                <dd class="col-sm-3 info-box-label">
                                <input name="lev_date_from" type="date" data-placement="top" required  class="form-control"/ >      
                                </dd>
                                <dt class="col-sm-1 info-box-label">To : <span class="field-required">*</span></dt>
                                <dd class="col-sm-3 info-box-label">
                                <input name="lev_date_to" type="date" data-placement="top" required  class="form-control" / >      
                                </dd>
                                <dd class="col-sm-2 info-box-label"></dd>
                               </dl>
                        </div>
                                            </div>
                                        </div>
                                    </div>
         <!-- ///////////////////////////////Period Control///////////////////////////////////////// -->                         
<!--END-->

</div>
                        
</div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="modal_create_submit_btn">Save</button>
      </div> 
      </form>
    </div>
  </div>
<!--Modal Create-->

        

