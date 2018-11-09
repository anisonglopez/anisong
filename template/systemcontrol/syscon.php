
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<h1>Prepare for Monthly Closing</h1>
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
      <th scope="col">Period</th>
      <th scope="col">Trem</th>
      <th scope="col">Emp Type</th>
      <th scope="col">Salary Date from</th>
      <th scope="col">Salary Date to</th>
      <th scope="col">Payment Date</th>
      <th scope="col" style="text-align: center;">Action</th>
    </tr>
  </thead>

  <?php 
  if(mysqli_num_rows($DATA) > 0)
  while ($rows = mysqli_fetch_array($DATA)) {
    $id = $rows['auto_increment'];
    $row1 = $rows['Period'];
    $row2 = $rows['Term'];
    $row3 = $rows['EmplType'];
    $row4 = $rows['FmAttnDate'];
    $row5 = $rows['ToAttnDate'];
    $row6 = $rows['PayDate'];
    if( $row3 == "D"){
      $row3 = "รายวัน";
    }
    else{
      $row3 = "รายเดือน";
    }
  ?>
  <tbody>
    <tr>
      <td><?php echo $row1; ?></td>
      <td style="text-align: center;"><?php echo $row2; ?></td>
      <td style="text-align: center;"><?php echo $row3; ?></td>
      <td style="text-align: center;"><?php echo date("d/m/Y", strtotime($row4));?></td>
      <td style="text-align: center;"><?php echo date("d/m/Y", strtotime($row5)); ?></td>
      <td style="text-align: center;"><?php echo date("d/m/Y", strtotime($row6));?></td>
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
 <?php for($i=1;$i<=$total_page;$i++){
   	if($_GET['page']==$i){ //ถ้าตัวแปล page ตรง กับ เลขที่วนได้
   echo '<li><a class="btn btn-light" href="systemcontrol.php?page='.$i. "&search=" .$_GET["search"].' "><b style=" color: blue;">' .$i.'</b></a></li>';
}else{
      echo '<li><a class="btn btn-light" href="systemcontrol.php?page='.$i ."&search=" .$_GET["search"].' "><b>'. $i.'</b></a></li>';; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
}
 }
   ?>
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
                                <option value="D">รายวัน</option>
                                <option value="M">รายเดือน</option>
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

        

