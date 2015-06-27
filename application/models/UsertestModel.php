<?php

class UsertestModel extends CI_Model {
  
   function __construct() {
    parent::__construct();
    }
    
  function get_question($qid)
  {
    $qdata = $this->db->get_where('question_bank',array('id'=>$qid))->result();
    return $qdata[0];
  }
  function save_ans($temp_data)
  {
    $this->db->insert('temp_result', $temp_data);
  }
  
  function set_user($data)
  {
    $this -> db -> select('id, email');
       $this -> db -> from('test_user');
       $this -> db -> where('email', $data['email']);
       $this -> db -> limit(1);
     
       $query = $this -> db -> get();
     
       if($query -> num_rows() == 1)
       {
        $resdata['status'] = "EXIST";
       $resdata['id'] = $data['id'];
         return $resdata;
       }
       else
       {
        
         $this->db->insert('test_user', $data);
         $resdata['status'] = "SUCCESS";
         $resdata['id'] = $this->db->insert_id();
         return $resdata;
       }
  }
  
  function set_testuser_status($data)
  {
     $this -> db -> select('id, user_id');
       $this -> db -> from('testuser_status');
       $this -> db -> where('user_id', $data['id']);
       $this -> db -> limit(1);
       $query = $this -> db -> get();
     
       if($query -> num_rows() == 1)
       {
          $this->db->where('user_id',  $data['id']);
          $this->db->update("testuser_status",$data);
       }
       else
       {
        $this->db->insert("testuser_status",$data);
       }
  }
     
    
  function get_userstatus($user_id)
  {
        $res = $this->db->get_where("testuser_status",array('user_id' =>$user_id))->result();
        return $res[0];
  }
  
  function update_test_status($user_id,$data)
  {
    $this->db->where('user_id',  $user_id);
     $this->db->update("testuser_status",$data);
  }
    
 function get_nextQuestion($test_type="test_type1", $current_qid = 0)
 {
  
        $this->db->select('*');
        $res = $this->db->get_where('meta_info',array('key'=>$test_type))->result();
        if(!$res) {
             return false;
        }
      $test_no = $res[0]->value;
       $allque =  $this->db->get_where('test',array('id'=>$test_no))->result();
       $queset = json_decode($allque[0]->question_data);
       
       
       
       if(!isset($current_qid) || $current_qid == 0)
       {
            $nkey = 0;
       }
       else
       {
        $nkey = array_search($current_qid,$queset);
          $nkey  = $nkey + 1;
       }
     
     if(array_key_exists($nkey,$queset))
     {
        $next_que_id = $queset[$nkey];
  
  
       $qdata = $this->db->get_where('question_bank',array('id'=>$next_que_id))->result();
        $qdata[0]->index = $nkey;
         return $qdata[0];
     }
     else
     {
        return "NO";
     }
 }
}
?>