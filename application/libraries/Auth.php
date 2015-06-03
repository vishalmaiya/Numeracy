<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth{

 function Auth()
 {
     $CI =& get_instance();

     //load libraries
     $CI->load->database();
     $CI->load->library("session");
 }

 function get_userdata()
 {
     $CI =& get_instance();

     if( ! $this->logged_in())
     {
         return false;
     }
     else
     {
          $query = $CI->db->get_where("admin_user", array("id" => $CI->session->userdata("user_id")));
          return $query->row();
     }
 }

 function logged_in()
 {
     $CI =& get_instance();
     return ($CI->session->userdata("logged_in")) ? true : false;
 }

 function login($username, $password)
 {
     $CI =& get_instance();

     $data = array(
         "username" => $username,
         //"password" => sha1($password)
         "password" => $password
     );
    
     $query = $CI->db->get_where("admin_user", $data);

     if($query->num_rows() !== 1)
     {
         /* their username and password combination
         * were not found in the databse */
        // $this->form_validation->set_message('check_database', 'Invalid username or password');
         return false;
     }
     else
     {
         //update the last login time
         $last_login = date("Y-m-d H:i:s");

         $data = array(
             "last_login" => $last_login
         );

         $CI->db->update("admin_user", $data);

         //store user id in the session
         $sess_array = array(
         'user_id' =>  $query->row()->id,
         'username' =>  $query->row()->username,
         );
       $CI->session->set_userdata('logged_in', $sess_array);
       return true;
   }
  }
 

 function logout()
 {
     $CI =& get_instance();
     $CI->session->unset_userdata("user_id");
 }

 function register($username, $password)
 {
     $CI =& get_instance();

     //ensure the email is unique
     if($this->can_register($username))
     {
         $data = array(
             "username" => $username,
             "password" => sha1($password)
         );

         $CI->db->insert("admin_user", $data);

         return true;
     }

     return false;
 }

 function can_register($username)
 {
     $CI =& get_instance();

     $query = $CI->db->get_where("admin_user", array("username" => $username));

     return ($query->num_rows() < 1) ? true : false;
 }
}
?>