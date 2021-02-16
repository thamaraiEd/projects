<div class="col-md-12" id="pricing_tbl">
	<h2 class="panel-title section-title f32 mb60 text-center courses-avail-title" style="text-align:center;"><?php echo $type;?> - Plans</h2>
	<!--<a href="<?php echo base_url(); ?>index.php/gift/gift_history" class="read">GIFT HISTORY</a>-->
	<div class="row">
		<div class="col-lg-12" align="right">
			<input type="button" name="btnGiftSubmit" id="btnGiftSubmit" class="btn_start btn4_start btnsbmit" value="GIFT HISTORY">
		</div>
	</div>

	<?php //echo"<pre>"; print_r($GetSAtDetails); exit;
	//$colourSet = array('#808000','#008000','#008080','#646464','#800000','#456092','#B20269','#0080EB','#95a5a6');
		$colourSet = array('pink','orange','yellow');
		$colour = array('#9e9e9e','#9e9e9e','#8BC34A','#9e9e9e');
			$numColours = count($colourSet);
			$colourInd = 0;	 //echo"<pre>"; print_r($GetProductDetails); exit;
	$colorarray=array("");
	if($type=="PuzzleBreak")
	{
	?>
	<div id="Pricing_table"> 
		<div class="demo">
			<div class="">
				<div class="row">
				<?php 
				$j=0;
				foreach($GetPuzzleDetails as $pro) { ?> 
					<div class="col-md-3 col-sm-6">
					<div class="pricingTable <?php echo $colorarray[$j]; ?>">
						<div class="pricingTable-header">
							<h3 class="title"><?php echo $pro['flavour_name'];?></h3>
						</div>
						<ul class="pricing-content">
							<?php echo $pro['flavour_description'];?>
						</ul>
						<div class="price-value">
							<span class="price-title">Price <b>From</b></span>
							<span class="price-amount"> ₹<?php echo ROUND($pro['price']);?> <span class="duration"> / per user</span></span>
						</div>
						<div class="pricingTable-signup">
							<a href="<?php echo base_url(); ?>index.php/gift/checkout/<?php echo $pro['pack_id'];?>" class="read" style="padding: 12px 17px !important;">GIFT</a>
						</div>
					</div>
				</div>
					
				<?php $colourInd = ($colourInd + 1) % $numColours; $j++; } ?>
				</div>
			</div>
		</div>
	</div>
	<?php
	}
	else 
	{  
	?> 
	<!--<div class="container">
		<div class="Plan_content">
			<ul class="Plan_exp">
				<li>
					<i class="fa fa-hand-o-right"></i> SkillAngels www.skillangels.com is Edsix’s flagship product that helps children develop Higher Order Thinking Skills through puzzle-based learning techniques. While the program has been traditionally run through a classroom setting, we bring you a few alternative plans to suit the transformed classroom under COVID lockdown.  
				</li>

				<li>
					<i class="fa fa-hand-o-right"></i> Check out the descriptions below to choose a plan that would be best for your child. Or, send us a mail at support@skillangels.com
				</li> 
			</ul>
		</div> 
	</div>-->
	<div class="demo">
		<div class="" >
			<div class="row">
			


			<?php //echo"<pre>"; print_r($GetSAtDetails); exit;
			$i=0;
			
			foreach($GetSAtDetails as $pro)
			{	 ?> 
				 <div class="col-md-4 col-sm-6">
					<!--<div class="pricingTable <?php echo $colorarray[$i]; ?>">
						<div class="pricingTable-header">
							<h3 class="title"><?php echo $pro['plan'];?></h3>
						</div>
						<ul class="pricing-content">
							<?php echo $pro['description'];?>
						</ul>
						<div class="price-value">
							<span class="price-title">Price <b>From</b></span>
							<span class="price-amount"> ₹<?php echo ROUND($pro['price']);?> <span class="duration">per user</span></span>
						</div>
						<div class="pricingTable-signup">
							<a href="<?php echo base_url(); ?>index.php/trial/sk_form/<?php echo $pro['planid'];?>" class="read">BUY</a>
						</div>
					</div>-->
					<div class='package <?php /* if($i==1){ */ echo 'brilliant'; /* } */ ?>'>
						<div class='name'><?php echo $pro['plan'];?></div>
						<div class='price'> ₹ <?php echo ROUND($pro['price']);?> / user</div>
						<div class='trial'> ₹ <?php echo ROUND($pro['price']);?></div>
						<hr>
						<div class='description pro_dec'>
							<?php echo $pro['description'];?>
							
						</div>
						<div class="pricingTable-signup">
							<a href="<?php echo base_url(); ?>index.php/gift/checkout/<?php echo $pro['planid'];?>" class="read" style="padding: 12px 17px !important;">GIFT</a>							
						</div>
					</div>
					
				</div>
			
			<?php $i=$i++;$colourInd = ($colourInd + 1) % $numColours; $i++;
			} ?>
			
			</div>
		</div>
	</div> 

	<?php
	}	
	?>
</div>

<div class="modal fade" id="gift_modal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
	<div class="modal-content gift_popup">
	  <div class="modal-header" style="padding: 0px !important;">
		<div class="row">
			<div class="col-lg-12">					
					<h2 class="modal-title panel-title section-title" align="center" id="addModalLabel"><b>GIFT HISTORY</b></h2>
			</div>
		</div>		
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">x</span>
		</button><br/><br/>
	  </div>
		<div class="modal-body ">	 
			<div id="gift_data">
			</div>		
		</div>
		<div class="modal-footer">			
			<button type="button" class="btn btn-secondary btn3_start" name="btnclose" id="btnclose" data-dismiss="modal">Close</button>
		</div>
    </div>
</div>
</div>
<div style="display:none;" id="Loading" class="Loading"></div>
<script>
$("#btnGiftSubmit").click(function()
	{		
		var gift_uid=<?php echo $this->session->gift_uid;?>		
		$('.Loading').show();
		$.ajax({			
			url: "<?php echo base_url(); ?>index.php/trial/gift_history",
			type: "POST",				
			data: {gift_uid:gift_uid}, 
			//dataType: "json",
			success: function(data)
			{ //alert(data);
				$('.Loading').hide();
				$('#gift_data').html(data);
				$("#gift_modal").modal("show");
			}
		});
	});


</script>
<style>
.package:hover {
	background:#d3d3d3;
    margin-top: 0px !important;
    transition: margin-top .3s linear;
} 
.gift_popup {
    background: #ffb600;
    padding: 50px;
    border-radius: 60px;
    box-shadow: 0 0 20px #000;
}
#myModal .modal-dialog  {width:60%;}
#myModal .modal-header{background-color: #f92c8b;}
#myModal .modal-body{padding: 0 15px 15px 15px;}
#myModal h3{color:#fff;}
#myModal .close{opacity:1;color:#fff;}
.Loading 
{
	position: fixed;
	z-index: 999;
	overflow: show;
	margin: auto;
	top: 0;
	left: 0;
	bottom: 0;
	right: 0;
	background: #5a5757 url(<?php echo base_url(); ?>assets/images/loading_icon.gif) center center no-repeat;
	background-size: 5%;
	opacity: 0.6;
}
 
</style>   