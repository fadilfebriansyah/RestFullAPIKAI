<?php
defined('BASEPATH') or exit('No direct script access allowed');
//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Penumpang extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penumpang_model');
    }
    //fungsi CRUD (GET, POST, PUT, DELETE) simpan di bawah sini

    public function pnp_get()
    {
        $id_penumpang = $this->get('id_penumpang');
        $data = $this->Penumpang_model->getDataPenumpang($id_penumpang);

        //jika variabel $data terdapat data didalamnya
        if ($data) {
            $this->response(
                [
                    'data' => $data,
                    'status' => 'success',
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
    function pnp_post()
    {
        $data = array(
            'id_penumpang' => $this->post('id_penumpang'),
            'nama_penumpang' => $this->post('nama_penumpang'),
            'alamat_penumpang' => $this->post('alamat_penumpang'),
            'no_hp' => $this->post('no_hp'),
            'email_penumpang' => $this->post('email_penumpang')

        );
        $cek_data = $this->Penumpang_model->getDataPenumpang($this->post('id_penumpang'));
        //Jika semua data wajib diisi
        if (
            $data['id_penumpang'] == NULL || $data['nama_penumpang'] == NULL || $data['alamat_penumpang']
            == NULL || $data['no_hp'] == NULL || $data['email_penumpang'] == NULL
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
        } elseif ($this->Penumpang_model->insertPenumpang($data) > 0) {
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
    function pnp_put()
    {
        $id_penumpang = $this->put('id_penumpang');
        $data = array(
            'nama_penumpang' => $this->put('nama_penumpang'),
            'alamat_penumpang' => $this->put('alamat_penumpang'),
            'no_hp' => $this->put('no_hp'),
            'email_penumpang' => $this->put('email_penumpang')
        );
        //Jika field id_penumpang tidak diisi
        if ($id_penumpang == NULL) {
            $this->response(
                [
                    'status' => $id_penumpang,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_penumpang Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Jika data berhasil berubah
        } elseif ($this->Penumpang_model->updatePenumpang($data, $id_penumpang) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Penumpang Dengan id_penumpang ' . $id_penumpang . ' Berhasil Diubah',
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
    function pnp_delete()
    {
        $id_penumpang = $this->delete('id_penumpang');
        //Jika field id_penumpang tidak diisi
        if ($id_penumpang == NULL) {
            $this->response(
                [
                    'status' => $id_penumpang,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_penumpang Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Kondisi ketika OK
        } elseif ($this->Penumpang_model->deletePenumpang($id_penumpang) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data Penumpang Dengan id_penumpang ' . $id_penumpang . ' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
            //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Penumpang Dengan id_penumpang ' . $id_penumpang . ' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}
