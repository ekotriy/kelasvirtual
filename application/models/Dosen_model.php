<?php
class Dosen_model extends CI_Model
{
    public function User()
    {
        return $this->db->get_where('user', ['id_user' => $this->session->userdata('id')])->row_array();
    }

    public function Kelas()
    {
        $code = $this->uri->segment(3);
        return $this->db->get_where('kelas', ['id_kelas' => $code])->row_array();
    }

    public function joinAllMateri()
    {
        $code = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('kelas', 'kelas.id_kelas = materi.id_kelas');
        $this->db->where('materi.id_kelas', $code);
        return $this->db->get()->result_array();
    }

    public function joinMateri()
    {
        $code = $this->uri->segment(4);
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('kelas', 'kelas.id_kelas = materi.id_kelas');
        $this->db->where('materi.id_materi', $code);
        return $this->db->get()->row_array();
    }

    public function tambahMateri()
    {
        $code = $this->uri->segment(3);
        $data = [
            'id_kelas' => $code,
            'materi' => $this->input->post('judul', true),
            'keterangan' => $this->input->post('keterangan', true),
            'file' => $this->Upload(),
            'tgl_buat' => time()
        ];
        return $this->db->insert('materi', $data);
    }

    public function Upload()
    {
        $config['upload_path'] = './assets/materi/';
        $config['allowed_types'] = 'pdf|docx|zip|rar|jpg|png|doc';
        $config['file_name'] = url_title($this->input->post('judul'), 'dash', TRUE);
        $config['overwrite'] = true;
        $config['max_size'] = 3024; //1MB
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('materi')) {
            return $this->upload->data("file_name");
        }
    }

    public function joinAllTugas()
    {
        $code = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->join('kelas', 'kelas.id_kelas = tugas.id_kelas');
        $this->db->or_where('tugas.id_kelas', $code);
        $this->db->where('tugas.is_active', 1);
        return $this->db->get()->result_array();
    }

    public function tambahTugas()
    {
        $code = $this->uri->segment(3);
        $selesai = $this->input->post('deadline');
        $data = [
            'id_kelas' => $code,
            'tugas' => $this->input->post('tugas', true),
            'keterangan' => $this->input->post('keterangan', true),
            'tgl_selesai' => date('Y-m-d', strtotime($selesai)),
            'is_active' => 1
        ];
        return $this->db->insert('tugas', $data);
    }

    public function joinTugas()
    {
        $code = $this->uri->segment(4);
        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->join('kelas', 'kelas.id_kelas = tugas.id_kelas');
        $this->db->where('tugas.id_tugas', $code);
        return $this->db->get()->row_array();
    }

    public function Laporan()
    {
        $code = $this->uri->segment(4);

        $this->db->select('*');
        $this->db->from('laporan');

        $this->db->join('user', 'user.id_user = laporan.pengirim', 'left');
        $this->db->join('tugas', 'tugas.id_tugas = laporan.id_tugas', 'left');

        $this->db->where('laporan.id_tugas', $code);
        return $this->db->get()->result_array();
    }

    public function joinLaporan()
    {
        $code = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->join('kelas', 'kelas.id_kelas = tugas.id_kelas');
        $this->db->where('tugas.id_kelas', $code);
        return $this->db->get()->result_array();
    }

    public function joinKelas()
    {
        // id_lap,id_user
        $code = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('laporan');
        $this->db->join('kelas', 'kelas.id_kelas = laporan.id_kelas');
        $this->db->where('laporan.id_lap', $code);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function joinUser()
    {
        $code = $this->uri->segment(4);

        $this->db->select('*');
        $this->db->from('laporan');

        $this->db->join('user', 'user.id_user = laporan.pengirim', 'left');
        $this->db->join('tugas', 'tugas.id_tugas = laporan.id_tugas', 'left');

        $this->db->where('laporan.pengirim', $code);
        return $this->db->get()->row_array();
    }

    public function joinAnggota()
    {
        $code = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('anggota');
        $this->db->join('user', 'user.id_user = anggota.id_anggota');
        $this->db->join('kelas', 'kelas.kode = anggota.kode_kelas');
        $this->db->where('kelas.kode', $code);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function joinGuru()
    {
        $code = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('user', 'kelas.pembuat = user.id_user');
        $this->db->where('kelas.kode', $code);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function colmateri()
    {
        $id = $this->session->userdata('id');
        $this->db->select('materi');
        $this->db->from('materi');
        $this->db->join('kelas', 'kelas.id_kelas = materi.id_kelas');
        $this->db->where('kelas.pembuat', $id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function coltugas()
    {
        $id = $this->session->userdata('id');
        $this->db->select('tugas');
        $this->db->from('tugas');
        $this->db->join('kelas', 'kelas.id_kelas = tugas.id_kelas');
        $this->db->where('kelas.pembuat', $id);
        $this->db->where('tugas.is_active', '1');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function colanggota()
    {
        $id = $this->session->userdata('id');
        $this->db->select('id_anggota');
        $this->db->from('anggota');
        $this->db->join('kelas', 'kelas.kode = anggota.kode_kelas');
        $this->db->where('kelas.pembuat', $id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function colkelas()
    {
        $id = $this->session->userdata('id');
        $this->db->select('kelas');
        $this->db->from('kelas');
        $this->db->join('user', 'kelas.pembuat = user.id_user');
        $this->db->where('kelas.pembuat', $id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function joinpembuat()
    {
        $dosen = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('user', 'kelas.pembuat = user.id_user');
        $this->db->where('kelas.pembuat', $dosen);
        return $this->db->get()->result_array();
    }
}
