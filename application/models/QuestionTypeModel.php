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
        function row_delete($qid)
    {
        $this->db->where('id', $qid);
        $this->db->delete('question_type'); 
    }
    
    function get_single($id)
    {
        $this->db->select('*');
        $result = $this->db->get_where('question_type',array('id'=>$id))->result();
        return $result;
    }
    function get_editrecord($id)
    {
        $this->db->select('*');
        $result = $this->db->get_where('question_type',array('id'=>$id))->result();
        if(isset($result[0]->parent_id) && $result[0]->parent_id == 0)
        {
            //this is child
            $childs = $this->get_sub_type($result[0]->id);
            $res['parent'] = $result[0]->id;
            $res['child'] = $childs;
        }
        else
        {
            $childs = $this->get_sub_type($result[0]->parent_id);
            $res['parent'] = $result[0]->parent_id;
            $res['child'] = $childs;
        }
        return $res;
    }
    
    function update_type($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('question_type', $data); 
        return true;
    }
 
}
?>