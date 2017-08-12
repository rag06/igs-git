<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Customers_Model');
		}
	public function index()
	{
		if(!isset($this->session->userdata['logged_in'])){
			redirect('admin/login/index');
		}
		$data['result'] = $this->Customers_Model->listCustomers();
			$this->load->view('admin/customers/index',$data);
		
	}
	public function addCustomer()
	{
		if(!isset($this->session->userdata['logged_in'])){
			redirect('admin/login/index');
		}
			$this->load->view('admin/customers/addCustomer');
		
	}
	public function insertCustomer()
	{
				$data = array(
				'cust_FName' => $this->input->post('fname'),
				'cust_LName' => $this->input->post('lname'),
				'cust_Email' => $this->input->post('email'),
				'cust_CreatedOn' => date('Y-m-d H:i:s'),
				'cust_Status' => $this->input->post('status'),
				'cust_Gender' => $this->input->post('gender'),
				'cust_Address' => $this->input->post('addr'),
				'cust_Country' => $this->input->post('country'),
				'cust_State' => $this->input->post('state'),
				'cust_Pincode' => $this->input->post('pincode'),
				'cust_Number' => $this->input->post('number'),
				'cust_Password' => $this->input->post('password')
				);
				
				$result = $this->Customers_Model->registration_insert($data);
				redirect('admin/customers/customers/index');
				
		
	}
	public function editCustomer($id)
	{
		if(!isset($this->session->userdata['logged_in'])){
			redirect('admin/login/index');
		}
		$data['result'] = $this->Customers_Model->getCustomer($id);
		$this->load->view('admin/customers/editCustomer',$data);
		
	}
	public function deleteCustomer() {
				$id =$this->input->post('adminId');
				$result = $this->Customers_Model->deleteCustomer($id);
				if ($result == TRUE) {
					redirect('admin/customers/customers');
				}
				 else {
					$data = array(
						'error_message' => 'Error in deleting users'
					);
					$this->load->view('admin/customers/index', $data);
				}
		
	}
	
	public function updateCustomer()
	{
				$data = array(
				'cust_Id' => $this->input->post('custId'),
				'cust_FName' => $this->input->post('fname'),
				'cust_LName' => $this->input->post('lname'),
				'cust_Status' => $this->input->post('status'),
				'cust_Gender' => $this->input->post('gender'),
				'cust_Address' => $this->input->post('addr'),
				'cust_Country' => $this->input->post('country'),
				'cust_State' => $this->input->post('state'),
				'cust_Pincode' => $this->input->post('pincode'),
				'cust_Number' => $this->input->post('number'),
				'cust_Password' => $this->input->post('password')
				);
				
				$result = $this->Customers_Model->updateCustomer($data);
				if ($result == TRUE) {
					redirect('admin/customers/customers/index');
				}
				 else {
					$data = array(
						'error_message' => 'Error in updating category'
					);
					$this->load->view('admin/customers/editCustomer', $data);
				}
		
	}
	
	

}
?>