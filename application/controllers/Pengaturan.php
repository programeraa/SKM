<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengaturan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_pengaturan');
	}

	public function index(){
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$data['title'] = "Data Jabatan Marketing";
		$data['jabatan'] = $this->m_pengaturan->tampil_data_jabatan()->result();

		$this->load->view('v_header', $data);
		$this->load->view('v_jabatan', $data);
		$this->load->view('v_footer', $data);
	}

	public function tambah_jabatan(){
		$nama = $this->input->post('nama');
		$nilai = $this->input->post('nilai');

		$data = array(
			'nama_jabatan' => $nama,
			'nilai_jabatan' => $nilai
		);

		$this->m_pengaturan->simpan_jabatan($data);

		echo '<script>
		alert("Selamat! Berhasil Menambah Data Pengaturan");
		window.location="' . base_url('pengaturan') . '"
		</script>';
	}

	public function edit_jabatan(){
		$nama = $this->input->post('nama');
		$nilai = $this->input->post('nilai');
		$id = $this->input->post('id_jabatan');

		$data = array(
			'nama_jabatan' => $nama,
			'nilai_jabatan' => $nilai
		);

		$where = array('id_jabatan'=>$id);

		if (isset($where)) {
			$eksekusi = $this->m_pengaturan->update_jabatan($where,$data);
			echo '<script>
			alert("Selamat! Berhasil Update Data Pengaturan");
			window.location="' . base_url('pengaturan') . '"
			</script>';
		}
		echo '<script>
		alert("Gagal Update Data Pengaturan");
		window.location="' . base_url('pengaturan') . '"
		</script>';
	}

	public function hapus_jabatan($id_jabatan){
		$where = array('id_jabatan'=>$id_jabatan);
		if (isset($where)) {
			$this->m_pengaturan->hapus_jabatan($where);
			echo '<script>
			alert("Selamat! Data berhasil terhapus.");
			window.location="' . base_url('pengaturan') . '"
			</script>';
		} else {
			echo '<script>
			alert("Gagal Menghapus !, ID Pengaturan ' . $id_jabatan . ' Tidak ditemukan");
			window.location="' . base_url('pengaturan') . '"
			</script>';
		}
	}
}
