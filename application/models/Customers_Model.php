<?php

Class Customers_Model extends CI_Model {

public function listCustomers()
	{			$query=$this->db->query("SELECT * FROM customers ");
				return $query->result();
	}
	public function getCustomer($id)
	{			$query=$this->db->query("SELECT * FROM customers WHERE cust_Id=$id");
				return $query->result_array();
	}
	public function updatePwdUser($data)
	{	
		
		$this->db->where('cust_Id', $data['cust_Id']);
		$this->db->update('customers' ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}
	public function addAttachment($data)
	{	
		
	
		$this->db->insert('uploadattachement', $data);
		if ($this->db->affected_rows() > 0) {
		return $this->db->insert_id();
		}
		 else {
		return false;
		}
		
	}
	public function getUploadsByUser($id)
	{	
		
		$query=$this->db->query("SELECT * FROM uploadattachement WHERE upload_CustID=$id");
		return $query->result_array();
		
	}
	public function listUploads() {

		
		$this->db->select('*');
		$this->db->from('uploadattachement');
		$this->db->join('customers','customers.cust_Id = uploadattachement.upload_CustID');
		$this->db->order_by("uploadattachement.upload_ID desc");
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function markUploads($data)
	{			
		$this->db->where('upload_ID', $data['upload_ID']);
		$this->db->update('uploadattachement' ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}
	public function updateCustomer($data)
	{			
		$this->db->where('cust_Id', $data['cust_Id']);
		$this->db->update('customers' ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}
	public function deleteCustomer($id) {

		
		$this->db->where('cust_Id', $id);
		$this->db->delete('customers');
		if ($this->db->affected_rows() > 0) {
				return true;
				}
				return false;
		
	}
// Insert registration data in database
public function registration_insert($data) {

// Query to check whether username already exist or not
$condition = "cust_Email =" . "'" . $data['cust_Email'] . "'";
$this->db->select('*');
$this->db->from('customers');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 0) {

// Query to insert data in database
$this->db->insert('customers', $data);
if ($this->db->affected_rows() > 0) {
return true;
}
} else {
return false;
}
}

// Read data using username and password
public function login($data) {

$condition = "Admin_Uname =" . "'" . $data['username'] . "' AND " . "Admin_Pass =" . "'" . $data['password'] . "' AND ". "Admin_Status =1";
$this->db->select('*');
$this->db->from('admin_users');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return true;
} else {
return false;
}
}

// Read data from database to show data in admin page
public function read_user_information($username) {

$condition = "Admin_Uname =" . "'" . $username . "'";
$this->db->select('*');
$this->db->from('admin_users');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}

}

?>