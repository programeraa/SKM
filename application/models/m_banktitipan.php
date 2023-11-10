<?php 

class M_banktitipan extends CI_Model{

	function tampil_data(){
        $this->db->select('*');
        $this->db->from('bank_titipan_a');
        $this->db->join('marketing','marketing.id_mar = bank_titipan_a.id_marketing','inner');

        $query = $this->db->get();
        return $query->result();
    }

    function tampil_data_kredit($where_2){
        return $this->db->get_where('kredit_bank_titipan_a',$where_2);
    }

    function simpan($data){
    	$this->db->insert('bank_titipan_a',$data);
    }

    function simpan_kredit($data_kredit){
        $this->db->insert('kredit_bank_titipan_a',$data_kredit);
    }

    function edit($where){
        return $this->db->get_where('bank_titipan_a',$where);
    }

    function update($where,$data){
    	$this->db->where($where);
    	$this->db->update('bank_titipan_a',$data);
    }

    function hapus($where){
    	$this->db->where($where);
    	$this->db->delete('bank_titipan_a',$where);
    }

}
