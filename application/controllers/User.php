<?php

class User extends CI_Controller
{
    private $_layout;
    
    public function __construct()
    {
        parent::__construct();
        $this->_layout = 'layout';
        
        if(! $this->ion_auth->logged_in())
        {
            $this->session->set_flashdata('msg', 'Please log in to proceed');
            redirect(site_url(), 'refresh');
        }

        $this->load->model('Course_model');
        $this->load->model('User_model');
    }
    
    public function index()
    {
        $data['content']='user/index';
        $data['user'] = $this->User_model->get($this->session->userdata('user_id'));
        $this->load->view($this->_layout, $data);
    }
}