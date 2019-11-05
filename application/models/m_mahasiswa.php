<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mahasiswa extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all(){
        $q = $this->db->query('select * from mahasiswa inner join prodi on mahasiswa.kd_prodi = prodi.kd_prodi');
        return $q->result_array();
    }

    public function get_by_nim($nim){
        $q = $this->db->query('select * from mahasiswa inner join prodi on mahasiswa.kd_prodi = prodi.kd_prodi where nim = '.$nim);
        return $q->result_array()[0];
    }

    public function save($data){
        $this->db->insert('mahasiswa', $data);
    }

    public function search_by_name($name){
        $q = $this->db->query('select * from mahasiswa inner join prodi on mahasiswa.kd_prodi = prodi.kd_prodi where nama like "%'.$name.'%"');
        return $q->result_array();
    }
}