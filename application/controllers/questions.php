<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends CI_Controller {

    function __construct() {
        //load the library
        parent::__construct();
        $this->load->library("auth");
         $this->load->helper(array('form'));
        //this is how we protect it
        if( ! $this->auth->logged_in())
        {
            redirect("admin/login");  //for example
        }
    }
    
	public function index()
	{
	   $this->load->model('questionmodel');
       $results = $this->questionmodel->get_all();
       $data['results'] = $results;
       $data['body'] = 'AllQuestion';
       $this->load->view('template',$data);
    }
    
    public function add_question()
    {
       //set validation rules
        $this->load->library('form_validation');
        $this->form_validation->set_rules('qtype', 'Question Type', 'trim|required|numeric');
        $this->form_validation->set_rules('question', 'Question', 'required');
        $this->form_validation->set_rules('difficultylevel', 'Difficulty Level', 'trim|required|numeric');
        $this->form_validation->set_rules('qanswer', 'Answer', 'required');
        
        if ($this->form_validation->run() == TRUE)
        {
          $data = array(
                'type' => $this->input->post('qtype'),
                'question' => $this->input->post('question'),
                'option' =>  json_encode($this->input->post('choice')),
                'answer' => $this->input->post('answer'),
                'difficulty_level' => $this->input->post('difficultylevel'),
                );
          $this->load->model('questionmodel');
           $this->questionmodel->insert($data);
           $data['message'] = 'Question Inserted Successfully';
         }
          
       $this->load->model('questiontypemodel');
       $data['all_parents'] = $this->questiontypemodel->get_parent_type();
       $data['body'] = 'AddQuestion';
       $this->load->view('template',$data);
    }
    
    
    function ajaxget_subtype()
    {
        $parent_id = $_POST['parent_id'];
        $this->load->model('questiontypemodel');
        $all_parents = $this->questiontypemodel->get_sub_type($parent_id);
        $result = json_encode($all_parents);
        print_r($result);
        die;
        
    }
    
     public function edit_question()
    {
        $qid = $_GET['qid'];
        if(isset($_GET['qid']) && $_GET['qid'] != "")
        {
            $this->load->model('questionmodel');
            $squestion = $this->questionmodel->get_single($qid);
            if(!$squestion)
            {
                $data['error_message'] = "No Record Found";
            }
            else
            {
                $data['data'] = $squestion;
                $this->load->model('questiontypemodel');
                $data['all_parents'] = $this->questiontypemodel->get_parent_type();
                $data['all_childs'] = $this->questiontypemodel->get_sub_type($squestion->id); 
            }   
           
            
            $data['body'] = 'EditQuestion';
            $this->load->view('template',$data); 
        }
        else
        {
            redirect("all-questions");
        }
        
         
    }

    
    
 }
?>