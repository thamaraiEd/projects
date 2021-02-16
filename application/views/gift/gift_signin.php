<meta name="google-signin-client_id" content="671220981770-l46g473ut394rlm189vcpottvbpecvo9.apps.googleusercontent.com">
	<!--<script>
		// Enter Id here
		window.fbAsyncInit = function() {
			FB.init({
				appId: '214200140035527',
				cookie: true,
				xfbml: true,
				version: 'v8.0'
			});
			FB.AppEvents.logPageView();
		};

		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {
				return;
			}
			js = d.createElement(s);
			js.id = id;
			js.src = "https://connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));

		function checkLoginState() {
			FB.getLoginStatus(function(response) {
				testAPI(response);
			});
		}

		function testAPI(response) {
			FB.api('/' + response.authResponse.userID,'POST',{"fields": "email"},
				function(result) { alert(result); console.log("response==="+JSON.stringify(result));return false;
					fbLoginSuccess(result.email);
				});
		}

		function fbLoginSuccess(email) {
			var formData = new FormData();
			formData.append('txtmobile', email)
			$('#Loading').show();
			$.ajax({
				url: "<?php echo base_url(); ?>index.php/trial/checkgooglelogin",
				type: "POST",
				dataType: "json",
				cors: "allow",
				data: formData,
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {  //alert("DDD"+data.status);
					console.log("Data " + data.status)
					$('#Loading').hide();
					if (data.response == 1) {
						window.location.href = "<?php echo base_url(); ?>index.php/trial/trialgames";
					} else {
						$(".Dloginmsg").show().html('<div style="color:red;text-align:center;">'+data.msg+'</div>');
					}
				}
			});
		}
	</script>-->

<div class="form-bg" id="free_login">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12  TrialForm" id="TrialForm">
				<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0;"> 
					<div class="col-md-3 col-sm-12 col-xs-12 text-center">
						<div class=""> 
							<div class="" style="margin:100px 0 0 0;">
								<img src="<?php echo base_url(); ?>assets\images\webp2020\2.png" alt="Student Registration"  style="width: 100%;"  />
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12" align="justify"> 
						<div class="row">	
								<h3 class="panel-title" style="font-size:25px"><strong>Give the gift of enhanced cognitive skills</strong></h3>
						</div>
						<ul class="Plan_exp_gift">
							<li>Purchase a SkillAngels<sup>®</sup> gift coupon and help a child you know to build their cognitive skills using fun and engaging game-based puzzles. It’s easy as 1-2-3!</li><br/>
							<li>1.	<a href="<?php echo base_url(); ?>index.php/trial/gift_reg" class="free_trial_1 blink">Register </a>using your mobile number and unique password</li><br/>
							<li>2.	Choose a training plan</li><br/>
							<li>3.	Pay using the digital gateway of your choice!</li><br/>
						</ul>
					</div> 
					<div class="col-md-4 col-sm-12 col-xs-12" > 
						<form name="frmlogin" id="frmlogin"  class="frmfreereg" method="post" enctype="multipart/form-data" accept-charset="utf-8" >  
							<div class="row">	
									<h3 class="panel-title"><strong>Login</strong></h3>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label class="control-label">Mobile Number<span style="color:red">*</span></label>
									
									<div class="row">
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon" id="Mobileprefix">
													<select name="ddlcountrycode" id="ddlcountrycode">
														<?php 
															foreach($country as $row)
															{
																if($countryCode==$row['countrycode'])
																{
																	$selected="selected=selected";
																}
																else
																{
																	$selected="";
																}
															?>
																<option data-prefix="<?php echo $row['mobile_prefix']; ?>"  data-length="<?php echo $row['mobilelength']; ?>" <?php echo $selected; ?> value="<?php echo $row['mobile_prefix']; ?>"><?php echo $row['mobile_prefix']; ?></option>
															<?php
															}
														?>
													</select>
												</span>
												<input type="text" class="form-control" name="txtDmobile" value="" id="txtDmobile" Placeholder="Please enter your mobile number" maxlength="20" minlength=""> 
											</div> 
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label class="control-label">Password<span style="color:red">*</span></label>
									<input type="password" class="form-control" maxlength="15" name="txtpassword" value="" id="txtpassword" Placeholder="Please enter your password">
								</div>							
							</div>     <br/>
							<div class="row">  
								<div class="col-lg-12" align="center">								
									<input type="button" name="btnRegisterSubmit" id="btnRegisterSubmit" class="btn btn-success" value="Submit">  
								</div> 
							</div>
							<div class="row">  
								<div class="col-lg-12" align="center">								
									Don’t have an account? <a href="<?php echo base_url(); ?>index.php/trial/gift_reg" class="free_trial_1">Register Now</a>
								</div> 
							</div> 	
							<div class="row">  
								<div class="Dloginmsg"></div> 
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div style="display:none;" id="Loading" class="Loading"></div>
<script>
		/* function googleSignIn(googleUser) {
			let email = googleUser.getBasicProfile().getEmail();
			googleUser.disconnect();
			var formData = new FormData();
			formData.append('txtmobile', email)
			$('#Loading').show();
			$.ajax({
				url: "<?php echo base_url(); ?>index.php/trial/checkgooglelogin",
				type: "POST",
				dataType: "json",
				data: {email:email,type:3,mobileno:'',password:'',countrycode:''},
				/* contentType: false,
				cache: false,
				processData: false, */
			/*	success: function(data) { //alert(data.status);
					console.log("Data " + data.status)
					$('#Loading').hide();
					if (data.response == 1) {
						//$("#successmsg").show().html('<div style="color:green">'+data.msg+'</div>');
						window.location.href = "<?php echo base_url(); ?>index.php/trial/gift_price";
					} else {
						$(".Dloginmsg").show().html('<div style="color:red;text-align:center;">'+data.msg+'</div>');
					}
				}
			});
		}
 */


		$("#btnOTP").click(function() {
			$("#OTP_field").show();
		});
		$('.numbersOnly').keyup(function() {
			this.value = this.value.replace(/[^0-9,]/g, '');
		});

		$('.alphaOnly').keyup(function() {
			this.value = this.value.replace(/[^a-zA-Z ]/g, '');
		});
		$("#frmlogin").validate({
			rules: { 
				"txtpassword": {
					required: true
				},
				"txtDmobile": {
					required: true,
					minlength: function(element) {
					return $("#txtDmobile").attr('maxlength');
					},
					maxlength: function(element) {
						return $("#txtDmobile").attr('maxlength');
					}
				} 
			},
			messages: {
				"txtpassword": {
					required: "Please enter your password"
				},
				"txtDmobile": {
					required: "Please enter your mobile number",
					minlength: "Please enter {0} digit mobile no",
					maxlength: "Please enter {0} digit mobile no"					
				} 
			},
			errorPlacement: function(error, element)
			{
				if (element.attr("type") === "radio")
				{
					error.insertAfter(element.parent().parent());
				}
				else if (element.attr("id") === "txtPMobile" || element.attr("id") === "txtDmobile")
				{
					error.insertAfter(element.parent());
				}
				else if (element.attr("name") === "program")
				{
					error.insertAfter(element.parent().parent());
				}
				else 
				{
					error.insertAfter(element);
				}
			}
		});
 

		$("#btnRegisterSubmit").click(function()
		{
			if ($("#frmlogin").valid())
			{
				 
				 var mobile=$("#txtDmobile").val();
				 var password=$("#txtpassword").val();
				/*  var email='';
				 var countrycode=$("#ddlcountrycode option:selected").val();
				 var type='1'; */
				 
				//alert('success');
				$('#Loading').show();
				$.ajax({
					url: "<?php echo base_url(); ?>index.php/trial/gift_checklogin",
					//url: "<?php echo $this->config->item('api_url'); ?>/login_gift",
					type: "POST",					
					data: {mobile:mobile,password:password},				
					dataType: "json",
					success: function(data)
					{ 
						
						$('#Loading').hide();
						if (data.response==1)
						{
							//$("#successmsg").show().html('<div style="color:green">'+data.msg+'</div>');	
							/* $("#guid").val(data.userdet[0].gid);
							$("#gift_username").val(data.userdet[0].username); */
							window.location.href = "<?php echo base_url(); ?>index.php/trial/gift_price";
						}
						else
						{
							$(".Dloginmsg").show().html('<div style="color:red;text-align:center;font-size:20px; font-weight:600;">'+data.msg+'</div>');
						}
					}
				});
			}
			else
			{
				$("#errEmail").show();
			}
		});
	</script>
	<script> 
		window.addEventListener("load", function(event) {

			//alert(/^((?!chrome|android).)*safari/i.test(navigator.userAgent));

			if (/^((?!chrome|android).)*safari/i.test(navigator.userAgent)) {
				lazymac();
			} else if (navigator.userAgent.indexOf('MSIE') != -1) {
				lazymac();
			} else if (navigator.userAgent.indexOf('Trident') != -1 && navigator.userAgent.indexOf('MSIE') == -1) {
				lazymac();
			} else {
				lazywin();
			}
		});

		function lazymac() {
			var lazy = document.getElementsByClassName('lazyload');

			for (var i = 0; i < lazy.length; i++) {
				lazy[i].src = lazy[i].getAttribute('data-src1');
			}

			$(".foo_bg_img").removeClass("site-footer");
			$(".foo_bg_img").addClass("site-footer-mac");
		}

		function lazywin() {
			var lazy = document.getElementsByClassName('lazyload');

			for (var i = 0; i < lazy.length; i++) {
				lazy[i].src = lazy[i].getAttribute('data-src');
			}

			$(".foo_bg_img").addClass("site-footer");
			$(".foo_bg_img").removeClass("site-footer-mac");
		}
	</script>
	<style>

.blink {
	animation: blinker 0.6s linear infinite;
	font-weight: bold;
}
@keyframes blinker {
	50% { opacity: 0; }
}
	.frmfreereg .row
	{
		margin-bottom: 5px;
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

		.Loading {
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
	</style>
	<script src='https://apis.google.com/js/platform.js' async defer></script>

<script>
$("#frmOTPLogin").validate({
	rules:
	{ 
		"ddlOTPcountrycode": {required: true},
		"txtMobile": 
		{
			required: true,
			minlength: function(element)
			{
				return $("#txtMobile").attr('maxlength');
			},
			maxlength: function(element)
			{
				return $("#txtMobile").attr('maxlength');
			}
		},
		"txtOTP": {required: true,minlength: 6} 
	},
	messages:
	{ 
		"ddlOTPcountrycode": {required:"Please select country code"},
		"txtMobile":
		{
			required: "Please enter mobile number",
			minlength: "Please enter {0} digit mobile no",
			maxlength: "Please enter {0} digit mobile no" 
		},
		"txtOTP": {required: "Please enter OTP",minlength:"Please enter 6 digit OTP no"} 
	},
	errorPlacement: function(error, element)
	{
		if (element.attr("type") === "radio")
		{
			error.insertAfter(element.parent().parent());
		}
		else if (element.attr("id") === "txtPMobile" || element.attr("id") === "txtMobile")
		{
			error.insertAfter(element.parent());
		}
		else if (element.attr("name") === "program")
		{
			error.insertAfter(element.parent().parent());
		}
		else 
		{
			error.insertAfter(element);
		}
	} 	 
}); 
var timeLeft = '';var timerId = '';
$("#btnSendOTP").click(function()
{
	if ($("#frmOTPLogin").valid()) 
	{
		/* var mobileno=$("#txtMobile").val();
		var mobileno_prefix=$("#ddlOTPcountrycode option:selected").val(); */
		$(".otpmsg").hide().html('');
		
		var mobileno=$("#txtMobile").val();
		var Password='';
		var email='';
		var countrycode=$("#ddlOTPcountrycode option:selected").val();
		var type='2';

		$.ajax({
		//url: "<?php echo base_url(); ?>index.php/trial/SendOTPforLogin",
		url: "<?php echo $this->config->item('api_url'); ?>/triallogin",
		type:"POST",		
		data: {mobileno:mobileno,Password:Password,email:email,countrycode:countrycode,type:type},
		//dataType:"json",
		jsonpCallback: 'callback', // this is not relevant to the POST anymore
		success: function (data) 
		{
			$('#Loading').hide();
			if(data.status=="Success")
			{
				$("#OTP_field").show();
				$("#btnSendOTP").hide();
				$("#btnOTP").show();
				$("#hdndemoid").val(data.userdet[0].uid);
				/* if(data.OPTCOUNT>=3)
				{
					//alert("FF");
				}
				else
				{	timeLeft = 30;
					timerId = setInterval(countdown, 1000);
				} */
				$(".otpmsg").show().html('<div style="color:green;text-align: center;font-weight:bold;">OTP sent to your mobile number</div>');
			}
			else
			{
				$("#btnOTP").hide();
				$("#OTP_field").hide();
				$(".otpmsg").show().html('<div style="color:red;text-align: center;font-weight:bold;">The mobile number not registered</div>');
			}
		}
		}); 
	}
});
/* function countdown()
{
    if (timeLeft == -1)
	{
       clearTimeout(timerId);
       $("#btnSendOTP").val('Resed OTP').show();
	   $(".resendmsg").hide().html('');
    }
	else
	{
		$(".resendmsg").show().html('<div style="color:green;text-align: center;font-weight:bold;">Time left = '+timeLeft+'</div>'); 
        timeLeft--;
    }
	//alert("xxxx");
} */
$("#btnOTP").click(function()
{
	
	if($("#frmOTPLogin").valid())
	{
		/* var form = $('#frmOTPLogin')[0];
		var formData = new FormData(form);  */
		
		var mobileno=$("#txtMobile").val(); 
		var otp=$("#txtOTP").val();
		var uid=$("#hdndemoid").val();
		
		$('#Loading').show();
		$.ajax({
		url: "<?php echo base_url(); ?>index.php/trial/checkloginbyOTP",
		//url: "<?php echo $this->config->item('api_url'); ?>/otpverification",
		type:"POST",
		data:{mobileno:mobileno,otp:otp,uid:uid},
		dataType:"json",		
		/*contentType: false,       
		cache: false,             
		processData:false,  */
		success: function (data) 
		{ 
			$('#Loading').hide();
			if(data.response==1)
			{ 
				window.location.href="<?php echo base_url(); ?>index.php/trial/trialgames";
			}
			else
			{
				$(".otpmsg").show().html('<div style="color:red;text-align: center;font-weight:bold;">Invalid credentials</div>');
			}
		}
		});
	}
	else
	{
		$("#OTP_field").hide();
	}  
});

$("#ddlOTPcountrycode").change(function() 
{
	
	$("#ddlOTPcountrycode").valid(); 
	$("#txtMobile").val('');
	$("#hdnmobile_prefix").val('');

 

	$("#txtMobile").attr("readonly", false);
	$("#hdnmobile_prefix").val($("#ddlOTPcountrycode option:selected").attr('data-prefix'));

	$("#txtMobile").attr('minlength', $("#ddlOTPcountrycode option:selected").attr('data-length'));
	$("#txtMobile").attr('maxlength', $("#ddlOTPcountrycode option:selected").attr('data-length'));
 

});
$("#ddlcountrycode").change(function() 
{
	
	$("#ddlcountrycode").valid(); 
	$("#txtDmobile").val('');
	$("#hdnmobile_prefix").val('');


	$("#txtDmobile").attr("readonly", false);
	$("#hdnmobile_prefix").val($("#ddlcountrycode option:selected").attr('data-prefix'));

	$("#txtDmobile").attr('minlength', $("#ddlcountrycode option:selected").attr('data-length'));
	$("#txtDmobile").attr('maxlength', $("#ddlcountrycode option:selected").attr('data-length'));
	 
});
// OTP Mobile 
$("#txtMobile").val(''); 
$("#txtMobile").attr("readonly", false);  
$("#txtMobile").attr('minlength', $("#ddlOTPcountrycode option:selected").attr('data-length'));
$("#txtMobile").attr('maxlength', $("#ddlOTPcountrycode option:selected").attr('data-length')); 
 
// Normal Mobile
$("#txtDmobile").val('');  
$("#txtDmobile").attr("readonly", false); 
$("#txtDmobile").attr('minlength', $("#ddlcountrycode option:selected").attr('data-length'));
$("#txtDmobile").attr('maxlength', $("#ddlcountrycode option:selected").attr('data-length'));

/* ajaxcall();
function ajaxcall()
{
	 $.ajax({
	url: "https://nodea.skillangels.com/adduser", 
	type:'POST',
	dataType:"json",
	data:{User:'ed102',Email:'ed102@skillangels.com',Password:'12345678',Mobile:'123543123542',Coupon:'SA001',City:'Salem',branch_id:'119',section_id:'A',year_status:'1',GradeNo:'3',country_code:'+91',isfullschedule:'1',daysplan:'6',paymentId:'ed102',planDays:"365"}, 
	success: function(data)
	{
		alert(data);
		console.log(data);
		console.log(data.status);
	}
});
}
 */
</script>
 