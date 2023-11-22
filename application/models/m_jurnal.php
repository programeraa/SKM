<?php 

class M_jurnal extends CI_Model{

    function tampil_data_jurnal(){
        $this->db->select('*');
        $this->db->from('jurnal_umum');
        $this->db->join('jurnal_bttb','jurnal_umum.id_bttb = jurnal_bttb.id_bttb','inner');
        $this->db->order_by('id_jurnal', 'ASC');
        
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
