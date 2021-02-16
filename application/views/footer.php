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

		 <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 footer-contact">
                   <!-- <span><strong>Contact Us:</strong></span> <span></span>+91 9569565454 <br> 044 66469877</span>-->
				   
				   <span><strong>Mail to: </strong></span> <span></span> support@skillangels.com</span>
                </div>
                <div class="col-lg-6 ol-md-6 footer-logo">
                    <img style="width: 167px;"   data-src="<?php echo base_url(); ?>assetsnew/images/png/footer-logo.png" alt="SkillAngels" class="platformsupport lazyload" /> <br>©️ 2020 Edsix Brainlab Private Ltd, All rights reserved.
                </div>
                <div class="col-lg-3 col-md-3 footer-link"> <a target="_blank" href="<?php echo base_url(); ?>Terms of services.pdf" >Terms of service</a><br><a target="_blank" href="<?php echo base_url(); ?>Privacy policy.pdf" >Privacy policy</a>
                
				
				</div>
            </div>
        </div>
    </footer>
	
	
<!--<footer class="site-footer">
    <div class="bottom">
		<div class="container" id="footerpart">
			<div class="row">
				<div class="col-md-5 col-sm-5 col-xs-12 col-lg-5"> 
					<img src="<?php echo base_url(); ?>assets/images/Edsix.png" class="img-responsive" width="200px"> 
					<ul>
					<li>Edsix BrainLab<sup style="font-size:19px;">®</sup>Pvt Ltd <br>Module #1, 3rd Floor, A Block,<br>Phase 2, IITM Research Park,<br>Kanagam Road, Taramani, Chennai - 600113</li>
					</ul> 
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
					<ul>
						<li class="callicon">044-66469877, +91 95695 65454</li>
						<li class="msgicon"><a href="mailto:support@skillangels.com">support@skillangels.com</a></li>
					</ul>
					<div class="socialmedia">
						<span>Join Us</span>
						<a href="https://www.facebook.com/skillangels" target="_blank"><img src="https://schools.skillangels.com/assets/images/fb.png" width="33" height="33"></a> <a href="https://www.linkedin.com/company/edsix-brain-lab-pvt-ltd?trk=company_logo" target="_blank"><img src="https://schools.skillangels.com/assets/images/icon_LinkedIn.png" width="33" height="33"></a>
					</div> 
				</div>
				<div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
					<ul>
						<li><a href="">Home</a></li>
						<li><a href="https://schools.skillangels.com/index.php/home/termsofservice" target="_blank">Terms Of Service</a></li>
						<li><a href="https://schools.skillangels.com/index.php/home/privacypolicy" target="_blank">Privacy Policy</a></li>
						<li><a href="https://schools.skillangels.com/index.php/home/faq" target="_blank">FAQ</a></li>
					</ul>
				</div> 
				<div class="col-md-3 col-sm-3 col-xs-12 col-lg-3"> 
					<img src="<?php echo base_url(); ?>assets/images/sklogo-web.png" class="img-responsive" width="200px" > 
				</div>
			</div>
		</div>
    </div>
  </footer>-->
  
<!-- Cookie Alert---->
<link href="<?php echo base_url(); ?>assetsnew/css/cookiealert.css" rel="stylesheet" type="text/css" /><!-- START Bootstrap-Cookie-Alert -->
<div class="alert text-center cookiealert" role="alert">
<b>Do you like cookies?</b> &#x1F36A; We use cookies to ensure you get the best experience on our website. 
<a href="<?php echo base_url(); ?>index.php/home/privacypolicy#cookie" target="_blank" >Learn more</a>
<button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close">        I agree</button>
</div>
<script src="<?php echo base_url();?>assetsnew/js/cookiealert.js"></script>
<link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript"></script>
<!-- Bottom to Top Move  Alert----> 
<script src="<?php echo base_url(); ?>assetsnew/js/bottomtotop/scrolls.js"></script>  
<script>
scroller.init();
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5f45ec29cc6a6a5947aedbe8/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<!-- Bottom to Top Move  Alert----> 
<!-- <script src="<?php echo base_url(); ?>assetsnew/js/slimscroll/jquery.slimscroll.min.js"></script>  
<script type="text/javascript">
$(function(){
 $("body").slimScroll({ 
    height: 'auto', 
    allowPageScroll: false
});
});
</script>----> 

</body>
</html>