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
    
    function get_parent_type()
    {
        $this->db->select('*');
        $result = $this->db->get_where('question_type',array('parent_id'=>0))->result();
        return $result;
    }
    
    function get_sub_type($parent_id)
    {
        $this->db->select('*');
        $result = $this->db->get_where('question_type',array('parent_id'=>$parent_id))->result();
        return $result;
    }
    
 
}
?>