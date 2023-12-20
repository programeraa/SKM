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

    function tampil_data_kantor(){
        return $this->db->get('kantor_pengaturan');
    }

    function simpan_kantor($data){
        $this->db->insert('kantor_pengaturan',$data);
    }

    function update_kantor($where,$data){
        $this->db->where($where);
        $this->db->update('kantor_pengaturan',$data);
    }

    function hapus_kantor($where){
        $this->db->where($where);
        $this->db->delete('kantor_pengaturan',$where);
    }

    function tampil_data_level(){
        return $this->db->get('level_pengaturan');
    }

    function simpan_level($data){
        $this->db->insert('level_pengaturan',$data);
    }

    function update_level($where,$data){
        $this->db->where($where);
        $this->db->update('level_pengaturan',$data);
    }

    function hapus_level($where){
        $this->db->where($where);
        $this->db->delete('level_pengaturan',$where);
    }

}
