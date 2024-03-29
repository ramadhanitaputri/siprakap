<?php

class M_Penduduk extends CI_Model
{
    function search_nik($nik){
        $this->db->like('nik', $nik , 'both');
        $this->db->order_by('nik', 'ASC');
        $this->db->limit(10);
        return $this->db->get('penduduk')->result();
    }

    public function cek_penduduk($nik)
    {
        return $this->db->get_where('penduduk', array('nik' => $nik));
    }

    public function view(){    
        return $this->db->get('penduduk')->result(); // Tampilkan semua data yang ada di tabel penduduk  
    }

    public function update($table, $data, $where)
    {
        $this->db->where($where)
                ->update($table, $data);
            return TRUE;
    }

}
