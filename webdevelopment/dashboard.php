<div class="right_col" role="main"> 	
	<div class="">
		<div id="Succ_msg"></div>
	</div>
	<div id="collapse4" class="body">
	<div style="display:none;text-align:center;" id="iddivLoading" class="loading">Loading&#8230;</div>
	<h4 class="reporttitle">User List </h4>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		 
		<div class="x_panel tile">
			<table id="dataTable" class="assementTable table table-striped table-bordered table-hover table-condensed ">
				<thead style="background-color: #1abb9c; color: #fff;">
					<tr class="table-info">
						<th>S.No.</th>
						<th>Name</th>
						<th>Date</th>
						<th>Start Time</th>
						<th>End Time</th>  
						<th>Business Unit</th> 
						<th>Project Name</th> 
						<th>Work Type</th> 
						<th>Work Status</th> 
						<th>Task Name</th>  
						<th>Work Hour</th>  
						<th>Remark</th> 
						<th>Lead</th>  
						<th>Lead Remarks</th> 
						<th>Lead Approved Status</th> 
						<th>Lead Approved Datetime</th> 
						<th>Super Lead</th>    
						<th>Super Lead Remarks</th> 
						<th>Super Lead Approved Datetime</th> 
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
					</tr>
				</tfoot>
				<tbody>
					<?php $i=1;					
					foreach($userslist as $row)
					{
						$start_time=$row['start_time'];
						$end_time=$row['end_time'];					
						
						$startTime = new DateTime($start_time);
						$endTime = new DateTime($end_time);
						$duration = $startTime->diff($endTime); //$duration is a DateInterval object
						$workhour=  $duration->format("%H:%I"); //echo $workhour; exit; 
					//echo"<pre>"; print_r($workhour); exit;
						$diff='';
						?>
						<tr> 
							<td><?php echo $i; ?></td>  
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['log_date']; ?></td>
							<td><?php echo $row['start_time']; ?></td> 
							<td><?php echo $row['end_time']; ?></td>  
							<td><?php echo $row['business_unit']; ?></td>  
							<td><?php echo $row['project_name']; ?></td>  
							<td><?php echo $row['work_type_name']; ?></td>  
							<td><?php echo $row['work_status_name']; ?></td>  
							<td><?php echo $row['task_name']; ?></td>
							<td><?php echo $workhour; ?></td>  
							<td><?php echo $row['remarks']; ?></td>
							<td><?php echo $row['lead_name']; ?></td>    
							<td><?php echo $row['lead1_remarks']; ?></td>  
							<td><?php echo $row['lead1_approved_status']; ?></td>  
							<td><?php echo $row['lead1_approved_datetime']; ?></td>  
							<td><?php echo $row['super_lead_name']; ?></td>  
							<td><?php echo $row['lead2_remarks']; ?></td>  
							<td><?php echo $row['lead2_approved_datetime']; ?></td>  
						</tr>
					<?php $i++;
					} ?>
				</tbody>
            </table>
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
    this.api().columns([1,2,3,5,6,7]).every( function () {
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
</script>

		

 