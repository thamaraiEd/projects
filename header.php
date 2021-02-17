<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SkillAngels Timesheet</title>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap-multiselect.css" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/nprogress.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/green.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/jqvmap.min.css" rel="stylesheet"/>
	<link href="<?php echo base_url(); ?>assets/css/daterangepicker.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet"> 
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet">
 
    <link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/dataTables.tableTools.css" rel="stylesheet" type="text/css">
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	   
<body class="nav-sm">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
			<div class="left_col scroll-view">
			
				<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
				  <div class="menu_section">
					<ul class="nav side-menu">
						<?php
						if($this->session->role_id==1 || $this->session->role_id==2)
						{
						?>
								<!--<li>
									<a id="Dashboard" class="Dashboard menu" href="<?php echo base_url(); ?>index.php/home/dashboard"><i class="fa fa-home"></i>Dashboard</a>
								</li>-->
						<?php
						}
						?>
						<?php
						if($this->session->role_id==1)
						{
						?>
							<li>
								<a id="" class="" href="<?php echo base_url(); ?>index.php/home/activitylist"><i class="fa fa-table"></i>Animator Activity List</a>
							</li>
							<li>
								<a id="" class="" href="<?php echo base_url(); ?>index.php/home/ani_dayreport"><i class="fa fa-table"></i>Day Wise Report</a>
							</li>
							<li>
								<a id="" class="" href="<?php echo base_url(); ?>index.php/home/ani_monthreport"><i class="fa fa-table"></i>Month Wise Report</a>
							</li>
						<?php
						}
						?>
						<?php
						if($this->session->role_id==2)
						{
						?>
							<li>
								<a id="" class="" href="<?php echo base_url(); ?>index.php/home/bgartistactivitylist"><i class="fa fa-table"></i>BG Artist Activity List</a>
							</li>
							<li>
								<a id="" class="" href="<?php echo base_url(); ?>index.php/home/bga_dayreport"><i class="fa fa-table"></i>Day Wise Report</a>
							</li>
							<li>
								<a id="" class="" href="<?php echo base_url(); ?>index.php/home/bg_monthreport"><i class="fa fa-table"></i> Month Wise Report</a>
							</li>
						<?php
						}
						?>
						<?php 
							if($this->session->role_id==3)
							{
						?>
								<li>
									<a id="" class="" href="<?php echo base_url(); ?>index.php/director/activitylist"><i class="fa fa-table"></i>Activity List</a>
								</li>
								<li>
									<a id="" class="" href="<?php echo base_url(); ?>index.php/home/userdetails"><i class="fa fa-table"></i>User Report</a>
								</li>
								<li>
									<a id="" class="" href="<?php echo base_url(); ?>index.php/home/approvalist"><i class="fa fa-table"></i>Director Approval</a>
								</li>
								<li>
									<a id="" class="" href="<?php echo base_url(); ?>index.php/home/dir_dayreport"><i class="fa fa-table"></i>Day Wise Report</a>
								</li>
								<li>
									<a id="" class="" href="<?php echo base_url(); ?>index.php/home/dir_monthreport"><i class="fa fa-table"></i>Month Wise Report</a>
								</li>
						<?php
							}
							if($this->session->role_id==4)
							{
						?> 
								<li>
									<a id="" class="" href="<?php echo base_url(); ?>index.php/superlead/userdetails"><i class="fa fa-table"></i>User Report</a>
								</li>
								<li>
									<a id="" class="" href="<?php echo base_url(); ?>index.php/superlead/dayreport"><i class="fa fa-table"></i>Day Wise Report</a>
								</li>
								<li>
									<a id="" class="" href="<?php echo base_url(); ?>index.php/superlead/monthreport"><i class="fa fa-table"></i>Month Wise Report</a>
								</li>
								<li>
									<a id="" class="" href="<?php echo base_url(); ?>index.php/admin/overallreport"><i class="fa fa-table"></i>Overall Report</a>
								</li>
								<li>
									<a id="" class="" href="<?php echo base_url(); ?>index.php/admin/summaryreport"><i class="fa fa-table"></i>Summary Report</a>
								</li>
						<?php
							}
							if($this->session->role_id==5)
							{
						?> 
								<li>
									<a id="" class="" href="<?php echo base_url(); ?>index.php/admin/userdetails"><i class="fa fa-table"></i>User Report</a>
								</li>
								<li>
									<a id="" class="" href="<?php echo base_url(); ?>index.php/admin/dayreport"><i class="fa fa-table"></i>Day Wise Report</a>
								</li>
								<li>
									<a id="" class="" href="<?php echo base_url(); ?>index.php/admin/monthreport"><i class="fa fa-table"></i>Month Wise Report</a>
								</li>
								<li>
									<a id="" class="" href="<?php echo base_url(); ?>index.php/admin/overallreport"><i class="fa fa-table"></i>Overall Report</a>
								</li> 
								<li>
									<a id="" class="" href="<?php echo base_url(); ?>index.php/admin/summaryreport"><i class="fa fa-table"></i>Summary Report</a>
								</li>
						<?php
							} 
							if($this->session->role_id==6)
							{
						?> 
								<li>
									<a id="" class="" href="<?php echo base_url(); ?>index.php/reviewer/userreports"><i class="fa fa-table"></i>User Report</a>
								</li> 
								<li>
									<a id="" class="" href="<?php echo base_url(); ?>index.php/reviewer/activitylist"><i class="fa fa-table"></i>Activity List</a>
								</li> 
						<?php
							} 
							if($this->session->role_id==7)
							{
						?>  
								<li>
									<a id="" class="" href="<?php echo base_url(); ?>index.php/storyboard/activitylist"><i class="fa fa-table"></i>Activity List</a>
								</li> 
						<?php
							} 
							if($this->session->role_id==8)
							{
						?>  
								<li>
									<a id="" class="" href="<?php echo base_url(); ?>index.php/comp/activitylist"><i class="fa fa-table"></i>Activity List</a>
								</li> 
						<?php
							}
							if($this->session->role_id==9)
							{
						?> 
							<li>
								<a id="" class="" href="<?php echo base_url(); ?>index.php/wdev/activitylist"><i class="fa fa-table"></i>Activity List</a>
							</li>
							<?php
							
							if($this->session->manager_id==0){?>
							<li>
								<a id="" class="" href="<?php echo base_url(); ?>index.php/wdev/approvalist"><i class="fa fa-table"></i>Approval List</a>
							</li>
							<li>
								<a id="" class="" href="<?php echo base_url(); ?>index.php/wdev/approvedlist"><i class="fa fa-table"></i>Approved List</a>
							</li>
							
							<?php
							}
							}
							if($this->session->role_id==14)
							{
							?>
								<li>
									<a id="" class="" href="<?php echo base_url(); ?>index.php/wdev/dashboard"><i class="fa fa-table"></i>Dashboard</a>
								</li> 
							<?php
							}
							?>
					</ul>
				  </div> 
				</div>
			</div> 
        </div> 
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
            <!--  <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>Welcome - <?php echo $this->session->name; ?>-->
				
			<ul class="nav navbar-nav navbar-right">
				<li class="col-sm-4">				 
					<div class="schooltitle" style="display:block;"> <span style="font-size:20px;" class="topHead"> Welcome - 
					<?php echo $this->session->name; ?> <span></div>
				</li> 
				
				<li class="col-sm-4 text-center">
				<?php
					if($this->session->role_id!=9)
					{
				?> 
					<div class="schooltitle" style="display:inline;"><span style="font-size:20px;" class="topHead"> Role - 
					<?php echo  $this->session->role_name; ?> <span></div>
					<?php } ?>
				</li> 
					
				<li class="col-sm-4 dateinfo text-right"> 
					<span class="count_top">
						<a href="<?php echo base_url(); ?>index.php/home/changepwd"  class="" style="font-weight:bold; letter-spacing: 1px;"><i class="fa fa-sign-out" aria-hidden="true"></i> Change Password</a>
					</span>
					<span class="count_top">
						<a href="<?php echo base_url(); ?>index.php/home/logout"  class="" style="font-weight:bold;"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
					</span>
				</li>
			</ul>
            </nav>
          </div>
        </div>
        </div>
       
	</body>
         
        <!-- /top navigation -->

        <!-- page content -->
        
<div style="display:none;text-align:center;" id="loadingimg" class="loading">Loading&#8230;</div>
<style>
#loadingimg
{
  position: fixed;
  z-index: 999;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  background: #5a5757 url(<?php echo base_url(); ?>assets/images/ajax-page-loader.gif) center center no-repeat;
  background-size: 5%;
  opacity: 0.6;
}
</style>