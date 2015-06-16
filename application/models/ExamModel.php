<?php
class ExamModel extends CI_Model{
        
    function __construct() {
    parent::__construct();
    }
    
    function insert($data){
    $this->db->insert('test', $data);
    }
    
    function get_all()
    {
        $this->db->select('*');
        $this->db->from('test');
        $query = $this->db->get();
        $result = $query->result();
        if(!empty($result))
       return $result;
       else
       return false;
    }
  
    function get_single($tid)
    {
        $this->db->select('*');
        $res = $this->db->get_where('test',array('id'=>$tid))->result();
        if(!$res) {
             return false;
        }
        return $res[0];
    }
    function update_test($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('test', $data); 
        return true;
    }
    function row_delete($tid)
    {
        $this->db->where('id', $tid);
        $this->db->delete('test'); 
    }

    function insert_status($data)
    {
        $this->db->where('key', "test_type1");
        $this->db->update('meta_info', array("value"=>$data[0]));
        $this->db->where('key', "test_type2");
        $this->db->update('meta_info', array("value"=>$data[1]));




    }

    function get_meta($key)
    {

        $this->db->select('*');
        $res = $this->db->get_where('meta_info',array('key'=>$key))->result();
        if(!$res) {
             return false;
        }
        return $res[0];



    }
}

