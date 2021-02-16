 <?php foreach($gradelist as $pro)
 { ?>
	
	<label class="lab label_design clsofgrade" id="Grade_<?php echo $pro['grade_id']; ?>" >
		<span class="">
			<span class="">
				<input class="clsgrade lab_input" name="ddlgrade" type="radio" id="ddlgrade" value="<?php echo $pro['grade_id']; ?>">
			</span>
			<span class=""></span>
		</span>
		<span class="view_box">
			<div class=""><div class="heading_reg font10"><?php echo $pro['gradename']; ?></div> </div>
		</span>
	</label>
<?php 

} ?>