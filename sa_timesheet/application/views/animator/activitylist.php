<div class="right_col" role="main">
<h4 class="reporttitle">Animator Activity List </h4>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="row">
			<h4>&nbsp;&nbsp;<u><a id="addactivity" class="addactivity" href="<?php echo base_url('index.php/home/addactivity'); ?>"><i class="fa fa-plus"></i>Add Activity</a></u>
			</h4>
		</div>
		<div class="row">
			<h4 style="text-align: center;color: green;margin: 0;" id="Success_msg" ><?php echo $this->session->flashdata('Success_msg'); ?></h4>
		</div>
		
		<div class="x_panel tile">
			<table id="dataTable" class="assementTable table table-striped table-bordered table-hover table-condensed ">
				<thead style="background-color: #1abb9c; color: #fff;">
					<tr class="table-info">
						<th>S.No.</th>
						<th>Action</th>
						<th>Date</th>
						<th>Start Time</th>
						<th>End Time</th> 
						<th>Type of Work</th>
						<!--<th>Sub Task</th>-->
						<th>Shot Name</th> 
						<th>No. of Character</th> 
						<th>Assigned Frames</th>
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
						<th>Is Correction</th>
						<th>Remark</th> 
						 <th>Lead 1</th> 
						<th>Lead 1 Approval Status</th> 
						<th>Lead 1 Approved DateTime</th> 
						<th>Lead Remarks</th> 
						<th>Super Lead</th> 
						<!--<th>Lead 2 Approval Status</th> 
						<th>Lead 2 Approved DateTime</th> -->  
						<th>Super Lead Comments</th>
						<th>Number of correction</th>
					</tr>
				</thead>
				 
				<tbody>
					<?php $i=1;
					foreach($getactivitylist as $row)
					{
						$diff='';
						?>
						<tr> 
							<td><?php echo $i; ?></td>  
							<td>
							<?php 
							$start_ts = strtotime($row["log_date"]);
							$cur_date = strtotime(date("Y-m-d"));
							$diff = ($cur_date - $start_ts);
							$datediff = round($diff / 86400);
							if($datediff<=1)
							{ //echo $row["lead1_approved_status"]."==".$row["lead2_approved_status"];exit;
								if(($row["lead1_approved_status"]=='No') && ($row["lead2_approved_status"]=='No'))
								{
							?>
									<a href="<?php echo base_url(); ?>index.php/home/editactivity?logdate=<?php echo $row["log_date"]; ?>&rowid=<?php echo $row["rowid"]; ?>" class="Edit_Btn" id="<?php echo $row["log_date"]; ?>" > Edit </a>
							<?php
								}
								else
								{
									echo "-";
								}
							}
							else
							{
								echo "-";
							}
							?>
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
							<td><?php echo $row['is_corrections']; ?></td>
							<td><?php echo $row['remark']; ?></td> 
							<td><?php echo $row['lead1_name']; ?></td> 
							<td><?php echo $row['lead1_approved_status']; ?></td> 
							<?php 
							if($row["lead1_approved_datetime"]!='0000-00-00 00:00:00')
							{
								$lead1appts=$row["lead1_approved_datetime"];  
								$lead1app_ts= strtotime($lead1appts);
								$lead1_approved_ts= date('d-m-Y h:i:s A ', $lead1app_ts);
							}
							else
							{
								$lead1_approved_ts= "-";
							}	
							?>
							<td><?php echo $lead1_approved_ts; ?></td>  
							<td><?php echo $row['lead1_remarks']; ?></td> 
							<td><?php echo $row['lead2_name']; ?></td> 
							<!--<td><?php echo $row['lead2_approved_status']; ?></td> 
							<?php 
							if($row["lead2_approved_datetime"]!='0000-00-00 00:00:00')
							{
								$lead2appts=$row["lead2_approved_datetime"];  
								$lead2app_ts= strtotime($lead2appts);
								$lead2_approved_ts= date('d-m-Y h:i:s A ', $lead2app_ts);
							}
							else
							{
								$lead2_approved_ts= "-";
							}
							?>
							<td><?php echo $lead2_approved_ts; ?></td>-->   
							<td><?php echo $row['lead2_remarks']; ?></td> 
							<td><?php if($row['citerationtime']!=''){echo $row['citerationtime'];}else{echo "-";} ?></td> 
						</tr>
					<?php $i++;
					} ?>
				</tbody>
            </table>
		</div>
	</div>
</div>	
</div>	
            
<link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/dataTables.tableTools.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.tableTools.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-multiselect.js"></script>

<link href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>


<script>

 $('#dataTable').DataTable( {
	
	"lengthMenu": [[10,  -1], [10,  "All"]], 
	"scrollY":true, 
	"scrollX":true, 
})

$("#Success_msg").delay(1500).fadeOut("slow");	 
 
</script>
<style>
 
.datepicker th{background-color:#fff !important;}
#dataTable tfoot{display: table-header-group;}

.Edit_Btn
{
	color: #fff;
    font-weight: bold;
    text-decoration: none;
    background: #000;
    padding: 4px 12px;
    border-radius: 5px;
    font-size: 16px;
}

</style>