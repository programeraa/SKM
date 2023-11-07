<?php 

class M_laporan extends CI_Model{

    function tampil_data_omzet_vision(){
        return $this->db->get('omzet_aavision');
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
