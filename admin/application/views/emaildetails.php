 <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li><a href="#">Email Details</a></li>
                    <li class="active">Email Details</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Email Details</h2>
                </div>
                <!-- END PAGE TITLE --> 

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

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
    <div class="panel-heading">                                
                                       
    </div>

    <div class="panel-body my-table table-responsive">
        <table class="table datatable ">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Customer Name</th>
                    <th>Mobile No</th>
                    <th>Email</th>
                    
                    
                   
                </tr>
            </thead>
            <tbody>
            <?php 
            $i=1;
            foreach ($rep as $a) {
               ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $a['customername'];?></td>
                    <td><?php echo $a['mobileno'];?></td>
                    <td><?php echo $a['email'];?></td>
                   
                    
                </tr>
                <?php }?>
                
            </tbody>
        </table>
        <div style="text-align: center;">
        <a href="<?php echo base_url();?>emaildetails/excel" class="btn btn-default">Export as Excel</a>
        </div>
    </div>
</div>
                            <!-- END DEFAULT DATATABLE -->



    


 <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/bootstrap/bootstrap.min.js"></script>

<script>
$('#customeremaildet').addClass('active');
$( "#customeremaildet" ).removeClass( "xn-openable" ).addClass( "xn-openable active" );

</script>


