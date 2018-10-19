
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<h1>ข้อมูลตำแหน่ง</h1>
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
      <th scope="col">รหัสตำแหน่ง</th>
      <th scope="col">ตำแหน่ง(ENG)</th>
      <th scope="col">ตำแหน่ง(ไทย)</th>
      
      <th scope="col">เบี้ยเลี้ยง/วัน(เช้า)</th>
      <th scope="col">เบี้ยเลี้ยง/วัน(บ่าย)</th>
      <th scope="col">เบี้ยเลี้ยง/วัน(เย็น)</th>
      <th scope="col" style="text-align: center;">Action</th>
    </tr>
  </thead>

  <?php 
  if(mysql_num_rows($DATA) > 0)
  while ($rows = mysql_fetch_array($DATA)) {
    $id = $rows['PosiCode'];
    $row1 = $rows['PosiEDesc'];
    $row2 = $rows['PosiTDesc'];
    
    $row4 = $rows['M_ShftALW_D'];
    $row5 = $rows['E_ShftALW_D'];
    $row6 = $rows['N_ShftALW_D'];
  ?>
  <tbody>
    <tr>
      <td><?php echo $id; ?></td>
      <td><?php echo $row1; ?></td>
      <td><?php echo $row2; ?></td>
      
      <td><?php echo $row4; ?></td>
      <td><?php echo $row5; ?></td>
      <td><?php echo $row6; ?></td>
      <td><center>
    <button  class="btn btn-warning edit_id "  id="<?php echo $id?>">Edit</button>
  <button  class="btn btn-danger delete_id "  id="<?php echo $id?>">Delete</button>
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
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">รหัสตำแหน่ง : <span class="field-required">*</span></dt>
            <dd class="col-sm-4 info-box-label">
            <input name="PosiCode" type="text" data-placement="top" required  class="form-control" maxlength="20" pattern="\w+"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">ตำแหน่ง(ENG) : </dt>
            <dd class="col-sm-4 info-box-label">
            <input name="PosiEDesc" type="text" data-placement="top" required  class="form-control" maxlength="20"  pattern="\w+"/>
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">ตำแหน่ง(TH) : </dt>
            <dd class="col-sm-4 info-box-label">
            <input name="PosiTDesc" type="text" data-placement="top"  class="form-control"  maxlength="20"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">เบี้ยเลี้ยง/เดือน : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="PosiALW" type="text" data-placement="top"  class="form-control"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
				<div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">เบี้ยเลี้ยง/วัน(เช้า) : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="M_ShftALW_D" type="text" data-placement="top"  class="form-control"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">เบี้ยเลี้ยง/วัน(บ่าย) : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="E_ShftALW_D" type="text" data-placement="top"  class="form-control"  maxlength="20"/>   
            </dd>
          </dl>
        </div> 
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">เบี้ยเลี้ยง/วัน(เย็น) : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="N_ShftALW_D" type="text" data-placement="top"  class="form-control"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">SysPgmID : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="SysPgmID" type="text" data-placement="top"  class="form-control"  maxlength="20"/>   
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

        

