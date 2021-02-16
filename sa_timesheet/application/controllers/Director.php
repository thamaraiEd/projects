<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Director  extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
		$this->load->model('Dashboard_model');
		$this->load->library('session');	
		$this->load->library('My_PHPMailer');
		//$this->load->helper('download');
		$this->load->library('csvimport'); 
	}  
	public function activitylist()  
	{
		if($this->session->user_id=="" || !isset($this->session->user_id)){redirect('index.php');}  
		$rowid='';
		$data['activitylist']=$this->Dashboard_model->getDirStoryboardActivityList($this->session->user_id,$rowid);
		$this->load->view('header');
		$this->load->view('director/sb_activitylist',$data);
		$this->load->view('footer');
	}
	public function addactivity()  
	{ 
		if($this->session->user_id=="" || !isset($this->session->user_id)){redirect('index.php');}  
		
		$this->load->view('header');
		$this->load->view('director/sb_add_activity');
		$this->load->view('footer');
	}
	public function editactivity()  
	{ 
		if($this->session->user_id=="" || !isset($this->session->user_id)){redirect('index.php');}  
		
		$rowid=$this->input->get('rowid');
		$data['rowid']=$rowid;
		$data['userdata']=$this->Dashboard_model->getDirStoryboardActivityList($this->session->user_id,$rowid);
		
		$this->load->view('header');
		$this->load->view('director/sb_edit_activity',$data);
		$this->load->view('footer');
	}
	public function insert_activity()  
	{ 	
		$curDateTime = date("Y-m-d h:m:i");		 
		$txtcurdate=$this->input->post('txtcurdate');
		$lgdate= strtotime($txtcurdate);
		$curDate= date('Y-m-d', $lgdate);
							
		$start_time=$this->input->post('starttime');
		$end_time=$this->input->post('endtime');
		$txtprojectname=$this->input->post('txtprojectname');
		$txttaskname=$this->input->post('txttaskname');
		$txtremarks=$this->input->post('txtremark');
		$txttaskduration=$this->input->post('txttaskduration');
		 
		
		 
		$stime=strtotime($this->input->post('starttime'));
		$etime=strtotime($this->input->post('endtime')); 
		$istime=1;
		//echo $stime."<".$etime;exit;
		if($stime!='' && ($etime!='' && $end_time!='00:00:00'))
		{
			if($stime>$etime)
			{
				$istime=0;
			}
			else
			{
				$istime=1;
			}
		}
		else
		{
			$istime=1;
		}
		if($istime==1)
		{
			$insertactivity=$this->Dashboard_model->Insert_DirStoryBoardActivity($this->session->user_id,$curDate,$start_time,$end_time,$txtprojectname,$txttaskname,$txttaskduration,$txtremarks,$curDateTime); 
			
			$RecordType=$this->Dashboard_model->getDirStoryboardTotalRecordInserted($this->session->user_id,$curDate); 
			
			$arrResult=array("response"=>"1","msg"=>"Activity ".$RecordType[0]['TotalRecord']." Created Successfully"); 
		}
		else
		{
			$arrResult=array("response"=>"0","msg"=>"<span style='color:red;'>End time should be greater than start time</span>"); 
		}
			echo json_encode($arrResult);exit; 
	}
	public function update_activity()  
	{ 	
		
		$curDateTime = date("Y-m-d h:m:i");		 
		$txtcurdate=$this->input->post('txtcurdate');
		$lgdate= strtotime($txtcurdate);
		$curDate= date('Y-m-d', $lgdate);
							
		$hdnrowid=$this->input->post('hdnrowid');
		$start_time=$this->input->post('starttime');
		$end_time=$this->input->post('endtime');
		$txtprojectname=$this->input->post('txtprojectname');
		$txttaskname=$this->input->post('txttaskname');
		$txtremarks=$this->input->post('txtremark');
		$txttaskduration=$this->input->post('txttaskduration');
		 
		
		 
		$stime=strtotime($this->input->post('starttime'));
		$etime=strtotime($this->input->post('endtime')); 
		$istime=1;
		//echo $stime."<".$etime;exit;
		if($stime!='' && ($etime!='' && $end_time!='00:00:00'))
		{
			if($stime>$etime)
			{
				$istime=0;
			}
			else
			{
				$istime=1;
			}
		}
		else
		{
			$istime=1;
		}
		if($istime==1)
		{
			$insertactivity=$this->Dashboard_model->Update_DirStoryboardActivity($hdnrowid,$this->session->user_id,$curDate,$start_time,$end_time,$txtprojectname,$txttaskname,$txttaskduration,$txtremarks,$curDateTime);   
			$arrResult=array("response"=>"1","msg"=>"Activity ".$RecordType[0]['TotalRecord']." Created Successfully"); 
		}
		else
		{
			$arrResult=array("response"=>"0","msg"=>"<span style='color:red;'>End time should be greater than start time</span>"); 
		}
			echo json_encode($arrResult);exit; 
	}
	 
}
