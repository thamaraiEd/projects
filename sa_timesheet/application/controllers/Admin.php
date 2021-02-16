<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
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
		$this->load->view('header');
		$this->load->view('admin/dashboard');
		$this->load->view('footer');
	} 
	
	public function approvalist()  
	{	 
		 
		//echo $_POST;   
	 	$data['getrolelist']=$this->Dashboard_model->get_rolelist(); 
		// echo "<pre>";print_r($data['actiontype']);exit;
		$this->load->view('header');
		$this->load->view('admin/approvallist',$data);
		$this->load->view('footer');
	}

	public function get_animatorlist()  
	{	  
		//echo $_POST;  
		$roleid = $_POST['roleid'];		// echo $roleid;exit;
		$data['animatordetails']=$this->Dashboard_model->get_animatordetails($roleid);
		 // echo "<pre>";print_r($data['userroledetails']);exit;
		$this->load->view('admin/animatordetails',$data);
	}

	public function get_bgartistlist()  
	{	  
		//echo $_POST;  
		$roleid = $_POST['roleid'];		
		$data['bgartistdetails']=$this->Dashboard_model->get_bgartistdetails($roleid);
		//echo "<pre>";print_r($data['bgartistdetails']);exit;
		$this->load->view('admin/bgartistdetails',$data);
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
        //$this->load->view('admin/bgartistdetails',$data);
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
		$this->load->view('admin/activitylist_daywise',$data);
		$this->load->view('footer');
	}
	public function getDirUserDayData()  
	{
		$month_year=$this->input->post('month_year');		
		$user_id=$this->input->post('user_id');		
		$roleid=$this->input->post('roleid');	
		 
		$data['Daywisedata']=$this->Dashboard_model->getDirUserDayData($user_id,$roleid,$month_year);	
		$data['Monthwisedata']=$this->Dashboard_model->MonthSummaryReport($user_id,$roleid,$month_year);
			
		$this->load->view('admin/daywisesummary',$data);
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
		$this->load->view('admin/monthwise_report',$data);
		$this->load->view('footer');
	}
	 
	public function overallreport()  
	{	
		if($this->session->user_id=="" || !isset($this->session->user_id)){redirect('index.php');}  
		
		$Current_year=date('Y');
		$start_date=date('Y-01-01');
		$end_date=date('Y-12-31');
		
		$data['yearofMonth']=$this->Dashboard_model->getMonthofYear($start_date,$end_date);
		//$data['listofusers']=$this->Dashboard_model->getAllRoleUser();
		$this->load->view('header');
		$this->load->view('admin/overall_report',$data);
		$this->load->view('footer');
	}
	public function dir_MonthwiseSummary()  
	{
		$month_year=$this->input->post('month_year');		
		$user_id=$this->input->post('user_id');		
		$roleid=$this->input->post('roleid');	
		 
		
		$data['Daywisedata']=$this->Dashboard_model->dir_MonthwiseSummary($user_id,$roleid,$month_year);
		
		$this->load->view('admin/monthwisesummary',$data);
	} 
	public function dir_OverallSummary()  
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
		
		$data['Daywisedata']=$this->Dashboard_model->dir_OverallSummary($sdate,$edate);
		
		$this->load->view('admin/overallsummary',$data);
	} 
	public function userdetails()  
	{	 
		 if($this->session->user_id=="" || !isset($this->session->user_id)){redirect('index.php');}  
		//echo $_POST;   
	 	$data['getrolelist']=$this->Dashboard_model->get_rolelist(); 
		// echo "<pre>";print_r($data['actiontype']);exit;
		$this->load->view('header');
		$this->load->view('admin/userdetails',$data);
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
		$this->load->view('admin/animater_userdetails',$data);
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
		$this->load->view('admin/bgartist_userdetails',$data);
	}
	
/*-------------- Edit Animatore------------------*/	
	public function editactivity()  
	{	
		if($this->session->user_id=="" || !isset($this->session->user_id)){redirect('index.php');}	
		
		$logdate=$this->input->get('logdate');
		$rowid=$this->input->get('rowid');
		$userid=$this->input->get('userid');
		if($logdate!='' && $rowid!=''  && $userid!='')
		{	
			$data['rowid']=$rowid;
			$data['logdate']=$logdate;
			$data['userid']=$userid;
			$data['userdata']=$this->Dashboard_model->getAnimaterDay($userid,$logdate,$rowid);
			//echo "<pre>";print_r($data['userdata']);exit;
			$data['actiontype']=$this->Dashboard_model->get_actiontypes(); 
			$data['characters']=$this->Dashboard_model->get_characters(); 
			$data['TypeofWork']=$this->Dashboard_model->getTypeofWork(); 
			$this->load->view('header');
			$this->load->view('admin/ani_edit_activity',$data);
			$this->load->view('footer');
		}
		else
		{
			 redirect(base_url());
		}
	}
	
	public function update_activity()  
	{	  
		// echo $_POST;   
		$user_id=$this->input->post('hdnuserid'); 
		//$curDate = $this->input->post('txtcurdate');
		$curDate =date('Y-m-d', strtotime($this->input->post('txtcurdate')));
		
		$curDateTime = date("Y-m-d h:m:i");		
		//$data['actiontype']=$this->Dashboard_model->get_actiontypes();  
		$start_time=$this->input->post('starttime');
		$end_time=$this->input->post('endtime');
		$txtshotname=$this->input->post('txtshotname');
		$txtnumcharacters=$this->input->post('txtnumcharacters');
		$txtassignedframes=$this->input->post('txtassignedframes');
		$rdheedioslapstick=$this->input->post('rdheedioslapstick');
		$ddlactiontype=$this->input->post('ddlactiontype');
		$ddlcharacter1=$this->input->post('ddlcharacter1');
		$ddlcharacter2=$this->input->post('ddlcharacter2');
		$ddlcharacter3=$this->input->post('ddlcharacter3');
		$ddlcharacter4=$this->input->post('ddlcharacter4');
		$ddlcharacter5=$this->input->post('ddlcharacter5');
		$rdlibraryavailable=$this->input->post('rdlibraryavailable');
		$rdmanualcomplexity=$this->input->post('rdmanualcomplexity');
		$txtcompletedframes=$this->input->post('txtcompletedframes');
		$txtremark=$this->input->post('txtremark');
		$assigned_duration = $txtassignedframes/25;
		
		$ddlsubtask=$this->input->post('ddlsubtask');
		$ddlworktype=$this->input->post('ddlworktype');
		if($ddlworktype==2)
		{
			$txtCIterationTime=$this->input->post('txtCIterationTime');
		}
		else
		{
			$txtCIterationTime=0;
		}
		
		$rowid=$this->input->post('hdnrowid');
		
		$stime=strtotime($this->input->post('starttime'));
		$etime=strtotime($this->input->post('endtime')); 
		$istime=1; 
		
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
			
			$this->Dashboard_model->Animator_update_log($user_id,$rowid,$curDate,$curDateTime,$this->session->user_id);
			
			$insertactivity=$this->Dashboard_model->Update_Activity($curDate,$start_time,$end_time,$txtshotname,$txtnumcharacters,	$txtassignedframes,$assigned_duration,$rdheedioslapstick,$ddlactiontype,$ddlcharacter1,$ddlcharacter2,$ddlcharacter3,$ddlcharacter4,$ddlcharacter5,$rdlibraryavailable,$rdmanualcomplexity,$txtcompletedframes,$txtremark,$curDateTime,$user_id,$ddlsubtask,$rowid,$this->session->user_id,$ddlworktype,$txtCIterationTime);
			
			$this->Dashboard_model->Animator_day_percentage($user_id,$curDate,$ddlworktype,$curDateTime);
			
			$arrResult=array("response"=>"1","msg"=>"Activity Updated Successfully");
			$this->session->set_flashdata('Success_msg', 'Activity Updated Successfully');
		}
		else
		{
			$arrResult=array("response"=>"0","msg"=>"<span style='color:red;'>End time should be greater than start time</span>"); 
		}
		echo json_encode($arrResult);exit; 
		
		  
	}
	
/*-------------- Edit Bg Artist------------------*/
	public function editbgactivity()  
	{	
		if($this->session->user_id=="" || !isset($this->session->user_id)){redirect('index.php');}	
	
		$logdate=$this->input->get('logdate');
		$rowid=$this->input->get('rowid'); 
		$userid=$this->input->get('userid');
		if($logdate!='' && $rowid!='' && $userid!='')
		{
			$data['logdate']=$logdate;
			$data['rowid']=$rowid;
			$data['userid']=$userid;
			
			$data['userbgdata']=$this->Dashboard_model->getBgartistDay($userid,$logdate,$rowid);
			// echo "<pre>";print_r($data['userbgdata']);exit;
			$data['work_type']=$this->Dashboard_model->get_worktypes(); 
			$this->load->view('header');
			$this->load->view('admin/bg_edit_activity',$data);
			$this->load->view('footer');
		}
		else
		{
			 redirect(base_url());
		}
	}
	
	public function update_bgactivity()  
	{	 
		// echo $_POST;   
		$user_id=$this->input->post('hdnuserid'); 
		$curDate = $this->input->post('txtcurdate');		
		$curDateTime = date("Y-m-d h:m:i");		
		//$data['actiontype']=$this->Dashboard_model->get_actiontypes();  
		$start_time=$this->input->post('starttime');
		$end_time=$this->input->post('endtime');
		$txtepisode=$this->input->post('txtepisode');
		$txtshotname=$this->input->post('txtshotname'); 
		$txtquantity=$this->input->post('txtquantity'); 
		$ddlworktype=$this->input->post('ddlworktype'); 
		$rdheedioslapstick=$this->input->post('rdheedioslapstick'); 
		$txtactualproductivity=$this->input->post('txtactualproductivity');
		
		$ddlsubtask=$this->input->post('ddlsubtask');
		$rowid=$this->input->post('hdnrowid');
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
			$this->Dashboard_model->BGartist_update_log($user_id,$rowid,$curDate,$curDateTime,$this->session->user_id);
				
			$insertactivity=$this->Dashboard_model->Update_BgActivity($curDate,$start_time,$end_time,$txtepisode,$txtshotname,$txtquantity,$rdheedioslapstick,$ddlworktype,$txtactualproductivity,$curDateTime,$user_id,$ddlsubtask,$rowid,$this->session->user_id);
			
			 
			$arrResult=array("response"=>"1","msg"=>"Activity Updated Successfully");
			$this->session->set_flashdata('Success_msg', 'Activity Updated Successfully');
		}
		else
		{
			$arrResult=array("response"=>"0","msg"=>"<span style='color:red;'>End time should be greater than start time</span>"); 
		}
			echo json_encode($arrResult);exit; 
	}
	 
	 
	public function delete_animator_row()
	{
		$rowid=$this->input->post('rowid'); 
		$userid = $this->input->post('userid');
		$logdate = $this->input->post('logdate');
		$txtremarks = $this->input->post('txtremarks');
		
		if($rowid!='' && $userid!='' && $logdate!='' && $txtremarks!='')
		{ 
			$this->Dashboard_model->DeleteAnimatorRow($rowid,$userid,$logdate,$txtremarks,$this->session->user_id);
			echo 1;exit;
		}
		else
		{
			echo 0;exit;
		}
	}
	public function delete_bgartist_row()
	{
		$rowid=$this->input->post('rowid'); 
		$userid = $this->input->post('userid');
		$logdate = $this->input->post('logdate');
		$txtremarks = $this->input->post('txtremarks');
		if($rowid!='' && $userid!='' && $logdate!='' && $txtremarks!='')
		{
			$this->Dashboard_model->DeleteBgArtistRow($rowid,$userid,$logdate,$txtremarks,$this->session->user_id);
			echo 1;exit;
		}
		else
		{
			echo 0;exit;
		}
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
		$this->load->view('admin/reviewer_userdetails',$data);
	}
	
	public function review_editactivity()  
	{ 
		if($this->session->user_id=="" || !isset($this->session->user_id)){redirect('index.php');}  
		
		$rowid=$this->input->get('rowid');
		$userid=$this->input->get('userid');
		$data['rowid']=$rowid;
		$data['userid']=$userid;
		$data['userdata']=$this->Dashboard_model->getReviewerActivityList($userid,$rowid);
		
		$this->load->view('header');
		$this->load->view('admin/re_edit_activity.php',$data);
		$this->load->view('footer');
	}
	
	public function review_update_activity()  
	{ 	
		
		$curDateTime = date("Y-m-d h:m:i");		 
		$txtcurdate=$this->input->post('txtcurdate');
		$lgdate= strtotime($txtcurdate);
		$curDate= date('Y-m-d', $lgdate);
							
		$hdnrowid=$this->input->post('hdnrowid');
		$hdnuserid=$this->input->post('hdnuserid');
		$start_time=$this->input->post('starttime');
		$end_time=$this->input->post('endtime');
		$txtprojectname=$this->input->post('txtprojectname');
		$txttaskname=$this->input->post('txttaskname');
		$txtremarks=$this->input->post('txtremark');
		 
		
		 
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
			$insertactivity=$this->Dashboard_model->Update_ReviewerActivity($hdnrowid,$hdnuserid,$curDate,$start_time,$end_time,$txtprojectname,$txttaskname,$txtremarks,$curDateTime);   
			$arrResult=array("response"=>"1","msg"=>"Activity ".$RecordType[0]['TotalRecord']." Created Successfully"); 
		}
		else
		{
			$arrResult=array("response"=>"0","msg"=>"<span style='color:red;'>End time should be greater than start time</span>"); 
		}
			echo json_encode($arrResult);exit; 
	}
	
	public function delete_reviewer_row()
	{
		$rowid=$this->input->post('rowid'); 
		$userid = $this->input->post('userid');
		$logdate = $this->input->post('logdate');
		$txtremarks = $this->input->post('txtremarks');
		if($rowid!='' && $userid!='' && $logdate!='' && $txtremarks!='')
		{
			$this->Dashboard_model->DeleteReviewerArtistRow($rowid,$userid,$logdate,$txtremarks,$this->session->user_id);
			echo 1;exit;
		}
		else
		{
			echo 0;exit;
		}
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
		$this->load->view('admin/storyboard_userdetails',$data);
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
		$this->load->view('admin/comp_userdetails',$data);
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
		$this->load->view('admin/dir_userdetails',$data);
	}
	
	
	/*--------------- Over All Report 24 June 2020---------------------*/
	public function summaryreport()  
	{
		if($this->session->user_id=="" || !isset($this->session->user_id)){redirect('index.php');}  
		
		$Current_year=date('Y');
		$start_date=date('Y-01-01');
		$end_date=date('Y-12-31');
		
		$data['yearofMonth']=$this->Dashboard_model->getMonthofYear($start_date,$end_date); 
		$data['getrolelist']=$this->Dashboard_model->get_rolelist(); 
		$this->load->view('header');
		$this->load->view('admin/summaryreport',$data);
		$this->load->view('footer');
	}
	public function summaryreport_ajax()  
	{
		$month_year=$this->input->post('month_year');		
		$startdate=$this->input->post('startdate');		
		$enddate=$this->input->post('enddate');		
		$roleid=$this->input->post('roleid');		
		$type=$this->input->post('type');		
		 
		$data['type']=$type;
		$data['roleid']=$roleid;
		$data['listofusers']=$this->Dashboard_model->getUsers($roleid);
		$data['alldate']=$this->Dashboard_model->getMonthDate($startdate,$enddate);
		$Daywisedata=$this->Dashboard_model->getSummaryReport($month_year,$roleid);	
		$Monthwisedata=$this->Dashboard_model->getSummaryOfMonth($month_year,$roleid);
		$day=array();
		$dayscore=array();
		foreach($Daywisedata as $row)
		{
			$day[$row['user_id']][$row['day']]=$row;		 
		}
		$data['day']=$day; 
		
		$monthscore=array(); 
		foreach($Monthwisedata as $row1)
		{
			$monthscore[$row1['day']]=$row1; 
		}
		$data['day']=$day; 
		$data['monthscore']=$monthscore;
			
		//echo "<pre>";print_r($data);exit;
		 
		$this->load->view('admin/summaryreport_ajax',$data);
	}
}
