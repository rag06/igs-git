<?php

Class Country_Model extends CI_Model {
	public function listCountry() {

		
		$this->db->select('*');
		$this->db->from('country');
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}

}

?>