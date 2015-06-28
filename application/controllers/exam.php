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
       $exam_status['test_type1'] = $this->exammodel->get_meta("test_type1");
       $exam_status['test_type2'] = $this->exammodel->get_meta("test_type2");
       $data['exam_status'] = $exam_status;
       $data['results'] = $results;
       $data['body'] = 'AllExam';
       $this->load->view('template',$data);
    }
    
    public function add_exam1()
    {
       //set validation rules
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tname', 'Test Name', 'required');
        $this->form_validation->set_rules('tquestions[]', 'Test Questions', 'required');
         $this->load->model('questiontypemodel');
        
        if ($this->form_validation->run() == TRUE)
        {
            $sque = $this->input->post('tquestions');
            foreach($sque as $sq)
            {
                $temp['qid'] = $sq;
              // $temp['type'] = $this->input->post('qtype_'.$sq);
               // $temp['subtype'] = $this->input->post('qsubtype_'.$sq);
                $temp['difficulty'] = $this->input->post('qdiff_'.$sq);
                $alldata[] = $temp;
            }
            
          $data = array(
                'name' => $this->input->post('tname'),
                'question_data' => $alldata,
                'test_type' => $this->input->post('test_type'),
                );
           $this->load->model('exammodel');
           $this->exammodel->insert_type1($data);
           
           $data['message'] = 'Test Added Successfully';
         }
           
       $all_parents = $this->questiontypemodel->get_parent_type();
       $this->load->model('questionmodel');
       $alltype = $this->questiontypemodel->get_all();
       $data['alltype'] = $alltype;
       $allquestions = $this->questionmodel->get_all();
       $data['allquestions'] = $allquestions;
      // $data['allparentrs'] = $all_parents;
       $data['body'] = 'AddExam_1';
       $this->load->view('template',$data);
    }
    public function add_exam2()
    {
        //set validation rules
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tname', 'Test Name', 'required');
        $this->form_validation->set_rules('tquestions[]', 'Test Questions', 'required');
        $this->load->model('questiontypemodel');
        
        if ($this->form_validation->run() == TRUE)
        {
             $sque = $this->input->post('tquestions');
            foreach($sque as $sq)
            {
                $temp['qid'] = $sq;
               // $temp['type'] = $this->input->post('qtype_'.$sq);
               // $temp['subtype'] = $this->input->post('qsubtype_'.$sq);
                $temp['difficulty'] = 0;
                $alldata[] = $temp;
            }
            
          $data = array(
                'name' => $this->input->post('tname'),
                'question_data' => $alldata,
                'test_type' => $this->input->post('test_type'),
                );
           $this->load->model('exammodel');
           $this->exammodel->insert_type1($data);
           $data['message'] = 'Test Added Successfully';
         }
         $alltype = $this->questiontypemodel->get_all();
       $data['alltype'] = $alltype;
         
       $this->load->model('questionmodel');
       $allquestions = $this->questionmodel->get_all();
       $data['allquestions'] = $allquestions;
       $data['body'] = 'AddExam_2';
       $this->load->view('template',$data);
    }
    
    public function edit_exam1()
    {

        if(isset($_GET['tid']))
        $tid = $_GET['tid'];
        $this->load->model('questiontypemodel');
        //set validation rules
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tname', 'Test Name', 'required');
        $this->form_validation->set_rules('tquestions[]', 'Test Questions', 'required');
        
        if ($this->form_validation->run() == TRUE)
        {
             $sque = $this->input->post('tquestions');
            foreach($sque as $sq)
            {
                $temp['qid'] = $sq;
               // $temp['type'] = $this->input->post('qtype_'.$sq);
               // $temp['subtype'] = $this->input->post('qsubtype_'.$sq);
                $temp['difficulty'] = $this->input->post('qdiff_'.$sq);
                $alldata[] = $temp;
            }
            
          $upddata = array(
                'name' => $this->input->post('tname'),
                'question_data' => $alldata,
                'test_type' => $this->input->post('test_type'),
                );
          $test_id = $this->input->post('test_id');
           $this->load->model('exammodel');
           $this->exammodel->update_type1($test_id,$upddata);
           $data['message'] = 'Test Updated Successfully';
        }
        
        
        if(isset($tid) && $tid != "")
        {
            
            $this->load->model('exammodel');
            $singletest = $this->exammodel->get_single($tid);
            if(!is_object($singletest))
            {
                $data['error_message'] = "No Record Found";
            }
            else
            {
                $alltype = $this->questiontypemodel->get_all();
                $data['alltypes'] = $alltype;
                $allparentns = $this->questiontypemodel->get_parent_type();
                $data['allparentns'] = $allparentns;
            
                $data['data'] = $singletest;
                $this->load->model('questionmodel');
                $allquestions = $this->questionmodel->get_all();
                $data['allquestions'] = $allquestions;
            }   
            
            $data['body'] = 'EditExam1';
            $this->load->view('template',$data); 
        }
        else
        {
            redirect("all-exam");
        }
    }
    public function edit_exam2()
    {
         if(isset($_GET['tid']))
        $tid = $_GET['tid'];
        //set validation rules
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tname', 'Test Name', 'required');
        $this->form_validation->set_rules('tquestions[]', 'Test Questions', 'required');
        
        if ($this->form_validation->run() == TRUE)
        {
             $sque = $this->input->post('tquestions');
            foreach($sque as $sq)
            {
                $temp['qid'] = $sq;
               // $temp['type'] = $this->input->post('qtype_'.$sq);
               // $temp['subtype'] = $this->input->post('qsubtype_'.$sq);
                $temp['difficulty'] = 0;
                $alldata[] = $temp;
            }
           $data = array(
                'name' => $this->input->post('tname'),
                'question_data' => $alldata,
                'test_type' => $this->input->post('test_type'),
                );
           $test_id = $this->input->post('test_id');
           $this->load->model('exammodel');
           $this->exammodel->update_type1($test_id,$data);
           $data['message'] = 'Test Updated Successfully';
        }
         
        
        
        if(isset($tid) && $tid != "")
        {
            
            $this->load->model('exammodel');
            $singletest = $this->exammodel->get_single($tid);
            if(!is_object($singletest))
            {
                $data['error_message'] = "No Record Found";
            }
            else
            {
            
                $data['data'] = $singletest;
                $this->load->model('questionmodel');
                $allquestions = $this->questionmodel->get_all();
                $data['allquestions'] = $allquestions;
            }   
            
            $data['body'] = 'EditExam2';
            $this->load->view('template',$data); 
        }
        else
        {
            redirect("all-exam");
        }
    }
     
    public function exam_status()
    {
        $this->load->model('exammodel');
        
       $this->load->library('form_validation');
        $this->form_validation->set_rules('test_type1', 'Type 1', 'required');
        $this->form_validation->set_rules('test_type2', 'Type 2', 'required');
        
        
        if ($this->form_validation->run() == TRUE)
        {
          $type1 = $this->input->post('test_type1');
          $type2 = $this->input->post('test_type2');

          
           $this->load->model('exammodel');
           $this->exammodel->update_meta('test_type1',$type1);
           $this->exammodel->update_meta('test_type2',$type2);
           $data['message'] = 'Status Saved';
         }
         $exam_status['test_type1'] = $this->exammodel->get_meta("test_type1");
        $exam_status['test_type2'] = $this->exammodel->get_meta("test_type2");
         
       $results = $this->exammodel->get_all();
       $data['results'] = $results;
        $data['exam_status'] = $exam_status;
       $data['body'] = 'ExamStatus';
       $this->load->view('template',$data);
         
      }
    
 }