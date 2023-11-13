<?php 

class M_banktitipan extends CI_Model{

	function tampil_data(){
        $this->db->select('*');
        $this->db->from('bank_titipan_a');
        $this->db->join('marketing','marketing.id_mar = bank_titipan_a.id_marketing','inner');

        $query = $this->db->get();
        return $query->result();
    }

    function getDataByDateRange_Jurnal($dari, $ke){
        $this->db->select('*');
        $this->db->from('bank_titipan_a');
        $this->db->join('marketing','marketing.id_mar = bank_titipan_a.id_marketing','inner');

        $this->db->where('tgl_input >=', $dari);
        $this->db->where('tgl_input <=', $ke);

        $query = $this->db->get();
        return $query->result();
    }

    function tampil_data_kredit($where_2){
        return $this->db->get_where('kredit_bank_titipan_a',$where_2);
    }

    function tampil_kredit_jl(){
        return $this->db->get('kredit_bank_titipan_a');
    }

    function simpan($data){
    	$this->db->insert('bank_titipan_a',$data);
    }

    function simpan_kredit($data_kredit){
        $this->db->insert('kredit_bank_titipan_a',$data_kredit);
    }

    function rincian_bt($where){
        $this->db->select('*');
        $this->db->from('bank_titipan_a');
        $this->db->join('marketing','marketing.id_mar = bank_titipan_a.id_marketing','inner');
        $this->db->where($where);

        $query = $this->db->get();
        return $query->result();
    }

    function edit($where){
        return $this->db->get_where('bank_titipan_a',$where);
    }

    function update($where,$data){
    	$this->db->where($where);
    	$this->db->update('bank_titipan_a',$data);
    }

    function update_kredit($where,$data){
        $this->db->where($where);
        $this->db->update('kredit_bank_titipan_a',$data);
    }

    function hapus($where){
    	$this->db->where($where);
    	$this->db->delete('bank_titipan_a',$where);
    }

    function hapus_kredit_bt($where){
        $this->db->where($where);
        $this->db->delete('kredit_bank_titipan_a',$where);
    }

}
