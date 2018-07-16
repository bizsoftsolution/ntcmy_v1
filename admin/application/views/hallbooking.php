<!-- START BREADCRUMB -->

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Pages</a></li>

    <li class="active">Hall Booking</li>
</ul>
<!-- END BREADCRUMB -->

               

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">


    
   
<div  class="col-md-12 padding-left" style="margin-top: 20px;">  
<div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span>Hall Booking</h2>
                </div>   
<form  id="form_hall" name="form_hall"  method="post"  >


  
    <div class="col-md-12">

   
    

      

     

    <div class="col-md-3">

     <input type="text" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()" class="form-control" name="checkindate" id="checkindate" value="" placeholder="Check In">
    </div>

    <div class="col-md-3">
    <input type="text" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()" class="form-control" name="checkoutdate" id="checkoutdate" value="" placeholder="Check Out">
    </div>


       <div class="col-md-3">
    <select class="form-control" name="auditorium" id="auditorium" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()">
    <option value="">Select Auditorium</option>
                                 <?php 
                                  $halltyp =mysql_query("SELECT * FROM halltypes  GROUP BY auditorium");
                                  while($row = mysql_fetch_array($halltyp))
                                  {
                                    $auditorium=$row['auditorium'];

                                  ?>
                                     <option value="<?php echo $row['auditorium'];?>"><?php echo $row['auditorium'];?></option> 
                                      <?php
                                      }
                                      ?>
                                </select>

   
    </div>
    
    
    <div class="col-md-3">
      <div id="proc" style="text-align: center; font-weight: bold; color: red; font-size: 15px;display:none;">Processing...</div>
    <div class="halltypes">
    <select class="form-control" name="halltype" id="halltype" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()">
      <option value="">Select Hall Type</option>
    </select>
    </div>
    </div>
 <input type="hidden" name="bookingtype" id="" class="" value="Direct Booking">
 <input type="hidden" name="numberofdays" id="numberofdays" class="numberofdays" value="">
 <input type="hidden" name="hallamount" id="hallamount" class="hallamount" value="">
 <input type="hidden" name="seats" id="seats" class="seats" value="">

    </div>

    <div class="clear-fix"></div>

    <div class="col-md-12">

     <div class="col-md-3">
    <select class="form-control" name="slot" id="slot" >
    <option value="">Select Slot</option>
    <option value="Slot I">Slot I</option>
    <option value="Slot II">Slot II</option>
    <option value="Slot III">Slot III</option>
    <option value="Slot I & II">Slot I & II</option>
    <option value="Slot I & III">Slot I & III</option>
    <option value="Slot II & III">Slot II & III</option>
    <option value="Slot I & Slot II & III">Slot I & Slot II & III</option>
      </select>
    </div>
    
     <div class="dddd" style="display:none;"> </div>
       <div class="col-md-3">
      <input value="" placeholder="Nube Member Id" class="form-control" name="nubememberid" id="nubememberid" type="text">
      </div>

       <div class="col-md-3">
    <input value="" placeholder="IC Number" class="form-control" name="icnumber" id="icnumber" type="text">
    </div>


    <div class="col-md-3">
    
    <input value="" placeholder="First Name" class="form-control required" name="firstname" id="firstname" type="text">
    </div>

      </div>

      <div class="clear-fix"></div>

      <div class="col-md-12">

     

    <div class="col-md-3">
    <input value="" placeholder="Last Name" class="form-control" name="lastname" id="lastname" type="text">
    </div>

     
    
    <div class="col-md-3">
    <input value="" placeholder="Email" class="form-control" name="email" id="email" type="text">
    </div>

    <div class="col-md-3">
    <input value="" placeholder="Mobile No" class="form-control" name="mobile" id="mobile" type="text">
    </div>

   
    <div class="col-md-3">
    <input value="" placeholder="Line 1" class="form-control" name="line1" id="line1" type="text">
    </div>

    </div>

<div class="clear-fix"></div>

<div class="col-md-12">


    
    
    <div class="col-md-3">
    <input value="" placeholder="Line 2" class="form-control" name="line2" id="line2" type="text">
    </div>

    

    <div class="col-md-3">
    <input value="" placeholder="City" class="form-control" name="city" id="city" type="text">
    </div>

     

    <div class="col-md-3">
    <input value="" placeholder="State" class="form-control" name="state" id="state" type="text">
    </div>

    <div class="col-md-3">
    <input value="" placeholder="Postcode" class="form-control" name="postcode" id="postcode" type="text">
    </div>

    
</div>
     
     <div class="clear-fix"></div>

     <div class="col-md-12">

    

     

    

   
    
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
  
    

    <div class="col-md-10" style="margin-left: 30px; margin-top: 15px;">
     <input type="submit"  id="submit" class="btn btn-success btn-lg btn-block load" value="Book">
      <div id="loading" style="text-align: center; font-weight: bold; color: red; font-size: 20px;display:none;">Processing...</div>
    </div>
  </div>
  </div>
    
    
    
    
    
</form>
    
    
    </div>

<div class="col-md-12" style="margin-top: 25px;">
      <div class="succ"></div>
</div>
                      

<div id="pnrch">
<div class="col-md-12 block text-center" style="margin-top: 20px;">

     <form class="form-inline" role="form">       

<div class="form-group">

<label class="control-label" style="margin-top: -9px;">Reservation Number:</label>  

<input type="text" class="form-control" name="pnr_number" id="pnr_number" style="margin-left: 5px;text-transform: uppercase;" value="" />

<a href="#" onclick="modals();" class="btn btn-primary" id="checkpnr" type="button" style="margin-left: 45px; margin-top: -9px;">Submit</a>
</div>
</form>

<div class="clearfix"></div>
<div class="cckdate"></div>

</div>
                                                                                                                       
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
                        
           <form id="form_2"  method="post" action="<?php echo  base_url();?>hallbooking/checkinhall" target="_blank" onsubmit="setTimeout(function () { location.href = '<?php echo base_url();?>dashboard'; })">   
                           
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
       Auditorium: 
        </div>
        <div  class="col-md-3">
        <div class="auditoriums"></div>
        </div> 
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

          <div class="col-md-12" style="font-weight: bold;text-align: center;">
          <h2>Facilities</h2>
          </div>

           <div class="col-md-12" style="font-weight: bold;">


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
          <input type="hidden" id="hours" value="" class="form-control " placeholder="Hours" name="hours[]" /> 
    
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
         Total Facilities Amount
        </div>
        <div  class="col-md-3">
         <div class="amount">0.00</div>
         <input type="hidden" id="amount" style="text-align: right; padding-top: 7px;" class="form-control" value="" name="facilitiesamount"/> 
        </div>
        <div class="clearfix"></div> 

        <div  class="col-md-6" style="text-align: right;">
        Hall Amount&nbsp;(<span class="hlamnt"></span>X<span class="slamnt"></span>)
        </div>
        <div  class="col-md-3">
         <div class="hallamount">0.00</div>
         <input type="hidden" id="hall_amount" style="text-align: right; padding-top: 7px;" class="form-control" value="" name="hallamount"/> 
        </div>
        <div class="clearfix"></div> 

       <!--  <div  class="col-md-6" style="text-align: right;">
         Chairs Rent (<span class="seats1"></span>X2.00)
        </div>
        <div  class="col-md-3">
         <div class="chairsrent">0.00</div>
         
        </div> -->
        <input type="hidden" id="" style="text-align: right; padding-top: 7px;" class="form-control" value="" name="chairsrent"/> 
        <div class="clearfix"></div> 

        <div  class="col-md-6" style="text-align: right;">
         Cleaning Charge
        </div>
        <div  class="col-md-3">
         <div class="cleaningcharge">20.00</div>
         <input type="hidden" id="cleaningcharge" style="text-align: right; padding-top: 7px;" class="form-control" value="20.00" name="cleaningcharge"/> 
        </div>
        <div class="clearfix"></div> 

        <div  class="col-md-6" style="text-align: right;">
        Total Amount
        </div>
        <div  class="col-md-3">
         <div class="totalamount">0.00</div>
         <input type="hidden" id="totalamount" style="text-align: right; padding-top: 7px;" class="form-control" value="" name="totalamount"/> 
        </div>
        <div class="clearfix"></div>


        <div  class="col-md-6" style="text-align: right;">
        Online Paid Amount
        </div>
        <div  class="col-md-3">
         <input type="text" id="advanceamount" style="padding-top: 7px;" class="form-control" onkeyup="advance_amount()"  name="advanceamount" required > 
        </div>
        <div class="clearfix"></div>
        <div  class="col-md-6" style="text-align: right;">
        Balance Amount
        </div>
        <div  class="col-md-3">
        <div class="balanceamount">0.00</div>
         <input type="hidden" id="balanceamount" style="text-align: right; padding-top: 7px;" class="form-control" value="" name="balanceamount" /> 
        </div>
        <div class="clearfix"></div>
        <div  class="col-md-6" style="text-align: right;">
        Excess Amount
        </div>
        <div  class="col-md-3">
        <div class="excessamount">0.00</div>
         <input type="hidden" id="excessamount" style="text-align: right; padding-top: 7px;" class="form-control"  name="excessamount" /> 
        </div>
        <div class="clearfix"></div>
       

       <input type="hidden" id="hide" value="1" />  

       
      <input type="hidden" id="" class="form-control" placeholder="From" value="<?php echo date('Y-m-d');?>" name="checkindates"  />
       
      <input type="hidden" id="time" class="form-control" placeholder="time" value="" name="checkintime"  />

      <input type="hidden" id="pnrnumber" class="form-control" placeholder="time" value="" name="pnrnumber"  />

       <input type="hidden" id="seats1" class="form-control" placeholder="time" value="" name="seats1"  />

    </div>
                           
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




<style type="text/css">
    #pnrch{
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
    $('#checkindate').datepicker({
startDate: "d",
format: "dd/mm/yyyy",
autoclose: true,
todayHighlight: true
});
});

 $(document).ready(function(){
 var a = $('#checkindate').val();
 $('#checkoutdate').datepicker({
                
                startDate: a,
                format: "dd/mm/yyyy",
                autoclose: true,
                todayHighlight: true
                }); 


            $('#checkindate').change(function(){
            $('#checkoutdate').val('');
            $('#checkoutdate').datepicker("remove");
            var a = $('#checkindate').val();

            
            $('#checkoutdate').datepicker({
                
                startDate: a,
                format: "dd/mm/yyyy",
                autoclose: true,
                todayHighlight: true
                }); 
        })
    });
    


</script>

    <script src="<?php echo base_url();?>assests/timepicker/timepicki.js"></script>
    <script>
  $('#checkintime').timepicki();
  $('#checkouttime').timepicki();
    </script>

    <script type="text/javascript">

  $(function(){
    $("#form_hall").submit(function(){

      if( $("#form_hall").valid())
      {



      dataString = $("#form_hall").serialize();

      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>hallbooking/hall_books",
        data: dataString,

          beforeSend: function(data){

                $('#loading').show();
                $('.load').hide();
              },


        success: function(data){

               $('#form_hall')[0].reset();

              $('#loading').hide();
                    $('.load').show();
            $('#pnrch').show();
            $('.succ').html(data); 


            

}

});

return false;  //stop the actual form post !important!
 }
});

   });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#slot').change(function(){

            var checkindate=$('#checkindate').val();
            var checkoutdate=$('#checkoutdate').val();
            var numofdays=$('#numberofdays').val();
            var halltype=$('#halltype').val();
            var auditorium=$('#auditorium').val();
            var slot=$('#slot').val();

             $('#checkmodal1').modal('show');
      $.post('<?php echo base_url();?>hallbooking/check_halltype',{'checkindate': checkindate,'checkoutdate': checkoutdate,'numofdays': numofdays,'halltype':halltype,'slot':slot,'auditorium':auditorium},function (data){

         //alert(data);
          $('#checkmodal1').modal('hide');
            if(data)
            {

              alert('Hall not available');
              $('#slot').val('');
            }
            else
            {

                  $.post('<?php echo base_url();?>hallbooking/hallamount', {'auditorium':auditorium,'halltype':halltype}, function(datas) {
                //alert(datas);
                $('#hallamount').val(datas);

                        

              });

            $.post('<?php echo base_url();?>hallbooking/hallseat', {'auditorium':auditorium,'halltype':halltype}, function(datas) {
                //alert(datas);
                $('#seats').val(datas);

                        

              });

            }

           

        

      });

//number of days---------------

     var checkindates = checkindate.split("/").reverse().join(",");
    var checkoutdates = checkoutdate.split("/").reverse().join(",");

                 var oneDay = 24 * 60 * 60 * 1000;  
                var firstDate = new Date(checkindates);
                var secondDate = new Date(checkoutdates);
 
    var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime()) / (oneDay)));
     
        
        if(diffDays=='0') 
        {
           
           $('.numberofdays').val('1'); 
        }
        else
        {
            
            $('.numberofdays').val(diffDays+1); 
        }




    });

  });
</script>
<script type="text/javascript">
$(document).ready(function(){


    $('#auditorium').change(function(){
        var auditorium=$('#auditorium').val();
         $('#proc').show();
    $('.halltypes').hide();    
         $.post('<?php echo base_url();?>hallbooking/hall_typecheck',{'auditorium':auditorium},function (data){
           $('#proc').hide();
    $('.halltypes').show();    

            $('.halltypes').html(data);

        });



    });



   
});

</script>
<script type="text/javascript">
  function modals()
  {

    var pnrnumber=$('#pnr_number').val();

             $.post('<?php echo base_url();?>hallbooking/checkpnrhall', {'pnrnumber': pnrnumber}, function (datas) {

              
                     //alert(datas);
                     
                      $('.cckdate').html(datas);
                              
                

          });

            

  }
</script>
<script type="text/javascript">
  function a1()
  {
   $('#slot').val('');
  }
  function b1()
  {
   $('#slot').val('');
  }
  function c1()
  {
   $('#slot').val('');
  }
  function d1()
  {
   $('#slot').val('');
  }
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
         var hallamount=$('#hall_amount').val();
         var chairsrent=$('#chairsrent').val();
         var cleaningcharge=$('#cleaningcharge').val();
         $('#advanceamount').val('');

              sub_tot +=Number($(this).val());          
              var fina=sub_tot.toFixed(2);         
              $('#amount').val(fina);
               $('.amount').html(fina);

               var fin=parseFloat(fina)+parseFloat(hallamount)+parseFloat(cleaningcharge);
               var fins=fin.toFixed(2);
               $('#totalamount').val(fins);
               $('.totalamount').html(fins);
              
              });



      $('.remove').click(function(){     
              $(this).parents('tr').remove(); 
                     var sub_tot=0;
       
       $('input[name^="rate"]').each(function(){
         var hallamount=$('#hall_amount').val();
         var chairsrent=$('#chairsrent').val();
         var cleaningcharge=$('#cleaningcharge').val();
         $('#advanceamount').val('');

              sub_tot +=Number($(this).val());          
              var fina=sub_tot.toFixed(2);         
              $('#amount').val(fina);
               $('.amount').html(fina);

               var fin=parseFloat(fina)+parseFloat(hallamount)+parseFloat(cleaningcharge);
               var fins=fin.toFixed(2);
               $('#totalamount').val(fins);
               $('.totalamount').html(fins);
              
              });
      
              });




      $('#features'+total+'').change(function(){

      var features=$('#features'+total+'').val();
       var seatss=$('#seats1').val();
	   
	   if(features=='LCD Projector with screen')
      {
        $('#rate'+total+'').val('');
        $('#hrs'+total+'').html('');
        $('#hours'+total+'').val('');
      }

      else if(features=='LCD Projector with screen')
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
         var hallamount=$('#hall_amount').val();
         var chairsrent=$('#chairsrent').val();
         var cleaningcharge=$('#cleaningcharge').val();
         $('#advanceamount').val('');

              sub_tot +=Number($(this).val());          
              var fina=sub_tot.toFixed(2);         
              $('#amount').val(fina);
               $('.amount').html(fina);

               var fin=parseFloat(fina)+parseFloat(hallamount)+parseFloat(cleaningcharge);
               var fins=fin.toFixed(2);
               $('#totalamount').val(fins);
               $('.totalamount').html(fins);
              
              });


    });



  $('#rate'+total+'').keyup(function(){

     var sub_tot=0;
       
       $('input[name^="rate"]').each(function(){
         var hallamount=$('#hall_amount').val();
         var chairsrent=$('#chairsrent').val();
         var cleaningcharge=$('#cleaningcharge').val();
         $('#advanceamount').val('');

              sub_tot +=Number($(this).val());          
              var fina=sub_tot.toFixed(2);         
              $('#amount').val(fina);
               $('.amount').html(fina);

               var fin=parseFloat(fina)+parseFloat(hallamount)+parseFloat(cleaningcharge);
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
       var seatss=$('#seats1').val();
	   
	   if(features=='')
      {
        $('#rate').val('');
        $('#hrs').html('');
        $('#hours').val('');
      }

      else if(features=='LCD Projector with screen')
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
         var hallamount=$('#hall_amount').val();
         var chairsrent=$('#chairsrent').val();
         var cleaningcharge=$('#cleaningcharge').val();
         $('#advanceamount').val('');

              sub_tot +=Number($(this).val());          
              var fina=sub_tot.toFixed(2);         
              $('#amount').val(fina);
               $('.amount').html(fina);

               var fin=parseFloat(fina)+parseFloat(hallamount)+parseFloat(cleaningcharge);
               var fins=fin.toFixed(2);
               $('#totalamount').val(fins);
               $('.totalamount').html(fins);
              
              });


    });


$('#rate').keyup(function(){
    
    var sub_tot=0;
       
       $('input[name^="rate"]').each(function(){
         var hallamount=$('#hall_amount').val();
         var chairsrent=$('#chairsrent').val();
         var cleaningcharge=$('#cleaningcharge').val();
         $('#advanceamount').val('');

              sub_tot +=Number($(this).val());          
              var fina=sub_tot.toFixed(2);         
              $('#amount').val(fina);
               $('.amount').html(fina);

               var fin=parseFloat(fina)+parseFloat(hallamount)+parseFloat(cleaningcharge);
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
<script type="text/javascript" language="javascript">
function redirect()
{
    window.location.href="<?php echo base_url();?>dashboard";
}
</script>

   <script>
$('#hall_bookings').addClass('active');
$( "#hall_books" ).removeClass( "xn-openable" ).addClass( "xn-openable active" );

</script> 
    

  


