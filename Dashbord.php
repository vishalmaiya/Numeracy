<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashbord extends CI_Controller {

	public function index()
	{

	    //load the library
        $this->load->library("auth");

        //this is how we protect it
        if( ! $this->auth->logged_in())
        {
            //they are not logged in
            redirect("admin/login");  //for example
        }
	    $data['body'] = 'dashboard';
        $this->load->view('template',$data);
	}
}
?>