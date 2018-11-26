<h1>Transportation Cost</h1>
<hr>
<div class="container">
  <div class="row">
    <div class="col-sm">
    <button class="btn btn-success" data-toggle="modal" data-target="#modal_create">Create New</button>
    </div>
    <div class="col-sm" style="text-align: right;">

    <form name="search" method="GET"  action="<?php echo $_SERVER['PHP_SELF'];?>">Search: 
      <input type="hidden" name="page" id="page" class="" placeholder="ค้นหา" size="20" value="1"  /> 
        <input type="text" name="search" id="search" class="" placeholder="ค้นหาค่าเดินทาง" size="20" value="<?php echo $_GET["search"];?>" /> 
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
      <th scope="col">รหัสพนักงาน</th>
      <th scope="col">ชื่อพนักงาน</th>
      <th scope="col">CommCode</th>
      <th scope="col">CommAllow</th>
      <th scope="col" style="text-align: left;">Remark</th>
      <th scope="col" style="text-align: center;">Action</th>
    </tr>
  </thead>

  <?php 
   if($_GET["search"] != ""){
    $start = ($page - 1) * $perpage;
    include "connect.php";
  $sql = "select  tt04_commuteallow. *, 
  tm03_employee.EmplTName
  from tt04_commuteallow 
  JOIN tm03_employee ON tt04_commuteallow.EmplCode = tm03_employee.EmplCode 
  where 
  tm03_employee.EmplCode  like '%".$_GET['search']."%' 
  OR tm03_employee.EmplTName like '%".$_GET['search']."%' 
  OR tt04_commuteallow.CommCode like '%".$_GET['search']."%' 
  OR tt04_commuteallow.CommAllow like '%".$_GET['search']."%' 
  OR tt04_commuteallow.Remark like '%".$_GET['search']."%' 
  ORDER by tt04_commuteallow.auto_increment ASC LIMIT {$start} , {$perpage}";
    //$sql = "SELECT * FROM tm02_deducttype WHERE DeductCode like '%".$_GET['search']."%' OR DeductDesc like '%".$_GET['search']."%' OR DeductTDesc like '%".$_GET['search']."%'  ORDER BY DeductCode ASC  LIMIT {$start} ,$perpage";
    $DATA = mysqli_query($conn, $sql);
    //page
    $sql2 = "select  tt04_commuteallow. *, 
    tm03_employee.EmplTName
    from tt04_commuteallow 
    JOIN tm03_employee ON tt04_commuteallow.EmplCode = tm03_employee.EmplCode 
    where 
    tm03_employee.EmplCode  like '%".$_GET['search']."%' 
    OR tm03_employee.EmplTName like '%".$_GET['search']."%' 
    OR tt04_commuteallow.CommCode like '%".$_GET['search']."%' 
    OR tt04_commuteallow.CommAllow like '%".$_GET['search']."%' 
    OR tt04_commuteallow.Remark like '%".$_GET['search']."%' 
    ORDER by tt04_commuteallow.auto_increment ASC";;
    $query2 = mysqli_query($conn, $sql2);
    $total_record2 = mysqli_num_rows($query2 );
    $total_page = ceil($total_record2 / $perpage);
    //page
    }
  if(mysqli_num_rows($DATA) > 0)
  while ($rows = mysqli_fetch_array($DATA)) {
    $id = $rows['auto_increment'];
    $row1 = $rows['EmplCode'];
    $row2 = $rows['EmplTName'];
    $row3 = $rows['CommCode'];
    $row4 = $rows['CommAllow'];
    $row5 = $rows['Remark'];


  ?>
  <tbody>
    <tr>
      <td><?php echo $row1; ?></td>
      <td><?php echo $row2; ?></td>
      <td><?php echo $row3; ?></td>
      
      <td><?php echo $row4; ?></td>
      <td><?php echo $row5; ?></td>
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
 <a href='communication-allowance.php?page=1&search=<?php echo $_GET["search"] ?>' aria-label="Previous">
 <span aria-hidden="true">&laquo;</span> 
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){

   	if($_GET['page']==$i){ //ถ้าตัวแปล page ตรง กับ เลขที่วนได้
   echo '<li><a class="btn btn-light" href="communication-allowance.php?page='.$i. "&search=" .$_GET["search"].' "><b style=" color: blue;">' .$i.'</b></a></li>';
}else{
      echo '<li><a class="btn btn-light" href="communication-allowance.php?page='.$i ."&search=" .$_GET["search"].' "><b>'. $i.'</b></a></li>';; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
}
 }
   ?>
 <li>
 <a href='communication-allowance.php?page=<?php echo  $total_page;?>&search=<?php echo $_GET["search"] ?>' aria-label="Next">
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
        <h1 class="modal-title" id="modal_create_label">Create  Trasnportation Cost</h1>
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
                                <input name="show_emp_name" type="text" id="show_emp_name"  class="form-control" placeholder="ระบุพนักงาน"/>
                                <input name="EmplCode" type="hidden" id="EmplCode" value=""class="form-control" />
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
        return "autocomplete/employee_autocomplete.php?q=" +encodeURIComponent(this.value);
    }); 
}   
// การใช้งาน
// make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");
make_autocom("show_emp_name","EmplCode");
</script>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">CommAllow : <span class="field-required">*</span></dt>
                                <dd class="col-sm-8 info-box-label">
                                <input name="CommAllow" type="number" data-placement="top" required  class="form-control" min="1"  value="0"/>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">CommCode : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <input type="text" name="CommCode" placeholder="ระบุ CommCode" class="form-control"/>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4 info-box-label">Remark : </dt>
                                <dd class="col-sm-8 info-box-label">
                                <textarea  class="form-control" rows="3" name="Remark" id="Remark" placeholder="ระบุหมายเหตุ"></textarea>
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

