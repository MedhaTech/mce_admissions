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
		$this->client = new BillDeskJWEHS256Client("https://pguat.billdesk.io", "cnbmlndegc", "WHjXW5WHk27mr50KetSh75vyapmO14IT");
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
				$data['flow_status'] = $flow;

				$upload_path = "./assets/students/$student_id/";

				// Check if the directory exists
				$photo = null;
				if (is_dir($upload_path)) {
					// Get list of files in the directory
					$files = scandir($upload_path);

					// Remove . and .. from the list
					$files = array_diff($files, array('.', '..'));

					// Filter for photo files
					$image_extensions = array('jpg', 'jpeg', 'png');
					foreach ($files as $file) {
						$ext = pathinfo($file, PATHINFO_EXTENSION);
						$filename = pathinfo($file, PATHINFO_FILENAME);

						// Check if the file is an image and contains keywords like 'profile' or the student's ID
						if (
							in_array(strtolower($ext), $image_extensions) &&
							(stripos($filename, 'profile') !== false)
						) {
							$photo = $upload_path . $file;  // Use the first matching photo found
							break;
						}
					}

					$data['files'] = $files;
				} else {
					$data['files'] = array();
				}
				if ($data['admissionDetails']->stream_id == 3) {
					$this->student_template->show('student/finishphd', $data);
				} else {
					$this->student_template->show('student/finish', $data);
				}
				$data['student_photo'] = $photo;  // Pass the photo path to the view


			} else {
				$this->student_template->show('student/Dashboard', $data);
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
			// $data['feesDetails'] = $this->admin_model->getDetails('fee', $data['id'])->row();

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
			$this->form_validation->set_rules('admission_order_no', 'Admission Order Number', '');
			$this->form_validation->set_rules('admission_order_date', 'Admission Order Date', '');
			$this->form_validation->set_rules('fees_paid', 'Fees Paid', '');
			$this->form_validation->set_rules('fees_receipt_no', 'Fees Receipt Number', '');
			$this->form_validation->set_rules('fees_receipt_date', 'Fees Receipt Date', '');

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

				redirect('student/personaldetails', 'refresh');
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
			$data['states'] = array(" " => "Select State") + $this->globals->states();
			$data['religion_option'] = array(" " => "Select Religion") + $this->globals->religion();
			$data['caste_option'] = array(" " => "Select Caste") + $this->globals->caste();
			$data['countries'] = $this->admin_model->getCountries();
			$data['states1'] = $this->admin_model->get_states();
			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $data['id'])->row();

			$data['stream_id'] = $data['admissionDetails']->stream_id;

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
			$this->form_validation->set_rules('admission_based', 'Admission Based On', 'required');
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
				$data['admission_based'] = $personalDetails->admission_based;
				$data['lateral_entry'] = $personalDetails->lateral_entry;
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
					'lateral_entry' => $this->input->post('lateral_entry'),
					'admission_based' => $this->input->post('admission_based'),
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

				redirect('student/parentdetails', 'refresh');
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
			$this->form_validation->set_rules('mother_mobile', 'Mother Mobile', 'regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('mother_email', 'Mother Email', 'trim|valid_email');
			$this->form_validation->set_rules('mother_occupation', 'Mother Occupation');
			$this->form_validation->set_rules('mother_annual_income', 'Mother Annual Income');
			$this->form_validation->set_rules('guardian_name', 'Guardian Name', '');
			$this->form_validation->set_rules('guardian_mobile', 'Guardian Mobile', 'regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('guardian_email', 'Guardian Email', 'trim|valid_email');
			$this->form_validation->set_rules('guardian_occupation', 'Guardian Occupation');
			$this->form_validation->set_rules('guardian_annual_income', 'Guardian Annual Income');

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

				redirect('student/educationdetails', 'refresh');
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
			$personalDetails = $this->admin_model->getDetails('admissions', $data['id'])->row();

			$this->form_validation->set_rules('education_level', 'Education Level', 'required');
			// $this->form_validation->set_rules('inst_type', 'Institution Type', 'required');
			$this->form_validation->set_rules('inst_board', 'Board / University', 'required');
			$this->form_validation->set_rules('inst_name', 'Institution Name', 'required');
			$this->form_validation->set_rules('inst_address', 'Institution Address', 'required');
			$this->form_validation->set_rules('inst_city', 'Institution City');
			$this->form_validation->set_rules('inst_state', 'Institution State', 'required');
			$this->form_validation->set_rules('inst_country', 'Institution Country', 'required');
			$this->form_validation->set_rules('medium_of_instruction', 'Medium of Instruction', 'required');
			$this->form_validation->set_rules('register_number', 'Register Number', 'required');
			$this->form_validation->set_rules('year_of_passing', 'Year of Passing', 'required');
			if ($personalDetails->admission_based == "PUC") {
				$this->form_validation->set_rules('puc_education_level', 'Education Level', 'required');
				// $this->form_validation->set_rules('puc_inst_type', 'Institution Type', 'required');
				$this->form_validation->set_rules('puc_inst_board', 'Board / University', 'required');
				$this->form_validation->set_rules('puc_inst_name', 'Institution Name', 'required');
				$this->form_validation->set_rules('puc_inst_address', 'Institution Address', 'required');
				$this->form_validation->set_rules('puc_inst_city', 'Institution City');
				$this->form_validation->set_rules('puc_inst_state', 'Institution State', 'required');
				$this->form_validation->set_rules('puc_inst_country', 'Institution Country', 'required');
				$this->form_validation->set_rules('puc_medium_of_instruction', 'Medium of Instruction', 'required');
				$this->form_validation->set_rules('puc_register_number', 'Register Number', 'required');
				$this->form_validation->set_rules('puc_year_of_passing', 'Year of Passing', 'required');
			}
			if ($personalDetails->admission_based == "Diploma" && $personalDetails->lateral_entry == "DIPLOMA") {
				$this->form_validation->set_rules('diploma_education_level', 'Education Level', 'required');
				// $this->form_validation->set_rules('diploma_inst_type', 'Institution Type', 'required');
				$this->form_validation->set_rules('diploma_inst_board', 'Board / University', 'required');
				$this->form_validation->set_rules('diploma_inst_name', 'Institution Name', 'required');
				$this->form_validation->set_rules('diploma_inst_address', 'Institution Address', 'required');
				$this->form_validation->set_rules('diploma_inst_city', 'Institution City');
				$this->form_validation->set_rules('diploma_inst_state', 'Institution State', 'required');
				$this->form_validation->set_rules('diploma_inst_country', 'Institution Country', 'required');
				$this->form_validation->set_rules('diploma_medium_of_instruction', 'Medium of Instruction', 'required');
				$this->form_validation->set_rules('diploma_register_number', 'Register Number', 'required');
				$this->form_validation->set_rules('diploma_year_of_passing', 'Year of Passing', 'required');
			}
			if ($personalDetails->admission_based == "Diploma" && $personalDetails->lateral_entry == "GTTC") {
				$this->form_validation->set_rules('gt_education_level', 'Education Level', 'required');
				// $this->form_validation->set_rules('gt_inst_type', 'Institution Type', 'required');
				$this->form_validation->set_rules('gt_inst_board', 'Board / University', 'required');
				$this->form_validation->set_rules('gt_inst_name', 'Institution Name', 'required');
				$this->form_validation->set_rules('gt_inst_address', 'Institution Address', 'required');
				$this->form_validation->set_rules('gt_inst_city', 'Institution City');
				$this->form_validation->set_rules('gt_inst_state', 'Institution State', 'required');
				$this->form_validation->set_rules('gt_inst_country', 'Institution Country', 'required');
				$this->form_validation->set_rules('gt_medium_of_instruction', 'Medium of Instruction', 'required');
				$this->form_validation->set_rules('gt_register_number', 'Register Number', 'required');
				$this->form_validation->set_rules('gt_year_of_passing', 'Year of Passing', 'required');
			}
			if ($personalDetails->admission_based == "BE") {
				$this->form_validation->set_rules('deg_education_level', 'Education Level', 'required');
				// $this->form_validation->set_rules('puc_inst_type', 'Institution Type', 'required');
				$this->form_validation->set_rules('deg_inst_board', 'Board / University', 'required');
				$this->form_validation->set_rules('deg_inst_name', 'Institution Name', 'required');
				$this->form_validation->set_rules('deg_inst_address', 'Institution Address', 'required');
				$this->form_validation->set_rules('deg_inst_city', 'Institution City');
				$this->form_validation->set_rules('deg_inst_state', 'Institution State', 'required');
				$this->form_validation->set_rules('deg_inst_country', 'Institution Country', 'required');
				$this->form_validation->set_rules('deg_medium_of_instruction', 'Medium of Instruction', 'required');
				$this->form_validation->set_rules('deg_register_number', 'Register Number', 'required');
				$this->form_validation->set_rules('deg_year_of_passing', 'Year of Passing', 'required');
			}
			if ($personalDetails->admission_based == "MTech") {
				$this->form_validation->set_rules('mtech_education_level', 'Education Level', 'required');
				// $this->form_validation->set_rules('puc_inst_type', 'Institution Type', 'required');
				$this->form_validation->set_rules('mtech_inst_board', 'Board / University', 'required');
				$this->form_validation->set_rules('mtech_inst_name', 'Institution Name', 'required');
				$this->form_validation->set_rules('mtech_inst_address', 'Institution Address', 'required');
				$this->form_validation->set_rules('mtech_inst_city', 'Institution City');
				$this->form_validation->set_rules('mtech_inst_state', 'Institution State', 'required');
				$this->form_validation->set_rules('mtech_inst_country', 'Institution Country', 'required');
				$this->form_validation->set_rules('mtech_medium_of_instruction', 'Medium of Instruction', 'required');
				$this->form_validation->set_rules('mtech_register_number', 'Register Number', 'required');
				$this->form_validation->set_rules('mtech_year_of_passing', 'Year of Passing', 'required');
			}
			if ($personalDetails->admission_based == "M.Sc") {
				$this->form_validation->set_rules('msc_education_level', 'Education Level', 'required');
				// $this->form_validation->set_rules('puc_inst_type', 'Institution Type', 'required');
				$this->form_validation->set_rules('msc_inst_board', 'Board / University', 'required');
				$this->form_validation->set_rules('msc_inst_name', 'Institution Name', 'required');
				$this->form_validation->set_rules('msc_inst_address', 'Institution Address', 'required');
				$this->form_validation->set_rules('msc_inst_city', 'Institution City');
				$this->form_validation->set_rules('msc_inst_state', 'Institution State', 'required');
				$this->form_validation->set_rules('msc_inst_country', 'Institution Country', 'required');
				$this->form_validation->set_rules('msc_medium_of_instruction', 'Medium of Instruction', 'required');
				$this->form_validation->set_rules('msc_register_number', 'Register Number', 'required');
				$this->form_validation->set_rules('msc_year_of_passing', 'Year of Passing', 'required');
			}
			if ($personalDetails->admission_based == "M.ScEngg") {
				$this->form_validation->set_rules('mscegg_education_level', 'Education Level', 'required');
				// $this->form_validation->set_rules('puc_inst_type', 'Institution Type', 'required');
				$this->form_validation->set_rules('mscegg_inst_board', 'Board / University', 'required');
				$this->form_validation->set_rules('mscegg_inst_name', 'Institution Name', 'required');
				$this->form_validation->set_rules('mscegg_inst_address', 'Institution Address', 'required');
				$this->form_validation->set_rules('mscegg_inst_city', 'Institution City');
				$this->form_validation->set_rules('mscegg_inst_state', 'Institution State', 'required');
				$this->form_validation->set_rules('mscegg_inst_country', 'Institution Country', 'required');
				$this->form_validation->set_rules('mscegg_medium_of_instruction', 'Medium of Instruction', 'required');
				$this->form_validation->set_rules('mscegg_register_number', 'Register Number', 'required');
				$this->form_validation->set_rules('mscegg_year_of_passing', 'Year of Passing', 'required');
			}

			if ($this->form_validation->run() === FALSE) {

				// var_dump($this->input->post());
				// die();
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
				if ($personalDetails->admission_based == "PUC") {

					$data = array(
						'puc_education_level' => $this->input->post('puc_education_level'),
						'puc_inst_type' => $this->input->post('puc_inst_type'),
						'puc_inst_board' => $this->input->post('puc_inst_board'),
						'puc_inst_name' => $this->input->post('puc_inst_name'),
						'puc_inst_address' => $this->input->post('puc_inst_address'),
						'puc_inst_city' => $this->input->post('puc_inst_city'),
						'puc_inst_state' => $this->input->post('puc_inst_state'),
						'puc_inst_country' => $this->input->post('puc_inst_country'),
						'puc_medium_of_instruction' => $this->input->post('puc_medium_of_instruction'),
						'puc_register_number' => $this->input->post('puc_register_number'),
						'puc_year_of_passing' => $this->input->post('puc_year_of_passing')
					);
					for ($i = 1; $i <= 6; $i++) {
						$subject_name = $this->input->post('puc_subject_' . $i . '_name');
						$min_marks = $this->input->post('puc_subject_' . $i . '_min_marks');
						$max_marks = $this->input->post('puc_subject_' . $i . '_max_marks');
						$obtained_marks = $this->input->post('puc_subject_' . $i . '_obtained_marks');

						// Only add subject if name is not empty
						if (!empty($subject_name)) {
							$data['puc_subject_' . $i . '_name'] = $subject_name;
							$data['puc_subject_' . $i . '_min_marks'] = $min_marks;
							$data['puc_subject_' . $i . '_max_marks'] = $max_marks;
							$data['puc_subject_' . $i . '_obtained_marks'] = $obtained_marks;
						}
					}
				}

				if ($personalDetails->admission_based == "Diploma" && $personalDetails->lateral_entry == "DIPLOMA") {

					$data = array(
						'diploma_education_level' => $this->input->post('education_level'),
						'diploma_inst_type' => $this->input->post('diploma_inst_type'),
						'diploma_inst_board' => $this->input->post('diploma_inst_board'),
						'diploma_inst_name' => $this->input->post('diploma_inst_name'),
						'diploma_inst_address' => $this->input->post('diploma_inst_address'),
						'diploma_inst_city' => $this->input->post('diploma_inst_city'),
						'diploma_inst_state' => $this->input->post('diploma_inst_state'),
						'diploma_inst_country' => $this->input->post('diploma_inst_country'),
						'diploma_medium_of_instruction' => $this->input->post('diploma_medium_of_instruction'),
						'diploma_register_number' => $this->input->post('diploma_register_number'),
						'diploma_year_of_passing' => $this->input->post('diploma_year_of_passing')
					);
					for ($i = 1; $i <= 3; $i++) {
						$subject_name = $this->input->post('diploma_subject_' . $i . '_name');
						$min_marks = $this->input->post('diploma_subject_' . $i . '_min_marks');
						$max_marks = $this->input->post('diploma_subject_' . $i . '_max_marks');
						$obtained_marks = $this->input->post('diploma_subject_' . $i . '_obtained_marks');

						// Only add subject if name is not empty
						if (!empty($subject_name)) {
							$data['diploma_subject_' . $i . '_name'] = $subject_name;
							$data['diploma_subject_' . $i . '_min_marks'] = $min_marks;
							$data['diploma_subject_' . $i . '_max_marks'] = $max_marks;
							$data['diploma_subject_' . $i . '_obtained_marks'] = $obtained_marks;
						}
					}
				}

				if ($personalDetails->admission_based == "Diploma" && $personalDetails->lateral_entry == "GTTC") {

					$data = array(
						'gt_education_level' => $this->input->post('gt_education_level'),
						'gt_inst_type' => $this->input->post('gt_inst_type'),
						'gt_inst_board' => $this->input->post('gt_inst_board'),
						'gt_inst_name' => $this->input->post('gt_inst_name'),
						'gt_inst_address' => $this->input->post('gt_inst_address'),
						'gt_inst_city' => $this->input->post('gt_inst_city'),
						'gt_inst_state' => $this->input->post('gt_inst_state'),
						'gt_inst_country' => $this->input->post('gt_inst_country'),
						'gt_medium_of_instruction' => $this->input->post('gt_medium_of_instruction'),
						'gt_register_number' => $this->input->post('gt_register_number'),
						'gt_year_of_passing' => $this->input->post('gt_year_of_passing')
					);
					for ($i = 1; $i <= 4; $i++) {
						$subject_name = $this->input->post('gt_subject_' . $i . '_name');
						$min_marks = $this->input->post('gt_subject_' . $i . '_min_marks');
						$max_marks = $this->input->post('gt_subject_' . $i . '_max_marks');
						$obtained_marks = $this->input->post('gt_subject_' . $i . '_obtained_marks');

						// Only add subject if name is not empty
						if (!empty($subject_name)) {
							$data['gt_subject_' . $i . '_name'] = $subject_name;
							$data['gt_subject_' . $i . '_min_marks'] = $min_marks;
							$data['gt_subject_' . $i . '_max_marks'] = $max_marks;
							$data['gt_subject_' . $i . '_obtained_marks'] = $obtained_marks;
						}
					}
				}

				if ($personalDetails->admission_based == "BE") {

					$data = array(
						'deg_education_level' => $this->input->post('deg_education_level'),
						'deg_inst_type' => $this->input->post('deg_inst_type'),
						'deg_inst_board' => $this->input->post('deg_inst_board'),
						'deg_inst_name' => $this->input->post('deg_inst_name'),
						'deg_inst_address' => $this->input->post('deg_inst_address'),
						'deg_inst_city' => $this->input->post('deg_inst_city'),
						'deg_inst_state' => $this->input->post('deg_inst_state'),
						'deg_inst_country' => $this->input->post('deg_inst_country'),
						'deg_medium_of_instruction' => $this->input->post('deg_medium_of_instruction'),
						'deg_register_number' => $this->input->post('deg_register_number'),
						'deg_year_of_passing' => $this->input->post('deg_year_of_passing')
					);
					for ($i = 1; $i <= 3; $i++) {
						$subject_name = $this->input->post('deg_subject_' . $i . '_name');
						$min_marks = $this->input->post('deg_subject_' . $i . '_min_marks');
						$max_marks = $this->input->post('deg_subject_' . $i . '_max_marks');
						$obtained_marks = $this->input->post('deg_subject_' . $i . '_obtained_marks');

						// Only add subject if name is not empty
						if (!empty($subject_name)) {
							$data['deg_subject_' . $i . '_name'] = $subject_name;
							$data['deg_subject_' . $i . '_min_marks'] = $min_marks;
							$data['deg_subject_' . $i . '_max_marks'] = $max_marks;
							$data['deg_subject_' . $i . '_obtained_marks'] = $obtained_marks;
						}
					}
				}

				if ($personalDetails->admission_based == "MTech") {

					$data = array(
						'mtech_education_level' => $this->input->post('mtech_education_level'),
						'mtech_inst_type' => $this->input->post('mtech_inst_type'),
						'mtech_inst_board' => $this->input->post('mtech_inst_board'),
						'mtech_inst_name' => $this->input->post('mtech_inst_name'),
						'mtech_inst_address' => $this->input->post('mtech_inst_address'),
						'mtech_inst_city' => $this->input->post('mtech_inst_city'),
						'mtech_inst_state' => $this->input->post('mtech_inst_state'),
						'mtech_inst_country' => $this->input->post('mtech_inst_country'),
						'mtech_medium_of_instruction' => $this->input->post('mtech_medium_of_instruction'),
						'mtech_register_number' => $this->input->post('mtech_register_number'),
						'mtech_year_of_passing' => $this->input->post('mtech_year_of_passing')
					);
					for ($i = 1; $i <= 3; $i++) {
						$subject_name = $this->input->post('mtech_subject_' . $i . '_name');
						$min_marks = $this->input->post('mtech_subject_' . $i . '_min_marks');
						$max_marks = $this->input->post('mtech_subject_' . $i . '_max_marks');
						$obtained_marks = $this->input->post('mtech_subject_' . $i . '_obtained_marks');

						// Only add subject if name is not empty
						if (!empty($subject_name)) {
							$data['mtech_subject_' . $i . '_name'] = $subject_name;
							$data['mtech_subject_' . $i . '_min_marks'] = $min_marks;
							$data['mtech_subject_' . $i . '_max_marks'] = $max_marks;
							$data['mtech_subject_' . $i . '_obtained_marks'] = $obtained_marks;
						}
					}
				}

				if ($personalDetails->admission_based == "M.Sc") {

					$data = array(
						'msc_education_level' => $this->input->post('msc_education_level'),
						'msc_inst_type' => $this->input->post('msc_inst_type'),
						'msc_inst_board' => $this->input->post('msc_inst_board'),
						'msc_inst_name' => $this->input->post('msc_inst_name'),
						'msc_inst_address' => $this->input->post('msc_inst_address'),
						'msc_inst_city' => $this->input->post('msc_inst_city'),
						'msc_inst_state' => $this->input->post('msc_inst_state'),
						'msc_inst_country' => $this->input->post('msc_inst_country'),
						'msc_medium_of_instruction' => $this->input->post('msc_medium_of_instruction'),
						'msc_register_number' => $this->input->post('msc_register_number'),
						'msc_year_of_passing' => $this->input->post('msc_year_of_passing')
					);
					for ($i = 1; $i <= 3; $i++) {
						$subject_name = $this->input->post('msc_subject_' . $i . '_name');
						$min_marks = $this->input->post('msc_subject_' . $i . '_min_marks');
						$max_marks = $this->input->post('msc_subject_' . $i . '_max_marks');
						$obtained_marks = $this->input->post('msc_subject_' . $i . '_obtained_marks');

						// Only add subject if name is not empty
						if (!empty($subject_name)) {
							$data['msc_subject_' . $i . '_name'] = $subject_name;
							$data['msc_subject_' . $i . '_min_marks'] = $min_marks;
							$data['msc_subject_' . $i . '_max_marks'] = $max_marks;
							$data['msc_subject_' . $i . '_obtained_marks'] = $obtained_marks;
						}
					}
				}

				if ($personalDetails->admission_based == "M.ScEngg") {

					$data = array(
						'mscegg_education_level' => $this->input->post('mscegg_education_level'),
						'mscegg_inst_type' => $this->input->post('mscegg_inst_type'),
						'mscegg_inst_board' => $this->input->post('mscegg_inst_board'),
						'mscegg_inst_name' => $this->input->post('mscegg_inst_name'),
						'mscegg_inst_address' => $this->input->post('mscegg_inst_address'),
						'mscegg_inst_city' => $this->input->post('mscegg_inst_city'),
						'mscegg_inst_state' => $this->input->post('mscegg_inst_state'),
						'mscegg_inst_country' => $this->input->post('mscegg_inst_country'),
						'mscegg_medium_of_instruction' => $this->input->post('mscegg_medium_of_instruction'),
						'mscegg_register_number' => $this->input->post('mscegg_register_number'),
						'mscegg_year_of_passing' => $this->input->post('mscegg_year_of_passing')
					);
					for ($i = 1; $i <= 3; $i++) {
						$subject_name = $this->input->post('mscegg_subject_' . $i . '_name');
						$min_marks = $this->input->post('mscegg_subject_' . $i . '_min_marks');
						$max_marks = $this->input->post('mscegg_subject_' . $i . '_max_marks');
						$obtained_marks = $this->input->post('mscegg_subject_' . $i . '_obtained_marks');

						// Only add subject if name is not empty
						if (!empty($subject_name)) {
							$data['mscegg_subject_' . $i . '_name'] = $subject_name;
							$data['mscegg_subject_' . $i . '_min_marks'] = $min_marks;
							$data['mscegg_subject_' . $i . '_max_marks'] = $max_marks;
							$data['mscegg_subject_' . $i . '_obtained_marks'] = $obtained_marks;
						}
					}
				}

				// Insert subject fields

				$data['educations_details'] = $this->admin_model->getDetailsbyfield($student_id, 'student_id', 'student_education_details')->result();
				$data['action'] = 'student/educationdetails/';
				$data['student_name'] = $student_session['student_name'];
				$data['id'] = $student_session['id'];
				$student_id = $student_session['id'];
				$data['page_title'] = "EDUCATION DETAILS";
				$data['menu'] = "educationdetails";
				$data['instruction_options'] = array(" " => "Select Medium of instruction") + $this->globals->medium_of_instruction();
				$data['countries'] = $this->admin_model->getCountries();
				$data['personalDetails'] = $this->admin_model->getDetails('admissions', $data['id'])->row();
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
					'obtained' => $this->input->post('total_obtained_marks'),
					'maximum' => $this->input->post('total_max_marks'),
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

				if ($personalDetails->admission_based == "PUC") {
					$insertDetails3 = array(
						'student_id' => $student_id,
						'education_level' => $this->input->post('puc_education_level'),
						'inst_type' => $this->input->post('puc_inst_type'),
						'inst_board' => $this->input->post('puc_inst_board'),
						'inst_name' => $this->input->post('puc_inst_name'),
						'inst_address' => $this->input->post('puc_inst_address'),
						'inst_city' => $this->input->post('puc_inst_city'),
						'inst_state' => $this->input->post('puc_inst_state'),
						'inst_country' => $this->input->post('puc_inst_country'),
						'medium_of_instruction' => $this->input->post('puc_medium_of_instruction'),
						'register_number' => $this->input->post('puc_register_number'),
						'year_of_passing' => $this->input->post('puc_year_of_passing'),
						'aggregate' => $this->input->post('puc_aggregate'),
						'obtained' => $this->input->post('puc_total_obtained_marks'),
						'maximum' => $this->input->post('puc_total_max_marks'),
						'updated_on' => date('Y-m-d h:i:s'),
						'updated_by' => $data['student_name']
					);

					// Insert subject fields
					for ($i = 1; $i <= 6; $i++) {
						$subject_name = $this->input->post('puc_subject_' . $i . '_name');
						$min_marks = $this->input->post('puc_subject_' . $i . '_min_marks');
						$max_marks = $this->input->post('puc_subject_' . $i . '_max_marks');
						$obtained_marks = $this->input->post('puc_subject_' . $i . '_obtained_marks');

						// Only add subject if name is not empty
						if (!empty($subject_name)) {
							$insertDetails3['subject_' . $i . '_name'] = $subject_name;
							$insertDetails3['subject_' . $i . '_min_marks'] = $min_marks;
							$insertDetails3['subject_' . $i . '_max_marks'] = $max_marks;
							$insertDetails3['subject_' . $i . '_obtained_marks'] = $obtained_marks;
						}
					}
					$result = $this->admin_model->insertDetails('student_education_details', $insertDetails3);
				}

				if ($personalDetails->admission_based == "Diploma" && $personalDetails->lateral_entry == "DIPLOMA") {
					$insertDetails2 = array(
						'student_id' => $student_id,
						'education_level' => $this->input->post('diploma_education_level'),
						'inst_type' => $this->input->post('diploma_inst_type'),
						'inst_board' => $this->input->post('diploma_inst_board'),
						'inst_name' => $this->input->post('diploma_inst_name'),
						'inst_address' => $this->input->post('diploma_inst_address'),
						'inst_city' => $this->input->post('diploma_inst_city'),
						'inst_state' => $this->input->post('diploma_inst_state'),
						'inst_country' => $this->input->post('diploma_inst_country'),
						'medium_of_instruction' => $this->input->post('diploma_medium_of_instruction'),
						'register_number' => $this->input->post('diploma_register_number'),
						'year_of_passing' => $this->input->post('diploma_year_of_passing'),
						'aggregate' => $this->input->post('diploma_aggregate'),
						'obtained' => $this->input->post('diploma_total_obtained_marks'),
						'maximum' => $this->input->post('diploma_total_max_marks'),
						'updated_on' => date('Y-m-d h:i:s'),
						'updated_by' => $data['student_name']
					);

					// Insert subject fields
					for ($i = 1; $i <= 3; $i++) {
						$subject_name = $this->input->post('diploma_subject_' . $i . '_name');
						$min_marks = $this->input->post('diploma_subject_' . $i . '_min_marks');
						$max_marks = $this->input->post('diploma_subject_' . $i . '_max_marks');
						$obtained_marks = $this->input->post('diploma_subject_' . $i . '_obtained_marks');

						// Only add subject if name is not empty
						if (!empty($min_marks)) {
							$insertDetails2['subject_' . $i . '_name'] = $subject_name;
							$insertDetails2['subject_' . $i . '_min_marks'] = $min_marks;
							$insertDetails2['subject_' . $i . '_max_marks'] = $max_marks;
							$insertDetails2['subject_' . $i . '_obtained_marks'] = $obtained_marks;
						}
					}
					$result = $this->admin_model->insertDetails('student_education_details', $insertDetails2);
				}

				if ($personalDetails->admission_based == "Diploma" && $personalDetails->lateral_entry == "GTTC") {
					$insertDetails1 = array(
						'student_id' => $student_id,
						'education_level' => $this->input->post('gt_education_level'),
						'inst_type' => $this->input->post('gt_inst_type'),
						'inst_board' => $this->input->post('gt_inst_board'),
						'inst_name' => $this->input->post('gt_inst_name'),
						'inst_address' => $this->input->post('gt_inst_address'),
						'inst_city' => $this->input->post('gt_inst_city'),
						'inst_state' => $this->input->post('gt_inst_state'),
						'inst_country' => $this->input->post('gt_inst_country'),
						'medium_of_instruction' => $this->input->post('gt_medium_of_instruction'),
						'register_number' => $this->input->post('gt_register_number'),
						'year_of_passing' => $this->input->post('gt_year_of_passing'),
						'aggregate' => $this->input->post('gt_aggregate'),
						'obtained' => $this->input->post('gt_total_obtained_marks'),
						'maximum' => $this->input->post('gt_total_max_marks'),
						'updated_on' => date('Y-m-d h:i:s'),
						'updated_by' => $data['student_name']
					);

					// Insert subject fields
					for ($i = 1; $i <= 4; $i++) {
						$subject_name = $this->input->post('gt_subject_' . $i . '_name');
						$min_marks = $this->input->post('gt_subject_' . $i . '_min_marks');
						$max_marks = $this->input->post('gt_subject_' . $i . '_max_marks');
						$obtained_marks = $this->input->post('gt_subject_' . $i . '_obtained_marks');

						// Only add subject if name is not empty
						if (!empty($min_marks)) {
							$insertDetails1['subject_' . $i . '_name'] = $subject_name;
							$insertDetails1['subject_' . $i . '_min_marks'] = $min_marks;
							$insertDetails1['subject_' . $i . '_max_marks'] = $max_marks;
							$insertDetails1['subject_' . $i . '_obtained_marks'] = $obtained_marks;
						}
					}


					$result = $this->admin_model->insertDetails('student_education_details', $insertDetails1);
				}

				if ($personalDetails->admission_based == "BE") {
					$insertDetails4 = array(
						'student_id' => $student_id,
						'education_level' => $this->input->post('deg_education_level'),
						'inst_type' => $this->input->post('deg_inst_type'),
						'inst_board' => $this->input->post('deg_inst_board'),
						'inst_name' => $this->input->post('deg_inst_name'),
						'inst_address' => $this->input->post('deg_inst_address'),
						'inst_city' => $this->input->post('deg_inst_city'),
						'inst_state' => $this->input->post('deg_inst_state'),
						'inst_country' => $this->input->post('deg_inst_country'),
						'medium_of_instruction' => $this->input->post('deg_medium_of_instruction'),
						'register_number' => $this->input->post('deg_register_number'),
						'year_of_passing' => $this->input->post('deg_year_of_passing'),
						'aggregate' => $this->input->post('deg_aggregate'),
						'obtained' => $this->input->post('deg_total_obtained_marks'),
						'maximum' => $this->input->post('deg_total_max_marks'),
						'updated_on' => date('Y-m-d h:i:s'),
						'updated_by' => $data['student_name']
					);

					// Insert subject fields
					for ($i = 1; $i <= 3; $i++) {
						$subject_name = $this->input->post('deg_subject_' . $i . '_name');
						$min_marks = $this->input->post('deg_subject_' . $i . '_min_marks');
						$max_marks = $this->input->post('deg_subject_' . $i . '_max_marks');
						$obtained_marks = $this->input->post('deg_subject_' . $i . '_obtained_marks');

						// Only add subject if name is not empty
						if (!empty($min_marks)) {
							$insertDetails4['subject_' . $i . '_name'] = $subject_name;
							$insertDetails4['subject_' . $i . '_min_marks'] = $min_marks;
							$insertDetails4['subject_' . $i . '_max_marks'] = $max_marks;
							$insertDetails4['subject_' . $i . '_obtained_marks'] = $obtained_marks;
						}
					}
					$result = $this->admin_model->insertDetails('student_education_details', $insertDetails4);
				}

				if ($personalDetails->admission_based == "MTech") {
					$insertDetails5 = array(
						'student_id' => $student_id,
						'education_level' => $this->input->post('mtech_education_level'),
						'inst_type' => $this->input->post('mtech_inst_type'),
						'inst_board' => $this->input->post('mtech_inst_board'),
						'inst_name' => $this->input->post('mtech_inst_name'),
						'inst_address' => $this->input->post('mtech_inst_address'),
						'inst_city' => $this->input->post('mtech_inst_city'),
						'inst_state' => $this->input->post('mtech_inst_state'),
						'inst_country' => $this->input->post('mtech_inst_country'),
						'medium_of_instruction' => $this->input->post('mtech_medium_of_instruction'),
						'register_number' => $this->input->post('mtech_register_number'),
						'year_of_passing' => $this->input->post('mtech_year_of_passing'),
						'aggregate' => $this->input->post('mtech_aggregate'),
						'obtained' => $this->input->post('mtech_total_obtained_marks'),
						'maximum' => $this->input->post('mtech_total_max_marks'),
						'updated_on' => date('Y-m-d h:i:s'),
						'updated_by' => $data['student_name']
					);

					// Insert subject fields
					for ($i = 1; $i <= 3; $i++) {
						$subject_name = $this->input->post('mtech_subject_' . $i . '_name');
						$min_marks = $this->input->post('mtech_subject_' . $i . '_min_marks');
						$max_marks = $this->input->post('mtech_subject_' . $i . '_max_marks');
						$obtained_marks = $this->input->post('mtech_subject_' . $i . '_obtained_marks');

						// Only add subject if name is not empty
						if (!empty($min_marks)) {
							$insertDetails5['subject_' . $i . '_name'] = $subject_name;
							$insertDetails5['subject_' . $i . '_min_marks'] = $min_marks;
							$insertDetails5['subject_' . $i . '_max_marks'] = $max_marks;
							$insertDetails5['subject_' . $i . '_obtained_marks'] = $obtained_marks;
						}
					}
					$result = $this->admin_model->insertDetails('student_education_details', $insertDetails5);
				}

				if ($personalDetails->admission_based == "M.Sc") {
					$insertDetails5 = array(
						'student_id' => $student_id,
						'education_level' => $this->input->post('msc_education_level'),
						'inst_type' => $this->input->post('msc_inst_type'),
						'inst_board' => $this->input->post('msc_inst_board'),
						'inst_name' => $this->input->post('msc_inst_name'),
						'inst_address' => $this->input->post('msc_inst_address'),
						'inst_city' => $this->input->post('msc_inst_city'),
						'inst_state' => $this->input->post('msc_inst_state'),
						'inst_country' => $this->input->post('msc_inst_country'),
						'medium_of_instruction' => $this->input->post('msc_medium_of_instruction'),
						'register_number' => $this->input->post('msc_register_number'),
						'year_of_passing' => $this->input->post('msc_year_of_passing'),
						'aggregate' => $this->input->post('msc_aggregate'),
						'obtained' => $this->input->post('msc_total_obtained_marks'),
						'maximum' => $this->input->post('msc_total_max_marks'),
						'updated_on' => date('Y-m-d h:i:s'),
						'updated_by' => $data['student_name']
					);

					// Insert subject fields
					for ($i = 1; $i <= 3; $i++) {
						$subject_name = $this->input->post('msc_subject_' . $i . '_name');
						$min_marks = $this->input->post('msc_subject_' . $i . '_min_marks');
						$max_marks = $this->input->post('msc_subject_' . $i . '_max_marks');
						$obtained_marks = $this->input->post('msc_subject_' . $i . '_obtained_marks');

						// Only add subject if name is not empty
						if (!empty($min_marks)) {
							$insertDetails5['subject_' . $i . '_name'] = $subject_name;
							$insertDetails5['subject_' . $i . '_min_marks'] = $min_marks;
							$insertDetails5['subject_' . $i . '_max_marks'] = $max_marks;
							$insertDetails5['subject_' . $i . '_obtained_marks'] = $obtained_marks;
						}
					}
					$result = $this->admin_model->insertDetails('student_education_details', $insertDetails5);
				}

				if ($personalDetails->admission_based == "M.ScEngg") {
					$insertDetails5 = array(
						'student_id' => $student_id,
						'education_level' => $this->input->post('mscegg_education_level'),
						'inst_type' => $this->input->post('mscegg_inst_type'),
						'inst_board' => $this->input->post('mscegg_inst_board'),
						'inst_name' => $this->input->post('mscegg_inst_name'),
						'inst_address' => $this->input->post('mscegg_inst_address'),
						'inst_city' => $this->input->post('mscegg_inst_city'),
						'inst_state' => $this->input->post('mscegg_inst_state'),
						'inst_country' => $this->input->post('mscegg_inst_country'),
						'medium_of_instruction' => $this->input->post('mscegg_medium_of_instruction'),
						'register_number' => $this->input->post('mscegg_register_number'),
						'year_of_passing' => $this->input->post('mscegg_year_of_passing'),
						'aggregate' => $this->input->post('mscegg_aggregate'),
						'obtained' => $this->input->post('mscegg_total_obtained_marks'),
						'maximum' => $this->input->post('mscegg_total_max_marks'),
						'updated_on' => date('Y-m-d h:i:s'),
						'updated_by' => $data['student_name']
					);

					// Insert subject fields
					for ($i = 1; $i <= 3; $i++) {
						$subject_name = $this->input->post('mscegg_subject_' . $i . '_name');
						$min_marks = $this->input->post('mscegg_subject_' . $i . '_min_marks');
						$max_marks = $this->input->post('mscegg_subject_' . $i . '_max_marks');
						$obtained_marks = $this->input->post('mscegg_subject_' . $i . '_obtained_marks');

						// Only add subject if name is not empty
						if (!empty($min_marks)) {
							$insertDetails5['subject_' . $i . '_name'] = $subject_name;
							$insertDetails5['subject_' . $i . '_min_marks'] = $min_marks;
							$insertDetails5['subject_' . $i . '_max_marks'] = $max_marks;
							$insertDetails5['subject_' . $i . '_obtained_marks'] = $obtained_marks;
						}
					}
					$result = $this->admin_model->insertDetails('student_education_details', $insertDetails5);
				}

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
	function completed()
	{
		if ($this->session->userdata('student_in')) {
			$student_session = $this->session->userdata('student_in');
			$data['student_name'] = $student_session['student_name'];
			$data['page_title'] = "Finish";
			$data['menu'] = "finish";
			$data['id'] = $student_session['id'];
			$updateDetails = array('flow' => '2', 'updated_on' => date('Y-m-d h:i:s'));
			$result = $this->admin_model->updateDetails($data['id'], $updateDetails, 'admissions');
			$this->student_template->show('student/completed', $data);
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
			$data['voucher_types'] = $this->globals->voucher_types();
			$data['fees'] = $this->admin_model->getDetailsbyfield($data['id'], 'student_id', 'fee_master')->row();
			$data['transactionDetails'] = $this->admin_model->getDetailsbyfield($student_id, 'admissions_id', 'transactions')->result();
			$data['paid_amount'] = $this->admin_model->paidfee('admissions_id', $student_id, 'transaction_status', '1', 'transactions');
			// $data['paymentDetail'] = $this->admin_model->getDetailsbyfield($student_id, 'admission_id', 'payment_structure')->result();
			$data['paymentDetail'] = $this->admin_model->getDetailsbyfield2('admission_id', $student_id, 'offline', '0', 'payment_structure')->result();
			// $this->student_template->show('student/fee_details', $data);

			$this->form_validation->set_rules('mode_of_payment', 'Mode of Payment', 'required');
			if ($this->form_validation->run() === FALSE) {

				// $data['action'] = 'student/fee_details';
				$this->student_template->show('student/fee_details', $data);
			} else {

				$mode_of_payment = $this->input->post('mode_of_payment');

				if ($mode_of_payment == "Cash") {
					$transactionDetails = array(
						'admissions_id' => $data['id'],
						'mobile' => $data['mobile'],
						'receipt_no' => '',
						'transaciton_date' => '',
						'transaction_type' => '1',
						'bank_name' => '',
						'reference_no' => '',
						'reference_date' => date('Y-m-d', strtotime($this->input->post('cash_date'))),
						'amount' => $this->input->post('cash_amount'),
						'remarks' => '',
						'transaction_status' => '0',
						'created_by' => $data['name'],
						'created_on' => date('Y-m-d h:i:s')
					);
				}
				if ($mode_of_payment == "ChequeDD") {
					$transactionDetails = array(
						'admissions_id' => $data['id'],
						'mobile' => $data['mobile'],
						'receipt_no' => '',
						'transaciton_date' => '',
						'transaction_type' => '2',
						'bank_name' => $this->input->post('cheque_dd_bank'),
						'reference_no' => $this->input->post('cheque_dd_number'),
						'reference_date' => date('Y-m-d', strtotime($this->input->post('cheque_dd_date'))),
						'amount' => $this->input->post('cheque_dd_amount'),
						'remarks' => '',
						'transaction_status' => '0',
						'created_by' => $data['name'],
						'created_on' => date('Y-m-d h:i:s')
					);
				}
				if ($mode_of_payment == "OnlinePayment") {
					$transactionDetails = array(
						'admissions_id' => $data['id'],
						'mobile' => $data['mobile'],
						'receipt_no' => '',
						'transaciton_date' => '',
						'transaction_type' => '3',
						'bank_name' => '',
						'reference_no' => $this->input->post('transaction_id'),
						'reference_date' => date('Y-m-d', strtotime($this->input->post('transaction_date'))),
						'amount' => $this->input->post('transaction_amount'),
						'remarks' => '',
						'transaction_status' => '0',
						'created_by' => $data['name'],
						'created_on' => date('Y-m-d h:i:s')
					);
				}


				$result = $this->admin_model->insertDetails('transactions', $transactionDetails);

				if (!$data['studentDetails']->flow) {
					$updateDetails['flow'] = '1';
					$result1 = $this->admin_model->updateDetails('admissions', $data['id'], $updateDetails);
				}
			}
		} else {
			redirect('student', 'refresh');
		}
	}

	public function get_states()
	{
		$country_id = $this->input->post('country_id');
		$states = $this->admin_model->getStates($country_id);
		echo json_encode($states);
	}

	public function get_cities()
	{
		$state_id = $this->input->post('state_id');
		$cities = $this->admin_model->getCities($state_id);
		echo json_encode($cities);
	}

	function downloadReceipt($admission_id, $transaction_id)
	{
		if ($this->session->userdata('student_in')) {
			$sess = $this->session->userdata('student_logs');
			$data['id'] = $session_data['id'];
			$data['name'] = $sess['name'];
			// $data['mobile'] = $sess['mobile'];

			$data['page_title'] = 'Download Receipt';
			$data['menu'] = 'studnet';

			// var_dump($transactionDetails);
			$currentAcademicYear = $this->globals->currentAcademicYear();
			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $admission_id)->row();
			$transactionDetails = $this->admin_model->getDetails('transactions', $transaction_id)->row();

			// var_dump($transactionDetails);
			$admissionDetails = $this->admin_model->getDetails('admissions', $admission_id)->row();
			$paid_amount = $this->admin_model->paidfee('admissions_id', $admission_id, 'transaction_status', '1', 'transactions');
			$studentfeeDetails = $this->admin_model->getDetailsbyfield($admission_id, 'student_id', 'fee_master')->row();


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
			$pdf->Cell(0, $row, $studentfeeDetails->year . ' Year - B.E ' . $this->admin_model->get_dept_by_id($data['admissionDetails']->dept_id)["department_name"], 1, 0, 'L', false);

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
			$pdf->Cell(0, $row, $admissionDetails->college_code, 1, 0, 'L', false);

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
			$transactionTypes = array("1" => "Cash", "2" => "DD", "3" => "Online Payment", "4" => "Online Transfer");
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
			// var_dump($transactionDetails);
			$pdf->output($fileName, 'D');
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
				$config['allowed_types']    = 'jpg|png|pdf|jpeg'; // Adjust file types as needed
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
			// $this->form_validation->set_rules('inst_type', 'Institution Type', 'required');
			$this->form_validation->set_rules('inst_board', 'Board / University', 'required');
			$this->form_validation->set_rules('inst_name', 'Institution Name', 'required');
			$this->form_validation->set_rules('inst_address', 'Institution Address', 'required');
			$this->form_validation->set_rules('inst_city', 'Institution City');
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
					'aggregate' => $eduDetails->aggregate,
					'total_obtained_marks' => $eduDetails->obtained,
					'total_max_marks' => $eduDetails->maximum
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
				$data['instruction_options'] = array(" " => "Select Medium of instruction") + $this->globals->medium_of_instruction();
				$data['countries'] = $this->admin_model->getCountries();
				$data['states'] = $this->admin_model->get_states();
				$data['cities'] = $this->admin_model->get_city();
				$data['personalDetails'] = $this->admin_model->getDetails('admissions', $data['id'])->row();
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
					'obtained' => $this->input->post('total_obtained_marks'),
					'maximum' => $this->input->post('total_max_marks'),
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
			"clientid" => "cnbmlndegc",
			"kid" => "HMAC"
		);
		$order_id = rand();
		$trace_id = rand(1000000000, 9999999999);
		$servertime = time();
		//    $config                         = $this->CI->config->item('billdesk');
		$api_url                        = "https://uat1.billdesk.com/u2/payments/ve1_2/orders/create";
		$payload                        = array();


		$payload['orderid']             = "MALbe" . $order_id;
		$payload['mercid']              = "CNBMLNDEGC";
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
		$curl_payload = JWT::encode($payload, "WHjXW5WHk27mr50KetSh75vyapmO14IT", "HS256", $headers);



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
		$result_decoded = JWT::decode($response, "WHjXW5WHk27mr50KetSh75vyapmO14IT", 'HS256');
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
				$response_decoded = JWT::decode($tx, "WHjXW5WHk27mr50KetSh75vyapmO14IT", 'HS256');
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
					$cnt_number = $this->getReceiptNo();
					$receipt_no = $cnt_number;
					$updateDetails['receipt_no'] = $receipt_no;
					$updateDetails['transaction_status'] = '1';
					$updateDetails1['status'] = '1';
				} else if ($response_array['transaction_error_type'] == 'payment_processing_error') {
					$updateDetails['transaction_status'] = '2';
					$updateDetails1['status'] = '2';
				} else {
					$updateDetails['transaction_status'] = '0';
					$updateDetails1['status'] = '0';
				}

				$this->set_session($response_array['additional_info']->additional_info3, $response_array['additional_info']->additional_info4);

				$result = $this->admin_model->updateDetailsbyfield('reference_no', $response_array['orderid'], $updateDetails, 'transactions');
				$result1 = $this->admin_model->updateDetailsbyfield('id', $response_array['additional_info']->additional_info7, $updateDetails1, 'payment_structure');
				$payment = ['orderid' => $response_array['orderid']];
				$this->session->set_userdata('payment', $payment);

				redirect('student/payment_status', 'refresh');
			} else {
				$status = 'fail';
				$return['status']		= $status;
				redirect('student', 'refresh');
			}
		} else {
			redirect('student', 'refresh');
		}
	}

	public function callbackcorpus()
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
				$response_decoded = JWT::decode($tx, "k2ieff4ugn8Ehv31tUhXTRoHK2MEBrdJ", 'HS256');
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
					$cnt_number = $this->getReceiptNo();
					$receipt_no = $cnt_number;
					$updateDetails['receipt_no'] = $receipt_no;
					$updateDetails['transaction_status'] = '1';
					$updateDetails1['status'] = '1';
				} else if ($response_array['transaction_error_type'] == 'payment_processing_error') {
					$updateDetails['transaction_status'] = '2';
					$updateDetails1['status'] = '2';
				} else {
					$updateDetails['transaction_status'] = '0';
					$updateDetails1['status'] = '0';
				}

				$this->set_session($response_array['additional_info']->additional_info3, $response_array['additional_info']->additional_info4);

				$result = $this->admin_model->updateDetailsbyfield('reference_no', $response_array['orderid'], $updateDetails, 'transactions');
				$result1 = $this->admin_model->updateDetailsbyfield('id', $response_array['additional_info']->additional_info7, $updateDetails1, 'payment_structure');

				$payment = ['orderid' => $response_array['orderid']];
				$this->session->set_userdata('payment', $payment);

				redirect('student/payment_status', 'refresh');
			} else {
				$status = 'fail';
				$return['status']		= $status;
				redirect('student', 'refresh');
			}
		} else {
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
			$data['orderdetails'] = $this->admin_model->getDetailsbyfield($orderid, 'reference_no', 'transactions')->row();

			$this->student_template->show('student/payment_status', $data);
		} else {
			redirect('student', 'refresh');
		}
	}


	public function getTransactionDetails($order_id)
	{
		require_once APPPATH . 'libraries/Jwt.php';
		$this->load->library('logger');


		$billdesk_URL_retrive = "https://api.billdesk.com/payments/ve1_2/transactions/get";
		$trace_id = rand(1000000000, 9999999999);
		$servertime = time();
		$headers = array("alg" => "HS256", "clientid" => "cnbmlndegc", "kid" => "HMAC");
		$payload = array(
			"mercid" => 'CNBMLNDEGC',
			"orderid" => $order_id,
		);
		$curl_payload = JWT::encode($payload, 'WHjXW5WHk27mr50KetSh75vyapmO14IT', 'HS256', $headers);
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
		$result_decoded = JWT::decode($response, 'WHjXW5WHk27mr50KetSh75vyapmO14IT', 'HS256');
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


		return $res;
	}

	public function pay_now()
	{

		if ($this->session->userdata('student_in')) {
			$student_session = $this->session->userdata('student_in');
			$data['student_name'] = $student_session['student_name'];
			$data['id'] = $student_session['id'];
			require_once APPPATH . 'libraries/Jwt.php';
			$acc_type = $this->input->post('type');
			if ($acc_type == 0) {
				$mid = "CNBMLNDEGC";
				$clientid = "cnbmlndegc";
				$midkey = "WHjXW5WHk27mr50KetSh75vyapmO14IT";
				$returnurl = base_url() . 'student/callback';
				$page = 'student/payment';
			} else {
				$mid = "CNBMLNDTRT";
				$clientid = "cnbmlndtrt";
				$midkey = "k2ieff4ugn8Ehv31tUhXTRoHK2MEBrdJ";
				$returnurl = base_url() . 'student/callbackcorpus';
				$page = 'student/payment_corpus';
			}

			$this->load->library('logger');
			$insert = array(
				'amount' => number_format((float)$this->input->post('amount'), 2, '.', ''),
				// 'amount' => '10.00',
				'reg_no' => $this->input->post('usn'),
				'aided_unaided' => $this->input->post('aided_unaided'),
				'mobile' => $this->input->post('mobile'),
				'reference_no' => $this->input->post('usn') . time(),
				'transaction_type' => '3',
				'academic_year' => "2024-2025",
				'admissions_id' => $data['id'],
				'reference_date' => date('Y-m-d'),
				'payment_id' => $this->input->post('pay_id'),
				'transaction_status' => '0',
				'created_on' => date('Y-m-d h:i:s')
			);

			$result = $this->admin_model->insertDetails('transactions', $insert);

			$headers = array(
				"alg" => "HS256",
				"clientid" => $clientid,
				"kid" => "HMAC"
			);
			$order_id = rand();
			$trace_id = rand(1000000000, 9999999999);
			$servertime = time();
			//    $config                         = $this->CI->config->item('billdesk');
			$api_url                        = "https://api.billdesk.com/payments/ve1_2/orders/create";
			$payload                        = array();


			$payload['orderid']             = $insert['reference_no'];
			$payload['mercid']              = $mid;
			$payload['order_date']          = date("c");
			$payload['amount']              = $insert['amount'];
			$payload['currency']            = '356';

			$payload['ru'] 	           =  $returnurl; // Return URL

			$payload['additional_info']    =  array(
				"additional_info1" => $insert['reg_no'],
				"additional_info2" => $this->input->post('name'),
				"additional_info3" => $this->input->post('email'),
				"additional_info4" => $insert['mobile'],
				"additional_info5" => "Fee Payment",
				"additional_info6" => $this->input->post('type'),
				"additional_info7" => $this->input->post('pay_id')
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
			$curl_payload = JWT::encode($payload, $midkey, "HS256", $headers);



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
			$result_decoded = JWT::decode($response, $midkey, 'HS256');
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
				$this->load->view($page, $requestParams);
			} else {
				$status = isset($result_decoded->status) ? $result_decoded->status : "Status not available";
				$message = "Billdesk create order status - " . $status;
				$this->logger->write('billdesk', 'debug', $message);
				$this->session->set_flashdata('process', 'Sorry, something went wrong. Please try again later.');
				redirect('student/fee_details', 'refresh');
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
	public function getReceiptNo()
	{
		$cnt = $this->admin_model->getReceiptsCountNew()->row()->cnt;
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
}
