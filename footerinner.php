<footer>
<div class="container" id="footerpart">
<div class="row">
<div class="col-md-3 col-sm-6">

  <ul>
<li>EdSix Brain Lab<sup>TM</sup> Pvt Ltd</li>
<li># 1 H, Module no. 8,</li>
<li>IIT Madras Research Park First Floor,</li>
<li>Kanagam Road ,Taramani Chennai - 600113</li>
  </ul>
 
  </div>
<div class="col-md-3 col-sm-6">
<ul>
<li class="callicon"><?php echo $this->lang->line("ftphonenumber"); ?></li>
<li class="msgicon"><a href="mailto:angel@skillangels.com"><?php echo $this->lang->line("ftemail"); ?></a></li>
</ul>
<div class="socialmedia">
<span><?php echo $this->lang->line("ftjoin"); ?></span>
<a href="https://www.facebook.com/skillangels" target="_blank"><img src="<?php echo base_url(); ?>assets/images/fb.png" width="33" height="33"></a> <a href="https://www.linkedin.com/company/edsix-brain-lab-pvt-ltd?trk=company_logo" target="_blank"><img src="<?php echo base_url(); ?>assets/images/icon_LinkedIn.png" width="33" height="33"></a>
</div>

</div>
<div class="col-md-3 col-sm-6">
<ul>
<li><a href="<?php echo base_url(); ?>index.php"><?php echo $this->lang->line("fthome"); ?></a></li>
<li><a href="<?php echo base_url(); ?>index.php/home/termsofservice" target="_blank"><?php echo $this->lang->line("ftterms"); ?></a></li>
<li><a href="<?php echo base_url(); ?>index.php/home/privacypolicy" target="_blank" ><?php echo $this->lang->line("ftprivacy"); ?></a></li>
<li><a href="<?php echo base_url(); ?>index.php/home/faq" target="_blank"><?php echo $this->lang->line("ftfaq"); ?></a></li>
</ul>
</div>
<div class="col-md-3 col-sm-6">

  <img src="<?php echo base_url(); ?>assets/images/sklogo-web.png" class="img-responsive" width="193" height="67">
  <br/>
<img src="<?php echo base_url(); ?>assets/images/logo_RTBI.png"  > <img src="<?php echo base_url(); ?>assets/images/logo_CJE.png"  ></div>
</div>
</div>
</footer>
<div class="footerBottom"><p>&copy; <?php echo date('Y');?> Skillangels. All rights reserved</p></div>
 <script src="<?php echo base_url(); ?>assets/js/star/jquery-stars.js"></script>
<script>
$("#ContentPartStart").jstars({
	image_path: '<?php echo base_url(); ?>/assets/images/star/'  ,
	style:'rand'
});
</script> 
<script src="<?php echo base_url(); ?>assets/js/slick.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(document).on('ready', function() {
      $(".regular").slick({
        dots: false,
		arrows: true,
		infinite: true,
		 autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1
      });
	  
$('.medialogo').slick({
  dots: true,
  arrows: false,
  autoplay: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
    });
  </script>
<script type="text/javascript">
  $(document).ready(function(e) { 
   $('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 6000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
});
</script>
<script>
//JUST AN EXAMPLE, PLEASE USE YOUR OWN PICTURE!
var imageAddr = "http://wp.skillangels.com/net/4831437-kids-wallpapers.jpg"; 
var downloadSize = 4889999; //bytes

function ShowProgressMessage(msg) {
    if (console) {
        if (typeof msg == "string") {
            console.log(msg);
        } else {
            for (var i = 0; i < msg.length; i++) {
                console.log(msg[i]);
            }
        }
    }
    
    var oProgress = document.getElementById("progress");
    if (oProgress) {
        var actualHTML = (typeof msg == "string") ? msg : msg.join("<br />");
        oProgress.innerHTML = actualHTML;
    }
}

function InitiateSpeedDetection() {
    ShowProgressMessage("calculating, please wait...");
    window.setTimeout(MeasureConnectionSpeed, 1);
};    
/* 
if (window.addEventListener) {
    window.addEventListener('load', InitiateSpeedDetection, false);
} else if (window.attachEvent) {
    window.attachEvent('onload', InitiateSpeedDetection);
} */

function MeasureConnectionSpeed() {
    var startTime, endTime;
    var download = new Image();
    download.onload = function () {
        endTime = (new Date()).getTime();
        showResults();
    }
    
    download.onerror = function (err, msg) {
        ShowProgressMessage("Invalid image, or error downloading");
    }
    
    startTime = (new Date()).getTime();
    var cacheBuster = "?nnn=" + startTime;
    download.src = imageAddr + cacheBuster;
    
    function showResults() { 
        var duration = (endTime - startTime) / 1000;
        var bitsLoaded = downloadSize * 8;
        var speedBps = (bitsLoaded / duration).toFixed(2);
        var speedKbps = (speedBps / 1024).toFixed(2);
        var speedMbps = (speedKbps / 1024).toFixed(2);
		BandWidthInsert(speedBps,speedKbps,speedMbps);
        ShowProgressMessage([
            "Your connection speed is:", 
            speedBps + " bps", 
            speedKbps + " kbps", 
            speedMbps + " Mbps"
        ]);
    }
}
function BandWidthInsert(Bps,Kbps,Mbps)
{
	$.ajax({
			type:"POST",
			url:"<?php echo base_url('index.php/home/insertbandwidth') ?>",
			data:{Bps:Bps,Kbps:Kbps,Mbps:Mbps},
			success:function(result)
			{	/*alert("success");*/
			}
		});
}
</script>
<script>
<!-- ********** Checking Login User ********** -->
setInterval(LoginAjaxCall, 1000*60*1); //300000 MS == 5 minutes
LoginAjaxCall();
function LoginAjaxCall(){ 
/*----------- BandWidth -----------*/	
		$.ajax({
			type:"POST",
			url:"<?php echo base_url('index.php/home/checkbandwidthisexist') ?>",
			success:function(result)
			{	if(result==0)
				{	InitiateSpeedDetection();
				}		
			}
		});
/*----------- BandWidth -----------*/
		$.ajax({
			type:"POST",
			url:"<?php echo base_url('index.php/home/checkuserisactive') ?>",
			success:function(result)
			{	//alert(result);
				if(result==1)
				{ 
					
					window.location.href= "<?php echo base_url();?>index.php";
				}		
			}
		});
		
	
	
}
</script>
<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    $("html,body").animate({scrollTop:$("#header").offset().top},"100");return false;
}
</script>
	 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/commonscript.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url(); ?>assets/js/ie10-viewport-bug-workaround.js"></script>
</div>
</body>
</html>