<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Terimainformatika extends CI_Controller
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
        $data['id'] = $this->uri->segment(3);

        $judul = [
            'title' => 'Tracking',
            'sub_title' => ''
        ];

        $data['data'] = $this->db->get_where('surat_keluar', ['keterangan_surat_keluar' => $data['id']])->result_array();

        // $data['sm'] = $this->db->get('surat_masuk')->row_array();
        // var_dump($id);
        $this->load->view('frontend/header2', $judul);
        $this->load->view('frontend/t_informatika', $data);
        $this->load->view('frontend/footer2', $data);
    } 

    public function cetak()
    {
        // mengambil data dari yang dikirim dari form index.php 
        $nomor              = $_POST['nomor'];
        $tempat             = $_POST['tempat'];
        $alamat             = $_POST['alamat'];
        $nama1              = $_POST['nama1'];
        $nama2              = $_POST['nama2'];
        $nama3              = $_POST['nama3'];
        $nrp1               = $_POST['nrp1'];
        $nrp2               = $_POST['nrp2'];
        $nrp3               = $_POST['nrp3'];
        $prodi              = $_POST['prodi'];
        $tanggal_surat      = $_POST['tanggal_surat'];

        // Tabel 1 Mahasiswa
        if ($nama2 == '' && $nama3 == '' && $nrp2 == '' && $nrp3 == '') {
            
            //mengambil dokumen surat
            $document = file_get_contents("./assets/file/SURAT_TERIMAKASIH_IT_1.rtf");
        
            //mereplace semua kata yang ada di file dengan variabel
            $document = str_replace("#NOMOR", $nomor, $document);
            $document = str_replace("#TEMPAT", $tempat, $document);
            $document = str_replace("#ALAMAT", $alamat, $document);
            $document = str_replace("#NAMA1", $nama1, $document);
            $document = str_replace("#NRP1", $nrp1, $document);
            $document = str_replace("#PRODI", $prodi, $document);
            $document = str_replace("#TANGGAL_SURAT", $tanggal_surat, $document);
         
        
            // header untuk membuka file yang dihasilkan dengna aplikasi Ms. Word
            // nama file yang dihasilkan adalah surat izin.docx
            header("Content-type: application/msword");
            header("Content-disposition: inline; filename=Surat Terima Kasih KP.doc");
            header("Content-length: " . strlen($document));
            echo $document;

        } elseif ($nama3 == '' && $nrp3 == '') { // Tabel 2 Mahasiswa

            //mengambil dokumen surat
            $document = file_get_contents("./assets/file/SURAT_TERIMAKASIH_IT_2.rtf");
        
            //mereplace semua kata yang ada di file dengan variabel
            $document = str_replace("#NOMOR", $nomor, $document);
            $document = str_replace("#TEMPAT", $tempat, $document);
            $document = str_replace("#ALAMAT", $alamat, $document);
            $document = str_replace("#NAMA1", $nama1, $document);
            $document = str_replace("#NAMA2", $nama2, $document);
            $document = str_replace("#NRP1", $nrp1, $document);
            $document = str_replace("#NRP2", $nrp2, $document);
            $document = str_replace("#PRODI", $prodi, $document);
            $document = str_replace("#TANGGAL_SURAT", $tanggal_surat, $document);
         
        
            // header untuk membuka file yang dihasilkan dengna aplikasi Ms. Word
            // nama file yang dihasilkan adalah surat izin.docx
            header("Content-type: application/msword");
            header("Content-disposition: inline; filename=Surat Terima Kasih KP.doc");
            header("Content-length: " . strlen($document));
            echo $document;

        } else { // Tabel 3 Mahasiswa
            //mengambil dokumen surat
            $document = file_get_contents("./assets/file/SURAT_TERIMAKASIH_IT_3.rtf");
         
        
            //mereplace semua kata yang ada di file dengan variabel
            $document = str_replace("#NOMOR", $nomor, $document);
            $document = str_replace("#TEMPAT", $tempat, $document);
            $document = str_replace("#ALAMAT", $alamat, $document);
            $document = str_replace("#NAMA1", $nama1, $document);
            $document = str_replace("#NAMA2", $nama2, $document);
            $document = str_replace("#NAMA3", $nama3, $document);
            $document = str_replace("#NRP1", $nrp1, $document);
            $document = str_replace("#NRP2", $nrp2, $document);
            $document = str_replace("#NRP3", $nrp3, $document);
            $document = str_replace("#PRODI", $prodi, $document);
            $document = str_replace("#TANGGAL_SURAT", $tanggal_surat, $document);
         
        
            // header untuk membuka file yang dihasilkan dengna aplikasi Ms. Word
            // nama file yang dihasilkan adalah surat izin.docx
            header("Content-type: application/msword");
            header("Content-disposition: inline; filename=Surat Terima Kasih KP.doc");
            header("Content-length: " . strlen($document));
            echo $document;
        }

    }

    public function findById($id) {
        $query = $this->db->get_where('pengajuan_surat', ['id' => $id])->row_array();
        return $query;
    }

}
