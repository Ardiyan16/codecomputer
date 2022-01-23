<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'admin-dashboard';
        $this->load->view('admin/dashboard', $data);
    }
}