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
		$this->load->model('Product_Model');
		}
	public function index()
	{
		if(!isset($this->session->userdata['front_logged_in'])){
			redirect('login/login');
		}
		
			$data['category'] = $this->Product_Model->listWebProductCategory();
			$data['products'] = $this->Product_Model->listWebProducts();
			$data['orders'] = $this->Orders_Model->listOrdersWeb($this->session->userdata['front_logged_in']['front_id']);
			$data['orderitems'] = $this->Orders_Model->listOrdersDetailsWeb();
			$this->load->view('orders/index',$data);
		
		
	}

}
?>