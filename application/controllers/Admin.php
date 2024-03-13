<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

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
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
		if ($this->form_validation->run() == FALSE) {
			$data['pageTitle'] = "Admin Login";
			$data['action'] = 'admin';

			$this->login_template->show('admin/Login', $data);
		} else {
			$username = $this->input->post('username');
			redirect('admin/dashboard', 'refresh');
		}
	}

	function check_database($password)
	{
		//Field validation succeeded.  Validate against database
		$username = $this->input->post('username');

		//query the database
		$result = $this->admin_model->login($username, md5($password));
		if ($result) {
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'id' => $row->user_id,
					'username' => $row->username,
					'role' => $row->role
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		} else {
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
		}
	}

	function dashboard()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['pageTitle'] = "Dashboard";
			$data['activeMenu'] = "dashboard";
			$this->admin_template->show('admin/Dashboard', $data);
		} else {
			redirect('admin', 'refresh');
		}
	}


	public function enquiries()
	{
		if ($this->session->userdata('logged_in')) {
			$sess = $this->session->userdata('logged_in');
			$data['id'] = $sess['id'];
			$data['username'] = $sess['username'];
			$data['role'] = $sess['role'];
			$data['page_title'] = 'Enquiries List';
			$data['menu'] = 'enquiries';
			$data['enquiryStatus'] = $this->globals->enquiryStatus();
			$data['enquiryStatusColor'] = $this->globals->enquiryStatusColor();
			$data['currentAcademicYear'] = $this->globals->currentAcademicYear();
			$data['enquiries'] = $this->admin_model->getEnquiries($data['currentAcademicYear'])->result();
			$this->admin_template->show('admin/enquiries', $data);
		} else {
			redirect('admin/timeout');
		}
	}
	function newEnquiry()
	{
		if ($this->session->userdata('logged_in')) {
			$sess = $this->session->userdata('logged_in');
			$data['id'] = $sess['id'];
			$data['username'] = $sess['username'];
			$data['role'] = $sess['role'];

			$data['page_title'] = 'New Enquiry';
			$data['menu'] = 'newEnquiry';
			$data['userTypes'] = $this->globals->userTypes();
			$data['academicYear'] = $this->globals->academicYear();

			$data['course_options'] = array(" " => "Select") + $this->globals->courses();

			$this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
			$this->form_validation->set_rules('student_name', 'Applicant Name', 'required');
			
			$this->form_validation->set_rules('mobile', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]|is_unique[enquiries.mobile]');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
			$this->form_validation->set_rules('course', 'Course', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');
			$this->form_validation->set_rules('city', 'City', 'required');
			$this->form_validation->set_rules('register_grade', '10+2 Percentage / Grade', 'required');
			$this->form_validation->set_rules('exam_board', 'Exam Board', 'required');
			$this->form_validation->set_rules('register_number', 'Register Number', 'required');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'admin/newEnquiry';
				$data['academic_year'] = $this->input->post('academic_year');
				$data['student_name'] = $this->input->post('student_name');
				
				$data['mobile'] = $this->input->post('mobile');
				$data['email'] = $this->input->post('email');
				$data['course'] = $this->input->post('course');
				$data['state'] = $this->input->post('state');
				$data['city'] = $this->input->post('city');
				$data['register_grade'] = $this->input->post('register_grade');
				$data['exam_board'] = $this->input->post('exam_board');
				$data['register_number'] = $this->input->post('register_number');

				$this->admin_template->show('admin/new_enquiry', $data);
			} else {
				$course_id = $this->input->post('course');
				$course = $data['course_options'][$course_id];

			
				$insertDetails = array(
					'academic_year' => $this->input->post('academic_year'),
					'student_name' => strtoupper($this->input->post('student_name')),
					'register_grade' => $this->input->post('register_grade'),
					'mobile' => $this->input->post('mobile'),
					'email' => strtolower($this->input->post('email')),
					'course_id' => $this->input->post('course'),
					'course' => $course,
					'state' => $this->input->post('state'),
					'city' => $this->input->post('city'),
					
					'exam_board' => strtoupper($this->input->post('exam_board')),
					'register_number' => $this->input->post('register_number'),
					'status' => '1',
					'reg_date' => date('Y-m-d H:i:s'),
					'reg_by' => $data['username']
				);

				$result = $this->admin_model->insertDetails('enquiries', $insertDetails);
				if ($result) {
					$this->session->set_flashdata('message', 'Enquiry Details added successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-warning');
				}

				redirect('admin/enquiries', 'refresh');
			}
		} else {
			redirect('admin', 'refresh');
		}
	}

    public function enquiryDetails($id){
		if ($this->session->userdata('logged_in')) {
			$sess = $this->session->userdata('logged_in');
			$data['id'] = $sess['id'];
			$data['username'] = $sess['username'];
			$data['role'] = $sess['role'];
			
			$data['page_title'] = 'Enquiries';
			$data['menu'] = 'enquiries';
			
			$data['course_options'] = array(" " => "Select")+$this->globals->courses();
			
			$data['enquiryStatus'] = $this->globals->enquiryStatus();
			$data['enquiryStatusColor'] = $this->globals->enquiryStatusColor();
			
			$data['feeCourses'] = array(""=>"Select") + $this->getFeeCourses();
			$data['languages'] = array(""=>"Select") + $this->globals->languages();
			
			$data['enquiryDetails'] = $this->admin_model->getDetails('enquiries', $id)->row();
			// var_dump($this->db->last_query());
			$data['comments'] = $this->admin_model->getDetails('enq_comments','enq_id', $id)->result();
		   
            $this->admin_template->show('admin/enquiry_details',$data);
            
		}else {
				redirect('admin/timeout');
		}
    }

	function getFeeCourses(){
		if ($this->session->userdata('logged_in')) {
			$sess = $this->session->userdata('logged_in');
			$data['id'] = $sess['id'];
			$data['username'] = $sess['username'];
			$data['role'] = $sess['role'];
			
			$courses = $this->globals->courseFees();
			$result = array_keys($courses);
			$result = array_combine($result, $result);
			return $result;

		}else {
				redirect('admin/timeout');
		}           
    }

	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('admin', 'refresh');
	}
}
