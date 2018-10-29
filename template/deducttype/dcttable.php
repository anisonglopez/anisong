
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<h1>ข้อมูประเภทการหักเงิน</h1>
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
<!--<input type="submit" value="Print" class="btn btn-info"  style="display: inline-block"/>-->
    </form>
</div>
</div>
</div>
<div class="col-md-12"><br /></div>
<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">รหัสประเภทการหักเงิน</th>
      <th scope="col">ประเภทการหักเงิน(ENG)</th>
      <th scope="col">ประเภทการหักเงิน(ไทย)</th>
      <th scope="col" style="text-align: center;">Action</th>
    </tr>
  </thead>

  <?php 
  if(mysql_num_rows($DATA) > 0)
  while ($rows = mysql_fetch_array($DATA)) {
    $id = $rows['DeductCode'];
    $row1 = $rows['DeductDesc'];
    $row2 = $rows['DeductTDesc'];
  ?>
  <tbody>
    <tr>
      <td><?php echo $id; ?></td>
      <td><?php echo $row1; ?></td>
      <td><?php echo $row2; ?></td>
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
            <dt class="col-sm-4 info-box-label">รหัสประเภทการหักเงิน : <span class="field-required">*</span></dt>
            <dd class="col-sm-4 info-box-label">
            <input name="PosiCode" type="text" data-placement="top" required  class="form-control" maxlength="20" pattern="\w+"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">ประเภทการหักเงิน(ENG) : </dt>
            <dd class="col-sm-4 info-box-label">
            <input name="PosiEDesc" type="text" data-placement="top" required  class="form-control" maxlength="20"  pattern="\w+"/>
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">ประเภทการหักเงิน(ไทย) : </dt>
            <dd class="col-sm-4 info-box-label">
            <input name="PosiTDesc" type="text" data-placement="top"  class="form-control"  maxlength="20"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">จำนวน : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="PosiALW" type="text" data-placement="top"  class="form-control"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
				<div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">นำไปคำนวนภาษี : </dt>
            <dd class="col-sm-4 info-box-label">
						<label class="checkbox-inline"><input type="checkbox" name="Feneral_F" value="1"></label>   
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

        

