<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Login extends CI_Controller {
    public function index(){
        $this->load->view('login');
    }
    public function register(){
        $this->load->model('Db');
        $data['pelabuhan'] = $this->Db->loadall('tb_pelabuhan')->result();
        $data['jnt'] = $this->Db->loadall('tb_jnt')->result();
        $this->load->view('register', $data);

    }
    public function t_kapal(){
        $this->load->model('Db');
        $namakapal = $this->input->post('namakapal');
        $nokapal = $this->input->post('nokapal');
        $asal = $this->input->post('asal');
        $nahkoda = $this->input->post('nahkoda');
        $gt = $this->input->post('gt');
        $goods = $this->input->post('goods');
        $plan = $this->input->post('plan');
        $jeniskapal = $this->input->post('jeniskapal');
        $tujuan = $this->input->post('tujuan');
        $uniqid = uniqid();
        $data = array(
            'id' => '',
            'namakapal' => $namakapal,
            'nokapal' => $nokapal,
            'asal' => $asal,
            'nahkoda' => $nahkoda,
            'gt' => $gt,
            'goods' => $goods,
            'plan' => $plan,
            'jeniskapal' => $jeniskapal,
            'tujuan' => $tujuan,
            'uniqid' => $uniqid
        );
        $this->Db->insertdata('tb_reg_kapal', $data);
        redirect('login/status/'.$uniqid);
    }
    public function login_kapal(){
        $this->load->model('Db');
        $namakapal = $this->input->post('namakapal');
        $nokapal = $this->input->post('nokapal');
        $data = array(
            'namakapal' => $namakapal,
            'nokapal' => $nokapal
        );
        $cari = $this->Db->caridata('tb_reg_kapal', $data)->num_rows();
        if($cari > 0){
            $id = $this->Db->ambildata('tb_reg_kapal', $data);
            $kodee = $id->uniqid;
            redirect('login/status/'.$kodee);
        }else{
           redirect('login');
        }
    }
    public function status($id){
        $this->load->model('Db');
        $dataid = $this->input->post($id);
        $array = array(
            'uniqid' => $id,
        );
        $data['judul'] = 'SILAJANG';
        $data = $this->Db->ambildata('tb_reg_kapal', $array);
        $array2 = array(
            'uniqid' => $id,
        );
        $cari = $this->Db->ambildata('tb_invoice', $array2);
        $cari2 = $this->Db->caridata('tb_invoice', $array2)->row();
        // if($cari2  == 0){
        //     $this->load->view('status',$data);
        // }else{
        //     if($cari->konfirmasi == ''){
        //         redirect('pembayaran/payment/'.$id);
            // }else{
                $this->load->view('status',$data);
            // }
       
        
    }

    public function lokasi($id){
        $this->load->model('Db');
        $array = array(
            'uniqid' => $id,
        );
        $data['kapal'] = $this->Db->ambildata('tb_reg_kapal', $array);
        $array2 = array(
            'nama' => $data['kapal']->tujuan
        );
        $data['lokasi'] = $this->Db->ambildata('tb_pelabuhan', $array2);
        $this->load->view('lokasi', $data);
    }
    
}