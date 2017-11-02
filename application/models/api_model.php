<?php

class Api_model extends CI_Model {  
    
    public function  all_staff($b_id)
    {
        $query = $this->db->get_where('staff', array('branch_id' =>$b_id));
        return $query->result();
    }
    function all_coaching($b_id)
    {
        $query = $this->db->get_where('coaching', array('branch_id' =>$b_id));
        return $query->result();
    }
    
}