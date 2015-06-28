<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common{

 function Common()
 {
    
 }
 
 function check_mypos($pos)
{
     $CI =& get_instance();
      $CI->load->library("session");
      $cur_user = $CI->session->userdata("testuser_id");
        
        if (!isset($cur_user) && $cur_user == null) {
           if($pos != "R")
           {
            redirect("register");
            exit;
           } 
        }
        else
        {
            $CI->load->model('UsertestModel');
            $usdata = $CI->UsertestModel->get_userstatus($cur_user);
            $ustatus = $usdata->test_status;
          if($ustatus == "I")
            {
                if($pos != "I")
               {
                  redirect("information");
                    exit;
               }
            }
            else if($ustatus == "F" || $ustatus == "S")
            {
                if($pos != "UT")
               {
                redirect("usertest");
                exit;
                }
            }
            else if($ustatus == "SU")
            {
                redirect("survey");
                exit;
            }
            else if($ustatus == "C")
            {
                redirect("success");
                exit;
            }
            
        }
}
    
 }
 ?>