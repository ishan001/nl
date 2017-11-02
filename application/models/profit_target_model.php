<?php

class Profit_target_model extends CI_Model {  
    
    public function createCoaching($data)
    {
         // Inserting in Table(coaching)
        $query = $this->db->insert('coaching', $data);
        return $query;       
    }
    public function getStafffTarget($staff_id)
    {
        $query = $this->db->get_where('profit_targets', array('staff_id' => $staff_id));
        return $query->row(); 
    }
    public function createStaffTarget($data)
    {
         // Inserting in Table(coaching)
        $query = $this->db->insert('profit_targets', $data);
        return $query;       
    }
    public function updateProfitTarget($data,$staff_id)
    { 
        $this->db->where('staff_id', $staff_id);
        $query = $this->db->update('profit_targets', $data); 
        return $query;
    }
    public function getAllSalesTargets()
    {
        $this->db->select('pt.*,s.lname,s.fname,s.sales_id,s.working_days');
        $this->db->from('staff AS s');
        $this->db->join('profit_targets AS pt', 's.id = pt.staff_id', 'left');
        $this->db->where('s.branch_id', $this->session->userdata('branch_id'));
        $this->db->where('s.active', '1');
        $query = $this->db->order_by('pt.current_profit', 'DESC')->get();
        return $query->result();  
    }
}