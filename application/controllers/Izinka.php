<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Izinka extends CI_Controller {
    public function perizinm($id){
        $this->load->model('Db');
        $array = array(
            'uniqid' => $id,
        );
        $datalama = $this->Db->ambildata('tb_reg_kapal', $array);
        $data = array(
            'id' => '',
            'namakapal' => $datalama->namakapal,
            'nokapal' => $datalama->nokapal,
            'asal' => $datalama->asal,
            'tujuan' => $datalama->tujuan,
            'gt' => $datalama->gt,
            'jeniskapal' => $datalama->jeniskapal,
            'uniqid' => $id,
            'tanggal' => date('Y-m-d H:i:s')
        );
        $this->Db->insertdata('tb_req_lajang', $data);
        redirect('login/status/'.$id);
       }
         public function perizink($id){
        $this->load->model('Db');
        $array = array(
            'uniqid' => $id,
        );
        $datalama = $this->Db->ambildata('tb_reg_kapal', $array);
        $data = array(
            'id' => '',
            'namakapal' => $datalama->namakapal,
            'nokapal' => $datalama->nokapal,
            'asal' => $datalama->asal,
            'tujuan' => $datalama->tujuan,
            'nahkoda' => $datalama->nahkoda,
            'plan' => $datalama->plan,
            'goods' => $datalama->goods,
            'gt' => $datalama->gt,
            'jeniskapal' => $datalama->jeniskapal,
            'uniqid' => $id,
            'tanggal' => date('Y-m-d H:i:s'),
            'approved' => '',
            'tanggalapp' => '',
        );
        $this->Db->insertdata('tb_req_ajang', $data);
        redirect('login/status/'.$id);
       }
}