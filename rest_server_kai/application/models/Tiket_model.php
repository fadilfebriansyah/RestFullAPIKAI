<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tiket_model extends CI_Model
{
    private $_table_tkt = 'tiket';

    //fungsi untuk mendapatkan data
    public function getDataTiket($id_tiket)
    {
        $this->db->from($this->_table_tkt);
        if ($id_tiket) {
            $this->db->where('id_tiket', $id_tiket);
        }
        $this->db->join('penumpang as pnp', 'pnp.id_penumpang  = tiket.id_penumpang');
        $this->db->join('kereta as krt', 'krt.id_kereta = tiket.id_kereta');
        $this->db->select('id_tiket, krt.id_kereta, pnp.id_penumpang, krt.nama_kereta, pnp.nama_penumpang, krt.berangkat_kereta, krt.tiba_kereta, tipe_tiket, tanggal_tiket , seat_tiket');
        $query = $this->db->get()->result_array();
        return $query;
        //menggunakan query builder
        // if ($id_tiket) {
        //     $this->db->from($this->_table_tkt);
        //     $this->db->where('id_tiket', $id_tiket);
        //     $query = $this->db->get()->row_array();
        //     return $query;
        // } else {
        //     $this->db->from($this->_table_tkt);
        //     $query = $this->db->get()->result_array();
        //     return $query;
        // }
    }
    //fungsi untuk menambahkan data
    public function insertTiket($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table_tkt, $data);
        return $this->db->affected_rows();
        // return $query;
    }
    //fungsi untuk mengubah data
    public function updateTiket($data, $id_tiket)
    {
        //Menggunakan Query Builder
        $this->db->update($this->_table_tkt, $data, ['id_tiket' => $id_tiket]);
        return $this->db->affected_rows();
        // return $query;
    }
    //fungsi untuk menghapus data
    public function deleteTiket($id_tiket)
    {
        //Menggunakan Query Builder
        $this->db->delete($this->_table_tkt, ['id_tiket' => $id_tiket]);
        return $this->db->affected_rows();
        // return $query;
    }
}
