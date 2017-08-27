<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

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
		if(isset($this->session->userdata['logged_in'])){
			$result = $this->Product_Model->listProducts();
			$this->load->view('admin/products/index',$result);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function addProduct()
	{
		if(isset($this->session->userdata['logged_in'])){
			$result= $this->Product_Model->listProductCategory();
			$this->load->view('admin/products/addProduct',$result);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function insertProduct()
	{
				$data = array(
				'product_Name' => htmlentities($this->input->post('name')),
				'product_Strength' => $this->input->post('strength'),
				'product_BrandName' => $this->input->post('brand'),
				'product_unitPrice' => $this->input->post('price'),
				'product_Image' => $this->input->post('images'),
				'product_Ctg' =>  $this->input->post('category'),
				'product_tagline' =>  $this->input->post('tagline'),
				'product_Description' => $this->input->post('description'),
				'product_Benefits' => $this->input->post('benefits'),
				'product_Working' => $this->input->post('working'),
				'product_Dosage' => $this->input->post('dosage'),
				'product_Precaution' => $this->input->post('precaution'),
				'product_SideEffects' => $this->input->post('sideEffects'),
				'product_Status' =>$this->input->post('status'),
				'product_Featured' => $this->input->post('feature')
				);
				
				$result = $this->Product_Model->addProduct($data);
				if ($result == TRUE) {
					redirect('admin/products/products');
				}
				 else {
					$data = array(
						'error_message' => 'Error in creating product'
					);
					$this->load->view('admin/products/addProduct', $data);
				}
		
	}
	public function updateProduct()
	{
				$data = array(
				'product_ID' => $this->input->post('pId'),
				'product_Name' => htmlentities($this->input->post('name')),
				'product_Strength' => $this->input->post('strength'),
				'product_BrandName' => $this->input->post('brand'),
				'product_unitPrice' => $this->input->post('price'),
				'product_Image' => $this->input->post('images'),
				'product_Ctg' => $this->input->post('category'),
				'product_tagline' =>  $this->input->post('tagline'),
				'product_Description' => $this->input->post('description'),
				'product_Benefits' => $this->input->post('benefits'),
				'product_Working' => $this->input->post('working'),
				'product_Dosage' => $this->input->post('dosage'),
				'product_Precaution' => $this->input->post('precaution'),
				'product_SideEffects' => $this->input->post('sideEffects'),
				'product_Status' =>$this->input->post('status'),
				'product_Featured' => $this->input->post('feature')
				);
				$result = $this->Product_Model->updateProduct($data);
				
					redirect('admin/products/products');
				
				
		
	}
	public function deleteProduct() {
				$id =$this->input->post('pId');
				$result = $this->Product_Model->deleteProduct($id);
				if ($result == TRUE) {
					redirect('admin/products/products');
				}
				 else {
					$data = array(
						'error_message' => 'Error in deleting Product'
					);
					$this->load->view('admin/products/addProduct', $data);
				}
		
	}
	
	public function editProduct($id) {
					
					if(!isset($this->session->userdata['logged_in'])){
							redirect('admin/login/index');
						}
						$data['result'] = $this->Product_Model->getProduct($id);
						$data['category'] = $this->Product_Model->listProductCategory();
						$this->load->view('admin/products/editProduct', $data);
	}
	
	public function productCategory()
	{
		if(!isset($this->session->userdata['logged_in'])){
			redirect('admin/login/index');
		}
		$result = $this->Product_Model->listProductCategory();
			$this->load->view('admin/products/category',$result);
	}
	
	public function addProductCategory() {
		$this->form_validation->set_rules('category', 'category', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
		
			redirect('admin/products/products/productCategory');
		
		} else {
				$data = array(
				'pCtg_Name' => htmlentities($this->input->post('category')),
				'pCtg_Status' => $this->input->post('status')
				);
				
				$result = $this->Product_Model->addProductCategory($data);
				if ($result == TRUE) {
					redirect('admin/products/products/productCategory');
				}
				 else {
					$data = array(
						'error_message' => 'Error in adding category'
					);
					$this->load->view('admin/products/products/category', $data);
				}
		}
	}
	public function deleteProductCategory() {
				$id =$this->input->post('categoryId');
				$result = $this->Product_Model->deleteProductCategory($id);
				if ($result == TRUE) {
					redirect('admin/products/products/productCategory');
				}
				 else {
					$data = array(
						'error_message' => 'Error in deleting category'
					);
					$this->load->view('admin/products/products/productCategory', $data);
				}
		
	}
	
	public function updateProductCategory() {
				$id =$this->input->post('editCategoryId');
				$data = array(
				'pCtg_Name' => htmlentities($this->input->post('editCategoryName')),
				'pCtg_Status' => $this->input->post('editStatus')
				);
				
				$result = $this->Product_Model->updateProductCategory($id,$data);
				if ($result == TRUE) {
					redirect('admin/products/products/productCategory');
				}
				 else {
					$data = array(
						'error_message' => 'Error in updating category'
					);
					$this->load->view('admin/products/productCategory', $data);
				}
		
	}
	
	public function getProductCategory()
	{			$id =$this->input->post('categoryId');
				$data = $this->Product_Model->getProductCategory($id);
				$result=json_encode($data);
				echo $result;
	}

}
?>