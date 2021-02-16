
<div class="daily_puzzles"> 
 <div id="mainContDisp" class="playGames homePlayGames"  >
 <div class="">	 
	<div class="clsicon col-md-12 col-sm-12 col-xs-12 " style="text-align: center;font-size: 24px;font-weight: bold;"><h2>Child List</h2></div>
	<div class="clsicon col-md-12 col-sm-12 col-xs-12 " id="addteachersView"  style="text-align: right;font-size: 24px;font-weight: bold;">
		<h3><a href="<?php echo base_url(); ?>index.php/trial/sk_form"><i class="fa fa-address-book" aria-hidden="true"></i> Add Child </a></h3>
	</div>
</div> 
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12"> 
		<div class="x_panel tile">
			<table id="assementTable" class="assementTable table table-striped table-bordered table-hover table-condensed display no wrap">
				<thead style="background-color: #1abb9c; color: #fff;">
					<tr class="table-info">
						<th>S.No.</th> 
						<th>Name</th>  
						<th>Username</th>  
						<th>Password</th>  
						<th>Program</th>  
						<th>Plan</th>  
						<th>Grade</th>  
						<th>Created Date</th>  
					</tr> 
				</thead> 
				<tfoot>
					<tr>
						<th></th> 
						<th></th>  
						<th></th> 
						<th></th> 
						<th></th> 
						<th></th> 
						<th></th>  
						<th></th>  
					</tr>   
				</tfoot>
				<tbody>
					 <tr>
						<td>1</td> 
						<td>Child 1</td>  
						<td>1.sk</td>  
						<td>12345678</td>  
						<td>SkillAngels</td>   
						<td>FAST TRACK</td>   
						<td>Grade III</td>   
						<td><?php echo date('d-M-Y'); ?></td>  
					</tr> 
					<tr>
						<td>2</td> 
						<td>Child 2</td>  
						<td>2.sk</td>  
						<td>12345678</td>  
						<td>KinderAngels</td> 
						<td>COVID 19 PACK</td> 
						<td>Grade UKG</td> 
						<td><?php echo date('d-M-Y'); ?></td>  
					</tr> 					
				</tbody>
            </table>
		</div>
	</div>
</div>	
</div>	
</div>   
 
<link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/dataTables.tableTools.css" rel="stylesheet" type="text/css"> 
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.tableTools.js" type="text/javascript"></script> 
<script> 
 $(document).ready(function() {
  $('#assementTable').DataTable( {
	"lengthMenu": [[10,  -1], [10,  "All"]],  
   initComplete: function ()
   {
		this.api().columns([1,2,4,5,6]).every( function () {
		var column = this; //console.log(column);
		var select = $('<select><option value="">Show All</option></select>')
		.appendTo( $(column.footer()).empty() )
		.on( 'change', function () {
		var val = $.fn.dataTable.util.escapeRegex(
		$(this).val()
		);

		column
		.search( val ? '^'+val+'$' : '', true, false )
		.draw();
		} );

		column.data().unique().sort().each( function ( d, j ) {
		select.append( '<option value="'+d+'">'+d+'</option>' )
		} );
		});
   }
   
  });
 });
</script>
<style>
#assementTable_wrapper #assementTable_wrapper #assementTable_length{display:none;}
#assementTable_wrapper #assementTable_wrapper #assementTable_filter{display:none;}
#assementTable_wrapper #assementTable_wrapper #assementTable_info{display:none;}
#assementTable_wrapper #assementTable_wrapper #assementTable_paginate{display:none;} 
 
.totreg{
	font-size:18px;
	color:#000;
}
button, select{
	color:#000;
}
th { font-size: 15px; }
td { font-size: 15px; }
.clssclname {
	margin:15px;
    font-weight: 700;
    font-size: 20px; 
    margin-left: 350px;
	text-align:center;
} 
label{
	font-size:16px !important;
}
.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate { 
    font-size: 16px !important;
}
#assementTable tfoot{display: table-header-group;background: #3a3431;}
#assementTable thead{background-color: #795548 !important;}
table.dataTable.display tbody tr.odd{background-color: #5d241014 !important;}
</style> 
 <div id="TeachersAdd" class="menusidenav" style="z-index: 99999;">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav5()">&times;</a> 	

	<div class="daily_puzzles">
		<?php	$cur_date=date("Y-m-d");
		if($cur_date<=$this->session->enddate)
		{ ?>
		<div id="mainContDisp" class="container playGames homePlayGames" style="margin-top:20px;margin-bottom:70px;"> 
		<div id="succesemail"></div> 
			<?php if($this->session->availablelicense >0)
			{ ?>
			<h2 class="text-center ">Add Teacher</h2>
			<div id="teachersuucessmsg" style="color: green; font-size:20px; font-weight:600; text-align: center;"></div> 
			<div id="errmsg" style="color: red; font-size:25px; font-weight:600; text-align: center;padding:20px"></div>

			<form name="frmAddteacher" id="frmAddteacher" class="" method="post" enctype="multipart/form-data" >

				<div class="row">
					<div class="col-lg-12">
						<div  style="padding-top:5px;">
							<h3 class="clsfillcontent">Please fill the below details</h3><span ><label class="clsrequiredfield"><span style="color:red" class="mf" >*</span> Required Fields
							</label></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label for="txtFName">First Name <span style="color:red" class="mf" >*</span></label>
							<input type="text" maxlength="40" class="form-control alphaOnly" name="txtFName" value=""  id="txtFName">
						</div> 
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="txtLName">Last Name  </label>
							<input type="text"  class="form-control" name="txtLName" value="" id="txtLName">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6"> 
						<div class="form-group">
							<label for="txtEmail">Email </label>
							<input type="text" maxlength="100" class="form-control" name="txtEmail" value="" id="txtEmail"> 
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="txtMobile">Mobile Number </label>
							<input placeholder="" type="text" class="form-control numbersOnly" maxlength="15" name="txtMobile" value="" id="txtMobile">
						<!--<label for="txtEmail" generated="true"  class="erroremail" id="errEmail"></label>-->
						</div>
					</div>
				</div> 
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
						<label for="txtusername">Username <span style="color:red" class="mf" >*</span></label>
						<input type="text"  class="form-control"  name="txtusername" value="" id="txtusername">
						<label for="erruname" generated="true"  style="color:red" class="errorusername" id="erruname"></label>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="txtOPassword">Password <span style="color:red" class="mf" >*</span></label>
							<input type="password"  class="form-control" maxlength="20" name="txtOPassword" value="" id="txtOPassword">
						</div>			
					</div> 
				</div>

				<div class="row">
					<div style="text-align:center;clear:both;"> 
						<div style="padding-bottom:5px;">   
							<label  style="color:red;font-size:17px;"  class="error" id="errcommon"></label>
						</div>
							<!--<div style="padding-bottom:10px;font-size: 16px;font-weight: normal;">   
							<label class="bmd-label-floating" style="display: block;" id=""><input type="checkbox" class="" name="chktac" value="" id="chktac"> I/We have read, understood and accept the  <a style="color: maroon;" href="<?php echo base_url();?>index.php/sa/termsofservice" target="_blank">Terms &amp; Conditions</a></label>
							</div>-->
							<input type="button" id="btnaddteacher"   class="btn btn-success" value="Add">
							<input type="reset" id="btnResettxt"   class="btn btn-success" value="Reset"> 
					</div>
				</div> 
			</form>
		</div>
		<?php } 
		else { ?>
		<div id="errmsg" style="color: red; font-size:20px; font-weight:600; text-align: center;">No available license</div>
		<?php } ?>
	</div>  

<?php } elseif($cur_date>$this->session->enddate) { ?>


	<div class="daily_puzzles"> 
		<div class="container">
			<div class="row"> 
				<span id="errmsg" style="color:red;text-shadow: none;font-size:35px; margin-left: 482px; margin-right: 482px;font-weight:700;" >Plan Expired</span>

			</div> 
		</div>  
	</div>   
<?php } ?>	
</div>
 
<script>
$(document).ready(function () { 
	$("#btnResettxt").click(function()
	{	 
		$(".error").text("");
		$("#erruname").text("");
		$("#teachersuucessmsg").html(""); 
	});
	
	var isusernameavail=0;
	$("#txtusername").change(function()
	{
		if($("#txtusername").val()!='')
		{
			$.ajax({
				//url: "ajax_data.php", 
				url: "<?php echo base_url(); ?>index.php/sa/checkusernameexist", 
				type:'POST',
				data:{txtusername:$("#txtusername").val()},
				success: function(result)
				{
					if($.trim(result)>0)
					{
						isusernameavail=0;$("#erruname").html("This username is already registered").show();
					}
					else
					{
						isusernameavail=1;$("#erruname").html("").show();
					}
				}
			}); 
		}
	});
	
	
	$("#btnaddteacher").click(function()
	{ 
		if($("#frmAddteacher").valid() && isusernameavail==1)
		{	
			$("#loadinimage").show();
			var formData = new FormData($("#frmAddteacher")[0]);
			$.ajax({
				//url: "ajax_data.php",
				url: "<?php echo base_url(); ?>index.php/sa/insertteacher",
				type: 'POST',
				dataType:"json",
				data: formData,
				contentType: false,       
				cache: false,             
				processData:false,
				success: function (data) 
				{
					/* console.log(data);
					return false; */
					if($.trim(data.status)=='success')
					{						 
						$("#teachersuucessmsg").html("Teacher added successfully").show().delay(3000).fadeOut("slow");
						$("#frmAddteacher")[0].reset();  						 
					}
					else
					{
						 $("#errmsg").html("No available license").show();$("#mainContDisp").hide();
					}  
				$("#loadinimage").hide();
				} 
			}); 
			return false; 
		}
		$("#errEmail").show();
	});
	  
$('.numbersOnly').keyup(function () { 
this.value = this.value.replace(/[^0-9]/g,'');
});
$('.alphaOnly').keyup(function () { 
this.value = this.value.replace(/[^a-zA-Z ]/g,'');
});

$.validator.addMethod('filesize', function(value, element, param) {
    return this.optional(element) || (element.files[0].size <= param) 
});

 $('#txtPassword').bind("cut copy paste",function(e) {
     e.preventDefault();
 });
  $('#txtCPassword').bind("cut copy paste",function(e) {
     e.preventDefault();
 }); $('#txtEmail').bind("cut copy paste",function(e) {
     e.preventDefault();
 });
  $('#txtCEmail').bind("cut copy paste",function(e) {
     e.preventDefault();
 });
	 
		$("#frmAddteacher").validate({
		rules: 
		{
			"txtFName": {required: true,minlength: 3},  	
			"txtOPassword": {required: true,minlength: 8},
			"txtusername": {required: true},  
			"txtSchool": {required: true} 
			
		},
		messages: 
		{
			"txtFName": {required: "Please enter first name",minlength:"Please enter at least 3 characters"},  
			"txtOPassword": {required: "Please enter password",minlength:"Please enter at least 8 characters"}, 
			"txtusername": {required: "Please enter username"},   
			"txtSchool": {required: "Please enter your school name"} 
		},
		errorPlacement: function(error, element) 
		{
			if (element.attr("type") === "radio")
			{
				error.insertAfter(element.parent().parent().parent());
			}
			else if (element.attr("type") === "checkbox")
			{
				error.insertAfter(element.parent());
			}
			else if (element.attr("name") === "txtMobile")
			{
				error.insertAfter(element);
			}
			else
			{
				error.insertAfter(element);
			}
		},
		highlight: function(input) {
		$(input).addClass('error');
		} 
	});
	
	$("#frmotp").validate({
	rules:
	{
		"txtOTP": {required: true}
	},
	messages:
	{
		"txtOTP": {required: "Please enter OTP"}
	},
	errorPlacement: function(error, element)
	{
		if (element.attr("type") === "radio") {
			error.insertAfter('div.er');
		} 
		else if (element.attr("type") === "checkbox") {
			error.insertAfter(element.parent().parent());
		} 
		else {
			error.insertAfter(element);
		}
	},
	highlight: function(input)
	{
		$(input).addClass('error');
	} 
	});
		 
}); 
</script>
<style> 
label{font-size: 14px;}
.OTPError{font-size: 16px;color: #b51908;font-weight:bold;}
 label.error{color: #b51908;font-size: 14px;}
 
.erroremail {
    color: #b51908 !important;
    font-size: 14px;
}
 #mainContDisp{
	border: 1px solid #eeeeee;
    background: #fafafa;
    box-shadow: 10px 10px 5px #888888;
    padding: 25px;
 }
 .nav {
    position: relative;
 }
 .container .form-group label{color:#000;font-weight: 600;margin-bottom:0px;}
 .container .form-group label.error{color:#b51908;font-size:14px;}
 .container .form-group input{ border: 1px solid #337ab7;margin-bottom: 0px;}
 .container .form-group select{ border: 1px solid #337ab7;margin-bottom: 0px;}
 .form-control[readonly] {
		cursor:auto;
	  background-color:#f8f8f8
} .form-control[readonly]:focus {
      -webkit-box-shadow: none;  
      box-shadow: none;  
	  background-color:#f8f8f8
}
.form-group {margin-bottom: 0px;}
form .col-lg-6{min-height: 84px;}
textarea{margin-bottom:0}
.container .form-group label{font-weight:normal !important;}
 </style>