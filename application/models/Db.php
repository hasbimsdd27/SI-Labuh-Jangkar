<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db extends CI_Model {
    public function loadall($table){
        $this->db->order_by('id', 'DESC');
        return $this->db->get($table);
    }
    public function insertdata($table, $data){
        $this->db->insert($table, $data);
    }

    public function caridata($table, $data){
        return $this->db->get_where($table, $data);
    }
    public function ambildata($table, $data){
        return $this->db->get_where($table, $data)->row();
    }

    public function update($table,$where,$data){
        $this->db->where($where,$table);
        $this->db->update($table,$data);
    }
}