<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $var['title'] = 'home';
        $this->load->view('user/page/home', $var);
    }
}