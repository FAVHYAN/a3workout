<?php

class Course extends Front_Controller {
	
	function __construct()
	{
		parent::__construct();

        $this->load->model('Category_model');
        $this->load->model('Packages_model');
        $this->load->model('Product_model');
        $this->load->model('Option_model');
	}

	function index()
	{
            show_404();
	}

        function all(){
            $data['packages_row1'] = $this->Course_model->get_packages_row1();
            $data['categories']	=	$this->Category_model->get_category_shop(1);
            $this->load->view('course', $data);
        }
        
        
        function save_schedule(){
            
            $datos['id_course'] = $this->input->post("id_course");
            $datos['name'] = $this->input->post("name");
            $datos['date'] = $this->input->post("date_schedule");
            $datos['quantity'] = $this->input->post("places_schedule");
            $datos['start_time'] = $this->input->post("starttime");
            $datos['finish_time'] = $this->input->post("finishtime");
            $datos['price'] = $this->input->post("price_schedule");
            $datos['saleprice'] = $this->input->post("saleprice_schedule");
            $datos['description'] = $this->input->post("date_schedule")." ".$this->input->post("starttime")." - ".$this->input->post("finishtime"); 
            
            $shedule_id1 = $this->db->insert("products",$datos);
            $shedule_id = $this->db->insert_id();
            if($shedule_id1){
                echo $shedule_id;
            }
        }
        
        function delete_schedule_admin(){
            $id = $this->input->post("id_schedule");
            $schedule_delete = $this->db->delete('products', array('id' => $id)); 
            if($schedule_delete){
                echo $schedule_delete;
            }
        }
        
        function check_packages_shop(){            
            $id = $this->input->post('id_product');
            $data['course'] = $this->Course_model->get_course_by_id($id);
            $data['packages'] = $this->db->where('id_course', $id)->order_by('type_package', '')->get('products');
            $data['id_product'] = $id;
            $this->load->view('check_packages_shop', $data);
        }   
        
        function actualizar_my_purchase(){
            echo '<a href="'.site_url('cart/view_cart').'">';
            if ($this->go_cart->total_items()==0)
            {
                    echo lang('empty_cart');
            }
            else
            {
                    if($this->go_cart->total_items() > 1)
                    {
                            echo sprintf (lang('multiple_items'), $this->go_cart->total_items());
                    }
                    else
                    {
                            echo sprintf (lang('single_item'), $this->go_cart->total_items());
                    }
            }

            echo "</a>";
        }
        
        function add_schedule_course_to_cart(){
                // Get our inputs
		$product_id	= $this->input->post('id');
		$quantity 	= '1';
		$post_options 	= "";



		// echo '<pre>';
		// print_r($product_id);
		// exit();
		
		// Get a cart-ready product array
		$product = $this->Product_model->get_cart_ready_product($product_id, $quantity);
		//if out of stock purchase is disabled, check to make sure there is inventory to support the cart.
		if(!$this->config->item('allow_os_purchase') && (bool)$product['track_stock'])
		{
			$stock	= $this->Product_model->get_product($product_id);
			
			//loop through the products in the cart and make sure we don't have this in there already. If we do get those quantities as well
			$items		= $this->go_cart->contents();
			$qty_count	= $quantity;
			foreach($items as $item)
			{
				if(intval($item['id']) == intval($product_id))
				{
					$qty_count = $qty_count + $item['quantity'];
				}
			}
			if($stock->quantity < $qty_count)
			{
				//we don't have this much in stock
				$this->session->set_flashdata('error', sprintf(lang('not_enough_stock'), $stock->name, $stock->quantity));
				$this->session->set_flashdata('quantity', $quantity);
				$this->session->set_flashdata('option_values', $post_options);
				echo "no_cupos";
			}
		}

		// Validate Options 
		// this returns a status array, with product item array automatically modified and options added
		//  Warning: this method receives the product by reference
		$status = $this->Option_model->validate_product_options($product, $post_options);
		
		// don't add the product if we are missing required option values
		if( ! $status['validated'])
		{
			$this->session->set_flashdata('quantity', $quantity);
			$this->session->set_flashdata('error', $status['message']);
			$this->session->set_flashdata('option_values', $post_options);
		
			echo "if1";//redirect($this->Product_model->get_slug($product_id));
		
		} else {
		
			//Add the original option vars to the array so we can edit it later
			$product['post_options']	= $post_options;
			
			//is giftcard
			$product['is_gc']			= false;
			
			// Add the product item to the cart, also updates coupon discounts automatically
			if($this->go_cart->insert($product)){                           
                            echo "ok";            
                        }
		
			// go go gadget cart!
			 //redirect('cart/view_cart');
                        
//                        if($this->go_cart->insert($product)){
//                            $cart_contents = $this->session->userdata('cart_contents');
//                            $id_user =  $cart_contents['customer']['id'];                            
//                            $query = $this->db->query("SELECT * FROM student_packages 
//                                                       WHERE id_customer=$id_user
//                                                       AND id_package=1");
//                            if($query->num_rows() > 0){
//                                echo "ok";                                
//                            } else {
//                              $this->add_membership_to_cart();                                
//                            }
//                        }
		}
        }
        
        function add_membership_to_cart(){// Get our inputs
		$product_id	= 1;
		$quantity 	= '1';
		$post_options 	= "";
		
		// Get a cart-ready product array
		$product = $this->Product_model->get_cart_ready_product($product_id, $quantity);

		// Validate Options 
		// this returns a status array, with product item array automatically modified and options added
		//  Warning: this method receives the product by reference
		$status = $this->Option_model->validate_product_options($product, $post_options);
		
		// don't add the product if we are missing required option values
		if( ! $status['validated'])
		{
			$this->session->set_flashdata('quantity', $quantity);
			$this->session->set_flashdata('error', $status['message']);
			$this->session->set_flashdata('option_values', $post_options);
		
			echo "if1";//redirect($this->Product_model->get_slug($product_id));
		
		} else {
		
			//Add the original option vars to the array so we can edit it later
			$product['post_options']	= $post_options;			
			//is giftcard
			$product['is_gc']               = false;			
			// Add the product item to the cart, also updates coupon discounts automatically
			$this->go_cart->insert($product);
		
			echo "ok";
		}
        }


}