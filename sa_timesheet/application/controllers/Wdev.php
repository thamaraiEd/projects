<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wdev extends CI_Controller
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
/* Animator Reviewer ---------*/	
	public function activitylist()  
	{
		if($this->session->user_id=="" || !isset($this->session->user_id)){redirect('index.php');}  
		$rowid='';
		$data['activitylist']=$this->Dashboard_model->getWebActivityList($this->session->user_id,$rowid);
		//echo"<pre>"; print_r($data['activitylist']); exit;
		$this->load->view('header');
		$this->load->view('webdevelopment/activitylist',$data);
		$this->load->view('footer');
	}
	public function addactivity()  
	{ 
		if($this->session->user_id=="" || !isset($this->session->user_id)){redirect('index.php');}  
		
		$data['business']=$this->Dashboard_model->getbusiness();
		$data['worktype']=$this->Dashboard_model->getWorkType();
		$data['workstatus']=$this->Dashboard_model->getWorkStatus();
		$data['platforms']=$this->Dashboard_model->getPlatform();
		//echo"<pre>"; print_r($data['business']); exit;
		$this->load->view('header');
		$this->load->view('webdevelopment/add_activity',$data);
		$this->load->view('footer');
	}
	public function editactivity()  
	{ 
		if($this->session->user_id=="" || !isset($this->session->user_id)){redirect('index.php');}  
		
		$rowid=$this->input->get('rowid');
		$data['rowid']=$rowid;
		$data['business']=$this->Dashboard_model->getbusiness(); 
		$data['worktype']=$this->Dashboard_model->getWorkType();
		$data['workstatus']=$this->Dashboard_model->getWorkStatus();
		$data['platforms']=$this->Dashboard_model->getPlatform();
		$data['userdata']=$this->Dashboard_model->getWebActivityList($this->session->user_id,$rowid);
		
		$this->load->view('header');
		$this->load->view('webdevelopment/edit_activity',$data);
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
		$business=$this->input->post('business');
		$ddlworktype=$this->input->post('ddlworktype');
		$ddlworkstatus=$this->input->post('ddlworkstatus');
		$ddlworkplatform=$this->input->post('ddlworkplatform');
		 
		//echo"<pre>"; print_r($txtprojectname); exit;
		 
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
			$insertactivity=$this->Dashboard_model->Insert_WebActivity($this->session->user_id,$curDate,$start_time,$end_time,$txtprojectname,$txttaskname,$txttaskduration,$txtremarks,$curDateTime,$business,$ddlworktype,$ddlworkstatus,$ddlworkplatform); 
			
			$RecordType=$this->Dashboard_model->getWebTotalRecordInserted($this->session->user_id,$curDate); 
			
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
		$business=$this->input->post('business');
		$ddlworktype=$this->input->post('ddlworktype');
		$ddlworkstatus=$this->input->post('ddlworkstatus');
		$ddlworkplatform=$this->input->post('ddlworkplatform');
		
		 
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
			$insertactivity=$this->Dashboard_model->Update_WebActivity($hdnrowid,$this->session->user_id,$curDate,$start_time,$end_time,$txtprojectname,$txttaskname,$txttaskduration,$txtremarks,$curDateTime,$business,$ddlworktype,$ddlworkstatus,$ddlworkplatform);   
			$arrResult=array("response"=>"1","msg"=>"Activity ".$RecordType[0]['TotalRecord']." Created Successfully"); 
		}
		else
		{
			$arrResult=array("response"=>"0","msg"=>"<span style='color:red;'>End time should be greater than start time</span>"); 
		}
			echo json_encode($arrResult);exit; 
	}
	public function project_list()  
	{ 
		$business = $_POST['business']; 
		$data['project_list'] = $this->Dashboard_model->project_list($business);
		$this->load->view('webdevelopment/project_list', $data);

	}
	public function approvalist()  
	{	 
		if($this->session->user_id=="" || !isset($this->session->user_id)){redirect('index.php');}
		//echo"<pre>"; print_r($this->session->user_id); exit;
		$data['reviewerlist']=$this->Dashboard_model->get_weblist($this->session->user_id); 
		// echo "<pre>";print_r($data['actiontype']);exit;
		$this->load->view('header');
		$this->load->view('webdevelopment/approvallist',$data);
		$this->load->view('footer');
	}
	public function addRemarks()  
	{
		$updating_userid = $this->session->user_id;		
		$curDateTime = date("Y-m-d h:m:i"); 	    
		$rowid = $this->input->post('rowid');	    
		$uid = $this->input->post('uid');	    
		 
		$Remarks = $this->input->post('txtdirectorremarks');
		$completed_duration = 0;
		$task_duration = 0;		
		/*
		$completed_duration = $this->input->post('txtcompleted_duration');
		$task_duration = $this->input->post('task_duration');
		*/
		$StoryBoardDetails=$this->Dashboard_model->get_logDetails($rowid); 
		$start_time=$StoryBoardDetails[0]['start_time'];
		$end_time=$StoryBoardDetails[0]['end_time'];
		
		$startTime = new DateTime($start_time);
		$endTime = new DateTime($end_time);
		$duration = $startTime->diff($endTime); //$duration is a DateInterval object
		$workhour=  $duration->format("%H:%I"); //echo $workhour; exit;  
		
		//if($rowid!='' && $uid!='' && $Remarks!='' && $completed_duration!='')
		if($rowid!='' && $uid!='' && $Remarks!='' )
		{
			if($task_duration>=$completed_duration)
			{
				$data['approve_animator']=$this->Dashboard_model->UpdateLeadRemarks($rowid,$updating_userid,$uid,$Remarks,$curDateTime,$completed_duration,$workhour);
			
				$this->session->set_flashdata('Success_msg', 'Activity Updated Successfully'); 
				$arrResult=array("response"=>"1","msg"=>"Activity Updated Successfully"); 
			}
			else
			{
				$arrResult=array("response"=>"0","msg"=>"Complted duration must be less than or equal to task duration");
			}
		}
		else
		{
			$arrResult=array("response"=>"0","msg"=>"Please fill the required details"); 
		}
		
			echo json_encode($arrResult);exit; 
	}
	
	public function approvedlist()  
	{	 
	 
		if($this->session->user_id=="" || !isset($this->session->user_id)){redirect('index.php');}
		$data['reviewerlist']=$this->Dashboard_model->get_approvedlist($this->session->user_id); 
		// echo "<pre>";print_r($data['actiontype']);exit;
		$this->load->view('header');
		$this->load->view('webdevelopment/approved_list',$data);
		$this->load->view('footer');
	}	
	public function dashboard()  
	{	
	 
		if($this->session->user_id=="" || !isset($this->session->user_id)){redirect('index.php');}
		
		$data['userslist']=$this->Dashboard_model->getAllUsers();
		
		$this->load->view('header');
		$this->load->view('webdevelopment/dashboard',$data);
		$this->load->view('footer');
	}
	 
}
