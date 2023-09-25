<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komisi extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_komisi');
		$this->load->model('m_dashboard');
		$this->load->model('m_marketing');
	}

	public function index()
	{	
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
		
		$data['title'] = 'Data Komisi Marketing';
		$data['komisi'] = $this->m_komisi->tampil_data()->result();
		$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();

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

		$data = array(
			'alamat_komisi' => $alamat,
			'jt_komisi' => $jt,
			'tgl_closing_komisi' => $tgl_closing,
			'mar_listing_komisi' => $ml,
			'mar_selling_komisi' => $ms,
			'bruto_komisi' => $komisi,
			'waktu_komisi' => $waktu
		);

		$this->m_komisi->simpan($data);

		$id_komisi_baru = $this->m_komisi->get_last_inserted_id();

		$data2 = array(
			'id_komisi' => $id_komisi_baru,
			'mm_listing_komisi' => $mm_listing,
			'npwpm_listing_komisi' => $npwpm_listing,
			'npwpum_listing_komisi' => $npwpum_listing,
			'npwpum_listing2_komisi' => $npwpum_listing2,

			'mm_selling_komisi' => $mm_selling,
			'npwpm_selling_komisi' => $npwpm_selling,
			'npwpum_selling_komisi' => $npwpum_selling,
			'npwpum_selling2_komisi' => $npwpum_selling2
		);
		
		$this->m_komisi->simpan_sub_komisi($data2);

		echo '<script>
		alert("Selamat! Berhasil Menambah Data Komisi");
		window.location="' . base_url('komisi/komisi') . '"
		</script>';

	}
	public function rincian_komisi($id_komisi){
		$where = array('id_komisi'=>$id_komisi);
		$data['title'] = 'Rincian Komisi Marketing';
		$data['komisi'] = $this->m_komisi->tampil_data_rincian($where)->result();
		$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();

		$this->load->view('v_header', $data);
		$this->load->view('v_rincian_komisi', $data);
		$this->load->view('v_footer', $data);
	}

	public function edit_komisi($id_komisi){
		$where = array('id_komisi'=>$id_komisi);
		$data['title'] = 'Edit Data Komisi Marketing';
		$data['komisi'] = $this->m_komisi->edit($where)->result();
		$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();

		$this->load->view('v_header', $data);
		$this->load->view('v_edit_komisi', $data);
		$this->load->view('v_footer', $data);
	}

	public function update_komisi(){
		$alamat = $this->input->post('alamat');
		$jt = $this->input->post('jt');
		$tgl_closing = $this->input->post('tgl_closing');
		$ml = $this->input->post('marketing_listing');
		$ms = $this->input->post('marketing_selling');
		$komisi = $this->input->post('komisi');
		$id_komisi = $this->input->post('id_komisi');

		$data = array(
			'alamat_komisi' => $alamat,
			'jt_komisi' => $jt,
			'tgl_closing_komisi' => $tgl_closing,
			'mar_listing_komisi' => $ml,
			'mar_selling_komisi' => $ms,
			'bruto_komisi' => $komisi
		);
		
		$where = array('id_komisi'=>$id_komisi);

		if (isset($where)) {
			$eksekusi = $this->m_komisi->update($where,$data);
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