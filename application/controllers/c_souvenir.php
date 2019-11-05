<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_souvenir extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('M_souvenir');
    }
    
    public function display(){
        $data1['souvenir'] = $this->M_souvenir->get_all();
        $data['content_div'] = $this->load->view('v_souvenir_display', $data1, TRUE);
        $this->load->view('v_template', $data);
    }
    
    public function blank(){
        $data['content_div'] = "";
        $this->load->view('v_template', $data);
    }
}