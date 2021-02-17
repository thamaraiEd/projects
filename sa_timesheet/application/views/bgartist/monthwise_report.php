<?php
 //echo date('M');exit;
?>
<div class="right_col" role="main"> 
	<div id="SearchBox" class="tab-content" style="display:none;" >
		<div role="tabpanel" style="clear:both;" class="tab-pane fade active in" id="OverView" aria-labelledby="home-tab">
		<form id="frmdaywisedata" method="POST">  
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-6 clstotal">
					<div class="col-sm-3"><label class="">Select Month & Year </label></div>
					<div class="col-sm-3">
						<select name="ddlyearofmonth" id="ddlyearofmonth">
							<option value="">Select Month & Year</option>
							<?php
								foreach($yearofMonth as $month)
								{
									if($month['Month']."-".$month['Year']==$month['current_monyear'])
									{
										$selected="selected='selected'";
									}
									else
									{
										$selected="";
									}

							?>
									<option value="<?php echo $month['Month']."-".$month['Year']; ?>" <?php echo $selected; ?> ><?php echo $month['MonthName']."-".$month['Year']; ?></option>
							<?php 
								}
							?>
						</select>
					</div>
				</div>  
			</div>
		</form>
		</div>
	</div>
	<div class="">
		<div id="Succ_msg"></div>
	</div>
	<div style="display:none;text-align:center;" id="iddivLoading" class="loading">Loading&#8230;</div>
	<div id="collapse4" class="body"> 
		<div id="report_result"></div>				
    </div> 
 </div> 
<script type="text/javascript">
$(document).ready(function()
{
 
	getMonthData();
	$('#ddlyearofmonth').change(function()
	{
		 getMonthData();
	}); 
});
	 
function getMonthData()
{ 
	var month_year=$("#ddlyearofmonth").val();
	$("#iddivLoading").show(); 
	$.ajax({
		type: "POST",
		url: "<?php echo base_url(); ?>index.php/home/bg_MonthwiseSummary",
		data: {month_year:month_year},
		success: function(result){
			$("#iddivLoading").hide();		 
			$("#report_result").html(result);	 
		}
	});
	 
}

</script>  
<style>
#SearchBox
{
	border-bottom: 5px solid;
    padding: 0 0 20px 0;
}
#SearchBox .radio-inline
{
	font-size: 25px;
}
</style>
			

 