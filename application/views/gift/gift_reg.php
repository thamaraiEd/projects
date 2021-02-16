<div class="form-bg">  
	<div class="col-md-12 col-sm-12 col-xs-12"> 
		<div class="col-md-3 col-sm-12 col-xs-12 text-center"></div> 
		<div class="col-md-6 col-sm-12 col-xs-12"> 
			<div class="row form-wrapper reg_frm "> 
				<div class="row"> 
					<h2 style="" class="reg_page_heading">REGISTER HERE TO PURCHASE <br/> A GIFT COUPON</h2>
				</div> 
				<form name="frmRegister" id="frmRegister" class="frm_regacc" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-md-6">
								<div class="form-section">
									<label class="control-label">Your name<span style="color:red"> *</span></label>
									<div class="row">
										<div class="col-md-12">
											<input type="text" maxlength="150" minlength="3" class="form-control alphaOnly" name="txtusername" value="" id="txtusername" required>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-section">
									<label class=" control-label">Country<span style="color:red"> *</span></label>
									<select class="form-control dropdown" name="ddlcountry" required id="ddlcountry">
									<option value="">Select your country</option>
									<?php foreach ($gradelist as $pro) { ?>
										<option value="<?php echo $pro['grade_id']; ?>"><?php echo $pro['gradename']; ?></option>
									<?php } ?>
									</select> 
								</div>
							</div>								
						</div>
						
						
						<div class="row">							
							<div class="col-md-6">
								<div class="form-group no-top-padding">
									<label class="control-label" for="contactnumber">Your mobile number<span style="color:red"> *</span> </label>
									<div class="row">
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon" id="Mobileprefix"></span>
												<input type="text" class="form-control input-sm numbersOnly" id="contactnumber" name="contactnumber" placeholder="" maxlength="20" minlength="" readonly='true' value="" />
												<input type="hidden" name="hdnmobile_prefix" id="hdnmobile_prefix" value="" />
												<input type="hidden" name="hdnOTP" id="hdnOTP" value="" />
											</div>
											<span for="iscontactnumbervalid" generated="true" class="iscontactnumbervalid" id="iscontactnumbervalid"></span>
										</div> 
									</div>
								</div> 
							</div>
							<div class="col-md-6">
								<div class="form-group no-top-padding">
									<label class="control-label" for="contactnumber">Your Email ID
										<span style="color:red"> *</span>
									</label>
									<div class="row">
										<div class="col-md-12">
											<div class="">
												
												<input type="text" class="form-control" name="txtemail" value="" id="txtemail" maxlength="255" required>
												<input type="hidden" name="hdnemail_prefix" id="hdnemail_prefix" value="" />
												<input type="hidden" name="hdnEmailOTP" id="hdnEmailOTP" value="" />
											</div>
											<span for="iscontactnumbervalid" generated="true" class="iscontactnumbervalid" id="iscontactnumbervalid"></span>
										</div> 
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-section">
									<label class=" control-label">Password<span style="color:red"> *</span></label>
									<div class="row">
										<div class="col-md-12">
											<input type="password" class="form-control" name="txtpassword" value="" id="txtpassword" minlength="8" maxlength="15" required> 
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-section">
									<label class=" control-label">Confirm Password<span style="color:red"> *</span></label>
									<div class="row">
										<div class="col-md-12">
											<input type="password" class="form-control" name="txtCpassword" value="" id="txtCpassword" minlength="8"  maxlength="15" required> 
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-12" align="center">
								<input type="button" name="btnRegisterSubmit" id="btnRegisterSubmit" class="btn_start btn3_start btnsbmit" value="Submit">
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12" align="center">
								<div id="successmsg" style="font-size:20px; font-weight:600; text-align: center;"></div>
							</div>
						</div>
					</div>
				</form> 
				
				<form name="frmotpverification" id="frmotpverification" class="frmfreereg" method="post" enctype="multipart/form-data" accept-charset="utf-8" style="display:none;border:none;box-shadow: none;">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-md-12 mobile_no_otp"></div>							
						</div>  
						<div class="row">
							<div class="col-md-6">
								<div class="form-section">
									<label class="control-label">OTP<span style="color:red"> *</span></label>
									<input type="text" maxlength="6" class="form-control" name="txtotp" value="" id="txtotp"  required>
									 <input type="hidden" name="hdn_demoid" id="hdn_demoid" value=""/>
									 <input type="hidden" name="hdn_mobile_no" id="hdn_mobile_no" value=""/> 
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-section">
									<input type="button" name="btnotp_verification" id="btnotp_verification" class="btn_start btn3_start btnsbmit" value="OTP Verification">
								</div>
							</div>
						</div>   
						<div class="row">
							<div class="col-lg-12" align="center">
								<div id="successmsg_otp" style="font-size:20px; font-weight:600; text-align: center;"></div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-3 col-sm-12 col-xs-12 text-center"></div>
	</div>
</div>
<form style="display:none;" name="frmgamesubmit" id="frmgamesubmit" action="<?php echo base_url(); ?>index.php/trial/gift_ids" method="POST">	
	<input type="hidden" name="gid" id="gid" value="" />
</form>
<div style="display:none;" id="Loading" class="Loading"></div>


<!--<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>-->
<style>
.navbar {
    position: relative;
}
form .dropdown {
color: #000 !important;
}

#error {
color: red;
}

.error {
color: red;
}

.errcode {
color: red;
}

.erroremail {
color: red;
}

#sbmtbtn {
padding: 10px 22px;
margin: 5px auto;
background: #e9e610;
}

.dwnbtn {
padding: 10px 22px;
margin: 5px auto;
}

#Loading {
position: fixed;
z-index: 999;
overflow: show;
margin: auto;
top: 0;
left: 0;
bottom: 0;
right: 0;
background: #5a5757 url(<?php echo base_url(); ?>assets/images/loading_icon.gif) center center no-repeat;
background-size: 5%;
opacity: 0.6;
}

.btnGeade {
margin: 5px;
}
.form-section{margin-bottom: 15px;}
</style>


<script> 
	$('.numbersOnly').keyup(function() {
		this.value = this.value.replace(/[^0-9,]/g, '');
	});

	$('.alphaOnly').keyup(function() {
		this.value = this.value.replace(/[^a-zA-Z ]/g, '');
	});
	$("#frmRegister").validate({
		rules: {			
			"txtusername": {
				required: true,
				minlength: 3
			},
			"txtemail": {
				required: true,
				email: true
			},			
			"txtpassword": {
				required: true,
				minlength: 8,
				maxlength: 15
			},
			"txtCpassword": {
				required: true,equalTo: "#txtpassword"
			},
			"ddlcountry": {
				required: true
			},
			"otp": {
				required: true,
			},
			"contactnumber": {
				required: true,
				minlength: function(element) {
					return $("#contactnumber").attr('maxlength');
				},
				maxlength: function(element) {
					return $("#contactnumber").attr('maxlength');
				}
			},
		},
		messages: {
			"txtusername": {
				required: "Please enter your name"
			},
			"otp": {
				required: "Enter OTP to continue"
			},
			"txtemail": {
				required: "Please enter your email ID",
				email: "Please enter a valid email ID"
			},
			"contactnumber": {
				required: "Please enter your mobile number",
				minlength: "Please enter a valid mobile number for your country",
				maxlength: "Please enter a valid mobile number for your country"
			},
			"txtpassword": {
				required: "Please enter a password",
				minlength: "Your password should be at least 8 characters in length",
				maxlength: "Your password should be at most 15 characters in length"
			},
			"txtCpassword": {required: "Please confirm your password",equalTo: "Your passwords do not match. Please try again"},
			"ddlcountry": {
				required: "Please select your country"
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
			} else if (element.attr("name") === "ddlcountry") {
				error.insertAfter(element.parent());
			}else if (element.attr("name") === "txtemail") {
				error.insertAfter(element.parent());
			} else {
				error.insertAfter(element.parent().parent());
			}
		}
	});

	$("#frmotpverification").validate({
		rules: {
			"txtotp": {
				required: true,
				minlength: 6
			} 
		},
		messages: {
			"txtotp": {
				required: "Please enter OTP"
			}
		},
		errorPlacement: function(error, element) {
			if (element.attr("name") === "ddlgrade") {
				error.insertAfter(element.parent().parent().parent().parent().parent().parent());
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
			var mobile=$("#contactnumber").val();
			var password=$("#txtpassword").val();		
			var country_id=$("#ddlcountry").val();
			var mobile_prefix=$("#hdnmobile_prefix").val();
			var username=$("#txtusername").val();
			
			/* var form = $('#frmRegister')[0];
			var formData = new FormData(form); */
			//alert('success');
			$('#Loading').show();
			$.ajax({
				//url: "<?php echo base_url(); ?>index.php/trial/AddTrialUser",
				url: "<?php echo $this->config->item('api_url'); ?>/giftreg",
				type: "POST",				
				data: {username:username,mobile:mobile,email:email,password:password,country_id:country_id,mobile_prefix:mobile_prefix},
				 /* dataType: "json",
				contentType: false,
				cache: false,
				processData: false, */ 
				success: function(data)
				{  
				/* alert(data);
				alert(mobile); */				
				//alert(data.gid[0].gid);
					/* alert(data.uid[0].gid);					
					 alert(data.uid[0]);					
					console.log(data.uid[0]); */
					
					$('#Loading').hide();
					if (data.code=="SA000")
					{
						//$("#successmsg").show().html('<div style="color:green">'+data.msg+'</div>');
						//window.location.href = "<?php echo base_url(); ?>index.php/trial/trialgames";						
						//$("#gid").val(data.gid[0].gid);
						SendOTP(mobile,mobile_prefix,data.gid[0].gid);	
							
					}
					else
					{
						$("#successmsg").show().html('<div style="color:red">' + data.message + '</div>'); 
						
					}
				}
			});
		} else {
			$("#errEmail").show();
		}
	});
	
	function SendOTP(mobile,mobile_prefix,gid)
	{
		$('#Loading').show();
		$.ajax({
			url: "<?php echo $this->config->item('api_url'); ?>/otp_gift",
			type: "POST",				
			data: {mobile:mobile,mobile_prefix :mobile_prefix,gid:gid}, 
			success: function(data)
			{ //alert(data);
			 //alert(data.status);
				$('#Loading').hide();
				if (data.status=="Success")
				{
					$("#hdn_demoid").val(gid);
					$("#hdn_mobile_no").val(mobile);
					$("#frmotpverification").show();
					$("#frmRegister").hide();
					$(".mobile_no_otp").html(" OTP sent to your mobile no. "+mobile_prefix+" "+mobile);
				}
				else
				{						
					$("#successmsg").show().html('<div style="color:red">Please try again</div>');
					$("#frmotpverification").hide();
					$("#frmRegister").show();
				}
			}
		});
	}
	
	$("#btnotp_verification").click(function()
	{
		if ($("#frmotpverification").valid())
		{
			var txtotp=$("#txtotp").val();
			var hdn_gid=$("#hdn_demoid").val();
			var hdn_mobile_no=$("#hdn_mobile_no").val();  
			$('#Loading').show();
			$.ajax({
				
				//url: "<?php echo $this->config->item('api_url'); ?>/otpverify_gift",
				url: "<?php echo base_url(); ?>index.php/trial/AddGiftOTP",
				type: "POST",				
				data: {mobile:hdn_mobile_no,otp:txtotp,gid:hdn_gid}, 
				dataType: "json",
				success: function(data)
				{ //alert(data);
					$('#Loading').hide();
					if (data.response==1)
					{	
						window.location.href = "<?php echo base_url(); ?>index.php/trial/gift_price";
					}
					else
					{						
						$("#successmsg_otp").show().html('<div style="color:red">' + data.message + '</div>'); 
					}
				}
			});
		}
		else
		{
			$("#errEmail").show();
		}
	});
	
	countrydd();
	
	function countrydd()
	{
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('index.php/trial/country') ?>",
			success: function(result) {
				$("#ddlcountry").html(result);
			}
		});
	}
	$("#ddlcountry").change(function()
	{
		/*  alert($("#country option:selected" ).val());
		alert($("#country option:selected" ).attr('data-prefix'));
		alert($("#country option:selected" ).attr('data-length'));  */

		$("#ddlcountry").valid();

		$("#contactnumber").val('');
		$("#hdnmobile_prefix").val('');

		$("#Mobileprefix").text('');

		$("#contactnumber").attr("readonly", false);
		$("#hdnmobile_prefix").val($("#ddlcountry option:selected").attr('data-prefix'));

		$("#contactnumber").attr('minlength', $("#ddlcountry option:selected").attr('data-length'));
		$("#contactnumber").attr('maxlength', $("#ddlcountry option:selected").attr('data-length'));
		$("#Mobileprefix").text($("#ddlcountry option:selected").attr('data-prefix'));

	});

	
</script>