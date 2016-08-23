<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Approval extends CI_Controller
{

    var $template = 'admin/template';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_approve');
    }

    public function index()
    {
        $data = [
            'title' => 'Approval',
            'content' => 'admin/approval/index',
            'approval' => $this->m_approve->read()
        ];
        $this->load->view($this->template, $data);
    }

    public function approve($order_id){
        $result = $this->m_approve->approve($order_id);
        if($result){
            $this->session->set_flashdata("operation", "success");
            $this->session->set_flashdata("message", "<strong>Approved!</strong> Data telah disetujui ");
        }
        else{
            $this->session->set_flashdata("operation", "danger");
            $this->session->set_flashdata("message", "<strong>Gagal</strong> Terjadi kesalah sistem.");
        }
        redirect("admin/check");
    }

    public function reject($order_id){
        $result = $this->m_approve->reject($order_id);
        if($result){
            $this->session->set_flashdata("operation", "danger");
            $this->session->set_flashdata("message", "<strong>Rejected</strong> Data tidak disetujui");
        }
        else{
            $this->session->set_flashdata("operation", "danger");
            $this->session->set_flashdata("message", "<strong>Gagal</strong> Terjadi kesalah sistem.");
        }
        redirect("admin/check");
    }
}