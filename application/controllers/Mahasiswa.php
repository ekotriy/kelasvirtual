<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		login();
		$this->load->library('form_validation');
		$this->load->model('Mahasiswa_model', 'mahasiswa');
		$this->load->model('Dosen_model', 'dosen');
		$this->load->helper('download');
	}

	public function index()
	{
		$data['user'] = $this->mahasiswa->user();
		$data['colmateri'] = $this->mahasiswa->colmateri();
		$data['coltugas'] = $this->mahasiswa->coltugas();
		$data['colkelas'] = $this->mahasiswa->colkelas();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('mahasiswa/dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function allkelas()
	{
		$data['user'] = $this->mahasiswa->user();
		$data['kelas'] = $this->mahasiswa->joinKelas();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('mahasiswa/allkelas', $data);
		$this->load->view('templates/footer');
	}

	public function tambahKelas()
	{
		$data['user'] = $this->mahasiswa->user();

		$this->form_validation->set_rules('kode', 'Kode', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('mahasiswa/kelas_tambah');
			$this->load->view('templates/footer');
		} else {
			$id_kode = $this->input->post('kode');
			$kode = $this->db->get_where('kelas', ['kode' => $id_kode])->row_array();
			if ($kode) {
				$data = [
					'id_anggota' => $this->session->userdata('id'),
					'kode_kelas' => $this->input->post('kode')
				];
				$this->db->insert('anggota', $data);
				redirect('mahasiswa/allkelas');
			} else {
				redirect('mahasiswa/n');
			}
		}
	}

	public function kelas()
	{
		// $data['kelas'] = $this->db->get_where('kelas_detail',['siswa'=> $this->session->userdata('name')])->result_array();
		$data['user'] = $this->mahasiswa->user();
		$data['kelas'] = $this->dosen->kelas();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('mahasiswa/kelas', $data);
		$this->load->view('templates/footer');
	}

	public function allmateri()
	{
		$data['user'] = $this->dosen->user();
		$data['materi'] = $this->dosen->joinAllMateri();
		$data['kelas'] = $this->dosen->kelas();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('mahasiswa/allmateri', $data);
		$this->load->view('templates/footer');
	}

	public function materi()
	{
		$data['user'] = $this->dosen->user();
		$data['kelas'] = $this->dosen->kelas();
		$data['materi'] = $this->dosen->joinMateri();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('mahasiswa/materi', $data);
		$this->load->view('templates/footer');
	}

	public function Mdownload($id, $id_materi)
	{
		$data = $this->db->get_where('materi', ['id_materi' => $id_materi])->row_array();
		force_download('assets/materi/' . $data['file'], NULL);
	}

	public function alltugas()
	{
		$this->db->query("DELETE FROM `tugas` WHERE TIMESTAMPDIFF(DAY,tgl_selesai,now()) >= 1");
		$data['user'] = $this->dosen->user();
		$data['tugas'] = $this->dosen->joinAllTugas();
		$data['kelas'] = $this->dosen->kelas();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('mahasiswa/alltugas', $data);
		$this->load->view('templates/footer');
	}

	public function tugas()
	{
		$data['user'] = $this->dosen->user();
		$data['kelas'] = $this->dosen->kelas();
		$data['tugas'] = $this->dosen->joinTugas();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('mahasiswa/tugas', $data);
		$this->load->view('templates/footer');
	}

	public function kirimTugas($id, $tugas)
	// $id adalah id kelas
	// $tugas adalah id tugas
	{
		$data['user'] = $this->dosen->user();
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('mahasiswa/tugas_kirim');
			$this->load->view('templates/footer');
		} else {
			$idM = $this->session->userdata('id');
			// cek mahasiswa sudah mengirim
			$cekK = $this->db->get_where('laporan', ['pengirim' => $idM, 'id_tugas' => $tugas])->row_array();
			if ($cekK) {
				$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Anda sudah mengirimkan tugas</div>');
				$tugas = $this->db->get_where('tugas');
				$row = $tugas->row();
				$id_tugas = $row->id_tugas;
				redirect("mahasiswa/tugas/$id/$id_tugas");
			} else {
				$this->mahasiswa->kirimTugas();
				redirect("mahasiswa");
			}
		}
	}

	public function N()
	{
		$this->load->view('mahasiswa/kelas_tidakada');
	}

	public function pengaturan($id)
	{
		$data['user'] = $this->dosen->user();
		$data['kode'] = $this->db->get_where('kelas', ['kode' => $id])->row_array();
		$data['anggota'] = $this->db->get_where('anggota', ['id_anggota' => $this->session->userdata('id'), 'kode_kelas' => $id])->row_array();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('mahasiswa/pengaturan', $data);
		$this->load->view('templates/footer');
	}

	public function kodekelas($id)
	{
		$data['user'] = $this->dosen->user();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('dosen/kelas_kode');
		$this->load->view('templates/footer');
	}

	public function anggota($id)
	{
		$data['user'] = $this->dosen->user();
		// $data['anggota'] = $this->db->get_where('kelas_detail',['kode'=>$id])->result_array();
		$data['anggota'] = $this->dosen->joinanggota();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('dosen/kelas_anggota', $data);
		$this->load->view('templates/footer');
	}

	public function keluar($id)
	{
		$this->db->delete('anggota', ['id' => $id]);
		redirect('mahasiswa');
	}
}
