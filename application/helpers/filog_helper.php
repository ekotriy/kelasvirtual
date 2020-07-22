<?php
function login()
{
    $ci = get_instance();

    // cek apakah ada session email
    // jika tidak ada alihkan ke controler auth
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        // jika ada session email
        // cek role id 
        $role_id = $ci->session->userdata('role_id');
        // ambil nama controler yang sama dengan tabel menu
        $menu = $ci->uri->segment(1);
        // cari controler yang sama sengan menu di tabel menu
        $querymenu = $ci->db->get_where('menu', ['menu' => $menu])->row_array();
        // mendapatkan id dari table menu yang id sama dengan menu/controler
        $menu_id = $querymenu['id_menu'];
        // cek di table menu akses yang role id sama dengan menu id
        $userAccess = $ci->db->get_where('menu_akses', [
            'id_role' => $role_id,
            'id_menu' => $menu_id
        ]);
        // cek apakah ada baris baris yang sama role_id dengan menu_id
        // jika tidak adak maka alihkan ke tampilan blok
        if ($userAccess->num_rows() < 1) {
            redirect('auth/bloked');
        }
    }
}

// check box akses
function tgl_kirim($id_tugas)
{
    $ci = get_instance();
    $id_mahasiswa = $ci->session->userdata('id');
    // $querytugas = $ci->db->get_where('laporan', ['id_tugas' => $id_tugas, 'pengirim' => $id_mahasiswa])->row_array();
    $query = $ci->db->get_where('laporan', ['id_tugas' => $id_tugas, 'pengirim' => $id_mahasiswa])->row_array();
    $tgl_kirim = $query['tgl_kirim'];
    if ($query > 0) {
        return "<span class='badge badge-success'>Sudah di kerjakan $tgl_kirim </span>";
    } else {
        return "<span class='badge badge-danger'>Belum di kerjakan </span>";
    }
}
