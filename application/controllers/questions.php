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
        $this->form_validation->set_rules('qsubtype', 'Question Sub Type', 'trim|required|numeric');
        $this->form_validation->set_rules('question', 'Question', 'required');
        $this->form_validation->set_rules('answer', 'Answer', 'required');
        $this->form_validation->set_rules('difficultylevel', 'Difficulty Level', 'trim|required|numeric');

        if ($this->form_validation->run() == FALSE)
        {
            //fail validation
          $data['body'] = 'AddQuestion';
            $this->load->view('template',$data);
        }
        else
        {
            $data = array(
                'type' => $this->input->post('qtype'),
                'subtype' => $this->input->post('qsubtype'),
                'question' => $this->input->post('question'),
                'option' =>  json_encode($this->input->post('choice')),
                'answer' => $this->input->post('answer'),
                'difficulty_level' => $this->input->post('difficultylevel'),
                );
        //Transfering data to Model
        $this->load->model('questionmodel');
        $this->questionmodel->insert($data);
        $data['message'] = 'Question Inserted Successfully';
        //Loading View
        $data['body'] = 'AddQuestion';
        $this->load->view('template',$data);
        }
    }
    
     public function edit_question()
    {
       $data['body'] = 'EditQuestion';
       $this->load->view('template',$data); 
    }

    
    
 }
?>