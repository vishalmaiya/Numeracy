<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SurveyQuestions extends CI_Controller {
    
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

       $this->load->model('surveymodel');
       $results = $this->surveymodel->get_all();
       //print_r($results);
       $data['results'] = $results;
       $data['body'] = 'SurveyQuestions';
       //print_r($data);
       $this->load->view('frontend/template',$data);

    }
}
?>