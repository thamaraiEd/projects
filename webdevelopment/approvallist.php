<div class="right_col" role="main"> 	
	<div class="">
		<div id="Succ_msg"></div>
	</div>
	<div id="collapse4" class="body">
	<div style="display:none;text-align:center;" id="iddivLoading" class="loading">Loading&#8230;</div>
	<h4 class="reporttitle">Approval List </h4>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		 
		<div class="x_panel tile">
			<table id="dataTable" class="assementTable table table-striped table-bordered table-hover table-condensed ">
				<thead style="background-color: #1abb9c; color: #fff;">
					<tr class="table-info">
						<th>S.No.</th>
						<th>Name</th> 
						<th>Action</th>
						<th>Date</th>
						<th>Start Time</th>
						<th>End Time</th>
						<th>Business Unit</th>
						<th>Project Name</th> 						
						<th>Work Type</th> 						
						<th>Work Status</th> 						
						<th>Work Platform</th> 						
						<th>Work Hours</th> 						
						<th>Task Name</th>  
						<!--<th>Task Duration</th>-->  
						<th>Remark</th> 
						<th>Lead</th>  
						<th>Lead Remarks</th> 
						<th>Super Lead</th>    
						<th>Super Lead Comments</th> 
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
						<th></th>
						<th></th>
						<!--<th></th>-->
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
					<?php $i=1;
					foreach($reviewerlist as $row)
					{
						$diff='';
						
						$start_time=$row['start_time'];
						$end_time=$row['end_time'];					
						
						$startTime = new DateTime($start_time);
						$endTime = new DateTime($end_time);
						$duration = $startTime->diff($endTime);
						$workhour=  $duration->format("%H:%I");
						?>
						<tr> 
							<td><?php echo $i; ?></td> 
							<td><?php echo $row['user_name']; ?></td>   
							<td>								
								<input type="button"  data-remarks="<?php echo $row["remarks"]; ?>" data-taskname="<?php echo $row["task_name"]; ?>" data-taskduration="<?php echo $row["task_duration"]; ?>" data-projectname="<?php echo $row["project_name"]; ?>" data-logdate="<?php echo $row["log_date"]; ?>" data-id="<?php echo $row['id']; ?>" data-uid="<?php echo $row['user_id']; ?>"  data-rowid="show_popup_comp<?php echo $i; ?>" id="btnapprove" name="btnapprove"  class="btn btn-success show_popup_comp clsapprove"  value="Approve"  data-toggle="modal" >  
							</td> 
							<?php 
							$logdate=$row["log_date"];  
							$lgdate= strtotime($logdate);
							$log_date= date('d-m-Y', $lgdate);							
							?>
							<td><?php echo $log_date; ?></td> 
							<?php 
							$starttime=$row["start_time"];  
							$st_time= strtotime($starttime);
							$start_time= date('h:i:s A', $st_time);							
							?>
							<td><?php echo $start_time; ?></td>
							<?php 
							if($row["end_time"]!='00:00:00')
							{
								$endtime=$row["end_time"];  
								$ed_time= strtotime($endtime);
								$end_time= date('h:i:s A', $ed_time);	
							}
							else
							{
								$end_time='-';
							}	
							?>
							<td><?php echo $end_time; ?></td>  
							<td><?php echo $row['business_unit']; ?></td> 
							<td><?php echo $row['project_name']; ?></td>							
							<td><?php echo $row['work_type_name']; ?></td>							
							<td><?php echo $row['work_status_name']; ?></td>
							<td><?php echo $row['work_platform_name']; ?></td> 
							<td><?php echo $workhour; ?></td>							
							<td><?php echo $row['task_name']; ?></td>  
							<!--<td><?php echo $row['task_duration']; ?></td>  -->
							<td><?php echo $row['remarks']; ?></td> 
							<td><?php echo $row['lead_name']; ?></td>  
							<td><?php echo $row['lead1_remarks']; ?></td> 
							<td><?php echo $row['lead2_name']; ?></td>    
							<td><?php echo $row['lead2_remarks']; ?></td>  
						</tr>
					<?php $i++;
					} ?>
				</tbody>
            </table>
		</div>
	</div>
</div> 

<div id="CompModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
 <div style="display:none;" id="loadingimg" class="loading">Loading...</div>
  <div class="modal-dialog">
  <div class="modal-content"> 
      <div class="modal-header"> 
	 
	  <h1 type="hidden" id="hdnusrid" name="hdnusrid" value="" data-aid="<?php echo $animatordetails[0]['atl_id']; ?>"></h2>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Add Remarks</h1> 
		  <div class="col-md-12" style="width:100%">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                          <form class="form-horizontal"  role="form" name="frmComp" id="frmComp"> 
						  <label style="color:red;font-size: 17px;"  class="" id="errcommon"> </label>
						   <div id="suucessmsg" style="color: green; font-size:20px; font-weight:600; text-align: center;"></div>
                            <div class="panel-body"><div id="msgFP" style="font-size: 18px;"></div>
							<h4>Project Name: <span id="pname" style="color: green;"></span> </h4>
							<h4>Task Name: <span id="tname" style="color: green;"></span> </h4> 
							<!--<h4>Task Duration: <span id="tduration" style="color: green;"></span> </h4>--> 
							<h4>Remarks: <span id="remarks_byre" style="color: green;"></span> </h4> 
                                <fieldset>
									 <!--<div class="form-group"> 
										 <input class="form-control input-lg" placeholder="Completed Duration" value="0" name="txtcompleted_duration" type="text" id="txtcompleted_duration">  
 										</div>-->
                                    <div class="form-group"> 
										 <input class="form-control input-lg" placeholder="Remarks" name="txtdirectorremarks" type="text" id="txtdirectorremarks"> <div id="Script_view"></div> 
										 <input type="hidden" id="hdnusrid" name="hdnusrid" value="" data-aid=""> 
										 <input type="hidden" id="hdntask_duration" name="hdntask_duration" value="" data-aid=""> 
										 
										<input type="hidden" id="hdnrowid" name="hdnrowid" value="" />
										<input type="hidden" id="hdnuid" name="hdnuid" value="" /> 
									   
										</div>
                                   
                                     
                                    <input class="btn btn-lg btn-primary btn-block" value="Submit" type="button" id="btnCOMPbtn" name="btnCOMPbtn">
									
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
</div> 
 </div>



<style>
.datepicker th{background-color:#fff !important;}
#dataTable tfoot{display: table-header-group;}
.error{color: red;float: left;}

	
#dataTable tfoot{display: table-header-group;}
select{color: #000;}
tfoot tr {background: #474640 !important;color: #fff;}
.dataTables_wrapper{overflow-y: scroll;}

#Succ_msg
{
	text-align: center;
    color: green;
    font-size: 19px;
    font-weight: bold;
}
#SearchBox
{
	border-bottom: 5px solid;
    padding: 0 0 20px 0;
}

#SearchBox .radio-inline
{
	font-size: 16px !important;
    margin: 0px 10px;
} 
.radio_btn{float:left;margin 0px 10px !important;}
</style>     
<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet" type="text/css">  
<link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/dataTables.tableTools.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.tableTools.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-multiselect.js"></script>

<link href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url(); ?>assets/js/datatbl/sweetalert.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datatbls/sweetalert.css" type="text/css">

<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> 
<script src = "<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script src = "<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>

<script>  
$(document).ready(function() {
  $('#dataTable').DataTable( {
	"lengthMenu": [[10,  -1], [10,  "All"]],  
	
   initComplete: function () {
    this.api().columns([1,3,6,7]).every( function () {
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
 
$('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
});
$(document).ready(function() {
	$("#frmComp").validate({
		rules:
		{
			"txtdirectorremarks": {required: true},
			"txtcompleted_duration": {required: true,digits:true}
		},
		messages:
		{
			"txtdirectorremarks": {required: "Please enter remarks"} ,
			"txtcompleted_duration": {required: "Please enter completed duration"} 
		},
		errorPlacement: function(error, element) {
		error.insertAfter(element);
		},
		highlight: function(input) {
		$(input).addClass('error');
		} 
	});
}); 
	  
$("#errmsg").delay(1500).fadeOut("slow"); 
$(document).on('click','#btnapprove',function()
{
	$("#txtapproveframe").val('');
	$("#txtdirectorremarks").val('');
	$("#txtcompleted_duration").val('');
}); 
</script>

<script>
$(document).on('click','.show_popup',function() 
{	 
	$("#frmAF").find("input[type=text], textarea select").val("");
	$(".xtime").hide();
	$("#hdnlogdate").val($(this).attr('data-logdate'));
	
	var idval=$(this).attr('data-id'); 
	var rowid=$(this).attr('data-rowid');
	var uid=$(this).attr('data-uid'); //alert(uid);
	var assignedfrm=$(this).attr('data-assignedfrm');
	var completedfrm=$(this).attr('data-completedframe');
	var assigned_duration=$(this).attr('data-assigned_duration');
	if($(this).attr('data-typeofworkid')==2)
	{
		$("#hdnworktype").val($(this).attr('data-typeofworkid'));
		var citerationtime=$(this).attr('data-citerationtime');
		$("#txtCIterationTime").val(citerationtime);
		$(".xtime").show();
	}
	else
	{
		var citerationtime=$(this).attr('data-citerationtime');
		$("#hdntxtCIterationTime").val(citerationtime);
	}
	var name=$(".assfrm_"+rowid).text();  
	 $("#Assigned_duration").text(assigned_duration);
	 
	 $("#Assigned_frame").text(assignedfrm);
	 $("#Completed_frame").text(completedfrm); 
	 
	 $("#hdnaid").val(idval);
	 $("#hdnuid").val(uid);
	 $("#hdnassigned_duration").val(assigned_duration);
	 
	$('#afModal').modal('show');
	
});
 
$(document).on('click','.show_popup_comp',function() 
{	 
		
	$("#frmComp").find("input[type=text], textarea select").val("");
	$("#errcommon").hide().html('');
	
	
	var rowid=$(this).attr('data-id');
	var uid=$(this).attr('data-uid');  
	
	var projectname=$(this).attr('data-projectname');
	var taskname=$(this).attr('data-taskname');  
	var taskduration=$(this).attr('data-taskduration');  
	var remarks=$(this).attr('data-remarks');  
	
	 
	 $("#pname").text(projectname);
	 $("#tname").text(taskname); 
	 $("#remarks_byre").text(remarks); 
	 $("#tduration").text(taskduration); 
	$("#hdntask_duration").val(taskduration);
	
	$("#hdnrowid").val(rowid);	 
	$("#hdnuid").val(uid);
	 
	$('#CompModal').modal('show');
	
}); 

$(document).on('click','#btnCOMPbtn',function()  
{  
	if($("#frmComp").valid())
	{
		$("#errcommon").hide().html('');
		$(".loading").show(); 
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/wdev/addRemarks", 
			type:'POST',
			data:{rowid:$("#hdnrowid").val(),uid:$("#hdnuid").val(),txtdirectorremarks:$("#txtdirectorremarks").val(),txtcompleted_duration:$("#txtcompleted_duration").val(),task_duration:$("#hdntask_duration").val()},
			dataType:"json",
			success: function(data)
			{
				$(".loading").hide();
				if($.trim(data.response)=='1')
				{
					$(".close").trigger("click");
					$("#Succ_msg").html(data.msg);
					window.location.href= "<?php echo base_url();?>index.php/wdev/approvalist";
				}
				else if($.trim(data.response)=='0')
				{ 
					$("#errcommon").show().html(data.msg);
				}
				  
			}
		});
	}
}); 
</script>			

 