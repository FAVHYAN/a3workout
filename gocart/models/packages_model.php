<?php
Class Packages_model extends CI_Model
{
	
	var $group_discount_formula = false;
	
	function __construct()
	{
		parent::__construct();
		
		// check for possible group discount 
		$customer = $this->session->userdata('customer');
		if(isset($customer['group_discount_formula'])) 
		{
			$this->group_discount_formula = $customer['group_discount_formula'];
		}
	}

		function get_package($id)
	{
		return	$this->db->where('id_course', $id)->get('products')->result();
	}

	function get_all_packages()
	{
		//sort by alphabetically by default
		$this->db->order_by('name', 'ASC');
		$result	= $this->db->get('products');
		//apply group discount
		$return = $result->result();
		if($this->group_discount_formula) 
		{
			foreach($return as &$products) {
				eval('$products->price=$products->price'.$this->group_discount_formula.';');
			}
		}
		return $return;
	}
}