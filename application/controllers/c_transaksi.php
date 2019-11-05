<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_transaksi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_transaksi');
		$this->load->model('M_souvenir');
	}

	public function add_data_pembeli(){
		$ableToNext = true;
		foreach($this->session->cart as $res){
			$temp = $this->M_souvenir->get_by_id($res['id']);
			if($res['jumlah'] > $temp['stok']){ ?>
				<script>
					alert('Stok dari <?=$res['nama_barang'];?> Tinggal Tersisa <?=$temp['stok'];?>!');
					window.history.go(-1);
				</script>
			<?php 
				$ableToNext = false;
			}
		}

		if($ableToNext){
			$data1['dropdown_provinsi'] = $this->load->view('v_ajax_dropdown_provinsi', '', TRUE);
			$data['content_div'] = $this->load->view('v_transaksi_form_pembeli', $data1, TRUE);
			$this->load->view('v_template', $data);
		}
	}

	public function proses_transaksi(){
		// echo "<pre>"; var_dump($this->session->cart); echo "</pre>";   
		// echo "<pre>"; var_dump($this->input->post()); echo "</pre>"; 
		
		$total = 0;

		foreach($this->session->cart as $res){
			$total = $total + ($res['harga'] * $res['jumlah']);

			$temp = $this->M_souvenir->get_by_id($res['id']);
			$stok['stok']	= $temp['stok']-$res['jumlah'];

			$this->M_souvenir->update_stok($res['id'], $stok);
		}

		$data['no_penjualan']       = $this->input->post('no_penjualan'); 
		$data['tanggal']            = date('Y-m-d H:i:s');
		$data['total']              = $total;
		$data['nama']          		= $this->input->post('nama'); 
		$data['no_hp']              = $this->input->post('hp'); 
        $data['alamat']             = $this->input->post('alamat'); 
        $data['kota']				= $this->input->post('kota'); 
		$data['kode_pos']			= $this->input->post('kode_pos'); 
		
		$this->M_transaksi->save_penjualan($data);
		
		foreach($this->session->cart as $res){
			$item['no_penjualan']	= $this->input->post('no_penjualan');
			$item['id_barang']		= $res['id'];
			$item['jumlah']			= $res['jumlah'];
			$item['harga_jual']		= $res['harga'];

			$this->M_transaksi->save_item($item);
		}

        unset($_SESSION['cart']);
        redirect(base_url().'index.php/C_cart/display');
	}

	public function display_all(){
        $data1['transaksi'] = $this->M_transaksi->get_all();
        $data['content_div'] = $this->load->view('v_transaksi_display_admin', $data1, TRUE);
        $this->load->view('v_template', $data);
	}

	public function update_sudahbayar($no_penjualan){
		$this->M_transaksi->update_sudahbayar($no_penjualan);
		redirect(base_url().'index.php/C_transaksi/display_all');
	}
	
	public function update_sudahkirim($no_penjualan){
		$this->M_transaksi->update_sudahkirim($no_penjualan);
		redirect(base_url().'index.php/C_transaksi/display_all');
	}
}

?>