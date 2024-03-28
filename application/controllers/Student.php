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

	function admissiondetails()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['pageTitle'] = "Admissiondetails";
			$data['activeMenu'] = "admissiondetails";
			$data['userTypes'] = $this->globals->userTypes();
			$data['admissionDetails'] = $this->admin_model->getDetails('admissions', $id)->row();

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
			$this->form_validation->set_rules('category_alloted', 'Category Allocated', 'required');
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
		
				$data['action'] = 'student/admissiondetails'. $id;

				$admissionDetails = $this->admin_model->getDetails('admissions', $id)->row();

				$data['student_name'] =  $admissionDetails->student_name;
				$data['mobile'] = $admissionDetails->mobile;
				$data['email'] = $admissionDetails->email;
				$data['aadhar'] = $admissionDetails->aadhar;
				$data['dept_id'] = $admissionDetails->dept_id;
				$data['quota'] = $admissionDetails->quota;
				$data['sub_quota'] = $admissionDetails->sub_quota;
				$data['category_alloted'] = $admissionDetails->category_alloted;
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
					'category_alloted' => $this->input->post('category_alloted'),
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
				$result = $this->admin_model->updateDetails( $id, $updateDetails,'admissions');

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
			$data['username'] = $session_data['username'];
			$data['id'] = $session_data['id'];
			$data['pageTitle'] = "Entrancedetails";
			$data['activeMenu'] = "entrancedetails";
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
					$this->session->set_flashdata('message', 'Admission Details updated successfully...!');
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
			$data['username'] = $session_data['username'];
			$data['pageTitle'] = "Personaldetails";
			$data['activeMenu'] = "personaldetails";
			$this->student_template->show('student/personal_details');
		} else {
			redirect('admin', 'refresh');
		}
	}

	function educationdetails()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['pageTitle'] = "Educationdetails";
			$data['activeMenu'] = "educationdetails";
			$this->student_template->show('student/education_details');
		} else {
			redirect('admin', 'refresh');
		}
	}

	function finish()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['pageTitle'] = "Finish";
			$data['activeMenu'] = "finish";
			$this->student_template->show('student/finish');
		} else {
			redirect('admin', 'refresh');
		}
	}

	function admissionfee()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['page_title'] = "Admissionfee";
			$data['activeMenu'] = "admissionfee";
			$this->student_template->show('student/admission_fee');
		} else {
			redirect('admin', 'refresh');
		}
	}

	function documents()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['pageTitle'] = "Document";
			$data['activeMenu'] = "document";

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