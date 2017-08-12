<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Webpage_Model');
		$this->load->model('Webpage_Model');
		$this->load->model('WebUser_Model');
		$this->load->model('Product_Model');
		$this->load->model('Customers_Model');
		}
		
	public function index()
	{
		if(isset($this->session->userdata['front_logged_in'])){
			redirect('home/home/');
		}
		$data['isregister']='N';
		$data['category'] = $this->Product_Model->listWebProductCategory();
		$data['subcategory'] = $this->Product_Model->listProductSubCategoryWeb();
		$data['products'] = $this->Product_Model->listWebProducts();
		
		$this->load->view('login/index',$data);
	}
	
	public function forgotPassword()
	{
		if(isset($this->session->userdata['front_logged_in'])){
			redirect('home/home/');
		}
		$data['category'] = $this->Product_Model->listWebProductCategory();
		$data['subcategory'] = $this->Product_Model->listProductSubCategoryWeb();
		$data['products'] = $this->Product_Model->listWebProducts();
		
		$this->load->view('login/forgotPass',$data);
	}
	public function sendPassword()
	{
		
		if(isset($this->session->userdata['front_logged_in'])){
			redirect('home/home/');
		}
		
		$data['category'] = $this->Product_Model->listWebProductCategory();
		$data['subcategory'] = $this->Product_Model->listProductSubCategoryWeb();
		$data['products'] = $this->Product_Model->listWebProducts();
		
		$this->form_validation->set_rules('email', 'Email Id', 'trim|required|valid_email');
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('login/forgotPass', $data);
		
		}
		 else {
			 $info = array(
				'email' => $this->input->post('email')
				);
			 $result=$this->WebUser_Model->checkEmail($info);
			 $info=$this->WebUser_Model->getUserByEmail($info);
			 if($result){
						$from_email = "your@creativewebie.org"; 
						 $this->load->library('email'); 		$config['charset'] = 'utf-8';		$config['mailtype'] = 'html';
						$this->email->initialize($config);
						 $this->email->from($from_email, 'igssolution.in Account Password'); 
						 $this->email->to($info[0]['cust_Email']);
						 $this->email->subject('igssolution.in  Account Password'); 
						 $this->email->message('Dear '.$info[0]['cust_FName'].', <br/><br/>Kindly find the below password <br/><br/> <b>Password:</b> '.($info[0]['cust_Password'])); 
				   
								 //Send mail 
								 if($this->email->send()) {
									
									$data['msg']="Password has been sent to the Email Id";
									$this->load->view('login/forgotPass',$data);
								 }
			 }
			 else{
				 $data['error_message']="Email Id does not exist or your account is Blocked";
				 
			$this->load->view('login/forgotPass',$data);
			 }
		 }
	}
	
	public function check()
	{
		
		$data['category'] = $this->Product_Model->listWebProductCategory();
		$data['subcategory'] = $this->Product_Model->listProductSubCategoryWeb();
		$data['products'] = $this->Product_Model->listWebProducts();
		$data['isregister']='N';
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('pwd', 'password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['front_logged_in'])){
			redirect('home/home/');
		}else{
			$this->load->view('login/index', $data);
		}
		} else {
		$info = array(
		'username' => $this->input->post('email'),
		'password' => $this->input->post('pwd')
		);
		//print_r($data);die;
		$result = $this->WebUser_Model->login($info);
		//print_r($result);die;
		if ($result == TRUE) {

		$username = $this->input->post('email');
		$result = $this->WebUser_Model->read_user_information($username);
		if ($result != false) {
		$session_data = array(
		'front_email' => $result[0]->cust_Email,
		'front_id' => $result[0]->cust_Id,
		'front_name' => $result[0]->cust_FName,
		);
		// Add user data in session
		$this->session->set_userdata('front_logged_in', $session_data);
			redirect('home/home/index');
		}
		} else {
			$data['error_message']='Invalid Username or Password ';
			$this->load->view('login/index', $data);
		}
		}
	
	}
	// Logout from  page
	public function logout() {

	// Removing session data
	$sess_array = array(
	'username' => '',
	'email' =>'',
	'id' => '',
	'name' => '',
	);
	$this->session->unset_userdata('front_logged_in', $sess_array);
	$data['message_display'] = 'Successfully Logout';
			redirect('home/home');
	}
	public function register()
	{
		if(isset($this->session->userdata['front_logged_in'])){
			redirect('home/home/');
		}
		$data['category'] = $this->Product_Model->listWebProductCategory();
		$data['subcategory'] = $this->Product_Model->listProductSubCategoryWeb();
		$data['products'] = $this->Product_Model->listWebProducts();
		
		$this->load->view('login/register',$data);
	}
	
	public function registercheck()
	{
		
		$data['category'] = $this->Product_Model->listWebProductCategory();
		$data['subcategory'] = $this->Product_Model->listProductSubCategoryWeb();
		$data['products'] = $this->Product_Model->listWebProducts();
		
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('password_conf', 'password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('number', 'Mobile Number', 'trim|required');
		$this->form_validation->set_rules('area', 'Address', 'trim|required');
		$this->form_validation->set_rules('pincode', 'Pincode', 'trim|required|min_length[6]|max_length[6]');
		$this->form_validation->set_rules('sex', 'Gender', 'trim|required');
		
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('login/register', $data);
		
		}
		 else {
			
			 
		$info = array(
		'cust_FName' => $this->input->post('firstname'),
		'cust_LName' => $this->input->post('lastname'),
		'cust_Email' => $this->input->post('email'),
		'cust_Pincode' => $this->input->post('pincode'),
		'cust_Number' => $this->input->post('number'),
		'cust_Address' => $this->input->post('area'),
		'cust_Country' =>  $this->input->post('country'),
		'cust_State' =>  $this->input->post('state'),
		'cust_Gender' => $this->input->post('sex'),
		'cust_Password' => $this->input->post('password'),
		'cust_CreatedOn' => date('Y-m-d H:m:s')
		);
		//print_r($data);die;
		$result = $this->WebUser_Model->registration_insert($info);
		//print_r($result);die;
		if ($result == TRUE) {
		
					 $data['contactMsg']="Your Registeration is completed Please Login and enjoy our services";
					$this->load->view('login/register',$data);
				 
		}
		else {
			$data['error_message']='Your account Already exist with email account ';
			$this->load->view('login/register', $data);
		}
		}
		
		
		
	}
	public function changePassword()
	{
		if(!isset($this->session->userdata['front_logged_in'])){
			redirect('login/login/index');
		}
		$data['category'] = $this->Product_Model->listWebProductCategory();
		$data['subcategory'] = $this->Product_Model->listProductSubCategoryWeb();
		$data['products'] = $this->Product_Model->listWebProducts();
		
		$this->load->view('login/changePassword',$data);
	}
	public function updatePassword()
	{
		if(!isset($this->session->userdata['front_logged_in'])){
			redirect('login/login/index');
		}
		
		$data['category'] = $this->Product_Model->listWebProductCategory();
		$data['subcategory'] = $this->Product_Model->listProductSubCategoryWeb();
		$data['products'] = $this->Product_Model->listWebProducts();
		
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('confPass', 'Password', 'trim|required|matches[password]');
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('login/changePassword', $data);
		
		} else {
		$info = array(
		'cust_Password' => $this->input->post('password'),
		'cust_Id' => $this->session->userdata['front_logged_in']['front_id'],
		);
		
		$result = $this->Customers_Model->updatePwdUser($info);
		if($result)
		{
			$data['msg']="Your Password Changed Successfully";
		}
		else{
			$data['error_message']="New Password Same as Existing password";
		}
		$this->load->view('login/changePassword',$data);
	}
	}
}
