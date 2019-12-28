<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Kapal extends CI_Controller {
    public function status($id){
        $data['kapal'] = $this->Db->ambildata('tb_reg_kapal', $id);
        var_dump($data);die;
        $this->load->view('status', $data);

    }
}