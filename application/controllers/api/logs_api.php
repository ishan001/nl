<?php
require APPPATH.'/libraries/REST_Controller.php';

class Logs_api extends REST_Controller
{
    function __construct()
    {
        // Construct our parent class
        parent::__construct();
        
        // Configure limits on our controller methods. Ensure
        // you have created the 'limits' table and enabled 'limits'
        // within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; //500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; //100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; //50 requests per hour per user/key
        $this->load->model('api_model');
    }
    
    function get_updates_get()
    {
        $branch_id = $this->get('branch');
        $timestamp = $this->get('timestamp');
        $main_ary = "";
        if($timestamp==0)
        {
            $staff = $this->api_model->all_staff($branch_id);
            $main_ary['insert']['staff'] = $staff;
            $coach = $this->api_model->all_coaching($branch_id);
            $main_ary['insert']['coach'] = $coach;
        }
        else
        {
            
        }
        $this->response($main_ary, 200);
    }
    function all_staff_get()
    {
        if(!$this->get('branch_id'))
        {
        	$this->response(NULL, 400);
        }
        $b_id = $this->get('branch_id');
        $res = $this->api_model->all_staff($b_id);

        if($res)
        {
            $this->response($res, 200); // 200 being the HTTP response code
        }
        else
        {
            $this->response(array('error' => 'Staff could not be found'), 404);
        }
   
    }
}