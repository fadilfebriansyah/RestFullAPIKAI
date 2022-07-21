<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kereta_model extends CI_Model
{
    private $_table_krt = 'kereta';

    //fungsi untuk mendapatkan data
    public function getDataKereta($id_kereta)
    {
        //menggunakan query builder
        if ($id_kereta) {
            $this->db->from($this->_table_krt);
            $this->db->where('id_kereta', $id_kereta);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from($this->_table_krt);
            $query = $this->db->get()->result_array();
            return $query;
        }
    }
    //fungsi untuk menambahkan data
    public function insertKereta($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table_krt, $data);
        return $this->db->affected_rows();
        // return $query;
    }
    //fungsi untuk mengubah data
    public function updateKereta($data, $id_kereta)
    {
        //Menggunakan Query Builder
        $this->db->update($this->_table_krt, $data, ['id_kereta' => $id_kereta]);
        return $this->db->affected_rows();
        // return $query;
    }
    //fungsi untuk menghapus data
    public function deleteKereta($id_kereta)
    {
        //Menggunakan Query Builder
        $this->db->delete($this->_table_krt, ['id_kereta' => $id_kereta]);
        return $this->db->affected_rows();
        // return $query;
    }
}
