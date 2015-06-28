<?php
class Test_model extends CI_Model{
        
    function __construct() {
    parent::__construct();
    }
    
    function insert($data){
    $this->db->insert('question_bank', $data);
    }



    function get_question()
    {
       $this->db->select('*');
        $this->db->from('question_bank');
        $query = $this->db->get();
        $data = $query->result();
        foreach($data as $res)
        {
           
           $result[] = $res;  
        }
        if(!empty($result))
       	return $result;
       else
       return false;
    }
    
}

