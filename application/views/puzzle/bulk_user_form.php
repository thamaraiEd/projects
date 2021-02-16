<h4 class="back_to"><a href="<?php echo base_url(); ?>"  class="" style="font-weight:bold;"><i class="fa fa-arrow-left" aria-hidden="true"></i> BACK</a></h4>

<div class="form-bg" >
	<div class="container">
		<div class="row">	
			<h2 style="text-align: center;color: #000;margin: 0;">BULK USERS QUOTATION(For Schools)</h2><br/>
			<p class="info_about_quotation">We want to work with your school and ensure that your students get the most out of the cognitive skill development products we have available. Please fill in the form below with details of what products your school may require, how many numbers of the product are needed, and we will get in touch with you very soon!</p>
		</div>
	</div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row">			
			<div class="col-md-6 col-sm-12 col-xs-12 text-center">
				<div class=""> 
					<div class="">
						<img src="<?php echo base_url(); ?>assets/images/img2020/Bulk_Form.png" alt="Bulk User" style="width: 100%;" />
					</div>
				</div>
			</div>
            <div class="col-md-6 col-sm-12 col-xs-12 frm_bg"> 
                <div id="successmsg" style="color: green; font-size:20px; font-weight:600; text-align: center;"></div>
                <form name="frmRegister" id="frmRegister"  class="" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                    <div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label class=" control-label">School Name<span style="color:red">*</span></label>
								<input type="text" maxlength="150" class="form-control" name="schoolname" value="" id="schoolname" maxlength="40">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label class=" control-label">Address<span style="color:red">*</span></label>
								<textarea class="form-control" name="address" value="" id="address" style="resize: none;"></textarea>
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
                            <div class="col-md-6">
                                <label class=" control-label">Name of Single Point of Contact (SPoC)<span style="color:red">*</span></label>
								<input type="text" class="form-control alphaOnly" name="spoc_name" value="" id="spoc_name" maxlength="40">
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">E-Mail ID of SPoC<span style="color:red">*</span></label>
                                <input type="text" class="form-control" name="spoc_mail" value="" id="spoc_mail" maxlength="30">
                            </div>
                        </div>
						<div class="row"> 
                            <div class="col-md-6">
                                <label class="control-label">Contact Mobile number of SPoC<span style="color:red">*</span></label>
                                <input type="text" class="form-control numbersOnly" maxlength="15" name="contactnumber" value="" id="contactnumber">
                            </div>
							<div class="col-md-6">
                                <label class="control-label">Total number of Licences required<span style="color:red">*</span></label>
                               <input type="text" class="form-control numbersOnly"  maxlength="5" name="licences" value="" id="licences">
                            </div>
                        </div> 
						<div class="row">  
							<div class="col-lg-12" align="center">								
								<input type="button" name="btnRegisterSubmit" id="btnRegisterSubmit" class="btn btn-success" value="Submit">  
							</div> 
						</div> 						
                    </div>                   
                </form>
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
					if(data=='Registered successfully'){  
						$('#frmRegister')[0].reset();
						$('#btnRegisterSubmit').attr('disabled', false);
						$('#btnRegisterSubmit').html('Import Done');
						$('#successmsg').html('Registered successfully...'); 
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