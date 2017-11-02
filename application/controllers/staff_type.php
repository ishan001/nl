<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff_type extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->is_logged_in();
        $this->load->model('staff_model');
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
        $menu_ids = array("config","staff_type","all_staff_types");
        $data['menu_ids'] = $menu_ids;        
        $data['title'] = ".:: Manager's Coaching Log - All Staff Types";
        $data['results'] = $this->staff_model->getAllStaffTypes();
        $this->load->view("template/header",$data);
        $this->load->view("template/left_menu");
        $this->load->view('all_staff_types',$data);
        $this->load->view("template/footer",$data);
    }
    public function add()
    {
        $menu_ids = array("config","staff_type","add_staff_type");
        $data['menu_ids'] = $menu_ids;        
        $data['title'] = ".:: Manager's Coaching Log - Add New Staff Type ";
        $this->load->view("template/header",$data);
        $this->load->view("template/left_menu");
        $this->load->view('add_staff_type');
        $this->load->view("template/footer",$data); 
    }
    public function create()
    {
        $data = array(
        'branch_id' => $this->session->userdata('branch_id'), 
        'type' => $this->input->post('type'),
        'color' => $this->input->post('color'),
        'created' => time(),
        'modified' => time()    
        );
        if($this->staff_model->createStaffType($data))
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
    public function edit()
    {
        $menu_ids = array("config","staff_type","all_staff_types");
        $data['menu_ids'] = $menu_ids;
        $id = $this->uri->segment(3); 
        $data['row'] = $this->staff_model->getStaffType($id); 
        $data['title'] = ".:: Manager's Coaching Log - Edit Staff Types "; 
        $this->load->view("template/header",$data);
        $this->load->view("template/left_menu");
        $this->load->view('edit_staff_type',$data);
        $this->load->view("template/footer",$data);       
    }
    public function update()
    {
	// Setting Values For Tabel Columns
        $data = array(
        'type' => $this->input->post('type'),
        'color' => $this->input->post('color'),
        'modified' => time()    
        );
        $id = $this->input->post('id');
        if($this->staff_model->updateStaffType($data,$id))
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
}
