<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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

	public function index()
	{

		$data['pageTitle'] = "B.E/P.G Admissions Open 2024-25 | Malnad College of Engineering";
		$data['activeMenu'] = "home";
		// $data['course_options'] = array("" => "Select Branch") + $this->courses();
		$data['course_options'] = array("" => "Select Branch") + $this->getAllCourses();
		// $data['pg_options'] = array("" => "Select Branch") + $this->getCoursesByStreamId();
		$data['states'] = array("" => "Select State") + $this->globals->states();
		$data['type_options'] = array("" => "Select") + $this->globals->category();

		//Including validation library
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|regex_match[/^[0-9]{10}$/]|is_unique[enquiries.mobile]', array(
			'is_unique' => 'This %s is exists in student name.'
		));
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('par_name', 'Parent Name', 'required');
		$this->form_validation->set_rules('par_mobile', 'Parent Mobile', 'required|regex_match[/^[0-9]{10}$/]|is_unique[enquiries.mobile]');
		$this->form_validation->set_rules('par_email', 'Parent Email', 'valid_email');
		$this->form_validation->set_rules('sslc_grade', 'Sslc Percentage', 'required');
		$this->form_validation->set_rules('admission_based', 'Admission Based', 'required');

		$admission_based = $this->input->post('admission_based');
		if ($admission_based == "PUC") {
			$this->form_validation->set_rules('puc1_grade', 'PUC-I Percentage', 'required');
			$this->form_validation->set_rules('puc2_grade', 'PUC-II Percentage');
		}

		if ($admission_based == "DIPLOMA") {
			$this->form_validation->set_rules('diploma1_grade', 'Diploma-I Percentage', 'required');
			$this->form_validation->set_rules('diploma2_grade', 'Diploma-II Percentage', 'required');
			$this->form_validation->set_rules('diploma3_grade', 'Diploma-III Percentage');
		}

		if ($admission_based == "GTTC") {
			$this->form_validation->set_rules('gttc1_grade', 'GT&TC-I Percentage', 'required');
			$this->form_validation->set_rules('gttc2_grade', 'GT&TC-II Percentage', 'required');
			$this->form_validation->set_rules('gttc3_grade', 'GT&TC-III Percentage', 'required');
			$this->form_validation->set_rules('gttc4_grade', 'GT&TC-IV Percentage');
		}

		if ($admission_based == "BE") {
			$this->form_validation->set_rules('degree1_grade', 'BE-I Percentage', 'required');
			$this->form_validation->set_rules('degree2_grade', 'BE-II Percentage', 'required');
			$this->form_validation->set_rules('degree3_grade', 'BE-III Percentage', 'required');
			$this->form_validation->set_rules('degree4_grade', 'BE-IV Percentage');
		}

		$this->form_validation->set_rules('course', 'Course', 'required');
		$this->form_validation->set_rules('course1', 'Course 1', 'required');
		$this->form_validation->set_rules('course2', 'Course 2', 'required');
		$this->form_validation->set_rules('state', 'State', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('sports', 'Sports', 'required');
		$this->form_validation->set_rules('aadhaar', 'Aadhaar Number', 'required|regex_match[/^[0-9]{12}$/]|is_unique[enquiries.aadhaar]');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');

		if ($this->form_validation->run() === FALSE) {
			$data['action'] = 'welcome';
			$data['name'] = $this->input->post('name');
			$data['mobile'] = $this->input->post('mobile');
			$data['email'] = $this->input->post('email');
			$data['par_name'] = $this->input->post('par_name');
			$data['par_mobile'] = $this->input->post('par_mobile');
			$data['par_email'] = $this->input->post('par_email');
			$data['sslc_grade'] = $this->input->post('sslc_grade');
			$data['admission_based'] = $this->input->post('admission_based');
			$data['puc1_grade'] = $this->input->post('puc1_grade');
			$data['puc2_grade'] = $this->input->post('puc2_grade');
			$data['diploma1_grade'] = $this->input->post('diploma1_grade');
			$data['diploma2_grade'] = $this->input->post('diploma2_grade');
			$data['diploma3_grade'] = $this->input->post('diploma3_grade');
			$data['gttc1_grade'] = $this->input->post('gttc1_grade');
			$data['gttc2_grade'] = $this->input->post('gttc2_grade');
			$data['gttc3_grade'] = $this->input->post('gttc3_grade');
			$data['gttc4_grade'] = $this->input->post('gttc4_grade');
			$data['degree1_grade'] = $this->input->post('degree1_grade');
			$data['degree2_grade'] = $this->input->post('degree2_grade');
			$data['degree3_grade'] = $this->input->post('degree3_grade');
			$data['degree4_grade'] = $this->input->post('degree4_grade');
			$data['course'] = $this->input->post('course');
			$data['course1'] = $this->input->post('course1');
			$data['course2'] = $this->input->post('course1');
			$data['state'] = $this->input->post('state');
			$data['city'] = $this->input->post('city');
			$data['sports'] = $this->input->post('sports');
			$data['aadhaar'] = $this->input->post('aadhaar');
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
				'admission_based' => $this->input->post('admission_based'),
				'puc1_grade' => $this->input->post('puc1_grade'),
				'puc2_grade' => $this->input->post('puc2_grade'),
				'diploma1_grade' => $this->input->post('diploma1_grade'),
				'diploma2_grade' => $this->input->post('diploma2_grade'),
				'diploma3_grade' => $this->input->post('diploma3_grade'),
				'gttc1_grade' => $this->input->post('gttc1_grade'),
				'gttc2_grade' => $this->input->post('gttc2_grade'),
				'gttc3_grade' => $this->input->post('gttc3_grade'),
				'gttc4_grade' => $this->input->post('gttc4_grade'),
				'degree1_grade' => $this->input->post('degree1_grade'),
				'degree2_grade' => $this->input->post('degree2_grade'),
				'degree3_grade' => $this->input->post('degree3_grade'),
				'degree4_grade' => $this->input->post('degree4_grade'),
				'course_id' => $this->input->post('course'),
				'course' => $course,
				'course1' => $course1,
				'course2' => $course2,
				'state' => $this->input->post('state'),
				'city' => $this->input->post('city'),
				'sports' => $this->input->post('sports'),
				'aadhaar' => $this->input->post('aadhaar'),
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

				if ($parent_email) {
					$email['par_email'] = strtolower($parent_email);
					$parent_email = $this->input->post('par_email');
				}

				$ci = &get_instance();
				$message = $ci->load->view('email/enquiry_success', $email, true);

				$this->aws_sdk->triggerEmail($student_email, 'Course Registration Enquiry Submitted', $message);
				if ($parent_email) {
					$this->aws_sdk->triggerEmail($parent_email, 'Course Registration Enquiry Submitted', $message);
				}
				$this->aws_sdk->triggerEmail('admission@mcehassan.ac.in', 'Course Registration Enquiry Submitted', $message);

				$this->session->set_flashdata('message', "<h6>Thanks you! We've received your enquiry details. <br/> For any further inquiries, please contact admission@mcehassan.ac.in</h6>");
				$this->session->set_flashdata('status', 'alert-success');
			} else {
				$this->session->set_flashdata('message', 'Oops something went wrong please try again.!');
				$this->session->set_flashdata('status', 'alert-warning');
			}
			redirect('welcome', 'refresh');
		}

	}

	function courses()
	{

		$details = $this->admin_model->getDetailsbyfield('1', 'status', 'departments')->result();

		$result = array();
		foreach ($details as $details1) {
			$row = $this->admin_model->get_stream_by_id($details1->stream_id);
			$result[$details1->department_id] = $row['stream_short_name'] . ' - ' . $details1->department_name;
		}

		return $result;

	}

function getAllCourses()
{
    $detailsUG = $this->admin_model->getDetailsbyfield('1', 'status', 'departments')->result();

    $detailsPG = $this->admin_model->getDetailsbyfield('2', 'stream_id', 'departments')->result();

    $result = array();

    foreach ($detailsUG as $details1) {
        $row = $this->admin_model->get_stream_by_id($details1->stream_id);
        if ($row) {
            $result[$details1->department_id] = $row['stream_short_name'] . ' - ' . $details1->department_name . ' (UG)';
        }
    }

    foreach ($detailsPG as $details2) {
        $row = $this->admin_model->get_stream_by_id($details2->stream_id);
        if ($row) {
            $result[$details2->department_id] = $row['stream_short_name'] . ' - ' . $details2->department_name . ' (PG)';
        }
    }

    return $result;
}
}