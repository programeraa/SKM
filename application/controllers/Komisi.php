<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komisi extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_komisi');
		$this->load->model('m_dashboard');
		$this->load->model('m_marketing');	
		$this->load->model('m_laporan');
		$this->load->model('m_pengaturan');
	}

	public function index()
	{	
		$level = $this->session->userdata('level');
		if ($level == '') {
			redirect(base_url('login'));
		}

		$data['title'] = 'Dashboard';
		$data['data_komisi'] = $this->m_dashboard->data_komisi()->row_array();
		$data['disetujui'] = $this->m_dashboard->disetujui()->row_array();
		$data['belum_disetujui'] = $this->m_dashboard->belum_disetujui()->row_array();
		$data['marketing'] = $this->m_dashboard->marketing()->row_array();

		$this->load->view('v_header', $data);
		$this->load->view('v_dashboard', $data);
		$this->load->view('v_footer', $data);
	}

	public function komisi(){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Akuntan') {
			redirect(base_url('komisi'));
		}

		$data['title'] = 'Data Komisi Marketing';
		$data['komisi'] = $this->m_komisi->tampil_data()->result();
		$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();
		$data['co_broke'] = $this->m_komisi->tampil_data_cobroke()->result();
		$data['member_marketing'] = $this->m_pengaturan->tampil_data_member()->result();
		$data['kantor'] = $this->m_pengaturan->tampil_data_kantor()->result();
		$data['tampil_jabatan'] = $this->m_pengaturan->tampil_data_jabatan()->result();

		$this->load->view('v_header', $data);
		$this->load->view('v_komisi', $data);
		$this->load->view('v_footer', $data);
	}

	public function tambah_komisi(){
		$kantor = $this->input->post('kantor');
		$alamat = $this->input->post('alamat');
		$jt = $this->input->post('jt');
		$tgl_closing = $this->input->post('tgl_closing');
		$ml = $this->input->post('marketing_listing');
		$ms = $this->input->post('marketing_selling');
		$komisi = $this->input->post('komisi');
		$admin = $this->input->post('admin');
		$keterangan = $this->input->post('keterangan');
		$jenis_hitungan = $this->input->post('jenis_hitungan');

		//tambahan m listing

		if ($jenis_hitungan == 'Secondary') {
			$mm_listing = $this->input->post('mm_listing');
			$nilai_primary = 0;
		}elseif($jenis_hitungan == 'KPR'){
			$mm_listing = $this->input->post('mm_listing_kpr');
			$nilai_primary = 0;
		}else{
			$mm_listing = $this->input->post('mm_listing');
			$nilai_primary = $this->input->post('nilai_primary');
		}

		$npwpm_listing = $this->input->post('npwpm_listing');
		$npwpum_listing = $this->input->post('npwpum_listing');
		$npwpum_listing2 = $this->input->post('npwpum_listing2');

		$jabatan_upline1 = $this->input->post('jabatanum_listing');
		$jabatan_upline2 = $this->input->post('jabatanum_listing2');

		//tambahan m selling

		if ($jenis_hitungan == 'Secondary') {
			$mm_selling = $this->input->post('mm_selling');
		}elseif($jenis_hitungan == 'KPR'){
			$mm_selling = $this->input->post('mm_selling_kpr');
		}else{
			$mm_selling = $this->input->post('mm_selling');
		}

		$npwpm_selling = $this->input->post('npwpm_selling');
		$npwpum_selling = $this->input->post('npwpum_selling');
		$npwpum_selling2 = $this->input->post('npwpum_selling2');

		$jabatans_upline1 = $this->input->post('jabatanum_selling');
		$jabatans_upline2 = $this->input->post('jabatanum_selling2');

		// var_dump($jenis_hitungan);
		// die();

		date_default_timezone_set("Asia/Jakarta");
		$waktu = date("Y-m-d H:i:s");

		//==================================================================
		//co-broke
		$pilih_ml = $this->input->post('ml');
		$pilih_ms = $this->input->post('ms');

		$broker_1 = '';
		$j_broker = '';
		$persen_komisi_1 = '';

		$broker_2 = '';
		$j_broker2 = '';
		$persen_komisi_2 = '';
		$status_broker = 'Tidak Ada';

		if ($pilih_ml == 'Broker') {
			$broker_1 = $this->input->post('broker_1');
			$j_broker = $this->input->post('j_broker');
			$persen_komisi_1 = $this->input->post('persen_komisi_1');
			$status_broker = 'Listing'; 
		}
		if ($pilih_ms == 'Broker2') {
			$broker_2 = $this->input->post('broker_2');
			$j_broker2 = $this->input->post('j_broker2');
			$persen_komisi_2 = $this->input->post('persen_komisi_2');
			$status_broker = 'Selling'; 
		}

		if (!empty($broker_1 && $j_broker)) {
			$nama_broker = $broker_1;
			$jenis_broker = $j_broker;
			$persen_cobroke = $persen_komisi_1;
		}else{
			$nama_broker = $broker_2;
			$jenis_broker = $j_broker2;
			$persen_cobroke = $persen_komisi_2;
		}
		//===============================================

		//potongan
		$potongan = $this->input->post('potongan');
		$j_potongan = $this->input->post('j_potongan');

		//referal
		$referal = $this->input->post('referal');
		$pph_referal = $this->input->post('pph_referal');
		$j_referal = $this->input->post('j_referal');

		// Menentukan biji (seed)
		$seed = microtime(true) * 10000;
		mt_srand($seed);

		// Menghasilkan nomor acak dengan biji yang telah ditentukan
		$id_komisi_unik = mt_rand(1000, 9999);

		//setting marketing listing dan selling
		if (!empty($ml)) {
			$ml_baru = $ml[0];
		}else{
			$ml_baru = $id_komisi_unik;
		}

		if (!empty($ms)) {
			$ms_baru = $ms[0];
		}else{
			$ms_baru = $id_komisi_unik;
		}

		//==============================================
		if (!empty($ml[1])) {
			$ml_new = $ml[1];
		}else{
			$ml_new = '';
		}

		if (!empty($ms[1])) {
			$ms_new = $ms[1];
		}else{
			$ms_new = '';
		}

		$hasil_cek = $this->m_komisi->get_last_data_by_kantor_komisi($kantor);
		$nomor_kantor = $hasil_cek && property_exists($hasil_cek, 'nomor_kantor_komisi') ? $hasil_cek->nomor_kantor_komisi + 1 : 1;

		//setting jumlah marketing A&A 
		//===============================================

		$data = array(
			'kantor_komisi' => $kantor,
			'nomor_kantor_komisi' => $nomor_kantor,
			'jenis_hitungan_komisi' => $jenis_hitungan,
			'alamat_komisi' => $alamat,
			'jt_komisi' => $jt,
			'tgl_closing_komisi' => $tgl_closing,
			'mar_listing_komisi' => $ml_baru,
			'mar_listing2_komisi' => $ml_new,
			'mar_selling_komisi' => $ms_baru,
			'mar_selling2_komisi' => $ms_new,
			'bruto_komisi' => $komisi,
			'waktu_komisi' => $waktu,
			'status_komisi' => 'Proses Approve',
			'status_transfer' => 'Proses Transfer',
			'keterangan_komisi' => $keterangan
		);
		
		$this->m_komisi->simpan($data);

		$id_komisi_baru = $this->m_komisi->get_last_inserted_id();

		$mm_listing_baru = explode(', ', $mm_listing[0]);
		$mm_selling_baru = explode(', ', $mm_selling[0]);

		if (!empty($mm_listing_baru[0])) {
			$new_mm_listing_awal = $mlb[0] = explode(', ', $mm_listing[0]); 
			$new_npwpm_listing_awal = $mlb[0] = explode(', ', $npwpm_listing[0]); 
			$new_npwpum_listing_awal = $mlb[0] = explode(', ', $npwpum_listing[0]); 
			$new_npwpum_listing2_awal = $mlb[0] = explode(', ', $npwpum_listing2[0]); 

			$new_jabatannum_listing_awal = $mlb[0] = explode(', ', $jabatan_upline1[0]); 
			$new_jabatannum_listing2_awal = $mlb[0] = explode(', ', $jabatan_upline2[0]); 

			$mbl_1 = $new_mm_listing_awal[0]; 
			$mbl_2 = $new_npwpm_listing_awal[0]; 
			$mbl_3 = $new_npwpum_listing_awal[0]; 
			$mbl_4 = $new_npwpum_listing2_awal[0]; 

			$mbl_5 = $new_jabatannum_listing_awal[0]; 
			$mbl_6 = $new_jabatannum_listing2_awal[0]; 

			$new_mm_listing = $mbl_1;
			$new_npwpm_listing = $mbl_2;
			$new_npwpum_listing = $mbl_3;
			$new_npwpum_listing2 = $mbl_4;

			$new_jabatanum_listing = $mbl_5;
			$new_jabatanum_listing2 = $mbl_6;
		}else{
			$new_mm_listing = '';
			$new_npwpm_listing = '';
			$new_npwpum_listing = '';
			$new_npwpum_listing2 = '';

			$new_jabatanum_listing = '';
			$new_jabatanum_listing2 = '';
		}

		if (!empty($mm_listing_baru[1])) {
			$new_mm2_listing_awal = $mlb2[1] = explode(', ', $mm_listing[0]);
			$new_npwpm2_listing_awal = $mlb2[1] = explode(', ', $npwpm_listing[0]);
			$new_npwpum2_listing_awal = $mlb2[1] = explode(', ', $npwpum_listing[0]);
			$new_npwpum2_listing2_awal = $mlb2[1] = explode(', ', $npwpum_listing2[0]);

			$new_jabatanum2_listing_awal = $mlb2[1] = explode(', ', $jabatan_upline1[0]);
			$new_jabatanum2_listing2_awal = $mlb2[1] = explode(', ', $jabatan_upline2[0]);

			$mbl2_1 = $new_mm2_listing_awal[1]; 
			$mbl2_2 = $new_npwpm2_listing_awal[1]; 
			$mbl2_3 = $new_npwpum2_listing_awal[1]; 
			$mbl2_4 = $new_npwpum2_listing2_awal[1];

			$mbl2_5 = $new_jabatanum2_listing_awal[1];
			$mbl2_6 = $new_jabatanum2_listing2_awal[1];

			$new_mm2_listing = $mbl2_1;
			$new_npwpm2_listing = $mbl2_2;
			$new_npwpum2_listing = $mbl2_3;
			$new_npwpum2_listing2 = $mbl2_4; 

			$new_jabatanum2_listing = $mbl2_5;
			$new_jabatanum2_listing2 = $mbl2_6; 
		}else{
			$new_mm2_listing = '';
			$new_npwpm2_listing = '';
			$new_npwpum2_listing = '';
			$new_npwpum2_listing2 = '';

			$new_jabatanum2_listing = '';
			$new_jabatanum2_listing2 = ''; 
		}

		if (!empty($mm_selling_baru[0])) {
			$new_mm_selling_awal = $msb[0] = explode(', ', $mm_selling[0]); 
			$new_npwpm_selling_awal = $msb[0] = explode(', ', $npwpm_selling[0]); 
			$new_npwpum_selling_awal = $msb[0] = explode(', ', $npwpum_selling[0]); 
			$new_npwpum_selling2_awal = $msb[0] = explode(', ', $npwpum_selling2[0]); 

			$new_jabatannum_selling_awal = $msb[0] = explode(', ', $jabatans_upline1[0]); 
			$new_jabatannum_selling2_awal = $msb[0] = explode(', ', $jabatans_upline2[0]); 

			$msb_1 = $new_mm_selling_awal[0]; 
			$msb_2 = $new_npwpm_selling_awal[0]; 
			$msb_3 = $new_npwpum_selling_awal[0]; 
			$msb_4 = $new_npwpum_selling2_awal[0]; 

			$msb_5 = $new_jabatannum_selling_awal[0]; 
			$msb_6 = $new_jabatannum_selling2_awal[0];

			$new_mm_selling = $msb_1;
			$new_npwpm_selling = $msb_2;
			$new_npwpum_selling = $msb_3;
			$new_npwpum_selling2 = $msb_4;

			$new_jabatanum_selling = $msb_5;
			$new_jabatanum_selling2 = $msb_6;
		}else{
			$new_mm_selling = '';
			$new_npwpm_selling = '';
			$new_npwpum_selling = '';
			$new_npwpum_selling2 = '';

			$new_jabatanum_selling = '';
			$new_jabatanum_selling2 = '';
		}

		if (!empty($mm_selling_baru[1])) {
			$new_mm2_selling_awal = $msb2[1] = explode(', ', $mm_selling[0]); 
			$new_npwpm2_selling_awal = $msb2[1] = explode(', ', $npwpm_selling[0]); 
			$new_npwpum2_selling_awal = $msb2[1] = explode(', ', $npwpum_selling[0]); 
			$new_npwpum2_selling2_awal = $msb2[1] = explode(', ', $npwpum_selling2[0]);

			$new_jabatannum2_selling_awal = $msb2[1] = explode(', ', $jabatans_upline1[0]); 
			$new_jabatannum2_selling2_awal = $msb2[1] = explode(', ', $jabatans_upline2[0]);  

			$msb_1 = $new_mm2_selling_awal[1]; 
			$msb_2 = $new_npwpm2_selling_awal[1]; 
			$msb_3 = $new_npwpum2_selling_awal[1]; 
			$msb_4 = $new_npwpum2_selling2_awal[1]; 

			$msb_5 = $new_jabatannum2_selling_awal[1]; 
			$msb_6 = $new_jabatannum2_selling2_awal[1]; 

			$new_mm2_selling = $msb_1;
			$new_npwpm2_selling = $msb_2;
			$new_npwpum2_selling = $msb_3;
			$new_npwpum2_selling2 = $msb_4;

			$new_jabatanum2_selling = $msb_5;
			$new_jabatanum2_selling2 = $msb_6;
		}else{
			$new_mm2_selling = '';
			$new_npwpm2_selling = '';
			$new_npwpum2_selling = '';
			$new_npwpum2_selling2 = '';

			$new_jabatanum2_selling = '';
			$new_jabatanum2_selling2 = '';
		}

		$data2 = array(
			'id_komisi' => $id_komisi_baru,
			'primary_komisi' => $nilai_primary,
			
			'mm_listing_komisi' => $new_mm_listing,
			'npwpm_listing_komisi' => $new_npwpm_listing,
			'npwpum_listing_komisi' => $new_npwpum_listing,
			'jabatanum_listing_komisi' => $new_jabatanum_listing,
			'npwpum_listing2_komisi' => $new_npwpum_listing2,
			'jabatanum_listing2_komisi' => $new_jabatanum_listing2,

			'mm2_listing_komisi' => $new_mm2_listing,
			'npwpm2_listing_komisi' => $new_npwpm2_listing,
			'npwpum2_listing_komisi' => $new_npwpum2_listing,
			'jabatanum2_listing_komisi' => $new_jabatanum2_listing,
			'npwpum2_listing2_komisi' => $new_npwpum2_listing2,
			'jabatanum2_listing2_komisi' => $new_jabatanum2_listing2,

			'mm_selling_komisi' => $new_mm_selling,
			'npwpm_selling_komisi' => $new_npwpm_selling,
			'npwpum_selling_komisi' => $new_npwpum_selling,
			'jabatanum_selling_komisi' => $new_jabatanum_selling,
			'npwpum_selling2_komisi' => $new_npwpum_selling2,
			'jabatanum_selling2_komisi' => $new_jabatanum_selling2,

			'mm2_selling_komisi' => $new_mm2_selling,
			'npwpm2_selling_komisi' => $new_npwpm2_selling,
			'npwpum2_selling_komisi' => $new_npwpum2_selling,
			'jabatanum2_selling_komisi' => $new_jabatanum2_selling,
			'npwpum2_selling2_komisi' => $new_npwpum2_selling2,
			'jabatanum2_selling2_komisi' => $new_jabatanum2_selling2,
			'admin_pengguna' => $admin
		);

		$this->m_komisi->simpan_sub_komisi($data2);

		$id_sub_komisi_baru = $this->m_komisi->get_last_inserted_id_sub_komisi();

		$data3 = array(
			'id_komisi' => $id_komisi_baru,
			'id_komisi_unik' => $id_komisi_unik,
			'nama_cobroke' => $nama_broker,
			'status_cobroke' => $status_broker,
			'jenis_cobroke' => $jenis_broker,
			'persen_komisi_cobroke' => $persen_cobroke
		);

		if (!empty($broker_1 || $broker_2)) {
			$this->m_komisi->simpan_co_broke($data3);
		}

		$data4 = array(
			'id_komisi' => $id_komisi_baru,
			'keterangan_potongan' => $potongan,
			'jumlah_potongan' => $j_potongan
		);
		if (!empty($potongan || $j_potongan)) {
			$this->m_komisi->simpan_potongan($data4);
		}

		$data5 = array(
			'id_komisi' => $id_komisi_baru,
			'keterangan_referal' => $referal,
			'pph_referal' => $pph_referal,
			'jumlah_referal' => $j_referal
		);

		if (!empty($referal || $j_referal)) {
			$this->m_komisi->simpan_referal($data5);
		}

		if ($jenis_hitungan == 'Secondary') {
			$m_ang = $this->input->post('m_ang');
			$m_fran = $this->input->post('m_fran');
			$m_win = $this->input->post('m_win');
		}elseif($jenis_hitungan == 'KPR'){
			$m_ang = $this->input->post('m_ang_kpr');
			$m_fran = $this->input->post('m_fran_kpr');
			$m_win = $this->input->post('m_win_kpr');
		}else{
			$m_ang = $this->input->post('m_ang');
			$m_fran = $this->input->post('m_fran');
			$m_win = $this->input->post('m_win');
		}

		$data6 = array(
			'id_sub_komisi' => $id_sub_komisi_baru,
			'm_ang' => $m_ang,
			'npwp_ang' => $this->input->post('npwp_ang'),
			'npwp_up_ang' => $this->input->post('npwp_up_ang'),
			'jabatan_up_ang' => $this->input->post('jabatan_up_ang'),
			'npwp_up2_ang' => $this->input->post('npwp_up2_ang'),
			'jabatan_up2_ang' => $this->input->post('jabatan_up2_ang'),

			'm_fran' => $m_fran,
			'npwp_fran' => $this->input->post('npwp_fran'),
			'npwp_up_fran' => $this->input->post('npwp_up_fran'),
			'jabatan_up_fran' => $this->input->post('jabatan_up_fran'),
			'npwp_up2_fran' => $this->input->post('npwp_up2_fran'),
			'jabatan_up2_fran' => $this->input->post('jabatan_up2_fran'),

			'm_win' => $m_win,
			'npwp_win' => $this->input->post('npwp_win'),
			'npwp_up_win' => $this->input->post('npwp_up_win'),
			'jabatan_up_win' => $this->input->post('jabatan_up_win'),
			'npwp_up2_win' => $this->input->post('npwp_up2_win'),
			'jabatan_up2_win' => $this->input->post('jabatan_up2_win')
		);

		if ($ml_baru == 38 || $ms_baru == 38 || $ml_new == 38 || $ms_new == 38) {
			$this->m_komisi->simpan_sub_komisi_afw($data6);
		}

		$id_sub_komisi = $this->input->post('alamat');

		echo '<script>
		alert("Selamat! Berhasil Menambah Data Komisi");
		window.location="' . base_url('komisi/komisi') . '"
		</script>';

	}
	public function rincian_komisi($id_komisi){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Akuntan') {
			redirect(base_url('komisi'));
		}

		$where = array('id_komisi'=>$id_komisi);
		$data['title'] = 'Rincian Komisi Marketing';
		$data['komisi'] = $this->m_komisi->tampil_data_rincian($where)->result();
		$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();
		$data['co_broke'] = $this->m_komisi->tampil_data_cobroke()->result();
		$data['potongan'] = $this->m_komisi->tampil_data_potongan()->result();
		$data['referal'] = $this->m_komisi->tampil_data_referal()->result();
		$data['pengurangan'] = $this->m_komisi->tampil_data_pengurangan()->result();
		$data['sub_komisi'] = $this->m_komisi->tampil_data_sub_komisi()->result();
		$data['sub_afw'] = $this->m_komisi->tampil_data_sub_afw()->result();
		$data['kantor'] = $this->m_pengaturan->tampil_data_kantor()->result();
		$data['tampil_level'] = $this->m_pengaturan->tampil_data_level()->result();

		$this->load->view('v_header', $data);
		$this->load->view('v_rincian_komisi', $data);
		$this->load->view('v_footer', $data);
	}

	public function tambah_pengurangan_fee() {
		$id_komisi = $this->input->post('id_komisi');
		$id_marketing = $this->input->post('id_marketing');
		$ket_pengurangan = $this->input->post('keterangan_pengurangan');
		$jumlah_pengurangan = $this->input->post('jumlah_pengurangan');
		$status_marketing = $this->input->post('status_marketing');

		$data = array(
			'id_komisi' => $id_komisi,
			'id_marketing' => $id_marketing,
			'keterangan_pengurangan' => $ket_pengurangan,
			'jumlah_pengurangan' => $jumlah_pengurangan,
			'status_pengurangan' => $status_marketing
		);

		$this->m_komisi->simpan_pengurangan_fee($data);

		echo '<script>
		window.location="' . base_url('komisi/rincian_komisi/'.$id_komisi.'') . '"
		</script>';
	}

	public function hapus_pengurangan_fee(){
		$id_komisi = $this->input->get('id_komisi');
		$id_marketing = $this->input->get('id_marketing');

		$where = array('id_komisi'=>$id_komisi,'id_marketing'=> $id_marketing);
		if (isset($where)) {
			$this->m_komisi->hapus_pengurangan_fee($where);
			echo '<script>
			window.location="' . base_url('komisi/rincian_komisi/'.$id_komisi.'') . '"
			</script>';
		}
	}

	public function edit_komisi($id_komisi){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Akuntan' && $level_asli == 'CMO') {
			redirect(base_url('komisi'));
		}

		$where = array('id_komisi'=>$id_komisi);
		$data['title'] = 'Edit Data Komisi Marketing';
		$data['komisi'] = $this->m_komisi->edit($where)->result();
		$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();
		$data['co_broke'] = $this->m_komisi->tampil_data_cobroke()->result();
		$data['kantor'] = $this->m_pengaturan->tampil_data_kantor()->result();

		$this->load->view('v_header', $data);
		$this->load->view('v_edit_komisi', $data);
		$this->load->view('v_footer', $data);
	}

	public function update_komisi(){
		$alamat = $this->input->post('alamat');
		$jt = $this->input->post('jt');
		$tgl_closing = $this->input->post('tgl_closing');
		$komisi = $this->input->post('komisi');
		$status_transfer = $this->input->post('st');
		$keterangan = $this->input->post('keterangan');
		$id_komisi = $this->input->post('id_komisi');

			//$ml = $this->input->post('marketing_listing');
			//$ms = $this->input->post('marketing_selling');
			//$status_komisi = $this->input->post('status_komisi');
			//$admin = $this->input->post('admin');

			//date_default_timezone_set("Asia/Jakarta");
			//$waktu = date("Y-m-d H:i:s");

		$data = array(
			'alamat_komisi' => $alamat,
			'jt_komisi' => $jt,
			'tgl_closing_komisi' => $tgl_closing,
			'status_transfer' => $status_transfer,
			'bruto_komisi' => $komisi,
			'keterangan_komisi' => $keterangan

				//'status_komisi' => $status_komisi
				//'mar_listing_komisi' => $ml,
				//'mar_selling_komisi' => $ms,
		);

			// $data2 = array();
			// if ($status_komisi == 'Disetujui') {
			// 	$previous_status = $this->m_komisi->get_status($id_komisi);

			// 	if ($previous_status != 'Disetujui') {
			// 		$data['tgl_disetujui'] = $waktu;
			// 	}

			// 	$data2['admin_status_komisi'] = $admin;
			// } else {
			// 	$data['tgl_disetujui'] = '0000-00-00';
			// 	$data2['admin_status_komisi'] = 0;
			// }

		$where = array('id_komisi'=>$id_komisi);

		if (isset($where)) {
			$eksekusi = $this->m_komisi->update($where,$data);
				//$eksekusi2 = $this->m_komisi->update_sub_komisi($where,$data2);

			echo '<script>
			alert("Selamat! Berhasil Update Data Komisi");
			window.location="' . base_url('komisi/komisi') . '"
			</script>';
		}

		echo '<script>
		alert("Gagal Update Data Komisi");
		window.location="' . base_url('komisi/komisi') . '"
		</script>';

	}

	public function update_status_komisi(){
		$status_komisi = $this->input->post('status_komisi');
		$admin = $this->input->post('admin');
		$id_komisi = $this->input->post('id_komisi');

		$id_mar1 = $this->input->post('id_marketing1');
		$id_mar2 = $this->input->post('id_marketing2');
		$id_mar3 = $this->input->post('id_marketing3');
		$id_mar4 = $this->input->post('id_marketing4');

		//fgs listing 1
		$fgs1_l1 = $this->input->post('fgs1_l1');
		$fee_fgs1_l1 = $this->input->post('fee_fgs1_l1');
		$pph_fgs1_l1 = $this->input->post('pph_fgs1_l1');

		$fgs2_l1 = $this->input->post('fgs2_l1');
		$fee_fgs2_l1 = $this->input->post('fee_fgs2_l1');
		$pph_fgs2_l1 = $this->input->post('pph_fgs2_l1');

		//fgs listing 2
		$fgs1_l2 = $this->input->post('fgs1_l2');
		$fee_fgs1_l2 = $this->input->post('fee_fgs1_l2');
		$pph_fgs1_l2 = $this->input->post('pph_fgs1_l2');

		$fgs2_l2 = $this->input->post('fgs2_l2');
		$fee_fgs2_l2 = $this->input->post('fee_fgs2_l2');
		$pph_fgs2_l2 = $this->input->post('pph_fgs2_l2');

		//fgs selling 1
		$fgs1_s1 = $this->input->post('fgs1_s1');
		$fee_fgs1_s1 = $this->input->post('fee_fgs1_s1');
		$pph_fgs1_s1 = $this->input->post('pph_fgs1_s1');

		$fgs2_s1 = $this->input->post('fgs2_s1');
		$fee_fgs2_s1 = $this->input->post('fee_fgs2_s1');
		$pph_fgs2_s1 = $this->input->post('pph_fgs2_s1');

		//fgs selling 2
		$fgs1_s2 = $this->input->post('fgs1_s2');
		$fee_fgs1_s2 = $this->input->post('fee_fgs1_s2');
		$pph_fgs1_s2 = $this->input->post('pph_fgs1_s2');

		$fgs2_s2 = $this->input->post('fgs2_s2');
		$fee_fgs2_s2 = $this->input->post('fee_fgs2_s2');
		$pph_fgs2_s2 = $this->input->post('pph_fgs2_s2');

		$fee_kantor1 = $this->input->post('fee_kantor1');
		$fee_kantor2 = $this->input->post('fee_kantor2');
		$fee_kantor3 = $this->input->post('fee_kantor3');
		$fee_kantor4 = $this->input->post('fee_kantor4');

		$fee_mar1 = $this->input->post('fee_marketing1');
		$fee_mar2 = $this->input->post('fee_marketing2');
		$fee_mar3 = $this->input->post('fee_marketing3');
		$fee_mar4 = $this->input->post('fee_marketing4');

		$fee_setelah_adm1 = $this->input->post('fee_marketing_smtr1');
		$fee_setelah_adm2 = $this->input->post('fee_marketing_smtr2');
		$fee_setelah_adm3 = $this->input->post('fee_marketing_smtr3');
		$fee_setelah_adm4 = $this->input->post('fee_marketing_smtr4');

		$ptn_admin1 = $this->input->post('ptn_admin1');
		$ptn_admin2 = $this->input->post('ptn_admin2');
		$ptn_admin3 = $this->input->post('ptn_admin3');
		$ptn_admin4 = $this->input->post('ptn_admin4');

		$ptn_pph1 = $this->input->post('ptn_pph1');
		$ptn_pph2 = $this->input->post('ptn_pph2');
		$ptn_pph3 = $this->input->post('ptn_pph3');
		$ptn_pph4 = $this->input->post('ptn_pph4');

		if ($this->input->post('ptn_pribadi1') == null) {
			$ptn_pribadi1 = 0;
		}else{
			$ptn_pribadi1 = $this->input->post('ptn_pribadi1');
		}

		if ($this->input->post('ptn_pribadi2') == null) {
			$ptn_pribadi2 = 0;
		}else{
			$ptn_pribadi2 = $this->input->post('ptn_pribadi2');
		}

		if ($this->input->post('ptn_pribadi3') == null) {
			$ptn_pribadi3 = 0;
		}else{
			$ptn_pribadi3 = $this->input->post('ptn_pribadi3');
		}

		if ($this->input->post('ptn_pribadi4') == null) {
			$ptn_pribadi4 = 0;
		}else{
			$ptn_pribadi4 = $this->input->post('ptn_pribadi4');
		}

		$netto_mar1 = $this->input->post('netto_marketing1');
		$netto_mar2 = $this->input->post('netto_marketing2');
		$netto_mar3 = $this->input->post('netto_marketing3');
		$netto_mar4 = $this->input->post('netto_marketing4');

		$id_ang = $this->input->post('id_ang');
		$fee_kantor_ang = $this->input->post('fee_kantor_afw');
		$fee_ang = $this->input->post('fee_ang');
		$admin_ang = $this->input->post('admin_ang');
		$pph_ang = $this->input->post('pph_ang');
		$ppribadi_ang = $this->input->post('ppribadi_ang');
		$netto_ang = $this->input->post('netto_ang');

		$fee_setelah_adm_ang = $this->input->post('fee_smtr_ang');

		//fgs ang
		$fgs1_ang = $this->input->post('fgs1_ang');
		$fee_fgs1_ang = $this->input->post('fee_fgs1_ang');
		$pph_fgs1_ang = $this->input->post('pph_fgs1_ang');

		$fgs2_ang = $this->input->post('fgs2_ang');
		$fee_fgs2_ang = $this->input->post('fee_fgs2_ang');
		$pph_fgs2_ang = $this->input->post('pph_fgs2_ang');

		//==============================================================================

		$id_fran = $this->input->post('id_fran');
		$fee_kantor_fran = 0;
		$fee_fran = $this->input->post('fee_fran');
		$admin_fran = $this->input->post('admin_fran');
		$pph_fran = $this->input->post('pph_fran');
		$ppribadi_fran = $this->input->post('ppribadi_fran');
		$netto_fran = $this->input->post('netto_fran');

		$fee_setelah_adm_fran = $this->input->post('fee_smtr_fran');

		//fgs fran
		$fgs1_fran = $this->input->post('fgs1_fran');
		$fee_fgs1_fran = $this->input->post('fee_fgs1_fran');
		$pph_fgs1_fran = $this->input->post('pph_fgs1_fran');

		$fgs2_fran = $this->input->post('fgs2_fran');
		$fee_fgs2_fran = $this->input->post('fee_fgs2_fran');
		$pph_fgs2_fran = $this->input->post('pph_fgs2_fran');

		//==============================================================================

		$id_win = $this->input->post('id_win');
		$fee_kantor_win = 0;
		$fee_win = $this->input->post('fee_win');
		$admin_win = $this->input->post('admin_win');
		$pph_win = $this->input->post('pph_win');
		$ppribadi_win = $this->input->post('ppribadi_win');
		$netto_win = $this->input->post('netto_win');

		$fee_setelah_adm_win = $this->input->post('fee_smtr_win');

		//fgs win
		$fgs1_win = $this->input->post('fgs1_win');
		$fee_fgs1_win = $this->input->post('fee_fgs1_win');
		$pph_fgs1_win = $this->input->post('pph_fgs1_win');

		$fgs2_win = $this->input->post('fgs2_win');
		$fee_fgs2_win = $this->input->post('fee_fgs2_win');
		$pph_fgs2_win = $this->input->post('pph_fgs2_win');

		//==============================================================================

		$fee_cobroke = $this->input->post('fee_cobroke1');
		$pph_cobroke = $this->input->post('pph_cobroke1');

		//==============================================================================

		$fee_referal = $this->input->post('fee_referal');
		$pph_referal = $this->input->post('pph_referal');
		
		date_default_timezone_set("Asia/Jakarta");
		$waktu = date("Y-m-d H:i:s");

		$data = array(
			'status_komisi' => $status_komisi
		);

		$dataX = array();
		if ($status_komisi == 'Approve') {
			$previous_status = $this->m_komisi->get_status($id_komisi);

			if ($previous_status != 'Approve') {
				$data['tgl_disetujui'] = $waktu;
			}

			$dataX['admin_status_komisi'] = $admin;
		} else {
			$data['tgl_disetujui'] = '0000-00-00';
			$dataX['admin_status_komisi'] = 0;
		}

		$data_omzet = array(
			'id_komisi' => $id_komisi
		);

		$data_pph = array(
			'id_komisi' => $id_komisi
		);

		$id_omzet_baru = null;

		if ($status_komisi == 'Approve') {
			$previous_status = $this->m_komisi->get_status($id_komisi);

			if ($previous_status != 'Approve') {
				$this->m_laporan->simpan_omzet($data_omzet);

				$id_omzet_baru = $this->m_laporan->get_last_inserted_id_data_omzet();

				$this->m_laporan->simpan_pph($data_pph);	
			}

		}elseif($this->m_komisi->get_status($id_komisi) == 'Approve' && $status_komisi == 'Proses Approve') {
			$where = array('id_komisi'=>$id_komisi);
			$this->m_laporan->hapus_omzet($where);
			$this->m_laporan->hapus_pph($where);
		}

		$id_pph_baru = $this->m_laporan->get_last_inserted_id_data_pph();

		$data1 = array(
			'id_omzet' => $id_omzet_baru,
			'id_marketing' => $id_mar1,
			'fee_kantor' => $fee_kantor1,
			'fee_marketing' => $fee_mar1,
			'ptn_admin' => $ptn_admin1,
			'ptn_pph' => $ptn_pph1,
			'ptn_pribadi' => $ptn_pribadi1,
			'netto_vision' => $fee_kantor1 + $ptn_admin1,
			'netto_marketing' => $netto_mar1
		);

		$data2 = array(
			'id_omzet' => $id_omzet_baru,
			'id_marketing' => $id_mar2,
			'fee_kantor' => $fee_kantor2,
			'fee_marketing' => $fee_mar2,
			'ptn_admin' => $ptn_admin2,
			'ptn_pph' => $ptn_pph2,
			'ptn_pribadi' => $ptn_pribadi2,
			'netto_vision' => $fee_kantor2 + $ptn_admin2,
			'netto_marketing' => $netto_mar2
		);

		$data3 = array(
			'id_omzet' => $id_omzet_baru,
			'id_marketing' => $id_mar3,
			'fee_kantor' => $fee_kantor3,
			'fee_marketing' => $fee_mar3,
			'ptn_admin' => $ptn_admin3,
			'ptn_pph' => $ptn_pph3,
			'ptn_pribadi' => $ptn_pribadi3,
			'netto_vision' => $fee_kantor3 + $ptn_admin3,
			'netto_marketing' => $netto_mar3
		);

		$data4 = array(
			'id_omzet' => $id_omzet_baru,
			'id_marketing' => $id_mar4,
			'fee_kantor' => $fee_kantor4,
			'fee_marketing' => $fee_mar4,
			'ptn_admin' => $ptn_admin4,
			'ptn_pph' => $ptn_pph4,
			'ptn_pribadi' => $ptn_pribadi4,
			'netto_vision' => $fee_kantor4 + $ptn_admin4,
			'netto_marketing' => $netto_mar4
		); 

		$data_ang = array(
			'id_omzet' => $id_omzet_baru,
			'id_marketing' => $id_ang,
			'fee_kantor' => $fee_kantor_ang,
			'fee_marketing' => $fee_ang,
			'ptn_admin' => $admin_ang,
			'ptn_pph' => $pph_ang,
			'ptn_pribadi' => $ppribadi_ang,
			'netto_vision' => $fee_kantor_ang + $admin_ang,
			'netto_marketing' => $netto_ang
		);

		$data_fran = array(
			'id_omzet' => $id_omzet_baru,
			'id_marketing' => $id_fran,
			'fee_kantor' => $fee_kantor_fran,
			'fee_marketing' => $fee_fran,
			'ptn_admin' => $admin_fran,
			'ptn_pph' => $pph_fran,
			'ptn_pribadi' => $ppribadi_fran,
			'netto_vision' => $fee_kantor_fran + $admin_fran,
			'netto_marketing' => $netto_fran
		);

		$data_win = array(
			'id_omzet' => $id_omzet_baru,
			'id_marketing' => $id_win,
			'fee_kantor' => $fee_kantor_win,
			'fee_marketing' => $fee_win,
			'ptn_admin' => $admin_win,
			'ptn_pph' => $pph_win,
			'ptn_pribadi' => $ppribadi_win,
			'netto_vision' => $fee_kantor_win + $admin_win,
			'netto_marketing' => $netto_win
		);

		// var_dump($data_ang);
		// die();

		//=================================================================================

		$dataX1 = array(
			'id_pph' => $id_pph_baru,
			'id_marketing' => $id_mar1,
			'status_marketing' => 'Listing/Selling',
			'fee_setelah_adm' => $fee_setelah_adm1,
			'ptn_pph' => $ptn_pph1,
			'total_pph' => $ptn_pph1
		);

		$dataUp1L1 = array(
			'id_pph' => $id_pph_baru,
			'id_marketing' => $fgs1_l1,
			'status_marketing' => 'Upline',
			'fgs' => $fee_fgs1_l1,
			'ptn_pph' => $pph_fgs1_l1,
			'total_pph' => $pph_fgs1_l1
		);

		$dataUp2L1 = array(
			'id_pph' => $id_pph_baru,
			'id_marketing' => $fgs2_l1,
			'status_marketing' => 'Upline',
			'fgs' => $fee_fgs2_l1,
			'ptn_pph' => $pph_fgs2_l1,
			'total_pph' => $pph_fgs2_l1
		);

		//================================================

		$dataX2 = array(
			'id_pph' => $id_pph_baru,
			'id_marketing' => $id_mar2,
			'status_marketing' => 'Listing/Selling',
			'fee_setelah_adm' => $fee_setelah_adm2,
			'ptn_pph' => $ptn_pph2,
			'total_pph' => $ptn_pph2
		);

		$dataUp1L2 = array(
			'id_pph' => $id_pph_baru,
			'id_marketing' => $fgs1_l2,
			'status_marketing' => 'Upline',
			'fgs' => $fee_fgs1_l2,
			'ptn_pph' => $pph_fgs1_l2,
			'total_pph' => $pph_fgs1_l2
		);

		$dataUp2L2 = array(
			'id_pph' => $id_pph_baru,
			'id_marketing' => $fgs2_l2,
			'status_marketing' => 'Upline',
			'fgs' => $fee_fgs2_l2,
			'ptn_pph' => $pph_fgs2_l2,
			'total_pph' => $pph_fgs2_l2
		);

		//==============================================

		$dataX3 = array(
			'id_pph' => $id_pph_baru,
			'id_marketing' => $id_mar3,
			'status_marketing' => 'Listing/Selling',
			'fee_setelah_adm' => $fee_setelah_adm3,
			'ptn_pph' => $ptn_pph3,
			'total_pph' => $ptn_pph3
		);

		$dataUp1S1 = array(
			'id_pph' => $id_pph_baru,
			'id_marketing' => $fgs1_s1,
			'status_marketing' => 'Upline',
			'fgs' => $fee_fgs1_s1,
			'ptn_pph' => $pph_fgs1_s1,
			'total_pph' => $pph_fgs1_s1
		);

		$dataUp2S1 = array(
			'id_pph' => $id_pph_baru,
			'id_marketing' => $fgs2_s1,
			'status_marketing' => 'Upline',
			'fgs' => $fee_fgs2_s1,
			'ptn_pph' => $pph_fgs2_s1,
			'total_pph' => $pph_fgs2_s1
		);

		//==============================================

		$dataX4 = array(
			'id_pph' => $id_pph_baru,
			'id_marketing' => $id_mar4,
			'status_marketing' => 'Listing/Selling',
			'fee_setelah_adm' => $fee_setelah_adm4,
			'ptn_pph' => $ptn_pph4,
			'total_pph' => $ptn_pph4
		); 

		$dataUp1S2 = array(
			'id_pph' => $id_pph_baru,
			'id_marketing' => $fgs1_s2,
			'status_marketing' => 'Upline',
			'fgs' => $fee_fgs1_s2,
			'ptn_pph' => $pph_fgs1_s2,
			'total_pph' => $pph_fgs1_s2
		);

		$dataUp2S2 = array(
			'id_pph' => $id_pph_baru,
			'id_marketing' => $fgs2_s2,
			'status_marketing' => 'Upline',
			'fgs' => $fee_fgs2_s2,
			'ptn_pph' => $pph_fgs2_s2,
			'total_pph' => $pph_fgs2_s2
		);

		//=============================================

		$dataX_ang = array(
			'id_pph' => $id_omzet_baru,
			'id_marketing' => $id_ang,
			'fee_kantor' => $fee_kantor_ang,
			'fee_marketing' => $fee_ang,
			'ptn_admin' => $admin_ang,
			'ptn_pph' => $pph_ang,
			'ptn_pribadi' => $ppribadi_ang,
			'netto_vision' => $fee_kantor_ang + $admin_ang,
			'netto_marketing' => $netto_ang
		);

		$dataX_fran = array(
			'id_pph' => $id_omzet_baru,
			'id_marketing' => $id_fran,
			'fee_kantor' => $fee_kantor_fran,
			'fee_marketing' => $fee_fran,
			'ptn_admin' => $admin_fran,
			'ptn_pph' => $pph_fran,
			'ptn_pribadi' => $ppribadi_fran,
			'netto_vision' => $fee_kantor_fran + $admin_fran,
			'netto_marketing' => $netto_fran
		);

		$dataX_win = array(
			'id_pph' => $id_omzet_baru,
			'id_marketing' => $id_win,
			'fee_kantor' => $fee_kantor_win,
			'fee_marketing' => $fee_win,
			'ptn_admin' => $admin_win,
			'ptn_pph' => $pph_win,
			'ptn_pribadi' => $ppribadi_win,
			'netto_vision' => $fee_kantor_win + $admin_win,
			'netto_marketing' => $netto_win
		);

		//=================================================================================

		$dataX_Pph_Ang = array(
			'id_pph' => $id_pph_baru,
			'id_marketing' => $id_ang,
			'status_marketing' => 'Listing/Selling',
			'fee_setelah_adm' => $fee_setelah_adm_ang,
			'ptn_pph' => $pph_ang,
			'total_pph' => $pph_ang
		);

		$dataUp1_Ang = array(
			'id_pph' => $id_pph_baru,
			'id_marketing' => $fgs1_ang,
			'status_marketing' => 'Upline',
			'fgs' => $fee_fgs1_ang,
			'ptn_pph' => $pph_fgs1_ang,
			'total_pph' => $pph_fgs1_ang
		);

		$dataUp2_Ang = array(
			'id_pph' => $id_pph_baru,
			'id_marketing' => $fgs2_ang,
			'status_marketing' => 'Upline',
			'fgs' => $fee_fgs2_ang,
			'ptn_pph' => $pph_fgs2_ang,
			'total_pph' => $pph_fgs2_ang
		);

		//=======================================================================

		$dataX_Pph_Fran = array(
			'id_pph' => $id_pph_baru,
			'id_marketing' => $id_fran,
			'status_marketing' => 'Listing/Selling',
			'fee_setelah_adm' => $fee_setelah_adm_fran,
			'ptn_pph' => $pph_fran,
			'total_pph' => $pph_fran
		);

		$dataUp1_Fran = array(
			'id_pph' => $id_pph_baru,
			'id_marketing' => $fgs1_fran,
			'status_marketing' => 'Upline',
			'fgs' => $fee_fgs1_fran,
			'ptn_pph' => $pph_fgs1_fran,
			'total_pph' => $pph_fgs1_fran
		);

		$dataUp2_Fran = array(
			'id_pph' => $id_pph_baru,
			'id_marketing' => $fgs2_fran,
			'status_marketing' => 'Upline',
			'fgs' => $fee_fgs2_fran,
			'ptn_pph' => $pph_fgs2_fran,
			'total_pph' => $pph_fgs2_fran
		);

		//=======================================================================

		$dataX_Pph_Win = array(
			'id_pph' => $id_pph_baru,
			'id_marketing' => $id_win,
			'status_marketing' => 'Listing/Selling',
			'fee_setelah_adm' => $fee_setelah_adm_win,
			'ptn_pph' => $pph_win,
			'total_pph' => $pph_win
		);

		$dataUp1_Win = array(
			'id_pph' => $id_pph_baru,
			'id_marketing' => $fgs1_win,
			'status_marketing' => 'Upline',
			'fgs' => $fee_fgs1_win,
			'ptn_pph' => $pph_fgs1_win,
			'total_pph' => $pph_fgs1_win
		);

		$dataUp2_Win = array(
			'id_pph' => $id_pph_baru,
			'id_marketing' => $fgs2_win,
			'status_marketing' => 'Upline',
			'fgs' => $fee_fgs2_win,
			'ptn_pph' => $pph_fgs2_win,
			'total_pph' => $pph_fgs2_win
		);

		$data_pph_cobroke = array(
			'id_pph' => $id_pph_baru,
			'fee_cobroke' => $fee_cobroke,
			'pph_cobroke' => $pph_cobroke,
			'ref_cobroke' => 0
		);

		$data_pph_referal = array(
			'id_pph' => $id_pph_baru,
			'fee_cobroke' => $fee_referal,
			'pph_cobroke' => $pph_referal,
			'ref_cobroke' => 1
		);

		if ($status_komisi == 'Approve') {
			$previous_status = $this->m_komisi->get_status($id_komisi);

			if ($previous_status != 'Approve') {
				if (!empty($id_mar1) && $id_mar1 != 0 && $id_mar1 != $id_mar2 && $id_mar1 != 38 && $id_mar1 != null) {
					$this->m_laporan->simpan1($data1);

					$this->m_laporan->simpan_pph1($dataX1);
				}

				if (!empty($id_mar2) && $id_mar2 != 0 && $id_mar2 != 38 && $id_mar2 != null) {
					$this->m_laporan->simpan2($data2);

					$this->m_laporan->simpan_pph2($dataX2);
				}

				if (!empty($id_mar3) && $id_mar3 != 0 && $id_mar3 != 38) {
					$this->m_laporan->simpan3($data3);

					$this->m_laporan->simpan_pph3($dataX3);
				}

				if (!empty($id_mar4) && $id_mar4 != 0 && $id_mar4 != 38) {
					$this->m_laporan->simpan4($data4);

					$this->m_laporan->simpan_pph4($dataX4);
				}

				if ($id_ang != 0) {
					$this->m_laporan->simpan_ang($data_ang);

					$this->m_laporan->simpan_pph_ang($dataX_Pph_Ang);
				}

				if ($id_fran != 0) {
					$this->m_laporan->simpan_fran($data_fran);

					$this->m_laporan->simpan_pph_fran($dataX_Pph_Fran);
				}

				if ($id_win != 0) {
					$this->m_laporan->simpan_win($data_win);

					$this->m_laporan->simpan_pph_win($dataX_Pph_Win);
				}

				if (!empty($fee_cobroke)) {
					$this->m_laporan->simpan_pph_cobroke($data_pph_cobroke);	
				}

				if (!empty($fee_referal)) {
					$this->m_laporan->simpan_pph_referal($data_pph_referal);	
				}

				//=========================================== upline listing 1

				if ($fgs1_l1 != 0) {
					$this->m_laporan->simpan_fgs1_listing1($dataUp1L1);
				}

				if ($fgs2_l1 != 0) {
					$this->m_laporan->simpan_fgs2_listing1($dataUp2L1);
				}

				//=========================================== upline listing 2

				if ($fgs1_l2 != 0) {
					$this->m_laporan->simpan_fgs1_listing2($dataUp1L2);
				}

				if ($fgs2_l2 != 0) {
					$this->m_laporan->simpan_fgs2_listing2($dataUp2L2);
				}

				//=========================================== upline selling 1

				if ($fgs1_s1 != 0 && $id_mar1 != $id_mar2) {
					$this->m_laporan->simpan_fgs1_selling1($dataUp1S1);
				}

				if ($fgs2_s1 != 0 && $id_mar1 != $id_mar2) {
					$this->m_laporan->simpan_fgs2_selling1($dataUp2S1);
				}

				//=========================================== upline selling 2

				if ($fgs1_s2 != 0) {
					$this->m_laporan->simpan_fgs1_selling2($dataUp1S2);
				}

				if ($fgs2_s2 != 0) {
					$this->m_laporan->simpan_fgs2_selling2($dataUp2S2);
				}

				//===============================================================================

				//=========================================== upline ang

				if ($fgs1_ang != 0) {
					$this->m_laporan->simpan_fgs1_ang($dataUp1_Ang);
				}

				if ($fgs2_ang != 0) {
					$this->m_laporan->simpan_fgs2_ang($dataUp2_Ang);
				}

				//=========================================== upline fran

				if ($fgs1_fran != 0) {
					$this->m_laporan->simpan_fgs1_fran($dataUp1_Fran);
				}

				if ($fgs2_fran != 0) {
					$this->m_laporan->simpan_fgs2_fran($dataUp2_Fran);
				}

				//=========================================== upline win

				if ($fgs1_win != 0) {
					$this->m_laporan->simpan_fgs1_win($dataUp1_Win);
				}

				if ($fgs2_win != 0) {
					$this->m_laporan->simpan_fgs2_win($dataUp2_Win);
				}
			}
		}

		$where = array('id_komisi'=>$id_komisi);

		if (isset($where)) {
			$eksekusi = $this->m_komisi->update($where,$data);
			$eksekusi2 = $this->m_komisi->update_sub_komisi($where,$dataX);

			echo '<script>
			alert("Selamat! Berhasil Update Data Komisi");
			window.location="' . base_url('komisi/rincian_komisi/'.$id_komisi.'') . '"
			</script>';
		}

		echo '<script>
		alert("Gagal Update Data Komisi");
		window.location="' . base_url('komisi/rincian_komisi/'.$id_komisi.'') . '"
		</script>';
	}

	public function hapus($id_komisi){
		$where = array('id_komisi'=>$id_komisi);
		if (isset($where)) {
			$this->m_komisi->hapus($where);
			echo '<script>
			alert("Selamat! Data berhasil terhapus.");
			window.location="' . base_url('komisi/komisi') . '"
			</script>';
		} else {
			echo '<script>
			alert("Gagal Menghapus !, ID Pengajuan ' . $id_komisi . ' Tidak ditemukan");
			window.location="' . base_url('komisi/komisi') . '"
			</script>';
		}
	}
}
?>
