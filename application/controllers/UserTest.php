<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserTest extends CI_Controller {
    
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