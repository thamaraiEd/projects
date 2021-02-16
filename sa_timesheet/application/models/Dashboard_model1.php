<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	public function __construct()
	{
	// Call the CI_Model constructor
	parent::__construct();
	$this->load->database();
	$this->load->library('Multipledb');
	}
	 
	public function checkUser($username,$password)
	{
		$query = $this->db->query("SELECT user_id, u_name, u_email, u_role_id, u_username, u_salt1, u_hash, u_salt2, u_orgpwd, u_status, u_created_on, u_modified_on, u_login_count,(SELECT ur_name FROM m7s_user_roles WHERE ur_id=u_role_id) as rolename FROM m7s_users WHERE u_username='".$username."' AND u_hash=SHA1(CONCAT(u_salt1,'".$password."',u_salt2))  and u_status='Y'"); 
		// echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	public function get_actiontypes()
	{
		$query = $this->db->query("SELECT atid, at_name, at_status FROM `m7s_action_type` WHERE at_status='Y'"); 
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	public function get_characters()
	{
		$query = $this->db->query("SELECT `chid`, `ch_name`, `at_status` FROM `m7s_characters` WHERE `at_status`='Y'"); 
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	
		/********************************** Animator Activity ***********************************************/
	public function get_activitylist($userid)
	{
		$query = $this->db->query("SELECT atl_id as rowid,user_id,log_date, start_time, end_time, shot_name, num_of_characters, assigned_frames, assigned_duration, heedio_slapstick, action_type, character_1, character_2, character_3, character_4, character_5, library_available, auto_complexity, manual_complexity, expected_productivity, completed_frame, approved_frames, approved_productivity, deficit, work_hour, remark, lead1_id, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime,mk_comments, status,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_1) as char1,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_2) as char2,is_corrections,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_3) as char3,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_4) as char4,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_5) as char5,(SELECT  at_name FROM m7s_action_type WHERE atid=gg.action_type) as actiontype, 
		(SELECT u_name FROM m7s_users WHERE user_id=gg.lead1_id) as lead1_name,
		(SELECT u_name FROM m7s_users WHERE user_id=gg.lead2_id) as lead2_name,lead1_remarks,lead2_remarks,
		(SELECT type FROM ms7_typeof_work WHERE id=typeof_work) as typeofwork,sub_task
		FROM m7s_animator_time_log gg WHERE user_id=".$userid." AND status=1 ORDER BY log_date DESC"); 
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	
	public function insert_activity($user_id,$curDate,$start_time,$end_time,$txtshotname,$txtnumcharacters,$txtassignedframes,$assigned_duration,$rdheedioslapstick,$ddlactiontype,$ddlcharacter1,$ddlcharacter2,$ddlcharacter3,$ddlcharacter4,$ddlcharacter5,$rdlibraryavailable,$rdmanualcomplexity,$txtcompletedframes,$txtremark,$curDateTime,$ddlsubtask,$ddlworktype)
	{
		$query = $this->db->query("INSERT INTO m7s_animator_time_log(user_id,log_date, start_time, end_time, shot_name, num_of_characters, assigned_frames, assigned_duration, heedio_slapstick, action_type, character_1, character_2, character_3, character_4, character_5, library_available, auto_complexity, manual_complexity, expected_productivity, completed_frame,remark,status,lastupdate,sub_task,last_update_userid,typeof_work) VALUES ('".$user_id."','".$curDate."','".$start_time."','".$end_time."','".$txtshotname."','".$txtnumcharacters."','".$txtassignedframes."','".$assigned_duration."','".$rdheedioslapstick."','".$ddlactiontype."','".$ddlcharacter1."','".$ddlcharacter2."','".$ddlcharacter3."','".$ddlcharacter4."','".$ddlcharacter5."','".$rdlibraryavailable."','".$this->auto_complexity_finder($rdlibraryavailable,$txtnumcharacters,$ddlactiontype)."','".$rdmanualcomplexity."','".$this->expected_productivity_finder($rdmanualcomplexity,$rdheedioslapstick)."','".$txtcompletedframes."','".$txtremark."',1,'".$curDateTime."','".$ddlsubtask."','".$user_id."','".$ddlworktype."')"); 
		//   echo $this->db->last_query(); exit;
		//return $query->result_array();
	}
	
	public function auto_complexity_finder($availableinlib,$numofchar,$ddlactiontype)
	{ 		
		$actiontypeqry = $this->db->query("SELECT `at_type` FROM `m7s_action_type` WHERE atid='".$ddlactiontype."' and `at_status`='Y'"); 
		$actiontypearr =$actiontypeqry->result_array();
		//echo "<pre>"; print_r($actiontype);exit;
		
		$actiontype =$actiontypearr[0]['at_type'];
		if($availableinlib=='Yes' && $numofchar<=3 && $actiontype==1)
		{
			$autocomplexity = 'Simple';
		}
		elseif($availableinlib=='Yes' && $numofchar<=3 && $actiontype==2)
		{
			$autocomplexity = 'Simple';
		}
		elseif($availableinlib=='Yes' && $numofchar>3 && $actiontype==1)
		{
			$autocomplexity = 'Complex';
		}
		elseif($availableinlib=='Yes' && $numofchar>3 && $actiontype==2)
		{
			$autocomplexity = 'Complex';
		}
		elseif($availableinlib=='No' && $numofchar>=0 && $actiontype==1)
		{
			$autocomplexity = 'Complex';
		}
		elseif($availableinlib=='No' && $numofchar<=3 && $actiontype==2)
		{
			$autocomplexity = 'Simple';
		}
		elseif($availableinlib=='No' && $numofchar>3 && $actiontype==2)
		{
			$autocomplexity = 'Complex';
		}
		
		return $autocomplexity;
	}
	
	public function expected_productivity_finder($autooocomplexity,$videotype)
	{
		//	echo 'jj';exit;
		//$getautocomplexity = $this->db->query("SELECT `auto_complexity` FROM `m7s_animator_time_log` WHERE status=1");  
		if($autooocomplexity=='Simple' && $videotype=='Heedio')
		{
			$expectedproductivity = '7'; 
		}
		elseif($autooocomplexity=='Simple' && $videotype=='Slapstick')
		{
			$expectedproductivity = '6'; 
		}
		elseif($autooocomplexity=='Complex' && $videotype=='Heedio')
		{
			$expectedproductivity = '6'; 
		}
		elseif($autooocomplexity=='Complex' && $videotype=='Slapstick')
		{
			$expectedproductivity = '5';
		} 
		//$exp_pro=(($expectedproductivity/100)*$ddlsubtask);
		 
		return $expectedproductivity;
	}
	 /********************************** Animator Activity ***********************************************/
	 /********************************** Bg Artist Activity ***********************************************/
	public function get_bgactivitylist($user_id)
	{
		$query = $this->db->query("SELECT btl_id as rowid,user_id,log_date, start_time, end_time, episode, shot_name, quantity, heedio_slapstick, work_type, expected_productivity, actual_productivity,approved_productivity, deficit, work_hour, remark, lead1_id, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime,mk_comments, status,(SELECT  wt_name FROM m7s_work_type WHERE wtid=btl.work_type and wt_status='Yes') as worktype,is_corrections,(SELECT u_name FROM m7s_users WHERE user_id=btl.lead1_id) as lead1_name,
		(SELECT u_name FROM m7s_users WHERE user_id=btl.lead2_id) as lead2_name,lead1_remarks,lead2_remarks FROM m7s_bgartist_time_log btl WHERE user_id=".$user_id." and status=1 ORDER BY log_date DESC"); 
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	public function get_worktypes()
	{
		$query = $this->db->query("SELECT `wtid`, `wt_name` FROM `m7s_work_type` WHERE wt_status='Yes'"); 
		// echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	
	public function insertbgactivity($user_id,$curDate,$start_time,$end_time,$txtepisode,$txtshotname,$txtquantity,$rdheedioslapstick,$ddlworktype,$txtactualproductivity,$curDateTime,$ddlsubtask)
	{
		$query = $this->db->query("INSERT INTO m7s_bgartist_time_log(user_id,log_date, start_time, end_time, episode, shot_name, quantity, heedio_slapstick, work_type, expected_productivity, actual_productivity,status,lastupdate,sub_task,last_update_userid) VALUES ('".$user_id."','".$curDate."','".$start_time."','".$end_time."','".$txtepisode."','".$txtshotname."','".$txtquantity."','".$rdheedioslapstick."','".$ddlworktype."','".$this->expected_productivity_finder_bgartist($ddlworktype,$rdheedioslapstick,$ddlsubtask)."','".$txtactualproductivity."',1,'".$curDateTime."','".$ddlsubtask."','".$user_id."')"); 
	}
	public function expected_productivity_finder_bgartist($ddlworktype,$videotype,$ddlsubtask)
	{
		$getworktypeqry = $this->db->query("SELECT  `wt_name` FROM `m7s_work_type` WHERE wtid='".$ddlworktype."' and wt_status='Yes'");  
		$worktypearr =$getworktypeqry->result_array();
		$getworktype = $worktypearr[0]['wt_name'];
		//echo "<pre>"; print_r($getworktype);exit;
		 
		if($getworktype=='KeyBG')
		{
			$bgexpectedproductivity = '2'; //echo 'jj';exit;
		}
		elseif($getworktype=='BG')
		{
			$bgexpectedproductivity = '7'; 
		}
		elseif($getworktype=='Simple Props')
		{
			$bgexpectedproductivity = '5'; 
		}
		elseif($getworktype=='Complex Props')
		{
			$bgexpectedproductivity = '2'; 
		}
		elseif($getworktype=='Simple Layout')
		{
			$bgexpectedproductivity = '8'; 
		}
		elseif($getworktype=='Complex Layout')
		{
			$bgexpectedproductivity = '1'; 
		}
		elseif($getworktype=='Sequence Arranging')
		{
			$bgexpectedproductivity = '1'; 
		}
		
		$exp_pro=(($bgexpectedproductivity/100)*$ddlsubtask);
		// echo $bgexpectedproductivity."==".$ddlsubtask."==".$exp_pro;exit;
		return $exp_pro;
	}
	 /********************************** Bg Artist Activity ***********************************************/
	 /********************************** Director ***********************************************/
	 
	public function get_rolelist()
	{
		$query = $this->db->query("SELECT ur_id, ur_name, ur_status FROM m7s_user_roles WHERE ur_status='Y' and ur_id in(1,2) ");
		return $query->result_array();
	}	
	
	public function get_animatordetails($roleid)
	{
		$query = $this->db->query("SELECT atl_id,user_id,(select u_name from m7s_users as u where u.user_id=gg.user_id) as user_name,log_date, start_time, end_time, shot_name, num_of_characters, assigned_frames, assigned_duration, heedio_slapstick, action_type, character_1, character_2, character_3, character_4, character_5, library_available, auto_complexity, manual_complexity, expected_productivity, completed_frame, approved_frames, approved_productivity, deficit, work_hour, remark, lead1_id, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime, status,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_1) as char1,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_2) as char2,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_3) as char3,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_4) as char4,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_5) as char5,(SELECT  at_name FROM m7s_action_type WHERE atid=gg.action_type) as actiontype,
		(SELECT ur_name FROM m7s_user_roles WHERE ur_id=gg.lead1_id) as lead1_name,
		(SELECT ur_name FROM m7s_user_roles WHERE ur_id=gg.lead2_id) as lead2_name,lead2_remarks,
		(SELECT type FROM ms7_typeof_work WHERE id=typeof_work) as typeofwork,sub_task
		FROM m7s_animator_time_log gg WHERE lead1_approved_status='No' and status=1 ORDER BY log_date DESC");
		return $query->result_array();
	}
	
	public function get_bgartistdetails($roleid)
	{
		$query = $this->db->query("SELECT btl_id,user_id,(select u_name from m7s_users as u where u.user_id=btl.user_id) as user_name,log_date, start_time, end_time, episode, shot_name, quantity, heedio_slapstick, work_type, expected_productivity, actual_productivity,approved_productivity, deficit, work_hour, remark, lead1_id, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime, status,(SELECT  wt_name FROM m7s_work_type WHERE wtid=btl.work_type and wt_status='Yes') as worktype,(SELECT ur_name FROM m7s_user_roles WHERE ur_id=btl.lead1_id) as lead1_name,(SELECT ur_name FROM m7s_user_roles WHERE ur_id=btl.lead2_id) as lead2_name,lead2_remarks FROM m7s_bgartist_time_log btl WHERE lead1_approved_status='No' and status=1");
		return $query->result_array();
	}
	//UPDATE users SET otp="" where  id="'.$userid.'"
	
		
	/********************************** Director ***********************************************/
	
	public function getAnimaterDay($Animater_id,$logdate,$rowid)
	{
		$query = $this->db->query("SELECT * from m7s_animator_time_log where user_id=".$Animater_id." and log_date='".$logdate."' and atl_id='".$rowid."' ");
		return $query->result_array();
	}
	
	public function Update_Activity($curDate,$start_time,$end_time,$txtshotname,$txtnumcharacters,$txtassignedframes,$assigned_duration,$rdheedioslapstick,$ddlactiontype,$ddlcharacter1,$ddlcharacter2,$ddlcharacter3,$ddlcharacter4,$ddlcharacter5,$rdlibraryavailable,$rdmanualcomplexity,$txtcompletedframes,$txtremark,$curDateTime,$user_id,$ddlsubtask,$rowid,$update_user_id=null,$ddlworktype)
	{ 
		 
		$query = $this->db->query("Update m7s_animator_time_log SET log_date='".$curDate."',start_time='".$start_time."', end_time='".$end_time."',shot_name='".$txtshotname."',num_of_characters='".$txtnumcharacters."',assigned_frames='".$txtassignedframes."',assigned_duration='".$assigned_duration."',heedio_slapstick='".$rdheedioslapstick."', action_type='".$ddlactiontype."', character_1='".$ddlcharacter1."', character_2='".$ddlcharacter2."', character_3='".$ddlcharacter3."', character_4='".$ddlcharacter4."', character_5='".$ddlcharacter5."', library_available='".$rdlibraryavailable."', auto_complexity='".$this->auto_complexity_finder($rdlibraryavailable,$txtnumcharacters,$ddlactiontype)."', manual_complexity='".$rdmanualcomplexity."', expected_productivity='".$this->expected_productivity_finder($rdmanualcomplexity,$rdheedioslapstick)."', completed_frame='".$txtcompletedframes."',remark='".$txtremark."',modifieddate='".$curDateTime."',sub_task='".$ddlsubtask."',last_update_userid='".$update_user_id."',typeof_work='".$ddlworktype."' where  log_date='".$curDate."' and user_id='".$user_id."' and atl_id='".$rowid."' ");
	}
	
	public function getBgartistDay($Bgartist_id,$logdate,$rowid)
	{
		$query = $this->db->query("SELECT * from m7s_bgartist_time_log where user_id=".$Bgartist_id." and log_date='".$logdate."' and btl_id=".$rowid."  ");
		return $query->result_array();
	}
	
	public function Update_BgActivity($curDate,$start_time,$end_time,$txtepisode,$txtshotname,$txtquantity,$rdheedioslapstick,$ddlworktype,$txtactualproductivity,$curDateTime,$user_id,$ddlsubtask,$rowid,$update_user_id=null)
	{
		//echo $this->expected_productivity_finder_bgartist($ddlworktype,$rdheedioslapstick,$ddlsubtask);exit;
		$query = $this->db->query("Update m7s_bgartist_time_log SET log_date='".$curDate."',start_time='".$start_time."', end_time='".$end_time."',episode='".$txtepisode."',shot_name='".$txtshotname."',quantity='".$txtquantity."',heedio_slapstick='".$rdheedioslapstick."',work_type='".$ddlworktype."',actual_productivity='".$txtactualproductivity."',expected_productivity='".$this->expected_productivity_finder_bgartist($ddlworktype,$rdheedioslapstick,$ddlsubtask)."',modifieddate='".$curDateTime."',sub_task='".$ddlsubtask."',last_update_userid='".$update_user_id."' where  log_date='".$curDate."' and user_id='".$user_id."' and btl_id='".$rowid."' ");
	}
	
	
	public function checkUserPwd($user_id)
	{
		$query = $this->db->query("SELECT u_orgpwd from m7s_users where user_id=".$user_id." and u_status='Y' ");
		return $query->result_array();
	}
	
	public function updatepwd($user_id,$curDateTime,$salt1,$saltedpass,$salt2,$txtpwd)
	{
		$query = $this->db->query("INSERT INTO `m7s_pwd_log`( `user_id`, `new_pwd`, `created_on`,status) VALUES ('".$user_id."','".$txtpwd."','".$curDateTime."',1) ");   
		
		$query = $this->db->query("Update m7s_users SET u_salt1='".$salt1."', u_hash='".$saltedpass."', u_salt2='".$salt2."', u_orgpwd='".$txtpwd."',u_modified_on='".$curDateTime."' where user_id='".$user_id."' and  u_status='Y' "); 
	} 
	
	/* public function get_approve_animatordetails($uid) 
	{
		$query = $this->db->query("SELECT * from m7s_animator_time_log where user_id=".$uid." and status=1 ");
		return $query->result_array();
	} */

	/* public function update_approvestats($aid,$txtapproveframe,$txtdirectorremarks,$approvedproductivity,$deficit,$workhour)
	{
		$query = $this->db->query("UPDATE m7s_animator_time_log SET lead1_approved_status='Yes',approved_frames='".$txtapproveframe."',lead1_remarks='".$txtdirectorremarks."',approved_productivity ='".$approvedproductivity."',deficit='".$deficit."', work_hour='".$workhour."' WHERE atl_id='".$aid."' and status=1");
		  // echo $this->db->last_query(); exit;
	} */
	 
    /*----- BG Admin ----*/
	/* public function get_approve_bgartistdetails($uid) 
    {
        $query = $this->db->query("SELECT * from m7s_bgartist_time_log where user_id=".$uid." and status=1 ");
        return $query->result_array();
    }
    public function update_bgapprovestats($aid,$txtapproveproductivity,$txtdirectorremarks,$deficit,$workhour,$curDateTime)
    {
        $query = $this->db->query("UPDATE m7s_bgartist_time_log SET lead1_approved_status='Yes',approved_productivity='".$txtapproveproductivity."',lead1_remarks='".$txtdirectorremarks."',deficit='".$deficit."', work_hour='".$workhour."',modifieddate='".$curDateTime."' WHERE btl_id='".$aid."' and status=1");
        //echo $this->db->last_query(); exit;
    } */
	
	
	public function getTodayAddedActivityRecord($userid,$logdate)
	{
		$query = $this->db->query("SELECT count(*) as TotalRecord from m7s_animator_time_log where user_id=".$userid." and log_date='".$logdate."'  ");
		return $query->result_array();
	}
	public function getAni_TodayAddedProductivityRecord($userid,$logdate)
	{
		$query = $this->db->query("SELECT count(*) as TotalRecord from m7s_animator_time_log where user_id=".$userid." and log_date='".$logdate."'");
		
		return $query->result_array();
	}
	public function getBg_TodayAddedProductivityRecord($userid,$logdate)
	{
		$query = $this->db->query("SELECT count(*) as TotalRecord from m7s_bgartist_time_log where user_id=".$userid." and log_date='".$logdate."'");
		
		return $query->result_array();
	}
	
	/*-------- Report Work ----- -*/
	public function getMonthofYear($start_date,$end_date)
	{
		$query = $this->db->query("select CONCAT(month(CURDATE()),'-',year(CURDATE())) as current_monyear, MONTHNAME(selected_date) as MonthName,month(selected_date) as Month,Year(selected_date) as Year from (select selected_date,dayname(selected_date) as nameofday, (FLOOR((DAYOFMONTH(selected_date) - 1) / 7) + 1) as weekval from (select adddate('1970-01-01',t4.i*10000 + t3.i*1000 + t2.i*100 + t1.i*10 + t0.i) selected_date from (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0, (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1, (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2, (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t3, (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t4) v where selected_date between '".$start_date."' and '".$end_date."' ) as a1,(SELECT @a:= 0) AS a group by month(selected_date)");
		
		//echo $this->db->last_query(); exit;
		
		return $query->result_array();
	}
	public function getUserDayData($user_id,$month_year)
	{
		$query = $this->db->query("SELECT  DATE_FORMAT(log_date,'%d-%M') as day,log_date,SUM(approved_productivity) as approved_productivity,avg(expected_productivity) as expected_productivity, (select percentage from ms7_animator_day_percentage adp where userid=".$user_id." and adp.log_date=atl.log_date) as daypercentage from m7s_animator_time_log atl where typeof_work=1 and user_id=".$user_id."  and CONCAT(month(log_date),'-',year(log_date))='".$month_year."' and lead1_approved_status='Yes'  group by log_date");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	
	public function getBGAUserDayData($user_id,$month_year)
	{
		$query = $this->db->query("SELECT  DATE_FORMAT(log_date,'%d-%M') as day,log_date,SUM(approved_productivity) as approved_productivity,avg(expected_productivity) as expected_productivity from m7s_bgartist_time_log where user_id=".$user_id."  and CONCAT(month(log_date),'-',year(log_date))='".$month_year."' and lead1_approved_status='Yes'  group by log_date");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	
	public function getAllRoleUser()
	{
		$query = $this->db->query("SELECT user_id,u_name,u_email,u_username,u_role_id,(select ur_name from m7s_user_roles where u_role_id=ur_id) as Rolename from m7s_users where u_role_id in(1,2) and u_status='Y'  and isdemouser='NO' ");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	
	public function getDirUserDayData($user_id,$roleid,$month_year)
	{
		if($roleid==1){$tbl="m7s_animator_time_log";}
		if($roleid==2){$tbl="m7s_bgartist_time_log";}
		if($roleid==1){
		$query = $this->db->query("SELECT ".$roleid." as role, DATE_FORMAT(log_date,'%d-%M') as day,log_date,SUM(approved_productivity) as approved_productivity,avg(expected_productivity) as expected_productivity, (select percentage from ms7_animator_day_percentage adp where userid=".$user_id." and adp.log_date=atl.log_date) as daypercentage from m7s_animator_time_log atl where typeof_work=1 and user_id=".$user_id."  and CONCAT(month(log_date),'-',year(log_date))='".$month_year."' and lead1_approved_status='Yes'  group by log_date");
		}
		if($roleid==2){
		$query = $this->db->query("SELECT ".$roleid." as role, DATE_FORMAT(log_date,'%d-%M') as day,log_date,SUM(approved_productivity) as approved_productivity,avg(expected_productivity) as expected_productivity from ".$tbl." where user_id=".$user_id."  and CONCAT(month(log_date),'-',year(log_date))='".$month_year."'  and lead1_approved_status='Yes'  group by log_date");
		}
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
/*--------------- Monthly Report ---------------*/
	function ani_MonthwiseSummary($user_id,$month_year)
	{
		$query = $this->db->query("select CONCAT(Month,'-',year) as Month,sum(deficit) as deficit,sum(Avg_Productivity) as Avg_Productivity from (SELECT DATE_FORMAT(log_date,'%M') as Month,year(log_date) as year,CONCAT(month(log_date),'-',year(log_date)) as monthYear,SUM(approved_productivity) as approved_productivity,avg(expected_productivity) as expected_productivity,(expected_productivity-approved_productivity) as deficit,((approved_productivity/expected_productivity)*100) as Avg_Productivity  from m7s_animator_time_log where user_id=".$user_id." and lead1_approved_status='Yes' group by log_date) as a1 group by monthYear order by month DESC");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	function bg_MonthwiseSummary($user_id,$month_year)
	{
		$query = $this->db->query("select CONCAT(Month,'-',year) as Month,sum(deficit) as deficit,sum(Avg_Productivity) as Avg_Productivity from (SELECT DATE_FORMAT(log_date,'%M') as Month,year(log_date) as year,CONCAT(month(log_date),'-',year(log_date)) as monthYear,SUM(approved_productivity) as approved_productivity,avg(expected_productivity) as expected_productivity,(expected_productivity-approved_productivity) as deficit,((approved_productivity/expected_productivity)*100) as Avg_Productivity  from m7s_bgartist_time_log where user_id=".$user_id." and lead1_approved_status='Yes' group by log_date) as a1 group by monthYear order by month DESC");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	public function dir_MonthwiseSummary($user_id,$roleid,$month_year)
	{
		if($roleid==1){$tbl="m7s_animator_time_log";}
		if($roleid==2){$tbl="m7s_bgartist_time_log";}
		
		$query = $this->db->query("select CONCAT(Month,'-',year) as Month,sum(deficit) as deficit,sum(Avg_Productivity) as Avg_Productivity from (SELECT DATE_FORMAT(log_date,'%M') as Month,year(log_date) as year,CONCAT(month(log_date),'-',year(log_date)) as monthYear,SUM(approved_productivity) as approved_productivity,avg(expected_productivity) as expected_productivity,(expected_productivity-approved_productivity) as deficit,((approved_productivity/expected_productivity)*100) as Avg_Productivity  from ".$tbl." where user_id=".$user_id." and lead1_approved_status='Yes' group by log_date) as a1 group by monthYear order by month DESC");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	
	public function get_approve_animatordetails($aid,$uid) 
	{
		$query = $this->db->query("SELECT * from m7s_animator_time_log where atl_id='".$aid."' and user_id='".$uid."' and status=1 ");
		return $query->result_array();
	}
	
	public function update_approvestats($aid,$uid,$txtapproveframe,$txtdirectorremarks,$approvedproductivity,$deficit,$workhour,$curDateTime,$leadid)
	{
		$query = $this->db->query("UPDATE m7s_animator_time_log SET lead1_approved_status='Yes',approved_frames='".$txtapproveframe."',lead1_remarks='".$txtdirectorremarks."',approved_productivity ='".$approvedproductivity."',deficit='".$deficit."', work_hour='".$workhour."',lastupdate='".$curDateTime."',lead1_id='".$leadid."',lead1_approved_datetime='".$curDateTime."' WHERE atl_id='".$aid."' and user_id='".$uid."' and status=1");
		  // echo $this->db->last_query(); exit;
	}
	
	public function get_approve_bgartistdetails($aid,$uid)
    {
        $query = $this->db->query("SELECT * from m7s_bgartist_time_log where user_id=".$uid." and btl_id='".$aid."' and status=1 ");
        return $query->result_array();
    }
	
    public function update_bgapprovestats($aid,$uid,$txtapproveproductivity,$txtdirectorremarks,$deficit,$workhour,$curDateTime,$leadid)
    {
        $query = $this->db->query("UPDATE m7s_bgartist_time_log SET lead1_approved_status='Yes',approved_productivity='".$txtapproveproductivity."',lead1_remarks='".$txtdirectorremarks."',deficit='".$deficit."', work_hour='".$workhour."',modifieddate='".$curDateTime."',lead1_approved_datetime='".$curDateTime."',lead1_id='".$leadid."',lastupdate='".$curDateTime."' WHERE btl_id='".$aid."' and user_id='".$uid."' and status=1");
        //echo $this->db->last_query(); exit;
    }
	
	/*-------------------------------*/
	public function animater_userdetails($logdate)
	{
		if($logdate!='')
		{
			$where=" and gg.log_date='".$logdate."' ";
		}
		else
		{
			$where="";
		}
		$query = $this->db->query("SELECT atl_id,gg.user_id,u.u_name as user_name,log_date, start_time, end_time, shot_name, num_of_characters, assigned_frames, assigned_duration, heedio_slapstick, action_type, character_1, character_2, character_3, character_4, character_5, library_available, auto_complexity, manual_complexity, expected_productivity, completed_frame, approved_frames, approved_productivity, deficit, work_hour, remark, lead1_id, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime, status,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_1) as char1,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_2) as char2,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_3) as char3,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_4) as char4,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_5) as char5,(SELECT  at_name FROM m7s_action_type WHERE atid=gg.action_type) as actiontype,
		(SELECT u_name FROM m7s_users WHERE user_id=gg.lead1_id) as lead1_name,
		(SELECT u_name FROM m7s_users WHERE user_id=gg.lead2_id) as lead2_name,
		(SELECT type FROM ms7_typeof_work WHERE id=typeof_work) as typeofwork,sub_task
		FROM m7s_animator_time_log gg join m7s_users as u on u.user_id=gg.user_id WHERE status=1 and isdemouser='No' ".$where." ORDER BY log_date DESC");
		return $query->result_array();
	}
	
	public function bgartist_userdetails($logdate)
	{
		if($logdate!='')
		{
			$where=" and btl.log_date='".$logdate."' ";
		}
		else
		{
			$where="";
		}
		
		$query = $this->db->query("SELECT btl_id,btl.user_id,u.u_name as user_name,log_date, start_time, end_time, episode, shot_name, quantity, heedio_slapstick, work_type, expected_productivity, actual_productivity,approved_productivity, deficit, work_hour, remark, lead1_id, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime, status,(SELECT  wt_name FROM m7s_work_type WHERE wtid=btl.work_type and wt_status='Yes') as worktype,(SELECT u_name FROM m7s_users WHERE user_id=btl.lead1_id) as lead1_name,(SELECT u_name FROM m7s_users WHERE user_id=btl.lead2_id) as lead2_name FROM m7s_bgartist_time_log btl join m7s_users as u on u.user_id=btl.user_id  WHERE  status=1 and isdemouser='No' ".$where." ORDER BY log_date DESC");
		return $query->result_array();
	}
	
	
	
	public function sl_animater_userdetails($sdate,$edate)
	{
		if($sdate!='' && $edate!='')
		{
			$where=" and gg.log_date between '".$sdate."' and '".$edate."' ";
		}
		else
		{
			$where="";
		}
		$query = $this->db->query("SELECT atl_id,gg.user_id,u.u_name as user_name,log_date, start_time, end_time, shot_name, num_of_characters, assigned_frames, assigned_duration, heedio_slapstick, action_type, character_1, character_2, character_3, character_4, character_5, library_available, auto_complexity, manual_complexity, expected_productivity, completed_frame, approved_frames, approved_productivity, deficit, work_hour, remark, lead1_id, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime, status,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_1) as char1,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_2) as char2,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_3) as char3,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_4) as char4,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_5) as char5,(SELECT  at_name FROM m7s_action_type WHERE atid=gg.action_type) as actiontype,
		(SELECT u_name FROM m7s_users WHERE user_id=gg.lead1_id) as lead1_name,
		(SELECT u_name FROM m7s_users WHERE user_id=gg.lead2_id) as lead2_name,lead2_remarks,
		(SELECT type FROM ms7_typeof_work WHERE id=typeof_work) as typeofwork,sub_task
		FROM m7s_animator_time_log gg join m7s_users as u on u.user_id=gg.user_id WHERE status=1 and isdemouser='No' ".$where." ORDER BY log_date DESC");
		return $query->result_array();
	}
	
	public function sl_bgartist_userdetails($sdate,$edate)
	{
		if($sdate!='' && $edate!='')
		{
			$where=" and btl.log_date between '".$sdate."' and '".$edate."' ";
		}
		else
		{
			$where="";
		}
		
		$query = $this->db->query("SELECT btl_id,btl.user_id,u.u_name as user_name,log_date, start_time, end_time, episode, shot_name, quantity, heedio_slapstick, work_type, expected_productivity, actual_productivity,approved_productivity, deficit, work_hour, remark, lead1_id, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime, status,(SELECT  wt_name FROM m7s_work_type WHERE wtid=btl.work_type and wt_status='Yes') as worktype,(SELECT u_name FROM m7s_users WHERE user_id=btl.lead1_id) as lead1_name,(SELECT u_name FROM m7s_users WHERE user_id=btl.lead2_id) as lead2_name,lead2_remarks FROM m7s_bgartist_time_log btl join m7s_users as u on u.user_id=btl.user_id  WHERE  status=1 and isdemouser='No' ".$where." ORDER BY log_date DESC");
		return $query->result_array();
	}
	
	public function updateAni_SuperLeadComments($aid,$uid,$txtdirectorremarks,$curDateTime,$leadid)
	{
		$query = $this->db->query("UPDATE m7s_animator_time_log SET lead2_remarks='".$txtdirectorremarks."',lastupdate='".$curDateTime."',lead2_id='".$leadid."',lead2_approved_datetime='".$curDateTime."' WHERE atl_id='".$aid."' and user_id='".$uid."' and status=1");
		  // echo $this->db->last_query(); exit;
	} 
	public function updateBG_SuperLeadComments($aid,$uid,$txtdirectorremarks,$curDateTime,$leadid)
    {
        $query = $this->db->query("UPDATE m7s_bgartist_time_log SET  lead2_remarks='".$txtdirectorremarks."',modifieddate='".$curDateTime."',lead2_approved_datetime='".$curDateTime."',lead2_id='".$leadid."',lastupdate='".$curDateTime."' WHERE btl_id='".$aid."' and user_id='".$uid."' and status=1");
        //echo $this->db->last_query(); exit;
    }
	
	
	public function BGartist_update_log($user_id,$rowid,$log_date,$curDateTime)
    {
        $query = $this->db->query("INSERT INTO m7s_bgartist_update_log(btl_id,user_id, log_date, start_time, end_time, episode, shot_name, quantity, heedio_slapstick, work_type, expected_productivity, actual_productivity, approved_productivity, deficit, work_hour, remark, lead1_id, lead1_remarks, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime, lead2_remarks, mk_comments, status, lastupdate, modifieddate, is_corrections, sub_task) SELECT btl_id,user_id, log_date, start_time, end_time, episode, shot_name, quantity, heedio_slapstick, work_type, expected_productivity, actual_productivity, approved_productivity, deficit, work_hour, remark, lead1_id, lead1_remarks, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime, lead2_remarks, mk_comments, status, '".$curDateTime."' as lastupdate,'".$curDateTime."' as  modifieddate, is_corrections, sub_task FROM m7s_bgartist_time_log WHERE user_id=".$user_id." and btl_id=".$rowid." and log_date='".$log_date."'  ");
      // echo $this->db->last_query(); exit;
    }
	
	public function Animator_update_log($user_id,$rowid,$log_date,$curDateTime)
    {
        $query = $this->db->query("INSERT INTO m7s_animator_update_log(atl_id,user_id, log_date, start_time, end_time, shot_name, num_of_characters, assigned_frames, assigned_duration, heedio_slapstick, action_type, character_1, character_2, character_3, character_4, character_5, library_available, auto_complexity, manual_complexity, expected_productivity, completed_frame, approved_frames, approved_productivity, deficit, work_hour, remark, lead1_id, lead1_remarks, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime, lead2_remarks, mk_comments, status, lastupdate, modifieddate, is_corrections, sub_task,typeof_work) SELECT atl_id,user_id, log_date, start_time, end_time, shot_name, num_of_characters, assigned_frames, assigned_duration, heedio_slapstick, action_type, character_1, character_2, character_3, character_4, character_5, library_available, auto_complexity, manual_complexity, expected_productivity, completed_frame, approved_frames, approved_productivity, deficit, work_hour, remark, lead1_id, lead1_remarks, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime, lead2_remarks, mk_comments, status,'".$curDateTime."' as lastupdate,'".$curDateTime."' as  modifieddate, is_corrections, sub_task,typeof_work FROM m7s_animator_time_log WHERE user_id=".$user_id." and atl_id=".$rowid." and log_date='".$log_date."'  ");
        //echo $this->db->last_query(); exit;
    }
		
		
	public function getTypeofWork()
	{
		$query = $this->db->query("SELECT * from ms7_typeof_work where status=1");
        return $query->result_array();
	}
	public function Animator_day_percentage($user_id,$logdate,$worktype,$curDateTime)
	{
		$query = $this->db->query("CALL Animator_day_percentage('".$user_id."','".$logdate."','".$worktype."','".$curDateTime."') "); 
	}
}
 