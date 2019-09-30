<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_cart extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('m_souvenir');
    }

    public function display(){
        echo "<pre>"; var_dump($this->session->cart); echo "</pre>";   
        // $data['content_div'] = $this->load->view('v_cart_display', '', TRUE);;
        // $this->load->view('v_template', $data);
    }

    public function add($id){
        echo "adding ".$id;

        $data = $this->m_souvenir->get_by_id($id);

        if(!isset($_SESSION['cart'][$id])){
            echo "kosong";
            $_SESSION['cart'][$id] = array(
                        "id"            => $id,
                        "nama_barang"   => $data['nama_barang'],
                        "jumlah"        => 1,
                        "harga"         => $data['harga']
                    );
        }
        else{
            $qty = $_SESSION['cart'][$id]['jumlah'];
            $_SESSION['cart'][$id]['jumlah'] = $qty + 1;
        }

        echo "<pre>"; var_dump($this->session->cart); echo "</pre>";   
        
        redirect(base_url().'index.php/c_cart/display');
        // unset($_SESSION['cart']);
    }
    
    public function clear_all(){
        unset($_SESSION['cart']);
        redirect(base_url().'index.php/c_cart/display');
    }

    public function clear_by_id($id){
        unset($_SESSION['cart'][$id]);
        redirect(base_url().'index.php/c_cart/display');
    }

}