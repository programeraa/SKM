<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Persediaan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_persediaan');
		$this->load->model('m_pengguna');
	}

	public function index(){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Komisi' || $level_asli == 'Admin Akuntan') {
			redirect(base_url('komisi'));
		}

		$data['title'] = "Jurnal Persediaan";
		$data['jurnal_persediaan'] = $this->m_persediaan->tampil_data_jurnal();
		$data['master_persediaan'] = $this->m_persediaan->tampil_data_persediaan();
		$data['tampil_pengguna'] = $this->m_pengguna->tampil_data();

		$this->load->view('v_header', $data);
		$this->load->view('persediaan/persediaan', $data);
		$this->load->view('js_semua_halaman', $data);
		$this->load->view('v_footer', $data);
	}

	public function filterJurnal(){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Komisi' || $level_asli == 'Admin Akuntan') {
			redirect(base_url('komisi'));
		}

		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');

		$data['title'] = "Jurnal Persediaan";
		$data['jurnal_persediaan'] = $this->m_persediaan->filterJurnal($dari, $ke);
		$data['master_persediaan'] = $this->m_persediaan->tampil_data_persediaan();
		$data['tampil_pengguna'] = $this->m_pengguna->tampil_data();

		$this->load->view('v_header', $data);
		$this->load->view('persediaan/persediaan', $data);
		$this->load->view('js_semua_halaman', $data);
		$this->load->view('v_footer', $data);
	}

	public function tambah_jurnal(){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Komisi' || $level_asli == 'Admin Akuntan') {
			redirect(base_url('komisi'));
		}

		$data['title'] = "Tambah Jurnal";
		$data['jumlah_data'] = $this->m_persediaan->jumlahDataJurnal();
		$data['latest_kode_jurnal'] = $this->m_persediaan->getLatestKodeJurnal();
		$data['master_persediaan'] = $this->m_persediaan->tampil_data_persediaan();

		$this->load->view('v_header', $data);
		$this->load->view('persediaan/tambah_jurnal', $data);
		$this->load->view('js_semua_halaman', $data);
		$this->load->view('v_footer', $data);
	}

	public function tambah_jurnal_lanjutan($kode_jurnal_baru){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Komisi' || $level_asli == 'CMO' || $level_asli == 'Admin Akuntan') {
			redirect(base_url('komisi'));
		}

		$where = array('kode_jurnal'=>$kode_jurnal_baru);

		$data['title'] = "Tambah Jurnal";
		$data['master_persediaan'] = $this->m_persediaan->tampil_data_persediaan();
		$data['jurnal_persediaan'] = $this->m_persediaan->edit_jurnal($where)->result();
		$data['tampil_pengguna'] = $this->m_pengguna->tampil_data();

		$this->load->view('v_header', $data);
		$this->load->view('persediaan/tambah_jurnal_lanjutan', $data);
		$this->load->view('js_semua_halaman', $data);
		$this->load->view('v_footer', $data);
	}

	public function input_jurnal(){
		$tgl_input = $this->input->post('tgl_input');
		$kode_persediaan = $this->input->post('kode_barang');
		$keterangan = $this->input->post('keterangan');
		$j_jurnal = $this->input->post('j_jurnal');
		$kode_jurnal = $this->input->post('kode_jurnal');
		$id = $this->input->post('id');

		$harga_satuan = $this->input->post('harga_satuan');
		$stok_barang = $this->input->post('stok_barang');
		$jumlah_barang = $this->input->post('jumlah_barang');

		date_default_timezone_set("Asia/Jakarta");
		$waktu = date("Y-m-d H:i:s");

		//=================================================

		$nominal = $harga_satuan * $jumlah_barang;

		if ($j_jurnal == 'Debit') {
			$sisa_stok = $stok_barang + $jumlah_barang;
		}else{
			$sisa_stok = $stok_barang - $jumlah_barang;
		}

		$dataX = array(
			'kode_jurnal' => $kode_jurnal,
			'tgl_input_asli_jurnal' => $waktu,
			'tgl_input_jurnal' => $tgl_input,	
			'id_barang' => $kode_persediaan,
			'keterangan_jurnal' => $keterangan,
			'jenis_jurnal' => $j_jurnal,
			'kuantitas_jurnal' => $jumlah_barang,
			'harga_satuan_jurnal' => $harga_satuan,
			'nominal_jurnal' => $nominal,
			'admin_jurnal' => $id
		);

		$data = array(
			'stok_persediaan' => $sisa_stok
		);

		$where = array(
			'id_persediaan' => $kode_persediaan
		);

		$this->m_persediaan->simpan_jurnal($dataX);
		$this->m_persediaan->update_persediaan($where, $data);

		echo '<script>
		alert("Selamat! Berhasil Menambah Data Jurnal");
		window.location="' . base_url('Persediaan/tambah_jurnal_lanjutan/') . $kode_jurnal . '"
		</script>';
	}

	public function edit_jurnal($id){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Komisi' || $level_asli == 'CMO' || $level_asli == 'Admin Akuntan') {
			redirect(base_url('komisi'));
		}

		$where = array('id_jurnal'=>$id);

		$kode_jurnal = array('kode_jurnal'=>$_GET['Kojur']);

		$data['title'] = "Edit Jurnal Persediaan";
		$data['jurnal_persediaan'] = $this->m_persediaan->edit_jurnal($where)->result();
		$data['jurnal_persediaan2'] = $this->m_persediaan->edit_jurnal_lanjutan($kode_jurnal)->result();
		$data['master_persediaan'] = $this->m_persediaan->tampil_data_persediaan();

		$this->load->view('v_header', $data);
		$this->load->view('persediaan/edit_jurnal', $data);
		$this->load->view('js_semua_halaman', $data);
		$this->load->view('v_footer', $data);
	}

	public function update_jurnal(){
		$tgl_input = $this->input->post('tgl_input');
		$keterangan = $this->input->post('keterangan');
		$j_jurnal = $this->input->post('j_jurnal');
		$id = $this->input->post('id_jurnal');

		$kode_jurnal = isset($_GET['from']) ? $_GET['from'] : null;

		$Kojur = isset($_GET['Kojur']) ? $_GET['Kojur'] : null;

		$jenis_simpan = $this->input->post('submit_type');

		date_default_timezone_set("Asia/Jakarta");
		$waktu = date("Y-m-d H:i:s");

		$data = array(
			'tgl_input_jurnal' => $tgl_input,
			'keterangan_jurnal' => $keterangan,
			'jenis_jurnal' => $j_jurnal
		);

		$where = array('id_jurnal'=>$id);

		if (isset($where)) {
			$this->m_persediaan->update_jurnal($where,$data);

			if ($kode_jurnal != null) {
				echo '<script>
				alert("Selamat! Berhasil Update Data Jurnal");
				window.location="' . base_url('persediaan/tambah_jurnal_lanjutan/'.$kode_jurnal) . '"
				</script>';
			}else{
				if ($jenis_simpan != 'null') {
					echo '<script>
					alert("Selamat! Berhasil Update Data Jurnal");
					window.location="' . base_url('persediaan/edit_jurnal/'.$id.'?Kojur='.$jenis_simpan) . '"
					</script>';
				}else{
					echo '<script>
					alert("Selamat! Berhasil Update Data Jurnal");
					window.location="' . base_url('persediaan') . '"
					</script>';
				}
			}
		}
		
		echo '<script>
		alert("Gagal Update Data Jurnal");
		window.location="' . base_url('persediaan') . '"
		</script>';
	}

	public function hapus_jurnal($id_jurnal){
		$where = array('id_jurnal'=>$id_jurnal);

		$kode_jurnal = isset($_GET['from']) ? $_GET['from'] : null;

		$jumlah_kode_jurnal = isset($_GET['JKJ']) ? $_GET['JKJ'] : null;

		$kojur = isset($_GET['Kojur']) ? $_GET['Kojur'] : null;

		$id = isset($_GET['ID']) ? $_GET['ID'] : null;

		if (isset($where)) {
			$this->m_persediaan->hapus_jurnal($where);

			if ($kode_jurnal != null) {
				if ($jumlah_kode_jurnal == 1) {
					echo '<script>
					alert("Selamat! Data berhasil Terhapus");
					window.location="' . base_url('persediaan') . '"
					</script>';
				}else{
					echo '<script>
					alert("Selamat! Data berhasil Terhapus");
					window.location="' . base_url('persediaan/tambah_jurnal_lanjutan/'.$kode_jurnal) . '"
					</script>';
				}
			}elseif($kojur != null){
				if ($id == $id_jurnal) {
					echo '<script>
					alert("Selamat! Data berhasil Terhapus");
					window.location="' . base_url('persediaan') . '"
					</script>';
				}else{
					echo '<script>
					alert("Selamat! Data berhasil Terhapus");
					window.location="' . base_url('persediaan/edit_jurnal/'.$id.'?Kojur='.$kojur) . '"
					</script>';
				}
			}else{
				echo '<script>
				alert("Selamat! Data berhasil Terhapus");
				window.location="' . base_url('persediaan') . '"
				</script>';
			}
		} else {
			echo '<script>
			alert("Gagal Menghapus !, ID Jurnal ' . $id_jurnal . ' Tidak ditemukan");
			window.location="' . base_url('jurnal') . '"
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
		} elseif ($level_asli == 'Admin Komisi' || $level_asli == 'Admin Akuntan') {
			redirect(base_url('komisi'));
		}

		$data['title'] = "Buku Besar Persediaan";
		$data['jurnal_persediaan'] = $this->m_persediaan->tampil_data_buku_besar();
		$data['master_persediaan'] = $this->m_persediaan->tampil_data_persediaan();

		$this->load->view('v_header', $data);
		$this->load->view('persediaan/buku_besar', $data);
		$this->load->view('js_semua_halaman', $data);
		$this->load->view('v_footer', $data);
	}

	public function filterBukuBesar(){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Komisi' || $level_asli == 'Admin Akuntan') {
			redirect(base_url('komisi'));
		}

		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');
		$kode_barang = $this->input->get('kode_barang');
		$jenis_jurnal = $this->input->get('jenis_jurnal');

		$data['title'] = "Buku Besar Persediaan";
		$data['jurnal_persediaan'] = $this->m_persediaan->filterBukuBesar($dari, $ke, $kode_barang, $jenis_jurnal);
		$data['master_persediaan'] = $this->m_persediaan->tampil_data_persediaan();
		//$data['tampil_pengguna'] = $this->m_pengguna->tampil_data();

		$this->load->view('v_header', $data);
		$this->load->view('persediaan/buku_besar', $data);
		$this->load->view('js_semua_halaman', $data);
		$this->load->view('v_footer', $data);
	}

	public function master_persediaan(){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Komisi' || $level_asli == 'Admin Akuntan') {
			redirect(base_url('komisi'));
		}

		$data['title'] = "Master Persediaan";
		$data['master_persediaan'] = $this->m_persediaan->tampil_data_persediaan();
		$data['jurnal_persediaan'] = $this->m_persediaan->tampil_data_jurnal();

		$this->load->view('v_header', $data);
		$this->load->view('persediaan/master_persediaan', $data);
		$this->load->view('js_semua_halaman', $data);
		$this->load->view('v_footer', $data);
	}

	public function tambah_persediaan(){
		$kode_barang = $this->input->post('kode_barang');
		$harga_satuan = $this->input->post('nominal');
		$nama_barang = $this->input->post('nama_barang');
		$jumlah_stok = $this->input->post('jumlah_stok');

		$data = array(
			'kode_persediaan' => $kode_barang,
			'nama_persediaan' => $nama_barang,
			'harga_persediaan' => $harga_satuan,
			'stok_persediaan' => $jumlah_stok
		);

		$this->m_persediaan->simpan_persediaan($data);

		echo '<script>
		alert("Selamat! Berhasil Menambah Data Persediaan");
		window.location="' . base_url('persediaan/master_persediaan'). '"
		</script>';
	}

	public function update_persediaan(){
		$kode_barang = $this->input->post('kode_barang');
		$harga_satuan = $this->input->post('nominal2');
		$nama_barang = $this->input->post('nama_barang');
		$jumlah_stok = $this->input->post('jumlah_stok');
		$id = $this->input->post('id_persediaan');

		$data = array(
			'kode_persediaan' => $kode_barang,
			'nama_persediaan' => $nama_barang,
			'harga_persediaan' => $harga_satuan,
			'stok_persediaan' => $jumlah_stok
		);

		$where = array('id_persediaan' => $id);

		if (isset($where)) {
			$this->m_persediaan->update_persediaan($where,$data);

			echo '<script>
			alert("Selamat! Berhasil Update Data Persediaan");
			window.location="' . base_url('persediaan/master_persediaan'). '"
			</script>';
		}else{
			echo '<script>
			alert("Gagal Update Data Persediaan");
			window.location="' . base_url('persediaan/master_persediaan') . '"
			</script>';
		}
	}

	public function hapus_persediaan($id_persediaan){
		$where = array('id_persediaan'=>$id_persediaan);
		if (isset($where)) {
			$this->m_persediaan->hapus_persediaan($where);
			echo '<script>
			alert("Selamat! Data Berhasil Terhapus.");
			window.location="' . base_url('persediaan/master_persediaan') . '"
			</script>';
		} else {
			echo '<script>
			alert("Gagal Menghapus !, ID Master ' . $id_persediaan . ' Tidak ditemukan");
			window.location="' . base_url('persediaan/master_persediaan') . '"
			</script>';
		}
	}
}