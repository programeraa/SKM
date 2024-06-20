<?php 

class M_persediaan extends CI_Model{

    function tampil_data_jurnal(){
        $bulan_tahun_sekarang = date('Y-m');

        $this->db->select('*');
        $this->db->from('jurnal_persediaan');
        $this->db->order_by('tgl_input_jurnal ASC, kode_jurnal ASC, id_jurnal ASC');
        $this->db->where("DATE_FORMAT(tgl_input_jurnal, '%Y-%m') = '$bulan_tahun_sekarang'");

        $query = $this->db->get();
        return $query->result();
    }

    function jumlahDataJurnal() {
        $query = $this->db->get('jurnal_persediaan');
        return $query->num_rows();
    }

    function getLatestKodeJurnal() {
       $this->db->select('kode_jurnal');
       $this->db->order_by('CAST(SUBSTRING(kode_jurnal, 3) AS SIGNED)', 'DESC', FALSE);
       $this->db->where('kode_jurnal !=', '0');
       $this->db->limit(1);
       $query = $this->db->get('jurnal_persediaan');
       return $query->row('kode_jurnal');
   }

   function simpan_jurnal($dataX) {
    $this->db->insert('jurnal_persediaan',$dataX);
}

function filterJurnal($dari, $ke){
    $this->db->select('*');
    $this->db->from('jurnal_persediaan');
    $this->db->order_by('tgl_input_jurnal ASC, kode_jurnal ASC, id_jurnal ASC');

    if (!empty($dari) && !empty($ke)) {
        $this->db->where('tgl_input_jurnal >=', $dari);
        $this->db->where('tgl_input_jurnal <=', $ke);
    }

    $query = $this->db->get();
    return $query->result();
}

function edit_jurnal($where){
    $this->db->select('*');
    $this->db->from('jurnal_persediaan');
    $this->db->join('master_persediaan','jurnal_persediaan.id_barang = master_persediaan.id_persediaan','inner');
    $this->db->where($where);
    $this->db->order_by('jurnal_persediaan.id_jurnal', 'ASC');

    return $this->db->get();
}

function edit_jurnal_lanjutan($kode_jurnal){
    $this->db->select('*');
    $this->db->from('jurnal_persediaan');
    $this->db->join('master_persediaan','jurnal_persediaan.id_barang = master_persediaan.id_persediaan','inner');
    $this->db->where($kode_jurnal);
    $this->db->order_by('jurnal_persediaan.id_jurnal', 'ASC');

    return $this->db->get();
}

function update_jurnal($where, $data){
    $this->db->where($where);
    $this->db->update('jurnal_persediaan',$data);
}

function hapus_jurnal($where){
    $this->db->where($where);
    $this->db->delete('jurnal_persediaan',$where);
}

function tampil_data_buku_besar(){
    $bulan_tahun_sekarang = date('Y-m');

    $this->db->select('*');
    $this->db->from('jurnal_persediaan');
    $this->db->where("DATE_FORMAT(tgl_input_jurnal, '%Y-%m') = '$bulan_tahun_sekarang'");
    $this->db->order_by('tgl_input_jurnal ASC, kode_jurnal ASC, id_jurnal ASC');

    $query = $this->db->get();
    return $query->result();
}

function filterBukuBesar($dari, $ke, $kode_barang, $jenis_jurnal){
    $this->db->select('*');
    $this->db->from('jurnal_persediaan');
    $this->db->order_by('tgl_input_jurnal ASC, kode_jurnal ASC, id_jurnal ASC');

    if (!empty($dari) && !empty($ke)) {
        $this->db->where('tgl_input_jurnal >=', $dari);
        $this->db->where('tgl_input_jurnal <=', $ke);
    }

    if (!empty($kode_barang)) {
        $this->db->where('id_barang', $kode_barang);
    }

    if (!empty($jenis_jurnal)) {
        $this->db->where('jenis_jurnal', $jenis_jurnal);
    }

    $query = $this->db->get();
    return $query->result();
}

function tampil_data_persediaan(){
    $this->db->select('*');
    $this->db->from('master_persediaan');

    $query = $this->db->get();
    return $query->result();
}

function simpan_persediaan($data){
    $this->db->insert('master_persediaan',$data);
}

function update_persediaan($where, $data){
    $this->db->where($where);
    $this->db->update('master_persediaan',$data);
}

function hapus_persediaan($where){
    $this->db->where($where);
    $this->db->delete('master_persediaan',$where);
}
}