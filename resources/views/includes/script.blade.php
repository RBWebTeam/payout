
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

var array=[];
  $(document).ready(function(){
    
    $.ajax({ 
    url: "{{URL::to('dashboard-pie-chart')}}",
    method:"GET",
   success: function(msg)  
   {
   
    console.log(msg);
 
var obj_status = new Array();
 $.each(msg, function( key, value ){
    var temp_status ={"statusname": value.statusname,"value": value.statuscnt, "url": "{{URL::to('pending-page')}}/"+value.statusid,};
        obj_status.push(temp_status);  
 });

  var chart = AmCharts.makeChart( "chartdiv", {
  "type": "pie",
  "theme": "light",
   "urlField": "url",
  "dataProvider":obj_status,
  "valueField": "value",
  "titleField": "statusname",
  "outlineAlpha": 0.4,
  "depth3D": 15,
  "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
  "angle": 30,
  "export": {
    "enabled": true
  }
} );
    
    
   }

 });


});



//]]>   
</script>
