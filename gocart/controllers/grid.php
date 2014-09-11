<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	dhtmlxGrid, without Model
*/

require_once("./dhtmlx/connector/grid_connector.php");
require_once("./dhtmlx/connector/db_phpci.php");
DataProcessor::$action_param ="dhx_editor_status";

class Grid extends CI_Controller {
	public function beforeRender($action){
		//formatting data before output
		$date = date("Y/m/d", strtotime($action->get_value("start_date")));
		$action->set_value("start_date", $date);
	}
	public function beforeUpdate($action){
		//validation before saving
		if ($action->get_value("event_name") == ""){
			$action->invalid();
			$action->set_response_attribute("details", "Empty data not allowed");
		}
	}
	public function index()
	{
		//grid's view
		$this->load->view('grid');
	}
	public function data()
	{
		//data feed
		$this->load->database();

		$connector = new GridConnector($this->db, "phpCI");
		$connector->configure("events", "event_id", "start_date, end_date, event_name");
		$connector->event->attach($this);
		$connector->render();
	}
}