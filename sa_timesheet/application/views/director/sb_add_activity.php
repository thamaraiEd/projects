<div class="right_col1" role="main" >
<div class="content" id="regpage">
	<div class="col-md-8" style="padding:0px;">
		<div class="card" style="margin:0px;"> 
		  <h4 class="card-category text-center" style="color: green;font-weight: 600;" id="successmsg"></h4>
			<div class="card-body" id="regdiv">
				<div class="registrationarea">
					<div id="mainContDisp" class="container playGames"> 
						<form name="frmaddactivity" id="frmaddactivity"  class="" method="post" enctype="multipart/form-data" accept-charset="utf-8">
							<h4 class="card-category text-center">Add Activity</h4> 
							<div class="row Add_page_border">
									<div id="suucessmsg" style="color: green; font-size:20px; font-weight:600; text-align: center;"></div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row" >
									<div class="row">
										<div class="col-lg-4 col-md-4">
											<div class="form-group bmd-form-group"  > 
											<label class="" for="date">Date <span style="color:red" class="mstar">*</span></label>
											<input type="text"  name="txtcurdate"   id="txtcurdate" class="form-control col-lg-4 col-md-4 col-sm-3 col-xs-12" value="<?php echo date('d-m-Y'); ?>"  readonly />

											</div> 
										</div>
										<div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
											<div class="form-group bmd-form-group"  > 
											<label class="" for="date">Start Time <span style="color:red" class="mstar">*</span></label> 
											<fieldset>
											<div class="control-group">
											<div class="controls"> 
											<!-- <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>-->
											<input type="text"  name="starttime"   id="starttime" class="form-control col-lg-4 col-md-4 col-sm-3 col-xs-12 timepicker" value="" />
											<label for="startdate" generated="true"  class="errcode" id="errcode"></label> 
											</div>
											</div>
											</fieldset> 
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
											<div class="form-group bmd-form-group"  > 
											<label class="" for="date">End Time <!--<span style="color:red" class="mstar">*</span>--></label>
											<fieldset>
											<div class="control-group">
											<div class="controls"> 
											<!-- <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span> -->
											<input type="text"  name="endtime"   id="endtime" class="form-control col-lg-4 col-md-4 col-sm-3 col-xs-12 timepicker" value="" />
											<label for="enddate" generated="true"  class="errdate" id="errdate"></label> 
											</div>
											</div>
											</fieldset> 
											</div> 
										</div>  
									</div>
									<div class="row">
										 
										<div class="col-lg-4 col-md-4">
											<div class="form-group bmd-form-group"  > 
											<label class="" for="shotname">Project Name <span style="color:red" class="mstar">*</span></label>
											<input type="text"  class="form-control shotname" required name="txtprojectname" value=""  id="txtprojectname"  > 
											<!--<label for="txtshotname" generated="true" class="error"></label>-->
											</div> 
										</div> 
										<div class="col-lg-4 col-md-4">
											<div class="form-group bmd-form-group"  > 
											<label class="" for="shotname">Task Name <span style="color:red" class="mstar">*</span></label>
											<input type="text"  class="form-control shotname" required name="txttaskname" value=""  id="txttaskname"  > 
											<!--<label for="txtshotname" generated="true" class="error"></label>-->
											</div> 
										</div>  
										<div class="col-lg-4 col-md-4">
											<div class="form-group bmd-form-group"  > 
											<label class="" for="shotname">Task Duration <span style="color:red" class="mstar">*</span></label>
											<input type="text"  class="form-control shotname numbersOnly" required name="txttaskduration" value=""  id="txttaskduration"  > 
											<!--<label for="txtshotname" generated="true" class="error"></label>-->
											</div> 
										</div>  
									</div> 
									<div class="row">
										<div class="col-lg-4 col-md-4">
											<div class="form-group">
												<label for="remark">Remarks <!--<span style="color:red" class="mstar">*</span>--></label>
												<textarea  class="form-control" name="txtremark" value="" id="txtremark"></textarea>
											</div>
										</div> 
									</div>
								</div>
							</div>
							<div style="text-align:center;clear:both;">
								<div style="padding-bottom:5px;">   
									<label    style="color:red"  class="error" id="errcommon"></label>
								</div>
									<input type="button" name="btnRegisterSubmit" id="btnRegisterSubmit" style="float:none;" class="btn btn-success" value="Submit">
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

	$('.alphaOnly').keyup(function () { 
    this.value = this.value.replace(/[^a-zA-Z ]/g,'');
});
$('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
});
  
 $(document).on("click","#btnreset",function() {
	$(".error").html('');
	$("#suucessmsg").html('');
});

  /* $(function() {
   $('#timeformatExample1').timepicker();
 });
 */


$("#frmaddactivity").validate({
        rules:
		{
            "starttime": {required: true}, 
			"txtprojectname": {required: true},
			"txttaskname": {required: true},
			"txttaskduration": {required: true}
        },
        messages:
		{
            "starttime": {required: "Please enter start time"}, 
			"txtprojectname": {required: "Please enter project name"},
			"txttaskname": {required: "Please enter task name"},
			"txttaskduration": {required: "Please enter task duration"} 
        },
		errorPlacement: function(error, element)
		{ 
			
			if (element.attr("type") === "radio")
			{
				error.insertAfter(element.parent().parent());
			} 
			else 
			{
				error.insertAfter(element);
			}
		}
				 
    });
	 
	
	$("#btnRegisterSubmit").click(function()
	{  
		if($("#frmaddactivity").valid())
		{
			 var form = $('#frmaddactivity')[0];
			 var formData = new FormData(form); 
			$.ajax({
					url: "<?php echo base_url(); ?>index.php/director/insert_activity",
					type:"POST",
					dataType:"json",
					data:formData,
					contentType: false,       
					cache: false,             
					processData:false, 
					success: function (data) 
					{ 
						if($.trim(data.response)=='1')
						{
							$('#btnreset').click();
							$("#suucessmsg").html(data.msg);
						}
						else
						{ 
							$("#errdate").html(data.msg);
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


input[type="text"]
{
  color : #000; 
}
select, option
{ 
    /* Whatever color  you want */
     color: #000 !important;
}
@media (min-width: 992px)
{
	.col-md-8
	{
		width:100% !important;
	}
}
.mstar{font-size:26px;line-height: 0;}
.right_col1
{
	background: #fff;
	padding: 10px 20px;
	margin-left: 70px;
	z-index: 2;
	overflow:hidden;
}
.nav_menu{margin:0px !important;}
</style>
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/picker/timePicker.css">
<script src = "<?php echo base_url(); ?>assets/css/picker/jquery-timepicker.js"></script>
<script type="text/javascript">
$(document).ready(function() { 
	  var today = new Date(); 
	$("#txtcurdate" ).datepicker({ minDate: -1,endDate: "today",maxDate: today,dateFormat: 'dd-mm-yy'});

	$(".timepicker").hunterTimePicker({
	callback: function(e){
	//alert(e.val());
	}
	}); 
});
</script>