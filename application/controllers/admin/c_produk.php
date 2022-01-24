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
        $data['produk'] = $this->m_produk->list_produk();
        $data['detail'] = $this->m_produk->list_produk();
        $data['stok'] = $this->m_produk->list_produk();
        $this->load->view('admin/produk/view_produk', $data);
    }

    public function add_produk()
    {
        $data['title'] = 'admin-add produk';
        $data['brand'] = $this->m_produk->list_brand();
        $this->load->view('admin/produk/add_produk', $data);
    }

    public function edit_produk($id)
    {
        $data['title'] = 'admin-edit produk';
        $data['brand'] = $this->m_produk->list_brand();
        $data['edit'] = $this->db->get_where('produk', ['id_produk' => $id])->row();
        $this->load->view('admin/produk/edit_produk', $data);
    }

    public function save()
    {
        $this->m_produk->save();
        $this->session->set_flashdata('insert', true);
        redirect('admin/c_produk');
    }

    public function update()
    {
        $this->m_produk->update();
        $this->session->set_flashdata('update', true);
        redirect('admin/c_produk');
    }

    public function tambah_stok()
    {
        $kode = $this->input->post('id_produk');
		$stok = $this->input->post('stok');
		$this->db->query("UPDATE `produk` SET `stok`=stok+'$stok' WHERE id_produk='$kode'");
		$this->session->set_flashdata('tambah_stok', true);
        redirect('admin/c_produk');
    }

    public function delete($id)
    {
        $this->m_produk->delete($id);
        $this->session->set_flashdata('delete', true);
        redirect('admin/c_produk');
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
        $this->m_produk->save_brand();
        $this->session->set_flashdata('insert', true);
        redirect('admin/c_produk/brand');
    }

    public function update_brand()
    {
        $this->m_produk->update_brand();
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
        $data = [
            'kategori' => $this->input->post('kategori')
        ];
        $this->db->insert('kategori', $data);
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
