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
			$data['page_title'] = "Dashboard";
			$data['menu'] = "dashboard";
			$data['enquiryStatus'] = $this->globals->enquiryStatus();
			$data['enquiryStatusColor'] = $this->globals->enquiryStatusColor();
			$data['currentAcademicYear'] = $this->globals->currentAcademicYear();
			$data['course_options'] = $this->admin_model->getDetails('departments', '')->result();
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
			$this->form_validation->set_rules('adhaar', 'Adhaar Number', 'required|regex_match[/^[0-9]{12}$/]|is_unique[enquiries.adhaar]');

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

	function Enquirieslist()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
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

	function feestructure()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['page_title'] = "Fee Structure";
			$data['menu'] = "feestructure";
			
			$fee_structure = $this->admin_model->getDetails('fee_structure', '')->result();
			$feeDetails = array();
			
			foreach($fee_structure as $fee1){
			$quota = $fee1->quota;    
		
			if($fee1->department_id){
				$dept_name = $this->admin_model->getDetailsbyfield($fee1->department_id,'department_id','departments')->row();
				$dept_name = $dept_name->department_name;
				$quota1 = $fee1->quota.' - '.$dept_name;    
			}else{
				$quota1 = $fee1->quota;    
			}
			if (array_key_exists($quota1,$feeDetails)){
				if(array_key_exists($fee1->sub_quota,$feeDetails[$quota1])){
					$category =  array("total_demand" => $fee1->total_demand, 'id' => $fee1->id);
					array_push($feeDetails[$quota1][$fee1->sub_quota], $category);
				}else{
					$category =  array("total_demand" => $fee1->total_demand, 'id' => $fee1->id);
					$feeDetails[$quota1][$fee1->sub_quota] = $category;
				}
				} else{
					$category = array("total_demand" => $fee1->total_demand, 'id' => $fee1->id);
					$sub_quota =  array($fee1->sub_quota => $category);
					$feeDetails[$quota1] = $sub_quota;
				}	 
		}
		    $data['feeDetails']=$feeDetails;
			// print_r($feeDetails);
			$this->admin_template->show('admin/fees_structure',$data);
		} else {
			redirect('admin', 'refresh');
		}
	}

	function editFeeStructure($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['page_title'] = "Edit Fee Structure";
			$data['menu'] = "feestructure";

			$data['fee_structure'] = $this->admin_model->get_details_by_id($id,'id','fee_structure');

			$this->form_validation->set_rules('e_learning_fee', 'E Learning Fee', 'numeric|required');
			$this->form_validation->set_rules('eligibility_fee', 'Eligibility Fee', 'numeric|required');
			$this->form_validation->set_rules('e_consortium_fee', 'e Consortium Fee', 'numeric|required');
			$this->form_validation->set_rules('sport_fee', 'Sport Fee', 'numeric|required');
			$this->form_validation->set_rules('sports_development_fee', 'Sports Development Fee', 'numeric|required');
			$this->form_validation->set_rules('career_guidance_counseling_fee','Career Guidance & Counseling fee', 'numeric|required');
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
			$this->form_validation->set_rules('total_demand', 'TOTAL DEMAND', 'numeric|required');
			$this->form_validation->set_rules('skill_development_fee', 'Skill Development Fee', 'numeric|required');
			$this->form_validation->set_rules('corpus_fund', 'Corpus Fund', 'numeric|required');

			if ($this->form_validation->run() === FALSE) {
				$data['action'] = 'admin/editFeeStructure/' . $id;

				$feeDetails = $this->admin_model->getDetails('fee_structure', $id)->row();


				// $this->admin_template->show('admin/editFeeStructure',$data);

				$data['e_learning_fee'] = $feeDetails->e_learning_fee;
				$data['eligibility_fee'] = $feeDetails->eligibility_fee;

				$data['e_consortium_fee'] = $feeDetails->e_consortium_fee;
				$data['sport_fee'] =  $feeDetails->sport_fee;
				$data['sports_development_fee'] =  $feeDetails->sports_development_fee;
				$data['career_guidance_counseling_fee'] =  $feeDetails->career_guidance_counseling_fee;
				$data['university_development_fund'] =  $feeDetails->university_development_fund;
				$data['promotion_of_indian_cultural_activities_fee'] =  $feeDetails->promotion_of_indian_cultural_activities_fee;
				$data['teachers_development_fee'] =  $feeDetails->teachers_development_fee;
				$data['student_development_fee'] = $feeDetails->student_development_fee;
				$data['indian_red_cross_membership_fee'] = $feeDetails->indian_red_cross_membership_fee;
				$data['women_cell_fee'] = $feeDetails->women_cell_fee;
				$data['nss_fee'] = $feeDetails->nss_fee;
				$data['university_registration_fee'] = $feeDetails->university_registration_fee;
				$data['total_university_fee'] = $feeDetails->total_university_fee;
				$data['admission_fee'] = $feeDetails->admission_fee;
				$data['processing_fee_paid_at_kea'] = $feeDetails->processing_fee_paid_at_kea;
				$data['tution_fee'] = $feeDetails->tution_fee;
				$data['college_other_fee'] = $feeDetails->college_other_fee;
				$data['total_tution_fee'] = $feeDetails->total_tution_fee;
				$data['total_demand'] = $feeDetails->total_demand;
				$data['skill_development_fee'] = $feeDetails->skill_development_fee;
				$data['corpus_fund'] = $feeDetails->corpus_fund;
				$this->admin_template->show('admin/editFeeStructure',$data);
			}else{

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
					'total_demand' => $this->input->post('total_demand'),
					'skill_development_fee' => $this->input->post('skill_development_fee'),
					'corpus_fund' => $this->input->post('corpus_fund')
				);

				$result = $this->admin_model->updateDetails($id, $updateDetails,'fee_structure');
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

	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('admin', 'refresh');
	}
}