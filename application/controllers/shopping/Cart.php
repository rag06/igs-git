<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
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
		}
		
	public function index()
	{
		$data['category'] = $this->Product_Model->listWebProductCategory();
		$data['products'] = $this->Product_Model->listWebProducts();
		
		$this->load->view('cart/index',$data);
	}
	public function addToCart()
	{
		$pkgid =$_GET['pkgid'];
		$name=$_GET['name'];
		$qty=1;
		$pid=$_GET['pid'];
		$productdetails = $this->Product_Model->getProduct($pid);
		$packinfo = $this->Product_Model->getInfo($pkgid);
		$insert_data = array( 'id' => $pkgid,
					'name' =>$productdetails[0]['product_Name'],
					'price' => $packinfo[0]['pkg_Price'],
					'qty' => 1 ,
					'options' => array('product_BrandName' => $productdetails[0]['product_BrandName'],'pkg_PID' => $packinfo[0]['pkg_productID'], 'pkg_Qauntity' => $packinfo[0]['pkg_Qauntity'], 'pkg_Strength' => $packinfo[0]['pkg_Strength'], 'pkg_UnitPrice' => $packinfo[0]['pkg_UnitPrice'], 'pkg_ShipInfo' => $packinfo[0]['pkg_ShipInfo'])
				);

				 // This function add items into cart.
				$this->cart->insert($insert_data);
				echo 'success';
	}
	
	public function removeFromCart()
	{
			$rowid =$_GET['rowid'];
			// Destroy selected rowid in session.
			$data = array(
			'rowid' => $rowid,
			'qty' => 0
			);
			// Update cart data, after cancel.
			$this->cart->update($data);
				echo 'success';
	}
	public function destoryCart()
	{
		$this->cart->destroy();
	}
	
}
