

<?php 

class M_dashboard extends CI_Model{

	// function tampil_data(){
	// 	//return $this->db->get('pengajuan');
	// 	$hasil = $this->db->query('SELECT a.id_pengajuan, a.id_kar, a.cuti_pada, a.cuti_ke, a.keterangan, a.status, b.id_kar, b.nama_kar FROM pengajuan as a INNER JOIN karyawan as b ON a.id_kar = b.id_kar');
	// 	return $hasil;
	// }

	// function data_pengajuan(){
	// 	$hasil = $this->db->query('SELECT COUNT(id_pengajuan) as pengajuan FROM pengajuan');
	// 	return $hasil;
	// }

	// function disetujui(){
	// 	$hasil = $this->db->query("SELECT COUNT(id_pengajuan) as disetujui FROM pengajuan WHERE status = 'Disetujui' ");
	// 	return $hasil;
	// }

	// function ditolak(){
	// 	$hasil = $this->db->query("SELECT COUNT(id_pengajuan) as ditolak FROM pengajuan WHERE status = 'Ditolak' ");
	// 	return $hasil;
	// }

	// function karyawan(){
	// 	$hasil = $this->db->query('SELECT COUNT(id_kar) as karyawan FROM karyawan');
	// 	return $hasil;
	// }

	/*function data_pengajuan(){
		$this->db->get_where('pengajuan', array('id' => $id), $limit, $offset);
	}*/
}
