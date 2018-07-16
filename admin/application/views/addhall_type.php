<!-- START BREADCRUMB -->
<ul class="breadcrumb">
<li><a href="#">Home</a></li>
<li><a href="#">Settings</a></li>
<li class="active">Add Hall Type</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE TITLE -->
<div class="page-title">                    
<h2><span class="fa fa-arrow-circle-o-left"></span> Add Hall Type</h2>
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
        <th>Auditorium</th>
        <th>Hall Type</th>
        <th>Amount</th>
       
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
        <input type="text" class="form-control" placeholder="Auditorium" name="auditorium" id="auditorium" />
        </td>
        <td>
            <input type="text" class="form-control" placeholder="Hall Type"  name="halltype" id="halltype" />
        </td>
        <td>
            <input type="text" class="form-control" placeholder="Amount" name="amount" id="amount" />
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
        <th>S.No</th>
        <th>Auditorium</th>
        <th>Hall Type</th>
        <th>Amount</th>
       
    </tr>
    </thead>
<tbody>
<?php 
$i=1;
foreach ($typ as $a) {
?>
<tr>
<td><?php echo $i++;?></td>
<td><?php echo $a['auditorium'];?></td>
<td><?php echo $a['halltype'];?></td>
<td><?php echo $a['amount'];?></td>


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






</div>
<!-- END PAGE CONTENT WRAPPER -->                
</div>            
<!-- END PAGE CONTENT -->
</div>








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
auditorium:'required',
halltype:'required',
amount:'required',

},
messages: { 
auditorium:'Please enter Auditorium',
halltype:'Please enter hall type',
amount:'Please enter Amount',
}
}); 

 $("#jvalidate").submit(function(){

if( $("#jvalidate").valid())
{

		dataString = $("#jvalidate").serialize();

      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>addhall_type/add_type",
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










 <script>
$('#add_halltyp').addClass('active');
$( "#settings" ).removeClass( "xn-openable" ).addClass( "xn-openable active" );

</script> 








</body>
</html>