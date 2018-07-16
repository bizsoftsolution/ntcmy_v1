<!-- START BREADCRUMB -->
<ul class="breadcrumb">
<li><a href="#">Home</a></li>
<li><a href="#">Settings</a></li>
<li class="active">Member Id</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE TITLE -->
<div class="page-title">                    
<h2><span class="fa fa-arrow-circle-o-left"></span> Member Id</h2>
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
<form  role="form" class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>add_nubemember/uploadnubemember">
<div class="panel-body"> 

                                  
<div class="form-group">

<div class="col-md-6">
    <label>Upload Member Id</label>
    <input type="file" multiple name="userfile" class="file" data-preview-file-type="any"/>
</div>

</div>
<span style="color: red;"><?php echo $error;?> </span>
<!-- <div class="btn-group">

<button class="btn btn-primary" type="submit">Submit</button>
</div>   -->                                                                                                                        
</div>                                               
</form>
<!-- END JQUERY VALIDATION PLUGIN -->
</div>
</div>
</div>








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


   <!-- THIS PAGE PLUGINS -->    
        <script type='text/javascript' src='<?php echo base_url();?>assests/js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/dropzone/dropzone.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/fileinput/fileinput.min.js"></script>        
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/filetree/jqueryFileTree.js"></script>
        <!-- END PAGE PLUGINS -->
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



 <script>
$('#upload_nube').addClass('active');
$( "#settings" ).removeClass( "xn-openable" ).addClass( "xn-openable active" );

</script> 




</body>
</html>