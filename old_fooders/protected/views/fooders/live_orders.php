<?php



if ($session->check ( $_SESSION ) === FALSE) {
	
	$session->redirect ( 'login', fooders );
}
?>
<?php
$fooder_id=$_SESSION['id']; 
$all_dg=$db->run("SELECT* FROM `delivery_guys` WHERE `fooder_id`='$fooder_id' AND `status`='1'")->fetchAll();
//$get_order_eater_details = $db->run("select o.*,e.name,e.address,e.mobile,e.region from `orders` as o join `eaters` as e on e.eater_id=o.eater_id  where o.fooder_id='$fooder_id' order by o.creation_date DESC")->fetchAll();


?> 
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="page-content">
	<div class="page-header position-relative">
		<h1>Today Orders</h1> 

		<!-- <audio src="http://codeskulptor-demos.commondatastorage.googleapis.com/GalaxyInvaders/alien_shoot.wav" controls autoplay ></audio>  -->
	</div>
	<!--/.page-header-->
	<div class="row-fluid"> 
		<div class="span12">
	
			<!--PAGE CONTENT BEGINS-->
							<?php if(fooder_is_approved=='1'){?>
                             <div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="icon-remove"></i>
				</button>
				<i class="icon-warning-sign red"></i>
								<?php echo fdisapp;?>
							</div>							
							<?php }?>
							
							<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="icon-remove"></i>
				</button>
				<i class="icon-ok green"></i>
								<?php echo fdwt;?>
								<strong class="green">
									<?php echo fdkf;?>
									<small>( <?php echo fdcp;?> )</small>
				</strong>
								<?php echo fdmop;?>
							</div>

			<div class="space-6"></div>
            <div class="hr hr32 hr-dotted"></div> 
 <div class="row-fluid">
				
<div class="span12" >
<div class="widget-box">
<div class="widget-header"><h4 class="widget-title">New Orders</h4></div>
<div class="widget-body">
<div class="widget-main" id="new_order_div_notification">



</div></div></div></div>

</div> 
</div>
</div>

</div>

    	</div>
		
		</div>
		<!--/.span-->
	</div>
	<!--/.row-fluid-->
</div>






<!-- 
<div class="modal fade" id="right-menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Order Details
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

		</h5>
   
      </div>
      <div class="modal-body" id="item_div_modal"> 
	


	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div> --> 


						