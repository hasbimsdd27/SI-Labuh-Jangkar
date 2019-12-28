<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pegawai extends CI_Controller {
    function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "masuk"){
            redirect(base_url("login"));
        }
    }
    public function index(){
        $this->load->model('Db');
        $data['pegawai'] = $this->Db->loadall('tb_pegawai')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('pegawai/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah(){
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('pegawai/add');
        $this->load->view('templates/footer');
    }

    public function tpegawai(){
        $this->load->model('Db');
        $nip = $this->input->post('nip');
        $password = htmlspecialchars(password_hash($this->input->post('password'), PASSWORD_DEFAULT)) ;
        $level = $this->input->post('level');
        $nama = $this->input->post('nama');
        
        $data = array(
            'id' => '',
            'nip' => $nip,
            'password' => $password,
            'level' => $level,
            'nama' => $nama
        );
        $this->Db->insertdata('tb_pegawai', $data);
        redirect('pegawai');
    }
}