<?php 

class M_login extends CI_Model{

	// function cek_login($where){
	// 	return $this->db->get_where('pengguna',$where);
	// }

	function cek_login($where){
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->join('level_pengaturan', 'pengguna.level_pengguna = level_pengaturan.id_level', 'inner');
		$this->db->where($where);

		return $this->db->get();
	}

}

?>