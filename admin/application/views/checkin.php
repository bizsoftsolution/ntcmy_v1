<!-- START BREADCRUMB -->

<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Pages</a></li>

    <li class="active">Booking Units</li>
</ul>
<!-- END BREADCRUMB -->

               

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">


    
   
<form method="post" action="<?php echo base_url();?>bookingroom/room_book" id="book_frm" name="book_frm" target="_blank" onsubmit="setTimeout(function () { location.href = '<?php echo base_url();?>dashboard'; })">
    <div class="row" style="margin-top: 15px; margin-bottom: 15px;">
        <div class="col-sm-3">
        </div>
        <div class="date-pickback">

        <?php 
        foreach ($dateroom as $da ) {
           
       
        $from=$da['datefrom'];
        $pnrnumber=$da['pnrnumber'];
        $roomtypeid=$da['roomtypeid'];
        $noofrooms=$da['noofrooms'];
      

      $bookingrooms1=$this->db->where('pnr_number',$pnrnumber)->get('bookingrooms')->result_array();

        foreach ($bookingrooms1 as $bbk) {
            $bookingtype=$bbk['bookingtype'];
            $nubememberid=$bbk['nubememberid'];
            $onlinepayment=$bbk['onlinepayment'];
             $depositamounts=$bbk['depositamount'];
             $drombed=$bbk['drombed'];

        }

        ?>

    <div  class="col-sm-3">
        <div class="form-group">

    <div class='input-group date' >

     <span style="font-weight: bold; font-size: 15px;">Date :<?php $date1=$da['datefrom']; $datefrom=date('d-m-Y',strtotime($date1)); echo $datefrom;?></span>

    </div>
                    <div id="datesvalid1"></div>
                </div>
            </div>


    <div  class="col-sm-3">
        <div class="form-group">
            <div class='input-group date' >
            <span style="font-weight: bold; font-size: 15px;"> Time : <span id="times"></span></span>
            </div>

        </div>
    </div>

    <div  class="col-sm-3">
        <div class="form-group">
            <div class='input-group date' >
            <span style="font-weight: bold; font-size: 15px;"> No of Units Book : <?php echo $noofrooms;?></span>
            </div>

        </div>
    </div>

             <input type='hidden' id='fromdate' class="form-control" placeholder="From" name='date1' value="<?php $date1=$da['datefrom']; $datefrom=date('d-m-Y',strtotime($date1)); echo $datefrom;?> " />

             <input type='hidden' id='noofrooms' class="form-control" placeholder="From" name='noofrooms' value="<?php echo $noofrooms;?> " />

        </div>

        <div class="col-sm-3">
        </div>
        <?php
        }
        ?>

    </div>



     <?php
     $roomtype=$this->db->where('id',$roomtypeid)->where('status',1)->get('roomtypes')->result_array(); 

     foreach ($roomtype as $a) :

                $memberweekdaysamount=$a['memberweekdaysamount'];
                $memberweekendamount=$a['memberweekendamount'];
                $publicweekdaysamount=$a['publicweekdaysamount'];
                $publicweekendamount=$a['publicweekendamount'];

        if($bookingtype=='Online Booking')
        {

            $roomamount=0;
            $advance_amount=$onlinepayment-$depositamounts;
            $depositamount=$depositamounts;
        }
        else
        {
					 $typea =$this->db->get('publicholidays')->result_array();
     
            $holidaysdate[]=array();


           foreach ($typea as $rowa) 
  
            {
                 $holidaysdate[]=$rowa['holidaysdate'];

           } 


            if(in_array($from,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }
				
                $advance_amount='0';
                 $depositamount='';

                        $timestamp = strtotime($from);
                        //$timestamp = strtotime('2016-04-30');
                        $checkinday = date('D', $timestamp);

                         if($nubememberid=='')
                     {  
                        if($checkinday=='Fri' || $checkinday=='Sat'|| $pub=='PUB')
                        {
                            $roomamount=$publicweekendamount;
                        }
                        else
                        {


                            $roomamount=$publicweekdaysamount;
                        }

                     }
                     else
                     {

                            if($checkinday=='Fri' || $checkinday=='Sat'|| $pub=='PUB')
                        {
                            $roomamount=$memberweekendamount;
                        }
                        else
                        {

                            $roomamount=$memberweekdaysamount;
                        }


                     }

           
        }




        ?>
       <div class="row">
       <div class="col-md-4 col-sm-12">
        </div>
        <div class="col-md-4 col-sm-12">
    <!-- PAGE TITLE -->
   
        <div class="page-title"> 

    <h4><span class="fa fa-star"></span><?php echo $a['roomtype'];?> Rooms </h4>
</div>
<input type="hidden" id="nubememberid" name="nubememberid" value="<?php echo $nubememberid;?>">
<input type="hidden" id="room_type" name="room_type" value="<?php echo $a['roomtype'];?>">
<input type="hidden" id="bookingtype" name="bookingtype" value="<?php echo $bookingtype;?>">
<input type="hidden" id="roomamount" name="roomamount" value="<?php echo $roomamount;?>">
<input type="hidden" id="room_type_id" name="room_type_id" value="<?php echo $a['id'];?>">
 
<!-- END PAGE TITLE --> 
</div>
<div class="col-md-4 col-sm-12">
        </div>
</div>
<?php 
    $id=$a['id'];
    if($roomtypeid==4)
    {

          $data=$this->db->where('roomtypeid',$id)->where('drombed',$drombed)->get('roomnotable')->result_array();
    }
    else
    {
        $data=$this->db->where('roomtypeid',$id)->get('roomnotable')->result_array();
    }


   
?>

    <div class="row">
        <div class="col-md-1 col-sm-12">
        </div>



        <div class="col-md-10 col-sm-12">

            <div class="book_border">        
                <div class="form-group">
                    <div class="items-collection">
                   
                    <?php
                    foreach ($data as $b) {
                       


                        //foreach ($roombok as $c) :
                            
                            $get_check_room_booked = get_check_room_booked($b['roomno']);
                            //$roomno=explode('|',$c['roomno']);

                       
                      //if(in_array($b['roomno'], $roomno))
                            $ff="";
                            //echo $get_check_room_booked;
                            if($get_check_room_booked > 0)
                            {
                               // $ff = "disactive disabled";
                            }
                            
                        ?>



                        <div data-toggle="buttons" class="btn-group bizmoduleselect">
                            <label class="btn btn-default customcheckbtn  <?php echo $ff; ?>" id="btnc">
                                <div class="itemcontent">
                    
                                    <input type="checkbox"  class="roomnos"  name="roomno[]" id="roomno<?php echo $b['roomno'];?>" autocomplete="off"  value="<?php echo $b['roomno'];?>">

                                    
                                     <h5><?php echo $b['roomno'];?></h5> 
                                </div>
                            </label>
                        </div>
                       
                        <?php
                        //endforeach;
                       

                       }?>


                      
                    </div>
                </div>               

            </div>
            
        </div>
        <div class="col-md-1 col-sm-12">
        </div>
    </div>

<?php endforeach;?>
<input type="hidden" id="time" class="form-control" placeholder="time" value="" name="time"  />
  <input type="hidden" id="count" name="count"> 
 <input type="hidden" id="totamount" name="totamount"> 
 <input type="hidden" id="roundamount" name="roundamount"> 
 <input type="hidden" id="extrabedamount" name="extrabedamount">

  


              <div class="row">
            <div class="col-md-12" style="text-align: center; margin-top: 15px; margin-bottom: 15px;">


             <a href="#bookingroom" id="proce"  class="btn btn-default btn-bookroom" >Processed</a>
             </div>
            </div> 

<!-- modalfade -->
            <div class="modal fade" id="bookingroom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                    <img class="" id="img_logo" src="<?php echo base_url();?>assests/img/logo.png">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms" style="margin-top: -13px;">
                
                        <div class="modal-body">
                         <h2><p style="text-align: center;">Please Enter booking details</p></h2>

                            <div class="col-md-3">
                            <label>Check IN :</label>
                            </div>

                            <div class="col-md-3">
                            <div id="checkin" style="font-weight: bold; font-size: 14px;"></div>
                            </div>

                            <div class="clearfix"></div>
                             <div class="col-md-3">
                            <label>Room No :</label>
                            </div>

                            <div class="col-md-9">
                            <div id="roomnos" style="font-weight: bold; font-size: 14px;"></div>
                            </div>

                             <div class="clearfix"></div>

                             <?php 

                             $datas=$this->db->where('pnr_number',$pnrnumber)->get('bookingrooms')->result_array();

                              foreach ($datas as $e):
                             ?>
                            
                            <div style="margin-top:10px;"></div>

                            <div class="col-md-6">
                             <label>Reservation Number</label>
                            </div>
                            <div class="col-md-6">
                            <input id="" class="form-control" type="hidden" name="pnrnumber" value="<?php echo $e['pnr_number'];?>" >
                            <span style="font-weight: bold;"><?php echo $e['pnr_number'];?></span>
                            </div>
                            <div class="clearfix"></div>

                             <div class="col-md-6">
                             <label>Name</label>
                            </div>
                            <div class="col-md-6">
                            <input id="register_email" class="form-control" type="hidden" name="name" value="<?php echo $e['firstname'];?> <?php echo $e['lastname'];?>" >
                            <span style="font-weight: bold;"><?php echo $e['firstname'];?> <?php echo $e['lastname'];?></span>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6">
                            <label>Email</label>
                            </div>
                             <div class="col-md-6">
                            <input id="register_email" class="form-control" type="hidden" name="email" value="<?php echo $e['email'];?>" >
                            <span style="font-weight: bold;"><?php echo $e['email'];?></span>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6">
                            <label>Mobile No</label>
                            </div>
                             <div class="col-md-6">
                            <input id="register_email" class="form-control" type="hidden" name="mobileno" value="<?php echo $e['mobile'];?>" >
                            <span style="font-weight: bold;"><?php echo $e['mobile'];?></span>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6">
                            <label>Number Of Adults</label>
                            </div>
                             <div class="col-md-6">
                            <input type="hidden" class="form-control" name="noofadults" id="adults" value="<?php echo $e['adults'];?>">
                             <span style="font-weight: bold;"><?php echo $e['adults'];?></span>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6">
                            <label>Number Of Children</label>
                            </div>
                             <div class="col-md-6">
                            <input class="form-control" type="hidden" name="children" id="children" value="<?php echo $e['children'];?>">
                             <span style="font-weight: bold;"><?php echo $e['children'];?></span>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6">
                            <label>Extra Bed</label>
                            </div>
                             <div class="col-md-6">
                            <input type="hidden" value="<?php echo $e['extra_bed'];?>" class="form-control" name="extrabed" id="extra_bed">
                            <span style="font-weight: bold;"><?php echo $e['extra_bed'];?></span>
                            </div>
                            <div class="clearfix"></div>
                        <?php endforeach;

                       
                        ?>

                             <div class="col-md-6">
                            <label>Online Paid Amount</label>
                            </div>
                             <div class="col-md-6">
                             <input id="advance_amount" class="form-control" type="number" name="advance_amount" value="<?php echo $advance_amount;?>" >

                             <input id="excessamount" class="form-control" type="hidden" name="excessamount" value="" >
                            </div>
                            <div class="clearfix"></div>

                            <!-- <div class="col-md-6">
                            <label>Deposit Amount</label>
                            </div> -->
                           <!--   <div class="col-md-6">
                             <select name="depositamountss" id="depositamountss" value="" class="form-control">
                                 <option value=""<?php if($depositamount==''){ echo 'selected';}?>> Select Deposit Amount</option>
                                 <option value="50"<?php if($depositamount=='50'){ echo 'selected';}?>>RM 50/- for Individuals</option>
                                 <option value="100"<?php if($depositamount=='100'){ echo 'selected';}?>>RM 100 for Family</option>
                                 <option value="500"<?php if($depositamount=='500'){ echo 'selected';}?>>RM 500.00 for Groups</option>
                             </select>

                              <input type="hidden" name="depositamount" id="depositamount" value="<?php echo $depositamount;?>" class="form-control">
                           
                            </div> -->
                            <div class="clearfix"></div>

                             <div class="col-md-3">
                            </div>

                            <?php if($bookingtype=='Online Booking')
                            {

                            }
                            else
                            {


                            ?>
                             <div class="col-md-6">
                               <label style="font-weight: bold; font-size: 17px; color: black;">Booking Tariff</label>
                             </div>
                             <div class="col-md-3">
                             </div>
                            <div class="clearfix"></div>

                           <div class="col-md-6">
                           <div id="roomtraiff"></div>
                            </div>
                             <div class="col-md-6">
                              <div id="roomamounts"></div>
                             </div>

                             

                            <div class="clearfix"></div>
                             <div class="col-md-6" style="font-weight: bold; font-size: 16px;">
                           <label>Amount</label>
                            </div>
                             <div class="col-md-6">
                              <div id="totamounts" style="font-weight: bold; font-size: 16px;"></div>
                             </div>


                             <div class="clearfix"></div>
                             <!-- <div class="col-md-6">
                           <label>Extra Bed</label>
                            </div> -->
                            <!--  <div class="col-md-6">
                               <div id="extrabedamounts"></div>
                             </div> -->


                           <!--  <div class="clearfix"></div> -->

                            

                           

                            <div class="col-md-6" style="font-weight: bold; font-size: 16px;">
                           <label>Total Amount</label>
                            </div>
                             <div class="col-md-6">
                              <div id="roundamounts" style="font-weight: bold; font-size: 16px;"></div>
                             </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6">
                           <label>Advance</label>
                            </div>
                             <div class="col-md-6">
                              <div id="advanceamounts"></div>
                             </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6">
                           <label>Excess Amount</label>
                            </div>
                             <div class="col-md-6">
                              <div id="excessamounts"></div>
                             </div>
                            <div class="clearfix"></div>
                               
                              <?php } ?>

                        </div>
                        <div class="modal-footer">
                         <div class="col-md-6">
                                <button type="button" class="btn btn-danger btn-lg btn-block" data-dismiss="modal" aria-label="Close">No</button>
                            </div>
                         <div class="col-md-6">
                                <input type="submit" id="submit" class="btn btn-success btn-lg btn-block" value="Book" >
                            </div>

                                                        
                        </div>
                    
                    <!-- End | Register Form -->
                    
                </div>
                <!-- End # DIV Form -->
                
            </div>
        </div>
    </div>

 

</form>


</div>
<!-- END PAGE CONTENT WRAPPER -->                       

</div>            
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<style type="text/css">
    #extrabed{
        display:none;
    }
</style>

 <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/bootstrap/bootstrap.min.js"></script>

<script type= "text/javascript" src = "<?php echo base_url();?>assests/datepicker/bootstrap-datepicker.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#fromdate').datepicker({

            format: "dd-mm-yyyy",
            startDate: "1d",
            //endDate: "0d",
            autoclose: true,
            todayHighlight: true,
            toggleActive: true
            });

        $('#fromdate').change(function(){

           var ddd=$('#fromdate').val();

            
            $('#todate').datepicker("remove");
            $('#todate').val('');

        $('#todate').datepicker({

            format: "dd-mm-yyyy",
            startDate: ddd,
            //endDate: "0d",
            autoclose: true,
            todayHighlight: true,
            //toggleActive: true
            });

         });

    });
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

<script type="text/javascript">
    $(document).ready(function(){
        $('#proce').click(function(){

           var a= $('#fromdate').val();
           var b= $('#todate').val();
        // alert(a);
            $('#checkin').html(a);
            $('#checkout').html(b);

                    

        });

    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#proce").click(function(){
            var favorite = [];
            $.each($("input[name='roomno[]']:checked"), function(){            
                favorite.push($(this).val());
            });
            
            $('#roomnos').html(favorite.join(", "));

        });
    });
</script>








<script type="text/javascript">
 <?php foreach ($roomtype as $a1) :
 $ids=$a1['id'];
        $datas=$this->db->where('roomtypeid',$ids)->get('roomnotable')->result_array();
     foreach ($datas as $b1) {

         echo $b1['roomno'];
       ?>



    $(document).ready(function() {

        $("#roomno<?php echo $b1['roomno'];?> ").change(function(){
            $('#count').val(document.querySelectorAll("input[name='roomno[]']:checked").length);
        });
    });


    <?php
}
endforeach;
    ?>
</script>
<script type="text/javascript">


$(document).ready(function() {
        $(".bizmoduleselect").click(function(){

            var count=$('#count').val();
            var noofrooms=$('#noofrooms').val();

         var counts= parseFloat(count) + parseFloat('1'); ;

           if(noofrooms < counts )
            {

                alert('You can only select a maximum of '+noofrooms +' Units');

                 $(".amount").attr("checked", false);
                 $(".roomtypes").attr("checked", false);
                 $(".roomnos").attr("checked", false);
                 $('#count').val('');

                if($(".roomnos").attr("checked", false)) {

                     $(".customcheckbtn").removeClass("active");
                        
                    } else {
                        
                    }
                

                return false;
            }

            else
            {

            }

        });
  });          
    
</script>

<script type="text/javascript">

    $(document).ready(function() {
        $("#proce ").click(function(){

       var data = $("#room_type").val();
        var count=$("#count").val();
        var roomamount=$('#roomamount').val();

    $("#roomtraiff").html(data);
    $("#roomamounts").html(roomamount +"&nbsp;x&nbsp;"+ count);

    var total=parseFloat(roomamount)*parseFloat(count);
    var totalamount=total.toFixed(2);

    $('#totamount').val(totalamount);
     $('#totamounts').html(totalamount);

    //$("#roomcount").html(count);

 });
    });

</script>

<script type="text/javascript">

    $(document).ready(function() {
        $("#proce ").click(function(){

         
            var totamount=$('#totamount').val();

            

                    var aa=parseFloat(totamount);
                    var bb=aa.toFixed(2);  

                    $('#roundamount').val(bb);
                    $('#roundamounts').html(bb);

                    // $('#extrabedamount').val(extrabed);
                    // $('#extrabedamounts').html(extrabed);
                


       
        


});

    });

</script>
<script type="text/javascript">

    $(document).ready(function() {
        $("#advance_amount").keyup(function(){

            var advance= $("#advance_amount").val();
            var roundamount=$('#roundamount').val();

            var excess=parseFloat(advance)-parseFloat(roundamount);

            var excessamount=excess.toFixed(2);

            $('#excessamount').val(excessamount);
            $('#excessamounts').html(excessamount);


           $("#advanceamounts").html(advance);

    });

}); 

</script>       

<script type="text/javascript">

    $(document).ready(function() {
        $("#proce ").click(function(){
            var bookingtype=$('#bookingtype').val();
            if(bookingtype=='Online Booking')
            {
                $("#excessamounts").html('');
           $("#excessamount").val('');
           $("#advance_amount").attr('readonly',true);
           $("#depositamountss").attr('disabled',true);
            }
            else
            {
                $("#advance_amount").attr('readonly',false);
                 $("#depositamountss").attr('disabled',false);
             $("#advance_amount").val('');
            $("#advanceamounts").html('');
           $("#excessamounts").html('');
           $("#excessamount").val('');
            }
           

var x = document.forms["book_frm"]["date1"].value;
//var y = document.forms["book_frm"]["date2"].value;
//var z = document.forms["book_frm"]["roomno[]"].checked;

    // if (x == null || x == "") {
    //     alert('Please enter check in date');
       
    //     return false;
    // }
    // if (y == null || y == "") {
    //     alert('Please enter check out date');
       
    //     return false;
    // }
    var chks = document.getElementsByName('roomno[]');
    var hasChecked = false;
    for (var i = 0; i < chks.length; i++)
    {
        if (chks[i].checked)
        {
        hasChecked = true;
        break;
        }
    }

    if (hasChecked == false)
        {
        alert("Please select at least one room.");
        return false;
        }



         
    else
    {
        $('#proce').attr('data-toggle', 'modal');  

    }



});


$('#depositamountss').change(function(){
  var depositamountss=$('#depositamountss').val();
  $('#depositamount').val(depositamountss);

});



    });

</script>
<script type="text/javascript">

    $(document).ready(function() {
        $("#book_frm ").submit(function(){

var a = document.forms["book_frm"]["name"].value;
var b = document.forms["book_frm"]["email"].value;
var c = document.forms["book_frm"]["mobileno"].value;
var d = document.forms["book_frm"]["depositamount"].value;
//var z = document.forms["book_frm"]["roomno[]"].checked;

    if (a == null || a == "") {
        alert('Please enter check name');
       
        return false;
    }
    if (b == null || b == "") {
        alert('Please enter valid email');
       
        return false;
    }

    if (c == null || c == "") {
        alert('Please enter mobileno');
       
        return false;
    }

    if (d == null || d == "") {
        alert('Please select deposit amount');
       
        return false;
    }
             
    else
    {
         return true;  

    }



});

    });

</script>

<script type="text/javascript" language="javascript">
function redirect()
{
    window.location.href="<?php echo base_url();?>dashboard";
}
</script>
<script>
$('#check_in').addClass('active');
$( "#room_book" ).removeClass( "xn-openable" ).addClass( "xn-openable active" );

</script>


