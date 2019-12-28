<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pelabuhan extends CI_Controller {
    function __construct(){
        parent::__construct();
        if($this->session->userdata('status') != "masuk"){
            redirect(base_url("login"));
        }
    }
    public function index(){
        $this->load->model('Db');
        $data['pelabuhan'] = $this->Db->loadall('tb_pelabuhan')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('Pelabuhan/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah(){
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('Pelabuhan/add',);
        $this->load->view('templates/footer');
    }
    public function tpelabuhan(){
        $this->load->model('Db');
        $nama = $this->input->post('nama');
        $longitude = $this->input->post('longitude');
        $latitude = $this->input->post('latitude');
        
        $data = array(
            'id' => '',
            'nama' => $nama,
            'longitude' => $longitude,
            'latitude' => $latitude,
        );
        $this->Db->insertdata('tb_pelabuhan', $data);
        redirect('pelabuhan');
    }

}