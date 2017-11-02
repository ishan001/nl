<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends CI_Controller {
    
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
        $menu_ids = array("staff","all_staff");
        $data['menu_ids'] = $menu_ids;        
        $data['title'] = ".:: Manager's Coaching Log - All Staff ";
        $data['results'] = $this->staff_model->getAll();
        $this->load->view("template/header",$data);
        $this->load->view("template/left_menu");
        $this->load->view('all_staff',$data);
        $this->load->view("template/footer",$data);
    }
    public function new_staff()
    {
        $this->session->set_flashdata('user_prof_img', '');
        $menu_ids = array("staff","new_staff");
        $data['menu_ids'] = $menu_ids;
        $data['staff_types'] = $this->staff_model->getStaffTypes();
        $data['title'] = ".:: Manager's Coaching Log - Add New Staff ";
        $this->load->view("template/header",$data);
        $this->load->view("template/left_menu");
        $this->load->view('add_staff');
        $this->load->view("template/footer",$data);        
    }
    public function edit()
    {
        $this->session->set_flashdata('user_prof_img', '');
        $menu_ids = array("staff","all_staff");
        $data['menu_ids'] = $menu_ids;
        $id = $this->uri->segment(3); 
        $data['staff_types'] = $this->staff_model->getStaffTypes();
        $data['row'] = $this->staff_model->getStaff($id); 
        $data['title'] = ".:: Manager's Coaching Log - Edit Staff "; 
        $this->load->view("template/header",$data);
        $this->load->view("template/left_menu");
        $this->load->view('edit_staff',$data);
        $this->load->view("template/footer",$data);       
    }
    public  function create()
    {
	// Setting Values For Tabel Columns
        $data = array(
        'branch_id' => $this->session->userdata('branch_id'),    
        'fname' => $this->input->post('fname'),
        'lname' => $this->input->post('lname'),
        'sales_id' => $this->input->post('sales_id'),
        'staff_type' => $this->input->post('staff_type'),
        'working_days' => $this->input->post('working_days'),
        'profile_picture' => $this->session->flashdata('user_prof_img'),
        'active' => '1' ,
        'created' => time(),
        'modified' => time()
        );
        if($this->staff_model->createStaff($data))
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
    public function update()
    {
	// Setting Values For Tabel Columns
        $data = array(
        'fname' => $this->input->post('fname'),
        'lname' => $this->input->post('lname'),
        'sales_id' => $this->input->post('sales_id'),
        'staff_type' => $this->input->post('staff_type'),
        'working_days' => $this->input->post('working_days'),
        'profile_picture' => $this->session->flashdata('user_prof_img'),
        'modified' => time()   
        );
        $id = $this->input->post('id');
        if($this->staff_model->updateStaff($data,$id))
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
    public function active_inactive()
    {
        $id = $this->uri->segment(3);
        $active_data = $this->uri->segment(4);
        $data = array(
        'active' => $active_data
        );
        
        if($this->staff_model->activeInactiveStaff($data,$id))
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
    public function upload()
    {
        $target_file = "profile_pictures/".basename($_FILES["profile_picture"]["name"]);
        move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file);  
        $this->session->set_flashdata('user_prof_img', $_FILES["profile_picture"]["name"]);
    }
    public  function profile()
    {
        $this->load->model('profit_target_model'); 
        $menu_ids = array("staff","all_staff");
        $data['menu_ids'] = $menu_ids;
        $id = $this->uri->segment(3); 
        $row = $this->staff_model->getStaff($id);
        $data['row'] =  $row;
        $data['staff_type'] = $this->staff_model->getStaffType($row->staff_type);
        $profit= $this->profit_target_model->getStafffTarget($row->id);
        if(!$profit)
        {
            $profit = (object) array('target_profit' => '0','current_profit'=>'0');
        }
         $data['profit']  = $profit ;

        $data['title'] = ".:: Manager's Coaching Log - Profile "; 
        $this->load->view("template/header",$data);
        $this->load->view("template/left_menu");
        $this->load->view('profile',$data);
        $this->load->view("template/footer",$data);      
    }
}