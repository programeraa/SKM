<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Marketing extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_komisi');
		$this->load->model('m_marketing');
		$this->load->model('m_pengaturan');
	}

	public function index()
	{
		$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Akuntan' || $level_asli == 'Admin Persediaan' || $level_asli == 'CMO') {
			redirect(base_url('komisi'));
		}

		$data['title'] = "Data Marketing";
		$data['komisi'] = $this->m_komisi->tampil_data()->result();
		$data['marketing'] = $this->m_marketing->tampil_data()->result();
		$data['tampil_jabatan'] = $this->m_pengaturan->tampil_data_jabatan()->result();
		$data['member_marketing'] = $this->m_pengaturan->tampil_data_member()->result();

		$this->load->view('v_header', $data);
		$this->load->view('v_marketing', $data);
		$this->load->view('js_semua_halaman', $data);
		$this->load->view('v_footer', $data);
	}

	public function tambah(){
		$nama_mar = $this->input->post('nama');
		$id = $this->input->post('nomor');
		$member = $this->input->post('member');
		$emd = $this->input->post('emd');
		$cmo = $this->input->post('cmo');
		$norek = $this->input->post('norek');
		$fasilitas = $this->input->post('fasilitas');
		$jabatan = $this->input->post('jabatan');
		// $jabatan = explode(",", $this->input->post('jabatan'));

		// if ($jabatan[0] == '') {
  //   		$jabatan_nilai = 0;
  //   		$jabatan_nama = 'Belum Ditentukan';
  //   	}else{
  //   		$jabatan_nilai = trim($jabatan[0]);
  //   		$jabatan_nama = trim($jabatan[1]);
  //   	}

		if ($jabatan == '') {
			$jabatan_nama = 'Belum Ditentukan';
		}else{
			$jabatan_nama = $jabatan;
		}

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
    			'norek_mar' => $norek,
    			'fasilitas_mar' => $fasilitas,
    			'jabatan_mar' => $jabatan_nama
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
    	$level = $this->session->userdata('level');
		$level_asli = $this->session->userdata('level_asli');
		$akses_level = $this->session->userdata('level_akses');

		if ($level == '') {
			$this->session->set_flashdata('gagal', 'Anda Belum Login');
			redirect(base_url('login'));
		} elseif ($level_asli == 'Admin Akuntan' || $level_asli == 'Admin Persediaan' || $level_asli == 'CMO') {
			redirect(base_url('komisi'));
		}

    	$where = array('id_mar'=>$id);
    	$data['marketing'] = $this->m_marketing->edit($where)->result();
    	$data['marketing_all'] = $this->m_marketing->tampil_data()->result();
    	$data['tampil_jabatan'] = $this->m_pengaturan->tampil_data_jabatan()->result();
    	$data['member_marketing'] = $this->m_pengaturan->tampil_data_member()->result();
    	$data['title'] = 'Edit Marketing';

    	$this->load->view('v_header', $data);
    	$this->load->view('v_edit_marketing',$data);
    	$this->load->view('js_semua_halaman', $data);
    	$this->load->view('v_footer', $data);
    }

    public function hapus_gambar_ktp($id_mar)
    {
    // Dapatkan data marketing berdasarkan ID
    	$marketing = $this->m_marketing->get_marketing_by_id($id_mar);

    // Pastikan marketing ditemukan
    	if ($marketing) {
        // Hapus gambar KTP dari direktori
    		$gambar_ktp_path = './assets/foto_marketing/' . $marketing->gambar_ktp_mar;
    		if (file_exists($gambar_ktp_path) && is_file($gambar_ktp_path)) {
    			unlink($gambar_ktp_path);
    		}

        // Update data marketing dengan menghapus gambar KTP
    		$data = array('gambar_ktp_mar' => '');
    		$where = array('id_mar' => $id_mar);
    		$this->m_marketing->update($where, $data);

        // Redirect kembali ke halaman edit marketing
    		redirect('Marketing/edit/' . $id_mar);
    	}
    }

    public function hapus_gambar_npwp($id_mar)
    {
    // Dapatkan data marketing berdasarkan ID
    	$marketing = $this->m_marketing->get_marketing_by_id($id_mar);

    // Pastikan marketing ditemukan
    	if ($marketing) {
        // Hapus gambar NPWP dari direktori
    		$gambar_npwp_path = './assets/foto_marketing/' . $marketing->gambar_npwp_mar;
    		if (file_exists($gambar_npwp_path) && is_file($gambar_npwp_path)) {
    			unlink($gambar_npwp_path);
    		}

        // Update data marketing dengan menghapus gambar NPWP
    		$data = array('gambar_npwp_mar' => '');
    		$where = array('id_mar' => $id_mar);
    		$this->m_marketing->update($where, $data);

        // Redirect kembali ke halaman edit marketing
    		redirect('Marketing/edit/' . $id_mar);
    	}
    }


    public function update(){
    	$id_mar = $this->input->post('id_mar');
    	$nama_mar = $this->input->post('nama');
    	$id = $this->input->post('nomor');
    	$member = $this->input->post('member');
    	$emd = $this->input->post('emd');
    	$cmo = $this->input->post('cmo');
    	$norek = $this->input->post('norek');
    	$fasilitas = $this->input->post('fasilitas');
    	// $jabatan = explode(",", $this->input->post('jabatan'));

    	// if ($jabatan[0] == '') {
    	// 	$jabatan_nilai = 0;
    	// 	$jabatan_nama = 'Belum Ditentukan';
    	// }else{
    	// 	$jabatan_nilai = trim($jabatan[0]);
    	// 	$jabatan_nama = trim($jabatan[1]);
    	// }

    	$jabatan = $this->input->post('jabatan');

		if ($jabatan == '') {
			$jabatan_nama = 'Belum Ditentukan';
		}else{
			$jabatan_nama = $jabatan;
		}

    	$upload_ktp_success = false;
    	$upload_npwp_success = false;

	    $gambar_ktp = ''; // Inisialisasi gambar_ktp dengan string kosong
	    $gambar_npwp = ''; // Inisialisasi gambar_npwp dengan string kosong

	    $config['upload_path'] = './assets/foto_marketing/';
	    $config['allowed_types'] = 'jpg|jpeg|png|gif';
	    $config['max_size'] = 2048;

	    $this->load->library('upload', $config);

	    // Periksa apakah file gambar KTP dipilih sebelum mencoba unggah
	    if (!empty($_FILES['g_ktp']['name'])) {
	    	if ($this->upload->do_upload('g_ktp')) {
	    		$upload_ktp = $this->upload->data();
	    		$gambar_ktp = $upload_ktp['file_name'];
	    		$upload_ktp_success = true;
	    	} else {
	            // Jika gagal unggah, set upload_ktp_success ke false
	    		$upload_ktp_success = false;
	    	}
	    }

	    // Periksa apakah file gambar NPWP dipilih sebelum mencoba unggah
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

	    // Data untuk pembaruan
	    $data = array(
	    	'nama_mar' => $nama_mar,
	    	'nomor_mar' => $id,
	    	'member_mar' => $member,
	    	'upline_emd_mar' => $emd,
	    	'upline_cmo_mar' => $cmo,
	    	'norek_mar' => $norek,
	    	'fasilitas_mar' => $fasilitas,
	    	'jabatan_mar' => $jabatan_nama
	    );

	    // Hanya jika gambar KTP diunggah, simpan nama file gambar KTP
	    if ($upload_ktp_success) {
	    	$gambar_ktp_path = './assets/foto_marketing/' . $this->input->post('g_ktp2');
	    	if (file_exists($gambar_ktp_path) && is_file($gambar_ktp_path)) {
	    		unlink($gambar_ktp_path);
	    	}
	    	$data['gambar_ktp_mar'] = $gambar_ktp;
	    } else {
	        // Jika tidak diunggah, gunakan data gambar KTP lama dari database
	    	$data['gambar_ktp_mar'] = $this->input->post('g_ktp2');
	    }

	    // Hanya jika gambar NPWP diunggah, simpan nama file gambar NPWP
	    if ($upload_npwp_success) {
	    	$gambar_npwp_path = './assets/foto_marketing/' . $this->input->post('g_npwp2');
	    	if (file_exists($gambar_npwp_path) && is_file($gambar_npwp_path)) {
	    		unlink($gambar_npwp_path);
	    	}
	    	$data['gambar_npwp_mar'] = $gambar_npwp;
	    } else {
	        // Jika tidak diunggah, gunakan data gambar NPWP lama dari database
	    	$data['gambar_npwp_mar'] = $this->input->post('g_npwp2');
	    }

	    // Kondisi untuk WHERE clause
	    $where = array('id_mar' => $id_mar);

	    if (isset($where)) {
	    // Melakukan pembaruan data dalam database
	    	$eksekusi = $this->m_marketing->update($where, $data);
	    	echo '<script>
	    	alert("Selamat! Berhasil Update Data Marketing");
	    	window.location="' . base_url('marketing') . '"
	    	</script>';
	    } else {
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
