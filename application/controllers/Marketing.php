<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Marketing extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_marketing');
	}

	public function index()
	{
		$data['title'] = "Data Marketing";
		$data['marketing'] = $this->m_marketing->tampil_data()->result();

		$this->load->view('v_header', $data);
		$this->load->view('v_marketing', $data);
		$this->load->view('v_footer', $data);
	}

	public function tambah(){
		$nama_mar = $this->input->post('nama');
		$id = $this->input->post('nomor');
		$member = $this->input->post('member');
		$emd = $this->input->post('emd');
		$cmo = $this->input->post('cmo');
		$npwp = $this->input->post('npwp');
		$norek = $this->input->post('norek');
		$fasilitas = $this->input->post('fasilitas');
		$jabatan = $this->input->post('jabatan');

		$config['upload_path'] = './assets/foto_marketing/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size'] = 2048;

		$this->load->library('upload', $config);

		$upload_ktp_success = true;
		$upload_npwp_success = true;

		$gambar_ktp = ''; // Inisialisasi gambar_ktp dengan string kosong
    	$gambar_npwp = ''; // Inisialisasi gambar_npwp dengan string kosong

		// Periksa apakah file gambar KTP dipilih sebelum mencoba unggah
		if (!empty($_FILES['g_ktp']['name'])) {
			if ($this->upload->do_upload('g_ktp')) {
				$upload_ktp = $this->upload->data();
				$gambar_ktp = $upload_ktp['file_name'];
			} else {
            // Jika gagal unggah, set upload_ktp_success ke false
				$upload_ktp_success = false;
			}
		}

		if (!empty($_FILES['g_npwp']['name'])) {
			if ($this->upload->do_upload('g_npwp')) {
				$upload_npwp = $this->upload->data();
				$gambar_npwp = $upload_npwp['file_name'];
				$upload_npwp_success = true;
			} else {
            // Jika gagal unggah, set upload_npwp_success ke false
				$upload_npwp_success = false;
			}
		}

    // Periksa apakah salah satu atau kedua gambar berhasil diunggah
		if ($upload_ktp_success || $upload_npwp_success) {
			$data = array(
				'nama_mar' => $nama_mar,
				'nomor_mar' => $id,
				'member_mar' => $member,
				'upline_emd_mar' => $emd,
				'upline_cmo_mar' => $cmo,
				'npwp_mar' => $npwp,
				'norek_mar' => $norek,
				'fasilitas_mar' => $fasilitas,
				'jabatan_mar' => $jabatan,
			);

        // Hanya jika gambar KTP diunggah, simpan nama file gambar KTP
			if ($upload_ktp_success) {
				$data['gambar_ktp_mar'] = $gambar_ktp;
			} else {
            // Jika tidak diunggah, set gambar_ktp_mar ke string kosong
				$data['gambar_ktp_mar'] = '';
			}

        // Hanya jika gambar NPWP diunggah, simpan nama file gambar NPWP
			if ($upload_npwp_success) {
				$data['gambar_npwp_mar'] = $gambar_npwp;
			} else {
            // Jika tidak diunggah, set gambar_npwp_mar ke string kosong
				$data['gambar_npwp_mar'] = '';
			}

			$this->m_marketing->simpan($data);

			echo '<script>
			alert("Selamat! Berhasil Menambah Data Marketing");
			window.location="' . base_url('marketing') . '"
			</script>';
		} else {
			$error = array('error' => $this->upload->display_errors());
			echo '<script>
			alert("Gagal Mengunggah Gambar KTP atau NPWP:\n' . $error['error'] . '");
			window.location="' . base_url('marketing') . '"
			</script>';
		}
	}


	public function edit($id){

		$where = array('id_mar'=>$id);
		$data['marketing'] = $this->m_marketing->edit($where)->result();
		$data['marketing_all'] = $this->m_marketing->tampil_data()->result();
		$data['title'] = 'Edit Marketing';
		
		$this->load->view('v_header', $data);
		$this->load->view('v_edit_marketing',$data);
		$this->load->view('v_footer', $data);
	}

	public function update(){
		$id_mar = $this->input->post('id_mar');
		$nama_mar = $this->input->post('nama');
		$id = $this->input->post('nomor');
		$member = $this->input->post('member');
		$emd = $this->input->post('emd');
		$cmo = $this->input->post('cmo');
		$npwp = $this->input->post('npwp');
		$norek = $this->input->post('norek');
		$fasilitas = $this->input->post('fasilitas');
		$jabatan = $this->input->post('jabatan');

		$data = array(
			'nama_mar' => $nama_mar,
			'nomor_mar' => $id,
			'member_mar' => $member,
			'upline_emd_mar' => $emd,
			'upline_cmo_mar' => $cmo,
			'npwp_mar' => $npwp,
			'norek_mar' => $norek,
			'fasilitas_mar' => $fasilitas,
			'jabatan_mar' => $jabatan
		);

		$where = array('id_mar'=>$id_mar);

		if (isset($where)) {
			$eksekusi = $this->m_marketing->update($where,$data);
			echo '<script>
			alert("Selamat! Berhasil Update Data Marketing");
			window.location="' . base_url('marketing') . '"
			</script>';
		}else{
			echo '<script>
			alert("Gagal Update Data Marketing");
			window.location="' . base_url('marketing') . '"
			</script>';
		}
	}

	public function hapus($id_mar){
		$where = array('id_mar'=>$id_mar);
		if (isset($where)) {
			$this->m_marketing->hapus($where);
			echo '<script>
			alert("Selamat! Data berhasil terhapus.");
			window.location="' . base_url('marketing') . '"
			</script>';
		} else {
			echo '<script>
			alert("Gagal Menghapus !, ID Marketing ' . $id_mar . ' Tidak ditemukan");
			window.location="' . base_url('marketing') . '"
			</script>';
		}
	}
}
