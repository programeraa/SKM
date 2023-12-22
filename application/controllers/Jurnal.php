<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jurnal extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_marketing');	
		$this->load->model('m_jurnal');
		$this->load->model('m_banktitipan');
		$this->load->model('m_pengguna');
	}

	public function index(){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Komisi') {
			redirect(base_url('komisi'));
		}

		$total_tutup = $this->m_jurnal->hitung_total_tutup_pesan();
		$data['tutup'] = $total_tutup;

		$data['title'] = "Jurnal Umum";
		$data['jurnal_umum'] = $this->m_jurnal->tampil_data_jurnal();
		$data['jurnal_umum_2'] = $this->m_jurnal->tampil_data_jurnal_2();
		$data['jurnal_bttb'] = $this->m_jurnal->tampil_data_bttb()->result();
		$data['tutup_jurnal'] = $this->m_jurnal->tampil_tutup_jurnal()->result();
		$data['tampil_pengguna'] = $this->m_pengguna->tampil_data();
		$data['tampil_pesan'] = $this->m_jurnal->tampil_data_pesan()->result();

		$this->load->view('v_header', $data);
		$this->load->view('v_jurnal', $data);
		$this->load->view('v_footer', $data);
	}

	public function filterJurnal(){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Komisi') {
			redirect(base_url('komisi'));
		}

		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');
		$j_kode = '';
		$kode_per = '';

		$kode = '';
		$tgl = '';
		$bt = '';

		$total_tutup = $this->m_jurnal->hitung_total_tutup_pesan();
		$data['tutup'] = $total_tutup;

		$data['title'] = "Jurnal Umum";
		$data['jurnal_umum'] = $this->m_jurnal->filter_jurnal($dari, $ke, $j_kode, $kode_per, $kode, $tgl, $bt);
		$data['jurnal_umum_2'] = $this->m_jurnal->tampil_data_jurnal_2();
		$data['jurnal_bttb'] = $this->m_jurnal->tampil_data_bttb()->result();
		$data['tutup_jurnal'] = $this->m_jurnal->tampil_tutup_jurnal()->result();
		$data['tampil_pengguna'] = $this->m_pengguna->tampil_data();
		$data['tampil_pesan'] = $this->m_jurnal->tampil_data_pesan()->result();

		$this->load->view('v_header', $data);
		$this->load->view('v_jurnal', $data);
		$this->load->view('v_footer', $data);
	}

	public function tambah_jurnal(){
		$tgl_input = $this->input->post('tgl_input');
		$kode_perkiraan = $this->input->post('kode_perkiraan');
		$keterangan = $this->input->post('keterangan');
		$nominal = $this->input->post('nominal');
		$j_jurnal = $this->input->post('j_jurnal');

		date_default_timezone_set("Asia/Jakarta");
		$waktu = date("Y-m-d H:i:s");

		$data = array(
			'tgl_input_asli_jurnal' => $waktu,
			'tgl_input_jurnal' => $tgl_input,
			'id_bttb' => $kode_perkiraan,
			'keterangan_jurnal' => $keterangan,
			'jenis_jurnal' => $j_jurnal,
			'nominal_jurnal' => $nominal,
		);

		$this->m_jurnal->simpan_jurnal($data);

		echo '<script>
		alert("Selamat! Berhasil Menambah Data Jurnal");
		window.location="' . base_url('Jurnal') . '"
		</script>';
	}

	public function edit_jurnal($id){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Komisi' && $level_asli == 'CMO') {
			redirect(base_url('komisi'));
		}

		$total_tutup = $this->m_jurnal->hitung_total_tutup_pesan();
		$data['tutup'] = $total_tutup;

		$where = array('id_jurnal'=>$id);
		$data['title'] = "Edit Jurnal Umum";
		$data['jurnal_umum'] = $this->m_jurnal->edit_jurnal($where)->result();
		$data['jurnal_bttb'] = $this->m_jurnal->tampil_data_bttb()->result();

		$this->load->view('v_header', $data);
		$this->load->view('jurnal/edit_jurnal', $data);
		$this->load->view('v_footer', $data);
	}

	public function update_jurnal(){
		$tgl_input = $this->input->post('tgl_input');
		$kode_perkiraan = $this->input->post('kode_perkiraan');
		$keterangan = $this->input->post('keterangan');
		$nominal = $this->input->post('nominal');
		$j_jurnal = $this->input->post('j_jurnal');
		$id = $this->input->post('id_jurnal');

		date_default_timezone_set("Asia/Jakarta");
		$waktu = date("Y-m-d H:i:s");

		$data = array(
			'tgl_input_asli_jurnal' => $waktu,
			'tgl_input_jurnal' => $tgl_input,
			'id_bttb' => $kode_perkiraan,
			'keterangan_jurnal' => $keterangan,
			'jenis_jurnal' => $j_jurnal,
			'nominal_jurnal' => $nominal,
		);

		$where = array('id_jurnal'=>$id);

		if (isset($where)) {
			$this->m_jurnal->update_jurnal($where,$data);
			echo '<script>
			alert("Selamat! Berhasil Update Data Jurnal");
			window.location="' . base_url('jurnal') . '"
			</script>';
		}
		echo '<script>
		alert("Gagal Update Data Jurnal");
		window.location="' . base_url('jurnal') . '"
		</script>';
	}

	public function hapus_jurnal($id_jurnal){
		$where = array('id_jurnal'=>$id_jurnal);
		if (isset($where)) {
			$this->m_jurnal->hapus_jurnal($where);
			echo '<script>
			alert("Selamat! Data berhasil terhapus.");
			window.location="' . base_url('jurnal') . '"
			</script>';
		} else {
			echo '<script>
			alert("Gagal Menghapus !, ID Jurnal ' . $id_jurnal . ' Tidak ditemukan");
			window.location="' . base_url('jurnal') . '"
			</script>';
		}
	}

	public function tutup_jurnal(){
		$saldo_akhir = $this->input->get('tsa');
		$saldo_awal_sebelumnya = $this->input->get('sas');
		$total_saldo = $this->input->get('ts');
		$total_kredit = $this->input->get('tk');

		$sa_bt = $this->input->get('sa_bt');
		$sa_utj = $this->input->get('sa_utj');

		$tahun_bulan = $this->input->get('bulan_tahun');
		$bulan = $this->input->get('bulan');
		$dari = date("m-Y", strtotime($this->input->get('dari')));
		$ke = date("m-Y", strtotime($this->input->get('ke')));

		$dari_2 = date("Y", strtotime($this->input->get('dari')));
		$ke_2 = date("Y", strtotime($this->input->get('ke')));

		date_default_timezone_set("Asia/Jakarta");
		$waktu = date("Y-m-d");
		$waktuku = date("m-Y");

		// if ($dari_2 >= '2000' || $ke_2 >= '2000') {
		// 	$bulanku = $waktuku;
		// }else{
		// 	$bulanku = $ke;
		// }

		if (date("Y", strtotime($dari_2)) != '1970'  && date("Y", strtotime($ke_2)) != '1970') {
			$tanggal_jurnal = date('Y-m-d', strtotime('28-' . $ke));
		}else{
			$tanggal_jurnal = date('Y-m-d', strtotime('28-' . $waktuku));
		}

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

		$bulan_fix = DateTime::createFromFormat('F', $bulan);
		$englishMonth = $bulan_fix->format('F');
		$bulan_clear = isset($monthTranslations[$englishMonth]) ? $monthTranslations[$englishMonth] : $englishMonth;

		$data = array(
			'tgl_jurnal' => $tanggal_jurnal,
			'tgl_asli_input' => $waktu,
			'bulan_jurnal' => $bulan_clear,
			'total_saldo' => $total_saldo,
			'total_kredit' => $total_kredit,
			'saldo_akhir' => $saldo_akhir
		);

		if ($total_kredit < 0) {
			$jenis_jurnal = '';
			$saldo_akhir_baru = abs($total_kredit + $saldo_awal_sebelumnya);
		} else {
			$jenis_jurnal = '';
			$saldo_akhir_baru = $total_kredit + $saldo_awal_sebelumnya;
		}

		$waktu_terbaru = DateTime::createFromFormat('F', $bulan);
		$waktu_terbaru->modify('+1 month');
		$englishMonth = $waktu_terbaru->format('F');
		$bulan_plus_1 = isset($monthTranslations[$englishMonth]) ? $monthTranslations[$englishMonth] : $englishMonth;

		// Konversi string tahun dan bulan menjadi objek DateTime
		$dateTime = DateTime::createFromFormat('Y-m', $tahun_bulan);

		// Tambahkan satu bulan ke objek DateTime
		$dateTime->modify('+1 month');

		// Dapatkan tahun dan bulan yang baru
		$tahun_bulan_berikutnya = $dateTime->format('Y-m');

		$is_data_exist = $this->m_jurnal->cek_data_jurnal_umum($tahun_bulan_berikutnya, $bulan_plus_1);

		$is_data_exist_bt = $this->m_jurnal->cek_data_jurnal_umum_bt($tahun_bulan_berikutnya, $bulan_plus_1);

		$is_data_exist_utj = $this->m_jurnal->cek_data_jurnal_umum_utj($tahun_bulan_berikutnya, $bulan_plus_1);

		$data2 = array(
			'tgl_input_asli_jurnal' => $waktu,
			'tgl_input_jurnal' => $tahun_bulan_berikutnya.'-01',
			'id_bttb' => 0,
			'keterangan_jurnal' => 'Saldo Awal '.$bulan_plus_1,
			'jenis_jurnal' => $jenis_jurnal,
			'nominal_jurnal' => $saldo_akhir_baru
		);

		$data2_update = array(
			'nominal_jurnal' => $saldo_akhir_baru
		);

		$data2_where = array(
			'tgl_input_jurnal' => $tahun_bulan_berikutnya.'-01',
			'id_bttb' => 0,
			'keterangan_jurnal' => 'Saldo Awal '.$bulan_plus_1
		);

		//=====================================================================

		$data3 = array(
			'tgl_input_asli_jurnal' => $waktu,
			'tgl_input_jurnal' => $tahun_bulan_berikutnya.'-01',
			'id_bttb' => 0,
			'keterangan_jurnal' => 'Saldo Awal BT '.$bulan_plus_1,
			'jenis_jurnal' => $jenis_jurnal,
			'nominal_jurnal' => $sa_bt
		);

		$data3_update = array(
			'nominal_jurnal' => $sa_bt
		);

		$data3_where = array(
			'tgl_input_jurnal' => $tahun_bulan_berikutnya.'-01',
			'id_bttb' => 0,
			'keterangan_jurnal' => 'Saldo Awal BT '.$bulan_plus_1
		);

		//=====================================================================

		$data4 = array(
			'tgl_input_asli_jurnal' => $waktu,
			'tgl_input_jurnal' => $tahun_bulan_berikutnya.'-01',
			'id_bttb' => 0,
			'keterangan_jurnal' => 'Saldo Awal UTJ '.$bulan_plus_1,
			'jenis_jurnal' => $jenis_jurnal,
			'nominal_jurnal' => $sa_utj
		);

		$data4_update = array(
			'nominal_jurnal' => $sa_utj
		);

		$data4_where = array(
			'tgl_input_jurnal' => $tahun_bulan_berikutnya.'-01',
			'id_bttb' => 0,
			'keterangan_jurnal' => 'Saldo Awal UTJ '.$bulan_plus_1
		);

		$this->m_jurnal->simpan_tutup_jurnal($data);

		if ($is_data_exist == true) {
			$this->m_jurnal->update_jurnal2($data2_update, $data2_where);
		}else{
			$this->m_jurnal->simpan_jurnal2($data2);
		} 

		if ($is_data_exist_bt == true) {
			$this->m_jurnal->update_jurnal_bt($data3_update, $data3_where);
		}else{
			$this->m_jurnal->simpan_jurnal_bt($data3);
		} 

		if ($is_data_exist_utj == true) {
			$this->m_jurnal->update_jurnal_utj($data4_update, $data4_where);
		}else{
			$this->m_jurnal->simpan_jurnal_utj($data4);
		} 

		echo '<script>
		alert("Selamat! Berhasil Tutup Jurnal");
		window.location="' . base_url('Jurnal') . '"
		</script>';
	}

	public function hapus_tutup_jurnal(){
		$id_jurnal = $this->input->get('id_jurnal');
		// $tgl_asli_input = $this->input->get('tgl');
		// $bulan_jurnal = $this->input->get('bulan');

		// $monthTranslations = array(
		// 	'January' => 'Januari',
		// 	'February' => 'Februari',
		// 	'March' => 'Maret',
		// 	'April' => 'April',
		// 	'May' => 'Mei',
		// 	'June' => 'Juni',
		// 	'July' => 'Juli',
		// 	'August' => 'Agustus',
		// 	'September' => 'September',
		// 	'October' => 'Oktober',
		// 	'November' => 'November',
		// 	'December' => 'Desember'
		// );

		// $bulan_baru = $monthTranslations[$bulan_jurnal];

		// $datetime = DateTime::createFromFormat('d-m-Y', $tgl_asli_input);
		// $tanggal_hasil = $datetime->format('Y-m-d');

		// $waktu_terbaru = new DateTime($bulan_baru);
		// $waktu_terbaru->modify('+1 month');
		// $bulan_baru = $waktu_terbaru->format('F');

		// $monthTranslations = array(
		// 	'January' => 'Januari',
		// 	'February' => 'Februari',
		// 	'March' => 'Maret',
		// 	'April' => 'April',
		// 	'May' => 'Mei',
		// 	'June' => 'Juni',
		// 	'July' => 'Juli',
		// 	'August' => 'Agustus',
		// 	'September' => 'September',
		// 	'October' => 'Oktober',
		// 	'November' => 'November',
		// 	'December' => 'Desember'
		// );

		// $bulan_baru_fix = isset($monthTranslations[$bulan_baru]) ? $monthTranslations[$bulan_baru] : $bulan_baru;

		$where = array('id_jurnal'=>$id_jurnal);
		// $where2 = array(
		// 	'tgl_input_asli_jurnal' => $tanggal_hasil,
		// 	'id_bttb' => 0,
		// 	'keterangan_jurnal' => 'Saldo Awal '.$bulan_baru_fix
		// );

		// var_dump($where2);
		// die();

		if (isset($where)) {
			$this->m_jurnal->hapus_tutup_jurnal($where);
			//$this->m_jurnal->hapus_jurnal2($where2);
			echo '<script>
			alert("Selamat! Data berhasil terhapus.");
			window.location="' . base_url('Jurnal/') . '"
			</script>';
		} else {
			echo '<script>
			alert("Gagal Menghapus !, ID Tutup Jurnal ' . $id_jurnal . ' Tidak ditemukan");
			window.location="' . base_url('Jurnal/') . '"
			</script>';
		}
	}


	public function buku_besar(){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Komisi') {
			redirect(base_url('komisi'));
		}

		$total_tutup = $this->m_jurnal->hitung_total_tutup_pesan();
		$data['tutup'] = $total_tutup;

		$data['title'] = "Buku Besar";
		$data['jurnal_umum'] = $this->m_jurnal->tampil_data_jurnal_BB();
		$data['jurnal_bttb'] = $this->m_jurnal->tampil_data_bttb()->result();

		$this->load->view('v_header', $data);
		$this->load->view('jurnal/buku_besar', $data);
		$this->load->view('v_footer', $data);
	}

	public function filterBukuBesar(){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Komisi') {
			redirect(base_url('komisi'));
		}

		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');
		$j_kode = $this->input->get('j_kode');

		$kode_per = $this->input->get('kode_per');
		$kode = $this->input->get('kode');
		$tgl = $this->input->get('tgl');
		$bt = $this->input->get('bt');

		$data['title'] = "Buku Besar";
		$data['jurnal_umum'] = $this->m_jurnal->filter_jurnal_buku_besar($dari, $ke, $j_kode, $kode_per, $kode, $tgl, $bt);
		$data['jurnal_bttb'] = $this->m_jurnal->tampil_data_bttb()->result();

		$total_tutup = $this->m_jurnal->hitung_total_tutup_pesan();
		$data['tutup'] = $total_tutup;

		$this->load->view('v_header', $data);
		$this->load->view('jurnal/buku_besar', $data);
		$this->load->view('v_footer', $data);
	}

	public function bttb(){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Komisi') {
			redirect(base_url('komisi'));
		}

		$total_tutup = $this->m_jurnal->hitung_total_tutup_pesan();
		$data['tutup'] = $total_tutup;

		$data['title'] = "Master Akun";
		$data['jurnal_umum'] = $this->m_jurnal->tampil_data_jurnal_2();
		$data['jurnal_bttb'] = $this->m_jurnal->tampil_data_bttb()->result();
		$data['jurnal_bttb2'] = $this->m_jurnal->tampil_data_bttb()->result();
		$data['tampil_pengguna'] = $this->m_pengguna->tampil_data();

		$this->load->view('v_header', $data);
		$this->load->view('jurnal/master_bttb', $data);
		$this->load->view('v_footer', $data);
	}

	public function filterBtTb(){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Komisi') {
			redirect(base_url('komisi'));
		}

		$total_tutup = $this->m_jurnal->hitung_total_tutup_pesan();
		$data['tutup'] = $total_tutup;

		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');
		$j_kode = $this->input->get('j_kode');

		$data['title'] = "Master Akun";
		$data['jurnal_umum'] = $this->m_jurnal->tampil_data_jurnal();
		$data['jurnal_bttb'] = $this->m_jurnal->filter_bttb($dari, $ke, $j_kode);
		$data['jurnal_bttb2'] = $this->m_jurnal->tampil_data_bttb()->result();
		$data['tampil_pengguna'] = $this->m_pengguna->tampil_data();

		$this->load->view('v_header', $data);
		$this->load->view('jurnal/master_bttb', $data);
		$this->load->view('v_footer', $data);
	}

	public function tambah_bttb(){
		$kode_perkiraan = $this->input->post('kode_perkiraan');
		$nomor_perkiraan = $this->input->post('nomor_perkiraan');
		$keterangan = $this->input->post('keterangan');
		$id = $this->input->post('admin');

		date_default_timezone_set("Asia/Jakarta");
		$waktu = date("Y-m-d H:i:s");

		$data = array(
			'kode_perkiraan' => $kode_perkiraan,
			'nomor_perkiraan' => $nomor_perkiraan,
			'keterangan' => $keterangan,
			'tgl_input' => $waktu,
			'admin_input' => $id
		);

		if ($this->m_jurnal->simpan_bttb($data)) {
			echo '<script>
			alert("Selamat! Berhasil Menambah Data Master");
			window.location="' . base_url('Jurnal/bttb') . '"
			</script>';
		} else {
			echo '<script>
			alert("Gagal Simpan, Data Sudah Ada");
			window.location="' . base_url('Jurnal/bttb') . '"
			</script>';
		}
	}

	public function update_bttb(){
		$kode_perkiraan = $this->input->post('kode_perkiraan');
		$nomor_perkiraan = $this->input->post('nomor_perkiraan');
		$keterangan = $this->input->post('keterangan');
		$id = $this->input->post('id_bttb');

		$data = array(
			'kode_perkiraan' => $kode_perkiraan,
			'nomor_perkiraan' => $nomor_perkiraan,
			'keterangan' => $keterangan
		);

		$where = array('id_bttb'=>$id);

		if (isset($where)) {
			$this->m_jurnal->update_bttb($where,$data);
			echo '<script>
			alert("Selamat! Berhasil Update Data Master");
			window.location="' . base_url('jurnal/bttb') . '"
			</script>';
		}
		echo '<script>
		alert("Gagal Update Data Master");
		window.location="' . base_url('jurnal/bttb') . '"
		</script>';
	}

	public function hapus_bttb($id_bttb){
		$where = array('id_bttb'=>$id_bttb);
		if (isset($where)) {
			$this->m_jurnal->hapus_bttb($where);
			echo '<script>
			alert("Selamat! Data berhasil terhapus.");
			window.location="' . base_url('jurnal/bttb') . '"
			</script>';
		} else {
			echo '<script>
			alert("Gagal Menghapus !, ID Master ' . $id_bttb . ' Tidak ditemukan");
			window.location="' . base_url('jurnal/bttb') . '"
			</script>';
		}
	}

	public function pesan(){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Komisi' && $level_asli == 'Administrator') {
			redirect(base_url('komisi'));
		}

		$total_tutup = $this->m_jurnal->hitung_total_tutup_pesan();
		$data['tutup'] = $total_tutup;

		$data['title'] = "Pesan Jurnal";
		$data['jurnal_pesan'] = $this->m_jurnal->tampil_data_pesan()->result();
		$data['tampil_pengguna'] = $this->m_pengguna->tampil_data();

		$this->load->view('v_header', $data);
		$this->load->view('jurnal/jurnal_pesan', $data);
		$this->load->view('v_footer', $data);
	}

	public function filterPesan(){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Komisi' && $level_asli == 'Administrator') {
			redirect(base_url('komisi'));
		}

		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');

		$total_tutup = $this->m_jurnal->hitung_total_tutup_pesan();
		$data['tutup'] = $total_tutup;

		$data['title'] = "Pesan Jurnal";
		$data['jurnal_pesan'] = $this->m_jurnal->filter_pesan($dari, $ke);
		$data['tampil_pengguna'] = $this->m_pengguna->tampil_data();

		$this->load->view('v_header', $data);
		$this->load->view('jurnal/jurnal_pesan', $data);
		$this->load->view('v_footer', $data);
	}


	public function tambah_pesan(){
		$tgl_input = date("Y-m-d", strtotime($this->input->get('tgl_input')));
		$tgl_dari = $this->input->get('tgl_dari');
		$tgl_ke = $this->input->get('tgl_ke');

		$tgl_pesan = date("Y-m", strtotime($tgl_dari));

		$pesan = $this->input->get('pesan');
		$bulan = $this->input->get('bulan');
		$admin = $this->input->get('admin');

		$data = array(
			'pesan' => $pesan,
			'tgl_input_pesan' => $tgl_input,
			'tgl_pesan' => $tgl_pesan,
			'bulan_pesan' => $bulan,
			'status_pesan' => 'Tutup',
			'admin_input' => $admin
		);

		if ($this->m_jurnal->simpan_pesan($data)) {
			echo '<script>
			alert("Selamat! Berhasil Request Buka Jurnal");
			window.location="' . base_url("Jurnal") . '";
			</script>';
		} else {
			echo '<script>
			alert("Gagal Simpan, Sudah Pernah Ajukan Hari Ini");
			window.location="' . base_url("Jurnal") . '";
			</script>';
		}

	}

	public function hapus_tutup_jurnal_2($tgl_pesan){
		$bulan = $this->input->get('bulan');
		$id = $this->input->get('id');

		$data = array('status_pesan'=>'Buka');

		$where = array(
			'id_pesan'=>$id,
			
		);

		$where_2 = array(
			'tgl_jurnal'=>$tgl_pesan.'-28',
			'bulan_jurnal'=>$bulan
		);

		if (isset($where)) {
			$this->m_jurnal->update_pesan($where, $data);
			$this->m_jurnal->hapus_tutup_jurnal_2($where_2);
			echo '<script>
			alert("Selamat! Berhasil Buka Jurnal.");
			window.location="' . base_url('Jurnal/pesan') . '"
			</script>';
		} else {
			echo '<script>
			alert("Gagal Buka Jurnal");
			window.location="' . base_url('Jurnal/pesan') . '"
			</script>';
		}
	}










	public function filterDataJurnalUmum(){
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');

		$data['title'] = "DBT - Jurnal Umum";
		$data['marketing'] = $this->m_marketing->tampil_data()->result();
		$data['bank_titipan'] = $this->m_banktitipan->getDataByDateRange_Jurnal($dari, $ke);
		$data['kredit_jl'] = $this->m_banktitipan->tampil_kredit_jl()->result();
		$data['tutup_jurnal'] = $this->m_banktitipan->tampil_tutup_jurnal()->result();

		$this->load->view('v_header', $data);
		$this->load->view('v_banktitipan', $data);
		$this->load->view('v_footer', $data);
	}

	public function jurnal_ledger(){
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$data['title'] = "DBT - Jurnal Ledger";
		$data['marketing'] = $this->m_marketing->tampil_data()->result();
		$data['bank_titipan'] = $this->m_banktitipan->tampil_data();

		$this->load->view('v_header', $data);
		$this->load->view('bank_titipan/jurnal_ledger', $data);
		$this->load->view('v_footer', $data);
	}

	public function filterDataJurnalLedger(){
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');

		$data['title'] = "DBT - Jurnal Ledger";
		$data['marketing'] = $this->m_marketing->tampil_data()->result();
		$data['bank_titipan'] = $this->m_banktitipan->getDataByDateRange_Jurnal($dari, $ke);

		$this->load->view('v_header', $data);
		$this->load->view('bank_titipan/jurnal_ledger', $data);
		$this->load->view('v_footer', $data);
	}

	public function tambah_ledger(){
		$kode_perkiraan = $this->input->post('kode_perkiraan');
		$nama_properti = $this->input->post('nama_properti');
		$jt = $this->input->post('jt');
		$tgl_input = $this->input->post('tgl_input');
		$nama_marketing = $this->input->post('nama_marketing');
		$nominal = $this->input->post('nominal');
		$jenis = $this->input->post('jenis_lg');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'kode_perkiraan' => $kode_perkiraan,
			'nama_properti' => $nama_properti,
			'status_properti' => $jt,
			'id_marketing' => $nama_marketing,
			'tgl_input' => $tgl_input,
			'nilai_nominal' => $nominal,
			'jenis' => $jenis,
			'keterangan' => $keterangan
		);

		$this->m_banktitipan->simpan($data);

		echo '<script>
		alert("Selamat! Berhasil Menambah Data Bank Titipan");
		window.location="' . base_url('BankTitipan/jurnal_ledger') . '"
		</script>';
	}

	public function edit_ledger($id){
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$where = array('id_bta'=>$id);
		$where_2 = array('id_bta'=>$id);
		$data['title'] = "DBT - Edit Jurnal Ledger";
		$data['marketing'] = $this->m_marketing->tampil_data()->result();
		$data['bank_titipan'] = $this->m_banktitipan->rincian_bt($where);
		$data['kredit_bt'] = $this->m_banktitipan->tampil_data_kredit($where_2)->result();

		$this->load->view('v_header', $data);
		$this->load->view('bank_titipan/edit_jl', $data);
		$this->load->view('v_footer', $data);
	}

	public function rincian_ledger($id){
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$where = array('id_bta'=>$id);
		$where_2 = array('id_bta'=>$id);
		$data['title'] = "DBT - Rincian Jurnal Ledger";
		$data['marketing'] = $this->m_marketing->tampil_data()->result();
		$data['bank_titipan'] = $this->m_banktitipan->rincian_bt($where);
		$data['kredit_bt'] = $this->m_banktitipan->tampil_data_kredit($where_2)->result();

		$this->load->view('v_header', $data);
		$this->load->view('bank_titipan/rincian_jl', $data);
		$this->load->view('v_footer', $data);
	}

	public function edit_kredit(){
		$tgl_kredit = $this->input->post('tgl_kredit');
		$keterangan_kredit = $this->input->post('keterangan_kredit');
		$nominal_kredit = $this->input->post('nominal_kredit');
		$id_kredit = $this->input->post('id_kredit');
		$id_bta = $this->input->post('id_bta');

		$data = array(
			'tgl_input_kredit' => $tgl_kredit,
			'keterangan_kredit' => $keterangan_kredit,
			'nominal_kredit' => $nominal_kredit
		);

		$where = array('id_kredit'=>$id_kredit);
		if (isset($where)) {
			$eksekusi = $this->m_banktitipan->update_kredit($where,$data);
			echo '<script>
			alert("Selamat! Berhasil Update Data Kredit BankTitipan");
			window.location="' . base_url('BankTitipan/edit_ledger/'.$id_bta) . '"
			</script>';
		}
		echo '<script>
		alert("Gagal Update Data Kredit BankTitipan");
		window.location="' . base_url('BankTitipan/edit_ledger/'.$id_bta) . '"
		</script>';
	}

	public function update_ledger(){
		$kode_perkiraan = $this->input->post('kode_perkiraan');
		$nama_properti = $this->input->post('nama_properti');
		$jt = $this->input->post('jt');
		$tgl_input = $this->input->post('tgl_input');
		$nama_marketing = $this->input->post('nama_marketing');
		$nominal = $this->input->post('nominal');
		$jenis = $this->input->post('jenis_lg');
		$keterangan = $this->input->post('keterangan');
		$id = $this->input->post('id_bta');

		$kredit = $this->input->post('kredit');
		$n_kredit = $this->input->post('n_kredit');

		date_default_timezone_set("Asia/Jakarta");
		$waktu = date("Y-m-d H:i:s");

		$data = array(
			'kode_perkiraan' => $kode_perkiraan,
			'nama_properti' => $nama_properti,
			'status_properti' => $jt,
			'id_marketing' => $nama_marketing,
			'tgl_input' => $tgl_input,
			'nilai_nominal' => $nominal,
			'jenis' => $jenis,
			'keterangan' => $keterangan
		);

		$data_kredit = array(
			'id_bta' => $id,
			'tgl_input_kredit' => $waktu,
			'keterangan_kredit' => $kredit,
			'nominal_kredit' => $n_kredit
		);


		$where = array('id_bta'=>$id);

		if (isset($where)) {
			$eksekusi = $this->m_banktitipan->update($where,$data);
			if (!empty($kredit)) {
				$this->m_banktitipan->simpan_kredit($data_kredit);

				echo '<script>
				alert("Selamat! Berhasil Update Data BankTitipan");
				window.location="' . base_url('BankTitipan/edit_ledger/'.$id) . '"
				</script>';
			}
			echo '<script>
			alert("Selamat! Berhasil Update Data BankTitipan");
			window.location="' . base_url('BankTitipan/jurnal_ledger') . '"
			</script>';
		}
		echo '<script>
		alert("Gagal Update Data BankTitipan");
		window.location="' . base_url('BankTitipan/jurnal_ledger') . '"
		</script>';
	}

	public function hapus_ledger($id_bta){
		$where = array('id_bta'=>$id_bta);
		if (isset($where)) {
			$this->m_banktitipan->hapus($where);
			echo '<script>
			alert("Selamat! Data berhasil terhapus.");
			window.location="' . base_url('BankTitipan/jurnal_ledger') . '"
			</script>';
		} else {
			echo '<script>
			alert("Gagal Menghapus !, ID Bank Titipan ' . $id_bta . ' Tidak ditemukan");
			window.location="' . base_url('BankTitipan/jurnal_ledger') . '"
			</script>';
		}
	}

	public function hapus_kredit_bt($id_kredit){
		$id_bta = $this->input->get('id_bta');

		$where = array('id_kredit'=>$id_kredit);
		if (isset($where)) {
			$this->m_banktitipan->hapus_kredit_bt($where);
			echo '<script>
			alert("Selamat! Data berhasil terhapus.");
			window.location="' . base_url('BankTitipan/edit_ledger/'.$id_bta) . '"
			</script>';
		} else {
			echo '<script>
			alert("Gagal Menghapus !, ID Kredit Bank Titipan ' . $id_kredit . ' Tidak ditemukan");
			window.location="' . base_url('BankTitipan/edit_ledger/'.$id_bta) . '"
			</script>';
		}
	}

	// public function tutup_jurnal(){
	// 	$saldo_akhir = $this->input->get('tsa');
	// 	$bulan = $this->input->get('bulan');
	// 	$dari = date("m-Y", strtotime($this->input->get('dari')));
	// 	$ke = date("m-Y", strtotime($this->input->get('ke')));

	// 	$dari_2 = date("Y", strtotime($dari));
	// 	$ke_2 = date("Y", strtotime($ke));

	// 	date_default_timezone_set("Asia/Jakarta");
	// 	$waktu = date("Y-m-d");
	// 	$waktuku = date("m-Y");

	// 	if ($dari_2 >= '2000' || $ke_2 >= '2000') {
	// 		$bulanku = $waktuku;
	// 	}else{
	// 		$bulanku = $ke;
	// 	}

	// 	$tanggal_jurnal = date('Y-m-d', strtotime('28-' . $bulanku));

	// 	$data = array(
	// 		'tgl_jurnal' => $tanggal_jurnal,
	// 		'tgl_asli_input' => $waktu,
	// 		'bulan_jurnal' => $bulan,
	// 		'saldo_akhir' => $saldo_akhir
	// 	);

	// 	$this->m_banktitipan->simpan_tutup_jurnal($data);

	// 	echo '<script>
	// 	alert("Selamat! Berhasil Menambah Data Bank Titipan");
	// 	window.location="' . base_url('BankTitipan') . '"
	// 	</script>';
	// }

	// public function hapus_tutup_jurnal(){
	// 	$id_jurnal = $this->input->get('id_jurnal');

	// 	$where = array('id_jurnal'=>$id_jurnal);
	// 	if (isset($where)) {
	// 		$this->m_banktitipan->hapus_tutup_jurnal($where);
	// 		echo '<script>
	// 		alert("Selamat! Data berhasil terhapus.");
	// 		window.location="' . base_url('BankTitipan/') . '"
	// 		</script>';
	// 	} else {
	// 		echo '<script>
	// 		alert("Gagal Menghapus !, ID Kredit Bank Titipan ' . $id_kredit . ' Tidak ditemukan");
	// 		window.location="' . base_url('BankTitipan/') . '"
	// 		</script>';
	// 	}
	// }
}
