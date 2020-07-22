<?php
class Admin_model extends CI_Model
{
    public function User()
    {
        return $this->db->get_where('user', ['id_user' => $this->session->userdata('id')])->row_array();
    }

    public function allUser()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('role', 'role.id_role = user.id_role');
        return $this->db->get()->result_array();
    }

    public function getuser($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

    public function allkelas()
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('user', 'kelas.pembuat = user.id_user');
        return $this->db->get()->result_array();
    }

    public function alltugas()
    {
        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->join('kelas', 'kelas.id_kelas = tugas.id_kelas');
        return $this->db->get()->result_array();
    }

    public function allmateri()
    {
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('kelas', 'kelas.id_kelas = materi.id_kelas');
        return $this->db->get()->result_array();
    }

    public function tambahUser()
    {
        $data = [
            'email' => $this->input->post('email', true),
            'nama' => $this->input->post('nama', true),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'id_role' => $this->input->post('id_role', true),
            'foto' => 'default.jpg',
            'is_active'    => $this->input->post('is_active'),
            'tgl_buat'  => time()
        ];
        return $this->db->insert('user', $data);
    }

    public function colkelas()
    {
        return $this->db->get('kelas')->num_rows();
    }

    public function coluser()
    {
        return $this->db->get('user')->num_rows();
    }

    public function coltugas()
    {
        return $this->db->get('tugas')->num_rows();
    }

    public function colmateri()
    {
        return $this->db->get('materi')->num_rows();
    }

    public function allanggota($id)
    {
        $this->db->select('*');
        $this->db->from('anggota');
        $this->db->join('user', 'user.id_user = anggota.id_anggota');
        $this->db->where('anggota.kode_kelas', $id);
        return $this->db->get()->result_array();
    }
}
