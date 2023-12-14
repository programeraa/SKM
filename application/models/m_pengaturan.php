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

    function tampil_data_member(){
        return $this->db->get('member_pengaturan');
    }

    function simpan_member($data){
        $this->db->insert('member_pengaturan',$data);
    }

    function update_member($where,$data){
        $this->db->where($where);
        $this->db->update('member_pengaturan',$data);
    }

    function hapus_member($where){
        $this->db->where($where);
        $this->db->delete('member_pengaturan',$where);
    }

}
