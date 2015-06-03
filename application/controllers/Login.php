<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
         //load the library
        $this->load->library("auth");

        //this is how we protect it
        if($this->auth->logged_in())
        {
            //they are logged in
            redirect('all-questions');
        }
	   
	    $this->load->helper(array('form'));
        $this->load->view('templates/login');
        
	}
    
    public function loginuser()
    {
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
         redirect('Dashbord', 'refresh');
       }
    }
    
    function check_database($password)
    {

        $this->load->library("auth");
        $username = $this->input->post('username');
        $result = $this->auth->login($username,$password);
        return $result;
    }
    
    
}
?>