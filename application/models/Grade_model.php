<?php

class Grade_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->_table = 'grades';
        
        $this->_fields = [
            0 => 'id',
            1 => 'grade_letter',
            2 => 'grade_point',
        ];
        
        $this->rules = [
            [
                'field' => 'grade_letter',
                'label' => 'Grade Letter',
                'rules' => 'trim|required|is_unique[' . $this->_table . '.' . $this->_fields[1] . ']'
            ],
            
            [
                'field' => 'grade_point',
                'label' => 'Grade Point',
                'rules' => 'trim|required|numeric'
            ]
        ];
    }
    
    public function grade_dropdown()
    {
        $grades = $this->get_all();
        $result = [];
        
        foreach($grades as $temp)
        {
            $result[$temp->grade_point] = $temp->grade_letter;
        }
        
        return $result;
    }
    
    public function grade_list()
    {
        $grades = $this->get_all();
        $result = [];
        
        foreach($grades as $grade)
        {
            $result["$grade->grade_point"] = $grade->grade_letter;
        }
        
        return $result;
    }
}