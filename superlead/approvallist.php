<div class="right_col" role="main">

	<div id="SearchBox" class="tab-content">
		<div role="tabpanel" style="clear:both;" class="tab-pane fade active in" id="OverView" aria-labelledby="home-tab">
		<form id="frmtracking" method="POST"> 
			
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-6 clstotal">
					<div class="col-sm-3"><label class="">Select Role</label></div>
						<?php
						foreach($getrolelist as $role)
						{
							if($role['ur_id']==1){$checked="Checked='checked'";}else{$checked="";}
						?>
							<div class="col-sm-3">
								<label class="radio-inline">
									<input type="radio" class="ddlrole"  name="ddlrole" value="<?php echo $role['ur_id']; ?>" <?php echo $checked; ?> ><?php echo $role['ur_name']; ?>
								</label>
							</div> 
						<?php
						}
						?>
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
	userrole();
	$('.ddlrole').change(function()
	{
		 userrole();
	}); 
});
	
function userrole()
{ 
	$(".modal-backdrop").hide();
	var roleid=$("input[name='ddlrole']:checked").val();
	$("#iddivLoading").show();
	if(roleid==1)
	{
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/superlead/get_animatorlist",
			data: {roleid:roleid},
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
			url: "<?php echo base_url(); ?>index.php/superlead/get_bgartistlist",
			data: {roleid:roleid},
			success: function(result){
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
	font-size: 25px;
}
</style>
			

 