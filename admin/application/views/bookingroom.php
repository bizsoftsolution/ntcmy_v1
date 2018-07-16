<!-- START BREADCRUMB -->

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Pages</a></li>

    <li class="active">Booking Rooms</li>
</ul>
<!-- END BREADCRUMB -->

               

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">


    
   
<div  class="col-md-12 padding-left" style="margin-top: 20px;">  
<div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span>Booking Room</h2>
                </div>   
<form  id="form_1" name="form1"  method="post"  >


  
    <div class="col-md-12">

    <input value="" placeholder="First " class="form-control" name="roomtype" id="roomtype" type="hidden">

      <input value="" placeholder=" Name" class="form-control" name="roomamount" id="roomamount" type="hidden">

      <input value="" placeholder=" Name" class="form-control" name="numberofdays" id="numberofdays" type="hidden">

       <input value="" placeholder=" Name" class="form-control" name="amount" id="amount" type="hidden">

        <input value="" placeholder=" Name" class="form-control" name="totalamount" id="totalamount" type="hidden">

    <div class="col-md-3">

     <input type="text" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()" class="form-control" name="checkin" id="checkin" value="" placeholder="Check In">
    </div>

    <div class="col-md-3">
    <input type="text" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()" class="form-control" name="checkout" id="checkout" value="" placeholder="Check Out">
    </div>


       <div class="col-md-3">
    <select class="form-control"   onchange="b2()"  name="roomtypeid" id="roomtypeid">
  <option value="">Select Room Type</option>
  <?php 
    $data=$this->db->get('roomtypes')->result_array();
    foreach ($data as $a) {?>
   <option value="<?php echo $a['id'];?>"><?php echo $a['roomtype'];?></option> 
   <?php
    }
  ?>
  
  </select>

   <select class="form-control romtyp1" id="dormbed" name="dormbed" style="display:none;" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()">
                                
                                <option value="10">10 Bed Per Drom</option>
                                <option value="12">12 Bed Per Drom</option>
                                <option value="22">22 Bed Per Drom</option>
                                </select>
    </div>
    
    
    <div class="col-md-3">
     <div id="proc" style="text-align: center; font-weight: bold; color: red; font-size: 15px;display:none;">Processing...</div>
    <div class="rmtprooms">

    <select class="form-control" name="room_no" id="room_no">
    <option value="">Number Of Units</option>
               
    </select>
    </div>
    </div>

    </div>

    <div class="clear-fix"></div>

    <div class="col-md-12">

     <div class="col-md-3">
     <input type="text" value="" placeholder="Adults" class="form-control" name="adults" id="adults">
    </div>
    
    
    <div class="col-md-3">
    <input type="text" value="" placeholder="Children" class="form-control" name="children" id="children">
    </div>

    <div class="col-md-3">
    <select class="form-control" name="extra_bed" id="extra_bed">
    <option value="">Extra Bed</option>
    <option value="0">0</option>
     <option value="1">1</option>
    <option value="2">2</option>
               
    </select>
    <input placeholder="Last Name" class="form-control" name="bookingtype" id="" value="Direct booking" type="hidden">
      </div>

       <div class="col-md-3">
      <input value="" placeholder="Nube Member Id" class="form-control" name="nubememberid" id="nubememberid" type="text">
      </div>

      </div>

      <div class="clear-fix"></div>

      <div class="col-md-12">

      <div class="col-md-3">
    <input value="" placeholder="IC Number" class="form-control" name="icnumber" id="icnumber" type="text">
    </div>

   
       
    <div class="col-md-3">
    
    <input value="" placeholder="First Name" class="form-control required" name="firstname" id="firstname" type="text">
    </div>

    <div class="col-md-3">
    <input value="" placeholder="Last Name" class="form-control" name="lastname" id="lastname" type="text">
    </div>

     
    
    <div class="col-md-3">
    <input value="" placeholder="Email" class="form-control" name="email" id="email" type="text">
    </div>

    </div>

<div class="clear-fix"></div>

<div class="col-md-12">


    <div class="col-md-3">
    <input value="" placeholder="Mobile No" class="form-control" name="mobile" id="mobile" type="text">
    </div>

   
    <div class="col-md-3">
    <input value="" placeholder="Address Line 1" class="form-control" name="line1" id="line1" type="text">
    </div>
    
    <div class="col-md-3">
    <input value="" placeholder="Line 2" class="form-control" name="line2" id="line2" type="text">
    </div>

    

    <div class="col-md-3">
    <input value="" placeholder="City" class="form-control" name="city" id="city" type="text">
    </div>

    

    
</div>
     
     <div class="clear-fix"></div>

     <div class="col-md-12">

    

    <div class="col-md-3">
    <input value="" placeholder="State" class="form-control" name="state" id="state" type="text">
    </div>

     

    <div class="col-md-3">
    <input value="" placeholder="Postcode" class="form-control" name="postcode" id="postcode" type="text">
    </div>

   
    
    <div class="col-md-3">   
   <select class="form-control" name="country" id="country">
   <option value="">Select Country</option>
      <?php 
      $data=$this->db->get('country')->result_array();
      foreach ($data as $a) {?>

      <option value="<?php echo $a['country'];?>"><?php echo $a['country'];?></option>
      
           <?php
      }
      ?>
                
    </select>
    </div>

    

    

      


  </div>
    
    <div class="clear-fix"></div>


    <div class="col-md-12">
      <div class="col-md-3">
  
    

    <div class="col-md-10" style="margin-left: 30px; margin-top: 15px;"  id="load">
     <input type="submit" id="submit" class="btn btn-success btn-lg btn-block" value="Book">
    </div>

 <div class="col-md-10" id="loading" style="margin-left: 30px; margin-top: 15px;display:none;">
     <div  style="text-align: center; font-weight: bold; color: red; font-size: 20px;">Processing...</div>
     </div>
  </div>
  </div>
    
    
    
    
    
</form>

<div class="col-md-12" style="margin-top: 25px;">
      <div class="succ"></div>
</div>
                      

<div id="pnrch">
<div class="col-md-12 block text-center" style="margin-top: 20px;">
<form id="form_2"  class="form-inline" method="post" action="<?php echo  base_url();?>bookingroom/checkinroom">
            

<div class="form-group">

<label class="control-label" style="margin-top: -9px;">Reservation Number:</label>  

<input type="text" class="form-control" name="pnrnumber"  id="pnrnumber" style="margin-left: 5px;text-transform: uppercase;"/>

<a href="#" onclick="modals();" class="btn btn-primary" id="checkpnr" type="button" style="margin-left: 45px; margin-top: -9px;">Submit</a>
</div>

<div class="clearfix"></div>
<div class="cckdate"></div>

</div>
                                                                                                                       
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
        <?php echo date('Y-m-d');?>
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
        Unit Type : 
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
      
       <input type="hidden" id="roomtypes" value="" class="form-control rmtyps" placeholder="From" name="roomtypes" />  

      <input type="hidden" id="roomtypeids" value="" class="form-control" placeholder="From" name="roomtypeids" />

      <input type="hidden" id="noofrooms" value="" class="form-control nfrms" placeholder="From" name="noofrooms" />   

      <input type="hidden" id="" class="form-control" placeholder="From" value="<?php echo date('Y-m-d');?>" name="date1"  />
       
      <input type="hidden" id="time" class="form-control" placeholder="time" value="" name="time"  />

                  
                    

           
                                    

        

        

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





<div class = "modal fade" id = "checkmodal1" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class="modal-dialog">
            <div class="modal-content">
                                

                </div>
                <div class="col-md-12" style="margin-top: 16px;">
                </div>
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                      
                   
                   
                        <div class="modal-body">
                        
                         <div  style="text-align: center; font-weight: bold; color: red; font-size: 20px;">Processing...</div>
                          </div>
                           
                        </div>
                       
                    </form>
                    <!-- End | Register Form -->
                    
                </div>
                <!-- End # DIV Form -->
                
            </div>
        </div>
   
</div><!-- /.modal -->










<!-- END JQUERY VALIDATION PLUGIN -->
</div>  




         
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<style type="text/css">
    #extrabed,#pnrch{
        display:none;
    }
</style>

 <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/bootstrap/bootstrap.min.js"></script>

<script type= "text/javascript" src = "<?php echo base_url();?>assests/datepicker/bootstrap-datepicker.js"></script>

<script type= "text/javascript" src = "<?php echo base_url();?>assests/validation/jquery.validate.min.js"></script>
<script type= "text/javascript" src = "<?php echo base_url();?>assests/validation/validation-init.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#checkin').datepicker({
startDate: "-d",
format: "yyyy-mm-dd",
autoclose: true,
todayHighlight: true,
});



    
});
</script>
    <script type="text/Javascript">
    $(document).ready(function(){
            $('#checkin').change(function(){
            $('#checkout').val('');
            $('#checkout').datepicker("remove");
            var a = $('#checkin').val();
            
            $('#checkout').datepicker({
                
                startDate: a,
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true,
                });
            
            
            
        })
        
        
        
    })</script>

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

    

  <!-- checkin-checkout form submit -->  

  <script type="text/javascript">

  $(function(){
    $("#form_1").submit(function(){



      if( $("#form_1").valid())
      {

              var nubememberid=$('#nubememberid').val();

           if(nubememberid=='')
           {

          //   alert();

                  dataString = $("#form_1").serialize();

                    $.ajax({
                      type: "POST",
                      url: "<?php echo base_url(); ?>bookingroom/rooms_books",
                      data: dataString,

                     beforeSend: function(data){

                      $('#loading').show();
                      $('#load').hide();
                    },

                      success: function(data){

                       $('#loading').hide();
                    $('#load').show();

                          $('#form_1')[0].reset();



                          $('#pnrch').show();
                          $('.succ').html(data); 

              }

              });

              return false; 
            
           }
           else
           {

                dataString = $("#form_1").serialize();

                    $.ajax({
                      type: "POST",
                      url: "<?php echo base_url(); ?>bookingroom/memberidcheck",
                      data: dataString,

                      beforeSend: function(data){

                      $('#loading').show();
                      $('#load').hide();
                    },

                      success: function(data){

                        $('#loading').hide();
                    $('#load').show();

                       if(data!='')
                       {
                        alert(data);
                        $('#nubememberid').val('');
                       }
                       else
                       {

                              dataString = $("#form_1").serialize();

                    $.ajax({
                      type: "POST",
                      url: "<?php echo base_url(); ?>bookingroom/rooms_books",
                      data: dataString,

                      beforeSend: function(data){

                $('#loading').show();
                $('#load').hide();
              },
                      success: function(data){

                         $('#loading').hide();
                    $('#load').show();

                          $('#form_1')[0].reset();



                          $('#pnrch').show();
                          $('.succ').html(data); 

              }

              });

              return false; 

                       }

                          
                  }

              });

              return false;
            

           }

                 //stop the actual form post !important!
 }
});

   });
</script>

<script type="text/javascript">
    $(document).ready(function(){
      $('.rmtprooms').change(function(){ 

              var room_no=$('#room_no').val();
             var checkin=$('#checkin').val();
             var checkout=$('#checkout').val();
            var roomtypeid=$('#roomtypeid').val();
            var dormbed=$('#dormbed').val();

            $('#checkmodal1').modal('show');

             $.post('<?php echo base_url();?>roomsearch/roomcheck', {'checkin': checkin,'checkout':checkout,'roomtype':roomtypeid,'room_no':room_no,'dormbed':dormbed}, function (datas) {
                    
              //alert(datas);

         if(datas)
          {
                 
              $('#checkmodal1').modal('hide');
          
          }

                    else
                    {
                       $('#checkmodal1').modal('hide');

                        
                        alert(' rooms are not available');
                        $('#room_no').val('');
                        return false;
                    }

          });


             $.post('<?php echo base_url();?>roomsearch/roomtype', {'roomtype':roomtypeid}, function(datas) {
            //alert(datas);
            $('#roomtype').val(datas);

                    

          });

        $.post('<?php echo base_url();?>roomsearch/roomamount', {'roomtype':roomtypeid}, function(datas) {
            //alert(datas);
            $('#roomamount').val(datas);

                    

          });


      });
    });
</script>

<script type="text/javascript">
  function modals()
  {

    var pnrnumber=$('#pnrnumber').val();

             $.post('<?php echo base_url();?>bookingroom/checkpnr1', {'pnrnumber': pnrnumber}, function (datas) {

              
                     
                     
                      $('.cckdate').html(datas);
                              
                

          });

             $.post('<?php echo base_url();?>bookingroom/checkpnr2', {'pnrnumber': pnrnumber}, function (datas) {
                             
                      $('.rmtyps').html(datas);
                      $('.rmtyps').val(datas);
                              
              
          });

             $.post('<?php echo base_url();?>bookingroom/checkpnr3', {'pnrnumber': pnrnumber}, function (datas) {
               
                
                      $('#roomtypeids').val(datas);
                                                   
                
          });
    
  }
</script>
<script type="text/javascript">
  $(document).ready(function(){

$('#dormbed').change(function(){
   var roomtypeid=$('#roomtypeid').val();
   var dormbed=$('#dormbed').val();
   $('#adults').val('');

    $('#proc').show();
    $('.rmtprooms').hide();    
 $.post('<?php echo base_url();?>roomsearch/checknoofrooms',{'roomtypeid':roomtypeid,'dormbed':dormbed},function (data){
 $('#proc').hide();
    $('.rmtprooms').show(); 
    $('.rmtprooms').html(data);

    //alert(data);

  });
});


$('#room_no').change(function(){
   var roomtypeid=$('#roomtypeid').val();
   var room_no=$('#room_no').val();
  $('#adults').val('');
   $('#children').val('');
   if(roomtypeid==1)
        {
            
            $('#adults').val('');
             $('#adults').attr('readonly',false);
             $('#children').attr('disabled',false);
        }
        else if(roomtypeid==2)
        {
           
            $('#adults').val('');
             $('#adults').attr('readonly',false);
              $('#children').attr('disabled',false);
        }
        else if(roomtypeid==3)
        {
            
            $('#adults').val('');
            $('#adults').attr('readonly',false);
             $('#children').attr('disabled',false);
        }
        else if(roomtypeid==4)
        {
            
            $('#adults').val(room_no);
            $('#adults').attr('readonly',true);
             $('#children').attr('disabled',true);
              $('#children').val('');
        }
        
 
});

$('.rmtprooms').change(function(){
   var roomtypeid=$('#roomtypeid').val();
   var room_no=$('#room_no').val();
  $('#adults').val('');
   $('#children').val('');
   if(roomtypeid==1)
        {
            
            $('#adults').val('');
             $('#adults').attr('readonly',false);
             $('#children').attr('disabled',false);
        }
        else if(roomtypeid==2)
        {
           
            $('#adults').val('');
             $('#adults').attr('readonly',false);
             $('#children').attr('disabled',false);
        }
        else if(roomtypeid==3)
        {
            
            $('#adults').val('');
            $('#adults').attr('readonly',false);
            $('#children').attr('disabled',false);
        }
        else if(roomtypeid==4)
        {
            
            $('#adults').val(room_no);
            $('#adults').attr('readonly',true);
            $('#children').attr('disabled',true);
             $('#children').val('');
        }
        
 
});








  });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#adults').keyup(function(){
            var roomtypeid=$('#roomtypeid').val();
            var adults=$('#adults').val();
            var room_no=$('#room_no').val();

            if(roomtypeid==1)
        {
            var limit=parseFloat(room_no)*parseFloat(8)
            if(adults>limit)
            {
                alert('Only '+limit+' Adults for '+room_no+' Units');
                $('#adults').val('');
            }
            else
            {
                
            }
            
        }
        else if(roomtypeid==2)
        {
           var limit=parseFloat(room_no)*parseFloat(4)
            if(adults>limit)
            {
                alert('Only '+limit+' Adults for '+room_no+' Units');
                $('#adults').val('');
            }
            else
            {
                
            }

        }
        else if(roomtypeid==3)
        {
            
            var limit=parseFloat(room_no)*parseFloat(2)
            if(adults>limit)
            {
                alert('Only '+limit+' Adults for '+room_no+' Units');
                $('#adults').val('');
            }
            else
            {
                
            }

        }
        

        });

     $('#children').keyup(function(){
            var roomtypeid=$('#roomtypeid').val();
            var children=$('#children').val();
            var room_no=$('#room_no').val();

            if(roomtypeid==1)
        {
            var limit=parseFloat(room_no)*parseFloat(3)
            if(children>limit)
            {
                alert('Only '+limit+' Children for '+room_no+' Units');
                $('#children').val('');
            }
            else
            {
                
            }
            
        }
        else if(roomtypeid==2)
        {
           var limit=parseFloat(room_no)*parseFloat(2)
            if(children>limit)
            {
                alert('Only '+limit+' Children for '+room_no+' Units');
                $('#children').val('');
            }
            else
            {
                
            }

        }
        else if(roomtypeid==3)
        {
            
            var limit=parseFloat(room_no)*parseFloat(1)
            if(children>limit)
            {
                alert('Only '+limit+' Children for '+room_no+' Units');
                $('#children').val('');
            }
            else
            {
                
            }

        }
        

        });
    });
</script>


<script type="text/javascript">
  function a1()
  {
    var roomtypeid=$('#roomtypeid').val();
     var dormbed=$('#dormbed').val();
     
  $.post('<?php echo base_url();?>roomsearch/checknoofrooms',{'roomtypeid':roomtypeid,'dormbed':dormbed},function (data){

    $('.rmtprooms').html(data);

  });

  }
  function b1()
  {
  var roomtypeid=$('#roomtypeid').val();
   var dormbed=$('#dormbed').val();
    $('#proc').show();
    $('.rmtprooms').hide();    
  $.post('<?php echo base_url();?>roomsearch/checknoofrooms',{'roomtypeid':roomtypeid,'dormbed':dormbed},function (data){
 $('#proc').hide();
    $('.rmtprooms').show(); 
    $('.rmtprooms').html(data);

  });

  }

  function b2()
  {
    $('#adults').val('');
  var roomtypeid=$('#roomtypeid').val();
   var dormbed=$('#dormbed').val();
    $('#proc').show();
    $('.rmtprooms').hide();    
  $.post('<?php echo base_url();?>roomsearch/checknoofrooms',{'roomtypeid':roomtypeid,'dormbed':dormbed},function (data){
 $('#proc').hide();
    $('.rmtprooms').show(); 
    $('.rmtprooms').html(data);

  });

      if(roomtypeid==4)
        {
            $('.romtyp1').show();
             $('#adults').attr('readonly',true);
            $('#children').attr('disabled',true);
            $('#children').val('');
            
        }
        else
        {
           $('.romtyp1').hide();
           $('#adults').attr('readonly',false);
            $('#children').attr('disabled',false);
        }

  }
  function c1()
  {
    var roomtypeid=$('#roomtypeid').val();
     var dormbed=$('#dormbed').val();
    
  $.post('<?php echo base_url();?>roomsearch/checknoofrooms',{'roomtypeid':roomtypeid,'dormbed':dormbed},function (data){
   
    $('.rmtprooms').html(data);

  });
  }
  function d1()
  {
    var roomtypeid=$('#roomtypeid').val();
     var dormbed=$('#dormbed').val();
    
  $.post('<?php echo base_url();?>roomsearch/checknoofrooms',{'roomtypeid':roomtypeid,'dormbed':dormbed},function (data){

   
    $('.rmtprooms').html(data);

  });
  }
</script>
<script>
$('#booking_room').addClass('active');
$( "#room_book" ).removeClass( "xn-openable" ).addClass( "xn-openable active" );

</script>


