<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jurnal extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_marketing');	
		$this->load->model('m_jurnal');
		$this->load->model('m_banktitipan');
	}

	public function index(){
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$data['title'] = "Jurnal Umum";
		$data['jurnal_umum'] = $this->m_jurnal->tampil_data_jurnal();
		$data['jurnal_bttb'] = $this->m_jurnal->tampil_data_bttb()->result();

		$this->load->view('v_header', $data);
		$this->load->view('v_jurnal', $data);
		$this->load->view('v_footer', $data);
	}

	public function filterJurnal(){
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');
		$j_kode = '';
		$kode_per = '';

		$kode = '';
		$tgl = '';
		$bt = '';

		$data['title'] = "Jurnal Umum";
		$data['jurnal_umum'] = $this->m_jurnal->filter_jurnal($dari, $ke, $j_kode, $kode_per, $kode, $tgl, $bt);
		$data['jurnal_bttb'] = $this->m_jurnal->tampil_data_bttb()->result();

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
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

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

	public function buku_besar(){
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$data['title'] = "Buku Besar";
		$data['jurnal_umum'] = $this->m_jurnal->tampil_data_jurnal();
		$data['jurnal_bttb'] = $this->m_jurnal->tampil_data_bttb()->result();

		$this->load->view('v_header', $data);
		$this->load->view('jurnal/buku_besar', $data);
		$this->load->view('v_footer', $data);
	}

	public function filterBukuBesar(){
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');
		$j_kode = $this->input->get('j_kode');

		$kode_per = $this->input->get('kode_per');
		$kode = $this->input->get('kode');
		$tgl = $this->input->get('tgl');
		$bt = $this->input->get('bt');

		$data['title'] = "Buku Besar";
		$data['jurnal_umum'] = $this->m_jurnal->filter_jurnal($dari, $ke, $j_kode, $kode_per, $kode, $tgl, $bt);
		$data['jurnal_bttb'] = $this->m_jurnal->tampil_data_bttb()->result();

		$this->load->view('v_header', $data);
		$this->load->view('jurnal/buku_besar', $data);
		$this->load->view('v_footer', $data);
	}

	public function bttb(){
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$data['title'] = "Master Akun";
		$data['jurnal_bttb'] = $this->m_jurnal->tampil_data_bttb()->result();
		$data['jurnal_bttb2'] = $this->m_jurnal->tampil_data_bttb()->result();

		$this->load->view('v_header', $data);
		$this->load->view('jurnal/master_bttb', $data);
		$this->load->view('v_footer', $data);
	}

	public function filterBtTb(){
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');
		$j_kode = $this->input->get('j_kode');

		$data['title'] = "Master Akun";
		$data['jurnal_bttb'] = $this->m_jurnal->filter_bttb($dari, $ke, $j_kode);
		$data['jurnal_bttb2'] = $this->m_jurnal->tampil_data_bttb()->result();

		$this->load->view('v_header', $data);
		$this->load->view('jurnal/master_bttb', $data);
		$this->load->view('v_footer', $data);
	}

	public function tambah_bttb(){
		$kode_perkiraan = $this->input->post('kode_perkiraan');
		$nomor_perkiraan = $this->input->post('nomor_perkiraan');
		$keterangan = $this->input->post('keterangan');

		date_default_timezone_set("Asia/Jakarta");
		$waktu = date("Y-m-d H:i:s");

		$data = array(
			'kode_perkiraan' => $kode_perkiraan,
			'nomor_perkiraan' => $nomor_perkiraan,
			'keterangan' => $keterangan,
			'tgl_input' => $waktu
		);

		$this->m_jurnal->simpan_bttb($data);

		echo '<script>
		alert("Selamat! Berhasil Menambah Data Master");
		window.location="' . base_url('Jurnal/bttb') . '"
		</script>';
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

	public function tutup_jurnal(){
		$saldo_akhir = $this->input->get('tsa');
		$bulan = $this->input->get('bulan');
		$dari = date("m-Y", strtotime($this->input->get('dari')));
		$ke = date("m-Y", strtotime($this->input->get('ke')));

		$dari_2 = date("Y", strtotime($dari));
		$ke_2 = date("Y", strtotime($ke));

		date_default_timezone_set("Asia/Jakarta");
		$waktu = date("Y-m-d");
		$waktuku = date("m-Y");

		if ($dari_2 >= '2000' || $ke_2 >= '2000') {
			$bulanku = $waktuku;
		}else{
			$bulanku = $ke;
		}

		$tanggal_jurnal = date('Y-m-d', strtotime('28-' . $bulanku));

		$data = array(
			'tgl_jurnal' => $tanggal_jurnal,
			'tgl_asli_input' => $waktu,
			'bulan_jurnal' => $bulan,
			'saldo_akhir' => $saldo_akhir
		);

		$this->m_banktitipan->simpan_tutup_jurnal($data);

		echo '<script>
		alert("Selamat! Berhasil Menambah Data Bank Titipan");
		window.location="' . base_url('BankTitipan') . '"
		</script>';
	}

	public function hapus_tutup_jurnal(){
		$id_jurnal = $this->input->get('id_jurnal');

		$where = array('id_jurnal'=>$id_jurnal);
		if (isset($where)) {
			$this->m_banktitipan->hapus_tutup_jurnal($where);
			echo '<script>
			alert("Selamat! Data berhasil terhapus.");
			window.location="' . base_url('BankTitipan/') . '"
			</script>';
		} else {
			echo '<script>
			alert("Gagal Menghapus !, ID Kredit Bank Titipan ' . $id_kredit . ' Tidak ditemukan");
			window.location="' . base_url('BankTitipan/') . '"
			</script>';
		}
	}
}
