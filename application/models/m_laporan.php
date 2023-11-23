<?php 

class M_laporan extends CI_Model{

    function tampil_data_omzet(){
        $this->db->select('*');
        $this->db->from('omzet');
        $this->db->join('komisi','komisi.id_komisi = omzet.id_komisi','inner');
        $this->db->join('omzet_aavision','omzet.id_omzet = omzet_aavision.id_omzet','inner');
        
        $this->db->order_by('omzet_aavision.id_omzetvision', 'ASC');

        $query = $this->db->get();
        return $query->result();
    }

    function getDataByDateRange_omzet($dari, $ke, $marketing){
        $this->db->select('*');
        $this->db->from('omzet');
        $this->db->join('komisi','komisi.id_komisi = omzet.id_komisi','inner');
        $this->db->join('omzet_aavision','omzet.id_omzet = omzet_aavision.id_omzet','inner');

        if (!empty($dari) && !empty($ke)) {
            $this->db->where('tgl_closing_komisi >=', $dari);
            $this->db->where('tgl_closing_komisi <=', $ke);
        }

        if (!empty($marketing)) {
            $this->db->where('id_marketing =', $marketing);
        }

        $query = $this->db->get();
        return $query->result();
    }

    function tampil_data_pph(){
        $this->db->select('*');
        $this->db->from('komisi');
        $this->db->join('co_broke','komisi.id_komisi = co_broke.id_komisi','inner');
        $this->db->join('master_pph','master_pph.id_komisi = komisi.id_komisi','inner');
        $this->db->join('master_pph_cobroke','master_pph_cobroke.id_pph = master_pph.id_pph','inner');

        $query = $this->db->get();
        return $query->result();
    }

    function getDataByDateRange_pph($dari, $ke){
        $this->db->select('*');
        $this->db->from('komisi');
        $this->db->join('co_broke','komisi.id_komisi = co_broke.id_komisi','inner');
        $this->db->join('master_pph','master_pph.id_komisi = komisi.id_komisi','inner');
        $this->db->join('master_pph_cobroke','master_pph_cobroke.id_pph = master_pph.id_pph','inner');

        $this->db->where('tgl_closing_komisi >=', $dari);
        $this->db->where('tgl_closing_komisi <=', $ke);

        $query = $this->db->get();
        return $query->result();
    }

    function tampil_data_pph_vision(){
        $this->db->select('*');
        $this->db->from('master_pph_aavision');
        $this->db->join('master_pph','master_pph.id_pph = master_pph_aavision.id_pph','inner');
        $this->db->join('komisi','master_pph.id_komisi = komisi.id_komisi','inner');

        $query = $this->db->get();
        return $query->result();
    }

    function getDataByDateRangePphVision($dari, $ke){
        $this->db->select('*');
        $this->db->from('master_pph_aavision');
        $this->db->join('master_pph','master_pph.id_pph = master_pph_aavision.id_pph','inner');
        $this->db->join('komisi','master_pph.id_komisi = komisi.id_komisi','inner');

        if (!empty($dari) && !empty($ke)) {
            $this->db->where('tgl_closing_komisi >=', $dari);
            $this->db->where('tgl_closing_komisi <=', $ke);
        }

        $query = $this->db->get();
        return $query->result();
    }

    // function tampil_data_omzet_marketing(){
    //     $this->db->select('id_marketing, SUM(fee_kantor) as total_kantor');
    //     $this->db->group_by('id_marketing');
    //     $query = $this->db->get('omzet_aavision');
    //     return $query->result();
    // }

    function tampil_data_omzet_vision(){
        return $this->db->get('omzet_aavision');
    }

    function simpan_omzet($data_omzet){
        $this->db->insert('omzet',$data_omzet);
    }

    function get_last_inserted_id_data_omzet() {
        return $this->db->insert_id();
    }

    function simpan_pph($data_pph){
        $this->db->insert('master_pph',$data_pph);
    }

    function get_last_inserted_id_data_pph() {
        return $this->db->insert_id();
    }

    function hapus_omzet($where){
        $this->db->where($where);
        $this->db->delete('omzet',$where);
    }

    function hapus_pph($where){
        $this->db->where($where);
        $this->db->delete('master_pph',$where);
    }

    function simpan_pph_cobroke($data_pph_cobroke){
        $this->db->insert('master_pph_cobroke',$data_pph_cobroke);
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

    function simpan_ang($data_ang){
        $this->db->insert('omzet_aavision',$data_ang);
    }
    function simpan_fran($data_fran){
        $this->db->insert('omzet_aavision',$data_fran);
    }
    function simpan_win($data_win){
        $this->db->insert('omzet_aavision',$data_win);
    }

    //=================================================================

    function simpan_pph1($dataX1){
        $this->db->insert('master_pph_aavision',$dataX1);
    }

    function simpan_pph2($dataX2){
        $this->db->insert('master_pph_aavision',$dataX2);
    }

    function simpan_pph3($dataX3){
        $this->db->insert('master_pph_aavision',$dataX3);
    }

    function simpan_pph4($dataX4){
        $this->db->insert('master_pph_aavision',$dataX4);
    }

    //===============================================upline listing 1

    function simpan_fgs1_listing1($dataUp1L1){
        $this->db->insert('master_pph_aavision',$dataUp1L1);
    }

    function simpan_fgs2_listing1($dataUp2L1){
        $this->db->insert('master_pph_aavision',$dataUp2L1);
    }

    //===============================================upline listing 2

    function simpan_fgs1_listing2($dataUp1L2){
        $this->db->insert('master_pph_aavision',$dataUp1L2);
    }

    function simpan_fgs2_listing2($dataUp2L2){
        $this->db->insert('master_pph_aavision',$dataUp2L2);
    }

    //===============================================upline selling 1

    function simpan_fgs1_selling1($dataUp1S1){
        $this->db->insert('master_pph_aavision',$dataUp1S1);
    }

    function simpan_fgs2_selling1($dataUp2S1){
        $this->db->insert('master_pph_aavision',$dataUp2S1);
    }

    //===============================================upline selling 2

    function simpan_fgs1_selling2($dataUp1S2){
        $this->db->insert('master_pph_aavision',$dataUp1S2);
    }

    function simpan_fgs2_selling2($dataUp2S2){
        $this->db->insert('master_pph_aavision',$dataUp2S2);
    }
}
