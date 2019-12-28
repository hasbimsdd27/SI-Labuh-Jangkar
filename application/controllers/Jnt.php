<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Jnt extends CI_Controller {
    function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "masuk"){
            redirect(base_url("login"));
        }
    }
    public function index(){
        $this->load->model('Db');
        $data['jnt'] = $this->Db->loadall('tb_jnt')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('jnt/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah(){
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('jnt/add',);
        $this->load->view('templates/footer');
    }
    public function tjnt(){
        $this->load->model('Db');
        $jenis = $this->input->post('jenis');
        $tarif = $this->input->post('tarif');
        $satuan = $this->input->post('satuan');
        $currency = $this->input->post('currency');
        
        $data = array(
            'id' => '',
            'jenis' => $jenis,
            'tarif' => $tarif,
            'satuan' => $satuan,
            'currency' => $currency,
        );
        $this->Db->insertdata('tb_jnt', $data);
        redirect('jnt');
    }

}