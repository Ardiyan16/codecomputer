<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('auth/login');
    }

    public function loading()
    {
        $this->load->view('auth/loading');
    }

    public function loading2()
    {
        $this->load->view('auth/loading2');
    }

    public function register()
    {
        $this->load->view('auth/register');
    }

    public function lupa_password()
    {
        $this->load->view('auth/lupa_pass');
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim', ['required' => 'email tidak boleh kosong']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'password tidak boleh kosong']);
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $this->proses_login();
        }
    }

    private function proses_login()
    {
        $email = htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

        $user = $this->db->get_where('users', ['email' => $email])->row_array();
        $cekpass = $this->db->get_where('users', array('password' => $password));


        //jika usernya terdaftar
        if ($user) {
            if ($user['aktif'] = 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'alamat' => $user['alamat'],
                        'no_telp' => $user['no_telp'],
                        'nama' => $user['nama'],
                        'id' => $user['id'],
                        // 'foto' => $user['foto']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role'] == '2') {
                        redirect('c_home_u');
                    }
                    if ($user['role'] == '1') {
                        redirect('admin/c_dashboard');
                    } else {
                        $this->session->unset_userdata('email');
                        $this->session->unset_userdata('role');
                        $this->session->set_flashdata('gagal', true);
                        redirect('c_auth');
                    }
                } else {
                    $this->session->set_flashdata('passwordsalah', true);
                    redirect('c_auth');
                }
            } else {
                $this->session->set_flashdata('belumverif', true);
                redirect('c_auth');
            }
        } else {
            $this->session->set_flashdata('emailsalah', true);
            redirect('c_auth');
        }
    }


    public function register_akun()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'nama tidak boleh kosong']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', ['is_unique' => 'email anda telah terdaftar']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'alamat tidak boleh kosong']);
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|trim|max_length[13]', ['max_length' => 'No Telepon tidak boleh lebih dari 13 karakter']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', ['min_length' => 'password minimal 6 karakter']);
        $this->form_validation->set_rules('kpassword', 'Konfirmasi Password', 'required|trim|matches[password]', ['matches' => 'konfirmasi password salah']);
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/register');
        } else {
            $this->proses_register();
        }
    }

    private function proses_register()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => htmlspecialchars($email),
            'no_telp' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat'),
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'is_active' => 0,
            'role' => 2
        ];

        $token = base64_encode(random_bytes(30));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'date_created' => time()
        ];

        $this->db->insert('users', $data);
        $this->db->insert('token', $user_token);

        $this->_sendEmail($token, 'verify');

        $this->session->set_flashdata('success', true);
        redirect('c_auth/loading');
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'codecomputer9@gmail.com',
            'smtp_pass' => 'codecomputer22',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        $this->load->library('email', $config);
        $this->email->from('codecomputer9@gmail.com', 'Toko Code Computer');

        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun Anda');
            $this->email->message('Silahkan klik link berikut untuk verifikasi akun anda : <a href="' . base_url() . 'c_auth/verify?email=' . $this->input->post('email') .
                '&token=' . urlencode($token) . '">verifikasi akun anda</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Ganti Password Anda');
            $this->email->message('Silahkan klik link berikut untuk mengubah password anda : <a href="' . base_url() . 'c_auth/ganti_pass?email=' . $this->input->post('email') .
                '&token=' . urlencode($token) . '">ubah password anda</a>');
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

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {

            $usertoken = $this->db->get_where('token', ['token' => $token])->row_array();

            if ($usertoken) {

                if (time() - $usertoken['date_created'] < (60 * 60 * 24)) {

                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('users');

                    $this->db->delete('token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' telah terverifikasi</div>');
                    redirect('c_auth');
                } else {

                    $this->db->delete('users', ['email' => $email]);
                    $this->db->delete('token', ['token' => $token]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun anda gagal di verifikasi! Token anda kadaluarsa!</div>');
                    redirect('c_auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun anda gagal di verifikasi! Token Salah!</div>');
                redirect('c_auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun anda gagal di verifikasi! Email Salah!</div>');
            redirect('c_auth');
        }
    }

    public function forgot_pass()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', ['required' => 'email tidak boleh kosong']);
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/lupa_pass');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('users', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {

                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('token', $user_token);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('success', true);
                redirect('c_auth/loading2');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email anda tidak terdaftar atau belum verifikasi!</div>');
                redirect('c_auth/lupa_password');
            }
        }
    }

    public function ubah_pass()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'password tidak boleh kosong']);
        $this->form_validation->set_rules('kpassword', 'Konfirmasi Password', 'required|trim|matches[password]', ['matches' => 'konfirmasi password salah']);

        if ($this->form_validation->run() == false) {

            $this->load->view('auth/ganti_pass');
        } else {

            $password = $this->input->post('password');
            $email = $this->session->userdata('ganti_email');

            $this->db->set('password', password_hash($password, PASSWORD_BCRYPT));
            $this->db->where('email', $email);
            $this->db->update('users');

            $this->session->unset_userdata('ganti_email');

            $this->db->delete('token', ['email' => $email]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password anda berhasil di ubah</div>');
            redirect('c_auth');
        }
    }

    public function ganti_pass()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');


        $pengguna = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($pengguna) {

            $user_token = $this->db->get_where('token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('ganti_email', $email);
                $this->ubah_pass();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda gagal ganti password! Token salah!</div>');
                redirect('c_auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda gagal ganti password! Email salah!</div>');
            redirect('c_auth');
        }
    }

    public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('alamat');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('no_telp');

		$this->session->set_flashdata('logout', true);
		redirect('c_home');
	}
}
