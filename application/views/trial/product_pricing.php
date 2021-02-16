<section class="section" style="padding:0px;">
	<div class="section-content">
		
		<div class="container crg25">
			<div class="row totable">				
				<div id="SK"></div> 
			</div> 
		</div>
	</div>
</section> 
<section class="section bg-baby-pink baby-pink-wave text-mc" style="">
	<div class="section-content"> 
		<div class="container crg25">
			<div class="row totable">
				 <div id="PB"></div> 
			</div> 
		</div>
	</div>
</section> 
<script>
pricingtable("SKILLANGELS",'SK');
//pricingtable("PuzzleBreak",'PB');
 
function pricingtable(type,id)
{
	$('#loading').show();
	$.ajax({
	url: "<?php echo base_url(); ?>index.php/trial/pricing_table",
	type:"POST", 
	data:{type:type},
	success: function (data) 
	{//alert(data);
		$("#"+id).html(data);
		$('#loading').hide(); 
	}
		
	});
}
</script>
 