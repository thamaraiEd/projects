<div class="form-bg">  
	<div class="col-md-12 col-sm-12 col-xs-12"> 
		<div class="col-md-3 col-sm-12 col-xs-12 text-center"></div> 
		<div class="col-md-6 col-sm-12 col-xs-12"> 
			<div class="row form-wrapper reg_frm "> 
				<div class="row"> 
					<h2 style="" class="reg_page_heading">Start your Free Trial Account</h2>
				</div> 
				<form name="frmRegister" id="frmRegister" class="frm_regacc" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-md-6">
								<div class="form-section">
									<label class="control-label">Parent's Name<span style="color:red"> *</span></label>
									<input type="text" maxlength="150" class="form-control" name="txtusername" value="" id="txtusername" required>
									
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-section">
									<label class="control-label">Student Name<span style="color:red"> *</span></label>
									<input type="text" class="form-control" name="txtkidsname" value="" id="txtkidsname" required maxlength="150" > 
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-section">
									<label class="control-label">School<span style="color:red"> *</span></label>
									<input type="text" class="form-control" name="school" value="" id="school" maxlength="255" required> 
								</div> 
							</div> 
							<div class="col-md-6">
								<div class="form-section">
									<label class=" control-label">Country<span style="color:red"> *</span></label>
									<select class="form-control dropdown" name="ddlcountry" required id="ddlcountry">
									<option value="">Select</option>
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
									<label class="control-label" for="contactnumber">Parent's Mobile Number<span style="color:red"> *</span> </label>
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
									<label class="control-label" for="contactnumber">Parent's Email ID
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
									<input type="password" class="form-control" name="txtpassword" value="" id="txtpassword" minlength="8" maxlength="15" required> 
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-section">
									<label class=" control-label">Confirm Password<span style="color:red"> *</span></label>
									<input type="password" class="form-control" name="txtCpassword" value="" id="txtCpassword" minlength="8"  maxlength="15" required> 
								</div>
							</div>
							<!--<div class="col-md-6">
								<div class="form-group no-top-padding">
									<label class=" control-label">Preferred Program<span style="color:red"> *</span></label>
									<select class="form-control dropdown" name="program" required id="program">
										<option value="" class="form-control">Select</option>
										<?php foreach ($program as $pro) { ?>
											<option class="form-control" value="<?php echo $pro['id']; ?>"><?php echo $pro['program']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>-->
						</div> 
						<div class="row">
							<div class="col-md-12" style="padding: 0;">
								<div class="form-section" id="GradeBox" >
									<div class="col-md-12 form-group">
										<label class=" control-label">Grade<span style="color:red"> *</span></label>
										<div id="Grade_Ajax">

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
									<input type="text" maxlength="6" class="form-control" name="txtotp" value="" id="txtotp" maxlength="6" required>
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

<div style="display:none;" id="Loading" class="Loading"></div>


<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
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
			"txtkidsname": {
				required: true,
				minlength: 3
			},
			"txtusername": {
				required: true
			},
			"txtemail": {
				required: true,
				email: true
			},
			"licences": {
				required: true
			},
			"program": {
				required: true
			},
			"ddlgrade": {
				required: true
			},
			"txtpassword": {
				required: true
			},
			"txtCpassword": {
				required: true,equalTo: "#txtpassword"
			},
			"ddlcountry": {
				required: true
			},
			"school": {
				required: true,
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
				required: "Please enter the name"
			},
			"txtkidsname": {
				required: "Please enter the student name",
			},
			"spoc_name": {
				required: "Please enter the SPoC name"
			},
			"school": {
				required: "Please enter the school's name"
			},
			"otp": {
				required: "Enter OTP to continue"
			},
			"txtemail": {
				required: "Please enter the email ID",
				email: "Please enter the valid email ID"
			},
			"contactnumber": {
				required: "Please enter the mobile number",
				minlength: "Please enter {0} digit mobile no",
				maxlength: "Please enter {0} digit mobile no"
			},
			"licences": {
				required: "Please enter no.of licences"
			},
			"program": {
				required: "Please select the program"
			},
			"ddlgrade": {
				required: "Please select the grade"
			},
			"txtpassword": {
				required: "Please enter the password"
			},
			"txtCpassword": {required: "Please confirm password",equalTo: "Please enter valid confirm password"},
			"ddlcountry": {
				required: "Please select the country"
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
			var mobileno=$("#contactnumber").val();
			var grade=$(".selected_grade").attr('data-gradeid');
			var password=$("#txtpassword").val();
			var skillarray='';
			var school=$("#school").val();
			var country_id=$("#ddlcountry").val();
			var mobile_prefix=$("#hdnmobile_prefix").val();
			var name=$("#txtusername").val();
			var kidsname=$("#txtkidsname").val();
			
			/* var form = $('#frmRegister')[0];
			var formData = new FormData(form); */
			//alert('success');
			$('#Loading').show();
			$.ajax({
				//url: "<?php echo base_url(); ?>index.php/trial/AddTrialUser",
				url: "<?php echo $this->config->item('api_url'); ?>/setregister",
				type: "POST",				
				data: {email:email,mobileno:mobileno,grade:grade,password:password,skillarray:skillarray,school:school,country_id:country_id,mobile_prefix:mobile_prefix,name:name,kidsname},
				/* dataType: "json",
				contentType: false,
				cache: false,
				processData: false, */
				success: function(data)
				{
					/* alert(data.uid[0].demoid);
					alert(data.uid[0]['demoid']);
					console.log(data.uid[0]); */
					
					$('#Loading').hide();
					if (data.code=="SA000")
					{
						//$("#successmsg").show().html('<div style="color:green">'+data.msg+'</div>');
						//window.location.href = "<?php echo base_url(); ?>index.php/trial/trialgames";
						SendOTP(mobileno,mobile_prefix,data.uid[0].demoid);						
					}
					else
					{
						if (data.code=='SA1014') 
						{ 	
							$("#successmsg").show().html('<div style="color:red">' + data.message + '</div>');
						}
						else if (data.code =='SA1012')
						{
							$("#successmsg").show().html('<div style="color:red">' + data.message + '</div>'); 
						}
						else
						{
							$("#successmsg").show().html('<div style="color:red">' + data.message + '</div>');
						} 
					}
				}
			});
		} else {
			$("#errEmail").show();
		}
	});
	
	function SendOTP(mobileno,mobile_prefix,demoid)
	{
		$('#Loading').show();
		$.ajax({
			url: "<?php echo $this->config->item('api_url'); ?>/phno_verf_otp_demo",
			type: "POST",				
			data: {mobileno:mobileno,countrycode:mobile_prefix,demoid:demoid}, 
			success: function(data)
			{
				$('#Loading').hide();
				if (data.status=="Success")
				{
					$("#hdn_demoid").val(demoid);
					$("#hdn_mobile_no").val(mobileno);
					$("#frmotpverification").show();
					$("#frmRegister").hide();
					$(".mobile_no_otp").html(data.otp+" OTP sent to your mobile no. "+mobile_prefix+" "+mobileno);
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
			var hdn_demoid=$("#hdn_demoid").val();
			var hdn_mobile_no=$("#hdn_mobile_no").val();  
			$('#Loading').show();
			$.ajax({
				//url: "<?php echo $this->config->item('api_url'); ?>/otpverification_demo",
				url: "<?php echo base_url(); ?>index.php/trial/AddTrialAccount",
				type: "POST",				
				data: {mobileno:hdn_mobile_no,otp:txtotp,demoid:hdn_demoid}, 
				dataType: "json",
				success: function(data)
				{ 
					$('#Loading').hide();
					if(data.response==1)
					{	
						window.location.href = "<?php echo base_url(); ?>index.php/trial/trialgames";
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

	/* $("#btnCheckReferral").click(function() {
		var code = $('#referral')[0].value;
		if (code == "")
			return;
		var formData = new FormData();
		formData.append("code", code);
		$('#Loading').show();
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/trial/checkReferralCode",
			type: "POST",
			dataType: "json",
			data: formData,
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				$('#Loading').hide();
				if (data.response == 1) {
					$("#successmsg").show().html('<div style="color:green">' + data.msg + '</div>');
				} else {
					$("#successmsg").show().html('<div style="color:red">' + data.msg + '</div>');
				}
			}
		});
	});
 */
	/* $("#program").change(function() {
		var pid = $("#program").val();
		if (pid != '') {
			$("#GradeBox").show();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('index.php/trial/getgradelist') ?>",
				data: {
					pid: $("#program").val()
				},
				success: function(result) {
					$("#Grade_Ajax").html(result);
				}
			});
		} else {
			$("#Grade_Ajax").html('');
			$("#GradeBox").hide();
		}
	}); */
		 
	gradedd();
	countrydd();
	function gradedd()
	{
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('index.php/trial/getgradelist') ?>",
			data: {pid:1},
			success: function(result) {
				$("#Grade_Ajax").html(result);
			}
		});
	}
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

	$(document).on("click", ".clsgrade", function()
	{
		var id = $(this).val();

		$(".clsofgrade").removeClass('selected_grade');
		$(".clsofgrade").removeClass('selected_skills');
		$("#Grade_" + id).addClass('selected_grade');
		$("#Grade_" + id).addClass('selected_skills');

	});
	
	/* $(document).on("click", "#sendotp", function()
	{ alert("sendotp");
		var number = $('#contactnumber')[0].value;
		if (number == "" || number.length > $("#contactnumber").attr('maxlength') || number.length < $("#contactnumber").attr('minlength'))
		{
			return;
		} 
		$('#Loading').show();
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/trial/sendOTPforemailverification",
			type: "POST",
			dataType: "json",
			data: {number:number,hdnmobile_prefix:hdnmobile_prefix,txtusername:txtusername}, 
			success: function(data)
			{
				$('#Loading').hide();
				if (data.response === 1)
				{
					$(".otp").css("display", "block");  
				}
				else
				{
					alert("else");
				}
			}
		});
	}); */
	
	/* $(document).on("click", "#sendotp", function() 
	{
		var mobile=$("#contactnumber").val();
		var txtusername=$("#txtusername").val();
		var hdnmobile_prefix=$("#hdnmobile_prefix").val();
		if($("[name='contactnumber']").valid() && mobile!='' && txtusername!='' && hdnmobile_prefix!='')
		{
			$('#Loading').show();
			$.ajax({
				url: "<?php echo base_url(); ?>index.php/trial/sendOTPtoNumber",
				type: "POST",
				dataType: "json",
				data: {mobile:mobile,txtusername:txtusername,hdnmobile_prefix:hdnmobile_prefix}, 
				success: function(data) {
					$('#Loading').hide();
					if (data.response === 1)
						$(".otp").css("display", "block");  $("#hdnOTP").val(data.OTP);
				}
			});
		}
	});
	$(document).on("click", "#emailotp", function() 
	{
		
		if($("[name='txtemail']").valid()  && txtusername!='')
		{
			var email=$("#txtemail").val();
			var txtusername=$("#txtusername").val();
			
			$('#Loading').show();
			$.ajax({
				url: "<?php echo base_url(); ?>index.php/trial/sendOTPforemailverification",
				type: "POST",
				dataType: "json",
				data: {email:email,txtusername:txtusername}, 
				success: function(data) {
					$('#Loading').hide();
					if (data.response === 1)
						$(".otpemail").css("display", "block");  
						$("#hdnEmailOTP").val(data.OTP);
				}
			});
		}
	}); */
</script>