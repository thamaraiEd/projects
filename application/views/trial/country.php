	<option value="">Select your country</option>
		<?php foreach($country as $cnty) {
				?>
				<option data-prefix="<?php echo $cnty['MobilePrefix']; ?>"  data-length="<?php echo $cnty['MobileLength']; ?>"  value="<?php echo $cnty['id']; ?>"><?php echo $cnty['countryName']; ?></option>
		<?php	} ?>