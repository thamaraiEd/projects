<link href="<?php echo base_url(); ?>assets/css/fancy/jquery.fancybox.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/fancy/fullscreen.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/css/fancy/jquery.fancybox.js"></script>
<input type="hidden"  name="hdnNextGameId" id="hdnNextGameId" value="" />
<input type="hidden"  name="hdnTotalGame" id="hdnTotalGame" value="" />

<div id="wrapper">
<!-- Coontent Start here -->
<div class="container">
	<div id="ajaxcontent" style="min-height:600px;">
		<!--My games starts here -->
		
		<!--my games ends here-->
	</div>
</div>  
<div id="SKILLMODAL" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
 <div style="display:none;" id="loadingimg" class="loading">loading...</div>
	<div class="modal-dialog">
		<div class="modal-content"> 
			<div class="modal-header">   
				<h3 class="text-center"> Select your skills</h3> 
			</div> 
			<div class="modal-body">
				<!--<div class="col-md-12" style="width:100%" id="">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="col-md-6 col-sm-6 col-xs-12" style=""> 
								<label><input type="radio" name="rdany2skills" id="rdany2skills" class="" value="User"  /> Select any 2 skills for trial </label>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12" style=""> 
								<label><input type="radio" name="rdany2skills" id="rdany2skills" class="" value="Any"  /> System selected skills </label>
							</div>
							<div class="error_1"></div>
						</div>
					</div>
				</div>-->
				<div class="col-md-12" style="width:100%;" id="Skill_Box" >
					<div class="panel panel-default">
						<div class="panel-body">
							<form name="frmskills" id="frmskills" />
								<input type="hidden" name="hdnSelection" id="hdnSelection" value="" />
								<div class="col-md-6 col-sm-6 col-xs-12" style="border-right: 3px solid #000;" id="User_Interface"> 
									<label> Select any <?php echo $this->config->item('demo_skill_count'); ?> skills for trial </label>  </br>
									<?php
									foreach($skillsid as $row)
									{
									?>
										<label class="lab label_design USER_SKILLS" id="lab_<?php echo $row['skillid']; ?>" >
											<span class="">
												<span class="">
													<input class="skills lab_input" name="chkskill[]" type="checkbox" id="chk_<?php echo $row['skillid']; ?>" value="<?php echo $row['skillid']; ?>" data-gs_id="<?php echo $row['skillid']; ?>" />
												</span>
												<span class=""></span>
											</span>
											<span class="view_box">
												<div class=""><div class="heading_reg font10"><?php echo $row['skillname']; ?></div> </div>
											</span>
										</label>
										<!--<label><input type="checkbox" name="chkskill[]" id="chkME" class="skills" value="<?php echo $row['skillid']; ?>"  /> <?php echo $row['skillname']; ?> </label>-->
									<?php
									}
									?>
									<!--
									<label><input type="checkbox" name="chkskill[]" id="chkVP" class="skills" value="2" /> Visual Processing</label></br>
									<label><input type="checkbox" name="chkskill[]" id="chkFA" class="skills" value="3" checked /> Focus & Attention </label></br>
									<label><input type="checkbox" name="chkskill[]" id="chkPS" class="skills" value="4" /> Problem Solving</label></br>
									<label><input type="checkbox" name="chkskill[]" id="chkLI" class="skills" value="5" /> Linguistics
									</label></br>-->
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12"  id="System_Interface"> 
									<!--<label><input type="checkbox" name="chkskill" id="chkALL" class="AnySkill" value="ALL" /> System selected skills</label>-->
									<label class="lab label_design" id="SYS_SKILL">
										<span class="">
											<span class="">
												<input class="AnySkill lab_input" name="chkskill" type="checkbox" id="chkALL" value="ALL">
											</span>
											<span class=""></span>
										</span>
										<span class="view_box">
											<div class=""><div class="heading_reg font10">System generated skills</div> </div>
										</span>
									</label>
								</div>
							</form>
						</div> 
						<div class="error_2"></div>
					</div>
				</div>
			</div> 
			<div class="modal-footer">
				<button type="button" id="btnSelectSkills" class="btn btn-default" >Submit</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	
	fancyCall();
	//MyGames(); 
<?php 
if(isset($this->session->Trial_Skillid) && $this->session->Trial_Skillid!='')
{	
?>
	//alert('outer if');
	MyGames();
<?php
}
else
{
	
	if($this->config->item('demo_skill_count')==5)
	{
	?>
		
		autoselectedSkills();
	<?php
	}
	else
	{
?> 
		 

		$('#SKILLMODAL').modal
		({
			backdrop: 'static',
			keyboard: false
		});
<?php
	}
}
?>

});

function autoselectedSkills()
{
	$('#loading').show();
	$.ajax({
		type: "POST", 
		url: "<?php echo base_url(); ?>index.php/trial/autoselectedSkills",
		data: {},
		success: function(result)
		{
			 MyGames();
		}
	});  
}

function MyGames()
{
	$('#loading').show();
	$.ajax({
		type: "POST", 
		url: "<?php echo base_url(); ?>index.php/trial/trial_ajax",
		data: {},
		success: function(data)
		{ 
			 $('#loading').hide();
			 $('#ajaxcontent').html(data);
			  fancyCall(); 
		}
	});  
}
function fancyCall()
{
	$("a.gamepopup").each(function() {
	var tthis = this;
	$(this).fancybox({
	'transitionIn'    :    'elastic',
	'transitionOut'    :    'elastic',
	'speedIn'     :    600,
	'speedOut'     :    200,
	'overlayShow'    :    false,
	 
	'type'   : 'iframe',       // tell the script to create an iframe
	'scrolling'   : 'no',
	'idleTime': false,
	 
	'href'          : $(this).attr('data-href'),
	helpers     : { 
		overlay : {closeClick: false} // prevents closing when clicking OUTSIDE fancybox
	},
	keys : {
		// prevents closing when press ESC button
		close  : null
	},
	'afterClose': function ()
	{
		if($("#hdnNextGameId").val()!='NEXT')
		{ 
			MyGames();		
		}
	},
	beforeShow : function()
	{ 
		$(".fancybox-inner").addClass("fancyGameClass");
		$.ajax({
			type: "POST",
			//url: "gameajax.php",
			url: "<?php echo base_url(); ?>index.php/trial/gamesajax",
			data: {gameurl:$(tthis).attr('data-href')},
			success: function(result){ 
				if($.trim(result)=='IA')
				{
					$.fancybox.close();
				}
				else
				{
					$("#hdnTotalGame").val($.trim(result));
				}
			}
		});
	}
	});
});

} 
/* $(document).on("click",".gamebtn",function() { 
	    $("#gamename").val($(this).attr('data-gamename'));
	    $("#gameid").val($(this).attr('id'));
		
		var form = document.getElementById("frmgamesubmit");
		form.submit();
});
 */
$(document).on("click",".AnySkill",function() {
	    $(".skills").attr("checked",false);$("#hdnSelection").val("SYS");
		
		$("#SYS_SKILL").addClass('selected_skills');
		$(".USER_SKILLS").removeClass('selected_skills');
});
$(document).on("click",".skills",function() {
	    $(".AnySkill").attr("checked",false);$("#hdnSelection").val("USER");
		
		var id=$(this).attr('data-gs_id');
		//alert($("#lab_"+id).hasClass('selected_skills'));
		if($("#lab_"+id).hasClass('selected_skills'))
		{
			$("#lab_"+id).removeClass('selected_skills'); 
		}
		else
		{
			$("#lab_"+id).addClass('selected_skills'); 
		}
		
		$("#SYS_SKILL").removeClass('selected_skills');
});
$(document).on("click","#btnSelectSkills",function() {
	 
	var AnySkill=$(".AnySkill:checkbox:checked").length;
	var User_selection=$(".skills:checkbox:checked").length;
	
	 /* alert($(".AnySkill:checkbox:checked").length);
	 alert($(".skills:checkbox:checked").length);return false; */
	 
	if(User_selection==<?php echo $this->config->item('demo_skill_count'); ?> || AnySkill==1)
	{
		$(".error_2").html("");
		var form = $('#frmskills')[0];
		var formData = new FormData(form);
		 
		$.ajax({
			type: "POST", 
			url: "<?php echo base_url(); ?>index.php/trial/selectedSkills",
			data: formData,
			contentType: false,       
			cache: false,             
			processData:false, 
			success: function(result)
			{ 
				if(result==1)
				{
					MyGames(); 
					$('#SKILLMODAL').modal('toggle'); 
				}
			}
		});
	}
	else if(AnySkill==0 && User_selection==0)
	{
		$(".error_2").html("Please select any one").show();
	}
	else if(User_selection><?php echo $this->config->item('demo_skill_count'); ?>)
	{
		$(".error_2").html("Select only <?php echo $this->config->item('demo_skill_count'); ?> skills").show();
	}
	else if(User_selection<<?php echo $this->config->item('demo_skill_count'); ?>)
	{
		$(".error_2").html("Select atleast <?php echo $this->config->item('demo_skill_count'); ?> skills ").show();
	}
	
	
});
$(document).on("click",".View_Report",function() {
	
	var skillid=$(this).attr("id"); 
	$(".Skill_Report").hide();
	$("#r"+skillid).show();
	document.getElementById("MyReport").style.width = "100%";
	document.getElementById("MyReport").style.height = "100%";
});
 
 /* Set the width of the side navigation to 250px */
	function openReport()
	{ 
		document.getElementById("MyReport").style.width = "100%";
		document.getElementById("MyReport").style.height = "100%";
	}

	/* Set the width of the side navigation to 0 */
	function closeReport()
	{
		document.getElementById("MyReport").style.width = "0";
	}
</script> 