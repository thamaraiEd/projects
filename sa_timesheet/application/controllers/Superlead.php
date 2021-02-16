<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superlead extends CI_Controller
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
	 
	 
	/********************************** Director ***********************************************/
	public function directordashboard()  
	{	 
		//if($this->session->user_id=="" || !isset($this->session->user_id)){redirect('index.php');}
		//echo $_POST;  
		
		// echo "<pre>";print_r($data['actiontype']);exit;
	 	//$data['getbgactivitylist']=$this->Dashboard_model->get_bgactivitylist(); 
		// echo "<pre>";print_r($data['actiontype']);exit;
		$this->load->view('header');
		$this->load->view('superlead/dashboard');
		$this->load->view('footer');
	} 
	
	public function approvalist()  
	{	 
		 
		//echo $_POST;   
	 	$data['getrolelist']=$this->Dashboard_model->get_rolelist(); 
		// echo "<pre>";print_r($data['actiontype']);exit;
		$this->load->view('header');
		$this->load->view('superlead/approvallist',$data);
		$this->load->view('footer');
	}

	public function get_animatorlist()  
	{	  
		//echo $_POST;  
		$roleid = $_POST['roleid'];		// echo $roleid;exit;
		$data['animatordetails']=$this->Dashboard_model->get_animatordetails($roleid);
		 // echo "<pre>";print_r($data['userroledetails']);exit;
		$this->load->view('superlead/animatordetails',$data);
	}

	public function get_bgartistlist()  
	{	  
		//echo $_POST;  
		$roleid = $_POST['roleid'];		
		$data['bgartistdetails']=$this->Dashboard_model->get_bgartistdetails($roleid);
		//echo "<pre>";print_r($data['bgartistdetails']);exit;
		$this->load->view('superlead/bgartistdetails',$data);
	}
	
	public function ani_superleadcomments()  
	{	  
		$leadid = $this->session->user_id;		
		$curDateTime = date("Y-m-d h:m:i");
		$aid = $this->input->post('aid');	    
		$uid = $this->input->post('uid');	      
		$txtdirectorremarks = $this->input->post('txtdirectorremarks');	  
		if($txtdirectorremarks!='')
		{ 
			$data['approve_animator']=$this->Dashboard_model->updateAni_SuperLeadComments($aid,$uid,$txtdirectorremarks,$curDateTime,$leadid); 
			
			$this->session->set_flashdata('Success_msg', 'Remarks Updated Successfully'); 
			$arrResult=array("response"=>"1","msg"=>"Remarks Updated Successfully"); 
		}
		else
		{
			$arrResult=array("response"=>"2","msg"=>"Please enter required field value");		
		}
		echo json_encode($arrResult);exit; 
	} 
    public function bg_superleadcomments()
    {
        // echo "<pre>";print_r($_POST);exit;
        $leadid = $this->session->user_id;       
        $curDateTime = date("Y-m-d h:m:i");
        $aid = $this->input->post('aid');       // echo $aid;exit;
        $uid = $this->input->post('uid');        // echo $uid;exit; 
        $txtdirectorremarks = $this->input->post('txtdirectorremarks');  
        if($txtdirectorremarks!='')
        {  
            $data['approve_bgartist']=$this->Dashboard_model->updateBG_SuperLeadComments($aid,$uid,$txtdirectorremarks,$curDateTime,$leadid); 
            $this->session->set_flashdata('Success_msg', 'Productivity updated successfully');
          
            $arrResult=array("response"=>"1","msg"=>"Productivity updated successfully");
        }
        else
        {
            $arrResult=array("response"=>"2","msg"=>"Approved prodctivity is greater than completed frame");
            //$this->session->set_flashdata('errcommon', 'Approved frame is greater than completed frame');          
        }  
        echo json_encode($arrResult);exit;
        //$this->load->view('superlead/bgartistdetails',$data);
    }

	
	/********************************** Director ***********************************************/
	 
	     
	/*-------------------- Reports ---------------*/
	
	 
	public function dayreport()  
	{	
		if($this->session->user_id=="" || !isset($this->session->user_id)){redirect('index.php');}  
		
		$Current_year=date('Y');
		$start_date=date('Y-01-01');
		$end_date=date('Y-12-31');
		
		$data['yearofMonth']=$this->Dashboard_model->getMonthofYear($start_date,$end_date);
		$data['listofusers']=$this->Dashboard_model->getAllRoleUser();
		$this->load->view('header');
		$this->load->view('superlead/activitylist_daywise',$data);
		$this->load->view('footer');
	}
	public function getDirUserDayData()  
	{
		$month_year=$this->input->post('month_year');		
		$user_id=$this->input->post('user_id');		
		$roleid=$this->input->post('roleid');	
		 
		$data['Daywisedata']=$this->Dashboard_model->getDirUserDayData($user_id,$roleid,$month_year);	
		$data['Monthwisedata']=$this->Dashboard_model->MonthSummaryReport($user_id,$roleid,$month_year);	
		 
		// echo "<pre>";print_r($data['Monthwisedata']);exit;
			
		$this->load->view('superlead/daywisesummary',$data);
	}
	 
	public function monthreport()  
	{	
		if($this->session->user_id=="" || !isset($this->session->user_id)){redirect('index.php');}  
		
		$Current_year=date('Y');
		$start_date=date('Y-01-01');
		$end_date=date('Y-12-31');
		
		$data['yearofMonth']=$this->Dashboard_model->getMonthofYear($start_date,$end_date);
		$data['listofusers']=$this->Dashboard_model->getAllRoleUser();
		$this->load->view('header');
		$this->load->view('superlead/monthwise_report',$data);
		$this->load->view('footer');
	}
	public function dir_MonthwiseSummary()  
	{
		$month_year=$this->input->post('month_year');		
		$user_id=$this->input->post('user_id');		
		$roleid=$this->input->post('roleid');	
		 
		
		$data['Daywisedata']=$this->Dashboard_model->dir_MonthwiseSummary($user_id,$roleid,$month_year);
		
		$this->load->view('superlead/monthwisesummary',$data);
	} 
	public function userdetails()  
	{	 
		 if($this->session->user_id=="" || !isset($this->session->user_id)){redirect('index.php');}  
		//echo $_POST;   
	 	$data['getrolelist']=$this->Dashboard_model->get_rolelist(); 
		// echo "<pre>";print_r($data['actiontype']);exit;
		$this->load->view('header');
		$this->load->view('superlead/userdetails',$data);
		$this->load->view('footer');
	}

	public function animater_userdetails()  
	{	  
		//echo $_POST;  
		$logdate=$this->input->post('log_date');
		$datearray=explode("-",$logdate);
		$start_date=$datearray[0];
		$end_date=$datearray[1];
		if($start_date!='' && $end_date!='')
		{
			$sdate=date("Y-m-d", strtotime($start_date));
			$edate=date("Y-m-d", strtotime($end_date));
		}
		else
		{
			$sdate='';
			$edate='';
		}
		$data['animatordetails']=$this->Dashboard_model->sl_animater_userdetails($sdate,$edate);
		 // echo "<pre>";print_r($data['userroledetails']);exit;
		$this->load->view('superlead/animater_userdetails',$data);
	}

	public function bgartist_userdetails()  
	{  
		//echo $_POST;  
		$logdate=$this->input->post('log_date');
		$datearray=explode("-",$logdate);
		$start_date=$datearray[0];
		$end_date=$datearray[1];
		if($start_date!='' && $end_date!='')
		{
			$sdate=date("Y-m-d", strtotime($start_date));
			$edate=date("Y-m-d", strtotime($end_date));
		}
		else
		{
			$sdate='';
			$edate='';
		}
		
		$data['bgartistdetails']=$this->Dashboard_model->sl_bgartist_userdetails($sdate,$edate);
		$this->load->view('superlead/bgartist_userdetails',$data);
	}
	public function Reviewer_Userdetails()  
	{  
		//echo $_POST;  
		$logdate=$this->input->post('log_date');
		$datearray=explode("-",$logdate);
		$start_date=$datearray[0];
		$end_date=$datearray[1];
		if($start_date!='' && $end_date!='')
		{
			$sdate=date("Y-m-d", strtotime($start_date));
			$edate=date("Y-m-d", strtotime($end_date));
		}
		else
		{
			$sdate='';
			$edate='';
		}
		
		$data['reviewerlist']=$this->Dashboard_model->Reviewer_UserReport($sdate,$edate);
		$this->load->view('superlead/reviewer_userdetails',$data);
	}
	public function StoryBoard_Userdetails()  
	{  
		$logdate=$this->input->post('log_date');
		$datearray=explode("-",$logdate);
		$start_date=$datearray[0];
		$end_date=$datearray[1];
		if($start_date!='' && $end_date!='')
		{
			$sdate=date("Y-m-d", strtotime($start_date));
			$edate=date("Y-m-d", strtotime($end_date));
		}
		else
		{
			$sdate='';
			$edate='';
		}
		$data['reviewerlist']=$this->Dashboard_model->StoryBoard_UserReport($sdate,$edate); 
		$this->load->view('superlead/storyboard_userdetails',$data);
	}
	public function Comp_Userdetails()  
	{  
		$logdate=$this->input->post('log_date');
		$datearray=explode("-",$logdate);
		$start_date=$datearray[0];
		$end_date=$datearray[1];
		if($start_date!='' && $end_date!='')
		{
			$sdate=date("Y-m-d", strtotime($start_date));
			$edate=date("Y-m-d", strtotime($end_date));
		}
		else
		{
			$sdate='';
			$edate='';
		}
		$data['reviewerlist']=$this->Dashboard_model->Comp_UserReport($sdate,$edate); 
		$this->load->view('superlead/comp_userdetails',$data);
	}
	public function Dir_Userdetails()  
	{  
		$logdate=$this->input->post('log_date');
		$datearray=explode("-",$logdate);
		$start_date=$datearray[0];
		$end_date=$datearray[1];
		if($start_date!='' && $end_date!='')
		{
			$sdate=date("Y-m-d", strtotime($start_date));
			$edate=date("Y-m-d", strtotime($end_date));
		}
		else
		{
			$sdate='';
			$edate='';
		}
		$data['reviewerlist']=$this->Dashboard_model->Dir_UserReport($sdate,$edate); 
		$this->load->view('superlead/dir_userdetails',$data);
	}
	
	public function addLeade2Remarks()  
	{
		$updating_userid = $this->session->user_id;		
		$curDateTime = date("Y-m-d h:m:i"); 	    
		$rowid = $this->input->post('rowid');	    
		$uid = $this->input->post('uid');	    
		 
		$Remarks = $this->input->post('txtdirectorremarks');
		
		if($rowid!='' && $uid!='' && $Remarks!='')
		{
			$data['approve_animator']=$this->Dashboard_model->UpdateSuperLeadRemarks_AR($rowid,$updating_userid,$uid,$Remarks,$curDateTime);
			
			$this->session->set_flashdata('Success_msg', 'Remarks updated successfully'); 
			$arrResult=array("response"=>"1","msg"=>"Remarks updated successfully"); 
		}
		else
		{
			$arrResult=array("response"=>"0","msg"=>"Please fill the required details"); 
		}
		
			echo json_encode($arrResult);exit; 
	}
	
	public function addLeade2Remarksforsba()  
	{
		$updating_userid = $this->session->user_id;		
		$curDateTime = date("Y-m-d h:m:i"); 	    
		$rowid = $this->input->post('rowid');	    
		$uid = $this->input->post('uid');	    
		 
		$Remarks = $this->input->post('txtdirectorremarks');
		
		if($rowid!='' && $uid!='' && $Remarks!='' )
		{
			$data['approve_animator']=$this->Dashboard_model->UpdateSuperLeadRemarks_SBA($rowid,$updating_userid,$uid,$Remarks,$curDateTime);
			
			$this->session->set_flashdata('Success_msg', 'Activity Updated Successfully'); 
			$arrResult=array("response"=>"1","msg"=>"Activity Updated Successfully"); 
		}
		else
		{
			$arrResult=array("response"=>"0","msg"=>"Please fill the required details"); 
		}
		
			echo json_encode($arrResult);exit; 
	}
	public function addLeade2Remarksforcomp()  
	{
		$updating_userid = $this->session->user_id;		
		$curDateTime = date("Y-m-d h:m:i"); 	    
		$rowid = $this->input->post('rowid');	    
		$uid = $this->input->post('uid');	    
		 
		$Remarks = $this->input->post('txtdirectorremarks');
		
		if($rowid!='' && $uid!='' && $Remarks!='' )
		{
			$data['approve_animator']=$this->Dashboard_model->UpdateSuperLeadRemarks_comp($rowid,$updating_userid,$uid,$Remarks,$curDateTime);
			
			$this->session->set_flashdata('Success_msg', 'Activity Updated Successfully'); 
			$arrResult=array("response"=>"1","msg"=>"Activity Updated Successfully"); 
		}
		else
		{
			$arrResult=array("response"=>"0","msg"=>"Please fill the required details"); 
		}
		
			echo json_encode($arrResult);exit; 
	}
	public function addLeade2Remarksfordir()  
	{
		$updating_userid = $this->session->user_id;		
		$curDateTime = date("Y-m-d h:m:i"); 	    
		$rowid = $this->input->post('rowid');	    
		$uid = $this->input->post('uid');	    
		 
		$Remarks = $this->input->post('txtdirectorremarks');
		
		if($rowid!='' && $uid!='' && $Remarks!='' )
		{
			$data['approve_animator']=$this->Dashboard_model->UpdateSuperLeadRemarks_dir($rowid,$updating_userid,$uid,$Remarks,$curDateTime);
			
			$this->session->set_flashdata('Success_msg', 'Activity Updated Successfully'); 
			$arrResult=array("response"=>"1","msg"=>"Activity Updated Successfully"); 
		}
		else
		{
			$arrResult=array("response"=>"0","msg"=>"Please fill the required details"); 
		}
		
			echo json_encode($arrResult);exit; 
	}
	
}
