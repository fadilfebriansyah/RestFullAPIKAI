<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penumpang_model extends CI_Model
{
    private $_table_pnp = 'penumpang';

    //fungsi untuk mendapatkan data
    public function getDataPenumpang($id_penumpang)
    {
        //menggunakan query builder
        if ($id_penumpang) {
            $this->db->from($this->_table_pnp);
            $this->db->where('id_penumpang', $id_penumpang);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from($this->_table_pnp);
            $query = $this->db->get()->result_array();
            return $query;
        }
    }
    //fungsi untuk menambahkan data
    public function insertPenumpang($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table_pnp, $data);
        return $this->db->affected_rows();
        // return $query;
    }
    //fungsi untuk mengubah data
    public function updatePenumpang($data, $id_penumpang)
    {
        //Menggunakan Query Builder
        $this->db->update($this->_table_pnp, $data, ['id_penumpang' => $id_penumpang]);
        return $this->db->affected_rows();
        // return $query;
    }
    //fungsi untuk menghapus data
    public function deletePenumpang($id_penumpang)
    {
        //Menggunakan Query Builder
        $this->db->delete($this->_table_pnp, ['id_penumpang' => $id_penumpang]);
        return $this->db->affected_rows();
        // return $query;
    }
}
