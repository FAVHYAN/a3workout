<?php
class Secure extends Front_Controller {
	
	var $customer;
	
	function __construct()
	{
		parent::__construct();
		
		force_ssl();
		
    	$this->load->model('Customer_model');
        $this->load->model('Course_model');
		$this->load->model(array('location_model'));
		$this->load->helper(array('form', 'url'));
		
		$this->customer = $this->go_cart->customer();
	}
	
	function index()
	{
		show_404();
	}
        function farley(){
            echo $this->Customer_model->is_logged_in(false, false);
        }
        
        function schedule_trainer(){
            $this->load->view('schedule_trainer_clases');
        }

            function process_description(){ 
            

            $id = $this->input->post("valor"); 
            //$search['busqueda'] = $this->Course_model->get_courses_filter($id);
            $query1 = $this->db->query("SELECT sch.id_trainer as id_trainer, sch.id_student as id_student ,sch.id_course  as id_course,sch.`type` as tipo,sch.date as date_course, cu.name as name_course, cu.description as descrip_course,cu.images as image_course, c.firstname, c.lastname,c.username from scheduler_events sch inner join courses cu on cu.id = sch.id_course inner join customers c on c.id = sch.id_trainer where sch.id_course = '".$id."' group by date_course");
             
            $search = $query1->result();

            //$this->load->view('course', $search);

            echo json_encode($search);
             }

   
	
	function login($ajax = false)
	{

		//find out if they're already logged in, if they are redirect them to the my account page
		$redirect	= $this->Customer_model->is_logged_in(false, false);
		//if they are logged in, we send them back to the my_account by default, if they are not logging in
		if ($redirect)
		{

			redirect('secure/my_account/');
		}
		
		$data['page_title']	= 'Login';
		$data['gift_cards_enabled'] = $this->gift_cards_enabled;
		
		$this->load->helper('form');
		$data['redirect']	= $this->session->flashdata('redirect');
		$submitted 		= $this->input->post('submitted');

		if ($submitted)
		{
			$email			= $this->input->post('useremail');
			$password		= $this->input->post('password');
			$remember   	= $this->input->post('remember');
			$redirect		= $this->input->post('redirect');
			$login			= $this->Customer_model->login($email, $password, $remember);
			
			if ($login)
			{
				
				if ($redirect == '')
				{
					$customer 	= $this->Customer_model->get_customer($login);


		




					if ( $customer->type == 'student' ) {
						$redirect = 'secure/student';
					} elseif ( $customer->type == 'trainer' ) {
						$redirect = 'secure/my_account';
					}
				}

				//to login via ajax
				if($ajax)
				{
					die(json_encode(array('result'=>true)));
				}
				else
				{
					redirect($redirect);
				}
				
			}
			else
			{
				//this adds the redirect back to flash data if they provide an incorrect credentials
				
				//to login via ajax
				if($ajax)
				{
					die(json_encode(array('result'=>false)));
				}
				else
				{
					$this->session->set_flashdata('redirect', $redirect);
					$this->session->set_flashdata('error', lang('login_failed'));
					
					redirect('secure/login');
				}
			}
		}
		
		// load other page content 
		//$this->load->model('banner_model');
		$this->load->helper('directory');
	
		//if they want to limit to the top 5 banners and use the enable/disable on dates, add true to the get_banners function
		//$data['banners']	= $this->banner_model->get_banners();
		//$data['ads']		= $this->banner_model->get_banners(true);
		$data['categories']	= $this->Category_model->get_categories_tierd(0);
			
		$this->load->view('login', $data);
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
		

		}
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


	
        function check_courses_shop(){ 

        	

            $id = $this->input->post('id_product');
            $data['course'] = $this->Course_model->get_course_by_id($id);
            $data['packages'] = $this->db->where('id_course', $id)->order_by('id', 'ASC')->get('products');
            $data['id_product'] = $id;

            

            $this->load->view('check_courses_shop', $data);
        }  

	function logout()
	{
		$this->Customer_model->logout();
		redirect('secure/login');
	}

	
	function register()
	{
		/*
                $redirect	= $this->Customer_model->is_logged_in(false, false);
		//if they are logged in, we send them back to the my_account by default
		if ($redirect)
		{
			redirect('secure/my_account');
		}
                */
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div>', '</div>');
		
		/*
		we're going to set this up early.
		we can set a redirect on this, if a customer is checking out, they need an account.
		this will allow them to register and then complete their checkout, or it will allow them
		to register at anytime and by default, redirect them to the homepage.
		*/
		$data['redirect']	= $this->session->flashdata('redirect');
		
                
                
		$data['page_title']	= lang('account_registration');
		$data['gift_cards_enabled'] = $this->gift_cards_enabled;
		
		//default values are empty if the customer is new

		$data['firstname']	= '';
		$data['lastname']	= '';
		$data['username']		= '';
		$data['email']		= '';

		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[customers.username]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]|callback_check_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|sha1');
		$this->form_validation->set_rules('confirm', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('email_subscribe', 'Subscribe', 'trim|numeric|max_length[1]');

		if ($this->form_validation->run() == FALSE)
		{
			//if they have submitted the form already and it has returned with errors, reset the redirect
			if ($this->input->post('submitted'))
			{
				$data['redirect']	= $this->input->post('redirect');				
			}
			//exit($this->input->post('submitted'));
			
			// load other page content 
			//$this->load->model('banner_model');
			$this->load->helper('directory');
		
			$data['categories']	= $this->Category_model->get_categories_tierd(0);
			
			$data['error'] = validation_errors();
			
			$this->load->view('register', $data);
		}
		else
		{
		
			
			$save['id']		= false;
			$save['type'] = 'student';
			$save['firstname']				= $this->input->post('firstname');
			$save['lastname']					= $this->input->post('lastname');
			$save['username']					= $this->input->post('username');
			$save['email']						= $this->input->post('email');
			$save['email_subscribe']	= intval((bool)$this->input->post('email_subscribe'));
			
			$save['active']						= 1;
			$save['password']					= $this->input->post('password');

			
			$redirect = $this->input->post('redirect');

			// echo '<pre>';
			// print_r($_POST);
			// exit();

			//if we don't have a value for redirect
			if ( !empty($redirect) )
			{
				$redirect = 'secure/activation';
			}
			
			// save the customer info and get their new id
			$id = $this->Customer_model->save($save);

			/* send an email */
			// get the email template
			$res = $this->db->where('id', '6')->get('canned_messages');
			$row = $res->row_array();
			
			// set replacement values for subject & body
			
			// {customer_name}
			$row['subject'] = str_replace('{customer_name}', $this->input->post('firstname').' '. $this->input->post('lastname'), $row['subject']);
			$row['content'] = str_replace('{customer_name}', $this->input->post('firstname').' '. $this->input->post('lastname'), $row['content']);
			
			// {url}
			$row['subject'] = str_replace('{url}', $this->config->item('base_url'), $row['subject']);
			$row['content'] = str_replace('{url}', $this->config->item('base_url'), $row['content']);
			
			// {site_name}
			$row['subject'] = str_replace('{site_name}', $this->config->item('company_name'), $row['subject']);
			$row['content'] = str_replace('{site_name}', $this->config->item('company_name'), $row['content']);
			
			$this->load->library('email');
			
			$config['mailtype'] = 'html';
			
			$this->email->initialize($config);
	
			$this->email->from($this->config->item('email'), $this->config->item('company_name'));
			$this->email->to($save['email']);
			$this->email->bcc($this->config->item('email'));
			$this->email->subject($row['subject']);
			$this->email->message('
                            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                            <html xmlns="http://www.w3.org/1999/xhtml">
                            <head>
                                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                    <title>Wellcome to A3WORKOUT</title>
                            </head>

                            <body>
                                    <div>

                                    <div style="background-color:#efefef; padding: 20px;">
                                            <div align="center">
                                                    <img src="http://www.a3workout.com/assets/img/logo-a3-size-L.png" alt="A3WORKOUT" >
                                            </div>       
                                    </div>
                                    <!-- contenedor -->
                                    <div style="background:#ff0042; height:800px;">
                                            <div class="container" style="padding-bottom: 20px; width:588px; margin:0 auto; background:#FFF ;-webkit-box-shadow: 6px 5px 1px rgba(198, 3, 59, 1);-moz-box-shadow:    6px 5px 1px rgba(198, 3, 59, 1); box-shadow: 6px 5px 1px rgba(198, 3, 59, 1); position: absolute; top: 14%; left: 415px;">
                                                    <img src="http://www.a3workout.com/assets/img/email-template/banner.jpg" alt="A3WORKOUT" style="width:100%; height:158px;">
                                                    <div style="padding:20px 36px 40px 40px; color:2c3e50; font-family:Myriad Pro ;">
                                                            <div align="center" style="margin:15px;">
                                                                    <span style="font-size:30px;; border-bottom: 1px solid #666 dotted; border-bottom:1px dashed #2c3e50;"> '.$row['subject'].' </span>
                                                            </div>
                                                            <span style="color:#ff0042">Dear '.$save['firstname'].' '.$save['lastname'].',<br />
                                                                    <br />
                                                            </span>

                                                            <div style="color:#2c3e50;"> 
                                                                    '.html_entity_decode($row['content']).'
                                                                    <div>
                                                                            <a href="'. base_url('index.php/secure/confirmation_email/'. $id) .'" target="_blank">Click this link to activate your account</a><br>
                                                                    </div>
                                                            </div>
                                                            <div style="padding-bottom:20px; border-top:1px solid #cdd1d5 ;margin-top: 30px;">
                                                                    <div style="float:right; margin-top: 20px;">
                                                                            <ul style="list-style: none;">
                                                                                    <li style="float:right;padding-left: 5px;"><a href="#"><img src=" http://www.a3workout.com/assets/img/facebook.jpg" /></a></li>
                                                                                    <li style="float:right;padding-left: 5px;"><a href="#"><img src=" http://www.a3workout.com/assets/img/twitter.jpg" /></a></li>
                                                                                    <li style="float:right;padding-left: 5px;"><a href="#"><img src=" http://www.a3workout.com/assets/img/linkedin.jpg" /></a></li>
                                                                                    <li style="float:right;padding-left: 5px;"><a href="#"><img src=" http://www.a3workout.com/assets/img/youtube.jpg" /></a></li>
                                                                            </ul>
                                                                    </div>

                                                                    <div style="float:left; margin-top: 30px;">  © A3WORKOUT.  All rights reserved.</div> 
                                                            </div> 
                                                    </div>
                                            </div>
                                    </div>
                                    </div> 
                            </body>
                            </html>
                    ');
			
			$this->email->send();
			
                        $this->session->set_flashdata('email_confirmation', $this->input->post('email'));
			$this->session->set_flashdata('message', sprintf( lang('registration_thanks'), $this->input->post('firstname') ) );
			
			//lets automatically log them in
			//$this->Customer_model->login($save['email'], $this->input->post('confirm'));
			
			//we're just going to make this secure regardless, because we don't know if they are
			//wanting to redirect to an insecure location, if it needs to be secured then we can use the secure redirect in the controller
			//to redirect them, if there is no redirect, the it should redirect to the homepage.
                        
			redirect($redirect);
		}
	}

        function confirmation_email($code){
        	echo $this->Customer_model->check_id($code);
                if ( $this->Customer_model->check_id($code) ) {
                        redirect('secure/step2/' . $code);
                }else{
                        $this->session->set_flashdata('message', 'The validation code is incorrect');
                        redirect('secure/login');
                }
        }

        function step2($id = false){

        	

                $data['id'] = $id;

                $this->load->view('register_step2', $data);
        }

        function step2_form($id=false){

        

 		$this->load->library('form_validation');
		$this->form_validation->set_rules('birthdate', 'Birthdate', 'trim|required|max_length[32]');
		// $this->form_validation->set_rules('height', 'Height', 'trim|required|max_length[50]');
		// $this->form_validation->set_rules('current_weight', 'Current weight', 'trim|required|max_length[50]');
		// $this->form_validation->set_rules('ideal_weight', 'Ideal weight', 'trim|required|max_length[50]');
                
		// $this->form_validation->set_rules('pant_size', 'Pant size', 'trim|required|max_length[50]');
		// $this->form_validation->set_rules('explain_current_activity', 'Explain current activity', 'trim|required|max_length[150]');
		// $this->form_validation->set_rules('chest', 'Chest', 'trim|required|max_length[50]');
		// $this->form_validation->set_rules('arms', 'Arms', 'trim|required|max_length[50]');
		// $this->form_validation->set_rules('waist', 'Waist', 'trim|required|max_length[50]');
		// $this->form_validation->set_rules('hips', 'Hips', 'trim|required|max_length[50]');
		// $this->form_validation->set_rules('thigh', 'Thigh', 'trim|required|max_length[50]');
		// $this->form_validation->set_rules('calf', 'Calf', 'trim|required|max_length[50]');
		// $this->form_validation->set_rules('neck', 'Neck', 'trim|required|max_length[50]');
                        
		 $this->form_validation->set_rules('question_optional3', 'Your biggest struggle in achieving', 'trim|required|max_length[500]');
		 $this->form_validation->set_rules('question_optional4', 'External factors have derailed you in the past', 'trim|required|max_length[500]');
		 $this->form_validation->set_rules('question_optional5', 'Bad health habits', 'trim|required|max_length[500]');

                $this->form_validation->set_rules('waiver', 'You should accept the waiver', 'required');



		$data['id'] = $id;
                
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('register_step2', $data);
		}else
		{

                $date = $_POST['birthdate'];
                $ano = substr($date, 0, 4);
               
                $actual = date("Y");

                $rest = $actual - $ano;
                
                 if($rest <= 18){
                 echo "<script type=\"text/javascript\">alert(\"Your age is not permitted for Subscription\");</script>";  
				$this->load->view('register_step2', $data);

                 }else{
		
                    if ($_FILES['upload_profile']['name'] != "") {
                            $config['upload_path']		= 'uploads/images/full/';
                            $config['allowed_types']	= 'gif|jpg|png';
                            $config['file_name']		= base64_encode(date("Ymdhis").rand(0,10));
                            $this->load->library('upload', $config);
                            if ($this->upload->do_upload('upload_profile'))
                            {
                                    $data_photo	= $this->upload->data();
                            }
                            else
                            {
                            echo "-2";
                            exit(); 
                            }
                    }

                    if ($_FILES['upload_profile']['name'] != "") {
                            $save['photo']  = json_encode(array($config['file_name'] => array("filename" => $data_photo['file_name'], "alt" => "", "caption" => "")));
                    } else {
                            $save['photo']  = json_encode(array("no foto" => array("filename" => "user.png", "alt" => "", "caption" => "")));
                    }
                    $front = json_encode(array("front_no_image.png" => array("filename" => "front_no_image.png", "alt" => "", "caption" => "")));	


        	


					$date = date("Y-m-d");
					$save['id']     = $id;
                    $save['type']   = "student";
                    $save['front']  = $front;
                    $save['birthday'] = $_POST['birthdate'];
                    $save['city']  = "-";
                    $save['country_id']  = 223;
                    $this->Customer_model->save($save);
                   
                    
                    $save2['id_customer'] = $id;
                    $save2['birthdate'] = $date;
                    $save2['method_of_contact'] = $this->input->post('method_of_contact');
                    $save2['method_of_contact_call_day'] = $this->input->post('method_of_contact_call_day');
                    // $save2['height'] = $this->input->post('height');
                    // $save2['current_weight'] = $this->input->post('current_weight');
                    // $save2['ideal_weight'] = $this->input->post('ideal_weight');
                    // $save2['pant_size'] = $this->input->post('pant_size');
                    // $save2['dress_size'] = $this->input->post('dress_size');
                    // $save2['current_activity'] = $this->input->post('current_activity');
                    // $save2['explain_current_activity'] = $this->input->post('explain_current_activity');
                    // $save2['chest'] = $this->input->post('chest');
                    // $save2['arms'] = $this->input->post('arms');
                    // $save2['waist'] = $this->input->post('waist');
                    // $save2['hips'] = $this->input->post('hips');
                    // $save2['thigh'] = $this->input->post('thigh');
                    // $save2['calf'] = $this->input->post('calf');
                    $save2['neck'] = $this->input->post('neck');
                    $save2['optional_question_health_club'] = $this->input->post('optional_question_health_club');
                    $save2['optional_question_trainner_before'] = $this->input->post('optional_question_trainner_before');
                    $save2['question_optional3'] = $this->input->post('question_optional3');
                    $save2['question_optional4'] = $this->input->post('question_optional4');
                    $save2['question_optional5'] = $this->input->post('question_optional5');
                    
                    $this->db->insert("fitness_assessment_student",$save2);
                    if($this->Customer_model->login_confirm($id)){   
                         $this->add_membership_to_cart();                     
                         redirect('cart/view_cart');
                    } 
                }
               }
        }


        function step2_form2($id=false){


        	
        	
		        	$data['id'] = $id;
                    $save2['id_customer'] = $id;
                    $save2['birthdate'] = $date;
                    $save2['height'] = $this->input->post('height');
                    $save2['current_weight'] = $this->input->post('current_weight');
                    $save2['ideal_weight'] = $this->input->post('ideal_weight');
                    $save2['pant_size'] = $this->input->post('pant_size');
                    $save2['dress_size'] = $this->input->post('dress_size');
                    $save2['current_activity'] = $this->input->post('current_activity');
                    $save2['explain_current_activity'] = $this->input->post('explain_current_activity');
                    $save2['chest'] = $this->input->post('chest');
                    $save2['arms'] = $this->input->post('arms');
                    $save2['waist'] = $this->input->post('waist');
                    $save2['hips'] = $this->input->post('hips');
                    $save2['thigh'] = $this->input->post('thigh');
                    $save2['calf'] = $this->input->post('calf');
                    $save2['neck'] = $this->input->post('neck');
                    
                    $this->db->insert("fitness_assessment_student",$save2);
                                        
                         redirect('secure/student');
                     
               
               
        }
        
        function go_to_pay_membership() {
            $this->add_membership_to_cart();                     
            redirect('cart/view_cart');
        }
        
        function add_membership_to_cart() {     // Get our inputs
            $this->load->model('Product_model');
            $this->load->model('Option_model');

		 $id_product = $_POST['radio'];
		

            $product_id = $id_product;
            $quantity = '1';
            $post_options = "";

            // Get a cart-ready product array
            $product = $this->Product_model->get_cart_ready_product($product_id, $quantity);

            // Validate Options 
            // this returns a status array, with product item array automatically modified and options added
            //  Warning: this method receives the product by reference
            $status = $this->Option_model->validate_product_options($product, $post_options);

            // don't add the product if we are missing required option values
            if (!$status['validated']) {
                $this->session->set_flashdata('quantity', $quantity);
                $this->session->set_flashdata('error', $status['message']);
                $this->session->set_flashdata('option_values', $post_options);

                echo "if1"; //redirect($this->Product_model->get_slug($product_id));
            } else {

                //Add the original option vars to the array so we can edit it later
                $product['post_options'] = $post_options;
                //is giftcard
                $product['is_gc'] = false;
                // Add the product item to the cart, also updates coupon discounts automatically
                $this->go_cart->insert($product);

                echo "ok";
            }
        }         
	
	function twitter() {
		require("twitter/twitteroauth.php");
		
		define('YOUR_CONSUMER_KEY', '4gJzoLbZ8s58f5Ncm8Bw');
		define('YOUR_CONSUMER_SECRET', 'WTMYIdrefA7SCSNFlPFvBaZFPVbZhlfxPY9EkZ9g');

		$twitteroauth = new TwitterOAuth(YOUR_CONSUMER_KEY, YOUR_CONSUMER_SECRET);
		// Requesting authentication tokens, the parameter is the URL we will be redirected to
		$request_token = $twitteroauth->getRequestToken('http://www.a3workout.com/getData/twitter');
		
		$this->session->set_userdata(array(
				'oauth_token' => '132253911-5P9lAKSwzJFHVza3hEVfaJhZ6txZwJouZcTj2LUr',
				'oauth_token_secret' => 'nFS6EEsZVgbatXL82GlNbUXM19slS9UiqAcS1Jw8M'
		));
		
		if ($twitteroauth->http_code == 200) {
			// Let's generate the URL and redirect
			$url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']);
		
			header('Location: ' . $url);
		} else {
			// It's a bad idea to kill the script, but we've got to know when there's an error.
			die('Something wrong happened.');
		}
	}
	
	function check_email($str)
	{
		if(!empty($this->customer['id']))
		{
			$email = $this->Customer_model->check_email($str, $this->customer['id']);
		}
		else
		{
			$email = $this->Customer_model->check_email($str);
		}
		
                if ($email)
                {
			$this->form_validation->set_message('check_email', lang('error_email'));
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

        function activation($code=false){
            /*if ($code) {
                if ( $id = $this->Secure_model->activation(array("activation"=>$code))[0]->id ) {
                    $this->session->set_userdata('user_id', $id);
                    redirect('profile/add_info/1');
                }else{
                    $this->session->set_flashdata('message_info', 'sorry but the activation code is not correct!');
                    redirect('secure');
                }
            }*/
            $data['page_title']	= "Activation";
            $data['email'] = $this->session->flashdata('email_confirmation');

            $this->load->view('activation', $data);
        }
	
	function forgot_password()
	{
		$data['page_title']	= lang('forgot_password');
		$data['gift_cards_enabled'] = $this->gift_cards_enabled;
		$submitted = $this->input->post('submitted');
		if ($submitted)
		{
			$this->load->helper('string');
			$email = $this->input->post('email');
			
			$reset = $this->Customer_model->reset_password($email);
			
			if ($reset)
			{						
				$this->session->set_flashdata('message', lang('message_new_password'));
			}
			else
			{
				$this->session->set_flashdata('error', lang('error_no_account_record'));
			}
			redirect('secure/forgot_password');
		}
		
		// load other page content 
		//$this->load->model('banner_model');
		$this->load->helper('directory');
	
		//if they want to limit to the top 5 banners and use the enable/disable on dates, add true to the get_banners function
		//$data['banners']	= $this->banner_model->get_banners();
		//$data['ads']		= $this->banner_model->get_banners(true);
		$data['categories']	= $this->Category_model->get_categories_tierd();
		
		
		$this->load->view('forgot_password', $data);
	}
	
	function my_account($offset=0)
	{
		$this->load->model('Course_model');

		$customer = array();
		//make sure they're logged in
		$this->Customer_model->is_logged_in('secure/my_account/');
	
		$data['gift_cards_enabled']	= $this->gift_cards_enabled;

		
		$data['customer']			= (array)$this->Customer_model->get_customer($this->customer['id']);
			
		$data['addresses'] 			= $this->Customer_model->get_address_list($this->customer['id']);
		
		$data['page_title']			= 'Welcome '.$data['customer']['firstname'].' '.$data['customer']['lastname'];
		$data['customer_addresses']	= $this->Customer_model->get_address_list($data['customer']['id']);
		
		// load other page content 
		//$this->load->model('banner_model');
		$this->load->model('order_model');
		$this->load->helper('directory');
		$this->load->helper('date');
		
		//if they want to limit to the top 5 banners and use the enable/disable on dates, add true to the get_banners function
	//	$data['banners']	= $this->banner_model->get_banners();
	//	$data['ads']		= $this->banner_model->get_banners(true);
		$data['categories']	= $this->Category_model->get_categories_tierd(0);
		
		// paginate the orders
		$this->load->library('pagination');

		$config['base_url'] = site_url('secure/my_account');
		$config['total_rows'] = $this->order_model->count_customer_orders($this->customer['id']);
		$config['per_page'] = '15'; 
	
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
	  
		$this->pagination->initialize($config);
		
	  	$cart_contents = $this->session->userdata('cart_contents');
		$user	= $this->Customer_model->get_customer($cart_contents['customer']['id']);
		
		$data['courses_trainer']		= $this->Course_model->get_course_trainer(array('id_trainner' => $cart_contents['customer']['id']));

		$data['user_logged']			= $user;

		if( $user->type == 'student' ) {
			redirect('secure/student');
			exit;
		}

		$data['orders_pagination'] 		= $this->pagination->create_links();

		$data['orders']					= $this->order_model->get_customer_orders($this->customer['id'], $offset);

		
		//if they're logged in, then we have all their acct. info in the cookie.
		
		
		/*
		This is for the customers to be able to edit their account information
		*/

		$this->load->library('form_validation');
		$this->form_validation->set_rules('quote', 'Quote Inspirational', 'trim|required');
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('cellphone', 'Mobile Phone', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('email_subscribe', 'Subscribe', 'trim|numeric|max_length[1]');

		if ($this->input->post('username') != '') {
			$this->form_validation->set_rules('username', 'User Name', 'required|min_length[5]|max_length[12]|xss_clean');
		}

		if($this->input->post('password') != '' || $this->input->post('confirm') != '')
		{
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|sha1');
			$this->form_validation->set_rules('confirm', 'Confirm Password', 'required|matches[password]');
		}
		else
		{
			$this->form_validation->set_rules('password', 'Password');
			$this->form_validation->set_rules('confirm', 'Confirm Password');
		}


		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('my_account', $data);
		}
		else
		{
		
			/*print_r($_FILES);
			exit;*/
			if ($_FILES['upload_profile']['name'] != "") {
				$config['upload_path']		= 'uploads/images/full/';
				$config['allowed_types']	= 'gif|jpg|png';
				$config['file_name']		= base64_encode(date("Ymdhis").rand(0,10));
	
				$this->load->library('upload', $config);
	
				if ($this->upload->do_upload('upload_profile'))
				{
	
					$data_photo	= $this->upload->data();
	
				}
				else
				{
				echo "-2";
				exit();
					$data_front	= $this->upload->data();
					
					$data['error'] = $this->upload->display_errors();
					$this->load->view('my_account', $data);
					exit;
				}
			}
			
			if ($_FILES['upload_front']['name'] != "") {
				$config['upload_path']		= 'uploads/images/full/';
				$config['allowed_types']	= 'gif|jpg|png';
				$config['file_name']		= base64_encode(date("Ymdhis").rand(0,10));
	
				$this->load->library('upload', $config);
	
				if ($this->upload->do_upload('upload_front'))
				{
					$data_front	= $this->upload->data();
				}
				else
				{
					$data['error'] = $this->upload->display_errors();
					$this->load->view('my_account', $data);
					exit;
				}
			}

			if (isset($data_photo['file_name'])) {
				$customer['photo']			= json_encode(array($config['file_name'] => array("filename" => $data_photo['file_name'], "alt" => "", "caption" => "")));
			}
			if (isset($data_front['file_name'])) {
				$customer['front']			= json_encode(array($config['file_name'] => array("filename" => $data_front['file_name'], "alt" => "", "caption" => "")));
			}
			
			$customer['id']						= $this->customer['id'];
			$customer['quote']					= $this->input->post('quote');
			$customer['bio']					= $this->input->post('bio');
			$customer['experiences']			= $this->input->post('experiences');
			$customer['education']				= $this->input->post('education');
			$customer['birthday']				= $this->input->post('birthday');
			$customer['zip']					= $this->input->post('zip');
			$customer['address']				= $this->input->post('address');
			$customer['country_id']				= $this->input->post('country_id');
			$customer['gender']					= $this->input->post('gender');
			$customer['firstname']				= $this->input->post('firstname');
			$customer['lastname']				= $this->input->post('lastname');
			$customer['phone']					= $this->input->post('phone');
			$customer['cell_phone']				= $this->input->post('cellphone');
			$customer['email_subscribe']		= intval((bool)$this->input->post('email_subscribe'));
			
			if($this->input->post('username') != '')
			{
				$customer['username']			= $this->input->post('username');
			}
			
			if($this->input->post('password') != '')
			{
				$customer['password']			= $this->input->post('confirm_password');
			}
						
			$this->go_cart->save_customer($this->customer);
			$this->Customer_model->save($customer);
			
			$this->session->set_flashdata('message', lang('message_account_updated'));
                        
                        
                        $id_trainer = $this->customer['id'];
                        $data_about["Id_customer"] = $this->customer['id'];
                        $data_about["question1"] = $this->input->post("question1");
                        $data_about["question2"] = $this->input->post("question2");
                        $data_about["question3"] = $this->input->post("question3");
                        $data_about["question4"] = $this->input->post("question4");
                        $data_about["question5"] = $this->input->post("question5");
                        $data_about["question6"] = $this->input->post("question6");
                        $data_about["question7"] = $this->input->post("question7");
                        $data_about["question8"] = $this->input->post("question8");
                        $data_about["question9"] = $this->input->post("question9");
                        $data_about["question10"] = $this->input->post("question10");
                        $data_about["question11"] = $this->input->post("question11");
                        $data_about["question12"] = $this->input->post("question12");
                        $data_about["question13"] = $this->input->post("question13");
                        $data_about["question14"] = $this->input->post("question14");
                        $data_about["link_face"] = $this->input->post("link_face");
                        $data_about["link_twit"] = $this->input->post("link_twit");
                        $data_about["link_goo"] = $this->input->post("link_goo");                        
                        
                        $query_about = $this->db->query("SELECT * FROM info_trainers WHERE Id_customer = '".$id_trainer."'");
                        if($query_about->num_rows() > 0){
                            $this->db->where('Id_customer', $id_trainer);
                            $this->db->update("info_trainers", $data_about );
                        } else{                            
                            $this->db->insert("info_trainers", $data_about );
                        }

			redirect('secure/my_account');
		}
	
	}
	
	function student($offset=0)
	{

		$this->load->model('Course_model');


		$customer = array();
		//make sure they're logged in
		$this->Customer_model->is_logged_in('secure/student/');
	
		$data['gift_cards_enabled']	= $this->gift_cards_enabled;
		
		$data['customer']			= (array)$this->Customer_model->get_customer($this->customer['id']);
			
		$data['addresses'] 			= $this->Customer_model->get_address_list($this->customer['id']);
		
		$data['page_title']			= 'Welcome '.$data['customer']['firstname'].' '.$data['customer']['lastname'];
		$data['customer_addresses']	= $this->Customer_model->get_address_list($data['customer']['id']);
		
		// load other page content 
		//$this->load->model('banner_model');
		$this->load->model('order_model');
		$this->load->helper('directory');
		$this->load->helper('date');

// 		echo '<pre>';
// print($data['customer_addresses']);
// exit();
		
		//if they want to limit to the top 5 banners and use the enable/disable on dates, add true to the get_banners function
	//	$data['banners']	= $this->banner_model->get_banners();
	//	$data['ads']		= $this->banner_model->get_banners(true);
		$data['categories']	= $this->Category_model->get_categories_tierd(0);
		
		// paginate the orders
		$this->load->library('pagination');

		$config['base_url'] = site_url('secure/student');
		$config['total_rows'] = $this->order_model->count_customer_orders($this->customer['id']);
		$config['per_page'] = '15'; 
	
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
	  
		$this->pagination->initialize($config);
		
                $cart_contents = $this->session->userdata('cart_contents');
		$user	= $this->Customer_model->get_customer($cart_contents['customer']['id']);
		
		$data['courses_trainer']	= $this->Course_model->get_course_trainer(array('id_trainner' => $cart_contents['customer']['id']));
		$data['packages_customer']	= $this->Course_model->student_packages1($user->id);
		$data['packages_customeri']	= $this->Course_model->student_packages($user->id);
		$data['user_logged']		= $user;

		if( $user->type == 'trainer' ) {
			redirect('secure/my_account');
			exit;
		}

		$data['orders_pagination'] 		= $this->pagination->create_links();

		$data['orders']					= $this->order_model->get_customer_orders($this->customer['id'], $offset);

		
		//if they're logged in, then we have all their acct. info in the cookie.
		
		
		/*
		This is for the customers to be able to edit their account information
		*/

		$this->load->library('form_validation');
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('cellphone', 'Mobile Phone', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('email_subscribe', 'Subscribe', 'trim|numeric|max_length[1]');

		if ($this->input->post('username') != '') {
			$this->form_validation->set_rules('username', 'User Name', 'required|min_length[5]|max_length[12]|xss_clean');
		}

		if($this->input->post('password') != '' || $this->input->post('confirm') != '')
		{
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|sha1');
			$this->form_validation->set_rules('confirm', 'Confirm Password', 'required|matches[password]');
		}
		else
		{
			$this->form_validation->set_rules('password', 'Password');
			$this->form_validation->set_rules('confirm', 'Confirm Password');
		}


		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('student', $data);
		}
		else
		{
		
			/*print_r($_FILES);
			exit;*/
			if ($_FILES['upload_profile']['name'] != "") {
				$config['upload_path']		= 'uploads/images/full/';
				$config['allowed_types']	= 'gif|jpg|png';
				$config['file_name']		= base64_encode(date("Ymdhis").rand(0,10));
	
				$this->load->library('upload', $config);
	
				if ($this->upload->do_upload('upload_profile'))
				{
	
					$data_photo	= $this->upload->data();
	
				}
				else
				{
				echo "-2";
				exit();
					$data_front	= $this->upload->data();
					
					$data['error'] = $this->upload->display_errors();
					$this->load->view('my_account', $data);
					exit;
				}
			}
			
			if ($_FILES['upload_front']['name'] != "") {
				$config['upload_path']		= 'uploads/images/full/';
				$config['allowed_types']	= 'gif|jpg|png';
				$config['file_name']		= base64_encode(date("Ymdhis").rand(0,10));
	
				$this->load->library('upload', $config);
	
				if ($this->upload->do_upload('upload_front'))
				{
					$data_front	= $this->upload->data();
				}
				else
				{
					$data['error'] = $this->upload->display_errors();
					$this->load->view('my_account', $data);
					exit;
				}
			}

			if (isset($data_photo['file_name'])) {
				$customer['photo']			= json_encode(array($config['file_name'] => array("filename" => $data_photo['file_name'], "alt" => "", "caption" => "")));
			}
			if (isset($data_front['file_name'])) {
				$customer['front']			= json_encode(array($config['file_name'] => array("filename" => $data_front['file_name'], "alt" => "", "caption" => "")));
			}
			
			$customer['id']						= $this->customer['id'];
			$customer['bio']					= $this->input->post('bio');
			$customer['experiences']			= $this->input->post('experiences');
			$customer['education']				= $this->input->post('education');
			$customer['birthday']				= $this->input->post('birthday');
            $customer['zip']					= $this->input->post('zip');
			$customer['address']				= $this->input->post('address');
			$customer['gender']					= $this->input->post('gender');
			$customer['city']					= $this->input->post('city');
			$customer['country_id']				= $this->input->post('country_id');
			$customer['firstname']				= $this->input->post('firstname');
			$customer['lastname']				= $this->input->post('lastname');
			$customer['phone']					= $this->input->post('phone');
			$customer['cell_phone']				= $this->input->post('cellphone');
			$customer['email_subscribe']		= intval((bool)$this->input->post('email_subscribe'));
			
			if($this->input->post('username') != '')
			{
				$customer['username']			= $this->input->post('username');
			}
			
			if($this->input->post('password') != '')
			{
				$customer['password']			= $this->input->post('confirm_password');
			}
						
			$this->go_cart->save_customer($this->customer);
			$this->Customer_model->save($customer);
			
			$this->session->set_flashdata('message', lang('message_account_updated'));
			
			redirect('secure/my_account');
		}
	
	}
	
	function profile($user_id=false) {                
                $data['class_induction'] =  "";
                if(isset($_GET["type"])){
                    $data['class_induction'] =  $_GET["type"];
                }
		$this->load->model('Course_model');

		$offset 	= 0;
		$customer 	= array();
		
		$data['gift_cards_enabled']	= $this->gift_cards_enabled;
		
		$data['customer']			= (array)$this->Customer_model->get_customer($user_id);
			
		$data['addresses'] 			= $this->Customer_model->get_address_list($user_id);
		
		$data['page_title']			= 'Welcome '.$data['customer']['firstname'].' '.$data['customer']['lastname'];
		$data['customer_addresses']	= $this->Customer_model->get_address_list($user_id);
		
		// load other page content
		//$this->load->model('banner_model');
		$this->load->model('order_model');
		$this->load->helper('directory');
		$this->load->helper('date');
		
		//if they want to limit to the top 5 banners and use the enable/disable on dates, add true to the get_banners function
		//	$data['banners']	= $this->banner_model->get_banners();
		//	$data['ads']		= $this->banner_model->get_banners(true);
		$data['categories']	= $this->Category_model->get_categories_tierd(0);
		
		// paginate the orders
		$this->load->library('pagination');
		
		$config['base_url'] = site_url('secure/my_account');
		$config['total_rows'] = $this->order_model->count_customer_orders($user_id);
		$config['per_page'] = '15';
		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$this->pagination->initialize($config);
		
		$cart_contents = $this->session->userdata('cart_contents');
		$user	= $this->Customer_model->get_customer($user_id);
		
		$data['courses_trainer']		= $this->Course_model->get_course_trainer(array('id_trainner' => $user_id));
		
		$data['user_logged']			= $user;
		$data['orders_pagination'] 		= $this->pagination->create_links();
		
		$data['orders']					= $this->order_model->get_customer_orders($user_id, $offset);
		
		
		//if they're logged in, then we have all their acct. info in the cookie.
		
		
		/*
		 This is for the customers to be able to edit their account information
		*/
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('quote', 'Quote Inspirational', 'trim|required');
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('cellphone', 'Mobile Phone', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('email_subscribe', 'Subscribe', 'trim|numeric|max_length[1]');
		
		if ($this->input->post('username') != '') {
			$this->form_validation->set_rules('username', 'User Name', 'required|min_length[5]|max_length[12]|xss_clean');
		}
		
		if($this->input->post('password') != '' || $this->input->post('confirm') != '')
		{
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|sha1');
			$this->form_validation->set_rules('confirm', 'Confirm Password', 'required|matches[password]');
		}
		else
		{
			$this->form_validation->set_rules('password', 'Password');
			$this->form_validation->set_rules('confirm', 'Confirm Password');
		}
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('profile', $data);
		}
		else
		{
		
			/*print_r($_FILES);
			 exit;*/
			if ($_FILES['upload_profile']['name'] != "") {
				$config['upload_path']		= 'uploads/images/full/';
				$config['allowed_types']	= 'gif|jpg|png';
				$config['file_name']		= base64_encode(date("Ymdhis").rand(0,10));
		
				$this->load->library('upload', $config);
		
				if ($this->upload->do_upload('upload_profile'))
				{
		
					$data_photo	= $this->upload->data();
		
				}
				else
				{
					echo "-2";
					exit();
					$data_front	= $this->upload->data();
						
					$data['error'] = $this->upload->display_errors();
					$this->load->view('profile', $data);
					exit;
				}
			}
				
			if ($_FILES['upload_front']['name'] != "") {
				$config['upload_path']		= 'uploads/images/full/';
				$config['allowed_types']	= 'gif|jpg|png';
				$config['file_name']		= base64_encode(date("Ymdhis").rand(0,10));
		
				$this->load->library('upload', $config);
		
				if ($this->upload->do_upload('upload_front'))
				{
					$data_front	= $this->upload->data();
				}
				else
				{
					$data['error'] = $this->upload->display_errors();
					$this->load->view('profile', $data);
					exit;
				}
			}
		
			if (isset($data_photo['file_name'])) {
				$customer['photo']			= $data_photo['file_name'];
			}
			if (isset($data_front['file_name'])) {
				$customer['front']			= $data_front['file_name'];
			}
				
			$customer['id']						= $user_id;
			$customer['quote']					= $this->input->post('quote');
			$customer['bio']					= $this->input->post('bio');
			$customer['experiences']			= $this->input->post('experiences');
			$customer['education']				= $this->input->post('education');
			$customer['birthday']				= $this->input->post('birthday');
			$customer['zip']					= $this->input->post('zip');
			$customer['gender']					= $this->input->post('gender');
			$customer['address']				= $this->input->post('address');
			$customer['country_id']				= $this->input->post('country_id');
			$customer['firstname']				= $this->input->post('firstname');
			$customer['lastname']				= $this->input->post('lastname');
			$customer['phone']					= $this->input->post('phone');
			$customer['cell_phone']				= $this->input->post('cellphone');
			$customer['email_subscribe']		= intval((bool)$this->input->post('email_subscribe'));
				
			if($this->input->post('username') != '')
			{
				$customer['username']			= $this->input->post('username');
			}
				
			if($this->input->post('password') != '')
			{
				$customer['password']			= $this->input->post('confirm_password');
			}
		
			$this->go_cart->save_customer($this->customer);
			$this->Customer_model->save($customer);
				
			$this->session->set_flashdata('message', lang('message_account_updated'));
				
			redirect('secure/profile');
		}
	}
	
        function profile_student($user_id=false) {
		$this->load->model('Course_model');

		
		//make sure they're logged in
		$user = $this->Customer_model->is_logged_in('secure/my_account/');

		

		$offset 	= 0;
		$customer 	= array();
		
		$data['gift_cards_enabled']	= $this->gift_cards_enabled;
		
		$data['customer']			= (array)$this->Customer_model->get_customer($user_id);
			
		$data['addresses'] 			= $this->Customer_model->get_address_list($user_id);
		
		$data['page_title']			= 'Welcome '.$data['customer']['firstname'].' '.$data['customer']['lastname'];
		$data['customer_addresses']	= $this->Customer_model->get_address_list($user_id);
		
		// load other page content
		//$this->load->model('banner_model');
		$this->load->model('order_model');
		$this->load->helper('directory');
		$this->load->helper('date');
		
		//if they want to limit to the top 5 banners and use the enable/disable on dates, add true to the get_banners function
		//	$data['banners']	= $this->banner_model->get_banners();
		//	$data['ads']		= $this->banner_model->get_banners(true);
		$data['categories']	= $this->Category_model->get_categories_tierd(0);
		
		// paginate the orders
		$this->load->library('pagination');
		
		$config['base_url'] = site_url('secure/my_account');
		$config['total_rows'] = $this->order_model->count_customer_orders($user_id);
		$config['per_page'] = '15';
		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$this->pagination->initialize($config);
		
		$cart_contents = $this->session->userdata('cart_contents');
		$user	= $this->Customer_model->get_customer($user_id);
		
		$data['courses_trainer']		= $this->Course_model->get_course_trainer(array('id_trainner' => $user_id));
		
		$data['user_logged']			= $user;
		$data['orders_pagination'] 		= $this->pagination->create_links();
		
		$data['orders']					= $this->order_model->get_customer_orders($user_id, $offset);
		
		
		//if they're logged in, then we have all their acct. info in the cookie.
		
		
		/*
		 This is for the customers to be able to edit their account information
		*/
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('quote', 'Quote Inspirational', 'trim|required');
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('cellphone', 'Mobile Phone', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('email_subscribe', 'Subscribe', 'trim|numeric|max_length[1]');
		
		if ($this->input->post('username') != '') {
			$this->form_validation->set_rules('username', 'User Name', 'required|min_length[5]|max_length[12]|xss_clean');
		}
		
		if($this->input->post('password') != '' || $this->input->post('confirm') != '')
		{
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|sha1');
			$this->form_validation->set_rules('confirm', 'Confirm Password', 'required|matches[password]');
		}
		else
		{
			$this->form_validation->set_rules('password', 'Password');
			$this->form_validation->set_rules('confirm', 'Confirm Password');
		}
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('profile_student', $data);
		}
		else
		{
		
			/*print_r($_FILES);
			 exit;*/
			if ($_FILES['upload_profile']['name'] != "") {
				$config['upload_path']		= 'uploads/images/full/';
				$config['allowed_types']	= 'gif|jpg|png';
				$config['file_name']		= base64_encode(date("Ymdhis").rand(0,10));
		
				$this->load->library('upload', $config);
		
				if ($this->upload->do_upload('upload_profile'))
				{
		
					$data_photo	= $this->upload->data();
		
				}
				else
				{
					echo "-2";
					exit();
					$data_front	= $this->upload->data();
						
					$data['error'] = $this->upload->display_errors();
					$this->load->view('profile_student', $data);
					exit;
				}
			}
				
			if ($_FILES['upload_front']['name'] != "") {
				$config['upload_path']		= 'uploads/images/full/';
				$config['allowed_types']	= 'gif|jpg|png';
				$config['file_name']		= base64_encode(date("Ymdhis").rand(0,10));
		
				$this->load->library('upload', $config);
		
				if ($this->upload->do_upload('upload_front'))
				{
					$data_front	= $this->upload->data();
				}
				else
				{
					$data['error'] = $this->upload->display_errors();
					$this->load->view('profile_student', $data);
					exit;
				}
			}
		
			if (isset($data_photo['file_name'])) {
				$customer['photo']			= $data_photo['file_name'];
			}
			if (isset($data_front['file_name'])) {
				$customer['front']			= $data_front['file_name'];
			}
				
			$customer['id']						= $user_id;
			$customer['quote']					= $this->input->post('quote');
			$customer['bio']					= $this->input->post('bio');
			$customer['experiences']			= $this->input->post('experiences');
			$customer['education']				= $this->input->post('education');
			$customer['birthday']				= $this->input->post('birthday');
			$customer['zip']					= $this->input->post('zip');
			$customer['gender']					= $this->input->post('gender');
			$customer['address']				= $this->input->post('address');
			$customer['country_id']				= $this->input->post('country_id');
			$customer['firstname']				= $this->input->post('firstname');
			$customer['lastname']				= $this->input->post('lastname');
			$customer['phone']					= $this->input->post('phone');
			$customer['cell_phone']				= $this->input->post('cellphone');
			$customer['email_subscribe']		= intval((bool)$this->input->post('email_subscribe'));
				
			if($this->input->post('username') != '')
			{
				$customer['username']			= $this->input->post('username');
			}
				
			if($this->input->post('password') != '')
			{
				$customer['password']			= $this->input->post('confirm_password');
			}
		
			$this->go_cart->save_customer($this->customer);
			$this->Customer_model->save($customer);
				
			$this->session->set_flashdata('message', lang('message_account_updated'));
				
			redirect('secure/profile_student');
		}
	}
	
	function add_course_user($id_user) {
	
		$data['gift_cards_enabled']	= $this->gift_cards_enabled;
		
		$data['customer']			= (array)$this->Customer_model->get_customer($this->customer['id']);
			
		$data['addresses'] 			= $this->Customer_model->get_address_list($this->customer['id']);
		
		$data['page_title']			= 'Welcome '.$data['customer']['firstname'].' '.$data['customer']['lastname'];
		$data['customer_addresses']	= $this->Customer_model->get_address_list($data['customer']['id']);

		$data['categories']	= $this->Category_model->get_categories_tierd(0);

		$cart_contents = $this->session->userdata('cart_contents');
		$user	= $this->Customer_model->get_customer($cart_contents['customer']['id']);
		$data['user_logged']			 = $user;
		
		$this->load->model('Course_model');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[128]');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('my_account', $data);
		}
		else
		{

			$config['upload_path']		= 'uploads/images/full/';
			$config['allowed_types']	= 'gif|jpg|png';
			$config['file_name']		= base64_encode(date("Ymdhis").rand(0,10));
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('upload_course_add'))
			{
				$data['error'] = $this->upload->display_errors();
				
				$this->load->view('my_account', $data);
			}
			else
			{

				$data_photo	= $this->upload->data();

				if (isset($data_photo['file_name'])) {
					$save['images']			= json_encode(array($config['file_name'] => array("filename" => $data_photo['file_name'], "alt" => "", "caption" => "")));
				}
				
				$save['id_trainner']			= $id_user;
				$save['name']					= $this->input->post('name');
				$save['description']			= $this->input->post('description');
				$save['enabled']				= 1;
			
				$arr_categories 		= array();
				
				$categories 	= explode(',', $this->input->post('categories_course'));
				
				foreach ($categories as $category){
					$arr_categories[] 	= $category;
				}
				$num_categories 	= count($arr_categories);
				$num_categories 	= $num_categories-1;
				unset($arr_categories[$num_categories]);
				
				$this->Course_model->save($save, false, $arr_categories);
				
				$this->session->set_flashdata('message', "Course Created!");
					
				redirect('secure/my_account');
			}
		}
	}
	
	
	function my_downloads($code=false)
	{
		
		if($code!==false)
		{
			$data['downloads'] = $this->Digital_Product_model->get_downloads_by_code($code);
		} else {
			$this->Customer_model->is_logged_in();
			
			$customer = $this->go_cart->customer();
			
			$data['downloads'] = $this->Digital_Product_model->get_user_downloads($customer['id']);
		}
		
		$data['gift_cards_enabled']	= $this->gift_cards_enabled;
		
		$data['page_title'] = lang('my_downloads');
		
		$this->load->view('my_downloads', $data);
	}
	
	
	function download($link)
	{
		$filedata = $this->Digital_Product_model->get_file_info_by_link($link);
		
		// missing file (bad link)
		if(!$filedata)
		{
			show_404();
		}
		
		// validate download counter
		if(intval($filedata->downloads) >= intval($filedata->max_downloads))
		{
			show_404();
		}
		
		// increment downloads counter
		$this->Digital_Product_model->touch_download($link);
		
		// Deliver file
		$this->load->helper('download');
		force_download('uploads/digital_uploads/', $filedata->filename);
	}
	
	
	function set_default_address()
	{
		$id = $this->input->post('id');
		$type = $this->input->post('type');
	
		$customer = $this->go_cart->customer();
		$save['id'] = $customer['id'];
		
		if($type=='bill')
		{
			$save['default_billing_address'] = $id;

			$customer['bill_address'] = $this->Customer_model->get_address($id);
			$customer['default_billing_address'] = $id;
		} else {

			$save['default_shipping_address'] = $id;

			$customer['ship_address'] = $this->Customer_model->get_address($id);
			$customer['default_shipping_address'] = $id;
		} 
		
		//update customer db record
		$this->Customer_model->save($save);
		
		//update customer session info
		$this->go_cart->save_customer($customer);
		
		echo "1";
	}
	
	
	// this is a form partial for the checkout page
	function checkout_address_manager()
	{
		$customer = $this->go_cart->customer();
		
		$data['customer_addresses'] = $this->Customer_model->get_address_list($customer['id']);
	
		$this->load->view('address_manager', $data);
	}
	
	// this is a partial partial, to refresh the address manager
	function address_manager_list_contents()
	{
		$customer = $this->go_cart->customer();
		
		$data['customer_addresses'] = $this->Customer_model->get_address_list($customer['id']);
	
		$this->load->view('address_manager_list_content', $data);
	}
	
	function address_form($id = 0)
	{
		
		$customer = $this->go_cart->customer();
		
		//grab the address if it's available
		$data['id']			= false;
		$data['company']	= $customer['company'];
		$data['firstname']	= $customer['firstname'];
		$data['lastname']	= $customer['lastname'];
		$data['email']		= $customer['email'];
		$data['phone']		= $customer['phone'];
		$data['address1']	= '';
		$data['address2']	= '';
		$data['city']		= '';
		$data['country_id'] = '';
		$data['zone_id']	= '';
		$data['zip']		= '';
		

		if($id != 0)
		{
			$a	= $this->Customer_model->get_address($id);
			if($a['customer_id'] == $this->customer['id'])
			{
				//notice that this is replacing all of the data array
				//if anything beyond this form data needs to be added to
				//the data array, do so after this portion of code
				$data		= $a['field_data'];
				$data['id']	= $id;
			} else {
				redirect('/'); // don't allow cross-customer editing
			}
			
			$data['zones_menu']	= $this->location_model->get_zones_menu($data['country_id']);
		}
		
		//get the countries list for the dropdown
		$data['countries_menu']	= $this->location_model->get_countries_menu();
		
		if($id==0)
		{
			//if there is no set ID, the get the zones of the first country in the countries menu
			$data['zones_menu']	= $this->location_model->get_zones_menu(array_shift(array_keys($data['countries_menu'])));
		} else {
			$data['zones_menu']	= $this->location_model->get_zones_menu($data['country_id']);
		}

		$this->load->library('form_validation');	
		$this->form_validation->set_rules('company', 'Company', 'trim|max_length[128]');
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('address1', 'Address', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('address2', 'Address', 'trim|max_length[128]');
		$this->form_validation->set_rules('city', 'City', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('country_id', 'Country', 'trim|required|numeric');
		$this->form_validation->set_rules('zone_id', 'State', 'trim|required|numeric');
		$this->form_validation->set_rules('zip', 'Zip', 'trim|required|max_length[32]');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			if(validation_errors() != '')
			{
				echo validation_errors();
			}
			else
			{
				$this->load->view('address_form', $data);
			}
		}
		else
		{
			$a = array();
			$a['id']						= ($id==0) ? '' : $id;
			$a['customer_id']				= $this->customer['id'];
			$a['field_data']['company']		= $this->input->post('company');
			$a['field_data']['firstname']	= $this->input->post('firstname');
			$a['field_data']['lastname']	= $this->input->post('lastname');
			$a['field_data']['email']		= $this->input->post('email');
			$a['field_data']['phone']		= $this->input->post('phone');
			$a['field_data']['address1']	= $this->input->post('address1');
			$a['field_data']['address2']	= $this->input->post('address2');
			$a['field_data']['city']		= $this->input->post('city');
			$a['field_data']['zip']			= $this->input->post('zip');
			
			// get zone / country data using the zone id submitted as state
			$country = $this->location_model->get_country(set_value('country_id'));	
			$zone    = $this->location_model->get_zone(set_value('zone_id'));		
			if(!empty($country))
			{
				$a['field_data']['zone']		= $zone->code;  // save the state for output formatted addresses
				$a['field_data']['country']		= $country->name; // some shipping libraries require country name
				$a['field_data']['country_code']   = $country->iso_code_2; // some shipping libraries require the code 
				$a['field_data']['country_id']  = $this->input->post('country_id');
				$a['field_data']['zone_id']		= $this->input->post('zone_id');  
			}
			
			$this->Customer_model->save_address($a);
			$this->session->set_flashdata('message', lang('message_address_saved'));
			echo 1;
		}
	}
	
	function delete_address()
	{
		$id = $this->input->post('id');
		// use the customer id with the addr id to prevent a random number from being sent in and deleting an address
		$customer = $this->go_cart->customer();
		$this->Customer_model->delete_address($id, $customer['id']);
		echo $id;
	}
        
        function upload_video_trainer(){
            $url_video = $this->input->post("url_video");
            $title_digital_content_add = $this->input->post("title_digital_content_add");
            $description_digital_content_add = $this->input->post("description_digital_content_add");
            $customer_id = $this->input->post("customer_id");
            $datos['idcustomers'] = $customer_id;
            $datos['url'] = $url_video;
            $datos['tittle'] = $title_digital_content_add;
            $datos['description'] =$description_digital_content_add;
            $video_id1 = $this->db->insert("videos_profile",$datos);
            $video_id = $this->db->insert_id();
            if($video_id1){
                echo $video_id;
            }
            
        }
        
        function delete_video_trainer(){
            $id = $this->input->post("id_video");
            $video_delete = $this->db->delete('videos_profile', array('id' => $id)); 
            if($video_delete){
                echo $video_delete;
            }
        }
        
        function schedule_edit_to_trainer(){         
            $id = $this->input->post('id');
            //$data['course'] = $this->Course_model->get_course_by_id($id);
            $data['name'] = "josefo";
            $data['id_course'] = $id;
            $this->load->view('schedule_edit_to_trainer', $data);
        }
        
        function charge_trainer_class(){
            $id_trainer = $this->input->post("id_trainer");
            $horario = $this->input->post("horario");

           
            
            $nuevafecha = strtotime ( '+6 day' , strtotime ( $horario ) ) ;
            $nuevafecha = date ( 'Y-m-d 23:59:59' , $nuevafecha );
             
            $query1 =  $this->db->query("SELECT scheduler_events.*,DATE_FORMAT(scheduler_events.date, '%Y_%c_%e_%H_%i_%s') AS fecha,customers.band FROM scheduler_events INNER JOIN customers  ON customers.id = scheduler_events.id_trainer   WHERE id_trainer='".$id_trainer."' AND scheduler_events.date  BETWEEN '".$horario." 00:00:00' AND '".$nuevafecha."' 
                                        GROUP BY  scheduler_events.date");

          
            $query = $query1->result();
            echo json_encode($query);
        }
        
        function charge_profile_trainer_class(){

            $id_trainer = $this->input->post("id_trainer");
            $horario = $this->input->post("horario");
            
            $nuevafecha = strtotime ( '+6 day' , strtotime ( $horario ) ) ;
            $nuevafecha = date ( 'Y-m-d 23:59:59' , $nuevafecha );
             
           

            	
            		$query1 = $this->db->query("SELECT scheduler_events.*,comments_profile.*,scheduler_events.id AS event_id,customers.id,customers.firstname,customers.lastname, customers.photo, customers.bio, customers.username,
                                        DATE_FORMAT(scheduler_events.date, '%Y_%c_%e_%H_%i_%s') AS fecha 
                                        FROM scheduler_events  
                                        INNER JOIN customers ON customers.id = scheduler_events.id_student
										LEFT JOIN comments_profile ON comments_profile.id_student = scheduler_events.id_student
                                        WHERE scheduler_events.id_trainer='".$id_trainer."' AND scheduler_events.date BETWEEN '".$horario." 00:00:00' AND '".$nuevafecha."' 
                                        group by scheduler_events.date");

            	
        

           
            $query = $query1->result();
            
            echo json_encode($query);
        }
        
        function charge_student_class(){

        	
        	 
            $id_student = $this->input->post("id_student");

            $id_trainer = $this->input->post("id_trainer");
            $id_trainer2 = $this->input->post("id_trainer2");
            $horario = $this->input->post("horario");

            list($trainer, $id_course, $type) = explode(',', $id_trainer);
            
            $nuevafecha = strtotime ( '+6 day' , strtotime ( $horario ) ) ;
            $nuevafecha = date ( 'Y-m-d 23:59:59' , $nuevafecha );
             
            $query1 = $this->db->query("SELECT scheduler_events.*,customers.id,customers.firstname,customers.lastname,customers.photo,customers.birthday,DATE_FORMAT(scheduler_events.date, '%Y_%c_%e_%H_%i_%s') AS fecha,courses.name as nombre_curso ,courses.description
                                        FROM scheduler_events  
                                        INNER JOIN customers ON customers.id = scheduler_events.id_trainer
                                        LEFT JOIN courses ON courses.id_trainner = scheduler_events.id_trainer
                                        WHERE scheduler_events.id_trainer = '".$id_trainer2."' 
                                        AND date BETWEEN '".$horario." 00:00:00' AND '".$nuevafecha."'group by scheduler_events.id");
            

            $query = $query1->result();
            echo json_encode($query);
        }


        function charge_student_class1(){
        	
            $id_student = $this->input->post("id_student");
            $id_trainer = $this->input->post("id_trainer");
            $horario = $this->input->post("horario");

            
            $nuevafecha = strtotime ( '+6 day' , strtotime ( $horario ) ) ;
            $nuevafecha = date ( 'Y-m-d 23:59:59' , $nuevafecha );
             
            $query1 = $this->db->query("SELECT scheduler_events.*,customers.id,customers.firstname,customers.lastname,
						DATE_FORMAT(scheduler_events.date, '%Y_%c_%e_%H_%i_%s') AS fecha,customers.band FROM scheduler_events 
						INNER JOIN customers ON customers.id = scheduler_events.id_trainer 
						LEFT JOIN courses ON courses.id_trainner = scheduler_events.id_trainer 
						WHERE scheduler_events.id_student = '".$id_student."' AND scheduler_events.date 
																BETWEEN'".$horario." 00:00:00' AND '".$nuevafecha."' 
                                        GROUP BY date");

           

            $query = $query1->result();
            echo json_encode($query);
        }
        
        function num_spots(){
           $id_trainer = $this->input->post("id_trainer");
           $horario = $this->input->post("horario"); 
           
           $query1 = $this->db->query("SELECT COUNT(*) AS num_busy FROM scheduler_events WHERE id_trainer='".$id_trainer."' AND date = '".$horario."'");
           $row = $query1->row();
           echo 3 - $row->num_busy;
        }
        
        function inscription_class(){

        

        	if(!empty($_POST['bande'])){

        		$date = $_POST['date'];
        		$id_trainer =$this->input->post("id_trainer");
           		$induction =$this->input->post("induction");

	            $id_student =$this->input->post("id_student");
	            $id_course =$this->input->post("id_course");
	            $type = $this->input->post("type");
        		$ano = substr($date,0, 4);
        		$mes = substr($date,4, 2);
        		$dia = substr($date,6, 2);
        		$hour = substr($date,8, 2);
        		$min = substr($date,10, 2);
        		$seg = substr($date,12, 2);

        		$date = $ano.'-'.$mes.'-'.$dia.' '.$hour.':'.$min.':'.$seg;
        	}else if(!empty($_POST['variables'])){


        		list($id_trainer, $id_course, $type) = explode(',', $_POST['variables']);

            $id_student =$this->input->post("id_student");
            $date =$this->input->post("date");
            $induction =$this->input->post("induction");
        }else if($_POST['banderin'] == 6){
             $type =$this->input->post("type");
             $id_trainer =$this->input->post("id_trainer");
             $id_student =$this->input->post("id_student");
             $id_course =$this->input->post("id_course");
             $date = $this->input->post("date");
             $induction =$this->input->post("induction");
         }else{
 	   		$id_trainer =$this->input->post("id_trainer");
            $id_student =$this->input->post("id_student");
            $id_course =$this->input->post("id_course");
            $date =$this->input->post("date");
            $type =$this->input->post("type");
            $induction =$this->input->post("induction");
        	}

        	
		
           // echo '<pre>';
           // print_r($id_trainer);
           // exit();


            $query = $this->db->query("SELECT * FROM customers c where c.id = '".$id_trainer."'");

            foreach ($query->result() as $key) {
            	$band = $key->band;
            }

            if($band == 1){
            	if($induction == "0"){
            	 $query = $this->db->query("SELECT * FROM scheduler_events 
                                           WHERE id_trainer=$id_trainer
                                           AND id_student=$id_student
                                           AND induction= $induction");
                if($query->num_rows() > 0){
                  echo "existe_induccion";
                } else{
                	
                    $datos['id_trainer'] = $id_trainer;
                    $datos['id_student'] = $id_student;
                    $datos['id_course'] = $id_course;
                    $datos['date'] = $date;
                    $datos['type'] = 3;
                    $datos['induction'] = $induction;
                    $class_id1 = $this->db->insert("scheduler_events",$datos);
                    $class_id = $this->db->insert_id();
                    if($class_id1){
                        echo $class_id;
                    }   
                    $this->db->query("UPDATE customers SET induction=1 WHERE id=$id_student");
                }
            } else{ 

            	


            
            $query = $this->db->query("SELECT count(*) as cuenta FROM scheduler_events where scheduler_events.id_student = '".$id_student."' AND date = '".$date."'");

            foreach ($query->result_array() as $key ) {
			        
			    $contador = $key['cuenta'];
			 }

        	

        if($contador > 0){
		echo 'exi_t';
        }else{
        	 $datos['id_trainer'] = $id_trainer;
                $datos['id_student'] = $id_student;
                $datos['date'] = $date;
                $datos['type'] = 3;
                $datos['induction'] = $induction;
                $class_id1 = $this->db->insert("scheduler_events",$datos);
                $class_id = $this->db->insert_id();
            

                
                if($class_id1){
                    
                    echo $class_id;
               		 }   
       			 }
       		}
            	
         }else if($band == 2){
         	if($induction == "0"){
                $query = $this->db->query("SELECT * FROM scheduler_events 
                                           WHERE id_trainer=$id_trainer
                                           AND id_student=$id_student
                                           AND induction= $induction");
                if($query->num_rows() > 0){
                    echo "existe_induccion";
                } else{
                    $datos['id_trainer'] = $id_trainer;
                    $datos['id_student'] = $id_student;
                    $datos['id_course'] = $id_course;
                    $datos['date'] = $date;
                    $datos['type'] = $type;
                    $datos['induction'] = $induction;
                    $class_id1 = $this->db->insert("scheduler_events",$datos);
                    $class_id = $this->db->insert_id();
                    if($class_id1){
                        echo $class_id;
                    }   
                    $this->db->query("UPDATE customers SET induction=1 WHERE id=$id_student");
                }
            } else{  
            
            $query = $this->db->query("SELECT count(*) as cuenta FROM scheduler_events  WHERE scheduler_events.id_student = '".$id_student."' AND date = '".$date."'");



            foreach ($query->result_array() as $key ) {
        
    $contador = $key['cuenta'];
 }


if($type == 2){


	 if($contador > 0){
		echo 'exi_t';
        }else{
        	if(empty($_POST['variables'])){
        		$type = 1;
        		}
        		if($type == 2){
        		echo 'no_group';
        	}else{

        		if(!empty($_POST['bande'])){
        		$type = $this->input->post("type");
        		}
        		if(!empty($_POST['banderin'])){
        		$type = $this->input->post("type");
        		}
        		$datos['id_trainer'] = $id_trainer;
                $datos['id_student'] = $id_student;
                $datos['id_course'] = $id_course;
                $datos['date'] = $date;
                $datos['type'] = $type;
                $datos['induction'] = $induction;
                $class_id1 = $this->db->insert("scheduler_events",$datos);
                $class_id = $this->db->insert_id();
            

                
                if($class_id1){
                    
                    echo $class_id;
                } 
        	}
        	   
        }

}else{

	 if($contador > 0){
		echo 'exi_t';
        }else{
        	$type = 1;
        	if($type == 2){
        		echo 'no_group';
        	}else{

        		if(!empty($_POST['bande'])){
        		$type = $this->input->post("type");
        		}
        		if(!empty($_POST['banderin'])){
        		$type = $this->input->post("type");
        		}
        		$datos['id_trainer'] = $id_trainer;
                $datos['id_student'] = $id_student;
                $datos['id_course'] = $id_course;
                $datos['date'] = $date;
                $datos['type'] = $type;
                $datos['induction'] = $induction;
                $class_id1 = $this->db->insert("scheduler_events",$datos);
                $class_id = $this->db->insert_id();
            

                
                if($class_id1){
                    
                    echo $class_id;
                	} 
        		}
        	}
		}
	}
  }
}
        
        function change_type_class(){
            $id_class =$this->input->post("id_class");
            $date =$this->input->post("date");
            $id_trainer =$this->input->post("id_trainer");
            $update = $this->db->query("UPDATE scheduler_events SET type='2' WHERE id=$id_class");
            if($update){
                echo "ok";
            }               
        }
        
        function students_group_class(){
            $id_class =$this->input->post("id_class");
            $date =$this->input->post("date");
            $id_trainer =$this->input->post("id_trainer");
            $query1 = $this->db->query("SELECT scheduler_events.*,customers.id,customers.firstname,
                                        customers.lastname,customers.username,customers.photo,customers.bio
                                        FROM scheduler_events  
                                        INNER JOIN customers ON customers.id = scheduler_events.id_student
                                        WHERE id_trainer='".$id_trainer."' 
                                        AND date = '".$date."'");
            $query = $query1->result();
            echo json_encode($query);
        }
        
        function save_comment_profile_student(){
            $id_trainer = $this->input->post("id_trainer");
            $data["description"] = $this->input->post("comment_description");
            $data["id_student"] = $this->input->post("id_student");
            $data["id_trainer"] = $this->input->post("id_trainer");
            $data["date"] = date("Y-m-d H:i:s");
            $update = $this->db->insert("comments_profile", $data);
            if($update){
                $query1 = $this->db->query("SELECT * FROM customers WHERE id=$id_trainer");
                $query = $query1->result();
                echo json_encode($query);
            }               
        }
}