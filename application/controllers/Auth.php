<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Login_model', 'login');
	}

	public function index()
	{
		if ($this->session->userdata('email')) {
			// home_rev revisi
			redirect('home');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/auth_header');
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			// verifikasi login,private
			$this->_login();
		}
	}

	private function _login()
	{
		// ambil data dari form
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		// jika ada user
		if ($user) {
			// jika user aktif
			if ($user['is_active'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['id_role'],
						'nama' => $user['nama'],
						'id' => $user['id_user']
					];
					$this->session->set_userdata($data);
					if ($user['id_role'] == 1) {
						redirect('admin');
					} else if ($user['id_role'] == 2) {
						redirect('dosen');
					} else if ($user['id_role'] == 3) {
						redirect('mahasiswa');
					}
				} else {
					$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"> Password Salah!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
				Email belum aktif,cek emailmu untuk mengaktifkan</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
				Email tidak terdaftar !</div>');
			redirect('auth');
		}
	}

	public function register()
	{
		if ($this->session->userdata('email')) {
			// home_rev revisi
			redirect('home');
		}
		// $name = $this->input->post('name');
		// if (!preg_match('/^[a-zA-Z ]*$/', $name)) {
		// }

		$this->form_validation->set_rules('name', 'Nama', 'required|trim|callback__nama');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'Email sudah terdaftar']);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
			'min_length'	=> 'Password terlalu pendek',
			'matches'		=> 'Password tidak sama'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password2]');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/auth_header');
			$this->load->view('auth/register');
			$this->load->view('templates/auth_footer');
		} else {
			// data yang akan di tambah ke database
			$this->login->dataSiswa();
			// tambah data ke database user_token dan user
			$token = base64_encode(random_bytes(32));
			// tinjau ulang
			$this->login->token($token);
			// kirim kode token yang sudah di generate pada $token dan parametr verify pada method _sendEmail
			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
				Selamat! kamu berhasil terdaftar. Silakan perikasa emailmu untuk mengaktifkan</div>');
			redirect('auth');
		}
	}

	public function registerdosen()
	{
		if ($this->session->userdata('email')) {
			// home_rev revisi
			redirect('home');
		}
		$this->form_validation->set_rules('name', 'Name', 'required|trim|callback__nama');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'Email sudah terdaftar']);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
			'min_length'	=> 'Password terlalu pendek',
			'matches'		=> 'Password tidak sama'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password2]');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/auth_header');
			$this->load->view('auth/register-dosen');
			$this->load->view('templates/auth_footer');
		} else {
			// data yang akan di tambah ke database
			$this->login->dataGuru();
			// tambah data ke database user_token dan user
			$token = base64_encode(random_bytes(32));
			$this->login->token($token);
			// kirim kode token yang sudah di generate pada $token dan parametr verify pada method _sendEmail
			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
				Selamat! kamu berhasil terdaftar. Silakan perikasa emailmu untuk mengaktifkan</div>');
			redirect('auth');
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol'	=> 'smtp',
			'smtp_host'	=> 'ssl://smtp.googlemail.com',
			'smtp_user'	=> 'admn.ekotri@gmail.com',
			'smtp_pass'	=> 'webbhost1d',
			// webbhost1d
			'smtp_port'	=> 465,
			'mailtype'	=> 'html',
			'charset'	=> 'utf-8',
			'newline'	=> "\r\n"
		];

		// memangil librari email pada codeigniter
		$this->load->library('email', $config);
		$this->email->initialize($config);
		$this->email->from('admn.ekotri@gmail.com', 'admin');	//email pengirim
		$this->email->to($this->input->post('email'));			//email yang dikirim diambil dari input email registrasi

		$massage = 'Clik this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>';

		if ($type == 'verify') {
			$this->email->subject('Account Verification');
			// kirim link ke email tujuan yang mengarah ke kelas auth method verify
			$this->email->message('Clik this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
		} else if ($type == 'forgot') {
			$this->email->subject('Reset Passeord');
			$this->email->message('Clik this link to reset you password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset password</a>');
		}

		$this->email->send();
	}

	public function verify()
	{
		// mengambil email dan token dari link url
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		// cek apakah ada email di database
		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			// cek apakah ada token di database
			$user_token = $this->db->get_where('token', ['token' => $token])->row_array();
			if ($user_token) {
				// waktu saat ini di kurangi date_created
				if (time() - $user_token['tgl_buat'] < (60 * 60 * 24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('token', ['email' => $email]);

					$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">' . $email . ' berhasil aktif </div>');
					redirect('auth');
				} else {
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('token', ['email' => $email]);

					$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
			kadaluarsa</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
			salah email</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
			gagal aktivasi,salah email</div>');
			redirect('auth');
		}
	}

	public function lupaPassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/auth_header');
			$this->load->view('auth/lupa-password');
			$this->load->view('templates/auth_footer');
		} else {
			// ambil email dari form lupa password
			$email = $this->input->post('email');
			// cek email ada di database dan is_active = 1
			$user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();
			if ($user) {
				// tambah ke user_token
				$token = base64_encode(random_bytes(32));
				$this->login->token($token);
				// kirim token ke _sendEmail untuk mengubah password
				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('massage', '<div class = "alert alert-success" role = "alert"> Cek emailmu untuk ganti password</div>');
				redirect('auth/lupaPassword');
			} else {
				$this->session->set_flashdata('massage', '<div class ="alert alert-danger" role = "alert">Email tidak di temukan</div>');
				redirect('auth/lupapassword');
			}
		}
	}

	public function resetPassword()
	{
		$email	= $this->input->get('email');
		$token	= $this->input->get('token');

		// cek apakah ada email di databse
		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		if ($user) {
			// cek apakah ada token di database
			$user_token = $this->db->get_where('token', ['token' => $token])->row_array();
			if ($user_token) {
				if (time() - $user_token['tgl_buat'] < (60 * 60 * 24)) {
					// buat session reset_email yang isinya email dimana server yang tau

					$this->session->set_userdata('reset_email', $email);
					// kirim ke method gantipassword
					$this->gantiPassword();
				} else {
					$this->session->set_flashdata('massage', '<div class = "alert alert-danger" role = "alert">Email kadaluarsa</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('massage', '<div class = "alert alert-danger" role = "alert">Email tidak ditemukan</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('massage', '<div class = "alert alert-danger" role = "alert">Email tidak ditemukan</div>');
			redirect('auth');
		}
	}

	public function gantiPassword()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]', [
			'min_length'	=> 'Password terlalu pendek',
			'matches'		=> 'Password tidak sama'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[6]|matches[password1]');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/auth_header');
			$this->load->view('auth/ganti-password');
			$this->load->view('templates/auth_footer');
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->db->delete('token', ['email' => $email]);

			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
			Password telah diganti,silakan login kembali</div>');
			redirect('auth');
		}
	}

	public function bloked()
	{
		$this->load->view('auth/blocked');
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('id');

		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
			Kamu berhasil keluar</div>');
		redirect('auth');
	}



	// kostum validasi

	public function _nama()
	{
		$name = $this->input->post('name');
		if (!preg_match('/^[a-zA-Z ]*$/', $name)) {
			$this->form_validation->set_message('_nama', 'Tidak boleh pakai angka');
			return false;
		} else {
			return true;
		}
	}
}
