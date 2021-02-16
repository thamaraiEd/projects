<div class="form-bg" id="Free_Registration"> 
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row">			
			<div class="col-md-2 col-sm-12 col-xs-12 text-center"></div>
            <div class="col-md-8 col-sm-12 col-xs-12 TrialForm" id="TrialForm"> 
				<div class="row">	
					<h2 style="text-align: center;color: #000;margin: 0;">Start your Free Trial Account</h2> 
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<img data-src="<?php echo base_url(); ?>assets/images/new/registrtion.jpg"  data-src1="<?php echo base_url(); ?>assets/images/new/registrtion.jpg" alt="SkillAngels"  style="width:100%;"  class="lazyload" />
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					
					<form name="frmRegister" id="frmRegister"  class="frmfreereg" method="post" enctype="multipart/form-data" accept-charset="utf-8">  
						<div class="row">
							<div class="col-md-12">
								<label class=" control-label">Name<span style="color:red">*</span></label>
								<input type="text" maxlength="150" class="form-control" name="txtusername" value="" id="txtusername" maxlength="40">
							</div> 
						</div> 
						<div class="row">
							<div class="col-md-12">
                                <label class="control-label">Contact E-Mail ID<span style="color:red">*</span></label>
                                <input type="text" class="form-control" name="txtemail" value="" id="txtemail" maxlength="30">
                            </div>
						</div>
						<div class="row">
							<div class="col-md-12">
                                <label class="control-label">Contact Mobile number<span style="color:red">*</span></label>
                                <input type="text" class="form-control numbersOnly" maxlength="15" name="contactnumber" value="" id="contactnumber">
                            </div>							
						</div>    
						<div class="row">  
							<div class="col-md-12">
								<label class=" control-label">Preferred Program<span style="color:red">*</span></label>
								 <select class="form-control dropdown" name="program" required id="program">
									<option value="">Select</option>
									<?php foreach($program as $pro) { ?>
									<option value="<?php echo $pro['id']; ?>"><?php echo $pro['program']; ?></option>
									<?php } ?>
								</select>
							 </div>
						</div>
						<div class="row">  
							<div class="col-md-12">
								<label class=" control-label">Grade<span style="color:red">*</span></label>
								 <select class="form-control dropdown" name="ddlgrade" required id="ddlgrade">
									<option value="">Select</option>
									<?php foreach($gradelist as $pro) { ?>
									<option value="<?php echo $pro['grade_id']; ?>"><?php echo $pro['gradename']; ?></option>
									<?php } ?>
								</select>
							 </div>
						</div>
						<div class="row">  
							<div class="col-lg-12" align="center">								
								<input type="button" name="btnRegisterSubmit" id="btnRegisterSubmit" class="btn btn-success" value="Submit">  
							</div> 
							
						<div class="row">  
							<div class="col-lg-12" align="center">								
								<div id="successmsg" style="font-size:20px; font-weight:600; text-align: center;"></div>
							</div> 
						</div> 		 
					</form>
				</div>     
            </div>
			<div class="col-md-2 col-sm-12 col-xs-12 text-center"></div>
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
 $("#frmRegister").validate({
        rules: { 
            "address": {required: true,minlength: 3},
            "txtusername": {required: true},
            "txtemail": {required: true,email: true},
            "contactnumber":  {required: true,minlength:10,maxlength:10},
			"licences": {required: true},
			"program": {required: true},
			"ddlgrade": {required: true}
        },
        messages: {
			"txtusername": {required: "Please enter name"},
            "address": {required: "Please enter address"},
            "spoc_name": {required: "Please enter SPoC name"},
            "txtemail": {required: "Please enter email id",email:"Please enter valid email"},
            "contactnumber": {required:"Please enter contact number",minlength:"Please enter 10 digit mobile no",maxlength:"Please enter 10 digit mobile no"},
			"licences": {required: "Please enter no.of licences"},
			"program": {required: "Please select program"},
			"ddlgrade": {required: "Please select grade"}
			
	    },
		 errorPlacement: function(error, element) {
			if (element.attr("type") === "radio") {
				error.insertAfter(element.parent().parent());
			}
			else if (element.attr("id") === "txtPMobile" || element.attr("id") === "txtMobile") {
				error.insertAfter(element.parent());
			} else if (element.attr("name") === "program")
			{
				error.insertAfter(element.parent().parent());
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
				url: "<?php echo base_url(); ?>index.php/home/AddTrialUser",
				type:"POST",
				dataType:"json",
				data:formData,
				contentType: false,       
				cache: false,             
				processData:false, 
				success: function (data) 
				{ 
					$('#Loading').hide();
					if(data.response==1)
					{
						//$("#successmsg").show().html('<div style="color:green">'+data.msg+'</div>');
						 window.location.href="<?php echo base_url(); ?>index.php/home/trialgames";
					}
					else
					{
						$("#successmsg").show().html('<div style="color:red">'+data.msg+'</div>');
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