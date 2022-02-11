<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_admin');
    }

    public function index()
    {
        $data['title'] = 'admin | Data User';
        $data['pengguna'] = $this->m_admin->list_user();
        $this->load->view('admin/pages/list_user', $data);
    }

    public function delete_users($id)
    {
        $this->db->delete('users', ['id' => $id]);
        $this->session->set_flashdata('delete', true);
        redirect('admin/c_admin');
    }   
}