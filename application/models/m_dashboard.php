<?php 

class M_dashboard extends CI_Model{

	// function tampil_data(){
	// 	$hasil = $this->db->query('SELECT a.id_pengajuan, a.id_kar, a.cuti_pada, a.cuti_ke, a.keterangan, a.status, b.id_kar, b.nama_kar FROM pengajuan as a INNER JOIN karyawan as b ON a.id_kar = b.id_kar');
	// 	return $hasil;
	// }

	function data_komisi(){
		$hasil = $this->db->query('SELECT COUNT(id_komisi) as komisi FROM komisi');
		return $hasil;
	}

	function disetujui(){
		$hasil = $this->db->query("SELECT COUNT(id_komisi) as disetujui FROM komisi WHERE status_komisi = 'Disetujui' ");
		return $hasil;
	}

	function belum_disetujui(){
		$hasil = $this->db->query("SELECT COUNT(id_komisi) as belum_disetujui FROM komisi WHERE status_komisi = 'Belum Disetujui' ");
		return $hasil;
	}

	function marketing(){
		$hasil = $this->db->query('SELECT COUNT(id_mar) as marketing FROM marketing');
		return $hasil;
	}

	// function data_pengajuan(){
	// 	$this->db->get_where('pengajuan', array('id' => $id), $limit, $offset);
	// }
}
