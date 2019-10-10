<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_home extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('m_mahasiswa');
        
        // if($this->session->userdata('username') == null){
        //     redirect(site_url());
        // }
    }
    
    public function index(){
        $data['content_div'] = $this->load->view('v_home', '', TRUE);
        $this->load->view('v_template', $data);
    }
    
    public function blank(){
        $data['content_div'] = "";
        $this->load->view('v_template', $data);
        // echo "blank";
    }
}