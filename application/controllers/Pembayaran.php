<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Pembayaran extends CI_Controller {
    public function payment($id){
        $this->load->model('Db');
        $array = array(
            'uniqid' => $id
        );
        $data['invoice'] = $this->Db->ambildata('tb_invoice', $array);
        $this->load->view('pembayaran', $data);
    }

    public function kpembayaran($id){
        $this->load->model('Db');
        $array = array(
            'uniqid' => $id
        );
        $datalama = $this->Db->ambildata('tb_reg_kapal', $array);
        $data = array(
            'id' => $datalama->id,
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
            'konfirmasi' => 'yes',
        );
        $this->Db->update('tb_invoice',$array, $data);
        redirect('login/status/'.$id);
    }
}