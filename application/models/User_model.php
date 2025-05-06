<?php

class User_model extends MY_Model
{
    public function __construct() {
        parent::__construct();
        $this->_table = 'users';
        
        $this->_fields = [
            0 => 'id',
            1 => 'ip_address',
            2 => 'username',
            3 => 'password',
            4 => 'email',
            5 => 'activation_selector',
            6 => 'activation_code',
            7 => 'forgotten_password_selector',
            8 => 'forgotten_password_code',
            9 => 'forgotten_password_time',
            10=> 'remember_selector',
            11=> 'remember_code',
            12=> 'created_on',
            13=> 'last_login',
            14=> 'active',
            15=> 'first_name',
            16=> 'last_name',
            17=> 'company',
            18=> 'phone'
        ];
    }
}