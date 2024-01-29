<?php 

class M_jurnal extends CI_Model{

    function tampil_data_jurnal(){
        $bulan_tahun_sekarang = date('Y-m');

        $this->db->select('*');
        $this->db->from('jurnal_umum');
        $this->db->join('jurnal_bttb','jurnal_umum.id_bttb = jurnal_bttb.id_bttb','left');
        $this->db->where("DATE_FORMAT(tgl_input_jurnal, '%Y-%m') = '$bulan_tahun_sekarang'");
        //$this->db->order_by("CASE WHEN keterangan_jurnal LIKE '%Saldo Awal%' THEN 1 ELSE 2 END", 'ASC');
        //$this->db->order_by('tgl_input_jurnal', 'ASC');
        $this->db->order_by('tgl_input_jurnal ASC, id_jurnal ASC');

        // $this->db->where("NOT (keterangan_jurnal LIKE '%Saldo Awal%')", null, false);
        // $this->db->where("NOT (keterangan_jurnal LIKE '%Koreksi Saldo%')", null, false);

        $this->db->where("(NOT (keterangan_jurnal LIKE '%Saldo Awal%') OR (keterangan_jurnal LIKE '%Saldo Awal%' AND jurnal_umum.id_bttb != 0))", null, false);
        $this->db->where("(NOT (keterangan_jurnal LIKE '%Koreksi Saldo%') OR (keterangan_jurnal LIKE '%Koreksi Saldo%' AND jurnal_umum.id_bttb != 0))", null, false);

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

    function tampil_data_jurnal_BB(){
        $bulan_tahun_sekarang = date('Y-m');

        $this->db->select('*');
        $this->db->from('jurnal_umum');
        $this->db->join('jurnal_bttb','jurnal_umum.id_bttb = jurnal_bttb.id_bttb','left');
        $this->db->where("DATE_FORMAT(tgl_input_jurnal, '%Y-%m') = '$bulan_tahun_sekarang'");
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

        // $this->db->where("NOT (keterangan_jurnal LIKE '%Saldo Awal%')", null, false);
        // $this->db->where("NOT (keterangan_jurnal LIKE '%Koreksi Saldo%')", null, false);

        $this->db->where("(NOT (keterangan_jurnal LIKE '%Saldo Awal%') OR (keterangan_jurnal LIKE '%Saldo Awal%' AND jurnal_umum.id_bttb != 0))", null, false);
        $this->db->where("(NOT (keterangan_jurnal LIKE '%Koreksi Saldo%') OR (keterangan_jurnal LIKE '%Koreksi Saldo%' AND jurnal_umum.id_bttb != 0))", null, false);

        $query = $this->db->get();
        return $query->result();
    }

    function filter_jurnal_buku_besar($dari, $ke, $j_kode, $kode_per, $kode, $tgl, $bt){
        $this->db->select('*');
        $this->db->from('jurnal_umum');
        $this->db->join('jurnal_bttb','jurnal_umum.id_bttb = jurnal_bttb.id_bttb','left');
        $this->db->order_by('tgl_input_jurnal ASC, id_jurnal ASC');

        // $dari_bulan_tahun = date('m-Y', strtotime($dari));
        // $ke_bulan_tahun = date('m-Y', strtotime($ke));

        // $a = $dari_bulan_tahun <= '10-2023' && $ke_bulan_tahun <= '10-2023';

        $dari_bulan_tahun = date('Y-m', strtotime($dari));
        $ke_bulan_tahun = date('Y-m', strtotime($ke));

        $compare_date = date('Y-m', strtotime('2023-10'));
        $compare_date_2 = date('Y-m', strtotime('2023-11'));

        $a = $dari_bulan_tahun <= $compare_date && $ke_bulan_tahun <= $compare_date;

        $b = $dari_bulan_tahun < $ke_bulan_tahun;

        $tanggal_format = date('F', strtotime($dari));

        $monthTranslations = array(
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        );

        $bulan_indo = isset($monthTranslations[$tanggal_format]) ? $monthTranslations[$tanggal_format] : $tanggal_format;

        if (!empty($dari) && !empty($ke)) {
            $this->db->where('tgl_input_jurnal >=', $dari);
            $this->db->where('tgl_input_jurnal <=', $ke);
        }

        if (!empty($j_kode)) {
            $this->db->group_start();
            $this->db->where('jurnal_bttb.kode_perkiraan', $j_kode);

            if ($b == 1) {
                if ($j_kode == 'BT') {
                    if ($dari_bulan_tahun >= $compare_date_2) {
                        $this->db->or_like('keterangan_jurnal', 'Saldo Awal BT '.$bulan_indo);
                    }else{
                        $this->db->or_like('keterangan_jurnal', 'Saldo Awal '.$bulan_indo);
                    }
                }elseif($j_kode == 'UTJ'){
                    if ($dari_bulan_tahun >= $compare_date_2) {
                        $this->db->or_like('keterangan_jurnal', 'Saldo Awal UTJ '.$bulan_indo);
                    }else{
                        $this->db->or_like('keterangan_jurnal', 'Saldo Awal '.$bulan_indo);
                    }
                }else{
                    //$this->db->or_like('keterangan_jurnal', 'Saldo Awal '.$bulan_indo);
                }
            }else{
                if ($j_kode == 'BT') {
                    if ($a == 1) {
                        if ($dari == '' && $ke == '') {
                        }else{
                            $this->db->or_like('keterangan_jurnal', 'Saldo Awal');
                        }
                    }else{
                        $this->db->or_like('keterangan_jurnal', 'Saldo Awal BT');
                    }
                }elseif($j_kode == 'UTJ'){
                    if ($a == 1) {
                        if ($dari == '' && $ke == '') {
                        }else{
                            $this->db->or_like('keterangan_jurnal', 'Saldo Awal');
                        }
                    }else{
                        $this->db->or_like('keterangan_jurnal', 'Saldo Awal UTJ');
                    }
                }else{
                    //$this->db->or_like('keterangan_jurnal', 'Saldo Awal');
                }
            }

            if ($j_kode == 'BT' || $j_kode == 'UTJ') {
                $this->db->or_like('keterangan_jurnal', 'Koreksi Saldo');
            }
            
            $this->db->group_end();
        }

        if (!empty($kode_per)) {
            $this->db->group_start();
            $this->db->where('jurnal_umum.id_bttb', $kode_per);

            if ($b == 1 ) {
                if ($kode_per == 175) {
                    $this->db->or_like('keterangan_jurnal', 'Saldo Awal Bank Fee '.$bulan_indo);
                }

                if ($kode_per == 182) {
                    $this->db->or_like('keterangan_jurnal', 'Saldo Awal Bank Vision New '.$bulan_indo);
                }

                if ($kode_per == 184) {
                    $this->db->or_like('keterangan_jurnal', 'Saldo Awal Kas Kecil Pusat '.$bulan_indo);
                }

                if ($kode_per == 189) {
                    $this->db->or_like('keterangan_jurnal', 'Saldo Awal Kas Kecil Vision '.$bulan_indo);
                }
            }else{
                if ($kode_per == 175) {
                    $this->db->or_like('keterangan_jurnal', 'Saldo Awal Bank Fee Januari');
                }

                if ($kode_per == 182) {
                    $this->db->or_like('keterangan_jurnal', 'Saldo Awal Bank Vision New Januari');
                }

                if ($kode_per == 184) {
                    $this->db->or_like('keterangan_jurnal', 'Saldo Awal Kas Kecil Pusat Januari');
                }

                if ($kode_per == 189) {
                    $this->db->or_like('keterangan_jurnal', 'Saldo Awal Kas Kecil Vision Januari');
                }
            }
            $this->db->group_end();
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

    function cek_jurnal($tgl_input_jurnal) {
        $tgl_jurnal = date("Y-m", strtotime($tgl_input_jurnal));

        $this->db->where("DATE_FORMAT(tgl_jurnal, '%Y-%m') = ", $tgl_jurnal);

        $query = $this->db->get('tutup_jurnal');

        return $query->num_rows() > 0;
    }

    function simpan_jurnal($data) {
        $tgl_input_jurnal = $data['tgl_input_jurnal'];
        
        if ($this->cek_jurnal($tgl_input_jurnal)) {
            return false; 
        } else {
            $this->db->insert('jurnal_umum', $data);
            return true; 
        }
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

        $query = $this->db->get_where('jurnal_umum', $where);

        return $query->num_rows() > 0;
    }

    function cek_data_jurnal_umum_bt($tahun_bulan_berikutnya, $bulan_plus_1) {
        $where = array(
            'tgl_input_jurnal' => $tahun_bulan_berikutnya.'-01',
            'id_bttb' => 0,
            'keterangan_jurnal' => 'Saldo Awal BT '.$bulan_plus_1
        );

        $query = $this->db->get_where('jurnal_umum', $where);

        return $query->num_rows() > 0;
    }

    function cek_data_jurnal_umum_utj($tahun_bulan_berikutnya, $bulan_plus_1) {
        $where = array(
            'tgl_input_jurnal' => $tahun_bulan_berikutnya.'-01',
            'id_bttb' => 0,
            'keterangan_jurnal' => 'Saldo Awal UTJ '.$bulan_plus_1
        );

        $query = $this->db->get_where('jurnal_umum', $where);

        return $query->num_rows() > 0;
    }

    function cek_data_jurnal_umum_bf($tahun_bulan_berikutnya, $bulan_plus_1) {
        $where = array(
            'tgl_input_jurnal' => $tahun_bulan_berikutnya.'-01',
            'id_bttb' => 0,
            'keterangan_jurnal' => 'Saldo Awal Bank Fee '.$bulan_plus_1
        );

        $query = $this->db->get_where('jurnal_umum', $where);

        return $query->num_rows() > 0;
    }

    function cek_data_jurnal_umum_bvn($tahun_bulan_berikutnya, $bulan_plus_1) {
        $where = array(
            'tgl_input_jurnal' => $tahun_bulan_berikutnya.'-01',
            'id_bttb' => 0,
            'keterangan_jurnal' => 'Saldo Awal Bank Vision New '.$bulan_plus_1
        );

        $query = $this->db->get_where('jurnal_umum', $where);

        return $query->num_rows() > 0;
    }

    function cek_data_jurnal_umum_kkp($tahun_bulan_berikutnya, $bulan_plus_1) {
        $where = array(
            'tgl_input_jurnal' => $tahun_bulan_berikutnya.'-01',
            'id_bttb' => 0,
            'keterangan_jurnal' => 'Saldo Awal Kas Kecil Pusat '.$bulan_plus_1
        );

        $query = $this->db->get_where('jurnal_umum', $where);

        return $query->num_rows() > 0;
    }

    function cek_data_jurnal_umum_kkv($tahun_bulan_berikutnya, $bulan_plus_1) {
        $where = array(
            'tgl_input_jurnal' => $tahun_bulan_berikutnya.'-01',
            'id_bttb' => 0,
            'keterangan_jurnal' => 'Saldo Awal Kas Kecil Vision '.$bulan_plus_1
        );

        $query = $this->db->get_where('jurnal_umum', $where);

        return $query->num_rows() > 0;
    }

    function simpan_tutup_jurnal($data){
        $this->db->insert('tutup_jurnal',$data);
    }

    function simpan_jurnal2($data2){
        $this->db->insert('jurnal_umum',$data2);
    }

    function simpan_jurnal_bt($data3){
        $this->db->insert('jurnal_umum',$data3);
    }

    function simpan_jurnal_utj($data4){
        $this->db->insert('jurnal_umum',$data4);
    }

    function simpan_jurnal_bf($data5){
        $this->db->insert('jurnal_umum',$data5);
    }

    function simpan_jurnal_bvn($data6){
        $this->db->insert('jurnal_umum',$data6);
    }

    function simpan_jurnal_kkp($data7){
        $this->db->insert('jurnal_umum',$data7);
    }

    function simpan_jurnal_kkv($data8){
        $this->db->insert('jurnal_umum',$data8);
    }

    function update_jurnal2($data2_update, $data2_where){
        $this->db->where($data2_where);
        $this->db->update('jurnal_umum',$data2_update);
    }

    function update_jurnal_bt($data3_update, $data3_where){
        $this->db->where($data3_where);
        $this->db->update('jurnal_umum',$data3_update);
    }

    function update_jurnal_utj($data4_update, $data4_where){
        $this->db->where($data4_where);
        $this->db->update('jurnal_umum',$data4_update);
    }

    function update_jurnal_bf($data5_update, $data5_where){
        $this->db->where($data5_where);
        $this->db->update('jurnal_umum',$data5_update);
    }

    function update_jurnal_bvn($data6_update, $data6_where){
        $this->db->where($data6_where);
        $this->db->update('jurnal_umum',$data6_update);
    }

    function update_jurnal_kkp($data7_update, $data7_where){
        $this->db->where($data7_where);
        $this->db->update('jurnal_umum',$data7_update);
    }

    function update_jurnal_kkv($data8_update, $data8_where){
        $this->db->where($data8_where);
        $this->db->update('jurnal_umum',$data8_update);
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

    function cek_duplicate_bttb($kode_perkiraan, $nomor_perkiraan) {
        $this->db->where('kode_perkiraan', $kode_perkiraan);
        $this->db->where('nomor_perkiraan', $nomor_perkiraan);
        $query = $this->db->get('jurnal_bttb');

        return $query->num_rows() > 0;
    }

    function simpan_bttb($data){
        $kode_perkiraan = $data['kode_perkiraan'];
        $nomor_perkiraan = $data['nomor_perkiraan'];

        if (!$this->cek_duplicate_bttb($kode_perkiraan, $nomor_perkiraan)) {
            $this->db->insert('jurnal_bttb', $data);
            return true; 
        } else {
            return false; 
        }
    }

    function update_bttb($where,$data){
        $this->db->where($where);
        $this->db->update('jurnal_bttb',$data);
    }

    function hapus_bttb($where){
        $this->db->where($where);
        $this->db->delete('jurnal_bttb',$where);
    }

    function tampil_data_pesan(){
        return $this->db->get('jurnal_pesan');
    }

    function filter_pesan($dari, $ke){
        $this->db->select('*');
        $this->db->from('jurnal_pesan');

        if (!empty($dari) && !empty($ke)) {
            $this->db->where('tgl_input_pesan >=', $dari);
            $this->db->where('tgl_input_pesan <=', $ke);
        }

        $query = $this->db->get();
        return $query->result();
    }

    function cek_duplicate_pesan($pesan, $tgl_input_pesan) {
        $this->db->where('pesan', $pesan);
        $this->db->where('tgl_input_pesan', $tgl_input_pesan);
        $this->db->where('status_pesan', 'Tutup');
        $query = $this->db->get('jurnal_pesan');

        return $query->num_rows() > 0;
    }

    function simpan_pesan($data){
        $pesan = $data['pesan'];
        $tgl_input_pesan = $data['tgl_input_pesan'];

        if (!$this->cek_duplicate_pesan($pesan, $tgl_input_pesan)) {
            $this->db->insert('jurnal_pesan',$data);
            return true; 
        } else {
            return false; 
        }
    }

    function update_pesan($where,$data){
        $this->db->where($where);
        $this->db->update('jurnal_pesan',$data);
    }

    function hitung_total_tutup_pesan()
    {
        $this->db->from('jurnal_pesan');
        $this->db->where('status_pesan', 'Tutup');
        return $this->db->count_all_results();
    }

    function hapus_tutup_jurnal_2($where_2){
        $this->db->where($where_2);
        $this->db->delete('tutup_jurnal',$where_2);
    }

    function hapus_pesan($where){
        $this->db->where($where);
        $this->db->delete('jurnal_pesan',$where);
    }

    function tampil_data_biaya_administrasi(){
        $bulan_tahun_sekarang = date('Y-m');

        $this->db->select('*');
        $this->db->from('jurnal_bttb');
        $this->db->join('jurnal_umum', 'jurnal_umum.id_bttb = jurnal_bttb.id_bttb', 'left');
        $this->db->where('kode_perkiraan', '701');

        $this->db->where("DATE_FORMAT(tgl_input_jurnal, '%Y-%m') = '$bulan_tahun_sekarang'");

        $this->db->group_by('kode_perkiraan, nomor_perkiraan, keterangan');

        $query = $this->db->get();
        return $query->result();
    }

    function filter_biaya_administrasi($dari, $ke){
        $this->db->select('*');
        $this->db->from('jurnal_bttb');
        $this->db->join('jurnal_umum', 'jurnal_umum.id_bttb = jurnal_bttb.id_bttb', 'left');
        $this->db->where('kode_perkiraan', '701');
        $this->db->group_by('kode_perkiraan, nomor_perkiraan, keterangan');


        if (!empty($dari) && !empty($ke)) {
            $this->db->where('jurnal_umum.tgl_input_jurnal >=', $dari);
            $this->db->where('jurnal_umum.tgl_input_jurnal <=', $ke);
        }

        $query = $this->db->get();
        return $query->result();
    }

    function tampil_data_biaya_marketing(){
        $bulan_tahun_sekarang = date('Y-m');

        $this->db->select('*');
        $this->db->from('jurnal_bttb');
        $this->db->join('jurnal_umum', 'jurnal_umum.id_bttb = jurnal_bttb.id_bttb');
        $this->db->where('kode_perkiraan', '801');
        $this->db->where_not_in('nomor_perkiraan', ['0002', '00100', '00101', '00104', '00105', '00106', '00107', '06002', '06003']);

        $this->db->where("DATE_FORMAT(tgl_input_jurnal, '%Y-%m') = '$bulan_tahun_sekarang'");

        $this->db->group_by('kode_perkiraan, nomor_perkiraan, keterangan');

        $query = $this->db->get();
        return $query->result();
    }


    function filter_biaya_marketing($dari, $ke){
        $this->db->select('*');
        $this->db->from('jurnal_bttb');
        $this->db->join('jurnal_umum', 'jurnal_umum.id_bttb = jurnal_bttb.id_bttb', 'left');
        $this->db->where('kode_perkiraan', '801');
        $this->db->where_not_in('nomor_perkiraan', ['0002', '00100', '00101', '00104', '00105', '00106', '00107', '06002', '06003']);
        $this->db->group_by('kode_perkiraan, nomor_perkiraan, keterangan');

        if (!empty($dari) && !empty($ke)) {
            $this->db->where('jurnal_umum.tgl_input_jurnal >=', $dari);
            $this->db->where('jurnal_umum.tgl_input_jurnal <=', $ke);
        }

        $query = $this->db->get();
        return $query->result();
    }



}
