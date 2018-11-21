  <!-- Script Edit-->
  <script>  
  $(document).ready(function(){  
      $('.edit_id').click(function(){  
          var edit_id = $(this).attr("id");  
           $.ajax({  
               url:"template/employee/empaction.php",  
                method:"post",  
                data:{edit_id:edit_id},  
                success:function(data){                    
                     $('#detail').html(data);  
                     $('#editModal').modal({
                        backdrop: 'static',
                        keyboard: false
                    }); 
                     $('#editModal').modal("show");                               
                },
                error: function (jqXHR, exception) {
                    document.write(exception);
                }

           });  
      });  
 }); 
 function reload() {
    location.reload();
}
 </script>
  <!-- Script Edit-->

 <!-- Script Delete-->
 <script>  
  $(document).ready(function(){  
      $('.delete_id').click(function(){  
          var delete_id = $(this).attr("id");  
           $.ajax({  
               url:"template/employee/empaction.php",  
                method:"post",  
                data:{delete_id:delete_id},  
                success:function(data){                    
                     $('#delete_detail').html(data);  
                     $('#deleteModal').modal({
                        backdrop: 'static',
                        keyboard: false
                    }); 
                     $('#deleteModal').modal("show");                               
                },
                error: function (jqXHR, exception) {
                    document.write(exception);
                }

           });  
      });  
 }); 
 function reload() {
    location.reload();
}
 </script>
  <!-- Script Delete-->

  <script>
  function PF_Flag_function() {
    var provident_fund_checkbox = document.getElementById("PF_Flag");
    var PF_MemNo = document.getElementById("PF_MemNo");
    var PF_EnterDate = document.getElementById("PF_EnterDate");
    var PF_E_Rate = document.getElementById("PF_E_Rate");
    if (provident_fund_checkbox.checked == true){
        PF_MemNo.disabled = "";
        PF_EnterDate.disabled = "";
        PF_E_Rate.disabled = "";

    } else {
        PF_MemNo.disabled = "disabled";
        PF_EnterDate.disabled = "disabled";
        PF_E_Rate.disabled = "disabled";
        // PF_MemNo.value = "";
        // PF_EnterDate.value = "";
        // PF_E_Rate.value = "";
    }
}
function SP_Moth_Red_F_function() {
    var SP_Moth_Red_F = document.getElementById("SP_Moth_Red_F");
    var SP_Moth_ID = document.getElementById("SP_Moth_ID");
    if (SP_Moth_Red_F.checked == true){
        SP_Moth_ID.disabled = "";
    } else {
        SP_Moth_ID.disabled = "disabled";
        // PF_MemNo.value = "";
        // PF_EnterDate.value = "";
        // PF_E_Rate.value = "";
    }
}
function SP_Fath_Red_F_function() {
    var SP_Fath_Red_F = document.getElementById("SP_Fath_Red_F");
    var SP_Fath_ID = document.getElementById("SP_Fath_ID");
    if (SP_Fath_Red_F.checked == true){
        SP_Fath_ID.disabled = "";
    } else {
        SP_Fath_ID.disabled = "disabled";
        // PF_MemNo.value = "";
        // PF_EnterDate.value = "";
        // PF_E_Rate.value = "";
    }
}

  </script>