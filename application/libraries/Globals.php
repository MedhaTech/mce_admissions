<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Globals
{

    public function userTypes()
    {
        return array("1" => "Super Admin", "2" => "Chairman", "3" => "Principal/Director", '4' => "PRO’s", '5' => "Accounts Admin", '6' => "Accounts Staff");
    }

    public function enquiryStatus()
    {
        return array("1" => "New", "2" => "Working", "3" => "On-Hold", "4" => "Archived", "5" => "Bad Data", "6" => "Admitted");
    }

    public function enquiryStatusColor()
    {
        return array("1" => "primary", "2" => "success", "3" => "warning", "4" => "danger", "5" => "danger", "6" => "info");
    }

    public function admissionStatus()
    {
        return array("1" => "Processing", "2" => "Submitted", "3" => "On-Hold", "4" => "Confirmed", "5" => "Rejected", "6" => "Canceled", "7" => "Archived");
    }

    public function admissionStatusColor()
    {
        return array("1" => "info", "2" => "primary", "3" => "warning", "4" => "success", "5" => "danger", "6" => "danger", "7" => "danger");
    }
    public function currentAcademicYear()
    {

        $details = "2024-2025";
        return $details;
    }

    public function academicYear()
    {

        $details = array();
        // for($i = 2020; $i <= date('Y'); $i++){
        for ($i = 2024; $i < 2025; $i++) {
            $iNext = $i + 1;
            $details[$i . '-' . $iNext] = $i . '-' . $iNext;
        }
        return $details;
    }
    public function courses()
    {
        return array("CS" => "CS", "EEE" => "EEE", "EIE" => "EIE", "ME" => "ME", "ECE" => "ECE", "AE" => "AE");
    }

    public function courseFees()
    {

        $details = array(
            "CS" => array("Q1" => 20000, "Q2" => 11000),
            "EEE" => array("Q1" => 20000, "Q2" => 11000),
            "EIE" => array("Q1" => 20000, "Q2" => 11000)

        );

        return $details;
    }
    public function languages()
    {
        return array(
            "KANNADA" => "KANNADA",
            "ENGLISH" => "ENGLISH",
            "HINDI" => "HINDI",
            "SANSKRIT" => "SANSKRIT",
            "TAMIL" => "TAMIL",
            "TELUGU" => "TELUGU",
            "URDU" => "URDU"
        );
    }

    public function quota()
    {
        return array(
            "KEA-CET(GOVT)" => "KEA-CET(GOVT)",
            "SNQ" => "SNQ",
            "J&K (Non Karnataka)" => "J&K (Non Karnataka)",
            "GOI  (Non Karnataka)" => "GOI  (Non Karnataka)",
            "MGMT" => "MGMT",
            "COMED-K" => "COMED-K"
        );
    }

    public function sub_quota()
    {
        return array(
           
            "Aided" => "Aided",
            "UnAided" => "UnAided"
        );
    }


    public function states(){
        return array(
        "AP"=>"Andhra Pradesh",
        "AR"=>"Arunachal Pradesh",
        "AS"=>"Assam",
        "BR"=>"Bihar",
        "CT"=>"Chhattisgarh",
        "GA"=>"Gujarat",
        "HR"=>"Haryana",
        "HP"=>"Himachal Pradesh",
        "JK"=>"Jammu and Kashmir",
        "GA"=>"Goa",
        "JH"=>"Jharkhand",
        "KA"=>"Karnataka",
        "KL"=>"Kerala",
        "MP"=>"Madhya Pradesh",
        "MH"=>"Maharashtra",
        "MN"=>"Manipur",
        "ML"=>"Meghalaya",
        "MZ"=>"Mizoram",
        "NL"=>"Nagaland",
        "OR"=>"Odisha",
        "PB"=>"Punjab",
        "RJ"=>"Rajasthan",
        "SK"=>"Sikkim",
        "TN"=>"Tamil Nadu",
        "TG"=>"Telangana",
        "TR"=>"Tripura",
        "UT"=>"Uttarakhand",
        "UP"=>"Uttar Pradesh",
        "WB"=>"West Bengal",
        "AN"=>"Andaman and Nicobar Islands",
        "CH"=>"Chandigarh",
        "DN"=>"Dadra and Nagar Haveli",
        "DD"=>"Daman and Diu",
        "DL"=>"Delhi",
        "LD"=>"Lakshadweep",
        "PY"=>"Puducherry");
    }
}