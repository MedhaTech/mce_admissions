<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mcehook extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->CI = &get_instance();
        $this->load->model('admin_model', '', TRUE);
        date_default_timezone_set('Asia/Kolkata');
    }


    public function index()
    {
       
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {

            $tx = "";
            // if (!empty($_POST)) {
            //     $tx_array = $_POST;
            //     if (isset($tx_array['transaction'])) {
            //         $tx = $tx_array['transaction'];
            //     }
            // }
            $tx_array = $_POST;
            $params = json_decode(file_get_contents('php://input'), TRUE);
            
            $respStatus = 200;
            $resp = array('status' => 200, 'response' => $tx_array);
            json_output($respStatus,$resp);
            // if (!empty($tx)) {

            //     $params = json_decode(file_get_contents('php://input'), TRUE);

            //     if ($params == "") {
            //         $respStatus = 400;
            //         $resp = array('status' => 400, 'message' => 'params can\'t empty');
            //     } else {
            //     }
            //     json_output($respStatus, $resp);
            // }
        }
    }
}
