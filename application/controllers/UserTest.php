<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserTest extends CI_Controller
{
    function __construct()
    {
        //load the library
        parent::__construct();
        $this->load->library('session');
        $cur_user = $this->session->userdata("testuser_id");
        if (!isset($cur_user)) {
            redirect("register");
            exit;
        }
        $this->load->helper(array(
            'form'
        ));
        $this->load->model('UsertestModel');
    }
    public function index()
    {   
        $this->load->library("common");
        $this->common->check_mypos('UT');
        
        $cur_user    = $this->session->userdata("testuser_id");
        $initial_status = $this->UsertestModel->get_userstatus($cur_user);
        $question_id = 0;
        if (isset($_POST['submit_ans']) && $_POST != "" && !empty($_POST)) {
            //store ans
            $question_id   = $_POST['que_id'];
            $ans_id        = $_POST['answer'];
            $question_data = $this->UsertestModel->get_question($question_id);
            $correct_ansID = $question_data->answer;
            if ($correct_ansID == $ans_id) {
                $answer_status = "T";
            } else {
                $answer_status = "F";
            }
            
            if($initial_status->test_status == "F")
            {
                $cutype = $initial_status->test_F;
            }
            else if($initial_status->test_status == "S")
            {
                $cutype = $initial_status->test_S;
            }
            
            
            $temp_data = array(
                "user_id" => $cur_user,
                "question_id" => $question_id,
                "question" => $question_data->question,
                "answer_status" => $answer_status,
                "answer_id" => $ans_id,
                "test_type" => $cutype
            );
            $this->UsertestModel->save_ans($temp_data);
            if($cutype == "T1")
            {
                $ustatus_data = array('test1_index'=>$question_id);
            }
            else if($cutype == "T2")
            {
                $ustatus_data = array('test2_index'=>$question_id);
            }
            
            $this->UsertestModel->update_test_status($cur_user, $ustatus_data);
            //update user test status
            $result = $this->get_my_question();
            if ($result == "NO") {
                $ustatus = $this->UsertestModel->get_userstatus($cur_user);
                $ctest   = $ustatus->test_status;
                if ($ctest == "F") {
                    $cdatastus = array(
                        "test_status" => "S"
                    );
              
                } else if ($ctest == "S") {
                    $cdatastus = array(
                        "test_status" => "SU"
                    );
                    
                }
                $this->UsertestModel->update_test_status($cur_user, $cdatastus);
            }
        }
        //chech milestone position for current user
        
         $result = $this->get_my_question();
        $data['qdata'] = $result;
        $data['body']  = 'Usertest';
        $this->load->view('frontend/template', $data);
    }
   
    function get_my_question()
    {
        $this->load->library('session');
        $cur_user = $this->session->userdata("testuser_id");
        $this->load->model('UsertestModel');
        $ustatus = $this->UsertestModel->get_userstatus($cur_user);
        $ctest   = $ustatus->test_status;
        if ($ctest == "F") {
            $cutype = $ustatus->test_F;
        } else if ($ctest == "S") {
            $cutype = $ustatus->test_S;
        }
        if($cutype == "T1")
        {
          $result = $this->UsertestModel->get_nextQuestion_1($ustatus->test1_index);
        }
        else if($cutype == "T2")
        {
           $result = $this->UsertestModel->get_nextQuestion_2($ustatus->test2_index);
        }
        
        return $result;
    }
    
    public function information()
    {
        $this->load->library("common");
        $this->common->check_mypos('I');
        $this->load->model('UsertestModel');
        $cur_user = $this->session->userdata("testuser_id");
        $ustatus  = $this->UsertestModel->get_userstatus($cur_user);
        if (isset($_POST['infoaccept']) && $_POST != "" && $_POST['infoaccept'] == "ACCEPTED") {
            $cur_user   = $this->session->userdata("testuser_id");
            $numbers    = array(
                1 => 1,
                2 => 2,
                3 => 3,
                4 => 4,
                5 => 5,
                6 => 6
            );
            $random_key = array_rand($numbers, 1);
            if ($random_key % 2 == 0) {
                $test1_rid = "T1";
                $test2_rid = "T2";
            } else {
                $test1_rid = "T2";
                $test2_rid = "T1";
            }
            $this->load->model('ExamModel');
            $test1_id     = $this->ExamModel->get_meta('test_type1');
            $test2_id     = $this->ExamModel->get_meta('test_type2');
            $ustatus_data = array(
                "test_F" => $test1_rid,
                "test_S" => $test2_rid,
                "test1_id" => $test1_id,
                "test2_id" => $test2_id,
                "test_status" => "F"
            );
            $this->UsertestModel->update_test_status($cur_user, $ustatus_data);
            redirect("usertest");
            exit;
        }
        $data['body'] = 'Information';
        $this->load->view('frontend/template', $data);
    }
}
?>