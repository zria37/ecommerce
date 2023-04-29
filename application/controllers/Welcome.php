<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
	public function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
        $this->load->database();
		$this->load->model('produk_model');
    }

	public function index()
	{
		if(isset($_GET['keyword'])){
			$seacrch = $this->input->get('keyword');
		}else{
			$seacrch = '';
		}
        
		 // Ambil semua produk dari database
		 $data['produk'] = $this->produk_model->get_all_produk($seacrch);
		 
		 // Tampilkan halaman katalog dengan daftar produk
		$this->load->view('welcome_message', $data);
	}

	public function detail($produk_id)
    {       
        // Ambil informasi detail produk dari database
        $data['produk'] = $this->produk_model->get_produk_by_id($produk_id);
        
        // Tampilkan halaman detail produk
        $this->load->view('detail', $data);
    }
}
