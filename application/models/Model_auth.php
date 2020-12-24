<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_auth extends CI_Model
{
    public function registrasi()
    {

        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => $this->input->post('role'),
            'date_created' => time(),
            'is_active' => 1
        ];

        $this->db->insert('user', $data);
    }

    public function userData()
    {
        $role = $this->session->userdata('role_id');
        $query = "SELECT `user`.*, `user_role`.`role`
        FROM  `user` JOIN `user_role`
           ON `user`.`role_id` = `user_role`.`id`
           WHERE `user`.`role_id` = $role
        
          
";

        return $this->db->query($query, ['email' => $this->session->userdata('email')])->row_array();
    }
}
