
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<h1>Department</h1>
<hr>
<div class="container">
  <div class="row">
    <div class="col-sm">
    <button class="btn btn-success" data-toggle="modal" data-target="#modal_create">Create New</button>
    </div>
    <div class="col-sm" style="text-align: right;">
    <form name="search" method="GET"  action="<?php echo $_SERVER['PHP_SELF'];?>">Search: 
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
      <th scope="col">Dep No</th>
      <th scope="col">Description (EN)</th>
      <th scope="col">Description (TH)</th>
      <th scope="col" style="text-align: center;">Action</th>
    </tr>
  </thead>

  <?php 
  if($_GET["search"] != ""){
    $sql = "SELECT * FROM tm02_department WHERE DeptCode like '%".$_GET['search']."%' OR DeptEDesc like '%".$_GET['search']."%' OR DeptTDesc like '%".$_GET['search']."%'  ORDER BY DeptCode ASC  LIMIT {$start} ,$perpage";
    $DATA = mysqli_query($conn, $sql);
    //page
    $sql2 = "SELECT * FROM tm02_department WHERE DeptCode like '%".$_GET['search']."%' OR DeptEDesc like '%".$_GET['search']."%' OR DeptTDesc like '%".$_GET['search']."%'  ";
    $query2 = mysqli_query($conn, $sql2);
    $total_record2 = mysqli_num_rows($query2 );
    $total_page = ceil($total_record2 / $perpage);
    //page
    }

  if(mysqli_num_rows($DATA) > 0)
  while ($rows = mysqli_fetch_array($DATA)) {
    $id = $rows['DeptCode'];
    $row1 = $rows['DeptEDesc'];
    $row2 = $rows['DeptTDesc'];
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
  <?php } 
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
 <a href='department.php?page=1&search=<?php echo $_GET["search"] ?>' aria-label="Previous">
 <span aria-hidden="true">&laquo;</span> 
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){
   	if($_GET['page']==$i){ //ถ้าตัวแปล page ตรง กับ เลขที่วนได้
   echo '<li><a class="btn btn-light" href="department.php?page='.$i. "&search=" .$_GET["search"].' "><b style=" color: blue;">' .$i.'</b></a></li>';
}else{
      echo '<li><a class="btn btn-light" href="department.php?page='.$i ."&search=" .$_GET["search"].' "><b>'. $i.'</b></a></li>';; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
}
 }
   ?>
 <li>
 <a href='department.php?page=<?php echo  $total_page;?>&search=<?php echo $_GET["search"] ?>' aria-label="Next">
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
        <h1 class="modal-title" id="modal_create_label">Create Department</h1>
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
            <dt class="col-sm-4 info-box-label">Department No : <span class="field-required">*</span></dt>
            <dd class="col-sm-4 info-box-label">
            <input name="DeptCode" type="text" data-placement="top" required  class="form-control" maxlength="5"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Description (ENG) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="DeptEDesc" type="text" data-placement="top" required  class="form-control" maxlength="100"  />
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Description (TH) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="DeptTDesc" type="text" data-placement="top"  required class="form-control"  maxlength="100"/>      
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

        

