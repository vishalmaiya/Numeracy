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
	  
       $this->load->view('frontend/templates/Register');
    }
    
    public function register()
    {
        if(isset($_POST) && !empty($_POST) && $_POST != "")
       {
            $data = array('first_name' => $_POST['fname'],
                            'last_name' => $_POST['lname'],
                            'email' => $_POST['email'],
                            'age' => $_POST['age'],
                            'edu_level' => $_POST['edu_level'],
                            'gender' => $_POST['gender']);
            
       }
       $this->load->model('UsertestModel');
       $result = $this->UsertestModel->get_nextQuestion();
       if($result == "SUCCESS")
       {
            //create session and redirect to information page
            
       }
       else
       {
            // create session and redirect to question set
       }
       
    }
    
    
 }
?>