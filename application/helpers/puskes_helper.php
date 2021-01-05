<?php

function is_login()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $query = $ci->db->get_where('menu_user', ['menu' => $menu])->row_array();
        $menu_id = $query['id'];

        $userakses = $ci->db->get_where('akses_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userakses->num_rows() < 1) {
            redirect('auth/blok');
        }
    }
}

function cek_akses($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('akses_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }

    // function cek_proses()
    // {
    //     $ci = get_instance();

    //     $ci->db->where('proses', 1);

    //     $result = $ci->db->get('tbl_kunjungan');

    //     if ($result->num_rows() > 0) {
    //         return "checked='checked'";
    //     }
    // }
}
