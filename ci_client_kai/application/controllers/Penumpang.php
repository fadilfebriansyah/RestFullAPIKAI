<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penumpang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penumpang_model'); //load model Penumpang
        $this->load->library('Form_validation'); //load form validation
    }

    public function index()
    {
        $data['title'] = "List Data Penumpang";

        $data['data_penumpang'] = $this->Penumpang_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('penumpang/index', $data);
        $this->load->view('templates/footer');
    }
    public function detail($id_penumpang)
    {
        $data['title'] = "Detail Data Penumpang";

        $data['data_Penumpang'] = $this->Penumpang_model->getById($id_penumpang);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('penumpang/detail', $data);
        $this->load->view('templates/footer');
    }
    public function add()
    {

        $data['title'] = "Tambah Data Penumpang";

        $this->form_validation->set_rules('id_penumpang', 'Id Penumpang', 'trim|required');
        $this->form_validation->set_rules('nama_penumpang', 'Nama Penumpang', 'trim|required');
        $this->form_validation->set_rules('alamat_penumpang', 'Kelas Kereta', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'Berangkat Kereta', 'trim|required');
        $this->form_validation->set_rules('email_penumpang', 'Tiba Kereta', 'trim|required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('Penumpang/add', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'id_penumpang' => $this->post('id_penumpang'),
                'nama_penumpang' => $this->post('nama_penumpang'),
                'alamat_penumpang ' => $this->post('alamat_penumpang'),
                'no_hp' => $this->post('no_hp'),
                'email_penumpang' => $this->post('email_penumpang'),
                "KEY"           => "kai"
            ];

            $insert = $this->Penumpang_model->save($data);
            if ($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data Ditambahkan Kelas NGAB');
                redirect('Penumpang');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Data Duplikat NGAB!');
                redirect('Penumpang');
            } else {
                $this->session->set_flashdata('message', 'Data gagal Ditambahkan NGAB!');
                redirect('Penumpang');
            }
        }
    }
    public function edit($id_penumpang)
    {
        $data['title'] = "Ubah Data Penumpang";
        $data['data_Penumpang'] = $this->Penumpang_model->getById($id_penumpang);

        $this->form_validation->set_rules('id_penumpang', 'Id Penumpang', 'trim|required');
        $this->form_validation->set_rules('nama_penumpang', 'Nama Penumpang', 'trim|required');
        $this->form_validation->set_rules('alamat_penumpang', 'Kelas Kereta', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'Berangkat Kereta', 'trim|required');
        $this->form_validation->set_rules('email_penumpang', 'Tiba Kereta', 'trim|required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('penumpang/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_penumpang' => $this->put('id_penumpang'),
                'nama_penumpang' => $this->put('nama_penumpang'),
                'alamat_penumpang ' => $this->put('alamat_penumpang'),
                'no_hp' => $this->put('no_hp'),
                'email_penumpang' => $this->put('email_penumpang'),
                "KEY" => "kai"
            ];

            $update = $this->Penumpang_model->update($data);
            if ($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Anjay Data Diubah NGAB');
                redirect('Penumpang');
            } elseif ($update['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Gagal NGAB');
                redirect('Penumpang');
            } else {
                $this->session->set_flashdata('message', 'Gagal WOY NGAB!!');
                redirect('Penumpang');
            }
        }
    }
    public function delete($id_penumpang)
    {
        $update = $this->Penumpang_model->delete($id_penumpang);
        if ($update['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Data Dihapus NGAB');
            redirect('Penumpang');
        } else {
            $this->session->set_flashdata('message', 'Gagal!!');
            redirect('Penumpang');
        }
    }
}
