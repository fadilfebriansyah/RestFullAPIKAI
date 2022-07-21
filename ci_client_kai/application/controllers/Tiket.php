<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tiket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tiket_model'); //load model Tiket
        $this->load->model('Kereta_model');
        $this->load->model('Penumpang_model');
        $this->load->library('Form_validation'); //load form validation
    }

    public function index()
    {
        $data['title'] = "List Data Tiket";

        $data['data_tiket'] = $this->Tiket_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('tiket/index', $data);
        $this->load->view('templates/footer');
    }
    public function detail($id_tiket)
    {
        $data['title'] = "Detail Data Tiket";

        $data['data_tiket'] = $this->Tiket_model->getById($id_tiket);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('tiket/detail', $data);
        $this->load->view('templates/footer');
    }
    public function add()
    {

        $data['title'] = "Tambah Data Tiket";
        $data['data_kereta'] = $this->Kereta_model->getAll();
        $data['data_penumpang'] = $this->Penumpang_model->getAll();

        $this->form_validation->set_rules('id_tiket', 'Id Tiket', 'trim|required');
        $this->form_validation->set_rules('id_kereta', 'Id Kereta', 'trim|required');
        $this->form_validation->set_rules('id_penumpang', 'Id Penumpang', 'trim|required');
        $this->form_validation->set_rules('tipe_tiket', 'Tipe Tiket', 'trim|required');
        $this->form_validation->set_rules('tanggal_tiket', 'Tanggal Tiket', 'trim|required');
        $this->form_validation->set_rules('seat_tiket', 'Seat Tiket', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('Tiket/add', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'id_tiket' => $this->input->post('id_tiket'),
                'id_kereta' => $this->input->post('id_kereta'),
                'id_penumpang' => $this->input->post('id_penumpang'),
                'tipe_tiket' => $this->input->post('tipe_tiket'),
                'tanggal_tiket' => $this->input->post('tanggal_tiket'),
                'seat_tiket' => $this->input->post('seat_tiket'),
                "KEY"           => "kai"
            ];

            $insert = $this->Tiket_model->save($data);
            if ($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data Ditambahkan Kelas NGAB');
                redirect('Tiket');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Data Duplikat NGAB!');
                redirect('Tiket');
            } else {
                $this->session->set_flashdata('message', 'Data gagal Ditambahkan NGAB!');
                redirect('Tiket');
            }
        }
    }
    public function edit($id_tiket)
    {
        $data['title'] = "Ubah Data Tiket";
        $data['data_tiket'] = $this->Tiket_model->getById($id_tiket);

        $this->form_validation->set_rules('id_tiket', 'Id Tiket', 'trim|required');
        $this->form_validation->set_rules('id_kereta', 'Id Kereta', 'trim|required');
        $this->form_validation->set_rules('id_penumpang', 'Id Penumpang', 'trim|required');
        $this->form_validation->set_rules('tipe_tiket', 'Tipe Tiket', 'trim|required');
        $this->form_validation->set_rules('tanggal_tiket', 'Tanggal Tiket', 'trim|required');
        $this->form_validation->set_rules('seat_tiket', 'Seat Tiket', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('Tiket/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_tiket' => $this->input->post('id_tiket'),
                'id_kereta' => $this->input->post('id_kereta'),
                'id_penumpang' => $this->input->post('id_penumpang'),
                'tipe_tiket' => $this->input->post('tipe_tiket'),
                'tanggal_tiket' => $this->input->post('tanggal_tiket '),
                'seat_tiket' => $this->input->post('seat_tiket'),
                "KEY" => "kai"
            ];

            $update = $this->Tiket_model->update($data);
            if ($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Anjay Data Diubah NGAB');
                redirect('Tiket');
            } elseif ($update['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Gagal NGAB');
                redirect('Tiket');
            } else {
                $this->session->set_flashdata('message', 'Gagal WOY NGAB!!');
                redirect('Tiket');
            }
        }
    }
    public function delete($id_tiket)
    {
        $update = $this->Tiket_model->delete($id_tiket);
        if ($update['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Data Dihapus NGAB');
            redirect('Tiket');
        } else {
            $this->session->set_flashdata('message', 'Gagal!!');
            redirect('Tiket');
        }
    }
}
