<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_user extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function cek_login($uname, $pass){
        $q = $this->db->query("select * from admin WHERE username='".$uname."' AND password=md5('".$pass."')");
        return $q->result_array()[0];
    }
}