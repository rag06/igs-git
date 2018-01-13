<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends CI_Controller {
	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Product_Model');
		$this->load->model('Feedback_Model');
		}
		
	public function index()
	{
		$data['category'] = $this->Product_Model->listWebProductCategory();
		$data['products'] = $this->Product_Model->listWebProducts();
		$data['reviews'] = $this->Feedback_Model->listWebFeedback();
		
		$this->load->view('reviews/index',$data);
	}
	public function addFeedback() {
				$data = array(
				'feedback_Text' => $this->input->post('text'),
				'feedback_By' => $this->session->userdata['front_logged_in']['front_id'],
				'feedback_Status' => 0
				);
				
				$result = $this->Feedback_Model->addFeedback($data);
				redirect('reviews');
	}		
}

