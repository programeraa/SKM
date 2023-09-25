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

		$this->m_marketing->simpan($data);
		echo '<script>
		alert("Selamat! Berhasil Menambah Data Marketing");
		window.location="' . base_url('marketing') . '"
		</script>';
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