<?php 
class QuestionModel extends CI_Model{
        
    function __construct() {
    parent::__construct();
    }
        
    function insert($data){
    $this->db->insert('question_bank', $data);
    }
    
    function get_all()
    {
        $this->db->select('*');
        $this->db->from('question_bank');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    function get_single($qid)
    {
        $this->db->select('*');
        $res = $this->db->get_where('question_bank',array('id'=>$qid))->result();
        if(!$res) {
             return false;
        }
        $result = $res[0];
        $result->typename = $this->get_questiontype($result->type);
        $result->subtypename = $this->get_questiontype($result->subtype);
        return $result;
    }
    
    function get_questiontype($id)
    {
        $this->db->select('type');
        $this->db->from('question_type');
        $query = $this->db->get();
        $result = $query->row();
        return $result->type;
    }
}
?>