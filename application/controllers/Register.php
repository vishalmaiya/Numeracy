<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    
    function __construct() {
        //load the library
        parent::__construct();
        //$this->load->library("auth");
//         $this->load->helper(array('form'));
//        if( ! $this->auth->logged_in())
//        {
//            redirect("login"); 
//        }
    }


    public function index()
	{
	   if(isset($_POST) && !empty($_POST) && $_POST != "")
       {
            $data = array('first_name' => $_POST['fname'],
                            'last_name' => $_POST['lname'],
                            'email' => $_POST['email'],
                            'age' => $_POST['age'],
                            'education_level' => $_POST['edu_level'],
                            'gender' => $_POST['gender']);
            
       
       $this->load->model('Usertest_model');
       $result = $this->Usertest_model->set_user($data);
       if($result['status'] == "SUCCESS")
       {
            //create session and redirect to information page
            $this->session->set_userdata("testuser_id",$result['id']);
            $this->load->model('Exam_model');
            $test1_id = $this->Exam_model->get_meta('test_type1');
            $test2_id = $this->Exam_model->get_meta('test_type2');
            $ustatus = array("user_id"=>$result['id'],
                            "test_F"=>"T1",
                            "test_S"=>"T2",
                            "test1_id"=>$test1_id,
                            "test2_id"=>$test2_id,
                            "test_status"=>"F");
            $this->Usertest_model->set_testuser_status($ustatus);
         
            redirect("information");
            
       }
       if($result['status'] == "EXIST")
       {
       
            // create session and redirect to question set
            $this->session->set_userdata("testuser_id",$result['id']);
            redirect("usertest");
       }
       }
      
       
       $this->load->view('frontend/templates/Register');
    }
    
    public function register()
    {
        
       
       
    }
    
    
 }
?>