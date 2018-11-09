
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<h1>Deduct Type</h1>
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
     <!-- <th scope="col">Deduct Type No</th>-->
      <th scope="col">Description (EN)</th>
      <th scope="col">Description (TH)</th>
      <th scope="col" colspan="5">Amount</th>
      <th scope="col">Tax</th>
      <th scope="col" style="text-align: center;">Action</th>
    </tr>
  </thead>

  <?php 
  if($_GET["search"] != ""){
    $sql = "SELECT * FROM tm02_deducttype WHERE DeductCode like '%".$_GET['search']."%' OR DeductDesc like '%".$_GET['search']."%' OR DeductTDesc like '%".$_GET['search']."%'  ORDER BY DeductCode ASC  LIMIT {$start} ,$perpage";
    $DATA = mysqli_query($conn, $sql);
    //page
    $sql2 = "SELECT * FROM tm02_deducttype WHERE DeductCode like '%".$_GET['search']."%' OR DeductDesc like '%".$_GET['search']."%' OR DeductTDesc like '%".$_GET['search']."%' ";
    $query2 = mysqli_query($conn, $sql2);
    $total_record2 = mysqli_num_rows($query2 );
    $total_page = ceil($total_record2 / $perpage);
    //page
    }
  if(mysqli_num_rows($DATA) > 0)
  while ($rows = mysqli_fetch_array($DATA)) {
    $id = $rows['DeductCode'];
    $row1 = $rows['DeductDesc'];
    $row2 = $rows['DeductTDesc'];
    $row3 = $rows['DeductAmt'];
    $row4 = $rows['DeductAmt2'];
    $row5 = $rows['DeductAmt3'];
    $row6 = $rows['DeductAmt4'];
    $row7 = $rows['DeductAmt5'];
    $row8 = $rows['TaxCalFlag'];
    if( $row8 == "1"){
      $row8 = "<p style='color :green; font-weight: 800;'>✓</p>";
    }
    else{
      $row8 = "<p style='color :red;'>✘</p>";
    }
  ?>
  <tbody>
    <tr>
      <!--<td style="text-align: center;"><?php echo $id; ?></td>-->
      <td><?php echo $row1; ?></td>
      <td><?php echo $row2; ?></td>
      <td style="text-align: center;"><?php echo $row3; ?></td>
      <td style="text-align: center;"><?php echo $row4; ?></td>
      <td style="text-align: center;"><?php echo $row5; ?></td>
      <td style="text-align: center;"><?php echo $row6; ?></td>
      <td style="text-align: center;"><?php echo $row7; ?></td>
      <td style="text-align: center;"><?php echo $row8; ?></td>
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
 <a href='deducttype.php?page=1&search=<?php echo $_GET["search"] ?>' aria-label="Previous">
 <span aria-hidden="true">&laquo;</span> 
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){
   	if($_GET['page']==$i){ //ถ้าตัวแปล page ตรง กับ เลขที่วนได้
   echo '<li><a class="btn btn-light" href="deducttype.php?page='.$i. "&search=" .$_GET["search"].' "><b style=" color: blue;">' .$i.'</b></a></li>';
}else{
      echo '<li><a class="btn btn-light" href="deducttype.php?page='.$i ."&search=" .$_GET["search"].' "><b>'. $i.'</b></a></li>';; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
}
 }
   ?>
 <li>
 <a href='deducttype.php?page=<?php echo  $total_page;?>&search=<?php echo $_GET["search"] ?>' aria-label="Next">
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
        <h1 class="modal-title" id="modal_create_label">Create Deduct Type</h1>
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
            <dt class="col-sm-4 info-box-label">Description (EN) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="DeductDesc" type="text" data-placement="top" required  class="form-control" maxlength="20"  />
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Description (TH) : <span class="field-required">*</span></dt>
            <dd class="col-sm-8 info-box-label">
            <input name="DeductTDesc" type="text" data-placement="top"  required  class="form-control"  maxlength="20"/>      
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Amount_1 : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="DeductAmt" type="number" data-placement="top"  class="form-control"  min="0" required  value="0" maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Amount_2 : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="DeductAmt2" type="number" data-placement="top"  class="form-control"  min="0" required  value="0" maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Amount_3 : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="DeductAmt3" type="number" data-placement="top"  class="form-control"  min="0" required  value="0" maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Amount_4 : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="DeductAmt4" type="number" data-placement="top"  class="form-control"  min="0" required  value="0" maxlength="20"/>   
            </dd>
          </dl>
        </div>
        <div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Amount_5 : </dt>
            <dd class="col-sm-4 info-box-label">
						<input name="DeductAmt5" type="number" data-placement="top"  class="form-control"  min="0" required  value="0" maxlength="20"/>   
            </dd>
          </dl>
        </div>
				<div class="col-md-12">
          <dl class="row">
            <dt class="col-sm-4 info-box-label">Tax Calculate Flag : </dt>
            <dd class="col-sm-4">
            <div class="material-switch pull-right">
               <input id="TaxCalFlag" name="TaxCalFlag" type="checkbox" value="1"/>
                <label for="TaxCalFlag" class="label-success"></label>
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

        

