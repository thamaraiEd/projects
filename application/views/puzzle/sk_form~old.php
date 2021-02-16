<div class="form-bg" style="padding:50px 0px;">
    <div class="container-fluid">
        <div class="row">
		<canvas class="canvas"></canvas>
            <div class="col-md-offset-3 col-md-6">
			<div id="successmsg" style="color: green; font-size:20px; font-weight:600; text-align: center;"></div>
				<form name="frmRegister" id="frmRegister" class="frmRegister" method="post" enctype="multipart/form-data" accept-charset="utf-8" style="padding-bottom: 20px;" novalidate="novalidate" action="<?php  echo base_url('index.php/home/insert_student') ?>">
					<h2 style="text-align: center;color: #ffb600;margin: 0;">Student Details</h2>
                    <div class="form-group">
						<div class="row">
                            <div class="col-md-6">
                                <label class=" control-label">Student Name<span style="color:red">*</span></label>
								<input type="text" maxlength="150" class="form-control alphaOnly" name="studentname" value="" id="studentname">
                            </div>
                            <div class="col-md-6">
								<label>Grade<span style="color:red">*</span></label>
									<select class="form-control dropdown" name="grade_id" required id="grade_id">
										<option value="">Select</option>
									<?php foreach($gradelist as $grade) { ?>
									<option value="<?php echo $grade['gid']; ?>"><?php echo $grade['gradename']; ?></option>
									<?php } ?>
									</select>
							</div>
                        </div>  
                        <div class="row"> 
                            <div class="col-md-6">
                                <label class="control-label">Email ID<span style="color:red">*</span></label>
                                <input type="text" maxlength="60" class="form-control" name="emailid" value="" id="emailid">								
                            </div>
							 <div class="col-md-6">
                                <label class=" control-label">School Name<span style="color:red">*</span></label>
								<input type="text" maxlength="150" class="form-control" name="schoolname" value="" id="schoolname">
                            </div>
                        </div>
						<div class="row"> 
                            <div class="col-md-6">
                                <label class="control-label">School Location<span style="color:red">*</span></label>
                               <input type="text" maxlength="150" class="form-control" name="schoollocation" value="" id="schoollocation">
                            </div>
							<div class="col-md-6">
                                <label class="control-label">Contact Mobile number</label>
                                <input type="text" class="form-control numbersOnly" maxlength="15" name="contactnumber" value="" id="contactnumber">
								<label for="iscontactnumbervalid" generated="true"  class="iscontactnumbervalid" id="iscontactnumbervalid"></label>
                            </div>
                        </div>
						<div class="row"> 
                            <div class="col-md-6">
                                <label for="txtOPassword">Password <span style="color:red">*</span></label>
								<input type="password" placeholder="Minimum 8 characters" class="form-control" maxlength="20" name="txtOPassword" value="" id="txtOPassword">
                            </div>
							<div class="col-md-6">
                                <label for="txtCPassword">Confirm Password <span style="color:red">*</span></label>
								<span><i class="fa fa-lock "></i></span>								
								<input type="password" placeholder="Minimum 8 characters" class="form-control" maxlength="20" name="txtCPassword" value="" id="txtCPassword">
                            </div>
                        </div>						
						<div class="row"> 
                            <div class="col-md-6">
								<label>Plan<span style="color:red">*</span></label>
								<select class="form-control dropdown" name="pack" required id="pack">
									<option value="">Select</option>
									<?php foreach($pack_details as $pack) { ?>
									<option <?php if($pack['pfid']==$pack_id)
											{ ?>selected="selected"<?php } ?> value="<?php echo $pack['pfid']; ?>"><?php echo $pack['flavour_name']; ?></option>
									<?php  } ?>
								</select>
							</div>
							<div class="col-md-6">
                                <label class="control-label">Display as Band Curriculum<span style="color:red">*</span></label>
                                <select class="form-control dropdown" name="curriculum" required id="curriculum">
									<option value="">Select</option>
									<?php foreach($Getcurriculum as $curriculum) { ?>
									<option value="<?php echo $curriculum['id']; ?>"><?php echo $curriculum['band_curriculum']; ?></option>
									<?php } ?>
								</select>
                            </div>
                        </div>
						<div class="row">  
							<div class="col-md-6">
								<label class="control-label">Coupon Code </label>
								<input type="text" class="form-control" name="couponcode" value="" id="couponcode">
								<label for="txtCode" generated="true" style="color:red" class="errorCode" id="errCode"></label>
								<div class="input-group-append">
									<input type="button" class="btn btn-success" name="apply" id="apply" value="Apply">
								</div>
							</div>
							<div class="col-md-6">
							<label>Price : </label>
									<label style="color:blue;font-size:17px;" for="price" generated="true" name="price" id="price"></label>
									<input style="display:none;" type="text" value="0" id="hdnOPrice">
							</div>
							<div class="col-md-6">
							<label>Discount : </label>
								<label style="color:blue;font-size:17px;" for="discount" generated="true" class="discount" id="discount">0</label>
								<input style="display:none;" type="text" value="0" id="hdnDiscPer">
							</div>
							<div class="col-md-6">
							<label>Total Price : </label>
								<label style="color:blue;font-size:17px;" for="totprice" generated="true" class="totprice" id="totprice">0</label>
							</div>
						</div>
						<div class="row">  
							<div class="col-lg-12" align="center">
								<div style="padding-bottom:5px;">   
									<label  style="color:red;font-size:17px;"  class="error" id="errcommon"></label>
								</div>
								<input type="button" name="btnRegisterSubmit" id="btnRegisterSubmit" class="btn btn-success" value="Submit"> 
							</div> 
						</div> 
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-3">
	<div style="display:none;" id="Loading" class="Loading"></div>
</div>
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

var iscontactnumbervalid=0;
	$("#contactnumber").blur(function(){
		$.ajax({
				 url: "<?php echo base_url(); ?>index.php/home/chk_SA_mobile",
				 type:'POST',
				 data:{contactnumber:$("#contactnumber").val()},
				 success: function(result){
					 if($.trim(result)>0){
					iscontactnumbervalid=0;$("#iscontactnumbervalid").html("This contact number already registered. Please try with new number.").show();
					}
					 else{iscontactnumbervalid=1;$("#iscontactnumbervalid").html("").show();
					 }
						
				}});
		
	});

$("#apply").click(function(){
	//location.reload(true);
	var coupon_code=0;
	$('#Loading').show();
	$.ajax({
		url: "<?php echo base_url(); ?>index.php/home/coupon_code_apply",
		type:"POST",
		data:{couponcode:$("#couponcode").val()},		 
		success: function (data) 
		{ //alert(data);
			$('#Loading').hide();
			if($.trim(data)=='CE'){
			coupon_code=0;$("#errCode").html("Coupon expired").show();
			coupon_code=0;$("#discount").html("0").show();$("#hdnDiscPer").val("0");
			}
			else if($.trim(data)=='IC'){
			coupon_code=0;$("#errCode").html("Invalid coupon").show();
			coupon_code=0;$("#discount").html("0").show();$("#hdnDiscPer").val("0");
			}
			else{
			coupon_code=1;$("#discount").html(data+ "% - Rs."+(($("#hdnOPrice").val()*data)/100)).show();$("#hdnDiscPer").val(data);
			coupon_code=1;$("#errCode").html("").show();
			$("#totprice").html($("#hdnOPrice").val()-(($("#hdnOPrice").val()*data)/100));
			
			}
						
		}
	});	 
}); 

packdetails(pack);
$("#pack").change(function()
{ 
	var pack =  $('#pack').val();
	packdetails(pack);
});
function packdetails(pack)
{//alert("hiiiiii");
		$.ajax({
			type:"POST",
			url:"<?php echo base_url('index.php/home/price_list') ?>",  
			data:{pack:$('#pack').val()},
			success:function(data)
			{
			//alert($.trim(data));
				$("#price").html($.trim(data)).show();
				$("#hdnOPrice").val($.trim(data));
				//$("#price").html(data);
				$("#totprice").html($.trim(data)-(($.trim(data)*$("#hdnDiscPer").val())/100));
				$("#discount").html($("#hdnDiscPer").val()+ "% - Rs."+(($.trim(data)*$("#hdnDiscPer").val())/100));
			}
		}); 
	 
}

 $("#frmRegister").validate({
        rules: {
            "studentname": {required: true,minlength: 3},
            "grade_id": {required: true},
            "pack": {required: true},
            "curriculum": {required: true},
			"emailid": {required: true,email: true},
			"txtOPassword": {required: true,minlength: 8},
			"txtCPassword": {required: true,equalTo: "#txtOPassword"},
            "schoolname": {required: true,minlength: 2},
			"schoollocation": {required: true},
            "couponcode": {required: false},        
            "contactnumber": {required: true,minlength:10,maxlength:10}         
        },
        messages: {
            "studentname": {required: "Please enter student name"},
            "grade_id": {required: "Please select grade name"},
            "pack": {required: "Please select pack name"},
            "curriculum": {required: "Please select curriculum"},
            "emailid": {required: "Please enter email id",email:"Please enter valid email"},
			"txtOPassword": {required: "Please enter password"},
			"txtCPassword": {required: "Please confirm password",equalTo: "Please enter valid confirm password"},
			"schoolname": {required: "Please enter school name"},
			"schoollocation": {required: "Please enter school location"},
			"couponcode": {required: "Please enter couponcode"},
			"contactnumber": {required:"Please enter contact number",minlength:"Please enter 10 digit mobile no",maxlength:"Please enter 10 digit mobile no"}
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
if($("#frmRegister").valid() && iscontactnumbervalid==1)
	 { 
		 var form = $('#frmRegister')[0];
		 var formData = new FormData(form);
		
		 $('#Loading').show();
		$.ajax({
				url: "<?php echo base_url(); ?>index.php/home/insert_student_ajax",
				type:"POST",
				dataType:"json",
				data:formData,
				contentType: false,       
				cache: false,             
				processData:false, 
				success: function (data) 
				{ 
					$('#Loading').hide();
				/* 	if(data=='Student details added'){  
						$('#frmRegister')[0].reset();
						$('#btnRegisterSubmit').attr('disabled', false);
						$('#btnRegisterSubmit').html('Import Done');
						$('#successmsg').html('Student details added successfully...'); 
						return false;
					} */
					if($.trim(data.response)=='1')
						{
							window.location.href= "<?php echo base_url();?>index.php/home/stdregsuc?hdnPaymSubscribeID="+data.url;
							//$('#btnreset').click();
							/* $('#frmRegister')[0].reset();
							$("#successmsg").html(data.msg); */
						}
						else
						{
							$("#errcommon").show().html(data.msg);
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
#error { color: red;}
.error { color: red;}
.errcode { color: red;}
.iscontactnumbervalid { color: red;}
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

<script src="<?php echo base_url(); ?>assets/js/jquery.particles.min.js"></script>
<script>
      $(document).ready(function() {
        $('.canvas').particles({
          connectParticles: true,
          color: '#ffffff',
          size: 3,
          maxParticles: 80,
          speed: 1
        });
      });
</script> 
<style>
.canvas
{
	position: absolute;
    display: block;
    overflow: hidden;
	width: 95%;
	margin:0 auto;
	height:500px;
}
</style>