<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		login();
		$this->load->library('form_validation');
		$this->load->model('Admin_model', 'admin');
	}

	public function index()
	{
		$data['user'] = $this->admin->user();
		$data['colmateri'] = $this->admin->colmateri();
		$data['coltugas'] = $this->admin->coltugas();
		$data['coluser'] = $this->admin->coluser();
		$data['colkelas'] = $this->admin->colkelas();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates/footer');
	}
	public function user()
	{
		// $res= $this->db->get_where('user',['is_active'=> 1])->row_array();
		// var_dump($res);
		// die;
		$data['user'] = $this->admin->user();
		$data['alluser'] = $this->admin->alluser();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/user', $data);
		$this->load->view('templates/footer');
	}

	public function edit($id)
	{
		$data['user'] = $this->admin->user();
		$data['edit'] = $this->admin->getuser($id);

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$name = $this->input->post('nama');
			$email = $this->input->post('email');

			// cek jika ada gambar yang akan di upload
			// pada tombol upload 
			$upload_image = $_FILES['foto']['name'];
			// var_dump($upload_image);
			// die;
			// jika ada gambar yang di upload,cek
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/img/profile/';
				$config['file_name']  = url_title($name, 'dash', TRUE);

				$this->load->library('upload', $config);

				// imgane= name
				if ($this->upload->do_upload('foto')) {
					$old_image = $data['user']['foto'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('foto', $new_image);
				} else {
					echo $this->upload->dispay_errors();
				}
			}

			$this->db->set('is_active', $this->input->post('is_active'));
			$this->db->set('nama', $name);
			$this->db->where('email', $email);
			$this->db->update('user');

			// $this->session->set_flashdata('massage','<div class="alert alert-success" role="alert">
			// 	Akun Berhasil diperbarui</div>');
			redirect('admin/user');
		}
	}

	public function hapus($id, $id_role)
	{
		if ($id_role == 1) {
			$data['user'] = $this->admin->user();
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('home/admin');
			$this->load->view('templates/footer');
		} else {
			$this->db->delete('user', ['id_user' => $id]);
			redirect('admin/user');
		}
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('id_role', 'Pekerjaan', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'Email sudah terdaftar']);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
			'min_length'	=> 'Password terlalu pendek',
			'matches'		=> 'Password tidak sama'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password2]');
		if ($this->form_validation->run() == FALSE) {
			$data['user'] = $this->admin->user();
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/tambah');
			$this->load->view('templates/footer');
		} else {
			$this->admin->tambahuser();
			redirect('admin/user');
		}
	}

	public function control()
	{
		$data['user'] = $this->admin->user();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/menu');
		$this->load->view('admin/control');
		$this->load->view('templates/footer');
	}

	public function kelas()
	{
		$data['kelas'] = $this->admin->allkelas();
		$data['user'] = $this->admin->user();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/menu');
		$this->load->view('admin/kelas');
		$this->load->view('templates/footer');
	}

	public function tambahkelas()
	{
		$this->form_validation->set_rules('kelas', 'Nama kelas', 'trim|required');
		$this->form_validation->set_rules('dosen', 'Nama dosen', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['dosen'] = $this->db->get_where('user', ['id_role' => 2])->result_array();
			$data['user'] = $this->admin->user();
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/menu');
			$this->load->view('admin/tambah_kelas');
			$this->load->view('templates/footer');
		} else {
			$kode = bin2hex(random_bytes(3));
			$data = [
				'kelas' => $this->input->post('kelas'),
				'kode' => $kode,
				'pembuat' => $this->input->post('dosen')
			];

			$data2 = [
				'kode_kelas' => $kode,
				'id_anggota' => $this->input->post('dosen')
			];

			$this->db->insert('kelas', $data);
			$this->db->insert('anggota', $data2);
			redirect('admin/kelas');
		}
	}

	public function anggota($id)
	{
		$data['kelas'] = $this->db->get_where('kelas', ['kode' => $id])->row_array();
		$data['anggota'] = $this->admin->allanggota($id);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('admin/menu');
		$this->load->view('admin/anggota_kelas', $data);
		$this->load->view('templates/footer');
	}

	public function anggotatambah($id)
	{
		$this->form_validation->set_rules('mahasiswa', 'Nama mahasiswa', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['kelas'] = $this->db->get_where('kelas', ['kode' => $id])->row_array();
			$data['anggota'] = $this->db->get_where('user', ['id_role' => 3])->result_array();
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar');
			$this->load->view('admin/menu');
			$this->load->view('admin/anggota_tambah', $data);
			$this->load->view('templates/footer');
		} else {
			$nama = $this->input->post('mahasiswa');
			$kode = $this->input->post('kode');
			$anggota = $this->db->get_where('anggota', ['id_anggota' => $nama, 'kode_kelas' => $kode])->row_array();
			if ($anggota) {
				$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
				Mahasiswa sudah terdaftar</div>');
				redirect("admin/anggotatambah/$id");
			} else {
				$data = [
					'id_anggota' => $nama,
					'kode_kelas' => $kode
				];
				$this->db->insert('anggota', $data);
				$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
				Mahasiswa berhasil di tambahkan</div>');
				redirect("admin/anggota/$id");
			}
		}
	}

	public function tugas()
	{
		$this->db->query("DELETE FROM `tugas` WHERE TIMESTAMPDIFF(DAY,tgl_selesai,now()) >= 1");
		$data['tugas'] = $this->admin->alltugas();
		$data['user'] = $this->admin->user();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/menu');
		$this->load->view('admin/tugas', $data);
		$this->load->view('templates/footer');
	}

	public function materi()
	{
		$data['materi'] = $this->admin->allmateri();
		$data['user'] = $this->admin->user();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/menu');
		$this->load->view('admin/materi', $data);
		$this->load->view('templates/footer');
	}

	public function HapusK($id, $kode_kelas)
	{
		$this->db->delete('kelas', ['id_kelas' => $id]);
		$this->db->delete('tugas', ['id_kelas' => $id]);
		$this->db->delete('laporan', ['id_kelas' => $id]);
		$this->db->delete('anggota', ['kode_kelas' => $kode_kelas]);
		$this->db->where('id_kelas', $id);

		$query = $this->db->get('materi');
		$row = $query->row();
		unlink("./assets/materi/$row->file");
		$this->db->delete('materi', ['id_kelas' => $id]);
		redirect('admin/kelas');
	}

	public function HapusM($id)
	{
		$this->db->where('id_materi', $id);
		$query = $this->db->get('materi');
		$row = $query->row();
		unlink("./assets/materi/$row->file");
		$this->db->where('id_materi', $id);
		$this->db->delete('materi');
		redirect('admin/materi');
	}

	public function HapusT($id)
	{
		$this->db->where('id_tugas', $id);
		$this->db->delete('tugas');
		redirect('admin/tugas');
	}
}
