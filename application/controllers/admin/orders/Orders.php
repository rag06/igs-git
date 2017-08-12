<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Orders_Model');
		}
	public function index()
	{
		if(isset($this->session->userdata['logged_in'])){
			$result = $this->Orders_Model->listOrders();
			$this->load->view('admin/orders/index',$result);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function viewDetails($id)
	{
		if(isset($this->session->userdata['logged_in'])){
			$data['orders'] = $this->Orders_Model->getOrder($id);
			$data['result']= $this->Orders_Model->listOrderDetails($id);
			$this->load->view('admin/orders/details',$data);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function updateOrder()
	{
				$data = array(
				'order_ID' => $this->input->post('oId'),
				'order_Amount' => $this->input->post('amount'),
				'order_Status' =>$this->input->post('status')
				);
				
				$result = $this->Orders_Model->updateOrder($data);
				
					redirect('admin/orders/orders');	
	}
	public function itemDelivered($id)
	{
				$data = array(
				'odetail_ID' => $id,
				'odetail_Delivered' =>1
				);
				
				$result = $this->Orders_Model->updateOrderDetail($data);
				
					redirect('admin/orders/orders/viewDetails/'.$id);	
	}
	
	public function itemUnDelivered($id)
	{
				$data = array(
				'odetail_ID' => $id,
				'odetail_Delivered' =>0
				);
				
				$result = $this->Orders_Model->updateOrderDetail($data);
				
					redirect('admin/orders/orders/viewDetails/'.$id);	
	}
	
	public function editOrders($id) {
					
					if(!isset($this->session->userdata['logged_in'])){
							redirect('admin/login/index');
						}
						$data['result'] = $this->Orders_Model->getOrder($id);
						$data['orders'] = $this->Orders_Model->listOrderStatus();
						$this->load->view('admin/orders/editOrders', $data);
	}

}
?>