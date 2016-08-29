<?php

class HakAkses extends CI_Controller
{

    var $template = 'admin/template';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_hakakses');
    }

    public function index($back = FALSE)
    {
        $back = $this->input->post('back');
        $content = 'admin/hakakses/index';
        $data = [
            'title' => 'Daftar Pengguna & Hak Akses',
            'content' => $content,
            'hakakses' => $this->m_hakakses->read(),    // Menampilkan Data Daftar Pengurus
            'grup' => $this->m_hakakses->read_groups()  // Pengisi drop-down Level pada fitur "Tambah Pengguna"
        ];
        if($back){
            $respone = $this->load->view($content, $data, TRUE);
            echo $respone;
        } else {
            $this->load->view($this->template, $data);
        }
    }

    public function details()
    {
        $user_id = $this->input->post('id');
        $id_group = $this->input->post('group');
        $content = 'admin/hakakses/detail';
        $data = [
            'title' => 'Detail Pengurus & Hak Akses',
            'detail' => $this->m_hakakses->read($user_id, $id_group) // Menampilkan Detail Pengurus berdasarkan ID Pengurus & ID Level
        ];
        $response = $this->load->view($content, $data, TRUE);
        echo $response;
    }

    public function viewUpdate()
    {
        $user_id = $this->input->post('id');
        $id_group = $this->input->post('group');
        $content = 'admin/hakakses/update';
        $data = [
            'title' => 'Update Data Pengurus & Hak Akses',
            'detail' => $this->m_hakakses->read($user_id, $id_group) // Menampilkan Detail Pengurus berdasarkan ID Pengurus & ID Level
        ];
        $response = $this->load->view($content, $data, TRUE);
        echo $response;
    }

    public function create()
    {
        if ($this->input->server('REQUEST_METHOD') == "POST") {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[30]|alpha_numeric');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[30]');
            $this->form_validation->set_rules('passconf', 'Password Konfirmasi', 'trim|required|matches[password]');
            $this->form_validation->set_rules('fname', 'Nama Depan', 'trim|required|alpha_numeric_spaces');
            $this->form_validation->set_rules('lname', 'Nama Belakang', 'trim|alpha_numeric_spaces');
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|max_length[100]');
            $this->form_validation->set_rules('phone', 'Telepon / HP', 'trim|required|is_numeric|max_length[20]');
            $this->form_validation->set_rules('level', 'Level', 'trim|required|is_numeric');

            if ($this->form_validation->run() == FALSE) {   // Jika Rule tidak terpenuhi maka munculkan pesan error
                $this->session->set_flashdata("errors", validation_errors());
            } else {
                // Username dan Password karena menggunakan Plugin "Simple Authenctication"
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                // ID Level dibedakan karena diinputkan pada Tabel Group & Guest_Group di Database
                $id_group = $this->input->post('level');

                $data = [
                    'first_name' => $this->input->post('fname'),
                    'last_name' => $this->input->post('lname'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                ];

                if ($this->m_hakakses->create($data, $id_group, $username, $password)) {
                    $this->session->set_flashdata("operation", "success");
                    $this->session->set_flashdata("message", "<strong>Tambah Berhasil!</strong> pengurus telah ditambahkan");
                    redirect('admin/hakAkses');
                } else {
                    $data = [
                        "operation" => "warning",
                        "message" => "Maaf. Terjadi kesalahan pada sistem.",
                    ];
                }
            }
        }
        $data = [
            'title' => 'Daftar Pengguna & Hak Akses',
            'content' => 'admin/hakAkses/index',
            'hakakses' => $this->m_hakakses->read(),    // Menampilkan Data Daftar Pengurus
            'grup' => $this->m_hakakses->read_groups()  // Pengisi drop-down Level pada fitur "Tambah Pengguna"
        ];
        $this->load->view($this->template, $data);
    }

    public function update()
    {
        // TODO Perlu ditambahkan fitur reset password hanya untuk level admin saja
        $this->form_validation->set_rules('fname', 'Nama Depan', 'trim|required|alpha_numeric_spaces');
        $this->form_validation->set_rules('lname', 'Nama Belakang', 'trim|alpha_numeric_spaces');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|max_length[100]');
        $this->form_validation->set_rules('phone', 'Telepon / HP', 'trim|required|is_numeric|max_length[20]');
        $this->form_validation->set_rules('level', 'Level', 'trim|required|is_numeric');
        $user_id = $this->input->post('userid');        // ID Pengurus sebagai Primary saat update query

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("errors", validation_errors());
        } else {
            $data = [
                'first_name' => $this->input->post('fname'),
                'last_name' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
            ];

            if ($this->m_hakakses->update($data, $user_id)) {
                $this->session->set_flashdata("operation", "success");
                $this->session->set_flashdata("message", "<strong>Update Berhasil!</strong> data pengurus telah diubah");
                redirect('admin/hakAkses');
            } else {
                $data = [
                    "operation" => "warning",
                    "message" => "Maaf. Terjadi kesalahan pada sistem.",
                ];
            }
        }

        $id_group = $this->input->post('level');    // ID Level digunakan sebagai Secondary Key saat menampilkan Data Detail Pengurus
        $data = [
            'title' => 'Update Data Pengurus & Hak Akses',
            'content' => 'admin/hakakses/update',
            'detail' => $this->m_hakakses->read($user_id, $id_group) // Menampilkan Detail Pengurus berdasarkan ID Pengurus & ID Level
        ];
        $this->load->view($this->template, $data);
    }


    public function delete($id)
    {
        $result = $this->m_hakakses->delete($id);
        if ($result) {
            $this->session->set_flashdata("operation", "success");
            $this->session->set_flashdata("message", "<strong>Hapus Berhasil!</strong> pengguna telah dihapus");
        } else {
            $this->session->set_flashdata("operation", "danger");
            $this->session->set_flashdata("message", "<strong>Hapus Gagal!</strong> Terjadi kesalahan pada sistem.");
        }
        redirect("admin/hakAkses");
    }
}

/* End of file datamaster.php */
/* Location: ./application/controllers/datamaster.php */
