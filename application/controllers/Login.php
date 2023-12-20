<?php 
class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_login');
	}

	public function index(){
		if ($this->session->userdata('level') == TRUE) 
		{
			redirect('pengajuan');
		}
		$this->load->view('v_login');
	}
	public function login_aksi(){
		$user = $this->input->post('username',true);
		$pass = md5($this->input->post('password', true));

		//rule validasi
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() != FALSE){
			$where = array(
				'username_pengguna' => $user,
				'pass_pengguna' => $pass
			);

			$cekLogin = $this->m_login->cek_login($where);

			if($cekLogin->num_rows() > 0){
				$data = $cekLogin->row_array();

				$data_session = array(
					'id' => $data['id_pengguna'],
					'level' => $data['level_pengguna'],
					'nama' => $data['nama_pengguna'],
					'level_asli' => $data['level']
				);

				$this->session->set_userdata($data_session);
				// $this->session->set_userdata('level',$data['level_pengguna']);
				redirect(base_url('komisi'));

			}else{
				$this->session->set_flashdata('gagal','Username / Sandi Salah');
				redirect(base_url('login'));
			}

		}else{
			$this->load->view('v_login');
		}

	}

	public function logout(){

		$this->session->sess_destroy();
		redirect(base_url('login'));

	}
}
?>