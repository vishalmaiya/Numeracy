<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashbord extends CI_Controller {

	public function index()
	{
	    $this->load->helper('url');
	    $data['body'] = 'index';
        $this->load->view('template',$data);
	}
}
?>