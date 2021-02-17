 <h4 class="reporttitle">Animator List </h4>
 <!--<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header  
      <div class="modal-header">
        <h4 class="modal-title" id="Name_of_User" style="text-align: center;font-size: 26px;color: #000;"> </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body  
      <div class="modal-body">
        <div id="Script_view"></div>
      </div>

      <!-- Modal footer  
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>	-->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		 
		<div class="x_panel tile">
			<table id="dataTable" class="assementTable table table-striped table-bordered table-hover table-condensed ">
				<thead style="background-color: #1abb9c; color: #fff;">
					<tr class="table-info">
						<th>S.No.</th>
						<th>Name</th>
						<th>Date</th>
						<th>Approve</th>
						<th>Start Time</th>
						<th>End Time</th> 
						<th>Work Type</th> 
						<!--<th>Sub Task</th> -->
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
						<th>Remark</th> 
						 <th>Lead 1</th> 
						<th>Lead 1 Approval Status</th> 
						<th>Lead 1 Approved DateTime</th> 
						<th>Lead 1 Remark</th> 
						<th>Super Lead</th>  
						<th>Super Lead Comments</th>
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
				<tfoot>
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
								<input type="button"  data-logdate="<?php echo $row["log_date"]; ?>" data-citerationtime="<?php echo $row['citerationtime']; ?>" data-typeofworkid="<?php echo $row['typeof_workid']; ?>"  data-completedframe="<?php echo $row['completed_frame']; ?>" data-assigned_duration = "<?php echo $row['assigned_duration']; ?>" data-assignedfrm = "<?php echo $row['assigned_frames']; ?>" data-id="<?php echo $row['atl_id']; ?>" data-uid="<?php echo $row['user_id']; ?>"  data-rowid="show_popup_<?php echo $i; ?>" id="btnapprove" name="btnapprove"  class="btn btn-success show_popup clsapprove"  value="Approve"  data-toggle="modal" > 
								<div id="show_popup_<?php echo $i; ?>" style="display:none;"><?php echo $row['completed_frame']; ?></div> 
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
							<!--<td><?php echo $row['sub_task']; ?></td>-->
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

<div id="afModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
 <div style="display:none;" id="loadingimg" class="loading">Loading...</div>
  <div class="modal-dialog">
  <div class="modal-content"> 
      <div class="modal-header"> 
	 
	  <h1 type="hidden" id="hdnusrid" name="hdnusrid" value="" data-aid="<?php echo $animatordetails[0]['atl_id']; ?>"></h2>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Approve Frames  </h1> 
		  <div class="col-md-12" style="width:100%">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                          <form class="form-horizontal"  role="form" name="frmAF" id="frmAF">
                          <p>You can approve frames here.</p>
						  <label style="color:red; padding: 20px; font-size: 17px;"  class="" id="errcommon"> </label>
						   <div id="suucessmsg" style="color: green; font-size:20px; font-weight:600; text-align: center;"></div>
                            <div class="panel-body"><div id="msgFP" style="font-size: 18px;"></div>
							<h4>Assigned Duration: <span id="Assigned_duration" style="color: green;"></span> </h4>
							<h4>Assigned Frame: <span id="Assigned_frame" style="color: green;"></span> </h4>
							<h4>Completed Frame: <span id="Completed_frame" style="color: green;"></span></h4>
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control input-lg numbersOnly" placeholder="Approve Frame" name="txtapproveframe" type="text" id="txtapproveframe"><br>
										 <input class="form-control input-lg" placeholder="Remarks" name="txtdirectorremarks" type="text" id="txtdirectorremarks"> <div id="Script_view"></div>
										<div class="xtime"  style="display:none;">
											 <label class="" for="rdmanualcomplexity" style="float: left;">Correction Iteration time</label>
											<select  class="form-control input-sm" name="txtCIterationTime" id="txtCIterationTime"> 
												<option value="">Select</option> 
												<option value="1">1</option> 
												<option value="2">2</option> 
												<option value="3">3</option> 
												<option value="4">4</option> 
												<option value="5">5</option>  
											</select>
										</div>
										 <input type="hidden" id="hdnusrid" name="hdnusrid" value="" data-aid="<?php echo $animatordetails[0]['atl_id']; ?>"> 
										 <input type="hidden" id="hdnworktype" name="hdnworktype" value="" > 
										 <input type="hidden" id="hdntxtCIterationTime" name="hdntxtCIterationTime" value="" > 
										 <input type="hidden" id="hdnlogdate" name="hdnlogdate" value="" > 
										 
										 <input type="hidden" id="hdnaid" name="hdnaid" value="" > 
										 <input type="hidden" id="hdnuid" name="hdnuid" value="" > 
										 <input type="hidden" id="hdnassigned_duration" name="hdnassigned_duration" value="" > 
										</div>
                                     
                                    <input class="btn btn-lg btn-primary btn-block" value="Approve" type="button" id="btnANI" name="btnANI">
									
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
$(document).ready(function() {
  $('#dataTable').DataTable( {
	"lengthMenu": [[10,  -1], [10,  "All"]],  
	
   initComplete: function () {
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
	$("#frmAF").validate({
		rules:
		{
			"txtapproveframe": {required: true},
			"txtCIterationTime":
			{
				required:function(element)
				{ 
					if($("#hdnworktype").val()==2)
					{
						return true;
					} 
				}
			}
		},
		messages:
		{
			"txtapproveframe": {required: "Please enter approve frame"},
			"txtCIterationTime": {required: "Please select correction iteration time"}
		},
		errorPlacement: function(error, element) {
		error.insertAfter(element);
		},
		highlight: function(input) {
		$(input).addClass('error');
		} 
	});
}); //$(".show_popup").click(function()

/* $("#btnafrm").click(function(){
	//alert('jj');
	$("#frmAF").valid();
}); */
	  
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
.datepicker th{background-color:#fff !important;}
#dataTable tfoot{display: table-header-group;}
.error{color: red;float: left;}

	
#dataTable tfoot{display: table-header-group;}
select{color: #000;}
tfoot tr {background: #474640 !important;color: #fff;}
.dataTables_wrapper{overflow-y: scroll;}
</style>