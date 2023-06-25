<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suratterimakasih extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('galery_model', 'galery');
        // $this->load->model('pengajuan_track_model', 'pengajuan_track');
        // $this->load->model('M_Penduduk', 'penduduk');

        $this->load->helper(array('form', 'url', 'Cookie', 'String'));
        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->form_validation->set_rules('nama_surat', 'Nama Surat', 'required');
        $this->form_validation->set_rules('tempat_surat', 'Keterangan', 'required');
        $this->form_validation->set_rules('tanggal_surat', 'Keterangan', 'required');
        $this->form_validation->set_rules('prodi_surat', 'Keterangan', 'required');
        // $this->form_validation->set_rules('file_surat', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $judul = [
                'title' => 'Tracking',
                'sub_title' => 'Buat Surat Terima Kasih KP'
            ];
            $this->load->view('frontend/header2', $judul);
            $this->load->view('frontend/s_terimakasih');
            $this->load->view('frontend/footer2');
        } else {
            $nama_surat =  $this->input->post("nama_surat", TRUE);
            $tempat_surat =  $this->input->post("tempat_surat", TRUE);
            $tanggal_surat =  $this->input->post("tanggal_surat", TRUE);
            $prodi_surat =  $this->input->post("prodi_surat", TRUE);
            // $file_surat =  $this->input->post("file_surat", TRUE);

            $config['upload_path']          = './uploads/terima_kasih';
            $config['allowed_types']        = 'pdf|doc|docx';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_surat')) {

                $data = array('upload_data' => $this->upload->data());
                $file_surat = $data['upload_data']['file_name'];

                $save = [
                    'nama_terima_kasih' => $nama_surat,
                    'tempat_terima_kasih' => $tempat_surat,
                    'tanggal_terima_kasih' => date('Y-m-d', strtotime($tanggal_surat)),
                    'prodi_terima_kasih' => $prodi_surat,
                    'file_terima_kasih' => $file_surat
                ];

                $this->db->insert('terima_kasih', $save);
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
                $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Selamat!</h5> Berhasil Menambahkan Surat Terima Kasih Kerja Praktek!</div>');
                redirect(base_url("suratterimakasih"));
            }
        }
    }

}
