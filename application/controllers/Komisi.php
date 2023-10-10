<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komisi extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_komisi');
		$this->load->model('m_dashboard');
		$this->load->model('m_marketing');	}

		public function index()
		{	
			$level = $this->session->userdata('level');
			if ($level == '') {
				redirect(base_url('login'));
			}

			$data['title'] = 'Dashboard';
		// $data['data_pengajuan'] = $this->m_dashboard->data_pengajuan()->row_array();
		// $data['disetujui'] = $this->m_dashboard->disetujui()->row_array();
		// $data['ditolak'] = $this->m_dashboard->ditolak()->row_array();
		// $data['karyawan'] = $this->m_dashboard->karyawan()->row_array();

			$this->load->view('v_header', $data);
			$this->load->view('v_dashboard', $data);
			$this->load->view('v_footer', $data);
		}

		public function komisi(){
			$level = $this->session->userdata('level');
			if ($level == '') {
				$this->session->set_flashdata('gagal','Anda Belum Login');
				redirect(base_url('login'));
			}

			$data['title'] = 'Data Komisi Marketing';
			$data['komisi'] = $this->m_komisi->tampil_data()->result();
			$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();
			$data['co_broke'] = $this->m_komisi->tampil_data_cobroke()->result();

			$this->load->view('v_header', $data);
			$this->load->view('v_komisi', $data);
			$this->load->view('v_footer', $data);
		}

		public function tambah_komisi(){
			$alamat = $this->input->post('alamat');
			$jt = $this->input->post('jt');
			$tgl_closing = $this->input->post('tgl_closing');
			$ml = $this->input->post('marketing_listing');
			$ms = $this->input->post('marketing_selling');
			$komisi = $this->input->post('komisi');
			$admin = $this->input->post('admin');

		//tambahan m listing
			$mm_listing = $this->input->post('mm_listing');
			$npwpm_listing = $this->input->post('npwpm_listing');
			$npwpum_listing = $this->input->post('npwpum_listing');
			$npwpum_listing2 = $this->input->post('npwpum_listing2');

		//tambahan m selling
			$mm_selling = $this->input->post('mm_selling');
			$npwpm_selling = $this->input->post('npwpm_selling');
			$npwpum_selling = $this->input->post('npwpum_selling');
			$npwpum_selling2 = $this->input->post('npwpum_selling2');

			date_default_timezone_set("Asia/Jakarta");
			$waktu = date("Y-m-d H:i:s");

		//==================================================================
		//co-broke
			$pilih_ml = $this->input->post('ml');
			$pilih_ms = $this->input->post('ms');

			$broker_1 = '';
			$j_broker = '';

			$broker_2 = '';
			$j_broker2 = '';
			$status_broker = 'Tidak Ada';

			if ($pilih_ml == 'Broker') {
				$broker_1 = $this->input->post('broker_1');
				$j_broker = $this->input->post('j_broker');
				$status_broker = 'Listing'; 
			}
			if ($pilih_ms == 'Broker2') {
				$broker_2 = $this->input->post('broker_2');
				$j_broker2 = $this->input->post('j_broker2');
				$status_broker = 'Selling'; 
			}

			if (!empty($broker_1 && $j_broker)) {
				$nama_broker = $broker_1;
				$jenis_broker = $j_broker;
			}else{
				$nama_broker = $broker_2;
				$jenis_broker = $j_broker2;
			}
		//===============================================

		//potongan
			$potongan = $this->input->post('potongan');
			$j_potongan = $this->input->post('j_potongan');

		//referal
			$referal = $this->input->post('referal');
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

		//setting jumlah marketing A&A 
		//===============================================

			$data = array(
				'alamat_komisi' => $alamat,
				'jt_komisi' => $jt,
				'tgl_closing_komisi' => $tgl_closing,
				'mar_listing_komisi' => $ml_baru,
				'mar_listing2_komisi' => $ml_new,
				'mar_selling_komisi' => $ms_baru,
				'mar_selling2_komisi' => $ms_new,
				'bruto_komisi' => $komisi,
				'waktu_komisi' => $waktu,
				'status_komisi' => 'Belum Disetujui'
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

				$mbl_1 = $new_mm_listing_awal[0]; 
				$mbl_2 = $new_npwpm_listing_awal[0]; 
				$mbl_3 = $new_npwpum_listing_awal[0]; 
				$mbl_4 = $new_npwpum_listing2_awal[0]; 

				$new_mm_listing = $mbl_1;
				$new_npwpm_listing = $mbl_2;
				$new_npwpum_listing = $mbl_3;
				$new_npwpum_listing2 = $mbl_4;
			}else{
				$new_mm_listing = '';
				$new_npwpm_listing = '';
				$new_npwpum_listing = '';
				$new_npwpum_listing2 = '';
			}

			if (!empty($mm_listing_baru[1])) {
				$new_mm2_listing_awal = $mlb2[1] = explode(', ', $mm_listing[0]);
				$new_npwpm2_listing_awal = $mlb2[1] = explode(', ', $npwpm_listing[0]);
				$new_npwpum2_listing_awal = $mlb2[1] = explode(', ', $npwpum_listing[0]);
				$new_npwpum2_listing2_awal = $mlb2[1] = explode(', ', $npwpum_listing2[0]);

				$mbl2_1 = $new_mm2_listing_awal[1]; 
				$mbl2_2 = $new_npwpm2_listing_awal[1]; 
				$mbl2_3 = $new_npwpum2_listing_awal[1]; 
				$mbl2_4 = $new_npwpum2_listing2_awal[1];

				$new_mm2_listing = $mbl2_1;
				$new_npwpm2_listing = $mbl2_2;
				$new_npwpum2_listing = $mbl2_3;
				$new_npwpum2_listing2 = $mbl2_4; 
			}else{
				$new_mm2_listing = '';
				$new_npwpm2_listing = '';
				$new_npwpum2_listing = '';
				$new_npwpum2_listing2 = '';
			}

			if (!empty($mm_selling_baru[0])) {
				$new_mm_selling_awal = $msb[0] = explode(', ', $mm_selling[0]); 
				$new_npwpm_selling_awal = $msb[0] = explode(', ', $npwpm_selling[0]); 
				$new_npwpum_selling_awal = $msb[0] = explode(', ', $npwpum_selling[0]); 
				$new_npwpum_selling2_awal = $msb[0] = explode(', ', $npwpum_selling2[0]); 

				$msb_1 = $new_mm_selling_awal[0]; 
				$msb_2 = $new_npwpm_selling_awal[0]; 
				$msb_3 = $new_npwpum_selling_awal[0]; 
				$msb_4 = $new_npwpum_selling2_awal[0]; 

				$new_mm_selling = $msb_1;
				$new_npwpm_selling = $msb_2;
				$new_npwpum_selling = $msb_3;
				$new_npwpum_selling2 = $msb_4;
			}else{
				$new_mm_selling = '';
				$new_npwpm_selling = '';
				$new_npwpum_selling = '';
				$new_npwpum_selling2 = '';
			}

			if (!empty($mm_selling_baru[1])) {
				$new_mm2_selling_awal = $msb2[1] = explode(', ', $mm_selling[0]); 
				$new_npwpm2_selling_awal = $msb2[1] = explode(', ', $npwpm_selling[0]); 
				$new_npwpum2_selling_awal = $msb2[1] = explode(', ', $npwpum_selling[0]); 
				$new_npwpum2_selling2_awal = $msb2[1] = explode(', ', $npwpum_selling2[0]); 

				$msb_1 = $new_mm2_selling_awal[1]; 
				$msb_2 = $new_npwpm2_selling_awal[1]; 
				$msb_3 = $new_npwpum2_selling_awal[1]; 
				$msb_4 = $new_npwpum2_selling2_awal[1]; 

				$new_mm2_selling = $msb_1;
				$new_npwpm2_selling = $msb_2;
				$new_npwpum2_selling = $msb_3;
				$new_npwpum2_selling2 = $msb_4;
			}else{
				$new_mm2_selling = '';
				$new_npwpm2_selling = '';
				$new_npwpum2_selling = '';
				$new_npwpum2_selling2 = '';
			}

			$data2 = array(
				'id_komisi' => $id_komisi_baru,
				'mm_listing_komisi' => $new_mm_listing,
				'npwpm_listing_komisi' => $new_npwpm_listing,
				'npwpum_listing_komisi' => $new_npwpum_listing,
				'npwpum_listing2_komisi' => $new_npwpum_listing2,

				'mm2_listing_komisi' => $new_mm2_listing,
				'npwpm2_listing_komisi' => $new_npwpm2_listing,
				'npwpum2_listing_komisi' => $new_npwpum2_listing,
				'npwpum2_listing2_komisi' => $new_npwpum2_listing2,

				'mm_selling_komisi' => $new_mm_selling,
				'npwpm_selling_komisi' => $new_npwpm_selling,
				'npwpum_selling_komisi' => $new_npwpum_selling,
				'npwpum_selling2_komisi' => $new_npwpum_selling2,

				'mm2_selling_komisi' => $new_mm2_selling,
				'npwpm2_selling_komisi' => $new_npwpm2_selling,
				'npwpum2_selling_komisi' => $new_npwpum2_selling,
				'npwpum2_selling2_komisi' => $new_npwpum2_selling2,
				'admin_pengguna' => $admin
			);

			$this->m_komisi->simpan_sub_komisi($data2);

			$id_sub_komisi_baru = $this->m_komisi->get_last_inserted_id_sub_komisi();

			$data3 = array(
				'id_komisi' => $id_komisi_baru,
				'id_komisi_unik' => $id_komisi_unik,
				'nama_cobroke' => $nama_broker,
				'status_cobroke' => $status_broker,
				'jenis_cobroke' => $jenis_broker
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
				'jumlah_referal' => $j_referal
			);

			if (!empty($referal || $j_referal)) {
				$this->m_komisi->simpan_referal($data5);
			}

			// if (($ml_baru || $ml_new || $ms_baru || $ms_new) == 38) {
			// 	foreach ($marketing as $ang) {
			// 		if ($ang->nama_mar == "Ang") {

			// 			if ($ang->member_mar== 'Silver') {
			// 				$member_ang = 50;
			// 			}elseif ($ang->member_mar == 'Gold Express') {
			// 				$member_ang = 60;
			// 			}elseif ($ang->member_mar == 'Prime Pro') {
			// 				$member_ang = 70;
			// 			}elseif ($ang->member_mar == 'Black Jack') {
			// 				$member_ang = 80;
			// 			}  

			// 			if (!empty($ang->gambar_npwp_mar)) {
			// 				$npwp_ang = 1;
			// 			}else{
			// 				$npwp_ang = 0;
			// 			}

			// 			$up_ang = $ang->upline_emd_mar;
			// 			$up2_ang = $ang->upline_cmo_mar;
			// 			break;
			// 		}

			// 		foreach ($marketing as $ang_2) {
			// 			if ($ang_2->id_mar == $up_ang ) {
			// 				if (!empty($ang_2->gambar_npwp_mar)) {
			// 					$npwp_up_ang = 1;
			// 				}else{
			// 					$npwp_up_ang = 0;
			// 				}
			// 				break;
			// 			}
			// 		}

			// 		foreach ($marketing as $ang_3) {
			// 			if ($ang_3->id_mar == $up2_ang ) {
			// 				if (!empty($ang_3->gambar_npwp_mar)) {
			// 					$npwp_up2_ang = 1;
			// 				}else{
			// 					$npwp_up2_ang = 0;
			// 				}
			// 				break;
			// 			}
			// 		}
			// 	}

			// 	//=============================================================

			// 	foreach ($marketing as $fran) {
			// 		if ($fran->nama_mar == "Fran") {

			// 			if ($fran->member_mar== 'Silver') {
			// 				$member_fran = 50;
			// 			}elseif ($fran->member_mar == 'Gold Express') {
			// 				$member_fran = 60;
			// 			}elseif ($fran->member_mar == 'Prime Pro') {
			// 				$member_fran = 70;
			// 			}elseif ($fran->member_mar == 'Black Jack') {
			// 				$member_fran = 80;
			// 			}  

			// 			if (!empty($fran->gambar_npwp_mar)) {
			// 				$npwp_fran = 1;
			// 			}else{
			// 				$npwp_fran = 0;
			// 			}

			// 			$up_fran = $fran->upline_emd_mar;
			// 			$up2_fran = $fran->upline_cmo_mar;
			// 			break;
			// 		}

			// 		foreach ($marketing as $fran_2) {
			// 			if ($fran_2->id_mar == $up_fran ) {
			// 				if (!empty($fran_2->gambar_npwp_mar)) {
			// 					$npwp_up_fran = 1;
			// 				}else{
			// 					$npwp_up_fran = 0;
			// 				}
			// 				break;
			// 			}
			// 		}

			// 		foreach ($marketing as $fran_3) {
			// 			if ($fran_3->id_mar == $up2_fran ) {
			// 				if (!empty($fran_3->gambar_npwp_mar)) {
			// 					$npwp_up2_fran = 1;
			// 				}else{
			// 					$npwp_up2_fran = 0;
			// 				}
			// 				break;
			// 			}
			// 		}
			// 	}

			// 	//=============================================================

			// 	foreach ($marketing as $win) {
			// 		if ($win->nama_mar == "Winata") {

			// 			if ($win->member_mar== 'Silver') {
			// 				$member_win = 50;
			// 			}elseif ($win->member_mar == 'Gold Express') {
			// 				$member_win = 60;
			// 			}elseif ($win->member_mar == 'Prime Pro') {
			// 				$member_win = 70;
			// 			}elseif ($win->member_mar == 'Black Jack') {
			// 				$member_win = 80;
			// 			}  

			// 			if (!empty($win->gambar_npwp_mar)) {
			// 				$npwp_win = 1;
			// 			}else{
			// 				$npwp_win = 0;
			// 			}

			// 			$up_win = $win->upline_emd_mar;
			// 			$up2_win = $win->upline_cmo_mar;
			// 			break;
			// 		}

			// 		foreach ($marketing as $win_2) {
			// 			if ($win_2->id_mar == $up_win ) {
			// 				if (!empty($win_2->gambar_npwp_mar)) {
			// 					$npwp_up_win = 1;
			// 				}else{
			// 					$npwp_up_win = 0;
			// 				}
			// 				break;
			// 			}
			// 		}

			// 		foreach ($marketing as $win_3) {
			// 			if ($win_3->id_mar == $up2_win ) {
			// 				if (!empty($win_3->gambar_npwp_mar)) {
			// 					$npwp_up2_win = 1;
			// 				}else{
			// 					$npwp_up2_win = 0;
			// 				}
			// 				break;
			// 			}
			// 		}
			// 	}

			// 	$data6 = array(
			// 		'id_sub_komisi' => $id_sub_komisi_baru,
			// 		'm_ang' => $member_ang,
			// 		'npwp_ang' => $npwp_ang,
			// 		'npwp_up_ang' => $npwp_up_ang,
			// 		'npwp_up2_ang' => $npwp_up2_ang,

			// 		'm_fran' => $member_fran,
			// 		'npwp_fran' => $npwp_fran,
			// 		'npwp_up_fran' => $npwp_up_fran,
			// 		'npwp_up2_fran' => $npwp_up2_fran,

			// 		'm_win' => $member_win,
			// 		'npwp_win' => $npwp_win,
			// 		'npwp_up_win' => $npwp_up_win,
			// 		'npwp_up2_win' => $npwp_up2_win
			// 	);

			// 	$this->m_komisi->simpan_sub_komisi_afw($data6);

			// }

			echo '<script>
			alert("Selamat! Berhasil Menambah Data Komisi");
			window.location="' . base_url('komisi/komisi') . '"
			</script>';

		}
		public function rincian_komisi($id_komisi){
			$level = $this->session->userdata('level');
			if ($level == '') {
				$this->session->set_flashdata('gagal','Anda Belum Login');
				redirect(base_url('login'));
			}

			$where = array('id_komisi'=>$id_komisi);
			$data['title'] = 'Rincian Komisi Marketing';
			$data['komisi'] = $this->m_komisi->tampil_data_rincian($where)->result();
			$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();
			$data['co_broke'] = $this->m_komisi->tampil_data_cobroke()->result();
			$data['potongan'] = $this->m_komisi->tampil_data_potongan()->result();
			$data['referal'] = $this->m_komisi->tampil_data_referal()->result();

			$this->load->view('v_header', $data);
			$this->load->view('v_rincian_komisi', $data);
			$this->load->view('v_footer', $data);
		}

		public function edit_komisi($id_komisi){
			$level = $this->session->userdata('level');
			if ($level == '') {
				$this->session->set_flashdata('gagal','Anda Belum Login');
				redirect(base_url('login'));
			}

			$where = array('id_komisi'=>$id_komisi);
			$data['title'] = 'Edit Data Komisi Marketing';
			$data['komisi'] = $this->m_komisi->edit($where)->result();
			$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();
			$data['co_broke'] = $this->m_komisi->tampil_data_cobroke()->result();

			$this->load->view('v_header', $data);
			$this->load->view('v_edit_komisi', $data);
			$this->load->view('v_footer', $data);
		}

		public function update_komisi(){
			$alamat = $this->input->post('alamat');
			$jt = $this->input->post('jt');
			$tgl_closing = $this->input->post('tgl_closing');
			//$ml = $this->input->post('marketing_listing');
			//$ms = $this->input->post('marketing_selling');
			$komisi = $this->input->post('komisi');
			$status_komisi = $this->input->post('status_komisi');
			$admin = $this->input->post('admin');
			$id_komisi = $this->input->post('id_komisi');

			date_default_timezone_set("Asia/Jakarta");
			$waktu = date("Y-m-d H:i:s");

			$data = array(
				'alamat_komisi' => $alamat,
				'jt_komisi' => $jt,
				'tgl_closing_komisi' => $tgl_closing,
				//'mar_listing_komisi' => $ml,
				//'mar_selling_komisi' => $ms,
				'bruto_komisi' => $komisi,
				'status_komisi' => $status_komisi
			);

			$data2 = array();
			if ($status_komisi == 'Disetujui') {
				$data['tgl_disetujui'] = $waktu;
				$data2['admin_status_komisi'] = $admin;
			}else{
				$data['tgl_disetujui'] = 0000-00-00;
				$data2['admin_status_komisi'] = 0;
			}

			$where = array('id_komisi'=>$id_komisi);

			if (isset($where)) {
				$eksekusi = $this->m_komisi->update($where,$data);
				$eksekusi2 = $this->m_komisi->update_sub_komisi($where,$data2);


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
