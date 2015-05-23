<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
        if ($this->session->userdata('logged_in'))
        { 
            redirect('Dashbord');
        }
	    $this->load->helper(array('form'));
        $this->load->view('templates/login');
	}
}
?>