<?php

class Pk_model extends CI_Model {  
    
    public function  createPK($data)
    {
        $this->db->insert('pk', $data);        
        return $this->db->insert_id();
    }
    public function  createPKStaff($data)
    {
        $query = $this->db->insert_batch('pk_staff', $data);        
        return $query;
    }
    public function getPK($id)
    {
        $query = $this->db->get_where('pk', array('id' => $id));
        return $query->row();
    }
    public function getPKStaff($id)
    {
        $query = $this->db->get_where('pk_staff', array('pk_id' => $id));
        return $query->result();
    }
    public function updatePK($data,$id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('pk', $data); 
        return $query;
    }
    public function deletePKStaff($id)
    {
        $this->db->delete('pk_staff', array('pk_id' => $id)); 
    }
    public function getAllPK()
    {
        $query = $this->db->order_by('date', 'ASC')->get_where('pk', array('branch_id' =>$this->session->userdata('branch_id')));
        return $query->result();
    }
    
    
    
}