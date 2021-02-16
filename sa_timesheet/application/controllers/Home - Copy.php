<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		
	public function index()  
	{	
		if($this->session->user_id!="" || isset($this->session->user_id)){redirect('index.php/home/dashboard');}
		//$this->load->view('header');
		$this->load->view('index');
		//$this->load->view('footer'); 
	}
	
	public function logincheck() // this function to handle user login check
	{	 
			$username=$this->input->post('username');
			$password=$this->input->post('password'); 
			if($username=='superadmin' && $password==123456)
			{  
				redirect('index.php/home/dashboard');
			} 
			else
			{	
				$data['error'] = "Invalid credentials";
				$this->load->view('index', $data);
				//$error='Invalid Credentials';
				//redirect(base_url());
			}
	}
		 
	public function dashboard() // this function to handle admin dashboard datas
	{	 
		//echo"<pre>"; print_r($data['totalschools']); exit; 
		$data['totalschools']=$this->Dashboard_model->totalschools();
	 	$data['totalusers']=$this->Dashboard_model->totalusers(); 
	 	$data['sclname']=$this->Dashboard_model->school_name(); 
		$this->load->view('header');
		$this->load->view('userdetail',$data);
		$this->load->view('footer');
	}  
	 
	public function get_user_details()
	{	  
		/* echo "hello"; exit; 
	 	$schoolid = '95'; */ 
	 	$schoolid = $_POST['schoolid'];  //echo $schoolid; exit; 
		$data['user_details']=$this->Dashboard_model->userdetails($schoolid); 
		//echo "<pre>";print_r($data['user_details']);exit;
		$this->load->view('sclwise_userdetails', $data);
	}

	public function school() // this function to handle admin dashboard datas
	{	 
		//echo $_POST;  
		 $data['schoolname']=$this->Dashboard_model->school_name();
		/*$this->session->set_userdata(array(
			'id'       => $data['schoolname'][0]->id,
			'schoolname'      => $data['schoolname'][0]->schoolname 
        ));
		$sclname=$this->session->schoolname;//echo $sclname;exit; */
	 	//echo "<pre>";print_r($data['schoolname']);exit;
		$this->load->view('header');
		$this->load->view('home', $data);
		$this->load->view('footer');
	}
	public function schools() // this function to handle admin dashboard datas
	{	 
		//echo $_POST;  
		 $data['school_name']=$this->Dashboard_model->school_name(); 
		$this->load->view('header');
		$this->load->view('user_bspi_report', $data);
		$this->load->view('footer');
	}  
	public function get_user_scoredetails()
	{	  
		/* echo "hello"; exit; 
	 	$schoolid = '95'; */ 
	 	$schoolid = $_POST['schoolid'];  //echo $schoolid; exit; 
		$data['user_details']=$this->Dashboard_model->userdetails($schoolid); 
		 //echo "<pre>";print_r($data['user_details']);exit;
		$this->load->view('sclwise_user_report', $data);
	}
	public function get_sclwiseuser_scoredetails()
	{	  
		/* echo "hello"; exit; 
	 	$schoolid = '95'; */ 
	 	$schoolid = $_POST['schoolid'];  //echo $schoolid; exit; 
		$data['user_skillreport']=$this->Dashboard_model->user_skillreport($schoolid); 
		 // echo "<pre>";print_r($data['user_skillreport']);exit;
		$this->load->view('sclwise_user_report', $data);
	}
	public function gradewise_bspi_report()
	{	  
		/* echo "hello"; exit; 
	 	$schoolid = '95'; */
	 	$schoolid = $_POST['schoolid'];   //echo $schoolid; exit;   
	  	$data['user_bspireport']=$this->Dashboard_model->userbspireport($schoolid); 
		   //   echo "<pre>";print_r($data['user_bspireport']);exit;
		//$this->load->view('header');
		$this->load->view('bspi_report', $data);
		//$this->load->view('footer');
		
	}
	 
	public function logout()
	{
        // Unset User Data
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
