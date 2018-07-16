<!-- START BREADCRUMB -->
<ul class="breadcrumb">
<li><a href="#">Home</a></li>
<li><a href="#">Settings</a></li>
<li class="active">Add Rooms and Type</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE TITLE -->
<div class="page-title">                    
<h2><span class="fa fa-arrow-circle-o-left"></span> Add Room Type</h2>
</div>
<!-- END PAGE TITLE -->                

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

<div class="row">
<div class="col-md-12">    

<?php $msg = $this->session->flashdata('msg'); if((isset($msg)) && (!empty($msg))) { ?>

<div class="col-md-6">
<div class="alert alert-success" role="alert">
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<?php print_r($msg); ?>
</div>
</div>
<?php } ?>

<?php $msg = $this->session->flashdata('msg1'); if((isset($msg)) && (!empty($msg))) { ?>    

<div class="col-md-6">          
<div class="alert alert-danger" role="alert">
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<?php print_r($msg); ?>
</div>
</div>    
<?php } ?>              


<!-- START JQUERY VALIDATION PLUGIN -->
<div class="block">
<form id="jvalidate" role="form" class="form-horizontal" method="post" >
<div class="panel-body">                                    
<div class="form-group">
<table class="table">
<thead>
    <tr>
        <th>&nbsp;</th>
        <th colspan="2" style="text-align: center;">NUBE / Ecopark Members</th>
        
        <th colspan="2" style="text-align: center;">Public</th>
        
    </tr>
    <tr>
        <th>Room Type</th>
        <th>Weekdays(RM)</th>
        <th>Weekend(RM)</th>
        <th>Weekdays(RM)</th>
        <th>Weekend(RM)</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
        <input type="text" class="form-control" placeholder="Room Type" name="roomtype" id="roomtype" />
        </td>
        <td>
            <input type="text" class="form-control" placeholder="Amount"  name="memberweekdaysamount" id="memberweekdaysamount" />
        </td>
        <td>
            <input type="text" class="form-control" placeholder="Amount" name="memberweekendamount" id="memberweekendamount" />
        </td>
        <td>
            <input type="text" class="form-control" placeholder="Amount" name="publicweekdaysamount" id="publicweekdaysamount" />
        </td>
        <td>
            <input type="text" class="form-control" placeholder="Amount" name="publicweekendamount" id="publicweekendamount" />
        </td>
    </tr>
    </tbody>
</table>





                                        



</div>

<div class="btn-group">

<button class="btn btn-primary" type="submit">Submit</button>
</div>                                                                                                                          
</div>                                               
</form>
<!-- END JQUERY VALIDATION PLUGIN -->
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">

<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
<div class="panel-body my-table table-responsive">
<div class="result">
<table class="table datatable ">
<thead>
    <tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th colspan="2" style="text-align: center;">NUBE / Ecopark Members</th>
        
        <th colspan="2" style="text-align: center;">Public</th>
        <th colspan="2" style="text-align: center;">Options</th>
        
    </tr>
    <tr>
        <th>S.No</th>
        <th>Room Type</th>
        <th>Weekdays(RM)</th>
        <th>Weekend(RM)</th>
        <th>Weekdays(RM)</th>
        <th>Weekend(RM)</th>
        <th>Edit</th>
        <!-- <th>Delete</th> -->
    </tr>
    </thead>
<tbody>
<?php 
$i=1;
foreach ($typ as $a) {
?>
<tr>
<td><?php echo $i++;?></td>
<td><?php echo $a['roomtype'];?></td>
<td><?php echo $a['memberweekdaysamount'];?></td>
<td><?php echo $a['memberweekendamount'];?></td>
<td><?php echo $a['publicweekdaysamount'];?></td>
<td><?php echo $a['publicweekendamount'];?></td>
<td> 
    <a href="#edit<?php echo $a['id'];?>"
        data-toggle="modal" class="btn btn-primary btn-rounded">Edit</a>

</td>
<!--<td> 
	<a href="#delete<?php echo $a['id'];?>"
		data-toggle="modal" class="btn btn-danger btn-rounded">Delete</a>

</td>-->

</tr>
<?php }?>

</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

<!-- add rooms -->

<div class="row">

<div class="page-title">                    
<h2><span class="fa fa-arrow-circle-o-left"></span> Add Room </h2>
</div>
<div class="col-md-12">    




<!-- START JQUERY VALIDATION PLUGIN -->
<div class="block">
<form id="jvalidateroom" role="form" class="form-horizontal" method="post">
<div class="panel-body">                                    
<div class="form-group">

<label class="col-md-2 control-label">Room Type</label>
<div class="col-md-4">  
	<select class="form-control" name="roomtypeid" id="roomtypeid" data-live-search="true">
			<option value="">Select Room Type</option>
		<?php 

		foreach ($typ as $c) {
			?>
			<option value="<?php echo $c['id'];?>"><?php echo $c['roomtype'];?></option>
			
		<?php } ?> 
		</select>
        <div class="dormbeds" style="display:none;">
        <select class="form-control" name="drombedtype" id="drombedtype" data-live-search="true">
            <option value="">Select Dorm bed</option>
              <option value="10">10 Bed per Dorm</option>
              <option value="12">12 Bed per Dorm</option>
              <option value="22">22 Bed per Dorm</option>
        </select>
        </div>
	</div>



	<label class="col-md-2 control-label">Room No:</label>                                        
	<div class="col-md-4">
		<input type="text" class="form-control" name="roomno" id="roomno"/>                  
	</div>

</div>

<div class="btn-group">

	<button class="btn btn-primary" type="submit">Submit</button>
</div>                                                                                                                          
</div>                                               
</form>
<!-- END JQUERY VALIDATION PLUGIN -->
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">

<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
<div class="panel-body my-table table-responsive">
<div class="results">
<table class="table datatable ">
<thead>
   
    <tr>
        <th>S.No</th>
        <th>Room Type</th>
        <th>Room No</th>
        <th>Edit</th>
        <!-- <th>Delete</th> -->
        
    </tr>
    </thead>
<tbody>
<?php 
$i=1;
foreach ($rom as $b) {
    $dat=$this->db->where('status',1)->where('id',$b['roomtypeid'])->get('roomtypes')->result_array();
                        foreach ($dat as $c)
                            $roomtype=$c['roomtype'];
?>
<tr>
<td><?php echo $i++;?></td>
<td><?php echo $roomtype;?></td>
<td><?php echo $b['roomno'];?></td>
 <td> 
    <a href="#editr<?php echo $b['id'];?>"
        data-toggle="modal" class="btn btn-primary btn-rounded">Edit</a>

</td> 
<!--<td> 
    <a href="#deleter<?php echo $b['id'];?>"
        data-toggle="modal" class="btn btn-danger btn-rounded">Delete</a>

</td>-->

</tr>
<?php }?>

</tbody>
</table>
</div>
</div>
</div>
</div>
</div>


</div>
<!-- END PAGE CONTENT WRAPPER -->                
</div>            
<!-- END PAGE CONTENT -->
</div>


<?php 

foreach ($typ as $a1) {
?>
<!--edit modalfade -->
            <div class="modal fade" id="edit<?php echo $a1["id"];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width: 71%;">
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
                         <h2><p style="text-align: center;">Room Type Edit</p></h2>

                        

        


<!-- START JQUERY VALIDATION PLUGIN -->

<form id="jvalidateedit<?php echo $a1['id'];?>" role="form" class="form-horizontal"  method="post" >
 <input type="hidden" class="form-control" value="<?php echo $a1['id'];?>" placeholder="Room Type" name="id" id="id" />
<div class="table-responsive">
<table class="table">
<thead>
    <tr>
        <th>&nbsp;</th>
        <th colspan="2" style="text-align: center;">NUBE / Ecopark Members</th>
        
        <th colspan="2" style="text-align: center;">Public</th>
        
    </tr>
    <tr>
        <th>Room Type</th>
        <th>Weekdays(RM)</th>
        <th>Weekend(RM)</th>
        <th>Weekdays(RM)</th>
        <th>Weekend(RM)</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
        <input type="text"  required class="form-control" placeholder="Room Type" name="roomtype" value="<?php echo $a1['roomtype'];?>" id="roomtype" />
        </td>
        <td>
            <input type="text"  requiredclass="form-control" placeholder="Amount"  name="memberweekdaysamount" value="<?php echo $a1['memberweekdaysamount'];?>" id="memberweekdaysamount" />
        </td>
        <td>
            <input type="text" requiredclass="form-control" placeholder="Amount" name="memberweekendamount" value="<?php echo $a1['memberweekendamount'];?>" id="memberweekendamount" />
        </td>
        <td>
            <input type="text" required class="form-control" placeholder="Amount" name="publicweekdaysamount" value="<?php echo $a1['publicweekdaysamount'];?>" id="publicweekdaysamount" />
        </td>
        <td>
            <input type="text" required class="form-control" placeholder="Amount" name="publicweekendamount" value="<?php echo $a1['publicweekendamount'];?>" id="publicweekendamount" />
        </td>
    </tr>
    </tbody>
</table>
</div>

                                            


                            

                        </div>
                        <div class="modal-footer">
                         <div class="col-md-6">
                                <button type="button" class="btn btn-danger btn-lg btn-block" data-dismiss="modal" aria-label="Close">No</button>
                            </div>
                         <div class="col-md-6">
                                <input type="submit" id="submit" class="btn btn-success btn-lg btn-block" value="Update" >
                            </div>

                                                        
                        </div>
                    </form>
                    <!-- End | Register Form -->
                    
                </div>
                <!-- End # DIV Form -->
                
            </div>
        </div>
    </div>

<!--edit modalfade -->


<!--delete modalfade -->
            <div class="modal fade" id="delete<?php echo $a1["id"];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width: 71%;">
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
                         <h2><p style="text-align: center;">Are you sure want to Delete ?</p></h2>

                        

        


<!-- START JQUERY VALIDATION PLUGIN -->

<form id="jvalidatedelete<?php echo $a1['id'];?>" role="form" class="form-horizontal"  method="post" >
 <input type="hidden" class="form-control" value="<?php echo $a1['id'];?>" placeholder="Room Type" name="id" id="id" />
                                          
 

                        </div>
                        <div class="modal-footer">
                         <div class="col-md-6">
                                <button type="button" class="btn btn-danger btn-lg btn-block" data-dismiss="modal" aria-label="Close">No</button>
                            </div>
                         <div class="col-md-6">
                                <input type="submit" id="submit" class="btn btn-success btn-lg btn-block" value="Delete" >
                            </div>

                                                        
                        </div>
                    </form>
                    <!-- End | Register Form -->
                    
                </div>
                <!-- End # DIV Form -->
                
            </div>
        </div>
    </div>

<!--delete modalfade -->




<?php }?>





<?php 

foreach ($rom as $b1) {
?>
<!--editr modalfade -->
            <div class="modal fade" id="editr<?php echo $b1["id"];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width: 71%;">
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
                         <h2><p style="text-align: center;">Room  Edit</p></h2>

                        

        


<!-- START JQUERY VALIDATION PLUGIN -->

<form id="jvalidateroomedit<?php echo $b1["id"];?>" role="form" class="form-horizontal" method="post">
 <input type="hidden" class="form-control" value="<?php echo $b1["id"];?>" name="id" id="id"/>
                                   
<div class="form-group">

<label class="col-md-2 control-label">Search</label>
<div class="col-md-4">  
    <select class="form-control" name="roomtypeid" id="roomtypeid" data-live-search="true">
            <option value="">Select Room Type</option>
        <?php 

        foreach ($typ as $c) {
            ?>
            <option value="<?php echo $c['id'];?>" <?php if($b1['roomtypeid']==$c['id']){ echo 'selected';};?>><?php echo $c['roomtype'];?></option>
            
        <?php } ?> 
        </select>
    </div>



    <label class="col-md-2 control-label">Room No:</label>                                        
    <div class="col-md-4">
        <input type="text" class="form-control" value="<?php echo $b1['roomno'];?>" name="roomno" id="roomno"/>                  
    </div>

</div>
                                                                                                                     

                        </div>
                        <div class="modal-footer">
                         <div class="col-md-6">
                                <button type="button" class="btn btn-danger btn-lg btn-block" data-dismiss="modal" aria-label="Close">No</button>
                            </div>
                         <div class="col-md-6">
                                <input type="submit" id="submit" class="btn btn-success btn-lg btn-block" value="Update" >
                            </div>

                                                        
                        </div>
                    </form>
                    <!-- End | Register Form -->
                    
                </div>
                <!-- End # DIV Form -->
                
            </div>
        </div>
    </div>

<!--editr modalfade -->


<!--deleter modalfade -->
            <div class="modal fade" id="deleter<?php echo $b1["id"];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width: 71%;">
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
                         <h2><p style="text-align: center;">Are you sure want to Delete ?</p></h2>

                        

        


<!-- START JQUERY VALIDATION PLUGIN -->

<form id="jvalidateroomdelete<?php echo $b1['id'];?>" role="form" class="form-horizontal"  method="post" >
 <input type="hidden" class="form-control" value="<?php echo $b1['id'];?>" placeholder="Room Type" name="id" id="id" />
                                          
 

                        </div>
                        <div class="modal-footer">
                         <div class="col-md-6">
                                <button type="button" class="btn btn-danger btn-lg btn-block" data-dismiss="modal" aria-label="Close">No</button>
                            </div>
                         <div class="col-md-6">
                                <input type="submit" id="submit" class="btn btn-success btn-lg btn-block" value="Delete" >
                            </div>

                                                        
                        </div>
                    </form>
                    <!-- End | Register Form -->
                    
                </div>
                <!-- End # DIV Form -->
                
            </div>
        </div>
    </div>

<!--delete modalfade -->




<?php }?>





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
roomtype:'required',
memberweekdaysamount:'required',
memberweekendamount:'required',
publicweekdaysamount:'required',
publicweekendamount:'required',

},
messages: { 
roomtype:'Please enter Room Type',
memberweekdaysamount:'Please enter Amount',
memberweekendamount:'Please enter Amount',
publicweekdaysamount:'Please enter Amount',
publicweekendamount:'Please enter Amount',
}
}); 

 $("#jvalidate").submit(function(){

if( $("#jvalidate").valid())
{

		dataString = $("#jvalidate").serialize();

      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>addroom_type/add_type",
        data: dataString,

                success: function(data){

        $('#jvalidate')[0].reset();

        // $('#world').hide();
         $('.result').html(data); 

        

        }

        });

        return false;  //stop the actual form post !important!



}


}); 


 


                               

</script>

<?php 

foreach ($typ as $a2) {
?>

<script type="text/javascript">
    
     $("#jvalidateedit<?php echo $a2['id'];?>").submit(function(){


        dataString = $("#jvalidateedit<?php echo $a2['id'];?>").serialize();

      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>addroom_type/edit_type",
        data: dataString,

                success: function(data){

        $('#jvalidate')[0].reset();

        // $('#world').hide();
         $('.result').html(data); 

         $('#edit<?php echo $a2['id'];?>').modal('hide');

        }

        });

        return false;  //stop the actual form post !important!






}); 


 $("#jvalidatedelete<?php echo $a2['id'];?>").submit(function(){


        dataString = $("#jvalidatedelete<?php echo $a2['id'];?>").serialize();

      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>addroom_type/delete_type",
        data: dataString,

                success: function(data){

        $('#jvalidate')[0].reset();

        // $('#world').hide();
         $('.result').html(data); 

         $('#delete<?php echo $a2['id'];?>').modal('hide');

        }

        });

        return false;  //stop the actual form post !important!






});     


                               

</script>



<?php }?>





<script type="text/javascript">
var jvalidateroom = $("#jvalidateroom").validate({
ignore: [],
rules: {                                            
roomtypeid:'required',

roomno:'required',

},
messages: { 
roomtypeid:'Please Select Room Type',
roomno:'Please enter Room No',
}
}); 

 $("#jvalidateroom").submit(function(){

if( $("#jvalidateroom").valid())
{

		dataString = $("#jvalidateroom").serialize();

      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>addroom_type/add_room",
        data: dataString,

                success: function(data){

         $('#jvalidateroom')[0].reset();
        // $('#world').hide();
         $('.results').html(data); 

        }

        });

        return false;  //stop the actual form post !important!



}


}); 


                               

</script>

<?php foreach ($rom as $b2) {
   ?>

<script type="text/javascript">


 $("#jvalidateroomedit<?php echo $b2['id'];?>").submit(function(){


        dataString = $("#jvalidateroomedit<?php echo $b2['id'];?>").serialize();

      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>addroom_type/edit_room",
        data: dataString,

                success: function(data){

                    //alert(data);

         $('#jvalidateroom')[0].reset();
        // $('#world').hide();
         $('.results').html(data);
          $('#editr<?php echo $b2['id'];?>').modal('hide'); 

        }

        });

        return false;  //stop the actual form post !important!






}); 


 $("#jvalidateroomdelete<?php echo $b2['id'];?>").submit(function(){


        dataString = $("#jvalidateroomdelete<?php echo $b2['id'];?>").serialize();

      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>addroom_type/delete_room",
        data: dataString,

                success: function(data){

                    //alert(data);

         $('#jvalidateroom')[0].reset();
        // $('#world').hide();
         $('.results').html(data);
          $('#deleter<?php echo $b2['id'];?>').modal('hide'); 

        }

        });

        return false;  //stop the actual form post !important!






}); 


                               

</script>
<?php }?>

 <script>
$('#add_roomtyp').addClass('active');
$( "#settings" ).removeClass( "xn-openable" ).addClass( "xn-openable active" );

</script> 


<script type="text/javascript">
    $(document).ready(function(){
        $('#roomtypeid').change(function(){
            var roomtypeid=$('#roomtypeid').val();
            if(roomtypeid==4)
            {
                $('.dormbeds').show();
            }
            else
            {
                $('.dormbeds').hide();
            }

        });

    });
</script>


<style type="text/css">

@import url(http://fonts.googleapis.com/css?family=Roboto);

* {
font-family: 'Roboto', sans-serif;
}

#login-modal .modal-dialog {
width: 350px;
}

#login-modal input[type=text], input[type=password] {
margin-top: 10px;
}

#div-login-msg,
#div-lost-msg,
#div-register-msg {
border: 1px solid #dadfe1;
height: 30px;
line-height: 28px;
transition: all ease-in-out 500ms;
}

#div-login-msg.success,
#div-lost-msg.success,
#div-register-msg.success {
border: 1px solid #68c3a3;
background-color: #c8f7c5;
}

#div-login-msg.error,
#div-lost-msg.error,
#div-register-msg.error {
border: 1px solid #eb575b;
background-color: #ffcad1;
}

#icon-login-msg,
#icon-lost-msg,
#icon-register-msg {
width: 30px;
float: left;
line-height: 28px;
text-align: center;
background-color: #dadfe1;
margin-right: 5px;
transition: all ease-in-out 500ms;
}

#icon-login-msg.success,
#icon-lost-msg.success,
#icon-register-msg.success {
background-color: #68c3a3 !important;
}

#icon-login-msg.error,
#icon-lost-msg.error,
#icon-register-msg.error {
background-color: #eb575b !important;
}

#img_logo {
max-height: 100px;
max-width: 100px;
}

/* #########################################
#    override the bootstrap configs     #
######################################### */

.modal-backdrop.in {
filter: alpha(opacity=50);
opacity: .8;
}



.modal-header {
min-height: 16.43px;
padding: 15px 15px 15px 15px;
border-bottom: 0px;
}

.modal-body {
position: relative;
padding: 5px 15px 5px 15px;
}

.modal-footer {
padding: 15px 15px 15px 15px;
text-align: left;
border-top: 0px;
}

.checkbox {
margin-bottom: 0px;
}

.btn {
border-radius: 0px;
}

.btn:focus,
.btn:active:focus,
.btn.active:focus,
.btn.focus,
.btn:active.focus,
.btn.active.focus {
outline: none;
}

.btn-lg, .btn-group-lg>.btn {
border-radius: 0px;
}

.btn-link {
padding: 5px 10px 0px 0px;
color: #95a5a6;
}

.btn-link:hover, .btn-link:focus {
color: #2c3e50;
text-decoration: none;
}

.glyphicon {
top: 0px;
}

.form-control {
border-radius: 0px;
}

</style>


</body>
</html>