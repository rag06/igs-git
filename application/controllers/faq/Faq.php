<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {
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
		$this->load->model('Product_Model');
		}
		
	public function index()
	{
		
		$data['category'] = $this->Product_Model->listWebProductCategory();
		$data['products'] = $this->Product_Model->listWebProducts();
		
		$this->load->view('faq/index',$data);
	}
}
