  <!-- Script Edit-->
  <script>  
  $(document).ready(function(){  
      $('.edit_id').click(function(){  
          var edit_id = $(this).attr("id");  
           $.ajax({  
               url:"template/bank/bankaction.php",  
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
               url:"template/bank/bankaction.php",  
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