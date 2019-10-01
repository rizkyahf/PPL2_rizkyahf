<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_transaksi extends CI_Model {
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

}
?>