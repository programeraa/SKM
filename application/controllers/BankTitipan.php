<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BankTitipan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_marketing');	
		$this->load->model('m_banktitipan');
	}

	public function index(){
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$data['title'] = "Data Bank Titipan";
		$data['marketing'] = $this->m_marketing->tampil_data()->result();
		$data['bank_titipan'] = $this->m_banktitipan->tampil_data();

		$this->load->view('v_header', $data);
		$this->load->view('v_banktitipan', $data);
		$this->load->view('v_footer', $data);
	}

	public function tambah(){
		$kode_perkiraan = $this->input->post('kode_perkiraan');
		$nama_properti = $this->input->post('nama_properti');
		$jt = $this->input->post('jt');
		$tgl_input = $this->input->post('tgl_input');
		$nama_marketing = $this->input->post('nama_marketing');
		$nominal = $this->input->post('nominal');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'kode_perkiraan' => $kode_perkiraan,
			'nama_properti' => $nama_properti,
			'status_properti' => $jt,
			'id_marketing' => $nama_marketing,
			'tgl_input' => $tgl_input,
			'nilai_nominal' => $nominal,
			'keterangan' => $keterangan
		);

		$this->m_banktitipan->simpan($data);

		echo '<script>
		alert("Selamat! Berhasil Menambah Data Bank Titipan");
		window.location="' . base_url('BankTitipan') . '"
		</script>';
	}

	public function edit($id){
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$where = array('id_bta'=>$id);
		$where_2 = array('id_bta'=>$id);
		$data['title'] = "Edit Bank Titipan";
		$data['marketing'] = $this->m_marketing->tampil_data()->result();
		$data['bank_titipan'] = $this->m_banktitipan->tampil_data($where);
		$data['kredit_bt'] = $this->m_banktitipan->tampil_data_kredit($where_2)->result();

		$this->load->view('v_header', $data);
		$this->load->view('v_edit_banktitipan', $data);
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
			'nominal-kredit' => $nominal_kredit
		);

		// var_dump($data);
		// die();
		$where = array('id_kredit'=>$id_kredit);



		if (isset($where)) {
			$eksekusi = $this->m_banktitipan->update_kredit($where,$data);
			echo '<script>
			alert("Selamat! Berhasil Update Data Kredit BankTitipan");
			window.location="' . base_url('BankTitipan/edit'.$id_bta) . '"
			</script>';
		}
		echo '<script>
		alert("Gagal Update Data Kredit BankTitipan");
		window.location="' . base_url('BankTitipan/edit'.$id_bta) . '"
		</script>';
	}

	public function update(){
		$kode_perkiraan = $this->input->post('kode_perkiraan');
		$nama_properti = $this->input->post('nama_properti');
		$jt = $this->input->post('jt');
		$tgl_input = $this->input->post('tgl_input');
		$nama_marketing = $this->input->post('nama_marketing');
		$nominal = $this->input->post('nominal');
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
			}
			echo '<script>
			alert("Selamat! Berhasil Update Data BankTitipan");
			window.location="' . base_url('BankTitipan') . '"
			</script>';
		}
		echo '<script>
		alert("Gagal Update Data BankTitipan");
		window.location="' . base_url('BankTitipan') . '"
		</script>';
	}

	public function hapus($id_bta){
		$where = array('id_bta'=>$id_bta);
		if (isset($where)) {
			$this->m_banktitipan->hapus($where);
			echo '<script>
			alert("Selamat! Data berhasil terhapus.");
			window.location="' . base_url('BankTitipan') . '"
			</script>';
		} else {
			echo '<script>
			alert("Gagal Menghapus !, ID Bank Titipan ' . $id_bta . ' Tidak ditemukan");
			window.location="' . base_url('BankTitipan') . '"
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
			window.location="' . base_url('BankTitipan/edit/'.$id_bta) . '"
			</script>';
		} else {
			echo '<script>
			alert("Gagal Menghapus !, ID Kredit Bank Titipan ' . $id_kredit . ' Tidak ditemukan");
			window.location="' . base_url('BankTitipan/edit/'.$id_bta) . '"
			</script>';
		}
	}
}
