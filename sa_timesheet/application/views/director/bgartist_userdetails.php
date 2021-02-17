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
							<!--<td><?php echo $row['remark']; ?></td>-->
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
 
<link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/dataTables.tableTools.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.tableTools.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-multiselect.js"></script>

<link href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<script src = "<?php echo base_url(); ?>assets/js/jquery.validate.js"></script> 


<script>

/*  $('#dataTable').DataTable( {
	
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
		rules: {
		"txtapproveframe": {required: true}
		},
		messages: {
		"txtapproveframe": {required: "Please enter approve frame"}
		},
		errorPlacement: function(error, element) {
		error.insertAfter(element);
		},
		highlight: function(input) {
		$(input).addClass('error');
		} 
	});
});
$(document).on('click','.show_popup',function() 
{	 
	var idval=$(this).attr('data-id'); 
	var rowid=$(this).attr('data-rowid');
	var uid=$(this).attr('data-uid'); //alert(uid);
	var assignedfrm=$(this).attr('data-assignedfrm');
	var completedfrm=$(this).attr('data-completedframe'); 
	var name=$(".assfrm_"+rowid).text();// 
	 $("#Assigned_frame").text(assignedfrm);
	 $("#Completed_frame").text(completedfrm); 
	$('#afModal').modal('show');
	$("#btnafrm").click(function(){
		if($("#frmAF").valid())
		{
				// alert('ss');alert(idval);
				
			 $(".loading").show();
			// var aqid= $(this).attr('data-aid'); alert(aqid); 
			$.ajax({
				url: "<?php echo base_url(); ?>index.php/home/approveproductivity", 
				type:'POST',
				data:{aid:idval,uid:uid,txtapproveproductivity:$("#txtapproveframe").val(),txtdirectorremarks:$("#txtdirectorremarks").val()},
				dataType:"json",
				success: function(data)
				{
					$(".loading").hide();
					if($.trim(data.response)=='1')
					{  
						$(".close").trigger("click");
						$("#Succ_msg").html(data.msg);
						userrole();
						/*$("#txtapproveframe").val('');
						$("#txtdirectorremarks").val('');
						$('#btnreset').click();
						$("#suucessmsg").html(data.msg);//$("#suucessmsg").delay(1500).fadeOut("slow");	 */
					}
					else if($.trim(data.response)=='2')
					{
						//alert();
						$("#errcommon").show().html(data.msg);
					}
					  
				}
			});
		}
	}); 
}); 
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