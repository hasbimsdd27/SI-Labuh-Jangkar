<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plogin extends CI_Controller {
    public function index(){
        $this->load->view('plogin');
    }
    public function logout(){
       session_unset();
       session_destroy();
       redirect(base_url());
    }

    public function auth(){
        $this->load->model('Db');
        $nip = $this->input->post('nip');
        $password = $this->input->post('password');
        $dalog = array(
            'nip' => $nip,
        );
        $user = $this->Db->ambildata('tb_pegawai', $dalog);
        $pass = $user->password;
        
        if(password_verify($password,$pass)){
            $data_session = array(
                'nama' => $user->nama,
                'nip'  => $user->nip,
                'level' => $user->level,
                'status' => 'masuk'
            );
            $this->session->set_userdata($data_session);
            redirect('perizinan/masuk');
        }else{
            echo redirect('plogin');
        }
    }
}