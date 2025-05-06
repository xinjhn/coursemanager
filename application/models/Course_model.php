<?php

class Course_model extends MY_Model
{
    public function __construct() {
        parent::__construct();
        $this->_table = 'courses';
        
        $this->_fields = [
            0 => 'id',
            1 => 'user_id',
            2 => 'initial',
            3 => 'title',
            4 => 'description',
            5 => 'credits',
            6 => 'status',
            7 => 'grade_point'
        ];
        
        $this->rules = [
            [
                'field' => 'initial',
                'label' => 'Initial',
                'rules' => 'trim|required'
            ]
        ];
    }
    
    public function to_excel()
    {
        $this->load->helper('excel');
        $this->db->select('initial, title, description, credits, grade_point');
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $result = $this->db->get($this->_table);
        echo to_excel($result, 'output');
    }

    public function to_csv()
    {
        $this->load->dbutil();
        $this->load->helper('file');
        
        $this->db->select('initial, title, description, credits, grade_point');
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $result = $this->db->get($this->_table);
        
        $csv_file = $this->dbutil->csv_from_result($result);
        $headers = ''; // just creating the var for field headers to append to below
        $data = ''; // just creating the var for field data to append to below
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=backup.csv");
        echo "$headers\n$csv_file";
    }
    
    public function get_course($id, $user_id)
    {
        $this->db->where($this->_primary_key, $id)->where('user_id', $user_id);
        $record = $this->db->get($this->_table)->row();
        return $record;
    }
    
    public function get_result($user_id)
    {
        $this->db->where('user_id', $user_id); // specify user
        $this->db->where('credits >', 0); // discard non-credit courses
        $courses = $this->db->get($this->_table)->result();
        
        $total_credits = 0;
        $total_points = 0;
        
        foreach($courses as $course)
        {
            $total_credits += $course->credits;
            $total_points += ($course->credits * $course->grade_point);
        }
        
        $data['total_credits'] = $total_credits;
        $data['gpa'] = ($total_credits > 0) ? $total_points / $total_credits : 0;
        return $data;
    }
}