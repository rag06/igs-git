<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Feedback_Model');
		}
	public function index()
	{
		if(!isset($this->session->userdata['logged_in'])){
			redirect('admin/login/index');
		}
		$result = $this->Feedback_Model->listFeedback();
			$this->load->view('admin/feedback/index',$result);
		
	}
	
	
	public function addFeddback() {
		$this->form_validation->set_rules('text', 'Text', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
		
			redirect('admin/feedback/feedback');
		
		} else {
				$data = array(
				'feedback_Text' => $this->input->post('text'),
				'feedback_By' => $this->input->post('by'),
				'feedback_Status' => 0
				);
				
				$result = $this->Feedback_Model->addFeedback($data);
				if ($result == TRUE) {
					redirect('admin/feedback/feedback');
				}
				 else {
					$data = array(
						'error_message' => 'Error in adding feedback'
					);
					$this->load->view('admin/feedback/index', $data);
				}
		}
	}
	public function deleteFeedback() {
				$id =$this->input->post('feedbackId');
				$result = $this->Feedback_Model->deleteFeedback($id);
				if ($result == TRUE) {
					redirect('admin/feedback/feedback');
				}
				 else {
					$data = array(
						'error_message' => 'Error in deleting feedback'
					);
					$this->load->view('admin/feedback/index', $data);
				}
		
	}
	
	public function updateFeedback() {
				$data = array(
				'feedback_ID' => $this->input->post('editFeedbackId'),
				'feedback_Text' => $this->input->post('editText'),
				'feedback_Status' => $this->input->post('editStatus')
				);
				
				$result = $this->Feedback_Model->updateFeedback($id,$data);
				if ($result == TRUE) {
					redirect('admin/feedback/feedback');
				}
				 else {
					$data = array(
						'error_message' => 'Error in updating feedback'
					);
					$this->load->view('admin/feedback/index', $data);
				}
		
	}
	
	public function getFeedback()
	{			$id =$this->input->post('feedbackId');
				$data = $this->Feedback_Model->getFeedback($id);
				$result=json_encode($data);
				echo $result;
	}

}
?>