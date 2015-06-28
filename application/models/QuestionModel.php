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
        $data = $query->result();
        foreach($data as $res)
        {
           $type_name =  $this->get_questiontype($res->type);
           if(isset($type_name))
           {
                $res->type_name = $type_name;
           }
           $subtype_name =  $this->get_questiontype($res->subtype);
           if(isset($subtype_name))
           {
                $res->subtype_name = $subtype_name;
           }
           
          //$this->get_questiontype($res->subtype);
           $result[] = $res;  
        }
        if(!empty($result))
       return $result;
       else
       return false;
    }
    function get_selected($sid)
    {
        $this->db->select('*');
        $this->db->from('question_bank');
        $this->db->where(array('subtype' => $sid ));
        $query = $this->db->get();
        $data = $query->result();
        foreach($data as $res)
        {
           $type_name =  $this->get_questiontype($res->type);
           if(isset($type_name))
           {
                $res->type_name = $type_name;
           }
           $subtype_name =  $this->get_questiontype($res->subtype);
           if(isset($subtype_name))
           {
                $res->subtype_name = $subtype_name;
           }
               $this->db->select('*');
           $this->db->from('test_questiondata');
           $this->db->where('qid',$res->id);
           $query = $this->db->get();
           $testres = $query->result();
           
           
          // $this->db->select('*');
//           $this->db->from('test');
//           $query = $this->db->get();
//           $testres = $query->result();
        if(!empty($testres))
           {
                foreach($testres as $test)
                {   
                    $this->db->select('*');
                    $testname = $this->db->get_where("test",array('id'=>$test->tid))->result();
                   
                    if(isset($testname[0]->name))
                    {
                         $tname =  $testname[0]->name;                        
                       $test_names[] = array("test_id"=>$test->tid,"test_name"=>$tname,'test_type'=>$testname[0]->test_type);  
                       
                    }
                    else
                    {
                        $test_names = "";
                    }
                    
           
                    
                }
                
                 $res->tests = $test_names;
                 $test_names = '';
            }
           
          //$this->get_questiontype($res->subtype);
           $result[] = $res;  
        }
        if(!empty($result))
       return $result;
       else
       return false;
    }
    
   
    function get_all_withexam()
    {
        $this->db->select('*');
        $this->db->from('question_bank');
        $query = $this->db->get();
        $data = $query->result();
        foreach($data as $res)
        {
           $type_name =  $this->get_questiontype($res->type);
           if(isset($type_name))
           {
                $res->type_name = $type_name;
           }
           $subtype_name =  $this->get_questiontype($res->subtype);
           if(isset($subtype_name))
           {
                $res->subtype_name = $subtype_name;
           }
           $this->db->select('*');
           $this->db->from('test_questiondata');
           $this->db->where('qid',$res->id);
           $query = $this->db->get();
           $testres = $query->result();
           
           
          // $this->db->select('*');
//           $this->db->from('test');
//           $query = $this->db->get();
//           $testres = $query->result();
        if(!empty($testres))
           {
                foreach($testres as $test)
                {   
                    $this->db->select('*');
                    $testname = $this->db->get_where("test",array('id'=>$test->tid))->result();
                   
                    if(isset($testname[0]->name))
                    {
                         $tname =  $testname[0]->name;                        
                       $test_names[] = array("test_id"=>$test->tid,"test_name"=>$tname,'test_type'=>$testname[0]->test_type);  
                       
                    }
                    else
                    {
                        $test_names = "";
                    }
                    
           
                    
                }
                
                 $res->tests = $test_names;
                 $test_names = '';
            }
          //$this->get_questiontype($res->subtype);
           $result[] = $res;  
        }
        if(!empty($result))
       return $result;
       else
       return false;
    }
    
    function get_single($qid)
    {
        $this->db->select('*');
        $res = $this->db->get_where('question_bank',array('id'=>$qid))->result();
        if(!$res) {
             return false;
        }
        $result = $res[0];
        $type_name =  $this->get_questiontype($result->type);
           if(isset($type_name))
           {
                $result->typename = $type_name;
           }
         $subtype_name =  $this->get_questiontype($result->subtype);
           if(isset($subtype_name))
           {
                $result->subtypename = $subtype_name;
           }
        return $result;
    }
        
    function get_questiontype($id)
    {
        $this->db->select('type');
        $this->db->from('question_type');
        $this->db->where('id',$id);
        $query = $this->db->get();
        $result = $query->row();
        if(isset($result->type))
        return $result->type;
        else
        return false;
    }
    
        
    function update_question($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('question_bank', $data); 
        return true;
    }
    
    function row_delete($qid)
    {
        $this->db->where('id', $qid);
        $this->db->delete('question_bank'); 
    }
}
?>