<div class="right_col1" role="main" >
<div class="content" id="regpage">
	<div class="col-md-8" style="padding:0px;">
		<div class="card" style="margin:0px;"> 
		  <h4 class="card-category text-center" style="color: green;font-weight: 600;" id="successmsg"></h4>
			<div class="card-body" id="regdiv">
				<div class="registrationarea">
					<div id="mainContDisp" class="container playGames"> 
						<form name="frmaddactivity" id="frmaddactivity"  class="" method="post" enctype="multipart/form-data" accept-charset="utf-8">
							<h4 class="card-category text-center">Add Animator Activity</h4>
								
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
								<label class="" for="worktype">Work Type <span style="color:red" class="mstar">*</span></label>
								<select  class="form-control input-sm" name="ddlworktype" id="ddlworktype">
									<option value="">Select Work Type</option> 
									<?php
										foreach($TypeofWork as $row)
										{
											echo "<option value='".$row['id']."'>".$row['type']."</option>";
										}
									?>  
								</select>	 				
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="form-group bmd-form-group"  > 
							<label class="" for="shotname">Shot Name <span style="color:red" class="mstar">*</span></label>
							<input type="text"  class="form-control shotname" required name="txtshotname" value=""  id="txtshotname"  > 
							<!--<label for="txtshotname" generated="true" class="error"></label>-->
							</div> 
						</div>  
						<div class="col-lg-4 col-md-4">
							<div class="form-group bmd-form-group"  > 
							<label class="" for="numcharacters">No. of Characters <span style="color:red" class="mstar">*</span></label>
							<input type="text"  class="form-control numbersOnly numcharacters " name="txtnumcharacters" value=""  id="txtnumcharacters"> 
							</div> 
						</div> 
						
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4">
							<div class="form-group bmd-form-group"  > 
							<label class="" for="assignedframes">Assigned Frames <span style="color:red" class="mstar">*</span></label>
							<input type="text"   class="form-control numbersOnly" name="txtassignedframes" value="" id="txtassignedframes">
							<label for="txtassignedframes" generated="true"  class="errcode" id="errcode"></label>
							</div> 
						</div>
						<div class="col-lg-4 col-md-4" style="display:none;">
							<div class="form-group bmd-form-group"  > 
								<label class="" for="assignedduration">Assigned Duration</label>
								<!--<input type="text" class="form-control assignedduration" name="assignedduration" value="" id="assignedduration">--><label for="txtEmail" generated="true"  class="erroremail" id="errEmail"></label>							
							</div> 
						</div> 
						<div class="col-lg-4 col-md-4">
							<div class="form-group bmd-form-group"  > 
								<label class="" for="rdheedioslapstick">Heedio / Slapstick <span style="color:red" class="mstar">*</span></label>
								<div class="form-group"> 
								   <div class="col-sm-3"><label class="radio-inline"><input type="radio" class=""  name="rdheedioslapstick" value="Heedio" id="rdheedio">Heedio</label></div>
									<div class="col-sm-3"><label class="radio-inline"><input type="radio" class=""  name="rdheedioslapstick" value="Slapstick" id="rdslapstick">Slapstick</label></div>
									<div class="col-sm-3" style="display:none;"><label class="radio-inline"><input type="radio" class=""  name="rdheedioslapstick" value="none" id="rdnone">none</label></div>
								</div>						
							</div> 
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="form-group bmd-form-group"  > 
								<label class="" for="actiontype">Action Type <span style="color:red" class="mstar">*</span></label>
								<select  class="form-control input-sm" name="ddlactiontype" id="ddlactiontype">
								<option value="">Select Action Type</option> 
								<?php foreach($actiontype as $row) {
									echo "<option id='".$row['at_name']."' value='".$row['atid']."'>".$row['at_name']."</option>";
								} ?>  
								</select>	 				
							</div>
						</div>
					</div>
						<div class="row">
						<div class="col-lg-4 col-md-4">
						<div class="form-group bmd-form-group"  > 
							<label class="" for="ddlcharacter1">Character 1 <!--<span style="color:red" class="mstar">*</span>--></label>
							<select  class="form-control input-sm" name="ddlcharacter1" id="ddlcharacter1">
								<option value="">Select</option>  
								<?php foreach($characters as $char1) {
								echo "<option id='".$char1['ch_name']."' value='".$char1['chid']."'>".$char1['ch_name']."</option>";
							} ?> 
							</select>						
						</div> 
						</div>  
					<div class="col-lg-4 col-md-4">
						<div class="form-group bmd-form-group"  > 
							<label class="" for="ddlcharacter2">Character 2 <!--<span style="color:red" class="mstar">*</span>--></label>
							<select  class="form-control input-sm" name="ddlcharacter2" id="ddlcharacter2">
								<option value="">Select</option> 
								 <?php foreach($characters as $char2) {
								echo "<option id='".$char2['ch_name']."' value='".$char2['chid']."'>".$char2['ch_name']."</option>";
							} ?> 
							</select>						
						</div> 
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="form-group bmd-form-group"  > 
							<label class="" for="ddlcharacter3">Character 3 <!--<span style="color:red" class="mstar">*</span>--></label>
							<select  class="form-control input-sm" name="ddlcharacter3" id="ddlcharacter3">
								<option value="">Select</option> 
								<?php foreach($characters as $char3) {
								echo "<option id='".$char3['ch_name']."' value='".$char3['chid']."'>".$char3['ch_name']."</option>";
							} ?> 
							</select>						
						</div> 
					</div>
					</div>
					<div class="row">
					<div class="col-lg-4 col-md-4">
						<div class="form-group bmd-form-group"  > 
							<label class="" for="ddlcharacter4">Character 4 <!--<span style="color:red" class="mstar">*</span>--></label>
							<select  class="form-control input-sm" name="ddlcharacter4" id="ddlcharacter4">
								<option value="">Select</option> 
								<?php foreach($characters as $char4) {
								echo "<option id='".$char4['ch_name']."' value='".$char4['chid']."'>".$char4['ch_name']."</option>";
							} ?> 
							</select>						
						</div> 
					</div> 
					<div class="col-lg-4 col-md-4">
						<div class="form-group bmd-form-group"  > 
							<label class="" for="character5">Character 5 <!--<span style="color:red" class="mstar">*</span>--></label>
							<select  class="form-control input-sm" name="ddlcharacter5" id="ddlcharacter5">
								<option value="">Select</option> 
								<?php foreach($characters as $char5) {
								echo "<option id='".$char5['ch_name']."' value='".$char5['chid']."'>".$char5['ch_name']."</option>";
							} ?> 
							</select>						
						</div> 

					</div>
					<div class="col-lg-4 col-md-4">
					<div class="form-group bmd-form-group"  > 
						<label class="" for="rdlibraryavailable">Library Avilable <span style="color:red" class="mstar">*</span></label>
						<div class="form-group"> 
						   <div class="col-sm-3"><label class="radio-inline"><input type="radio" class="rdlibraryavailable"  name="rdlibraryavailable" value="Yes" id="rdY">Yes</label></div>
							<div class="col-sm-3"><label class="radio-inline"><input type="radio" class="rdlibraryavailable"  name="rdlibraryavailable" value="No" id="rdN">No</label></div>
							<div class="col-sm-3" style="display:none;"><label class="radio-inline"><input type="radio" class="rdlibraryavailable"  name="rdlibraryavailable" value="none" id="rdlibnone">None</label></div>
						</div>	<!--<label    style="color:red"  class="error" id="errcommon"></label>-->					
					</div>
					</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4" style="display:none;">
							<div class="form-group bmd-form-group"  > 
								<label class="" for="autocomplexity">Auto Complexity</label>
								<!--<input type="text" class="form-control assignedduration" name="assignedduration" value="" id="assignedduration">--> 						
							</div> 
						</div> 
						<div class="col-lg-4 col-md-4">
							<div class="form-group bmd-form-group"  >  
								<label class="" for="rdmanualcomplexity">Manual Complexity <span style="color:red" class="mstar">*</span></label>
							<div class="form-group"> 
							   <div class="col-sm-3"><label class="radio-inline"><input type="radio" class=""  name="rdmanualcomplexity" value="Simple" id="rdSimple">Simple</label></div>
								<div class="col-sm-3"><label class="radio-inline"><input type="radio" class=""  name="rdmanualcomplexity" value="Complex" id="rdComplex">Complex</label></div>
								<div class="col-sm-3" style="display:none;"><label class="radio-inline"><input type="radio" class=""  name="rdmanualcomplexity" value="Complex" id="rdcomplexnone">None</label></div>
							</div>							
							</div> 
						</div>
						<div class="col-lg-4 col-md-4" id="CITime" style="display:none;">
							<div class="form-group bmd-form-group"  >  
								<label class="" for="rdmanualcomplexity"> Number of correction <span style="color:red" class="mstar">*</span></label>
								<!--<input type="text"   class="form-control numbersOnly" name="txtCIterationTime" value="" id="txtCIterationTime">-->
								<select  class="form-control input-sm" name="txtCIterationTime" id="txtCIterationTime"> 
									<option value="">Select</option> 
									<option value="1">1st correction</option> 
									<option value="2">2nd correction</option> 
									<option value="3">3rd correction</option> 
									<option value="4">4th correction</option> 
									<option value="5">5th correction</option>
								</select> 
							</div> 
						</div>
						<!--<div class="col-lg-4 col-md-4">
							<div class="form-group bmd-form-group"  >  
								<label class="" for="rdmanualcomplexity">Sub Task <span style="color:red" class="mstar">*</span></label>
								 <select  class="form-control input-sm" name="ddlsubtask" id="ddlsubtask">
									<option value="">Select</option> 
									<option value="New shot">New shot</option> 
									<option value="Correction">Correction</option> 
									<option value="Background">Background</option> 
									
								</select>							
							</div> 
						</div>-->
						<div class="col-lg-4 col-md-4" style="display:none;">
							<div class="form-group">
								<label for="expectedproductivity">Expected Productivity </label>
							</div>
						</div>
					</div>
					<div class="row">	
						<div class="col-lg-4 col-md-4">
							<div class="form-group">
								<label for="completedframes">Completed Frames <!--<span style="color:red" class="mstar">*</span>--></label>
								<input type="text"   class="form-control numbersOnly"   name="txtcompletedframes" value="" id="txtcompletedframes">
							</div>
						</div>  			
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
        rules: {
            "starttime": {required: true},
			/* "endtime": {required: true}, */
			"txtshotname": {required: true},
			"txtnumcharacters": {required: true},
            "txtassignedframes": {required: true},
			"rdheedioslapstick": {required: true},
			"ddlactiontype": {required: true},
			/* "ddlcharacter1": {required: true},
			"ddlcharacter2": {required: true},
			"ddlcharacter3": {required: true},
			"ddlcharacter4": {required: true},
			"ddlcharacter5": {required: true}, */
            "rdlibraryavailable": {required: true},
			"rdmanualcomplexity": {required: true},
			"ddlsubtask": {required: true},
			"ddlworktype": {required: true},
			"txtCIterationTime":
			{
                required:function(element)
				{
                    if($("#ddlworktype").val()==2)
					{
                        return true;
                    } 
                }
            }
			/* "txtcompletedframes": {required: true},
			"txtremark": {required: true} */
		
        },
        messages: {
            "starttime": {required: "Please enter start time"},
			/* "endtime": {required: "Please enter end time"}, */
			"txtshotname": {required: "Please enter shot name"},
			"txtnumcharacters": {required: "Please enter number of characters"},
			"txtassignedframes": {required:"Please enter assigned frames"},
			"rdheedioslapstick": {required:"Please select any one"},
			"ddlactiontype": {required:"Please select action type"},
			/* "ddlcharacter1": {required:"Please select character 1"},
			"ddlcharacter2": {required:"Please select character 2"},
			"ddlcharacter3": {required:"Please select character 3"},
			"ddlcharacter4": {required:"Please select character 4"},
			"ddlcharacter5": {required:"Please select character 5"}, */
			"rdlibraryavailable": {required:"Please select library available"},
			"rdmanualcomplexity": {required: "Please select manual complexity"},
			"ddlsubtask": {required: "Please select sub task"},
			"ddlworktype": {required: "Please select work type"},
			"txtCIterationTime": {required: "Please select correction  iteration time"}
		/* 	"txtcompletedframes": {required: "Please enter completed frames"},
			"txtremark": {required: "Please enter remark"} */
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
		$("#frmaddactivity").valid();
    }); */
	
	$("#btnRegisterSubmit").click(function()
	{
		/* var strStartTime = document.getElementById("starttime").value;
		var strEndTime = document.getElementById("endtime").value;
		var isendtime=1;
		
		if(strStartTime!='' && strEndTime!='')
		{
			var startTime = new Date().setHours(GetHours(strStartTime), GetMinutes(strStartTime), 0);
			var endTime = new Date(startTime)
			endTime = endTime.setHours(GetHours(strEndTime), GetMinutes(strEndTime), 0);		
			if (startTime > endTime)
			{
				isendtime=0;				
			}
			else
			{
				isendtime=1;			
			}
		}
		else
		{
			isendtime=1;
		}
		if(isendtime==0)
		{
			$("#errdate").html("<span style='color:red;'>End time should be greater than start time</span>");
		}
		else
		{ */
			if($("#frmaddactivity").valid())
			{
				 var form = $('#frmaddactivity')[0];
				 var formData = new FormData(form);
				//alert('success');
				//$('#iddivLoading').show();
				$.ajax({
						url: "<?php echo base_url(); ?>index.php/home/insert_activity",
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
							else
							{
								//$("#errcommon").show().html(data.msg);
								$("#errdate").html(data.msg);
							}  
						}
					});
			}
			else
			{
				$("#errEmail").show(); $("#errdate").show();$("#errcode").show();
			}
		/* } */
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
	
	$("#ddlworktype").change(function(){
		var worktype=$("#ddlworktype option:selected").val();
		if(worktype==1)
		{ 
			//$("#txtshotname").val().attr("disabled",false);
			$("#txtnumcharacters").val('').attr("disabled",false);
			$("#txtassignedframes").val('').attr("disabled",false);
			
			$("#rdnone").attr("checked",false);
			$("#rdheedio").attr("disabled",false);
			$("#rdslapstick").attr("disabled",false);
			
			$("#ddlactiontype").val('').attr("checked",false).attr("disabled",false);
			
			$("#rdlibnone").attr("checked",false);	 
			$("#rdY").attr("disabled",false);
			$("#rdN").attr("disabled",false);
			
			$("#rdcomplexnone").attr("checked",false);
			$("#rdSimple").attr("disabled",false);
			$("#rdComplex").attr("disabled",false);
			
			$("#txtcompletedframes").val('').attr("disabled",false);
			
			
			$("#ddlcharacter1").attr("disabled",false);
			$("#ddlcharacter2").attr("disabled",false);
			$("#ddlcharacter3").attr("disabled",false);
			$("#ddlcharacter4").attr("disabled",false);
			$("#ddlcharacter5").attr("disabled",false);
		}
		else
		{
			//$("#txtshotname").val('0').attr("disabled","disabled");
			$("#txtnumcharacters").val('0').attr("disabled","disabled");
			$("#txtassignedframes").val('0').attr("disabled","disabled");
			
			$("#rdnone").attr("checked",true);
			$("#rdheedio").attr("disabled",true).attr("checked",false);
			$("#rdslapstick").attr("disabled",true).attr("checked",false);
			
			$("#ddlactiontype").val(201).attr("checked",true).attr("disabled","disabled");
			
			$("#rdlibnone").attr("checked",true);	 
			$("#rdY").attr("disabled",true).attr("checked",false);
			$("#rdN").attr("disabled",true).attr("checked",false);
			
			$("#rdcomplexnone").attr("checked",true);
			$("#rdSimple").attr("disabled",true).attr("checked",false);
			$("#rdComplex").attr("disabled",true).attr("checked",false);
			
			$("#txtcompletedframes").val('0').attr("disabled",true);
			$("#ddlcharacter1").attr("disabled",true);
			$("#ddlcharacter2").attr("disabled",true);
			$("#ddlcharacter3").attr("disabled",true);
			$("#ddlcharacter4").attr("disabled",true);
			$("#ddlcharacter5").attr("disabled",true);
			 
		}
		
		if(worktype==2)
		{
			$("#CITime").show();
		}
		else
		{
			$("#CITime").hide();
		}
	});
	
});
</script>