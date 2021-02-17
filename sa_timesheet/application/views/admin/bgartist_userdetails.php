<h4 class="reporttitle">BG Artist List </h4>
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
						<th>Episode</th> 
						<th>Shot Name</th>  
						<th>Quantity</th>
						<th>Heedio/Slapstick</th> 
						<th>Work Type</th> 
						<th>Expected Productivity</th> 
						<th>Actual Productivity</th>  
						<th>Approved Productivity</th> 
						<th>Deficit</th> 
						<th>Work Hour</th>
						 <th>Lead 1</th>
						<th>Lead 1 Approval Status</th> 
						<th>Lead 1 Approved DateTime</th> 
						<th>Super Lead</th>  
						<th>Super Lead Remarks</th>  
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
					<?php $i=1; foreach ($bgartistdetails as $row) { ?>
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
								<a href="<?php echo base_url(); ?>index.php/admin/editbgactivity?logdate=<?php echo $row["log_date"]; ?>&rowid=<?php echo $row["btl_id"]; ?>&userid=<?php echo $row["user_id"]; ?>" class="Edit_Btn" id="<?php echo $row["log_date"]; ?>" style="margin-right: 0;position: absolute;clear: both;overflow: hidden;" > Edit </a>
								
								<input type="button"  data-logdate="<?php echo $row["log_date"]; ?>" data-rowid="<?php echo $row['btl_id']; ?>" data-userid="<?php echo $row['user_id']; ?>"  id="btnapprove" name="btnapprove"  class="Edit_Btn show_popup_bg"  value="Delete"  data-toggle="modal" style="margin-left: 55px;" >
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
							<td><?php echo $row['episode']; ?></td>  
							<td><?php echo $row['shot_name']; ?></td>   
							<td><?php echo $row['quantity']; ?></td>   
							<td><?php echo $row['heedio_slapstick']; ?></td> 
							<td><?php echo $row['worktype']; ?></td>  
							<td><?php echo $row['expected_productivity']; ?></td>  
							<td><?php echo $row['actual_productivity']; ?></td>  
							<td><?php echo $row['approved_productivity']; ?></td> 
							<td><?php echo $row['deficit']; ?></td> 
							<td><?php echo $row['work_hour']; ?></td>  
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
							<td><?php echo $row['lead2_name']; ?></td> 
							<td><?php echo $row['lead2_remarks']; ?></td> 
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
			  <h1 class="text-center">Admin Delete Remarks</h1> 
			  <div class="col-md-12" style="width:100%">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="text-center">
							  <form class="form-horizontal"  role="form" name="frmAF" id="frmAF"> 
							  <label style="color:red; padding: 20px; font-size: 17px;"  class="" id="errcommon"> </label>
							   <div id="suucessmsg" style="color: green; font-size:20px; font-weight:600; text-align: center;"></div>
								<div class="panel-body"><div id="msgFP" style="font-size: 18px;"></div>  
									<fieldset>
										<div class="form-group">
											<input class="form-control input-lg" placeholder="Remarks" name="txtremarks" type="text" id="txtremarks"> 
											<input id="hdnrowid" name="hdnrowid" value="" type="hidden"/>
											<input id="hdnuserid" name="hdnuserid" value="" type="hidden"/>
											<input id="hdnlogdate" name="hdnlogdate" value="" type="hidden" />
										</div> 
										<input class="btn btn-lg btn-primary btn-block" value="Submit" type="button" id="btnafrm" name="btnafrm"> 
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
/* 
 $('#dataTable').DataTable( {
	
	"lengthMenu": [[10,  -1], [10,  "All"]], 
	"scrollY":true, 
	"scrollX":true, 
}) */
$(document).ready(function() {
  $('#dataTable').DataTable( {
	"lengthMenu": [[10,  -1], [10,  "All"]],  
	
   initComplete: function () {
    this.api().columns([1,2]).every( function () {
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
			"txtremarks": {required: true}
		},
		messages:
		{
			"txtremarks": {required: "Please enter remarks"}
		},
		errorPlacement: function(error, element)
		{
			error.insertAfter(element);
		},
		highlight: function(input)
		{
			$(input).addClass('error');
		} 
	});
}); 
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