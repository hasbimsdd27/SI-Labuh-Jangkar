<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Perizinan extends CI_Controller {
    function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "masuk"){
			redirect(base_url("login"));
		}
	}
    public function masuk(){
        $this->load->model('Db');
        $data['kapal'] = $this->Db->loadall('tb_req_lajang')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('perizinan/masuk', $data);
        $this->load->view('templates/footer');
    }
    public function viewm($id){
        $this->load->model('Db');
        $array = array(
            'uniqid' => $id,
        );
        $data['kapal'] = $this->Db->ambildata('tb_req_lajang', $array);
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('perizinan/viewm', $data);
        $this->load->view('templates/footer');
    }
    public function viewk($id){
        $this->load->model('Db');
        $array = array(
            'uniqid' => $id,
        );
        $data['kapal'] = $this->Db->ambildata('tb_req_ajang', $array);
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('perizinan/viewk', $data);
        $this->load->view('templates/footer');
    }
    public function viewp($id){
        $this->load->model('Db');
        $array = array(
            'uniqid' => $id,
        );
        $data['kapal'] = $this->Db->ambildata('tb_invoice', $array);
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('perizinan/viewp', $data);
        $this->load->view('templates/footer');
    }
    public function keluar(){
        $this->load->model('Db');
        $data['kapal'] = $this->Db->loadall('tb_req_ajang')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('perizinan/keluar', $data);
        $this->load->view('templates/footer');
    }
    public function shiplist(){
        $this->load->model('Db');
        $data['kapal'] = $this->Db->loadall('tb_reg_kapal')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('perizinan/datakapal', $data);
        $this->load->view('templates/footer');
    }
    public function financelog(){
        $this->load->model('Db');
        $data['kapal'] = $this->Db->loadall('tb_invoice')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('perizinan/finance', $data);
        $this->load->view('templates/footer');
    }
    public function izinkanm($id){
        $this->load->model('Db');
        $array = array(
            'uniqid' => $id,
        );
        $datalama = $this->Db->ambildata('tb_req_lajang', $array);
        $data = array(
            'id' => $datalama->id,
            'namakapal' => $datalama->namakapal,
            'nokapal' => $datalama->nokapal,
            'asal' => $datalama->asal,
            'gt' => $datalama->gt,
            'nahkoda' => $datalama->nahkoda,
            'goods' => $datalama->goods,
            'plan' => $datalama->plan,
            'jeniskapal' => $datalama->jeniskapal,
            'tujuan' => $datalama->tujuan,
            'uniqid' => $id,
            'tanggal' =>$datalama->tanggal,
            'tanggalapp' => date('Y-m-d H:i:s'),
            'approved' => 'yes'
        );
        $this->Db->update('tb_req_lajang', $array, $data);
        redirect('perizinan/masuk');
    }
    public function izinkank($id){
        $this->load->model('Db');
        $array = array(
            'uniqid' => $id,
        );
        $datalama = $this->Db->ambildata('tb_req_ajang', $array);
        $data1 = array(
            'id' => $datalama->id,
            'namakapal' => $datalama->namakapal,
            'nokapal' => $datalama->nokapal,
            'asal' => $datalama->asal,
            'gt' => $datalama->gt,
            'nahkoda' => $datalama->nahkoda,
            'goods' => $datalama->goods,
            'plan' => $datalama->plan,
            'jeniskapal' => $datalama->jeniskapal,
            'tujuan' => $datalama->tujuan,
            'uniqid' => $id,
            'tanggal' =>$datalama->tanggal,
            'tanggalapp' => date('Y-m-d H:i:s'),
            'approved' => 'yes'
        );
        
        $data['lajang'] = $this->Db->ambildata('tb_req_lajang', $array);
        $data['ajang'] = $this->Db->ambildata('tb_req_ajang', $array);
        $array2 = array(
            'jenis' => $datalama->jeniskapal,
        );
        $data['jnt'] = $this->Db->ambildata('tb_jnt', $array2);
        $lajang = strtotime($data['lajang']->tanggalapp);
        $ajang = strtotime($data['ajang']->tanggalapp);

        $sel = $ajang - $lajang;
        $selw = $sel / (60 * 60 *24);
        if($selw === 0 or $selw <1){
            $selisih = 1;
        }else{
            $selisih = $selw;
        };
        $pend = $selisih * $data['jnt']->tarif * $datalama->gt;
        $curr = $data['jnt']->currency;
        if($curr == 'USD'){
            $pendapatan = number_format($pend,3,'.','');
        }else{
            $pendapatan = number_format($pend,0,'.','');
        };
        
        $data['bayar'] = array(
            'namakapal' => $datalama->namakapal,
            'nokapal' => $datalama->nokapal,
            'gt' => $datalama->gt,
            'nahkoda' => $datalama->nahkoda,
            'goods' => $datalama->goods,
            'asal' => $datalama->asal,
            'tujuan' => $datalama->tujuan,
            'plan' => $datalama->plan,
            'jeniskapal' => $datalama->jeniskapal,
            'uniqid' => $id,
            'tarif' => $data['jnt']->tarif,
            'durasi' => $selisih,
            'pendapatan' => $pendapatan,
            'currency' => $data['jnt']->currency
        );
            $this->Db->insertdata('tb_invoice', $data['bayar']);
        $this->Db->update('tb_req_ajang', $array, $data1);
        redirect('perizinan/keluar');
    }
    


       public function izinkanin($id){
        $this->load->model('Db');
        $array = array(
            'uniqid' => $id,
        );
        $datalama = $this->Db->ambildata('tb_invoice', $array);
        $data = array(
            'id' => $datalama->id,
            'namakapal' => $datalama->namakapal,
            'nokapal' => $datalama->nokapal,
            'asal' => $datalama->asal,
            'gt' => $datalama->gt,
            'nahkoda' => $datalama->nahkoda,
            'goods' => $datalama->goods,
            'plan' => $datalama->plan,
            'jeniskapal' => $datalama->jeniskapal,
            'tujuan' => $datalama->tujuan,
            'uniqid' => $id,
            'tanggal' =>$datalama->tanggal,
            'durasi' =>$datalama->durasi,
            'konfirmasi' =>$datalama->konfirmasi,
            'pendapatan' =>$datalama->pendapatan,
            'currency' =>$datalama->currency,
            'tarif' =>$datalama->tarif,
            'tanggalapp' => date('Y-m-d H:i:s'),
            'approved' => 'yes'
        );
        $this->Db->update('tb_invoice', $array, $data);
        redirect('perizinan/financelog');
    }


}