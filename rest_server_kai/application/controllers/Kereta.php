<?php
defined('BASEPATH') or exit('No direct script access allowed');
//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Kereta extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kereta_model');
    }
    //fungsi CRUD (GET, POST, PUT, DELETE) simpan di bawah sini

    public function krt_get()
    {
        $id_kereta = $this->get('id_kereta');
        $data = $this->Kereta_model->getDataKereta($id_kereta);

        //jika variabel $data terdapat data didalamnya
        if ($data) {
            $this->response(
                [
                    'data' => $data,
                    'status' => 'true',
                    'response_code' => RestController::HTTP_OK
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => 'false',
                    'message' => 'data tidak ada',
                    'response_code' => RestController::HTTP_NOT_FOUND
                ],
                RestController::HTTP_NOT_FOUND

            );
        }
    }
    function krt_post()
    {
        $data = array(
            'id_kereta' => $this->post('id_kereta'),
            'nama_kereta' => $this->post('nama_kereta'),
            'tujuan_kereta' => $this->post('tujuan_kereta'),
            'asal_kereta' => $this->post('asal_kereta'),
            'harga_kereta' => $this->post('harga_kereta'),
            'berangkat_kereta' => $this->post('berangkat_kereta'),
            'tiba_kereta' => $this->post('tiba_kereta')

        );
        $cek_data = $this->Kereta_model->getDataKereta($this->post('id_kereta'));
        //Jika semua data wajib diisi
        if (
            $data['id_kereta'] == NULL || $data['nama_kereta'] == NULL || $data['tujuan_kereta']
            == NULL || $data['asal_kereta'] == NULL || $data['harga_kereta'] == NULL || $data['kelas_kereta'] ==
            NULL || $data['berangkat_kereta'] == NULL || $data['tiba_kereta'] == NULL
        ) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Jika data duplikat
        } else if ($cek_data) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Duplikat',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Jika data tersimpan
        } elseif ($this->Kereta_model->insertKereta($data) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Berhasil Ditambahkan',
                ],
                RestController::HTTP_CREATED
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Gagal Menambahkan Data',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
    function krt_put()
    {
        $id_kereta = $this->put('id_kereta');
        $data = array(
            'nama_kereta' => $this->put('nama_kereta'),
            'tujuan_kereta' => $this->put('tujuan_kereta'),
            'asal_kereta' => $this->put('asal_kereta'),
            'harga_kereta' => $this->put('harga_kereta'),
            'berangkat_kereta' => $this->put('berangkat_kereta'),
            'tiba_kereta' => $this->put('tiba_kereta')
        );
        //Jika field id_kereta tidak diisi
        if ($id_kereta == NULL) {
            $this->response(
                [
                    'status' => $id_kereta,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_kereta Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Jika data berhasil berubah
        } elseif ($this->Kereta_model->updateKereta($data, $id_kereta) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Mahasiswa Dengan id_kereta ' . $id_kereta . ' Berhasil Diubah',
                ],
                RestController::HTTP_CREATED
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Gagal Mengubah Data',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
    function krt_delete()
    {
        $id_kereta = $this->delete('id_kereta');
        //Jika field id_kereta tidak diisi
        if ($id_kereta == NULL) {
            $this->response(
                [
                    'status' => $id_kereta,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_kereta Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Kondisi ketika OK
        } elseif ($this->Kereta_model->deleteKereta($id_kereta) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data Mahasiswa Dengan id_kereta ' . $id_kereta . ' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
            //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Mahasiswa Dengan id_kereta ' . $id_kereta . ' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}
