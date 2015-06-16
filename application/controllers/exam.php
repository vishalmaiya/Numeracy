<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {
    
    function __construct() {
        //load the library
        parent::__construct();
        $this->load->library("auth");
         $this->load->helper(array('form'));
        if( ! $this->auth->logged_in())
        {
            redirect("admin/login"); 
        }
    }


    public function index()
	{
	   $this->load->model('exammodel');
	   if(isset($_POST['qaction']) && $_POST['qaction'] == "delque")
       {
            $qid = $_POST['qid'];
            $this->exammodel->row_delete($qid);
       }	   
       $results = $this->exammodel->get_all();
       $data['results'] = $results;
       $data['body'] = 'AllExam';
       $this->load->view('template',$data);
    }
    
    public function add_exam()
    {
       //set validation rules
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tname', 'Test Name', 'required');
        $this->form_validation->set_rules('tquestions[]', 'Test Questions', 'required');
        $this->form_validation->set_rules('test_type', 'Test Type', 'required');
        
        if ($this->form_validation->run() == TRUE)
        {
          $data = array(
                'name' => $this->input->post('tname'),
                'question_ids' => json_encode($this->input->post('tquestions')),
                'test_type' => $this->input->post('test_type'),
                );
          $this->load->model('exammodel');
           $this->exammodel->insert($data);
           $data['message'] = 'Test Added Successfully';
         }
        $this->load->model('questionmodel');
       $allquestions = $this->questionmodel->get_all();
       $data['allquestions'] = $allquestions;
       
       $data['body'] = 'AddExam';
       $this->load->view('template',$data);
    }
    public function exam_status()
    {
        $this->load->model('exammodel');
        $exam_status[] = $this->exammodel->get_meta("test_type1");
        $exam_status[] = $this->exammodel->get_meta("test_type2");
       $data['results'] = $exam_status;
       $data['body'] = 'ExamStatus';
       $this->load->view('template',$data);


        $this->load->library('form_validation');
        $this->form_validation->set_rules('test_type1', 'Type 1', 'required');
        $this->form_validation->set_rules('test_type2', 'Type 2', 'required');
        
        
        if ($this->form_validation->run() == TRUE)
        {
          $data[] = $this->input->post('test_type1');
          $data[] = $this->input->post('test_type2');

          
           $this->load->model('exammodel');
           $this->exammodel->insert_status($data);
           $data['message'] = 'Status Saved';
         }
       //  $this->load->model('questionmodel');
       // $allquestions = $this->questionmodel->get_all();
       // $data['allquestions'] = $allquestions;
       
       // $data['body'] = 'AddExam';
       // $this->load->view('template',$data);


         
      }


    public function edit_exam()
    {
        if(isset($_GET['tid']))
        $tid = $_GET['tid'];
        //set validation rules
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tname', 'Test Name', 'required');
        $this->form_validation->set_rules('tquestions[]', 'Test Questions', 'required');
        $this->form_validation->set_rules('test_type', 'Test Type', 'required');
        
        if ($this->form_validation->run() == TRUE)
        {
         $data = array(
            'name' => $this->input->post('tname'),
            'question_ids' => json_encode($this->input->post('tquestions')),
            'test_type' => $this->input->post('test_type'),
            );
          $this->load->model('exammodel');
          $tid = $this->input->post('tid');
           $res = $this->exammodel->update_test($tid,$data);
           if($res)
           $data['message'] = 'Test updated Successfully!';
           else
           $data['error_message'] = 'Error While updating Test';
        }
        
        
            if(isset($tid) && $tid != "")
            {
                
                $this->load->model('exammodel');
                $stest = $this->exammodel->get_single($tid);
                if(!is_object($stest))
                {
                    $data['error_message'] = "No Record Found";
                }
                else
                {
                    $data['data'] = $stest;
                    $this->load->model('questionmodel');
                    $allquestions = $this->questionmodel->get_all();
                    $data['allquestions'] = $allquestions;
                }   
               
                
                $data['body'] = 'EditExam';
                $this->load->view('template',$data); 
            }
            else
            {
                redirect("all-exam");
            }
        
        
         
    }
    
 }