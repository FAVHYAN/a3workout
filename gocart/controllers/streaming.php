<?php
class Streaming extends Front_Controller {
  
  function __construct()
  {
    parent::__construct();
    
    force_ssl();
    
    $this->load->model(array('location_model'));
    $this->load->helper(array('form', 'url'));
  }
  
  function index()
  {
    show_404();
  }
 
  function trainer($username='')
   {
      $data['username']   = $username;

      $this->load->view('stream_trainer', $data);
   }
 
  function student($username='')
   {
      $data['username']   = $username;

      $this->load->view('stream_student', $data);
   }

}