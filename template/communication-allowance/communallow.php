<h1>Transportation Cost</h1>
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
      <th scope="col">ชื่อพนักงาน</th>
      <th scope="col">CommAllow</th>
      <th scope="col">Remark</th>
      <th scope="col" style="text-align: center;">Action</th>
    </tr>
  </thead>

  <?php 
  if(mysqli_num_rows($DATA) > 0)
  while ($rows = mysqli_fetch_array($DATA)) {
    $id = $rows[''];
    $row1 = $rows['EmplCode'];
    $row2 = $rows['EmplTName'];
    $row3 = $rows['CommAllow'];
    $row4 = $rows['Remark'];

  ?>
  <tbody>
    <tr>
      <td><?php echo $row1; ?></td>
      <td><?php echo $row2; ?></td>
      <td><?php echo $row3; ?></td>
      
      <td><?php echo $row4; ?></td>
      <td><center>
    <button  class="btn btn-warning edit_id "  id="<?php echo $id?>">Edit</button>
  <button  class="btn btn-danger delete_id "  id="<?php echo $id?>">Delete</button>
  </center>
  </td>
    </tr>
  </tbody>
  <?php
}
else
  echo "  <tbody>
  <tr><td>ไม่พบข้อมูล ... <br/></td> 
  </tr>
  </tbody>";
  ?>
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
        <h1 class="modal-title" id="modal_create_label">Create Communication Allowance</h1>
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
                                <dt class="col-sm-4 info-box-label">Employee Code : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="period" type="text" data-placement="top" required  class="form-control" placeholder="ระบุพนักงาน" / >      
                                <input name="show_province" type="text" id="show_province" size="50" class="form-control"/>
                                <input name="h_province_id" type="hidden" id="h_province_id" value=""class="form-control" />
 <script type="text/javascript">
function make_autocom(autoObj,showObj){
    var mkAutoObj=autoObj; 
    var mkSerValObj=showObj; 
    new Autocomplete(mkAutoObj, function() {
        this.setValue = function(id) {      
            document.getElementById(mkSerValObj).value = id;
        }
        if ( this.isModified )
            this.setValue("");
        if ( this.value.length < 1 && this.isNotClick ) 
            return ;    
        return "gdata.php?q=" +encodeURIComponent(this.value);
    }); 
}   
// การใช้งาน
// make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");
make_autocom("show_province","h_province_id");
</script>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">CommAllow : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="term" type="number" data-placement="top" required  class="form-control"placeholder="ระบุรอบที่จ่าย" min="1" max="3" maxlength="1"  pattern="\w+"  title="ระบุรหัสผ่านเป็นภาษาอังกฤษ 6 - 10 ตัวอักษร"/>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">Remark : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="paydate" type="date" data-placement="top"  class="form-control"  maxlength="20"/ >      
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

