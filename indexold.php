<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
<title>Admin</title>
<!-- Bootstrap -->

	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/nprogress.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/custom.min.css" rel="stylesheet">
<style>
.ed6 {
    color: rgb(0, 170, 255);
    font-family: "Shadows Into Light",cursive;
    font-size: 2em;
}
.LoginContainer
{
	    BORDER: 2px solid;
    width: 50%;
    margin-left: 25%;
}
.submitlabel{padding-top:20px;padding-bottom:20px;}
.LoginContainer .fields{text-align:right;}
footer {
    margin-left: 0px !important;
	 color: #73879C;
}
input
{	 color: #73879C;
}
.landingContainer{padding-bottom:20px;}
body {
    color: #ffffff;
}
</style>
</head>

<div class="login_wrapper">
    <div class="animate form login_form">
		<!--<div align="center"><img style="width: 200px;display: block;" src="<?php echo  base_url(); ?>assets/images/web_logo.png" />	</div>-->
            <section class="login_content">
				<form action="<?php echo base_url();?>index.php/home/logincheck" class="cmxform" method="POST" id="commentForm" accept-charset="utf-8">
					<h2 style="font-size:23px !important;">Admin Login</h2>
					<div class="green"></div>
						<div class="" style="padding-bottom: 20px; color:red; text-shadow:none;"><?php echo $msg_error;?></div>
					<div>
						<input type="text" name="username" value="" class="form-control required email" placeholder="Username" id="email">
					</div>
					<div>
						<input type="password" name="password" value="" class="form-control required" placeholder="Password" id	="pwd">
					</div>			 
					<div>
						<input type="submit" class="btn btn-success" style="float:right;" id="submit" name="submit" value="Login">
						<span id="errmsg" style="color:red;text-shadow: none;font-size:15px;float:left" style="color:red;"><?php echo $error; ?></span>
					</div> 
				</form>
			</section>
	</div>
</div>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	// alert('ji');
    $("#errmsg").delay(1500).fadeOut("slow");	 
});
</script>
</html>
			