<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suratonline extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('galery_model', 'galery');
        $this->load->model('pengajuan_track_model', 'pengajuan_track');
        $this->load->model('M_Penduduk', 'penduduk');

        $this->load->helper(array('form', 'url', 'Cookie', 'String'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        // $data = $this->dashboard->user();
        $data['profil'] = $this->galery->profil();
        $judul = [
            'title' => 'Pengajuan Surat Online',
            'sub_title' => ''
        ];

        $data['options'] = [
            'Pilih',
            'Program Studi' => [
                'IT' => 'Teknik Informatika',
                'MMB' => 'Multimedia Broadcasting',
            ],
        ];

        // $data['sm'] = $this->db->get('surat_masuk')->row_array();
        // var_dump($data);
        $this->load->view('frontend/header2', $judul);
        $this->load->view('frontend/s_online', $data);
        $this->load->view('frontend/footer2', $data);
    }

    public function ajukan()
    {
        $status = [
            1 => 1,  // Pending
            2 => 2,  // Diterima dan Dilanjutkan
            3 => 3,  // Sudah Diketik dan Diparaf
            4 => 4,  // Sudah Ditandatangani Lurah dan Selesai
        ];

        $nama = $this->input->post('nama', TRUE);
        $nik = $this->input->post('nik', TRUE);
        $nama_mhs_2 = $this->input->post('nama_mhs_2', TRUE);
        $nrp_mhs_2 = $this->input->post('nrp_mhs_2', TRUE);
        $nama_mhs_3 = $this->input->post('nama_mhs_3', TRUE);
        $nrp_mhs_3 = $this->input->post('nrp_mhs_3', TRUE);
        $no_hp = $this->input->post('no_hp', TRUE);
        $jenis_surat = $this->input->post('jenis_surat', TRUE);

        $ceknik = $this->penduduk->cek_penduduk($nik)->num_rows();

        if ($ceknik <= 0) {
            $save = [
                'nik' => $nik,
                'nama' => $nama,
                'no_hp' => $no_hp,
                'nrp_mhs_2' => $nrp_mhs_2,
                'nama_mhs_2' => $nama_mhs_2,
                'nrp_mhs_3' => $nrp_mhs_3,
                'nama_mhs_3' => $nama_mhs_3
            ];

            $this->db->insert('penduduk', $save);
            // $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-cross"></i> Maaf!</h5> NIK Anda tidak Terdaftar!</div>');
            // redirect(base_url("suratonline"));
        }

        //Output a v4 UUID 
        $rid = uniqid($jenis_surat, TRUE);
        $rid2 = str_replace('.', '', $rid);
        $rid3 = substr(str_shuffle($rid2), 0, 3);

        $cc = $this->db->count_all('pengajuan_surat') + 1;
        $count = str_pad($cc, 3, STR_PAD_LEFT);
        $id = $jenis_surat . "-";
        $d = date('d');
        $y = date('y');
        $mnth = date("m");
        $s = date('s');
        $randomize = $d + $y + $mnth + $s;
        $id = $id . $rid3 . $randomize . $count . $y;

        // var_dump($id);
        // die;

        if ($_FILES['file']['size'] >= 5242880) {
            $this->session->set_flashdata('success', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i> MAAF!</h5> File Lebih 2MB!</div>');
            redirect(base_url("suratonline"));
        }

        if ($_FILES['file']['name'] == null) {
            $file = '-';
        } else {
            $namafile = substr($_FILES['file']['name'],-7);
            $file = $jenis_surat.uniqid().$namafile;
            $config['upload_path']          = './uploads/berkas';
            $config['allowed_types']        = '*';
            $config['max_size']             = 5120; // 5MB
            $config['file_name']            = $file;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload("file")) {
                $data = array('upload_data' => $this->upload->data());
                $berkas = $data['upload_data']['file_name'];
            }
        }

        $data = [
            'id' => $id,
            // 'nama' => $nama,
            'nik' => $nik,
            // 'nrp_mhs_2' => $nrp_mhs_2,
            // 'nama_mhs_2' => $nama_mhs_2,
            // 'nrp_mhs_3' => $nrp_mhs_3,
            // 'nama_mhs_3' => $nama_mhs_3,
            // 'no_hp' => $no_hp,
            'jenis_surat' => $jenis_surat,
            'file' => $file,
            'tanggal' => date('Y-m-d'),
            'status' => $status[1]
        ];

        // var_dump($data);
        // die;

        $this->pengajuan_track->insert_p_surat($data);
        $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Selamat!</h5> Berhasil Mengajukan Proposal! Berikut <b>ID</b> anda: <b>' . $id . '</b></div>');
        redirect(base_url("suratonline")); 
    } 
}
