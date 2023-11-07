<?php 

class M_pengguna extends CI_Model{

	function tampil_data(){
		return $this->db->get('pengguna');
	}

    function tampil_data_admin(){
        $this->db->where('level_pengguna', 'Administrator');
        return $this->db->get('pengguna');
    }

    function simpan($data){
    	$this->db->insert('pengguna',$data);
    }

    function get_pengguna_by_id($id_pengguna){
        return $this->db->get_where('pengguna', array('id_pengguna' => $id_pengguna))->row();
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
