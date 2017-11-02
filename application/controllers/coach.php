<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coach extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->is_logged_in();
        $this->load->model('staff_model');
        $this->load->model('coach_model');
    }
    public function is_logged_in()
    {
        if ($this->session->userdata('is_logged_in') == FALSE)
        { 
             redirect(base_url("login"));
        }
    }
    public function add()
    {
        $menu_ids = array("coaching","new_coaching");
        $data['menu_ids'] = $menu_ids;        
        $data['staff'] = $this->staff_model->getActiveStaff();
        $data['title'] = ".:: Manager's Coaching Log - Add New Coaching ";
        $this->load->view("template/header",$data);
        $this->load->view("template/left_menu");
        $this->load->view('add_coach');
        $this->load->view("template/footer",$data); 
    }
    public function create()
    {
        $data = array(
        'branch_id' => $this->session->userdata('branch_id'), 
        'staff_id' => $this->input->post('staff_id'),
        'coaching_date' => $this->input->post('coaching_date'),
        'details' => $this->input->post('details'),
        'created' => time(),
        'modified' => time()    
        );
        if($this->coach_model->createCoaching($data))
        {
            echo "ok";
            exit();
        }
        else
        {
            echo "no";
            exit();			
        }
    }
    public function log_user_view()
    {
        $menu_ids = array("coaching");
        $data['menu_ids'] = $menu_ids;
        $id = $this->uri->segment(3);   
        $data['user_log'] = $this->coach_model->getUserCoach($id);
        $data['user_det'] = $this->coach_model->getUserDetails($id);
        $data['title'] = ".:: Manager's Coaching Log - Coaching Log ";
        $this->load->view("template/header",$data);
        $this->load->view("template/left_menu");
        $this->load->view('log_user');
        $this->load->view("template/footer",$data);       
    }
    public function log_detail()
    {
        $menu_ids = array("coaching");
        $data['menu_ids'] = $menu_ids;
        $id = $this->uri->segment(3);   
        $log_details = $this->coach_model->getLogDetails($id);
        $data['log_details'] = $log_details;
        $data['user_det'] = $this->coach_model->getUserDetails($log_details->staff_id);
        $data['title'] = ".:: Manager's Coaching Log - Coaching Log Details ";
        $this->load->view("template/header",$data);
        $this->load->view("template/left_menu");
        $this->load->view('log_details');
        $this->load->view("template/footer",$data);        
    }
    public function edit()
    {
        $data['staff'] = $this->staff_model->getAll();
        $menu_ids = array("coaching");
        $data['menu_ids'] = $menu_ids;
        $id = $this->uri->segment(3);       
        $data['row'] = $this->coach_model->getLogDetails($id); 
        $data['title'] = ".:: Manager's Coaching Log - Edit Coaching Log "; 
        $this->load->view("template/header",$data);
        $this->load->view("template/left_menu");
        $this->load->view('edit_coach',$data);
        $this->load->view("template/footer",$data);       
    }
    public function update()
    {
        $data = array(
        'staff_id' => $this->input->post('staff_id'),
        'coaching_date' => $this->input->post('coaching_date'),
        'details' => $this->input->post('details'),
        'modified' => time()
        );
        $id = $this->input->post('id');
        if($this->coach_model->updateCoaching($data,$id))
        {
            echo "ok";
            exit();
        }
        else
        {
            echo "no";
            exit();			
        }
    }
    public function all_logs()
    {
        $menu_ids = array("coaching","all_logs");
        $data['menu_ids'] = $menu_ids;
        $data['logs'] = $this->coach_model->getAllLogs();
        $data['title'] = ".:: Manager's Coaching Log - Coaching All Logs ";
        $this->load->view("template/header",$data);
        $this->load->view("template/left_menu");
        $this->load->view('all_logs');
        $this->load->view("template/footer",$data);         
    }
    public function all_logs_calender()
    {
        $menu_ids = array("coaching","all_logs_calender");
        $data['menu_ids'] = $menu_ids;
        $data['logs'] = $this->coach_model->getAllLogs();
        $data['title'] = ".:: Manager's Coaching Log - Coaching All Logs ";
        $this->load->view("template/header",$data);
        $this->load->view("template/left_menu");
        $this->load->view('all_logs_calender');
        $this->load->view("template/footer",$data);         
    }
    public function cal_user_view()
    {
        $menu_ids = array("coaching","all_logs_calender");
        $data['menu_ids'] = $menu_ids;
        $id = $this->uri->segment(3);   
        $data['user_log'] = $this->coach_model->getUserCoach($id);
        $data['user_det'] = $this->coach_model->getUserDetails($id);
        $data['title'] = ".:: Manager's Coaching Log - Coaching Log  ";
        $this->load->view("template/header",$data);
        $this->load->view("template/left_menu");
        $this->load->view('calender_user_view');
        $this->load->view("template/footer",$data);          
    }

}