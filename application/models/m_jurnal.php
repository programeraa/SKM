<?php 

class M_jurnal extends CI_Model{

    function tampil_data_jurnal(){
        $bulan_tahun_sekarang = date('Y-m');

        $this->db->select('*');
        $this->db->from('jurnal_umum');
        $this->db->join('jurnal_bttb','jurnal_umum.id_bttb = jurnal_bttb.id_bttb','left');
        $this->db->where("DATE_FORMAT(tgl_input_jurnal, '%Y-%m') = '$bulan_tahun_sekarang'");
        //$this->db->order_by("CASE WHEN keterangan_jurnal LIKE '%Saldo Awal%' THEN 1 ELSE 2 END", 'ASC');
        $this->db->order_by('tgl_input_jurnal', 'ASC');

        $query = $this->db->get();
        return $query->result();
    }

    function tampil_data_jurnal_2(){

        $this->db->select('*');
        $this->db->from('jurnal_umum');
        $this->db->join('jurnal_bttb','jurnal_umum.id_bttb = jurnal_bttb.id_bttb','left');
        $this->db->order_by('tgl_input_jurnal', 'ASC');

        $query = $this->db->get();
        return $query->result();
    }

    function filter_jurnal($dari, $ke, $j_kode, $kode_per, $kode, $tgl, $bt){
        $this->db->select('*');
        $this->db->from('jurnal_umum');
        $this->db->join('jurnal_bttb','jurnal_umum.id_bttb = jurnal_bttb.id_bttb','left');
        $this->db->order_by('tgl_input_jurnal ASC, id_jurnal ASC');

        if (!empty($dari) && !empty($ke)) {
            $this->db->where('tgl_input_jurnal >=', $dari);
            $this->db->where('tgl_input_jurnal <=', $ke);
        }

        if (!empty($j_kode)) {
            $this->db->like('jurnal_bttb.kode_perkiraan', $j_kode);
        }

        if (!empty($kode_per)) {
            $this->db->like('jurnal_umum.id_bttb', $kode_per);
        }

        if (!empty($kode) && !empty($tgl)) {
            $this->db->where('tgl_input_jurnal >=', $tgl);
            $this->db->where('tgl_input_jurnal <=', $tgl);
            $this->db->group_start();
            $this->db->like('kode_perkiraan', $kode);
            $this->db->or_like('kode_perkiraan', $bt);
            $this->db->group_end();
        }


        $query = $this->db->get();
        return $query->result();
    }

    function simpan_jurnal($data){
        $this->db->insert('jurnal_umum',$data);
    }

    function edit_jurnal($where){
        $this->db->select('*');
        $this->db->from('jurnal_umum');
        $this->db->join('jurnal_bttb','jurnal_umum.id_bttb = jurnal_bttb.id_bttb','inner');
        $this->db->where($where);
        $this->db->order_by('jurnal_umum.id_jurnal', 'ASC');

        return $this->db->get();
    }

    function update_jurnal($where,$data){
        $this->db->where($where);
        $this->db->update('jurnal_umum',$data);
    }

    function hapus_jurnal($where){
        $this->db->where($where);
        $this->db->delete('jurnal_umum',$where);
    }

    function tampil_tutup_jurnal(){
        return $this->db->get('tutup_jurnal');
    }

    function cek_data_jurnal_umum($tahun_bulan_berikutnya, $bulan_plus_1) {
        $where = array(
            'tgl_input_jurnal' => $tahun_bulan_berikutnya.'-01',
            'id_bttb' => 0,
            'keterangan_jurnal' => 'Saldo Awal '.$bulan_plus_1
        );

        // var_dump($where);
        // die();

        $query = $this->db->get_where('jurnal_umum', $where);

        return $query->num_rows() > 0;
    }

    function simpan_tutup_jurnal($data){
        $this->db->insert('tutup_jurnal',$data);
    }

    function simpan_jurnal2($data2){
        $this->db->insert('jurnal_umum',$data2);
    }

    function update_jurnal2($data2_update, $data2_where){
        $this->db->where($data2_where);
        $this->db->update('jurnal_umum',$data2_update);
    }

    function hapus_tutup_jurnal($where){
        $this->db->where($where);
        $this->db->delete('tutup_jurnal',$where);
    }

    function hapus_jurnal2($where2){
        $this->db->where($where2);
        $this->db->delete('jurnal_umum',$where2);
    }

    function tampil_data_bttb(){
        $this->db->order_by('kode_perkiraan', 'ASC');
        return $this->db->get('jurnal_bttb');
    }

    function filter_bttb($dari, $ke, $j_kode){
        $this->db->select('*');
        $this->db->from('jurnal_bttb');
        $this->db->order_by('kode_perkiraan', 'ASC');

        if (!empty($dari) && !empty($ke)) {
            $this->db->where('tgl_input >=', $dari);
            $this->db->where('tgl_input <=', $ke);
        }

        if (!empty($j_kode)) {
            $this->db->like('kode_perkiraan', $j_kode);
        }

        $query = $this->db->get();
        return $query->result();
    }

    function simpan_bttb($data){
        $this->db->insert('jurnal_bttb',$data);
    }

    function update_bttb($where,$data){
        $this->db->where($where);
        $this->db->update('jurnal_bttb',$data);
    }

    function hapus_bttb($where){
        $this->db->where($where);
        $this->db->delete('jurnal_bttb',$where);
    }

}
