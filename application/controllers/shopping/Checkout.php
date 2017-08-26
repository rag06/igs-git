<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
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
		$this->load->model('Customers_Model');
		$this->load->model('Orders_Model');
		}
		
	public function index()
	{
		if(!isset($this->session->userdata['front_logged_in'])){
			redirect('login/login');
		}
		$data['category'] = $this->Product_Model->listWebProductCategory();
		$data['products'] = $this->Product_Model->listWebProducts();
		$data['customer'] = $this->Customers_Model->getCustomer($this->session->userdata['front_logged_in']['front_id']);
		
		$this->load->view('checkout/index',$data);
	}
		
	public function success()
	{
		if(!isset($this->session->userdata['front_logged_in'])){
			redirect('login/login');
		}
		$data['category'] = $this->Product_Model->listWebProductCategory();
		$data['products'] = $this->Product_Model->listWebProducts();
		
		$this->load->view('checkout/success',$data);
	}
	
	
	public function order()
	{
		if(!isset($this->session->userdata['front_logged_in'])){
			redirect('login/login');
		}
		$data['category'] = $this->Product_Model->listWebProductCategory();
		$data['products'] = $this->Product_Model->listWebProducts();
		$data['customer'] = $this->Customers_Model->getCustomer($this->session->userdata['front_logged_in']['front_id']);
		
		$odata = array(
				'order_Amount' => $this->cart->total(),
				'order_Address' => $this->input->post('area'),
				'order_Pincode' => $this->input->post('pincode'),
				'order_State' => $this->input->post('state'),
				'order_City' => $this->input->post('city'),
				'order_Country' => $this->input->post('country'),
				'order_ContactNo' => $this->input->post('number'),
				'order_CustName' => $this->input->post('firstname') .' '.$this->input->post('lastname'),
				'order_CustId' => $this->session->userdata['front_logged_in']['front_id'],
				'order_Status' =>	1
				);
				
				$result = $this->Orders_Model->createOrder($odata);
				if($result){
					$cart = $this->cart->contents();
					foreach($cart as $cartrow){ 
						$oddata = array(
							'odetail_orderID' => $result,
							'odetail_PID' => $cartrow['options']['pkg_PID'],
							'odetail_Packing' => $cartrow['options']['pkg_Qauntity'],
							'odetail_PBrand' => $cartrow['options']['product_BrandName'],
							'odetail_PName' => $cartrow['name'],
							'odetail_Qauntity' => $cartrow['qty'],
							'odetail_Strength' => $cartrow['options']['pkg_Strength'],
							'odetail_Price' => $cartrow['price'],
							'odetail_UnitPrice' =>$cartrow['options']['pkg_UnitPrice'],
							'odetail_ShipInfo' => $cartrow['options']['pkg_ShipInfo']
							);
						$this->Orders_Model->addOrderDetails($oddata);
					}
					
					$this->cart->destroy();
					redirect('shopping/checkout/success');
				}
		
	}
	
	
	
}
