<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_komisi');
		$this->load->model('m_dashboard');
		$this->load->model('m_marketing');
		$this->load->model('m_pengguna');
		$this->load->model('m_laporan');
		$this->load->model('m_pengaturan');
	}

	public function omzet_vision()
	{
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$data['title'] = 'Laporan Omzet Vision';
		$data['komisi'] = $this->m_komisi->tampil_data()->result();
		$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();
		$data['omzet'] = $this->m_laporan->tampil_data_omzet();
		$data['omzet_vision'] = $this->m_laporan->tampil_data_omzet_vision()->result();
		$data['kantor'] = $this->m_pengaturan->tampil_data_kantor()->result();

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_omzet_vision', $data);
		$this->load->view('v_footer', $data);
	}

	public function filterDataOmzetVision() {
		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');
		$marketing = '';

		$data['title'] = 'Laporan Omzet Vision';
		$data['komisi'] = $this->m_komisi->tampil_data()->result();
		$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();
		$data['omzet'] = $this->m_laporan->getDataByDateRange_omzet($dari, $ke, $marketing);
		$data['co_broke'] = $this->m_komisi->tampil_data_cobroke()->result();
		$data['omzet_vision'] = $this->m_laporan->tampil_data_omzet_vision()->result();
		$data['kantor'] = $this->m_pengaturan->tampil_data_kantor()->result();

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_omzet_vision', $data);
		$this->load->view('v_footer', $data);
	}

	public function omzet_marketing()
	{
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$data['title'] = 'Laporan Omzet Per Marketing';
		$data['komisi'] = $this->m_komisi->tampil_data()->result();
		$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();
		$data['omzet'] = $this->m_laporan->tampil_data_omzet();
		$data['omzet_vision'] = $this->m_laporan->tampil_data_omzet_vision()->result();
		$data['kantor'] = $this->m_pengaturan->tampil_data_kantor()->result();

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_omzet_marketing', $data);
		$this->load->view('v_footer', $data);
	}

	public function filterDataOmzetMarketing() {
		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');
		$marketing = $this->input->get('marketing');

		$data['title'] = 'Laporan Omzet Per Marketing';
		$data['komisi'] = $this->m_komisi->tampil_data()->result();
		$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();
		$data['omzet'] = $this->m_laporan->getDataByDateRange_omzet($dari, $ke, $marketing);
		$data['omzet_vision'] = $this->m_laporan->tampil_data_omzet_vision()->result();
		$data['kantor'] = $this->m_pengaturan->tampil_data_kantor()->result();

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_omzet_marketing', $data);
		$this->load->view('v_footer', $data);
	}

	public function pph_cobroke()
	{
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$data['title'] = 'Laporan PPH 21 Cobroke';
		$data['tampil_pph'] = $this->m_laporan->tampil_data_pph();
		$data['kantor'] = $this->m_pengaturan->tampil_data_kantor()->result();
		$data['tampil_referal'] = $this->m_komisi->tampil_data_referal()->result();

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_pph_cobroke', $data);
		$this->load->view('v_footer', $data);
	}

	public function filterDataPphCobroke() {
		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');
		$marketing = '';

		$data['title'] = 'Laporan PPH 21 Cobroke';
		$data['tampil_pph'] = $this->m_laporan->getDataByDateRange_pph($dari, $ke);
		$data['kantor'] = $this->m_pengaturan->tampil_data_kantor()->result();
		$data['tampil_referal'] = $this->m_komisi->tampil_data_referal()->result();

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_pph_cobroke', $data);
		$this->load->view('v_footer', $data);
	}

	public function pph_marketing()
	{
		$level = $this->session->userdata('level');
		if ($level == '') {
			$this->session->set_flashdata('gagal','Anda Belum Login');
			redirect(base_url('login'));
		}

		$data['title'] = 'Laporan PPH 21 Marketing Vision';
		$data['tampil_pph'] = $this->m_laporan->tampil_data_pph_vision();
		$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();
		$data['kantor'] = $this->m_pengaturan->tampil_data_kantor()->result();

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_pph_marketing', $data);
		$this->load->view('v_footer', $data);
	}

	public function filterDataPphMarketing() {
		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');

		$data['title'] = 'Laporan PPH 21 Marketing Vision';
		$data['tampil_pph'] = $this->m_laporan->getDataByDateRangePphVision($dari, $ke);
		$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();
		$data['kantor'] = $this->m_pengaturan->tampil_data_kantor()->result();

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_pph_marketing', $data);
		$this->load->view('v_footer', $data);
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
		$data['kantor'] = $this->m_pengaturan->tampil_data_kantor()->result();

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_status_approve', $data);
		$this->load->view('v_footer', $data);
	}

	public function filterDataStatusApprove() {
		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');
		$j_tanggal = $this->input->get('j_tanggal');
		$admin_komisi = '';
		$transfer = '';
		$status = $this->input->get('status');

		$data['title'] = 'Laporan Status Approve';
		$data['komisi'] = $this->m_komisi->getDataByDateRange($dari, $ke, $j_tanggal, $admin_komisi, $status, $transfer);
		$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();
		$data['co_broke'] = $this->m_komisi->tampil_data_cobroke()->result();
		$data['kantor'] = $this->m_pengaturan->tampil_data_kantor()->result();

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
		$data['kantor'] = $this->m_pengaturan->tampil_data_kantor()->result();

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_status_transfer', $data);
		$this->load->view('v_footer', $data);
	}

	public function filterDataStatusTransfer() {
		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');
		$admin_komisi = '';
		$status = '';
		$transfer = $this->input->get('transfer');
		$j_tanggal = $this->input->get('j_tanggal');

		$data['title'] = 'Laporan Status Transfer';
		$data['komisi'] = $this->m_komisi->getDataByDateRange($dari, $ke, $j_tanggal, $admin_komisi, $status, $transfer);
		$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();
		$data['co_broke'] = $this->m_komisi->tampil_data_cobroke()->result();
		$data['kantor'] = $this->m_pengaturan->tampil_data_kantor()->result();

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
		$data['kantor'] = $this->m_pengaturan->tampil_data_kantor()->result();

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_admin_komisi', $data);
		$this->load->view('v_footer', $data);
	}

	public function filterDataAdminKomisi() {
		$dari = $this->input->get('dari');
		$ke = $this->input->get('ke');
		$j_tanggal = $this->input->get('j_tanggal');
		$admin_komisi = $this->input->get('admin_komisi');
		$status = '';
		$transfer = '';

		$data['title'] = 'Laporan Admin Komisi';
		$data['komisi'] = $this->m_komisi->getDataByDateRange($dari, $ke, $j_tanggal, $admin_komisi, $status, $transfer);
		$data['marketing'] = $this->m_komisi->tampil_data_marketing()->result();
		$data['co_broke'] = $this->m_komisi->tampil_data_cobroke()->result();
		$data['pengguna'] = $this->m_pengguna->tampil_data_admin()->result();
		$data['kantor'] = $this->m_pengaturan->tampil_data_kantor()->result();

		$this->load->view('v_header', $data);
		$this->load->view('laporan/v_admin_komisi', $data);
		$this->load->view('v_footer', $data);
	}
}
