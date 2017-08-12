<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$data['subcategory'] = $this->Product_Model->listProductSubCategoryWeb();
		$data['products'] = $this->Product_Model->listWebProducts();
		$this->load->view('home/index',$data);
	}
	public function searchResults()
	{	
		$data['category'] = $this->Product_Model->listWebProductCategory();
		$data['subcategory'] = $this->Product_Model->listProductSubCategoryWeb();
		$data['products'] = $this->Product_Model->listWebProducts();
		$this->load->view('home/search',$data);
	}
}
