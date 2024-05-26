<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Globals
{

    public function userTypes()
    {
        return array("1" => "Super Admin", "2" => "Chairman", "3" => "Principal/Director", '4' => "Dean SA", '5' => "Admission Staff", '6' => "Accounts Admin", '7' => "Accounts Staff", '8'=>"COE");
    }

    public function enquiryStatus()
    {
        return array("1" => "New", "2" => "Working", "3" => "On-Hold", "4" => "Archived", "5" => "Bad Data", "6" => "Admitted", "7" => "Seat Blocked");
    }

    public function enquiryStatusColor()
    {
        return array("1" => "primary", "2" => "success", "3" => "warning", "4" => "danger", "5" => "danger", "6" => "info", "7" => "danger");
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
            "COMED-K" => "COMED-K",
            "MGMT" => "MGMT",
            "SNQ" => "SNQ",
            "J&K (Non Karnataka)" => "J&K (Non Karnataka)",
            "GOI (Non Karnataka)" => "GOI (Non Karnataka)"
        );
    }

    public function sub_quota()
    {
        return array(
           
            "Aided" => "Aided",
            "UnAided" => "UnAided"
        );
    }

    public function category()
    {
        return array(
            '1G'=>'1G',
            '1GH'=>'1GH',
            '1GHR'=>'1GHR',
            '1GK'=>'1GK',
            '1GR'=>'1GR',
            '1H'=>'1H',
            '1K'=>'1K',
            '1R'=>'1R',
            '2A'=>'2A',
            '2AG'=>'2AG',
            '2AGH'=>'2AGH',
            '2AGK'=>'2AGK',
            '2AGR'=>'2AGR',
            '2AGRH'=>'2AGRH',
            '2AGRK'=>'2AGRK',
            '2AH'=>'2AH',
            '2AK'=>'2AK',
            '2AR'=>'2AR',
            '2ARH'=>'2ARH',
            '2B'=>'2B',
            '2BG'=>'2BG',
            '2BGK'=>'2BGK',
            '2BGRK'=>'2BGRK',
            '2BK'=>'2BK',
            '2BR'=>'2BR',
            '2GHR'=>'2GHR',
            '3A'=>'3A',
            '3AG'=>'3AG',
            '3AGK'=>'3AGK',
            '3AGR'=>'3AGR',
            '3AGRK'=>'3AGRK',
            '3AH'=>'3AH',
            '3AR'=>'3AR',
            '3B'=>'3B',
            '3BG'=>'3BG',
            '3BGH'=>'3BGH',
            '3BGK'=>'3BGK',
            '3BGRK'=>'3BGRK',
            '3BH'=>'3BH',
            '3BK'=>'3BK',
            '3BR'=>'3BR',
            '3BRK'=>'3BRK',
            '3GHR'=>'3GHR',
            'AGL'=>'AGL',
            'COMED-K'=>'COMED-K',
            'D'=>'D',
            'GAH'=>'GAH',
            'GM'=>'GM',
            'GMH'=>'GMH',
            'GMK'=>'GMK',
            'GMR'=>'GMR',
            'GMRH'=>'GMRH',
            'GMRK'=>'GMRK',
            'GOI'=>'GOI',
            'IG'=>'IG',
            'J&K'=>'J&K',
            'NAIDU'=>'NAIDU',
            'NCC'=>'NCC',
            'NKR'=>'NKR',
            'NRI'=>'NRI',
            'OBC'=>'OBC',
            'PH'=>'PH',
            'SC'=>'SC',
            'SCG'=>'SCG',
            'SCGK'=>'SCGK',
            'SCGR'=>'SCGR',
            'SCGRH'=>'SCGRH',
            'SCGRK'=>'SCGRK',
            'SCH'=>'SCH',
            'SCK'=>'SCK',
            'SCR'=>'SCR',
            'SCRH'=>'SCRH',
            'SG'=>'SG',
            'SNQ'=>'SNQ',
            'SPO'=>'SPO',
            'SPORTS'=>'SPORTS',
            'ST'=>'ST',
            'STG'=>'STG',
            'STGH'=>'STGH',
            'STGRK'=>'STGRK',
            'STH'=>'STH',
            'STK'=>'STK',
            'STR'=>'STR',
            'XD'=>'XD',
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