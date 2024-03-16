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

			$data['course_options'] = array(" " => "Select") + $this->courses();

			// $this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
			$this->form_validation->set_rules('student_name', 'Applicant Name', 'required');

			$this->form_validation->set_rules('mobile', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]|is_unique[enquiries.mobile]');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
			$this->form_validation->set_rules('course', 'Branch Preference-I', 'required');
			$this->form_validation->set_rules('par_name', 'Applicant Name', 'required');

			$this->form_validation->set_rules('par_mobile', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('par_email', 'Email', 'trim|valid_email');
			$this->form_validation->set_rules('course1', 'Branch Preference-II', 'required');
			$this->form_validation->set_rules('course2', 'Branch Preference-III', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');
			$this->form_validation->set_rules('city', 'City', 'required');
			$this->form_validation->set_rules('puc1_grade', '10+2 Percentage / Grade', 'required');
			$this->form_validation->set_rules('puc2_grade', 'Exam Board', 'required');
			$this->form_validation->set_rules('sslc_grade', 'Register Number', 'required');

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
				$data['sslc_grade'] = $this->input->post('sslc_grade');
				$data['puc1_grade'] = $this->input->post('puc1_grade');
				$data['sslc_grade'] = $this->input->post('sslc_grade');
				$data['gender'] = $this->input->post('gender');

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
					'gender' => $this->input->post('gender'),
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
			$sess = $this->session->userdata('logged_in');
			$data['id'] = $sess['id'];
			$data['username'] = $sess['username'];
			$data['role'] = $sess['role'];

			$data['page_title'] = 'Enquiries';
			$data['menu'] = 'enquiries';

			$data['course_options'] = array(" " => "Select") + $this->courses();
			$data['quota_options'] = array(" " => "Select") + $this->globals->quota();
			$data['subquota_options'] = array(" " => "Select") + $this->globals->sub_quota();
			$data['type_options'] = array(" " => "Select") + $this->globals->category();

			$data['enquiryStatus'] = $this->globals->enquiryStatus();
			$data['enquiryStatusColor'] = $this->globals->enquiryStatusColor();

			$data['feeCourses'] = array("" => "Select") + $this->getFeeCourses();
			$data['languages'] = array("" => "Select") + $this->globals->languages();

			$data['enquiryDetails'] = $this->admin_model->getDetails('enquiries', $id)->row();
			// var_dump($this->db->last_query());
			$data['comments'] = $this->admin_model->getDetails('enq_comments', 'enq_id', $id)->result();

			$this->admin_template->show('admin/enquiry_details', $data);
		} else {
			redirect('admin/timeout');
		}
	}


	function editEnquiry($id)
	{
		if ($this->session->userdata('logged_in')) {
			$sess = $this->session->userdata('logged_in');
			$data['id'] = $sess['id'];
			$data['username'] = $sess['username'];
			$data['role'] = $sess['role'];

			$data['page_title'] = 'Edit Enquiry';
			$data['menu'] = 'enquiries';
			$data['userTypes'] = $this->globals->userTypes();

			$data['academicYear'] = $this->globals->academicYear();
			$data['course_options'] = array(" " => "Select") + $this->courses();


			$this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
			$this->form_validation->set_rules('student_name', 'Applicant Name', 'required');

			$this->form_validation->set_rules('mobile', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
			$this->form_validation->set_rules('course', 'Course', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');
			$this->form_validation->set_rules('city', 'City', 'required');
			$this->form_validation->set_rules('register_grade', '10+2 Percentage / Grade', 'required');
			$this->form_validation->set_rules('exam_board', 'Exam Board', 'required');
			$this->form_validation->set_rules('register_number', 'Register Number', 'required');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'admin/editEnquiry/' . $id;

				$enquiryDetails = $this->admin_model->getDetails('enquiries', $id)->row();


				$data['academic_year'] = $enquiryDetails->academic_year;
				$data['student_name'] = $enquiryDetails->student_name;

				$data['mobile'] = $enquiryDetails->mobile;
				$data['email'] =  $enquiryDetails->email;
				$data['course'] =  $enquiryDetails->course_id;
				$data['state'] =  $enquiryDetails->state;
				$data['city'] =  $enquiryDetails->city;
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
					'course_id' => $this->input->post('course'),
					'course' => $course,
					'state' => $this->input->post('state'),
					'city' => $this->input->post('city'),

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
			$sess = $this->session->userdata('logged_in');
			$data['id'] = $sess['id'];
			$data['username'] = $sess['username'];
			$data['role'] = $sess['role'];

			$details = $this->admin_model->getDetails('departments', '')->result();

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
			$sess = $this->session->userdata('logged_in');
			$data['id'] = $sess['id'];
			$data['username'] = $sess['username'];
			$data['role'] = $sess['role'];

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
			$sess = $this->session->userdata('logged_in');
			$data['id'] = $sess['id'];
			$data['username'] = $sess['username'];
			$data['role'] = $sess['role'];

			
			$data['page_title'] = 'Enquiries';
			$data['menu'] = 'enquiries';
			
	        $comments = $this->input->post('comments');
	        $status = $this->input->post('status');
	        $old_status = $this->input->post('old_status');
	        
	        if($status != $old_status){
	            $updateDetails = array('status' => $status);
    	        $result = $this->admin_model->updateDetails('enquiries', $enq_id, $updateDetails);
	        }
	        
	        $insertDetails = array('enq_id' => $enq_id,
 	            				    'comments' => $this->input->post('comments'),
 	            					'given_by' => $data['username'],
 	            					'given_on' => date('Y-m-d h:i:s')
 	        					);

	        $result = $this->admin_model->insertDetails('enq_comments', $insertDetails);
	        if($result){
	            $this->session->set_flashdata('message', 'Comments updated successfully...!');
	            $this->session->set_flashdata('status', 'alert-success');
	        }else{
	            $this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
	            $this->session->set_flashdata('status', 'alert-warning');
	        }

	        redirect('admin/enquiryDetails/'.$enq_id, 'refresh');

	    }else{
	      redirect('admin', 'refresh');
	    }
	}

	function getFee(){
		if ($this->session->userdata('logged_in')) {
			$sess = $this->session->userdata('logged_in');
			$data['id'] = $sess['id'];
			$data['username'] = $sess['username'];
			$data['role'] = $sess['role'];

			
			$course = $this->input->post('course');
			
            
            $details = [
				"aided_unaided" => "Aided",
				"category" => "2",
				"college_fee_total" => "6000",
				"combination" => "",
				"course" => "BTECH",
				"id" => "4",
				"mgt_fee_total" => "9000",
				"total_fee" => "40800"
			];
			
			print_r(json_encode($details));

		}else {
				redirect('admin/timeout');
		}
    }



	function admitStudent()
	{
		if ($this->session->userdata('logged_in')) {
			$sess = $this->session->userdata('logged_in');
			$data['id'] = $sess['id'];
			$data['username'] = $sess['username'];
			$data['role'] = $sess['role'];
			
			$data['page_title'] = 'Admit Studnet';
			$data['menu'] = 'admissions';
			
			$id = $this->input->post('id');
			$aided_unaided = $this->input->post('aided_unaided');
			
			$course = $this->input->post('course');
		
			
			$course_val = $this->input->post('course_val');
			
			$category = $this->input->post('category');
			
			$college_fee_total = $this->input->post('college_fee_total');
			$mgt_fee_total = $this->input->post('mgt_fee_total');
			
			$proposed_amount = $this->input->post('proposed_amount');   
			$additional_amount = $this->input->post('additional_amount');   
			$concession_type = $this->input->post('concession_type');   
			$concession_fee = $this->input->post('concession_fee');   
			$final_amount = $this->input->post('final_amount');   
		
			
			$currentAcademicYear = $this->globals->currentAcademicYear();
            
            $updateDetails = array('status' => '6');
    	    $res = $this->admin_model->updateDetails($id, $updateDetails,'enquiries' );
    	   
    	    $app_number = $this->admin_model->getAppNo($currentAcademicYear)->row()->cnt;
    	    $app_number = $app_number+1;
            $strlen = strlen(($app_number));
            if($strlen == 1){  $app_number = "000".$app_number; }
            if($strlen == 2){  $app_number = "00".$app_number; }
            if($strlen == 3){  $app_number = "0".$app_number; }
    	    $app_no = date('y').$app_number;
    	    
            $enquiryDetails = $this->admin_model->getDetails('enquiries', $id)->row();

            $OTP = strtoupper(substr(md5(time()), 0, 6));
            
            $insertDetails = array('flow' => '0',
                                    'academic_year' => $enquiryDetails->academic_year,
                                    'enq_id' => $id,
                                    'app_no' => $app_no,
                                    'course_id' => $course,
                                    'course' => $course_val,
                               
                                    'student_name' => strtoupper($enquiryDetails->student_name),
                                    'mobile' => $enquiryDetails->mobile,
                                    'email' => strtolower($enquiryDetails->email),
                                    'father_name' => strtoupper($enquiryDetails->father_name),
                                    'exam_board' => $enquiryDetails->sslc_grade,
                                    'register_number' => "12345",
 	            					'password' => md5($OTP),
 	            					'aided_unaided' => $aided_unaided,
 	            					'category' => "12345",
 	            					'college_fee_total' => $college_fee_total,
 	            					'mgt_fee_total' => $mgt_fee_total,
 	            					'proposed_amount' => $proposed_amount,
 	            					'additional_amount' => $additional_amount,
 	            					'concession_type' => $concession_type,
 	            					'concession_fee' => $concession_fee,
 	            					'final_amount' => $final_amount,
 	            					'status' => '1',
 	            					'admit_date' => date('Y-m-d h:i:s'),
 	            					'admit_by' => $data['username']
 	        					);
 	        					
            $result = $this->admin_model->insertDetails('admissions', $insertDetails);
            
            
            print_r($this->db->last_query());

	    }else{
	      redirect('admin', 'refresh');
	    }
	}

	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('admin', 'refresh');
	}
}
