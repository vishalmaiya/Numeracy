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
//session_destroy();
        
        
    }


    public function index()
	{
	   $this->load->library("common");
	   $this->common->check_mypos('R');
	   if(isset($_POST) && !empty($_POST) && $_POST != "")
       {
            $data = array('first_name' => $_POST['fname'],
                            'last_name' => $_POST['lname'],
                            'email' => $_POST['email'],
                            'age' => $_POST['age'],
                            'education_level' => $_POST['edu_level'],
                            'gender' => $_POST['gender']);
            
       
       $this->load->model('UsertestModel');
       $result = $this->UsertestModel->set_user($data);
       if($result['status'] == "SUCCESS")
       {
            //create session and redirect to information page
            $this->session->set_userdata("testuser_id",$result['id']);
             $ustatus = array(
                            "user_id"=>$result['id'],
                            "test_status" => "I"
                            );
            $this->UsertestModel->set_testuser_status($ustatus);
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