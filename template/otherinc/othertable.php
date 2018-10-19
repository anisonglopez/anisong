
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<h1>รายได้ต่างๆ</h1>
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
      <th scope="col">รหัสรายได้</th>
      <th scope="col">ชื่อรายได้(EN)</th>
      <th scope="col">ชื่อรายได้(TH)</th>
      <th scope="col">จำนวนเงินรายได้</th>
      <th scope="col">นำไปคำนวนภาษีภาษี</th>
      <th scope="col">SysUserID</th>
      <th scope="col" style="text-align: center;">Action</th>
    </tr>
  </thead>

  <?php 
  if(mysql_num_rows($DATA) > 0)
  while ($rows = mysql_fetch_array($DATA)) {
    $OthINCCode = $rows['OthINCCode'];
    $OthINCEDesc = $rows['OthINCEDesc'];
    $OthINCTDesc = $rows['OthINCTDesc'];
    $OthINCAmt = $rows['OthIncAmt'];
    $TaxCalFlag = $rows['TaxCalFlag'];
    $SysUserID = $rows['SysUserID'];
  ?>
  <tbody>
    <tr>
		<td><?php echo $OthINCCode; ?></td>
      <td><?php echo $OthINCEDesc; ?></td>
      <td><?php echo $OthINCTDesc; ?></td>
      <td><?php echo $OthINCAmt; ?></td>
      <td><?php echo $TaxCalFlag; ?></td>
      <td><?php echo $SysUserID; ?></td>
      <td><center>
    <button  class="btn btn-warning edit_id "  id="<?php echo $OthINCCode; ?>">Edit</button>
  <button  class="btn btn-danger delete_id "  id="<?php echo $OthINCCode; ?>">Delete</button>
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
 <a href="otherinc.php?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span> 
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){?>
 <li><a class="btn btn-light" href="otherinc.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 <?php } ?>
 <li>
 <a href="otherinc.php?page=<?php echo  $total_page;?>" aria-label="Next">
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
        <h1 class="modal-title" id="modal_create_label">เพิ่มรายได้ต่างๆ</h1>
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
            <dt class="col-sm-4 info-box-label">รหัสรายได้ : <span class="field-required">*</span></dt>
            <dd class="col-sm-4 info-box-label">
            <input name="OthINCCode" type="text" data-placement="top" required  class="form-control" maxlength="20" pattern="\w+"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">ชื่อรายได้(EN) : </dt>
            <dd class="col-sm-4 info-box-label">
            <input name="OthINCEDesc" type="text" data-placement="top" required  class="form-control" maxlength="20"  pattern="\w+"/>
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">ชื่อรายได้(TH) : </dt>
            <dd class="col-sm-4 info-box-label">
            <input name="OthINCTDesc" type="text" data-placement="top"  class="form-control"  maxlength="20"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">จำนวนเงินรายได้ : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="OthIncAmt" type="text" data-placement="top"  class="form-control"  maxlength="20"/>   
            </dd>
          </dl>
        </div>
				<div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">นำไปคำนวนภาษีภาษี : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="TaxCalFlag" type="text" data-placement="top"  class="form-control"  maxlength="20"/>   
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
  </div>
	</div>                 
		</div>
<!--Modal Create-->

        

