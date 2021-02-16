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
		$query = $this->db->query("SELECT user_id, u_name, u_email, u_role_id, u_username, u_salt1, u_hash, u_salt2, u_orgpwd, u_status, u_created_on, u_modified_on, u_login_count,(SELECT ur_name FROM m7s_user_roles WHERE ur_id=u_role_id) as rolename,h_simple,h_complex,s_simple,s_complex,manager_id FROM m7s_users WHERE u_username='".$username."' AND u_hash=SHA1(CONCAT(u_salt1,'".$password."',u_salt2))  and u_status='Y'"); 
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
		(SELECT type FROM ms7_typeof_work WHERE id=typeof_work) as typeofwork,sub_task,citerationtime
		FROM m7s_animator_time_log gg WHERE user_id=".$userid." AND status=1 ORDER BY log_date DESC"); 
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	
	public function insert_activity($user_id,$curDate,$start_time,$end_time,$txtshotname,$txtnumcharacters,$txtassignedframes,$assigned_duration,$rdheedioslapstick,$ddlactiontype,$ddlcharacter1,$ddlcharacter2,$ddlcharacter3,$ddlcharacter4,$ddlcharacter5,$rdlibraryavailable,$rdmanualcomplexity,$txtcompletedframes,$txtremark,$curDateTime,$ddlsubtask,$ddlworktype,$txtCIterationTime)
	{
		$query = $this->db->query("INSERT INTO m7s_animator_time_log(user_id,log_date, start_time, end_time, shot_name, num_of_characters, assigned_frames, assigned_duration, heedio_slapstick, action_type, character_1, character_2, character_3, character_4, character_5, library_available, auto_complexity, manual_complexity, expected_productivity, completed_frame,remark,status,lastupdate,sub_task,last_update_userid,typeof_work,citerationtime) VALUES ('".$user_id."','".$curDate."','".$start_time."','".$end_time."','".$txtshotname."','".$txtnumcharacters."','".$txtassignedframes."','".$assigned_duration."','".$rdheedioslapstick."','".$ddlactiontype."','".$ddlcharacter1."','".$ddlcharacter2."','".$ddlcharacter3."','".$ddlcharacter4."','".$ddlcharacter5."','".$rdlibraryavailable."','".$this->auto_complexity_finder($rdlibraryavailable,$txtnumcharacters,$ddlactiontype)."','".$rdmanualcomplexity."','".$this->expected_productivity_finder($rdmanualcomplexity,$rdheedioslapstick,$user_id)."','".$txtcompletedframes."','".$txtremark."',1,'".$curDateTime."','".$ddlsubtask."','".$user_id."','".$ddlworktype."','".$txtCIterationTime."')"); 
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
	
	public function expected_productivity_finder($autooocomplexity,$videotype,$user_id)
	{
		$arrofexp_pro_val= $this->db->query("SELECT  h_simple,h_complex,s_simple,s_complex FROM m7s_users WHERE user_id=".$user_id." ");$exp_pro_val =$arrofexp_pro_val->result_array();
		
		
		if($autooocomplexity=='Simple' && $videotype=='Heedio')
		{
			$expectedproductivity = $exp_pro_val[0]['h_simple']; 
		}
		elseif($autooocomplexity=='Simple' && $videotype=='Slapstick')
		{
			$expectedproductivity = $exp_pro_val[0]['s_simple']; 
		}
		elseif($autooocomplexity=='Complex' && $videotype=='Heedio')
		{
			$expectedproductivity = $exp_pro_val[0]['h_complex']; 
		}
		elseif($autooocomplexity=='Complex' && $videotype=='Slapstick')
		{
			$expectedproductivity = $exp_pro_val[0]['s_complex']; 
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
		$query = $this->db->query("SELECT ur_id, ur_name, ur_status FROM m7s_user_roles WHERE ur_status='Y' and ur_id in(1,2,3,6,7,8) order by  ur_name asc ");
		return $query->result_array();
	}	
	
	public function get_animatordetails($roleid)
	{
		$query = $this->db->query("SELECT atl_id,user_id,(select u_name from m7s_users as u where u.user_id=gg.user_id) as user_name,log_date, start_time, end_time, shot_name, num_of_characters, assigned_frames, assigned_duration, heedio_slapstick, action_type, character_1, character_2, character_3, character_4, character_5, library_available, auto_complexity, manual_complexity, expected_productivity, completed_frame, approved_frames, approved_productivity, deficit, work_hour, remark, lead1_id, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime, status,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_1) as char1,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_2) as char2,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_3) as char3,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_4) as char4,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_5) as char5,(SELECT  at_name FROM m7s_action_type WHERE atid=gg.action_type) as actiontype,
		(SELECT ur_name FROM m7s_user_roles WHERE ur_id=gg.lead1_id) as lead1_name,
		(SELECT ur_name FROM m7s_user_roles WHERE ur_id=gg.lead2_id) as lead2_name,lead2_remarks,
		(SELECT type FROM ms7_typeof_work WHERE id=typeof_work) as typeofwork,typeof_work as typeof_workid,sub_task,citerationtime
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
	
	public function Update_Activity($curDate,$start_time,$end_time,$txtshotname,$txtnumcharacters,$txtassignedframes,$assigned_duration,$rdheedioslapstick,$ddlactiontype,$ddlcharacter1,$ddlcharacter2,$ddlcharacter3,$ddlcharacter4,$ddlcharacter5,$rdlibraryavailable,$rdmanualcomplexity,$txtcompletedframes,$txtremark,$curDateTime,$user_id,$ddlsubtask,$rowid,$update_user_id=null,$ddlworktype,$txtCIterationTime)
	{  
		$query = $this->db->query("Update m7s_animator_time_log SET log_date='".$curDate."',start_time='".$start_time."', end_time='".$end_time."',shot_name='".$txtshotname."',num_of_characters='".$txtnumcharacters."',assigned_frames='".$txtassignedframes."',assigned_duration='".$assigned_duration."',heedio_slapstick='".$rdheedioslapstick."', action_type='".$ddlactiontype."', character_1='".$ddlcharacter1."', character_2='".$ddlcharacter2."', character_3='".$ddlcharacter3."', character_4='".$ddlcharacter4."', character_5='".$ddlcharacter5."', library_available='".$rdlibraryavailable."', auto_complexity='".$this->auto_complexity_finder($rdlibraryavailable,$txtnumcharacters,$ddlactiontype)."', manual_complexity='".$rdmanualcomplexity."', expected_productivity='".$this->expected_productivity_finder($rdmanualcomplexity,$rdheedioslapstick,$user_id)."', completed_frame='".$txtcompletedframes."',remark='".$txtremark."',modifieddate='".$curDateTime."',sub_task='".$ddlsubtask."',last_update_userid='".$update_user_id."',typeof_work='".$ddlworktype."',citerationtime='".$txtCIterationTime."' where user_id='".$user_id."' and atl_id='".$rowid."' ");
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
		$query = $this->db->query("select DATE_SUB(selected_date,INTERVAL DAYOFMONTH(selected_date)-1 DAY) as firstday,LAST_DAY(selected_date)as lastday,CONCAT(month(CURDATE()),'-',year(CURDATE())) as current_monyear, MONTHNAME(selected_date) as MonthName,month(selected_date) as Month,Year(selected_date) as Year from (select selected_date,dayname(selected_date) as nameofday, (FLOOR((DAYOFMONTH(selected_date) - 1) / 7) + 1) as weekval from (select adddate('1970-01-01',t4.i*10000 + t3.i*1000 + t2.i*100 + t1.i*10 + t0.i) selected_date from (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0, (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1, (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2, (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t3, (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t4) v where selected_date between '".$start_date."' and '".$end_date."' ) as a1,(SELECT @a:= 0) AS a group by month(selected_date)");
		
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
	//	$query = $this->db->query("select CONCAT(Month,'-',year) as Month,sum(deficit) as deficit,sum(Avg_Productivity) as Avg_Productivity from (SELECT DATE_FORMAT(log_date,'%M') as Month,year(log_date) as year,CONCAT(month(log_date),'-',year(log_date)) as monthYear,SUM(approved_productivity) as approved_productivity,avg(expected_productivity) as expected_productivity,(expected_productivity-approved_productivity) as deficit,((approved_productivity/expected_productivity)*100) as Avg_Productivity  from m7s_animator_time_log where user_id=".$user_id." and lead1_approved_status='Yes' group by log_date) as a1 group by monthYear order by month DESC");
		
		$query = $this->db->query("select CONCAT(Month,'-',year) as Month,sum(deficit) as deficit,avg(Avg_Productivity) as Avg_Productivity,sum(reqAvg) as reqAvg,avg(reqAvg) as avgreqAvg,sum(approved_productivity) as approved_productivity,avg(approved_productivity) as avgapproved_productivity from (

SELECT DATE_FORMAT(log_date,'%M') as Month,year(log_date) as year,CONCAT(month(log_date),'-',year(log_date)) as monthYear,SUM(approved_productivity) as approved_productivity,avg(expected_productivity) as expected_productivity,(select percentage from ms7_animator_day_percentage adp where userid=".$user_id." and adp.log_date=atl.log_date) as daypercentage, 

(select ((avg(expected_productivity)*percentage)-sum(approved_productivity)) from ms7_animator_day_percentage adp where userid=".$user_id." and adp.log_date=atl.log_date) as deficit,
(select ((avg(expected_productivity)*percentage)) from ms7_animator_day_percentage adp where userid=".$user_id." and adp.log_date=atl.log_date) as reqAvg, (expected_productivity-approved_productivity) as deficit1,

(select ((sum(approved_productivity)/((avg(expected_productivity)*percentage)))*100) from ms7_animator_day_percentage adp where userid=".$user_id." and adp.log_date=atl.log_date) as Avg_Productivity, 

((approved_productivity/expected_productivity)*100) as Avg_Productivity1  from m7s_animator_time_log atl where typeof_work=1 and user_id=".$user_id." and lead1_approved_status='Yes' group by log_date



) as a1 group by monthYear order by month DESC");
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
		
		if($roleid==1)
		{
			$query = $this->db->query("select ".$roleid." as role,  CONCAT(Month,'-',year) as Month,sum(deficit) as deficit,avg(Avg_Productivity) as Avg_Productivity,sum(reqAvg) as reqAvg,avg(reqAvg) as avgreqAvg,sum(approved_productivity) as approved_productivity,avg(approved_productivity) as avgapproved_productivity from (

			SELECT DATE_FORMAT(log_date,'%M') as Month,year(log_date) as year,CONCAT(month(log_date),'-',year(log_date)) as monthYear,SUM(approved_productivity) as approved_productivity,avg(expected_productivity) as expected_productivity,(select percentage from ms7_animator_day_percentage adp where userid=".$user_id." and adp.log_date=atl.log_date) as daypercentage, 

			(select ((avg(expected_productivity)*percentage)-sum(approved_productivity)) from ms7_animator_day_percentage adp where userid=".$user_id." and adp.log_date=atl.log_date) as deficit,
			(select ((avg(expected_productivity)*percentage)) from ms7_animator_day_percentage adp where userid=".$user_id." and adp.log_date=atl.log_date) as reqAvg, (expected_productivity-approved_productivity) as deficit1,

			(select ((sum(approved_productivity)/((avg(expected_productivity)*percentage)))*100) from ms7_animator_day_percentage adp where userid=".$user_id." and adp.log_date=atl.log_date) as Avg_Productivity, 

			((approved_productivity/expected_productivity)*100) as Avg_Productivity1  from m7s_animator_time_log atl where typeof_work=1 and user_id=".$user_id." and lead1_approved_status='Yes' group by log_date



			) as a1 group by monthYear order by month DESC");
		}
		
		if($roleid==2)
		{
			$query = $this->db->query("select ".$roleid." as role, CONCAT(Month,'-',year) as Month,sum(deficit) as deficit,sum(Avg_Productivity) as Avg_Productivity from (SELECT DATE_FORMAT(log_date,'%M') as Month,year(log_date) as year,CONCAT(month(log_date),'-',year(log_date)) as monthYear,SUM(approved_productivity) as approved_productivity,avg(expected_productivity) as expected_productivity,(expected_productivity-approved_productivity) as deficit,((approved_productivity/expected_productivity)*100) as Avg_Productivity  from ".$tbl." as atl where user_id=".$user_id." and lead1_approved_status='Yes' group by log_date) as a1 group by monthYear order by month DESC");
		}
		
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	
	
	public function dir_OverallSummary($sdate,$edate)
	{
		$roleid=1;
		if($roleid==1){$tbl="m7s_animator_time_log";}
 		
		if($sdate!='' && $edate!='')
		{
			$where="log_date between '".$sdate."' and '".$edate."' ";
		}
		else
		{
			$where="1=1";
		}
		
		if($roleid==1)
		{
			$query = $this->db->query("select ".$roleid." as role,CONCAT(DATE_FORMAT('".$sdate."','%d/%m/%Y'),'-',DATE_FORMAT('".$edate."','%d/%m/%Y')) as DateRange,CONCAT(Month,'-',year) as Month,sum(deficit) as deficit,avg(Avg_Productivity) as Avg_Productivity,sum(reqAvg) as reqAvg,avg(reqAvg) as avgreqAvg,sum(approved_productivity) as approved_productivity,avg(approved_productivity) as avgapproved_productivity,user_id,(select u_name from m7s_users u where u.user_id=a1.user_id )as uname from (

			SELECT log_date,DATE_FORMAT(log_date,'%M') as Month,atl.user_id,year(log_date) as year,CONCAT(month(log_date),'-',year(log_date)) as monthYear,SUM(approved_productivity) as approved_productivity,avg(expected_productivity) as expected_productivity,(select percentage from ms7_animator_day_percentage adp where adp.userid=atl.user_id and adp.log_date=atl.log_date) as daypercentage, 

			(select ((avg(expected_productivity)*percentage)-sum(approved_productivity)) from ms7_animator_day_percentage adp where adp.userid=atl.user_id and adp.log_date=atl.log_date) as deficit,
			(select ((avg(expected_productivity)*percentage)) from ms7_animator_day_percentage adp where adp.userid=atl.user_id and adp.log_date=atl.log_date) as reqAvg, (expected_productivity-approved_productivity) as deficit1,

			(select ((sum(approved_productivity)/((avg(expected_productivity)*percentage)))*100) from ms7_animator_day_percentage adp where adp.userid=atl.user_id and adp.log_date=atl.log_date) as Avg_Productivity, 

			((approved_productivity/expected_productivity)*100) as Avg_Productivity1  from m7s_animator_time_log atl where typeof_work=1 and lead1_approved_status='Yes' group by log_date,user_id



			) as a1 where ".$where." group by user_id order by month DESC");
		}
		 
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	
	
	public function get_approve_animatordetails($aid,$uid) 
	{
		$query = $this->db->query("SELECT * from m7s_animator_time_log where atl_id='".$aid."' and user_id='".$uid."' and status=1 ");
		return $query->result_array();
	}
	
	public function update_approvestats($aid,$uid,$txtapproveframe,$txtdirectorremarks,$approvedproductivity,$deficit,$workhour,$curDateTime,$leadid,$txtCIterationTime)
	{
		$query = $this->db->query("UPDATE m7s_animator_time_log SET lead1_approved_status='Yes',approved_frames='".$txtapproveframe."',lead1_remarks='".$txtdirectorremarks."',approved_productivity ='".$approvedproductivity."',deficit='".$deficit."', work_hour='".$workhour."',lastupdate='".$curDateTime."',lead1_id='".$leadid."',lead1_approved_datetime='".$curDateTime."',citerationtime='".$txtCIterationTime."' WHERE atl_id='".$aid."' and user_id='".$uid."' and status=1");
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
	public function animater_userdetails($sdate,$edate)
	{
		if($logdate!='')
		{ 
			$where=" and gg.log_date between '".$sdate."' and '".$edate."' ";
		}
		else
		{
			$where="";
		}
		$query = $this->db->query("SELECT atl_id,gg.user_id,u.u_name as user_name,log_date, start_time, end_time, shot_name, num_of_characters, assigned_frames, assigned_duration, heedio_slapstick, action_type, character_1, character_2, character_3, character_4, character_5, library_available, auto_complexity, manual_complexity, expected_productivity, completed_frame, approved_frames, approved_productivity, deficit, work_hour, remark, lead1_id, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime, status,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_1) as char1,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_2) as char2,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_3) as char3,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_4) as char4,(SELECT  ch_name FROM m7s_characters WHERE chid=gg.character_5) as char5,(SELECT  at_name FROM m7s_action_type WHERE atid=gg.action_type) as actiontype,
		(SELECT u_name FROM m7s_users WHERE user_id=gg.lead1_id) as lead1_name,
		(SELECT u_name FROM m7s_users WHERE user_id=gg.lead2_id) as lead2_name,
		(SELECT type FROM ms7_typeof_work WHERE id=typeof_work) as typeofwork,sub_task,citerationtime
		FROM m7s_animator_time_log gg join m7s_users as u on u.user_id=gg.user_id WHERE status=1 and isdemouser='No' ".$where." ORDER BY log_date DESC");
		return $query->result_array();
	}
	
	public function bgartist_userdetails($sdate,$edate)
	{
		if($logdate!='')
		{
			//$where=" and btl.log_date='".$logdate."' ";
			$where=" and btl.log_date between '".$sdate."' and '".$edate."' ";
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
		(SELECT type FROM ms7_typeof_work WHERE id=typeof_work) as typeofwork,sub_task,citerationtime
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
	
	
	public function BGartist_update_log($user_id,$rowid,$log_date,$curDateTime,$updated_userid)
    {
        $query = $this->db->query("INSERT INTO m7s_bgartist_update_log(btl_id,user_id, log_date, start_time, end_time, episode, shot_name, quantity, heedio_slapstick, work_type, expected_productivity, actual_productivity, approved_productivity, deficit, work_hour, remark, lead1_id, lead1_remarks, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime, lead2_remarks, mk_comments, status, lastupdate, modifieddate, is_corrections, sub_task,last_update_userid) SELECT btl_id,user_id, log_date, start_time, end_time, episode, shot_name, quantity, heedio_slapstick, work_type, expected_productivity, actual_productivity, approved_productivity, deficit, work_hour, remark, lead1_id, lead1_remarks, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime, lead2_remarks, mk_comments, status, '".$curDateTime."' as lastupdate,'".$curDateTime."' as  modifieddate, is_corrections, sub_task,".$updated_userid." as last_update_userid FROM m7s_bgartist_time_log WHERE user_id=".$user_id." and btl_id=".$rowid." and log_date='".$log_date."'  ");
      // echo $this->db->last_query(); exit;
    }
	
	public function Animator_update_log($user_id,$rowid,$log_date,$curDateTime,$last_update_userid)
    { 
        $query = $this->db->query("INSERT INTO m7s_animator_update_log(atl_id,user_id, log_date, start_time, end_time, shot_name, num_of_characters, assigned_frames, assigned_duration, heedio_slapstick, action_type, character_1, character_2, character_3, character_4, character_5, library_available, auto_complexity, manual_complexity, expected_productivity, completed_frame, approved_frames, approved_productivity, deficit, work_hour, remark, lead1_id, lead1_remarks, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime, lead2_remarks, mk_comments, status, lastupdate, modifieddate, is_corrections, sub_task,typeof_work,citerationtime,last_update_userid) SELECT atl_id,user_id, log_date, start_time, end_time, shot_name, num_of_characters, assigned_frames, assigned_duration, heedio_slapstick, action_type, character_1, character_2, character_3, character_4, character_5, library_available, auto_complexity, manual_complexity, expected_productivity, completed_frame, approved_frames, approved_productivity, deficit, work_hour, remark, lead1_id, lead1_remarks, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime, lead2_remarks, mk_comments, status,'".$curDateTime."' as lastupdate,'".$curDateTime."' as  modifieddate, is_corrections, sub_task,typeof_work,citerationtime,'".$last_update_userid."' as last_update_userid FROM m7s_animator_time_log WHERE user_id=".$user_id." and atl_id=".$rowid." and log_date='".$log_date."'  ");
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
	
	
	public function DeleteAnimatorRow($rowid,$userid,$logdate,$txtremarks,$delete_userid)
	{
		$query = $this->db->query("INSERT INTO m7s_animator_delete_log(atl_id, user_id, log_date, start_time, end_time, shot_name, num_of_characters, assigned_frames, assigned_duration, heedio_slapstick, action_type, character_1, character_2, character_3, character_4, character_5, library_available, auto_complexity, manual_complexity, expected_productivity, completed_frame, approved_frames, approved_productivity, deficit, work_hour, remark, lead1_id, lead1_remarks, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime, lead2_remarks, mk_comments, status, lastupdate, modifieddate, is_corrections, sub_task, last_update_userid, typeof_work, citerationtime,delete_remarks,delete_userid,delete_datetime)
		SELECT atl_id, user_id, log_date, start_time, end_time, shot_name, num_of_characters, assigned_frames, assigned_duration, heedio_slapstick, action_type, character_1, character_2, character_3, character_4, character_5, library_available, auto_complexity, manual_complexity, expected_productivity, completed_frame, approved_frames, approved_productivity, deficit, work_hour, remark, lead1_id, lead1_remarks, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime, lead2_remarks, mk_comments, status, lastupdate, modifieddate, is_corrections, sub_task, last_update_userid, typeof_work, citerationtime,'".$txtremarks."','".$delete_userid."',NOW() FROM m7s_animator_time_log WHERE atl_id=".$rowid." and user_id=".$userid." and log_date='".$logdate."' ");
		 		
		$query = $this->db->query("Delete from m7s_animator_time_log where atl_id=".$rowid." and user_id=".$userid." and log_date='".$logdate."' ");
		
		
	}
	
	public function DeleteBgArtistRow($rowid,$userid,$logdate,$txtremarks,$delete_userid)
	{
		$query = $this->db->query("INSERT INTO m7s_bgartist_delete_log(btl_id, user_id, log_date, start_time, end_time, episode, shot_name, quantity, heedio_slapstick, work_type, expected_productivity, actual_productivity, approved_productivity, deficit, work_hour, remark, lead1_id, lead1_remarks, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime, lead2_remarks, mk_comments, status, lastupdate, modifieddate, is_corrections, sub_task, last_update_userid, delete_remarks, delete_userid, delete_datetime)SELECT btl_id, user_id, log_date, start_time, end_time, episode, shot_name, quantity, heedio_slapstick, work_type, expected_productivity, actual_productivity, approved_productivity, deficit, work_hour, remark, lead1_id, lead1_remarks, lead1_approved_status, lead1_approved_datetime, lead2_id, lead2_approved_status, lead2_approved_datetime, lead2_remarks, mk_comments, status, lastupdate, modifieddate, is_corrections, sub_task, last_update_userid,'".$txtremarks."','".$delete_userid."',NOW() FROM m7s_bgartist_time_log  WHERE btl_id=".$rowid." and user_id=".$userid." and log_date='".$logdate."'  ");
		
		$query = $this->db->query("Delete from m7s_bgartist_time_log where btl_id=".$rowid." and user_id=".$userid." and log_date='".$logdate."' ");
		
        //echo $this->db->last_query(); exit; 
	}
	
	/*----------------------------------------------------
		Reviewer Add
	*/
	public function Insert_ReviewerActivity($user_id,$curDate,$start_time,$end_time,$txtprojectname,$txttaskname,$txtremarks,$curDateTime)
	{
		$query = $this->db->query("INSERT INTO ms7_reviewer_time_log(user_id, log_date, start_time, end_time, project_name, task_name, remarks, status, created_on)values('".$user_id."','".$curDate."','".$start_time."','".$end_time."','".$txtprojectname."','".$txttaskname."','".$txtremarks."','1','".$curDateTime."') ");
	}
	public function Update_ReviewerActivity($row_id,$user_id,$curDate,$start_time,$end_time,$txtprojectname,$txttaskname,$txtremarks,$curDateTime)
	{
		$query = $this->db->query("UPDATE ms7_reviewer_time_log SET user_id='".$user_id."',log_date='".$curDate."',start_time='".$start_time."',end_time='".$end_time."',project_name='".$txtprojectname."',task_name='".$txttaskname."',remarks='".$txtremarks."' WHERE id=".$row_id." ");
	}
	public function getReviewerActivityList($user_id,$rowid)
	{
		$where="";
		if($rowid!='')
		{
			$where.=" and id=".$rowid." ";
		}
		else
		{
			$where.=" ";
		}
		$query = $this->db->query("SELECT * from ms7_reviewer_time_log where status=1 and user_id=".$user_id." ".$where." ");
        return $query->result_array();
	}
	public function get_reviewerlist($roleid)
	{
		$query = $this->db->query("SELECT id,user_id,(select u_name from m7s_users as u where u.user_id=gg.user_id) as user_name,log_date, start_time, end_time, project_name, task_name,remarks, lead1_id,lead1_remarks,lead2_id,lead2_remarks,
		(SELECT u_name FROM m7s_users as u WHERE u.user_id=gg.lead1_id) as lead1_name,
		(SELECT u_name FROM m7s_users as u WHERE u.user_id=gg.lead2_id) as lead2_name
		FROM ms7_reviewer_time_log gg WHERE status=1 and lead1_id=0 ORDER BY log_date DESC");
		return $query->result_array();
	}
	public function get_storyboardlist($roleid)
	{
		$query = $this->db->query("SELECT id,user_id,(select u_name from m7s_users as u where u.user_id=gg.user_id) as user_name,log_date, start_time, end_time, project_name, task_name,task_duration,completed_duration,work_hour,remarks, lead1_id,lead1_remarks,lead2_id,lead2_remarks,
		(SELECT u_name FROM m7s_users as u WHERE u.user_id=gg.lead1_id) as lead1_name,
		(SELECT u_name FROM m7s_users as u WHERE u.user_id=gg.lead2_id) as lead2_name
		FROM ms7_storyboard_time_log gg WHERE status=1 and lead1_id=0 ORDER BY log_date DESC");
		return $query->result_array();
	}
	public function get_complist($roleid)
	{
		$query = $this->db->query("SELECT id,user_id,(select u_name from m7s_users as u where u.user_id=gg.user_id) as user_name,log_date, start_time, end_time, project_name, task_name,task_duration,completed_duration,work_type,work_hour,remarks, lead1_id,lead1_remarks,lead2_id,lead2_remarks,
		(SELECT type FROM ms7_comp_work_type as wt WHERE wt.id=gg.work_type) as work_typename,
		(SELECT u_name FROM m7s_users as u WHERE u.user_id=gg.lead1_id) as lead1_name,
		(SELECT u_name FROM m7s_users as u WHERE u.user_id=gg.lead2_id) as lead2_name
		FROM ms7_comp_time_log gg WHERE status=1 and lead1_id=0 ORDER BY log_date DESC");
		return $query->result_array();
	}
	public function UpdateDirectorRemarks($row_id,$updating_userid,$uid,$Remarks,$curDateTime)
	{
		$query = $this->db->query("UPDATE ms7_reviewer_time_log SET lead1_id='".$updating_userid."',lead1_remarks='".$Remarks."',lead1_remarks_date='".$curDateTime."' WHERE id=".$row_id." and user_id=".$uid." ");
	} 
	public function UpdateDirectorRemarks_SBA($row_id,$updating_userid,$uid,$Remarks,$curDateTime,$completed_duration,$work_hour)
	{
		$query = $this->db->query("UPDATE ms7_storyboard_time_log SET lead1_id='".$updating_userid."',lead1_remarks='".$Remarks."',lead1_approved_datetime='".$curDateTime."',completed_duration='".$completed_duration."',work_hour='".$work_hour."' WHERE id=".$row_id." and user_id=".$uid." ");
	} 
	public function UpdateDirectorRemarks_comp($row_id,$updating_userid,$uid,$Remarks,$curDateTime,$completed_duration,$work_hour)
	{
		$query = $this->db->query("UPDATE ms7_comp_time_log SET lead1_id='".$updating_userid."',lead1_remarks='".$Remarks."',lead1_approved_datetime='".$curDateTime."',completed_duration='".$completed_duration."',work_hour='".$work_hour."' WHERE id=".$row_id." and user_id=".$uid." ");
	} 
	
	public function UpdateSuperLeadRemarks_AR($row_id,$updating_userid,$uid,$Remarks,$curDateTime)
	{
		$query = $this->db->query("UPDATE ms7_reviewer_time_log SET lead2_id='".$updating_userid."',lead2_remarks='".$Remarks."',lead2_remarks_date='".$curDateTime."' WHERE id=".$row_id." and user_id=".$uid." ");
	} 
	public function UpdateSuperLeadRemarks_SBA($row_id,$updating_userid,$uid,$Remarks,$curDateTime)
	{
		$query = $this->db->query("UPDATE ms7_storyboard_time_log SET lead2_id='".$updating_userid."',lead2_remarks='".$Remarks."',lead2_approved_datetime='".$curDateTime."' WHERE id=".$row_id." and user_id=".$uid." ");
	} 
	public function UpdateSuperLeadRemarks_dir($row_id,$updating_userid,$uid,$Remarks,$curDateTime)
	{
		$query = $this->db->query("UPDATE  	ms7_dir_storyboard_time_log SET lead2_id='".$updating_userid."',lead2_remarks='".$Remarks."',lead2_approved_datetime='".$curDateTime."' WHERE id=".$row_id." and user_id=".$uid." ");
	} 
	public function UpdateSuperLeadRemarks_comp($row_id,$updating_userid,$uid,$Remarks,$curDateTime)
	{
		$query = $this->db->query("UPDATE ms7_comp_time_log SET lead2_id='".$updating_userid."',lead2_remarks='".$Remarks."',lead2_approved_datetime='".$curDateTime."' WHERE id=".$row_id." and user_id=".$uid." ");
	} 
	public function Reviewer_Userdetails($sdate,$edate)
	{
		if($logdate!='')
		{
			$where=" and log_date between '".$sdate."' and '".$edate."' ";
		}
		else
		{
			$where="";
		}
		
		$query = $this->db->query("SELECT id,user_id,(select u_name from m7s_users as u where u.user_id=gg.user_id) as user_name,log_date, start_time, end_time, project_name, task_name,remarks, lead1_id,lead1_remarks,lead2_id,lead2_remarks,
		(SELECT u_name FROM m7s_users as u WHERE u.user_id=gg.lead1_id) as lead1_name,
		(SELECT u_name FROM m7s_users as u WHERE u.user_id=gg.lead2_id) as lead2_name
		FROM ms7_reviewer_time_log gg WHERE status=1  ".$where." ORDER BY log_date DESC");
		
//		echo $this->db->last_query(); exit; 

		return $query->result_array();
	}
	
	public function StoryBoard_Userdetails($sdate,$edate)
	{
		if($logdate!='')
		{
			$where=" and log_date between '".$sdate."' and '".$edate."' ";
		}
		else
		{
			$where="";
		}
		
		$query = $this->db->query("SELECT id,user_id,(select u_name from m7s_users as u where u.user_id=gg.user_id) as user_name,log_date, start_time, end_time, project_name, task_name,task_duration,completed_duration,work_hour,remarks, lead1_id,lead1_remarks,lead2_id,lead2_remarks,
		(SELECT u_name FROM m7s_users as u WHERE u.user_id=gg.lead1_id) as lead1_name,
		(SELECT u_name FROM m7s_users as u WHERE u.user_id=gg.lead2_id) as lead2_name
		FROM ms7_storyboard_time_log gg WHERE status=1  ".$where." ORDER BY log_date DESC");
		
//		echo $this->db->last_query(); exit; 

		return $query->result_array();
	}
	public function Comp_Userdetails($sdate,$edate)
	{
		if($logdate!='')
		{
			$where=" and log_date between '".$sdate."' and '".$edate."' ";
		}
		else
		{
			$where="";
		}
		
		$query = $this->db->query("SELECT id,user_id,(select u_name from m7s_users as u where u.user_id=gg.user_id) as user_name,log_date, start_time, end_time, project_name, task_name,task_duration,completed_duration,work_type,work_hour,remarks, lead1_id,lead1_remarks,lead2_id,lead2_remarks,
		(SELECT type FROM ms7_comp_work_type as wt WHERE wt.id=gg.work_type) as work_typename,
		(SELECT u_name FROM m7s_users as u WHERE u.user_id=gg.lead1_id) as lead1_name,
		(SELECT u_name FROM m7s_users as u WHERE u.user_id=gg.lead2_id) as lead2_name
		FROM ms7_comp_time_log gg WHERE status=1  ".$where." ORDER BY log_date DESC");
		
//		echo $this->db->last_query(); exit; 

		return $query->result_array();
	}
	
	public function Reviewer_UserReport($sdate,$edate)
	{
		if($sdate!='' && $edate!='')
		{
			$where=" and log_date between '".$sdate."' and '".$edate."' ";
		}
		else
		{
			$where="";
		}
		
		$query = $this->db->query("SELECT id,user_id,(select u_name from m7s_users as u where u.user_id=gg.user_id) as user_name,log_date, start_time, end_time, project_name, task_name,remarks, lead1_id,lead1_remarks,lead2_id,lead2_remarks,
		(SELECT u_name FROM m7s_users as u WHERE u.user_id=gg.lead1_id) as lead1_name,
		(SELECT u_name FROM m7s_users as u WHERE u.user_id=gg.lead2_id) as lead2_name
		FROM ms7_reviewer_time_log gg WHERE status=1  ".$where." ORDER BY log_date DESC");
		return $query->result_array();
	}
	public function StoryBoard_UserReport($sdate,$edate)
	{
		if($sdate!='' && $edate!='')
		{
			$where=" and log_date between '".$sdate."' and '".$edate."' ";
		}
		else
		{
			$where="";
		}
		
		$query = $this->db->query("SELECT id,user_id,(select u_name from m7s_users as u where u.user_id=gg.user_id) as user_name,log_date, start_time, end_time, project_name, task_name,task_duration,completed_duration,work_hour,remarks, lead1_id,lead1_remarks,lead2_id,lead2_remarks,
		(SELECT u_name FROM m7s_users as u WHERE u.user_id=gg.lead1_id) as lead1_name,
		(SELECT u_name FROM m7s_users as u WHERE u.user_id=gg.lead2_id) as lead2_name
		FROM ms7_storyboard_time_log gg WHERE status=1  ".$where." ORDER BY log_date DESC");
		return $query->result_array();
	}
	public function Comp_UserReport($sdate,$edate)
	{
		if($sdate!='' && $edate!='')
		{
			$where=" and log_date between '".$sdate."' and '".$edate."' ";
		}
		else
		{
			$where="";
		}
		
		$query = $this->db->query("SELECT id,user_id,(select u_name from m7s_users as u where u.user_id=gg.user_id) as user_name,log_date, start_time, end_time, project_name, task_name,task_duration,completed_duration,work_type,work_hour,remarks, lead1_id,lead1_remarks,lead2_id,lead2_remarks,
		(SELECT type FROM ms7_comp_work_type as wt WHERE wt.id=gg.work_type) as work_typename,
		(SELECT u_name FROM m7s_users as u WHERE u.user_id=gg.lead1_id) as lead1_name,
		(SELECT u_name FROM m7s_users as u WHERE u.user_id=gg.lead2_id) as lead2_name
		FROM ms7_comp_time_log gg WHERE status=1  ".$where." ORDER BY log_date DESC");
		return $query->result_array();
	}
	
	public function Dir_UserReport($sdate,$edate)
	{
		if($sdate!='' && $edate!='')
		{
			$where=" and log_date between '".$sdate."' and '".$edate."' ";
		}
		else
		{
			$where="";
		}
		
		$query = $this->db->query("SELECT id,user_id,(select u_name from m7s_users as u where u.user_id=gg.user_id) as user_name,log_date, start_time, end_time, project_name, task_name,task_duration,completed_duration,work_hour,remarks,lead2_id,lead2_remarks,
 		(SELECT u_name FROM m7s_users as u WHERE u.user_id=gg.lead2_id) as lead2_name
		FROM ms7_dir_storyboard_time_log gg WHERE status=1  ".$where." ORDER BY log_date DESC");
		return $query->result_array();
	}
	
	public function DeleteReviewerArtistRow($rowid,$userid,$logdate,$txtremarks,$delete_userid)
	{
		$query = $this->db->query("INSERT INTO ms7_reviewer_delete_log(rowid, user_id, log_date, start_time, end_time, project_name, task_name, remarks, lead1_id, lead1_remarks, lead1_remarks_date, lead2_id, lead2_remarks, lead2_remarks_date, status, created_on, modified_on, deleted_by, deleted_on, delete_remarks) SELECT id, user_id, log_date, start_time, end_time, project_name, task_name, remarks, lead1_id, lead1_remarks, lead1_remarks_date, lead2_id, lead2_remarks, lead2_remarks_date, status, created_on, modified_on,'".$delete_userid."',NOW(),'".$txtremarks."' FROM ms7_reviewer_time_log WHERE id=".$rowid." and user_id=".$userid." and log_date='".$logdate."'  "); 
		
		$query = $this->db->query("Delete from ms7_reviewer_time_log where id=".$rowid." and user_id=".$userid." and log_date='".$logdate."' ");
		
        //echo $this->db->last_query(); exit; 
	} 
	public function getReviewerTotalRecordInserted($userid,$logdate)
	{
		$query = $this->db->query("SELECT count(*) as TotalRecord from ms7_reviewer_time_log where user_id=".$userid." and log_date='".$logdate."'"); 
		return $query->result_array();
	}
	
	
/*----------- Story Board ***************---- */
	
	public function Insert_StoryBoardActivity($user_id,$curDate,$start_time,$end_time,$txtprojectname,$txttaskname,$txttaskduration,$txtremarks,$curDateTime)
	{
		$query = $this->db->query("INSERT INTO ms7_storyboard_time_log(user_id, log_date, start_time, end_time, project_name, task_name, task_duration, remarks, status, created_on)values('".$user_id."','".$curDate."','".$start_time."','".$end_time."','".$txtprojectname."','".$txttaskname."','".$txttaskduration."','".$txtremarks."','1','".$curDateTime."') ");
	}
	public function getStoryboardActivityList($user_id,$rowid)
	{
		$where="";
		if($rowid!='')
		{
			$where.=" and id=".$rowid." ";
		}
		else
		{
			$where.=" ";
		}
		$query = $this->db->query("SELECT * from ms7_storyboard_time_log where status=1 and user_id=".$user_id." ".$where." ");
        return $query->result_array();
	}
	
	public function Update_StoryboardActivity($row_id,$user_id,$curDate,$start_time,$end_time,$txtprojectname,$txttaskname,$txttaskduration,$txtremarks,$curDateTime)
	{
		$query = $this->db->query("UPDATE ms7_storyboard_time_log SET user_id='".$user_id."',log_date='".$curDate."',start_time='".$start_time."',end_time='".$end_time."',project_name='".$txtprojectname."',task_name='".$txttaskname."',task_duration='".$txttaskduration."',remarks='".$txtremarks."' WHERE id=".$row_id." ");
	}
	public function getStoryboardTotalRecordInserted($userid,$logdate)
	{
		$query = $this->db->query("SELECT count(*) as TotalRecord from ms7_storyboard_time_log where user_id=".$userid." and log_date='".$logdate."'"); 
		return $query->result_array();
	} 
	/*
	 COMP Module start
	*/ 
	public function getCompWorkType()
	{ 
		$query = $this->db->query("SELECT * from ms7_comp_work_type where status=1 ");
        return $query->result_array();
	}
	public function Insert_CompActivity($user_id,$curDate,$start_time,$end_time,$txtprojectname,$txttaskname,$txttaskduration,$txtremarks,$curDateTime,$ddlworktype)
	{
		$query = $this->db->query("INSERT INTO ms7_comp_time_log(user_id, log_date, start_time, end_time, project_name, task_name, task_duration, remarks, status, created_on,work_type)values('".$user_id."','".$curDate."','".$start_time."','".$end_time."','".$txtprojectname."','".$txttaskname."','".$txttaskduration."','".$txtremarks."','1','".$curDateTime."','".$ddlworktype."') ");
	}
	public function getCompActivityList($user_id,$rowid)
	{
		$where="";
		if($rowid!='')
		{
			$where.=" and id=".$rowid." ";
		}
		else
		{
			$where.=" ";
		}
		$query = $this->db->query("SELECT * from ms7_comp_time_log where status=1 and user_id=".$user_id." ".$where." ");
        return $query->result_array();
	}
	
	public function Update_CompActivity($row_id,$user_id,$curDate,$start_time,$end_time,$txtprojectname,$txttaskname,$txttaskduration,$txtremarks,$curDateTime,$ddlworktype)
	{
		$query = $this->db->query("UPDATE ms7_comp_time_log SET user_id='".$user_id."',log_date='".$curDate."',start_time='".$start_time."',end_time='".$end_time."',project_name='".$txtprojectname."',task_name='".$txttaskname."',task_duration='".$txttaskduration."',work_type='".$ddlworktype."',remarks='".$txtremarks."' WHERE id=".$row_id." ");
	}
	public function getCompTotalRecordInserted($userid,$logdate)
	{
		$query = $this->db->query("SELECT count(*) as TotalRecord from ms7_comp_time_log where user_id=".$userid." and log_date='".$logdate."'"); 
		return $query->result_array();
	}
	
	public function get_StoryBoardDetails($rowid) 
	{
		$query = $this->db->query("SELECT * from ms7_storyboard_time_log where id='".$rowid."' and status=1 ");
		return $query->result_array();
	}
	public function get_CompBoardDetails($rowid) 
	{
		$query = $this->db->query("SELECT * from ms7_comp_time_log where id='".$rowid."' and status=1 ");
		return $query->result_array();
	}
	
	
	
	public function MonthSummaryReport($user_id,$roleid,$month_year)
	{
		if($roleid==1){$tbl="m7s_animator_time_log";}
		if($roleid==2){$tbl="m7s_bgartist_time_log";}
		
		if($roleid==1)
		{
			$query = $this->db->query("select ".$roleid." as role,  CONCAT(Month,'-',year) as Month,sum(deficit) as deficit,avg(Avg_Productivity) as Avg_Productivity,sum(reqAvg) as reqAvg,avg(reqAvg) as avgreqAvg,sum(approved_productivity) as approved_productivity,avg(approved_productivity) as avgapproved_productivity from 
			(

			SELECT DATE_FORMAT(log_date,'%M') as Month,year(log_date) as year,CONCAT(month(log_date),'-',year(log_date)) as monthYear,SUM(approved_productivity) as approved_productivity,avg(expected_productivity) as expected_productivity,(select percentage from ms7_animator_day_percentage adp where userid=".$user_id." and adp.log_date=atl.log_date) as daypercentage, 

			(select ((avg(expected_productivity)*percentage)-sum(approved_productivity)) from ms7_animator_day_percentage adp where userid=".$user_id." and adp.log_date=atl.log_date) as deficit,
			(select ((avg(expected_productivity)*percentage)) from ms7_animator_day_percentage adp where userid=".$user_id." and adp.log_date=atl.log_date) as reqAvg, (expected_productivity-approved_productivity) as deficit1,

			(select ((sum(approved_productivity)/((avg(expected_productivity)*percentage)))*100) from ms7_animator_day_percentage adp where userid=".$user_id." and adp.log_date=atl.log_date) as Avg_Productivity, 

			((approved_productivity/expected_productivity)*100) as Avg_Productivity1  from m7s_animator_time_log atl where typeof_work=1 and user_id=".$user_id." and lead1_approved_status='Yes' group by log_date



			) as a1 where monthYear='".$month_year."' group by monthYear order by month DESC");
		}
		
		if($roleid==2)
		{
			$query = $this->db->query("select ".$roleid." as role, CONCAT(Month,'-',year) as Month,sum(deficit) as deficit,sum(Avg_Productivity) as Avg_Productivity from (SELECT DATE_FORMAT(log_date,'%M') as Month,year(log_date) as year,CONCAT(month(log_date),'-',year(log_date)) as monthYear,SUM(approved_productivity) as approved_productivity,avg(expected_productivity) as expected_productivity,(expected_productivity-approved_productivity) as deficit,((approved_productivity/expected_productivity)*100) as Avg_Productivity  from ".$tbl." as atl where user_id=".$user_id." and lead1_approved_status='Yes' group by log_date) as a1 where monthYear='".$month_year."'  group by monthYear order by month DESC");
		}
		
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	
	
	
/*-----*************** Director Story Board ***************---- */
	
	public function Insert_DirStoryBoardActivity($user_id,$curDate,$start_time,$end_time,$txtprojectname,$txttaskname,$txttaskduration,$txtremarks,$curDateTime)
	{
		$query = $this->db->query("INSERT INTO ms7_dir_storyboard_time_log(user_id, log_date, start_time, end_time, project_name, task_name, task_duration, remarks, status, created_on)values('".$user_id."','".$curDate."','".$start_time."','".$end_time."','".$txtprojectname."','".$txttaskname."','".$txttaskduration."','".$txtremarks."','1','".$curDateTime."') ");
	}
	public function getDirStoryboardActivityList($user_id,$rowid)
	{
		$where="";
		if($rowid!='')
		{
			$where.=" and id=".$rowid." ";
		}
		else
		{
			$where.=" ";
		}
		$query = $this->db->query("SELECT * from ms7_dir_storyboard_time_log where status=1 and user_id=".$user_id." ".$where." ");
        return $query->result_array();
	}
	
	public function Update_DirStoryboardActivity($row_id,$user_id,$curDate,$start_time,$end_time,$txtprojectname,$txttaskname,$txttaskduration,$txtremarks,$curDateTime)
	{
		$query = $this->db->query("UPDATE ms7_dir_storyboard_time_log SET user_id='".$user_id."',log_date='".$curDate."',start_time='".$start_time."',end_time='".$end_time."',project_name='".$txtprojectname."',task_name='".$txttaskname."',task_duration='".$txttaskduration."',remarks='".$txtremarks."' WHERE id=".$row_id." ");
	}
	public function getDirStoryboardTotalRecordInserted($userid,$logdate)
	{
		$query = $this->db->query("SELECT count(*) as TotalRecord from ms7_dir_storyboard_time_log where user_id=".$userid." and log_date='".$logdate."'"); 
		return $query->result_array();
	}
	
	
	/*------------- Summary Report ---------------*/
	public function getSummaryReport($month_year,$roleid)
	{  
		if($roleid==1)
		{
			$query = $this->db->query("select *,ROUND(((approved_productivity/(expected_productivity*daypercentage))*100),2) as percentage from (SELECT u.user_id,u.u_name as Name,DATE_FORMAT(log_date,'%d-%M') as day,log_date,SUM(approved_productivity) as approved_productivity,avg(expected_productivity) as expected_productivity,(select percentage from ms7_animator_day_percentage adp where adp.userid=atl.user_id and adp.log_date=atl.log_date) as daypercentage from m7s_animator_time_log atl join m7s_users as u on u.user_id=atl.user_id where typeof_work=1 and CONCAT(month(log_date),'-',year(log_date))='".$month_year."' and lead1_approved_status='Yes' and u.isdemouser='No' group by log_date,atl.user_id order by log_date,u.user_id asc) as a1");
		}
		if($roleid==2)
		{
			$query = $this->db->query("SELECT u.user_id,u.u_name as Name,DATE_FORMAT(log_date,'%d-%M') as day,log_date,SUM(approved_productivity) as approved_productivity,avg(expected_productivity) as expected_productivity from m7s_bgartist_time_log as btl join m7s_users as u on u.user_id=btl.user_id where CONCAT(month(log_date),'-',year(log_date))='".$month_year."' and lead1_approved_status='Yes' and u.isdemouser='No' group by log_date,btl.user_id order by log_date,u.user_id asc");
		}
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	public function getUsers($roleid)
	{
		$query = $this->db->query("SELECT user_id,u_name,u_email,u_username,u_role_id,(select ur_name from m7s_user_roles where u_role_id=ur_id) as Rolename from m7s_users where u_role_id in(".$roleid.") and u_status='Y'  and isdemouser='NO' order by u_name ASC ");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	public function getMonthDate($startdate,$enddate)
	{
		$query = $this->db->query("select selected_date,DATE_FORMAT(selected_date,'%d-%M') as day from (select selected_date,dayname(selected_date) as nameofday, (FLOOR((DAYOFMONTH(selected_date) - 1) / 7) + 1) as weekval from (select adddate('1970-01-01',t4.i*10000 + t3.i*1000 + t2.i*100 + t1.i*10 + t0.i) selected_date from (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0, (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1, (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2, (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t3, (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t4) v where selected_date between '".$startdate."' and '".$enddate."' ) as a1,(SELECT @a:= 0) AS a group by selected_date");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	
	public function getSummaryOfMonth($month_year,$roleid)
	{ 
		
		if($roleid==1)
		{
			$query = $this->db->query("select log_date,day,SUM(approved_productivity) as sum_approved_productivity,AVG(approved_productivity) as avg_approved_productivity from (SELECT DATE_FORMAT(log_date,'%M') as Month,u.user_id,u.u_name as Name,DATE_FORMAT(log_date,'%d-%M') as day,log_date,SUM(approved_productivity) as approved_productivity,avg(expected_productivity) as expected_productivity,(select percentage from ms7_animator_day_percentage adp where adp.userid=atl.user_id and adp.log_date=atl.log_date) as daypercentage from m7s_animator_time_log atl join m7s_users as u on u.user_id=atl.user_id where typeof_work=1 and CONCAT(month(log_date),'-',year(log_date))='".$month_year."' and lead1_approved_status='Yes' and u.isdemouser='No' group by log_date,atl.user_id order by log_date,u.user_id asc) as a1 group by log_date");
		}
		if($roleid==2)
		{
			$query = $this->db->query("select log_date,day,SUM(approved_productivity) as sum_approved_productivity,AVG(approved_productivity) as avg_approved_productivity from (SELECT DATE_FORMAT(log_date,'%d-%M') as day,log_date,SUM(approved_productivity) as approved_productivity,avg(expected_productivity) as expected_productivity from m7s_bgartist_time_log as btl join m7s_users as u on u.user_id=btl.user_id where  CONCAT(month(log_date),'-',year(log_date))='".$month_year."'  and lead1_approved_status='Yes' and u.isdemouser='No'  group by log_date,btl.user_id  order by log_date,u.user_id asc) as a1 group by log_date");
		}
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	
	// SA - WEB//
	public function getWebActivityList($user_id,$rowid)
	{
		$where="";
		if($rowid!='')
		{
			$where.=" and wb.id=".$rowid." ";
		}
		else
		{
			$where.=" ";
		}
		/* $query = $this->db->query("SELECT * from sa_web_time_log as wb join sa_business_unit bs on bs.id=wb.business_unit_id where wb.status=1 and user_id=".$user_id." ".$where." "); */
		$query = $this->db->query("SELECT *,(select business_unit from sa_business_unit where id=wb.business_unit_id) as business_unit,(select type from sa_worktype where id=wb.work_type) as work_type_name,(select work_status from sa_work_status where id=wb.work_status) as work_status_name,
		(select type from sa_worktype where id=wb.work_type) as work_type_name,
		(select platform from sa_platform where id=wb.work_platform) as work_platform_name,
		(select project_name from sa_projects where id=wb.project_name) as projectname,
		(select u_name from m7s_users where user_id=wb.lead1_id) as lead1_name from sa_web_time_log as wb  where wb.status=1 and user_id=".$user_id." ".$where." ");
        return $query->result_array();
	}
	public function Insert_WebActivity($user_id,$curDate,$start_time,$end_time,$txtprojectname,$txttaskname,$txttaskduration,$txtremarks,$curDateTime,$business,$work_type,$ddlworkstatus,$ddlworkplatform)
	{
		//$query = $this->db->query("INSERT INTO sa_web_time_log(user_id, log_date, start_time, end_time, project_name, task_name, task_duration, remarks, status, created_on,business_unit_id,work_type,work_status,work_platform)values('".$user_id."','".$curDate."','".$start_time."','".$end_time."','".$txtprojectname."','".$this->db->escape($txttaskname)."','".$txttaskduration."','".$this->db->escape($txtremarks)."','1','".$curDateTime."','".$business."','".$work_type."','".$ddlworkstatus."','".$ddlworkplatform."') ");
		$query = $this->db->query('INSERT INTO sa_web_time_log(user_id, log_date, start_time, end_time, project_name, task_name, task_duration, remarks, status, created_on,business_unit_id,work_type,work_status,work_platform)values("'.$user_id.'","'.$curDate.'","'.$start_time.'","'.$end_time.'","'.$txtprojectname.'","'.$this->db->escape($txttaskname).'","'.$txttaskduration.'","'.$this->db->escape($txtremarks).'","1","'.$curDateTime.'","'.$business.'","'.$work_type.'","'.$ddlworkstatus.'","'.$ddlworkplatform.'") ');
	}
	public function getWebTotalRecordInserted($userid,$logdate)
	{
		$query = $this->db->query("SELECT count(*) as TotalRecord from sa_web_time_log where user_id=".$userid." and log_date='".$logdate."'"); 
		return $query->result_array();
	}
	public function Update_WebActivity($row_id,$user_id,$curDate,$start_time,$end_time,$txtprojectname,$txttaskname,$txttaskduration,$txtremarks,$curDateTime,$business,$work_type,$ddlworkstatus,$ddlworkplatform)
	{
		$query = $this->db->query("UPDATE sa_web_time_log SET user_id='".$user_id."',log_date='".$curDate."',start_time='".$start_time."',end_time='".$end_time."',project_name='".$txtprojectname."',task_name='".$txttaskname."',task_duration='".$txttaskduration."',remarks='".$txtremarks."',business_unit_id='".$business."',work_type='".$work_type."',work_status='".$ddlworkstatus."',work_platform='".$ddlworkplatform."' WHERE id=".$row_id." ");
	}
	public function getbusiness()
	{
		$query = $this->db->query("SELECT * from sa_business_unit where status='1'"); 
		return $query->result_array();
	}
	public function project_list($business)
	{
		$query = $this->db->query("SELECT * from sa_projects where business_unit_id='".$business."' and status='1'"); 
		return $query->result_array();
	}
	
	public function get_weblist($uid)
	{
		$query = $this->db->query("SELECT id,wb.user_id,u_name as user_name,log_date, start_time, end_time,
		(select project_name from sa_projects where id=wb.project_name) as project_name,
		(select type from sa_worktype where id=wb.work_type) as work_type_name,
		(select work_status from sa_work_status where id=wb.work_status) as work_status_name,
		(select platform from sa_platform where id=wb.work_platform) as work_platform_name,
		(select u_name from m7s_users where user_id=wb.lead1_id) as lead_name,
		(select business_unit from sa_business_unit where id=wb.business_unit_id) as business_unit,
		task_name,task_duration,completed_duration,work_hour,remarks, lead1_id,lead1_remarks,lead2_id,lead2_remarks FROM sa_web_time_log wb join m7s_users as u on u.user_id=wb.user_id WHERE status=1 and lead1_approved_status='No' and manager_id!='' and u.manager_id='".$uid."' ORDER BY log_date DESC");
		return $query->result_array();
	}
	public function get_logDetails($rowid) 
	{
		$query = $this->db->query("SELECT * from sa_web_time_log where id='".$rowid."' and status=1 ");
		return $query->result_array();
	}
	public function UpdateLeadRemarks($row_id,$updating_userid,$uid,$Remarks,$curDateTime,$completed_duration,$work_hour)
	{
		$query = $this->db->query("UPDATE sa_web_time_log SET lead1_id='".$updating_userid."',lead1_remarks='".$Remarks."',lead1_approved_datetime='".$curDateTime."',completed_duration='".$completed_duration."',work_hour='".$work_hour."',lead1_approved_status='Yes' WHERE id=".$row_id." and user_id=".$uid." ");
	}
	public function get_approvedlist($uid)
	{
		$query = $this->db->query("SELECT id,wb.user_id,u_name as user_name,log_date, start_time, end_time,
		(select project_name from sa_projects where id=wb.project_name) as project_name, 
		(select type from sa_worktype where id=wb.work_type) as work_type_name,
		(select work_status from sa_work_status where id=wb.work_status) as work_status_name,
		(select platform from sa_platform where id=wb.work_platform) as work_platform_name,
		(select u_name from m7s_users where user_id=wb.lead1_id) as lead_name,
		(select business_unit from sa_business_unit where id=wb.business_unit_id) as business_unit,
		task_name,task_duration,completed_duration,work_hour,remarks, lead1_id,lead1_remarks,lead2_id,lead2_remarks FROM sa_web_time_log wb join m7s_users as u on u.user_id=wb.user_id WHERE status=1 and lead1_approved_status='Yes' and manager_id!='' and u.manager_id='".$uid."' ORDER BY log_date DESC");
		return $query->result_array();
	}
	
	
	public function getWorkType()
	{
		$query = $this->db->query("SELECT * FROM sa_worktype WHERE status=1 "); 
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	public function getWorkStatus()
	{
		$query = $this->db->query("SELECT * FROM sa_work_status WHERE status='1' "); 
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}	
	
	public function getPlatform()
	{
		$query = $this->db->query("SELECT * FROM sa_platform WHERE status='1' "); 
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	public function getAllUsers()
	{
		$query = $this->db->query("SELECT *,
		(select u_name from m7s_users where user_id=wb.user_id) as name,
		(select project_name from sa_projects where id=wb.project_name) as project_name,
		(select type from sa_worktype where id=wb.work_type) as work_type_name,
		(select work_status from sa_work_status where id=wb.work_status) as work_status_name,
		(select u_name from m7s_users where user_id=wb.lead1_id) as lead_name,
		(select u_name from m7s_users where user_id=wb.lead2_id) as super_lead_name,
		(select business_unit from sa_business_unit where id=wb.business_unit_id) as business_unit
		FROM sa_web_time_log as wb WHERE status='1' "); 
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
}
 