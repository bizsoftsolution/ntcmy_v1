<!-- START BREADCRUMB -->
<ul class="breadcrumb">
<li><a href="#">Home</a></li>
<li class="active">Re-schedule</li>
</ul>
<!-- END BREADCRUMB -->
               

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap" style="background: rgb(255, 255, 255) none repeat scroll 0% 0%;">                

<div class="row">
<div class="col-md-12" style="margin-top: 10px;">    

<!-- START JQUERY VALIDATION PLUGIN -->

<form id="jvalidate"  class="form-horizontal" method="post">
                                  

<label class="col-md-2 control-label">Reservation Number:</label>  
<div class="col-md-2">
<input type="text" class="form-control" style="text-transform: uppercase;" name="pnrnumber" id="pnrnumber" />

</div>


                                        
<div class="col-md-2">
<button class="btn btn-primary" id="checkpnr" type="submit">Submit</button>
                  
</div>

                                             
</form>
 
 <div class="col-md-2" id="ad_on">
    <a onclick="modals1()" class="btn btn-primary"   id="addon">Add-on</a>
</div>

</div>
</div>


<div class="result"></div>
<div class="clearfix"></div>





  <div class="results"></div>
  <div class="results1"></div>

    
 


 


</div>
             





    <!-- model2 -->

    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    <h2 style="text-align: center;">Add-on</h2>

                </div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
              <div class="modal-body" style="margin-top:-9px;">
                <div class="col-md-6" style="text-align: center;">
                             <label>Date</label>
                            </div>
                            <div class="col-md-6">
                           <span style="font-weight: bold;">:&nbsp;<?php echo date('d-m-Y');?></span>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6" style="text-align: center;">
                             <label>Time</label>
                            </div>
                            <div class="col-md-6">:&nbsp;
                           <span style="font-weight: bold;" id="times1"></span>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6" style="text-align: center;">
                             <label>PNR Number</label>
                            </div>
                            <div class="col-md-6">:&nbsp;
                           <span style="font-weight: bold;" id="pnrnumbers1"></span>
                            </div>
                            <div class="clearfix"></div>

                             <div class="col-md-6" style="text-align: center;">
                             <label>Hall Type</label>
                            </div>
                            <div class="col-md-6">:&nbsp;
                            <span style="font-weight: bold;" id="halltypes1"></span>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6" style="text-align: center;">
                             <label>Slot</label>
                            </div>
                            <div class="col-md-6">:&nbsp;
                            <span style="font-weight: bold;" id="slots1"></span>
                            </div>
                            <div class="clearfix"></div>


          <div class="row">
<div class="col-md-12">

<div class="col-md-2">

</div>


</div>
</div>



  <div class="row">
<div class="col-md-12">
<div class="col-md-2">

</div>

  <form id="form_3"  class="form-horizontal" method="post">

    <input type="hidden" name="date1" value="<?php echo date('Y-m-d');?>"    id="datefrom">
     <input type="hidden" name="time1"  id="time1">
    <input type="hidden" name="halltype1"    id="halltype1">
    <input type="hidden" name="slot1"    id="slot1">
    <input type="hidden" name="pnr_number1"  id="pnr_number1">
     <input type="hidden" id="hide" value="1" /> 
      <input type="hidden" name="seat"  id="seat">

<table>
           <tbody>
           <tr>
            <td style="width: 564px; padding: 0px 10px ! important;">
       
      <select class="form-control features" name="facilities[]" id="features">
      <option value="">Other Faclities</option>
      <option value="LCD Projector with screen">LCD Projector with screen</option>
      <option value="OHP Projector with screen">OHP Projector with screen</option>
      <option value="PA system with 4 microphones">PA system with 4 microphones</option>
      <option value="PA system with 2 microphones & 1 wireless">PA system with 2 microphones & 1 wireless</option>
      <option value="Large PA system with 8 - 12 microphones">Large PA system with 8 - 12 microphones</option>
      <option value="Karaoke set">Karaoke set</option>
      <option value="Disco Music with Lighting & DJ">Disco Music with Lighting & DJ</option>
      <option value="Use of Business Center">Use of Business Center</option>
      <option value="Badminton Hall">Badminton Hall</option>
      <option value="Chairs">Chairs</option>
      <option value="Tables">Tables</option>
      </select> 
       </td>
       <td style="width: 130px; padding: 0px 10px ! important;">


         <input type="text" id="rate" value="" class="form-control rate" placeholder="Rates" name="rate[]" /> 
         <input type="hidden" id="hours" value="" class="form-control" placeholder="Rates" name="hours[]" /> 
       </td>
        <td style="padding-bottom: 10px; padding-right: 20px; width: 200px;">
        <span id="hrs"></span>
        </td>
       <td style="padding-bottom: 10px; padding-right: 20px;">
 <button type="button" class="btn btn-success btn-sm add">+</button> 
                          </td>
                          <td style="padding-bottom: 10px; padding-right: 20px;">

                     &nbsp; 
                     </td>          
       
         </tr>
         </tbody>
         <tbody id="append"></tbody>

         </table>
         <div  class="col-md-6" style="text-align: right;">
        Total Amount
        </div>
        <div  class="col-md-3">
         <input type="text" id="totalamount" style="text-align: right; padding-top: 7px;" class="form-control" value="" name="facilitiesamount" readonly/> 
        </div>
        <div class="clearfix"></div> 



</div>
</div>

                   
                   
              </div>
                        
                    
                    <!-- End | Register Form -->
                    
                </div>
              <div class="modal-footer" >
                <div id="load">
                         <div class="col-md-6">
                                <button type="button" class="btn btn-danger btn-lg btn-block" data-dismiss="modal" aria-label="Close">No</button>
                            </div>
                         <div class="col-md-6">
                                <button type="submit" class="btn btn-success btn-lg btn-block">Yes</button>
                            </div>
                            </div>
                            <div id="loading" style="text-align: center; font-weight: bold; color: red; font-size: 20px;display:none;">Processing...</div>

                                                        
                  </div>
                    </form>
                
            </div>
        </div>
    </div>



<style type="text/css">
  #pay_adv,#ad_on,#viewamount
  {
    display: none;
  }
 
</style>




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
pnrnumber:"Please enter Reservation Number",
}
}); 

 $("#jvalidate").submit(function(){

if( $("#jvalidate").valid())
{

   

		dataString = $("#jvalidate").serialize();

      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>hall_reschedule/searchcustomer",
        data: dataString,

                success: function(data){

        //alert(data);

        // $('#world').hide();
         $('.result').html(data); 

        }

        });

        return false;  //stop the actual form post !important!


     



}


}); 


                               

</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#checkpnr').click(function(){

       var pnrnumber=$('#pnrnumber').val();
     
      $.post('<?php echo base_url();?>hall_reschedule/searchadon', {'pnrnumber' : pnrnumber}, function(data) {

            $('.results1').html(data); 
        
          });  

    });

  });
</script>


<script type="text/javascript">

  function modals1()
  {
    $("#myModal2").modal("show");

    
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

$("#time").val (((hour<=9) ? "0"+hour : hour) + ":" + min + ":" + sec + " " + add);

$("#times").html (((hour<=9) ? "0"+hour : hour) + ":" + min + ":" + sec + " " + add);

$("#time1").val (((hour<=9) ? "0"+hour : hour) + ":" + min + ":" + sec + " " + add);

$("#times1").html (((hour<=9) ? "0"+hour : hour) + ":" + min + ":" + sec + " " + add);


setTimeout("time()", 1000);
}
window.onload = time;

</script> 



<script type="text/javascript">
  $(document).ready(function(){
    $('#addon').click(function(){

       var pnr=$("#pnr").text();
       var haltyp=$("#haltyp").text();
       var slot=$("#slt").text();
        var seats=$("#seats").text();


       $('#pnrnumbers1').html(pnr);
        $('#halltypes1').html(haltyp);
         $('#slots1').html(slot);
          $('#pnr_number1').val(pnr);
           $('#halltype1').val(haltyp);
            $('#slot1').val(slot);
              $('#seat').val(seats);

    });

  });
</script>

<script type="text/javascript">

  $(document).ready(function(){





    $('.add').click(function(){



      var start=$('#hide').val();



      var total=Number(start)+1;

      $('#hide').val(total);

      var tbody=$('#append');

      $('<tr><td style="width: 564px; padding: 0px 10px ! important;"><select class="form-control" name="facilities[]" id="features'+total+'"><option value="">Other Faclities</option><option value="LCD Projector with screen">LCD Projector with screen</option><option value="OHP Projector with screen">OHP Projector with screen</option><option value="PA system with 4 microphones">PA system with 4 microphones</option><option value="PA system with 2 microphones & 1 wireless">PA system with 2 microphones & 1 wireless</option><option value="Large PA system with 8 - 12 microphones">Large PA system with 8 - 12 microphones</option><option value="Karaoke set">Karaoke set</option><option value="Disco Music with Lighting & DJ">Disco Music with Lighting & DJ</option><option value="Use of Business Center">Use of Business Center</option><option value="Badminton Hall">Badminton Hall</option><option value="Chairs">Chairs</option><option value="Tables">Tables</option></select></td><td style="width: 130px; padding: 0px 10px ! important;"><input type="text" id="rate'+total+'" class="form-control" placeholder="Rates" name="rate[]" /><input type="hidden" id="hours'+total+'" class="form-control" placeholder="Rates" name="hours[]" /></td><td style="padding-bottom: 10px; padding-right: 20px; width: 200px;"><span id="hrs'+total+'"></span></td><td style="padding-bottom: 10px; padding-right: 20px;"><button type="button" class="btn btn-danger btn-sm remove">-</button></td><td>&nbsp;</td></tr>').appendTo(tbody);

        var sub_tot=0;
       
       $('input[name^="rate"]').each(function(){
         
              sub_tot +=Number($(this).val());          
              var fina=sub_tot.toFixed(2);         
              $('#totalamount').val(fina);
              
              });



      $('.remove').click(function(){     
              $(this).parents('tr').remove(); 
                    var sub_tot=0;
       
       $('input[name^="rate"]').each(function(){
         
              sub_tot +=Number($(this).val());          
              var fina=sub_tot.toFixed(2);         
              $('#totalamount').val(fina);
              
              });
      
              });




      $('#features'+total+'').change(function(){

      var features=$('#features'+total+'').val();
       var seatss=$('#seat').val();

      if(features=='LCD Projector with screen')
      {
        $('#rate'+total+'').val('300');
        $('#hrs'+total+'').html('/every 4 hours');
        $('#hours'+total+'').val('4 hours');
      }
      else if(features=='OHP Projector with screen')
      {
        $('#rate'+total+'').val('60');
        $('#hrs'+total+'').html('/every 4 hours');
         $('#hours'+total+'').val('4 hours');
      }
      else if(features=='PA system with 4 microphones')
      {
        $('#rate'+total+'').val('250');
        $('#hrs'+total+'').html('/every 4 hours');
        $('#hours'+total+'').val('4 hours');
      }
      else if(features=='PA system with 2 microphones & 1 wireless')
      {
        $('#rate'+total+'').val('300');
        $('#hrs'+total+'').html('/every 4 hours');
        $('#hours'+total+'').val('4 hours');
      }
      else if(features=='Large PA system with 8 - 12 microphones')
      {
        $('#rate'+total+'').val('600');
        $('#hrs'+total+'').html('/every 4 hours');
        $('#hours'+total+'').val('4 hours');
      }
      else if(features=='Karaoke set')
      {
        $('#rate'+total+'').val('350');
        $('#hrs'+total+'').html('/every 4 hours');
         $('#hours'+total+'').val('4 hours');
      }
      else if(features=='Disco Music with Lighting & DJ')
      {
        $('#rate'+total+'').val('800');
        $('#hrs'+total+'').html('/every 4 hours');
         $('#hours'+total+'').val('4 hours');
      }
      else if(features=='Use of Business Center')
      {
        $('#rate'+total+'').val('10');
        $('#hrs'+total+'').html('/per hour');
        $('#hours'+total+'').val('1 hour');
      }
      else if(features=='Badminton Hall')
      {
        $('#rate'+total+'').val('15');
        $('#hrs'+total+'').html('/2 hours');
        $('#hours'+total+'').val('2 hours');
      }
       else if(features=='Chairs')
      {
        $('#rate'+total+'').val(parseFloat(seatss)*parseFloat('0.20'));
        $('#hrs'+total+'').html('/every 4 hours');
         $('#hours'+total+'').val('4 hours');
      }
       else if(features=='Tables')
      {
        $('#rate'+total+'').val('2');
        $('#hrs'+total+'').html('/every 4 hours');
         $('#hours'+total+'').val('4 hours');
      }
      else 
      {
        $('#rate'+total+'').val('');
        $('#hrs'+total+'').html('');
         $('#hours'+total+'').val('');
      }


      var sub_tot=0;
       
       $('input[name^="rate"]').each(function(){
         
              sub_tot +=Number($(this).val());          
              var fina=sub_tot.toFixed(2);         
              $('#totalamount').val(fina);
              
              });


    });



  $('#rate'+total+'').keyup(function(){

    var sub_tot=0;
       
       $('input[name^="rate"]').each(function(){
         
              sub_tot +=Number($(this).val());          
              var fina=sub_tot.toFixed(2);         
              $('#totalamount').val(fina);
              
              });

  });





});
});

</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#features').change(function(){
      var features=$('#features').val();
       var seatss=$('#seat').val();

      if(features=='LCD Projector with screen')
      {
        $('#rate').val('300');
        $('#hrs').html('/every 4 hours');
        $('#hours').val('4 hours');
      }
      else if(features=='OHP Projector with screen')
      {
        $('#rate').val('60');
        $('#hrs').html('/every 4 hours');
        $('#hours').val('4 hours');
      }
      else if(features=='PA system with 4 microphones')
      {
        $('#rate').val('250');
        $('#hrs').html('/every 4 hours');
        $('#hours').val('4 hours');
      }
      else if(features=='PA system with 2 microphones & 1 wireless')
      {
        $('#rate').val('300');
        $('#hrs').html('/every 4 hours');
        $('#hours').val('4 hours');
      }
      else if(features=='Large PA system with 8 - 12 microphones')
      {
        $('#rate').val('600');
        $('#hrs').html('/every 4 hours');
        $('#hours').val('4 hours');
      }
      else if(features=='Karaoke set')
      {
        $('#rate').val('350');
        $('#hrs').html('/every 4 hours');
        $('#hours').val('4 hours');
      }
      else if(features=='Disco Music with Lighting & DJ')
      {
        $('#rate').val('800');
        $('#hrs').html('/every 4 hours');
        $('#hours').val('4 hours');
      }
      else if(features=='Use of Business Center')
      {
        $('#rate').val('10');
        $('#hrs').html('/per hour');
        $('#hours').val('1 hour');
      }
      else if(features=='Badminton Hall')
      {
        $('#rate').val('15');
        $('#hrs').html('/2 hours');
        $('#hours').val('2 hours');
      }
       else if(features=='Chairs')
      {
        
       var tot= parseFloat(seatss)*parseFloat('0.20');
        $('#rate').val(tot);
        $('#hrs').html('/every 4 hours');
         $('#hours').val('4 hours');
      }
       else if(features=='Tables')
      {
        $('#rate').val('2');
        $('#hrs').html('/every 4 hours');
         $('#hours').val('4 hours');
      }
      else 
      {
        $('#rate').val('');
        $('#hrs').html('/every 4 hours');
        $('#hours').val('');
      }

     
    
    var sub_tot=0;
       
       $('input[name^="rate"]').each(function(){
         
              sub_tot +=Number($(this).val());          
              var fina=sub_tot.toFixed(2);         
              $('#totalamount').val(fina);
              
              });


    });


$('#rate').keyup(function(){
    
    var sub_tot=0;
       
       $('input[name^="rate"]').each(function(){
         
              sub_tot +=Number($(this).val());          
              var fina=sub_tot.toFixed(2);         
              $('#totalamount').val(fina);
              
              });

  });


  });
</script>




<script type="text/javascript">
var form_3 = $("#form_3").validate({
ignore: [],
rules: {                                            
particular:'required',
amount:'required',

},
messages: { 
particular:"Please Select Particulars",
amount:"Please Enter Amount",
}
}); 

 $("#form_3").submit(function(){

if( $("#form_3").valid())
{

    dataString = $("#form_3").serialize();

      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>hall_reschedule/payadon",
        data: dataString,

        beforeSend: function(data){

                $('#loading').show();
                $('#load').hide();
              },

                success: function(datass){

                  //alert(datass);

                   $("#myModal2").modal("hide");
                   $('.results1').html(datass); 
                   $('#loading').hide();
                    $('#load').show();

                     $('#form_3')[0].reset();




        }

        });

        return false;  //stop the actual form post !important!



}


}); 


                               

</script>

<script>
$('#hall_re_schedule').addClass('active');
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