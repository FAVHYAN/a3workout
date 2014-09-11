<?php
Class Customer_model extends CI_Model
{

	//this is the expiration for a non-remember session
	var $session_expire	= 7200;
	
	
	function __construct()
	{
			parent::__construct();
	}
	
	/********************************************************************

	********************************************************************/
	
	function get_customers($limit=0, $offset=0, $order_by='id', $direction='DESC')
	{
		$this->db->order_by($order_by, $direction);
		if($limit>0)
		{
			$this->db->limit($limit, $offset);
		}
		
		$this->db->where('type','student');
		$result	= $this->db->get('customers');
		return $result->result();
	}
	

	function get_customers1($limit=0, $offset=0, $order_by='id', $direction='ASC')
	{
		$this->db->order_by($order_by, $direction);
		if($limit>0)
		{
			$this->db->limit($limit, $offset);
		}
		

		$result	= $this->db->query("SELECT * FROM customers where customers.type = 'trainer' OR customers.type = 'consultant' order by customers.band ASC");
		return $result->result();
	}
	
	function check_id($code=false){
		if($code && is_numeric($code)){

			$this->db->select('id');
			$this->db->from('customers');
			$this->db->where('id', $code);
			$count = $this->db->count_all_results();

			if ($count > 0){
				$data['confirmed'] = 1;
				$this->db->where('id', $code)->update('customers', $data);
				return true;
			}

		}else return false;
	}
	
	function count_customers()
	{
		return $this->db->count_all_results('customers');
	}
	
	function get_customer($id)
	{
		
		$result	= $this->db->get_where('customers', array('id'=>$id));
		return $result->row();
	}
	
	function get_subscribers()
	{
		$this->db->where('type','trainer');
		$res = $this->db->get('customers');
		return $res->result_array();
	}
	
	function get_subscribers1()
	{
		$this->db->where('email_subscribe','1');
		$this->db->where('type','student');
		$res = $this->db->get('customers');
		return $res->result_array();
	}
	
	function get_address_list($id)
	{
		$addresses = $this->db->where('customer_id', $id)->get('customers_address_bank')->result_array();
		// unserialize the field data
		if($addresses)
		{
			foreach($addresses as &$add)
			{
				$add['field_data'] = unserialize($add['field_data']);
			}
		}
		
		return $addresses;
	}
	
	function get_address($address_id)
	{
		$address= $this->db->where('id', $address_id)->get('customers_address_bank')->row_array();
		if($address)
		{
			$address_info			= unserialize($address['field_data']);
			$address['field_data']	= $address_info;
			$address				= array_merge($address, $address_info);
		}
		return $address;
	}
	
	function save_address($data)
	{
		// prepare fields for db insertion
		$data['field_data'] = serialize($data['field_data']);
		// update or insert
		if(!empty($data['id']))
		{
			$this->db->where('id', $data['id']);
			$this->db->update('customers_address_bank', $data);
			return $data['id'];
		} else {
			$this->db->insert('customers_address_bank', $data);
			return $this->db->insert_id();
		}
	}
	
	function delete_address($id, $customer_id)
	{
		$this->db->where(array('id'=>$id, 'customer_id'=>$customer_id))->delete('customers_address_bank');
		return $id;
	}
	
	function save($customer)
	{



		if ($customer['id'])
		{
			$this->db->where('id', $customer['id']);
			$this->db->update('customers', $customer);
			return $customer['id'];
		}
		else
		{



		if(!empty($_POST['bandera'])){


		
				$id_type = $this->input->post('group_id');
		
		$query = $this->db->query("SELECT * from customer_groups where id = '".$id_type."' ");


		foreach ($query->result() as $key) {

			 $key;

		}

	$type 	= '';
    $quote = '';
    $photo = '{"no foto":{"filename":"user.png","alt":"","caption":""}}';
    $front = '{"front_no_image.png":{"filename":"front_no_image.png","alt":"","caption":""}}';
    $bio = '';
    $email = '';
    $email_subscribe = '';
    $username = '';
    $firstname = '';
    $lastname = '';
    $cell_phone = '';
    $birthday = '';
    $password = '';
    $country_id = '';
    $gender = '';
    $city = '';
    $zip = '';
    $address = '';
    $phone = '';
    $confirm = '';
    $experiences = '';
    $education = '';

    $question1 = '';
    $question2 = '';
    $question3 = '';
    $question4 = '';
    $question5 = '';
    $question6 = '';
    $question7 = '';
    $question8 = '';
    $question9 = '';
    $question10 = '';
    $question11 = '';
    $question12 = '';
    $question13 = '';
    $question14 = '';
    $link_face = '';
    $link_twit = '';
    $link_goo = '';

	$type 	= $key->name;
	$band = $_POST['bandera'];

    $quote = $_POST['quote'];

    $bio = $_POST['bio'];
    $email = $_POST['email'];
    $email_subscribe = $_POST['email_subscribe'];
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $cell_phone = $_POST['cell_phone'];
    $birthday = $_POST['birthday'];
    $password = $_POST['password'];
    $country_id = $_POST['country_id'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $confirm = $_POST['confirm'];
    $experiences = $_POST['experiences'];
    $education = $_POST['education']; 

    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    $question3 = $_POST['question3'];
    $question4 = $_POST['question4'];
    $question5 = $_POST['question5'];
    $question6 = $_POST['question6'];
    $question7 = $_POST['question7'];
    $question8 = $_POST['question8'];
    $question9 = $_POST['question9'];
    $question10 = $_POST['question10'];
    $question11 = $_POST['question11'];
    $question12 = $_POST['question12'];
    $question13 = $_POST['question13'];
    $question14 = $_POST['question14'];
    $link_face = $_POST['link_face'];
    $link_twit = $_POST['link_twit'];
    $link_goo = $_POST['link_goo'];

		
if($type == 'consultant'){

	$typel = 'trainer';

$query = $this->db->query("INSERT INTO customers (type,	firstname,	lastname, front, photo,	email_subscribe,	email,	username,	password,	cell_phone,	birthday,	zip,	address,	quote,	experiences,	bio,	education,	phone, gender, active,	group_id,	country_id,	city,	confirmed,	induction,band)
					VALUES ('".$typel."','".$firstname."','".$lastname."','".$front."','".$photo."','".$email_subscribe ."','".$email."','".$username."','".$password."','".$cell_phone."','".$birthday."','".$zip."','".$address."','".$quote."','".$experiences."','".$bio."','".$education."','".$phone."','".$gender."','".$email_subscribe."','".$email_subscribe."','".$country_id."','".$city."','".$email_subscribe."','".$email_subscribe."','".$band."')");


}else{

	$band = '2';
 	$typel = 'trainer';

$query = $this->db->query("INSERT INTO customers (type,	firstname,	lastname, front, photo,	email_subscribe,	email,	username,	password,	cell_phone,	birthday,	zip,	address,	quote,	experiences,	bio,	education,	phone, gender, active,	group_id,	country_id,	city,	confirmed,	induction,band)
					VALUES ('".$typel."','".$firstname."','".$lastname."','".$front."','".$photo."','".$email_subscribe ."','".$email."','".$username."','".$password."','".$cell_phone."','".$birthday."','".$zip."','".$address."','".$quote."','".$experiences."','".$bio."','".$education."','".$phone."','".$gender."','".$email_subscribe."','".$email_subscribe."','".$country_id."','".$city."','".$email_subscribe."','".$email_subscribe."','".$band."')");


}



		


		$queryll = $this->db->query("SELECT * from customers where customers.email ='".$email."'");



		foreach ($queryll->result() as $key) {

			 $key;

		}


		$query2 = $this->db->query("INSERT INTO info_trainers (Id_customer,question1,question2,question3,question4,question5,question6,question7,question8,question9,question10,question11,question12,question13,question14,link_face,link_twit,link_goo )
					VALUES ('".$key->id."','".$question1."','".$question2."','".$question3."','".$question4."','".$question5 ."','".$question6."','".$question7."','".$question8."','".$question9."','".$question10."','".$question11."','".$question12."','".$question13."','".$question14."','".$link_face."','".$link_twit."','".$link_goo."')");
		}else{

		

			$this->db->insert('customers', $customer);
		}


			return $this->db->insert_id();
		}
	}
	
	function deactivate($id)
	{
		$customer	= array('id'=>$id, 'active'=>0);
		$this->save_customer($customer);
	}
	
	function delete($id)
	{
		/*
		deleting a customer will remove all their orders from the system
		this will alter any report numbers that reflect total sales
		deleting a customer is not recommended, deactivation is preferred
		*/
		
		//this deletes the customers record
		$this->db->where('id', $id);
		$this->db->delete('customers');
		
		// Delete Address records
		$this->db->where('customer_id', $id);
		$this->db->delete('customers_address_bank');
		
		//get all the orders the customer has made and delete the items from them
		$this->db->select('id');
		$result	= $this->db->get_where('orders', array('customer_id'=>$id));
		$result	= $result->result();
		foreach ($result as $order)
		{
			$this->db->where('order_id', $order->id);
			$this->db->delete('order_items');
		}
		
		//delete the orders after the items have already been deleted
		$this->db->where('customer_id', $id);
		$this->db->delete('orders');
	}
	
	function check_email($str, $id=false)
	{
		$this->db->select('email');
		$this->db->from('customers');
		$this->db->where('email', $str);
		if ($id)
		{
			$this->db->where('id !=', $id);
		}
		$count = $this->db->count_all_results();
		
		if ($count > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	/*
	these functions handle logging in and out
	*/
	function logout()
	{
		$this->session->unset_userdata('customer');
		$this->go_cart->destroy(false);
		//$this->session->sess_destroy();
	}
	
	function login($email, $password, $remember=false)
	{
		$this->db->limit(1);
		$this->db->where(array('active' => 1));
		$result = $this->db->get_where('customers', '(email = "'. $email .'" OR username = "'. $email .'") AND password = "'. sha1($password) .'" AND confirmed = 1');
		$customer	= $result->row_array();
		
		if ($customer)
		{
			
			// Retrieve customer addresses
			$this->db->where(array('customer_id'=>$customer['id'], 'id'=>$customer['default_billing_address']));
			$address = $this->db->get('customers_address_bank')->row_array();
			if($address)
			{
				$fields = unserialize($address['field_data']);
				$customer['bill_address'] = $fields;
				$customer['bill_address']['id'] = $address['id']; // save the addres id for future reference
			}
			
			$this->db->where(array('customer_id'=>$customer['id'], 'id'=>$customer['default_shipping_address']));
			$address = $this->db->get('customers_address_bank')->row_array();
			if($address)
			{
				$fields = unserialize($address['field_data']);
				$customer['ship_address'] = $fields;
				$customer['ship_address']['id'] = $address['id'];
			} else {
				 $customer['ship_to_bill_address'] = 'true';
			}
			
			
			// Set up any group discount 
			if($customer['group_id']!=0) 
			{
				$group = $this->get_group($customer['group_id']);
				if($group) // group might not exist
				{
					if($group->discount_type == "fixed")
					{
						$customer['group_discount_formula'] = "- ". $group->discount; 
					}
					else
					{
						$percent	= (100-(float)$group->discount)/100;
						$customer['group_discount_formula'] = '* ('.$percent.')';
					}
				}
			}
			
			if(!$remember)
			{
				$customer['expire'] = time()+$this->session_expire;
			}
			else
			{
				$customer['expire'] = false;
			}
			
			// put our customer in the cart
			$this->go_cart->save_customer($customer);

		
			return $customer['id'];
		}
		else
		{
			return false;
		}
	}
        
        function login_confirm($id,  $remember=false)
	{
		$this->db->limit(1);
		$result = $this->db->get_where('customers', 'id = "'. $id .'"');
		$customer	= $result->row_array();
		
		if ($customer)
		{
			
			// Retrieve customer addresses
			$this->db->where(array('customer_id'=>$customer['id'], 'id'=>$customer['default_billing_address']));
			$address = $this->db->get('customers_address_bank')->row_array();
			if($address)
			{
				$fields = unserialize($address['field_data']);
				$customer['bill_address'] = $fields;
				$customer['bill_address']['id'] = $address['id']; // save the addres id for future reference
			}
			
			$this->db->where(array('customer_id'=>$customer['id'], 'id'=>$customer['default_shipping_address']));
			$address = $this->db->get('customers_address_bank')->row_array();
			if($address)
			{
				$fields = unserialize($address['field_data']);
				$customer['ship_address'] = $fields;
				$customer['ship_address']['id'] = $address['id'];
			} else {
				 $customer['ship_to_bill_address'] = 'true';
			}
			
			
			// Set up any group discount 
			if($customer['group_id']!=0) 
			{
				$group = $this->get_group($customer['group_id']);
				if($group) // group might not exist
				{
					if($group->discount_type == "fixed")
					{
						$customer['group_discount_formula'] = "- ". $group->discount; 
					}
					else
					{
						$percent	= (100-(float)$group->discount)/100;
						$customer['group_discount_formula'] = '* ('.$percent.')';
					}
				}
			}
			
			if(!$remember)
			{
				$customer['expire'] = time()+$this->session_expire;
			}
			else
			{
				$customer['expire'] = false;
			}
			
			// put our customer in the cart
			$this->go_cart->save_customer($customer);

		
			return $customer['id'];
		}
		else
		{
			return false;
		}
	}
	
	function is_logged_in($redirect = false, $default_redirect = 'secure/login/')
	{
		
		//$redirect allows us to choose where a customer will get redirected to after they login
		//$default_redirect points is to the login page, if you do not want this, you can set it to false and then redirect wherever you wish.
		
		$customer = $this->go_cart->customer();
		if (!isset($customer['id']))
		{
			//this tells gocart where to go once logged in
			if ($redirect)
			{
				$this->session->set_flashdata('redirect', $redirect);
			}
			
			if ($default_redirect)
			{	
				redirect($default_redirect);
			}
			
			return false;
		}
		else
		{
		
			//check if the session is expired if not reset the timer
			if($customer['expire'] && $customer['expire'] < time())
			{

				$this->logout();
				if($redirect)
				{
					$this->session->set_flashdata('redirect', $redirect);
				}

				if($default_redirect)
				{
					redirect('secure/login');
				}

				return false;
			}
			else
			{

				//update the session expiration to last more time if they are not remembered
				if($customer['expire'])
				{
					$customer['expire'] = time()+$this->session_expire;
					$this->go_cart->save_customer($customer);
				}

			}

			return true;
		}
	}
	
	function reset_password($email)
	{
		$this->load->library('encrypt');
		$customer = $this->get_customer_by_email($email);
		if ($customer)
		{
			$this->load->helper('string');
			$this->load->library('email');
			
			$new_password		= random_string('alnum', 8);
			$customer['password']	= sha1($new_password);
			$this->save($customer);
			//
			// echo '<pre>';
			// print_r($this->config->['company_name']);
			// exit();
			$this->email->from($this->config->item('company_name'), $this->config->item('site_name'));
			$this->email->to($email);
			$this->email->subject($this->config->item('site_name').': Password Reset');
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
					<span style="font-size:30px;; border-bottom: 1px solid #666 dotted; border-bottom:1px dashed #2c3e50;"> WELLCOME to A3WORKOUT </span>
				</div>
				<span style="color:#ff0042">Dear '.$email.',<br />
					<br />
				</span>

				<div style="color:#2c3e50;"> Your password has been reset to <strong>'. $new_password .' </div>
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
			$this->email->set_mailtype("html");
			$this->email->send();
			
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function get_customer_by_email($email)
	{
		$result	= $this->db->get_where('customers', array('email'=>$email));
		return $result->row_array();
	}
	
	
	/// Customer groups functions
	
	function get_groups()
	{
		return $this->db->get('customer_groups')->result();		
	}
	
	function get_group($id)
	{
		return $this->db->where('id', $id)->get('customer_groups')->row();		
	}
	
	function delete_group($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('customer_groups');
	}
	
	function save_group($data)
	{
		if(!empty($data['id'])) 
		{
			$this->db->where('id', $data['id'])->update('customer_groups', $data);
			return $data['id'];
		} else {
			$this->db->insert('customer_groups', $data);
			return $this->db->insert_id();
		}
	}
}