<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_komisi');
		$this->load->model('m_dashboard');
		$this->load->model('m_marketing');
		$this->load->model('m_pengguna');
	}

	public function status_approve()
	{
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$data['title'] = 'Laporan Status Approve';
		$data['komisi'] = $this->m_komisi->tampil_data()->result();
		$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();
		$data['co_broke'] = $this->m_komisi->tampil_data_cobroke()->result();

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_status_approve', $data);
		$this->load->view('v_footer', $data);
	}

	public function filterDataStatusApprove() {
		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');
		$j_tanggal = $this->input->get('j_tanggal');

		$data['title'] = 'Laporan Status Approve';
		$data['komisi'] = $this->m_komisi->getDataByDateRange($dari, $ke, $j_tanggal);
		$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();
		$data['co_broke'] = $this->m_komisi->tampil_data_cobroke()->result();

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_status_approve', $data);
		$this->load->view('v_footer', $data);
	}

	public function status_transaksi()
	{
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$data['title'] = 'Laporan Status Transfer';
		$data['komisi'] = $this->m_komisi->tampil_data()->result();
		$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();
		$data['co_broke'] = $this->m_komisi->tampil_data_cobroke()->result();

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_status_transfer', $data);
		$this->load->view('v_footer', $data);
	}

	public function filterDataStatusTransfer() {
		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');
		$j_tanggal = $this->input->get('j_tanggal');

		$data['title'] = 'Laporan Status Transfer';
		$data['komisi'] = $this->m_komisi->getDataByDateRange($dari, $ke, $j_tanggal);
		$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();
		$data['co_broke'] = $this->m_komisi->tampil_data_cobroke()->result();

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_status_transfer', $data);
		$this->load->view('v_footer', $data);
	}

	public function admin_komisi()
	{
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$data['title'] = 'Laporan Admin Komisi';
		$data['komisi'] = $this->m_komisi->tampil_data()->result();
		$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();
		$data['co_broke'] = $this->m_komisi->tampil_data_cobroke()->result();
		$data['pengguna'] = $this->m_pengguna->tampil_data_admin()->result();

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_admin_komisi', $data);
		$this->load->view('v_footer', $data);
	}

	public function filterDataAdminKomisi() {
		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');
		$j_tanggal = $this->input->get('j_tanggal');
		$admin_komisi = $this->input->get('admin_komisi');

		$data['title'] = 'Laporan Admin Komisi';
		$data['komisi'] = $this->m_komisi->getDataByDateRange($dari, $ke, $j_tanggal, $admin_komisi);
		$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();
		$data['co_broke'] = $this->m_komisi->tampil_data_cobroke()->result();
		$data['pengguna'] = $this->m_pengguna->tampil_data_admin()->result();

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_admin_komisi', $data);
		$this->load->view('v_footer', $data);
	}
}
