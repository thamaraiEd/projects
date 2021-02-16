<section class="section" style="">
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
pricingtable("PuzzleBreak",'PB');
 
function pricingtable(type,id)
{
	$('#loadinimage').show();
	$.ajax({
	url: "<?php echo base_url(); ?>index.php/home/pricing_table",
	type:"POST", 
	data:{type:type},
	success: function (data) 
	{//alert(data);
		$("#"+id).html(data);
		$('#loadinimage').hide(); 
	}
		
	});
}
</script>
 