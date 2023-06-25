<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Rekapan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('galery_model','galery');
        $this->load->model('dashboard_model', 'dashboard');
        $this->load->model('pengajuan_track_model','pengajuan_track');
    }

    public function index()
    {
        $judul = [
            'title' => 'Rekapan Data',
            'sub_title' => '',
            'notifikasiBaak' => $this->dashboard->total_rows_baak(),
            'notifikasiKoor' => $this->dashboard->total_rows_koor(),
            'notifikasiSurat' => $this->dashboard->total_rows_surat()
        ];

        $data['data'] = $this->db->get('rekapan')->result_array();
        $this->load->view('templates/header', $judul);
        $this->load->view('rekapan/index',$data);
        $this->load->view('templates/footer');
    }

    public function data_mahasiswa()
    {

        $this->form_validation->set_rules('nama_1', 'Nama_1', 'required|trim');
        $this->form_validation->set_rules('nama_2', 'Nama_2');
        $this->form_validation->set_rules('nama_3', 'Nama_3');
        $this->form_validation->set_rules('nrp_1', 'Nrp_1', 'required|trim');
        $this->form_validation->set_rules('nrp_2', 'Nrp_2');
        $this->form_validation->set_rules('nrp_3', 'Nrp_3');
        $this->form_validation->set_rules('rekening_1', 'Rekening_1', 'required|trim');
        $this->form_validation->set_rules('rekening_2', 'Rekening_2');
        $this->form_validation->set_rules('rekening_3', 'Rekening_3');
        $this->form_validation->set_rules('tempat', 'Tempat', 'required|trim');
        $this->form_validation->set_rules('dospem', 'Dospem', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $judul = [
                'title' => 'Tracking',
                'sub_title' => ''
            ];
            $this->load->view('frontend/header2', $judul);
            $this->load->view('frontend/data_mahasiswa');
            $this->load->view('frontend/footer2');
        } else {
            $nama_1 =  $this->input->post("nama_1", TRUE);
            $nama_2 =  $this->input->post("nama_2", TRUE);
            $nama_3 =  $this->input->post("nama_3", TRUE);
            $nrp_1 =  $this->input->post("nrp_1", TRUE);
            $nrp_2 =  $this->input->post("nrp_2", TRUE);
            $nrp_3 =  $this->input->post("nrp_3", TRUE);
            $rekening_1 =  $this->input->post("rekening_1", TRUE);
            $rekening_2 =  $this->input->post("rekening_2", TRUE);
            $rekening_3 =  $this->input->post("rekening_3", TRUE);
            $tempat =  $this->input->post("tempat", TRUE);
            $dospem =  $this->input->post("dospem", TRUE);

            $save = [
                'nama_1' => $nama_1,
                'nama_2' => $nama_2,
                'nama_3' => $nama_3,
                'nrp_1' => $nrp_1,
                'nrp_2' => $nrp_2,
                'nrp_3' => $nrp_3,
                'rekening_1' => $rekening_1,
                'rekening_2' => $rekening_2,
                'rekening_3' => $rekening_3,
                'tempat' => $tempat,
                'dospem' => $dospem

            ];

            $this->db->insert('rekapan', $save);
            $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Selamat!</h5> Berhasil Menambahkan Data Mahasiswa!</div>');
            redirect(base_url("rekapan/data_mahasiswa"));
            
        }
    }

    public function hapus($id)
    {

        $data = $this->db->get_where('rekapan', ['id_rekapan' => $id])->row_array();

        $this->db->where(['id_rekapan' => $id]);
        $this->db->delete('rekapan');
        $this->session->set_flashdata('success', '<div class="alert alert-success">Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect(base_url('rekapan/index'));
    }

    public function export()
    {    
        $spreadsheet = new Spreadsheet();    
        $sheet = $spreadsheet->getActiveSheet();  

        // Buat sebuah variabel untuk menampung pengaturan style dari judul tabel    
        $style_title = [      
            'font' => ['bold' => true], // Set font nya jadi bold      
            'alignment' => [        
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)        
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)      
            ]  
        ]; 

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

        $sheet->setCellValue('A1', "DATA DAN NOMOR REKENING MAHASISWA KERJA PRAKTEK"); // Set kolom A1 dengan tulisan "DATA SISWA"    
        $sheet->mergeCells('A1:L1'); // Set Merge Cell pada kolom A1 sampai E1 
        $sheet->getStyle('A1')->applyFromArray($style_title);     

        // Buat header tabel nya pada baris ke 3    
        $sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"   
        $sheet->mergeCells('A3:A4'); 
        $sheet->setCellValue('B3', "TEMPAT KERJA PRAKTEK"); 
        $sheet->mergeCells('B3:B4');
        $sheet->setCellValue('C3', "MAHASISWA 1");   
        $sheet->mergeCells('C3:E3');
        $sheet->setCellValue('F3', "MAHASISWA 2");
        $sheet->mergeCells('F3:H3');
        $sheet->setCellValue('I3', "MAHASISWA 3");
        $sheet->mergeCells('I3:K3');
        $sheet->setCellValue('L3', "PEMBIMBING");
        $sheet->mergeCells('L3:L4');

        $sheet->setCellValue('C4', "NRP");
        $sheet->setCellValue('D4', "NAMA");
        $sheet->setCellValue('E4', "NO REKENING");
        $sheet->setCellValue('F4', "NRP");
        $sheet->setCellValue('G4', "NAMA");
        $sheet->setCellValue('H4', "NO REKENING");
        $sheet->setCellValue('I4', "NRP");
        $sheet->setCellValue('J4', "NAMA");
        $sheet->setCellValue('K4', "NO REKENING");

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header    
        $sheet->getStyle('A3')->applyFromArray($style_col);    
        $sheet->getStyle('B3')->applyFromArray($style_col);    
        $sheet->getStyle('C3')->applyFromArray($style_col);    
        $sheet->getStyle('F3')->applyFromArray($style_col);    
        $sheet->getStyle('I3')->applyFromArray($style_col);  
        $sheet->getStyle('L3')->applyFromArray($style_col);    
        $sheet->getStyle('C4')->applyFromArray($style_col);    
        $sheet->getStyle('D4')->applyFromArray($style_col);    
        $sheet->getStyle('E4')->applyFromArray($style_col);    
        $sheet->getStyle('F4')->applyFromArray($style_col);  
        $sheet->getStyle('G4')->applyFromArray($style_col);    
        $sheet->getStyle('H4')->applyFromArray($style_col);    
        $sheet->getStyle('I4')->applyFromArray($style_col);    
        $sheet->getStyle('J4')->applyFromArray($style_col);    
        $sheet->getStyle('K4')->applyFromArray($style_col);    

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya    
        $siswa = $this->pengajuan_track->view();    

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1    
        $numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 5    
        foreach($siswa as $data){ // Lakukan looping pada variabel siswa      
            $sheet->setCellValue('A'.$numrow, $no);      
            $sheet->setCellValue('B'.$numrow, $data->tempat);      
            $sheet->setCellValue('C'.$numrow, $data->nrp_1);      
            $sheet->setCellValue('D'.$numrow, $data->nama_1);      
            $sheet->setCellValue('E'.$numrow, $data->rekening_1); 
            $sheet->setCellValue('F'.$numrow, $data->nrp_2);      
            $sheet->setCellValue('G'.$numrow, $data->nama_2);      
            $sheet->setCellValue('H'.$numrow, $data->rekening_2);      
            $sheet->setCellValue('I'.$numrow, $data->nrp_3);      
            $sheet->setCellValue('J'.$numrow, $data->nama_3);
            $sheet->setCellValue('K'.$numrow, $data->rekening_3);      
            $sheet->setCellValue('L'.$numrow, $data->dospem);            

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)      
            $sheet->getStyle('A'.$numrow)->applyFromArray($style_row);      
            $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);      
            $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);      
            $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);      
            $sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
            $sheet->getStyle('F'.$numrow)->applyFromArray($style_row);      
            $sheet->getStyle('G'.$numrow)->applyFromArray($style_row);      
            $sheet->getStyle('H'.$numrow)->applyFromArray($style_row);      
            $sheet->getStyle('I'.$numrow)->applyFromArray($style_row);      
            $sheet->getStyle('J'.$numrow)->applyFromArray($style_row);
            $sheet->getStyle('K'.$numrow)->applyFromArray($style_row);      
            $sheet->getStyle('L'.$numrow)->applyFromArray($style_row);                 

            $no++; // Tambah 1 setiap kali looping      
            $numrow++; // Tambah 1 setiap kali looping    
        }    

        // Set width kolom    
        $sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A    
        $sheet->getColumnDimension('B')->setWidth(45);    
        $sheet->getColumnDimension('C')->setWidth(20);    
        $sheet->getColumnDimension('D')->setWidth(35);    
        $sheet->getColumnDimension('E')->setWidth(30);   
        $sheet->getColumnDimension('F')->setWidth(20);    
        $sheet->getColumnDimension('G')->setWidth(35);    
        $sheet->getColumnDimension('H')->setWidth(30);    
        $sheet->getColumnDimension('I')->setWidth(20);    
        $sheet->getColumnDimension('J')->setWidth(35);   
        $sheet->getColumnDimension('K')->setWidth(30);    
        $sheet->getColumnDimension('L')->setWidth(45);           

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)    
        $sheet->getDefaultRowDimension()->setRowHeight(-1);    

        // Set orientasi kertas jadi LANDSCAPE    
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);    

        // Set judul file excel nya    
        $sheet->setTitle("Data Rekening Mahasiswa KP");    

        // Proses file excel    
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');    
        header('Content-Disposition: attachment; filename="Data Rekening Mahasiswa KP.xlsx"'); // Set nama file excel nya    
        header('Cache-Control: max-age=0');    

        $writer = new Xlsx($spreadsheet);    
        $writer->save('php://output');  
    }
  
}
