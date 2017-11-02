<?php

class Staff_model extends CI_Model {  
    
    public function  createStaff($data)
    {
        // Inserting in Table(staff)
        $query = $this->db->insert('staff', $data);
        return $query;
    }
    public function getAll()
    {
        $query = $this->db->order_by('fname', 'ASC')->get_where('staff', array('branch_id' =>$this->session->userdata('branch_id')));
        return $query->result();
    }
    public function getActiveStaff()
    {
        $query = $this->db->order_by('fname', 'ASC')->get_where('staff', array('branch_id' =>$this->session->userdata('branch_id'),'active'=>'1'));
        return $query->result();
    }
    public function getStaff($id)
    {
        $query = $this->db->get_where('staff', array('id' => $id));
        return $query->row();
    }
    public function updateStaff($data,$id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('staff', $data); 
        return $query;
    }
    public function activeInactiveStaff($data,$id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('staff', $data); 
        return $query;       
    }
    public function  createStaffType($data)
    {
        $query = $this->db->insert('staff_types', $data);
        return $query;
    }
    public function getStaffTypes()
    {
        $query = $this->db->order_by('type', 'ASC')->get_where('staff_types', array('branch_id' =>$this->session->userdata('branch_id')));
        return $query->result();       
    }
    public function getStaffType($id)
    {
        $query = $this->db->get_where('staff_types', array('id' => $id));
        return $query->row();
    }
    public function updateStaffType($data,$id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('staff_types', $data); 
        return $query;
    }
    public function getAllStaffTypes()
    {
        $query = $this->db->order_by('type', 'ASC')->get_where('staff_types', array('branch_id' =>$this->session->userdata('branch_id')));
        return $query->result();
    }
    
    
    

}