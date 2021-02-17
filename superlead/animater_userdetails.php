 <h4 class="reporttitle">Animator List </h4>
 
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		 
		<div class="x_panel tile">
			<table id="dataTable" class="assementTable table table-striped table-bordered table-hover table-condensed ">
				<thead style="background-color: #1abb9c; color: #fff;">
					<tr class="table-info">
						<th>S.No.</th>
						<th>Name</th>
						<th>Date</th>
						<th>Action</th>
						<th>Start Time</th>
						<th>End Time</th>
						<th>Work Type</th>
						<!--<th>Sub Task</th>-->
						<th>Shot Name</th> 
						<th>No. of Character</th> 
						<th class="assfrm_<?php echo $i; ?>">Assigned Frames</th>
						<th>Assigned Duration</th>
						<th>Heedio/Slapstick</th>
						<th>Action Type</th>
						<th>Char 1</th>
						<th>Char 2</th> 
						<th>Char 3</th> 
						<th>Char 4</th> 
						<th>Char 5</th> 
						<th>Library Available</th> 
						<th>Auto Complexity</th> 
						<th>Manual Complexity</th> 
						<th>Expected Productivity</th> 
						<th>Completed Frames</th> 
						<th>Completed Sec.</th> 
						<th>Approved Frames</th> 
						<th>Approved Productivity</th> 
						<th>Deficit</th> 
						<th>Work Hour</th> 
						<th>Remarks</th> 
						 <th>Lead 1</th> 
						<th>Lead 1 Approval Status</th> 
						<th>Lead 1 Approved DateTime</th> 
						<th>Lead 1 Remarks</th> 
						<th>Super Lead</th>  
						<th>Super Lead Remarks</th>
						<th>Number of Correction</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
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
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</tfoot>
				<tbody>
					<?php $i=1; foreach ($animatordetails as $row) { ?>
						<tr>
							<td><?php echo $i; ?></td>  
							<td><?php echo $row["user_name"]; ?></td>  
							<?php 
							$logdate=$row["log_date"];  
							$lgdate= strtotime($logdate);
							$log_date= date('d-m-Y', $lgdate);							
							?>
							<td><?php echo $log_date; ?></td> 
							<td>
								<?php
								if($row['lead2_remarks']!='')
								{ 
									echo "-";
								}
								else
								{
								?>
									<input type="button" data-id="<?php echo $row['atl_id']; ?>" data-uid="<?php echo $row['user_id']; ?>"  data-rowid="show_popup_<?php echo $i; ?>" id="btnapprove" name="btnapprove"  class="btn btn-success show_popup clsapprove"  value="Add Remarks"  data-toggle="modal" > 
									<div id="show_popup_<?php echo $i; ?>" style="display:none;"><?php echo $row['actual_productivity']; ?></div> 
								<?php
								}
								?>
							</td>
							<?php 
							$starttime=$row["start_time"];  
							$st_time= strtotime($starttime);
							$start_time= date('h:i:s A', $st_time);							
							?>
							<td><?php echo $start_time; ?></td>
							<?php 
							$endtime=$row["end_time"];  
							$ed_time= strtotime($endtime);
							$end_time= date('h:i:s A', $ed_time);							
							?>
							<td><?php echo $end_time; ?></td>
							<td><?php echo $row['typeofwork']; ?></td>  
							<!--<td><?php echo $row['sub_task']; ?></td> --> 
							<td><?php echo $row['shot_name']; ?></td>  
							<td><?php echo $row['num_of_characters']; ?></td> 
							<td><?php echo $row['assigned_frames']; ?></td> 
							<td><?php echo $row['assigned_duration']; ?></td> 
							<td><?php echo $row['heedio_slapstick']; ?></td> 
							<td><?php echo $row['actiontype']; ?></td>  
							<td><?php echo $row['char1']; ?></td>   
							<td><?php echo $row['char2']; ?></td>  
							<td><?php echo $row['char3']; ?></td> 
							<td><?php echo $row['char4']; ?></td> 
							<td><?php echo $row['char5']; ?></td> 
							<td><?php echo $row['library_available']; ?></td> 
							<td><?php echo $row['auto_complexity']; ?></td> 
							<td><?php echo $row['manual_complexity']; ?></td> 
							<td><?php echo $row['expected_productivity']; ?></td> 
							<td><?php echo $row['completed_frame']; ?></td> 
							<td><?php echo round($row['completed_frame']/25,2); ?></td> 
							<td><?php echo $row['approved_frames']; ?></td> 
							<td><?php echo $row['approved_productivity']; ?></td> 
							<td><?php echo $row['deficit']; ?></td> 
							<td><?php echo $row['work_hour']; ?></td> 
							<?php
							if($row['lead1_approved_status']=='No')
							{
								$lead1_remarks="-";
							}
							else if($row['lead1_approved_status']=='Yes')
							{
								$lead1_remarks;
							}	?>
							<td><?php echo $row['remark']; ?></td> 
							<td><?php echo $row['lead1_name']; ?></td> 
							<td><?php echo $row['lead1_approved_status']; ?></td> 
							<?php 
							$lead1appts=$row["lead1_approved_datetime"];  
							$lead1app_ts= strtotime($lead1appts);
							$lead1_approved_ts= date('d-m-Y h:i:s A ', $lead1app_ts);
							if($row['lead1_approved_status']=='No')
							{
								$lead1_approved_ts="-";
							}
							else if($row['lead1_approved_status']=='Yes')
							{
								$lead1_approved_ts;
							}							
							?>
							<td><?php echo $lead1_approved_ts; ?></td>   
							<?php
							if($row['lead2_approved_status']=='No')
							{
								$lead2_remarks="-";
							}
							else if($row['lead2_approved_status']=='Yes')
							{
								$lead2_remarks;
							}	?>
							<td><?php echo $lead2_remarks; ?></td>   
							<td><?php echo $row['lead2_name']; ?></td>  
							<td><?php echo $row['lead2_remarks']; ?></td>
							<td><?php if($row['citerationtime']!=''){echo $row['citerationtime'];}else{echo "-";} ?></td>
						</tr>
					<?php $i++;  } ?>
				</tbody>
            </table>
		</div>
	</div>
</div> 


<div id="ANIModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
 <div style="display:none;" id="loadingimg" class="loading">Loading...</div>
  <div class="modal-dialog">
  <div class="modal-content"> 
      <div class="modal-header">  
	  <h1 type="hidden" id="hdnusrid" name="hdnusrid" value="" data-aid="<?php echo $animatordetails[0]['atl_id']; ?>"></h2>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
		  <h1 class="text-center">Super lead Remarks</h1> 
		  <div class="col-md-12" style="width:100%">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                          <form class="form-horizontal"  role="form" name="frmANI" id="frmANI"> 
						  <label style="color:red; padding: 20px; font-size: 17px;"  class="" id="errcommon"> </label>
						   <div id="suucessmsg" style="color: green; font-size:20px; font-weight:600; text-align: center;"></div>
                            <div class="panel-body"><div id="msgFP" style="font-size: 18px;"></div>  
                                <fieldset>
                                    <div class="form-group">
										 <input class="form-control input-lg" placeholder="Remarks" name="txtdirectorremarks" type="text" id="txtdirectorremarks"> <div id="Script_view"></div>
										 <input type="hidden" id="hdnusrid" name="hdnusrid" value="" data-aid="<?php echo $animatordetails[0]['atl_id']; ?>"> 
										 
										  <input type="hidden" id="hdnrowid" name="hdnrowid" value=""> 
										  <input type="hidden" id="hdnuid" name="hdnuid" value=""> 
										  
										</div>
                                     
                                    <input class="btn btn-lg btn-primary btn-block" value="Submit" type="button" id="btnANI" name="btnANI">
									
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
/*  $('#dataTable').DataTable( {
	
	"lengthMenu": [[10,  -1], [10,  "All"]], 
	"scrollY":true, 
	"scrollX":true, 
}) */

$(document).ready(function() {
  $('#dataTable').DataTable( {
	"lengthMenu": [[10,  -1], [10,  "All"]],   
    initComplete: function () 
	{
		this.api().columns([1,2,6,7]).every( function () {
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
	$("#frmANI").validate({
		rules: {
		"txtdirectorremarks": {required: true}
		},
		messages: {
		"txtdirectorremarks": {required: "Please enter remarks"}
		},
		errorPlacement: function(error, element) {
		error.insertAfter(element);
		},
		highlight: function(input) {
		$(input).addClass('error');
		} 
	});
}); //$(".show_popup").click(function()

 
	  
$("#errmsg").delay(1500).fadeOut("slow");


	  
$(document).on('click','#btnapprove',function()
{
	$("#txtapproveframe").val('');
	$("#txtdirectorremarks").val('');
});
 
  

   
//setTimeout(function(){ $("#Succ_msg").delay(5000).fadeOut("slow"); }, 6000);





/* $(document).ready(function(){
  $("#dataTable tbody").on("click",'.clsapprove',function() {
	 // alert('ji');
	var tthis= $(this);//alert(tthis);
	var userid =  $(this).attr('data-userid');  //alert(userid);  
	//var htmlString = '<br/>';	
	var completedframe =  $(this).attr('data-completedframe'); //alert(completedframe);   
	swal({
			title: "Are you sure?",
			 html:true,
			text: "Completed Frame : " + completedframe + "<br> Approve Frames <input type='text' class='clsaf' name='txtapprovedfrm' value='' id='txtapprovedfrm'>  <br>Do you want to approve?",
			type: "warning",
			showCancelButton: true,
			confirmButtonClass: "btn-success",
			confirmButtonText: "Yes!",
			cancelButtonText: "No!",
			closeOnConfirm: false,
			closeOnCancel: false
		  },
		  function(isConfirm) { 
			if (isConfirm) { 
				  $.ajax({
					 url: "<?php echo base_url(); ?>index.php/home/approveframe",
					 type: 'POST',
					 data: {userid:userid,txtapprovedfrm:txtapprovedfrm},
					 error: function() {
						alert('Something is wrong');
					 },
					 success: function(data) { 
					
						  swal("Mail Sent successfully to " + userid + " ", ""); // alert(tthis.attr('id'));
						 /// swal("getgteg" + mailsentcnt + " ", ""); // alert(tthis.attr('id'));
						  tthis.val('Resend Mail');   
					 }
				  });
				} else {
				  swal("Cancelled", "Cancelled :)", "error");
				}			 
						 
			}); 
		}); 
	});  */
</script>
<style>
.dataTables_wrapper{overflow-y: scroll;}
.datepicker th{background-color:#fff !important;}
#dataTable tfoot{display: table-header-group;}
.error{color: red;float: left;}
.Edit_Btn{    background: #673AB7;
padding: 10px;
border-radius: 5px;
color: #fff;}

#dataTable tfoot{display: table-header-group;}
select{color: #000;}
tfoot tr {
background: #474640;
color: #fff;
}

</style>