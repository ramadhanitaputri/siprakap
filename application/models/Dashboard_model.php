<?php

class Dashboard_model extends CI_Model
{
    public function user()
    {
        return $this->db->get("user")->result_array();
    }

    public function total_rows_baak($status = NULL)
    {
    	$status = array('3', '4');
		$this->db->where_in('status', $status);
        $this->db->from('pengajuan_surat');
        return $this->db->count_all_results();
    }

    public function total_rows_koor($q = NULL)
    {
        $this->db->where('status=1', $q);
        $this->db->from('pengajuan_surat');
        return $this->db->count_all_results();
    }

    public function total_rows_surat($q = NULL)
    {
        $this->db->where('status_surat_masuk=0', $q);
        $this->db->from('surat_masuk');
        return $this->db->count_all_results();
    }

    public function view(){    
        return $this->db->get('surat_masuk')->result(); // Tampilkan semua data yang ada di tabel surat_masuk  
    }

    public function update($table, $data, $where)
    {
        $this->db->where($where)
                ->update($table, $data);
            return TRUE;
    }

}
