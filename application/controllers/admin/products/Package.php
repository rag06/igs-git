<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller {

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
	public function index($id)
	{
		
		if(isset($this->session->userdata['logged_in'])){
			$data['result']= $this->Product_Model->listInfo($id);
			$data['product']= $this->Product_Model->getProduct($id);
			
			$this->load->view('admin/products/index_package',$data);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function addInfo($id)
	{
		if(isset($this->session->userdata['logged_in'])){
			$data['product']= $this->Product_Model->getProduct($id);
			$this->load->view('admin/products/addPackage',$data);
		}else{
			redirect('admin/login/login');
		}
		
	}
	public function insertInfo()
	{
				$data = array(
				'pkg_productID' => $this->input->post('pid'),
				'pkg_Qauntity' => $this->input->post('quantity'),
				'pkg_Strength' => $this->input->post('strength'),
				'pkg_Price' => $this->input->post('price'),
				'pkg_UnitPrice' => $this->input->post('unitprice'),
				'pkg_ShipInfo' => $this->input->post('ship'),
				);
				
				$result = $this->Product_Model->addInfo($data);
				if ($result == TRUE) {
					redirect('admin/products/Package/index/'.$this->input->post('pid'));
				}
				 else {
					$data = array(
						'error_message' => 'Error in creating blog'
					);
					$this->load->view('admin/products/addPackage', $data);
				}
		
	}
	public function updateInfo()
	{
				
				$data = array(
				'pkg_ID' => $this->input->post('pkgId'),
				'pkg_Qauntity' => $this->input->post('quantity'),
				'pkg_Strength' => $this->input->post('strength'),
				'pkg_Price' => $this->input->post('price'),
				'pkg_UnitPrice' => $this->input->post('unitprice'),
				'pkg_ShipInfo' => $this->input->post('ship'),
				);
				$result = $this->Product_Model->updateInfo($data);
				
					
					redirect('admin/products/Package/index/'.$this->input->post('pid'));
				
				
		
	}
	public function deleteInfo() {
				$id =$this->input->post('pId');
				$result = $this->Product_Model->deleteInfo($id);
				if ($result == TRUE) {
					redirect('admin/products/Package/index/'.$id);
				}
				 else {
					$data = array(
						'error_message' => 'Error in deleting Product'
					);
					$this->load->view('admin/products/addPackage', $data);
				}
		
	}
	
	public function editInfo($id) {
					
					if(!isset($this->session->userdata['logged_in'])){
							redirect('admin/login/index');
						}
						
						$data['result'] = $this->Product_Model->getInfo($id);
						$this->load->view('admin/products/editPackage', $data);
	}
	
}
?>