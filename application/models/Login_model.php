<?php 
class Login_model extends CI_Model{
    public function dataSiswa()
    {
        $name = $this->input->post('name',true);
        $email = $this->input->post('email',true);
        $data = [
            'nama'			=> htmlspecialchars($name),
            'email'			=> htmlspecialchars($email),
            'foto'			=> 'default.jpg',
            'password'		=> password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
            'id_role'		=> 3,
            'is_active'		=> 0,
            'tgl_buat'  	=> time()
        ];
        return $this->db->insert('user',$data);
    }

    public function dataGuru()
    {
        $data = [
            'nama'			=> htmlspecialchars($this->input->post('name',true)),
            'email'			=> htmlspecialchars($this->input->post('email',true)),
            'foto'			=> 'default.jpg',
            'password'		=> password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
            'id_role'		=> 2,
            'is_active'		=> 0,
            'tgl_buat'  	=> time()
        ];
        return $this->db->insert('user',$data);
    }

    public function token($token)
    {
        // siapkan token
			// $token = base64_encode(random_bytes(32));
			$user_token= [
				'email' => $this->input->post('email',true),
				'token' => $token,
				'tgl_buat' => time()
            ];
            return $this->db->insert('token',$user_token);
    }
}