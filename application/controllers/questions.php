<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends CI_Controller {

	public function index()
	{
	   //load the library
        $this->load->library("auth");

        //this is how we protect it
        if( ! $this->auth->logged_in())
        {
            redirect("admin/login");  //for example
        }
       $data['body'] = 'all_questions';
       $this->load->view('template',$data);
    }
    
    function allQuestions()
    {
      
    }
 }
?>