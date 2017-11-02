<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->is_logged_in();
    }
    public function is_logged_in()
    {
        if ($this->session->userdata('is_logged_in') == FALSE)
        { 
             redirect(base_url("login"));
        }
    }
    public function index()
    {
        $menu_ids = array("dashboard");
        $data['menu_ids'] = $menu_ids;
        $this->load->model('coach_model');  
        $data['logs'] = $this->coach_model->getAllLogs();
        $data['title'] = ".:: Manager's Coaching Log - Dashboard ";
        $this->load->view("template/header",$data);
        $this->load->view("template/left_menu");
        $this->load->view('dashboard');
        $this->load->view("template/footer",$data);
        
    }
    
}