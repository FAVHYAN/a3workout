<?php

class Shop extends Front_Controller {
	
	function __construct()
	{
		parent::__construct();

        $this->load->model('Category_model');
	}

	function index()
	{
        show_404();
	}

    function all(){

        $data['categories']	=	$this->Category_model->get_category_shop(0);
        $this->load->view('shop', $data);

    }


}
?>