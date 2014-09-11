<?php
Class Course_model extends CI_Model
{
		
	// we will store the group discount formula here
	// and apply it to course prices as they are fetched 
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

	
	function course_autocomplete($name, $limit)
	{
		return	$this->db->like('name', $name)->get('courses', $limit)->result();
	}
        
        function get_schedule($id)
	{
		
		return	$this->db->where('id_course', $id)->get('products')->result();
	}
        
        
	function get_package($id)
	{
		return	$this->db->where('id_course', $id)->get('products')->result();
	}
	function get_course_trainer($where = array()){
		$this->db->where(array(
				'enabled'	=> 1
		));
		$this->db->where($where);
		$result	= $this->db->get('courses');
		
		return $result->result();
	}
	
	function courses($data=array(), $return_count=false)
	{
		if(empty($data))
		{
			//if nothing is provided return the whole shabang
			$this->get_all_courses();
		}
		else
		{
			//grab the limit
			if(!empty($data['rows']))
			{
				$this->db->limit($data['rows']);
			}
			
			//grab the offset
			if(!empty($data['page']))
			{
				$this->db->offset($data['page']);
			}
			
			//do we order by something other than category_id?
			if(!empty($data['order_by']))
			{
				//if we have an order_by then we must have a direction otherwise KABOOM
				$this->db->order_by($data['order_by'], $data['sort_order']);
			}
			
			//do we have a search submitted?
			if(!empty($data['term']))
			{
				$search	= json_decode($data['term']);
				//if we are searching dig through some basic fields
				if(!empty($search->term))
				{
					$this->db->like('name', $search->term);
					$this->db->or_like('description', $search->term);
					$this->db->or_like('excerpt', $search->term);
					$this->db->or_like('sku', $search->term);
				}
				
				if(!empty($search->category_id))
				{
					//lets do some joins to get the proper category courses
					$this->db->join('category_courses', 'category_courses.course_id=courses.id', 'right');
					$this->db->where('category_courses.category_id', $search->category_id);
					$this->db->order_by('sequence', 'ASC');
				}
			}
			
			if($return_count)
			{
				return $this->db->count_all_results('courses');
			}
			else
			{
				return $this->db->get('courses')->result();
			}
			
		}
	}
	
	function get_all_courses()
	{
		//sort by alphabetically by default
		$this->db->order_by('id_course', 'ASC');
		$result	= $this->db->get('courses');
		//apply group discount
		$return = $result->result();
		if($this->group_discount_formula) 
		{
			foreach($return as &$course) {
				eval('$course->price=$course->price'.$this->group_discount_formula.';');
			}
		}
		return $return;
	}
	
	function get_courses($category_id = false, $limit = false, $offset = false, $by=false, $sort=false)
	{
		//if we are provided a category_id, then get courses according to category
		if ($category_id)
		{
			$this->db->select('category_courses.*, LEAST(IFNULL(NULLIF(saleprice, 0), price), price) as sort_price', false)->from('category_courses')->join('courses', 'category_courses.course_id=courses.id')->where(array('category_id'=>$category_id, 'enabled'=>1));
			$this->db->order_by($by, $sort);
			
			$result	= $this->db->limit($limit)->offset($offset)->get()->result();

			$contents	= array();
			$count		= 0;
			foreach ($result as $course)
			{

				$contents[$count]	= $this->get_course($course->course_id);
				$count++;
			}

			return $contents;
		}
		else
		{
			//sort by alphabetically by default
			$this->db->order_by('name', 'ASC');
			$result	= $this->db->get('courses');
			//apply group discount
			$return = $result->result();
			if($this->group_discount_formula) 
			{
				foreach($return as &$course) {
					eval('$course->price=$course->price'.$this->group_discount_formula.';');
				}
			}
			return $return;
		}
	}
	
	function count_all_courses()
	{
		return $this->db->count_all_results('courses');
	}
	
	function count_courses($id)
	{
		return $this->db->select('course_id')->from('category_courses')->join('courses', 'category_courses.course_id=courses.id')->where(array('category_id'=>$id, 'enabled'=>1))->count_all_results();
	}

	function get_course($id, $related=true)
	{
		$result	= $this->db->get_where('courses', array('id'=>$id))->row();
		if(!$result)
		{
			return false;
		}

		$result->related_courses	= array();
		
		$result->categories		= $this->get_course_categories($result->id);
	
		// group discount?
		if($this->group_discount_formula) 
		{
			eval('$result->price=$result->price'.$this->group_discount_formula.';');
		}

		return $result;
	}

	function get_course_categories($id)
	{
		return $this->db->where('course_id', $id)->join('categories', 'category_id = categories.id')->get('category_courses')->result();
	}

	function get_slug($id)
	{
		return $this->db->get_where('courses', array('id'=>$id))->row()->slug;
	}

	function check_slug($str, $id=false)
	{
		$this->db->select('slug');
		$this->db->from('courses');
		$this->db->where('slug', $str);
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

	function save($course=array(), $options=false, $categories=false)
	{
			


		if ($course['id'])
		{
			$this->db->where('id', $course['id']);
			$this->db->update('courses', $course);

			$id	= $course['id'];

			
		}
		else
		{

			


			$this->db->insert('courses', $course);
			$id	= $this->db->insert_id();

		

			  $query = $this->db->query("SELECT * from products where products.sku != 'membership' ORDER BY products.id asc");

                                                foreach ($query->result_array() as $key) {

                                              	

                                                	$array = array($key['weekly_session']);
                                                	$array1 = array($key['price_total']);
                                                	$array2 = array($key['name']);
                                                	$array3 = array($key['description1']);
                                                	$array4 = array($key['type_package']);

													$string =  implode($array);
													$string1 =  implode($array1);
													$string2 =  implode($array2);
													$string3 =  implode($array3);
													$string4 =  implode($array4);


                                 
			$sql = $this->db->query("INSERT INTO products (id_course,	type_package,	weekly_session,	price_total,name,	route_id,	description1,	price,	saleprice,	free_shipping,	shippable,	taxable,	fixed_quantity,	weight,	track_stock,	quantity,	enabled,	type) VALUES ('".$id."','".$string4."','".$string."','".$string1."','".$string2."','0','".$string3."','".$string1.".00','0.00','0','1','1','0','0','0','".$string."','1','0')");

			   

				 }
				 


		}

		//loop through the course options and add them to the db
		if($options !== false)
		{
			$obj =& get_instance();
			$obj->load->model('Option_model');

			// wipe the slate
			$obj->Option_model->clear_options($id);

			// save edited values
			$count = 1;
			foreach ($options as $option)
			{
				$values = $option['values'];
				unset($option['values']);
				$option['course_id'] = $id;
				$option['sequence'] = $count;

				$obj->Option_model->save_option($option, $values);
				$count++;
			}
		}
		
		if($categories !== false)
		{
			if($course['id'])
			{
				//get all the categories that the course is in
				$cats	= $this->get_course_categories($id);
				
				//generate cat_id array
				$ids	= array();
				foreach($cats as $c)
				{
					$ids[]	= $c->id;
				}

				//eliminate categories that courses are no longer in
				foreach($ids as $c)
				{
					if(!in_array($c, $categories))
					{
						$this->db->delete('category_courses', array('course_id'=>$id,'category_id'=>$c));
					}
				}
				
				//add courses to new categories
				foreach($categories as $c)
				{
					if(!in_array($c, $ids))
					{
						$this->db->insert('category_courses', array('course_id'=>$id,'category_id'=>$c));
					}
				}
			}
			else
			{
				//new course add them all
				foreach($categories as $c)
				{
					$this->db->insert('category_courses', array('course_id'=>$id,'category_id'=>$c));
				}
			}
		}
		
		//return the course id
		return $id;
	}
	
	function delete_course($id)
	{
		// delete course 
		$this->db->where('id', $id);
		$this->db->delete('courses');

		$this->db->where('id_course', $id);
		$this->db->delete('scheduler_events');

//		//delete references in the course to category table
//		$this->db->where('course_id', $id);
//		$this->db->delete('category_courses');
//		
//		// delete coupon reference
//		$this->db->where('course_id', $id);
//		$this->db->delete('coupons_courses');

	}

	function add_course_to_category($course_id, $optionlist_id, $sequence)
	{
		$this->db->insert('course_categories', array('course_id'=>$course_id, 'category_id'=>$category_id, 'sequence'=>$sequence));
	}

	function search_courses($term, $limit=false, $offset=false, $by=false, $sort=false)
	{
		$results		= array();
		
		$this->db->select('*, LEAST(IFNULL(NULLIF(saleprice, 0), price), price) as sort_price', false);
		//this one counts the total number for our pagination
		$this->db->where('enabled', 1);
		$this->db->where('(name LIKE "%'.$term.'%" OR description LIKE "%'.$term.'%" OR excerpt LIKE "%'.$term.'%" OR sku LIKE "%'.$term.'%")');
		$results['count']	= $this->db->count_all_results('courses');


		$this->db->select('*, LEAST(IFNULL(NULLIF(saleprice, 0), price), price) as sort_price', false);
		//this one gets just the ones we need.
		$this->db->where('enabled', 1);
		$this->db->where('(name LIKE "%'.$term.'%" OR description LIKE "%'.$term.'%" OR excerpt LIKE "%'.$term.'%" OR sku LIKE "%'.$term.'%")');
		
		if($by && $sort)
		{
			$this->db->order_by($by, $sort);
		}
		
		$results['courses']	= $this->db->get('courses', $limit, $offset)->result();
		
		return $results;
	}

	// Build a cart-ready course array
	function get_cart_ready_course($id, $quantity=false)
	{
		$course	= $this->db->get_where('courses', array('id'=>$id))->row();
		
		//unset some of the additional fields we don't need to keep
		if(!$course)
		{
			return false;
		}
		
		$course->base_price	= $course->price;
		
		if ($course->saleprice != 0.00)
		{ 
			$course->price	= $course->saleprice;
		}
		
		
		// Some courses have n/a quantity, such as downloadables
		//overwrite quantity of the course with quantity requested
		if (!$quantity || $quantity <= 0 || $course->fixed_quantity==1)
		{
			$course->quantity = 1;
		}
		else
		{
			$course->quantity = $quantity;
		}
		
		
		// attach list of associated downloadables
		$course->file_list	= $this->Digital_course_model->get_associations_by_course($id);
		
		return (array)$course;
	}
        
        function get_categories_course($parent=0){
		$categories	= array();
		$result	= $this->get_categories_courses($parent);
		foreach ($result as $category)
		{
			$categories[$category->id]['category']	= $category;
			$categories[$category->id]['children']	= $this->get_categories_course($category->id);
		}
		return $categories;
        }
        
        function get_categories_courses($parent = false)
	{
		if ($parent !== false)
		{
			$this->db->where('parent_id', $parent);
		}
                $this->db->where('type', 1);
		$this->db->select('id');
		$this->db->order_by('categories.sequence', 'ASC');
		
		//this will alphabetize them if there is no sequence
		$this->db->order_by('name', 'ASC');
		$result	= $this->db->get('categories');
		
		$categories	= array();
		foreach($result->result() as $cat)
		{
			$categories[]	= $this->get_category_course($cat->id);
		}
		
		return $categories;
	}        
        
	function get_category_course($id)
	{
		return $this->db->get_where('categories', array('id'=>$id))->row();
	}
        
        function get_courses_row1($filter = ""){
                return $this->db->query("SELECT course_type.id as id_group,course_type.name as groupname,courses.*,customers.id,customers.firstname,customers.lastname,customers.username, courses.id AS id_course
                                        FROM courses
                                        INNER JOIN customers ON customers.id = courses.id_trainner
                                        INNER JOIN course_type on course_type.id = courses.`type`
                                        WHERE courses.enabled = 1");    

                                         
        } 

         function get_courses_row3($filter = ""){
                return $this->db->query("SELECT course_type.id as id_group,course_type.name as groupname,courses.*,customers.id,customers.firstname,customers.lastname,customers.username, courses.id AS id_course
                                        FROM courses
                                        INNER JOIN customers ON customers.id = courses.id_trainner
                                        INNER JOIN course_type on course_type.id = courses.`type`
                                        WHERE courses.enabled = 1 group by groupname");    

                                         
        } 

	function get_courses_filter($id){

		

			
				$query = $this->db->query("SELECT courses.*,customers.id,customers.firstname,customers.lastname,                                       
                                        customers.username, courses.id AS id_course
                                        FROM courses
                                        INNER JOIN customers ON customers.id = courses.id_trainner
                                        WHERE courses.id = ".$id."");
				if($id)
				    {
				        return $query;
				    }
				    
            echo json_encode($query);
				
				   return $query->result();
				}
			


        function get_courses_row2($filter = ""){
                return $this->db->query("SELECT courses.*,customers.id,customers.firstname,customers.lastname,                                       
                                        customers.username, courses.id AS id_course
                                        FROM courses
                                        INNER JOIN customers ON customers.id = courses.id_trainner
                                        WHERE courses.enabled = '1'");     
        } 
        

        
		
		 function get_courses_danilo($filter = ""){
                return $this->db->query("SELECT * FROM courses WHERE courses.enabled = 1");     
        } 
        
		
		
        function get_course_by_id($id){

            return $this->db->query("SELECT courses.*, customers.id, customers.front
                                     FROM courses 
                                     INNER JOIN customers ON customers.id=courses.id_trainner
                                     WHERE courses.id=".$id);
        }

        function student_classes($id_customer=false){
                 return $this->db->query("SELECT * FROM student_courses stc 
                                          INNER JOIN products ON  products.id=stc.id_course_schedule 
                                          INNER JOIN courses ON courses.id=products.id_course 
                                          INNER JOIN customers ON customers.id = courses.id_trainner
                                          WHERE stc.id_customer = $id_customer")->result();
        }
  
        function student_packages($id_customer=false){
           return $this->db->query("SELECT *, c.name as courseName FROM student_packages stp 
									INNER JOIN scheduler_events se ON se.id_student = stp.id_customer
									INNER JOIN products p ON p.id = stp.id_package
									INNER JOIN courses c ON c.id = se.id_course
									WHERE stp.id_customer = $id_customer and p.name <>'Membership' GROUP BY courseName order by courseName ASC")->result();
        }
         function student_packages1($id_customer=false){
           return $this->db->query("SELECT * from student_packages sp inner join products p on p.id = sp.id_package where sp.id_customer =  '".$id_customer."' order by sp.id DESC LIMIT 1")->result();
        }

        function save_student_course(){
                      $this->db->insert('courses', $course);
          }
  
                                    /*return $this->db->query("SELECT courses.*, products.date, products.start_time,products.finish_time,
                                     products.id as id_product, products.id_course, customers.id, customers.front, 
                                     products.saleprice,products.price, products.quantity,
                                     DATE_FORMAT(products.date,'%M %d, %Y') AS date_format_tag,
                                     DATE_FORMAT(products.date,'%W, %b %d, %Y,') AS date_format,
                                     TIME_FORMAT(products.start_time, '%H:%i') AS starttime_format,
                                     TIME_FORMAT(products.finish_time, '%H:%i') AS finishtime_format
                                     FROM courses 
                                     INNER JOIN courses ON  courses.id  = products.id_course
                                     INNER JOIN customers ON customers.id=courses.id_trainner
                                     WHERE products.id=".$id);*/

}