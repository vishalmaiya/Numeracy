<?php 
class QuestionTypeModel extends CI_Model{
        
    function __construct() {
    parent::__construct();
    }
        
    function insert($data){
    $this->db->insert('question_type', $data);
    }
    
    function get_all()
    {
        $this->db->select('*');
        $this->db->from('question_type');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}
?>