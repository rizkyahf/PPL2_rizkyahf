<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_souvenir extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all(){
        $q = $this->db->query('select * from souvenir');
        return $q->result_array();
    }

    public function get_by_id($id){
        $q = $this->db->query('select * from souvenir where id_barang="'.$id.'"');
        return $q->result_array()[0];
        // echo $this->db->last_query();
    }

}