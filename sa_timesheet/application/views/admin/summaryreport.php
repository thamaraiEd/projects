<?php
 //echo date('M');exit;
?>
<div class="right_col" role="main"> 
	<div id="SearchBox" class="tab-content">
		<div role="tabpanel" style="clear:both;" class="tab-pane fade active in" id="OverView" aria-labelledby="home-tab">
		<form id="frmdaywisedata" method="POST">  
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12 clstotal">
					<div class="col-sm-3"><label class="">Select Role</label></div>
					<?php
					foreach($getrolelist as $role)
					{
						if($role['ur_id']==1 || $role['ur_id']==2)
						{
							if($role['ur_id']==1){$checked="Checked='checked'";}else{$checked="";}
					?>
							<div class="radio_btn">
								<label class="radio-inline">
									<input type="radio" class="ddlrole"  name="ddlrole" value="<?php echo $role['ur_id']; ?>" <?php echo $checked; ?> ><?php echo $role['ur_name']; ?>
								</label>
							</div> 
					<?php
						}
					}
					?>
					 
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12 clstotal">
					<div class="col-sm-3"><label class="">Select Month </label></div> 
					<div class="col-sm-4">
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
									<option data-startdate=<?php echo $month['firstday']; ?> data-enddate=<?php echo $month['lastday']; ?> value="<?php echo $month['Month']."-".$month['Year']; ?>" <?php echo $selected; ?> ><?php echo $month['MonthName']."-".$month['Year']; ?></option>
							<?php 
								}
							?>
						</select>
					</div>
					<div class="col-sm-4">
						<div class="error_msg"></div>
					</div>
				</div>  
				<div class="col-md-4 col-sm-4 col-xs-12 clstotal">
					<div class="col-sm-4"><label class="">Select Type </label></div>
					<div class="col-sm-8">
						 <select name="ddltype" id="ddltype">
							<option value="ALL">ALL</option>
							<option value="AP">Approved Productivity Only</option>
							<option value="PP">Percentage Only</option>
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
	$('.ddlrole').change(function()
	{
		 getMonthData();
	});
	$('#ddltype').change(function()
	{
		 getMonthData();
	});
});
	 
function getMonthData()
{ 
	var type=$("#ddltype").val();
	var month_year=$("#ddlyearofmonth").val();
	var startdate=$("#ddlyearofmonth option:selected").attr('data-startdate');
	var enddate=$("#ddlyearofmonth option:selected").attr('data-enddate');
	var roleid=$("input[name='ddlrole']:checked").val();
	/* var user_id=$("#ddluser  option:selected").val();
	var roleid=$('#ddluser option:selected').attr("data-roleid"); */
	
	if(month_year!='')
	{
		$(".error_msg").html("");
		$("#loadingimg").show(); 
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/admin/summaryreport_ajax",
			data: {month_year:month_year,startdate:startdate,enddate:enddate,roleid:roleid,type:type},
			success: function(result){
				$("#loadingimg").hide();		 
				$("#report_result").html(result);	 
			}
		});
	}
	else
	{
		$(".error_msg").html("Please fill the required field");
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
#SearchBox
{
	border-bottom: 5px solid;
    padding: 0 0 20px 0;
}
#SearchBox .radio-inline
{
	font-size: 16px !important;
    margin: 0px 10px;
}
.radio_btn{float:left;margin 0px 10px !important;}
</style> 