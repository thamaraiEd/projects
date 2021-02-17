<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
<title>Skillangels</title>
</head>

<body>

<h2>You have been logged out...<h2>
<script>
LoginAjaxCall();
function LoginAjaxCall(){
   $.ajax({
			type:"POST",
			url:"<?php echo base_url('index.php/home/checkuserisactive') ?>",
			success:function(result)
			{	//alert(result);
				if(result==1)
				{ 
					
					window.location.href= "<?php echo base_url();?>index.php";
				}
				else
				{
					window.location.href= "<?php echo base_url('index.php/home/mainlogout') ?>";
				}	
			}
		});
}
</script>
</body>
</html>