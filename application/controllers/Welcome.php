<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 
	public function index()
	{

		    $data['pageTitle'] = "B.E Admissions Open 2024-25 | Malnad College of Engineering";
			$data['activeMenu'] = "home";
			$data['course_options'] = array(" " => "Select Branch") + $this->courses();
			$data['states'] = array(" " => "Select State") + $this->globals->states();
			$data['type_options'] = array(" " => "Select") + $this->globals->category();
			
	//Including validation library
				$this->load->library('form_validation');
	
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	
				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|regex_match[/^[0-9]{10}$/]|is_unique[enquiries.mobile]',array(
					'is_unique'     => 'This %s is exists in student name.'
			    ));
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
				$this->form_validation->set_rules('par_name', 'Parent Name', 'required');
				$this->form_validation->set_rules('par_mobile', 'Parent Mobile', 'required|regex_match[/^[0-9]{10}$/]|is_unique[enquiries.mobile]');
				$this->form_validation->set_rules('par_email', 'Parent Email', 'required|valid_email');
				$this->form_validation->set_rules('sslc_grade', 'Sslc Percentage', 'required');
				$this->form_validation->set_rules('puc1_grade', '1Puc Percentage', 'required');
				$this->form_validation->set_rules('puc2_grade', '2Puc Percentage', 'required');
				$this->form_validation->set_rules('course', 'Course', 'required');
				$this->form_validation->set_rules('course1', 'Course 1', 'required');
				$this->form_validation->set_rules('course2', 'Course 2', 'required');
				$this->form_validation->set_rules('state', 'State', 'required');
				$this->form_validation->set_rules('city', 'City', 'required');
				$this->form_validation->set_rules('sports', 'Sports', 'required');
				$this->form_validation->set_rules('adhaar', 'Adhaar Number', 'required|regex_match[/^[0-9]{12}$/]|is_unique[enquiries.adhaar]');
				$this->form_validation->set_rules('gender', 'Gender', 'required');
				$this->form_validation->set_rules('category', 'Category', 'required');
	
				if ($this->form_validation->run() === FALSE) {
					$data['action'] = 'welcome';
					$data['student_name'] = $this->input->post('name');
					$data['mobile'] = $this->input->post('mobile');
					$data['email'] = $this->input->post('email');
					$data['par_name'] = $this->input->post('par_name');
					$data['par_mobile'] = $this->input->post('par_mobile');
					$data['par_email'] = $this->input->post('par_email');
					$data['sslc_grade'] = $this->input->post('sslc_grade');
					$data['puc1_grade'] = $this->input->post('puc1_grade');
					$data['puc2_grade'] = $this->input->post('puc2_grade');
					$data['course'] = $this->input->post('course');
					$data['course1'] = $this->input->post('course1');
					$data['course2'] = $this->input->post('course1');
					$data['state'] = $this->input->post('state');
					$data['city'] = $this->input->post('city');
					$data['sports'] = $this->input->post('sports');
					$data['adhaar'] = $this->input->post('adhaar');
					$data['gender'] = $this->input->post('gender');
					$data['category'] = $this->input->post('category');
					
				

					$this->welcome_template->show('home', $data);
				} else {

					$course_id = $this->input->post('course');
					$course = $data['course_options'][$course_id];
					$course_id1 = $this->input->post('course1');
					$course1 = $data['course_options'][$course_id1];
					$course_id2 = $this->input->post('course2');
					$course2 = $data['course_options'][$course_id2];
	
					//Setting values for tabel columns
					$insertDetails = array(
						'academic_year' => "2024-2025",
						'student_name' => strtoupper($this->input->post('name')),
						'mobile' => $this->input->post('mobile'),
						'email' => strtolower($this->input->post('email')),
						'par_name' => strtoupper($this->input->post('par_name')),
						'par_mobile' => $this->input->post('par_mobile'),
						'par_email' => strtolower($this->input->post('par_email')),
						'sslc_grade' => $this->input->post('sslc_grade'),
						'puc1_grade' => $this->input->post('puc1_grade'),
						'puc2_grade' => $this->input->post('puc2_grade'),
						'course_id' => $this->input->post('course'),
						'course' => $course,
						'course1' => $course1,
						'course2' => $course2,
						'state' => $this->input->post('state'),
						'city' => $this->input->post('city'),
						'sports' => $this->input->post('sports'),
						'adhaar' => $this->input->post('adhaar'),
						'gender' => $this->input->post('gender'),
						'category' => $this->input->post('category'),
						'status' => '1',
						'reg_by' => strtoupper($this->input->post('name')),
						'reg_date' => date('Y-m-d H:i:s')
					);	
					$result = $this->admin_model->insertDetails('enquiries', $insertDetails);
					if ($result) {

						$student_name = $this->input->post('name');
						$mobile = $this->input->post('mobile');
						$student_email = $this->input->post('email');
						
						$email['name'] = strtoupper($student_name);
						$email['mobile'] = strtoupper($mobile);
						$email['student_email'] = strtolower($student_email);

						if($parent_email){
							$email['par_email'] = strtolower($parent_email);
							$parent_email = $this->input->post('par_email');
						}

						$ci = &get_instance();
						$message = $ci->load->view('email/enquiry_success', $email, true);

						$this->aws_sdk->triggerEmail($student_email, 'Course Registration Application Submitted', $message);
						if($parent_email){
							$this->aws_sdk->triggerEmail($parent_email, 'Course Registration Application Submitted', $message);
						}
						$this->aws_sdk->triggerEmail('admission@mcehassan.ac.in', 'Course Registration Application Submitted', $message);

						$this->session->set_flashdata('message', "<h6>Thanks you! We've received your enquiry details. <br/> For any further inquiries, please contact admission@mcehassan.ac.in</h6>");
						$this->session->set_flashdata('status', 'alert-success');
					} else {
						$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
						$this->session->set_flashdata('status', 'alert-warning');
					}
					redirect('welcome', 'refresh');
				}
		
	}

	function validate_member($mobile)
{
	$data['enquiries'] = $mobile; //this is redundant, but it's to show you how
   //the content of the fields gets automatically passed to the method

   if($this->admin_model->validate_member($data['enquiries']))
   {
     return TRUE;
   }
   else
   {
     return FALSE;
   }
}

	function courses()
	{
		
			$details = $this->admin_model->getDetailsbyfield('1','status','departments')->result();
 
			$result = array();
			foreach ($details as $details1) {
				$row = $this->admin_model->get_stream_by_id($details1->stream_id);
				$result[$details1->department_id] = $row['stream_short_name'] . ' - ' . $details1->department_name;
			}

		 return $result;

	}
}