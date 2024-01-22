<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengaturan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_pengaturan');
		$this->load->model('m_komisi');
	}

	public function jabatan(){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Akuntan' && $level_asli == 'CMO') {
			redirect(base_url('komisi'));
		}

		$data['title'] = "Data Jabatan Marketing";
		$data['jabatan'] = $this->m_pengaturan->tampil_data_jabatan()->result();

		$this->load->view('v_header', $data);
		$this->load->view('pengaturan/v_jabatan', $data);
		$this->load->view('js_semua_halaman', $data);
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
		window.location="' . base_url('pengaturan/jabatan') . '"
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
			window.location="' . base_url('pengaturan/jabatan') . '"
			</script>';
		}
		echo '<script>
		alert("Gagal Update Data Pengaturan");
		window.location="' . base_url('pengaturan/jabatan') . '"
		</script>';
	}

	public function hapus_jabatan($id_jabatan){
		$where = array('id_jabatan'=>$id_jabatan);
		if (isset($where)) {
			$this->m_pengaturan->hapus_jabatan($where);
			echo '<script>
			alert("Selamat! Data berhasil terhapus.");
			window.location="' . base_url('pengaturan/jabatan') . '"
			</script>';
		} else {
			echo '<script>
			alert("Gagal Menghapus !, ID Pengaturan ' . $id_jabatan . ' Tidak ditemukan");
			window.location="' . base_url('pengaturan/jabatan') . '"
			</script>';
		}
	}

	public function member(){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Akuntan' && $level_asli == 'CMO') {
			redirect(base_url('komisi'));
		}

		$data['title'] = "Data Member Marketing";
		$data['member'] = $this->m_pengaturan->tampil_data_member()->result();

		$this->load->view('v_header', $data);
		$this->load->view('pengaturan/v_member', $data);
		$this->load->view('js_semua_halaman', $data);
		$this->load->view('v_footer', $data);
	}

	public function tambah_member(){
		$member = $this->input->post('member');
		$nilai_s = $this->input->post('nilai_s');
		$nilai_kpr = $this->input->post('nilai_kpr');

		$data = array(
			'member' => $member,
			'nilai_secondary' => $nilai_s,
			'nilai_kpr' => $nilai_kpr,
		);

		$this->m_pengaturan->simpan_member($data);

		echo '<script>
		alert("Selamat! Berhasil Menambah Data Member");
		window.location="' . base_url('pengaturan/member') . '"
		</script>';
	}

	public function edit_member(){
		$member = $this->input->post('member');
		$nilai_s = $this->input->post('nilai_s');
		$nilai_kpr = $this->input->post('nilai_kpr');

		$id = $this->input->post('id_member');

		$data = array(
			'member' => $member,
			'nilai_secondary' => $nilai_s,
			'nilai_kpr' => $nilai_kpr,
		);

		$where = array('id_member'=>$id);

		if (isset($where)) {
			$eksekusi = $this->m_pengaturan->update_member($where,$data);
			echo '<script>
			alert("Selamat! Berhasil Update Data Member");
			window.location="' . base_url('pengaturan/member') . '"
			</script>';
		}
		echo '<script>
		alert("Gagal Update Data Member");
		window.location="' . base_url('pengaturan/member') . '"
		</script>';
	}

	public function hapus_member($id_member){
		$where = array('id_member'=>$id_member);
		if (isset($where)) {
			$this->m_pengaturan->hapus_member($where);
			echo '<script>
			alert("Selamat! Data berhasil terhapus.");
			window.location="' . base_url('pengaturan/member') . '"
			</script>';
		} else {
			echo '<script>
			alert("Gagal Menghapus !, ID Member ' . $id_member . ' Tidak ditemukan");
			window.location="' . base_url('pengaturan/member') . '"
			</script>';
		}
	}

	public function kantor(){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Akuntan' && $level_asli == 'CMO') {
			redirect(base_url('komisi'));
		}
		
		$data['title'] = "Data Kantor";
		$data['semua_kantor'] = $this->m_pengaturan->tampil_data_kantor()->result();
		$data['komisi'] = $this->m_komisi->tampil_data()->result();

		$this->load->view('v_header', $data);
		$this->load->view('pengaturan/v_kantor', $data);
		$this->load->view('js_semua_halaman', $data);
		$this->load->view('v_footer', $data);
	}

	public function tambah_kantor(){
		$kantor = $this->input->post('kantor');

		$data = array(
			'kantor' => $kantor
		);

		$this->m_pengaturan->simpan_kantor($data);

		echo '<script>
		alert("Selamat! Berhasil Menambah Data Kantor");
		window.location="' . base_url('pengaturan/kantor') . '"
		</script>';
	}

	public function edit_kantor(){
		$kantor = $this->input->post('kantor');

		$id = $this->input->post('id_kantor');

		$data = array(
			'kantor' => $kantor
		);

		$where = array('id_kantor'=>$id);

		if (isset($where)) {
			$eksekusi = $this->m_pengaturan->update_kantor($where,$data);
			echo '<script>
			alert("Selamat! Berhasil Update Data Kantor");
			window.location="' . base_url('pengaturan/kantor') . '"
			</script>';
		}
		echo '<script>
		alert("Gagal Update Data Kantor");
		window.location="' . base_url('pengaturan/kantor') . '"
		</script>';
	}

	public function hapus_kantor($id_kantor){
		$where = array('id_kantor'=>$id_kantor);
		if (isset($where)) {
			$this->m_pengaturan->hapus_kantor($where);
			echo '<script>
			alert("Selamat! Data berhasil terhapus.");
			window.location="' . base_url('pengaturan/kantor') . '"
			</script>';
		} else {
			echo '<script>
			alert("Gagal Menghapus !, ID Kantor ' . $id_kantor . ' Tidak ditemukan");
			window.location="' . base_url('pengaturan/kantor') . '"
			</script>';
		}
	}

	public function level(){
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Akuntan' && $level_asli == 'CMO') {
			redirect(base_url('komisi'));
		}

		$data['title'] = "Data Level Pengguna";
		$data['tampil_level'] = $this->m_pengaturan->tampil_data_level()->result();

		$this->load->view('v_header', $data);
		$this->load->view('pengaturan/v_level', $data);
		$this->load->view('js_semua_halaman', $data);
		$this->load->view('v_footer', $data);
	}

	public function tambah_level(){
		$level = $this->input->post('level');
		$akses = $this->input->post('akses');

		$data = array(
			'level' => $level,
			'akses_level' => $akses
		);

		$this->m_pengaturan->simpan_level($data);

		echo '<script>
		alert("Selamat! Berhasil Menambah Data Level");
		window.location="' . base_url('pengaturan/level') . '"
		</script>';
	}

	public function update_level(){
		$level = $this->input->post('level');
		$akses = $this->input->post('akses');
		$id = $this->input->post('id_level');

		$data = array(
			'level' => $level,
			'akses_level' => $akses
		);

		$where = array('id_level'=>$id);

		if (isset($where)) {
			$eksekusi = $this->m_pengaturan->update_level($where,$data);
			echo '<script>
			alert("Selamat! Berhasil Update Data Level");
			window.location="' . base_url('pengaturan/level') . '"
			</script>';
		}
		echo '<script>
		alert("Gagal Update Data Pengaturan");
		window.location="' . base_url('pengaturan/level') . '"
		</script>';
	}

	public function hapus_level($id_level){
		$where = array('id_level'=>$id_level);
		if (isset($where)) {
			$this->m_pengaturan->hapus_level($where);
			echo '<script>
			alert("Selamat! Data berhasil terhapus.");
			window.location="' . base_url('pengaturan/level') . '"
			</script>';
		} else {
			echo '<script>
			alert("Gagal Menghapus !, ID Level ' . $id_level . ' Tidak ditemukan");
			window.location="' . base_url('pengaturan/level') . '"
			</script>';
		}
	}

}
