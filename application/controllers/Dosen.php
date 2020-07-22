<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		login();
		$this->load->library('form_validation');
		$this->load->model('Dosen_model', 'dosen');
		$this->load->helper('download');
	}

	public function index()
	{
		$data['user'] = $this->dosen->user();
		$data['colmateri'] = $this->dosen->colmateri();
		$data['coltugas'] = $this->dosen->coltugas();
		$data['colanggota'] = $this->dosen->colanggota();
		$data['colkelas'] = $this->dosen->colkelas();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('dosen/dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function Allkelas()
	{
		$data['user'] = $this->dosen->user();
		$data['kelas'] = $this->db->get_where('kelas', ['pembuat' => $this->session->userdata('id')])->result_array();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('dosen/allkelas', $data);
		$this->load->view('templates/footer');
	}

	public function tambahKelas()
	{
		$data['user'] = $this->dosen->user();
		$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('dosen/kelas_tambah');
			$this->load->view('templates/footer');
		} else {
			$kode = bin2hex(random_bytes(3));
			$data = [
				'kelas' => $this->input->post('kelas'),
				'kode' => $kode,
				'pembuat' => $this->session->userdata('id')
			];

			$data2 = [
				'kode_kelas' => $kode,
				'id_anggota' => $this->session->userdata('id')
			];

			$this->db->insert('kelas', $data);
			$this->db->insert('anggota', $data2);
			redirect('dosen/allkelas');
		}
	}

	public function kelas()
	{
		$data['user'] = $this->dosen->user();
		$data['kelas'] = $this->dosen->kelas();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('dosen/kelas', $data);
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
		$this->load->view('dosen/allmateri', $data);
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
		$this->load->view('dosen/materi', $data);
		$this->load->view('templates/footer');
	}

	public function tambahMateri($id, $kode_kelas)
	{
		$data['user'] = $this->dosen->user();
		$data['kelas'] = $this->dosen->kelas();
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('dosen/materi_tambah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->dosen->tambahMateri();
			redirect("dosen/allmateri/$id/$kode_kelas");
		}
	}

	public function Mdownload($id, $id_materi)
	{
		$data = $this->db->get_where('materi', ['id_materi' => $id_materi])->row_array();
		force_download('assets/materi/' . $data['file'], NULL);
	}

	public function alltugas()
	{
		$this->db->query("UPDATE `tugas` SET is_active = 0 WHERE TIMESTAMPDIFF(DAY,tgl_selesai,now()) >= 1");
		$data['user'] = $this->dosen->user();
		$data['tugas'] = $this->dosen->joinAllTugas();
		$data['kelas'] = $this->dosen->kelas();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('dosen/alltugas', $data);
		$this->load->view('templates/footer');
	}

	public function tambahTugas($id, $kode_kelas)
	{
		$data['user'] = $this->dosen->user();
		$data['kelas'] = $this->dosen->kelas();
		$this->form_validation->set_rules('tugas', 'Nama Tugas', 'required');
		$this->form_validation->set_rules('deadline', 'Tanggal Kadaluarsa', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('dosen/tugas_tambah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->dosen->tambahTugas();
			redirect("dosen/alltugas/$id/$kode_kelas");
		}
	}

	public function tugas()
	{
		$data['user'] = $this->dosen->user();
		$data['kelas'] = $this->dosen->kelas();
		$data['tugas'] = $this->dosen->joinTugas();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('dosen/tugas', $data);
		$this->load->view('templates/footer');
	}

	public function HapusM($id)
	{
		$this->db->where('id_materi', $id);
		$query = $this->db->get('materi');
		$row = $query->row();
		unlink("./assets/materi/$row->file");
		$this->db->where('id_materi', $id);
		$this->db->delete('materi');

		$kelas = $this->db->get('kelas');
		$row = $kelas->row();
		$id_kelas = $row->id_kelas;
		$kode = $row->kode;
		redirect("dosen/allmateri/$id_kelas/$kode");
	}

	public function HapusT($id)
	{
		$this->db->where('id_tugas', $id);
		$this->db->delete('tugas');

		$kelas = $this->db->get('kelas');
		$row = $kelas->row();
		$id_kelas = $row->id_kelas;
		$kode = $row->kode;
		redirect("dosen/alltugas/$id_kelas/$kode");
	}

	public function laporan()
	{
		$data['user'] = $this->dosen->user();
		$data['tugas'] = $this->dosen->joinLaporan();
		$data['kelas'] = $this->dosen->kelas();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('dosen/laporan', $data);
		$this->load->view('templates/footer');
	}

	public function detailLaporan()
	{
		$data['user'] = $this->dosen->user();
		$data['tugas'] = $this->dosen->joinTugas();
		$data['laporan'] = $this->dosen->laporan();
		$data['kelas'] = $this->dosen->kelas();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('dosen/laporan_detail', $data);
		$this->load->view('templates/footer');
	}

	public function detailTugas()
	{
		$data['user'] = $this->dosen->user();
		$data['tugas'] = $this->dosen->joinUser();
		$data['kelas'] = $this->dosen->joinKelas();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('dosen/laporan_mahasiswa', $data);
		$this->load->view('templates/footer');
	}

	public function Ldownload($id)
	{
		$data = $this->db->get_where('laporan', ['id_lap' => $id])->row_array();
		force_download('assets/file/' . $data['file'], NULL);
	}

	public function pengaturan($id)
	{
		$data['user'] = $this->dosen->user();
		$data['kode'] = $this->db->get_where('kelas', ['kode' => $id])->row_array();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('dosen/pengaturan', $data);
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

	public function editKelas($id)
	{
		$data['user'] = $this->dosen->user();
		$data['edit'] = $this->dosen->joinguru();

		$this->form_validation->set_rules('kelas', 'Nama Kelas', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('dosen/kelas_edit', $data);
			$this->load->view('templates/footer');
		} else {
			$nm_kelas = $this->input->post('kelas');
			$this->db->set('kelas', $nm_kelas);
			$this->db->where('kode', $id);
			$this->db->update('kelas');

			redirect("dosen/pengaturan/$id");
		}
	}
	public function hapusKelas($id, $kode_kelas)
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
		redirect('dosen');
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
}
