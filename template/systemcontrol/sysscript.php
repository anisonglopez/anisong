<script>  
  $(document).ready(function(){  
      $('.edit_id').click(function(){  
          var edit_id = $(this).attr("id");  
           $.ajax({  
               url:"template/systemcontrol/sysconaction.php",  
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