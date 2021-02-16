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
 
	public function GetSAtDetails()
	{
		$query = $this->db->query("SELECT pf.pfid as pack_id,pf.flavour_name, pf.flavour_description,pp.price FROM product_flavour pf join product_flavour_pricing pp on pp.flavour_id=pf.pfid WHERE pf.status=1 and pf.product_id=pp.product_id and pf.product_id=1");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}	
	public function GetPuzzleDetails()
	{
		$query = $this->db->query("SELECT  pf.pfid as pack_id,pf.flavour_name, pf.flavour_description,pp.price FROM product_flavour pf join product_flavour_pricing pp on pp.flavour_id=pf.pfid WHERE pf.status=1 and pf.product_id=pp.product_id and pf.product_id=3");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	public function pack_details()
	{
		$query = $this->db->query("select pfid,flavour_name from product_flavour where product_id=1 and status=1");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	
	}
	public function gradelist()
	{
		$query = $this->db->query("select * from grades where status=1");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	
	}public function Getcurriculum()
	{
		$query = $this->db->query("select * from school_band_curriculum where status=1");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	
	}
	public function chk_SA_mobile($contactnumber)
	{
		$query = $this->db->query("select count(id) as tot from student_registration where username='".$contactnumber."' and status=1"); 
		return $query->result_array();
	}
	public function addstudent($studentname,$emailid,$pack,$grade_id,$curriculum,$schoolname,$schoollocation,$couponcode,$contactnumber,$orgpassword,$password,$salt1,$salt2)
	{
		/* $query = $this->db->query("INSERT INTO `student_registration`(`student_name`, `email`, `grade_id`, `school_name`, `school_location`, `mobile`, `pack_id`, `curriculum_id`, `coupon_code`, `created_on`, `status`) VALUES ('".$studentname."','".$emailid."','".$grade_id."','".$schoolname."','".$schoollocation."','".$contactnumber."','".$pack."','".$curriculum."','".$couponcode."',NOW(),1)"); */
		
		$query = $this->db->query("CALL SAstudentInsert('".$studentname."','".$emailid."','".$grade_id."','".$schoolname."','".$schoollocation."','".$contactnumber."','".$pack."','".$curriculum."','".$couponcode."','".$orgpassword."','".$password."','".$salt1."','".$salt2."')"); 
		
		mysqli_next_result($this->db->conn_id);
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	
	}
	public function puzzle_pack_details()
	{
		$query = $this->db->query("select pfid,flavour_name from product_flavour where product_id=3 and status=1");
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	
	}	
	
	public function chkemail($spoc_mail)
	{
		$query = $this->db->query("select count(id) as tot from puzzle_break_school where `spoc_mail`='".$spoc_mail."' and status=1"); 
		return $query->result_array();
	}	
	public function insert_puzzle_school($schoolname,$address,$spoc_name,$spoc_mail,$spoc_mobile,$spoc_licence,$pack,$grade,$couponcode)
	{
		/* $query = $this->db->query("INSERT INTO `puzzle_break_school`(`school_name`, `address`, `spoc_name`, `spoc_mail`, `spoc_mobile`, `total_licence`, `grade_id`, `pack_id`, `coupon_code`, `created_on`, `created_by`, `modified_on`, `modified_by`, `status`) VALUES ('".$schoolname."','".$address."','".$spoc_name."','".$spoc_mail."','".$spoc_mobile."','".$spoc_licence."','".$grade."','".$pack."','".$couponcode."',NOW(),'',NOW(),'',1)"); */
		
		
		 $query = $this->db->query("CALL PBschoolInsert('".$schoolname."','".$address."','".$spoc_name."','".$spoc_mail."','".$spoc_mobile."','".$spoc_licence."','".$grade."','".$pack."','".$couponcode."')"); 
		//echo $this->db->last_query(); exit;
	
	}
	public function chk_bulk_user_email($spoc_mail)
	{
		$query = $this->db->query("select count(id) as tot from bulk_users_quotation where `spoc_mail`='".$spoc_mail."' and status=1"); 
		return $query->result_array();
	}
	public function insert_users($schoolname,$address,$spoc_name,$spoc_mail,$spoc_mobile,$spoc_licence)
	{
		$query = $this->db->query("INSERT INTO `bulk_users_quotation`(`school_name`, `address`, `spoc_name`, `spoc_mail`, `spoc_mobile`, `total_licence`, `created_by`, `created_on`, `modified_by`, `modified_on`, `status`) VALUES ('".$schoolname."','".$address."','".$spoc_name."','".$spoc_mail."','".$spoc_mobile."','".$spoc_licence."','',NOW(),'',NOW(),1)");
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
		$query = $this->db->query("select count(id) as iscouponvalid from couponmaster where couponcode='".$couponcode."' and (CURDATE() between valid_from and valid_to) and coupon_valid_times>coupon_used_times and status=1 and is_registered='Y' and product_id=1 ");		
		//echo $this->db->last_query(); exit;	
		return $query->result_array(); 
	}
	public function UpdateCouponCount($couponcode)
	{
		$query = $this->db->query("UPDATE couponmaster SET coupon_used_times=coupon_used_times+1 WHERE couponcode='".$couponcode."' and product_id=1 "); 
	}
	 /*********************************************** PUZZLE-BREAK - COUPONCODE*************************************************/
	public function GetCouponCodeDetails_PB($couponcode)
	{
		$query = $this->db->query("select count(id) as iscouponvalid,coupon_valid_times,discount_percentage,coupon_used_times from couponmaster where couponcode='".$couponcode."' and status='1' and is_registered='Y' and product_id=3");		
		return $query->result_array(); 
	}
	public function applycouponnew_PB($couponcode)
	{
		$query = $this->db->query("select count(id) as iscouponvalid from couponmaster where couponcode='".$couponcode."' and (CURDATE() between valid_from and valid_to) and coupon_valid_times>coupon_used_times and status=1 and is_registered='Y' and product_id=3");		
		//echo $this->db->last_query(); exit;	
		return $query->result_array(); 
	}
	public function UpdateCouponCount_PB($couponcode)
	{
		$query = $this->db->query("UPDATE couponmaster SET coupon_used_times=coupon_used_times+1 WHERE couponcode='".$couponcode."' and product_id=3"); 
	}
	
	
	
	public function price_list($pack)
    {		 
		$query = $this->db->query('select ppid,price from product_flavour_pricing where flavour_id="'.$pack.'"');		
		//echo $this->db->last_query(); exit;
		return $query->result_array();
    }
	public function GetstudentDetails($stdid)
    {		 
		$query = $this->db->query('select * from student_registration where id="'.$stdid.'"');		
		//echo $this->db->last_query(); exit;
		return $query->result_array();
    }
	
	/************************************* PAYMENT **********************************/
	public function getInActiveChildIDDetails($stdid)
	{
		$query = $this->db->query('select * FROM student_registration a WHERE md5(a.id)="'.$stdid.'"  AND a.status=0');
		return $query->result();
	}
	public function updateChildConfirmUser($stdid,$grade_id,$gp_id)
	{
		$query = $this->db->query('UPDATE student_registration SET status=1,paymentstatus="P" where id="'.$stdid.'"');
		
		/* $this->db->query("INSERT INTO user_academic_mapping(id, grade_id, gp_id, sid, section, academicid, status)VALUES(".$stdid.",'".$grade_id."','".$gp_id."',2,'A',20,1)"); */
	}
	public function updateChildFailureUser($stdid,$paymentstatus)
	{
		$query = $this->db->query('UPDATE student_registration SET paymentstatus="'.$paymentstatus.'" where id="'.$stdid.'"');
	}
	
	public function getresponsedetails($stdid)
	{
		$query = $this->db->query('select * from  student_registration  where md5(id)="'.$stdid.'"');		
		//echo $this->db->last_query();
		return $query->result_array();
	}
	public function subscriberexistchk($subscriberid)
	{
		$query = $this->db->query('select count(id) as subid, student_name from student_registration where id = "'.$subscriberid.'"');		
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	public function getconfigdetails($couponcode)
	{
		$query = $this->db->query('select id,validity,CURDATE() as startdate,DATE_ADD(CURDATE(), INTERVAL validity-1 DAY) as enddate from organization_master where id IN(select organization_id from couponmaster where couponcode="'.$couponcode.'" and status=1)');
		//echo $this->db->last_query(); 
		return $query->result_array();
	}
	public function getDefaultPlandetails()
	{
		$query = $this->db->query('select id,validity,CURDATE() as startdate,DATE_ADD(CURDATE(), INTERVAL validity DAY) as enddate from organization_master where id=1');
		//echo $this->db->last_query(); 
		return $query->result_array();
	}
	public function subscribeusers($subscriberid,$salt1,$salt2,$email,$password,$gradeid,$student_name,$mobile,$school_location,$couponcode,$orgpwd,$startdate,$enddate,$orgid,$profileimage)
	{
		$query = $this->db->query('INSERT INTO student(subscriberid,email, salt1, password, salt2, student_name,mobile, status, grade_id,school_location, username,school_name,created_on,org_password,couponcode,startdate,enddate,org_id,avatarimage,agreetermsandservice)
		VALUES("'.$subscriberid.'","'.$email.'","'.$salt1.'","'.$password.'","'.$salt2.'","'.$student_name.'","'.$mobile.'",1,"'.$gradeid.'","'.$school_location.'","'.$username.'","'.$school_name.'","'.date("Y-m-d").'","'.$orgpwd.'","'.$couponcode.'","'.$startdate.'","'.$enddate.'","'.$orgid.'","'.$profileimage.'",1)');
		
		$lastid=$this->db->insert_id();
		
		/* $query = $this->db->query("INSERT INTO user_academic_mapping(id, grade_id, gp_id, sid, section, academicid, status, visible)
		VALUES(".$clplastid.",'".$gradeid."','".$planid."',2,'A',20,1,1)"); */

		/* $query = $this->db->query('INSERT INTO users(subscriberid,salt1,salt2,email,sid,password,grade_id,section,academicyear,	login_count,agreetermsandservice,fname,lname,gender,mobile,address,username,dob,status,gp_id,creation_date,school_master_id,validitystartdate)VALUES("'.$subscriberid.'","'.$salt1.'","'.$salt2.'","'.$email.'",2,"'.$password.'","'.$gradeid.'","A",20,0,0,"'.$firstname.'","'.$lastname.'","'.$gender.'","'.$mobile.'","'.$address.'","'.$email.'","'.$dob.'",1,"'.$gameplanid.'","'.date("Y-m-d H:i:s").'",1,"'.date("Y-m-d").'")'); */
		return $lastid;
	}
	public function getstdlist($stdid)
	{
		$query = $this->db->query('select * from  student_registration  where md5(id)="'.$stdid.'"');		
		//echo $this->db->last_query();
		return $query->result_array();
	}
	
}
