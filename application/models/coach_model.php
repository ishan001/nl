<?php

class Coach_model extends CI_Model {  
    
    public function createCoaching($data)
    {
         // Inserting in Table(coaching)
        $query = $this->db->insert('coaching', $data);
        return $query;       
    }
    public function getUserCoach($id)
    {
        $query = $this->db->order_by('coaching_date', 'DESC')->get_where('coaching', array('staff_id' => $id));
        return $query->result();
    }
    public function getUserDetails($id)
    {
        $query = $this->db->get_where('staff', array('id' => $id));
        return $query->row();      
    }
    public function getLogDetails($id)
    {
        $query = $this->db->get_where('coaching', array('id' => $id));
        return $query->row();         
    }
    public function updateCoaching($data,$id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('coaching', $data); 
        return $query;
    }
    public function getAllLogs()
    {
	$days =strtotime("-50 day");
        $this->db->select('c.*,s.lname,s.fname,st.color');
        $this->db->from('coaching AS c');
        $this->db->join('staff AS s', 'c.staff_id = s.id');
        $this->db->join('staff_types AS st', 's.staff_type = st.id');
        $this->db->where('c.branch_id', $this->session->userdata('branch_id'));
	$this->db->where('c.modified >=', $days);
        $this->db->limit(68);
        $query = $this->db->order_by('c.coaching_date', 'DESC')->get();
        return $query->result();       
    }

    
    
}
