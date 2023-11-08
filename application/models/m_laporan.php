<?php 

class M_laporan extends CI_Model{

    function tampil_data_omzet(){
        $this->db->select('*');
        $this->db->from('omzet');
        $this->db->join('komisi','komisi.id_komisi = omzet.id_komisi','inner');
        $this->db->join('omzet_aavision','omzet.id_omzet = omzet_aavision.id_omzet','inner');

        $query = $this->db->get();
        return $query->result();
    }

    function tampil_data_omzet_vision(){
        return $this->db->get('omzet_aavision');
    }

    function simpan_omzet($data_omzet){
        $this->db->insert('omzet',$data_omzet);
    }

    function get_last_inserted_id_data_omzet() {
        return $this->db->insert_id();
    }

    function simpan1($data1){
    	$this->db->insert('omzet_aavision',$data1);
    }

    function simpan2($data2){
        $this->db->insert('omzet_aavision',$data2);
    }

    function simpan3($data3){
        $this->db->insert('omzet_aavision',$data3);
    }

    function simpan4($data4){
        $this->db->insert('omzet_aavision',$data4);
    }
}
