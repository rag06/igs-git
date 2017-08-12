<?php

Class WebUser_Model extends CI_Model {
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
// Read data using username and passwordpublic function login($data) {$condition = "can_Email =" . "'" . $data['username'] . "' AND " . "can_Password =" . "'" . $data['password'] . "' AND ". "can_Status =1". " AND ". "can_isVerified =1";$this->db->select('*');$this->db->from('candidates');$this->db->where($condition);$this->db->limit(1);$query = $this->db->get();if($query->num_rows() == 1) {return true;} else {return false;}}

// Read data from database to show data in admin page
public function read_user_information($username) {

$condition = "cust_Email =" . "'" . $username . "'";
$this->db->select('*');
$this->db->from('customers');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}

public function checkEmail($data) {



$condition = "cust_Email =" . "'" . $data['email'] ."' AND ". "cust_Status =1";

$this->db->select('*');
$this->db->from('customers');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if($query->num_rows() == 1) {

return true;

} else {

return false;

}

}
public function getUserByEmail($data) {



$condition = "cust_Email =" . "'" . $data['email'] ."' AND ". "cust_Status =1";

$this->db->select('*');
$this->db->from('customers');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if($query->num_rows() == 1) {

return $query->result_array();

} else {

return false;

}

}
public function login($data) {



$condition = "cust_Email =" . "'" . $data['username'] . "' AND " . "cust_Password =" . "'" . $data['password'] . "' AND ". "cust_Status =1";

$this->db->select('*');
$this->db->from('customers');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if($query->num_rows() == 1) {

return true;

} else {

return false;

}

}



public function verifyaccount($username,$code) {$condition = "can_Email =" . "'" . $username . "' AND can_VerifyCode =" . "'" . $code . "'";$this->db->select('*');$this->db->from('candidates');$this->db->where($condition);$this->db->limit(1);$query = $this->db->get();$data=array('can_isVerified'=>1);if ($query->num_rows() == 1) {$this->db->where('can_Email',$username);		$this->db->update('candidates' ,$data);			if ($this->db->affected_rows() > 0) 				return true;				}return false;}
}

?>