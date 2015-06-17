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
 }
?>