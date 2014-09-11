<?php

class Course extends Front_Controller {
	
	function __construct()
	{
		parent::__construct();

        $this->load->model('Category_model');
        $this->load->model('Course_model');
        $this->load->model('Product_model');
        $this->load->model('Option_model');
	}

	function index()
	{
            show_404();
	}

        function all(){
            
            $data['courses_row1'] = $this->Course_model->get_courses_row1();
            $data['courses_row2'] = $this->Course_model->get_courses_row3();
			$data['busqueda'] = $this->Course_model->get_courses_filter(true);	
            $data['categories']	=	$this->Category_model->get_category_shop(1);
            $this->load->view('course', $data);
        }
        
        function process(){ 
            

            $id = $this->input->post("valor"); 
            //$search['busqueda'] = $this->Course_model->get_courses_filter($id);
            $query1 = $this->db->query("SELECT *,cu.id_trainner as id_trainer,cu.id as id_course, cu.`type` as tipo from courses cu inner join customers c on c.id = cu.id_trainner where cu.id = '".$id."'");
             
            $search = $query1->result();

            //$this->load->view('course', $search);

            echo json_encode($search);
             }



        
        function processCategories(){ 
            

            $id = $this->input->post("valor"); 
            //$search['busqueda'] = $this->Course_model->get_courses_filter($id);
            $query1 = $this->db->query("SELECT *,cu.id_trainner as id_trainer,cu.id as id_course, cu.`type` as tipo from categories ca inner join category_courses cc on cc.category_id = ca.id inner join courses cu on cu.id = cc.course_id  inner join customers t on t.id = cu.id_trainner where ca.id = '".$id."'");

            
            $search = $query1->result();


            //$this->load->view('course', $search);

            echo json_encode($search);
             }

           function processTrainers(){ 
            

            $id = $this->input->post("valor"); 
            //$search['busqueda'] = $this->Course_model->get_courses_filter($id);
            $query1 = $this->db->query("SELECT *, customers.id  as id_trainer,courses.id as id_course, courses.`type` as tipo from customers inner join courses on courses.id_trainner = customers.id where customers.id = '".$id."'");



            
            $search = $query1->result();


            //$this->load->view('course', $search);

            echo json_encode($search);
             }


        function processGroup(){ 
            

            $id = $this->input->post("valor"); 
            //$search['busqueda'] = $this->Course_model->get_courses_filter($id);
            $query1 = $this->db->query("SELECT *,courses.name as nombre_obj, courses.id as id_course,courses.`type` as tipo from courses inner join course_type on course_type.id = courses.`type` inner join customers on customers.id = courses.id_trainner where course_type.id = '".$id."'");


             
            $search = $query1->result();

            //$this->load->view('course', $search);

            echo json_encode($search);
             }

               function process_description(){ 
            

            $id = $this->input->post("valor"); 
            //$search['busqueda'] = $this->Course_model->get_courses_filter($id);
            $query1 = $this->db->query("SELECT *,cu.id_trainner as id_trainer,cu.id as id_course, cu.`type`, c.firstname, c.lastname,c.photo as photoTrainer from courses cu inner join customers c on c.id = cu.id_trainner where cu.id = '".$id."'");
             
            $search = $query1->result();

            //$this->load->view('course', $search);

            echo json_encode($search);
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
        
        function check_courses_shop(){            
            $id = $this->input->post('id_product');
            $data['course'] = $this->Course_model->get_course_by_id($id);
            $data['packages'] = $this->db->where('id_course', $id)->order_by('id', 'ASC')->get('products');
            $data['id_product'] = $id;
            $this->load->view('check_courses_shop', $data);
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
         function charge_student_class(){
            $id_student = $this->input->post("id_student");
            $id_trainer2 = $this->input->post("id_trainer");
            $horario = $this->input->post("horario");
            
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

            list($mes, $dia, $ano1) = explode('-', $date);
            list($ano,$hour) = explode(' ', $ano1);

             $date = $ano.'-'.$mes.'-'.$dia.' '.$hour;

         
           

            
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
                $datos['id_course'] = $id_course;
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
                }if(!empty($_POST['banderin'])){
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



}