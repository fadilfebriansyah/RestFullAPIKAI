<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kereta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kereta_model'); //load model Kereta
        $this->load->library('Form_validation'); //load form validation
    }

    public function index()
    {
        $data['title'] = "List Data Kereta";

        $data['data_kereta'] = $this->Kereta_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('kereta/index', $data);
        $this->load->view('templates/footer');
    }
    public function detail($id_Kereta)
    {
        $data['title'] = "Detail Data Kereta";

        $data['data_kereta'] = $this->Kereta_model->getById($id_Kereta);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('kereta/detail', $data);
        $this->load->view('templates/footer');
    }
    public function add()
    {

        $data['title'] = "Tambah Data Kereta";

        $this->form_validation->set_rules('id_kereta', 'Id Kereta', 'trim|required');
        $this->form_validation->set_rules('nama_kereta', 'Nama Kereta', 'trim|required');
        $this->form_validation->set_rules('tujuan_kereta', 'Tujuan Kereta', 'trim|required');
        $this->form_validation->set_rules('asal_kereta', 'Asal Kereta', 'trim|required');
        $this->form_validation->set_rules('harga_kereta', 'Harga Kereta', 'trim|required');
        $this->form_validation->set_rules('berangkat_kereta', 'Berangkat Kereta', 'trim|required');
        $this->form_validation->set_rules('tiba_kereta', 'Tiba Kereta', 'trim|required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('kereta/add', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'id_kereta' => $this->post('id_kereta'),
                'nama_kereta' => $this->post('nama_kereta'),
                'tujuan_kereta ' => $this->post('tujuan_kereta'),
                'asal_kereta ' => $this->post('asal_kereta'),
                'harga_kereta' => $this->post('harga_kereta'),
                'berangkat_kereta' => $this->post('berangkat_kereta'),
                'tiba_kereta' => $this->post('tiba_kereta'),
                "KEY"           => "kai"
            ];

            $insert = $this->Kereta_model->save($data);
            if ($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data Ditambahkan Kelas NGAB');
                redirect('Kereta');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Data Duplikat NGAB!');
                redirect('Kereta');
            } else {
                $this->session->set_flashdata('message', 'Data gagal Ditambahkan NGAB!');
                redirect('Kereta');
            }
        }
    }
    public function edit($id_kereta)
    {
        $data['title'] = "Ubah Data Kereta";
        $data['data_kereta'] = $this->Kereta_model->getById($id_kereta);

        $this->form_validation->set_rules('id_kereta', 'Id Kereta', 'trim|required');
        $this->form_validation->set_rules('nama_kereta', 'Nama Kereta', 'trim|required');
        $this->form_validation->set_rules('tujuan_kereta', 'Tujuan Kereta', 'trim|required');
        $this->form_validation->set_rules('asal_kereta', 'Asal Kereta', 'trim|required');
        $this->form_validation->set_rules('harga_kereta', 'Harga Kereta', 'trim|required');
        $this->form_validation->set_rules('berangkat_kereta', 'Berangkat Kereta', 'trim|required');
        $this->form_validation->set_rules('tiba_kereta', 'Tiba Kereta', 'trim|required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('kereta/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_kereta' => $this->put('id_kereta'),
                'nama_kereta' => $this->put('nama_kereta'),
                'tujuan_kereta ' => $this->put('tujuan_kereta'),
                'asal_kereta ' => $this->put('asal_kereta'),
                'harga_kereta' => $this->put('harga_kereta'),
                'berangkat_kereta' => $this->put('berangkat_kereta'),
                'tiba_kereta' => $this->put('tiba_kereta'),
                "KEY"           => "kai"
            ];

            $update = $this->Kereta_model->update($data);
            if ($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Anjay Data Diubah NGAB');
                redirect('Kereta');
            } elseif ($update['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Gagal NGAB');
                redirect('Kereta');
            } else {
                $this->session->set_flashdata('message', 'Gagal WOY NGAB!!');
                redirect('Kereta');
            }
        }
    }
    public function delete($id_kereta)
    {
        $update = $this->Kereta_model->delete($id_kereta);
        if ($update['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Data Dihapus NGAB');
            redirect('Kereta');
        } else {
            $this->session->set_flashdata('message', 'Gagal!!');
            redirect('Kereta');
        }
    }
}
