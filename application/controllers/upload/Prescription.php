<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prescription  extends CI_Controller {
	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');
		$this->load->helper('url');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');
		$this->load->library('upload');
		// Load database
		$this->load->model('Customers_Model');
		$this->load->model('Product_Model');
		}
		
	public function index()
	{
		if(!isset($this->session->userdata['front_logged_in'])){
			redirect('login');
		}
		$data['uploads'] = $this->Customers_Model->getUploadsByUser($this->session->userdata['front_logged_in']['front_id']);
		$data['category'] = $this->Product_Model->listWebProductCategory();
		$data['products'] = $this->Product_Model->listWebProducts();
		
		$this->load->view('upload/index',$data);
	}
	public function upload()
	{
		
		$data['uploads'] = $this->Customers_Model->getUploadsByUser($this->session->userdata['front_logged_in']['front_id']);
		$data['category'] = $this->Product_Model->listWebProductCategory();
		$data['products'] = $this->Product_Model->listWebProducts();
		if(isset($_FILES['pdfupload'])){
			 if($_FILES['pdfupload']['size'] != 0){
			 
				$config =  array(
                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/upload/files/",
                  'upload_url'      => $this->config->item('base_url')."/upload/files/",
                  'allowed_types'   => "jpg|jpeg|png|pdf",
                  'file_name'   => "Prescription".date('Y-m-d_H-m-s'),
                  'overwrite'       => TRUE,
                  'max_size'        => 2048,
				  'encrypt_name' 	=> TRUE,
                );
                $this->load->library('upload');
				$this->upload->initialize($config);
                if ( ! $this->upload->do_upload('pdfupload'))
                {
                        $data['error_message']  = $this->upload->display_errors();
						//print_r($data['error'] ); die;
                        $this->load->view('upload/index', $data);
                }
                else
                {
						$image_data = $this->upload->data();
						
						$fname=$image_data['file_name'];
						$path= $config['upload_url'].$fname;
                        $info = array(
							'upload_CustID' => $this->session->userdata['front_logged_in']['front_id'],
							'upload_Status' => 0,
							'upload_Date' => date('Y-m-d H:m:s'),
							'upload_Link' => $path
							);
							
							
							$result = $this->Customers_Model->addAttachment($info);
							
							if ($result == TRUE) {
									redirect('upload/Prescription');
									 
							}
							else {
								//print_r($data['error'] ); die;
								$data['error_message']='Error in Uploading';
								$this->load->view('upload/index', $data);
							}
                }
		
			 }
		}
			
		
		$this->load->view('upload/index',$data);
	}
}
