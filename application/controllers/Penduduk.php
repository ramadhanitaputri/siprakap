<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Penduduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('dashboard_model', 'dashboard');
        $this->load->model('M_Penduduk');
    }

    public function index()
    {

        $judul = [
            'title' => 'Mahasiswa',
            'sub_title' => '',
            'notifikasiBaak' => $this->dashboard->total_rows_baak(),
            'notifikasiKoor' => $this->dashboard->total_rows_koor(),
            'notifikasiSurat' => $this->dashboard->total_rows_surat()
        ];

        $data['data'] = $this->db->get('penduduk')->result_array();
        $this->load->view('templates/header', $judul);
        $this->load->view('penduduk/index', $data);
        $this->load->view('templates/footer'); 
    }

    public function hapus($id)
    {

        $data = $this->db->get_where('penduduk', ['nik' => $id])->row_array();

        $this->db->where(['nik' => $id]);
        $this->db->delete('penduduk');
        $this->session->set_flashdata('success', '<div class="alert alert-success">Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect(base_url('penduduk'));
    }

    public function tambah()
    {

        $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $judul = [
                'title' => 'Mahasiswa',
                'sub_title' => 'Tambah Mahasiswa '
            ];
            $this->load->view('templates/header', $judul);
            $this->load->view('penduduk/tambah');
            $this->load->view('templates/footer');
        } else {
            $nik =  $this->input->post("nik", TRUE);
            $nama =  $this->input->post("nama", TRUE);
            $no_hp =  $this->input->post("no_hp", TRUE);

            $save = [
                'nik' => $nik,
                'nama' => $nama,
                'no_hp' => $no_hp

            ];

            $this->db->insert('penduduk', $save);
            $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
            redirect(base_url("penduduk"));
            
        } 
    }

    public function edit($id)
    {
        
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $judul = [
                'title' => 'Mahasiswa',
                'sub_title' => 'Edit Mahasiswa',
                'notifikasiBaak' => $this->dashboard->total_rows_baak(),
                'notifikasiKoor' => $this->dashboard->total_rows_koor(),
                'notifikasiSurat' => $this->dashboard->total_rows_surat()
            ];

            $data['penduduk'] = $this->db->get_where('penduduk', ['nik' => $id])->row_array();
            $this->load->view('templates/header', $judul);
            $this->load->view('penduduk/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $nik =  $this->input->post("nik", TRUE);
            $nama =  $this->input->post("nama", TRUE);
            $no_hp =  $this->input->post("no_hp", TRUE);

            $update = [
                'nik' => $nik,
                'nama' => $nama,
                'no_hp' => $no_hp
            ];

            $this->db->where('nik', $id);
            $this->db->update('penduduk', $update);

            $this->session->set_flashdata('success', '<div class="alert alert-success">Berhasil Diupdate!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
            redirect(base_url("penduduk"));
        }
    }

    function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->M_Penduduk->search_nik($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'  => $row->nik,
                        'nama' => $row->nama,
                        'no_hp' => $row->no_hp,
                 );
                    echo json_encode($arr_result);
            }
        }
    }

    public function approval($id)
    {
        $data['kode'] = $this->db->get_where('penduduk', ['nik'=>$id])->result_array();
        $data['get_id'] = $id;

        $mhs = $this->input->post('status_mhs[]');

        foreach($mhs as $status)
        {
            if(!empty($status))
            {
                $where = [
                    'nik'=>$id,
                ];

                $data = ['status_mhs'=>$status];
                $this->M_Penduduk->update('penduduk', $data, $where);
            }
        }

        $this->session->set_flashdata('pesan', 'Status Mahasiswa KP berhasil diverifikasi');
        redirect('penduduk');
    }

    public function export()
    {    
        $spreadsheet = new Spreadsheet();    
        $sheet = $spreadsheet->getActiveSheet();    
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel    
        $style_col = [      
            'font' => ['bold' => true], // Set font nya jadi bold      
            'alignment' => [        
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)        
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)      
            ],      
            'borders' => [        
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis        
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis        
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis        
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis      
            ]    
        ];    

        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel    
        $style_row = [      
            'alignment' => [        
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)      
            ],      
            'borders' => [        
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis        
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis        
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis        
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis      
            ]    
        ];    

        $sheet->setCellValue('A1', "DATA MAHASISWA KP"); // Set kolom A1 dengan tulisan "DATA SISWA"    
        $sheet->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1    
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1    

        // Buat header tabel nya pada baris ke 3    
        $sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"    
        $sheet->setCellValue('B3', "NRP"); // Set kolom B3 dengan tulisan "NIS"    
        $sheet->setCellValue('C3', "NAMA MAHASISWA"); // Set kolom C3 dengan tulisan "NAMA"    
        $sheet->setCellValue('D3', "TEMPAT KP"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"    
        $sheet->setCellValue('E3', "KETERANGAN"); // Set kolom E3 dengan tulisan "ALAMAT"    

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header    
        $sheet->getStyle('A3')->applyFromArray($style_col);    
        $sheet->getStyle('B3')->applyFromArray($style_col);    
        $sheet->getStyle('C3')->applyFromArray($style_col);    
        $sheet->getStyle('D3')->applyFromArray($style_col);    
        $sheet->getStyle('E3')->applyFromArray($style_col);    

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya    
        $siswa = $this->M_Penduduk->view();    

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1    
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4    
        foreach($siswa as $data){ // Lakukan looping pada variabel siswa      
            $sheet->setCellValue('A'.$numrow, $no);      
            $sheet->setCellValue('B'.$numrow, $data->nik);      
            $sheet->setCellValue('C'.$numrow, $data->nama);      
            $sheet->setCellValue('D'.$numrow, $data->no_hp);      
            $sheet->setCellValue('E'.$numrow, $data->status_mhs);            

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)      
            $sheet->getStyle('A'.$numrow)->applyFromArray($style_row);      
            $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);      
            $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);      
            $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);      
            $sheet->getStyle('E'.$numrow)->applyFromArray($style_row);            

            $no++; // Tambah 1 setiap kali looping      
            $numrow++; // Tambah 1 setiap kali looping    
        }    

        // Set width kolom    
        $sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A    
        $sheet->getColumnDimension('B')->setWidth(15); // Set width kolom B    
        $sheet->getColumnDimension('C')->setWidth(30); // Set width kolom C    
        $sheet->getColumnDimension('D')->setWidth(30); // Set width kolom D    
        $sheet->getColumnDimension('E')->setWidth(20); // Set width kolom E        

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)    
        $sheet->getDefaultRowDimension()->setRowHeight(-1);    

        // Set orientasi kertas jadi LANDSCAPE    
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);    

        // Set judul file excel nya    
        $sheet->setTitle("Data Mahasiswa KP");    

        // Proses file excel    
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');    
        header('Content-Disposition: attachment; filename="Data Mahasiswa KP.xlsx"'); // Set nama file excel nya    
        header('Cache-Control: max-age=0');    

        $writer = new Xlsx($spreadsheet);    
        $writer->save('php://output');  
    }

}
