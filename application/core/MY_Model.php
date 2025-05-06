<?php

class MY_Model extends CI_Model
{
    protected $_table;
    protected $_primary_key = 'id';
    protected $_fields = array();
    
    public $rules = array();
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get($id)
    {
        $this->db->where($this->_primary_key, $id);
        return $this->db->get($this->_table)->row();
    }
    
    public function get_where($field, $value, $limit = 1000000000)
    {
        if($limit == 1)
        {
            $record = $this->db->get_where($this->_table, array($field => $value))->row();
        }
        
        else
        {
            $record = $this->db->get_where($this->_table, array($field => $value), $limit)->result();
        }
        
        return $record;
    }
    
    public function get_all()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function count_all()
    {
        return $this->db->count_all($this->_table);
    }
    
    public function count_where($field, $value)
    {
        $this->db->where($field, $value);
        $this->db->from($this->_table);
        return $this->db->count_all_results();
    }
    
    public function insert($data)
    {
        if($this->db->insert($this->_table, $data))
        {
            return true;
        }
        
        return $this->db->error();
    }
    
    public function update($id, $data)
    {
        $this->db->where($this->_primary_key, $id);
        $this->db->update($this->_table, $data);
    }
    
    public function delete($id)
    {
        $this->db->where($this->_primary_key, $id);
        $this->db->delete($this->_table);
    }
}