<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengguna extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_pengguna');
	}

	public function index(){
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$data['title'] = "Data Pengguna";
		$data['pengguna'] = $this->m_pengguna->tampil_data()->result();

		$this->load->view('v_header', $data);
		$this->load->view('v_pengguna', $data);
		$this->load->view('v_footer', $data);
	}

	public function tambah(){
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$level = $this->input->post('level');

		$data = array(
			'nama_pengguna' => $nama,
			'username_pengguna' => $username,
			'pass_pengguna' => $password,
			'level_pengguna' => $level
		);

		$this->m_pengguna->simpan($data);

		echo '<script>
		alert("Selamat! Berhasil Menambah Data Pengguna");
		window.location="' . base_url('pengguna') . '"
		</script>';
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
