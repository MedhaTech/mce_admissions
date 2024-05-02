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

			// echo $encryptAadhar;
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
			$data['departments'] = $this->admin_model->getActiveDepartments()->result();
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
			$data['departments'] = $this->admin_model->getActiveDepartments()->result();
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
			$this->form_validation->set_rules('adhaar', 'Adhaar Number', 'required|regex_match[/^[0-9]{12}$/]|is_unique[enquiries.adhaar]');
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
				$data['adhaar'] = $this->input->post('adhaar');

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
					'adhaar' => $this->input->post('adhaar'),
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
			// $this->form_validation->set_rules('adhaar', 'Adhaar', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');
			$this->form_validation->set_rules('city', 'City', 'required');
			$this->form_validation->set_rules('category', 'Category', 'required');
			$this->form_validation->set_rules('sslc_grade', 'Sslc Grade', 'required');
			$this->form_validation->set_rules('puc1_grade', 'Puc Grade', 'required');
			$this->form_validation->set_rules('puc2_grade', 'Puc Grade', 'required');
			$this->form_validation->set_rules('register_grade', '10+2 Percentage / Grade', 'required');
			$this->form_validation->set_rules('exam_board', 'Exam Board', 'required');
			$this->form_validation->set_rules('register_number', 'Register Number', 'required');
			$this->form_validation->set_rules('adhaar', 'Adhaar Number', 'required|regex_match[/^[0-9]{12}$/]|is_unique[enquiries.adhaar]');

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
				$data['adhaar'] =  $enquiryDetails->adhaar;
				$data['state'] =  $enquiryDetails->state;
				$data['city'] =  $enquiryDetails->city;
				$data['category'] =  $enquiryDetails->category;
				$data['sslc_grade'] =  $enquiryDetails->sslc_grade;
				$data['puc1_grade'] =  $enquiryDetails->puc1_grade;
				$data['puc2_grade'] =  $enquiryDetails->puc2_grade;
				$data['exam_board'] =  $enquiryDetails->exam_board;
				$data['register_number'] =  $enquiryDetails->register_number;
				$data['register_grade'] = $enquiryDetails->register_grade;
				$this->admin_template->show('admin/edit_enquiry', $data);
			} else {
				$course_id = $this->input->post('course');
				$course = $data['course_options'][$course_id];



				$updateDetails = array(
					'student_name' => strtoupper($this->input->post('student_name')),
					'register_grade' => $this->input->post('register_grade'),
					'mobile' => $this->input->post('mobile'),
					'email' => strtolower($this->input->post('email')),
					'par_name' => $this->input->post('par_name'),
					'par_mobile' => $this->input->post('par_mobile'),
					'par_email' => $this->input->post('par_email'),
					'course_id' => $this->input->post('course'),
					'course_id' => $this->input->post('course1'),
					'course_id' => $this->input->post('course2'),
					'gender' => $this->input->post('gender'),
					'adhaar' => $this->input->post('adhaar'),
					'course' => $course,
					'state' => $this->input->post('state'),
					'city' => $this->input->post('city'),
					'category' => $this->input->post('category'),
					'sslc_grade' => $this->input->post('sslc_grade'),
					'puc1_grade' => $this->input->post('puc1_grade'),
					'puc2_grade' => $this->input->post('puc2_grade'),

					'exam_board' => strtoupper($this->input->post('exam_board')),
					'register_number' => $this->input->post('register_number')
				);

				$result = $this->admin_model->updateDetails('enquiries', $id, $updateDetails);
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
				'father_name' => strtoupper($enquiryDetails->father_name),
				'aadhar' => $enquiryDetails->adhaar,
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
				$this->aws_sdk->triggerEmail($enquiryDetails->email, 'MCE Online Admission Portal Registration Successful - Complete Your Application Now!', $message);
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

			$data['details'] = $this->admin_model->getDepartments()->result();
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

			$details = $this->admin_model->getDepartments()->result();
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
			$dept = $this->input->post('dept');


			$details = $this->admin_model->getsubquota($quota, $dept)->result();

			$result = array();

			$result[] = '<option value=" ">Select</option>';

			foreach ($details as $details1) {
				$result[] = '<option value="' . $details1->sub_quota . '">' . $details1->sub_quota . '</option>';
			}

			print_r($result);
		} else {
			redirect('admin/timeout');
		}
	}

	public function enquiryAdmission($encryptAadhar)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['username'] = $session_data['username'];
			$data['full_name'] = $session_data['full_name'];
			$data['role'] = $session_data['role'];

			// echo $encryptAadhar;
			$aadhar = base64_decode($encryptAadhar);
			// $aadhar = $this->encrypt->decode(base64_decode($encryptAadhar));

			$details = $this->admin_model->fetchDetails1('id', 'aadhar', $aadhar, 'admissions')->row();

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
							$enquiries1->adhaar,
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
								$enquiries1->adhaar,
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
								$enquiries1->adhaar,
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
							$enquiries1->adhaar,
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
							$enquiries1->adhaar,
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
							$enquiries1->adhaar,
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

				$enquiries = $this->admin_model->getEnquiries_course($data['currentAcademicYear'], $data['course'])->result();

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
							$enquiries1->adhaar,
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
							$enquiries1->adhaar,
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
			$data['educations_details'] = $this->admin_model->getDetailsbyfield($id, 'id', 'student_education_details')->result();
			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $id)->row();


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
		$this->aws_sdk->triggerEmail('sreeni@medhatech.in', 'MCE Online Admission Portal Registration Successful - Complete Your Application Now!', $message);
		// echo  $this->aws_sdk->triggerEmail('girish@medhatech.in', 'test', 'testing');
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
			$data['quota_options'] = array(" " => "Select") + $this->globals->quota();
			$data['subquota_options'] = array(" " => "Select") + $this->globals->sub_quota();
			$data['type_options'] = array(" " => "Select") + $this->globals->category();

			$data['enquiryStatus'] = $this->globals->enquiryStatus();
			$data['enquiryStatusColor'] = $this->globals->enquiryStatusColor();


			// $this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
			$this->form_validation->set_rules('student_name', 'Applicant Name', 'required');

			$this->form_validation->set_rules('mobile', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[admissions.email]');
			$this->form_validation->set_rules('aadhar', 'Adhaar Number', 'required|regex_match[/^[0-9]{12}$/]|is_unique[admissions.aadhar]');
			$this->form_validation->set_rules('course', 'Department', 'required');
			$this->form_validation->set_rules('quota', 'Quota', 'required');
			$this->form_validation->set_rules('subquota', 'sub quota', 'required');
			$this->form_validation->set_rules('category_allotted', 'Category Allocated', 'required');
			$this->form_validation->set_rules('category_claimed', 'Category Claimed', 'required');
			$this->form_validation->set_rules('college_code', 'College Code', 'required');
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
				$data['aadhar'] = $this->input->post('aadhar');
				$data['quota'] = $this->input->post('quota');
				$data['sub_quota'] = $this->input->post('subquota');
				$data['category_alloted'] = $this->input->post('category_alloted');
				$data['category_claimed'] = $this->input->post('category_claimed');
				$data['college_code'] = $this->input->post('college_code');
				$data['sports'] = $this->input->post('sports');
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
					'aadhar' => $this->input->post('aadhar'),
					'dept_id' => $this->input->post('course'),
					'quota' => $this->input->post('quota'),
					'sub_quota' => $this->input->post('subquota'),
					'category_allotted' => $this->input->post('category_allotted'),
					'category_claimed' => $this->input->post('category_claimed'),
					'college_code' => $this->input->post('college_code'),
					'sports' => $this->input->post('sports'),
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
					$this->aws_sdk->triggerEmail($sender, 'MCE Online Admission Portal Registration Successful - Complete Your Application Now!', $message);
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
			// $data['transactionDetails'] = $this->admin_model->getDetails('transactions','admissions_id', $student_id)->result();
			// $data['paid_amount'] = $this->admin_model->paidAmount($student_id)->row()->amount;
			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $student_id)->row();
			$data['fees'] = $this->admin_model->getDetailsbyfield($data['id'], 'student_id', 'fee_master')->row();

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
					$transaciton_date = date('Y-m-d');
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
					$transaciton_date = "";
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
					$transaciton_date = date('Y-m-d');
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
						'transaciton_date' => date('Y-m-d'),
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
						'transaciton_date' => date('Y-m-d'),
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
						'transaciton_date' => date('Y-m-d'),
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
				redirect('admin/collect_payment/' . $student_id, 'refresh');
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
			$pdf = new FPDF('p', 'mm', 'A5');
			$pdf->AddPage();

			$pdf->Image('assets/img/mce_admit_letter.jpg', 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight());


			$topGap = 20;

			$pdf->SetY($topGap + 5);
			$pdf->SetFont('Arial', '', 7);
			$pdf->Cell(0, 3, "No.MCE/".$this->admin_model->get_dept_by_id($data['admissionDetails']->dept_id)["department_short_name"]."/".$data['admissionDetails']->adm_no."/".$data['admissionDetails']->academic_year, 0, 1, 'L');
			$pdf->SetFont('Arial', 'B', 7);
			$pdf->Cell(0, 3, 'Ashok Haranahalli', 0, 1, 'L');
			$pdf->SetFont('Arial', '', 7);
			$pdf->Cell(0, 3, 'Chairman, Governing Council', 0, 1, 'L');
			$pdf->Cell(0, 3, 'of M.C.E. Hassan.', 0, 1, 'L');

			$pdf->SetXY(-30, $topGap + 5);
			$pdf->Cell(0, 10, 'Date:'.date('d-m-Y'), 0, 1, 'R');

			$pdf->SetFont('Arial', 'BU', 12);
			$pdf->SetY($topGap + 20);
			$pdf->Cell(0, 10, ': LETTER OF ALLOTMENT :', 0, 1, 'C');


			$pdf->SetFont('Arial', '', 9);

			$pdf->Ln(10);

			$content = "  You have sought for admission to the 1st B.E., (Bachelor of Engineering course for the academic year ".$data['admissionDetails']->academic_year." in our college (i.e,., Malnad College of Engineering.) 

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
			$pdf->Cell(0, 4, $data['admissionDetails']->present_address, 0, 1, 'L');
			$pdf->Cell(0, 4, $data['admissionDetails']->mobile, 0, 1, 'L');
			$pdf->Cell(0, 4, $data['admissionDetails']->email, 0, 1, 'L');


			$fileName = $data['admissionDetails']->student_name . '-Admit_Letter.pdf';
			$pdf->output($fileName, 'D');
		} else {
			redirect('admin/timeout');
		}
	}
}
