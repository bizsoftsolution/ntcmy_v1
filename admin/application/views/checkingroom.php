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
<input type="text" class="form-control" style="text-transform: uppercase;" name="pnrnumber"/>

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
                        
                            
                           
                            <div class="row">
        <div class="col-md-12" style="margin-bottom: 10px; font-weight: bold;">
        <div  class="col-md-3" style="text-align: right;">
        Date : 
        </div>
        <div  class="col-md-3">
         <div id="dates"></div>
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
        Room Type : 
        </div>
        <div  class="col-md-3">
        <div class="rmtyps"></div>
        </div> 
        <div  class="col-md-3" style="text-align: right;">     
        No of Units :
        </div>
        <div  class="col-md-3">
      <div class="nfrms"></div>
        </div>
          
         </div>
      
       
<form id="form_2"  class="form-inline" method="post" action="<?php echo  base_url();?>bookingroom/checkinroom">

        <input type="hidden" name="roomtypeids"  id="roomtypeid">
        <input type="hidden" name="date1"    id="datefrom">
        <input type="hidden" name="roomtypes"    id="roomtype">
        <input type="hidden" name="noofrooms"    id="noofroom">
        <input type="hidden" name="pnrnumber"  id="pnr_number">
        <input type="hidden" name="time"  id="time">

                  
                    

           
                                    

        

        

    </div>
                           
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
        url: "<?php echo base_url(); ?>roomsearch/searchpnrnumber",
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

    var a=$('#row1').val();
    var b=$('#row2').val();
    var c=$('#row3').val();
    var d=$('#row4').val();
    var e=$('#row5').val();

    $('#roomtypeid').val(a);
    $('#datefrom').val(b);
    $('#roomtype').val(c);
    $('#noofroom').val(d);
    $('#pnr_number').val(e);
    $('#dates').html(b);
    $('.rmtyps').html(c);
    $('.nfrms').html(d);
    



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


setTimeout("time()", 1000);
}
window.onload = time;

</script> 


<script type="text/javascript">

/***********************************************
* CSS3 Analog Clock- by JavaScript Kit (www.javascriptkit.com)
* Visit JavaScript Kit at http://www.javascriptkit.com/ for this script and 100s more
***********************************************/

var $hands = $('#liveclock div.hand')

window.requestAnimationFrame = window.requestAnimationFrame
                               || window.mozRequestAnimationFrame
                               || window.webkitRequestAnimationFrame
                               || window.msRequestAnimationFrame
                               || function(f){setTimeout(f, 60)}


function updateclock(){
    var curdate = new Date()
    var hour_as_degree = ( curdate.getHours() + curdate.getMinutes()/60 ) / 12 * 360
    var minute_as_degree = curdate.getMinutes() / 60 * 360
    var second_as_degree = ( curdate.getSeconds() + curdate.getMilliseconds()/1000 ) /60 * 360
    $hands.filter('.hour').css({transform: 'rotate(' + hour_as_degree + 'deg)' })
    $hands.filter('.minute').css({transform: 'rotate(' + minute_as_degree + 'deg)' })
    $hands.filter('.second').css({transform: 'rotate(' + second_as_degree + 'deg)' })
    requestAnimationFrame(updateclock)
}

requestAnimationFrame(updateclock)


</script>

<script>
$('#check_in').addClass('active');
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