	<option value="">Select</option>
		<?php foreach($project_list as $project) {
				?>
				<option value="<?php echo $project['id']; ?>"><?php echo $project['project_name']; ?></option>
		<?php	} ?>
		
		