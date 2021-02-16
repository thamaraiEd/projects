
<form name="giftForm" id="giftForm"  class="" method="post" enctype="multipart/form-data" accept-charset="utf-8">
	<div class="form-group">						
		<div class="row">
			<div class="col-md-6">
			<label>User Name : <?php echo $this->session->gift_username;?>​</label> 
			</div>								
		</div><br/>
		
		<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12"> 
		<div class="x_panel tile">
		<?php if(count($gift_history)>0) { ?>
			<table id="couponTable" class="couponTable table table-striped table-bordered table-hover table-condensed display no wrap" align="center">
				<thead style="background-color: #673AB7; color: #fff;">
					<tr class="table-info">
						<th>S.No.</th> 
						<th>Coupon Code</th>  
						<th>Plan</th>  
						<th>Start Date</th>  
						<th>End Date</th>  
						<th>Used</th>
					</tr> 
				</thead>
				<tbody>
					<?php   
					$i=1; foreach($gift_history as $row) { ?>	
					 <tr>
						<td><?php echo $i; ?></td> 
						<td><?php echo $row['coupon_code']; ?></td>  
						<td><?php echo $row['plan']; ?></td>  
						<td><?php $sdate=explode("T",$row['startdate']); echo date_format(date_create($sdate[0]),"d/m/Y"); ?></td>  
						<td><?php $edate=explode("T",$row['enddate']); echo date_format(date_create($edate[0]),"d/m/Y");; ?></td>
						<td><?php echo $row['used']; ?></td>  
					</tr> 	
					<?php $i++; } ?> 
				</tbody>
            </table>
			<?php 
		}else{ ?>
		<table id="couponTable" class="couponTable table table-striped table-bordered table-hover table-condensed display no wrap" align="center">
				<thead style="background-color: #673AB7; color: #fff;">
					<tr class="table-info">
						<th>S.No.</th> 
						<th>Coupon Code</th>  
						<th>Plan</th>  
						<th>Start Date</th>  
						<th>End Date</th>  
						<th>Used</th>
					</tr> 
				</thead>
				<tbody>
					<tr>
						<td colspan="6"><center>No data found</center></td>							
					</tr>
				</tbody>
            </table>
			<?php } ?> 
		</div>
	</div>
</div>                 
</form>
<style>
tr, th , td{
    text-align: center;
}
</style>