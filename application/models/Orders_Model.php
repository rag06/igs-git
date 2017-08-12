<?php

Class Orders_Model extends CI_Model {
	
	public function listOrderStatus() {

		
		$this->db->select('*');
		$this->db->from('orderstatus');
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function listOrderDetails($id) {

		
		$this->db->select('*');
		$this->db->from('order_details');
		$this->db->where('odetail_orderID',$id);
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function listOrdersDetailsWeb() {

		
		$this->db->select('*');
		$this->db->from('order_details');
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function listOrders() {

		
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->join('orderstatus','orderstatus.orderStatus_ID = orders.order_Status');
		$this->db->order_by("orders.order_ID desc");
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function listOrdersWeb($id) {

		
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->join('orderstatus','orderstatus.orderStatus_ID = orders.order_Status');
		$this->db->where('orders.order_CustId',$id);
		$this->db->order_by("orders.order_ID desc");
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function createOrder($data) {
		// Query to insert data in database
		$this->db->insert('orders', $data);
		if ($this->db->affected_rows() > 0) {
		return $this->db->insert_id();
		}
		 else {
		return false;
		}
	}
	public function addOrderDetails($data) {
		// Query to insert data in database
		$this->db->insert('order_details', $data);
		if ($this->db->affected_rows() > 0) {
		return $this->db->insert_id();
		}
		 else {
		return false;
		}
	}
	public function getOrder($id)
	{			$query=$this->db->query("SELECT * FROM orders,customers    WHERE  orders.order_CustId =customers.cust_Id AND order_ID = $id");
	
				return $query->result_array();
	}
	public function updateOrder($data)
	{			
		$this->db->where('order_ID', $data['order_ID']);
		$this->db->update('orders' ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}
	public function updateOrderDetail($data)
	{			
		$this->db->where('odetail_ID', $data['odetail_ID']);
		$this->db->update('order_details' ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}

}

?>