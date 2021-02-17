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
							if($role['ur_id']==1){$checked="Checked='checked'";}else{$checked="";}
						?>
							<div class="radio_btn">
								<label class="radio-inline">
									<input type="radio" class="ddlrole"  name="ddlrole" value="<?php echo $role['ur_id']; ?>" <?php echo $checked; ?> ><?php echo $role['ur_name']; ?>
								</label>
							</div> 
						<?php
						}
						?>
				</div> 
				<div class="col-md-3 col-sm-3 col-xs-6 clstotal">
					<div class="col-sm-4"><label class="">Log Date</label></div>
					<div class="col-sm-6">
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
	$(".modal-backdrop").hide();
	var roleid=$("input[name='ddlrole']:checked").val();
	var log_date=$("#log_date").val();
	$("#iddivLoading").show();
	if(roleid==1)
	{
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/superlead/animater_userdetails",
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
			url: "<?php echo base_url(); ?>index.php/superlead/bgartist_userdetails",
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
			url: "<?php echo base_url(); ?>index.php/superlead/Reviewer_Userdetails",
			data: {roleid:roleid,log_date:log_date},
			success: function(result){
				$("#iddivLoading").hide();		 
				$("#report_result").html(result);	 
			}
		});
	}
	
	else if(roleid==7)
	{
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/superlead/StoryBoard_Userdetails",
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
			url: "<?php echo base_url(); ?>index.php/superlead/Comp_Userdetails",
			data: {roleid:roleid,log_date:log_date},
			success: function(result)
			{
				$("#iddivLoading").hide();		 
				$("#report_result").html(result);	 
			}
		});
	}

	else if(roleid==3)
	{
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/superlead/Dir_Userdetails",
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

 <!-- <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">  -->         
<link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/dataTables.tableTools.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
 <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.tableTools.js" type="text/javascript"></script> 

<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> 
<script src = "<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script src = "<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(document).on('click','.show_popup',function() 
{	 
	$("#frmANI").find("input[type=text], textarea select").val("");
	$("#errcommon").hide().html('');
	var idval=$(this).attr('data-id'); 
	var rowid=$(this).attr('data-rowid');
	var uid=$(this).attr('data-uid'); //alert(uid);	 
	  	
	$("#hdnrowid").val(idval);
	$("#hdnuid").val(uid);
	
	$('#ANIModal').modal('show');	
}); 
$(document).on('click','#btnANI',function() 
{
	if($("#frmANI").valid())
	{ 
		$(".loading").show(); 
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/superlead/ani_superleadcomments", 
			type:'POST',
			data:{aid:$("#hdnrowid").val(),uid:$("#hdnuid").val(),txtdirectorremarks:$("#txtdirectorremarks").val()},
			dataType:"json",
			success: function(data)
			{
				$(".loading").hide();
				if($.trim(data.response)=='1')
				{  
					$(".close").trigger("click");
					$("#Succ_msg").html(data.msg);
					userrole(); 
				}
				else if($.trim(data.response)=='2')
				{ 
					$("#errcommon").show().html(data.msg);
				} 
			}
		});
	}
}); 

$(document).on('click','.show_popup_bg',function() 
{	 
	$("#frmBG").find("input[type=text], textarea select").val("");
	$("#errcommon").hide().html('');
	
	var idval=$(this).attr('data-id'); 
	var rowid=$(this).attr('data-rowid');
	var uid=$(this).attr('data-uid'); //alert(uid);	 
	var name=$(".assfrm_"+rowid).text(); 
	
	$("#hdnrowid").val(idval);
	$("#hdnuid").val(uid);
	
	 
	$('#BGModal').modal('show');
	 
}); 

$(document).on('click','#btnBG',function()
{
	if($("#frmBG").valid())
	{ 
		 $(".loading").show(); 
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/superlead/bg_superleadcomments", 
			type:'POST',
			data:{aid:$("#hdnrowid").val(),uid:$("#hdnuid").val(),txtdirectorremarks:$("#txtdirectorremarks").val()},
			dataType:"json",
			success: function(data)
			{
				$(".loading").hide();
				if($.trim(data.response)=='1')
				{  
					$(".close").trigger("click");
					$("#Succ_msg").html(data.msg);
					userrole(); 
				}
				else if($.trim(data.response)=='2')
				{ 
					$("#errcommon").show().html(data.msg);
				}
				  
			}
		});
	}
});

$(document).on('click','.show_popup_review',function() 
{	  
	$("#frmAR").find("input[type=text], textarea select").val("");
	$("#errcommon").hide().html('');

	var rowid=$(this).attr('data-id');
	var uid=$(this).attr('data-uid'); 
	
	var projectname=$(this).attr('data-projectname');
	var taskname=$(this).attr('data-taskname');  
	
	 
	 $("#pname").text(projectname);
	 $("#tname").text(taskname); 
	 
	$("#hdnrowid").val(rowid);
	$("#hdnuid").val(uid);
	 
	$('#ARModal').modal('show');
	
}); 
$(document).on('click','#btnAR',function() 
{
	if($("#frmAR").valid())
	{
		$(".loading").show(); 
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/superlead/addLeade2Remarks", 
			type:'POST',
			data:{rowid:$("#hdnrowid").val(),uid:$("#hdnuid").val(),txtdirectorremarks:$("#txtdirectorremarks").val()},
			dataType:"json",
			success: function(data)
			{
				$(".loading").hide();
				if($.trim(data.response)=='1')
				{  
					$(".close").trigger("click");
					$("#Succ_msg").html(data.msg);
					userrole(); 
				}
				else if($.trim(data.response)=='2')
				{ 
					$("#errcommon").show().html(data.msg);
				}
				  
			}
		});
	}
}); 

$(document).on('click','.show_popup_sba',function() 
{	 
	$("#frmSBA").find("input[type=text], textarea select").val("");
	$("#errcommon").hide().html('');
	
	var rowid=$(this).attr('data-id');
	var uid=$(this).attr('data-uid');  
	
	var projectname=$(this).attr('data-projectname');
	var taskname=$(this).attr('data-taskname');  
	var taskduration=$(this).attr('data-taskduration');  
	var remarks=$(this).attr('data-remarks');  
	
	 
	 $("#pname").text(projectname);
	 $("#tname").text(taskname); 
	 $("#remarks_byre").text(remarks); 
	 $("#tduration").text(taskduration); 
		
	$("#hdnrowid").val(rowid);
	$("#hdnuid").val(uid);
	 
	$('#SBAModal').modal('show');
	 
}); 

$(document).on('click','#btnSBA',function() 
{ 
	if($("#frmSBA").valid())
	{
		$(".loading").show(); 
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/superlead/addLeade2Remarksforsba", 
			type:'POST',
			data:{rowid:$("#hdnrowid").val(),uid:$("#hdnuid").val(),txtdirectorremarks:$("#txtdirectorremarks").val()},
			dataType:"json",
			success: function(data)
			{
				$(".loading").hide();
				if($.trim(data.response)=='1')
				{
					$(".close").trigger("click");
					$("#Succ_msg").html(data.msg);
					userrole(); 
				}
				else if($.trim(data.response)=='2')
				{ 
					$("#errcommon").show().html(data.msg);
				}
				  
			}
		});
	}
});
$(document).on('click','.show_popup_comp',function() 
{	 
	$("#frmComp").find("input[type=text], textarea select").val("");
	$("#errcommon").hide().html(''); 
	 
	var rowid=$(this).attr('data-id');
	var uid=$(this).attr('data-uid');  
	
	var projectname=$(this).attr('data-projectname');
	var taskname=$(this).attr('data-taskname');  
	var taskduration=$(this).attr('data-taskduration');  
	var remarks=$(this).attr('data-remarks');  
	
	 
	 $("#pname").text(projectname);
	 $("#tname").text(taskname); 
	 $("#remarks_byre").text(remarks); 
	 $("#tduration").text(taskduration); 

	$("#hdnrowid").val(rowid);
	$("#hdnuid").val(uid);
	
	
	$('#CompModal').modal('show');
	 
}); 

$(document).on('click','#btnComp',function() 
{
	if($("#frmComp").valid())
	{
		$(".loading").show(); 
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/superlead/addLeade2Remarksforcomp", 
			type:'POST',
			data:{rowid:$("#hdnrowid").val(),uid:$("#hdnuid").val(),txtdirectorremarks:$("#txtdirectorremarks").val()},
			dataType:"json",
			success: function(data)
			{
				$(".loading").hide();
				if($.trim(data.response)=='1')
				{
					$(".close").trigger("click");
					$("#Succ_msg").html(data.msg);
					userrole(); 
				}
				else if($.trim(data.response)=='2')
				{ 
					$("#errcommon").show().html(data.msg);
				}
				  
			}
		});
	}
});



$(document).on('click','.show_popup_dir',function() 
{	 
	$("#frmDir").find("input[type=text], textarea select").val("");
	$("#errcommon").hide().html('');
	
	var rowid=$(this).attr('data-id');
	var uid=$(this).attr('data-uid');  
	
	var projectname=$(this).attr('data-projectname');
	var taskname=$(this).attr('data-taskname');  
	var taskduration=$(this).attr('data-taskduration');  
	var remarks=$(this).attr('data-remarks');  
	
	 
	 $("#pname").text(projectname);
	 $("#tname").text(taskname); 
	 $("#remarks_byre").text(remarks); 
	 $("#tduration").text(taskduration); 
		
	$("#hdnrowid").val(rowid);
	$("#hdnuid").val(uid);
	 
	$('#DirModal').modal('show');
	 
}); 

$(document).on('click','#btnDir',function() 
{
	if($("#frmDir").valid())
	{
		$(".loading").show(); 
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/superlead/addLeade2Remarksfordir", 
			type:'POST',
			data:{rowid:$("#hdnrowid").val(),uid:$("#hdnuid").val(),txtdirectorremarks:$("#txtdirectorremarks").val()},
			dataType:"json",
			success: function(data)
			{
				$(".loading").hide();
				if($.trim(data.response)=='1')
				{
					$(".close").trigger("click");
					$("#Succ_msg").html(data.msg);
					userrole(); 
				}
				else if($.trim(data.response)=='2')
				{ 
					$("#errcommon").show().html(data.msg);
				}
				  
			}
		});
	}
});

</script>

 