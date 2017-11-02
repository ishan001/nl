<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pk extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->is_logged_in();
        $this->load->model('pk_model');
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
        $menu_ids = array("pk","all_pk");
        $data['menu_ids'] = $menu_ids;        
        $data['title'] = ".:: Manager's Coaching Log - All PK ";
        $data['results'] = $this->pk_model->getAllPK();
        $this->load->view("template/header",$data);
        $this->load->view("template/left_menu");
        $this->load->view('all_pk',$data);
        $this->load->view("template/footer",$data);
    }
    public function new_pk()
    {
        $menu_ids = array("pk","new_pk");
        $data['menu_ids'] = $menu_ids;
        $data['staff'] = $this->staff_model->getActiveStaff();
        $data['title'] = ".:: Manager's Coaching Log - Add New PK ";
        $this->load->view("template/header",$data);
        $this->load->view("template/left_menu");
        $this->load->view('add_pk',$data);
        $this->load->view("template/footer",$data);        
    }
    public  function create()
    {
        $data = array(
        'branch_id' => $this->session->userdata('branch_id'),    
        'pk_title' => $this->input->post('pk_title'),
        'date' => $this->input->post('date'),        
        'created' => time(),
        'modified' => time()
        );
        $pk_id = $this->pk_model->createPK($data);
        if($pk_id)
        {
            $data2 = array();
            foreach($this->input->post('staff_id') AS $s_id)
            {
                $data2[] = array(
                            'branch_id' => $this->session->userdata('branch_id'),    
                            'pk_id' => $pk_id,
                            'staff_id' => $s_id,
                            'created' => time(),
                            'modified' => time()
                        );
            }     
            if($this->pk_model->createPKStaff($data2))
            {
                echo "ok";
                exit();
            }
        }
        else
        {
            echo "no";
            exit();			
        }
    }
    public function edit()
    {
        $menu_ids = array("pk","all_pk");
        $data['menu_ids'] = $menu_ids;
        $id = $this->uri->segment(3); 
        $data['row'] = $this->pk_model->getPK($id); 
        $data['staff'] = $this->staff_model->getActiveStaff();
        $data['pk_staff'] = $this->pk_model->getPKStaff($id); 
        $data['title'] = ".:: Manager's Coaching Log - Edit PK "; 
        $this->load->view("template/header",$data);
        $this->load->view("template/left_menu");
        $this->load->view('edit_pk',$data);
        $this->load->view("template/footer",$data);       
    }
    public function update()
    {
	$data = array( 
        'pk_title' => $this->input->post('pk_title'),
        'date' => $this->input->post('date'),        
        'modified' => time()
        );
        $id = $this->input->post('id');
        if($this->pk_model->updatePK($data,$id))
        {
            $data2 = array();
            foreach($this->input->post('staff_id') AS $s_id)
            {
                $data2[] = array(
                            'branch_id' => $this->session->userdata('branch_id'),    
                            'pk_id' => $id,
                            'staff_id' => $s_id,
                            'created' => time(),
                            'modified' => time()
                        );
            }
            $this->pk_model->deletePKStaff($id);
            if($this->pk_model->createPKStaff($data2))
            {
                echo "ok";
                exit();
            }
        }
        else
        {
            echo "no";
            exit();			
        }       
    }
}