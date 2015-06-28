<?php
class ExamModel extends CI_Model{
        
    function __construct() {
    parent::__construct();
    }
    
    function insert($data){
    $this->db->insert('test', $data);
    }
   
    
    function insert_type1($data){
        
        $indata = array('name'=>$data['name'],
                        'test_type' => $data['test_type']);
        
        $this->db->insert('test', $indata);
        $lid =  $this->db->insert_id();
        
        foreach($data['question_data'] as $sdata)
        {
           $this -> db -> select('tid, qid');
           $this -> db -> from('test_questiondata');
           $whr = array('tid'=>$lid,'qid'=>$sdata['qid']);
           $this -> db -> where($whr);
           $this -> db -> limit(1);
           $query = $this -> db -> get();
         
           if($query ->num_rows() == 1)
           {
              $tsdata = array('difficulty'=>$sdata['difficulty']);
              $this -> db -> where($whr);
              $this->db->update('test_questiondata', $tsdata);
           }
           else
           {
                $tsdata = array('tid' => $lid, 
                                'qid'=>$sdata['qid'],
                                'difficulty'=>$sdata['difficulty']);
                $this->db->insert('test_questiondata', $tsdata);
           }
        }
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
        $this->db->select('*');
        $this->db->where(array("tid"=>$tid));
        $this->db->from("test_questiondata");
        $query = $this->db->get();
        $result = $query->result();
        $res[0]->question_data = $result;
        
        return $res[0];
    }
    function update_test($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('test', $data); 
        return true;
    }
    function update_type1($test_id,$data)
    {
        $updata = array('name'=>$data['name'],
                        'test_type' => $data['test_type']);
        $this->db->where('id', $test_id);
        $this->db->update('test', $updata); 
        
        //find diffrence to delete old data
        foreach($data['question_data'] as $sdata)
        {
            $new_que[] =$sdata['qid'];
        }
        
        $this->db->select("qid");
        $this->db->where(array("tid"=>$test_id));
        $this->db->from("test_questiondata");
        $res = $this->db->get();
        $result = $res->result();
        foreach($result as $ext)
        {
            $existing[] = $ext->qid;
        }
        $diff = array_diff($existing,$new_que);
     
        foreach($diff as $sindif)
        {
            $this->db->where(array('tid'=>$test_id,"qid"=>$sindif));
            $this->db->delete('test_questiondata');
        }
        foreach($data['question_data'] as $sdata)
        {
           $this -> db -> select('tid, qid');
           $this -> db -> from('test_questiondata');
           $whr = array('tid'=>$test_id,'qid'=>$sdata['qid']);
           $this -> db -> where($whr);
           $this -> db -> limit(1);
           $query = $this -> db -> get();
         
           if($query ->num_rows() == 1)
           {
            $tsdata = array('difficulty'=>$sdata['difficulty']);
              $this -> db -> where($whr);
              $this->db->update('test_questiondata', $tsdata);
           }
           else
           {
             $tsdata = array('tid' => $test_id, 
                                'qid'=>$sdata['qid'],
                                'difficulty'=>$sdata['difficulty']);
                $this->db->insert('test_questiondata', $tsdata);
           }
        }
     }
    function row_delete($tid)
    {
        $this->db->where('id', $tid);
        $this->db->delete('test');
          $this->db->where('tid', $tid);
        $this->db->delete('test_questiondata');
        
    }

    function insert_status($data)
    {
        $this->db->where('key', "test_type1");
        $this->db->update('meta_info', array("value"=>$data[0]));
        $this->db->where('key', "test_type2");
        $this->db->update('meta_info', array("value"=>$data[1]));
     }
     
     
     
    function update_meta($key,$value)
    {
        
        $data = array('key'=>$key,'value'=>$value);
         $res = $this->db->get_where('meta_info', array('key'=>$key));
      if( $res->num_rows() > 0 ) 
       {
            $this->db->where('key', $key);
            $this->db->update('meta_info',$data);
     }
     else
     {
          $this->db->insert('meta_info',$data);
     }
    }

    function get_meta($key)
    {

        $this->db->select('*');
        $res = $this->db->get_where('meta_info',array('key'=>$key))->result();
        if(!$res) {
             return false;
        }
        return $res[0]->value;
    }
}

