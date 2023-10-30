<?php 

class M_pengaturan extends CI_Model{

	function tampil_data_jabatan(){
		return $this->db->get('jabatan_pengaturan');
	}

    function simpan_jabatan($data){
    	$this->db->insert('jabatan_pengaturan',$data);
    }

    function update_jabatan($where,$data){
    	$this->db->where($where);
    	$this->db->update('jabatan_pengaturan',$data);
    }

    function hapus_jabatan($where){
    	$this->db->where($where);
    	$this->db->delete('jabatan_pengaturan',$where);
    }

}
