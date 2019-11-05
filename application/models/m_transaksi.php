<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    
    public function save_penjualan($data){
        $this->db->insert('penjualan', $data);
    }

    public function save_item($item){
        $this->db->insert('jual', $item);
    }

    public function get_all(){
        $q = $this->db->query('select * from penjualan');
        return $q->result_array();
    }

    public function update_sudahbayar($no_penjualan){
        $this->db->where('no_penjualan', $no_penjualan);
        $this->db->update('penjualan', array("status" => "sdh_bayar"));
    }

    public function update_sudahkirim($no_penjualan){
        $this->db->where('no_penjualan', $no_penjualan);
        $this->db->update('penjualan', array("status" => "sdh_kirim"));
    }

}
?>