<?php

/* Class ini menggunakan Plugin Simple Authentication
 * Hal ini dilakukan untuk membantu proses Enkripsi Password */

class Auth extends CI_Controller
{

    var $template = 'admin/template';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_hakakses');
    }

    public function index()
    {
        /* Lakukan pengecekan apakah user sudah login pada sesi saat ini
         * Serta Pastikan username yang login adalah yang masih aktif (belum dihapus) */
        $active = $this->session->userdata('active');
        if ($this->authentication->is_loggedin() && $active == 1) {
            redirect('admin/dashboard');
        }
        $this->load->view('auth/login');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->authentication->login($username, $password)) {   // Cek username & password pada database
            $user_id = $this->session->userdata('identifier');
            $user = $this->m_hakakses->get_detail($user_id);     // Digunakan untuk mengetahui level dari Pengurus yang sedang Login

            if (count($user) > 0) {
                foreach ($user as $list) {
                    $this->session->set_userdata('active', $list['active']);
                    $this->session->set_userdata('nama_user', $list['first_name'] . ' ' . $list['last_name']);
                    $this->session->set_userdata('group_id', $list['group_id']);
                    $this->session->set_userdata('description', $list['description']);  // Deskripsi Level
                }
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata("message", "Username dan Password Salah!");
                redirect('auth');
            }
        }
        redirect('auth');
    }

    public function logout()
    {
        $this->authentication->logout();    // Proses ini akan men-destroy session yang ada
        redirect('auth');
    }
}

/* End of file  */
/* Location: ./application/controllers/ */