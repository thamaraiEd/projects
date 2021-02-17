<div class="right_col" role="main"> 
	<div id="SearchBox" class="tab-content">
		<div role="tabpanel" style="clear:both;" class="tab-pane fade active in" id="OverView" aria-labelledby="home-tab">
		<form id="frmtracking" method="POST"> 
			
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 clstotal">
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
			url: "<?php echo base_url(); ?>index.php/home/get_animatorlist",
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
			url: "<?php echo base_url(); ?>index.php/home/get_bgartistlist",
			data: {roleid:roleid},
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
			url: "<?php echo base_url(); ?>index.php/home/get_reviewerlist",
			data: {roleid:roleid},
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
			url: "<?php echo base_url(); ?>index.php/home/get_storyboardlist",
			data: {roleid:roleid},
			success: function(result){
				$("#iddivLoading").hide();		 
				$("#report_result").html(result);	 
			}
		});
	}
	else if(roleid==8)
	{
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/home/get_complist",
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
	font-size: 16px !important;
    margin: 0px 10px;
} 
.radio_btn{float:left;margin 0px 10px !important;}
</style>      
<link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/dataTables.tableTools.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.tableTools.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-multiselect.js"></script>

<link href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url(); ?>assets/js/datatbl/sweetalert.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datatbls/sweetalert.css" type="text/css">

<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> 
<script src = "<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script src = "<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(document).on('click','.show_popup',function() 
{	 
	$("#frmAF").find("input[type=text], textarea select").val("");
	$(".xtime").hide();
	$("#hdnlogdate").val($(this).attr('data-logdate'));
	
	var idval=$(this).attr('data-id'); 
	var rowid=$(this).attr('data-rowid');
	var uid=$(this).attr('data-uid'); //alert(uid);
	var assignedfrm=$(this).attr('data-assignedfrm');
	var completedfrm=$(this).attr('data-completedframe');
	var assigned_duration=$(this).attr('data-assigned_duration');
	if($(this).attr('data-typeofworkid')==2)
	{
		$("#hdnworktype").val($(this).attr('data-typeofworkid'));
		var citerationtime=$(this).attr('data-citerationtime');
		$("#txtCIterationTime").val(citerationtime);
		$(".xtime").show();
	}
	else
	{
		var citerationtime=$(this).attr('data-citerationtime');
		$("#hdntxtCIterationTime").val(citerationtime);
	}
	var name=$(".assfrm_"+rowid).text();  
	 $("#Assigned_duration").text(assigned_duration);
	 
	 $("#Assigned_frame").text(assignedfrm);
	 $("#Completed_frame").text(completedfrm); 
	 
	 $("#hdnaid").val(idval);
	 $("#hdnuid").val(uid);
	 $("#hdnassigned_duration").val(assigned_duration);
	 
	$('#afModal').modal('show');
	
});
$(document).on('click','#btnANI',function()  
{
	if($("#frmAF").valid())
	{
		 $(".loading").show(); 
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/home/approveframe", 
			type:'POST',
			data:{aid:$("#hdnaid").val(),uid:$("#hdnuid").val(),txtapproveframe:$("#txtapproveframe").val(),txtdirectorremarks:$("#txtdirectorremarks").val(),assigned_duration: $("#hdnassigned_duration").val(),hdnworktype:$("#hdnworktype").val(),txtCIterationTime:$("#txtCIterationTime").val(),hdntxtCIterationTime:$("#hdntxtCIterationTime").val(),hdnlogdate:$("#hdnlogdate").val()},
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
	var assignedfrm=$(this).attr('data-assignedfrm');
	var completedfrm=$(this).attr('data-completedframe'); 
	var quantity=$(this).attr('data-quantity');
	
	
	var name=$(".assfrm_"+rowid).text();// 
	 $("#Quantity_div").text(quantity);
	 $("#Assigned_frame").text(assignedfrm);
	 $("#Completed_frame").text(completedfrm); 
	 
	 $("#hdnaid").val(idval);
	 $("#hdnuid").val(uid);
	 $("#hdnquantity").val(quantity);
	 
	$('#BGModal').modal('show');
	 
}); 
$(document).on('click','#btnBG',function()  
{
	if($("#frmBG").valid())
	{ 
		 $(".loading").show(); 
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/home/approveproductivity", 
			type:'POST',
			data:{aid:$("#hdnaid").val(),uid:$("#hdnuid").val(),txtapproveproductivity:$("#txtapproveframe").val(),txtdirectorremarks:$("#txtdirectorremarks").val(),quantity:$("#hdnquantity").val()},
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
	var rowid=$(this).attr('data-id');
	var uid=$(this).attr('data-uid');  
	
	var projectname=$(this).attr('data-projectname');
	var taskname=$(this).attr('data-taskname');  
	var remarks=$(this).attr('data-remarks');  
	
	 
	 $("#pname").text(projectname);
	 $("#tname").text(taskname); 
	 $("#remarks_byre").text(remarks); 
	
	 $("#hdnrowid").val(rowid);	 
	 $("#hdnuid").val(uid);
	 
	$('#ARModal').modal('show');
	
}); 
$(document).on('click','#btnAR',function() 
{
	if($("#formAR").valid())
	{
		$(".loading").show(); 
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/home/addRemarksforreviewer", 
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
	 $("#hdntask_duration").val(taskduration);
	 
	 $("#hdnrowid").val(rowid);	 
	 $("#hdnuid").val(uid);
	 
	$('#SBAModal').modal('show');
	
}); 
$(document).on('click','#btnSBAbtn',function()  
{
		if($("#frmSBA").valid())
		{
			$("#errcommon").hide().html('');
			$(".loading").show(); 
			$.ajax({
				url: "<?php echo base_url(); ?>index.php/home/addRemarksforsba", 
				type:'POST',
				data:{rowid:$("#hdnrowid").val(),uid:$("#hdnuid").val(),txtdirectorremarks:$("#txtdirectorremarks").val(),txtcompleted_duration:$("#txtcompleted_duration").val(),task_duration:$("#hdntask_duration").val()},
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
					else if($.trim(data.response)=='0')
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
	$("#hdntask_duration").val(taskduration);
	
	$("#hdnrowid").val(rowid);	 
	$("#hdnuid").val(uid);
	 
	$('#CompModal').modal('show');
	
}); 
$(document).on('click','#btnCOMPbtn',function()  
{  
	if($("#frmComp").valid())
	{
		$("#errcommon").hide().html('');
		$(".loading").show(); 
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/home/addRemarksforcomp", 
			type:'POST',
			data:{rowid:$("#hdnrowid").val(),uid:$("#hdnuid").val(),txtdirectorremarks:$("#txtdirectorremarks").val(),txtcompleted_duration:$("#txtcompleted_duration").val(),task_duration:$("#hdntask_duration").val()},
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
				else if($.trim(data.response)=='0')
				{ 
					$("#errcommon").show().html(data.msg);
				}
				  
			}
		});
	}
}); 
</script>			

 