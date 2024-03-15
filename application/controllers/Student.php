<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

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


	function index()
	{
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
		if ($this->form_validation->run() == FALSE) {
			$data['pageTitle'] = "Student Login";
			$data['action'] = 'student';

			$this->login_template->show('student/Login', $data);
		} else {
			$mobile = $this->input->post('mobile');
			redirect('student/dashboard', 'refresh');
		}
	}

	function check_database($password)
	{
		//Field validation succeeded.  Validate against database
		$mobile = $this->input->post('mobile');

		//query the database
		$result = $this->admin_model->studentlogin($mobile, md5($password));
		if ($result) {
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'id' => $row->id,
					'student_name' => $row->student_name,
					'adm_no' => $row->adm_no
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		} else {
			$this->form_validation->set_message('check_database', 'Invalid Mobile or password');
			return false;
		}
	}

	function dashboard()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['student_name'] = $session_data['student_name'];
			$data['pageTitle'] = "Dashboard";
			$data['activeMenu'] = "dashboard";
			$this->student_template->show('student/Dashboard', $data);
		} else {
			redirect('admin', 'refresh');
		}
	}
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('student', 'refresh');
	}
}
