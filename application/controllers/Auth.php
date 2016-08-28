<?php

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

        if ($this->authentication->login($username, $password)) {
            $user_id = $this->session->userdata('identifier');
            $user = $this->m_hakakses->get_group($user_id);
            if (count($user) > 0) {
                foreach ($user as $list) {
                    $this->session->set_userdata('active', $list['active']);
                    $this->session->set_userdata('nama_user', $list['first_name'] . ' ' . $list['last_name']);
                    $this->session->set_userdata('group_id', $list['group_id']);
                    $this->session->set_userdata('description', $list['description']);
                }
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata("message", "Username dan Password Salah!");
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->authentication->logout();
        redirect('auth');
    }
}

/* End of file  */
/* Location: ./application/controllers/ */