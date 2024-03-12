<?php 

class M_pengguna extends CI_Model{

	function tampil_data(){
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->join('level_pengaturan','level_pengaturan.id_level = pengguna.level_pengguna','inner');

        $query = $this->db->get();
        return $query->result();
    }

    // function tampil_data_admin(){
    //     $this->db->where_in('level_pengguna', ['1', '2', '4']);
    //     return $this->db->get('pengguna');
    // }

    function tampil_data_admin(){
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->join('sub_komisi','pengguna.id_pengguna = sub_komisi.admin_pengguna','inner');
        $this->db->group_by('pengguna.id_pengguna');
        $query = $this->db->get();
        return $query->result();
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
