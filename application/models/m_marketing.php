<?php 

class M_marketing extends CI_Model{

	function tampil_data(){
		return $this->db->get('marketing');
	}

	function upline_1($condition) {
		$this->db->where($condition);
        $query = $this->db->get('marketing'); // Ganti 'nama_tabel' dengan nama tabel Anda
        return $query->result();
    }

    function simpan($data){
    	$this->db->insert('marketing',$data);
    }

    function edit($where){
    	return $this->db->get_where('marketing',$where);
    }

    function update($where,$data){
    	$this->db->where($where);
    	$this->db->update('marketing',$data);
    }

    function update2($where2, $data2){
    	$this->db->where($where2);
    	$this->db->update('marketing',$data2);
		//var_dump($data2);
    	/*die();*/
    }

    function hapus($where){
    	$this->db->where($where);
    	$this->db->delete('marketing',$where);
    }

}
