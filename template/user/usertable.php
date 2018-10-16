<link rel="stylesheet" href="dependencies/bootstrap-4.1.3-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="dependencies/css/custom-main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<h1>จัดการข้อมูลผู้ใช้งาน</h1>
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
      <th scope="col">รหัสผู้ใช้งาน</th>
      <th scope="col">ชื่อผู้ใช้งาน (EN)</th>
      <th scope="col">ชื่อผู้ใช้งาน (TH)</th>
      <th scope="col">วันที่เข้าใช้งานระบบล่าสุด</th>
      <th scope="col">วันที่แก้ไขล่าสุด</th>
      <th scope="col">ผู้ที่แก้ไขล่าสุด</th>
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
    $row1 = $rows['UserID'];
    $row2 = $rows['UserEName'];
    $row3 = $rows['UserTName'];
    $row4 = $rows['LastLogon'];
    $row5 = $rows['SysUpdDate'];
    $row6 = $rows['SysUserID'];
  ?>
  <tbody>
    <tr>
      <td><?php echo $row1; ?></td>
      <td><?php echo $row2; ?></td>
      <td><?php echo $row3; ?></td>
      <td><?php echo $row4; ?></td>
      <td><?php echo $row5; ?></td>
      <td><?php echo $row6; ?></td>
      <td>

      <a href="#edit<?php echo $row1;?>" class="btn btn-outline-warning " data-toggle="modal">Edit</a>
  |
      <a href="#delete<?php echo $row1;?>" class="btn btn-outline-danger " data-toggle="modal">Delete</a>

      <!--<button type="button" class="btn btn-outline-danger">Delete</button></td>-->
    </tr>
  </tbody>



<!-- Modal  Delete-->
<div class="modal fade" id="delete<?php echo $row1; ?>" tabindex="1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="deleteModalLabel">ยืนยันการลบ</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="col-md-12">ยืนยันการลบข้อมูล</div>
            <br/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input type="hidden" name="delete_id" value="<?php echo $row1; ?>">
        <button type="submit" name="delete" class="btn btn-primary">Confirm Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!---->

<!-- Modal  Edit-->
<div class="modal fade" id="edit<?php echo $row1; ?>" tabindex="1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 600px;">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="deleteModalLabel">แก้ไขข้อมูลผู้ใช้งาน</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
      <div class="row">
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">Username : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="username" value="<?php echo $row1; ?>" type="text" data-placement="top" required  class="form-control" placeholder="ระบุ Username"  maxlength="20" title="กรุณาระบุชื่อผู้ใช้งานเป็นภาษาอังกฤษ" pattern="\w+" disabled/>
                                    
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">Password : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <input id="password_edit" value="" name="password" type="password" data-placement="top" required  class="form-control"placeholder="ระบุรหัสผ่าน" minlength="6" maxlength="10"  pattern="\w+"  title="ระบุรหัสผ่านเป็นภาษาอังกฤษ 6 - 10 ตัวอักษร"/>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">Confirm Password : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <input id="confirm_password_edit" value=""  name="confirm_password" type="password" data-placement="top" required  class="form-control" placeholder="ระบุรหัสผ่านอีกครั้ง" minlength="5" maxlength="10" name="pwd2"/>
<span id='message_edit'></span>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">ชื่อผู้ใช้งาน(EN) : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="descEN" type="text" value="<?php echo $row2; ?>" data-placement="top"   class="form-control" placeholder="ระบุชื่อผู้ใช้งาน (EN)"/>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">ชื่อผู้ใช้งาน(TH) : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="descTH" type="text" value="<?php echo $row3; ?>" data-placement="top"   class="form-control" placeholder="ระบุชื่อผู้ใช้งาน (TH)"/>
                                </dd>
                            </dl>
                        </div>
</div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="hidden" name="edit_id" value="<?php echo $row1; ?>">
        <button type="submit"  class="btn btn-primary" id="modal_edit_submit_btn">Update</button>
        </form>

      </div>
    </div>
  </div>
</div>
<!---->

<?php

}
else
  echo "  <tbody>
  <tr><td>ไม่พบข้อมูล ... <br/></td> 
  </tr>
  </tbody>";
  ?>
</table>
<p> Show:
<!--Page limit-->
<select>
  <option value="10">10</option>
  <option value="25">25</option>
  <option value="50">50</option>
  <option value="100">100</option>
</select>
entries
</p>
  <?php 
    echo $result;
    ?>  

<!--Modal Create-->
<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="modal_create_label" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 600px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="modal_create_label">เพิ่มผู้ใช้งาน</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal col-sm-12" name="create" method="post"  action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" autocomplete="off">
      <input type="hidden" name="create"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
      <div class="modal-body">
      <div class="row">
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">Username : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="username" type="text" data-placement="top" required  class="form-control" placeholder="ระบุ Username"  maxlength="20" title="กรุณาระบุชื่อผู้ใช้งานเป็นภาษาอังกฤษ" pattern="\w+"/ >
                                    
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">Password : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <input id="password" name="password" type="password" data-placement="top" required  class="form-control"placeholder="ระบุรหัสผ่าน" minlength="6" maxlength="10"  pattern="\w+"  title="ระบุรหัสผ่านเป็นภาษาอังกฤษ 6 - 10 ตัวอักษร"/>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">Confirm Password : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <input id="confirm_password"  name="confirm_password" type="password" data-placement="top" required  class="form-control" placeholder="ระบุรหัสผ่านอีกครั้ง" minlength="5" maxlength="10" name="pwd2"/>
<span id='message'></span>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">ชื่อผู้ใช้งาน(EN) : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="descTH" type="text" data-placement="top"   class="form-control" placeholder="ระบุชื่อผู้ใช้งาน (EN)"/>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-12">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">ชื่อผู้ใช้งาน(TH) : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="descEN" type="text" data-placement="top"   class="form-control" placeholder="ระบุชื่อผู้ใช้งาน (TH)"/>
                                </dd>
                            </dl>
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
<script>
$('#password_edit, #confirm_password_edit').on('keyup', function () {
  if ($('#password_edit').val() == $('#confirm_password_edit').val()) {
    document.getElementById('modal_edit_submit_btn').disabled = false,    
    $('#message_edit').html('รหัสผ่านสามารถเข้ากันได้').css('color', 'green');
  } else 
  document.getElementById('modal_edit_submit_btn').disabled = true,    
    $('#message_edit').html('รหัสผ่านไม่ตรงกัน').css('color', 'red');
});
</script>

<script>
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    document.getElementById("modal_create_submit_btn").disabled = false,    
    $('#message').html('รหัสผ่านสามารถเข้ากันได้').css('color', 'green');
  } else 
  document.getElementById("modal_create_submit_btn").disabled = true,    
    $('#message').html('รหัสผ่านไม่ตรงกัน').css('color', 'red');
});
</script>


