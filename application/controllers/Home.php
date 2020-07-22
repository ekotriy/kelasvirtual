<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login();
        $this->load->library('form_validation');
    }

    public function index()
    {
        redirect('home/profile');
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id')])->row_array();
        $data['profile'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('home/profile', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('home/edit_profile', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('nama');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $jurusan = $this->input->post('jurusan');

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

            $this->db->set('nama', $name);
            $this->db->set('alamat', $alamat);
            $this->db->set('jurusan', $jurusan);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
				Akun Berhasil diperbarui</div>');
            redirect('home/profile');
        }
    }

    public function gantipassword()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id')])->row_array();
        // $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[6]|matches[password_baru2]');
        $this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'required|trim|min_length[6]|matches[password_baru1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('home/ganti_password', $data);
            $this->load->view('templates/footer');
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru1');
            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
			Password salah!</div>');
                redirect('home/gantipassword');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama</div>');
                    redirect('home/gantipassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Password berhasil diperbarui!</div>');
                    redirect('home/profile');
                }
            }
        }
    }

    public function Hapus($id)
    {
        $role = $this->session->userdata('role_id');
        if ($role == 1) {
            $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id')])->row_array();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('home/admin');
            $this->load->view('templates/footer');
        } else {
            $this->db->delete('user', ['id_user' => $id]);
            redirect('auth/logout');
        }
    }
}
