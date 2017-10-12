
<script type="text/javascript">



    function fnAllowNumeric(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {

              return false;
            }
            return true;
          }


         window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 4000);

   $('body').on('click', '.update_status', function() {
      ids=$(this).attr('data-val');
      $('#modal_saleid').val(ids);
     
   });
 </script>

 <script type="text/javascript">
  $("#payout_submit").click(function(event){
    alert('okae');
    event.preventDefault();
      // form=$('#products_add_form');
      // if(! form.valid()){
      // }else{
        //var s=$('#'+form).serialize();

   
        $.ajax({  
         type: "POST",  
         url: "{{URL::to('products-add-submit')}}",
         data : $('#products_add_form').serialize(),
         success: function(msg){
         
          
          

        }  
      }); 
      // }

    });


</script>