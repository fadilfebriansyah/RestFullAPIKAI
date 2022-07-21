<?php
defined('BASEPATH') or exit('No direct script access allowed');
//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Tiket extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tiket_model');
    }
    //fungsi CRUD (GET, POST, PUT, DELETE) simpan di bawah sini

    public function tkt_get()
    {
        $id_tiket = $this->get('id_tiket');
        $data = $this->Tiket_model->getDataTiket($id_tiket);

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
    function tkt_post()
    {

        $data = array(
            'id_tiket' => $this->input->post('id_tiket'),
            'id_kereta' => $this->input->post('id_kereta'),
            'id_penumpang' => $this->input->post('id_penumpang'),
            'tipe_tiket' => $this->input->post('tipe_tiket'),
            'tanggal_tiket' => $this->input->post('tanggal_tiket'),
            'seat_tiket' => $this->input->post('seat_tiket')
        );
        // $this->response(
        //     [
        //         'test' => $data['id_tiket']
        //     ],
        //     RestController::HTTP_OK
        // );
        $cek_data = $this->Tiket_model->getDataTiket($this->post('id_tiket'));
        //Jika semua data wajib diisi
        if (
            $data['id_tiket'] == NULL || $data['id_kereta'] == NULL || $data['id_penumpang'] == NULL ||  $data['tipe_tiket'] == NULL || $data['tanggal_tiket'] == NULL || $data['seat_tiket'] == NULL
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
        } elseif ($cek_data) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Duplikat',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Jika data tersimpan
        } elseif ($this->Tiket_model->insertTiket($data) > 0) {
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

    function tkt_put()
    {
        $id_tiket = $this->put('id_tiket');
        $data = array(
            'id_tiket' => $this->put('id_tiket'),
            'id_kereta' => $this->put('id_kereta'),
            'id_penumpang' => $this->put('id_penumpang'),
            'tipe_tiket' => $this->put('tipe_tiket'),
            'tanggal_tiket' => $this->put('tanggal_tiket'),
            'seat_tiket' => $this->put('seat_tiket')
        );
        //Jika field id_tiket tidak diisi
        if ($id_tiket == NULL) {
            $this->response(
                [
                    'status' => $id_tiket,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_tiket Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Jika data berhasil berubah
        } elseif ($this->Tiket_model->updateTiket($data, $id_tiket) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Tiket Dengan id_tiket ' . $id_tiket . ' Berhasil Diubah',
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
    // function tkt_put()
    // {
    //     $id_tiket = $this->put('id_tiket');
    //     $data = array(
    //         'nama_kereta' => $this->put('nama_kereta'),
    //         'nama_penumpang' => $this->put('nama_penumpang'),
    //         'tipe_tiket' => $this->put('tipe_tiket'),
    //         'tanggal_tiket' => $this->put('tanggal_tiket'),
    //         'seat_tiket' => $this->put('seat_tiket')
    //     );
    //     // $this->response(
    //     //     [
    //     //         'test' => $data['id_tiket']
    //     //     ],
    //     //     RestController::HTTP_OK
    //     // );
    //     //Jika field id_tiket tidak diisi
    //     if ($id_tiket == NULL) {
    //         $this->response(
    //             [
    //                 'status' => $id_tiket,
    //                 'response_code' => RestController::HTTP_BAD_REQUEST,
    //                 'message' => 'Id Tiket Tidak Boleh Kosong',
    //             ],
    //             RestController::HTTP_BAD_REQUEST
    //         );
    //         //Jika data berhasil berubah
    //     } elseif ($this->Tiket_model->updateTiket($data, $id_tiket) > 0) {
    //         $this->response(
    //             [
    //                 'status' => true,
    //                 'response_code' => RestController::HTTP_CREATED,
    //                 'message' => 'Data Tiket Dengan id_tiket ' . $id_tiket . ' Berhasil Diubah',
    //             ],
    //             RestController::HTTP_CREATED
    //         );
    //     } else {
    //         $this->response(
    //             [
    //                 'status' => false,
    //                 'response_code' => RestController::HTTP_BAD_REQUEST,
    //                 'message' => 'Gagal Mengubah Data',
    //             ],
    //             RestController::HTTP_BAD_REQUEST
    //         );
    //     }
    // }
    function tkt_delete()
    {
        $id_tiket = $this->delete('id_tiket');
        //Jika field id_tiket tidak diisi
        if ($id_tiket == NULL) {
            $this->response(
                [
                    'status' => $id_tiket,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_tiket Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
            //Kondisi ketika OK
        } elseif ($this->Tiket_model->deleteTiket($id_tiket) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data Tiket Dengan id_tiket ' . $id_tiket . ' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
            //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Tiket Dengan id_tiket ' . $id_tiket . ' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}
