<?php

class Course extends CI_Controller
{
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
        $this->load->model('Grade_model');
    }
    
    public function index()
    {
        $data['courses'] = $this->Course_model->get_where('user_id', $this->session->userdata('user_id'));
        $data['grade_list'] = $this->Grade_model->grade_list();
        $data['status_list'] = array(0 => 'Pending', 1 => 'Done');
        $data['result'] = $this->Course_model->get_result($this->session->userdata('user_id'));
        $data['content'] = 'course/index';
        $this->load->view($this->_layout, $data);
    }
    
    public function create()
    {
        $this->form_validation->set_rules($this->Course_model->rules);
        
        if($this->form_validation->run() == TRUE)
        {
            $data = [
                'user_id'       => $this->session->userdata('user_id'),
                'initial'       => $this->input->post('initial'),
                'title'         => $this->input->post('title'),
                'description'   => $this->input->post('description'),
                'credits'       => $this->input->post('credits'),
                'status'        => $this->input->post('status'),
                'grade_point'   => $this->input->post('grade_point')
            ];
            
            $this->Course_model->insert($data);
            $this->session->set_flashdata('msg', 'Course added');
            redirect('course', 'refresh');
        }
        
        else
        {
            $data['content']='course/create';
            $data['grade_dropdown'] = $this->Grade_model->grade_dropdown();
            $this->load->view($this->_layout, $data);
        }
    }
    
    public function edit()
    {
        $this->form_validation->set_rules($this->Course_model->rules);
        
        if($this->form_validation->run() == TRUE)
        {
            $data = [
                'initial'       => $this->input->post('initial'),
                'title'         => $this->input->post('title'),
                'description'   => $this->input->post('description'),
                'credits'       => $this->input->post('credits'),
                'status'        => $this->input->post('status'),
                'grade_point'   => $this->input->post('grade_point'),
            ];
            
            $this->Course_model->update($this->uri->segment(3), $data);
            $this->session->set_flashdata('msg', 'Course updated');
            redirect('course', 'refresh');
        }
        
        else
        {
            $data['course'] = $this->Course_model->get_course($this->uri->segment(3), $this->session->userdata('user_id'));
            $data['content']='course/edit';
            $data['grade_dropdown'] = $this->Grade_model->grade_dropdown();
            $this->load->view($this->_layout, $data);
        }
    }
    
    public function delete()
    {
        $course = $this->Course_model->get_course($this->uri->segment(3), $this->session->userdata('user_id'));
        
        if(count($course) > 0)
        {
            $this->Course_model->delete($course->id);
            $this->session->set_flashdata('msg', 'Course has been deleted');
            redirect('course', 'refresh');
        }
        
        else
        {
            $this->session->set_flashdata('msg', 'Unable to delete course');
            redirect('course', 'refresh');
        }
    }
    
    public function excel()
    {
        $this->Course_model->to_excel();
    }
    
    public function csv()
    {
        $this->Course_model->to_csv();
    }
}