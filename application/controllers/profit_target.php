<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profit_target extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->is_logged_in();
        $this->load->model('profit_target_model');
        $this->load->model('staff_model');
    }
    public function is_logged_in()
    {
        if ($this->session->userdata('is_logged_in') == FALSE)
        { 
             redirect(base_url("login"));
        }
    }
    public function edit()
    {
        $menu_ids = array("profit_target","update_profit_target");
        $data['menu_ids'] = $menu_ids;        
        $data['staff'] = $this->staff_model->getActiveStaff();
        $data['title'] = ".:: Manager's Coaching Log - Update Profit Targets ";
        $this->load->view("template/header",$data);
        $this->load->view("template/left_menu");
        $this->load->view('update_profit_target');
        $this->load->view("template/footer",$data); 
    }
    public function update()
    {
        $data = array(
        'current_profit' => $this->input->post('current_profit'),
        'target_profit' => $this->input->post('target_profit'),
        'modified' => time()
        );
        $staff_id = $this->input->post('staff_id');
        if($this->profit_target_model->updateProfitTarget($data,$staff_id))
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
    public function getStaffPT()
    {
        $staff_id = $this->input->post('staff_id');
        if($staff_id!="")
        {
            $row = $this->profit_target_model->getStafffTarget($staff_id);
            if($row)
            {
                echo $row->target_profit.":".$row->current_profit;                
                exit();
            }
            else 
            {
                $data = array(
                    'branch_id' => $this->session->userdata('branch_id'), 
                    'staff_id' => $staff_id,
                    'target_profit' => 0,
                    'current_profit' => 0,
                    'created' => time(),
                    'modified' => time()    
                );
                if($this->profit_target_model->createStaffTarget($data))
                {
                    echo "0:0";
                    exit();
                }
            }
        }
    }
    public function sales_targets()
    {
        $menu_ids = array("profit_target","sales_targets");
        $data['menu_ids'] = $menu_ids;        
        $data['targets'] = $this->profit_target_model->getAllSalesTargets();
        $data['title'] = ".:: Manager's Coaching Log - Sales Staff Targets  ";
        $this->load->view("template/header",$data);
        $this->load->view("template/left_menu");
        $this->load->view('sales_targets');
        $this->load->view("template/footer",$data);        
    }
    public function sales_targets_charts()
    {
        $menu_ids = array("profit_target","sales_targets_charts");
        $data['menu_ids'] = $menu_ids;        
        $data['targets'] = $this->profit_target_model->getAllSalesTargets();
        $data['title'] = ".:: Manager's Coaching Log - Sales Staff Targets  ";
        $this->load->view("template/header",$data);
        $this->load->view("template/left_menu");
        $this->load->view('sales_targets_charts');
        $this->load->view("template/footer",$data);        
    }
    
}