<?php

class Login_model extends CI_Model {

	public function validate()
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('users');
		
		if($query->num_rows == 1)
		{
			return true;
		}
                else
                {
                    return false;
                }
		
	}
        public function getLoggedUserDetails()
        {
            $query = $this->db->get_where('users', array('username' => $this->input->post('username')));
            return $query->row();   
        }

}