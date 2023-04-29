<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->library('session');
    }
    
    public function add()
    {
        $product_id = $this->input->post('produk_id');
        $qty = $this->input->post('qty');
        
        $product = $this->produk_model->get_by_id($product_id);
        
        // Jika produk tidak ditemukan, redirect ke halaman 404
        if (!$product) {
            show_404();
        }
        
        $cart = $this->session->userdata('cart') ?? [];
        
        // Cek apakah produk sudah ada di dalam keranjang belanja
        foreach ($cart as $key => $item) {
            if ($item['product_id'] == $product_id) {
                // Update jumlah produk jika sudah ada di dalam keranjang belanja
                $cart[$key]['qty'] += $qty;
                $this->session->set_userdata('cart', $cart);
                redirect('cart');
            }
        }
        
        // Tambahkan produk ke dalam keranjang belanja jika belum ada
        $cart[] = [
            'product_id' => $product_id,
            'qty' => $qty,
            'name' => $product->name,
            'price' => $product->price,
            'subtotal' => $product->price * $qty
        ];
        
        $this->session->set_userdata('cart', $cart);
        
        redirect('cart');
    }
    
    public function remove($key)
    {
        $cart = $this->session->userdata('cart') ?? [];
        
        // Hapus item dari keranjang belanja
        unset($cart[$key]);
        
        $this->session->set_userdata('cart', $cart);
        
        redirect('cart');
    }
    
    public function index()
    {
        $data['cart'] = $this->session->userdata('cart') ?? [];
        
        $this->load->view('cart_index', $data);
    }
}

