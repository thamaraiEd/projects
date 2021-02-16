<script src="<?php echo base_url(); ?>assetsnew/js/sweetalert/sweetalert2.js"></script>
<link href="<?php echo base_url(); ?>assetsnew/css/sweetalert/sweetalert2index.min.css">
<div id="loadingimage" style="display:none;" class="loader"></div>
	<?php	$cur_date=date("Y-m-d");
	if($cur_date<=$this->session->enddate)
	{ ?>
	 <form name="frmAdd" id="frmAdd" class="" method="post" enctype="multipart/form-data" >
		<div class="daily_puzzles"> 
			<div class="container">
				<div class="row">
				
					<fieldset>
						<legend>Add Section:</legend>
						<div id="suucessmsg" style="color: green; font-size:20px; font-weight:600; text-align: center;"></div>
						<div class="GradeSelection">
							<div class="col-sm-3">
								<label for="grade">Select Grade <span style="color:red" class="mf" >*</span></label>
								<select name="ddlgrade" id="ddlgrade" class="nice-select">
									<option value="">Select Grade</option>
									<option value="3">Grade I</option> 
									<option value="4">Grade II</option> 
									<option value="5">Grade III</option> 
									<option value="6">Grade IV</option> 
									<option value="7">Grade V</option> 
									<option value="8">Grade VI</option> 
									<option value="9">Grade VII</option> 
									<option value="10">Grade VIII</option>  
								</select> 
							</div> 
							<div class="col-sm-4">
								<label>Enter Section <span style="color:red" class="mf" >*</span></label>
								<input type="text" name="txtsection" class="form-control alphaOnly" id="txtsection">
								<!--<div id="secid">
								</div>-->
							</div> 
							<div class="col-sm-2">
								<input type="button" id="btnadd" name="btnadd"  class="btn btn-success" value="Add"> 
							</div> 
							<div class="col-sm-2"> 
								<input type="reset" id="btnReset"   class="btn btn-success" value="Reset">
								<!--<div id="secid"></div>-->
							</div> 
						</div>
					</fieldset>
					<div id="teachersuucessmsg" style="color: green; font-size:25px; font-weight:600; text-align: center;"></div>
				
					 <div id="errmsg" style="color: red; font-size:20px; font-weight:600; text-align: center;padding:5px"></div> 
				
				</div> 
				<div style="text-align:center;clear:both;">
							<div style="padding-bottom:5px;">   
								<label    style="color:red"  class="error" id="errcommon"></label>
			</div>  
			</div> 
			</div> 
			<div class="row">
				<div class="col-lg-12">
					<div class="MyGamesPager pageHomePagerHide Dashboardhide myreporthide myprofilehide" style="min-height:500px;">
						 <div class="contentbox" id="dashboard_ajax">
							 
						</div>
					</div> 
				</div> 
			</div> 
		</div>
	</form>	
	<?php }
	elseif($cur_date>$this->session->enddate)
	{ ?>
	 
		<div class="daily_puzzles"> 
			<div class="container">
				<div class="row"> 
					<span id="errmsg" style="color:red;text-shadow: none;font-size:35px; margin-left: 482px; margin-right: 482px;font-weight:700;" >Plan Expired</span>
					
				</div> 
			</div> 

			<div class="row">
				<div class="col-lg-12">
					<div class="MyGamesPager pageHomePagerHide Dashboardhide myreporthide myprofilehide" style="min-height:500px;">
						 <div class="contentbox" id="dashboard_ajax">
							 
						</div>
					</div> 
				</div> 
			</div> 
		</div> 
<?php
	}
	?>
	<div style="clear:both">

	<div id="dashboard_ajax"></div>
 
<!--<script src="<?php echo base_url(); ?>assetsnew/css/jquery.min.js"></script>-->
 <link href="<?php echo base_url(); ?>assetsnew/css/commonstyle.css" rel="stylesheet">
 <link href="<?php echo base_url(); ?>assetsnew/css/stylenew.css" rel="stylesheet">
 <script type="text/javascript">
$(document).ready(function(){  
 
$('.alphaOnly').keyup(function () { 
this.value = this.value.replace(/[^a-zA-Z ]/g,'');
});

$("#btnReset").click(function()
{
	$("#txtsection").val("");
	$(".error").text("");
	$("#suucessmsg").html("");
	
});

$("#frmAdd").validate({
		rules: 
		{
			"ddlgrade": {required: true},
			"txtsection": {required: true}  
		},
		messages: 
		{
			"ddlgrade": {required: "Please select grade"},
			"txtsection": {required: "Please enter section"} 
		},
		errorPlacement: function(error, element) 
		{
			if (element.attr("type") === "radio")
			{
				error.insertAfter(element.parent().parent().parent());
			}
			else if (element.attr("type") === "checkbox")
			{
				error.insertAfter(element.parent());
			}
			else if (element.attr("name") === "txtMobile")
			{
				error.insertAfter(element);
			}
			else
			{
				error.insertAfter(element);
			}
		},
		highlight: function(input) {
		$(input).addClass('error');
		} 
	});


	$("#btnadd").click(function()
	{  
		if($("#frmAdd").valid())
		{	
			$("#loadinimage").show();
			var formData = new FormData($("#frmAdd")[0]);
			$.ajax({
				//url: "ajax_data.php",
				url: "<?php echo base_url(); ?>index.php/sa/addgradesection",
				type: 'POST',
				dataType:"json",
				data: formData,
				contentType: false,       
				cache: false,             
				processData:false,
				success: function (data) 
				{
					 
					if($.trim(data.response)=='1')
					{
						$('#btnreset').click();
						//$("#suucessmsg").html(data.msg); 
						 
						$("#suucessmsg").html(data.msg).delay(1500).fadeOut("slow");
						$("#frmAdd")[0].reset(); 
						$("#loadinimage").hide();
						SchoolClassSec();		
						$("#errmsg").hide();
					}
					else if($.trim(data.response)=='2')
					{
						$("#errmsg").html(data.msg).show();
					}
					else
					{
						$("#errcommon").show();
					} $("#loadinimage").hide();
				}	
			});	
		} 
	}); 

});  
SchoolClassSec();
function SchoolClassSec()
{
	$.ajax({
		type: "POST", 
		url: "<?php echo base_url(); ?>index.php/sa/schoolclass",
		data: {},
		success: function(result)
		{
			$('#loadingimage').hide();
			$('#dashboard_ajax').html(result); 
		}
	});
}
 
</script>
<style> 
.inactiveLink{pointer-events: none;cursor: default;}
.form-control {
    border: none;
    border: 1px solid #e6e6e6;
    height: 40px !important;
} 
.container .form-group label.error {
    color: #b51908;
    font-size: 14px;
}
.error{
	color:red; font-size: 15px !important;
}
.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate { 
    font-size: 15px !important;
}
label { 
    font-size: 15px !important;
}
</style>

<script type="text/javascript" src="<?php echo base_url();?>assetsnew/js/jquery.nice-select.js"></script>
<link href="<?php echo base_url();?>assetsnew/css/nice-select.css" rel="stylesheet">
 
