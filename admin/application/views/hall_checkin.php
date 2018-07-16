<!-- START BREADCRUMB -->
<ul class="breadcrumb">
<li><a href="#">Home</a></li>
<li class="active">Check IN</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE TITLE -->
<div class="page-title">                    
<h2><span class="fa fa-arrow-circle-o-left"></span> Check IN</h2>
</div>
<!-- END PAGE TITLE -->                

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

<div class="row">
<div class="col-md-10">    

<!-- START JQUERY VALIDATION PLUGIN -->
<div class="block" style="margin-bottom: -19px;">
<form id="jvalidate"  class="form-horizontal" method="post">
<div class="panel-body" style="padding: 0px;">                                    
<div class="form-group">
<label class="col-md-2 control-label">Reservation Number:</label>  
<div class="col-md-4">
<input type="text" style="text-transform: uppercase;" class="form-control" name="pnrnumber"/>

</div>


                                        
<div class="col-md-4">
<button class="btn btn-primary load" id="checkpnr" type="submit">Submit</button>
<div id="loading" style="text-align: center; font-weight: bold; color: red; font-size: 20px;display:none;">Processing...</div>
                  
</div>

</div>

<div class="btn-group">

</div>                                                                                                                          
</div>                                               
</form>
<!-- END JQUERY VALIDATION PLUGIN -->
</div>
</div>
</div>

<div class="result"></div>


</div>
<!-- END PAGE CONTENT WRAPPER -->                
</div>            
<!-- END PAGE CONTENT -->
</div>




<div class = "modal fade" id = "myModal1" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                    <img class="" id="" src="<?php echo base_url();?>assests/img/logo.png">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
               ×
            </button>
                </div>

                

                </div>
                <div class="col-md-12" style="margin-top: 16px;">
                </div>
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                      
                   
                   
                        <div class="modal-body">
                        
           <form id="form_2"  method="post" action="<?php echo  base_url();?>hallbooking/checkinhalls" onsubmit="setTimeout(function () { location.href = '<?php echo base_url();?>dashboard'; })" target="_blank">   
                           
                            <div class="row">
        <div class="col-md-12" style="margin-bottom: 10px; font-weight: bold;">
        <div  class="col-md-3" style="text-align: right;">
        Date : 
        </div>
        <div  class="col-md-3">
        <?php echo date('d-m-Y');?>
        </div> 
        <div  class="col-md-3" style="text-align: right;">     
        Time :
        </div>
        <div  class="col-md-3">
        <div id="times"></div>
        </div>
        </div>
         <div class="col-md-12" style="font-weight: bold;">
        <div  class="col-md-3" style="text-align: right;">
       Hall Type : 
        </div>
        <div  class="col-md-3">
        <div class="halltype"></div>
        </div> 

        <div  class="col-md-3" style="text-align: right;">
        Slot : 
        </div>
        <div  class="col-md-3">
        <div class="slot"></div>
        </div> 
        
         </div>

       
       

       <input type="hidden" id="hide" value="1" />  

       
      <input type="hidden" id="" class="form-control" placeholder="From" value="<?php echo date('Y-m-d');?>" name="checkindate"  />
       
      <input type="hidden" id="time" class="form-control" placeholder="time" value="" name="checkintime"  />

      <input type="hidden" id="pnrnumber" class="form-control" placeholder="time" value="" name="pnrnumber"  />

             
                        </div>
                        <div class="modal-footer" >
                         <div class="col-md-6">
                                <button type="button" class="btn btn-danger btn-lg btn-block" data-dismiss="modal" aria-label="Close">No</button>
                            </div>
                         <div class="col-md-6">
                                <button type="submit" class="btn btn-success btn-lg btn-block">Yes</button>
                            </div>

                                                        
                        </div>
                    </form>
                    <!-- End | Register Form -->
                    
                </div>
                <!-- End # DIV Form -->
                
            </div>
        </div>
   
</div><!-- /.modal -->








 <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/bootstrap/bootstrap.min.js"></script>

<!-- THIS PAGE PLUGINS -->
<script type='text/javascript' src='<?php echo base_url();?>assests/js/plugins/icheck/icheck.min.js'></script>

<script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

<script type='text/javascript' src='<?php echo base_url();?>assests/js/plugins/bootstrap/bootstrap-datepicker.js'></script>

<script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/bootstrap/bootstrap-timepicker.min.js"></script> 

<script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/bootstrap/bootstrap-colorpicker.js"></script>

<script type='text/javascript' src='<?php echo base_url();?>assests/js/plugins/bootstrap/bootstrap-select.js'></script> 

<script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/bootstrap/bootstrap-file-input.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>       

<script type='text/javascript' src='<?php echo base_url();?>assests/js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>

<script type='text/javascript' src='<?php echo base_url();?>assests/js/plugins/validationengine/jquery.validationEngine.js'></script>        

<script type='text/javascript' src='<?php echo base_url();?>assests/js/plugins/jquery-validation/jquery.validate.js'></script>                

<script type='text/javascript' src='<?php echo base_url();?>assests/js/plugins/maskedinput/jquery.maskedinput.min.js'></script>
<!-- END THIS PAGE PLUGINS -->  

     
<script type="text/javascript">
var jvalidate = $("#jvalidate").validate({
ignore: [],
rules: {                                            
pnrnumber:'required',

},
messages: { 
pnrnumber:"Please enter PNR Number",
}
}); 

 $("#jvalidate").submit(function(){

if( $("#jvalidate").valid())
{

		dataString = $("#jvalidate").serialize();

      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>hall_checkin/searchpnrnumber",
        data: dataString,

          beforeSend: function(data){

                $('#loading').show();
                $('.load').hide();
              },

                success: function(data){

        $('#loading').hide();
                    $('.load').show();
         $('.result').html(data); 

        }

        });

        return false;  //stop the actual form post !important!



}


}); 


                               

</script>


<script type="text/javascript">
  function modals()
  {
    $("#myModal1").modal("show");

    var a=$('#row1').val();//halltypeid
    var b=$('#row2').val();//checkindate
    var c=$('#row3').val();//halltype
    var d=$('#row4').val();//slot
    var e=$('#row5').val();//pnrnumber
    var f=$('#row6').val();//hallamount

    $('#pnrnumber').val(e);
    $('.halltype').html(c);
    $('.slot').html(d);
    $('.hallamount').html(f);
    $('#hallamount').val(f);
    $('.totalamount').html(f);
    $('#totalamount').val(f);
    



  }
</script>

<script type="text/javascript">

  $(document).ready(function(){





    $('.add').click(function(){



      var start=$('#hide').val();



      var total=Number(start)+1;

      $('#hide').val(total);

      var tbody=$('#append');

      $('<tr><td style="width: 564px; padding: 0px 10px ! important;"><select class="form-control" name="features[]" id="features'+total+'"><option value="">Other Faclities</option><option value="LCD Projector with screen">LCD Projector with screen</option><option value="OHP Projector with screen">OHP Projector with screen</option><option value="PA system with 4 microphones">PA system with 4 microphones</option><option value="PA system with 2 microphones & 1 wireless">PA system with 2 microphones & 1 wireless</option><option value="Large PA system">Large PA system</option><option value="Karaoke set">Karaoke set</option><option value="Disco Music with Lighting & DJ">Disco Music with Lighting & DJ</option><option value="Use of Business Center">Use of Business Center</option><option value="Badminton Hall">Badminton Hall</option></select></td><td style="width: 130px; padding: 0px 10px ! important;"><input type="text" id="rate'+total+'" class="form-control" placeholder="Rates" name="rate[]" /></td><td style="padding-bottom: 10px; padding-right: 20px; width: 200px;"><span id="hrs'+total+'">/every 4 hours</span></td><td style="padding-bottom: 10px; padding-right: 20px;"><button type="button" class="btn btn-danger btn-sm remove">-</button></td><td>&nbsp;</td></tr>').appendTo(tbody);

        var sub_tot=0;
       
       $('input[name^="rate"]').each(function(){
         var hallamount=$('#hallamount').val();
         $('#advanceamount').val('');

              sub_tot +=Number($(this).val());          
              var fina=sub_tot.toFixed(2);         
              $('#amount').val(fina);
               $('.amount').html(fina);

               var fin=parseFloat(fina)+parseFloat(hallamount);
               var fins=fin.toFixed(2);
               $('#totalamount').val(fins);
               $('.totalamount').html(fins);
              
              });



      $('.remove').click(function(){     
              $(this).parents('tr').remove(); 
                    var sub_tot=0;
       
       $('input[name^="rate"]').each(function(){
          var hallamount=$('#hallamount').val();
          $('#advanceamount').val('');

              sub_tot +=Number($(this).val());          
              var fina=sub_tot.toFixed(2);         
             $('#amount').val(fina);
               $('.amount').html(fina);

               var fin=parseFloat(fina)+parseFloat(hallamount);
               var fins=fin.toFixed(2);
               $('#totalamount').val(fins);
               $('.totalamount').html(fins);
              
              });
      
              });




      $('#features'+total+'').change(function(){

      var features=$('#features'+total+'').val();

      if(features=='LCD Projector with screen')
      {
        $('#rate'+total+'').val('300');
        $('#hrs'+total+'').html('/every 4 hours');
      }
      else if(features=='OHP Projector with screen')
      {
        $('#rate'+total+'').val('60');
        $('#hrs'+total+'').html('/every 4 hours');
      }
      else if(features=='PA system with 4 microphones')
      {
        $('#rate'+total+'').val('250');
        $('#hrs'+total+'').html('/every 4 hours');
      }
      else if(features=='PA system with 2 microphones & 1 wireless')
      {
        $('#rate'+total+'').val('300');
        $('#hrs'+total+'').html('/every 4 hours');
      }
      else if(features=='Large PA system')
      {
        $('#rate'+total+'').val('600');
        $('#hrs'+total+'').html('/every 4 hours');
      }
      else if(features=='Karaoke set')
      {
        $('#rate'+total+'').val('350');
        $('#hrs'+total+'').html('/every 4 hours');
      }
      else if(features=='Disco Music with Lighting & DJ')
      {
        $('#rate'+total+'').val('800');
        $('#hrs'+total+'').html('/every 4 hours');
      }
      else if(features=='Use of Business Center')
      {
        $('#rate'+total+'').val('60');
        $('#hrs'+total+'').html('/per hour');
      }
      else if(features=='Badminton Hall')
      {
        $('#rate'+total+'').val('7.50');
        $('#hrs'+total+'').html('/per hour');
      }
      else 
      {
        $('#rate'+total+'').val('');
        $('#hrs'+total+'').html('/every 4 hours');
      }


      var sub_tot=0;
       
       $('input[name^="rate"]').each(function(){

             var hallamount=$('#hallamount').val();
             $('#advanceamount').val('');
              sub_tot +=Number($(this).val());          
              var fina=sub_tot.toFixed(2);         
              $('#amount').val(fina);
               $('.amount').html(fina);

                var fin=parseFloat(fina)+parseFloat(hallamount);
               var fins=fin.toFixed(2);
               $('#totalamount').val(fins);
               $('.totalamount').html(fins);
              
              });


    });



  $('#rate'+total+'').keyup(function(){

    var sub_tot=0;
       
       $('input[name^="rate"]').each(function(){
         var hallamount=$('#hallamount').val();
         $('#advanceamount').val('');
              sub_tot +=Number($(this).val());          
              var fina=sub_tot.toFixed(2);         
             $('#amount').val(fina);
               $('.amount').html(fina);

                var fin=parseFloat(fina)+parseFloat(hallamount);
               var fins=fin.toFixed(2);
               $('#totalamount').val(fins);
               $('.totalamount').html(fins);
              
              });

  });





});
});

</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#features').change(function(){
      var features=$('#features').val();

      if(features=='LCD Projector with screen')
      {
        $('#rate').val('300');
        $('#hrs').html('/every 4 hours');
      }
      else if(features=='OHP Projector with screen')
      {
        $('#rate').val('60');
        $('#hrs').html('/every 4 hours');
      }
      else if(features=='PA system with 4 microphones')
      {
        $('#rate').val('250');
        $('#hrs').html('/every 4 hours');
      }
      else if(features=='PA system with 2 microphones & 1 wireless')
      {
        $('#rate').val('300');
        $('#hrs').html('/every 4 hours');
      }
      else if(features=='Large PA system')
      {
        $('#rate').val('600');
        $('#hrs').html('/every 4 hours');
      }
      else if(features=='Karaoke set')
      {
        $('#rate').val('350');
        $('#hrs').html('/every 4 hours');
      }
      else if(features=='Disco Music with Lighting & DJ')
      {
        $('#rate').val('800');
        $('#hrs').html('/every 4 hours');
      }
      else if(features=='Use of Business Center')
      {
        $('#rate').val('60');
        $('#hrs').html('/per hour');
      }
      else if(features=='Badminton Hall')
      {
        $('#rate').val('7.50');
        $('#hrs').html('/per hour');
      }
      else 
      {
        $('#rate').val('');
        $('#hrs').html('/every 4 hours');
      }


     
    
    var sub_tot=0;
       
       $('input[name^="rate"]').each(function(){
         var hallamount=$('#hallamount').val();
         $('#advanceamount').val('');
              sub_tot +=Number($(this).val());          
              var fina=sub_tot.toFixed(2);         
              $('#amount').val(fina);
               $('.amount').html(fina);

                 var fin=parseFloat(fina)+parseFloat(hallamount);
               var fins=fin.toFixed(2);
               $('#totalamount').val(fins);
               $('.totalamount').html(fins);
              
              });


    });


$('#rate').keyup(function(){
    
    var sub_tot=0;
       
       $('input[name^="rate"]').each(function(){
         var hallamount=$('#hallamount').val();
         $('#advanceamount').val('');
              sub_tot +=Number($(this).val());          
              var fina=sub_tot.toFixed(2);         
              $('#amount').val(fina);
               $('.amount').html(fina);

                 var fin=parseFloat(fina)+parseFloat(hallamount);
               var fins=fin.toFixed(2);
               $('#totalamount').val(fins);
               $('.totalamount').html(fins);
              
              });

  });


  });
</script>
<script type="text/javascript">
function advance_amount()
{
  
  var totalamount =$('#totalamount').val();
  var advanceamount=$('#advanceamount').val();
  var tot=parseFloat(advanceamount)-parseFloat(totalamount);
  if(tot < 0)
  {

  var tots=parseFloat(totalamount)-parseFloat(advanceamount);
  var total1=tots.toFixed(2);
  $('#balanceamount').val(total1);
  $('#excessamount').val('Nill');

  $('.balanceamount').html(total1);
  $('.excessamount').html('Nill');

   
  }

  else
  {
    var totss=parseFloat(advanceamount)-parseFloat(totalamount);
      var total2=totss.toFixed(2);
      $('#balanceamount').val('Nill');
      $('#excessamount').val(total2);

      $('.balanceamount').html('Nill');
      $('.excessamount').html(total2);

  }

}

</script>


<script language="JavaScript" type="text/javascript">

function time() {
  now=new Date();
  hour=now.getHours();
  min=now.getMinutes();
  sec=now.getSeconds();

if (min<=9) { min="0"+min; }
if (sec<=9) { sec="0"+sec; }
if (hour>12) { hour=hour-12; add="pm"; }
else { hour=hour; add="am"; }
if (hour==12) { add="pm"; }

$('#time').val (((hour<=9) ? "0"+hour : hour) + ":" + min + ":" + sec + " " + add);
$('#times').html (((hour<=9) ? "0"+hour : hour) + ":" + min + ":" + sec + " " + add);

setTimeout("time()", 1000);
}
window.onload = time;

</script> 




<script>
$('#hall_check_in').addClass('active');
$( "#hall_books" ).removeClass( "xn-openable" ).addClass( "xn-openable active" );

</script>






<style type="text/css">
.my-table .table {margin-bottom:0px;}
        .my-table .table > thead > tr > th, .my-table .table > tbody > tr > th, .my-table .table > tfoot > tr > th, .my-table .table > thead > tr > td, .my-table .table > tbody > tr > td, .my-table .table > tfoot > tr > td {
    padding: 8px 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 0px solid #ddd;
}




</style>


</body>
</html>