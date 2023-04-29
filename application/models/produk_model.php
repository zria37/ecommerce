<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

    public function get_all_produk($seacrch)
    {
        $this->db->like('nama_produk', $seacrch);
        $query = $this->db->get('produk');
        return $query->result();
    }
    
    public function search_produk($keyword)
    {
        $this->db->like('nama_produk', $keyword);
        $query = $this->db->get('produk');
        return $query->result();
    }
    
    public function get_produk_by_id($produk_id)
    {
        $this->db->where('produk_id', $produk_id);
        $query = $this->db->get('produk');
        return $query->row();
    }

    public function get_all()
    {
        return $this->db->get('produk')->result();
    }
    
    public function get_by_id($id)
    {
        return $this->db->get_where('produk', ['produk_id' => $id])->row();
    }

}
