

<?php

$bgcolor=array("1"=>"MemoryGame","2"=>"VisualProcessingGame","3"=>"FocusGame","4"=>"ProblemSolvingGame","5"=>"LinguisticsGame");
$btncolor=array("1"=>"btn-success-red","2"=>"btn-success-yellow","3"=>"btn-success-green","4"=>"btn-success-orange","5"=>"btn-success-blue");

$bordercolor=array("1"=>"#f00","2"=>"#ffc000","3"=>"#92d050","4"=>"#ff6600","5"=>"#00b0f0","6"=>"#00b0f0"); 

$bordercolor=array("1"=>"#f00","2"=>"#ffc000","3"=>"#92d050","4"=>"#ff6600","5"=>"#00b0f0","6"=>"#00b0f0"); 

$starcolor=array("1"=>"memoryStar","2"=>"VPStar1","3"=>"FAStar1","4"=>"PSStar1","5"=>"linguisticsStar1");  
$scorecolor=array("1"=>"memory","2"=>"VP","3"=>"FA","4"=>"PS","5"=>"linguistics","6"=>"Patterns");  
$actualGameCategory=array('Memory'=>'Memory','Visual Processing'=>'Visual Processing','Focus & Attention'=>'Focus & Attention','Problem Solving'=>'Problem Solving','Linguistics'=>'Linguistics','Patterns'=>'Patterns');
$skillDescription=array('The ability to store and recall information.'=>'The ability to store and recall information.','The ability to perceive'=>'The ability to perceive','The ability to sustain and attend to incoming information.'=>'The ability to sustain and attend to incoming information.','The ability to reason'=>'The ability to reason','The test evaluates the ability to recollect and process words or concepts in correlation with a particular language learnt over a period of a time.'=>'The test evaluates the ability to recollect and process words or concepts in correlation with a particular language learnt over a period of a time.');
 
$newcolor=array("1"=>"red","2"=>"yellow","3"=>"green","4"=>"orange","5"=>"blue","6"=>"blue"); 
 
$imgicon=array("1"=>"me.png","2"=>"vp.png","3"=>"fa.png","4"=>"ps.png","5"=>"li.png","6"=>"pa.png"); 
$skillheadclass=array("1"=>"memory-bg","2"=>"visual-bg","3"=>"focus-bg","4"=>"problem-bg","5"=>"linguistics-bg"); 


$freetrial=array("1"=>"FT","2"=>"PT","3"=>"FT","4"=>"PT","5"=>"PT","6"=>"PT"); 

if($this->config->item('demo_skill_count')==1)
{
	$cls="col-sm-4 col-lg-4 col-md-4 col-xl-4";
	$sub_cls="col-sm-4 col-lg-4 col-md-4 col-xl-4";
}
else if($this->config->item('demo_skill_count')==2)
{
	$cls="col-sm-4 col-lg-4 col-md-4 col-xl-4";
	$sub_cls="col-sm-2 col-lg-2 col-md-2 col-xl-2";
}
else if($this->config->item('demo_skill_count')==3)
{
	$cls="col-sm-3 col-lg-3 col-md-3 col-xl-3";
	$sub_cls="col-sm-1 col-lg-1 col-md-1 col-xl-1";
}
else if($this->config->item('demo_skill_count')==4)
{
	$cls="col-sm-3 col-lg-3 col-md-3 col-xl-3";
	$sub_cls="col-sm-1 col-lg-1 col-md-1 col-xl-1";
}
else if($this->config->item('demo_skill_count')==5)
{
	$cls="col-sm-4 col-lg-15 col-md-15 col-xl-15";
	$sub_cls="col-sm-0 col-lg-0 col-md-0 col-xl-0";
}
//$gameDescription=array();
?> 				
<div class="contentbox">
	<div class="container">
	 
	 <?php if($gameover_status==5) {?>
<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;">
     <span>You have sucessfully completed assessment. <a href="<?php echo base_url();?>index.php/trial/productpricing" style="color:#F16101" >Click here</a> to buy a plan.</span><input style="float:right;    padding: 3px 12px;" type="button"  value="Download Report" name="btndownloadall" id="btndownloadall" class="btn btn-info" /> 

</div> 
 <?php } ?>
	<div class="<?php echo $sub_cls; ?>"></div>
		<?php $new=1; 
		foreach($GameDetails as $games)
		{ 
			//if($freetrial[$games['skill_id']]=='FT')
			if(1==1)
			{
			//echo "<pre>";print_r($GameDetails);exit;
		?>
		<?php 
			$starsWon=0;

			$Stars=array(
			array(
			"Star1"=>"NoStar",
			"Star2"=>"NoStar",
			"Star3"=>"NoStar",
			"Star4"=>"NoStar",
			"Star5"=>"NoStar",
			"Star6"=>"NoStar",
			"Star7"=>"NoStar",
			"Star8"=>"NoStar",
			"Star9"=>"NoStar",
			"Star10"=>"NoStar")
			);
			
			$avg_game_score=$games['score'];
			if($avg_game_score < 20) $filled_stars = 0;
			if($avg_game_score >= 20 && $avg_game_score <= 40)	$filled_stars = 1;
			if($avg_game_score >= 41 && $avg_game_score <= 60)	$filled_stars = 2;
			if($avg_game_score >= 61 && $avg_game_score <= 80)	$filled_stars = 3;
			if($avg_game_score >= 81 && $avg_game_score <= 90)	$filled_stars = 4;
			if($avg_game_score >= 91 && $avg_game_score <= 100)	$filled_stars = 5;
			$TotalStar=5;
			  
			//if($isexpired['conteststatus']==1)
			if(1==1)
			{ 
				if(1==1)//if($freetrial[$games['skill_id']]=='FT')
				{
					$base_url=base_url()."index.php/trial/trialgames";
					if($this->session->grade_id==13 || $this->session->grade_id==14 || $this->session->grade_id==15)
					{ 
					
						$GameLink=base_url()."demo/games.php?gamename=".$games['gamename']."&angurl=".$base_url."&uid=".$this->session->user_id."&gameid=".$games['game_id']."&eid=1&date=".$curdate."&ass_status=0&ass_slot=0&skillkit_id=0&year_status=0&testtype=0&isass2train=0&sndval=0&session_id=".$session_id."&timestamp=".$timestamp."&hashcode=".$hashcode.""; 
										
						if($games['score']=='')
						{
							$btnText="Play";$btnclass="";$PlayStatus=$this->lang->line("yet_play");
							$GameLink=$GameLink;
							$PlayStatusIcon="statusNotPlayIcon";$popuplink='gamepopup_old';
						}
						else if($games['score']>0)
						{
							$btnText="Played";$btnclass='Not_Active';$GameLink="javascript:;";$PlayStatus=$this->lang->line("completed");$PlayStatusIcon="statusCompletedIcon";$popuplink='';
						}
					}
					else
					{
						 
						
						if($games['gametot']==0 && $games['gametot']!='TO')
						{
							$btnText="Play";$btnclass="";$PlayStatus=$this->lang->line("yet_play");
							$GameLink=$GameLink;
							$PlayStatusIcon="statusNotPlayIcon";$popuplink='gamepopup_old';
							$GameLink=base_url()."demo/games.php?gamename=".$games['gamename']."&angurl=".$base_url."&uid=".$this->session->user_id."&gameid=".$games['game_id']."&eid=1&date=".$curdate."&ass_status=0&ass_slot=0&skillkit_id=0&year_status=0&testtype=0&isass2train=0&sndval=0&session_id=".$session_id."&timestamp=".$timestamp."&hashcode=".$hashcode."";
						}
						else if($games['gametot']==10)
						{
							$btnText="Played";$btnclass='Not_Active';$GameLink="javascript:;";$PlayStatus=$this->lang->line("completed");$PlayStatusIcon="statusCompletedIcon";$popuplink='';
							$GameLink="javascript:;";
						}
						else if($games['gametot']>0 && $games['gametot']!='TO')
						{
							$btnText="Continue";$btnclass="";$PlayStatus=$this->lang->line("incomplete");
							$GameLink=$GameLink;
							$PlayStatusIcon="statusInCompletedIcon";$popuplink='gamepopup_old';
							$GameLink=base_url()."demo/games.php?gamename=".$games['gamename']."&angurl=".$base_url."&uid=".$this->session->user_id."&gameid=".$games['game_id']."&eid=1&date=".$curdate."&ass_status=0&ass_slot=0&skillkit_id=0&year_status=0&testtype=0&isass2train=0&sndval=0&session_id=".$session_id."&timestamp=".$timestamp."&hashcode=".$hashcode."";
						}
						else if($games['gametot']=='TO')
						{
							$btnText="Time Over";$btnclass='Not_Active';$GameLink="javascript:;";$PlayStatus=$this->lang->line("incomplete");
							$PlayStatusIcon="statusInCompletedIcon";$popuplink='';
							$GameLink="javascript:;";
						}
					}
					
				}
				 
			?>
				<!--<div class="<?php echo $cls; ?>">
					<div class="gamebox" style="background:<?php echo $bordercolor[$games['skill_id']]; ?>">
						<h3 class="Skill_head" style="border: 5px solid <?php echo $bordercolor[$games['skill_id']]; ?>;"> <?php echo $actualGameCategory[$games['skillname']];?></h3>
						<div class="counter <?php echo $newcolor[$new]; ?>" style="border-color:<?php echo $bordercolor[$games['skill_id']]; ?>;">
							<div class="counter-content" style="border-radius:0px;">										
								<div class="counter-icon">
									<img src="<?php echo base_url(); ?>assets/game-img/<?php echo $imgicon[$games['skill_id']]; ?>" alt="<?php echo $games['skillname'];?>">
								</div>  
							</div>
							
						</div>
						<div class="col-lg-12">
							<a class="gamebtn  imgactive <?php echo $popuplink; ?> viewMoreBtn <?php echo $btnclass;?> <?php echo $freetrial[$games['skill_id']]; ?>" href1="javascript:;" href="<?php echo $GameLink; ?>" data-href1="<?php echo $GameLink;?>" data-href="<?php echo $games['Game_Path'];?>" title="<?php echo $btnText; ?>" id="<?php echo $games['game_id']; ?>" data-gamename="<?php echo $games['gamename']; ?>" data-skillid="<?php echo $games['skill_id']; ?>" ><?php echo $btnText; ?></a>
						</div>
						<div class="col-lg-12 star_box" style="border: 4px solid <?php echo $bordercolor[$games['skill_id']]; ?>;">
							<div class="earnedStars">
								<ul>
									<?php 
									 for($i=0;$i<$filled_stars;$i++){ ?>
										 <img class="staractive" width="80%" src="<?php echo base_url(); ?>assets/images/icon_StarActive.gif">
									 <?php } ?>
									  <?php for($i=0;$i<5-$filled_stars;$i++){  ?>
										 <img class="starinactive" width="80%" src="<?php echo base_url(); ?>assets/images/icon_StarInActive.png">
									 <?php } ?>
								</ul>
							</div>
						</div>
						<div class="col-lg-12" style="text-align: center;margin-top: 30px;">
							<div class="stcounter  <?php echo $newcolor[$new]; ?>">
								<div class="stcounter-icon">
									<div   class="View_Report" id="sk_<?php echo $games['skill_id']; ?>" >Score</div>
								</div>
								<div class="stcounter-content" style="border-color: #fff;">
									<span class="stcounter-value"><?php if($games['score']!=''){echo $games['score'];}else{echo "-";} ?> </span> 
								</div>
							</div>
						</div>  
					</div>  
				</div>-->
				
				<div class="<?php echo $cls; ?>">
					<h3 class="Skill_head <?php echo $skillheadclass[$games['skill_id']]?>"> <?php echo $actualGameCategory[$games['skillname']];?></h3>
					<div class="counter <?php echo $newcolor[$new]; ?>">
						<div class="counter-content">			
							<div class="counter-icon">
								<img src="<?php echo base_url(); ?>assetsnew/game-img/<?php echo $imgicon[$games['skill_id']]; ?>" alt="<?php echo $games['skillname'];?>">
							</div>  
						</div>
					
					<div class="2ndpart">
						<div class="col-lg-12">
							<a class="gamebtn  imgactive <?php echo $popuplink; ?> viewMoreBtn <?php echo $btnclass;?> <?php echo $freetrial[$games['skill_id']]; ?>" href1="javascript:;" href="<?php echo $GameLink; ?>" data-href1="<?php echo $GameLink;?>" data-href="<?php echo $games['Game_Path'];?>" title="<?php echo $btnText; ?>" id="<?php echo $games['game_id']; ?>" data-gamename="<?php echo $games['gamename']; ?>" data-skillid="<?php echo $games['skill_id']; ?>" style="background:<?php echo $bordercolor[$games['skill_id']]; ?>" ><?php echo $btnText; ?></a>
						</div>
						<div class="col-lg-12" style="text-align: center;">
							<div class="earnedStars">
								<ul>
									<?php 
										 for($i=0;$i<$filled_stars;$i++){ ?>
											 <img class="staractive" width="25px" style="width:25px" src="<?php echo base_url(); ?>assetsnew/images/icon_StarActive.gif">
										 <?php } ?>
										  <?php for($i=0;$i<5-$filled_stars;$i++){  ?>
											 <img class="starinactive" width="25px" style="width:25px" src="<?php echo base_url(); ?>assetsnew/images/icon_StarInActive.png">
										 <?php } ?>
								</ul>
							</div>
						</div>

						<div class="col-lg-12" style="text-align: center;margin-top: 30px;">
							<div class="stcounter  <?php echo $newcolor[$new]; ?>">
								<div class="stcounter-icon">
									<a  href="javascript:;" class="View_Report" id="sk_<?php echo $games['skill_id']; ?>" >Score</a>
								</div>
								<div class="stcounter-content">
									<span class="stcounter-value"> <?php if($games['score']!=''){echo $games['score'];}else{echo "-";} ?></span> 
								</div>
							</div>
						</div>  
					</div>
				</div>
				</div>
			<?php 
			} 
			?> 
			 
		<?php
		$new++;
		}
		}
		?>
		<div class="<?php echo $sub_cls; ?>"></div>
		
		<div>
		

		</div>
		
		
</div>


 
<form name="frmgamesubmit" id="frmgamesubmit" action="<?php echo base_url(); ?>demo/games.php" method="POST">
	<input type="hidden" name="gamename" id="gamename" value="" />
	<input type="hidden" name="angurl" id="angurl" value="<?php echo $base_url; ?>" />
	<input type="hidden" name="uid" id="uid" value="<?php echo $this->session->user_id; ?>" />
	<input type="hidden" name="gameid" id="gameid" value="" />
	<input type="hidden" name="eid" id="eid" value="1" />
	<input type="hidden" name="date" id="date" value="<?php echo $curdate; ?>" />
	<input type="hidden" name="ass_status" id="ass_status" value="0" />
	<input type="hidden" name="ass_slot" id="ass_slot" value="0" />
	<input type="hidden" name="skillkit_id" id="skillkit_id" value="0" />
	<input type="hidden" name="year_status" id="year_status" value="0" />
	<input type="hidden" name="testtype" id="testtype" value="0" />
	<input type="hidden" name="isass2train" id="isass2train" value="0" />
	<input type="hidden" name="sndval" id="sndval" value="0" />
	<input type="hidden" name="session_id" id="session_id" value="<?php echo $session_id; ?>" />
	<input type="hidden" name="timestamp" id="timestamp" value="<?php echo $timestamp; ?>" />
	<input type="hidden" name="hashcode" id="hashcode" value="<?php echo $hashcode; ?>" />
</form>
 
<script type="text/javascript">
function forceDownload(url, fileName){
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.responseType = "blob";
    xhr.onload = function(){
        var urlCreator = window.URL || window.webkitURL;
        var imageUrl = urlCreator.createObjectURL(this.response);
        var tag = document.createElement('a');
        tag.href = imageUrl;
        tag.download = fileName;
        document.body.appendChild(tag);
        tag.click();
        document.body.removeChild(tag);
    }
    xhr.send();
}
$(document).ready(function(){
$('#btndownloadall').click(function(){
	 //alert('btndownloadall');
	$.ajax({		
			type: "POST",	
			url: "<?php echo base_url(); ?>reportGenerate_B2Cv1/generate.php",	
			dataType: "json",		
			data: {grade:'<?php echo "Grade ".$fields_ia['grade']; ?>',name:'<?php echo $fields_ia['name']; ?>',crownies:'<?php echo $fields_ia['crownies']; ?>',mem:'<?php echo $fields_ia['mem']; ?>',vp:'<?php echo $fields_ia['vp']; ?>',fa:'<?php echo $fields_ia['fa']; ?>',ps:'<?php echo $fields_ia['ps']; ?>',ling:'<?php echo $fields_ia['ling']; ?>',bspi:'<?php echo $fields_ia['bspi']; ?>',assess:'<?php echo $fields_ia['assess']; ?>',goldtrophy:'<?php echo $fields_ia['goldtrophy']; ?>',silvertrophy:'<?php echo $fields_ia['silvertrophy']; ?>',bronzetrophy:'<?php echo $fields_ia['bronzetrophy']; ?>'},  
			 
			success: function(data)
			{
				forceDownload("<?php echo base_url(); ?>reportGenerate_B2Cv1/reports/"+data.imagename+".png", "Report.png");
				 // alert('success');
				 // alert(data);
				 
				 // window.location.href= "<?php echo base_url(); ?>reportGenerate_B2Cv1/reports/"+data.imagename+".png";
			}
		});
	});
});
</script> 