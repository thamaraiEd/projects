<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sa_model extends CI_Model {
	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
		$this->load->database();
		$this->load->library('Multipledb');
	} 
	public function GetSAtDetails()
	{
		$query = $this->db->query("SELECT pf.pfid as pack_id,pf.flavour_name, pf.flavour_description,pp.price FROM product_flavour pf join product_flavour_pricing pp on pp.flavour_id=pf.pfid WHERE pf.status=1 and pf.product_id=pp.product_id and pf.product_id=1");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}	
	public function GetPuzzleDetails()
	{
		$query = $this->db->query("SELECT  pf.pfid as pack_id,pf.flavour_name, pf.flavour_description,pp.price FROM product_flavour pf join product_flavour_pricing pp on pp.flavour_id=pf.pfid WHERE pf.status=1 and pf.product_id=pp.product_id and pf.product_id=3 group by pp.flavour_id");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	public function pack_details()
	{
		$query = $this->db->query("select pfid,flavour_name from product_flavour where product_id=1 and status=1");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	
	}
	public function gradelist($pid)
	{
		$where="";
		if($pid==3)
		{
			$where.=" program_id in(1,2)";	
		}
		else
		{
			$where.=" program_id in(".$pid.")";
		}
		$query = $this->db->query("select * from grades where status='1' and ".$where." ");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	
	}
	public function Getcurriculum()
	{
		$query = $this->db->query("select * from school_band_curriculum where status='1'");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	
	}
	public function chk_SA_mobile($contactnumber)
	{
		$query = $this->db->query("select count(id) as tot from student_registration where username='".$contactnumber."' and status=1 and paymentstatus='Y'"); 
		return $query->result_array();
	}
	public function addstudent($studentname,$emailid,$pack,$grade_id,$curriculum,$schoolname,$schoollocation,$couponcode,$contactnumber,$orgpassword,$password,$salt1,$salt2,$city,$state,$country,$pincode,$mobile_prefix)
	{
		/* $query = $this->db->query("INSERT INTO `student_registration`(`student_name`, `email`, `grade_id`, `school_name`, `school_location`, `mobile`, `pack_id`, `curriculum_id`, `coupon_code`, `created_on`, `status`) VALUES ('".$studentname."','".$emailid."','".$grade_id."','".$schoolname."','".$schoollocation."','".$contactnumber."','".$pack."','".$curriculum."','".$couponcode."',NOW(),1)"); */
		
		$query = $this->db->query("CALL SAstudentInsert('".$studentname."','".$emailid."','".$grade_id."','".$schoolname."','".$schoollocation."','".$contactnumber."','".$pack."','".$curriculum."','".$couponcode."','".$orgpassword."','".$password."','".$salt1."','".$salt2."','".$city."','".$state."','".$country."','".$pincode."','".$mobile_prefix."')"); 
		
		mysqli_next_result($this->db->conn_id);
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	
	}
	public function puzzle_pack_details()
	{
		$query = $this->db->query("select pfid,flavour_name from product_flavour where product_id=3 and status='1'");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	
	}	
	public function chk_PB_mobile($spoc_mobile)
	{
		$query = $this->db->query("select count(id) as tot from puzzle_break_registration where username='".$spoc_mobile."' "); 
		return $query->result_array();
	}
	
	public function insert_puzzle_school($schoolname,$address,$spoc_name,$spoc_mail,$spoc_mobile,$spoc_licence,$pack,$grade,$couponcode,$orgpassword,$password,$salt1,$salt2,$city,$state,$country,$pincode)
	{
		/* $query = $this->db->query("INSERT INTO `puzzle_break_registration`(`school_name`, `address`, `spoc_name`, `spoc_mail`, `spoc_mobile`, `total_licence`, `grade_id`, `pack_id`, `coupon_code`, `created_on`, `created_by`, `modified_on`, `modified_by`, `status`) VALUES ('".$schoolname."','".$address."','".$spoc_name."','".$spoc_mail."','".$spoc_mobile."','".$spoc_licence."','".$grade."','".$pack."','".$couponcode."',NOW(),'',NOW(),'',1)"); */
		
		
		 $query = $this->db->query("CALL PBschoolInsert('".$schoolname."','".$address."','".$spoc_name."','".$spoc_mail."','".$spoc_mobile."','".$spoc_licence."','".$grade."','".$pack."','".$couponcode."','".$orgpassword."','".$password."','".$salt1."','".$salt2."','".$city."','".$state."','".$country."','".$pincode."')"); 
		
		mysqli_next_result($this->db->conn_id);
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	
	}
	public function chk_bulk_user_email($spoc_mail)
	{
		$query = $this->db->query("select count(id) as tot from bulk_users_quotation where `spoc_mail`='".$spoc_mail."' and status='1'"); 
		return $query->result_array();
	}
	public function insert_users($schoolname,$address,$spoc_name,$spoc_mail,$spoc_mobile,$spoc_licence,$program)
	{
		$query = $this->db->query("INSERT INTO `bulk_users_quotation`(`school_name`, `address`, `spoc_name`, `spoc_mail`, `spoc_mobile`, `total_licence`, `created_by`, `created_on`, `modified_by`, `modified_on`, `status`,`program_id`) VALUES ('".$schoolname."','".$address."','".$spoc_name."','".$spoc_mail."','".$spoc_mobile."','".$spoc_licence."','',NOW(),'',NOW(),1,'".$program."')");
		//echo $this->db->last_query(); exit;	
	}
	 /**********************************************  SKILLANGELS - COUPONCODE  **************************************************/
	public function GetCouponCodeDetails($couponcode)
	{
		$query = $this->db->query("select count(id) as iscouponvalid,coupon_valid_times,discount_percentage,coupon_used_times from couponmaster where couponcode='".$couponcode."' and status='1' and is_registered='Y' and product_id=1");		
		return $query->result_array(); 
	}
	public function applycouponnew($couponcode)
	{
		$query = $this->db->query("select count(id) as iscouponvalid from couponmaster where couponcode='".$couponcode."' and (CURDATE() between valid_from and valid_to) and coupon_valid_times>coupon_used_times and status='1' and is_registered='Y' and product_id=1 ");		
		//echo $this->db->last_query(); exit;	
		return $query->result_array(); 
	}
	public function UpdateCouponCount($couponcode)
	{
		$query = $this->db->query("UPDATE couponmaster SET coupon_used_times=coupon_used_times+1 WHERE couponcode='".$couponcode."' and product_id=1 "); 
	}
	public function completestatus($subscriberid)
	{
		$query = $this->db->query('UPDATE student_registration SET status=1,visible=1,paymentstatus="Y",completeddate="'.date("Y-m-d H:i:s").'" where md5(id)= "'.$subscriberid.'" ');		
		//echo $this->db->last_query(); exit;
	}
	 /*********************************************** PUZZLE-BREAK - COUPONCODE*************************************************/
	public function GetCouponCodeDetails_PB($couponcode)
	{
		$query = $this->db->query("select count(id) as iscouponvalid,coupon_valid_times,discount_percentage,coupon_used_times from couponmaster where couponcode='".$couponcode."' and status='1' and is_registered='Y' and product_id=3");		
		return $query->result_array(); 
	}
	public function applycouponnew_PB($couponcode)
	{
		$query = $this->db->query("select count(id) as iscouponvalid from couponmaster where couponcode='".$couponcode."' and (CURDATE() between valid_from and valid_to) and coupon_valid_times>coupon_used_times and status='1' and is_registered='Y' and product_id=3");		
		//echo $this->db->last_query(); exit;	
		return $query->result_array(); 
	}
	public function UpdateCouponCount_PB($couponcode)
	{
		$query = $this->db->query("UPDATE couponmaster SET coupon_used_times=coupon_used_times+1 WHERE couponcode='".$couponcode."' and product_id=3"); 
	}
	public function completestatus_PB($subscriberid)
	{
		$query = $this->db->query('UPDATE puzzle_break_registration SET paymentstatus="Y",completeddate="'.date("Y-m-d H:i:s").'" where md5(id)= "'.$subscriberid.'" ');		
		//echo $this->db->last_query(); exit;
		
	}
	
	
	public function price_list($pack,$spoc_licence)
    {		 
		$query = $this->db->query('select ppid,price from product_flavour_pricing where flavour_id="'.$pack.'" and "'.$spoc_licence.'" between usercount_start_range AND usercount_end_range');		
		//echo $this->db->last_query(); exit;
		return $query->result_array();
    }
	public function GetstudentDetails($stdid)
    {		 
		$query = $this->db->query('select * from student_registration where id="'.$stdid.'"');		
		//echo $this->db->last_query(); exit;
		return $query->result_array();
    }
	
	public function GetPBstudentDetails($stdid)
    {		 
		$query = $this->db->query('select * from puzzle_break_registration where id="'.$stdid.'"');		
		//echo $this->db->last_query(); exit;
		return $query->result_array();
    }
	
	
	/************************************* PAYMENT - B2C **********************************/
	public function getInActiveChildIDDetails($stdid)
	{
		$query = $this->db->query('select * from  student_registration as sr join product_flavour as pf on pf.pfid=sr.pack_id where pf.product_id=1 and md5(id)="'.$stdid.'" AND status="0"');	
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	public function updateConfirmUser($stdid)
	{
		$query = $this->db->query('UPDATE student_registration SET status="1",visible="1",paymentstatus="Y" where id="'.$stdid.'"');
		
		/* $this->db->query("INSERT INTO user_academic_mapping(id, grade_id, gp_id, sid, section, academicid, status)VALUES(".$stdid.",'".$grade_id."','".$gp_id."',2,'A',20,1)"); */
	}
	public function updateChildFailureUser($stdid,$paymentstatus)
	{
		$query = $this->db->query('UPDATE student_registration SET paymentstatus="'.$paymentstatus.'" where id="'.$stdid.'"');
	}
	
	public function getresponsedetails($stdid)
	{
		$query = $this->db->query('select *,sr.status as stu_status from  student_registration as sr
		join product_flavour as pf on pf.pfid=sr.pack_id
		where pf.product_id=1 and md5(id)="'.$stdid.'"');		
		//echo $this->db->last_query();
		return $query->result_array();
	}
	public function subscriberexistchk($subscriberid)
	{
		$query = $this->db->query('select count(id) as subid, student_name from student where subscriberid = "'.$subscriberid.'"');		
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	/* public function getconfigdetails($couponcode)
	{
		$query = $this->db->query('select id,validity,CURDATE() as startdate,DATE_ADD(CURDATE(), INTERVAL validity-1 DAY) as enddate from organization_master where id IN(select organization_id from couponmaster where couponcode="'.$couponcode.'" and status="1")');
		//echo $this->db->last_query(); 
		return $query->result_array();
	} */
	public function getconfigdetails($pack_id)
	{
		$query = $this->db->query('select pfid,validity,CURDATE() as startdate,DATE_ADD(CURDATE(), INTERVAL validity-1 DAY) as enddate from product_flavour where pfid="'.$pack_id.'" and status="1" and product_id=1');
		//echo $this->db->last_query(); 
		return $query->result_array();
	}
	public function getDefaultPlandetails()
	{
		$query = $this->db->query('select id,validity,CURDATE() as startdate,DATE_ADD(CURDATE(), INTERVAL validity DAY) as enddate from organization_master where id=1');
		//echo $this->db->last_query(); 
		return $query->result_array();
	}
	public function subscribeusers($subscriberid,$salt1,$salt2,$email,$password,$gradeid,$student_name,$mobile,$school_location,$couponcode,$orgpwd,$startdate,$enddate,$profileimage,$username,$pack_id,$curriculum_id,$school_name,$city,$state,$country,$pincode,$parent_account_id)
	{
		$query = $this->db->query('INSERT INTO student(subscriberid,email, salt1, password, salt2, student_name,mobile, status, grade_id,school_location, username,school_name,created_on,org_password,coupon_code,startdate,enddate,org_id,avatarimage,agreetermsandservice,pack_id,curriculum_id,city,state,country,pincode,parent_account_id)
		VALUES("'.$subscriberid.'","'.$email.'","'.$salt1.'","'.$password.'","'.$salt2.'","'.$student_name.'","'.$mobile.'",1,"'.$gradeid.'","'.$school_location.'","'.$username.'","'.$school_name.'","'.date("Y-m-d").'","'.$orgpwd.'","'.$couponcode.'","'.$startdate.'","'.$enddate.'",1,"'.$profileimage.'",1,"'.$pack_id.'","'.$curriculum_id.'","'.$city.'","'.$state.'","'.$country.'","'.$pincode.'","'.$parent_account_id.'")');
		
		$lastid=$this->db->insert_id();
		//echo $this->db->last_query();
		return $lastid;
	}
	public function getstdlist($stdid)
	{
		$query = $this->db->query('select * from  student_registration  where md5(id)="'.$stdid.'"');		
		//echo $this->db->last_query();
		return $query->result_array();
	}
	
	/************************************* PAYMENT - B2C - END **********************************/
	/************************************* PAYMENT - PB - START **********************************/
	
	public function getInActiveChildIDDetails_PB($stdid)
	{
		$query = $this->db->query('select * from  puzzle_break_registration as pr join product_flavour as pf on pf.pfid=pr.pack_id  where pf.product_id=3 and md5(id)="'.$stdid.'" AND pr.status="0"');
		//echo $this->db->last_query();
		return $query->result_array();
	}
	public function updateConfirmUser_PB($stdid)
	{
		$query = $this->db->query('UPDATE puzzle_break_registration SET status="1",visible="1",paymentstatus="Y" where id="'.$stdid.'"');
		
		/* $this->db->query("INSERT INTO user_academic_mapping(id, grade_id, gp_id, sid, section, academicid, status)VALUES(".$stdid.",'".$grade_id."','".$gp_id."',2,'A',20,1)"); */
	}
/* 	public function updateChildFailureUser_PB($stdid,$paymentstatus)
	{
		$query = $this->db->query('UPDATE puzzle_break_registration SET paymentstatus="'.$paymentstatus.'" where id="'.$stdid.'"');
	} */
	
	public function getresponsedetails_PB($stdid)
	{
		$query = $this->db->query('select * from  puzzle_break_registration as pr join product_flavour as pf on pf.pfid=pr.pack_id  where pf.product_id=3 and md5(id)="'.$stdid.'"');		
		//echo $this->db->last_query();
		return $query->result_array();
	}
	public function subscriberexistchk_PB($subscriberid)
	{
		$query = $this->db->query('select count(id) as subid, spoc_name from puzzle_break_school where subscriberid = "'.$subscriberid.'"');		
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	/* public function getconfigdetails_PB($couponcode)
	{
		$query = $this->db->query('select id,validity,CURDATE() as startdate,DATE_ADD(CURDATE(), INTERVAL validity-1 DAY) as enddate from organization_master where id IN(select organization_id from couponmaster where couponcode="'.$couponcode.'" and status="1")');
		//echo $this->db->last_query(); 
		return $query->result_array();
	} */
	public function getconfigdetails_PB($pack_id)
	{
		$query = $this->db->query('select pfid,validity,CURDATE() as startdate,DATE_ADD(CURDATE(), INTERVAL validity-1 DAY) as enddate from product_flavour where pfid="'.$pack_id.'" and status="1" and product_id=3');
		//echo $this->db->last_query(); 
		return $query->result_array();
	}
	public function getDefaultPlandetails_PB()
	{
		$query = $this->db->query('select id,validity,CURDATE() as startdate,DATE_ADD(CURDATE(), INTERVAL validity DAY) as enddate from organization_master where id=1');
		//echo $this->db->last_query(); 
		return $query->result_array();
	}
	public function subscribeusers_PB($subscriberid,$spoc_name,$username,$salt1,$salt2,$email,$password,$gradeid,$mobile,$address,$couponcode,$orgpwd,$total_licence,$school_name,$startdate,$enddate,$profileimage,$pack_id,$city,$state,$country,$pincode)	
	{
		$query = $this->db->query('INSERT INTO puzzle_break_school(subscriberid,spoc_name,spoc_mail,total_licence, salt1, password, salt2,spoc_mobile, status, grade_id,address, username,school_name,created_on,org_password,coupon_code,startdate,enddate,org_id,avatarimage,agreetermsandservice,pack_id,city,state,country,pincode)
		VALUES("'.$subscriberid.'","'.$spoc_name.'","'.$email.'","'.$total_licence.'","'.$salt1.'","'.$password.'","'.$salt2.'","'.$mobile.'",1,"'.$gradeid.'","'.$address.'","'.$username.'","'.$school_name.'","'.date("Y-m-d").'","'.$orgpwd.'","'.$couponcode.'","'.$startdate.'","'.$enddate.'",1,"'.$profileimage.'",1,"'.$pack_id.'" ,"'.$city.'","'.$state.'","'.$country.'","'.$pincode.'")');
		
		//$lastid=$this->db->insert_id();
		//echo $this->db->last_query();
		//return $lastid;
	}
	//////////
	public function InsertSchool_PB($username,$email,$address,$orgpwd,$total_licence,$school_name,$startdate,$enddate,$pack_id,$city,$state,$country,$flavour_name)	
	{
		$query = $this->multipledb->db->query('INSERT INTO schools(`school_code`, `school_name`, `username`, `password`, `licence_purchased`, `email`, `school_address`, `zone`, `city`, `district`, `state`, `country`, `active`, `createdby`, `creation_date`, `modifiedby`, `modified_date`, `start_date`, `email_cc`, `isdemo`, `islogin`, `last_active_datetime`, `startdate`, `enddate`, `planname`, `status`)
		VALUES("","'.$school_name.'","'.$username.'","'.$orgpwd.'","'.$total_licence.'","'.$email.'","'.$address.'","","'.$city.'","","'.$state.'","'.$country.'",1,"",NOW(),"",NOW(),"'.$startdate.'","","N","",NOW(),"'.$startdate.'","'.$enddate.'","'.$flavour_name.'",1)');
		
		//$lastid=$this->db->insert_id();
		//echo $this->multipledb->db->last_query();
		//return $lastid;
	}
	//////////
	public function getstdlist_PB($stdid)
	{
		$query = $this->db->query('select * from  puzzle_break_registration  where md5(id)="'.$stdid.'"');		
		//echo $this->db->last_query();
		return $query->result_array();
	}
	/************************************* PAYMENT - PB - END **********************************/
		public function program()
	{
		$query = $this->db->query('select * from  prefered_program  where status="1"');		
		//echo $this->db->last_query();
		return $query->result_array();
	}
	
	public function UpdateB2CHotsStatus($status,$code,$message,$stu_id,$Refferal_Code)
	{
		$query = $this->db->query('UPDATE student SET refferal_code="'.$Refferal_Code.'",b2c_hots_status="'.$status.'",response_status="'.$code.'",response_code="'.$message.'" where id= "'.$stu_id.'" ');	
	
		$query = $this->db->query('UPDATE trial_account SET referral="'.$Refferal_Code.'"  where id= "'.$this->session->user_id.'" ');		
		//echo $this->db->last_query(); exit;
	}
	public function country()
	{
		$query = $this->db->query('select * from countries where MobilePrefix!="" ');		
		//echo $this->db->last_query();
		return $query->result_array();
	}
	
	
	public function getValidity_Details($pack_id)
	{
		$query = $this->db->query('select validity from product_flavour where pfid="'.$pack_id.'" and status=1');		
		//echo $this->db->last_query();
		return $query->result_array();
	}
	public function getprefered_program($program)
	{
		$query = $this->db->query('select program from prefered_program where id="'.$program.'" and status=1');		
		//echo $this->db->last_query();
		return $query->result_array();
	}
	public function checkTrialAccountExist($email)
	{
		$query = $this->db->query('select count(*) as emailexist from trial_account where email="'.$email.'" and status=1'); 
		return $query->result_array();
	}
	public function checkMobileNoExist($mobileno)
	{
		$query = $this->db->query('select *,count(*) as emailexist from trial_account where contact_no="'.$mobileno.'" and status=1'); 
		return $query->result_array();
	}
	public function AddTrialUser($name, $email, $contactnumber, $program, $grade, $password, $kidsname, $mobile_prefix, $countrid, $referral_user_id, $school)
	{
		$query = $this->db->query('INSERT INTO trial_account(name,kidsname,email,password,country_id,mobile_prefix,contact_no, program, grade, referred_by, school,  status, created_on) values("' . $name . '","' . $kidsname . '","' . $email . '","' . $password . '","' . $countrid . '","' . $mobile_prefix . '","' . $contactnumber . '","' . $program . '","' . $grade  . '","' . $referral_user_id . '","' . $school . '",1,NOW()) ');
		$lastid = $this->db->insert_id();
		return $lastid;
	}
	public function getAssessGames($game_grade,$uid,$skillkid)
	{ 
		$query = $this->db->query("SELECT 
		(select count(id) as tot_game_played from asap_gamedata	 where gu_id = '".$uid."'   AND gs_id = g.gs_id) as tot_game_played, 
		(SELECT  CASE  when count(gs_id)>=10 THEN count(id) WHEN FIND_IN_SET('U',group_concat(answer_status))>=1 THEN 'TO' when count(gs_id)<10 THEN count(id) ELSE 0 END CompletedSkill FROM asap_gamescore as gs   where gs_id=g.gs_id and gu_id='".$uid."') as tot_ques_attend,
		(select SUM(game_score) from asap_gamedata where gu_id = '".$uid."' AND gs_id = g.gs_id) as tot_game_score,
		j.id as Skill_ID, j.name AS Skill_Name, g.gid, g.gname, g.img_path as Game_Icon_Path,g.gname as Game_Path, j.icon FROM games as g 
		JOIN category_skills AS j ON g.gs_id = j.id  
		WHERE  g.grade_id='".$game_grade."' and g.gs_id in(".$skillkid.") GROUP BY g.gid order by g.gs_id");  
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	public function getGameValues($gamename,$portal_type)
	{ 
		$query=$this->db->query("select gid,gs_id FROM  games WHERE gname='".$gamename."' "); 		
		return $query->result_array();
	}
	public function getGamePlayedDetails($gid,$uid,$puzzlecycle,$portal_type)
	{
		$query = $this->db->query(" SELECT count(*) as qcnts,sum(game_score) as scores,MIN(balancetime) as timerval,GROUP_CONCAT(que_id) as qvalues,sum(responsetime) as rsptime,max(answer) as crtcnt,GROUP_CONCAT(game_score) as questionscore,GROUP_CONCAT(useranswer) as useranswer FROM asap_gamescore  WHERE g_id='".$gid."' and gu_id='".$uid."' and puzzle_cycle='".$puzzlecycle."' and portal_type='".$portal_type."' ");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	public function getPlayedPuzzleCount($userid,$todaydate,$gid,$current_Cycle,$portal_type)
	{
		$query = $this->db->query('SELECT CASE when count(gs_id)>=10 THEN 1 WHEN FIND_IN_SET("U",group_concat(answer_status))>=1 THEN 1 ELSE 0 END CompletedSkill FROM asap_gamescore as gs where g_id='.$gid.' and gu_id="'.$userid.'" and puzzle_cycle='.$current_Cycle.' and portal_type="'.$portal_type.'"  '); 
		return $query->result_array();
	}
	public function InsertGameData($uid,$SID,$GID,$ResponseTime,$BalaceTime,$CorrectAnswer,$UserAnswer,$AnswerStaus,$QNO,$SCORE,$TimeOverStatus,$puzzle_cycle,$curdate,$curdatetime,$gametime,$portal_type)
	{ 
		$query = $this->db->query('CALL GameDataInsert("'.$uid.'","'.$SID.'","'.$GID.'","'.$ResponseTime.'","'.$BalaceTime.'","'.$CorrectAnswer.'","'.$UserAnswer.'","'.$AnswerStaus.'","'.$QNO.'","'.$SCORE.'","'.$TimeOverStatus.'","'.$puzzle_cycle.'","'.$curdate.'","'.$curdatetime.'","'.$gametime.'","'.$portal_type.'")'); 
		
		mysqli_next_result($this->db->conn_id);
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	
	public function checklogin($mobile,$password)
	{
		$query = $this->db->query('select * from trial_account where CONCAT(mobile_prefix,"",contact_no)="'.$mobile.'" and password="'.$password.'" '); 
		
		return $query->result_array();
	}

	public function UpdateTrialSkillid($user_id,$skillkid)
	{
		$query = $this->db->query('Update trial_account set trial_skillid="'.$skillkid.'" where id="'.$user_id.'" ');
	}
	public function getSkill($grade_id)
	{
		$query = $this->db->query('select gs_id,(select name from category_skills where id=gs_id) as skillname from games where grade_id="'.$grade_id.'" '); 
		return $query->result_array();
	}
	public function getgameid($gamename)
	{
		$query = $this->db->query("select gid,gs_id from games where gname='".$gamename."'  ");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	public function checkgame($gameid)
	{ 
		$user_id = $this->session->user_id;
		
		$query = $this->db->query("select count(gs_id) as totalgameplayed from asap_gamedata  where gu_id='".$user_id."' and g_id=".$gameid." ");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	public function getresultGameDetails($userid,$gameid,$portal_type)
	{
		$query = $this->db->query("select (select count(gu_id) from asap_gamedata where gu_id=".$userid." and g_id='".$gameid."' and lastupdate='".date("Y-m-d")."' and gs_id IN(".$this->session->Skillid.") and portal_type='".$portal_type."' ) as playedgamescount");

		return $query->result_array();
	}	
	public function insertone($userid,$skillid,$stageid,$gameid,$total_ques,$attempt_ques,$answer,$score,$a6,$a7,$a8,$a9,$lastup_date,$portal_type)
	{
		$query = $this->db->query("insert into asap_gamedata (gu_id,gs_id,g_id,total_question,attempt_question,answer,game_score,gtime,rtime,crtime,wrtime,lastupdate,creation_date,portal_type) values('".$userid."','".$skillid."','".$gameid."','".$total_ques."','".$attempt_ques."','".$answer."','".$score."','".$a6."','".$a7."','".$a8."','".$a9."','".$lastup_date."','".date("Y-m-d")."','".$portal_type."')");
		//echo $this->db->last_query(); exit;
	}
	public function getChildList($parentid)
	{
		$query = $this->db->query("select student_name,username,(select gradename from grades as g where g.grade_id=s.grade_id) as Grade,(select band_curriculum from school_band_curriculum as sbc where sbc.id=s.curriculum_id) as band_curriculum,(select flavour_name from product_flavour as p where p.pfid=s.pack_id) as pack_name from student as s where parent_account_id=".$parentid." "); 
		return $query->result_array();
	}
	public function checkReferralCodeExist($referral_code)
	{
		$query = $this->db->query('select count(*) as referralexist, name, id from trial_account where referral="' . $referral_code . '" and status=1');
		return $query->result_array();
	}
	
	public function UpdateUserOTP($user_id,$OTP,$OTP_Count)
	{
		$query = $this->db->query('Update trial_account set otp="'.$OTP.'",otp_datetime="'.date('Y-m-d H:i:s').'",otp_nooftime="'.$OTP_Count.'" where id="'.$user_id.'" ');
	}
	public function checkloginbyOTP($mobileno,$OTP)
	{
		$query = $this->db->query('select * from trial_account where CONCAT(mobile_prefix,"",contact_no)="'.$mobileno.'" and otp="'.$OTP.'" '); 
		return $query->result_array();
	}
	public function checkgooglelogin($email)
	{
		$query = $this->db->query('select * from trial_account where email="' . $email . '"');
		return $query->result_array();
	}
	public function getUserDataFromSP($userid,$uniqueId,$ip,$txcountry,$txregion,$txcity,$txisp,$browser,$status,$todaydate,$now)
	{	 
		$query = $this->db->query('CALL sp_userlogin('.$this->db->escape($userid).','.$this->db->escape($uniqueId).','.$this->db->escape($ip).','.$this->db->escape($txcountry).','.$this->db->escape($txregion).','.$this->db->escape($txcity).','.$this->db->escape($txisp).','.$this->db->escape($browser).','.$this->db->escape($status).','.$this->db->escape($todaydate).','.$this->db->escape($now).')'); 
		
	}
	public function update_logout_log($userid,$sessionid)
	{	
		$query = $this->db->query('update trial_login_log set lastupdate="'.date('Y-m-d H:i:s').'",logout_date="'.date('Y-m-d H:i:s').'" where userid='.$this->db->escape($userid).' and sessionid='.$this->db->escape($sessionid).'');
		return $query;		
	}
	public function updateuserloginstatus($userid,$login_session_id)
	{
		$query = $this->db->query('Update trial_account set islogin=0 WHERE id='.$this->db->escape($userid).' AND status=1');
		mysqli_next_result($this->db->conn_id);	
	}
	public function checkValidMobile($mobileno)
	{
		$query = $this->db->query('select *,count(*) as emailexist from trial_account where CONCAT(mobile_prefix,"",contact_no)="'.$mobileno.'" and status=1'); 
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	public function getParentDetails($userid)
	{
		$query = $this->db->query('select * from trial_account where id='.$userid.' and status=1'); 
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	
	public function InitiatePayment($subid,$payable_amount,$Currency)
	{	
		$query = $this->db->query('CALL InitiatePayment("'.$subid.'","'.$payable_amount.'","'.$Currency.'","'.date('Y-m-d H:i:s').'")'); 
		mysqli_next_result($this->db->conn_id);	
	 
		return $query->result_array();
	}
	public function UpdatePaymentSuccessStatus($Order_id,$Pay_id,$Trans_id,$Payment_response,$Payment_status,$Payment_mode,$subid,$Bank_transaction_id,$Payment_method,$Bank,$Card_id,$Wallet,$Vpa,$Error_code,$Error_description,$Error_source,$Error_step,$Error_reason)
	{ 

		$query = $this->db->query('UPDATE tbl_payment SET  Order_id="'.$Order_id.'",Payment_id="'.$Pay_id.'",Trans_id="'.$Trans_id.'",Payment_response="'.$Payment_response.'",Payment_status="'.$Payment_status.'",Payment_mode="'.$Payment_mode.'",modified_on="'.date('Y-m-d H:i:s').'",Bank_transaction_id="'.$Bank_transaction_id.'",Payment_method="'.$Payment_method.'",Bank="'.$Bank.'",Card_id="'.$Card_id.'",Wallet="'.$Wallet.'",Vpa="'.$Vpa.'",Error_code="'.$Error_code.'",Error_description="'.$Error_description.'",Error_source="'.$Error_source.'",Error_step="'.$Error_step.'",Error_reason="'.$Error_reason.'"  where id="'.$subid.'" and CONCAT("EdB2C","_","'.$subid.'")="'.$Order_id.'" ');  
	}
	public function UpdatePaymentFailureStatus($Order_id,$Pay_id,$Trans_id,$Payment_response,$Payment_status,$Payment_mode,$subid,$Error_code,$Error_description,$Error_source,$Error_step,$Error_reason)
	{
		$query = $this->db->query('UPDATE tbl_payment SET  Order_id="'.$Order_id.'",Payment_id="'.$Pay_id.'",Trans_id="'.$Trans_id.'",Payment_response="'.$Payment_response.'",Payment_status="'.$Payment_status.'",Payment_mode="'.$Payment_mode.'",modified_on="'.date('Y-m-d H:i:s').'",Error_code="'.$Error_code.'",Error_description="'.$Error_description.'",Error_source="'.$Error_source.'",Error_step="'.$Error_step.'",Error_reason="'.$Error_reason.'"  where id="'.$subid.'" and CONCAT("EdB2C","_","'.$subid.'")="'.$Order_id.'" ');  
	}
	public function checkPlanAlreadyPurchased($parentid)
	{
		$query = $this->db->query('select count(*) as noofchild from student where parent_account_id='.$parentid.' and status=1'); 
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
}
