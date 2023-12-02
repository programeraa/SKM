<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengguna extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_pengguna');
		$this->load->model('m_komisi');
	}

	public function index(){
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$data['title'] = "Data Pengguna";
		$data['pengguna'] = $this->m_pengguna->tampil_data()->result();
		$data['komisi'] = $this->m_komisi->tampil_data()->result();

		$this->load->view('v_header', $data);
		$this->load->view('v_pengguna', $data);
		$this->load->view('v_footer', $data);
	}

	public function tambah(){
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$level = $this->input->post('level');

		$config['upload_path'] = './assets/foto_ttd/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size'] = 2048;

		$this->load->library('upload', $config);

		$upload_ttd_success = true;
		$gambar_ttd = ''; // Inisialisasi gambar_ktp dengan string kosong

		// Periksa apakah file gambar ttd dipilih sebelum mencoba unggah
		if (!empty($_FILES['g_ttd']['name'])) {
			if ($this->upload->do_upload('g_ttd')) {
				$upload_ttd = $this->upload->data();
				$gambar_ttd = $upload_ttd['file_name'];
			} else {
            // Jika gagal unggah, set upload_ttd_success ke false
				$upload_ttd_success = false;
			}
		}

		$data = array(
			'nama_pengguna' => $nama,
			'username_pengguna' => $username,
			'pass_pengguna' => $password,
			'level_pengguna' => $level
		);

		if ($upload_ttd_success) {
			$data['gambar_ttd_pengguna'] = $gambar_ttd;
		} else {
            // Jika tidak diunggah, set gambar_ktp_mar ke string kosong
			$data['gambar_ttd_pengguna'] = '';
		}

		$this->m_pengguna->simpan($data);

		echo '<script>
		alert("Selamat! Berhasil Menambah Data Pengguna");
		window.location="' . base_url('pengguna') . '"
		</script>';
	}

	public function hapus_gambar_ttd($id_pengguna)
	{
    // Dapatkan data pengguna berdasarkan ID
		$pengguna = $this->m_pengguna->get_pengguna_by_id($id_pengguna);

    // Pastikan pengguna ditemukan
		if ($pengguna) {
        // Hapus gambar TTD dari direktori
			$gambar_ttd_path = './assets/foto_ttd/' . $pengguna->gambar_ttd_pengguna;
			if (file_exists($gambar_ttd_path) && is_file($gambar_ttd_path)) {
				unlink($gambar_ttd_path);
			}

        // Update data pengguna dengan menghapus gambar TTD
			$data = array('gambar_ttd_pengguna' => '');
			$where = array('id_pengguna' => $id_pengguna);
			$this->m_pengguna->update($where, $data);

        // Redirect kembali ke halaman edit pengguna
			redirect('pengguna/');
		}
	}

	public function update_pengguna(){
		$id = $this->input->post('id_pengguna');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');

		$kunci = '';
		if (!empty($this->input->post('password'))) {
			$password = $this->input->post('password');
			$kunci = 1;
		}

		$level = $this->input->post('level');

		$upload_ttd_success = false;
		$gambar_ttd = ''; // Inisialisasi gambar_ktp dengan string kosong

		$config['upload_path'] = './assets/foto_ttd/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size'] = 2048;

		$this->load->library('upload', $config);

		// Periksa apakah file gambar ttd dipilih sebelum mencoba unggah
		if (!empty($_FILES['g_ttd']['name'])) {
			if ($this->upload->do_upload('g_ttd')) {
				$upload_ttd = $this->upload->data();
				$gambar_ttd = $upload_ttd['file_name'];
				$upload_ttd_success = true;
			} else {
            // Jika gagal unggah, set upload_ttd_success ke false
				$upload_ttd_success = false;
			}
		}

		if ($kunci == 1) {
			$data = array(
				'nama_pengguna' => $nama,
				'username_pengguna' => $username,
				'pass_pengguna' => md5($password),
				'level_pengguna' => $level
			);
		}else{
			$data = array(
				'nama_pengguna' => $nama,
				'username_pengguna' => $username,
				'level_pengguna' => $level
			);
		}

		// Hanya jika gambar TTD diunggah, simpan nama file gambar TTD
		if ($upload_ttd_success) {
			$gambar_ttd_path = './assets/foto_ttd/' . $this->input->post('g_ttd2');
			if (file_exists($gambar_ttd_path) && is_file($gambar_ttd_path)) {
				unlink($gambar_ttd_path);
			}
			$data['gambar_ttd_pengguna'] = $gambar_ttd;
		} else {
	        // Jika tidak diunggah, gunakan data gambar TTD lama dari database
			$data['gambar_ttd_pengguna'] = $this->input->post('g_ttd2');
		}

		$where = array('id_pengguna'=>$id);

		if (isset($where)) {
			$eksekusi = $this->m_pengguna->update($where,$data);
			echo '<script>
			alert("Selamat! Berhasil Update Data Pengguna");
			window.location="' . base_url('pengguna') . '"
			</script>';
		}
		echo '<script>
		alert("Gagal Update Data Pengguna");
		window.location="' . base_url('pengguna') . '"
		</script>';
	}

	public function hapus($id_pengguna){
		$where = array('id_pengguna'=>$id_pengguna);
		if (isset($where)) {
			$this->m_pengguna->hapus($where);
			echo '<script>
			alert("Selamat! Data berhasil terhapus.");
			window.location="' . base_url('pengguna') . '"
			</script>';
		} else {
			echo '<script>
			alert("Gagal Menghapus !, ID Pengguna ' . $id_pengguna . ' Tidak ditemukan");
			window.location="' . base_url('pengguna') . '"
			</script>';
		}
	}
}
