<?php

$bgcolor=array("1"=>"MemoryGame","2"=>"VisualProcessingGame","3"=>"FocusGame","4"=>"ProblemSolvingGame","5"=>"LinguisticsGame");
$btncolor=array("1"=>"btn-success-red","2"=>"btn-success-yellow","3"=>"btn-success-green","4"=>"btn-success-orange","5"=>"btn-success-blue");

$bordercolor=array("1"=>"#f00","2"=>"#ffc000","3"=>"#92d050","4"=>"#ff6600","5"=>"#00b0f0"); 

$bordercolor=array("1"=>"#f00","2"=>"#ccc","3"=>"#92d050","4"=>"#ccc","5"=>"#ccc"); 

$starcolor=array("1"=>"memoryStar","2"=>"VPStar1","3"=>"FAStar1","4"=>"PSStar1","5"=>"linguisticsStar1");  
$scorecolor=array("1"=>"memory","2"=>"VP","3"=>"FA","4"=>"PS","5"=>"linguistics");  
$actualGameCategory=array('Memory'=>'Memory','Visual Processing'=>'Visual Processing','Focus & Attention'=>'Focus & Attention','Problem Solving'=>'Problem Solving','Linguistics'=>'Linguistics');
$skillDescription=array('The ability to store and recall information.'=>'The ability to store and recall information.','The ability to perceive'=>'The ability to perceive','The ability to sustain and attend to incoming information.'=>'The ability to sustain and attend to incoming information.','The ability to reason'=>'The ability to reason','The test evaluates the ability to recollect and process words or concepts in correlation with a particular language learnt over a period of a time.'=>'The test evaluates the ability to recollect and process words or concepts in correlation with a particular language learnt over a period of a time.');
 
$newcolor=array("1"=>"red","2"=>"yellow","3"=>"green","4"=>"orange","5"=>"blue"); 
 
$imgicon=array("1"=>"me.png","2"=>"vp.png","3"=>"fa.png","4"=>"ps.png","5"=>"li.png"); 


$freetrial=array("1"=>"FT","2"=>"PT","3"=>"FT","4"=>"PT","5"=>"PT"); 
 
//$gameDescription=array();
?>
<div class="col-md-12 col-sm-12 col-xs-12 text-center">
	<div class="container">
	<?php
		if($TotalPlayedskills[0]['PlayedSkillCount']>=5)
		{
			echo "<h3 class='dailypuzzle_over'>Well done! You have completed the Initial Assessment. See you tomorrow.</h3>";
		}
	?> 
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 text-center">
	<h2 style="text-align:center;font-family: 'Play-Bold' !important;">Welcome, <?php echo $this->session->fname; ?></h2>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 text-right">
	 <a href="<?php echo base_url(); ?>index.php/home/productpricing" class="free_trial" style="font-size:21px;">Buy Plan</a>
</div>

<div class="col-md-12" style="width:100%">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="text-center"> 
								<label> Select any 2 skills for trial :</label>
								<input type="checkbox" name="chkskill" id="chkME" value="1" /> Memory 
								<input type="checkbox" name="chkskill" id="chkVP" value="2" /> Visual Processing
								<input type="checkbox" name="chkskill" id="chkFA" value="3" /> Focus & Attention
								<input type="checkbox" name="chkskill" id="chkPS" value="4" /> Problem Solving
								<input type="checkbox" name="chkskill" id="chkLI" value="5" /> Linguistics
							</div>
						</div>
						<div class="panel-body">
							<div class="text-center"> 
								<label><input type="checkbox" name="chkskill" id="chkALL" value="ALL" /> System selected skills</label>
							</div>
						</div>
					</div>
				</div>
				
<div class="contentbox">
	
	
		<?php $new=1; 
		foreach($GameDetails as $games)
		{ 
			if($freetrial[$games['Skill_ID']]=='FT')
			{
			//echo "<pre>";print_r($games);exit;
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
			
			$avg_game_score=$games['tot_game_score'];
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
				if($freetrial[$games['Skill_ID']]=='FT')
				{
					if($games['tot_ques_attend']==0 && $games['tot_ques_attend']!='TO')
					{
						$btnText="Play";$btnclass="";$PlayStatus=$this->lang->line("yet_play");
						$GameLink=base_url()."assets/swf/trial/".$this->session->gamepath."games.php?gamename=".$games['Game_Path']."&gamelang=EnglishQuestionText&sitetype=WEB";
						$PlayStatusIcon="statusNotPlayIcon";$popuplink='gamepopup';
					}
					else if($games['tot_ques_attend']==10)
					{
						$btnText="Played";$btnclass='Not_Active';$GameLink="javascript:;";$PlayStatus=$this->lang->line("completed");$PlayStatusIcon="statusCompletedIcon";$popuplink='';
					}
					else if($games['tot_ques_attend']>0 && $games['tot_ques_attend']!='TO')
					{
						$btnText="Continue";$btnclass="";$PlayStatus=$this->lang->line("incomplete");
						$GameLink=base_url()."assets/swf/trial/".$this->session->gamepath."games.php?gamename=".$games['Game_Path']."&gamelang=EnglishQuestionText&sitetype=WEB";
						$PlayStatusIcon="statusInCompletedIcon";$popuplink='gamepopup';
					}
					else if($games['tot_ques_attend']=='TO')
					{
						$btnText="Time Over";$btnclass='Not_Active';$GameLink="javascript:;";$PlayStatus=$this->lang->line("incomplete");
						$PlayStatusIcon="statusInCompletedIcon";$popuplink='';
					}
				}
				else
				{
					$btnText="BUY";$btnclass='Not_Active';$GameLink="javascript:;";$PlayStatus=$this->lang->line("completed");$PlayStatusIcon="statusCompletedIcon";$popuplink='';
				}
			?>
				<div class="col-sm-5ths col-lg-5ths col-md-5ths col-xl-5ths" >
					<div class="gamebox" style="background:<?php echo $bordercolor[$games['Skill_ID']]; ?>">
						<h3 class="Skill_head"><!--<a style="top:-5px;position:relative;" href="javascript:;" data-toggle="tooltip" data-placement="top" data-html="true" title='<div class=""><span class="clsskilldescription"><?php echo $skillDescription[$games['Skill_Description']];   ?> </span></div>'><i  style="color:#1f7096; font-size:16px;" class="fa fa-info-circle"></i></a>--><?php echo $actualGameCategory[$games['Skill_Name']];?></h3>
						<div class="counter <?php echo $newcolor[$new]; ?>" style="border-color:<?php echo $bordercolor[$games['Skill_ID']]; ?>;">
							<div class="counter-content" style="border-radius:0px;">										
								<div class="counter-icon">
									<img src="<?php echo base_url(); ?>assets/game-img/<?php echo $imgicon[$games['Skill_ID']]; ?>" alt="<?php echo $games['Skill_Name'];?>">
								</div>  
							</div>
							
						</div>
						<div class="col-lg-12">
							<a class="gamebtn fancybox fancybox.iframe imgactive <?php echo $popuplink; ?> viewMoreBtn <?php echo $btnclass;?> <?php echo $freetrial[$games['Skill_ID']]; ?>" href="<?php echo $GameLink;?>" data-href="<?php echo $games['Game_Path'];?>" title="<?php echo $btnText; ?>" id="<?php echo $games['gid']; ?>" ><?php echo $btnText; ?></a>
						</div>
						<div class="col-lg-12 star_box" style="border: 4px solid <?php echo $bordercolor[$games['Skill_ID']]; ?>;">
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
									<div   class="View_Report" id="sk_<?php echo $games['Skill_ID']; ?>" >Score</div>
								</div>
								<div class="stcounter-content" style="border-color: #fff;">
									<span class="stcounter-value"><?php if($games['tot_game_score']!=''){echo $games['tot_game_score'];}else{echo "-";} ?> </span> 
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
</div>
 