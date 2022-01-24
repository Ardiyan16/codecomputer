<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class m_produk extends CI_Model
{
    private $tb_brand = 'brand';
    private $kategori = 'kategori';
    private $produk = 'produk';


    public function list_brand()
    {
        return $this->db->get($this->tb_brand)->result();
    }

    public function list_kategori()
    {
        return $this->db->get($this->kategori)->result();
    }

    public function list_produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('brand', 'brand.id = produk.brand');
        $query = $this->db->get();
        return $query->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_produk = $post['nama_produk'];
        $this->type = $post['type'];
        $this->harga = $post['harga'];
        $this->deskripsi = $post['deskripsi'];
        $this->stok = $post['stok'];
        $this->foto = $this->_uploadImage();
        $this->brand = $post['brand'];
        $this->db->insert($this->produk, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_produk = $post['id_produk'];
        $this->nama_produk = $post['nama_produk'];
        $this->type = $post['type'];
        $this->harga = $post['harga'];
        $this->deskripsi = $post['deskripsi'];
        $this->stok = $post['stok'];
        if (!empty($_FILES["foto"]["name"])) {
            $this->foto = $this->upload();
        } else {
            $this->foto = $post["old_image"];
        }
        $this->brand = $post['brand'];
        $this->db->update($this->produk, $this, ['id_produk' => $post['id_produk']]);
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './assets/admin/images/produk/';
        $config['allowed_types']        = 'gif|jpg|png';
        $nama_lengkap = $_FILES['foto']['name'];
        $config['file_name']            = $nama_lengkap;
        $config['overwrite']            = true;
        $config['max_size']             = 3024;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
    }

    public function save_brand()
    {
        $post = $this->input->post();
        $this->brand = $post['brand'];
        $this->logo = $this->upload();
        $this->db->insert($this->tb_brand, $this);
    }

    public function update_brand()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->brand = $post['brand'];
        if (!empty($_FILES["logo"]["name"])) {
            $this->logo = $this->upload();
        } else {
            $this->logo = $post["old_image"];
        }
        $this->db->update($this->tb_brand, $this, ['id' => $post['id']]);
    }

    private function upload()
    {
        $config['upload_path']          = './assets/admin/images/logo/';
        $config['allowed_types']        = 'gif|jpg|png';
        $nama_lengkap = $_FILES['logo']['name'];
        $config['file_name']            = $nama_lengkap;
        $config['overwrite']            = true;
        $config['max_size']             = 3024;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('logo')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
    }

    public function delete($id)
    {
        $this->hapus_foto($id);
        return $this->db->delete($this->produk, array("id_produk" => $id));
    }

    public function hapus_foto($id)
    {
        $foto = $this->db->get_where($this->produk, ['id_produk' => $id])->row();
        if ($foto->foto != "01.jpg") {
            $filename = explode(".", $foto->foto)[0];
            return array_map('unlink', glob(FCPATH . "/assets/admin/images/produk/$filename.*"));
        }
    }
}
