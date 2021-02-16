<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
<title>B2C</title>
<meta name="description"  content="An IIT Madras RTBI supported company, Chennai-based start-up making cognitive development a child&#039;s play by Gamification of Higher Order Thinking Skills - HOTS Skills" />
 	<meta name="keywords"  content="Higher Order Thinking Skills, HOTS, HOTS Skills Edutainment ,SkillAngels, SuperBrains, SuperBrain Challenge, Online Brain Games , Edsix Brainlab, Cognitive Skills Development, Employability Skills assessment, Life Skill games, Brain Games for Kids, Skill challenge,Thinking Skills,Brain Skill,Life Skill,Learning Skill,Skill Development,saravanan sundaramoorthy,HTML5 Games, NCERT,cognitive skills,cognitive skill development,cognitive skills for kindergarten,
cognitive skill training,a cognitive skills program,cognitive skills activities,
cognitive skill building games,cognitive skill building activities,cognitive skill improvement,
the cognitive skills in critical thinking,cognitive skill building,aptitude puzzle games,aptitude training,21st century skills,21st century skills in education,21st century skills interview skills,
21st century skills activities,21st century skills and knowledge,brain puzzles" /> 
  <meta charset="utf-8"> 
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords"> 
  <meta content="" name="description">
  <!-- Favicon -->
  <link href="<?php echo base_url(); ?>assets/img/favicon.ico" rel="icon">
  <!-- Google Fonts -->
  <link href="<?php echo base_url(); ?>assets/css/new/font.css" rel="stylesheet">
  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url(); ?>assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet"> 
  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url(); ?>assets/css/new/newstyle.css" rel="stylesheet"> 
<!-- Required JavaScript Libraries -->
<script src="<?php echo base_url(); ?>assets/lib/jquery/jquery.min.js"></script>
<script src = "<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script src = "<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
</head>  
<body style="background-color:#efe8e3"> 
	<div class="" id="free_login">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="row">			
				<div class="col-md-2 col-sm-12 col-xs-12 text-center"></div>
				<div class="col-md-8 col-sm-12 col-xs-12  TrialForm" id="TrialForm"> 
					<div class="row text-center">	
						<a href="<?php echo base_url(); ?>" class="navbar-brand1">
							<img data-src="<?php echo base_url(); ?>assets/images/webp2020/Edsix.png"  data-src1="<?php echo base_url(); ?>assets/images/webp2020/Edsix.webp" alt="Edsix BrainLab Pvt Ltd" width="250px"  class="lazyload" />
						</a>
					</div>
					
					<div class="col-md-6 col-sm-12 col-xs-12"> 
						<form name="frmlogin" id="frmlogin"  class="frmfreereg" method="post" enctype="multipart/form-data" accept-charset="utf-8">  
							<div class="row">	
									<h3 class="panel-title"><strong>Login Via Email/Mobile</strong></h3>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label class="control-label">Username<span style="color:red">*</span></label>
									<input type="text" class="form-control" name="txtemail" value="" id="txtemail" maxlength="30" Placeholder="Enter Email ID / Mobile No.">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label class="control-label">Password<span style="color:red">*</span></label>
									<input type="text" class="form-control numbersOnly" maxlength="15" name="txtpassword" value="" id="txtpassword" Placeholder="Enter Password">
								</div>							
							</div>     <br/>
							<div class="row">  
								<div class="col-lg-12" align="center">								
									<input type="button" name="btnRegisterSubmit" id="btnRegisterSubmit" class="btn btn-success" value="Submit">  
								</div> 
							</div> 
								
							<div class="row">  
								<div class="col-lg-12" align="center">								
									Don’t have an account? <a href="<?php echo base_url(); ?>index.php/trial/registration" class="free_trial_1">Register Now</a>
								</div> 
							</div> 	
							<div class="row">  
								<div class="Dloginmsg"></div> 
							</div>
						</form>
					</div> 
					<div class="col-md-6 col-sm-12 col-xs-12"> 
						<form name="frmOTPLogin" id="frmOTPLogin"  class="frmfreereg" method="post" enctype="multipart/form-data" accept-charset="utf-8"> 
							<div class="row">	
								<h3 class="panel-title"><strong>Login Via OTP</strong></h3>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label class="control-label">Mobile Number <span style="color:red">*</span></label>
									<input type="text" class="form-control" name="txtMobile" value="" id="txtMobile" maxlength="10" Placeholder="Enter Mobile No.">
								</div>
							</div> 
							<div class="row" id="OTP_field" style="display:none;">
								<div class="col-md-12">
									<label class="control-label">OTP<span style="color:red">*</span></label>
									<input type="text" class="form-control numbersOnly" maxlength="15" name="txtOTP" value="" id="txtOTP" Placeholder="Enter OTP">
								</div>							
							</div> 
							<div class="row" id="Main_btn" style="margin:10px 0px;">  
								<div class="col-lg-12" align="center">								
									<input type="button" name="btnOTP" id="btnOTP" class="btn btn-success" value="Proceed" style="display:none;">
									<input type="button" name="btnSendOTP" id="btnSendOTP" class="btn btn-success" value="Send OTP"> 									
								</div> 
							</div> 
							<div class="row">  
								<div class="resendmsg"></div> 
							</div>	
							<div class="row">  
								<div class="col-lg-12" align="center">								
									Don’t have an account? <a href="<?php echo base_url(); ?>index.php/trial/registration" class="free_trial_1">Register Now</a>
								</div> 
							</div> 
							<div class="row">  
								<div class="otpmsg"></div> 
							</div> 
						</form>
					</div>     
					<div class=" text-center">	
						<div class="" align="center">	
							or sign in with,
							<a href="javascript:;" class="navbar-brand1">
								<img data-src="<?php echo base_url(); ?>assets/images/new/gmail.png"  data-src1="<?php echo base_url(); ?>assets/images/new/gmail.png" alt="Edsix BrainLab Pvt Ltd" width="30px"  class="lazyload" style="margin: 10px;" />
							</a>
							<a href="javascript:;" class="navbar-brand1">
								<img data-src="<?php echo base_url(); ?>assets/images/icon_LinkedIn.png"  data-src1="<?php echo base_url(); ?>assets/images/icon_LinkedIn.png" alt="Edsix BrainLab Pvt Ltd" width="30px"  class="lazyload" style="margin: 10px;"/>
							</a>
							<a href="javascript:;" class="navbar-brand1">
								<img data-src="<?php echo base_url(); ?>assets/images/fb.png"  data-src1="<?php echo base_url(); ?>assets/images/fb.png" alt="Edsix BrainLab Pvt Ltd" width="30px"  class="lazyload" style="margin: 10px;" />
							</a>
						</div>
					</div>
				
				</div>
				<div class="col-md-2 col-sm-12 col-xs-12 text-center"></div>
			</div>
		</div>
	</div> 
	<div style="display:none;" id="Loading" class="Loading"></div>


<style>
.frmfreereg{
	background:#f1f1f1;padding:40px;min-height:350px;box-shadow: rgba(200, 200, 200, 0.63) 2px 2px 7px 2px;border-radius: 15px;
}
.panel-title{text-align: center;margin-bottom: 15px;}
</style>

<script> 


$('.numbersOnly').keyup(function () { 
this.value = this.value.replace(/[^0-9,]/g,'');
});

$('.alphaOnly').keyup(function () { 
this.value = this.value.replace(/[^a-zA-Z ]/g,'');
}); 
$("#frmlogin").validate({
	rules:
	{ 
		"address": {required: true,minlength: 3},
		"txtpassword": {required: true},
		"txtemail": {required: true,email: true},
		"contactnumber":  {required: true,minlength:10,maxlength:10},
		"licences": {required: true},
		"program": {required: true},
		"ddlgrade": {required: true}
	},
	messages:
	{
		"txtpassword": {required: "Please enter name"},
		"address": {required: "Please enter password"},
		"spoc_name": {required: "Please enter SPoC name"},
		"txtemail": {required: "Please enter email id",email:"Please enter valid email"},
		"contactnumber": {required:"Please enter contact number",minlength:"Please enter 10 digit mobile no",maxlength:"Please enter 10 digit mobile no"},
		"licences": {required: "Please enter no.of licences"},
		"program": {required: "Please select program"},
		"ddlgrade": {required: "Please select grade"} 
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
		} else if (element.attr("name") === "program")
		{
			error.insertAfter(element.parent().parent());
		}
		else 
		{
			error.insertAfter(element);
		}
	} 	 
});  

$("#frmOTPLogin").validate({
	rules:
	{ 
		"txtMobile": {required: true},
		"txtOTP": {required: true,minlength: 6} 
	},
	messages:
	{ 
		"txtMobile": {required:"Please enter mobile number"},
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
		} else if (element.attr("name") === "program")
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
	var mobileno=$("#txtMobile").val();
	$(".otpmsg").hide().html('');
	$.ajax({
	url: "<?php echo base_url(); ?>index.php/trial/SendOTPforLogin",
	type:"POST", 
	dataType:"json",
	data:{mobileno:mobileno},
	success: function (data) 
	{
		$('#Loading').hide();
		if(data.response==1)
		{ 
			$("#OTP_field").show();
			$("#btnSendOTP").hide();
			$("#btnOTP").show();
			if(data.OPTCOUNT>=3)
			{
				//alert("FF");
			}
			else
			{	timeLeft = 5;
				timerId = setInterval(countdown, 1000);
			}
			$(".otpmsg").show().html('<div style="color:green;text-align: center;font-weight:bold;">'+data.msg+'</div>');
		}
		else
		{
			$("#btnOTP").hide();
			$("#OTP_field").hide();
			$(".otpmsg").show().html('<div style="color:red;text-align: center;font-weight:bold;">'+data.msg+'</div>');
		}
	}
		}); 
});
function countdown()
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
}
$("#btnOTP").click(function()
{
	
	if($("#frmOTPLogin").valid())
	{
		var form = $('#frmOTPLogin')[0];
		var formData = new FormData(form); 
		$('#Loading').show();
		$.ajax({
		url: "<?php echo base_url(); ?>index.php/trial/checkloginbyOTP",
		type:"POST",
		dataType:"json",
		data:formData,
		contentType: false,       
		cache: false,             
		processData:false, 
		success: function (data) 
		{ 
			$('#Loading').hide();
			if(data.response==1)
			{ 
				window.location.href="<?php echo base_url(); ?>index.php/trial/trialgames";
			}
			else
			{
				$(".otpmsg").show().html('<div style="color:red;text-align: center;font-weight:bold;">'+data.msg+'</div>');
			}
		}
		});
	}
	else
	{
	$("#errEmail").show();
	}  
});
$("#btnRegisterSubmit").click(function(){	
if($("#frmlogin").valid())
	 { 
		 var form = $('#frmlogin')[0];
		 var formData = new FormData(form);
		 $(".Dloginmsg").hide().html('');
		 $('#Loading').show();
		$.ajax({
				url: "<?php echo base_url(); ?>index.php/trial/checklogin",
				type:"POST",
				dataType:"json",
				data:formData,
				contentType: false,       
				cache: false,             
				processData:false, 
				success: function (data) 
				{ 
					$('#Loading').hide();
					if(data.response==1)
					{
						//$("#successmsg").show().html('<div style="color:green">'+data.msg+'</div>');
						 window.location.href="<?php echo base_url(); ?>index.php/trial/trialgames";
					}
					else
					{
						$(".Dloginmsg").show().html('<div style="color:red;text-align:center;">'+data.msg+'</div>');
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
setTimeout(function() {  
$("#bgvid").html("<source src='<?php echo base_url();?>assetsnew/video/Edsix-LiveLifeThe-HOTS-Way.mp4' type='video/mp4'><source src='<?php echo base_url();?>assetsnew/video/Edsix-LiveLifeThe-HOTS-Way.webm' type='video/webm' >");
}, 3000);
window.addEventListener("load", function(event)
{
	
	//alert(/^((?!chrome|android).)*safari/i.test(navigator.userAgent));
	
	if ( /^((?!chrome|android).)*safari/i.test(navigator.userAgent)) 
	{
		lazymac();
	}
	else if (navigator.userAgent.indexOf('MSIE') != -1)
	{
		lazymac();
	}
	else if (navigator.userAgent.indexOf('Trident') != -1 && navigator.userAgent.indexOf('MSIE') == -1 )
	{
		lazymac();
	}
	    else
	{
		lazywin();
	}
});
function lazymac()
{
	var lazy = document.getElementsByClassName('lazyload');
 
	for(var i=0; i<lazy.length; i++)
	{
		lazy[i].src = lazy[i].getAttribute('data-src1');
	}
	
	$(".foo_bg_img").removeClass("site-footer");
	$(".foo_bg_img").addClass("site-footer-mac");
}
function lazywin()
{ 
	var lazy = document.getElementsByClassName('lazyload');

	for(var i=0; i<lazy.length; i++){
	 lazy[i].src = lazy[i].getAttribute('data-src');
	}
	
	$(".foo_bg_img").addClass("site-footer");
	$(".foo_bg_img").removeClass("site-footer-mac");
}
</script>
<style>
form .dropdown {
     color: #000 !important; 
}
#error { color: red;}
.error { color: red;}
.errcode { color: red;}
.erroremail { color: red;}
#sbmtbtn{padding: 10px 22px;margin: 5px auto;background: #e9e610;}
.dwnbtn{padding: 10px 22px;margin: 5px auto; }
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

</body>
</html>