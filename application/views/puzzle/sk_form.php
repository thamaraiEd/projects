<h4 class="back_to"><a href="<?php echo base_url(); ?>"  class="" style="font-weight:bold;"><i class="fa fa-arrow-left" aria-hidden="true"></i> BACK</a></h4>

<div class="form-bg">
	<div class="container">
		<div class="row">	
			<h2 style="text-align: center;color: #000;margin: 0;">SKILLANGELS(For Students)</h2><br/> 
		</div>
	</div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row">
			<div class="col-md-6 col-sm-12 col-xs-12 text-center">
				<div class=""> 
					<div class="" style="margin:100px 0 0 0;">
						<img src="<?php echo base_url(); ?>assets/images/img2020/Student Form.png" alt="Student Registration"  style="width: 100%;"  />
					</div>
				</div>
			</div>
            <div class="col-md-6 col-sm-12 col-xs-12 frm_bg"> 
				<div id="successmsg" style="color: green; font-size:20px; font-weight:600; text-align: center;"></div>		 
					 <form name="frmRegister" id="frmRegister"  class="" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					
                    <div class="form-group">
						<div class="row">
                            <div class="col-md-12">
                                <label class="control-label">Student Name<span style="color:red">*</span></label>
								<input type="text" maxlength="150" class="form-control alphaOnly" name="studentname" value="" id="studentname">
                            </div>
						</div>
						<div class="row">
                            <div class="col-md-12">
								<label class=" control-label">Grade<span style="color:red">*</span></label>
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
								<label for="city">City<span style="color:red">*</span></label>
								<input type="text" maxlength="40" class="form-control alphaOnly" name="city" value="" id="city">
							</div>
						</div>			
						<div class="row">
							<div class="col-md-6">
								<label for="state">State<span style="color:red">*</span></label>
								<input type="text" maxlength="40" class="form-control alphaOnly" name="state" value=""  id="state">
							</div>
							<div class="col-md-6">
								<label for="country">Country<span style="color:red">*</span> </label>
								<select class="form-control ddl selectpicker" name="country" id="country">
									<option value="">Select your country</option>  
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="pincode">Pincode<span style="color:red">*</span></label>
								<input type="text" maxlength="6" class="form-control numbersOnly" name="pincode" value="" id="pincode">
							</div>
							<div class="col-md-6">
								<label for="contactnumber">Mobile Number<span style="color:red">*</span> </label>
								<div class="input-group">
									<span class="input-group-addon" id="Mobileprefix"></span>
									<input type="text" class="form-control input-sm numbersOnly" id="contactnumber" name="contactnumber" placeholder="" maxlength="20" minlength="" readonly='true' />
									<input type="hidden" name="hdnmobile_prefix" id="hdnmobile_prefix" value="" />
									<input type="hidden" name="hdnOTP" id="hdnOTP" value="" />
								</div>
									<span for="iscontactnumbervalid" generated="true"  class="iscontactnumbervalid" id="iscontactnumbervalid"></span>
							</div>
                        </div>						
						<div class="row"> 
                            <div class="col-md-6">
                                <label for="txtOPassword">Password<span style="color:red">*</span></label>
								<input type="password" placeholder="Minimum 8 characters" class="form-control" maxlength="20" name="txtOPassword" value="" id="txtOPassword">
                            </div>
							<div class="col-md-6">
                                <label for="txtCPassword">Confirm Password<span style="color:red">*</span></label>
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
								<input type="text" class="form-control" name="couponcode" value="" id="couponcode" maxlength="20">
								<label for="txtCode" generated="true" style="color:red" class="errorCode" id="errCode"></label> 
							</div> 
							<div class="col-md-4">
								<div class="input-group-append" style="margin-top: 16px;">
									<input type="button" class="btn btn-success" name="apply" id="apply" value="Apply">
								</div>
							</div>
						</div> 
						<div class="form-group inside" id="PR_Dtails">
							<div class="row" >
								<div class="col-md-5">
									<div class="col-md-12">
										<label>Price<span style="font-size:12px;">(inclusive of all taxes)</span></label>
									</div>
									<div class="col-md-12">
										<label style="color:blue;font-size:17px;" for="price" generated="true" name="price" id="price"></label>
										<input style="display:none;" type="text" value="0" id="hdnOPrice">
									</div>
								</div>
								<div class="col-md-4" id="DIS" style="display:none">
									<div class="col-md-12">
										<label>Discount  </label>
									</div>
									<div class="col-md-12">
										<label style="color:blue;font-size:17px;" for="discount" generated="true" class="discount" id="discount">0</label>
										<input style="display:none;" type="text" value="0" id="hdnDiscPer">
									</div>
								</div>
								<div class="col-md-3" id="TP" style="display:none">
									<div class="col-md-12">
										<label>Total Price  </label>
									</div>
									<div class="col-md-12">
										<label style="color:blue;font-size:17px;" for="totprice" generated="true" class="totprice" id="totprice">0</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row">  
							<div class="col-lg-12" align="center"> 
								<label for="chkabout">
									<input type="checkbox" name="chkabout" id="chkabout" data-toggle="toggle" class="a_loadcheck error" value="YES"> To verify your mobile Number. Please <a id="a_about" href="#" data-toggle="modal" >“Click Here”</a> <span style="color:red">*</span>
								</label>
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
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script>
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
			if($.trim(data)=='CE')
			{
				coupon_code=0;$("#errCode").html("Coupon expired").show();
				coupon_code=0;$("#discount").html("0").show();$("#hdnDiscPer").val("0");
			}
			else if($.trim(data)=='IC')
			{
				coupon_code=0;$("#errCode").html("Invalid coupon").show();
				coupon_code=0;$("#discount").html("0").show();$("#hdnDiscPer").val("0");
			}
			else
			{
				coupon_code=1;$("#discount").html(data+ "% - Rs."+(($("#hdnOPrice").val()*data)/100)).show();$("#hdnDiscPer").val(data);
				coupon_code=1;$("#errCode").html("").show();
				$("#totprice").html($("#hdnOPrice").val()-(($("#hdnOPrice").val()*data)/100));
				$("#DIS").show();
				$("#TP").show();
			}
			
		}
	});	 
}); 

packdetails(pack);
$("#PR_Dtails").hide();
$("#pack").change(function()
{ 

	var pack =  $('#pack').val();
	packdetails(pack);
});
function packdetails(pack)
{
	$("#PR_Dtails").show();
		$.ajax({
			type:"POST",
			url:"<?php echo base_url('index.php/home/price_list') ?>",  
			data:{pack:$('#pack').val()},
			success:function(data)
			{
			//alert($.trim(data));
				if($.trim(data)!='')
				{
					$("#PR_Dtails").show();
				}
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
            "city": {required: true},        
            "state": {required: true},        
            "country": {required: true},        
            "pincode": {required: true,maxlength:6},        
            "contactnumber": 
			{
				required: true,
				minlength: function(element)
				{
					 return $("#contactnumber").attr('maxlength');
				},
				maxlength: function(element)
				{
					 return $("#contactnumber").attr('maxlength');
				}
			},
			"chkabout": {required: true}
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
			"city": {required: "Please enter city"},
			"state": {required: "Please enter state"},
			"country": {required: "Please enter country"},
			"pincode": {required: "Please enter pincode",maxlength:"Please enter 6 digit pincode"},
			"contactnumber": {required:"Please enter contact number",minlength:"Please enter {0} digit mobile no",maxlength:"Please enter {0} digit mobile no" },
			"chkabout": {required: "Please verify the mobile number"}
	    },
		 errorPlacement: function(error, element) {
			if (element.attr("type") === "radio") {
				error.insertAfter(element.parent().parent());
			}
			else if (element.attr("name") === "contactnumber")
			{
				error.insertAfter(element.parent());
			}
			else if (element.attr("name") === "country")
			{
				error.insertAfter(element.parent());
			}
			else if (element.attr("type") === "checkbox")
			{
				error.insertAfter(element.parent());
			}
			else if (element.attr("name") === "grade_id")
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
if($("#frmRegister").valid() && iscontactnumbervalid==1)
	 { 
		 var form = $('#frmRegister')[0];
		 var formData = new FormData(form);
		
		 $('#Loading').show();
		$.ajax({
				url: "<?php echo base_url(); ?>index.php/home/insert_student",
				type:"POST",
				dataType:"json",
				data:formData,
				contentType: false,       
				cache: false,             
				processData:false, 
				success: function (data) 
				{ //alert($.trim(data.response));
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
							//window.location.href= "<?php echo base_url();?>index.php/home/stdregsuc?hdnPaymSubscribeID="+data.url;
							window.location.href= "<?php echo base_url();?>"+data.url;
							
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
		$("#iscontactnumbervalid").show();
	 }  
});  


countrydd();
function countrydd()
{
	$.ajax({
		type:"POST",
		url:"<?php echo base_url('index.php/home/country') ?>",
		//url:"https://magical7studios.com/wp-content/themes/entropia/country.php", 
		success:function(result)
		{
			$("#country").html(result);
			/* $(".selectpicker").selectpicker({
				liveSearch: true  
			}); */
		} 
	});
}
$("#country").change(function()
{
	/*  alert($("#country option:selected" ).val());
	alert($("#country option:selected" ).attr('data-prefix'));
	alert($("#country option:selected" ).attr('data-length'));  */
	
	$("#country").valid();
	
	$("#contactnumber").val('');
	$("#hdnmobile_prefix").val('');
	
	$("#Mobileprefix").text('');
	
	$("#contactnumber").attr("readonly",false);
	$("#hdnmobile_prefix").val($("#country option:selected" ).attr('data-prefix'));
	
	$("#contactnumber").attr('minlength',$("#country option:selected" ).attr('data-length'));
	$("#contactnumber").attr('maxlength',$("#country option:selected" ).attr('data-length'));
	$("#Mobileprefix").text($("#country option:selected" ).attr('data-prefix'));
	
});
</script>
<style>
.t_loadcheck{cursor: not-allowed;}
.a_loadcheck{cursor: not-allowed;}

form .dropdown {
     color: #000 !important; 
} 
#error { color: red;}
#iscontactnumbervalid { color: red;}
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
<div id="MoModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
 <div style="display:none;" id="loadingimg" class="loading">Loading...</div>
  <div class="modal-dialog">
  <div class="modal-content"> 
      <div class="modal-header">   
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Mobile Number Verification</h1> 
		  <div class="col-md-12" style="width:100%">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                          <form class="form-horizontal"  role="form" name="frmAccept" id="frmAccept"> 
							<label style="color:red; padding: 20px; font-size: 17px;"  class="" id="errmsg"> </label>
							<label style="color:green; padding: 20px; font-size: 17px;"  class="" id="sucmsg"> </label>
							<div id="suucessmsg" style="color: green; font-size:20px; font-weight:600; text-align: center;"></div>
								<div class="panel-body"><div id="msgFP" style="font-size: 18px;"></div> 
									<fieldset>
										<div class="form-group" id="Mob_Verfi_succ" style="display:none;">  
											<div class=""><i class="fa fa-thumbs-up" aria-hidden="true" style="font-size:80px;"></i></div>
										</div>
										<div class="form-group" id="sent_OTP_part"> 
											<input class="btn btn-lg btn-primary btn-block" value="Send OTP" type="button" id="btnOTP" name="btnOTP"> 
											<div class="otp_sent_msg"></div>
										</div> 
										<div class="form-group" id="chk_OTP_part" style="display:none;"> 
											<input class="form-control input-lg numbersOnly" placeholder="OTP" name="txtotp" type="text" id="txtotp" style="margin-bottom: 10px;">
											<input class="btn btn-lg btn-primary btn-block" value="Submit" type="button" id="btnAccept" name="btnAccept" > 
										</div>
										<div class="form-group" id="resend_OTP_part" style="display:none;"> 
											<input class="btn btn-lg btn-primary btn-block" value="Re-Send OTP" type="button" id="ResendOTP" name="ResendOTP"> 
										</div>
									</fieldset>
								</div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
      </div> 
  </div>
  </div>
</div>
<script>
$('#chkabout').click(function(e)
{
	if($('.a_loadcheck').length>0)
	{
		e.preventDefault();return false;
	}
	else
	{ 
	
	}
});
$(document).on('click','#a_about',function() 
{	   
	$('#MoModal').modal('show');
	$("#errcommon").hide().html('');
});
$(document).on('click','#btnOTP',function() 
{
	SendOTP();
});

$(document).one('click','#ResendOTP',function(e) 
{
	
	e.preventDefault();
	SendOTP();
	
});

function SendOTP()
{
	var MobileNo=$("#contactnumber").val(); 
	var MobilePrefix=$("#hdnmobile_prefix").val(); 
	var country=$("#country option:selected" ).val();
	var studentname=$("#studentname" ).val(); 
	
	$("#sucmsg").hide().html('');
	$("#errmsg").hide().html('');
	
	if(MobileNo!='' && MobilePrefix!='' && country!='' && studentname!='')
	{
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/home/SendOTP", 
			type:'POST',
			dataType:"json",
			data:{MobileNo:MobileNo,MobilePrefix:MobilePrefix,country:country,name:studentname}, 
			success: function(data)
			{
				$("#loadingimg").hide();
				if(data.response==1)
				{
					 $("#hdnOTP").val(data.OTP);
					 $("#sucmsg").show().html(data.msg);
					 $("#sent_OTP_part").hide();
					 $("#chk_OTP_part").show();
					 $("#resend_OTP_part").show();
				}
				else
				{ 
					$("#errmsg").show().html(data.msg);
					$("#sent_OTP_part").show();
					$("#chk_OTP_part").hide();
					$("#resend_OTP_part").hide();
				} 
			}
		});
	}
	else
	{
		$("#errmsg").show().html("Please fill the required data");
	}
}
$(document).on('click','#btnAccept',function() 
{ 
	var txtotp=$("#txtotp").val();
	var hdnotp=$("#hdnOTP").val();
	
	$("#sucmsg").hide().html('');
	$("#errmsg").hide().html('');
	
	if(txtotp!='')
	{
		$("#errmsg").hide().html('');
		
		$("#loadingimg").show(); 
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/home/MobileNoVerification", 
			type:'POST',
			dataType:"json",
			data:{txtotp:txtotp,hdnotp:hdnotp}, 
			success: function(data)
			{
				$("#loadingimg").hide();
				if(data.response=='1')
				{
					 $("#chkabout").removeClass('a_loadcheck');
					 $("#chkabout").attr('checked','checked');
					 $("#sucmsg").show().html(data.msg);
					 $("#sent_OTP_part").hide();
					 $("#chk_OTP_part").hide();
					 $("#resend_OTP_part").hide();
					 $("#Mob_Verfi_succ").show(); 
					 
				}
				else
				{ 
					$("#errmsg").show().html(data.msg);
				} 
			}
		});
	}
	else
	{
		$("#errmsg").show().html("Please enter the OTP");
	}
});
</script>