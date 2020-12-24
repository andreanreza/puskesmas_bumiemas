<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
    }

    //  Tampil Menu and tambah
    public function index()
    {

        $data = [
            'judul'   => 'Menu',
            'user'    => $this->Model_auth->userData(),
            'menu'    => $this->db->get('menu_user')->result_array(),
            'count'   => $this->db->count_all('menu_user')
        ];

        $this->form_validation->set_rules('menu', 'Menu', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('menu/menu_utama', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('menu_user', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Berhasil menambahkan menu
          </div>');
            redirect('menu');
        }
    }

    // Edit Menu
    public function editMenu($id)
    {
        $data = [
            'judul'   => 'Edit Menu',
            'user'    => $this->Model_auth->userData(),
            'menu'    => $this->Model_menu->byIdMenu($id)
        ];

        $this->form_validation->set_rules('menu', 'Menu', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('menu/edit_menu_utama', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Model_menu->editMenu($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Berhasil Mengubah Menu
              </div>');
            redirect('menu');
        }
    }

    // Hapus Menu
    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('menu_user');

        redirect('menu');
    }

    // Tampil Sub Menu and Tambah
    public function submenu()
    {
        $data = [
            'judul'     => 'SubMenu',
            'user'      => $this->Model_auth->userData(),
            'submenu'   => $this->Model_menu->submenu(),
            'menu'      => $this->db->get('menu_user')->result_array(),
            'icon'      => $this->db->get('icon')->result_array()
        ];

        $this->form_validation->set_rules('judul', 'judul', 'trim|required');
        $this->form_validation->set_rules('menu_id', 'menu', 'trim|required');
        $this->form_validation->set_rules('url', 'url', 'trim|required');
        $this->form_validation->set_rules('icon', 'icon', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Model_menu->tambahSubMenu();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Berhasil menambahkan Submenu
          </div>');
            redirect('menu/submenu');
        }
    }

    // Edit submenu
    public function editSubMenu($id)
    {

        $data = [
            'judul'     => 'Edit SubMenu',
            'user'      => $this->Model_auth->userData(),
            'submenu'   => $this->Model_menu->submenu(),
            'sub'       => $this->Model_menu->byId($id),
            'menu'      => $this->db->get('menu_user')->result_array(),
            'icon'      => $this->db->get('icon')->result_array()
        ];

        $this->form_validation->set_rules('judul', 'judul', 'trim|required', [
            'required' => 'judul tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('url', 'url', 'trim|required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('menu/edit_submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Model_menu->ubahSubMenu($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Berhasil mengubah Submenu
              </div>');
            redirect('menu/submenu');
        }
    }

    // hapus submenu
    public function hapusSubMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sub_menu');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Berhasil menghapus Submenu
              </div>');
        redirect('menu/submenu');
    }

    // tampil icon and menambahkan icon
    public function icon()
    {

        $data = [
            'judul'      => 'icon',
            'user'       => $this->Model_auth->userData(),
            'icon'       => $this->db->get('icon')->result_array(),
            'id'         => $this->input->get('id')
        ];

        $this->form_validation->set_rules('nama_icon', 'Nama icon', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('menu/icon', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Model_menu->tambahIcon();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
           Berhasil menambahkan icon baru
         </div>');
            redirect('menu/icon');
        }
    }

    // hapus icon
    public function hapusIcon($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('icon');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Berhasil Menghapus Icon
      </div>');
        redirect('menu/icon');
    }

    // tampil role
    public function role()
    {
        $data = [
            'judul'   => 'role user',
            'user'    => $this->Model_auth->userData(),
            'role'    => $this->db->get('user_role')->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('menu/role', $data);
        $this->load->view('templates/footer');
    }

    // tambah role user
    public function tambahRole()
    {
        $data = [
            'judul'   => 'Tambah Role',
            'user'    => $this->Model_auth->userData(),
        ];

        $this->form_validation->set_rules('role', 'Role', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('menu/tambah-role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Model_menu->tambahRoleUSer();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
          Berhasil Menambahakan Role
        </div>');
            redirect('menu/role');
        }
    }

    public function editRole($id)
    {
        $data = [
            'judul'   => 'Edit Role',
            'user'    => $this->Model_auth->userData(),
            'roleid'  => $this->Model_menu->byIdRole($id)
        ];

        $this->form_validation->set_rules('role', 'Role', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('menu/edit-role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Model_menu->edit_Role($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
              Berhasil Mengubah Role
            </div>');
            redirect('menu/role');
        }
    }

    // hapus role user
    public function hapusRole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Berhasil Menghapus Role
      </div>');
        redirect('menu/role');
    }

    // akses role
    public function roleakses($role_id)
    {
        $data = [
            'judul'   => 'role user akses',
            'user'    => $this->Model_auth->userData(),
            'role'    => $this->db->get_where('user_role', ['id' => $role_id])->row_array(),
            $this->db->where('id !=', 1),
            'menu'    => $this->db->get('menu_user')->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('menu/akses_role', $data);
        $this->load->view('templates/footer');
    }

    // menambah dan menghapus dengan jQuery
    public function change()
    {

        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('akses_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('akses_menu', $data);
        } else {
            $this->db->delete('akses_menu', $data);
        }
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Akses baru telah diubah
      </div>');
    }
}
