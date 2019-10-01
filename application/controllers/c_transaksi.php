<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_transaksi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_transaksi');
	}

	public function add_data_pembeli(){
		$data['content_div'] = $this->load->view('v_transaksi_form_pembeli', '', TRUE);;
		$this->load->view('v_template', $data);
	}

	public function proses_transaksi(){
		// echo "<pre>"; var_dump($this->session->cart); echo "</pre>";   
		// echo "<pre>"; var_dump($this->input->post()); echo "</pre>"; 
		
		$total = 0;

		foreach($this->session->cart as $res){
			
			$total = $total + ($res['harga'] * $res['jumlah']);
		}

		$data['no_penjualan']       = $this->input->post('no_penjualan'); 
		$data['tanggal']            = date('Y-m-d H:i:s');
		$data['total']              = $total;
		$data['nama']          		= $this->input->post('nama'); 
		$data['no_hp']              = $this->input->post('hp'); 
        $data['alamat']             = $this->input->post('alamat'); 
        $data['kota']				= $this->input->post('kota'); 
		$data['kode_pos']			= $this->input->post('kode_pos'); 
		
		$this->m_transaksi->save_penjualan($data);
		
		foreach($this->session->cart as $res){
			$item['no_penjualan']	= $this->input->post('no_penjualan');
			$item['id_barang']		= $res['id'];
			$item['jumlah']			= $res['jumlah'];
			$item['harga_jual']		= $res['harga'];

			$this->m_transaksi->save_item($item);
		}

        unset($_SESSION['cart']);
        redirect(base_url().'index.php/c_cart/display');
	}
}

?>