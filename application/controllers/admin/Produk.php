<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('jenis_model');
		// proteksi halam admin dengan fungsi cek_lign yang ada di simple login
		//$this->simple_login->cek_login();
	}

	// View barang
	public function index()
	{
		$produk = $this->produk_model->listing();

		$data = array(	'title'		=> 'Data produk',
						'produk'		=> $produk,
						'isi'		=> 'admin/produk/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah barang
	public function tambah()
	{
		//Ambil Data JENIS
		$jenis = $this->jenis_model->listing();
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('NAMA_BAJU_M','Nama baju','required',
			array(	'required'			=>'%s harus diisi'));

		$valid->set_rules('HARGA_BAJU_M','Harga baju','required',
			array(	'required'			=>'%s harus diisi'));

		$valid->set_rules('UKURAN_BAJU_M','Ukuran','required',
			array(	'required'			=>'%s harus diisi'));

		

		if($valid->run()===FALSE) {
		// end validasi

		$data = array(	'title'		=> 'Tambah produk',
						'jenis' => $jenis,
						'isi'		=> 'admin/produk/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		// Masuk database
		}else{
			$i = $this->input;
			$data = array(	'ID_JENIS_M'		=>$i->post('ID_JENIS_M'),
							'ID_BAJU_M'		=>$i->post('ID_BAJU_M'),
							'NAMA_BAJU_M' =>$i->post('NAMA_BAJU_M'),
							'HARGA_BAJU_M'					=>$i->post('HARGA_BAJU_M'),
							'UKURAN_BAJU_M'				=>$i->post('UKURAN_BAJU_M')
						);
			$this->produk_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/produk'),'refresh');
		}
		//End Masuk Database
	}

	// edit barang
	public function edit($id_produk)
	{
		$produk = $this->produk_model->detail($id_produk);
		//Ambil data jenis
		$jenis = $this->jenis_model->listing();
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('NAMA_BAJU_M','Nama produk','required',
			array(	'required'			=>'%s harus diisi'));

		$valid->set_rules('HARGA_BAJU_M','Harga produk','required',
			array(	'required'			=>'%s harus diisi'));

		$valid->set_rules('UKURAN_BAJU_M','Ukuran produk','required',
			array(	'required'			=>'%s harus diisi'));

		if($valid->run()===FALSE) {
		// end validasi

			$data = array(	'title'		=> 'Edit produk ',
						'produk' => $produk,
						'jenis'		=>	$jenis,
						'isi'		=> 'admin/produk/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		// Masuk database
		}else{
			$i = $this->input;
			$data = array(	'ID_BAJU_M' =>	$id_produk,
							'ID_JENIS_M'		=>$i->post('ID_JENIS_M'),
							'NAMA_BAJU_M' =>$i->post('NAMA_BAJU_M'),
							'HARGA_BAJU_M'					=>$i->post('HARGA_BAJU_M'),
							'UKURAN_BAJU_M'				=>$i->post('UKURAN_BAJU_M')
						);
			$this->produk_model->edit($data);
			$this->session->set_flashdata('Berhasil', 'Data telah diedit');
			redirect(base_url('admin/produk'),'refresh');
		}
	}

	// Delete barang
	public function delete($id_produk)
	{
		$data = array('ID_BAJU_M'	=> $id_produk);
		$this->produk_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/produk'),'refresh');
	}
}

/* End of file barang.php */
/* Location: ./application/controllers/admin/barang.php */
