

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>                    
    <li class="active">Dashboard</li>
</ul>
<!-- END BREADCRUMB -->                       

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <!-- START WIDGETS -->                    
    <div class="row">
        <!-- <div class="col-md-3">

            <!-- START WIDGET SLIDER 
            <div class="widget widget-default widget-carousel">
                <div class="owl-carousel" id="owl-example">
                    <div>                                    
                        <div class="widget-title">Booking Confirm</div>
                        <div class="widget-subtitle">Visitors</div>                                    <?php

                        $a=$this->db->where('ad_status',1)->get('booking')->result_array();
                        $a1=count($a);

                        ?>                                    

                        <div class="widget-int"><?php echo $a1;?></div>
                    </div>
                    <div>                                    
                        <div class="widget-title">Booking 
                            Pending</div>
                            <div class="widget-subtitle">Visitors</div>
                            <?php

                            $b=$this->db->where('ad_status',0)->get('booking')->result_array();
                            $b1=count($b);

                            ?>            
                            <div class="widget-int"><?php echo $b1;?></div>
                        </div>
<!-- <div>                                    
<div class="widget-title">New</div>
<div class="widget-subtitle">Visitors</div>
<div class="widget-int">1,977</div>
</div> 
</div>                            
<div class="widget-controls">                                

</div>                             
</div>         
<!-- END WIDGET SLIDER 

</div> -->

<!-- <div class="col-md-3">

    <!-- START WIDGET REGISTRED 
    <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
        <div class="widget-item-left">
            <span class="fa fa-user"></span>
        </div>
        <?php 
        $dat=$this->db->get('booking')->result_array();
        $data=count($dat);
        ?>
        <div class="widget-data">
            <div class="widget-int num-count"><?php echo $data; ?></div>
            <div class="widget-title">Number Of Visitors</div>

        </div>
        <div class="widget-controls">                                

        </div>                            
    </div>                            
    <!-- END WIDGET REGISTRED 

</div> -->
<div class="col-md-3">

    <!-- START WIDGET CLOCK -->
    <div class="widget widget-danger widget-padding-sm">
        <div class="widget-big-int plugin-clock">00:00</div>                            
        <div class="widget-subtitle plugin-date">Loading...</div>
        <div class="widget-controls">                                

        </div>                            

    </div>                        
    <!-- END WIDGET CLOCK -->

    
  <p id="xorAnalogClock"></p> 


</div>


</div>
<!-- END WIDGETS -->                    


<!-- END DASHBOARD CHART -->

</div>
 <?php $msg = $this->session->flashdata('msg'); if((isset($msg)) && (!empty($msg))) { ?>

                    <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                               <?php print_r($msg); ?>
                            </div>
                             <?php } ?>

                      <?php $msg = $this->session->flashdata('msg1'); if((isset($msg)) && (!empty($msg))) { ?>       
                     <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <?php print_r($msg); ?>
                            </div> 
                            <?php } ?>                           
</div>            
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

 <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/bootstrap/bootstrap.min.js"></script>
        <script src="http://www.clocklink.com/embed.js"></script> 


<script type="text/javascript" src="<?php echo base_url();?>assests/js/swfobject.js"></script> 
<script type="text/javascript"> 
     var flashvars = { 
         clockSkin: "media/skins/skin013.png", 
         arrowSkin: "11", 
         showSeconds: "true", 
         arrowScale: "100", 
         arrowHColor: "", 
         arrowMColor: "", 
         arrowSColor: "", 
         widgetUrl: "empty", 
         urlWindow: "_top" 
     }; 
     swfobject.embedSWF( 
         "xorAnalogClock.swf", 
         "xorAnalogClock", 
         "220", 
         "220", 
         "9", 
         "expressInstall.swf", 
         flashvars, 
         {scale: "noscale", wmode: "transparent"} 
     ); 
</script>

<script>
$('#dashboard').addClass('active');

</script>