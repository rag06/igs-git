<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploads extends CI_Controller {

	public function __construct() {
		parent::__construct();

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
		
		$uploads = $this->Customers_Model->listUploads();
		$this->load->view('admin/uploads/index',$uploads);
		
	}
	public function mark($id)
	{
		if(!isset($this->session->userdata['logged_in'])){
			redirect('admin/login/index');
		}
		$data=array(
		'upload_ID'=>$id,
		'upload_Status'=>1
		);
		$uploads = $this->Customers_Model->markUploads($data);
		redirect('admin/uploads/uploads');
		
	}

}
?>