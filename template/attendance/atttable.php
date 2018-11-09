
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<h1>Leave Type</h1>
<hr>
<div class="container">
  <div class="row">
    <div class="col-sm">
    <button class="btn btn-success" data-toggle="modal" data-target="#modal_create">Create New</button>
    </div>
    <div class="col-sm" style="text-align: right;">
    <form name="search" method="get"  action="<?php echo $_SERVER['PHP_SELF'];?>">Search: 
      <input type="hidden" name="page" id="page" class="" placeholder="ค้นหา" size="20" value="1"  /> 
        <input type="text" name="search" id="search" class="" placeholder="ค้นหา" size="20" value="<?php echo $_GET["search"];?>" /> 
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
      <th scope="col">รหัสการลา</th>
      <th scope="col">คำอธิบาย(ENG)</th>
      <th scope="col">คำอธิบาย(ไทย)</th>
      <th scope="col">อัตราหัก</th>
      <th scope="col">Deduct Flag</th>
      <th scope="col" style="text-align: center;">Action</th>
    </tr>
  </thead>

  <?php 
if($_GET["search"] != ""){
  $sql = "SELECT * FROM tm02_attncode WHERE AttnCode like '%".$_GET['search']."%' OR AttnEDesc like '%".$_GET['search']."%' OR AttnTDesc like '%".$_GET['search']."%'  ORDER BY AttnCode ASC  LIMIT {$start} ,$perpage";
  $DATA = mysqli_query($conn, $sql);
  //page
  $sql2 = "SELECT * FROM tm02_attncode WHERE AttnCode like '%".$_GET['search']."%' OR AttnEDesc like '%".$_GET['search']."%' OR AttnTDesc like '%".$_GET['search']."%' ";
  $query2 = mysqli_query($conn, $sql2);
  $total_record2 = mysqli_num_rows($query2 );
  $total_page = ceil($total_record2 / $perpage);
  //page
  }
  if(mysqli_num_rows($DATA) > 0)
  while ($rows = mysqli_fetch_array($DATA)) {
    $id = $rows['AttnCode'];
    $row1 = $rows['AttnEDesc'];
    $row2 = $rows['AttnTDesc'];
    $row3 = $rows['Ded_Rate'];
    $row4 = $rows['Ded_Flag'];
    if( $row4 == "1"){
      $row4 = "<p style='color :green; font-weight: 800;'>✓</p>";
    }
    else{
      $row4 = "<p style='color :red;'>✘</p>";
    }
  ?>
  <tbody>
    <tr>
      <td style="text-align: center;"><?php echo $id; ?></td>
      <td><?php echo $row1; ?></td>
      <td><?php echo $row2; ?></td>
      <td style="text-align: center;"><?php echo $row3; ?></td>
      <td style="text-align: center;"><?php echo $row4; ?></td>
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
 <a href="attendance.php?page=1&search=<?php echo $_GET["search"] ?>" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span> 
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){
   	if($_GET['page']==$i){ //ถ้าตัวแปล page ตรง กับ เลขที่วนได้
   echo '<li><a class="btn btn-light" href="attendance.php?page='.$i. "&search=" .$_GET["search"].' "><b style=" color: blue;">' .$i.'</b></a></li>';
}else{
      echo '<li><a class="btn btn-light" href="attendance.php?page='.$i ."&search=" .$_GET["search"].' "><b>'. $i.'</b></a></li>';; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
}
 }
   ?>
 <li>
 <a href='attendance.php?page=<?php echo  $total_page;?>&search=<?php echo $_GET["search"] ?>' aria-label="Next">
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
  <div class="modal-dialog" style="max-width: 700px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="modal_create_label">Create Leave Type</h1>
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
            <dt class="col-sm-4 info-box-label">รหัสการลา : <span class="field-required">*</span></dt>
            <dd class="col-sm-5 info-box-label">
            <input name="AttnCode" type="text" data-placement="top" required  class="form-control" maxlength="5"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">คำอธิบาย(ENG) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="AttnEDesc" type="text" data-placement="top" required  class="form-control" maxlength="50"  />
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">คำอธิบาย(TH) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="AttnTDesc" type="text" data-placement="top"  required  class="form-control"  maxlength="50"/>      
            </dd>
          </dl>
        </div>

				<div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">อัตราหัก : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="Ded_Rate" type="number" data-placement="top"  class="form-control"  min="0" maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Deduct Flag : </dt>
            <dd class="col-sm-8 ">
            <div class="material-switch pull-right">
               <input id="Ded_Flag" name="Ded_Flag" type="checkbox" value="1"/>
                <label for="Ded_Flag" class="label-success"></label>
            </div>
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

        

