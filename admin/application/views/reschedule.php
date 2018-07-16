<!-- START BREADCRUMB -->
<ul class="breadcrumb">
<li><a href="#">Home</a></li>
<li class="active">Re-schedule</li>
</ul>
<!-- END BREADCRUMB -->
               

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

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
 <div class="col-md-2" id="pay_adv">
    <a onclick="modals()" class="btn btn-primary"   id="payadvance">Pay Advance</a>
</div>

 <div class="col-md-2" id="ad_on">
    <a onclick="modals1()" class="btn btn-primary"   id="addon">Add-on</a>
</div>

</div>
</div>


<div class="result"></div>

<div class="row" style="background-color:#fff;">
  <div class="results"></div>
  <div class="results1"></div>

 </div>
    
 

<div class="row" style="margin-top: 20px;" id="viewamount">

<div class="col-md-4">
</div>
  <div class="col-md-4" style="background-color: rgb(241, 245, 249); border: 2px solid rgb(225, 225, 225); border-radius: 10px;">
            <table border="0">
             
                  <tbody>
                  <tr>
                    <td style="font-weight: bold; padding: 10px; font-size: 18px;">Total Advance</td>
                    <td style="font-weight: bold; padding: 10px; font-size: 18px;">:</td>
                    <td style="font-weight: bold; padding: 10px; font-size: 18px;"><div class="totaladvance"></div></td>
                  </tr>
                  <tr>
                    <td style="font-weight: bold; padding: 10px; font-size: 18px;">Add-on Amount </td>
                    <td style="font-weight: bold; padding: 10px; font-size: 18px;">:</td>
                    <td style="font-weight: bold; padding: 10px; font-size: 18px;"><div class="adonamount"></div></td>
                  </tr>     
                                                       
              
                 </tbody>
              </table>

    </div>
    <div class="col-md-2">
</div>

  </div>
 


</div>
             



<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    <h2 style="text-align: center;">Pay Advance</h2>

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
                           <span style="font-weight: bold;" id="times"></span>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6" style="text-align: center;">
                             <label>Reservation Number</label>
                            </div>
                            <div class="col-md-6">:&nbsp;
                           <span style="font-weight: bold;" id="pnrnumbers"></span>
                            </div>
                            <div class="clearfix"></div>

                             <div class="col-md-6" style="text-align: center;">
                             <label>Room Type</label>
                            </div>
                            <div class="col-md-6">:&nbsp;
                            <span style="font-weight: bold;" id="roomtypes"></span>
                            </div>
                            <div class="clearfix"></div>

                            

            <form id="form_2"  class="form-horizontal" method="post">

            <input type="hidden" name="date" value="<?php echo date('Y-m-d');?>"    id="datefrom">
             <input type="hidden" name="time"  id="time">
            <input type="hidden" name="roomtype"    id="roomtype">
            <input type="hidden" name="roomno"    id="roomno">
            <input type="hidden" name="pnr_number"  id="pnr_number">
           

                             <div class="col-md-6" style="text-align: center;">
                             <label>Amount</label>
                            </div>
                            <div class="col-md-6">:&nbsp;
                          <input type="text" class="form-control" name="advanceamount" id="advanceamount" />

                            </div>
                            <div class="clearfix"></div>

                             
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
                             <label>Reservation Number</label>
                            </div>
                            <div class="col-md-6">:&nbsp;
                           <span style="font-weight: bold;" id="pnrnumbers1"></span>
                            </div>
                            <div class="clearfix"></div>

                             <div class="col-md-6" style="text-align: center;">
                             <label>Room Type</label>
                            </div>
                            <div class="col-md-6">:&nbsp;
                            <span style="font-weight: bold;" id="roomtypes1"></span>
                            </div>
                            <div class="clearfix"></div>

                            


          <div class="row">
<div class="col-md-12">

<div class="col-md-2">

</div>

<div class="col-md-5">
<h4>Particulars</h4>
</div>
<div class="col-md-3">
<h4>Amount</h4>
</div>
<div class="col-md-2 text-right">
   <span class="food"><h4>Bill No</h4></span>    
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
    <input type="hidden" name="roomtype1"    id="roomtype1">
    <input type="hidden" name="roomno1"    id="roomno1">
    <input type="hidden" name="pnr_number1"  id="pnr_number1">

<div class="col-md-5">
<select class="form-control" name="particular" id="particular">
  <option value="">Select Particular</option>
  <option value="Extra Bed">Extra Bed</option>
  <option value="Dry Clean">Dry Clean</option>
  <option value="Cleaning Charge">Cleaning Charge</option>
   <option value="Service Charge">Service Charge</option>
    <option value="Food">Food</option>
</select>
</div>
<div class="col-md-3">
<input type="text" class="form-control" name="amount" id="amount" />
</div>
<div class="col-md-2 text-right">
<span class="food">
<input type="text" class="form-control" name="billno" id="billno" />
 </span>                 
</div>

</div>
</div>

                   
                   
              </div>
                        
                    
                    <!-- End | Register Form -->
                    
                </div>
              <div class="modal-footer" >
                    <div id="load1">
                         <div class="col-md-6">
                                <button type="button" class="btn btn-danger btn-lg btn-block" data-dismiss="modal" aria-label="Close">No</button>
                            </div>
                         <div class="col-md-6">
                                <button type="submit" class="btn btn-success btn-lg btn-block">Yes</button>
                            </div>
                            </div>
<div id="loading1" style="text-align: center; font-weight: bold; color: red; font-size: 20px;display:none;">Processing...</div>
                                                        
                        </div>
                    </form>
                
            </div>
        </div>
    </div>



<style type="text/css">
  #pay_adv,#ad_on,#viewamount,.food
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
        url: "<?php echo base_url(); ?>reschedule/searchcustomer",
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
      $.post('<?php echo base_url();?>reschedule/searchadvanceamount', {'pnrnumber' : pnrnumber}, function(data) {

            $('.results').html(data); 
        
          });  

      $.post('<?php echo base_url();?>reschedule/searchadon', {'pnrnumber' : pnrnumber}, function(data) {

            $('.results1').html(data); 
        
          });  

    });
    $('#particular').change(function(){
      var particular=$('#particular').val();
      if(particular=='Food')
      {
        $('.food').show();
      }
      else
      {
        $('.food').hide();
        $('#billno').val('');
      }

    });

  });
</script>


<script type="text/javascript">
  function modals()
  {
    $("#myModal1").modal("show");

    
  }

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
    $('#payadvance').click(function(){

       var pnr=$("#pnr").text();
       var romtyp=$("#romtyp").text();
       var romno=$("#romno").text();


       $('#pnrnumbers').html(pnr);
        $('#roomtypes').html(romtyp);
         $('#roomnos').html(romno);
          $('#pnr_number').val(pnr);
           $('#roomtype').val(romtyp);
            $('#roomno').val(romno);

    });

  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#addon').click(function(){

       var pnr=$("#pnr").text();
       var romtyp=$("#romtyp").text();
       var romno=$("#romno").text();


       $('#pnrnumbers1').html(pnr);
        $('#roomtypes1').html(romtyp);
         $('#roomnos1').html(romno);
          $('#pnr_number1').val(pnr);
           $('#roomtype1').val(romtyp);
            $('#roomno1').val(romno);

    });

  });
</script>

<script type="text/javascript">
var form_2 = $("#form_2").validate({
ignore: [],
rules: {                                            
advanceamount:'required',

},
messages: { 
advanceamount:"Please enter Amount",
}
}); 

 $("#form_2").submit(function(){

if( $("#form_2").valid())
{

    dataString = $("#form_2").serialize();

      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>reschedule/payadvanceamount",
        data: dataString,

               beforeSend: function(data){

                $('#loading').show();
                $('#load').hide();
              },


                success: function(datas){

                   $("#myModal1").modal("hide");
                   $('.results').html(datas); 
                    $('#loading').hide();
                    $('#load').show();

                     $('#form_2')[0].reset();


        }

        });

        return false;  //stop the actual form post !important!



}


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
        url: "<?php echo base_url(); ?>reschedule/payadon",
        data: dataString,

        beforeSend: function(data){

                $('#loading1').show();
                $('#load1').hide();
              },

                success: function(datass){

                  //alert(datass);

                   $("#myModal2").modal("hide");
                   $('.results1').html(datass); 

                   $('#loading1').hide();
                    $('#load1').show();

                     $('#form_3')[0].reset();

        }

        });

        return false;  //stop the actual form post !important!



}


}); 


                               

</script>

<script>
$('#re_schedule').addClass('active');
$( "#room_book" ).removeClass( "xn-openable" ).addClass( "xn-openable active" );

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


<script>
$(document).ready(function(){
 // $('.del').click(function(){
 //    alert();
 // });
 //  $('.del1').click(function(){
 //    alert();
 // });
 //   $('.del2').click(function(){
 //    alert();
 // });
 //    $('.del3').click(function(){
 //    alert();
 // });
 //     $('.del4').click(function(){
 //    alert();
 // });
});
</script>