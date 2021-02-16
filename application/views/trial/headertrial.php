<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
	<title>B2C Account</title>
	<meta name="description" content="An IIT Madras RTBI supported company, Chennai-based start-up making cognitive development a child&#039;s play by Gamification of Higher Order Thinking Skills - HOTS Skills" />
	<meta name="keywords" content="Higher Order Thinking Skills, HOTS, HOTS Skills Edutainment ,SkillAngels, SuperBrains, SuperBrain Challenge, Online Brain Games , Edsix Brainlab, Cognitive Skills Development, Employability Skills assessment, Life Skill games, Brain Games for Kids, Skill challenge,Thinking Skills,Brain Skill,Life Skill,Learning Skill,Skill Development,saravanan sundaramoorthy,HTML5 Games, NCERT,cognitive skills,cognitive skill development,cognitive skills for kindergarten,
cognitive skill training,a cognitive skills program,cognitive skills activities,
cognitive skill building games,cognitive skill building activities,cognitive skill improvement,
the cognitive skills in critical thinking,cognitive skill building,aptitude puzzle games,aptitude training,21st century skills,21st century skills in education,21st century skills interview skills,
21st century skills activities,21st century skills and knowledge,brain puzzles" />
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">
	<!-- Favicon -->
	<link href="<?php echo base_url(); ?>assetsnew/img/favicon.ico" rel="icon"> 
	<!-- Bootstrap CSS File -->
	<link href="<?php echo base_url(); ?>assetsnew/css/bootstrap.min.css" rel="stylesheet">
	<!-- Libraries CSS Files -->
	<link href="<?php echo base_url(); ?>assetsnew/css/font-awesome.min.css" rel="stylesheet">
	<!-- Main Stylesheet File -->
	<link href="<?php echo base_url(); ?>assetsnew/css/style.css" rel="stylesheet"> 
	<!-- Required JavaScript Libraries -->
	<script src="<?php echo base_url(); ?>assetsnew/js/jquery.min.js"></script>	
	<script src = "<?php echo base_url(); ?>assetsnew/js/jquery.validate.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assetsnew/js/bootstrap.min.js"></script>
	<link href="<?php echo base_url(); ?>assetsnew/css/commonstyle.css" rel="stylesheet">	
	
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<link href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<?php
if($this->router->fetch_method()!="registration")
{
?>
<header class="navbar navbar-fixed-top top-navbar" id="top-navbar">
	<div class="container">
		<div class="col-md-3 col-sm-12 col-xs-12">
			 <a href="<?php echo base_url();?>"> <img data-src="<?php echo base_url(); ?>assetsnew/images/png/sk_logo.png" alt="SkillAngels" class="platformsupport lazyload" style="margin-top: 4px;
    height: 71px;" /> </a>
		</div> 
		<div class="col-md-9 col-sm-12 col-xs-12">   
			<div class="topnav" id="myTopnav">
				
				<!--<a href="<?php echo base_url(); ?>index.php/trial/signin" class="free_trial_1">Signin</a>-->
				
				 
				<?php
							if(isset($this->session->user_id) && $this->session->user_id!='')
							{
							?>
							<?php if($this->router->fetch_method()!="paymentresponse")
							{ ?>
							<a href="<?php echo base_url(); ?>index.php/trial/trialgames" class="free_trial_1 HAboutBtn">Free Assessment</a>
								<a href="<?php echo base_url(); ?>index.php/trial/productpricing" class="free_trial_1 HFreeAssessBtn">Buy Plan</a>
							
								<a href="<?php echo base_url(); ?>index.php/trial/logout" class="free_trial_1 HAboutBtn" ><i style="margin:5px 5px 0 0;" class="free_trial_1 fa fa-power-off" aria-hidden="true"></i> Logout </a><?php }   else
								{ ?> 
									<a href="<?php echo base_url(); ?>login" class="free_trial_1 HLoginBtn">Login</a>
									
								<?php } ?>
							<?php
							}
							?>
							
				<a href="javascript:;" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
			</div>
		</div>   
	</div>   
</header>  

<?php } ?>
 

<script>
	function myFunction() {
		var x = document.getElementById("myTopnav");
		if (x.className === "topnav") {
			x.className += " responsive";
		} else {
			x.className = "topnav";
		}
	}
</script>
<script>
	/* Set the width of the side navigation to 250px */
	function openNav1() {
		if (window.matchMedia("(max-width: 767px)").matches) {
			document.getElementById("MenuBar").style.width = "100%";

		} else if (window.matchMedia("(max-width: 1024px)").matches) {
			document.getElementById("MenuBar").style.width = "50%";
		} else {
			document.getElementById("MenuBar").style.width = "15%";
		}
	}
	/* Set the width of the side navigation to 0 */
	function closeNav1() {
		document.getElementById("MenuBar").style.width = "0";
	}
</script>
<body class="centered-nav  bgparticles">
<div id="loading" style="display:none;"></div>