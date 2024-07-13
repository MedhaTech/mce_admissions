<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->CI = &get_instance();
		$this->load->library('aws_sdk');
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
			$data['page_title'] = "Admin Login";
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
		$username = $this->input->post('username') . '@mcehassan.ac.in';

		//query the database
		$result = $this->admin_model->login($username, md5($password));

		if ($result) {
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'id' => $row->user_id,
					'username' => $row->username,
					'full_name' => $row->full_name,
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

	function forgot_password()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]');

		if ($this->form_validation->run() == FALSE) {
			$data['page_title'] = "Forgot Password";
			$data['action'] = 'admin/forgot_password';

			$this->login_template->show('admin/forgot_password', $data);
		} else {
			$username = $this->input->post('username');
			redirect('admin/dashboard', 'refresh');
		}
	}

	public function reset_password($encryptTxt)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			// echo $encryptAadhaar;
			$txt = base64_decode($encryptTxt);
			$txtArray = (explode(",", $txt));

			$updateDetails = array(
				'password' => md5($txtArray[0]),
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $data['username']
			);

			$result = $this->admin_model->updateDetailsbyfield('user_id', $txtArray[1], $updateDetails, 'users');

			if ($result) {
				$this->session->set_flashdata('message', 'Password reset to mobile number successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
			} else {
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-warning');
			}

			redirect('admin/users', 'refresh');
		} else {
			redirect('admin/timeout');
		}
	}

	function dashboard()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = "Dashboard";
			$data['menu'] = "dashboard";
			$data['enquiryStatus'] = $this->globals->enquiryStatus();
			$data['enquiryStatusColor'] = $this->globals->enquiryStatusColor();
			$data['currentAcademicYear'] = $this->globals->currentAcademicYear();
			$departments = $this->admin_model->getActiveDepartments()->result();
			$aided = array();
			$unaided = array();
			foreach ($departments as $departments1) {
				if ($departments1->aided_intake) {
					array_push($aided, $departments1);
				}
				if ($departments1->unaided_intake) {
					array_push($unaided, $departments1);
				}
			}
			$data['aided'] = $aided;
			$data['unaided'] = $unaided;

			$this->admin_template->show('admin/Dashboard', $data);
		} else {
			redirect('admin', 'refresh');
		}
	}

	function dashboard1()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = "Dashboard";
			$data['menu'] = "dashboard";
			$details = $this->admin_model->getActiveDepartments()->result();
			$aided = array();
			$unaided = array();
			foreach ($details as $details1) {
				if ($details1->aided_intake) {
					array_push($aided, $details1);
				}
				if ($details1->unaided_intake) {
					array_push($unaided, $details1);
				}
			}
			$data['aided'] = $aided;
			$data['unaided'] = $unaided;
			$this->admin_template->show('admin/Dashboard1', $data);
		} else {
			redirect('admin', 'refresh');
		}
	}

	public function enquiries()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Enquiries List';
			$data['menu'] = 'enquiries';
			$data['action'] = 'admin/enquiries';
			$data['enquiryStatus'] = $this->globals->enquiryStatus();
			$data['enquiryStatusColor'] = $this->globals->enquiryStatusColor();
			$data['currentAcademicYear'] = $this->globals->currentAcademicYear();
			$data['enquiries'] = $this->admin_model->getEnquiries($data['currentAcademicYear'])->result();
			$data['states'] = array("" => "Select State") + $this->globals->states();
			$data['course_options'] = array(" " => "Select Branch") + $this->courses();



			if ($this->input->post()) {
				$sslc = $this->input->post('sslc');
				$puc1 = $this->input->post('puc1');
				$puc2 = $this->input->post('puc2');
				$state = $this->input->post('state');
				$course = $this->input->post('course');
				$data['enquiries'] = $this->admin_model->getEnquiries_filter($data['currentAcademicYear'], $sslc, $puc1, $puc2, $state, $course)->result();
			} else {
				$data['enquiries'] = $this->admin_model->getEnquiries($data['currentAcademicYear'])->result();
			}
			// var_dump($this->db->last_query());
			$this->admin_template->show('admin/enquiries', $data);
		} else {
			redirect('admin/timeout');
		}
	}

	function newEnquiry()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'New Enquiry';
			$data['menu'] = 'newEnquiry';
			$data['userTypes'] = $this->globals->userTypes();
			$data['academicYear'] = $this->globals->academicYear();

			$data['course_options'] = array(" " => "Select") + $this->courses();
			$data['type_options'] = array(" " => "Select") + $this->globals->category();
			$data['states'] = array(" " => "Select State") + $this->globals->states();

			// $this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
			$this->form_validation->set_rules('student_name', 'Applicant Name', 'required');

			$this->form_validation->set_rules('mobile', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]|is_unique[enquiries.mobile]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('course', 'Branch Preference-I', 'required');
			$this->form_validation->set_rules('par_name', 'Applicant Name', 'required');

			$this->form_validation->set_rules('par_mobile', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('par_email', 'Email', 'trim|valid_email');
			$this->form_validation->set_rules('course1', 'Branch Preference-II', 'required');
			$this->form_validation->set_rules('course2', 'Branch Preference-III', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');
			$this->form_validation->set_rules('city', 'City', 'required');
			$this->form_validation->set_rules('gender', 'Gender', 'required');
			$this->form_validation->set_rules('category', 'Category', 'required');
			$this->form_validation->set_rules('sports', 'Sports', 'required');
			$this->form_validation->set_rules('aadhaar', 'Aadhaar Number', 'required|regex_match[/^[0-9]{12}$/]|is_unique[enquiries.aadhaar]');
			$this->form_validation->set_rules('puc1_grade', 'PUC-I(10+1) Percentage/Grade', 'required');
			$this->form_validation->set_rules('sslc_grade', 'SSLC Percentage/Grade', 'required');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'admin/newEnquiry';
				$data['academic_year'] = "2024-2025";
				$data['student_name'] = $this->input->post('student_name');

				$data['mobile'] = $this->input->post('mobile');
				$data['email'] = $this->input->post('email');
				$data['course'] = $this->input->post('course');
				$data['par_name'] = $this->input->post('par_name');

				$data['par_mobile'] = $this->input->post('par_mobile');
				$data['par_email'] = $this->input->post('par_email');
				$data['course1'] = $this->input->post('course1');
				$data['course2'] = $this->input->post('course2');
				$data['state'] = $this->input->post('state');
				$data['city'] = $this->input->post('city');
				$data['category'] = $this->input->post('category');
				$data['sports'] = $this->input->post('sports');
				$data['sslc_grade'] = $this->input->post('sslc_grade');
				$data['puc1_grade'] = $this->input->post('puc1_grade');
				$data['sslc_grade'] = $this->input->post('sslc_grade');
				$data['gender'] = $this->input->post('gender');
				$data['aadhaar'] = $this->input->post('aadhaar');

				$this->admin_template->show('admin/new_enquiry', $data);
			} else {
				$course_id = $this->input->post('course');
				$course = $data['course_options'][$course_id];
				$course_id1 = $this->input->post('course1');
				$course1 = $data['course_options'][$course_id1];
				$course_id2 = $this->input->post('course2');
				$course2 = $data['course_options'][$course_id2];


				$insertDetails = array(
					'academic_year' => "2024-2025",
					'student_name' => strtoupper($this->input->post('student_name')),
					'mobile' => $this->input->post('mobile'),
					'email' => strtolower($this->input->post('email')),
					'par_name' => strtoupper($this->input->post('par_name')),
					'par_mobile' => $this->input->post('par_mobile'),
					'par_email' => strtolower($this->input->post('par_email')),
					'course_id' => $this->input->post('course'),
					'course' => $course,
					'course1' => $course1,
					'course2' => $course2,
					'state' => $this->input->post('state'),
					'city' => $this->input->post('city'),
					'category' => $this->input->post('category'),
					'sports' => $this->input->post('sports'),
					'gender' => $this->input->post('gender'),
					'aadhaar' => $this->input->post('aadhaar'),
					'sslc_grade' => $this->input->post('sslc_grade'),
					'puc1_grade' => strtoupper($this->input->post('puc1_grade')),
					'puc2_grade' => $this->input->post('puc2_grade'),
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

	public function enquiryDetails($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Enquiries';
			$data['menu'] = 'enquiries';

			$data['course_options'] = array(" " => "Select") + $this->courses();
			$data['quota_options'] = array(" " => "Select", "MGMT" => "MGMT");
			$data['subquota_options'] = array(" " => "Select") + $this->globals->sub_quota();
			$data['type_options'] = array(" " => "Select") + $this->globals->category();

			$data['enquiryStatus'] = $this->globals->enquiryStatus();
			$data['enquiryStatusColor'] = $this->globals->enquiryStatusColor();

			// $data['feeCourses'] = array("" => "Select") + $this->getFeeCourses();
			// $data['languages'] = array("" => "Select") + $this->globals->languages();

			$data['enquiryDetails'] = $this->admin_model->getDetails('enquiries', $id)->row();
			// var_dump($this->db->last_query());
			$data['comments'] = $this->admin_model->getDetailsbyfield($id, 'enq_id', 'enq_comments')->result();

			$this->admin_template->show('admin/enquiry_details', $data);
		} else {
			redirect('admin/timeout');
		}
	}


	function editEnquiry($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Edit Enquiry';
			$data['menu'] = 'enquiries';
			$data['userTypes'] = $this->globals->userTypes();

			$data['academicYear'] = $this->globals->academicYear();
			$data['course_options'] = array(" " => "Select") + $this->courses();
			$data['type_options'] = array(" " => "Select") + $this->globals->category();
			$data['states'] = array(" " => "Select State") + $this->globals->states();


			$this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
			$this->form_validation->set_rules('student_name', 'Applicant Name', 'required');

			$this->form_validation->set_rules('mobile', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
			$this->form_validation->set_rules('par_name', 'Parent Name', 'required');
			$this->form_validation->set_rules('par_mobile', 'Parent Mobile', 'required');
			$this->form_validation->set_rules('par_email', 'Parent Email', 'required');
			$this->form_validation->set_rules('course', 'Course', 'required');
			$this->form_validation->set_rules('course1', 'Course', 'required');
			$this->form_validation->set_rules('course2', 'Course', 'required');
			$this->form_validation->set_rules('gender', 'Gender', 'required');
			$this->form_validation->set_rules('aadhaar', 'Aadhaar Number', 'required|regex_match[/^[0-9]{12}$/]');
			$this->form_validation->set_rules('state', 'State', 'required');
			$this->form_validation->set_rules('city', 'City', 'required');
			$this->form_validation->set_rules('category', 'Category', 'required');
			$this->form_validation->set_rules('sslc_grade', 'Sslc Grade', 'required');
			$this->form_validation->set_rules('puc1_grade', 'Puc Grade', 'required');
			$this->form_validation->set_rules('exam_board', 'Exam Board');
			$this->form_validation->set_rules('puc2_grade', 'Puc2 Grade', 'required');
			// $this->form_validation->set_rules('register_grade', '10+2 Percentage / Grade', 'required');
			// $this->form_validation->set_rules('exam_board', 'Exam Board');
			// $this->form_validation->set_rules('register_number', 'Register Number', 'required');
			// $this->form_validation->set_rules('aadhaar', 'Aadhaar Number', 'required|regex_match[/^[0-9]{12}$/]');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'admin/editEnquiry/' . $id;

				$enquiryDetails = $this->admin_model->getDetails('enquiries', $id)->row();


				$data['academic_year'] = $enquiryDetails->academic_year;
				$data['student_name'] = $enquiryDetails->student_name;

				$data['mobile'] = $enquiryDetails->mobile;
				$data['email'] =  $enquiryDetails->email;
				$data['par_name'] =  $enquiryDetails->par_name;
				$data['par_mobile'] =  $enquiryDetails->par_mobile;
				$data['par_email'] =  $enquiryDetails->par_email;
				$data['course'] =  $enquiryDetails->course_id;
				$data['course1'] =  $enquiryDetails->course_id;
				$data['course2'] =  $enquiryDetails->course_id;
				$data['gender'] =  $enquiryDetails->gender;
				$data['aadhaar'] =  $enquiryDetails->aadhaar;
				$data['state'] =  $enquiryDetails->state;
				$data['city'] =  $enquiryDetails->city;
				$data['category'] =  $enquiryDetails->category;
				$data['sslc_grade'] =  $enquiryDetails->sslc_grade;
				$data['puc1_grade'] =  $enquiryDetails->puc1_grade;
				$data['puc2_grade'] =  $enquiryDetails->puc2_grade;
				$data['exam_board'] =  $enquiryDetails->exam_board;
				// $data['register_number'] =  $enquiryDetails->register_number;
				// $data['register_grade'] = $enquiryDetails->register_grade;
				$this->admin_template->show('admin/edit_enquiry', $data);
			} else {
				$course_id = $this->input->post('course');
				$course = $data['course_options'][$course_id];



				$updateDetails = array(
					'student_name' => strtoupper($this->input->post('student_name')),
					// 'register_grade' => $this->input->post('register_grade'),
					'mobile' => $this->input->post('mobile'),
					'email' => strtolower($this->input->post('email')),
					'par_name' => $this->input->post('par_name'),
					'par_mobile' => $this->input->post('par_mobile'),
					'par_email' => $this->input->post('par_email'),
					'course_id' => $this->input->post('course'),
					'course_id' => $this->input->post('course1'),
					'course_id' => $this->input->post('course2'),
					'gender' => $this->input->post('gender'),
					'aadhaar' => $this->input->post('aadhaar'),
					'course' => $course,
					'state' => $this->input->post('state'),
					'city' => $this->input->post('city'),
					'category' => $this->input->post('category'),
					'sslc_grade' => $this->input->post('sslc_grade'),
					'puc1_grade' => $this->input->post('puc1_grade'),
					// 'exam_board' => strtoupper($this->input->post('exam_board')),
					'puc2_grade' => $this->input->post('puc2_grade'),

					// 'exam_board' => strtoupper($this->input->post('exam_board')),
					// 'register_number' => $this->input->post('register_number')
				);

				$result = $this->admin_model->updateDetails($id, $updateDetails, 'enquiries');
				if ($result) {
					$this->session->set_flashdata('message', 'Enquiry Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-warning');
				}

				redirect('admin/enquiryDetails/' . $id, 'refresh');
			}
		} else {
			redirect('admin', 'refresh');
		}
	}

	function courses()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$details = $this->admin_model->getDetailsbyfield('1', 'status', 'departments')->result();

			$result = array();
			foreach ($details as $details1) {
				$row = $this->admin_model->get_stream_by_id($details1->stream_id);
				$result[$details1->department_id] = $row['stream_short_name'] . ' - ' . $details1->department_name;
			}

			return $result;
		} else {
			redirect('admin/timeout');
		}
	}

	function getFeeCourses()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$courses = $this->globals->courseFees();
			$result = array_keys($courses);
			$result = array_combine($result, $result);
			return $result;
		} else {
			redirect('admin/timeout');
		}
	}

	function updateComments($enq_id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];


			$data['page_title'] = 'Enquiries';
			$data['menu'] = 'enquiries';

			$comments = $this->input->post('comments');
			$status = $this->input->post('status');
			$old_status = $this->input->post('old_status');

			if ($status != $old_status) {
				$updateDetails = array('status' => $status);
				$result = $this->admin_model->updateDetails($enq_id, $updateDetails, 'enquiries');
				// $result = $this->admin_model->updateDetails('enquiries', $enq_id, $updateDetails);
			}

			$insertDetails = array(
				'enq_id' => $enq_id,
				'comments' => $this->input->post('comments'),
				'given_by' => $data['username'],
				'given_on' => date('Y-m-d h:i:s')
			);

			$result = $this->admin_model->insertDetails('enq_comments', $insertDetails);
			if ($result) {
				$this->session->set_flashdata('message', 'Comments updated successfully...!');
				$this->session->set_flashdata('status', 'alert-success');
			} else {
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-warning');
			}

			redirect('admin/enquiryDetails/' . $enq_id, 'refresh');
		} else {
			redirect('admin', 'refresh');
		}
	}

	function getFee()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			if ($this->input->post('quota') == "MGMT") {

				$course = $this->input->post('course');
			} else {
				$course = 0;
			}

			$quota = $this->input->post('quota');
			$sub_quota = $this->input->post('subquota');

			$details = $this->admin_model->getFee($course, $quota, $sub_quota)->row();
			// var_dump($this->db->last_query());
			// $details = [
			// 	"aided_unaided" => "Aided",
			// 	"category" => "2",
			// 	"total_college_fee" => "6000",
			// 	"combination" => "",
			// 	"course" => "BTECH",
			// 	"id" => "4",
			// 	"mgt_fee_total" => "9000",
			// 	"total_fee" => "40800"
			// ];

			print_r(json_encode($details));
		} else {
			redirect('admin/timeout');
		}
	}



	function admitStudent()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Admit Studnet';
			$data['menu'] = 'admissions';

			$id = $this->input->post('id');
			$category_claimed = $this->input->post('category_claimed');
			$category_allotted = $this->input->post('category_allotted');

			$course = $this->input->post('course');


			$course_val = $this->input->post('course_val');

			$corpus = $this->input->post('corpus');

			$total_tution_fee = $this->input->post('total_tution_fee');
			$total_university_fee = $this->input->post('total_university_fee');


			$concession_type = $this->input->post('concession_type');
			$concession_fee = $this->input->post('concession_fee');
			$total_college_fee = $total_university_fee + $total_tution_fee - $concession_fee;

			$final_amount = $this->input->post('final_amount');


			$currentAcademicYear = $this->globals->currentAcademicYear();

			$updateDetails = array('status' => '6');
			$res = $this->admin_model->updateDetails($id, $updateDetails, 'enquiries');

			$app_number = $this->admin_model->getAppNo($currentAcademicYear)->row()->cnt;
			$app_number = $app_number + 1;
			$strlen = strlen(($app_number));
			if ($strlen == 1) {
				$app_number = "00" . $app_number;
			}
			if ($strlen == 2) {
				$app_number = "0" . $app_number;
			}
			// if ($strlen == 3) {
			// 	$app_number = "0" . $app_number;
			// }
			$app_no = date('Y') . $app_number;

			$enquiryDetails = $this->admin_model->getDetails('enquiries', $id)->row();


			$usn = "";
			// $usn = $this->admin_model->getUsnNo($currentAcademicYear, $course)->row()->new_usn;
			// var_dump($this->db->last_query());
			$insertDetails = array(
				'flow' => '0',
				'academic_year' => $enquiryDetails->academic_year,
				'enq_id' => $id,
				'app_no' => $app_no,
				'adm_no' => $app_no,
				'dept_id' => $course,
				'usn' => $usn,
				'student_name' => strtoupper($enquiryDetails->student_name),
				'mobile' => $enquiryDetails->mobile,
				'email' => strtolower($enquiryDetails->email),
				'father_name' => strtoupper($enquiryDetails->par_name),
				'father_mobile' => $enquiryDetails->par_mobile,
				'father_email' => $enquiryDetails->par_email,
				'aadhaar' => $enquiryDetails->aadhaar,
				'quota' => $this->input->post('quota'),
				'sub_quota' => $this->input->post('subquota'),
				'exam_rank' => $this->input->post('exam_rank'),
				'gender' => $enquiryDetails->gender,
				'password' => md5($enquiryDetails->mobile),
				'category_allotted' => $category_allotted,
				'category_claimed' => $category_claimed,
				'remarks' => $this->input->post('remarks'),
				'status' => '1',
				'admit_date' => date('Y-m-d h:i:s'),
				'admit_by' => $data['username']
			);

			$result = $this->admin_model->insertDetails('admissions', $insertDetails);
			// var_dump($this->db->last_query());

			$insertDetails1 = array(
				'student_id' => $result,
				'academic_year' => $enquiryDetails->academic_year,
				'student_name' => strtoupper($enquiryDetails->student_name),
				'dept_id' => $course,
				'year' => "I",
				'total_university_fee' => $total_university_fee,
				'total_tution_fee' => $total_tution_fee,
				'total_college_fee' => $total_college_fee,
				'corpus_fund' => $corpus,
				'final_fee' => $final_amount,
				'consession_type' => $concession_type,
				'consession_amount' => $concession_fee,
				'status' => '1',
				'last_updated_on' => date('Y-m-d h:i:s'),
				'last_updated_by' => $data['username']

			);

			if ($result) {
				$result1 = $this->admin_model->insertDetails('fee_master', $insertDetails1);
			}
			$sid = $result;
			$url = "./assets/students/$sid";
			if (!file_exists($url)) {
				mkdir($url, 0777);
			}

			if ($result1) {
				$email['name'] = strtoupper($enquiryDetails->student_name);
				$email['mobile'] = strtolower($enquiryDetails->email);
				$email['password'] = $enquiryDetails->mobile;
				$message = $this->load->view('email/registration', $email);
				$ci = &get_instance();
				$message = $ci->load->view('email/registration', $email, true);
				// $this->aws_sdk->triggerEmail($enquiryDetails->email, 'MCE Online Admission Portal Registration Successful - Complete Your Application Now!', $message);
				$this->aws_sdk->triggerEmail('admission@mcehassan.ac.in', 'MCE Online Admission Portal Registration Successful - Complete Your Application Now!', $message);
			} else {
				echo "0";
			}
		} else {
			redirect('admin', 'refresh');
		}
	}

	function Enquirieslist()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = "Enquiries List";
			$data['menu'] = "Enquirieslist";
			$data['enquiryStatus'] = $this->globals->enquiryStatus();
			$data['enquiryStatusColor'] = $this->globals->enquiryStatusColor();
			$data['currentAcademicYear'] = $this->globals->currentAcademicYear();
			$data['course_options'] = $this->admin_model->getDetails('departments', '')->result();
			$this->admin_template->show('admin/Enquirieslist', $data);
		} else {
			redirect('admin', 'refresh');
		}
	}

	function departments()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = "Departments";
			$data['menu'] = "departments";

			$data['details'] = $this->admin_model->getActiveDepartments()->result();
			// echo "<pre>"; print_r($data['details']); die;

			$this->admin_template->show('admin/departments', $data);
		} else {
			redirect('admin', 'refresh');
		}
	}

	function intake()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = "Intake Capacity";
			$data['menu'] = "intake";

			$details = $this->admin_model->getActiveDepartments()->result();
			$aided = array();
			$unaided = array();
			foreach ($details as $details1) {
				if ($details1->aided_intake) {
					array_push($aided, $details1);
				}
				if ($details1->unaided_intake) {
					array_push($unaided, $details1);
				}
			}
			$data['aided'] = $aided;
			$data['unaided'] = $unaided;

			$this->admin_template->show('admin/intake', $data);
		} else {
			redirect('admin', 'refresh');
		}
	}


	function feestructure()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = "Fee Structure";
			$data['menu'] = "feestructure";

			$fee_structure = $this->admin_model->getDetails('fee_structure', '')->result();
			$feeDetails = array();

			foreach ($fee_structure as $fee1) {
				$quota = $fee1->quota;

				if ($fee1->department_id) {
					$dept_name = $this->admin_model->getDetailsbyfield($fee1->department_id, 'department_id', 'departments')->row();
					$dept_name = $dept_name->department_name;
					$quota1 = $fee1->quota . ' - ' . $dept_name;
				} else {
					$quota1 = $fee1->quota . ' - All Depts.';
				}
				if (array_key_exists($quota1, $feeDetails)) {
					if (array_key_exists($fee1->sub_quota, $feeDetails[$quota1])) {
						$category =  array("total_college_fee" => $fee1->total_college_fee, "corpus_fund" => $fee1->corpus_fund, "final_fee" => $fee1->final_fee, 'id' => $fee1->id);
						array_push($feeDetails[$quota1][$fee1->sub_quota], $category);
					} else {
						$category =  array("total_college_fee" => $fee1->total_college_fee, "corpus_fund" => $fee1->corpus_fund, "final_fee" => $fee1->final_fee, 'id' => $fee1->id);
						$feeDetails[$quota1][$fee1->sub_quota] = $category;
					}
				} else {
					$category = array("total_college_fee" => $fee1->total_college_fee, "corpus_fund" => $fee1->corpus_fund, "final_fee" => $fee1->final_fee, 'id' => $fee1->id);
					$sub_quota =  array($fee1->sub_quota => $category);
					$feeDetails[$quota1] = $sub_quota;
				}
			}
			$data['feeDetails'] = $feeDetails;
			// print_r($feeDetails);
			$this->admin_template->show('admin/fees_structure', $data);
		} else {
			redirect('admin', 'refresh');
		}
	}

	function editFeeStructure($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];
			$data['page_title'] = "Edit Fee Structure";
			$data['menu'] = "feestructure";

			$data['fee_structure'] = $this->admin_model->get_details_by_id($id, 'id', 'fee_structure');

			$this->form_validation->set_rules('e_learning_fee', 'E Learning Fee', 'numeric|required');
			$this->form_validation->set_rules('eligibility_fee', 'Eligibility Fee', 'numeric|required');
			$this->form_validation->set_rules('e_consortium_fee', 'e Consortium Fee', 'numeric|required');
			$this->form_validation->set_rules('sport_fee', 'Sport Fee', 'numeric|required');
			$this->form_validation->set_rules('sports_development_fee', 'Sports Development Fee', 'numeric|required');
			$this->form_validation->set_rules('career_guidance_counseling_fee', 'Career Guidance & Counseling fee', 'numeric|required');
			$this->form_validation->set_rules('university_development_fund', 'University Development Fund', 'numeric|required');
			$this->form_validation->set_rules('promotion_of_indian_cultural_activities_fee', 'Promotion of Indian Cultural Activities Fee', 'numeric|required');
			$this->form_validation->set_rules('teachers_development_fee', 'Teachers Development Fee', 'numeric|required');
			$this->form_validation->set_rules('student_development_fee', 'Student Development Fee', 'numeric|required');
			$this->form_validation->set_rules('indian_red_cross_membership_fee', 'Indian Red Cross Membership Fee', 'numeric|required');
			$this->form_validation->set_rules('women_cell_fee', 'Women Cell Fee', 'numeric|required');
			$this->form_validation->set_rules('nss_fee', 'NSS Fee', 'numeric|required');
			$this->form_validation->set_rules('university_registration_fee', 'University Registration Fee', 'numeric|required');
			$this->form_validation->set_rules('total_university_fee', 'TOTAL UNIVERSITY FEE', 'numeric|required');
			$this->form_validation->set_rules('admission_fee', 'Admission Fee', 'numeric|required');
			$this->form_validation->set_rules('processing_fee_paid_at_kea', 'Processing Fee paid at KEA', 'numeric|required');
			$this->form_validation->set_rules('tution_fee', 'Tution Fee', 'numeric|required');
			$this->form_validation->set_rules('college_other_fee', 'COLLEGE OTHER FEE', 'numeric|required');
			$this->form_validation->set_rules('total_tution_fee', 'TOTAL TUTION FEE', 'numeric|required');
			$this->form_validation->set_rules('total_college_fee', 'TOTAL COLLEGE FEE', 'numeric|required');
			$this->form_validation->set_rules('skill_development_fee', 'Skill Development Fee', 'numeric|required');
			$this->form_validation->set_rules('corpus_fund', 'Corpus Fund', 'numeric|required');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'admin/editFeeStructure/' . $id;
				$this->admin_template->show('admin/editFeeStructure', $data);
			} else {

				$updateDetails = array(
					'e_learning_fee' => $this->input->post('e_learning_fee'),
					'eligibility_fee' => $this->input->post('eligibility_fee'),
					'e_consortium_fee' => strtolower($this->input->post('e_consortium_fee')),
					'sport_fee' => $this->input->post('sport_fee'),
					'sports_development_fee' => $this->input->post('sports_development_fee'),
					'career_guidance_counseling_fee' => $this->input->post('career_guidance_counseling_fee'),
					'university_development_fund' => strtoupper($this->input->post('university_development_fund')),
					'promotion_of_indian_cultural_activities_fee' => $this->input->post('promotion_of_indian_cultural_activities_fee'),
					'teachers_development_fee' => $this->input->post('teachers_development_fee'),
					'student_development_fee' => $this->input->post('student_development_fee'),
					'indian_red_cross_membership_fee' => $this->input->post('indian_red_cross_membership_fee'),
					'women_cell_fee' => $this->input->post('women_cell_fee'),
					'nss_fee' => $this->input->post('nss_fee'),
					'university_registration_fee' => $this->input->post('university_registration_fee'),
					'total_university_fee' => $this->input->post('total_university_fee'),
					'admission_fee' => $this->input->post('admission_fee'),
					'processing_fee_paid_at_kea' => $this->input->post('processing_fee_paid_at_kea'),
					'tution_fee' => $this->input->post('tution_fee'),
					'college_other_fee' => $this->input->post('college_other_fee'),
					'total_tution_fee' => $this->input->post('total_tution_fee'),
					'total_college_fee' => $this->input->post('total_college_fee'),
					'skill_development_fee' => $this->input->post('skill_development_fee'),
					'corpus_fund' => $this->input->post('corpus_fund'),
					'final_fee' => $this->input->post('final_fee'),
				);

				$result = $this->admin_model->updateDetails($id, $updateDetails, 'fee_structure');
				// var_dump($this->db->last_query());
				// die();

				if ($result) {
					$this->session->set_flashdata('message', 'Fee Structure Details are updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-warning');
				}

				redirect('admin/feestructure', 'refresh');
			}
		} else {
			redirect('admin', 'refresh');
		}
	}

	function viewFeeStructure($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];
			$data['page_title'] = "View Fee Structure";
			$data['menu'] = "feestructure";

			$data['fee_structure'] = $this->admin_model->get_details_by_id($id, 'id', 'fee_structure');
			$this->admin_template->show('admin/viewFeeStructure', $data);
		} else {
			redirect('admin', 'refresh');
		}
	}

	function reports()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = "Reports";
			$data['menu'] = "reports";

			$this->admin_template->show('admin/reports', $data);
		} else {
			redirect('admin', 'refresh');
		}
	}

	function subquotaDropdown()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$quota = $this->input->post('quota');
			$dept = $this->input->post('course');

			$code_options = array(" " => "Select") + $this->globals->college_codes();

			$result = array();
			$result[] = '<option value=" ">Select</option>';

			if ($quota == "COMED-K") {
				$result[] = '<option value="UnAided">' . $code_options['COMED-K'] . '</option>';
			} else {
				if ($quota != "MGMT") {
					$dept = 0;
				} else {
					$dept = $dept;
				}


				$details = $this->admin_model->getsubquota($quota, $dept)->result();
				foreach ($details as $details1) {
					$result[] = '<option value="' . $details1->sub_quota . '">' . $code_options[$details1->sub_quota] . '</option>';
				}
			}

			print_r($result);
		} else {
			redirect('admin/timeout');
		}
	}

	public function enquiryAdmission($encryptAadhaar)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			// echo $encryptAadhaar;
			$aadhaar = base64_decode($encryptAadhaar);
			// $aadhaar = $this->encrypt->decode(base64_decode($encryptAadhaar));

			$details = $this->admin_model->fetchDetails1('id', 'aadhaar', $aadhaar, 'admissions')->row();

			$encryptId = base64_encode($details->id);
			// $encryptId = base64_encode($this->encrypt->encode($details->id));

			redirect('admin/admissionDetails/' . $encryptId);
		} else {
			redirect('admin/timeout');
		}
	}


	public function admissions($status = null)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['admissionStatus'] = $this->globals->admissionStatus();

			$data['page_title'] = ($status) ? $data['admissionStatus'][$status] . ' Admissions' : 'All Admissions';
			$data['menu'] = 'admissions';

			$data['admissionStatusColor'] = $this->globals->admissionStatusColor();
			$data['currentAcademicYear'] = $this->globals->currentAcademicYear();
			$data['admissions'] = $this->admin_model->fetchDetails2('id, app_no, adm_no,quota,dept_id,sub_quota, student_name, mobile,usn,status', 'status', $status, 'academic_year', $data['currentAcademicYear'], 'admissions')->result();

			$this->admin_template->show('admin/admissions', $data);
		} else {
			redirect('admin/timeout');
		}
	}

	public function report($report, $download = '')
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Reports';
			$data['menu'] = 'reports';
			$data['report_type'] = $report;
			$enquiryStatus = $this->globals->enquiryStatus();
			$enquiryStatusColor = $this->globals->enquiryStatusColor();
			$data['currentAcademicYear'] = $this->globals->currentAcademicYear();

			if ($report == 1) {
				$enquiries = $this->admin_model->getEnquiries($data['currentAcademicYear'])->result();

				if (count($enquiries)) {
					$table_setup = array('table_open' => '<table class="table table-bordered" border="1" id="example2" >');
					$this->table->set_template($table_setup);
					$print_fields = array('S.No', 'Applicant Name', 'Mobile', 'Branch Preference-I', 'Branch Preference-II', 'Branch Preference-III', 'Aadhaar Number', 'SSLC Grade', 'PUC-I Grade', 'PUC-II Grade', 'Status', 'Reg. Date');
					$this->table->set_heading($print_fields);

					$i = 1;
					foreach ($enquiries as $enquiries1) {
						$result_array = array(
							$i++,
							//   $enquiries1->academic_year,
							$enquiries1->student_name,
							$enquiries1->mobile,
							$enquiries1->course,
							$enquiries1->course1,
							$enquiries1->course2,
							$enquiries1->aadhaar,
							$enquiries1->sslc_grade,
							$enquiries1->puc1_grade,
							$enquiries1->puc2_grade,
							'<strong class="text-' . $enquiryStatusColor[$enquiries1->status] . '">' . $enquiryStatus[$enquiries1->status] . '</strong>',
							date('d-m-Y h:i A', strtotime($enquiries1->reg_date))
						);
						$this->table->add_row($result_array);
					}
					$details = $this->table->generate();
				} else {
					$details = 'No student details found';
				}
			}
			if ($report == 2) {
				$enquiries = $this->admin_model->getEnquiries($data['currentAcademicYear'])->result();

				if (count($enquiries)) {
					$table_setup = array('table_open' => '<table class="table table-bordered" border="1" id="example2" >');
					$this->table->set_template($table_setup);
					$print_fields = array('S.No', 'Applicant Name', 'Mobile', 'Course', 'Aadhaar Number', 'SSLC Grade', 'PUC-I Grade', 'Status', 'Reg. Date');
					$this->table->set_heading($print_fields);

					$i = 1;
					foreach ($enquiries as $enquiries1) {
						if ($enquiries1->puc1_grade > 45) {
							$result_array = array(
								$i++,
								//   $enquiries1->academic_year,
								$enquiries1->student_name,
								$enquiries1->mobile,
								$enquiries1->course,
								$enquiries1->aadhaar,
								$enquiries1->sslc_grade,
								$enquiries1->puc1_grade,
								'<strong class="text-' . $enquiryStatusColor[$enquiries1->status] . '">' . $enquiryStatus[$enquiries1->status] . '</strong>',
								date('d-m-Y h:i A', strtotime($enquiries1->reg_date))
							);
							$this->table->add_row($result_array);
						}
					}
					$details = $this->table->generate();
				} else {
					$details = 'No student details found';
				}
			}
			if ($report == 3) {
				$enquiries = $this->admin_model->getEnquiries($data['currentAcademicYear'])->result();

				if (count($enquiries)) {
					$table_setup = array('table_open' => '<table class="table table-bordered" border="1" id="example2" >');
					$this->table->set_template($table_setup);
					$print_fields = array('S.No', 'Applicant Name', 'Mobile', 'Course', 'Aadhaar Number', 'SSLC Grade', 'PUC-I Grade', 'Status', 'Reg. Date');
					$this->table->set_heading($print_fields);

					$i = 1;
					foreach ($enquiries as $enquiries1) {
						if ($enquiries1->puc1_grade < 45) {
							$result_array = array(
								$i++,
								//   $enquiries1->academic_year,
								$enquiries1->student_name,
								$enquiries1->mobile,
								$enquiries1->course,
								$enquiries1->aadhaar,
								$enquiries1->sslc_grade,
								$enquiries1->puc1_grade,
								'<strong class="text-' . $enquiryStatusColor[$enquiries1->status] . '">' . $enquiryStatus[$enquiries1->status] . '</strong>',
								date('d-m-Y h:i A', strtotime($enquiries1->reg_date))
							);
							$this->table->add_row($result_array);
						}
					}
					$details = $this->table->generate();
				} else {
					$details = 'No student details found';
				}
			}
			if ($report == 4) {
				$enquiries = $this->admin_model->getEnquiries_per($data['currentAcademicYear'])->result();

				if (count($enquiries)) {
					$table_setup = array('table_open' => '<table class="table table-bordered" border="1" id="example2" >');
					$this->table->set_template($table_setup);
					$print_fields = array('S.No', 'Applicant Name', 'Mobile', 'Course', 'Aadhaar Number', 'SSLC Grade', 'PUC-I Grade', 'Status', 'Reg. Date');
					$this->table->set_heading($print_fields);

					$i = 1;
					foreach ($enquiries as $enquiries1) {

						$result_array = array(
							$i++,
							//   $enquiries1->academic_year,
							$enquiries1->student_name,
							$enquiries1->mobile,
							$enquiries1->course,
							$enquiries1->aadhaar,
							$enquiries1->sslc_grade,
							$enquiries1->puc1_grade,
							'<strong class="text-' . $enquiryStatusColor[$enquiries1->status] . '">' . $enquiryStatus[$enquiries1->status] . '</strong>',
							date('d-m-Y h:i A', strtotime($enquiries1->reg_date))
						);
						$this->table->add_row($result_array);
					}
					$details = $this->table->generate();
				} else {
					$details = 'No student details found';
				}
			}
			if ($report == 5) {
				$enquiries = $this->admin_model->getEnquiries_non($data['currentAcademicYear'])->result();

				if (count($enquiries)) {
					$table_setup = array('table_open' => '<table class="table table-bordered" border="1" id="example2" >');
					$this->table->set_template($table_setup);
					$print_fields = array('S.No', 'Applicant Name', 'Mobile', 'Course', 'Aadhaar Number', 'State', 'SSLC Grade', 'PUC-I Grade', 'Status', 'Reg. Date');
					$this->table->set_heading($print_fields);

					$i = 1;
					foreach ($enquiries as $enquiries1) {

						$result_array = array(
							$i++,
							//   $enquiries1->academic_year,
							$enquiries1->student_name,
							$enquiries1->mobile,
							$enquiries1->course,
							$enquiries1->aadhaar,
							$enquiries1->state,
							$enquiries1->sslc_grade,
							$enquiries1->puc1_grade,
							'<strong class="text-' . $enquiryStatusColor[$enquiries1->status] . '">' . $enquiryStatus[$enquiries1->status] . '</strong>',
							date('d-m-Y h:i A', strtotime($enquiries1->reg_date))
						);
						$this->table->add_row($result_array);
					}
					$details = $this->table->generate();
				} else {
					$details = 'No student details found';
				}
			}
			if ($report == 6) {
				$enquiries = $this->admin_model->getEnquiries_sports($data['currentAcademicYear'])->result();

				if (count($enquiries)) {
					$table_setup = array('table_open' => '<table class="table table-bordered" border="1" id="example2" >');
					$this->table->set_template($table_setup);
					$print_fields = array('S.No', 'Applicant Name', 'Mobile', 'Course', 'Aadhaar Number', 'Sports', 'SSLC Grade', 'PUC-I Grade', 'Status', 'Reg. Date');
					$this->table->set_heading($print_fields);

					$i = 1;
					foreach ($enquiries as $enquiries1) {

						$result_array = array(
							$i++,
							//   $enquiries1->academic_year,
							$enquiries1->student_name,
							$enquiries1->mobile,
							$enquiries1->course,
							$enquiries1->aadhaar,
							$enquiries1->sports,
							$enquiries1->sslc_grade,
							$enquiries1->puc1_grade,
							'<strong class="text-' . $enquiryStatusColor[$enquiries1->status] . '">' . $enquiryStatus[$enquiries1->status] . '</strong>',
							date('d-m-Y h:i A', strtotime($enquiries1->reg_date))
						);
						$this->table->add_row($result_array);
					}
					$details = $this->table->generate();
				} else {
					$details = 'No student details found';
				}
			}






			if ($download == 1) {
				$response =  array(
					'op' => 'ok',
					'file' => "data:application/vnd.ms-excel;base64," . base64_encode($details)
				);
				die(json_encode($response));
			} else {
				$data['enquiries'] = $details;
				$this->admin_template->show('admin/report_download', $data);
			}
		} else {
			redirect('admin/timeout');
		}
	}

	public function report_department($download = '')
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Reports';
			$data['menu'] = 'reports';
			$data['report_type'] = $report;
			$enquiryStatus = $this->globals->enquiryStatus();
			$enquiryStatusColor = $this->globals->enquiryStatusColor();
			$data['currentAcademicYear'] = $this->globals->currentAcademicYear();
			$data['course_options'] = array(" " => "Select") + $this->courses();
			$data['action'] = 'admin/report_department';
			$this->form_validation->set_rules('course', 'Branch Preference-I', 'required');
			if ($this->form_validation->run() === FALSE) {

				$this->admin_template->show('admin/report_department', $data);
			} else {
				$data['course'] = $this->input->post('course');
				$course_name = $this->admin_model->get_dept_by_id($data['course'])["department_name"];
				$enquiries = $this->admin_model->getEnquiries_course_new($data['currentAcademicYear'], $data['course'], $course_name)->result();

				if (count($enquiries)) {
					$table_setup = array('table_open' => '<table class="table table-bordered" border="1" id="example2" >');
					$this->table->set_template($table_setup);
					$print_fields = array('S.No', 'Applicant Name', 'Mobile', 'Branch Prefernce I', 'Branch Prefernce II', 'Branch Prefernce III', 'Aadhaar Number', 'SSLC Grade', 'PUC-I Grade', 'Status', 'Reg. Date');
					$this->table->set_heading($print_fields);

					$i = 1;
					foreach ($enquiries as $enquiries1) {
						$result_array = array(
							$i++,
							//   $enquiries1->academic_year,
							$enquiries1->student_name,
							$enquiries1->mobile,
							$enquiries1->course,
							$enquiries1->course1,
							$enquiries1->course2,
							$enquiries1->aadhaar,
							$enquiries1->sslc_grade,
							$enquiries1->puc1_grade,
							'<strong class="text-' . $enquiryStatusColor[$enquiries1->status] . '">' . $enquiryStatus[$enquiries1->status] . '</strong>',
							date('d-m-Y h:i A', strtotime($enquiries1->reg_date))
						);
						$this->table->add_row($result_array);
					}
					$details = $this->table->generate();
				} else {
					$details = 'No student details found';
				}
				if ($download == 1) {
					$response =  array(
						'op' => 'ok',
						'file' => "data:application/vnd.ms-excel;base64," . base64_encode($details)
					);
					die(json_encode($response));
				} else {
					$data['enquiries'] = $details;
					$this->admin_template->show('admin/report_department', $data);
				}
			}
		} else {
			redirect('admin/timeout');
		}
	}
	public function report_category($download = '')
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Reports';
			$data['menu'] = 'reports';
			$data['report_type'] = $report;
			$enquiryStatus = $this->globals->enquiryStatus();
			$enquiryStatusColor = $this->globals->enquiryStatusColor();
			$data['currentAcademicYear'] = $this->globals->currentAcademicYear();
			$data['course_options'] = array(" " => "Select") + $this->courses();
			$data['type_options'] = array(" " => "Select") + $this->globals->category();
			$data['action'] = 'admin/report_category';
			$this->form_validation->set_rules('category', 'Category', 'required');
			if ($this->form_validation->run() === FALSE) {

				$this->admin_template->show('admin/report_category', $data);
			} else {
				$data['category'] = $this->input->post('category');

				$enquiries = $this->admin_model->getEnquiries_category($data['currentAcademicYear'], $data['category'])->result();

				if (count($enquiries)) {
					$table_setup = array('table_open' => '<table class="table table-bordered" border="1" id="example2" >');
					$this->table->set_template($table_setup);
					$print_fields = array('S.No', 'Applicant Name', 'Mobile', 'Course', 'Aadhaar Number', 'SSLC Grade', 'PUC-I Grade', 'Status', 'Reg. Date');
					$this->table->set_heading($print_fields);

					$i = 1;
					foreach ($enquiries as $enquiries1) {
						$result_array = array(
							$i++,
							//   $enquiries1->academic_year,
							$enquiries1->student_name,
							$enquiries1->mobile,
							$enquiries1->course,
							$enquiries1->aadhaar,
							$enquiries1->sslc_grade,
							$enquiries1->puc1_grade,
							'<strong class="text-' . $enquiryStatusColor[$enquiries1->status] . '">' . $enquiryStatus[$enquiries1->status] . '</strong>',
							date('d-m-Y h:i A', strtotime($enquiries1->reg_date))
						);
						$this->table->add_row($result_array);
					}
					$details = $this->table->generate();
				} else {
					$details = 'No student details found';
				}
				if ($download == 1) {
					$response =  array(
						'op' => 'ok',
						'file' => "data:application/vnd.ms-excel;base64," . base64_encode($details)
					);
					die(json_encode($response));
				} else {
					$data['enquiries'] = $details;
					$this->admin_template->show('admin/report_category', $data);
				}
			}
		} else {
			redirect('admin/timeout');
		}
	}



	function timeout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('admin', 'refresh');
	}

	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('admin', 'refresh');
	}

	public function send_email($to, $subject, $message)
	{
		$this->load->library('email');

		$this->email->from('girish@medhatech.in', 'Your Name');
		$this->email->to($to);


		$this->email->subject($subject);
		$this->email->message($message);

		if ($this->email->send()) {
			return 1;
		} else {
			return $this->email->print_debugger();
		}
	}

	public function admissionDetails($encryptId)
	{

		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Admission Details';
			$data['menu'] = 'admissions';

			// $id = $this->encrypt->decode(base64_decode($encryptId));
			$id = base64_decode($encryptId);

			$data['admissionStatus'] = $this->globals->admissionStatus();
			$data['admissionStatusColor'] = $this->globals->admissionStatusColor();
			$data['currentAcademicYear'] = $this->globals->currentAcademicYear();
			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $id)->row();
			$data['entranceDetails'] = $this->admin_model->getDetails('admissions', $id)->row();
			$data['personalDetails'] = $this->admin_model->getDetails('admissions', $id)->row();
			$data['parentDetails'] = $this->admin_model->getDetails('admissions', $id)->row();
			$data['studentDetails'] = $this->admin_model->getDetails('admissions', 'id', $id)->row();
			$data['educations_details'] = $this->admin_model->getDetailsbyfield($id, 'student_id', 'student_education_details')->result();


			$upload_path = "./assets/students/$id/";

			// Check if the directory exists
			if (is_dir($upload_path)) {
				// Get list of files in the directory
				$files = scandir($upload_path);

				// Remove . and .. from the list
				$data['files'] = array_diff($files, array('.', '..'));
			} else {
				$data['files'] = array();
			}
			$this->admin_template->show('admin/admission_details', $data);
		} else {
			redirect('admin/timeout');
		}
	}
	public function testmail()
	{
		$email['name'] = strtoupper('Girish R');
		$email['mobile'] = '9895369360';
		$email['password'] = '9895369360';

		$ci = &get_instance();
		$message = $ci->load->view('email/registration', $email, true);
		// $this->aws_sdk->triggerEmail('sreeni@medhatech.in', 'MCE Online Admission Portal Registration Successful - Complete Your Application Now!', $message);
		$this->aws_sdk->triggerEmail('girish@medhatech.in', 'test', 'testing');
	}
	function newAdmission()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'New Admission';
			$data['menu'] = 'newAdmission';
			$data['userTypes'] = $this->globals->userTypes();
			$data['academicYear'] = $this->globals->academicYear();
			$data['course_options'] = array(" " => "Select") + $this->courses();
			$data['code_options'] = array(" " => "Select") + $this->globals->college_code();
			$data['quota_options'] = array(" " => "Select") + $this->globals->quota();
			unset($data['quota_options']['MGMT']);

			$data['subquota_options'] = array(" " => "Select") + $this->globals->sub_quota();
			$data['type_options'] = array(" " => "Select") + $this->globals->category();
			$data['category_options'] = array(" " => "Select") + $this->globals->category_claimed();

			$data['enquiryStatus'] = $this->globals->enquiryStatus();
			$data['enquiryStatusColor'] = $this->globals->enquiryStatusColor();


			// $this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
			$this->form_validation->set_rules('student_name', 'Applicant Name', 'required');

			$this->form_validation->set_rules('mobile', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[admissions.email]');
			$this->form_validation->set_rules('aadhaar', 'Aadhaar Number', 'required|regex_match[/^[0-9]{12}$/]|is_unique[admissions.aadhaar]');
			$this->form_validation->set_rules('course', 'Department', 'required');
			$this->form_validation->set_rules('quota', 'Quota', 'required');
			$this->form_validation->set_rules('subquota', 'College quota', 'required');
			$this->form_validation->set_rules('category_allotted', 'Category Allocated', 'required');
			$this->form_validation->set_rules('category_claimed', 'Category Claimed', 'required');
			// $this->form_validation->set_rules('college_code', 'College Code', 'required');
			$this->form_validation->set_rules('sports', 'Sports', 'required');
			$this->form_validation->set_rules('entrance_type', 'Entrance Type', 'required');
			$this->form_validation->set_rules('entrance_reg_no', 'Entrance Registration Number', 'required');
			$this->form_validation->set_rules('entrance_rank', 'Entrance Exam Rank', 'required');
			$this->form_validation->set_rules('admission_order_no', 'Admission Order Number', 'required');
			$this->form_validation->set_rules('admission_order_date', 'Admission Order Date', 'required');
			$this->form_validation->set_rules('fees_paid', 'Fees Paid', 'required');
			$this->form_validation->set_rules('fees_receipt_no', 'Fees Receipt Number', 'required');
			$this->form_validation->set_rules('fees_receipt_date', 'Fees Receipt Date', 'required');


			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'admin/newAdmission';
				$data['academic_year'] = "2024-2025";
				$data['student_name'] = $this->input->post('student_name');

				$data['mobile'] = $this->input->post('mobile');
				$data['email'] = $this->input->post('email');
				$data['course'] = $this->input->post('course');
				$data['aadhaar'] = $this->input->post('aadhaar');
				$data['quota'] = $this->input->post('quota');
				$data['sub_quota'] = $this->input->post('subquota');
				$data['category_alloted'] = $this->input->post('category_alloted');
				$data['category_claimed'] = $this->input->post('category_claimed');
				$data['college_code'] = $this->input->post('college_code');
				$data['sports'] = $this->input->post('sports');
				$data['sports_activity'] = $this->input->post('sports_activity');
				$data['corpus'] = $this->input->post('corpus');

				$data['total_tution_fee'] = $this->input->post('total_tution_fee');
				$data['total_university_fee'] = $this->input->post('total_university_fee');

				$data['total_college_fee'] = $this->input->post('total_college_fee');
				$data['concession_type'] = $this->input->post('concession_type');
				$data['concession_fee'] = $this->input->post('concession_fee');
				$data['final_amount'] = $this->input->post('final_amount');
				$data['entrance_type'] = $this->input->post('entrance_type');
				$data['entrance_reg_no'] = $this->input->post('entrance_reg_no');
				$data['entrance_rank'] = $this->input->post('entrance_rank');
				$data['admission_order_no'] = $this->input->post('admission_order_no');
				$data['admission_order_date'] = $this->input->post('admission_order_date');
				$data['fees_paid'] = $this->input->post('fees_paid');
				$data['fees_receipt_no'] = $this->input->post('fees_receipt_no');
				$data['fees_receipt_date'] = $this->input->post('fees_receipt_date');

				$this->admin_template->show('admin/new_admission', $data);
			} else {
				$course = $this->input->post('course');
				$corpus = $this->input->post('corpus');
				$category_claimed = $this->input->post('category_claimed');
				$category_allotted = $this->input->post('category_allotted');
				$total_tution_fee = $this->input->post('total_tution_fee');
				$total_university_fee = $this->input->post('total_university_fee');

				// $total_college_fee = $this->input->post('total_college_fee');
				$total_college_fee = $total_university_fee + $total_tution_fee - $concession_fee;
				$concession_type = $this->input->post('concession_type');
				$concession_fee = $this->input->post('concession_fee');
				$final_amount = $this->input->post('final_amount');
				$currentAcademicYear = $this->globals->currentAcademicYear();



				$app_number = $this->admin_model->getAppNo($currentAcademicYear)->row()->cnt;
				$app_number = $app_number + 1;
				$strlen = strlen(($app_number));
				if ($strlen == 1) {
					$app_number = "000" . $app_number;
				}
				if ($strlen == 2) {
					$app_number = "00" . $app_number;
				}
				if ($strlen == 3) {
					$app_number = "0" . $app_number;
				}
				$app_no = date('y') . $app_number;

				$usn = $this->admin_model->getUsnNo($currentAcademicYear, $course)->row()->new_usn;



				$insertDetails = array(
					'flow' => '0',
					'academic_year' => $currentAcademicYear,
					'enq_id' => '0',
					'app_no' => $app_no,
					'dept_id' => $course,
					'adm_no' => $app_no,
					'usn' => $usn,
					'student_name' => strtoupper($this->input->post('student_name')),
					'mobile' => $this->input->post('mobile'),
					'email' => strtolower($this->input->post('email')),
					'aadhaar' => $this->input->post('aadhaar'),
					'dept_id' => $this->input->post('course'),
					'quota' => $this->input->post('quota'),
					'sub_quota' => $this->input->post('subquota'),
					'category_allotted' => $this->input->post('category_allotted'),
					'category_claimed' => $this->input->post('category_claimed'),
					'college_code' => "NA",
					'sports' => $this->input->post('sports'),
					'sports_activity' => $this->input->post('sports_activity'),
					'password' => md5($this->input->post('mobile')),
					'entrance_type' => $this->input->post('entrance_type'),
					'entrance_reg_no' => $this->input->post('entrance_reg_no'),
					'entrance_rank' => $this->input->post('entrance_rank'),
					'admission_order_no' => $this->input->post('admission_order_no'),
					'admission_order_date' => $this->input->post('admission_order_date'),
					'fees_paid' => $this->input->post('fees_paid'),
					'fees_receipt_no' => $this->input->post('fees_receipt_no'),
					'fees_receipt_date' => $this->input->post('fees_receipt_date'),

					'status' => '1',
					'admit_date' => date('Y-m-d h:i:s'),
					'admit_by' => $data['username']
				);

				$result = $this->admin_model->insertDetails('admissions', $insertDetails);

				$insertDetails1 = array(
					'student_id' => $result,
					'academic_year' => $currentAcademicYear,
					'student_name' => strtoupper($this->input->post('student_name')),
					'dept_id' => $course,
					'year' => date("y"),
					'total_university_fee' => $total_university_fee,
					'total_tution_fee' => $total_tution_fee,
					'total_college_fee' => $total_college_fee,
					'corpus_fund' => $corpus,
					'final_fee' => $final_amount,
					'consession_type' => $concession_type,
					'consession_amount' => $concession_fee,
					'status' => '1',
					'last_updated_on' => date('Y-m-d h:i:s'),
					'last_updated_by' => $data['username']

				);
				if ($result) {
					$result1 = $this->admin_model->insertDetails('fee_master', $insertDetails1);
				}
				if ($result1) {
					$email['name'] = strtoupper($this->input->post('student_name'));
					$email['mobile'] = strtolower($this->input->post('email'));
					$email['password'] = $this->input->post('mobile');
					$sender = strtolower($this->input->post('email'));
					$message = $this->load->view('email/registration', $email);
					$ci = &get_instance();
					$message = $ci->load->view('email/registration', $email, true);
					// $this->aws_sdk->triggerEmail($sender, 'MCE Online Admission Portal Registration Successful - Complete Your Application Now!', $message);
					$this->aws_sdk->triggerEmail('admission@mcehassan.ac.in', 'MCE Online Admission Portal Registration Successful - Complete Your Application Now!', $message);
				}


				$sid = $result;
				$url = "./assets/students/$sid";
				if (!file_exists($url)) {
					mkdir($url, 0777);
				}

				if ($result) {
					$this->session->set_flashdata('message', 'Enquiry Details added successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-warning');
				}

				redirect('admin/admissions', 'refresh');
			}
		} else {
			redirect('admin', 'refresh');
		}
	}

	function blockStudent()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Admit Studnet';
			$data['menu'] = 'admissions';

			$id = $this->input->post('id');

			$comments = "As per the Orders of Chairman, a seat in " . $this->input->post('course_val') . " is being blocked.";

			$currentAcademicYear = $this->globals->currentAcademicYear();

			$updateDetails = array('quota' => $this->input->post('quota'), 'sub_quota' => $this->input->post('subquota'), 'remarks' => $this->input->post('remarks'), 'dept_id' => $this->input->post('dept_id'), 'status' => '7');

			$res = $this->admin_model->updateDetails($id, $updateDetails, 'enquiries');

			$insertDetails = array(
				'enq_id' => $id,
				'comments' => $comments,
				'given_by' => $data['username'],
				'given_on' => date('Y-m-d h:i:s')
			);

			$result = $this->admin_model->insertDetails('enq_comments', $insertDetails);
		} else {
			redirect('admin', 'refresh');
		}
	}

	public function users()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Users';
			$data['menu'] = 'users';

			$data['userTypes'] = $this->globals->userTypes();

			$data['users'] = $this->admin_model->getDetails('users', '')->result();

			$this->admin_template->show('admin/users', $data);
		} else {
			redirect('admin/timeout');
		}
	}

	function changepassword()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Change Password';
			$data['menu'] = 'changepassword';
			// $data['userDetails'] = $this->admin_model->getDetails('users', $data['id'])->row();

			// $this->form_validation->set_rules('oldPassword', 'Old Password', 'required');
			$this->form_validation->set_rules('oldpassword', 'Old Password', 'required');
			$this->form_validation->set_rules('newpassword', 'New Password', 'required');
			$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[newpassword]');

			if ($this->form_validation->run() === FALSE) {

				$data['action'] = 'admin/changepassword/' . $data['id'];
				$this->admin_template->show('admin/changepassword', $data);
			} else {
				// $oldPassword = $this->input->post('oldPassword');
				$oldpassword = $this->input->post('oldpassword');
				$newpassword = $this->input->post('newpassword');
				$confirmpassword = $this->input->post('confirmpassword');

				if ($oldpassword == $newpassword) {
					$this->session->set_flashdata('message', 'Old and New Password should not be same...!');
					$this->session->set_flashdata('status', 'alert-warning');
				} else {
					$updateDetails = array('password' => md5($newpassword));
					$result = $this->admin_model->AdminChangePassword($data['id'], $oldpassword, $updateDetails, 'users');
					// print_r($result); 
					// echo $this->db->last_query(); die;
					if ($result) {
						$this->session->set_flashdata('message', 'Password udpated successfully...!');
						$this->session->set_flashdata('status', 'alert-success');
					} else {
						$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
						$this->session->set_flashdata('status', 'alert-warning');
					}
				}
				redirect('/admin/changepassword', 'refresh');
			}
		} else {
			redirect('admin', 'refresh');
		}
	}

	public function collect_payment()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];



			$data['page_title'] = 'Collect Payment';
			$data['menu'] = 'collectpayment';
			// $data['admissionDetails'] = $this->admin_model->getDetails('admissions', $data['id'])->row();

			$this->form_validation->set_rules('mobile', 'Mobile', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'admin/collect_fee/' . $data['id'];
				$this->admin_template->show('admin/collect_payment', $data);
			} else {

				$mobile = $this->input->post('mobile');
				$details = $this->admin_model->getDetailsbyfield($mobile, 'mobile', 'admissions')->row();
				if ($details) {
					$student_id = $details->id;
					redirect('admin/collect_fee/' . $student_id, 'refresh');
				} else {
					redirect('admin/collect_payment', 'refresh');
				}
			}
		} else {
			redirect('admin/timeout');
		}
	}

	public function collect_fee($student_id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Collect Fee';
			$data['menu'] = 'collectfee';

			$data['currentAcademicYear'] = $this->globals->currentAcademicYear();
			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $student_id)->row();

			$data['transactionDetails'] = $this->admin_model->getDetailsbyfield($student_id, 'admissions_id', 'transactions')->result();
			$data['paid_amount'] = $this->admin_model->paidfee('admissions_id', $student_id, 'transaction_status', '1', 'transactions');


			// die();
			// var_dump($this->db->last_query());
			// die();
			// $data['transactionDetails'] = $this->admin_model->getDetailsbyfield( $admissions_id,'admissions_id','transactions')->row();
			// $data['admissionDetails'] = $this->admin_model->getDetails('admissions', $student_id)->row();
			$data['fees'] = $this->admin_model->getDetailsbyfield($student_id, 'student_id', 'fee_master')->row();

			$this->form_validation->set_rules('mode_of_payment', 'Mode of Payment', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'admin/collect_fee/' . $student_id;
				$this->admin_template->show('admin/collect_fee', $data);
			} else {

				$rec = $this->input->post('rec');
				$mode_of_payment = $this->input->post('mode_of_payment');
				$paid_amount = $this->input->post('paid_amount');

				$final_fee = $data['studentDetails']->final_fee;
				$total_college_fee = $data['studentDetails']->total_college_fee;
				$total_university_fee = $data['studentDetails']->total_university_fee;

				$current_balance_amount = $data['studentDetails']->final_amount - $data['paid_amount'];

				$paying_amount = 0;

				if ($mode_of_payment == "Cash") {
					$paying_amount = $this->input->post('cash_amount');
					$academic_year = "2024-2025";
					$receipt_no = 1;
					$transaction_date = date('Y-m-d');
					$transaction_type = '1';
					$bank_name = "";
					$reference_no = "";
					$reference_date = date('Y-m-d', strtotime($this->input->post('cash_date')));
					$paid_amount = "0";
					$remarks = '';
					$transaction_status = '1';
				}
				if ($mode_of_payment == "ChequeDD") {
					$paying_amount = $this->input->post('cheque_dd_amount');
					$academic_year = "2024-2025";
					$receipt_no = 0;
					$transaction_date = "";
					$transaction_type = '2';
					$bank_name = $this->input->post('cheque_dd_bank');
					$reference_no = $this->input->post('cheque_dd_number');
					$reference_date = date('Y-m-d', strtotime($this->input->post('cheque_dd_date')));
					$paid_amount = "0";
					$remarks = '';
					$transaction_status = '0';
				}
				if ($mode_of_payment == "OnlinePayment") {
					$paying_amount = $this->input->post('transaction_amount');
					$academic_year = "2024-2025";
					$receipt_no = 1;
					$transaction_date = date('Y-m-d');
					$transaction_type = '3';
					$bank_name = "";
					$reference_no = $this->input->post('transaction_id');
					$reference_date = date('Y-m-d', strtotime($this->input->post('transaction_date')));
					$paid_amount = "0";
					$remarks = '';
					$transaction_status = '1';
				}

				//    echo $data['studentDetails']->aided_unaided;
				//    echo "<br>";
				//    echo "Cur Balance:".$current_balance_amount;
				//    echo "<br>";
				//    echo "Paying:".$paying_amount;
				//    echo "<br>";

				$aided_fee = 0;
				$mgt_fee = 0;
				$unaided_fee = 0;

				if ($data['studentDetails']->aided_unaided === "Aided") {
					if ($final_amount == $current_balance_amount) {
						if ($paying_amount >= $total_college_fee) {
							$second_payment = $paying_amount - $total_college_fee;
							if ($second_payment == 0) {
								$aided_fee = $total_college_fee;
								$mgt_fee = 0;
							}
							if ($second_payment) {
								$aided_fee = $total_college_fee;
								$mgt_fee = $second_payment;
							}
						}
					} else {
						$aided_fee = 0;
						$mgt_fee = $paying_amount;
					}
				} else {
					$unaided_fee = $paying_amount;
				}

				//echo "<br>";
				//echo "Aided:".$aided_fee;
				//echo "<br>";
				//echo "Mgt:".$mgt_fee;
				//echo "<br>";
				//echo "UnAided:".$unaided_fee;

				//die;
				if ($aided_fee) {
					$adm_type = "Aided";
					if ($receipt_no) {
						$tag = $this->receiptPre[$adm_type];
						$receipt_no = null;
						$cnt_number = $this->getReceiptNo($adm_type);
						$receipt_no = $tag . $cnt_number;
					} else {
						$receipt_no = '';
					}
					// $balance_amount = $current_balance_amount - $aided_fee;    
					$balance_amount = 0;
					$transactionDetails = array(
						'academic_year' => "2024-2025",
						'admissions_id' => $data['admissionDetails']->id,
						'mobile' => $data['admissionDetails']->mobile,
						'aided_unaided' => $adm_type,
						'receipt_no' => $receipt_no,
						'year' => '1',
						'transaction_date' => date('Y-m-d'),
						'transaction_type' => $transaction_type,
						'bank_name' => $bank_name,
						'reference_no' => $reference_no,
						'reference_date' => $reference_date,
						'paid_amount' => $paid_amount,
						'amount' => $aided_fee,
						'balance_amount' => $balance_amount,
						'remarks' => $remarks,
						'transaction_status' => $transaction_status,
						'created_by' => $data['name'],
						'created_on' => date('Y-m-d h:i:s')
					);
					//print_r($transactionDetails);
					$result = $this->admin_model->insertDetails('transactions', $transactionDetails);
				}
				if ($mgt_fee) {
					$adm_type = "Mgt";
					if ($receipt_no) {
						$tag = $this->receiptPre[$adm_type];
						$receipt_no = null;
						$cnt_number = $this->getReceiptNo($adm_type);
						$receipt_no = $tag . $cnt_number;
					} else {
						$receipt_no = '';
					}
					$balance_amount = ($current_balance_amount - ($mgt_fee + $aided_fee));
					$transactionDetails = array(
						'academic_year' => "2024-2025",
						'admissions_id' => $data['admissionDetails']->id,
						'mobile' => $data['admissionDetails']->mobile,
						'aided_unaided' => $adm_type,
						'receipt_no' => $receipt_no,
						'year' => '1',
						'transaction_date' => date('Y-m-d'),
						'transaction_type' => $transaction_type,
						'bank_name' => $bank_name,
						'reference_no' => $reference_no,
						'reference_date' => $reference_date,
						'paid_amount' => $paid_amount,
						'amount' => $mgt_fee,
						'balance_amount' => $balance_amount,
						'remarks' => $remarks,
						'transaction_status' => $transaction_status,
						'created_by' => $data['name'],
						'created_on' => date('Y-m-d h:i:s')
					);
					//print_r($transactionDetails);
					$result = $this->admin_model->insertDetails('transactions', $transactionDetails);
				}
				if ($unaided_fee) {
					$adm_type = "UnAided";
					if ($receipt_no) {
						$tag = $this->receiptPre[$adm_type];
						$receipt_no = null;
						$cnt_number = $this->getReceiptNo($adm_type);
						$receipt_no = $tag . $cnt_number;
					} else {
						$receipt_no = '';
					}
					$balance_amount = $current_balance_amount - $unaided_fee;
					$transactionDetails = array(
						'academic_year' => "2024-2025",
						'admissions_id' => $data['admissionDetails']->id,
						'mobile' => $data['admissionDetails']->mobile,
						'aided_unaided' => $adm_type,
						'receipt_no' => $receipt_no,
						'year' => '1',
						'transaction_date' => date('Y-m-d'),
						'transaction_type' => $transaction_type,
						'bank_name' => $bank_name,
						'reference_no' => $reference_no,
						'reference_date' => $reference_date,
						'paid_amount' => $paid_amount,
						'amount' => $unaided_fee,
						'balance_amount' => $balance_amount,
						'remarks' => $remarks,
						'transaction_status' => $transaction_status,
						'created_by' => $data['name'],
						'created_on' => date('Y-m-d h:i:s')
					);
					//print_r($transactionDetails);
					$result = $this->admin_model->insertDetails('transactions', $transactionDetails);
				}

				if ($rec) {
					$updateDetails = array('adm_date' => date('Y-m-d'));
					$res = $this->admin_model->updateDetails('admissions', $data['studentDetails']->id, $updateDetails);
				}

				if ($result) {
					$this->session->set_flashdata('message', 'Fee Payment details udpated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-warning');
				}
				redirect('admin/collect_fee/' . $student_id, 'refresh');
			}
		} else {
			redirect('admin/timeout');
		}
	}

	public function getReceiptNo($adm_type)
	{
		$cnt = $this->admin_model->getReceiptsCount($adm_type)->row()->cnt;
		$cnt_number = $cnt + 1;
		$strlen = strlen(($cnt_number));
		if ($strlen == 1) {
			$cnt_number = "000" . $cnt_number;
		}
		if ($strlen == 2) {
			$cnt_number = "00" . $cnt_number;
		}
		if ($strlen == 3) {
			$cnt_number = "0" . $cnt_number;
		}
		return $cnt_number;
	}

	public function admissionsletter_old($encryptId)
	{

		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Admission Details';
			$data['menu'] = 'admissions';

			// $id = $this->encrypt->decode(base64_decode($encryptId));
			$id = base64_decode($encryptId);

			$data['admissionStatus'] = $this->globals->admissionStatus();
			$data['admissionStatusColor'] = $this->globals->admissionStatusColor();
			$data['currentAcademicYear'] = $this->globals->currentAcademicYear();
			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $id)->row();

			$data['studentDetails'] = $this->admin_model->getDetails('admissions', 'id', $id)->row();
			$data['educations_details'] = $this->admin_model->getDetailsbyfield($id, 'id', 'student_education_details')->result();


			$this->load->library('fpdf'); // Load library
			ini_set("session.auto_start", 0);
			ini_set('memory_limit', '-1');
			define('FPDF_FONTPATH', 'plugins/font');
			$pdf = new FPDF('p', 'mm', 'A5');
			$pdf->AddPage();

			$pdf->Image('assets/img/mce_admit_letter.jpg', 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight());


			$topGap = 20;

			$pdf->SetY($topGap + 5);
			$pdf->SetFont('Arial', '', 7);
			$pdf->Cell(0, 3, "No.MCE/" . $this->admin_model->get_dept_by_id($data['admissionDetails']->dept_id)["department_short_name"] . "/" . $data['admissionDetails']->adm_no . "/" . $data['admissionDetails']->academic_year, 0, 1, 'L');
			$pdf->SetFont('Arial', 'B', 7);
			$pdf->Cell(0, 3, 'Ashok Haranahalli', 0, 1, 'L');
			$pdf->SetFont('Arial', '', 7);
			$pdf->Cell(0, 3, 'Chairman, Governing Council', 0, 1, 'L');
			$pdf->Cell(0, 3, 'of M.C.E. Hassan.', 0, 1, 'L');

			$pdf->SetXY(-30, $topGap + 5);
			$pdf->Cell(0, 10, 'Date:' . date('d-m-Y'), 0, 1, 'R');

			$pdf->SetFont('Arial', 'BU', 12);
			$pdf->SetY($topGap + 20);
			$pdf->Cell(0, 10, ': LETTER OF ALLOTMENT :', 0, 1, 'C');


			$pdf->SetFont('Arial', '', 9);

			$pdf->Ln(10);

			$content = "You have sought for admission to the 1st B.E., (Bachelor of Engineering course for the academic year " . $data['admissionDetails']->academic_year . " in our college (i.e,., Malnad College of Engineering.) 

We are pleased to provisionally offer you a seat for 1st year Bachelor of Engineering Course Four years duration in " . $this->admin_model->get_dept_by_id($data['admissionDetails']->dept_id)["department_name"] . ".

You are hereby informed to pay the requisite fee in the college. You are required to produce original marks card of 2nd PUC/10+2 at the College.
			
If the fees are not paid within the stipulated time. We presume you are no more interested in getting admission to our college and seat will be allotted to others. Any amount paid by you shall not be refunded. In case you decide to discontinue your studies without completing the four years duration you shall be liable to pay fee to the college for all the four years. The Malnad College of Engineering is one of the reputed college in the country.
			
We hope that you will utilize the facilities in the college, secure good marks and bring credit to our institution.

With good wishes";

			$pdf->SetY($topGap + 35);
			$pdf->MultiCell(0, 4, $content);


			$additionalDataY = $pdf->GetY() + 5;

			// Additional data after content
			$pdf->SetFont('Arial', 'B', 9);
			$pdf->SetY($additionalDataY);
			$pdf->Cell(0, 5, "To,", 0, 1, 'L');
			$pdf->SetFont('Arial', '', 8);
			$pdf->Cell(0, 4, $data['admissionDetails']->student_name, 0, 1, 'L');
			$pdf->Cell(0, 4, $data['admissionDetails']->father_name, 0, 1, 'L');
			// $pdf->Cell(0, 4, $data['admissionDetails']->present_address, 0, 1, 'L');
			$pdf->Cell(0, 4, "Mobile : " . $data['admissionDetails']->mobile, 0, 1, 'L');
			$pdf->Cell(0, 4, "Email : " . $data['admissionDetails']->email, 0, 1, 'L');
			$pdf->Cell(0, 4, "Aadhaar : " . $data['admissionDetails']->aadhaar, 0, 1, 'L');


			$fileName = $data['admissionDetails']->student_name . '-Admit_Letter.pdf';
			$pdf->output($fileName, 'D');
		} else {
			redirect('admin/timeout');
		}
	}

	public function admissionsdetails($encryptId)
	{

		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Admission Details';
			$data['menu'] = 'admissions';

			// $id = $this->encrypt->decode(base64_decode($encryptId));
			$id = base64_decode($encryptId);

			$data['admissionStatus'] = $this->globals->admissionStatus();
			$data['admissionStatusColor'] = $this->globals->admissionStatusColor();
			$data['currentAcademicYear'] = $this->globals->currentAcademicYear();
			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $id)->row();

			$data['studentDetails'] = $this->admin_model->getDetails('admissions', 'id', $id)->row();
			$data['educations_details'] = $this->admin_model->getDetailsbyfield($id, 'id', 'student_education_details')->result();

			// var_dump($data['educations_details']);
			// die();
			$currentAcademicYear = $this->globals->currentAcademicYear();

			$this->load->library('fpdf'); // Load library
			ini_set("session.auto_start", 0);
			ini_set('memory_limit', '-1');
			define('FPDF_FONTPATH', 'plugins/font');
			$pdf = new FPDF('p', 'mm', 'A5');
			$pdf->AddPage();

			$pdf->Image('assets/img/mce_admission_letter.jpeg', 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight());


			$row = 8;
			$topGap = 20;

			$pdf->SetY($topGap + 10);
			$pdf->SetTextColor(33, 33, 33);
			$pdf->setFont('Arial', 'BU', 12);
			$pdf->SetXY(20, 25);
			$pdf->Cell(0, 10, "Student Details" . $currentAcademicYear, 0, 0, 'C', false);

			$pdf->SetY($topGap + 15);
			$pdf->SetTextColor(33, 33, 33);
			$pdf->setFont('Arial', 'BU', 12);
			$pdf->SetXY(5, 30);
			$pdf->Cell(0, 10, "Admissions Details", 0, 0, 'C', false);
			// $y = $pdf->getY();
			// $pdf->setFont ('Arial','B',10);
			// $pdf->SetXY(5, $y+10); 
			// $pdf->Cell(0,10,"Student Name: ".$data['admissionDetails']->student_name,0,0,'L', false);
			// $pdf->SetXY(50, $y+10); 
			// $pdf->Cell(0,10, "Mobile: ".$data['admissionDetails']->mobile,0,0,'L', false);
			// $pdf->SetXY(95, $y+10); 
			// $pdf->Cell(0,10, "Email ID: ".$data['admissionDetails']->email,0,0,'L', false);

			// $y = $pdf->getY();
			// $pdf->setFont ('Arial','B',10);
			// $pdf->SetXY(5, $y+10); 
			// $pdf->Cell(0,10,"Aadhar Number: ".$data['admissionDetails']->aadhaar,0,0,'L', false);
			// $pdf->SetXY(65, $y+10); 
			// $pdf->Cell(0,10, "Department: ".$data['admissionDetails']->dept_id,0,0,'L', false);

			// $y = $pdf->getY();
			// $pdf->setFont ('Arial','B',10);
			// $pdf->SetXY(5, $y+10); 
			// $pdf->Cell(0,10,"College Code: ".$data['admissionDetails']->college_code,0,0,'L', false);
			// $pdf->SetXY(50, $y+10); 
			// $pdf->Cell(0,10, "Category Allotted: ".$data['admissionDetails']->category_allotted,0,0,'L', false);
			// $pdf->SetXY(95, $y+10); 
			// $pdf->Cell(0,10, "Category Claimed: ".$data['admissionDetails']->category_claimed,0,0,'L', false);

			// $y = $pdf->getY();
			// $pdf->setFont ('Arial','B',10);
			// $pdf->SetXY(5, $y+10); 
			// $pdf->Cell(0,10, "Quota: ".$data['admissionDetails']->quota,0,0,'L', false);
			// $pdf->SetXY(25, $y+10); 
			// $pdf->Cell(0,10,"Sub Quota: ".$data['admissionDetails']->sub_quota,0,0,'L', false);

			// $pdf->SetY($topGap + 110);
			// $pdf->SetTextColor(33,33,33);
			// $pdf->setFont ('Arial','BU',12);
			// $pdf->SetXY(120, 5); 
			// $pdf->Cell(0,10,"Student Details".$currentAcademicYear,0,0,'C', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Name of the Student", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->student_name, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Mobile Number", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->mobile, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Email ID", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->email, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Aadhar Number", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->aadhaar, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Department", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->dept_id, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Quota", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->quota, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Sub Quota", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->sub_quota, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Category Allocated", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->category_allotted, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Category Claimed", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->category_claimed, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "College Code", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->college_code, 1, 0, 'L', false);


			$pdf->SetY($topGap + 15);
			$pdf->SetTextColor(33, 33, 33);
			$pdf->setFont('Arial', 'BU', 12);
			$pdf->SetXY(5, 120);
			$pdf->Cell(0, 10, "Entrance Exam Details", 0, 0, 'C', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Entrance Type", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->entrance_type, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Entrance Register Number", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->entrance_reg_no, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Entrance Rank", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->entrance_rank, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Admission Order Number", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->admission_order_no, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Admission Order Date", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->admission_order_date, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Fees Paid", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->fees_paid, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Fees Receipt Number", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->fees_receipt_no, 1, 0, 'L', false);

			// $pdf->SetY($topGap + 180);
			// $pdf->SetY($topGap + 10);
			// $pdf->SetTextColor(33,33,33);
			// $pdf->setFont ('Arial','BU',12);
			// $pdf->SetXY(60, 60); 
			// $pdf->Cell(0,10,"Student Details".$currentAcademicYear,0,0,'C', false);


			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Fees Receipt Date", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, 10);
			$pdf->Cell(0, $row, $data['admissionDetails']->fees_receipt_date, 1, 0, 'L', false);

			$pdf->SetY($topGap + 18);
			$pdf->SetTextColor(33, 33, 33);
			$pdf->setFont('Arial', 'BU', 12);
			$pdf->SetXY(5, 18);
			$pdf->Cell(0, 10, "Personal Details", 0, 0, 'C', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Date of Birth", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->date_of_birth, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Gender", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->gender, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Sports", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->sports, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Blood Group", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->blood_group, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Place of Birth", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->place_of_birth, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Country of Birth", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->country_of_birth, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Nationality", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->nationality, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Religion", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->religion, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Mother Tongue", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->mother_tongue, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Caste", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->caste, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Disability", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->disability, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Type of Disability", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->type_of_disability, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Econimically Backward", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->economically_backward, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Domicile of State", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->domicile_of_state, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Hobbies", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->hobbies, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->SetTextColor(55, 55, 55);
			$pdf->setFont('Arial', 'B', 12);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Current Address", 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Current Address", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->current_address, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Current City", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->current_city, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Current District", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->current_district, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Current State", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->current_state, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Current Country", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, 10);
			$pdf->Cell(0, $row, $data['admissionDetails']->current_country, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Current Pincode", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->current_pincode, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->SetTextColor(55, 55, 55);
			$pdf->setFont('Arial', 'B', 12);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Permanent Address", 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Permanent Address", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->present_address, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Permanent City", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->present_city, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Permanent District", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->present_district, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Permanent State", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->present_state, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Permanent Country", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->present_country, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Permanent Pincode", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->present_pincode, 1, 0, 'L', false);

			$pdf->SetY($topGap + 18);
			$pdf->SetTextColor(33, 33, 33);
			$pdf->setFont('Arial', 'BU', 12);
			$pdf->SetXY(5, 90);
			$pdf->Cell(0, 10, "Parent's Details", 0, 0, 'C', false);

			$y = $pdf->getY();
			$pdf->SetTextColor(55, 55, 55);
			$pdf->setFont('Arial', 'B', 12);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Father Details", 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Name", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->father_name, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Mobile", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->father_mobile, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Email", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->father_email, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Occupation", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->father_occupation, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Annual Income", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->father_annual_income, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->SetTextColor(55, 55, 55);
			$pdf->setFont('Arial', 'B', 12);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Mother Details", 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Name", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->mother_name, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Mobile", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->mother_mobile, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Email", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->mother_email, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Occupation", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->mother_occupation, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Annual Income", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, 10);
			$pdf->Cell(0, $row, $data['admissionDetails']->mother_annual_income, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->SetTextColor(55, 55, 55);
			$pdf->setFont('Arial', 'B', 12);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Guardian Details", 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Name", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->guardian_name, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Mobile", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->guardian_mobile, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Email", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->guardian_email, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Occupation", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->guardian_occupation, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Annual Income", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->guardian_annual_income, 1, 0, 'L', false);

			// $pdf->SetY($topGap + 18);
			// $pdf->SetTextColor(33,33,33);
			// $pdf->setFont ('Arial','BU',12);
			// $pdf->SetXY(5, 90); 
			// $pdf->Cell(0,10,"Education Details",0,0,'C', false);

			// $y = $pdf->getY();
			// $pdf->setFont ('Arial','B',9);
			// $pdf->SetXY(10, $y+$row); 
			// $pdf->Cell(0,$row,"Level",1,0,'L', false);
			// $pdf->setFont ('Arial','',9);
			// $pdf->SetXY(50, $y+$row); 
			// $pdf->Cell(0,$row,$data['educations_details']->education_level,1,0,'L', false);

			$fileName = $data['admissionDetails']->student_name . '-Admission Details.pdf';
			$pdf->output($fileName, 'D');
		} else {
			redirect('admin/timeout');
		}
	}

	public function downloadReceipt($admission_id, $transaction_id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];



			$data['page_title'] = 'Download Receipt';
			$data['menu'] = 'downloadreceipt';
			// $id = base64_decode($encryptId);

			$currentAcademicYear = $this->globals->currentAcademicYear();
			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $admission_id)->row();
			$transactionDetails = $this->admin_model->getDetails('transactions', $transaction_id)->row();
			$admissionDetails = $this->admin_model->getDetails('admissions', $admission_id)->row();
			$paid_amount = $this->admin_model->paidfee('admissions_id', $admission_id, 'transaction_status', '1', 'transactions');



			$fees = $this->admin_model->getDetailsbyfield($admission_id, 'student_id', 'fee_master')->row();
			$balance_amount = $fees->final_fee - $paid_amount;

			$currentAcademicYear = $this->globals->currentAcademicYear();

			$this->load->library('fpdf'); // Load library
			ini_set("session.auto_start", 0);
			ini_set('memory_limit', '-1');
			// 			define('FPDF_FONTPATH','plugins/font');
			$pdf = new FPDF('p', 'mm', 'A5');
			$pdf->enableheader = 0;
			$pdf->enablefooter = 0;
			$pdf->AddPage();
			$pdf->Image(base_url() . 'assets/img/transaction1.jpg', 0, 0, 148);
			$pdf->setDisplayMode('fullpage');

			$row = 8;

			$pdf->SetTextColor(33, 33, 33);
			$pdf->setFont('Arial', 'BU', 12);
			$pdf->SetXY(20, 25);
			$pdf->Cell(0, 10, "FEE RECEIPT " . $currentAcademicYear, 0, 0, 'C', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 10);
			$pdf->SetXY(10, $y + 10);
			$pdf->Cell(0, 10, "Receipt No: " . $transactionDetails->receipt_no, 0, 0, 'L', false);
			$pdf->SetXY(100, $y + 10);
			$pdf->Cell(0, 10, "Date: " . date('d-m-Y', strtotime($transactionDetails->transaction_date)), 0, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Application No", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->app_no, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Name of the Student", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $data['admissionDetails']->student_name, 1, 0, 'L', false);

			if ($admissionDetails->dsc_1 == $admissionDetails->dsc_2) {
				$combination = $admissionDetails->dsc_1;
			} else {
				$combination = $admissionDetails->dsc_1 . ' - ' . $admissionDetails->dsc_2;
			}

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Course & Combination", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, 'I Year - B.E ' . $this->admin_model->get_dept_by_id($data['admissionDetails']->dept_id)["department_name"], 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Quota", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $admissionDetails->quota, 1, 0, 'L', false);
			$y = $pdf->getY();

			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "College Code", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $admissionDetails->sub_quota, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Mobile", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $transactionDetails->mobile, 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Fee Category", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$feeCategory = array("Aided" => "College Fee (A)", "UnAided" => "College Fee (UA)", "Mgt" => "Managemnt Fee(A)");
			$pdf->Cell(0, $row, $feeCategory[$transactionDetails->aided_unaided], 1, 0, 'L', false);

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Mode of Payment", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$transactionTypes = array("1" => "Cash", "2" => "Cheque/DD", "3" => "Online Payment");
			$pdf->Cell(0, $row, $transactionTypes[$transactionDetails->transaction_type], 1, 0, 'L', false);

			$final_amount = $admissionDetails->final_amount;
			$paid_amount = $transactionDetails->amount;
			$balance = $transactionDetails->balance_amount;
			// $final_amount - $paid_amount;

			if ($transactionDetails->transaction_type == 1) {

				$y = $pdf->getY();
				$pdf->setFont('Arial', 'B', 9);
				$pdf->SetXY(10, $y + $row);
				$pdf->Cell(0, $row, "Amount", 1, 0, 'L', false);
				$pdf->setFont('Arial', '', 9);
				$pdf->SetXY(50, $y + $row);
				$pdf->Cell(0, $row, "Rs." . number_format($transactionDetails->amount, 0) . "/-", 1, 0, 'L', false);

				$y = $pdf->getY();
				$pdf->setFont('Arial', 'B', 9);
				$pdf->SetXY(10, $y + $row);
				$pdf->Cell(0, $row, "Rupees (in words)", 1, 0, 'L', false);
				$pdf->setFont('Arial', '', 8);
				$pdf->SetXY(50, $y + $row);
				$pdf->Cell(0, $row, "Rs." . convert_number_to_words($paid_amount) . "/-", 1, 0, 'L', false);
			}

			if ($transactionDetails->transaction_type == 2) {

				$y = $pdf->getY();
				$pdf->setFont('Arial', 'B', 9);
				$pdf->SetXY(10, $y + $row);
				$pdf->Cell(0, $row, "Cheque/DD No & Date", 1, 0, 'L', false);
				$pdf->setFont('Arial', '', 9);
				$pdf->SetXY(50, $y + $row);
				$pdf->Cell(0, $row, $transactionDetails->reference_no . ' Dt:' . date('d-m-Y', strtotime($transactionDetails->reference_date)), 1, 0, 'L', false);

				$y = $pdf->getY();
				$pdf->setFont('Arial', 'B', 9);
				$pdf->SetXY(10, $y + $row);
				$pdf->Cell(0, $row, "Name of the Bank", 1, 0, 'L', false);
				$pdf->setFont('Arial', '', 9);
				$pdf->SetXY(50, $y + $row);
				$pdf->Cell(0, $row, $transactionDetails->bank_name, 1, 0, 'L', false);

				$y = $pdf->getY();
				$pdf->setFont('Arial', 'B', 9);
				$pdf->SetXY(10, $y + $row);
				$pdf->Cell(0, $row, "Amount", 1, 0, 'L', false);
				$pdf->setFont('Arial', '', 9);
				$pdf->SetXY(50, $y + $row);
				$pdf->Cell(0, $row, "Rs." . number_format($transactionDetails->amount, 0) . "/-", 1, 0, 'L', false);

				$y = $pdf->getY();
				$pdf->setFont('Arial', 'B', 9);
				$pdf->SetXY(10, $y + $row);
				$pdf->Cell(0, $row, "Rupees (in words)", 1, 0, 'L', false);
				$pdf->setFont('Arial', '', 8);
				$pdf->SetXY(50, $y + $row);
				$pdf->Cell(0, $row, "Rs." . convert_number_to_words($paid_amount) . "/-", 1, 0, 'L', false);
			}

			if ($transactionDetails->transaction_type == 3) {

				$y = $pdf->getY();
				$pdf->setFont('Arial', 'B', 9);
				$pdf->SetXY(10, $y + $row);
				$pdf->Cell(0, $row, "Reference No & Date", 1, 0, 'L', false);
				$pdf->setFont('Arial', '', 9);
				$pdf->SetXY(50, $y + $row);
				$pdf->Cell(0, $row, $transactionDetails->reference_no . ' Dt:' . date('d-m-Y', strtotime($transactionDetails->reference_date)), 1, 0, 'L', false);
				$y = $pdf->getY();
				$pdf->setFont('Arial', 'B', 9);
				$pdf->SetXY(10, $y + $row);
				$pdf->Cell(0, $row, "Amount", 1, 0, 'L', false);
				$pdf->setFont('Arial', '', 9);
				$pdf->SetXY(50, $y + $row);
				$pdf->Cell(0, $row, "Rs." . number_format($transactionDetails->amount, 0) . "/-", 1, 0, 'L', false);

				$y = $pdf->getY();
				$pdf->setFont('Arial', 'B', 9);
				$pdf->SetXY(10, $y + $row);
				$pdf->Cell(0, $row, "Rupees (in words)", 1, 0, 'L', false);
				$pdf->setFont('Arial', '', 8);
				$pdf->SetXY(50, $y + $row);
				$pdf->Cell(0, $row, "Rs." . convert_number_to_words($paid_amount) . "/-", 1, 0, 'L', false);
			}

			if ($transactionDetails->aided_unaided != "Aided") {
				$y = $pdf->getY();
				$pdf->setFont('Arial', 'B', 9);
				$pdf->SetXY(10, $y + $row);
				$pdf->Cell(0, $row, "Balance Amount", 1, 0, 'L', false);
				$pdf->setFont('Arial', '', 9);
				$pdf->SetXY(50, $y + $row);
				$pdf->Cell(0, $row, "Rs." . number_format($balance_amount, 2) . "/-", 1, 0, 'L', false);
			}

			$y = $pdf->getY();
			$pdf->setFont('Arial', 'B', 9);
			$pdf->SetXY(10, $y + $row);
			$pdf->Cell(0, $row, "Remarks", 1, 0, 'L', false);
			$pdf->setFont('Arial', '', 9);
			$pdf->SetXY(50, $y + $row);
			$pdf->Cell(0, $row, $transactionDetails->remarks, 1, 0, 'L', false);

			if ($transactionDetails->transaction_status == 2) {
				$y = $pdf->getY();
				$pdf->setFont('Arial', 'B', 14);
				$pdf->SetXY(20, $y + 20);
				$pdf->SetTextColor(255, 40, 0);
				$pdf->Cell(0, $row, "RECEIPT CANCELLED", 0, 0, 'L', false);
			} else {
				// $y = $pdf->getY();
				// $pdf->setFont('Arial', 'B', 10);
				// $pdf->SetXY(20, $y + 20);
				// $pdf->Cell(0, $row, "Clerk", 0, 0, 'L', false);
				// $pdf->setFont('Arial', 'B', 10);
				// $pdf->SetXY(100, $y + 20);
				// $pdf->Cell(0, $row, "Principal", 0, 0, 'L', false);
			}

			// Var_dump( $pdf->output());
			// die();
			$fileName = $transactionDetails->receipt_no . '.pdf';
			// var_dump($transactionDetails);
			// $pdf->output();
			$pdf->output($fileName, 'D');
		} else {
			redirect('admin/timeout');
		}
	}

	public function dcb_report($download = 0)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$currentAcademicYear = $this->globals->currentAcademicYear();
			$data['page_title'] = $currentAcademicYear . ' REPORT DEMAND COLLECTION BALANCE (DCB)';
			$data['menu'] = 'DCBReport';

			$data['download_action'] = 'admin/dcb_report';

			$currentAcademicYear = $this->globals->currentAcademicYear();
			// $admissions = $this->admin_model->DCBReport($currentAcademicYear)->result();
			$admissions = $this->admin_model->DCBReport($currentAcademicYear)->result();

			// var_dump($admissions);

			$fees = $this->admin_model->feeDetails()->result();
			$feeDetails = array();
			foreach ($fees as $fees1) {
				$feeDetails[$fees1->admissions_id] = $fees1->paid_amount;
			}

			$table_setup = array('table_open' => '<table class="table table-bordered" border="1" id="example2" >');
			$this->table->set_template($table_setup);
			// $table_setup = array ('table_open'=> '<table class="table table-bordered font14" border="1" id="dataTable" >');
			// $this->table->set_template($table_setup);

			$print_fields = array('S.No', 'Course', 'Student Name', 'Mobile', 'Admit. Date', 'Total Fee', 'Fees Paid', 'Balance amount',  'Remarks');

			$this->table->set_heading($print_fields);

			$i = 1;
			$final_fee = 0;
			$fees_paid = 0;
			$balance_amount = 0;
			foreach ($admissions as $admissions1) {
				$dmm = $this->admin_model->get_dept_by_id($admissions1->dept_id)["department_name"];

				// if($admissions1->dsc_1 == $admissions1->dsc_2){
				//     $combination = $admissions1->dsc_1;
				// }else{
				//     $combination = $admissions1->dsc_1.' - '.$admissions1->dsc_2;
				// }
				$fees_data= $this->admin_model->getDetailsbyfield($admissions1->id, 'student_id', 'fee_master')->row();
				$balance_amount_data = $fees_data->final_fee - $feeDetails[$admissions1->id];
				$paid_amount = (array_key_exists($admissions1->id, $feeDetails)) ? $feeDetails[$admissions1->id] : '0';
				$balance_amount = $admissions1->final_fee - $paid_amount;
				$result_array = array(
					$i++,
					// $admissions1->academic_year,
					// $admissions1->reg_no,
					$dmm,
					$admissions1->student_name,
					$admissions1->mobile,
					($admissions1->admit_date != "0000-00-00") ? date('d-m-Y', strtotime($admissions1->admit_date)) : '',
					number_format($fees_data->final_fee, 0),
					number_format($feeDetails[$admissions1->id], 0),
					number_format($balance_amount_data,0),
					// ($admissions1->next_due_date != "0000-00-00") ? date('d-m-Y', strtotime($admissions1->next_due_date)) : '',
					$admissions1->remarks
				);
				// var_dump($result_array);
				$this->table->add_row($result_array);
				$final_fee = $final_fee + $admissions1->total_college_fee;
				$fees_paid =  $fees_paid + $paid_amount;
				$balance_amount =  $balance_amount + $balance_amount;
			}

			$data['table'] = $this->table->generate();
			// var_dump($data['table']); die();
			if (!$download) {
				$this->admin_template->show('admin/dcb_report', $data);
			} else {
				$response =  array(
					'op' => 'ok',
					'file' => "data:application/vnd.ms-excel;base64," . base64_encode($data['table'])
				);
				die(json_encode($response));
			}
		} else {
			redirect('admin/timeout');
		}
	}

	public function daybook_report()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Day Book Report';
			$data['menu'] = 'dayBookReport';

			$data['feeStructure'] = $this->globals->courseFees();

			// var_dump($data['feeStructure']);
			// echo "<pre>";
			// print_r($data['feeStructure']); die;

			$data['admissionStatus'] = $this->globals->admissionStatus();
			$data['courses'] = array("all" => "All") + $this->globals->courses();
			$data['academicYears'] = array(" " => "Select") + $this->globals->academicYear();

			$this->admin_template->show('admin/daybook_report', $data);
		} else {
			redirect('admin/timeout');
		}
	}

	public function dayBookReportDownload()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Day Book Report';
			$data['menu'] = 'dayBookReport';

			// $data['feeTypes'] = $this->globals->feeTypes();
			$data['feeTypesMgt'] = $this->globals->feeTypesMgt();
			$courseCombination = $this->globals->courseCombination();

			// var_dump($data['feeStructure']);
			$table_headings = array('S.No', 'Date', 'Student Name', 'Mobile', 'Class', 'Aided/Un-Aided', 'Category', 'Receipt No.', 'Bank Name', 'DD / Cheque / Challan No. & Date', 'Paid (Rs.)', 'Balance (Rs.)');

			array_splice($table_headings, count($table_headings), 0, $data['transaction_type']);

			array_splice($table_headings, count($table_headings), 0, $data['feeTypesMgt']);

			$from_date = $this->input->post('from_date');
			$to_date = $this->input->post('to_date');

			$details = $this->admin_model->dayBookReport($from_date, $to_date)->result();

			$table_setup = array('table_open' => '<table class="table table-bordered font14" border="1">');
			$this->table->set_template($table_setup);
			$this->table->set_heading($table_headings);

			$i = 1;
			foreach ($details as $details1) {

				if ($details1->category == "GM" || $details1->category == "2A" || $details1->category == "2B" || $details1->category == "3A" || $details1->category == "3B") {
					$category = "1";
				} else {
					$category = "2";
				}
				// $combination = null;
				// if (array_key_exists($details1->course,$courseCombination)){
				//     if (array_key_exists($details1->dsc_1,$courseCombination[$details1->course])){
				//         $combination = $details1->dsc_1;    
				//     }
				// }

				// $fee = $this->admin_model->feeStructure($details1->course, $combination, $category, $details1->aided_unaided)->row();

				// if($details1->dsc_1 == $details1->dsc_2){
				//     $combination = $details1->dsc_1;
				// }else{
				//     $combination = $details1->dsc_1.' - '.$details1->dsc_2;
				// }

				$result_array = array(
					$i++,
					date('d-m-Y', strtotime($details1->transaction_date)),
					$details1->student_name,
					$details1->mobile,
					$details1->course . ' [' . $combination . ']',
					$details1->aided_unaided,
					$details1->category . ' ' . $category,
					$details1->receipt_no,
					$details1->bank_name,
					$details1->reference_no . ' ' . $details1->reference_date,
					//  $details1->final_amount,
					//  $details1->paid_amount,
					$details1->amount,
					$details1->balance_amount
				);
				$already_paid = $details1->paid_amount;
				$paid_amount = $details1->amount;
				if ($fee) {
					$balance_amount = 0;
					$test = 0;
					$balance_amount1 = 0;
					for ($f = 1; $f <= 28; $f++) {
						$field = "field_" . $f;
						// PREVISOULY PAID AMOUNT - LESS
						if ($already_paid > 0) {
							$fee_amount = $fee->$field;
							// $balance_amount = 0;
							$balance_amount = $already_paid - $fee->$field;
							if ($balance_amount > 0) {
								$display_amount = 0;
							} else {
								$feeField = - ($balance_amount);

								// PAID AMT
								if ($paid_amount < 0) {
									$display_amount = 0;
								} else {
									$balance_amount1 = $paid_amount - $feeField;
									if ($balance_amount1 < 0) {
										$display_amount = $paid_amount;
									} else {
										$display_amount = $feeField;
									}
									$paid_amount = $balance_amount1;
								}
								// PAID AMT

							}
							$already_paid = $balance_amount;

							// PREVISOULY PAID AMOUNT - LESS
						} else {
							// NOW PAID AMOUNT - ADD
							if ($paid_amount < 0) {
								//   $fee_amount = "0<br>".$fee->$field."<br>".$balance_amount;    
								$display_amount = 0;
							} else {
								$balance_amount = $paid_amount - $fee->$field;
								// $fee_amount = $fee->$field;
								// $fee_amount = $paid_amount."<br>".$fee->$field."<br>".$balance_amount;
								if ($balance_amount < 0) {
									$display_amount = $paid_amount;
								} else {
									$display_amount = $fee->$field;
								}
								$paid_amount = $balance_amount;
							}
							// NOW PAID AMOUNT
						}

						$fee_amount = $fee->$field . '<br>' . $display_amount . "<br>" . $balance_amount;
						$fee_amount = $display_amount;
						$test = $test + $display_amount;
						array_push($result_array, $fee_amount);
					}
					// array_push($result_array, $test);
				}
				$this->table->add_row($result_array);
			}

			$detailsTable = $this->table->generate();

			if ($download == 1) {
				$response =  array(
					'op' => 'ok',
					'file' => "data:application/vnd.ms-excel;base64," . base64_encode($detailsTable)
				);
				die(json_encode($response));
			} else {
				$data['admissions'] = $details;
				$this->admin_template->show('admin/daybook_report', $data);
			}
		} else {
			redirect('admin/timeout');
		}
	}

	public function studentdetails_report($download = '')
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Student Details Report';
			$data['menu'] = 'reports';
			$data['report_type'] = $report;
			$admissionStatus = $this->globals->admissionStatus();
			$admissionStatusColor = $this->globals->admissionStatusColor();
			$data['currentAcademicYear'] = $this->globals->currentAcademicYear();
			$data['admissionStatus'] = array(" " => "Select Admission Status") + $this->globals->admissionStatus();
			$data['course_options'] = array(" " => "Select") + $this->courses();
			$data['action'] = 'admin/studentdetails_report';
			$this->form_validation->set_rules('course', 'Branch Preference-I', 'required');
			if ($this->form_validation->run() === FALSE) {

				$this->admin_template->show('admin/studentdetails_report', $data);
			} else {
				$data['course'] = $this->input->post('course');
				$data['status'] = $this->input->post('admission_status');



				$admissions = $this->admin_model->getAdmissions_course($data['currentAcademicYear'], $data['course'], $data['status'])->result();

				if (count($admissions)) {
					$table_setup = array('table_open' => '<table class="table table-bordered" border="1" id="example2" >');
					$this->table->set_template($table_setup);
					$table_headings = array('S.No', 'Applicant Name', 'Mobile', 'Course', 'Aadhaar Number', 'Quota', 'Sub Quota', 'Status', 'Admit. Date');


					$selectedValues = $this->input->post('selectedValues');
					if ($selectedValues) {
						foreach ($selectedValues as $selectedValues1) {
							if ($selectedValues1 == "date_place_of_birth") {
								$select = $select . ",date_of_birth, place_of_birth";
								$table_headings[] = 'Date of Birth';
								$table_headings[] = 'Place of Birth';
							}
							if ($selectedValues1 == "caste_category") {
								$select = $select . ",caste, category_claimed";
								$table_headings[] = 'Caste';
								$table_headings[] = 'Category';
							}
							if ($selectedValues1 == "nationality") {
								$select = $select . ",nationality";
								$table_headings[] = 'Nationality';
							}
							if ($selectedValues1 == "religion") {
								$select = $select . ",religion";
								$table_headings[] = 'Religion';
							}
							if ($selectedValues1 == "aadhar") {
								$select = $select . ",aadhar";
								$table_headings[] = 'Aadhar';
							}

							if ($selectedValues1 == "current_address") {
								$select = $select . ",current_address,current_city,current_district,current_state,current_pincode";
								$table_headings[] = 'Current Location';
								$table_headings[] = 'Current City';
								$table_headings[] = 'Current District';
								$table_headings[] = 'Current State';
								$table_headings[] = 'Current Pincode';
							}

							if ($selectedValues1 == "present_address") {
								$select = $select . ",present_address,present_city,present_district,present_state,present_pincode";
								$table_headings[] = 'Present Location';
								$table_headings[] = 'Present City';
								$table_headings[] = 'Present District';
								$table_headings[] = 'Present State';
								$table_headings[] = 'Present Pincode';
							}

							if ($selectedValues1 == "father_details") {
								$select = $select . ",father_name, father_occupation, father_mobile, father_email, father_annual_income";
								$table_headings[] = 'Father Name';
								$table_headings[] = 'Father Occupation';
								$table_headings[] = 'Father Mobile';
								$table_headings[] = 'Father Email';
								$table_headings[] = 'Father Annual Income';
							}

							if ($selectedValues1 == "mother_details") {
								$select = $select . ",mother_name, mother_occupation, mother_mobile, mother_email, mother_annual_income";
								$table_headings[] = 'Mother Name';
								$table_headings[] = 'Mother Occupation';
								$table_headings[] = 'Mother Mobile';
								$table_headings[] = 'Mother Email';
								$table_headings[] = 'Mother Annual Income';
							}

							if ($selectedValues1 == "guardian_details") {
								$select = $select . ",guardian_name, guardian_occupation, guardian_mobile, guardian_email, guardian_annual_income";
								$table_headings[] = 'Guardian Name';
								$table_headings[] = 'Guardian Occupation';
								$table_headings[] = 'Guardian Mobile';
								$table_headings[] = 'Guardian Email';
								$table_headings[] = 'Guardian Annual Income';
							}

							if ($selectedValues1 == "previous_exam_details") {
								$select = $select . ",entrance_type, entrance_reg_no, entrance_rank, admission_order_no, admission_order_date";
								$table_headings[] = 'Entrance Type';
								$table_headings[] = 'Entrance Register Number';
								$table_headings[] = 'Entrance Rank';
								$table_headings[] = 'Admission Order Number';
								$table_headings[] = 'Admission Order Date';
							}

							if ($selectedValues1 == "other_details") {
								$select = $select . ",sports,ncc,nss";
								$table_headings[] = 'Sports';
								$table_headings[] = 'NCC';
								$table_headings[] = 'NSS';
							}
						}
					}

					$this->table->set_heading($table_headings);

					$i = 1;
					foreach ($admissions as $admissions1) {
						$dmp = $this->admin_model->get_dept_by_id($admissions1->dept_id)["department_name"];
						$result_array = array(
							$i++,
							//   $enquiries1->academic_year,
							$admissions1->student_name,
							$admissions1->mobile,
							$dmp,
							$admissions1->aadhaar,
							$admissions1->quota,
							$admissions1->sub_quota,
							'<strong class="text-' . $admissionStatusColor[$admissions1->status] . '">' . $admissionStatus[$admissions1->status] . '</strong>',
							date('d-m-Y h:i A', strtotime($admissions1->admit_date))
						);


						if ($selectedValues) {
							foreach ($selectedValues as $selectedValues1) {
								if ($selectedValues1 == "date_place_of_birth") {
									$result_array[] = $admissions1->date_of_birth;
									$result_array[] = $admissions1->place_of_birth;
								}
								if ($selectedValues1 == "caste_category") {
									$result_array[] = $admissions1->caste;
									$result_array[] = $admissions1->category_claimed;
								}
								if ($selectedValues1 == "nationality") {
									$result_array[] = $admissions1->nationality;
								}
								if ($selectedValues1 == "religion") {
									$result_array[] = $admissions1->religion;
								}
								if ($selectedValues1 == "aadhar") {
									$result_array[] = $admissions1->aadhar;
								}

								if ($selectedValues1 == "current_address") {
									$result_array[] = $admissions1->current_address;
									$result_array[] = $admissions1->current_city;
									$result_array[] = $admissions1->current_district;
									$result_array[] = $admissions1->current_state;
									$result_array[] = $admissions1->current_pincode;
								}

								if ($selectedValues1 == "present_address") {
									$result_array[] = $admissions1->present_address;
									$result_array[] = $admissions1->present_city;
									$result_array[] = $admissions1->present_district;
									$result_array[] = $admissions1->present_state;
									$result_array[] = $admissions1->present_pincode;
								}

								if ($selectedValues1 == "father_details") {
									$result_array[] = $admissions1->father_name;
									$result_array[] = $admissions1->father_occupation;
									$result_array[] = $admissions1->father_mobile;
									$result_array[] = $admissions1->father_email;
									$result_array[] = $admissions1->father_annual_income;
								}

								if ($selectedValues1 == "mother_details") {
									$result_array[] = $admissions1->mother_name;
									$result_array[] = $admissions1->mother_occupation;
									$result_array[] = $admissions1->mother_mobile;
									$result_array[] = $admissions1->mother_email;
									$result_array[] = $admissions1->mother_annual_income;
								}

								if ($selectedValues1 == "guardian_details") {
									$result_array[] = $admissions1->guardian_name;
									$result_array[] = $admissions1->guardian_occupation;
									$result_array[] = $admissions1->guardian_mobile;
									$result_array[] = $admissions1->guardian_email;
									$result_array[] = $admissions1->guardian_annual_income;
								}

								if ($selectedValues1 == "previous_exam_details") {
									$result_array[] = $admissions1->entrance_type;
									$result_array[] = $admissions1->entrance_reg_no;
									$result_array[] = $admissions1->entrance_rank;
									$result_array[] = $admissions1->admission_order_no;
									$result_array[] = $admissions1->admission_order_date;
								}


								if ($selectedValues1 == "other_details") {
									$result_array[] = $admissions1->sports;
									$result_array[] = $admissions1->ncc;
									$result_array[] = $admissions1->nss;
								}
							}
						}
						$this->table->add_row($result_array);
					}
					$details = $this->table->generate();
				} else {
					$details = 'No student details found';
				}
				$data['selected_values'] = $selectedValues;
				// Var_dump($this->db->last_query()); 
				if ($download == 1) {
					$response =  array(
						'op' => 'ok',
						'file' => "data:application/vnd.ms-excel;base64," . base64_encode($details)
					);
					die(json_encode($response));
				} else {
					$data['admissions'] = $details;
					$this->admin_template->show('admin/studentdetails_report', $data);
				}
			}
		} else {
			redirect('admin/timeout');
		}
	}

	public function admissionscroll_report($download = 0)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$currentAcademicYear = $this->globals->currentAcademicYear();
			$data['page_title'] = $currentAcademicYear . ' ADMISSION SCROLL REPORT';
			$data['menu'] = 'AdmissionScrollReport';

			$data['download_action'] = 'admin/AdmissionScrollReport/1';

			$currentAcademicYear = $this->globals->currentAcademicYear();
			$transactions = $this->admin_model->transactions('1')->result();
			$transactionTypes = $this->globals->transactionTypes();

			// 			print_r($transactions); 
			if ($download) {
				$table = "<table class='table table-bordered' border='1'  id='example2' >";
			} else {
				$table = "<table class='table table-bordered font14' border='1' id='example2' >";
			}
			$table .= '<thead>';
			if ($download) {
				$table .= '<tr><th colspan="11" class="font20">' . $currentAcademicYear . ' ADMISSION SCROLL</th></tr>';
			}
			$table .= '<tr><th>S.No</th>
			               <th> Student Name </th>
						    <th> Department Name </th>
			               <th> Receipt No. </th>
			              
			               <th> Mode of Payment </th>
			               <th> Reference No. </th>
			               <th> Reference Date </th>
			               <th> Bank Name </th>
			               <th> Amount </th>
						    <th> Date </th>
			          </tr>';

			$table .= '</thead>';
			$table .= '<tbody>';
			$i = 1;
			foreach ($transactions as $transactions1) {
				//  print_r($transactions1); 
				// if($transactions1->dsc_1 == $transactions1->dsc_2){
				//     $combination = $transactions1->dsc_1;
				// }else{
				//     $combination = $transactions1->dsc_1.' - '.$transactions1->dsc_2;
				// }
				
				$table .= '<tr>';
				$table .= '<td>' . $i++ . '</td>';
				$table .= '<td>' . $transactions1->student_name . '</td>';
				$table .= '<td>' . $this->admin_model->get_dept_by_id($transactions1->dept_id)["department_name"] . '</td>';
				//  $table .= '<td>'.$transactions1->course.'</td>';   
				//  $table .= '<td>'.$combination.'</td>';   
				$table .= '<td>' . $transactions1->receipt_no . '</td>';
				
				$table .= '<td>' . $transactionTypes[$transactions1->transaction_type] . '</td>';
				$table .= '<td>' . $transactions1->reference_no . '</td>';
				$table .= '<td>' . date('d-m-Y', strtotime($transactions1->reference_date)) . '</td>';
				$table .= '<td>' . $transactions1->bank_name . '</td>';
				$table .= '<td>' . number_format($transactions1->amount, 0) . '</td>';
				$table .= '<td>' . date('d-m-Y', strtotime($transactions1->transaction_date)) . '</td>';
				$table .= '</tr>';
			}
			$table .= '</tbody>';
			$table .= '</table>';
			$data['table'] = $table;
			if (!$download) {
				$this->admin_template->show('admin/admissionscroll_report', $data);
			} else {
				$response =  array(
					'op' => 'ok',
					'file' => "data:application/vnd.ms-excel;base64," . base64_encode($data['table'])
				);
				die(json_encode($response));
			}
		} else {
			redirect('admin/timeout');
		}
	}

	public function category_admissions_report($download = '')
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'CATEGORY ADMISSIONS REPORT';
			$data['menu'] = 'reports';
			// $data['report_type'] = $report;
			$admissionStatus = $this->globals->admissionStatus();
			$admissionStatusColor = $this->globals->admissionStatusColor();
			$data['currentAcademicYear'] = $this->globals->currentAcademicYear();
			$data['course_options'] = array(" " => "Select") + $this->courses();
			$data['type_options'] = array(" " => "Select") + $this->globals->category();
			$data['action'] = 'admin/category_admissions_report';
			$this->form_validation->set_rules('category', 'Category', 'required');
			if ($this->form_validation->run() === FALSE) {

				$this->admin_template->show('admin/category_admissions_report', $data);
			} else {
				$data['category'] = $this->input->post('category');

				$admissions = $this->admin_model->getAdmissions_category($data['currentAcademicYear'], $data['category'])->result();

				// var_dump($admissions); die();

				if (count($admissions)) {
					$table_setup = array('table_open' => '<table class="table table-bordered" border="1" id="example2" >');
					$this->table->set_template($table_setup);
					$print_fields = array('S.No', 'Applicant Name', 'Mobile', 'Course', 'Aadhaar Number', 'Quota', 'Sub Quota', 'Status', 'Admit. Date');
					$this->table->set_heading($print_fields);

					$i = 1;
					foreach ($admissions as $admissions1) {
						$dmn = $this->admin_model->get_dept_by_id($admissions1->dept_id)["department_name"];
						$result_array = array(
							$i++,
							//   $enquiries1->academic_year,
							$admissions1->student_name,
							$admissions1->mobile,
							$dmn,
							$admissions1->aadhaar,
							$admissions1->quota,
							$admissions1->sub_quota,
							'<strong class="text-' . $admissionStatusColor[$admissions1->status] . '">' . $admissionStatus[$admissions1->status] . '</strong>',
							date('d-m-Y h:i A', strtotime($admissions1->admit_date))
						);
						$this->table->add_row($result_array);
						$course = $data['course_options'][$course_id];
					}
					$details = $this->table->generate();
				} else {
					$details = 'No student details found';
				}
				if ($download == 1) {
					$response =  array(
						'op' => 'ok',
						'file' => "data:application/vnd.ms-excel;base64," . base64_encode($details)
					);
					die(json_encode($response));
				} else {
					$data['admissions'] = $details;
					$this->admin_template->show('admin/category_admissions_report', $data);
				}
			}
		} else {
			redirect('admin/timeout');
		}
	}

	function updateadmissiondetails($encryptId)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];
			$data['page_title'] = "ADMISSION DETAILS";
			$data['menu'] = "admissiondetails";

			$data['academicYear'] = $this->globals->academicYear();
			$data['course_options'] = array(" " => "Select Branch") + $this->courses();
			$data['type_options'] = array(" " => "Select") + $this->globals->category();

			$id = base64_decode($encryptId);

			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $id)->row();


			$this->load->library('form_validation');

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			// $data['admissions'] = $this->admin_model->get_details_by_id($id, 'id', 'admissions');

			$this->form_validation->set_rules('student_name', 'Student Name', 'required');
			$this->form_validation->set_rules('mobile', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
			$this->form_validation->set_rules('aadhaar', 'Aadhaar Number', 'required|regex_match[/^[0-9]{12}$/]');
			$this->form_validation->set_rules('dept_id', 'Department Id', 'required');
			$this->form_validation->set_rules('quota', 'Quota', 'required');
			$this->form_validation->set_rules('sub_quota', 'sub_quota', 'required');
			$this->form_validation->set_rules('category_allotted', 'Category Allocated', 'required');
			$this->form_validation->set_rules('category_claimed', 'Category Claimed', 'required');
			$this->form_validation->set_rules('college_code', 'College Code', 'required');
			$this->form_validation->set_rules('sports', 'Sports', 'required');

			if ($this->form_validation->run() === FALSE) {

				$data['action'] = 'admin/updateadmissiondetails/' . $encryptId;

				$admissionDetails = $this->admin_model->getDetails('admissions', $id)->row();

				$data['student_name'] =  $admissionDetails->student_name;
				$data['mobile'] = $admissionDetails->mobile;
				$data['email'] = $admissionDetails->email;
				$data['aadhaar'] = $admissionDetails->aadhaar;
				$data['dept_id'] = $admissionDetails->dept_id;
				$data['quota'] = $admissionDetails->quota;
				$data['sub_quota'] = $admissionDetails->sub_quota;
				$data['category_allotted'] = $admissionDetails->category_allotted;
				$data['category_claimed'] = $admissionDetails->category_claimed;
				$data['college_code'] = $admissionDetails->college_code;
				$data['sports'] = $admissionDetails->sports;
				$this->admin_template->show('admin/updateadmissiondetails', $data);
			} else {
				$updateDetails = array(
					'student_name' => strtoupper($this->input->post('student_name')),
					'mobile' => $this->input->post('mobile'),
					'email' => strtolower($this->input->post('email')),
					'aadhaar' => $this->input->post('aadhaar'),
					'dept_id' => $this->input->post('dept_id'),
					'quota' => $this->input->post('quota'),
					'sub_quota' => $this->input->post('sub_quota'),
					'category_allotted' => $this->input->post('category_allotted'),
					'category_claimed' => $this->input->post('category_claimed'),
					'college_code' => $this->input->post('college_code'),
					'sports' => $this->input->post('sports'),
				);
				// print_r($updateDetails);
				// die();
				$result = $this->admin_model->updateDetails($id, $updateDetails, 'admissions');

				// var_dump($this->db->last_query());
				// die();
				if ($result) {
					$this->session->set_flashdata('message', 'Admission Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-warning');
				}

				redirect('admin/updateadmissiondetails/' . $encryptId, 'refresh');
			}
		} else {
			redirect('admin', 'refresh');
		}
	}


	function updateentranceexamdetails($encryptId)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Entrance Exam Details';
			$data['menu'] = 'Entranceexamdetails';
			$data['userTypes'] = $this->globals->userTypes();

			$id = base64_decode($encryptId);
			// var_dump($id); die();

			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $id)->row();
			// var_dump($data['admissionDetails']); die();

			$data['academicYear'] = $this->globals->academicYear();
			$data['type_options'] = array(" " => "Select") + $this->globals->category();


			$this->load->library('form_validation');

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			// $data['admissions'] = $this->admin_model->get_details_by_id($id, 'id', 'admissions');

			$this->form_validation->set_rules('entrance_type', 'Entrance Type', 'required');
			$this->form_validation->set_rules('entrance_reg_no', 'Entrance Registration Number', 'required');
			$this->form_validation->set_rules('entrance_rank', 'Entrance Exam Rank', 'required');
			$this->form_validation->set_rules('admission_order_no', 'Admission Order Number', '');
			$this->form_validation->set_rules('admission_order_date', 'Admission Order Date', '');
			$this->form_validation->set_rules('fees_paid', 'Fees Paid', '');
			$this->form_validation->set_rules('fees_receipt_no', 'Fees Receipt Number', '');
			$this->form_validation->set_rules('fees_receipt_date', 'Fees Receipt Date', '');

			if ($this->form_validation->run() === FALSE) {

				$data['action'] = 'admin/updateentranceexamdetails/' . $encryptId;

				$entranceDetails = $this->admin_model->getDetails('admissions', $id)->row();

				$data['entrance_type'] = $entranceDetails->entrance_type;
				$data['entrance_reg_no'] = $entranceDetails->entrance_reg_no;
				$data['entrance_rank'] = $entranceDetails->entrance_rank;
				$data['admission_order_no'] = $entranceDetails->admission_order_no;
				$data['admission_order_date'] = $entranceDetails->admission_order_date;
				$data['fees_paid'] = $entranceDetails->fees_paid;
				$data['fees_receipt_no'] = $entranceDetails->fees_receipt_no;
				$data['fees_receipt_date'] = $entranceDetails->fees_receipt_date;
				$this->admin_template->show('admin/updateentranceexamdetails', $data);
			} else {
				$updateDetails = array(
					'entrance_type' => $this->input->post('entrance_type'),
					'entrance_reg_no' => $this->input->post('entrance_reg_no'),
					'entrance_rank' => $this->input->post('entrance_rank'),
					'admission_order_no' => $this->input->post('admission_order_no'),
					'admission_order_date' => $this->input->post('admission_order_date'),
					'fees_paid' => $this->input->post('fees_paid'),
					'fees_receipt_no' => $this->input->post('fees_receipt_no'),
					'fees_receipt_date' => $this->input->post('fees_receipt_date'),
				);
				// print_r($updateDetails);
				// die();
				$result = $this->admin_model->updateDetails($id, $updateDetails, 'admissions');

				// var_dump($this->db->last_query());
				// die();
				if ($result) {
					$this->session->set_flashdata('message', 'Entrance Exam Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-warning');
				}

				redirect('admin/updateentranceexamdetails/' . $encryptId, 'refresh');
			}
		} else {
			redirect('admin', 'refresh');
		}
	}

	function updatepersonaldetails($encryptId)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Personal Details';
			$data['menu'] = 'personaldetails';
			$data['userTypes'] = $this->globals->userTypes();
			$id = base64_decode($encryptId);

			$data['states'] = array(" " => "Select State") + $this->globals->states();
			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $id)->row();
			// var_dump($data['admissionDetails']); die();

			$data['academicYear'] = $this->globals->academicYear();
			$data['type_options'] = array(" " => "Select") + $this->globals->category();

			$this->load->library('form_validation');

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			// $data['admissions'] = $this->admin_model->get_details_by_id($id, 'id', 'admissions');

			$this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required');
			$this->form_validation->set_rules('gender', 'Gender', 'required');
			$this->form_validation->set_rules('sports', 'Sports', 'required');
			$this->form_validation->set_rules('blood_group', 'Blood Group', 'required');
			$this->form_validation->set_rules('place_of_birth', 'Place of Birth', 'required');
			$this->form_validation->set_rules('country_of_birth', '	Country of Birth', 'required');
			$this->form_validation->set_rules('nationality', 'Nationality', 'required');
			$this->form_validation->set_rules('religion', 'Religion', 'required');
			$this->form_validation->set_rules('caste', 'Caste', 'required');
			$this->form_validation->set_rules('mother_tongue', 'Mother Tongue', 'required');
			$this->form_validation->set_rules('disability', 'Disability', 'required');
			$this->form_validation->set_rules('type_of_disability', 'Type of Disability');
			$this->form_validation->set_rules('economically_backward', 'Economically Backward', 'required');
			$this->form_validation->set_rules('domicile_of_state', 'Domicile of State', 'required');
			$this->form_validation->set_rules('hobbies', 'Hobbies', 'required');
			$this->form_validation->set_rules('current_address', 'Current Address', 'required');
			$this->form_validation->set_rules('current_city', 'Current City', 'required');
			$this->form_validation->set_rules('current_district', 'Current District', 'required');
			$this->form_validation->set_rules('current_state', 'Current State', 'required');
			$this->form_validation->set_rules('current_country', 'Current Country', 'required');
			$this->form_validation->set_rules('current_pincode', 'Current Pincode', 'required');
			$this->form_validation->set_rules('present_address', 'Present Address', 'required');
			$this->form_validation->set_rules('present_city', 'Present City', 'required');
			$this->form_validation->set_rules('present_district', 'Present District', 'required');
			$this->form_validation->set_rules('present_state', 'Present State', 'required');
			$this->form_validation->set_rules('present_country', 'Present Country', 'required');
			$this->form_validation->set_rules('present_pincode', 'Present Pincode', 'required');

			if ($this->form_validation->run() === FALSE) {

				$data['action'] = 'admin/updatepersonaldetails/' . $encryptId;

				$personalDetails = $this->admin_model->getDetails('admissions', $id)->row();
				// var_dump($personalDetails);
				// die();

				$data['date_of_birth'] = $personalDetails->date_of_birth;
				$data['gender'] = $personalDetails->gender;
				$data['sports'] = $personalDetails->sports;
				$data['blood_group'] = $personalDetails->blood_group;
				$data['place_of_birth'] = $personalDetails->place_of_birth;
				$data['country_of_birth'] = $personalDetails->country_of_birth;
				$data['nationality'] = $personalDetails->nationality;
				$data['religion'] = $personalDetails->religion;
				$data['caste'] = $personalDetails->caste;
				$data['mother_tongue'] = $personalDetails->mother_tongue;
				$data['disability'] = $personalDetails->disability;
				$data['type_of_disability'] = $personalDetails->type_of_disability;
				$data['economically_backward'] = $personalDetails->economically_backward;
				$data['domicile_of_state'] = $personalDetails->domicile_of_state;
				$data['hobbies'] = $personalDetails->hobbies;
				$data['current_address'] = $personalDetails->current_address;
				$data['current_city'] = $personalDetails->current_city;
				$data['current_district'] = $personalDetails->current_district;
				$data['current_state'] = $personalDetails->current_state;
				$data['current_country'] = $personalDetails->current_country;
				$data['current_pincode'] = $personalDetails->current_pincode;
				$data['present_address'] = $personalDetails->present_address;
				$data['present_city'] = $personalDetails->present_city;
				$data['present_district'] = $personalDetails->present_district;
				$data['present_state'] = $personalDetails->present_state;
				$data['present_country'] = $personalDetails->present_country;
				$data['present_pincode'] = $personalDetails->present_pincode;
				$this->admin_template->show('admin/updatepersonaldetails', $data);
			} else {
				$updateDetails = array(
					'date_of_birth' => $this->input->post('date_of_birth'),
					'gender' => $this->input->post('gender'),
					'sports' => $this->input->post('sports'),
					'blood_group' => $this->input->post('blood_group'),
					'place_of_birth' => $this->input->post('place_of_birth'),
					'country_of_birth' => $this->input->post('country_of_birth'),
					'nationality' => $this->input->post('nationality'),
					'religion' => $this->input->post('religion'),
					'caste' => $this->input->post('caste'),
					'mother_tongue' => $this->input->post('mother_tongue'),
					'disability' => $this->input->post('disability'),
					'type_of_disability' => $this->input->post('type_of_disability'),
					'economically_backward' => $this->input->post('economically_backward'),
					'domicile_of_state' => $this->input->post('domicile_of_state'),
					'hobbies' => $this->input->post('hobbies'),
					'current_address' => $this->input->post('current_address'),
					'current_city' => $this->input->post('current_city'),
					'current_district' => $this->input->post('current_district'),
					'current_state' => $this->input->post('current_state'),
					'current_country' => $this->input->post('current_country'),
					'current_pincode' => $this->input->post('current_pincode'),
					'present_address' => $this->input->post('present_address'),
					'present_city' => $this->input->post('present_city'),
					'present_district' => $this->input->post('present_district'),
					'present_state' => $this->input->post('present_state'),
					'present_country' => $this->input->post('present_country'),
					'present_pincode' => $this->input->post('present_pincode'),
				);
				// print_r($updateDetails);
				// die();
				$result = $this->admin_model->updateDetails($id, $updateDetails, 'admissions');

				// var_dump($result); die();

				// var_dump($this->db->last_query());
				// die();
				if ($result) {
					$this->session->set_flashdata('message', 'Personal Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-warning');
				}

				redirect('admin/updatepersonaldetails/' . $encryptId, 'refresh');
			}
		} else {
			redirect('admin', 'refresh');
		}
	}

	function updateparentsdetails($encryptId)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Parent Details';
			$data['menu'] = 'parentdetails';
			$data['userTypes'] = $this->globals->userTypes();
			$id = base64_decode($encryptId);

			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $id)->row();


			$this->load->library('form_validation');

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			// $data['admissions'] = $this->admin_model->get_details_by_id($id, 'id', 'admissions');

			$this->form_validation->set_rules('father_name', 'Father Name', 'required');
			$this->form_validation->set_rules('father_mobile', 'Father Mobile', 'required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('father_email', 'Father Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('father_occupation', 'Father Occupation', 'required');
			$this->form_validation->set_rules('father_annual_income', 'Father Annual Income', 'required');
			$this->form_validation->set_rules('mother_name', 'Mother Name', 'required');
			$this->form_validation->set_rules('mother_mobile', 'Mother Mobile', 'required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('mother_email', 'Mother Email', 'trim|valid_email');
			$this->form_validation->set_rules('mother_occupation', 'Mother Occupation');
			$this->form_validation->set_rules('mother_annual_income', 'Mother Annual Income');
			$this->form_validation->set_rules('guardian_name', 'Guardian Name', 'required');
			$this->form_validation->set_rules('guardian_mobile', 'Guardian Mobile', 'required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('guardian_email', 'Guardian Email', 'trim|valid_email');
			$this->form_validation->set_rules('guardian_occupation', 'Guardian Occupation');
			$this->form_validation->set_rules('guardian_annual_income', 'Guardian Annual Income');

			if ($this->form_validation->run() === FALSE) {

				$data['action'] = 'admin/updateparentsdetails/' . $encryptId;

				$parentDetails = $this->admin_model->getDetails('admissions', $id)->row();

				$data['father_name'] = $parentDetails->father_name;
				$data['father_mobile'] = $parentDetails->father_mobile;
				$data['father_email'] = $parentDetails->father_email;
				$data['father_occupation'] = $parentDetails->father_occupation;
				$data['father_annual_income'] = $parentDetails->father_annual_income;
				$data['mother_name'] = $parentDetails->mother_name;
				$data['mother_mobile'] = $parentDetails->mother_mobile;
				$data['mother_email'] = $parentDetails->mother_email;
				$data['mother_occupation'] = $parentDetails->mother_occupation;
				$data['mother_annual_income'] = $parentDetails->mother_annual_income;
				$data['guardian_name'] = $parentDetails->guardian_name;
				$data['guardian_mobile'] = $parentDetails->guardian_mobile;
				$data['guardian_email'] = $parentDetails->guardian_email;
				$data['guardian_occupation'] = $parentDetails->guardian_occupation;
				$data['guardian_annual_income'] = $parentDetails->guardian_annual_income;
				$this->admin_template->show('admin/updateparentsdetails', $data);
			} else {
				$updateDetails = array(
					'father_name' => $this->input->post('father_name'),
					'father_mobile' => $this->input->post('father_mobile'),
					'father_email' => $this->input->post('father_email'),
					'father_occupation' => $this->input->post('father_occupation'),
					'father_annual_income' => $this->input->post('father_annual_income'),
					'mother_name' => $this->input->post('mother_name'),
					'mother_mobile' => $this->input->post('mother_mobile'),
					'mother_email' => $this->input->post('mother_email'),
					'mother_occupation' => $this->input->post('mother_occupation'),
					'mother_annual_income' => $this->input->post('mother_annual_income'),
					'guardian_name' => $this->input->post('guardian_name'),
					'guardian_mobile' => $this->input->post('guardian_mobile'),
					'guardian_email' => $this->input->post('guardian_email'),
					'guardian_occupation' => $this->input->post('guardian_occupation'),
					'guardian_annual_income' => $this->input->post('guardian_annual_income'),
				);
				// print_r($updateDetails);
				// die();
				$result = $this->admin_model->updateDetails($id, $updateDetails, 'admissions');

				// var_dump($this->db->last_query());
				// die();
				if ($result) {
					$this->session->set_flashdata('message', 'Parent Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-warning');
				}

				redirect('admin/updateparentsdetails/' . $encryptId, 'refresh');
			}
		} else {
			redirect('admin', 'refresh');
		}
	}

	function educationdetails($encryptId)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];
			$data['page_title'] = "EDUCATION DETAILS";
			$data['menu'] = "educationdetails";

			$id = base64_decode($encryptId);

			$data['educations_details'] = $this->admin_model->getDetailsbyfield($id, 'student_id', 'student_education_details')->result();

			$this->form_validation->set_rules('education_level', 'Education Level', 'required');
			$this->form_validation->set_rules('inst_type', 'Institution Type', 'required');
			$this->form_validation->set_rules('inst_board', 'Board / University', 'required');
			$this->form_validation->set_rules('inst_name', 'Institution Name', 'required');
			$this->form_validation->set_rules('inst_address', 'Institution Address', 'required');
			$this->form_validation->set_rules('inst_city', 'Institution City', 'required');
			$this->form_validation->set_rules('inst_state', 'Institution State', 'required');
			$this->form_validation->set_rules('inst_country', 'Institution Country', 'required');
			$this->form_validation->set_rules('medium_of_instruction', 'Medium of Instruction', 'required');
			$this->form_validation->set_rules('register_number', 'Register Number', 'required');
			$this->form_validation->set_rules('year_of_passing', 'Year of Passing', 'required');

			if ($this->form_validation->run() === FALSE) {
				$data = array(
					'education_level' => $this->input->post('education_level'),
					'inst_type' => $this->input->post('inst_type'),
					'inst_board' => $this->input->post('inst_board'),
					'inst_name' => $this->input->post('inst_name'),
					'inst_address' => $this->input->post('inst_address'),
					'inst_city' => $this->input->post('inst_city'),
					'inst_state' => $this->input->post('inst_state'),
					'inst_country' => $this->input->post('inst_country'),
					'medium_of_instruction' => $this->input->post('medium_of_instruction'),
					'register_number' => $this->input->post('register_number'),
					'year_of_passing' => $this->input->post('year_of_passing')
				);

				// Insert subject fields
				for ($i = 1; $i <= 6; $i++) {
					$subject_name = $this->input->post('subject_' . $i . '_name');
					$min_marks = $this->input->post('subject_' . $i . '_min_marks');
					$max_marks = $this->input->post('subject_' . $i . '_max_marks');
					$obtained_marks = $this->input->post('subject_' . $i . '_obtained_marks');

					// Only add subject if name is not empty
					if (!empty($subject_name)) {
						$data['subject_' . $i . '_name'] = $subject_name;
						$data['subject_' . $i . '_min_marks'] = $min_marks;
						$data['subject_' . $i . '_max_marks'] = $max_marks;
						$data['subject_' . $i . '_obtained_marks'] = $obtained_marks;
					}
				}
				$data['educations_details'] = $this->admin_model->getDetailsbyfield($id, 'student_id', 'student_education_details')->result();
				$data['action'] = 'admin/educationdetails/' . $encryptId;
				$data['username'] = $session_data['username'];
				$data['full_name'] = $session_data['full_name'];
				$data['role'] = $session_data['role'];
				$data['page_title'] = "EDUCATION DETAILS";
				$data['menu'] = "educationdetails";

				$this->admin_template->show('admin/educationdetails', $data);
			} else {

				$insertDetails = array(
					'student_id' => $student_id,
					'education_level' => $this->input->post('education_level'),
					'inst_type' => $this->input->post('inst_type'),
					'inst_board' => $this->input->post('inst_board'),
					'inst_name' => $this->input->post('inst_name'),
					'inst_address' => $this->input->post('inst_address'),
					'inst_city' => $this->input->post('inst_city'),
					'inst_state' => $this->input->post('inst_state'),
					'inst_country' => $this->input->post('inst_country'),
					'medium_of_instruction' => $this->input->post('medium_of_instruction'),
					'register_number' => $this->input->post('register_number'),
					'year_of_passing' => $this->input->post('year_of_passing'),
					'aggregate' => $this->input->post('aggregate'),
					'updated_on' => date('Y-m-d h:i:s'),
					'updated_by' => $data['student_name']
				);

				// Insert subject fields
				for ($i = 1; $i <= 6; $i++) {
					$subject_name = $this->input->post('subject_' . $i . '_name');
					$min_marks = $this->input->post('subject_' . $i . '_min_marks');
					$max_marks = $this->input->post('subject_' . $i . '_max_marks');
					$obtained_marks = $this->input->post('subject_' . $i . '_obtained_marks');

					// Only add subject if name is not empty
					if (!empty($subject_name)) {
						$insertDetails['subject_' . $i . '_name'] = $subject_name;
						$insertDetails['subject_' . $i . '_min_marks'] = $min_marks;
						$insertDetails['subject_' . $i . '_max_marks'] = $max_marks;
						$insertDetails['subject_' . $i . '_obtained_marks'] = $obtained_marks;
					}
				}
				$result = $this->admin_model->insertDetails('student_education_details', $insertDetails);

				if ($result) {
					$this->session->set_flashdata('message', 'Education Details added successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-warning');
				}

				redirect('admin/educationdetails/' . $encryptId, 'refresh');
			}
		} else {
			redirect('admin', 'refresh');
		}
	}


	function updateeducationdetails($edu_id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];
			$data['page_title'] = 'Update Education Details';
			$data['menu'] = 'educationdetails';

			$this->form_validation->set_rules('education_level', 'Education Level', 'required');
			$this->form_validation->set_rules('inst_type', 'Institution Type', 'required');
			$this->form_validation->set_rules('inst_board', 'Board / University', 'required');
			$this->form_validation->set_rules('inst_name', 'Institution Name', 'required');
			$this->form_validation->set_rules('inst_address', 'Institution Address', 'required');
			$this->form_validation->set_rules('inst_city', 'Institution City', 'required');
			$this->form_validation->set_rules('inst_state', 'Institution State', 'required');
			$this->form_validation->set_rules('inst_country', 'Institution Country', 'required');
			$this->form_validation->set_rules('medium_of_instruction', 'Medium of Instruction', 'required');
			$this->form_validation->set_rules('register_number', 'Register Number', 'required');
			$this->form_validation->set_rules('year_of_passing', 'Year of Passing', 'required');

			if ($this->form_validation->run() === FALSE) {
				$eduDetails = $this->admin_model->getDetails('student_education_details', $edu_id)->row();
				$data = array(
					'education_level' => $eduDetails->education_level,
					'inst_type' => $eduDetails->inst_type,
					'inst_board' => $eduDetails->inst_board,
					'inst_name' => $eduDetails->inst_name,
					'inst_address' => $eduDetails->inst_address,
					'inst_city' => $eduDetails->inst_city,
					'inst_state' => $eduDetails->inst_state,
					'inst_country' => $eduDetails->inst_country,
					'medium_of_instruction' => $eduDetails->medium_of_instruction,
					'register_number' => $eduDetails->register_number,
					'year_of_passing' => $eduDetails->year_of_passing,
					'aggregate' => $eduDetails->aggregate
				);

				// Insert subject fields
				for ($i = 1; $i <= 6; $i++) {
					$subject_name = $eduDetails->{"subject_" . $i . "_name"};
					$min_marks = $eduDetails->{"subject_" . $i . "_min_marks"};
					$max_marks = $eduDetails->{"subject_" . $i . "_max_marks"};
					$obtained_marks = $eduDetails->{"subject_" . $i . "_obtained_marks"};

					// Only add subject if name is not empty
					// if (!empty($subject_name)) {
					$data['subject_' . $i . '_name'] = $subject_name;
					$data['subject_' . $i . '_min_marks'] = $min_marks;
					$data['subject_' . $i . '_max_marks'] = $max_marks;
					$data['subject_' . $i . '_obtained_marks'] = $obtained_marks;
					// }
				}
				$data['action'] = 'admin/updateeducationdetails/' . $edu_id;
				$data['username'] = $session_data['username'];
				$data['full_name'] = $session_data['full_name'];
				$data['role'] = $session_data['role'];
				$data['id'] = $student_session['id'];
				$data['page_title'] = 'Update Education Details';
				$data['menu'] = 'educationdetails';

				$this->admin_template->show('admin/updateeducationdetails', $data);
			} else {

				$updateDetails = array(
					'education_level' => $this->input->post('education_level'),
					'inst_type' => $this->input->post('inst_type'),
					'inst_board' => $this->input->post('inst_board'),
					'inst_name' => $this->input->post('inst_name'),
					'inst_address' => $this->input->post('inst_address'),
					'inst_city' => $this->input->post('inst_city'),
					'inst_state' => $this->input->post('inst_state'),
					'inst_country' => $this->input->post('inst_country'),
					'medium_of_instruction' => $this->input->post('medium_of_instruction'),
					'register_number' => $this->input->post('register_number'),
					'year_of_passing' => $this->input->post('year_of_passing'),
					'aggregate' => $this->input->post('aggregate'),
					'updated_on' => date('Y-m-d h:i:s'),
					'updated_by' => $data['student_name']
				);

				// Insert subject fields
				for ($i = 1; $i <= 6; $i++) {
					$subject_name = $this->input->post('subject_' . $i . '_name');
					$min_marks = $this->input->post('subject_' . $i . '_min_marks');
					$max_marks = $this->input->post('subject_' . $i . '_max_marks');
					$obtained_marks = $this->input->post('subject_' . $i . '_obtained_marks');

					// Only add subject if name is not empty
					if (!empty($subject_name)) {
						$updateDetails['subject_' . $i . '_name'] = $subject_name;
						$updateDetails['subject_' . $i . '_min_marks'] = $min_marks;
						$updateDetails['subject_' . $i . '_max_marks'] = $max_marks;
						$updateDetails['subject_' . $i . '_obtained_marks'] = $obtained_marks;
					}
				}
				$result = $this->admin_model->updateDetails($edu_id, $updateDetails, 'student_education_details');


				// var_dump($this->db->last_query());

				if ($result) {
					$this->session->set_flashdata('message', 'Education Details Updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-warning');
				}

				redirect('admin/updateeducationdetails/' . $edu_id, 'refresh');
			}
		} else {
			redirect('admin', 'refresh');
		}
	}

	public function payments()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];



			$data['page_title'] = 'New Payment';
			$data['menu'] = 'payments';
			// $data['admissionDetails'] = $this->admin_model->getDetails('admissions', $data['id'])->row();

			$this->form_validation->set_rules('mobile', 'Mobile', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'admin/payments';
				$this->admin_template->show('admin/payments', $data);
			} else {

				$mobile = $this->input->post('mobile');
				$details = $this->admin_model->getDetailsbyfield($mobile, 'mobile', 'admissions')->row();
				if ($details) {
					$student_id = $details->id;
					$encryptId = base64_encode($student_id);
					redirect('admin/paymentDetail/' . $encryptId, 'refresh');
				} else {
					redirect('admin/payments', 'refresh');
				}
			}
		} else {
			redirect('admin/timeout');
		}
	}

	public function paymentDetail($encryptId)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Collect Fee';
			$data['menu'] = 'payments';
			$data['encryptId'] = $encryptId;
			$student_id = base64_decode($encryptId);
			$data['currentAcademicYear'] = $this->globals->currentAcademicYear();
			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $student_id)->row();
			$data['paymentDetail'] = $this->admin_model->getDetailsbyfield($student_id, 'admission_id', 'payment_structure')->result();
			$data['transactionDetails'] = $this->admin_model->getDetailsbyfield($student_id, 'admissions_id', 'transactions')->result();
			$data['paid_amount'] = $this->admin_model->paidfee('admissions_id', $student_id, 'transaction_status', '1', 'transactions');



			$data['fees'] = $this->admin_model->getDetailsbyfield($student_id, 'student_id', 'fee_master')->row();



			$this->form_validation->set_rules('mode_of_payment', 'Mode of Payment', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'admin/paymentDetail/' . $encryptId;
				$this->admin_template->show('admin/paymentDetail', $data);
			} else {

				$rec = $this->input->post('rec');
				$mode_of_payment = $this->input->post('mode_of_payment');
				$paid_amount = $this->input->post('paid_amount');

				$final_fee = $data['studentDetails']->final_fee;
				$total_college_fee = $data['studentDetails']->total_college_fee;
				$total_university_fee = $data['studentDetails']->total_university_fee;

				$current_balance_amount = $data['studentDetails']->final_amount - $data['paid_amount'];

				$paying_amount = 0;

				if ($mode_of_payment == "Cash") {
					$paying_amount = $this->input->post('cash_amount');
					$academic_year = "2024-2025";
					$receipt_no = 1;
					$transaction_date = date('Y-m-d');
					$transaction_type = '1';
					$bank_name = "";
					$reference_no = "";
					$reference_date = date('Y-m-d', strtotime($this->input->post('cash_date')));
					$paid_amount = "0";
					$remarks = '';
					$transaction_status = '1';
				}
				if ($mode_of_payment == "ChequeDD") {
					$paying_amount = $this->input->post('cheque_dd_amount');
					$academic_year = "2024-2025";
					$receipt_no = 1;
					$transaction_date = "";
					$transaction_type = '2';
					$bank_name = $this->input->post('cheque_dd_bank');
					$reference_no = $this->input->post('cheque_dd_number');
					$reference_date = date('Y-m-d', strtotime($this->input->post('cheque_dd_date')));
					$paid_amount = "0";
					$remarks = '';
					$transaction_status = '1';
				}
				if ($mode_of_payment == "OnlinePayment") {
					$paying_amount = $this->input->post('transaction_amount');
					$academic_year = "2024-2025";
					$receipt_no = 1;
					$transaction_date = date('Y-m-d');
					$transaction_type = '3';
					$bank_name = "";
					$reference_no = $this->input->post('transaction_id');
					$reference_date = date('Y-m-d', strtotime($this->input->post('transaction_date')));
					$paid_amount = "0";
					$remarks = '';
					$transaction_status = '1';
				}

				//    echo $data['studentDetails']->aided_unaided;
				//    echo "<br>";
				//    echo "Cur Balance:".$current_balance_amount;
				//    echo "<br>";
				//    echo "Paying:".$paying_amount;
				//    echo "<br>";

				$aided_fee = 0;
				$mgt_fee = 0;
				$unaided_fee = 0;

				if ($data['studentDetails']->aided_unaided === "Aided") {
					if ($final_amount == $current_balance_amount) {
						if ($paying_amount >= $total_college_fee) {
							$second_payment = $paying_amount - $total_college_fee;
							if ($second_payment == 0) {
								$aided_fee = $total_college_fee;
								$mgt_fee = 0;
							}
							if ($second_payment) {
								$aided_fee = $total_college_fee;
								$mgt_fee = $second_payment;
							}
						}
					} else {
						$aided_fee = 0;
						$mgt_fee = $paying_amount;
					}
				} else {
					$unaided_fee = $paying_amount;
				}

				//echo "<br>";
				//echo "Aided:".$aided_fee;
				//echo "<br>";
				//echo "Mgt:".$mgt_fee;
				//echo "<br>";
				//echo "UnAided:".$unaided_fee;

				//die;
				if ($aided_fee) {
					$adm_type = "Aided";
					if ($receipt_no) {
						$tag = $this->receiptPre[$adm_type];
						$receipt_no = null;
						$cnt_number = $this->getReceiptNo($adm_type);
						$receipt_no = $tag . $cnt_number;
					} else {
						$receipt_no = '';
					}
					// $balance_amount = $current_balance_amount - $aided_fee;    
					$balance_amount = 0;
					$transactionDetails = array(
						'academic_year' => "2024-2025",
						'admissions_id' => $data['admissionDetails']->id,
						'mobile' => $data['admissionDetails']->mobile,
						'aided_unaided' => $adm_type,
						'receipt_no' => $receipt_no,
						'year' => '1',
						'transaction_date' => date('Y-m-d'),
						'transaction_type' => $transaction_type,
						'bank_name' => $bank_name,
						'reference_no' => $reference_no,
						'reference_date' => $reference_date,
						'paid_amount' => $paid_amount,
						'amount' => $aided_fee,
						'balance_amount' => $balance_amount,
						'remarks' => $remarks,
						'transaction_status' => $transaction_status,
						'created_by' => $data['name'],
						'created_on' => date('Y-m-d h:i:s')
					);
					//print_r($transactionDetails);
					$result = $this->admin_model->insertDetails('transactions', $transactionDetails);
				}
				if ($mgt_fee) {
					$adm_type = "Mgt";
					if ($receipt_no) {
						$tag = $this->receiptPre[$adm_type];
						$receipt_no = null;
						$cnt_number = $this->getReceiptNo($adm_type);
						$receipt_no = $tag . $cnt_number;
					} else {
						$receipt_no = '';
					}
					$balance_amount = ($current_balance_amount - ($mgt_fee + $aided_fee));
					$transactionDetails = array(
						'academic_year' => "2024-2025",
						'admissions_id' => $data['admissionDetails']->id,
						'mobile' => $data['admissionDetails']->mobile,
						'aided_unaided' => $adm_type,
						'receipt_no' => $receipt_no,
						'year' => '1',
						'transaction_date' => date('Y-m-d'),
						'transaction_type' => $transaction_type,
						'bank_name' => $bank_name,
						'reference_no' => $reference_no,
						'reference_date' => $reference_date,
						'paid_amount' => $paid_amount,
						'amount' => $mgt_fee,
						'balance_amount' => $balance_amount,
						'remarks' => $remarks,
						'transaction_status' => $transaction_status,
						'created_by' => $data['name'],
						'created_on' => date('Y-m-d h:i:s')
					);
					//print_r($transactionDetails);
					$result = $this->admin_model->insertDetails('transactions', $transactionDetails);
				}
				if ($unaided_fee) {
					$adm_type = "UnAided";
					if ($receipt_no) {
						$tag = $this->receiptPre[$adm_type];
						$receipt_no = null;
						$cnt_number = $this->getReceiptNo($adm_type);
						$receipt_no = $tag . $cnt_number;
					} else {
						$receipt_no = '';
					}
					$balance_amount = $current_balance_amount - $unaided_fee;
					$transactionDetails = array(
						'academic_year' => "2024-2025",
						'admissions_id' => $data['admissionDetails']->id,
						'mobile' => $data['admissionDetails']->mobile,
						'aided_unaided' => $adm_type,
						'receipt_no' => $receipt_no,
						'year' => '1',
						'transaction_date' => date('Y-m-d'),
						'transaction_type' => $transaction_type,
						'bank_name' => $bank_name,
						'reference_no' => $reference_no,
						'reference_date' => $reference_date,
						'paid_amount' => $paid_amount,
						'amount' => $unaided_fee,
						'balance_amount' => $balance_amount,
						'remarks' => $remarks,
						'transaction_status' => $transaction_status,
						'created_by' => $data['name'],
						'created_on' => date('Y-m-d h:i:s')
					);
					//print_r($transactionDetails);
					$result = $this->admin_model->insertDetails('transactions', $transactionDetails);
				}

				if ($rec) {
					$updateDetails = array('adm_date' => date('Y-m-d'));
					$res = $this->admin_model->updateDetails('admissions', $data['studentDetails']->id, $updateDetails);
				}

				if ($result) {
					$this->session->set_flashdata('message', 'Fee Payment details udpated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-warning');
				}
				redirect('admin/paymentDetail/' . $encryptId, 'refresh');
			}
		} else {
			redirect('admin/timeout');
		}
	}

	function new_payment($encryptId)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];
			$data['page_title'] = "New Payment Request";
			$data['menu'] = "payments";
			$id = base64_decode($encryptId);
			$admissionSingle = $this->admin_model->getDetails('admissions', $id)->row();

			$data['fee_structure'] = $this->admin_model->getFee($admissionSingle->dept_id, $admissionSingle->quota, $admissionSingle->sub_quota)->row();
			$data['stud_id'] = $id;
			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $id)->row();
			$this->form_validation->set_rules('final_fee', 'Total Amount', 'numeric|required');


			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'admin/new_payment/' . $encryptId;
				$this->admin_template->show('admin/new_payment', $data);
			} else {


				$selectedFees = $this->input->post('selected_fees');

				$finalFee = $this->input->post('final_fee');
				$selectedFeesArray = json_decode($selectedFees, true);

				// Debugging - Output selected fees array (adjust as needed)
				$updateDetails['type'] = 0;
				foreach ($selectedFeesArray as $selected) {
					$field = $newName = preg_replace('/_checkbox$/', '', $selected['name']);

					$updateDetails[$field] = $selected['value'];

					if ($field == 'corpus_fund') {
						$updateDetails['type'] = 1;
					}
				}

				$updateDetails['admission_id'] = $id;
				$updateDetails['mobile'] = $data['admissionDetails']->mobile;;
				$updateDetails['final_fee'] = $this->input->post('final_fee');
				$updateDetails['requested_by'] = $data['full_name'];
				$updateDetails['requested_on'] = date('Y-m-d h:i:s');

				// var_dump($updateDetails);

				$result = $this->admin_model->insertDetails('payment_structure', $updateDetails);


				if ($result) {
					$this->session->set_flashdata('message', 'New Payment Details are added successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-warning');
				}

				redirect('admin/paymentDetail/' . $encryptId, 'refresh');
			}
		} else {
			redirect('admin', 'refresh');
		}
	}

	public function admissionsletter($encryptId)
	{

		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			$data['page_title'] = 'Admission Details';
			$data['menu'] = 'admissions';

			// $id = $this->encrypt->decode(base64_decode($encryptId));
			$id = base64_decode($encryptId);

			$data['admissionStatus'] = $this->globals->admissionStatus();
			$data['admissionStatusColor'] = $this->globals->admissionStatusColor();
			$data['currentAcademicYear'] = $this->globals->currentAcademicYear();
			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $id)->row();

			$data['studentDetails'] = $this->admin_model->getDetails('admissions', 'id', $id)->row();
			$data['educations_details'] = $this->admin_model->getDetailsbyfield($id, 'id', 'student_education_details')->result();


			$this->load->library('fpdf'); // Load library
			ini_set("session.auto_start", 0);
			ini_set('memory_limit', '-1');
			define('FPDF_FONTPATH', 'plugins/font');
			$pdf = new FPDF();
			$pdf->AddPage('P', 'A4'); // 'P' for portrait orientation, 'A4' for A4 size (210x297 mm)

			// Set left, top, and right margins (20 mm)
			$pdf->SetMargins(20, 20, 20);

			$pdf->Image('assets/img/mce_pro_letter3.jpg', 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight());


			$topGap = 30;

			$pdf->SetY($topGap + 5);
			$pdf->SetFont('Arial', 'BU', 7);
			$pdf->Cell(0, 3, "No.MCE/" . $this->admin_model->get_dept_by_id($data['admissionDetails']->dept_id)["department_short_name"] . "/" . $data['admissionDetails']->adm_no, 0, 1, 'L');
			$pdf->SetFont('Arial', 'B', 7);
			$pdf->Cell(0, 3, 'Ashok Haranahalli', 0, 1, 'L');
			$pdf->SetFont('Arial', '', 7);
			$pdf->Cell(0, 3, 'Chairman, Governing Council', 0, 1, 'L');
			$pdf->Cell(0, 3, 'of M.C.E. Hassan.', 0, 1, 'L');

			$pdf->SetFont('Arial', '', 9);
			$pdf->SetXY(-30, $topGap + 5);
			$pdf->Cell(0, 10, 'Date:' . date('d-m-Y'), 0, 1, 'R');

			$pdf->SetFont('Arial', 'BU', 12);
			$pdf->SetY($topGap + 20);
			$pdf->Cell(0, 10, ' PROVISIONAL ADMISSION LETTER ', 0, 1, 'C');


			$pdf->SetFont('Arial', '', 9);
			$pdf->Cell(0, 10, 'This is to certify that,', 0, 1);
			$pdf->Ln(3);
			$details = array(
				'name' => $data['admissionDetails']->student_name,
				'parent' => $data['admissionDetails']->father_name
			);
			if ($data['admissionDetails']->gender == "Male") {
				$salut = "S/O. ";
				$pdf->AddNameDetailsTableM($details);
			} else {
				$salut = "D/O. ";
				$pdf->AddNameDetailsTableF($details);
			}


			$pdf->SetFont('Arial', '', 10);
			$pdf->Cell(0, 5, 'is provisionally admitted to 1st year B.E. ' . $this->admin_model->get_dept_by_id($data['admissionDetails']->dept_id)["department_name"] . ' course of FOUR years', 0, 1);
			$pdf->Cell(0, 5, 'in this college during the academic year 2024-25. Admission will be confirmed subject to:', 0, 1);
			$pdf->Ln(3);

			$pdf->MultiCell(0, 5, "1) a) The conditions of satisfying the eligibility requirements of Visvesvaraya Technological University\n \t\t\tb) Payment of 1st year Tuition Fees in full.\n\n2) Submission of following original documents before the commencement of classes\n\t\t\t\ta) 10th & 12th Mark sheets or equivalent\n\t\t\t\tb) Transfer Certificate\n\t\t\t\tc) Migration Certificate (for Non Karnataka students only).\n\t\t\t\td) Entrance exam score card (CET, Comedk, AIEEE) if any\n\n3) Submission of Tuition Fees paid Receipt.");
			$pdf->Ln(3);

			$header = array('Branch', '1st Year', '2nd Year', '3rd Year', '4th Year');
			if ($data['admissionDetails']->dept_id == '5') {

				$data1 = array(
					array('Computer Science & Engineering', '250000', '250000', '250000', '250000')
				);
			}
			if ($data['admissionDetails']->dept_id == '7') {
				$data1 = array(

					array('Computer Science & Engineering (AI&ML)', '200000', '200000', '200000', '200000')
				);
			}
			if ($data['admissionDetails']->dept_id == '8') {

				$data1 = array(

					array('Computer Science & Business System', '200000', '200000', '200000', '200000')
				);
			}
			if ($data['admissionDetails']->dept_id == '6') {

				$data1 = array(

					array('Information Science & Engineering', '200000', '200000', '200000', '200000')
				);
			}
			if ($data['admissionDetails']->dept_id == '4') {

				$data1 = array(

					array('Electronics & Communication Engineering', '175000', '175000', '175000', '175000')
				);
			}
			if ($data['admissionDetails']->dept_id == '3') {

				$data1 = array(

					array('Electrical & Electronics Engineering', '100000', '100000', '100000', '100000')
				);
			}
			if ($data['admissionDetails']->dept_id == '2') {

				$data1 = array(

					array('Mechanical Engineering', '100000', '100000', '100000', '100000')
				);
			}
			if ($data['admissionDetails']->dept_id == '1') {

				$data1 = array(

					array('Civil Engineering', '100000', '100000', '100000', '100000')
				);
			}

			$pdf->AddTable($header, $data1);
			$pdf->Ln(3);



			// $pdf->Cell(0, 5, 'Chairman - Admissions', 0, 1, 'L');
			// $pdf->Cell(0, 5, 'Hon. Secretary', 0, 1, 'R');

			$additionalDataY = $pdf->GetY() + 5;


			$pdf->SetFont('Arial', '', 9);
			$pdf->SetY($additionalDataY);

			$pdf->MultiCell(0, 5, "Additional amount of Rs. __________________ To be remitted towards eligibility fees for Non-Karnataka students.\n\nNote:\n1. Original documents & 1 year Tuition Fee paid receipt copy to be submitted before the commencement of classes.\n2. DD should be in favour of Principal, Malnad College of Engineering, Hassan payable at Hassan");
			$pdf->Ln(5);
			$email_parts = explode('@', $data['admissionDetails']->email);
			$username = $email_parts[0];
			$domain = $email_parts[1];

			$masked_username = substr($username, 0, -2) . str_repeat('*', strlen($username) - 2);
			$masked_email = $masked_username . '@' . $domain;

			// Mask phone number
			$masked_phone = str_repeat('*', strlen($data['admissionDetails']->mobile) - 4) . substr($data['admissionDetails']->mobile, -4);
			$pdf->AddPage();
			$pdf->Image('assets/img/qr.png', 80, 20, 50); // Adjust x, y, and size as needed
			$pdf->SetY(68);
			$pdf->SetFont('Arial', '', 12); // Bold font
			$pdf->Cell(0, 10, 'bi8.in/202425', 0, 1, 'C');
			$pdf->Ln(3);

			$pdf->SetFont('Arial', 'B', 16); // Bold font
			$pdf->Cell(0, 10, 'SCAN TO ENROLL ADMISSION', 0, 1, 'C');
			$pdf->Ln(15);
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->Cell(0, 5, "No.MCE/" . $this->admin_model->get_dept_by_id($data['admissionDetails']->dept_id)["department_short_name"] . "/" . $data['admissionDetails']->adm_no, 0, 1, 'L');
			$pdf->Ln(3);
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->Cell(0, 5, $data['admissionDetails']->student_name . ", " . $salut . " " . $data['admissionDetails']->father_name, 0, 1, 'L');
			$pdf->Ln(3);
			// $pdf->SetFont('Arial', 'B', 10);
			// $pdf->Cell(0, 5, "Portal Login Credentials,", 0, 1, 'L');
			// $pdf->Ln(3);
			$pdf->SetFont('Arial', '', 10);
			$pdf->MultiCell(0, 5, "To complete your enrolment, please log in to our student portal using the credentials provided below. Here, you will be able to update your profile, access important information.");
			$pdf->Ln(5);
			$usernameWidth = $pdf->GetStringWidth("Username :\t");
			$passwordWidth = $pdf->GetStringWidth("Temporary Password :\t");

			// Calculate total width for the first line
			$totalWidth = $usernameWidth + $pdf->GetStringWidth($masked_email);

			// Determine x position for "Temporary Password"
			$xPosition = $pdf->GetX() + $usernameWidth;

			// Add content
			$pdf->SetFont('Arial', 'B', 10); // Bold font
			$pdf->Cell($usernameWidth, 4, "Username :\t", 0, 0, 'L'); // Bold text "Username : "
			$pdf->SetFont('Arial', '', 10); // Normal font
			$pdf->Cell(0, 4, "\t" . $masked_email, 0, 1, 'L'); // Normal text "masked_email" on a new line

			$pdf->SetFont('Arial', 'B', 10); // Bold font
			$pdf->Cell($passwordWidth, 4, "Temporary Password :\t", 0, 0, 'L'); // Bold text "Temporary Password : "
			$pdf->SetFont('Arial', '', 10); // Normal font
			$pdf->Cell(0, 4, "\t\t" . $masked_phone, 0, 1, 'L'); // Normal text "masked_phone" on a new line

			$pdf->Ln(5); // Line break
			$pdf->SetFont('Arial', '', 10);
			$pdf->MultiCell(0, 5, "Please log in at your earliest convenience and change your password for security. Follow the instructions on the portal to update your personal and academic details.");

			$pdf->Ln(5);

			$fileName = $data['admissionDetails']->student_name . '-Admit_Letter.pdf';
			// $pdf->output();
			$pdf->output($fileName, 'D');
		} else {
			redirect('admin/timeout');
		}
	}
	public function admissionsletternew($dept)
	{

		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];
			$data['currentAcademicYear'] = $this->globals->currentAcademicYear();
			$data['page_title'] = 'Admission Details';
			$data['menu'] = 'admissions';

			// $id = $this->encrypt->decode(base64_decode($encryptId));
			$admissions= $this->admin_model->getAdmissions_course($data['currentAcademicYear'], $dept, 1)->result();

			if (count($admissions)) {
				
				foreach ($admissions as $admissions1) {
					
					$data['admissionStatus'] = $this->globals->admissionStatus();
					$data['admissionStatusColor'] = $this->globals->admissionStatusColor();

					$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $admissions1->id)->row();

					$data['studentDetails'] = $this->admin_model->getDetails('admissions', 'id', $admissions1->id)->row();
					$data['educations_details'] = $this->admin_model->getDetailsbyfield($admissions1->id, 'student_id', 'student_education_details')->result();


					$this->load->library('fpdf'); // Load library
					ini_set("session.auto_start", 0);
					ini_set('memory_limit', '-1');
					define('FPDF_FONTPATH', 'plugins/font');
					$pdf = new FPDF();
					$pdf->AddPage('P', 'A4'); // 'P' for portrait orientation, 'A4' for A4 size (210x297 mm)

					// Set left, top, and right margins (20 mm)
					$pdf->SetMargins(20, 20, 20);

					$pdf->Image('assets/img/mce_pro_letter3.jpg', 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight());


					$topGap = 30;

					$pdf->SetY($topGap + 5);
					$pdf->SetFont('Arial', 'BU', 7);
					$pdf->Cell(0, 3, "No.MCE/" . $this->admin_model->get_dept_by_id($data['admissionDetails']->dept_id)["department_short_name"] . "/" . $data['admissionDetails']->adm_no, 0, 1, 'L');
					$pdf->SetFont('Arial', 'B', 7);
					$pdf->Cell(0, 3, 'Ashok Haranahalli', 0, 1, 'L');
					$pdf->SetFont('Arial', '', 7);
					$pdf->Cell(0, 3, 'Chairman, Governing Council', 0, 1, 'L');
					$pdf->Cell(0, 3, 'of M.C.E. Hassan.', 0, 1, 'L');

					$pdf->SetFont('Arial', '', 9);
					$pdf->SetXY(-30, $topGap + 5);
					$pdf->Cell(0, 10, 'Date:' . date('d-m-Y'), 0, 1, 'R');

					$pdf->SetFont('Arial', 'BU', 12);
					$pdf->SetY($topGap + 20);
					$pdf->Cell(0, 10, ' PROVISIONAL ADMISSION LETTER ', 0, 1, 'C');


					$pdf->SetFont('Arial', '', 9);
					$pdf->Cell(0, 10, 'This is to certify that,', 0, 1);
					$pdf->Ln(3);
					$details = array(
						'name' => $data['admissionDetails']->student_name,
						'parent' => $data['admissionDetails']->father_name
					);
					if ($data['admissionDetails']->gender == "Male") {
						$salut = "S/O. ";
						$pdf->AddNameDetailsTableM($details);
					} else {
						$salut = "D/O. ";
						$pdf->AddNameDetailsTableF($details);
					}


					$pdf->SetFont('Arial', '', 10);
					$pdf->Cell(0, 5, 'is provisionally admitted to 1st year B.E. ' . $this->admin_model->get_dept_by_id($data['admissionDetails']->dept_id)["department_name"] . ' course of FOUR years', 0, 1);
					$pdf->Cell(0, 5, 'in this college during the academic year 2024-25. Admission will be confirmed subject to:', 0, 1);
					$pdf->Ln(3);

					$pdf->MultiCell(0, 5, "1) a) The conditions of satisfying the eligibility requirements of Visvesvaraya Technological University\n \t\t\tb) Payment of 1st year Tuition Fees in full.\n\n2) Submission of following original documents before the commencement of classes\n\t\t\t\ta) 10th & 12th Mark sheets or equivalent\n\t\t\t\tb) Transfer Certificate\n\t\t\t\tc) Migration Certificate (for Non Karnataka students only).\n\t\t\t\td) Entrance exam score card (CET, Comedk, AIEEE) if any\n\n3) Submission of Tuition Fees paid Receipt.");
					$pdf->Ln(3);

					$header = array('Branch', '1st Year', '2nd Year', '3rd Year', '4th Year');
					if ($data['admissionDetails']->dept_id == '5') {

						$data1 = array(
							array('Computer Science & Engineering', '250000', '250000', '250000', '250000')
						);
					}
					if ($data['admissionDetails']->dept_id == '7') {
						$data1 = array(

							array('Computer Science & Engineering (AI&ML)', '200000', '200000', '200000', '200000')
						);
					}
					if ($data['admissionDetails']->dept_id == '8') {

						$data1 = array(

							array('Computer Science & Business System', '200000', '200000', '200000', '200000')
						);
					}
					if ($data['admissionDetails']->dept_id == '6') {

						$data1 = array(

							array('Information Science & Engineering', '200000', '200000', '200000', '200000')
						);
					}
					if ($data['admissionDetails']->dept_id == '4') {

						$data1 = array(

							array('Electronics & Communication Engineering', '175000', '175000', '175000', '175000')
						);
					}
					if ($data['admissionDetails']->dept_id == '3') {

						$data1 = array(

							array('Electrical & Electronics Engineering', '100000', '100000', '100000', '100000')
						);
					}
					if ($data['admissionDetails']->dept_id == '2') {

						$data1 = array(

							array('Mechanical Engineering', '100000', '100000', '100000', '100000')
						);
					}
					if ($data['admissionDetails']->dept_id == '1') {

						$data1 = array(

							array('Civil Engineering', '100000', '100000', '100000', '100000')
						);
					}

					$pdf->AddTable($header, $data1);
					$pdf->Ln(3);



					// $pdf->Cell(0, 5, 'Chairman - Admissions', 0, 1, 'L');
					// $pdf->Cell(0, 5, 'Hon. Secretary', 0, 1, 'R');

					$additionalDataY = $pdf->GetY() + 5;


					$pdf->SetFont('Arial', '', 9);
					$pdf->SetY($additionalDataY);

					$pdf->MultiCell(0, 5, "Additional amount of Rs. __________________ To be remitted towards eligibility fees for Non-Karnataka students.\n\nNote:\n1. Original documents & 1 year Tuition Fee paid receipt copy to be submitted before the commencement of classes.\n2. DD should be in favour of Principal, Malnad College of Engineering, Hassan payable at Hassan");
					$pdf->Ln(5);
					$email_parts = explode('@', $data['admissionDetails']->email);
					$username = $email_parts[0];
					$domain = $email_parts[1];

					$masked_username = substr($username, 0, -2) . str_repeat('*', strlen($username) - 2);
					$masked_email = $masked_username . '@' . $domain;

					// Mask phone number
					$masked_phone = str_repeat('*', strlen($data['admissionDetails']->mobile) - 4) . substr($data['admissionDetails']->mobile, -4);
					$pdf->AddPage();
					$pdf->Image('assets/img/qr.png', 80, 20, 50); // Adjust x, y, and size as needed
					$pdf->SetY(68);
					$pdf->SetFont('Arial', '', 12); // Bold font
					$pdf->Cell(0, 10, 'bi8.in/202425', 0, 1, 'C');
					$pdf->Ln(3);

					$pdf->SetFont('Arial', 'B', 16); // Bold font
					$pdf->Cell(0, 10, 'SCAN TO ENROLL ADMISSION', 0, 1, 'C');
					$pdf->Ln(15);
					$pdf->SetFont('Arial', 'B', 10);
					$pdf->Cell(0, 5, "No.MCE/" . $this->admin_model->get_dept_by_id($data['admissionDetails']->dept_id)["department_short_name"] . "/" . $data['admissionDetails']->adm_no, 0, 1, 'L');
					$pdf->Ln(3);
					$pdf->SetFont('Arial', 'B', 10);
					$pdf->Cell(0, 5, $data['admissionDetails']->student_name . ", " . $salut . " " . $data['admissionDetails']->father_name, 0, 1, 'L');
					$pdf->Ln(3);
					// $pdf->SetFont('Arial', 'B', 10);
					// $pdf->Cell(0, 5, "Portal Login Credentials,", 0, 1, 'L');
					// $pdf->Ln(3);
					$pdf->SetFont('Arial', '', 10);
					$pdf->MultiCell(0, 5, "To complete your enrolment, please log in to our student portal using the credentials provided below. Here, you will be able to update your profile, access important information.");
					$pdf->Ln(5);
					$usernameWidth = $pdf->GetStringWidth("Username :\t");
					$passwordWidth = $pdf->GetStringWidth("Temporary Password :\t");

					// Calculate total width for the first line
					$totalWidth = $usernameWidth + $pdf->GetStringWidth($masked_email);

					// Determine x position for "Temporary Password"
					$xPosition = $pdf->GetX() + $usernameWidth;

					// Add content
					$pdf->SetFont('Arial', 'B', 10); // Bold font
					$pdf->Cell($usernameWidth, 4, "Username :\t", 0, 0, 'L'); // Bold text "Username : "
					$pdf->SetFont('Arial', '', 10); // Normal font
					$pdf->Cell(0, 4, "\t" . $masked_email, 0, 1, 'L'); // Normal text "masked_email" on a new line

					$pdf->SetFont('Arial', 'B', 10); // Bold font
					$pdf->Cell($passwordWidth, 4, "Temporary Password :\t", 0, 0, 'L'); // Bold text "Temporary Password : "
					$pdf->SetFont('Arial', '', 10); // Normal font
					$pdf->Cell(0, 4, "\t\t" . $masked_phone, 0, 1, 'L'); // Normal text "masked_phone" on a new line

					$pdf->Ln(5); // Line break
					$pdf->SetFont('Arial', '', 10);
					$pdf->MultiCell(0, 5, "Please log in at your earliest convenience and change your password for security. Follow the instructions on the portal to update your personal and academic details.");

					$pdf->Ln(5);

					$fileName = $data['admissionDetails']->student_name . '-Admit_Letter.pdf';
					// $pdf->output();
					$pdf->output($fileName, 'D');
				}
			}
		} else {
			redirect('admin/timeout');
		}
	}
}
