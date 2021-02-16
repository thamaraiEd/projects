<section class="banner" style="padding:0px;">
	<img src="<?php echo base_url(); ?>assets/images/img2020/Banner1-New.png" alt="Banner"  width="100%"/>
</section>
<section class="hero">
    <div class="container text-center"> 
		<div class="col-md-12">
			<h3>In these challenging times, education becomes even more vital and needs to transform like never before.</h3>
			<div class="container">
				<div class="Plan_content">
					<ul class="Plan_exp">
						<li class="">
						<i class="fa fa-hand-o-right"></i> Schools across the world are making greater use of remote learning options, including conducting classes over video conferencing platforms such as Skype, Zoom or Teams. </li>
						<li class="">
						<i class="fa fa-hand-o-right"></i> Wouldn’t it be great if teachers and students could replicate the stimulating environment of an actual classroom online? How can you make sure that students are having fun and developing their cognitive skills as they follow lessons online?</li>
						<li class="">
						<i class="fa fa-hand-o-right"></i> Edsix Brainlab brings you new and innovative solutions for online classrooms. 
						Teachers can cut through students’ fatigue and bring back excitement to their classes through our fun and engaging products. </li>
					</ul>
				</div>
			</div> 
		</div> 
    </div> 
</section>
<section class="Plan_Pricing">
    <div class="container text-center"> 
		 
			<div class="col-md-12" id="Product-Id">
				<div class="row">
					<div class="col-sm-4">
						<div class="for_student product_details">
							<div class="imgpart">
								<img src="<?php echo base_url(); ?>assets/images/img2020/Student.png" alt="For Students" />
							</div>
							<div class="btnpart">
								<a href="#Pricing_table" class="btn btn-lg scroll" id="Hots" href="javascript:;">
									<span>SkillAngels<p class="sub_text">(For Students)</p></span>
								</a>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="for_school product_details">
							<div class="imgpart">
								<img src="<?php echo base_url(); ?>assets/images/img2020/Bulk.png" alt="Bulk User For Schools" />
							</div>
							<div class="btnpart">
								<a class="btn btn-lg" id="BulkUsers" href="<?php echo base_url(); ?>index.php/home/bulk_user_form">
									<span>Bulk Users Quotation<p class="sub_text">(For Schools)</p></span>
								</a>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="for_teachers product_details">
							<div class="imgpart">
								<img src="<?php echo base_url(); ?>assets/images/img2020/Teacher.png" alt="For Teachers" />
							</div>
							<div class="btnpart">
								<a href="#Pricing_table" class="btn btn-lg scroll" id="PuzzleBreak" href="javascript:;">
									<span>PuzzleBreak<p class="sub_text">(For Teachers)</p></span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div> 
		 
    </div> 
</section>
<section class="pricing-part">
	<div class="">
		<div class="col-md-12">
			 <div id="Pricing_table_content"></div>
		</div>
	</div> 
</section>
<!-- /Hero --> 
<div id="loadinimage" style="display:none;"></div>
<a class="scrolltop" href="#"><span class="fa fa-angle-up"></span></a>

<script>
pricingtable("SKILLANGELS");
$("#Hots").click(function(){
	pricingtable("SKILLANGELS");
	$(".btn").removeClass('ActivePlan');
	$(this).addClass('ActivePlan');
	
});
$("#PuzzleBreak").click(function(){
	pricingtable("PuzzleBreak");
	$(".btn").removeClass('ActivePlan');
	$(this).addClass('ActivePlan');
});
function pricingtable(type)
{
	$('#loadinimage').show();
	$.ajax({
	url: "<?php echo base_url(); ?>index.php/home/pricing_table",
	type:"POST", 
	data:{type:type},
	success: function (data) 
	{//alert(data);
		$("#Pricing_table_content").html(data);
		$('#loadinimage').hide(); 
	}
		
	});
}
</script>
<style>


.sub_text
{
	font-size: 14px;text-transform: capitalize;color:#fff !important;
}
p{font-size:20;}

.btn{
   color: #ffffff;
    background-color: #000;
    font-size: 16px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    padding: 0;
    border-radius: 5px;
    border: none;
    overflow: hidden;
    position: relative;
    z-index: 1;
    transition: all 0.3s ease 0s;
}
.btn:before,
.btn:after,
.btn span:before,
.btn span:after{
    content: '';
    background: linear-gradient(to right,#ffb600,#ffb600);
    width: 25%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    transition: all 0.3s ease;
}
.btn:before{
    top: -100%;
    transition-delay: 0.15s;
}
.btn:after{
    left: 25%;
    top: 100%;
    transition-delay: 0.1s;
}
.btn span:before{
    left: 50%;
    top: -100%;
    z-index: -1;
    transition-delay: 0.05s;
}
.btn span:after{
    left: 75%;
    top: 100%;
    z-index: -1;
}
.btn span{
    z-index: 1;
    display: block;
    padding: 10px 20px ;
    position: relative;font-family: "Audiowide";
}
.btn:hover:before,
.btn:hover:after,
.btn:hover span:before,
.btn:hover span:after{
    top: 0;
}

.btn:hover{
    color: #000; 
}
@media only screen and (max-width: 767px){
    .btn{ margin-bottom: 20px; }
} 
</style>

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
<script>
$(document).ready(function(){	  	 
doAjax();
});	
 
function doAjax()
{  		
	var d = new Date();
	var month=d.getMonth()+1; 
	    $.ajax({
		url: "<?php echo base_url(); ?>answertime.php?id="+d.getFullYear()+""+month+""+d.getDate()+""+d.getHours()+""+d.getMinutes()+""+d.getSeconds()+""+d.getMilliseconds(),
		dataType:"json",
		success: function(data) {	
		setTimeout(function(){
		//alert(data.tot_att);
		//odometer.innerHTML = data.tot_att;
		
		$('.custcountr').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: data.tot_att
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
		
		
    //$(this).text(Math.ceil(now));
	$(this).html('<span style="background:#000">'+ Math.ceil(now) +'</span>');
        }
    });
});


		 
		$('#idtrainedMinutes').html(data.gtime+"+"); 

	});	 
	}

	});
}
setInterval(function(){doAjax();}, 1000*100);  // 1000 = 1 second, 3000 = 3 seconds 
</script>