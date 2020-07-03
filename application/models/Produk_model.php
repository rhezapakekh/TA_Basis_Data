<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// View All user
	public function listing()
	{
		$this->db->select('T_BAJU_M.*,
						T_JENIS_BAJU_M.NAMA_JENIS_BAJU_M');
		$this->db->from('T_BAJU_M');
		$this->db->join('T_JENIS_BAJU_M', 'T_JENIS_BAJU_M.ID_JENIS_M = T_BAJU_M.ID_JENIS_M', 'left');
		// End Join
		$this->db->order_by('ID_BAJU_M', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail All user untuk edit
	public function detail($id_produk)
	{
		$this->db->select('*');
		$this->db->from('T_BAJU_M');
		$this->db->where('ID_BAJU_M', $id_produk);
		$this->db->order_by('ID_BAJU_M', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}

	
	// tambah data produk
	public function tambah($data)
	{
		$this->db->insert('T_BAJU_M', $data);
	}

	// Edit data produk
	public function edit($data)
	{
		$this->db->where('ID_BAJU_M', $data['ID_BAJU_M']);
		$this->db->update('T_BAJU_M',$data);
	}	

	// Delete data produk
	public function delete($data)
	{
		$this->db->where('ID_BAJU_M', $data['ID_BAJU_M']);
		$this->db->delete('T_BAJU_M',$data);
	}	

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */