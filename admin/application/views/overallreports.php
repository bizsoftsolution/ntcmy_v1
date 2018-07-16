 <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li><a href="#">Reports</a></li>
                    <li class="active">Reports</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span>Reports</h2>
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
                    <th>Name</th>
                    <th>IC No</th>
                    <th>Date Of Booking</th>
                    <th>Nube/ Echo Park Memeber </th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Booking Type</th>
                    <th>Amount Paid</th>
                   
                    
                </tr>
            </thead>
            <tbody>
            <?php 
            $i=1;
            foreach ($out as $a) {

                  

            $dat=$this->db->where('pnr_number',$a['pnrnumber'])->get('bookingrooms')->result_array();

           // echo "<pre>";
           // print_r($dat);
    
      foreach ($dat as $b) 
         {

         $date=$b['date'];       
        $icnumber=$b['icnumber'];
        $bookingtype=$b['bookingtype'];
         
        }  
            



               ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $a['name'];?></td>
                    <td><?php echo $icnumber;?></td>
                    <td><?php echo date('d/m/Y',strtotime(str_replace('-', '/', $date)));?></td>
                    <td><?php if($a['nubememberid']==''){ echo 'No';}else{echo 'Yes'; } ?></td>
                    <td><?php echo date('d/m/Y',strtotime(str_replace('-', '/', $a['checkindate'])));?></td>
                    <td><?php echo date('d/m/Y',strtotime(str_replace('-', '/', $a['checkoutdate'])));?></td>
                    <td><?php echo $bookingtype;?></td>
                    <td><?php echo $a['totalamount'];?></td>
                    
                                        
                </tr>
                <?php }?>
                
            </tbody>
        </table>
        <div style="text-align: center;"><a target="_blank" href="<?php echo base_url();?>overallreports/reportsprint"
                        class="btn btn-primary btn-rounded">Online Booking Print</a></div>
         <br>               

        <div style="text-align: center;"><a target="_blank" href="<?php echo base_url();?>overallreports/reportsprint1"
                        class="btn btn-primary btn-rounded">Direct Booking Print</a></div>               
    </div>
</div>
                            <!-- END DEFAULT DATATABLE -->

   

    

    


 <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/bootstrap/bootstrap.min.js"></script>




<script>
$('#overall_reports').addClass('active');
$( "#room_book" ).removeClass( "xn-openable" ).addClass( "xn-openable active" );

</script>
