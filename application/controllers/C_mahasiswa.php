<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_mahasiswa extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('M_mahasiswa');
        $this->load->library('form_validation');
    }

    public function input(){
        $data1['pendidikan']    = $this->M_mahasiswa->get_pend();
        $data1['hobi']          = $this->M_mahasiswa->get_hobi();
        $data['content_div'] = $this->load->view('v_mahasiswa_form', $data1, TRUE);
        $this->load->view('v_template', $data);
    }

    public function upload(){
        $this->form_validation->set_rules('nim', 'NIM', 'trim|required|max_length[10]|regex_match[/^[0-9]*$/]');
        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'trim|required|regex_match[/^[a-zA-Z ]*$/]');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required|in_list[1,0]');
        $this->form_validation->set_rules('hp', 'No. HP', 'trim|required|max_length[13]|regex_match[/^[0-9+]*$/]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[50]|valid_email');

        if($this->form_validation->run()==TRUE){
            $in['nim']              = $this->input->post('nim');
            $in['nama']             = $this->input->post('nama');
            $in['jk']               = $this->input->post('jk');
            $in['pendidikan']       = $this->input->post('pendidikan');
            $in['telepon']          = $this->input->post('hp');
            $in['email']            = $this->input->post('email');

            $this->M_mahasiswa->save($in);

            $in2['nim']     = $in['nim'];
            foreach($this->input->post('hobi') as $req){
                $in2['id_hobi'] = $req;
                $this->M_mahasiswa->save_hobi($in2);
            }

        }
        else{
            $warning = validation_errors();
            $this->session->set_flashdata('warning',  $warning);
        }
        
        redirect('c_mahasiswa/input');
    }
}
?>