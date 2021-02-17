<?php
 //echo date('M');exit;
?>
<div class="right_col" role="main"> 
	<div id="SearchBox" class="tab-content">
		<div role="tabpanel" style="clear:both;" class="tab-pane fade active in" id="OverView" aria-labelledby="home-tab">
		<form id="frmdaywisedata" method="POST">  
				<div class="col-md-3 col-sm-3 col-xs-6 clstotal">
					<div class="col-sm-4"><label class="">Log Date</label></div>
					<div class="col-sm-8">
						<input type="text" name="log_date" id="log_date" value="" /> <div class="error"></div>
					</div>
				</div> 
				<div class="col-md-1 col-sm-1 col-xs-1 clstotal">
					<input type="button" id="btnsubmit"  name="btnsubmit" value="Submit" style="backgroud:" />
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
	$("#log_date").daterangepicker();
	
	getOverallData();
	
	$('#btnsubmit').click(function()
	{
		getOverallData();
	});
	/* $('#ddlyearofmonth').change(function()
	{
		 getOverallData();
	}); 
	$('#ddluser').change(function()
	{
		 getOverallData();
	}); */
});
	 
function getOverallData()
{ 
	/*var month_year=$("#ddlyearofmonth").val();
	var user_id=$("#ddluser  option:selected").val();
	var roleid=$('#ddluser option:selected').attr("data-roleid");
	*/
	 var log_date=$("#log_date").val();
	{
		$(".error_msg").html("");
		$("#iddivLoading").show(); 
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/admin/dir_OverallSummary",
			data: {log_date:log_date},
			success: function(result){
				$("#iddivLoading").hide();		 
				$("#report_result").html(result);	 
			}
		});
	} 
	 
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
.error_msg{color:red;}
#frmdaywisedata{color:#000;}
#btnsubmit
{
background: #000;
color: #fff;
padding: 4px 10px;
font-size: 14px;
}
</style>
			

 