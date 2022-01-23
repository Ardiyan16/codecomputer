<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class m_produk extends CI_Model
{
    private $brand = 'brand';
    private $kategori = 'kategori';


    public function list_brand()
    {
        return $this->db->get($this->brand)->result();
    }

    public function list_kategori()
    {
        return $this->db->get($this->kategori)->result();
    }
}