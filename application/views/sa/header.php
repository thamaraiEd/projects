<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
<title>Puzzle Break</title>
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
<script src="<?php echo base_url(); ?>assets/lib/jquery/jquery-migrate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/superfish/hoverIntent.js"></script> 
<script src="<?php echo base_url(); ?>assets/lib/tether/js/tether.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/stellar/stellar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/counterup/counterup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/waypoints/waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/easing/easing.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/stickyjs/sticky.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/parallax/parallax.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/lockfixed/lockfixed.min.js"></script>
<!-- Template Specisifc Custom Javascript File -->
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>  
</head> 
		 
<div class="pre-header col-xs-hide" style="background: #ffb600;">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="contact-info-menu">
            <div class="contact-info-item" style="text-align: center; padding:2px;">
              <strong style="color: #000;font-size: 14px;font-family: 'GothamBook';">
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
			  </strong>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
<header class="navbar navbar-fixed-top top-navbar" id="top-navbar">
	<div class="container">
		<div class="col-md-3 col-sm-12 col-xs-12">
			<a href="<?php echo base_url(); ?>" class="navbar-brand1">
				<img data-src="<?php echo base_url(); ?>assets/images/webp2020/Edsix.png"  data-src1="<?php echo base_url(); ?>assets/images/webp2020/Edsix.webp" alt="Edsix BrainLab Pvt Ltd" width="200px"  class="lazyload" />
			</a> 
		</div> 
		<div class="col-md-9 col-sm-12 col-xs-12">   
			<div class="topnav" id="myTopnav">
				<a href="<?php echo base_url(); ?>index.php" class=" <?php if($this->uri->segment(2)=="index.php"){echo 'class="active"';}?>" >Home</a>
				<a href="<?php echo base_url(); ?>index.php/home/aboutus" class="<?php if($this->uri->segment(2)=="aboutus"){echo "active";}?>">About Us</a>
				<div class="dropdown">
					<button class="dropbtn">Products
						<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-content">
					<a href="<?php echo base_url(); ?>index.php/home/studentdetails">For Student</a>
					<a href="<?php echo base_url(); ?>index.php/home/teachersdetails">For Teachers</a>
					<a href="<?php echo base_url(); ?>index.php/home/schooldetails">For Schools</a>
					<a href="<?php echo base_url(); ?>index.php/home/professionalsdetails">For Professionals</a>
					</div>
				</div> 
				<?php 
				if(isset($this->session->user_id) && $this->session->user_id!='')
				{
				?>
					<a href="<?php echo base_url(); ?>index.php/trial/profile" class="free_trial_1">Profile</a>
				<?php 
				}
				else
				{
				?>
					<a href="<?php echo base_url(); ?>index.php/trial/signin" class="free_trial_1">Sign in</a>
				<?php					
				}
				?>
				<a href="<?php echo base_url(); ?>index.php/trial/registration" class="free_trial_1">Free Assessment</a>
				<a href="javascript:;" class="free_trial_1">Blog</a>
				<a href="javascript:;" class="free_trial_1">Gallery</a>
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
/* $(document).ready(function()
{
	//responsive menu toggle
	$("#menutoggle").click(function()
	{
		$('.xs-menu').toggleClass('displaynone');
	});
	//add active class on menu
	$('ul li').click(function(e)
	{
		e.preventDefault();
		$('li').removeClass('active');
		$(this).addClass('active');
	});
	//drop down menu	
	$(".drop-down").hover(function()
	{
		$('.mega-menu').addClass('display-on');
	});
	$(".drop-down").mouseleave(function()
	{
		$('.mega-menu').removeClass('display-on');
	}); 
});
 */

</script> 
<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("top-navbar");
var sticky = navbar.offsetTop;

function myFunction() {
	var ab=window.pageYOffset-100;
	
  if (ab >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
<body  class="centered-nav  bgparticles">

 <link rel="preload stylesheet" href="<?php echo base_url();?>assets/css/style20.css">