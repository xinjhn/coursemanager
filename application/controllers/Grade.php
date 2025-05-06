<?php

class Grade extends CI_Controller
{
    private $_layout;
    
    public function __construct()
    {
        parent::__construct();
        $this->_layout = 'layout';
        $this->load->model('Grade_model');
        
        if(! $this->ion_auth->logged_in())
        {
            $this->session->set_flashdata('msg', 'Please log in to proceed');
            redirect(site_url(), 'refresh');
        }
    }
    
    public function index()
    {
        $data['content'] = 'grade/index';
        $data['grades'] = $this->Grade_model->get_all();
        $this->load->view($this->_layout, $data);
    }
    
    public function create()
    {
        $this->form_validation->set_rules($this->Grade_model->rules);
        
        if($this->form_validation->run() == TRUE)
        {
            $data = [
                'grade_letter'  => $this->input->post('grade_letter'),
                'grade_point'   => $this->input->post('grade_point'),
            ];
            
            $r = $this->Grade_model->insert($data);
            ($r == true) ? $this->session->set_flashdata('msg', 'New policy added') : $this->session->set_flashdata('msg', $r);
        }

        else
        {
            $this->session->set_flashdata('msg', validation_errors());
        }

        redirect('grade', 'refresh');
    }
    
    public function delete()
    {
        $grade = $this->Grade_model->get($this->uri->segment(3));
        
        if(count($grade) > 0)
        {
            $this->Grade_model->delete($grade->id);
            $this->session->set_flashdata('msg', 'Policy has been deleted');
            redirect('grade', 'refresh');
        }
        
        else
        {
            $this->session->set_flashdata('msg', 'Unable to delete policy');
            redirect('grade', 'refresh');
        }
    }
}