<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	dhtmlxGrid, with Model
*/
require_once("./dhtmlx/connector/grid_connector.php");
require_once("./dhtmlx/connector/db_phpci.php");
DataProcessor::$action_param ="dhx_editor_status";

class GridModel extends CI_Controller {
	public function index()
	{
		//grid's view
		$this->load->view('grid'); 
	}
	public function data()
	{
		//data feed
		$this->load->database();
		$this->load->model("event_model");


		$connector = new GridConnector($this->db, "PHPCI");
		$connector->configure("events", "event_id", "start_date, end_date, event_name");
		$connector->useModel($this->event_model);
		$connector->render();
	}
}