<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	dhtmlxScheduler, without Model
*/

require_once("./dhtmlx/connector/scheduler_connector.php");
require_once("./dhtmlx/connector/db_phpci.php");
DataProcessor::$action_param ="dhx_editor_status";


class Scheduler_trainer extends CI_Controller {
	public function beforeRender($action){
		//formatting data before output
		if ($action->get_id() == 10) 
			$action->set_userdata("color", "pink"); //mark event
	}
	public function beforeProcessing($action){
		//validation before saving
		if ($action->get_value("event_name") == ""){
			$action->invalid();
			$action->set_response_attribute("details", "Empty data not allowed");
		}
	}
	public function index()
	{
		//grid's view
                if(isset($_GET['id'])){
                  $id_customer =   $_GET['id'];
                }
                $data['id_customer'] = $id_customer;
		$this->load->view('scheduler_trainer', $data);
	}
	public function data()
	{
		//data feed
            
            $this->load->database();
            $connector = new SchedulerConnector($this->db, "PHPCI");
            //$connector->filter ("item_nm = 'miembro'");
            $connector->configure("events", "event_id", "start_date, end_date, event_name, id_trainer");
            $connector->render();
	}
        public function insert_id_trainer(){
           $id_trainer = $this->input->post("id_trainer");   
           $id_event = $this->input->post("id_event");
           $this->db->where('event_id', $id_event);
           $this->db->update('events', array("id_trainer"=>$id_trainer)); 
           echo "ok";
        }
}