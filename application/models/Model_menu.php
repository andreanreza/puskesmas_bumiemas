<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_menu extends CI_Model
{
    // Sub Menu
    public function submenu()
    {
        $query = "SELECT `sub_menu`.*, `menu_user`.`menu`
                   FROM  `sub_menu` JOIN `menu_user`
                      ON `sub_menu`.`menu_id` = `menu_user`.`id`
                      ORDER BY `sub_menu`.`menu_id` ASC
        ";

        return $this->db->query($query)->result_array();
    }

    public function byId($id)
    {
        return $this->db->get_where('sub_menu', ['id' => $id])->row_array();
    }

    public function tambahSubMenu()
    {
        $data = [
            'judul'     => $this->input->post('judul'),
            'menu_id'   => $this->input->post('menu_id'),
            'url'       => $this->input->post('url'),
            'icon'      => $this->input->post('icon'),
            'is_aktif'  => $this->input->post('is_aktif')
        ];

        $this->db->insert('sub_menu', $data);
    }


    public function ubahSubMenu($id)
    {
        $data = [
            'judul'     => $this->input->post('judul'),
            'menu_id'   => $this->input->post('menu_id'),
            'url'       => $this->input->post('url'),
            'icon'      => $this->input->post('icon'),
            'is_aktif'  => 1
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('sub_menu', $data);
    }

    // Menu
    public function byIdMenu($id)
    {
        return $this->db->get_where('menu_user', ['id' => $id])->row_array();
    }

    public function editMenu($id)
    {
        $data = [
            'menu' => $this->input->post('menu')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('menu_user', $data);
    }

    // Role akses menu
    public function getUser()
    {
        $queryRole = "SELECT `user`.* , `user_role`.`role`
                        FROM `user` JOIN `user_role`
                          ON `user`.`role_id` = `user_role`.`id`
                    ORDER BY `user`.`role_id` ASC
                ";

        return $this->db->query($queryRole)->result_array();
    }

    public function tambahRoleUser()
    {
        $data = [
            'role' => $this->input->post('role')
        ];
        $this->db->insert('user_role', $data);
    }

    public function byIdRole($id)
    {
        return $this->db->get_where('user_role', ['id' => $id])->row_array();
    }

    public function edit_Role($id)
    {
        $data = [
            'role' => $this->input->post('role')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_role', $data);
    }

    // icon
    public function tambahIcon()
    {
        $data = [
            'nama_icon' => $this->input->post('nama_icon'),
            'icon'      => $this->input->post('icon')
        ];

        $this->db->insert('icon', $data);
    }
}
