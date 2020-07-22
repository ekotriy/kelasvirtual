<?php 
class Mahasiswa_model extends CI_Model{
    public function User()
    {
        return $this->db->get_where('user',['id_user' => $this->session->userdata('id')])->row_array();
    }

    public function joinKelas()
    {
        $mahasiswa = $this->session->userdata('id'); 
        $this->db->select('*');
		$this->db->from('kelas');
        $this->db->join('anggota', 'kelas.kode = anggota.kode_kelas');
        $this->db->where('anggota.id_anggota',$mahasiswa);
		$query = $this->db->get();
		return $query->result_array();
    }

    public function kirimTugas()
    {
        $id_kelas = $this->uri->segment(3);
        $id_tugas = $this->uri->segment(4);
        $data = [
            'id_kelas' => $id_kelas,
            'id_tugas' => $id_tugas,
            'tgl_kirim' => date('Y-m-d'),
            'judul' => $this->input->post('judul'),
            'keterangan' => $this->input->post('keterangan'),
            'pengirim' => $this->session->userdata('id'),
            'file' => $this->Tugas()
        ];
        return $this->db->insert('laporan',$data);
    }

    public function Tugas()
    {
        $config['upload_path'] = './assets/file/';
        $config['allowed_types']= 'pdf|docx|zip|rar|jpg|png|doc';
        $config['file_name'] = url_title($this->input->post('judul'),'dash',TRUE);
        $config['overwrite'] = true;
        $config['max_size'] = 3024; //1MB
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('tugas')) {
        return $this->upload->data("file_name");
        }
    }

    public function keluar()
    {
        $kode = $this->uri->segment(3);
    }

    public function colkelas()
    {
        $id = $this->session->userdata('id');
        $this->db->select('kelas');
        $this->db->from('kelas');
        $this->db->join('anggota','kelas.kode = anggota.kode_kelas');
        $this->db->where('anggota.id_anggota',$id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function coltugas()
    {
        $id = $this->session->userdata('id');
        $this->db->select('tugas');
		$this->db->from('kelas');
        $this->db->join('anggota','kelas.kode = anggota.kode_kelas');
        $this->db->join('tugas','kelas.id_kelas = tugas.id_kelas');
        $this->db->where('anggota.id_anggota',$id);
        $this->db->where('tugas.is_active',1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function colmateri()
    {
        $id = $this->session->userdata('id');
        $this->db->select('materi');
		$this->db->from('kelas');
        $this->db->join('anggota', 'kelas.kode = anggota.kode_kelas');
        $this->db->join('materi', 'kelas.id_kelas = materi.id_kelas');
        $this->db->where('anggota.id_anggota',$id);
        $query = $this->db->get();
        return $query->num_rows();
    }
}