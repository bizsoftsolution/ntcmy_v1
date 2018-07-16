<!-- START BREADCRUMB -->
<ul class="breadcrumb">
<li><a href="#">Home</a></li>
<li class="active">Checkout</li>
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
<button class="btn btn-primary load" id="checkpnr" type="submit">Submit</button>
 <div id="loading" style="text-align: center; font-weight: bold; color: red; font-size: 20px;display:none;">Processing...</div>
                  
</div>

                                             
</form>

<div class="col-md-2">
    <p style="margin-top: 6px; font-weight: bold; font-size: 14px;">Date : <?php echo date('d/m/Y');?></p>
</div>

 <div class="col-md-4">
    <p style="margin-top: 6px; font-weight: bold; font-size: 14px;">Time :&nbsp;<span class="time">    </span></p>
</div>
 
</div>
</div>




<div class="result"></div>

<div class="row" style="background-color:#fff;">
  <div class="results"></div>
  <div class="results1"></div>

 </div>
    
 
 <div class="viewamount"></div>


 


</div>



<!-- modal -->


<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    <h2 style="text-align: center;">ChecK Out</h2>

                </div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                        <div class="modal-body" style="margin-top:-9px;">
                         
                           
                            <div class="col-md-3" >
                             <label>Check in Date</label>
                            </div>
                             <div class="col-md-3" >:&nbsp;
                             <label><span class="datefrom"></span></label>
                            </div>


                            <div class="col-md-3">
                             <label>Time</label>
                            </div>
                             <div class="col-md-3">:&nbsp;
                             <label><span class="tims"></span></label>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-3">
                             <label>Check out Date</label>
                            </div>
                             <div class="col-md-3">:&nbsp;
                             <label><?php echo date('d/m/Y');?></label>
                            </div>


                            <div class="col-md-3">
                             <label>Time</label>
                            </div>
                             <div class="col-md-3">:&nbsp;
                             <label><span class="time"></span></label>
                            </div>


                                 <div class="clearfix"></div>


                            <div class="col-md-6" style="margin-top: 9px;">
                             <label>Reservation Number</label>
                            </div>
                            <div class="col-md-6" style="margin-top: 9px;">:&nbsp;
                            <span class="pnrnumber"></span>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6">
                             <label>Name</label>
                            </div>
                            <div class="col-md-6">:&nbsp;
                            <span class="name"></span>
                            </div>
                            <div class="clearfix"></div>

                             <div class="col-md-6">
                             <label>Room Type</label>
                            </div>
                            <div class="col-md-6">:&nbsp;
                            <span class="roomtype"></span>
                            </div>
                            <div class="clearfix"></div>

                           

                             <div class="col-md-6">
                             <label>Number of Units</label>
                            </div>
                            <div class="col-md-6">:&nbsp;
                            <span class="noofroom"></span>
                            </div>
                            <div class="clearfix"></div>

                             <div class="col-md-6">
                             <label>Mobile Number</label>
                            </div>
                            <div class="col-md-6">:&nbsp;
                            <span class="mobile"></span>
                            </div>
                            <div class="clearfix"></div>

              <form id="form_3"  class="form-horizontal" method="post" action="<?php echo base_url();?>checkout/roomcheckout" target="_blank" onsubmit="setTimeout(function () { location.href = '<?php echo base_url();?>dashboard'; })">

            <input type="hidden" name="checkoutdate" value="<?php echo date('Y-m-d');?>"    id="datefrom">
             <input type="hidden" name="time"  id="time">
            <input type="hidden" name="pnr_number" class="pnr_number"  id="pnr_number">
            <input type="hidden" name="noofdays" class="day"  id="">
            <input type="hidden" name="subtotal" class="subtotal"  id="">
            <input type="hidden" name="addonamount" class="adonamount"  id="">
             <input type="hidden" name="grandtotal" class="grandtotal"  id="">
            <input type="hidden" name="servicetax" class=""  id="" value="14">
             <input type="hidden" name="bharatcesstax" class=""  id="" value="0.50">
            <input type="hidden" name="servicetaxamount" class="stax"  id="">
            <input type="hidden" name="bharatcesstaxamount" class="btax"  id="">
            <input type="hidden" name="totalamount" class="total_amount"  id="">
            <input type="hidden" name="advanceamount" class="advanc_amount"  id="">
            <input type="hidden" name="balanceamount" class="balance_amount"  id="">
            <input type="hidden" name="enteramount" class="enteramount"  id="">
            <input type="hidden" name="returnamount" class="return_amount"  id="">

             <input type="hidden" name="depositamount" class="depositamounts"  id="">
             <input type="hidden" name="fineamount" class="fineamounts"  id="">
             <input type="hidden" name="remarks" class="remarkss"  id="">
             <input type="hidden" name="refundamount" class="refundamounts"  id="">
             <input type="hidden" name="inspectedby" class="inspectedbys"  id="">

           
 <input type="hidden" name="grandtotals" class="grandtotals"  id="">
 <input type="hidden" name="servicetaxamounts" class="staxs"  id="">
           
           

                             
                         
                        

                             
                        </div>
                        
                    
                    <!-- End | Register Form -->
                    
                </div>
              <div class="modal-footer" >
                         <div class="col-md-6">
                                <button type="button" class="btn btn-danger btn-lg btn-block" data-dismiss="modal" aria-label="Close">No</button>
                            </div>
                         <div class="col-md-6">
                                <button type="submit" class="btn btn-success btn-lg btn-block" >Yes</button>
                            </div>

                                                        
                        </div>
                  </form>
                
            </div>
        </div>
    </div>




             

<style type="text/css">
#enter_amount,#check_out
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
        url: "<?php echo base_url(); ?>checkout/searchcustomer",
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
  $(document).ready(function(){
    $('#checkpnr').click(function(){

       var pnrnumber=$('#pnrnumber').val();
        $('#loading').show();
                $('.load').hide();
       $.post('<?php echo base_url();?>checkout/searchcustomercheckout', {'pnrnumber' : pnrnumber}, function(data) {

            $('.viewamount').html(data); 
            $('#loading').hide();
                    $('.load').show();
        
          });

 $('#loading').show();
                $('.load').hide();
      $.post('<?php echo base_url();?>checkout/searchadvanceamount', {'pnrnumber' : pnrnumber}, function(data) {

            $('.results').html(data); 
            $('#loading').hide();
                    $('.load').show();
        
          }); 

           $('#loading').show();
                $('.load').hide(); 

      $.post('<?php echo base_url();?>checkout/searchadon', {'pnrnumber' : pnrnumber}, function(data) {

            $('.results1').html(data); 
            $('#loading').hide();
                    $('.load').show();
        
          });  

    });

  });
</script>


<script type="text/javascript">
  function modals()
  {
    var inspectedby=$('#inspectedby').val();
    var depositamount=$("#depositamount").val();
    var fineamount=$("#fineamount").val();
    var extracharges=$("#extracharges").val();
    var remarks=$("#remarks").val();
    var refundamount=$("#refundamount").val();

$(".depositamounts").val(depositamount);
$(".fineamounts").val(extracharges);
//$(".extracharges").val(extracharges);
$(".remarkss").val(remarks);
$(".refundamounts").val(refundamount);
$(".inspectedbys").val(inspectedby);

    
    //alert(roominspected);
    if(inspectedby=='')
    {
      alert('Please Selected  Inspected By');
    }
   
    else if($("#roominspected").prop('checked') == false)
    {
      
      alert('Please check Room Inspected');
    }
    else
    {
      $("#myModal1").modal("show");
    }


    

    
  }

  
</script>


<script language="JavaScript" type="text/javascript">

function ontime() {
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

$(".time").html (((hour<=9) ? "0"+hour : hour) + ":" + min + ":" + sec + " " + add);




setTimeout("ontime()", 1000);
}
window.onload = ontime;

</script> 

<script type="text/javascript">
  $(document).ready(function(){

    

   




   
  });
</script>


<script type="text/javascript">
$(document).ready(function(){
  $('#enteramount').keyup(function(){
    var balance_amount=$('.balance_amount').html();
    var enteramount=$('#enteramount').val();
    $(".enteramount").val(enteramount);
    
    if(balance_amount==enteramount)
    {
        $('#check_out').show();
    }
    else
    {
      $('#check_out').hide();
    }

  });




});


</script>
<script>
$('#check_outs').addClass('active');
$( "#room_book" ).removeClass( "xn-openable" ).addClass( "xn-openable active" );

</script>

<script type="text/javascript" language="javascript">
function redirect()
{
    window.location.href="<?php echo base_url();?>dashboard";
}
</script>



<style type="text/css">
#countup p {
display: inline-block;
padding: 5px;
margin: 0px 0px 5px;
color: #000;
font-weight: bold;
}
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