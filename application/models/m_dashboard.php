

<?php 

class M_dashboard extends CI_Model{

	function data_komisi() {
		$this->db->select('COUNT(id_komisi) as komisi');
		$hasil = $this->db->get('komisi');
		return $hasil;
	}

	function disetujui() {
		$this->db->select('COUNT(id_komisi) as disetujui');
		$this->db->where('status_komisi', 'Approve');
		$hasil = $this->db->get('komisi');
		return $hasil;
	}

	function belum_disetujui() {
		$this->db->select('COUNT(id_komisi) as belum_disetujui');
		$this->db->where('status_komisi', 'Proses Approve');
		$hasil = $this->db->get('komisi');
		return $hasil;
	}

	function marketing() {
		$this->db->select('COUNT(id_mar) as marketing');
		$hasil = $this->db->get('marketing');
		return $hasil;
	}


	// function tampil_data(){
	// 	$hasil = $this->db->query('SELECT a.id_pengajuan, a.id_kar, a.cuti_pada, a.cuti_ke, a.keterangan, a.status, b.id_kar, b.nama_kar FROM pengajuan as a INNER JOIN karyawan as b ON a.id_kar = b.id_kar');
	// 	return $hasil;
	// }

	// function data_komisi(){
	// 	$hasil = $this->db->query('SELECT COUNT(id_komisi) as komisi FROM komisi');
	// 	return $hasil;
	// }

	// function disetujui(){
	// 	$hasil = $this->db->query("SELECT COUNT(id_komisi) as disetujui FROM komisi WHERE status_komisi = 'Approve' ");
	// 	return $hasil;
	// }

	// function belum_disetujui(){
	// 	$hasil = $this->db->query("SELECT COUNT(id_komisi) as belum_disetujui FROM komisi WHERE status_komisi = 'Proses Approve' ");
	// 	return $hasil;
	// }

	// function marketing(){
	// 	$hasil = $this->db->query('SELECT COUNT(id_mar) as marketing FROM marketing');
	// 	return $hasil;
	// }

	// function data_pengajuan(){
	// 	$this->db->get_where('pengajuan', array('id' => $id), $limit, $offset);
	// }
}
