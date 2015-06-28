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
        $this->load->model('questiontype_model');
        if(isset($_POST['qtype']) && $_POST['qtype'] == "deltype")
       {
            $tid = $_POST['tid'];
            $this->questiontype_model->row_delete($tid);
       }
    }
    
    function all_type()
    {
       //set validation rules
       
       
        $this->load->library('form_validation');
        if(isset($_POST['taction']) && $_POST['taction'] == "addtype")
        {
            $this->form_validation->set_rules('qtype', 'Question Type', 'required');    
        if ($this->form_validation->run() == TRUE)
        {
           $data = array(
                'type' => $this->input->post('qtype'),
                'parent_id' => $this->input->post('qparent'),
                );
            $this->questiontype_model->insert($data); 
            $data['message'] = 'Record Inserted Successfully';
        }
        }
            
            $this->load->model('questiontype_model');
            $all_parents = $this->questiontype_model->get_parent_type();
            foreach($all_parents as $parent)
            {   
                $all_subtypes = $this->questiontype_model->get_sub_type_with_question($parent->id);
                $parent->sub_type = $all_subtypes;
                $types[]=$parent;                
            }
            
            $data['alltypes'] = $types;
            $data['content'] = "AddType";
            $data['body'] = 'AllType';
            $this->load->view('template',$data);
       
    }
    
    function insert_type()
    {
        
    }
    
    function edit_type()
    {
        // if($_GET['tid'] == null)
        // {
        //     redirect("question-type");
        //     exit;
        // }

      //check function
      if (isset($_GET['tid']) ){
        $tid = $_GET['tid'];
        $this->load->library('form_validation');
        if(isset($_POST['taction']) && $_POST['taction'] == "edittype")
        {
            $this->form_validation->set_rules('qtype', 'Question Type', 'required');    
        }
        
        if ($this->form_validation->run() == TRUE)
        {
           $data = array(
                'type' => $this->input->post('qtype')
                );
            $this->questiontype_model->update_type($tid,$data);
            $data['message'] = 'Record updated Successfully';
        }
        
        
        $singlerecord = $this->questiontype_model->get_single($tid);
        $data['single_record'] = $singlerecord;
        
        $data['content'] = "EditType";


  
      }
      else
      {
        $data['content'] = 'Editshow';
      }


      $all_parents = $this->questiontype_model->get_parent_type();
        foreach($all_parents as $parent)
        {   
            $all_subtypes = $this->questiontype_model->get_sub_type_with_question($parent->id);
            $parent->sub_type = $all_subtypes;
            $types[]=$parent;                
        }
        $data['alltypes'] = $types;
        $data['body'] = 'AllType';
        $this->load->view('template',$data);
    } 
    
        

    
    
    
}
?>