<link rel="stylesheet" href="dependencies/bootstrap-4.1.3-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="dependencies/css/custom-main.css">
<h1>ข้อมูลประเภทการลา</h1>
<hr>
<div class="container">
  <div class="row">
    <div class="col-sm">
    <button class="btn btn-success" data-toggle="modal" data-target="#modal_add">Create New</button>
    </div>
    <div class="col-sm" style="text-align: right;">
    <form action="" method="post">
<input type="hidden" name="direct" value="true" />
Search: <input type="text" name="domain" size="20" /> 
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
      <th scope="col">รหัสรายได้</th>
      <th scope="col">ชื่อรายได้(EN)</th>
      <th scope="col">ชื่อรายได้(TH)</th>
      <th scope="col">จำนวนเงินรายได้</th>
      <th scope="col">นำไปคำนวนภาษีภาษี</th>
      <th scope="col">SysUserID</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php while ($rows = mysql_fetch_array($DATA)) {
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
      <td><button type="button" class="btn btn-outline-warning" onClick="dataList.editData($('#form_user').serializeArray())">Edit</button>| 
      <a href="#" onclick="dialog('<?php echo $OthINCCode;?>');" class="btn btn-outline-danger">Delete</a></td>
    </tr>
  </tbody>
<?php
}
  ?>
</table>
<p> Show:
<select>
  <option value="10">10</option>
  <option value="25">25</option>
  <option value="50">50</option>
  <option value="100">100</option>
</select>
entries
</p>
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="adduserModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 600px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="adduserModalLabel">เพิ่มข้อมูลรายได้อื่นๆ</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal col-sm-12" name="create" method="post"  action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <input type="hidden" name="create"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
      <div class="modal-body">
          <table class="table table-bordered">
      <tr>  
                <td width="30%" align="right"><label>รหัสรายได้</label></td>  
                <td width="70%"><input name="othinccode" type="text" data-placement="top" required  class="form-control"/></td> 
            </tr> 
           <tr>
                <td width="30%" align="right"><label>ชื่อรายได้(EN)</label></td>
                <td width="70%"> <input name="othincedesc" type="text" data-placement="top" required  class="form-control"/></td> 
            </tr>  
            <tr>
                <td width="30%" align="right"><label>ชื่อรายได้(TH)</label></td>
                <td width="70%"><input name="othinctdesc" type="text"  class="form-control"/></td> 
            </tr> 
            <tr>
                <td width="30%" align="right"><label>จำนวนเงินรายได้</label></td>
                <td width="70%"><input name="othincamt" type="text"  class="form-control"/></td>  
            </tr> 
            <tr>
                <td width="30%" align="right"><label>นำไปคำนวนภาษี</label></td>
                <td width="70%"><input name="taxcalflag" type="text" class="form-control"/></td> 
            </tr> 
            </table>

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="modal_adduser_submit_btn">Save</button>
      </div>
      
      </form>
    </div>
  </div>
</div>
<?php echo $result ?>

<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 600px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="editModalLabel">เพิ่มข้อมูลรายได้อื่นๆ</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal col-sm-12" name="edit" method="post"  action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <input type="hidden" name="create"/>
      <input type="hidden" name="user_login" value="<?php echo $_SESSION['UserID']; ?>" />
      <div class="modal-body">
          <table class="table table-bordered">
      <tr>  
                <td width="30%" align="right"><label>รหัสรายได้</label></td>  
                <td width="70%"><input name="othinccode" type="text" data-placement="top" required  class="form-control"/></td> 
            </tr> 
           <tr>
                <td width="30%" align="right"><label>ชื่อรายได้(EN)</label></td>
                <td width="70%"> <input name="othincedesc" type="text" data-placement="top" required  class="form-control"/></td> 
            </tr>  
            <tr>
                <td width="30%" align="right"><label>ชื่อรายได้(TH)</label></td>
                <td width="70%"><input name="othinctdesc" type="text"  class="form-control"/></td> 
            </tr> 
            <tr>
                <td width="30%" align="right"><label>จำนวนเงินรายได้</label></td>
                <td width="70%"><input name="othincamt" type="text"  class="form-control"/></td>  
            </tr> 
            <tr>
                <td width="30%" align="right"><label>นำไปคำนวนภาษี</label></td>
                <td width="70%"><input name="taxcalflag" type="text" class="form-control"/></td> 
            </tr> 
            </table>

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="modal_adduser_submit_btn">Save</button>
      </div>
      
      </form>
    </div>
  </div>
</div>

<script>
function dialog(id){
			//alert("จะลบฉันเหรอ..." + id);
			var c = confirm("ยืนยันการลบข้อมูล รหัสรายได้" + id)
			if(c==true){//ถ้ากด ok จะลบข้อมูล
				window.location.href="template/otherinc/other_del.php?id="+ id;
			}else{
				alert("ไม่ได้ลบข้อมูล id=" + id);
			}
		}
</script>


<script type="text/javascript">
var dataList = {}
$(function(){
	/*dataList.getItem = function(chk_user_id){
		return $.post("jsondata.php",{
			action:"item",
			chk_user_id:chk_user_id	
		},function(response){
			if(response != null){
				return response;
			}
			return response;
		});		
	}*/
	/*dataList.delItem = function(del_user_id){
		if(confirm("Confirm delete this item?")){
			$.post("jsondata.php",{
				action:"delete",
				del_user_id:del_user_id	
			},function(response){
				if(response != null){
					if(response[0].error!=null || response[0].success!=null){
						var statusText = (response[0].error!=null)?response[0].error:response[0].success;
						alert(statusText);			
					}
					if(response[0].success!=null){
						var indexObj = $(".pagination").find("li.active").index();
						var numDelete = $(".btn-delete").length;
						if(indexObj>1 && numDelete>1){					
							dataList.getList(indexObj-1,null);
						}else{
							dataList.getList(0,true);
						}
					}
				}
			});		
		}
	}	*/
	dataList.editData = function(dataSend){
		dataSend.push({
			name:"action",
			value:"edit"
		});		
		$.post("template/otherinc/Other_edit.php",dataSend,function(response){
			console.log(response);
			if(response != null){		
				if(response[0].error!=null || response[0].success!=null){
					var statusText = (response[0].error!=null)?response[0].error:response[0].success;
					$('#exampleModal').modal('toggle')
//					alert(statusText);					
				}
				if(response[0].success!=null){
					var indexObj = $(".pagination").find("li.active").index();
					if(indexObj>0){					
						dataList.getList(indexObj-1,null);
					}					
				}
			}
		});		
	}
	/*dataList.addData = function(dataSend){
		dataSend.push({
			name:"action",
			value:"add"
		});
		$.post("jsondata.php",dataSend,function(response){
			if(response != null){		
				if(response[0].error!=null || response[0].success!=null){
					var statusText = (response[0].error!=null)?response[0].error:response[0].success;
					$('#exampleModal').modal('toggle')
//					alert(statusText);					
				}
				if(response[0].success!=null){
					$('#form_user')[0].reset();
					dataList.getList(0,true);
				}
			}
		});
	}*/
	/*dataList.getList = function(s_page,show_page){
		var haveData = null;
		$.post("jsondata.php",{
			action:'list',
			page:s_page
		},function(response){
			if(response != null && response.data.length > 0){
				$(".pagination").removeClass("hidden");
				$(".show-list-data").removeClass("hidden");						
				var rowData = $(".list-data").clone(true);
				$(".show-list-data").html("");
				var rowListData = "";
				$.each(response.data,function( i , v ){
					rowListData = "";
					rowListData+="<tr class=\"list-data\">";
					rowListData+=$(rowData.find("td:eq(0)").text(response.data[i].item_id).end()
					.find("td:eq(1)").text(response.data[i].mem_user).end()
					.find("td:eq(2)").text(response.data[i].mem_fullname).end()
					.find("td:eq(3)").text(response.data[i].mem_type).end()
					.find("td:eq(4) > button").attr("data-user-id",response.data[i].mem_id).end()
					.find("td:eq(5) > button").attr("data-user-id",response.data[i].mem_id).end()).html();	
					rowListData+="</tr>";
					$(".show-list-data").append(rowListData);
				}); // end loop				

				$(".btn-delete").on("click",function(){
					var del_user_id = $(this).data('user-id') // 
					dataList.delItem(del_user_id);
				});		

				if(show_page==true){
					$(".pagination").find("li:first").unbind("click");
					$(".pagination").find("li:last").unbind("click");
					var rowPage = $('<li><a href="javascript:void(0);"></a></li>');
					$(".pagination").find("li:not(:first):not(:last)").remove();
					$(".pagination").find("li").removeClass("active");
					var rowListPage = "";
					for(i = 1; i <= response.allpage; i++){
						rowListPage+="<li>";
						rowListPage+=$(rowPage.find("a").text(i).end()
						.find("a").attr("href","javascript:dataList.getList('"+(i-1)+"',null)").end()).html();		
						rowListPage+="</li>";
						if(i == response.allpage && rowListPage !=""){
							$(".pagination").find("li:eq(0)").after(rowListPage);
							$(".pagination").find("li:eq(1)").addClass("active");
							$(".pagination").find("li:not(':first'):not(':last')").on("click",function(){
								$(".pagination").find("li").removeClass("active");
								$(this).addClass("active");
							});			
							$(".pagination").find("li:first").on("click",function(){
								var indexObj = $(".pagination").find("li.active").prev("li").index();
								if(indexObj>0){					
									$(".pagination").find("li.active").prev("li").triggerHandler("click");
									dataList.getList(indexObj-1,null);
								}
							});
							$(".pagination").find("li:last").on("click",function(){
								var indexObj = $(".pagination").find("li.active").next("li").index();
								if(indexObj<=response.allpage){					
									$(".pagination").find("li.active").next("li").triggerHandler("click");
									dataList.getList(indexObj-1,null);
								}
							});													
						}				
					}
				}
			}
			
		});	
		if(haveData==null){
			$(".show-list-data").addClass("hidden");
			$(".pagination").addClass("hidden");		
		}
	}
	dataList.getList(0,true);*/
	

	$('#exampleModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var chk_user_id = button.data('user-id') // 
		if(chk_user_id!=null){
			var modal = $(this);
			dataList.getItem(chk_user_id).done(function(res){
				if(res != null && res.data.length > 0){
					modal.find('.modal-title').text("Edit User");
					modal.find("#user-id").val(res.data[0].mem_id);
					modal.find("#user-name").val(res.data[0].mem_user);
					modal.find("#user-pass").val(res.data[0].mem_pass);
					modal.find("#user-fullname").val(res.data[0].mem_fullname);
					modal.find("#user-type").val(res.data[0].mem_type);
					modal.find(".btn-add").addClass("hidden");
					modal.find(".btn-edit").removeClass("hidden");		  
				} 
			});		  
		}
	});
	
	$('#exampleModal').on('hide.bs.modal', function (event) {
		$('#form_user')[0].reset();				
		var modal = $(this);
		modal.find(".modal-title").text("New User");
		modal.find(".btn-edit").addClass("hidden");
		modal.find(".btn-add").removeClass("hidden");		
	});
	
});
</script>
