
<div id="" class="container playGames homePlayGames" style="margin-top:20px;margin-bottom:70px;">
	<form name="frmRegister" id="frmRegister" class="" method="post" enctype="multipart/form-data" >
	  <div class="row">
		<div class="col-lg-12">
		<h1 style="margin:0 0 30px;text-align: center;padding-bottom: 7px;"><span style="padding-bottom:5px;color:#000;">Paid Successfully!!!</span> </h1>
		 </div></div>
		 <div class="row">
		  <div class="col-lg-12 alert alert-success" style="text-align:center;">Now !! you can share the gift for your choice
		  <!--<a href="<?php echo base_url(); ?>index.php/trial/dashboard" data-toggle="modal" data-target="#login-modal" class="loginLink" style="color: #fff;font-size: 22px;background: #c01a4f;padding: 10px;border-radius: 5px;">Child List</a>-->
		
		  </div> 
		  <div class="col-md-12 col-sm-12 col-xs-12 alert alert-success">		
			<div class="col-md-6">
				<div class="form-group no-top-padding">
					<label class="control-label" for="mail" style="color:#ffffff;" align="left">Email ID
						<span style="color:red"> *</span>
					</label>
					<div class="row">
						<div class="col-md-8">
							<div class="">							
								<input type="text" class="form-control" name="txtemail" value="" id="txtemail" maxlength="255" required>
								<input type="hidden" name="hdnemail_prefix" id="hdnemail_prefix" value="" />							
							</div>
							
						</div> 
					</div>
				</div>
			</div>
			<div class="col-md-6" align="left">
				<input type="button" name="btnRegisterSubmit" id="btnRegisterSubmit" class="btn_start btn3_start btnsbmit" value="Share">
			</div>
		

		<div class="row">
			<div class="col-lg-12" align="center">
				<div id="successmsg" style="font-size:20px; font-weight:600; text-align: center;"></div>
			</div>
		</div>
		</div>
		 </div> 
		 
	</form>	 
</div>
<div id="mainContDisp"></div>
<script>
$("#frmRegister").validate({
		rules: {
			"txtemail": {
				required: true,
				email: true
			}
			
		},
		messages: {
			
			"txtemail": {
				required: "Please enter the email ID",
				email: "Please enter the valid email ID"
			}			
		},
		errorPlacement: function(error, element) {
			if (element.attr("name") === "ddlgrade") {
				error.insertAfter(element.parent().parent().parent().parent());
			} else if (element.attr("id") === "txtPMobile" || element.attr("id") === "txtMobile") {
				error.insertAfter(element.parent());
			} else if (element.attr("name") === "program") {
				error.insertAfter(element.parent());
			} else if (element.attr("name") === "contactnumber") {
				error.insertAfter(element.parent());
			} else {
				error.insertAfter(element.parent());
			}
		}
	});
	$("#btnRegisterSubmit").click(function()
	{
		if ($("#frmRegister").valid())
		{
			var email=$("#txtemail").val();			
			/* var form = $('#frmRegister')[0];
			var formData = new FormData(form); */
			//alert('success');
			$('#Loading').show();
			$.ajax({
				url: "<?php echo base_url(); ?>index.php/trial/AddTrialUser",
				//url: "<?php echo $this->config->item('api_url'); ?>/setregister",
				type: "POST",				
				data: {email:email},
				/* dataType: "json",
				contentType: false,
				cache: false,
				processData: false, */
				success: function(data)
				{
					alert(data);
				}
			});
		} else {
			$("#errEmail").show();
		}
	});
</script>
<style>
#mainContDisp {
    background: url(<?php echo base_url(); ?>assetsnew/images/reg-success.jpg) no-repeat;
    background-position: center;
    background-size: contain;
    min-height: 500px; 
}
.alert-success {
    color: #ffffff;
    background-color: #673AB7;
    border-color: #673AB7;
    font-size: 25px;
    letter-spacing: 1px;
}

.error {
color: red;
}


</style>