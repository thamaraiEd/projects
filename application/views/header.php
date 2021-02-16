<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
  <link href="<?php echo base_url(); ?>assetsnew/img/favicon.ico" rel="icon"> 
  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url(); ?>assetsnew/css/bootstrap.min.css" rel="stylesheet"> 
  
  <link href="<?php echo base_url(); ?>assetsnew/css/font-awesome.min.css" rel="stylesheet"> 
  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url(); ?>assetsnew/css/style.css" rel="stylesheet"> 
  
<!-- Required JavaScript Libraries -->
<script src="<?php echo base_url(); ?>assetsnew/js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>assetsnew/js/bootstrap.bundle.min.js"></script>  
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head> 


  <!--<header>
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light ">
                    <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>assetsnew/images/png/sk_logo.png"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                        <ul class="navbar-nav mt-2 ml-auto mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo base_url(); ?>index.php/trial/about">About</a>
                            </li>
                            <li class="nav-item btn-links login">
                                <a class="nav-link" href="<?php echo base_url()."login";?>">Login</a>
                            </li>
                            <li class="nav-item btn-links bfa">
						<?php if(isset($this->session->user_id) && $this->session->user_id!='')
				{
				?>
				<?php if($this->router->fetch_method()!="paymentresponse")
							{ ?>
						
					<a href="<?php echo base_url(); ?>index.php/trial/trialgames" class="free_trial_1 HFreeAssessBtn">Free Assessment</a>
				<?php
				}
				}
				else
				{?>
			<a href="<?php echo base_url();?>index.php/trial/registration" class="free_trial_1 HFreeAssessBtn">Book Free Assessment</a>	
				<?php }
				?>
				
                                
                            </li>
                        </ul>
                    </div>
                </nav>

            </div>
        </div>
    </header>-->
	
	
 
<header class="navbar navbar-fixed-top top-navbar" id="top-navbar">
	<div class="container">
		<div class="col-md-3 col-sm-12 col-xs-12">
			<a href="<?php echo base_url();?>"> <img data-src="<?php echo base_url(); ?>assetsnew/images/png/sk_logo.png" alt="SkillAngels" class="platformsupport lazyload" style="margin-top: 4px;
    height: 71px;" /> </a>
		</div> 
		<div class="col-md-9 col-sm-12 col-xs-12">   
			<div class="topnav" id="myTopnav">
				
				<!--<a href="<?php echo base_url(); ?>index.php/trial/signin" class="free_trial_1">Signin</a>-->
				
			 	<a href="<?php echo base_url(); ?>index.php/trial/about" class="free_trial_1 HAboutBtn">About</a>
				<a href="<?php echo base_url()."login";?>" class="free_trial_1 HLoginBtn">Login</a>
				<?php
				if(isset($this->session->user_id) && $this->session->user_id!='')
				{
				?>
				<?php if($this->router->fetch_method()!="paymentresponse")
							{ ?>
						
					<a href="<?php echo base_url(); ?>index.php/trial/trialgames" class="free_trial_1 HFreeAssessBtn">Free Assessment</a>
					
					<a href="<?php echo base_url(); ?>index.php/trial/logout" class="free_trial_1 HAboutBtn" ><i style="margin:5px 5px 0 0;" class="free_trial_1 fa fa-power-off" aria-hidden="true"></i> Logout </a><?php }   else
								{ ?> 
									<a href="<?php echo base_url(); ?>login" class="free_trial_1 HLoginBtn">Login</a>
									
								<?php } ?>
				<?php
				}
				else
				{?>
			<a href="<?php echo base_url();?>index.php/trial/registration" class="free_trial_1 HFreeAssessBtn">Book A Free Assessment</a>	
				<?php }
				?>
							
				<a href="javascript:;" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
			</div>
		</div>   
	</div>   
</header>   
 

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
/* window.onscroll = function() {myFunction()};

var navbar = document.getElementById("top-navbar");
var sticky = navbar.offsetTop;

function myFunction() {
	var ab=window.pageYOffset-100;
	
  if (ab >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
} */
</script>
<body  class="centered-nav  bgparticles">
 