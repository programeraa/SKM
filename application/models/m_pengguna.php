<?php 

class M_pengguna extends CI_Model{

	function tampil_data(){
		return $this->db->get('pengguna');
	}

    function simpan($data){
    	$this->db->insert('pengguna',$data);
    }

    function edit($where){
    	return $this->db->get_where('pengguna',$where);
    }

    function update($where,$data){
    	$this->db->where($where);
    	$this->db->update('pengguna',$data);
    }

    function hapus($where){
    	$this->db->where($where);
    	$this->db->delete('pengguna',$where);
    }

}
