<div class="headerTop">
 
 
</div>


<div id="mainContDisp" class="container playGames homePlayGames" style="margin-top:20px;margin-bottom:70px;">

  
<form name="frmRegister" id="frmRegister" class="" method="post" enctype="multipart/form-data" >
  <div class="row">
    <div class="col-lg-12">
	<h1 style="margin:0 0 10px;  border: none;border-bottom: 2px solid #eaeaea;text-align: center;"><span style="padding-bottom:5px;color:#000;">Payment response</span> </h1>
	 </div></div>
	 
	<div class="row">
	<p>Dear <?php echo $getresponsedetails[0]['spoc_name'];?>,</p><br/><br/>
	<p>Thank you for your interest in Edsix Brainlab’s PuzzleBreak. We are eager to work with your school <?php echo $getresponsedetails[0]['school_name'];?> and help your children learn better.</p><br/>
	<p>Unfortunately, we were not able to process your payment of Rs.<?php echo $getresponsedetails[0]['paidamount'];?>.</p><br/>
	<p>Please try registering again using a different mode of payment. If money was deducted from your account, it will be returned to your account in 7 working days</p><br/>
	Best Regards,<br/><strong>Team Edsix</strong><br/>
	</div>
	 <br/>
   

    
   
 </form>
</div>