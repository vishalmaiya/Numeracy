<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserTest extends CI_Controller {
    
    function __construct() {
        //load the library
       parent::__construct();
       $this->load->library('session');
       $cur_user = $this->session->userdata("testuser_id");
       if(!isset($cur_user))
       {
            redirect("register");
            exit;
       }
       $this->load->helper(array('form'));
       $this->load->model('Usertest_model');
    }

    public function index()
    {

         $cur_user = $this->session->userdata("testuser_id");
         $question_id = 0;
        if(isset($_POST['submit_ans']) && $_POST != "" && !empty($_POST))
        {
            //store ans
            $question_id = $_POST['que_id']; 
            $ans_id = $_POST['answer'];
            $question_data = $this->Usertest_model->get_question($question_id);
            $correct_ansID = $question_data->answer;
            if($correct_ansID == $ans_id)
            {
                 $answer_status = "T";
            }
            else
            {
                 $answer_status = "F";
            }
            $type = 1;
            $temp_data = array("user_id"=>$cur_user,
                                "question_id"=>$question_id,
                                "question"=>$question_data->question,
                                "answer_status"=>$answer_status,
                                "answer_id"=>$ans_id,
                                "test_type"=>1,
                                );
            $this->Usertest_model->save_ans($temp_data);
            
            //update user test status
             $result = $this->Usertest_model->get_nextQuestion("test_type1");
             if($result == "NO")
             {
                  $ustatus = $this->Usertest_model->get_userstatus($cur_user);
                  $ctest = $ustatus->test_status;
                  if($ctest == "F")
                  {
                    $cdatastus = array("test_status"=>"S");
                    $this->Usertest_model->update_test_status($user_id,$cdatastus);
                  }
                  else if($ctest == "S")
                  {
                    $cdatastus = array("test_status"=>"SU");
                    $this->Usertest_model->update_test_status($user_id,$cdatastus);
                  }
                  
                  
                  
             }
             
            
        }
        
       
       //chech milestone position for current user
       $ustatus = $this->Usertest_model->get_userstatus($cur_user);
       $ctest = $ustatus->test_status;
      if($ctest == "F")
      {
        $result = $this->Usertest_model->get_nextQuestion("test_type1",$question_id);
      }
      else if($ctest == "S")
      {
        $result = $this->Usertest_model->get_nextQuestion("test_type2",$question_id);
      }
      else if($ctest == "SU")
      {
        redirect("survey");
        exit;
      }
                  
       
       
       $data['qdata'] = $result;

       $data['body'] = 'Usertest';
       $this->load->view('frontend/template',$data);
    }
    public function information()
	{
	   $data['body'] = 'Information';
       $this->load->view('frontend/template',$data);
    }

 }
?>