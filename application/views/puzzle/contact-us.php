
<div class="form-bg" style="margin:0px;"> 
	<div class="container">
		<div class="row">	
			<h2 style="text-align: center;color: #000;margin: 0;">Contact Us</h2><br/>
			<!--<p class="info_about_quotation">We want to work with your school and ensure that your students get the most out of the cognitive skill development products we have available. Please fill in the form below with details of what products your school may require, how many numbers of the product are needed, and we will get in touch with you very soon!</p>-->
		</div>
	</div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row">			
			<div class="col-md-6 col-sm-12 col-xs-12 text-center">
				<div class=""> 
					<div class="">
						<img src="<?php echo base_url(); ?>assets/images/img2020/Contact_us.png" alt="Bulk User"  style="width: 100%;" />
					</div>
				</div>
			</div>
            <div class="col-md-6 col-sm-12 col-xs-12 frm_bg">  
				<div class="Contact_US">
					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center mrgbtm"> 
						<img src="<?php echo base_url(); ?>assets/images/Edsix.png" class="img-responsive" width="200px"> 
						<ul>
							<li style="font-weight:bold;font-size:24px;">Edsix BrainLab Pvt Ltd <sup style="font-size:19px;">®</sup></li>
							<li>Module #1, 3rd Floor, A Block,</li>
							<li>Phase 2, IITM Research Park,</li>
							<li>Kanagam Road, Taramani, Chennai - 600113</li>
						</ul> 
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12  text-center mrgbtm">
						<ul>
							<li class="callicon">044-66469877, +91 95695 65454</li>
							<li class="msgicon"><a href="mailto:support@skillangels.com">support@skillangels.com</a></li>
						</ul>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12  text-center mrgbtm">
							<div class="socialmedia">
								<div style="font-weight:bold;font-size:24px;">Join Us</div>
								<a href="https://www.facebook.com/skillangels" target="_blank">
									<img src="<?php echo base_url(); ?>assets/images/fb.png"  >
								</a>
								<a href="https://www.linkedin.com/company/edsix-brain-lab-pvt-ltd?trk=company_logo" target="_blank">
									<img src="<?php echo base_url(); ?>assets/images/icon_LinkedIn.png">
								</a>
							</div> 
						</div> 
					</div>
				</div>
            </div>
        </div>
    </div>
</div>

<div style="display:none;" id="Loading" class="Loading"></div>

<script src = "<?php echo base_url(); ?>assets/js/jquery.min.js" type="text/javascript"></script>
<script src = "<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script src = "<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>



<script>

 $(document).ready(function(){
	
});

	$('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9,]/g,'');
});

	$('.alphaOnly').keyup(function () { 
    this.value = this.value.replace(/[^a-zA-Z ]/g,'');
});

/* var isemailavail=0;
	$("#spoc_mail").blur(function(){
		$.ajax({
				 url: "<?php echo base_url(); ?>index.php/home/chk_bulk_user_email",
				 type:'POST',
				 data:{spoc_mail:$("#spoc_mail").val()},
				 success: function(result){
					 if($.trim(result)>0){
					isemailavail=0;$("#errEmail").html("This E-Mail ID is already registered. Please try with new id.").show();
					}
					 else{isemailavail=1;$("#errEmail").html("").show();
					 }
						
				}});
		
	}); */

 $("#frmRegister").validate({
        rules: {
			"schoolname": {required: true,minlength: 2},
            "address": {required: true,minlength: 3},
            "spoc_name": {required: true},
            "spoc_mail": {required: true,email: true},
            "contactnumber":  {required: true,minlength:10,maxlength:10},
			"licences": {required: true},
			"program": {required: true}
        },
        messages: {
			"schoolname": {required: "Please enter school name"},
            "address": {required: "Please enter address"},
            "spoc_name": {required: "Please enter SPoC name"},
            "spoc_mail": {required: "Please enter email id",email:"Please enter valid email"},
            "contactnumber": {required:"Please enter contact number",minlength:"Please enter 10 digit mobile no",maxlength:"Please enter 10 digit mobile no"},
			"licences": {required: "Please enter no.of licences"},
			"program": {required: "Please select program"}
			
	    },
		 errorPlacement: function(error, element) {
			if (element.attr("type") === "radio") {
				error.insertAfter(element.parent().parent());
			}
			else if (element.attr("id") === "txtPMobile" || element.attr("id") === "txtMobile") {
				error.insertAfter(element.parent());
			} 
			else 
			{
				error.insertAfter(element);
			}
		} 	 
   });  
	

$("#btnRegisterSubmit").click(function(){	
if($("#frmRegister").valid())
	 { 
		 var form = $('#frmRegister')[0];
		 var formData = new FormData(form);
		 //alert('success');
		 $('#Loading').show();
		$.ajax({
				url: "<?php echo base_url(); ?>index.php/home/insert_users",
				type:"POST",
				//dataType:"json",
				data:formData,
				contentType: false,       
				cache: false,             
				processData:false, 
				success: function (data) 
				{ 
					$('#Loading').hide();
					if(data=='User details added'){  
						$('#frmRegister')[0].reset();
						$('#btnRegisterSubmit').attr('disabled', false);
						$('#btnRegisterSubmit').html('Import Done');
						$('#successmsg').html('User details added successfully...'); 
						return false;
					}
				}
			});
	  }
	 else
	 {
		$("#errEmail").show();
	 }  
}); 
</script>
<style>
form .dropdown {
     color: #000 !important; 
}
#error { color: red;}
.error { color: red;}
.errcode { color: red;}
.erroremail { color: red;}
#sbmtbtn{padding: 10px 22px;margin: 5px auto;background: #e9e610;}
.dwnbtn{padding: 10px 22px;margin: 5px auto; }
.Loading {
  position: fixed;
  z-index: 999;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  background: #5a5757 url(<?php echo base_url(); ?>assets/images/loading_icon.gif) center center no-repeat;
  background-size: 5%;
  opacity: 0.6;
}
</style>