
 <link href="<?php echo base_url(); ?>assets/css/commonstyle.css" rel="stylesheet">
 <link href="<?php echo base_url(); ?>assets/css/fancy/jquery.fancybox.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/fancy/fullscreen.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/css/fancy/jquery.fancybox.js"></script>
<input type="hidden"  name="hdnNextGameId" id="hdnNextGameId" value="" />
<input type="hidden"  name="hdnTotalGame" id="hdnTotalGame" value="" />
<div id="loadingimage"></div>
<div id="wrapper">
<!-- Coontent Start here -->
<div class="container">
	<div id="ajaxcontent" style="min-height:600px;margin-top: 80px;">
		<!--My games starts here -->
		
		<!--my games ends here-->
	</div>
</div>


<!--<div id="SKILLMODAL" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
 <div style="display:none;" id="loadingimg" class="loading">Loading...</div>
	<div class="modal-dialog">
		<div class="modal-content"> 
		  <div class="modal-header">  
		  <h1 type="hidden" id="hdnusrid" name="hdnusrid" value="" data-aid="<?php echo $animatordetails[0]['atl_id']; ?>"></h2>
			  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			  <h1 class="text-center"> Select your skills</h1> 
			  <div class="col-md-12" style="width:100%">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="text-center"> 
								<label> Select your skills for trial </label>
								<input type="checkbox" name="chkskill" id="chkME" value="1" /><br/>
								<input type="checkbox" name="chkskill" id="chkVP" value="2" /><br/>
								<input type="checkbox" name="chkskill" id="chkFA" value="3" /><br/>
								<input type="checkbox" name="chkskill" id="chkPS" value="4" /><br/>
								<input type="checkbox" name="chkskill" id="chkLI" value="5" /><br/>
							</div>
						</div>
						<div class="panel-body">
							<div class="text-center"> 
								<label><input type="checkbox" name="chkskill" id="chkALL" value="ALL" />System selected skills</label>
							</div>
						</div>
					</div>
				</div>
		  </div> 
		</div>
	</div>
</div>-->

<script type="text/javascript">
$(document).ready(function(){
	fancyCall();
	MyGames();
	//$('#SKILLMODAL').modal('show');
});
function MyGames()
{
	$('#loadingimage').show();
	$.ajax({
		type: "POST", 
		url: "<?php echo base_url(); ?>index.php/home/trial_ajax",
		data: {},
		success: function(result)
		{
			 $('#loadingimage').hide();
			 $('#ajaxcontent').html(result);
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
	/*'width'  : 750,           // set the width
	'height' : 500,  */         // set the height
	'type'   : 'iframe',       // tell the script to create an iframe
	'scrolling'   : 'no',
	'idleTime': false,
	/* 'href'          : $(this).attr('data-href'), */
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
		/* $(".fancybox-inner").addClass("fancyGameClass");
		$.ajax({
			type: "POST",
			//url: "gameajax.php",
			url: "<?php echo base_url(); ?>index.php/sa/gameajax",
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
		}); */
	}
	});
});

}

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
<style>
#wrapper{margin:20px 0px;}
.contentbox{clear: both;}
.gamebox{background: #2e8683;border-radius: 5px;margin: 10px 0px;padding: 0 0 10px 0px;overflow:hidden;}
.Skill_head{color: #fff;}
.stcounter .stcounter-value{color: #000;}
.View_Report{border: 2px solid #706f6d;}
.counter:before, .counter:after{content: none;}
.counter .counter-content:before, .counter .counter-content:after{content: none;}
.counter .counter-content{animation: none;}
.counter{    padding-top: 10px;
    background: #fff;
    border: 5px solid;
    
    }
.daily_puzzles
{
	background: linear-gradient(90deg,#cfd,#fff,#cfd,#fafafa) !important;
	overflow: hidden;
}
.stcounter .stcounter-content{padding:0px !important;}
.stcounter .stcounter-value{margin: 0 !important;font-size: 24px !important;}
.dailypuzzle_over{text-align: center;background: #ccc;padding: 10px;border-radius: 5px;}
.Skill_head{font-size:15px !important;}
.staractive{width:25px !important;}
.starinactive{width:25px !important;}
</style>
