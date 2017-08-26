<?php

Class Feedback_Model extends CI_Model {
	
	// insert a subcriber
	public function addFeedback($data) {

	// Query to insert data in database
		$this->db->insert('feedback', $data);
		if ($this->db->affected_rows() > 0) {
		return true;
		}
		 else {
		return false;
		}
	}
	public function listFeedback() {

		
		$this->db->select('*');
		$this->db->from('feedback');
		$this->db->join('customers','customers.cust_Id = feedback.feedback_by');
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function listWebFeedback() {

		
		$this->db->select('*');
		$this->db->from('feedback');
		$this->db->join('customers','customers.cust_Id = feedback.feedback_by');
		$this->db->where(' feedback.feedback_Status',1);
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function deleteFeedback($id) {

		
		$this->db->where('feedback_ID', $id);
		$this->db->delete('feedback');
		if ($this->db->affected_rows() > 0) {
				return true;
				}
				return false;
		
	}
	public function getFeedback($id)
	{			$query=$this->db->query("SELECT * FROM feedback   WHERE feedback_ID = $id");
				return $query->result_array();
	}
	public function updateFeedback($id,$data)
	{			
	$this->db->where('feedback_ID', $data['feedback_ID']);
		$this->db->update('feedback' ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
	}

}

?>