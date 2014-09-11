<?php
class class_name extends Front_Controller{
	
	var $customer;
	
	function __construct()
	{
		parent::__construct();
		
		force_ssl();
		
    	$this->load->model('Customer_model');
		$this->load->model(array('location_model'));
		
		$this->customer = $this->go_cart->customer();
	}
	
	function index()
	{
		show_404();
	}
	
	function twitter() {
		echo "Twitter";
	}
} 
?>