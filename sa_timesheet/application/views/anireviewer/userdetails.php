<div class="right_col" role="main"> 
	<div id="SearchBox" class="tab-content">
		<div role="tabpanel" style="clear:both;" class="tab-pane fade active in" id="OverView" aria-labelledby="home-tab">
		<form id="frmtracking" method="POST">  
			<div class="row">
				<div class="col-md-5 col-sm-5 col-xs-6 clstotal">
					<div class="col-sm-3"><label class="">Select Role</label></div>
						<?php
						foreach($getrolelist as $role)
						{
							if($role['ur_id']==1)
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
						}
						?>
				</div> 
				<div class="col-md-4 col-sm-4 col-xs-6 clstotal">
					<div class="col-sm-3"><label class="">Log Date</label></div>
					<div class="col-sm-9">
						<input type="text" name="log_date" id="log_date" value="" /> <div class="error"></div>
					</div>
				</div> 
				<div class="col-md-2 col-sm-2 col-xs-2 clstotal">
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
			url: "<?php echo base_url(); ?>index.php/reviewer/animater_userreports",
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
			url: "<?php echo base_url(); ?>index.php/reviewer/bgartist_userdetails",
			data: {roleid:roleid,log_date:log_date},
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
	font-size: 20px;
}
</style>
<link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/dataTables.tableTools.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.tableTools.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-multiselect.js"></script>

<link href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> 
<script src = "<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script src = "<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
 
<script>
$(document).on('click','.show_popup',function() 
{	  
	var rowid=$(this).attr('data-rowid');
	var userid=$(this).attr('data-userid');
	var logdate=$(this).attr('data-logdate');
	
	$('#afModal').modal('show');
	$("#btnafrm").click(function()
	{ 
		if($("#frmAF").valid())
		{ 
			$(".loading").show(); 
			$.ajax({
				url: "<?php echo base_url(); ?>index.php/admin/delete_animator_row", 
				type:'POST',
				data:{rowid:rowid,userid:userid,logdate:logdate,txtremarks:$("#txtremarks").val()}, 
				success: function(data)
				{ 
					$(".loading").hide();
					if(data=='1')
					{
						$(".close").trigger("click");
						$("#Succ_msg").html(data.msg);
						userrole(); 
					}
					else
					{ 
						$("#errcommon").show().html(data.msg);
					}
					  
				}
			});
		}
	}); 
});

$(document).on('click','.show_popup_bg',function() 
{	  
	var rowid=$(this).attr('data-rowid');
	var userid=$(this).attr('data-userid');
	var logdate=$(this).attr('data-logdate');
	
	$('#afModal').modal('show');
	$("#btnafrm").click(function()
	{
		if($("#frmAF").valid())
		{ 
			$(".loading").show(); 
			$.ajax({
				url: "<?php echo base_url(); ?>index.php/admin/delete_bgartist_row", 
				type:'POST',
				data:{rowid:rowid,userid:userid,logdate:logdate,txtremarks:$("#txtremarks").val()}, 
				success: function(data)
				{ 
					$(".loading").hide();
					if(data=='1')
					{  
						$(".close").trigger("click");
						$("#Succ_msg").html(data.msg);
						userrole(); 
					}
					else
					{
						//alert();
						$("#errcommon").show().html(data.msg);
					}
					  
				}
			});
		}
	}); 
}); 
	
</script>

 