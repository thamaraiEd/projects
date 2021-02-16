<div id="" class="container playGames homePlayGames" style="margin-top:20px;margin-bottom:70px;">
	<form name="frmRegister" id="frmRegister" class="" method="post" enctype="multipart/form-data" >
	  <div class="row">
		<div class="col-lg-12">
		<h1 style="margin:0 0 30px;text-align: center;padding-bottom: 7px;"><span style="padding-bottom:5px;color:#000;">Payment Failure</span> </h1>
		 </div></div>
		 <div class="row">
		  <div class="col-lg-12 alert alert-success" style="text-align:center;">Oops we had trouble processing the payment <br/>please try again !!!</div>
		  <!--<a href="<?php echo base_url(); ?>index.php/trial/dashboard" data-toggle="modal" data-target="#login-modal" class="loginLink" style="color: #fff;font-size: 22px;background: #c01a4f;padding: 10px;border-radius: 5px;">Child List</a>-->
		  </div> 
		 </div> 
	</form>	 
<div class="error" style="display:none;">
   	<?php
		echo "<pre>";print_r($error);
	?>
</div>
</div>
<div id="mainContDisp"></div>
<style>
#mainContDisp {
    background: url(<?php echo base_url(); ?>assetsnew/images/reg-failure.jpg) no-repeat;
    background-position: center;
    background-size: contain;
    min-height: 500px; 
}
.alert-success {
    color: #ffffff;
    background-color: #673AB7;
    border-color: #673AB7;
    font-size: 25px;
    letter-spacing: 1px;
}
</style>