<?php

class Pengajuan_track_model extends CI_Model
{
    public function insert_p_surat($data)
    {
        $query= $this->db->insert('pengajuan_surat',$data);
        if($query){
            return true;
            return $query;
        }else{
            return false;
        }
    }

    public function findById($id)
    {
        $query = $this->db->get_where('pengajuan_surat', ['id' => $id])->row_array();
        return $query;
    }

    public function showById($id)
    {
        $this->db->select('*');
        $this->db->join('penduduk','penduduk.nik=pengajuan_surat.NIK');
        $query = $this->db->get_where('pengajuan_surat', ['id' => $id])->row_array();
        return $query;
    }

    public function numberById($id)
    {
        $this->db->select('*');
        $this->db->join('surat_keluar','surat_keluar.keterangan_surat_keluar=pengajuan_surat.id');
        $query = $this->db->get_where('pengajuan_surat', ['id' => $id])->row_array();
        return $query;
    }

    public function getId($id)
    {
        $this->db->select('*');
        $query = $this->db->get_where('surat_keluar', ['id_surat_keluar' => $id])->row_array();
        return $query;
    }

    public function view(){    
        return $this->db->get('rekapan')->result(); // Tampilkan semua data yang ada di tabel rekapan  
    }
}
