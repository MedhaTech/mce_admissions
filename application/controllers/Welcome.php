<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->CI = &get_instance();
		$this->load->model('admin_model', '', TRUE);
		$this->load->library(array('table', 'form_validation'));
		$this->load->helper(array('form', 'form_helper'));
		date_default_timezone_set('Asia/Kolkata');
		ini_set('upload_max_filesize', '20M');
	}
	 
	public function index()
	{

		    $data['pageTitle'] = "B.Tech Admissions Open 2024-25 | Malnad College of Engineering";
			$data['activeMenu'] = "home";
			$data['course_options'] = array(" " => "Select Branch") + $this->courses();
			$data['states'] = array(" " => "Select State") + $this->globals->states();
			$this->welcome_template->show('home', $data);

	}

	function courses()
	{
		
			$details = $this->admin_model->getDetails('departments', '')->result();
 
			$result = array();
			foreach ($details as $details1) {
				$row = $this->admin_model->get_stream_by_id($details1->stream_id);
				$result[$details1->department_id] = $row['stream_short_name'] . ' - ' . $details1->department_name;
			}

		 return $result;

	}
}