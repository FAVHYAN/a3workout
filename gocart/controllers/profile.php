<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('Customer_model');
    }

	public function save($id=false){
		
		$data 	= array();
		
		if ($_FILES['upload_profile']['name']) {
			$config['upload_path']		= 'assets/images/uploads/';
			$config['allowed_types']	= 'gif|jpg|png';
			$config['file_name']		= base64_encode(date("Ymdhis").rand(0,10));

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('upload_profile'))
			{

				$data_photo	= $this->upload->data();

			}
			else
			{
				$data_front	= $this->upload->data();
			}
		}
		
		if ($_FILES['upload_front']['name']) {
			$config['upload_path']		= 'assets/images/uploads/';
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
				print_r($this->upload->display_errors());
				exit;
			}
		}

		if (isset($data_photo['file_name'])) {
			$data_save['photo']			= $data_photo['file_name'];
		}
		if (isset($data_front['file_name'])) {
			$data_save['front']			= $data_front['file_name'];
		}
		
		$this->load->library('form_validation');
		
        $this->form_validation->set_rules('quote', 'Quote Inspirational', 'max_length[150]');
        $this->form_validation->set_rules('bio', 'Biography', 'max_length[600]');
        $this->form_validation->set_rules('username', 'User Name', 'required|alpha_dash|max_length[45]');
        $this->form_validation->set_rules('firstname', 'First Name', 'max_length[45]');
        $this->form_validation->set_rules('lastname', 'Last Name', 'max_length[45]');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('zip', 'Zip Code', 'max_length[20]');
        $this->form_validation->set_rules('address', 'Address', 'max_length[150]');
        $this->form_validation->set_rules('experiences', 'Experiences', 'max_length[600]');
        $this->form_validation->set_rules('education', 'Education', 'max_length[600]');
        $this->form_validation->set_rules('password', 'Password', 'min_length[6]|matches[confirm_password]|md5|max_length[45]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'md5|max_length[45]');

        if ($this->form_validation->run() == FALSE)
        {
        	$this->load->view("profile", $data);
        }
        else
        {
			$data_save['id']			= $id;
			$data_save['quote']			= $this->input->post('quote');
			$data_save['bio']			= $this->input->post('bio');
			//$data_save['email']		= $this->input->post('email');
			$data_save['username']		= $this->input->post('username');
			$data_save['firstname']		= $this->input->post('firstname');
			$data_save['lastname']		= $this->input->post('lastname');
			$data_save['birthday']		= $this->input->post('birthday');
			$data_save['zip']			= $this->input->post('zip');
			$data_save['cell_phone']	= $this->input->post('cellphone');
			$data_save['address']		= $this->input->post('address');
			$data_save['experiences']	= $this->input->post('experiences');
			$data_save['education']		= $this->input->post('education');
			$data_save['gender']		= $this->input->post('gender');

			if($pass_validation = $this->Customer_model->get_user(array("password" => md5($this->input->post('old_password'))))){
				if(isset($pass_validation[0]->id)){
					$data_save['password']		= $this->input->post('password');
				}
			}

			if($this->Customer_model->save($data_save)){
				$this->session->set_flashdata('message_info', 'Saved!');
				
				//redirect('profile');
			}else show_404('pagina');
        }

		//redirect('profile');
	}

}