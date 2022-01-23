<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_produk');
    }

    public function index()
    {
        $data['title'] = 'admin-list produk';
        $this->load->view('admin/produk/view_produk', $data);
    }

    public function brand()
    {
        $data['title'] = 'admin-list brand';
        $data['view'] = $this->m_produk->list_brand();
        $data['edit'] = $this->m_produk->list_brand();
        $this->load->view('admin/produk/view_brand', $data);
    }

    public function save_brand()
    {
        $data = [
            'brand' => $this->input->post('brand')
        ];
        $this->db->insert('brand', $data);
        $this->session->set_flashdata('insert', true);
        redirect('admin/c_produk/brand');
    }

    public function update_brand()
    {
        $brand = $this->input->post('brand');
        $id = $this->input->post('id');
        $this->db->set('brand', $brand);
        $this->db->where('id', $id);
        $this->db->update('brand');
        $this->session->set_flashdata('update', true);
        redirect('admin/c_produk/brand');
    }

    public function delete_brand($id)
    {
        $this->db->delete('brand', ['id' => $id]);
        $this->session->set_flashdata('delete', true);
        redirect('admin/c_produk/brand');
    }

    public function kategori()
    {
        $data['title'] = 'admin-list kategori';
        $data['view'] = $this->m_produk->list_kategori();
        $data['edit'] = $this->m_produk->list_kategori();
        $this->load->view('admin/produk/view_kategori', $data);
    }

    public function save_kategori()
    {
        $kategori = $this->input->post('kategori');
        $this->db->insert('kategori', $kategori);
        $this->session->set_flashdata('insert', true);
        redirect('admin/c_produk/kategori');
    }

    public function update_kategori()
    {
        $id = $this->input->post('id_kat');
        $kategori = $this->input->post('kategori');
        $this->db->set('kategori', $kategori);
        $this->db->where('id_kat', $id);
        $this->db->update('kategori');
        $this->session->set_flashdata('update', true);
        redirect('admin/c_produk/kategori');
    }

    public function delete_kategori($id)
    {
        $this->db->delete('kategori', ['id_kat' => $id]);
        $this->session->set_flashdata('delete', true);
        redirect('admin/c_produk/kategori');
    }
}