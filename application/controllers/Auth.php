<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function index()
    {
        $data['title'] = 'Login';

        $this->form_validation->set_rules(
            'email',
            'email',
            'required|trim|valid_email',
            [
                'required'    => 'Email harus diisi',
                'valid_email' => 'Email yang anda masukan tidak valid'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'password',
            'required|trim|min_length[3]',
            [
                'required'      => 'Password harus diisi',
                'min_length'    => 'Password minimal 3 karakter'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('templates_auth/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates_auth/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user['is_active'] == 1) {
            //cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email'   => $user['email'],
                    'role_id' => $user['role_id'],
                ];
                //simpan data
                $this->session->set_userdata($data);
                //memisahkan yang login berdasarkan role id
                switch ($user['role_id']) {
                    case '1':
                        redirect('admin/admin');
                        break;
                    case '2':
                        redirect('pendaftaran/pendaftaran');
                        break;
                    case '3':
                        redirect('poliumum/poliumum');
                        break;
                    case '4':
                        redirect('polikia/polikia');
                        break;
                    default:
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                        coba cek kembali role id anda
                        </div>');
                        redirect('auth');
                        break;
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Password yang anda masukan salah !
              </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
         email belum teraktivasi
          </div>');
            redirect('auth');
        }
    }


    public function registrasi()
    {
        $data = [
            'title' => 'Registrasi Akun',
            'role'  =>  $this->db->get('user_role')->result_array()
        ];

        $this->form_validation->set_rules(
            'name',
            'nama',
            'required|trim',
            [
                'required' => 'Nama harus diisi'
            ]
        );
        $this->form_validation->set_rules(
            'email',
            'email',
            'required|trim|valid_email',
            [
                'required' => 'Email harus diisi',
                'valid_email' => 'Email yang anda masukan tidak valid'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'password',
            'required|trim|min_length[3]',
            [
                'required' => 'Password harus diisi',
                'min_length' => 'Password minimal 3 karakter'
            ]
        );


        if ($this->form_validation->run() == false) {
            $this->load->view('templates_auth/header', $data);
            $this->load->view('auth/registrasi', $data);
            $this->load->view('templates_auth/footer');
        } else {
            $email = $this->input->post('email');
            $data = [
                'name'          => $this->input->post('name'),
                'email'         => $email,
                'image'         => 'default.jpg',
                'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id'       => $this->input->post('role'),
                'date_created'  => time(),
                'is_active'     => 0
            ];

            // token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email'         => $email,
                'token'         => $token,
                'date_created'  => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_kiremEmail($token, 'verify');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            berhasil menambahkan user
          </div>');
            redirect('admin/admin/user');
        }
    }

    private function _kiremEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'rezaandreanmember1@gmail.com',
            'smtp_pass' => 'seruling',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('rezaandreanmember1@gmail.com', 'reza andre');
        $this->email->to($this->input->post('email'));
        if ($type == 'verify') {
            $this->email->subject('akun verify');
            $this->email->message('klik link untuk aktivasi akun : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '& token=' . urlencode($token) . '">aktiv</a>');
        } else if ($type == 'lupa') {
            $this->email->subject('reset password');
            $this->email->message('klik link untuk reset password : <a href="' . base_url() . 'auth/resetPassword?email=' . $this->input->post('email') . '& token=' . urlencode($token) . '">Reset password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        // cek email di url = email di user
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 48)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                        ' . $email . ' sudah terverifikasi
                      </div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    akun sudah terblokir
                  </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    akun token gagal
                  </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            akun aktivasi gagal
          </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Anda berhasil logout
      </div>');
        redirect('auth');
    }

    public function blok()
    {
        echo "blok";
    }

    public function lupaPassword()
    {
        $data = [
            'title' => 'Lupa Password'
        ];

        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates_auth/header', $data);
            $this->load->view('auth/lupa-password');
            $this->load->view('templates_auth/footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                // ada
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email'         => $email,
                    'token'         => $token,
                    'date_created'  => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_kiremEmail($token, 'lupa');

                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                cek email untuk riset password
              </div>');
                redirect('auth/lupaPassword');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                email belum terdaftar atau belum aktivasi
              </div>');
                redirect('auth/lupaPassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        // cek email di url = email di user
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            // ada, tapi cek user tokenyaa
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->passwordBaru();
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Reset password gagal, token salah !
              </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Reset password gagal !
          </div>');
            redirect('auth');
        }
    }

    public function passwordBaru()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }
        $data = [
            'title' => 'Password Baru'
        ];

        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates_auth/header', $data);
            $this->load->view('auth/password-baru');
            $this->load->view('templates_auth/footer');
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            password berhasil diganti
          </div>');
            redirect('auth');
        }
    }
}
