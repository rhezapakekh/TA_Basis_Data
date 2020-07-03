<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// View All jenis
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('T_JENIS_BAJU_M');
		$this->db->order_by('ID_JENIS_M', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail All jenis untuk edit
	public function detail($id_jenis)
	{
		$this->db->select('*');
		$this->db->from('T_JENIS_BAJU_M');
		$this->db->where('ID_JENIS_M', $id_jenis);
		$this->db->order_by('ID_JENIS_M', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}

	// tambah data jenis
	public function tambah($data)
	{
		$this->db->insert('T_JENIS_BAJU_M', $data);
	}

	// Edit data jenis
	public function edit($data)
	{
		$this->db->where('ID_JENIS_M', $data['ID_JENIS_M']);
		$this->db->update('T_JENIS_BAJU_M',$data);
	}	

	// Delete data jenis
	public function delete($data)
	{
		$this->db->where('ID_JENIS_M', $data['ID_JENIS_M']);
		$this->db->delete('T_JENIS_BAJU_M',$data);
	}	

}

/* End of file Jenis_model.php */
/* Location: ./application/models/Jenis_model.php */