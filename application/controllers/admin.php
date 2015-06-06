<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
	   $this->load->helper('url');
	   $this->load->view('index');
           
	}
    
    public function login()
    {
        //This method will have the credentials validation
           $this->load->helper('security');
           $this->load->library('form_validation');
           $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
           $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
           if($this->form_validation->run() == FALSE)
           {
             //Field validation failed.  User redirected to login page
             $this->load->view('templates/login');
           }
           else
           {
             redirect('all-questions', 'refresh');
           }

    }
    
     function check_database($password)
     {
       //Field validation succeeded.  Validate against database
       $username = $this->input->post('username');
    
       //query the database
       $this->load->library("auth");
       $result = $this->auth->login($username, $password);
    
       if($result)
       {
         return true;
       }
       else
       {
         $this->form_validation->set_message('check_database', 'Invalid username or password');
         return false;
       }
     }
    
    function logout()
    {
        $this->session->userdata = array();
        $this->session->sess_destroy();
        redirect('admin', 'refresh');
    }
}
