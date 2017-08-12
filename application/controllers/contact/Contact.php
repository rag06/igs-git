<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Global_Model');
		$this->load->model('Webpage_Model');
		$this->load->model('Subcriber_Model');
		}
		
	public function index()
	{
		$data['global'] = $this->Global_Model->getSettings();
		$this->load->view('contact/index',$data);
	}
	public function send_mail() { 
		$data['global'] = $this->Global_Model->getSettings();
		$data['formEmail']='Y';
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		$this->form_validation->set_rules('subject', 'subject', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			
				$this->load->view('contact/index',$data);
			
			} else {
         $from_email = "your@creativewebie.org"; 
         $to_email = $this->input->post('email'); 
         $subject = $this->input->post('subject'); 
         $name = $this->input->post('name'); 
         $message = $this->input->post('message'); 
   
         //Load email library 
         $this->load->library('email'); 		$config['charset'] = 'utf-8';		$config['mailtype'] = 'html';
		$this->email->initialize($config);
         $this->email->from($from_email, 'Aamdanee Contact'); 
     //    $this->email->to('talk2abhijit@gmail.com');
         $this->email->to('singhanuragv@gmail.com');
         $this->email->subject($subject); 
         $this->email->message('Name : '.$name.'<br/> Email :'.$to_email.'<br/> Subject :'.$subject.'<br/> Message :'.$message); 
   
				 //Send mail 
				 if($this->email->send()) {
					 $data['contactMsg']="Thank You For your message";
					$this->load->view('contact/index',$data);
				 }
			}
      } 
	
	public function subcribe() {
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$data['global'] = $this->Global_Model->getSettings();
		$data['blogs'] = $this->Blog_Model->limitedBlog(4,8);
		$data['formEmail']='N';
		if ($this->form_validation->run() == FALSE) {
		
			$this->load->view('contact/index',$data);
		
		} else {
				$subdetail = array(
				'email' => $this->input->post('email'),
				'status' => 1,
				);
				
				$result = $this->Subcriber_Model->addSubcriber($subdetail);
				if ($result == TRUE) {
					$data['message']='Thank You For subcribing to our newsletters';
					$this->load->view('contact/index',$data);
				}
				 else {
					 $data['error']='Already Subcribed to newsletters';
					$this->load->view('contact/index',$data);
				}
		}
	}
}
