<div class="right_col" role="main">
<h4 class="reporttitle" align="center">Activity List </h4>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="row">
			<h4>&nbsp;&nbsp;<u><a id="addactivity" class="addactivity" href="<?php echo base_url('index.php/wdev/addactivity'); ?>"><i class="fa fa-plus"></i>Add Activity</a></u>
			</h4>
		</div>
		<div class="row">
			<h4 style="text-align: center;color: green;margin: 0;" id="Success_msg" ><?php echo $this->session->flashdata('Success_msg'); ?></h4>
		</div>
		<div class="x_panel tile">
			<table id="dataTable" class="assementTable table table-striped table-bordered table-hover table-condensed">
				<thead style="background-color: #1abb9c; color: #fff;">
					<tr class="table-info">
						<th>S.No.</th>
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
						<th>Remark</th> 
						<?php if($this->session->manager_id!=0){?>
						<th>Lead</th>  
						<th>Lead Remarks</th> 
						<?php } ?>
						<th>Super Lead</th>    
						<th>Super Lead Comments</th> 
					</tr>
				</thead>
				 
				<tbody>
					<?php $i=1;
					//echo"<pre>"; print_r($activitylist); exit;
					foreach($activitylist as $row)
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
							<td>
							<?php 
							$start_ts = strtotime($row["log_date"]);
							$cur_date = strtotime(date("Y-m-d"));
							$diff = ($cur_date - $start_ts);
							$datediff = round($diff / 86400);
							if($datediff<=20)
							{ //echo $row["lead1_approved_status"]."==".$row["lead2_approved_status"];exit;
								if(($row["lead1_name"]=='') && ($row["lead2_name"]==''))
								{
							?>
									<a href="<?php echo base_url(); ?>index.php/wdev/editactivity?rowid=<?php echo $row["id"]; ?>" class="Edit_Btn" id="<?php echo $row["log_date"]; ?>" > Edit </a>
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
							<td><?php echo $row['business_unit']; ?></td>  
							<td><?php echo $row['projectname']; ?></td>  
							<td><?php echo $row['work_type_name']; ?></td>  
							<td><?php echo $row['work_status_name']; ?></td> 
							<td><?php echo $row['work_platform_name']; ?></td> 
							<td><?php echo $workhour; ?></td> 
							<td><?php echo $row['task_name']; ?></td>							  
							<td><?php echo $row['remarks']; ?></td> 
							<?php if($this->session->manager_id!=0){?>
							<td><?php echo $row['lead1_name']; ?></td>  
							<td><?php echo $row['lead1_remarks']; ?></td> 
							<?php } ?>
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
	dom: 'Blfrtip',
    buttons: ['excel']
	/* 
	"scrollY":true, 
	"scrollX":true,  */
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