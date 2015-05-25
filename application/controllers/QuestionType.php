<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuestionType extends CI_Controller {

    function __construct() {
        //load the library
        parent::__construct();
        $this->load->library("auth");
        //this is how we protect it
        if( ! $this->auth->logged_in())
        {
            redirect("admin/login");  //for example
        }
        $this->load->helper(array('form'));
        
    }
    
    function all_type()
    {
      
       //set validation rules
        $this->load->library('form_validation');
        $this->form_validation->set_rules('qtype', 'Question Type', 'required');
        $this->form_validation->set_rules('qparent', 'Question Sub Type', 'trim|required|numeric');
        if ($this->form_validation->run() == FALSE)
        {
          $data['body'] = 'AllType';
          $this->load->view('template',$data);
        }
        else
        {
            $data = array(
                'type' => $this->input->post('qtype'),
                'parent_id' => $this->input->post('qparent'),
                );
            //Transfering data to Model
            $this->load->model('questiontypemodel');
            $this->questiontypemodel->insert($data);
            $data['message'] = 'Record Inserted Successfully';
            //Loading View
            $data['body'] = 'AllType';
            $this->load->view('template',$data);
        }  
    }
    
    function insert_type()
    {
        
    }
        
    function edit_type()
    {
        $data['body'] = 'EditType';
       $this->load->view('template',$data);
    }
    
}
?>