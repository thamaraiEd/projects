<div class="right_col" role="main"> 
	<div id="SearchBox" class="tab-content">
		<div role="tabpanel" style="clear:both;" class="tab-pane fade active in" id="OverView" aria-labelledby="home-tab">
		<form id="frmtracking" method="POST">  
			<div class="row">
				<div class="col-md-8 col-sm-8 col-xs-12 clstotal">
					<div class="col-sm-2"><label class="">Select Role</label></div>
						<?php
						foreach($getrolelist as $role)
						{
							if($role['ur_id']!=3){
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
				<div class="col-md-3 col-sm-3 col-xs-6 clstotal">
					<div class="col-sm-4"><label class="">Log Date</label></div>
					<div class="col-sm-8">
						<input type="text" name="log_date" id="log_date" value="" /> <div class="error"></div>
					</div>
				</div> 
				<div class="col-md-1 col-sm-1 col-xs-1 clstotal">
					<input type="button" id="btnsubmit"  name="btnsubmit" value="Submit" />
				</div> 
			</div>
		</form>
		</div>
	</div>
	<div class="">
		<div id="Succ_msg"></div>
	</div>
	<div id="collapse4" class="body">
		<div style="display:none;text-align:center;" id="iddivLoading" class="loading">Loading&#8230;</div>
		 
		<div id="report_result"></div>				
    </div> 
 </div> 
 
<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet" type="text/css"> 
<script src = "<?php echo base_url(); ?>assets/js/jquery.validate.js"></script> 
<script type="text/javascript">
$(document).ready(function()
{  
	$("#log_date").daterangepicker();
	userrole();
	$('.ddlrole').change(function()
	{
		 userrole();
	}); 
	$('#btnsubmit').click(function()
	{
		var log_date=$("#log_date").val();
		if(log_date!='')
		{
			$(".error").html("");
			userrole();
		}
		else
		{
			$(".error").html("Please select log date");
		}
	}); 
});

	
	
function userrole()
{ 
	var roleid=$("input[name='ddlrole']:checked").val();
	var log_date=$("#log_date").val();
	$("#iddivLoading").show();
	if(roleid==1)
	{
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/home/animater_userdetails",
			data: {roleid:roleid,log_date:log_date},
			success: function(result){
				$("#iddivLoading").hide();		 
				$("#report_result").html(result);	 
			}
		});
	}
	else if(roleid==2)
	{
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/home/bgartist_userdetails",
			data: {roleid:roleid,log_date:log_date},
			success: function(result){
				$("#iddivLoading").hide();		 
				$("#report_result").html(result);	 
			}
		});
	}
	else if(roleid==6)
	{
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/home/Reviewer_Userdetails",
			data: {roleid:roleid,log_date:log_date},
			success: function(result)
			{
				$("#iddivLoading").hide();		 
				$("#report_result").html(result);	 
			}
		});
	}

	else if(roleid==7)
	{
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/home/StoryBoard_Userdetails",
			data: {roleid:roleid,log_date:log_date},
			success: function(result)
			{
				$("#iddivLoading").hide();		 
				$("#report_result").html(result);	 
			}
		});
	}
 

	else if(roleid==8)
	{
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/home/Comp_Userdetails",
			data: {roleid:roleid,log_date:log_date},
			success: function(result)
			{
				$("#iddivLoading").hide();		 
				$("#report_result").html(result);	 
			}
		});
	}
}

</script>  
<style>
#Succ_msg
{
	text-align: center;
    color: green;
    font-size: 19px;
    font-weight: bold;
}
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
			

 