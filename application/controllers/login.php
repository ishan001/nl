<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function index()
    {
        $this->load->view('login');
    }
    
    function validate_credentials()
    {		
            $this->load->model('login_model');
            $query = $this->login_model->validate();            

            if($query) // if the user's credentials validated...
            {
                $userDet = $this->login_model->getLoggedUserDetails(); 
                    $data = array(
                        'username' => $this->input->post('username'),
                        'is_logged_in' => true,
                        'branch_id' => $userDet->branch_id
                    );
                    $this->session->set_userdata($data);
                    $this->load->helper('url');
                    echo "ok";
                    exit();
            }// incorrect username or password
            else 
            {
                echo "no";
                exit();
            }
    }
    function logout()
    {
            $this->session->sess_destroy();
            redirect(base_url("login"));
    }
    
}