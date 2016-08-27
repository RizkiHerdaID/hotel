<?php

class Auth extends CI_Controller {

    var $template = 'admin/template';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_hakakses');

    }

    public function index(){
        if ($this->authentication->is_loggedin())
        {
            redirect('admin/dashboard');
        }
        $this->load->view('auth/login');
    }

    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->authentication->login($username, $password))
        {
            $user_id = $this->session->userdata('identifier');
            $user = $this->m_hakakses->get_group($user_id);
            foreach ($user as $list){
                $this->session->set_userdata('nama_user', $list['first_name'].' '.$list['last_name']);
                $this->session->set_userdata('group_id', $list['group_id']);
                $this->session->set_userdata('description', $list['description']);
            }
            redirect('admin/dashboard');
        } else {
            redirect('auth');
        }
    }

    public function logout(){
        $this->authentication->logout();
        redirect('auth');
    }
}

/* End of file  */
/* Location: ./application/controllers/ */