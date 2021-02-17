<div class="right_col" role="main">
<div class="content" id="regpage">
	<div class="col-md-8" style="padding:0px;">
		<div class="card" style="margin:0px;"> 
		  <h4 class="card-category text-center" style="color: green;font-weight: 600;" id="successmsg"></h4>
			<div class="card-body" id="regdiv">
				<div class="registrationarea">
					<div id="mainContDisp" class="container playGames"> 
						<form name="frmchangepwd" id="frmchangepwd"  class="" method="post" enctype="multipart/form-data" accept-charset="utf-8">
							<h4 class="card-category text-center">Change Password</h4>
								
				<div class="row Add_page_border">
					<div id="suucessmsg" style="color: green; font-size:20px; font-weight:600; text-align: center;"></div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row" > 
								<div class="row">
									<div class="col-lg-6 col-md-6">
										<div class="form-group bmd-form-group"  > 
											<label class="bmd-label-floating" >New Password <span style="color:red">*</span></label>
											<input type="password" maxlength="15"  class="form-control"  name="txtpwd" value="" id="txtpwd" />
										</div> 
									</div>
									<div class="col-lg-6 col-md-6">
										<div class="form-group bmd-form-group"  > 
											 <label class="bmd-label-floating">Confirm Password <span style="color:red">*</span></label>
											<input type="password" maxlength="15"  class="form-control" name="txtcpwd" value="" id="txtcpwd" />
										</div> 
									</div>   
								</div> 
							</div>
				</div>
						<div style="text-align:center;clear:both;">
							<div style="padding-bottom:8px;">   
								<label    style="color:red; padding: 20px; font-size: 17px;"  class="error" id="errcommon"></label>
							</div>
								<input type="button" name="btnchgpwd" id="btnchgpwd" style="float:none;" class="btn btn-success" value="Change">
							<input type="reset" id="btnreset" style="float:none;" class="btn btn-warning" value="Reset">
						</div>
						</form>
					</div>
				</div>
			</div>
	
		</div>
	</div>
</div>
</div>
<!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/timepicker/jquery.timepicker.min.css"> -->
<script src = "<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src = "<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script src = "<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>  
<!--<script src="<?php echo base_url(); ?>assets/js/timepicker/jquery.timepicker.min.js"></script>
<script type="text/javascript" src="http://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.js" ></script>-->
<script>
$(document).ready(function(){
	 // $('#timeformatExample1').timepicker({}); 
});  
	 
  $('#txtPassword').bind("cut copy paste",function(e) {
     e.preventDefault();
 });
  $('#txtCPassword').bind("cut copy paste",function(e) {
     e.preventDefault();
 });
  
 $(document).on("click","#btnreset",function() {
	$(".error").html('');
	$("#suucessmsg").html('');
});

  /* $(function() {
   $('#timeformatExample1').timepicker();
 });
 */
//	alert('gu');
$("#frmchangepwd").validate({
        rules: {
            "txtpwd": {required: true,minlength: 8},
			"txtcpwd": {required: true,equalTo: "#txtpwd"} 
        },
        messages: {
            "txtpwd": {required: "Please enter new password",minlength: "Please enter atleast 8 characters"},
			"txtcpwd": {required: "Please enter confirm password",equalTo: "Password does not match"} 
        },
		errorPlacement: function(error, element) { 
			
			if (element.attr("type") === "radio") {
				error.insertAfter(element.parent().parent());
			} 
			else 
			{
				error.insertAfter(element);
			}
		}
				/* highlight: function(input) {
					$(input).addClass('error');
				}  */
    });
	  /* $("#btnRegisterSubmit").click(function(){
		$("#frmbgaddactivity").valid();
    }); */  
	
    $("#btnchgpwd").click(function(){  
		if($("#frmchangepwd").valid())
		 {	 
			 var form = $('#frmchangepwd')[0];
			 var formData = new FormData(form);
			//  alert('success');
			 //$('#iddivLoading').show();
			$.ajax({
					url: "<?php echo base_url(); ?>index.php/home/update_password",
					type:"POST",
					dataType:"json",
					data:formData,
					contentType: false,       
					cache: false,             
					processData:false, 
					success: function (data) 
					{
						// alert('success');
						if($.trim(data.response)=='1')
						{
							$('#btnreset').click();
							$("#suucessmsg").html(data.msg);//$("#suucessmsg").delay(1500).fadeOut("slow");	
						}
						else if($.trim(data.response)=='2')
						{
							$("#errcommon").show().html(data.msg);
						}  
					}
				});
		 }
		 else
		 {
			$("#errEmail").show(); $("#errdate").show();$("#errcode").show();
		 }
	});    
		 
</script>
 
	  <style>
#error { color: red;}
.error { color: red;}
.errcode { color: red;}
.erroremail { color: red;}
#sbmtbtn{padding: 10px 22px;margin: 5px auto;background: #e9e610;}
.dwnbtn{padding: 10px 22px;margin: 5px auto; }
		 
		 
.loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.3);
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 1500ms infinite linear;
  -moz-animation: spinner 1500ms infinite linear;
  -ms-animation: spinner 1500ms infinite linear;
  -o-animation: spinner 1500ms infinite linear;
  animation: spinner 1500ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
  box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */


 input[type="text"] {
  color : #000; 
}
select, option { 
    /* Whatever color  you want */
     color: #000 !important;
}
@media (min-width: 992px)
{
.col-md-8 {
	width:100% !important;
}
}
</style>
 