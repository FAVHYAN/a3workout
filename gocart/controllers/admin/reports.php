<?php

class Reports extends Admin_Controller {

	//this is used when editing or adding a customer
	var $customer_id	= false;	

	function __construct()
	{		
		parent::__construct();
		remove_ssl();

		$this->auth->check_access('Admin', true);
		
		$this->load->model('Order_model');
		$this->load->model('Search_model');
		$this->load->helper(array('formatting'));
		
		$this->lang->load('report');
	}
	
	function index()
	{
		$data['page_title']	= lang('reports');
		$data['years']		= $this->Order_model->get_sales_years();
		$this->load->view($this->config->item('admin_folder').'/reports', $data);
	}
	
	function best_sellers()
	{
		$start	= $this->input->post('start');
		$end	= $this->input->post('end');
		$data['best_sellers']	= $this->Order_model->get_best_sellers($start, $end);
		
		$this->load->view($this->config->item('admin_folder').'/reports/best_sellers', $data);	
	}
	
	function sales()
	{
		$year			= $this->input->post('year');
		$data['orders']	= $this->Order_model->get_gross_monthly_sales($year);
		$this->load->view($this->config->item('admin_folder').'/reports/sales', $data);	
	}

	  function process_description_student(){ 
            

            $id = $this->input->post("valor"); 
            $query1 = $this->db->query("SELECT *, courses.name as course_name,customers.firstname, customers.lastname,count(courses.id) as contador from scheduler_events inner join customers on customers.id = scheduler_events.id_student inner join courses on courses.id_trainner = scheduler_events.id_trainer where scheduler_events.id_trainer = '".$id."'  and scheduler_events.id_student is not null group by courses.id")->result_array();


              echo json_encode($query1);
             }

               function process_description_trainer(){ 
            

            $id = $this->input->post("valor"); 
            $query1 = $this->db->query("SELECT *, scheduler_events.date as fecha, courses.name as course_name, scheduler_events.`type` as tipo from scheduler_events inner join courses on courses.id_trainner = scheduler_events.id_trainer where scheduler_events.id_trainer = '".$id."' group by scheduler_events.date")->result_array();


              echo json_encode($query1);
             }
        

}