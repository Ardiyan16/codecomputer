<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_produk');
    }

    public function index()
    {
        $var['title'] = 'home';
        $var['produk'] = $this->m_produk->list_produk();
        $this->load->view('user/page/home', $var);
    }
}