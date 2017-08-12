<?php

Class Product_Model extends CI_Model {
	
	// insert a product category
	public function addProductCategory($data) {

		$condition = "pCtg_Name =" . "'" . $data['pCtg_Name'] . "'";
		$this->db->select('*');
		$this->db->from('productcategory');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		
		$category = $this->db->escape($data['pCtg_Name']);
		$status = $data['pCtg_Status'];
		$sql = "INSERT INTO productcategory (pCtg_Name,pCtg_Status) VALUES (".$category.",".$status.")";
		
		if ($query->num_rows() == 0) {
			$this->db->query($sql);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		} else {
			return false;
		}
	}
	
		public function listProductCategory() {

		
		$this->db->select('*');
		$this->db->from('productcategory');
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function listWebProductCategory() {

		
		$this->db->select('*');
		$this->db->from('productcategory');
		$this->db->where('pCtg_Status',1);
		$query = $this->db->get();
		$data=array();
		$data=$query->result();
		return $data;
		
	}
	public function deleteProductCategory($id) {

		
		$this->db->where('pCtg_ID', $id);
		$this->db->delete('productcategory');
		if ($this->db->affected_rows() > 0) {
				return true;
				}
				return false;
		
	}
	public function getProductCategory($id)
	{			$query=$this->db->query("SELECT * FROM productcategory   WHERE pCtg_ID = ".$id);
				return $query->result_array();
	}
	public function updateProductCategory($id,$data)
	{			
		$category = $this->db->escape($data['pCtg_Name']);
		$status = $data['pCtg_Status'];
		$sql = "UPDATE productcategory SET pCtg_Name = ".$category.",pCtg_Status = ".$status." WHERE pCtg_ID = $id";
		
			$this->db->query($sql);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}
	
	// insert a product subcategory
	public function addProductSubCategory($data) {

		
		$category = $this->db->escape($data['pSCtg_Name']);
		$parentcategory = $this->db->escape($data['pSCtg_Category']);
		$status = $data['pSCtg_Status'];
		$sql = "INSERT INTO productsubcategory (pSCtg_Name,pSCtg_Category,pSCtg_Status) VALUES (".$category.",".$parentcategory.",".$status.")";
		
			$this->db->query($sql);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		 else {
			return false;
		}
	}
	
	public function listProductSubCategory() {

		
		$this->db->select('*');
		$this->db->from('productsubcategory');
		$this->db->join('productcategory','productcategory.pCtg_ID = productsubcategory.pSCtg_Category');
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function listProductSubCategoryWeb() {

		
		$this->db->select('*');
		$this->db->from('productsubcategory');
		$this->db->join('productcategory','productcategory.pCtg_ID = productsubcategory.pSCtg_Category');
		$this->db->where('productsubcategory.pSCtg_Status',1);
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function listSubCategoryByCatg($id) {

		
		$this->db->select('*');
		$this->db->from('productsubcategory');
		$this->db->join('productcategory','productsubcategory.pSCtg_Category = productcategory.pCtg_ID');
		$this->db->where('productsubcategory.pSCtg_Category',$id);
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function listWebProductSubCategory($id) {

		
		$this->db->select('*');
		$this->db->from('productsubcategory');
		$this->db->join('productcategory','productsubcategory.pSCtg_Category = productcategory.pCtg_ID');
		$this->db->where('productsubcategory.pSCtg_Status',1);
		$this->db->where('productsubcategory.pSCtg_Category',$id);
		$query = $this->db->get();
		$data=array();
		$data=$query->result();
		return $data;
		
	}
	public function deleteProductSubCategory($id) {

		
		$this->db->where('pSCtg_ID', $id);
		$this->db->delete('productsubcategory');
		if ($this->db->affected_rows() > 0) {
				return true;
				}
				return false;
		
	}
	public function getProductSubCategory($id)
	{			$query=$this->db->query("SELECT * FROM productsubcategory   WHERE pSCtg_ID = ".$id);
				return $query->result_array();
	}
	public function updateProductSubCategory($id,$data)
	{			
		$category = $this->db->escape($data['pSCtg_Name']);
		$parentcategory = $data['pSCtg_Category'];
		$status = $data['pSCtg_Status'];
		$sql = "UPDATE productsubcategory SET pSCtg_Name = ".$category." , pSCtg_Category = ".$parentcategory." , pSCtg_Status = ".$status." WHERE pSCtg_ID = $id";
		
			$this->db->query($sql);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}
	
	
	public function listProducts() {

		
		$this->db->select('*');
		$this->db->from('products');
		/*$this->db->join('productsubcategory','productsubcategory.pSCtg_Category = products.product_SubCtg');*/
		$this->db->join('productcategory','productcategory.pCtg_ID = products.product_Ctg');
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function listWebProducts() {

		
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('productcategory','productcategory.pCtg_ID = products.product_Ctg');
		$this->db->where('products.product_Status',1);
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function addProduct($data) {
		// Query to insert data in database
		$this->db->insert('products', $data);
		if ($this->db->affected_rows() > 0) {
		return true;
		}
		 else {
		return false;
		}
	}
	public function deleteProduct($id) {

		
		$this->db->where('product_ID', $id);
		$this->db->delete('products');
		if ($this->db->affected_rows() > 0) {
				return true;
				}
				return false;
		
	}
	public function getProduct($id)
	{			$query=$this->db->query("SELECT * FROM products   WHERE product_ID = $id");
				return $query->result_array();
	}
	public function updateProduct($data)
	{			
		$this->db->where('product_ID', $data['product_ID']);
		$this->db->update('products' ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}
	public function listInfo($id) {

		
		$this->db->select('*');
		$this->db->from('product_package');
		$this->db->where('product_package.pkg_productID',$id);
		$query = $this->db->get();
		$data=array();
		$data['result']=$query->result();
		$data['records']=$query->num_rows();
		return $data;
		
	}
	public function addInfo($data) {
		// Query to insert data in database
		$this->db->insert('product_package', $data);
		if ($this->db->affected_rows() > 0) {
		return true;
		}
		 else {
		return false;
		}
	}
	public function deleteInfo($id) {

		
		$this->db->where('pkg_ID', $id);
		$this->db->delete('product_package');
		if ($this->db->affected_rows() > 0) {
				return true;
				}
				return false;
		
	}
	public function getInfo($id)
	{			$query=$this->db->query("SELECT * FROM product_package   WHERE pkg_ID = $id");
				return $query->result_array();
	}
	public function getInfoByProduct($id)
	{			$query=$this->db->query("SELECT * FROM product_package   WHERE pkg_productID = $id");
				return $query->result_array();
	}
	public function updateInfo($data)
	{			
		$this->db->where('pkg_ID', $data['pkg_ID']);
		$this->db->update('product_package' ,$data);
			if ($this->db->affected_rows() > 0) {
				return true;
				}
		
			return false;
		
	}


}

?>