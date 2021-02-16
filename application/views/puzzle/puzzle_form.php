<h4 class="back_to"><a href="<?php echo base_url(); ?>"  class="" style="font-weight:bold;"><i class="fa fa-arrow-left" aria-hidden="true"></i> BACK</a></h4>
<div class="form-bg" style="padding:5px 0px;">
	
	<div class="container">
		<div class="row">	
			<h2 style="text-align: center;color: #000;margin: 0;">PUZZLEBREAK(For Teachers)</h2><br/>
		</div>
	</div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row">
			<div class="col-md-6 col-sm-12 col-xs-12 text-center">
				<div class=""> 
					<div class="" style="margin:100px 0 0 0;">
						<img src="<?php echo base_url(); ?>assets/images/img2020/Teacher Form.png" alt="Teacher Registration"  style="width: 100%;" />
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
								<input type="text" maxlength="150" class="form-control" name="schoolname" value="" id="schoolname">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label class=" control-label">Address<span style="color:red">*</span></label>
								<textarea class="form-control" name="address" value="" id="address" style="resize: none;"></textarea>
							</div>
                        </div>
						<div class="row">
							<div class="col-md-6">
								<label for="city">City <span style="color:red">*</span></label>
								<input type="text" maxlength="40" class="form-control alphaOnly" name="city" value="" id="city">
							</div>                       
							<div class="col-md-6">
								<label for="state">State <span style="color:red">*</span></label>
								<input type="text" maxlength="40" class="form-control alphaOnly" name="state" value=""  id="state">
							</div>
						</div>
						<div class="row">							
							<div class="col-md-6">
								<label for="country">Country <span style="color:red">*</span> </label>
								<select class="form-control ddl selectpicker" name="country" id="country">
									<option value="">Select your country</option>  
								</select>
							</div>
							<div class="col-md-6">
								<label for="pincode">Pincode <span style="color:red">*</span></label>
								<input type="text" maxlength="6" class="form-control numbersOnly" name="pincode" value="" id="pincode">
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class=" control-label">Name of Single Point of Contact (SPoC)<span style="color:red">*</span></label>
								<input type="text" class="form-control alphaOnly" name="spoc_name" value="" id="spoc_name" maxlength="150">
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">E-Mail ID of SPoC<span style="color:red">*</span></label>
                                <input type="text" class="form-control" name="spoc_mail" value="" id="spoc_mail" maxlength="40">
                            </div>
                        </div>
						<div class="row"> 							
							<div class="col-md-6">
								<label for="spoc_mobile">Contact Mobile number of SPoC<span style="color:red">*</span> </label>
								<div class="input-group">
									<span class="input-group-addon" id="Mobileprefix"></span>
									<input type="text" class="form-control input-sm numbersOnly" id="spoc_mobile" name="spoc_mobile" placeholder="" maxlength="20" minlength="" readonly='true' />
									<input type="hidden" name="hdnmobile_prefix" id="hdnmobile_prefix" value="" />
									<input type="hidden" name="hdnOTP" id="hdnOTP" value="" /> 
								</div>
								<span for="iscontactnumbervalid" generated="true"  class="iscontactnumbervalid" id="iscontactnumbervalid"></span>
							</div>
							<div class="col-md-6">
                                <label class="control-label">Total number of Licences required<span style="color:red">*</span></label>
                                <input type="text" class="form-control numbersOnly" name="spoc_licence" maxlength="3" value="" id="spoc_licence">
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
 
                        <div class="form-group inside">
							<div class="row"> 
								<div class="col-md-12">
								<label>Grades<span style="color:red">*</span></label>                          
									<div class="checkbox">									
										<?php foreach($gradelist as $grade) { ?>
										<label>
										<input value="<?php echo $grade['gid']; ?>" id="grade" class="grade" name="grade[]" type="checkbox"><?php echo $grade['gradename']; ?>	
										</label>									
										<?php } ?>
									</div>
								</div>
							</div>
                            
							<div class="row"> 
								<div class="col-md-6">
									<label class="control-label">Plan<span style="color:red">*</span></label>
										<select class="form-control" name="pack" required id="pack">
											<option value="">Select</option>
											<?php foreach($puzzle_pack_details as $pack) { ?>
											<option <?php if($pack['pfid']==$pack_id)
													{ ?>selected="selected"<?php } ?> value="<?php echo $pack['pfid']; ?>"><?php echo $pack['flavour_name']; ?></option>
											<?php  } ?>
										</select>
								</div>
								<!--<div class="col-md-6">
									<label class="control-label">Plan<span style="color:red">*</span></label>
										<select class="form-control" name="pack" required id="pack">
											<option value="">Select</option>
											<?php foreach($puzzle_pack_details as $pack) { ?>
											<option value="<?php echo $pack['pfid']; ?>"><?php echo $pack['flavour_name']; ?></option>
											<?php  } ?>
										</select>
								</div>-->
								<div class="col-md-6">
									<label class="control-label">Coupon Code </label>
									<input type="text" class="form-control" name="couponcode" value="" id="couponcode" maxlength="20">
									<label for="txtCode" generated="true" style="color:red" class="errorCode" id="errCode"></label>
									<div class="input-group-append">
										<input type="button" class="btn btn-success" name="apply" id="apply" value="Apply">
									</div>
								</div>
							</div><br/>
							<div class="row" id="PR_Dtails">							
								<div class="col-md-5">
									<div class="col-md-12">
										<label>Price<span style="font-size:12px;">(inclusive of all taxes)</span></label>
									</div>
									<div class="col-md-12">
										<label style="color:blue;font-size:17px;" for="price" generated="true" name="price" id="price"></label>
										<input style="display:none;" type="text" value="0" id="hdnOPrice">
									</div>
								</div>
								<div class="col-md-4" id="DIS" style="display:none;">
									<div class="col-md-12">
										<label>Discount  </label>
									</div>
									<div class="col-md-12">
										<label style="color:blue;font-size:17px;" for="discount" generated="true" class="discount" id="discount">0</label>
										<input style="display:none;" type="text" value="0" id="hdnDiscPer">
									</div>
								</div>
								<div class="col-md-3"  id="TP" style="display:none;">
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
	$("#spoc_mobile").blur(function(){
		$.ajax({
				 url: "<?php echo base_url(); ?>index.php/home/chk_PB_mobile",
				 type:'POST',
				 data:{spoc_mobile:$("#spoc_mobile").val()},
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
		url: "<?php echo base_url(); ?>index.php/home/coupon_code_apply_Puzzle_Break",
		type:"POST",
		data:{couponcode:$("#couponcode").val()},		 
		success: function (data) 
		{
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

$("#spoc_licence").blur(function(){
	packdetails(pack);
});
	
//packdetails(pack);

$("#pack").change(function()
{ 
	var pack =  $('#pack').val();	
	packdetails(pack);
});
$("#PR_Dtails").hide();
function packdetails(pack)
{
	$("#PR_Dtails").show();
	var spoc_licence =  $('#spoc_licence').val();
		$.ajax({
			type:"POST",
			url:"<?php echo base_url('index.php/home/price_list') ?>",  
			data:{pack:$('#pack').val(),spoc_licence:$('#spoc_licence').val()},
			success:function(data)
			{
				if($.trim(data)!='')
				{
					$("#PR_Dtails").show();
				}
				//alert($.trim(data));
				$("#price").html($.trim(data)).show();
				$("#hdnOPrice").val($.trim(data));				
				$("#totprice").html($.trim(data)-(($.trim(data)*$("#hdnDiscPer").val())/100));
				$("#discount").html($("#hdnDiscPer").val()+ "% - Rs."+(($.trim(data)*$("#hdnDiscPer").val())/100)); 
				
			}
		});
}

 

 $("#frmRegister").validate({
        rules: {
            "schoolname": {required: true,minlength: 3},
            "address": {required: true},
            "spoc_name": {required: true,minlength: 3},
            "spoc_mail": {required: true},
			"spoc_mobile": 
			{
				required: true,
				minlength: function(element)
				{
					 return $("#spoc_mobile").attr('maxlength');
				},
				maxlength: function(element)
				{
					 return $("#spoc_mobile").attr('maxlength');
				}
			},
            "spoc_licence": {required: true,maxlength:3},
			"txtOPassword": {required: true,minlength: 8},
			"txtCPassword": {required: true,equalTo: "#txtOPassword"},
			"pack": {required: true},
			"grade[]": {required: true},
            "couponcode": {required: false},
			"city": {required: true},        
            "state": {required: true},        
            "country": {required: true},        
            "pincode": {required: true,maxlength:6},
			"chkabout": {required: true}
        },
        messages: {
            "schoolname": {required: "Please enter school name"},
            "address": {required: "Please enter address"},
            "spoc_name": {required: "Please enter SPoC name"},
            "spoc_mail": {required: "Please enter email id",email:"Please enter valid email"},
            "spoc_mobile": {required:"Please enter contact number",minlength:"Please enter {0} digit mobile no",maxlength:"Please enter {0} digit mobile no"},
			"spoc_licence": {required: "Please enter no.of licence",maxlength:"Please enter 3 digit licence"},
			"txtOPassword": {required: "Please enter password"},
			"txtCPassword": {required: "Please confirm password",equalTo: "Please enter valid confirm password"},
			"pack": {required: "Please select pack name"},
			"grade[]": {required: "Please select grade name"},
			"couponcode": {required: "Please enter couponcode"},
			"city": {required: "Please enter city"},
			"state": {required: "Please enter state"},
			"country": {required: "Please select country"},
			"pincode": {required: "Please enter pincode",maxlength:"Please enter 6 digit pincode"},
			"chkabout": {required: "Please verify the mobile number"}
	    },
		 errorPlacement: function(error, element) {
			if (element.attr("type") === "radio") {
				error.insertAfter(element.parent().parent());
			}
			else if (element.attr("name") === "chkabout")
			{
				error.insertAfter(element.parent());
			}
			else if (element.attr("type") === "checkbox") {
				error.insertAfter(element.parent().parent().parent());
			}
			else if (element.attr("name") === "spoc_mobile")
			{
				error.insertAfter(element.parent());
			}
			else if (element.attr("name") === "country")
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
				url: "<?php echo base_url(); ?>index.php/home/insert_puzzle_school",
				type:"POST",
				dataType:"json",
				data:formData,
				contentType: false,       
				cache: false,             
				processData:false, 
				success: function (data) 
				{ 
					$('#Loading').hide();				
					if($.trim(data.response)=='1')
						{
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
	
	$("#spoc_mobile").val('');
	$("#hdnmobile_prefix").val('');
	
	$("#Mobileprefix").text('');
	
	$("#spoc_mobile").attr("readonly",false);
	$("#hdnmobile_prefix").val($("#country option:selected" ).attr('data-prefix'));
	
	$("#spoc_mobile").attr('maxlength',$("#country option:selected" ).attr('data-length'));
	$("#spoc_mobile").attr('minlength',$("#country option:selected" ).attr('data-length'));
	$("#Mobileprefix").text($("#country option:selected" ).attr('data-prefix'));
	
});
</script>
<style>
form .dropdown {
     color: #000 !important; 
}
#iscontactnumbervalid { color: red;}
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
	var MobileNo=$("#spoc_mobile").val(); 
	var MobilePrefix=$("#hdnmobile_prefix").val(); 
	var country=$("#country option:selected" ).val();
	var studentname=$("#spoc_name" ).val(); 
	
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