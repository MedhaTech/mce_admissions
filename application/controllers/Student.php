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
			$data['page_title'] = "Student Login";
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
					'flow' => $row->flow
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
			$data['page_title'] = "Dashboard";
			$data['menu'] = "dashboard";

			$flow = $this->admin_model->getDetailsFilter('flow', $data['id'],'admissions')->row()->flow;
			
			if($flow){
				$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $data['id'])->row();
				$data['entranceDetails'] = $this->admin_model->getDetails('admissions', $data['id'])->row();
				$data['personalDetails'] = $this->admin_model->getDetails('admissions', $data['id'])->row();
				$data['parentDetails'] = $this->admin_model->getDetails('admissions', $data['id'])->row();
				$this->student_template->show('student/finish',$data);
			}else{
				$this->student_template->show('student/Dashboard', $data);
			}
			
		} else {
			redirect('student', 'refresh');
		}
	}

	function startProcess(){
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['student_name'] = $session_data['student_name'];
			$data['page_title'] = "Dashboard";
			$data['menu'] = "dashboard";
			
			$updateDetails = array('flow' => '1');
			$result = $this->admin_model->updateDetails( $data['id'], $updateDetails,'admissions');

			redirect('student/dashboard', 'refresh');
		} else {
			redirect('student', 'refresh');
		}
	}
	
	function admissiondetails()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
      		$data['id'] = $session_data['id'];
			$data['student_name'] = $session_data['student_name'];
			$data['page_title'] = "Admissiondetails";
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
			$this->form_validation->set_rules('aadhar', 'Aadhar Number', 'required|regex_match[/^[0-9]{12}$/]');
			$this->form_validation->set_rules('dept_id', 'Department Id', 'required');
			$this->form_validation->set_rules('quota', 'Quota', 'required');
			$this->form_validation->set_rules('sub_quota', 'sub_quota', 'required');
			$this->form_validation->set_rules('category_allotted', 'Category Allocated', 'required');
			$this->form_validation->set_rules('category_claimed', 'Category Claimed', 'required');
			$this->form_validation->set_rules('college_code', 'College Code', 'required');
			$this->form_validation->set_rules('sports', 'Sports', 'required');
			// $this->form_validation->set_rules('entrance_type', 'Entrance Type', 'required');
			// $this->form_validation->set_rules('entrance_reg_no', 'Entrance Registration Number', 'required');
			// $this->form_validation->set_rules('entrance_rank', 'Entrance Exam Rank', 'required');
			// $this->form_validation->set_rules('admission_order_no', 'Admission Order Number', 'required');
			// $this->form_validation->set_rules('admission_order_date', 'Admission Order Date', 'required');
			// $this->form_validation->set_rules('fees_paid', 'Fees Paid', 'required');
			// $this->form_validation->set_rules('fees_receipt_no', 'Fees Receipt Number', 'required');
			// $this->form_validation->set_rules('fees_receipt_date', 'Fees Receipt Date', 'required');

			if ($this->form_validation->run() === FALSE) {
		
				$data['action'] = 'student/admissiondetails'. $data['id'];

				$admissionDetails = $this->admin_model->getDetails('admissions', $data['id'])->row();

				$data['student_name'] =  $admissionDetails->student_name;
				$data['mobile'] = $admissionDetails->mobile;
				$data['email'] = $admissionDetails->email;
				$data['aadhar'] = $admissionDetails->aadhar;
				$data['dept_id'] = $admissionDetails->dept_id;
				$data['quota'] = $admissionDetails->quota;
				$data['sub_quota'] = $admissionDetails->sub_quota;
				$data['category_allotted'] = $admissionDetails->category_allotted;
				$data['category_claimed'] = $admissionDetails->category_claimed;
				$data['college_code'] = $admissionDetails->college_code;
				$data['sports'] = $admissionDetails->sports;
				// $data['entrance_type'] = $admissionDetails->entrance_type;
				// $data['entrance_reg_no'] = $admissionDetails->entrance_reg_no;
				// $data['entrance_rank'] = $admissionDetails->entrance_rank;
				// $data['admission_order_no'] = $admissionDetails->admission_order_no;
				// $data['admission_order_date'] = $admissionDetails->admission_order_date;
				// $data['fees_paid'] = $admissionDetails->fees_paid;
				// $data['fees_receipt_no'] = $admissionDetails->fees_receipt_no;
				// $data['fees_receipt_date'] = $admissionDetails->fees_receipt_date;
				$this->student_template->show('student/admission_details', $data);
			} else {
				$updateDetails = array(
					'student_name' => strtoupper($this->input->post('student_name')),
					'mobile' => $this->input->post('mobile'),
					'email' => strtolower($this->input->post('email')),
					'adhaar' => $this->input->post('adhaar'),
					'dept_id' => $this->input->post('dept_id'),
					'quota' => $this->input->post('quota'),
					'sub_quota' => $this->input->post('sub_quota'),
					'category_allotted' => $this->input->post('category_allotted'),
					'category_claimed' => $this->input->post('category_claimed'),
					'college_code' => $this->input->post('college_code'),
					'sports' => $this->input->post('sports'),
					// 'entrance_type' => $this->input->post('entrance_type'),
					// 'entrance_reg_no' => $this->input->post('entrance_reg_no'),
					// 'entrance_rank' => $this->input->post('entrance_rank'),
					// 'admission_order_no' => $this->input->post('admission_order_no'),
					// 'admission_order_date' => $this->input->post('admission_order_date'),
					// 'fees_paid' => $this->input->post('fees_paid'),
					// 'fees_receipt_no' => $this->input->post('fees_receipt_no'),
					// 'fees_receipt_date' => $this->input->post('fees_receipt_date'),
				);
				print_r($updateDetails);
				die();
				$result = $this->admin_model->updateDetails( $data['id'], $updateDetails,'admissions');

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
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['student_name'] = $session_data['student_name'];
			$data['id'] = $session_data['id'];
			$data['page_title'] = "Entrancedetails";
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
		
				$data['action'] = 'student/entranceexamdetails/'. $data['id'];

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
				$result = $this->admin_model->updateDetails($data['id'], $updateDetails,'admissions');

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
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
      $data['student_name'] = $session_data['student_name'];
			$data['page_title'] = "Personaldetails";
			$data['menu'] = "personaldetails";
      
			$data['username'] = $session_data['username'];
			$data['id'] = $session_data['id'];
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
		
				$data['action'] = 'student/personaldetails/'. $data['id'];

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
				$result = $this->admin_model->updateDetails($data['id'], $updateDetails,'admissions');

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
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['id'] = $session_data['id'];
			$data['pageTitle'] = "Personaldetails";
			$data['menu'] = "personaldetails";
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
		
				$data['action'] = 'student/parentdetails/'. $data['id'];

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
				$result = $this->admin_model->updateDetails($data['id'], $updateDetails,'admissions');

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
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['student_name'] = $session_data['student_name'];
			$data['page_title'] = 'Education Details';
			$data['menu'] = 'educationdetails';

			$this->student_template->show('student/education_details',$data);
		} else {
			redirect('student', 'refresh');
		}
	}

	function finish()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['student_name'] = $session_data['student_name'];
			$data['page_title'] = "Finish";
			$data['menu'] = "finish";
      		$data['id'] = $session_data['id'];
			
		} else {
			redirect('student', 'refresh');
		}
	}

	function admissionfee()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['student_name'] = $session_data['student_name'];
			$data['page_title'] = "Admissionfee";
			$data['menu'] = "admissionfee";
			$this->student_template->show('student/admission_fee', $data);
		} else {
			redirect('student', 'refresh');
		}
	}

	function documents()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['student_name'] = $session_data['student_name'];
			$data['page_title'] = "Document";
			$data['menu'] = "document";

			$data['admissions'] = $this->admin_model->getDetails('admissions','id', $data['id'])->row();
			$this->form_validation->set_rules('documents', 'Document Type', 'required');
	        
	        if($this->form_validation->run() === FALSE){
	            
	            $data['action'] = 'student/documents';
	            $this->student_template->show('student/documents',$data);
	        }else{
	            
	            $documents = $this->input->post('documents');    
	            
	           	$config['upload_path'] = './assets/documents/'.$data['id'];
			
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['overwrite'] = true;
				$config['max_size']  = '0';
						
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$this->upload->set_allowed_types('jpeg|jpg|png');
				$data['upload_data'] = '';
						
				if (!$this->upload->do_upload('photo')) {
					$msg = $this->upload->display_errors();
					$this->session->set_flashdata('message', $msg);
        		    $this->session->set_flashdata('status', 'alert-warning');
				}else {
					 
					$data['msg'] = "Upload success!";
					$upload_data = $this->upload->data();
					$data['upload_data'] = $upload_data;
					
					$image_config['image_library'] = 'gd2';
					$image_config['source_image'] = $upload_data["full_path"];
					$image_config['new_image'] = $upload_data["file_path"].$documents.'.jpg';
				// 	$image_config['new_image'] = $upload_data["file_path"]."$documents.jpg";
					$image_config['quality'] = "100%";
					$image_config['maintain_ratio'] = FALSE;
					$image_config['max_size'] = 10000;
					$image_config['width'] = 5000;
					$image_config['height'] = 5000;
					$image_config['x_axis'] = '0';
					$image_config['y_axis'] = '0';
					
					$this->load->library('image_lib');
					
					$this->image_lib->clear();
					$this->image_lib->initialize($image_config); 
					$this->image_lib->resize();
					unlink($upload_data["full_path"]); 
					
					$this->session->set_flashdata('message', 'Documents updated successfully..!!');
                    $this->session->set_flashdata('status', 'alert-success');    
				} 
                
	           redirect('student/documents', 'refresh');  
	       }

	    }else{
	      redirect('student', 'refresh');
	    }
	
	}

	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('student', 'refresh');
	}
}