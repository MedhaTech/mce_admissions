<?php
defined('BASEPATH') or exit('No direct script access allowed');

use io\billdesk\client\hmacsha256\BillDeskJWEHS256Client;
use io\billdesk\client\Logging;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class Student extends CI_Controller
{

	private $client;

	protected function setUp(): void
	{
		$this->client = new BillDeskJWEHS256Client("https://pguat.billdesk.io", "bduatv2ktk", "16uUloqqrs2iMUZnrojXtmkTeSQqjYIX");
		$logger = new Logger("default");
		$logger->pushHandler(new StreamHandler('php://stdout', Logger::DEBUG));
		$this->client->setLogger($logger);
	}

	function __construct()
	{
		parent::__construct();
		$this->CI = &get_instance();
		$this->load->model('admin_model', '', TRUE);

		$this->load->library(array('table', 'form_validation'));
		$this->load->helper(array('form', 'form_helper', 'file'));
		date_default_timezone_set('Asia/Kolkata');
		ini_set('upload_max_filesize', '20M');
	}


	function index()
	{
		$this->form_validation->set_rules('email', 'Email Number', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
		if ($this->form_validation->run() == FALSE) {
			$data['page_title'] = "Student Login";
			$data['action'] = 'student';

			$this->login_template->show('student/Login', $data);
		} else {
			$email = $this->input->post('email');
			redirect('student/dashboard', 'refresh');
		}
	}

	function check_database($password)
	{
		//Field validation succeeded.  Validate against database
		$email = $this->input->post('email');

		//query the database
		$result = $this->admin_model->studentlogin($email, md5($password));
		if ($result) {
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'id' => $row->id,
					'student_name' => $row->student_name,
					'flow' => $row->flow
				);
				$this->session->set_userdata('student_in', $sess_array);
			}
			return TRUE;
		} else {
			$this->form_validation->set_message('check_database', 'Invalid Email or password');
			return false;
		}
	}

	public function testCreateOrder()
	{
		$request = array(
			'mercid' => "112233",
			'orderid' => uniqid(),
			'amount' => "1.0",
			'order_date' => date_format(new \DateTime(), DATE_W3C),
			'currency' => "1000",
			'ru' => "https://www.billdesk.io",
			'itemcode' => "DIRECT",
			'device' => array(
				'init_channel' => 'internet',
				'ip' => "192.168.1.1",
				'user_agent' => 'Mozilla/5.0'
			)
		);
		$response = $this->client->createOrder($request);

		$this->assertEquals(200, $response->getResponseStatus());
	}

	function dashboard()
	{
		if ($this->session->userdata('student_in')) {
			$student_session = $this->session->userdata('student_in');
			$data['id'] = $student_session['id'];
			$student_id = $student_session['id'];
			$data['student_name'] = $student_session['student_name'];
			$data['page_title'] = "Dashboard";
			$data['menu'] = "dashboard";

			$flow = $this->admin_model->getDetailsFilter('flow', $data['id'], 'admissions')->row()->flow;

			if ($flow) {
				$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $data['id'])->row();
				$data['entranceDetails'] = $this->admin_model->getDetails('admissions', $data['id'])->row();
				$data['personalDetails'] = $this->admin_model->getDetails('admissions', $data['id'])->row();
				$data['parentDetails'] = $this->admin_model->getDetails('admissions', $data['id'])->row();
				$data['educations_details'] = $this->admin_model->getDetailsbyfield($student_id, 'student_id', 'student_education_details')->result();

				$upload_path = "./assets/students/$student_id/";

				// Check if the directory exists
				if (is_dir($upload_path)) {
					// Get list of files in the directory
					$files = scandir($upload_path);

					// Remove . and .. from the list
					$data['files'] = array_diff($files, array('.', '..'));
				} else {
					$data['files'] = array();
				}
				$this->student_template->show('student/finish', $data);
			} else {
				$this->student_template->show('student/dashboard', $data);
			}
		} else {
			redirect('student', 'refresh');
		}
	}

	function startProcess()
	{
		if ($this->session->userdata('student_in')) {
			$student_session = $this->session->userdata('student_in');
			$data['id'] = $student_session['id'];
			$data['student_name'] = $student_session['student_name'];
			$data['page_title'] = "Dashboard";
			$data['menu'] = "dashboard";

			$updateDetails = array('flow' => '1');
			$result = $this->admin_model->updateDetails($data['id'], $updateDetails, 'admissions');

			redirect('student/dashboard', 'refresh');
		} else {
			redirect('student', 'refresh');
		}
	}

	function admissiondetails()
	{
		if ($this->session->userdata('student_in')) {
			$student_session = $this->session->userdata('student_in');
			$data['id'] = $student_session['id'];
			$data['student_name'] = $student_session['student_name'];
			$data['page_title'] = "ADMISSION DETAILS";
			$data['menu'] = "admissiondetails";
			$data['userTypes'] = $this->globals->userTypes();
			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $data['id'])->row();

			$data['academicYear'] = $this->globals->academicYear();
			$data['type_options'] = array(" " => "Select") + $this->globals->category();

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

				$data['action'] = 'student/admissiondetails' . $data['id'];

				$admissionDetails = $this->admin_model->getDetails('admissions', $data['id'])->row();

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
				$this->student_template->show('student/admission_details', $data);
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
				print_r($updateDetails);
				die();
				$result = $this->admin_model->updateDetails($data['id'], $updateDetails, 'admissions');

				// var_dump($this->db->last_query());
				// die();
				if ($result) {
					$this->session->set_flashdata('message', 'Admission Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-warning');
				}

				redirect('student/admission_details' . $id, 'refresh');
			}
		} else {
			redirect('student', 'refresh');
		}
	}

	function entranceexamdetails()
	{
		if ($this->session->userdata('student_in')) {
			$student_session = $this->session->userdata('student_in');
			$data['student_name'] = $student_session['student_name'];
			$data['id'] = $student_session['id'];
			$data['page_title'] = "ENTRANCE EXAM DETAILS";
			$data['menu'] = "entrancedetails";
			$data['userTypes'] = $this->globals->userTypes();
			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $data['id'])->row();

			$data['academicYear'] = $this->globals->academicYear();
			$data['type_options'] = array(" " => "Select") + $this->globals->category();

			$this->load->library('form_validation');

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			// $data['admissions'] = $this->admin_model->get_details_by_id($id, 'id', 'admissions');

			$this->form_validation->set_rules('entrance_type', 'Entrance Type', 'required');
			$this->form_validation->set_rules('entrance_reg_no', 'Entrance Registration Number', 'required');
			$this->form_validation->set_rules('entrance_rank', 'Entrance Exam Rank', 'required');
			$this->form_validation->set_rules('admission_order_no', 'Admission Order Number', 'required');
			$this->form_validation->set_rules('admission_order_date', 'Admission Order Date', 'required');
			$this->form_validation->set_rules('fees_paid', 'Fees Paid', 'required');
			$this->form_validation->set_rules('fees_receipt_no', 'Fees Receipt Number', 'required');
			$this->form_validation->set_rules('fees_receipt_date', 'Fees Receipt Date', 'required');

			if ($this->form_validation->run() === FALSE) {

				$data['action'] = 'student/entranceexamdetails/' . $data['id'];

				$entranceDetails = $this->admin_model->getDetails('admissions', $data['id'])->row();

				$data['entrance_type'] = $entranceDetails->entrance_type;
				$data['entrance_reg_no'] = $entranceDetails->entrance_reg_no;
				$data['entrance_rank'] = $entranceDetails->entrance_rank;
				$data['admission_order_no'] = $entranceDetails->admission_order_no;
				$data['admission_order_date'] = $entranceDetails->admission_order_date;
				$data['fees_paid'] = $entranceDetails->fees_paid;
				$data['fees_receipt_no'] = $entranceDetails->fees_receipt_no;
				$data['fees_receipt_date'] = $entranceDetails->fees_receipt_date;
				$this->student_template->show('student/entrance_details', $data);
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
				$result = $this->admin_model->updateDetails($data['id'], $updateDetails, 'admissions');

				// var_dump($this->db->last_query());
				// die();
				if ($result) {
					$this->session->set_flashdata('message', 'Entrance Exam Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-warning');
				}

				redirect('student/entranceexamdetails', 'refresh');
			}
		} else {
			redirect('student', 'refresh');
		}
	}

	function personaldetails()
	{
		if ($this->session->userdata('student_in')) {
			$student_session = $this->session->userdata('student_in');
			$data['student_name'] = $student_session['student_name'];
			$data['page_title'] = "PERSONAL DETAILS";
			$data['menu'] = "personaldetails";

			$data['username'] = $student_session['username'];
			$data['id'] = $student_session['id'];
			$data['menu'] = "personaldetails";
			$data['userTypes'] = $this->globals->userTypes();
			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $data['id'])->row();


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
			$this->form_validation->set_rules('type_of_disability', 'Type of Disability', 'required');
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

				$data['action'] = 'student/personaldetails/' . $data['id'];

				$personalDetails = $this->admin_model->getDetails('admissions', $data['id'])->row();

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
				$this->student_template->show('student/personal_details', $data);
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
				$result = $this->admin_model->updateDetails($data['id'], $updateDetails, 'admissions');

				// var_dump($this->db->last_query());
				// die();
				if ($result) {
					$this->session->set_flashdata('message', 'Personal Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-warning');
				}

				redirect('student/personaldetails', 'refresh');
			}
		} else {
			redirect('student', 'refresh');
		}
	}

	function parentdetails()
	{
		if ($this->session->userdata('student_in')) {
			$student_session = $this->session->userdata('student_in');
			$data['username'] = $student_session['username'];
			$data['id'] = $student_session['id'];
			$data['page_title'] = "PARENTS DETAILS";
			$data['menu'] = "parentdetails";
			$data['userTypes'] = $this->globals->userTypes();
			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $data['id'])->row();


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
			$this->form_validation->set_rules('mother_email', 'Mother Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('mother_occupation', 'Mother Occupation', 'required');
			$this->form_validation->set_rules('mother_annual_income', 'Mother Annual Income', 'required');
			$this->form_validation->set_rules('guardian_name', 'Guardian Name', 'required');
			$this->form_validation->set_rules('guardian_mobile', 'Guardian Mobile', 'required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('guardian_email', 'Guardian Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('guardian_occupation', 'Guardian Occupation', 'required');
			$this->form_validation->set_rules('guardian_annual_income', 'Guardian Annual Income', 'required');

			if ($this->form_validation->run() === FALSE) {

				$data['action'] = 'student/parentdetails/' . $data['id'];

				$parentDetails = $this->admin_model->getDetails('admissions', $data['id'])->row();

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
				$this->student_template->show('student/parent_details', $data);
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
				$result = $this->admin_model->updateDetails($data['id'], $updateDetails, 'admissions');

				// var_dump($this->db->last_query());
				// die();
				if ($result) {
					$this->session->set_flashdata('message', 'Parent Details updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-warning');
				}

				redirect('student/parentdetails', 'refresh');
			}
		} else {
			redirect('student', 'refresh');
		}
	}

	function educationdetails()
	{
		if ($this->session->userdata('student_in')) {
			$student_session = $this->session->userdata('student_in');
			$data['student_name'] = $student_session['student_name'];
			$data['id'] = $student_session['id'];
			$student_id = $student_session['id'];
			$data['page_title'] = "EDUCATION DETAILS";
			$data['menu'] = "educationdetails";

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
				$data['educations_details'] = $this->admin_model->getDetailsbyfield($student_id, 'student_id', 'student_education_details')->result();
				$data['action'] = 'student/educationdetails/';
				$data['student_name'] = $student_session['student_name'];
				$data['id'] = $student_session['id'];
				$student_id = $student_session['id'];
				$data['page_title'] = "EDUCATION DETAILS";
				$data['menu'] = "educationdetails";

				$this->student_template->show('student/education_details', $data);
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

				redirect('student/educationdetails', 'refresh');
			}
		} else {
			redirect('student', 'refresh');
		}
	}

	function finish()
	{
		if ($this->session->userdata('student_in')) {
			$student_session = $this->session->userdata('student_in');
			$data['student_name'] = $student_session['student_name'];
			$data['page_title'] = "Finish";
			$data['menu'] = "finish";
			$data['id'] = $student_session['id'];
		} else {
			redirect('student', 'refresh');
		}
	}

	function fee_details()
	{
		if ($this->session->userdata('student_in')) {
			$student_session = $this->session->userdata('student_in');
			$data['student_name'] = $student_session['student_name'];
			$data['id'] = $student_session['id'];
			$student_id = $student_session['id'];
			$data['page_title'] = "Fee Details";
			$data['menu'] = "fee_details";
			$data['action'] = "student/pay_now";
			$data['student'] = $this->admin_model->getDetails('admissions', $data['id'])->row();
			$data['fees'] = $this->admin_model->getDetailsbyfield($data['id'], 'student_id', 'fee_master')->row();

			$this->student_template->show('student/fee_details', $data);
		} else {
			redirect('student', 'refresh');
		}
	}

	function admissionfee()
	{
		if ($this->session->userdata('student_in')) {
			$student_session = $this->session->userdata('student_in');
			$data['student_name'] = $student_session['student_name'];
			$data['page_title'] = "Admissionfee";
			$data['menu'] = "admissionfee";
			$this->student_template->show('student/admission_fee', $data);
		} else {
			redirect('student', 'refresh');
		}
	}

	function documents()
	{
		if ($this->session->userdata('student_in')) {
			$student_session = $this->session->userdata('student_in');
			$data['student_name'] = $student_session['student_name'];
			$data['page_title'] = "New Document";
			$data['menu'] = "documents";
			$data['id'] = $student_session['id'];
			$student_id = $student_session['id'];
			$data['admissions'] = $this->admin_model->getDetails('admissions', 'id', $data['id'])->row();
			$this->form_validation->set_rules('documents', 'Document Type', 'required');

			if ($this->form_validation->run() === FALSE) {

				$upload_path = "./assets/students/$student_id/";

				// Check if the directory exists
				if (is_dir($upload_path)) {
					// Get list of files in the directory
					$files = scandir($upload_path);

					// Remove . and .. from the list
					$data['files'] = array_diff($files, array('.', '..'));
				} else {
					$data['files'] = array();
				}
				$data['action'] = 'student/documents';
				$this->student_template->show('student/documents', $data);
			} else {

				$documents = $this->input->post('documents');

				$config['upload_path'] = './assets/students/' . $data['id'] . '/';
				$config['allowed_types']    = 'jpg|png|pdf'; // Adjust file types as needed
				$config['max_size']         = 10240; // Maximum file size in kilobytes (10MB)
				$config['encrypt_name']     = FALSE; // Encrypt the file name for security
				// Make sure the directory exists, if not, create it
				if (!is_dir($config['upload_path'])) {
					mkdir($config['upload_path'], 0777, true);
				}
				$upload_path = $config['upload_path'];

				$this->load->library('upload', $config);

				$file_info = pathinfo($_FILES['photo']['name']);
				// Rename uploaded file with document type
				$new_file_name = $documents . '.' . $file_info['extension'];
				$_FILES['photo']['name'] = $new_file_name;
				$existing_file_path = $upload_path . $new_file_name;
				if (file_exists($existing_file_path)) {
					unlink($existing_file_path);
				}
				if (!$this->upload->do_upload('photo')) {
					// If upload fails, show error message
					$error = array('error' => $this->upload->display_errors());
					// Handle error as needed
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-warning');
				} else {
					// If upload succeeds, redirect or do further processing
					$data = array('upload_data' => $this->upload->data());
					// Handle success as needed
					$this->session->set_flashdata('message', 'Document udpated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				}

				redirect('student/documents', 'refresh');
			}
		} else {
			redirect('student', 'refresh');
		}
	}

	function changePassword()
	{
		if ($this->session->userdata('student_in')) {
			$student_session = $this->session->userdata('student_in');
			$data['student_name'] = $student_session['student_name'];
			$data['id'] = $student_session['id'];
			$data['page_title'] = "Change password";
			$data['menu'] = "changepassword";
			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $data['id'])->row();

			// $this->form_validation->set_rules('oldPassword', 'Old Password', 'required');
			$this->form_validation->set_rules('oldpassword', 'Old Password', 'required');
			$this->form_validation->set_rules('newpassword', 'New Password', 'required');
			$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[newpassword]');

			if ($this->form_validation->run() === FALSE) {

				$data['action'] = 'student/changePassword/' . $data['id'];
				$this->student_template->show('student/changepassword', $data);
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
					$result = $this->admin_model->changePassword($data['id'], $oldpassword, $updateDetails, 'admissions');
					if ($result) {
						$this->session->set_flashdata('message', 'Password udpated successfully...!');
						$this->session->set_flashdata('status', 'alert-success');
					} else {
						$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
						$this->session->set_flashdata('status', 'alert-warning');
					}
				}
				redirect('/student/changePassword', 'refresh');
			}
		} else {
			redirect('student', 'refresh');
		}
	}

	function updateeducationdetails($edu_id)
	{
		if ($this->session->userdata('student_in')) {
			$student_session = $this->session->userdata('student_in');
			$data['student_name'] = $student_session['student_name'];
			$data['id'] = $student_session['id'];
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
				$data['action'] = 'student/updateeducationdetails/' . $edu_id;
				$data['student_name'] = $student_session['student_name'];
				$data['id'] = $student_session['id'];
				$data['page_title'] = 'Update Education Details';
				$data['menu'] = 'educationdetails';

				$this->student_template->show('student/update_education_details', $data);
			} else {

				$updateDetails = array(
					'student_id' => $data['id'],
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


				if ($result) {
					$this->session->set_flashdata('message', 'Education Details Updated successfully...!');
					$this->session->set_flashdata('status', 'alert-success');
				} else {
					$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
					$this->session->set_flashdata('status', 'alert-warning');
				}

				redirect('student/educationdetails', 'refresh');
			}
		} else {
			redirect('student', 'refresh');
		}
	}

	function logout()
	{
		$this->session->unset_userdata('student_in');
		session_destroy();
		redirect('student', 'refresh');
	}

	public function testorder()
	{
		require_once APPPATH . 'libraries/Jwt.php';
		$this->load->library('logger');
		$headers = array(
			"alg" => "HS256",
			"clientid" => "bduatv2ktk",
			"kid" => "HMAC"
		);
		$order_id = rand();
		$trace_id = rand(1000000000,9999999999);
		$servertime = time();
		//    $config                         = $this->CI->config->item('billdesk');
		$api_url                        = "https://uat1.billdesk.com/u2/payments/ve1_2/orders/create";
		$payload                        = array();


		$payload['orderid']             = "MALbe" . $order_id;
		$payload['mercid']              = "BDUATV2KTK";
		$payload['order_date']          = date("c");
		$payload['amount']              = "10.00";
		$payload['currency']            = '356';

		$payload['ru'] 	           =  base_url() . 'student/callback'; // Return URL

		$payload['additional_info']    =  array(
			"additional_info1" => "B200910EC",
			"additional_info2" => "Anand",
			"additional_info3" => "abc@gmail.com",
			"additional_info4" => "NA",
			"additional_info5" => "NA",
			"additional_info6" => "NA",
			"additional_info7" => "NA"
		);
		$payload['itemcode']           = 'DIRECT';
		$payload['device']             =  array(
			"init_channel" => "internet",
			"ip" => $_SERVER['REMOTE_ADDR'],
			"user_agent"    => $_SERVER['HTTP_USER_AGENT'],
			"accept_header" => "text/html",
		);


		/*****************************************/
		// Encode payload
		/*****************************************/
		$curl_payload = JWT::encode($payload, "16uUloqqrs2iMUZnrojXtmkTeSQqjYIX", "HS256", $headers);



		/*****************************************/
		// Submit to Billdesk
		/*****************************************/
		$ch = curl_init($api_url);
		$ch_headers = array(
			"Content-Type: application/jose",
			"accept: application/jose",
			"bd-traceid: $trace_id",
			"bd-timestamp: $servertime"
		);

		// Append additional headers
		$ch_headers[] = "Content-Length: " . strlen($curl_payload);
		// pr($ch_headers);exit;
		$message = "Billdesk create order curl header - " . json_encode($ch_headers);
		$this->logger->write('billdesk', 'debug', $message);
		$message1 = "Billdesk Request payload - " . $curl_payload;
		$this->logger->write('billdesk', 'debug', $message1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $ch_headers);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_payload);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$message2 = "Billdesk create order response - " . $response;
		$this->logger->write('billdesk', 'debug', $message2);
		curl_close($response);
		$result_decoded = JWT::decode($response, "16uUloqqrs2iMUZnrojXtmkTeSQqjYIX", 'HS256');
		$result_array = (array) $result_decoded;
		$message = "Billdesk create order response decoded - " . json_encode($result_array);
		$this->logger->write('billdesk', 'debug', $message);
		if ($result_decoded->status == 'ACTIVE') {
			$transactionid = $result_array['links'][1]->parameters->bdorderid;
			$authtoken = $result_array['links'][1]->headers->authorization;
			$requestParams['order_id'] = $result_decoded->orderid;
			$requestParams['merchantId'] = $result_decoded->mercid;
			$requestParams['transactionid'] = $transactionid;
			$requestParams['authtoken'] = $authtoken;
			// return $requestParams;
			$this->load->view('student/payment', $requestParams);
		} else {
			$status = isset($result_decoded->status) ? $result_decoded->status : "Status not available";
			$message = "Billdesk create order status - " . $status;
			$this->logger->write('billdesk', 'debug', $message);
		}
	}


	public function callback()
	{
		require_once APPPATH . 'libraries/Jwt.php';
		$this->load->library('logger');
		$message = "BillDesk Response - " . json_encode($_POST) . "\n";
		$this->logger->write('billdesk', 'debug', $message);
		$tx = "";
		if (!empty($_POST)) {
			$tx_array = $_POST;
			if (isset($tx_array['transaction_response'])) {
				$tx = $tx_array['transaction_response'];
			}


			if (!empty($tx)) {
				$response_decoded = JWT::decode($tx, "16uUloqqrs2iMUZnrojXtmkTeSQqjYIX", 'HS256');
				$response_array = (array) $response_decoded;
				$response_json =  json_encode($response_array);
				$message = "BillDesk callback Response decode - " . $response_json . "\n";
				$this->logger->write('billdesk', 'debug', $message);
	
				if ($response_array['auth_status'] == '0300') {
					$status = 'pass';
				} else if ($response_array['auth_status'] == '0002') {
					$status = 'unknown';
				} else {
					$status = 'fail';
				}
	
	
	
				$return['amount']	    = (int)$response_array['amount'];
				$return['order_id']	    = $response_array['orderid'];
				$return['status']		= $status;
				$return['pgresponse']	= $response_json;
				$return['pgid']	        = $response_array['transactionid'];
	
				$updateDetails = array(
					'transaction_date' => $response_array['transaction_date'],
					'transaction_id' => $response_array['transactionid'],
					'txn_response' => $response_json,
	
				);
				if ($response_array['transaction_error_type'] == 'success') {
	
					$updateDetails['transaction_status'] = '1';
				} else if ($response_array['transaction_error_type'] == 'payment_processing_error') {
					$updateDetails['transaction_status'] = '2';
				} else {
					$updateDetails['transaction_status'] = '0';
				}
	
				$this->set_session($response_array['additional_info']->additional_info3, $response_array['additional_info']->additional_info4);
	
				$result = $this->admin_model->updateDetailsbyfield('reference_no', $response_array['orderid'], $updateDetails, 'transactions');
				
						$payment = ['orderid' => $response_array['orderid']];
    			$this->session->set_userdata('payment', $payment);
				redirect('student/payment_status', 'refresh');

			} else {
				$status = 'fail';
				$return['status']		= $status;
				redirect('student', 'refresh');
			}
		}
		else
		{
			redirect('student', 'refresh');
		}


		

	}


	function payment_status()
	{
		if ($this->session->userdata('student_in')) {
			$student_session = $this->session->userdata('student_in');
			$data['id'] = $student_session['id'];
			$data['student_name'] = $student_session['student_name'];
			$data['page_title'] = "Payment Status";
			$data['menu'] = "payment";
			$payment_session = $this->session->userdata('payment');
			$orderid = $payment_session['orderid'];
			$data['orderdetails'] = $this->admin_model->getDetailsbyfield($orderid, 'reference_no', 'transactions')->result();
			$this->student_template->show('student/payment_status', $data);
			
		} else {
			redirect('student', 'refresh');
		}
	}


	public function getTransactionDetails($order_id)
	{
		require_once APPPATH . 'libraries/Jwt.php';
		$this->load->library('logger');


		$billdesk_URL_retrive = "https://uat1.billdesk.com/u2/payments/ve1_2/transactions/get";
		$trace_id = rand(1000000000,9999999999);
		$servertime = time();
		$headers = array("alg" => "HS256", "clientid" => "bduatv2ktk", "kid" => "HMAC");
		$payload = array(
			"mercid" => 'BDUATV2KTK',
			"orderid" => $order_id,
		);
		$curl_payload = JWT::encode($payload, '16uUloqqrs2iMUZnrojXtmkTeSQqjYIX', 'HS256', $headers);
		$message = "BillDesk retrieve payload - " . $curl_payload . "\n";
		$this->logger->write('billdesk', 'debug', $message);
		$ch = curl_init($billdesk_URL_retrive);
		$ch_headers = array(
			"Content-Type: application/jose",
			"accept: application/jose",
			"BD-Traceid: $trace_id",
			"BD-Timestamp: $servertime"
		);

		$message = "BillDesk retrieve curl header - " . json_encode($ch_headers) . "\n";
		$this->logger->write('billdesk', 'debug', $message);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $ch_headers);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_payload);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);

		$message = "Billdesk retrieve order response - " . $response;
		$this->logger->write('billdesk', 'debug', $message);
		curl_close($ch);
		$result_decoded = JWT::decode($response, '16uUloqqrs2iMUZnrojXtmkTeSQqjYIX', 'HS256');
		$response_array = (array) $result_decoded;
		$message = "Billdesk retrieve order response decoded - " . json_encode($response_array);
		$this->logger->write('billdesk', 'debug', $message);
		$res['status'] = 3;
		$res['reason'] = "UNKNOWN";

		if ($response_array['transactionid']) {

			if ($response_array['auth_status'] == '0300') {
				$res['status'] = 5;
				$res['txn_id'] = $response_array['transactionid'];
				$res['reason'] = 'success';
			} else if ($response_array['auth_status'] == '0002') {
				$res['status'] = 2;
				$res['reason'] = 'pending';
			} else if ($response_array['auth_status'] == '0399') {
				$res['status'] = 6;
				$res['reason'] = 'fail';
			}

			$res['amount'] = (int)$response_array['amount'];
		}

		var_dump($res);
		exit;
		return $res;
	}

	public function pay_now()
	{

		if ($this->session->userdata('student_in')) {
			$student_session = $this->session->userdata('student_in');
			$data['student_name'] = $student_session['student_name'];
			$data['id'] = $student_session['id'];
			require_once APPPATH . 'libraries/Jwt.php';
			$this->load->library('logger');
			$insert = array(
				'amount' => number_format((float)$this->input->post('amount'), 2, '.', ''),
				'reg_no' => $this->input->post('usn'),
				// 'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				'reference_no' => $this->input->post('usn') . time(),
				'transaction_type' => '3',
				'academic_year' => "2024-2025",
				'admissions_id' => $data['id'],
				'reference_date' => date('Y-m-d'),
				'transaction_status' => '0',
				'created_on' => date('Y-m-d h:i:s')
			);

			$result = $this->admin_model->insertDetails('transactions', $insert);

			$headers = array(
				"alg" => "HS256",
				"clientid" => "bduatv2ktk",
				"kid" => "HMAC"
			);
			$order_id = rand();
			$trace_id = rand(1000000000,9999999999);
			$servertime = time();
			//    $config                         = $this->CI->config->item('billdesk');
			$api_url                        = "https://uat1.billdesk.com/u2/payments/ve1_2/orders/create";
			$payload                        = array();


			$payload['orderid']             = $insert['reference_no'];
			$payload['mercid']              = "BDUATV2KTK";
			$payload['order_date']          = date("c");
			$payload['amount']              = $insert['amount'];
			$payload['currency']            = '356';

			$payload['ru'] 	           =  base_url() . 'student/callback'; // Return URL

			$payload['additional_info']    =  array(
				"additional_info1" => $insert['reg_no'],
				"additional_info2" => $this->input->post('name'),
				"additional_info3" => $this->input->post('email'),
				"additional_info4" => $insert['mobile'],
				"additional_info5" => "Fee Payment",
				"additional_info6" => "NA",
				"additional_info7" => "NA"
			);
			$payload['itemcode']           = 'DIRECT';
			$payload['device']             =  array(
				"init_channel" => "internet",
				"ip" => $_SERVER['REMOTE_ADDR'],
				"user_agent"    => $_SERVER['HTTP_USER_AGENT'],
				"accept_header" => "text/html",
			);
			// var_dump($payload);
			// die();

			/*****************************************/
			// Encode payload
			/*****************************************/
			$curl_payload = JWT::encode($payload, "16uUloqqrs2iMUZnrojXtmkTeSQqjYIX", "HS256", $headers);



			/*****************************************/
			// Submit to Billdesk
			/*****************************************/
			$ch = curl_init($api_url);
			$ch_headers = array(
				"Content-Type: application/jose",
				"accept: application/jose",
				"bd-traceid: $trace_id",
				"bd-timestamp: $servertime"
			);

			// Append additional headers
			$ch_headers[] = "Content-Length: " . strlen($curl_payload);
			// pr($ch_headers);exit;
			$message = "Billdesk create order curl header - " . json_encode($ch_headers) . "\n";
			$this->logger->write('billdesk', 'debug', $message);
			$message1 = "Billdesk Request payload - " . $curl_payload . "\n";
			$this->logger->write('billdesk', 'debug', $message1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $ch_headers);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_payload);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			$message2 = "Billdesk create order response - " . $response . "\n";
			$this->logger->write('billdesk', 'debug', $message2);
			curl_close($response);
			$result_decoded = JWT::decode($response, "16uUloqqrs2iMUZnrojXtmkTeSQqjYIX", 'HS256');
			$result_array = (array) $result_decoded;
			$message = "Billdesk create order response decoded - " . json_encode($result_array) . "\n";
			$this->logger->write('billdesk', 'debug', $message);
			if ($result_decoded->status == 'ACTIVE') {
				$transactionid = $result_array['links'][1]->parameters->bdorderid;
				$authtoken = $result_array['links'][1]->headers->authorization;
				$requestParams['order_id'] = $result_decoded->orderid;
				$requestParams['merchantId'] = $result_decoded->mercid;
				$requestParams['transactionid'] = $transactionid;
				$requestParams['authtoken'] = $authtoken;
				// return $requestParams;
				$this->load->view('student/payment', $requestParams);
			} else {
				$status = isset($result_decoded->status) ? $result_decoded->status : "Status not available";
				$message = "Billdesk create order status - " . $status;
				$this->logger->write('billdesk', 'debug', $message);
			}
		} else {
			redirect('student', 'refresh');
		}
	}


	public function set_session($email, $mobile)
	{
		//Field validation succeeded.  Validate against database
		$email = $this->input->post('email');

		//query the database
		$result = $this->admin_model->set_session($email, $mobile);
		if ($result) {
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'id' => $row->id,
					'student_name' => $row->student_name,
					'flow' => $row->flow
				);
				$this->session->set_userdata('student_in', $sess_array);
			}
			return TRUE;
		} else {
			
			return false;
		}
	}


}
