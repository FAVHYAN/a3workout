<?php

class Courses extends Admin_Controller {	
	
	private $use_inventory = false;
	
	function __construct()
	{		
		parent::__construct();
		remove_ssl();

		$this->auth->check_access('Admin', true);
		
		$this->load->model('course_model');
		$this->load->helper('form');
		$this->lang->load('course');
	}

	function index($order_by="name", $sort_order="ASC", $code=0, $page=0, $rows=15)
	{
		
		$data['page_title']	= lang('courses');
		
		$data['code']		= $code;
		$term				= false;
		$category_id		= false;
		
		//get the category list for the drop menu
		$data['categories']	= $this->course_model->get_categories_course();
		
		$post				= $this->input->post(null, false);
		$this->load->model('Search_model');
		if($post)
		{
			$term			= json_encode($post);
			$code			= $this->Search_model->record_term($term);
			$data['code']	= $code;
		}
		elseif ($code)
		{
			$term			= $this->Search_model->get_term($code);
		}
		
		//store the search term
		$data['term']		= $term;
		$data['order_by']	= $order_by;
		$data['sort_order']	= $sort_order;
		
		$data['courses']	= $this->course_model->courses(array('term'=>$term, 'order_by'=>$order_by, 'sort_order'=>$sort_order, 'rows'=>$rows, 'page'=>$page));

		//total number of courses
		$data['total']		= $this->course_model->courses(array('term'=>$term, 'order_by'=>$order_by, 'sort_order'=>$sort_order), true);

		
		$this->load->library('pagination');
		
		$config['base_url']			= site_url($this->config->item('admin_folder').'/courses/index/'.$order_by.'/'.$sort_order.'/'.$code.'/');
		$config['total_rows']		= $data['total'];
		$config['per_page']			= $rows;
		$config['uri_segment']		= 7;
		$config['first_link']		= 'First';
		$config['first_tag_open']	= '<li>';
		$config['first_tag_close']	= '</li>';
		$config['last_link']		= 'Last';
		$config['last_tag_open']	= '<li>';
		$config['last_tag_close']	= '</li>';

		$config['full_tag_open']	= '<div class="pagination"><ul>';
		$config['full_tag_close']	= '</ul></div>';
		$config['cur_tag_open']		= '<li class="active"><a href="#">';
		$config['cur_tag_close']	= '</a></li>';
		
		$config['num_tag_open']		= '<li>';
		$config['num_tag_close']	= '</li>';
		
		$config['prev_link']		= '&laquo;';
		$config['prev_tag_open']	= '<li>';
		$config['prev_tag_close']	= '</li>';

		$config['next_link']		= '&raquo;';
		$config['next_tag_open']	= '<li>';
		$config['next_tag_close']	= '</li>';
		
		$this->pagination->initialize($config);
		
		$this->load->view($this->config->item('admin_folder').'/courses', $data);
	}
	
	//basic category search
	function course_autocomplete()
	{
		$name	= trim($this->input->post('name'));
		$limit	= $this->input->post('limit');
		
		if(empty($name))
		{
			echo json_encode(array());
		}
		else
		{
			$results	= $this->course_model->course_autocomplete($name, $limit);
			
			$return		= array();
			
			foreach($results as $r)
			{
				$return[$r->id]	= $r->name;
			}
			echo json_encode($return);
		}
		
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
            $datos['description1'] = $this->input->post("date_schedule")." ".$this->input->post("starttime")." - ".$this->input->post("finishtime"); 
            
            $shedule_id1 = $this->db->insert("products",$datos);
            $shedule_id = $this->db->insert_id();
            if($shedule_id1){
                echo $shedule_id;
            }
        }
        
        function save_packages(){

        	
            
            $datos['id_course'] = $this->input->post("id_course");            
            $datos['name'] = "PACKAGE ".$this->input->post("time_package")." MONTHS";
            $datos['type_package'] = $this->input->post("time_package");       
            $datos['weekly_session'] = $this->input->post("weekly_session");      
            $datos['weekly_session'] = $this->input->post("weekly_session");       
            $datos['price_total'] = $this->input->post("total_price");       
            $datos['price'] = $this->input->post("price_per_month");       
            $datos['description1'] = $this->input->post("description1");             
            
            $package_id1 = $this->db->insert("products",$datos);
            $package_id = $this->db->insert_id();
            if($package_id1){
                echo $package_id;
            }
        }
        
        function delete_schedule_admin(){
            $id = $this->input->post("id_schedule");
            $schedule_delete = $this->db->delete('products', array('id' => $id)); 
            if($schedule_delete){
                echo $schedule_delete;
            }
        }
        
	function bulk_save()
	{
		$courses	= $this->input->post('course');
		
		if(!$courses)
		{
			$this->session->set_flashdata('error',  lang('error_bulk_no_courses'));
			redirect($this->config->item('admin_folder').'/courses');
		}
				
		foreach($courses as $id=>$course)
		{
			$course['id']	= $id;
			$this->course_model->save($course);
		}
		
		$this->session->set_flashdata('message', lang('message_bulk_update'));
		redirect($this->config->item('admin_folder').'/courses');
	}
	
	function form($id = false, $duplicate = false)
	{
		
		

        $this->course_id	= $id;

		$this->load->library('form_validation');
		$this->load->model(array('Option_model', 'Category_model', 'Digital_course_model'));
		$this->lang->load('digital_course');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$data['categories']		= $this->Category_model->get_categories_tierd();
		$data['course_list']    = $this->course_model->get_courses();
		$data['file_list']		= $this->Digital_course_model->get_list();
                
		$data['schedule']		= array();
        $data['package']		= array();

		$data['page_title']		= lang('course_form');

		//default values are empty if the course is new
		//classes
        $data['id']			= '';		
		$data['type']			= '';	
		$data['name']			= '';
		$data['date']			= '';
		$data['hour']			= '';
        $data['trainer']                = '';
		$data['description']		= '';
		$data['enabled']		= '';
                
		$data['course_categories']	= array();
		$data['images']			= array();
                
                //classes_shedule               
                /*
		$data['price']				= '';
		$data['saleprice']			= '';
		$data['quantity']			= '';
		$data['enabled']			= '';
		$data['related_courses']	= array();
		$data['course_files']		= array();
*/
		//create the photos array for later use
		$data['photos']		= array();

		
		 if($this->input->post('type') == 'Select'){
		 	redirect($this->config->item('admin_folder').'/courses');
		 }
    
		
          
		if ($id)
		{


                        $data['schedule']	= $this->course_model->get_schedule($id); 
                        $data['package']	= $this->course_model->get_package($id); 
			// get the existing file associations and create a format we can read from the form to set the checkboxes
			$pr_files 		= $this->Digital_course_model->get_associations_by_course($id);                        
			foreach($pr_files as $f)
			{
				$data['course_files'][]  = $f->file_id;
			}
                        
                        
			$course	= $this->course_model->get_course($id);


			
			//if the course does not exist, redirect them to the course list with an error
			if (!$course)
			{
				$this->session->set_flashdata('error', lang('error_not_found'));
				redirect($this->config->item('admin_folder').'/courses');
			}
			//set values to db values
			$data['id'] = $id;
			$data['type'] = $course->type;
			$data['name'] = $course->name;
			$data['trainer'] = $course->id_trainner;
			$data['description'] = $course->description;
			$data['enabled'] = $course->enabled;
                        /*
			$data['price']				= $course->price;
			$data['saleprice']			= $course->saleprice;
                        */
			//$data['enabled']			= $course->enabled;
			
			//make sure we haven't submitted the form yet before we pull in the images/related courses from the database
			

			if(!$this->input->post('submit'))
			{
				$data['courses']	= $course->categories;
				$data['course_categories']	= $course->categories;
				$data['images']			= (array)json_decode($course->images);
			}
		}
		
		//if $data['related_courses'] is not an array, make it one.
		
		//no error checking on these
		$this->form_validation->set_rules('caption', 'Caption');
		$this->form_validation->set_rules('primary_photo', 'Primary');

		$this->form_validation->set_rules('name', 'lang:name', 'trim|required|max_length[64]');
		$this->form_validation->set_rules('description', 'lang:description', 'trim');
		$this->form_validation->set_rules('enabled', 'lang:enabled', 'trim|numeric');
                
                /*
		$this->form_validation->set_rules('price', 'lang:price', 'trim|numeric|floatval');
		$this->form_validation->set_rules('saleprice', 'lang:saleprice', 'trim|numeric|floatval');
		$this->form_validation->set_rules('quantity', 'lang:quantity', 'trim|numeric');
                */
		/*
		if we've posted already, get the photo stuff and organize it
		if validation comes back negative, we feed this info back into the system
		if it comes back good, then we send it with the save item
		
		submit button has a value, so we can see when it's posted
		*/
		
		if($duplicate)
		{
			$data['id']	= false;
		}
		if($this->input->post('submit'))
		{
			//reset the course options that were submitted in the post
			
			$data['course_options']	= $this->input->post('option');
			$data['related_courses']	= $this->input->post('related_courses');
			$data['course_categories']	= $this->input->post('categories');
			$data['images']			= $this->input->post('images');
			$data['course_files']		= $this->input->post('downloads');
			
		}
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$this->load->view($this->config->item('admin_folder').'/course_form', $data);
		}
		else
		{
			


			$this->load->helper('text');
			
			//first check the slug field
			$slug = $this->input->post('slug');


			
			//if it's empty assign the name field
			if(empty($slug) || $slug=='')
			{
				$slug = $this->input->post('name');
			}
			
			$slug	= url_title(convert_accented_characters($slug), 'dash', TRUE);


			//validate the slug
			$this->load->model('Routes_model');

			

			if($id)
			{
				
				$slug		= $this->Routes_model->validate_slug($slug, $course->route_id);
				$route_id	= $course->route_id;
			}
			else
			{
				
				
				$slug	= $this->Routes_model->validate_slug($slug);
				
				$route['slug']	= $slug;	
				$route_id	= $this->Routes_model->save($route);
			}
			if($this->input->post('type') == 1){
				

				$save['data']				= null;

			}else{
				$save['data']	= $this->input->post('date').' '.$this->input->post('hour');
			}

			$save['id']				= $id;
			$save['name']				= $this->input->post('name');
			$save['type']				= $this->input->post('type');
			
			$save['id_trainner']			= $this->input->post('trainer');
			$save['description']                    = $this->input->post('description');
			$save['enabled']			= $this->input->post('enabled');
                        /*
			$save['price']				= $this->input->post('price');
			$save['saleprice']			= $this->input->post('saleprice');
                        
			$save['enabled']			= $this->input->post('enabled');
                        */
			$post_images				= $this->input->post('images');
			
			if($primary	= $this->input->post('primary_image'))
			{
				
				if($post_images)
				{
					foreach($post_images as $key => &$pi)
					{
						if($primary == $key)
						{
							$pi['primary']	= true;
							continue;
						}
					}	
				}
				
			}

			// echo '<pre>';
			// print_r($_POST['images']);
			// exit();

			if(empty($_POST['images'])){

				$save['images']				='{"a39446aba7708ca87524e52a2fd884d4":{"filename":"a39446aba7708ca87524e52a2fd884d4.png","alt":"","caption":""}}';

			}else{
				$save['images']				= json_encode($post_images);
			}
			
			
			
					
			//save categories
			$categories			= $this->input->post('categories');
			if(!$categories)
			{
				$categories	= array();
			}
			
			// format options
			$options	= array();
			if($this->input->post('option'))
			{
				foreach ($this->input->post('option') as $option)
				{
					$options[]	= $option;
				}

			}	
			
			// save course 
			$course_id	= $this->course_model->save($save, $options, $categories);
			
			// add file associations
			// clear existsing
			$this->Digital_course_model->disassociate(false, $course_id);
			// save new
			$downloads = $this->input->post('downloads');
			if(is_array($downloads))
			{
				foreach($downloads as $d)
				{
					$this->Digital_course_model->associate($d, $course_id);
				}
			}			

			//save the route
			$route['id']	= $route_id;
			$route['slug']	= $slug;
			$route['route']	= 'cart/course/'.$course_id;
			
			$this->Routes_model->save($route);
			
			$this->session->set_flashdata('message', lang('message_saved_course'));

			//go back to the course list
			redirect($this->config->item('admin_folder').'/courses');
		}



		
		
	}
	
	function course_image_form()
	{
		$data['file_name'] = false;
		$data['error']	= false;
		$this->load->view($this->config->item('admin_folder').'/iframe/courses_image_uploader', $data);
	}
	
	function course_image_upload()
	{
		$data['file_name'] = false;
		$data['error']	= false;
		
		$config['allowed_types'] = 'gif|jpg|png';
		//$config['max_size']	= $this->config->item('size_limit');
		$config['upload_path'] = 'uploads/images/full';
		$config['encrypt_name'] = true;
		$config['remove_spaces'] = true;

		$this->load->library('upload', $config);
		
		if ( $this->upload->do_upload())
		{
			$upload_data	= $this->upload->data();
			
			$this->load->library('image_lib');
			/*
			
			I find that ImageMagick is more efficient that GD2 but not everyone has it
			if your server has ImageMagick then you can change out the line
			
			$config['image_library'] = 'gd2';
			
			with
			
			$config['library_path']		= '/usr/bin/convert'; //make sure you use the correct path to ImageMagic
			$config['image_library']	= 'ImageMagick';
			*/			
			
			//this is the larger image
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/images/full/'.$upload_data['file_name'];
			$config['new_image']	= 'uploads/images/medium/'.$upload_data['file_name'];
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 600;
			$config['height'] = 500;
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();

			//small image
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/images/medium/'.$upload_data['file_name'];
			$config['new_image']	= 'uploads/images/small/'.$upload_data['file_name'];
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 235;
			$config['height'] = 235;
			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			$this->image_lib->clear();

			//cropped thumbnail
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/images/small/'.$upload_data['file_name'];
			$config['new_image']	= 'uploads/images/thumbnails/'.$upload_data['file_name'];
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 150;
			$config['height'] = 150;
			$this->image_lib->initialize($config); 	
			$this->image_lib->resize();	
			$this->image_lib->clear();

			$data['file_name']	= $upload_data['file_name'];
		}
		
		if($this->upload->display_errors() != '')
		{
			$data['error'] = $this->upload->display_errors();
		}
		$this->load->view($this->config->item('admin_folder').'/iframe/courses_image_uploader', $data);
	}
	
	function delete($id = false)
	{
		if ($id)
		{	
			$course	= $this->course_model->get_course($id);
			//if the course does not exist, redirect them to the customer list with an error
			if (!$course)
			{
				$this->session->set_flashdata('error', lang('error_not_found'));
				redirect($this->config->item('admin_folder').'/courses');
			}
			else
			{

				// remove the slug
				$this->load->model('Routes_model');
				$this->Routes_model->remove('('.$course->slug.')');

				//if the course is legit, delete them
				$this->course_model->delete_course($id);

				$this->session->set_flashdata('message', lang('message_deleted_course'));
				redirect($this->config->item('admin_folder').'/courses');
			}
		}
		else
		{
			//if they do not provide an id send them to the course list page with an error
			$this->session->set_flashdata('error', lang('error_not_found'));
			redirect($this->config->item('admin_folder').'/courses');
		}
	}
}
