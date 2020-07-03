<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// View All user
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('T_HAK_AKSES');
		$this->db->order_by('ID_USER', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail All user untuk edit
	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from('T_HAK_AKSES');
		$this->db->where('ID_USER', $id_user);
		$this->db->order_by('ID_USER', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}

	// Login User
	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('T_HAK_AKSES');
		$this->db->where(array( 'USERNAME'	=> $username,
								'PASSWORD_07067'	=> $password));
		$this->db->order_by('ID_USER', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}

	// tambah data user
	public function tambah($data)
	{
		$this->db->insert('T_HAK_AKSES', $data);
	}

	// Edit data user
	public function edit($data)
	{
		$this->db->where('ID_USER', $data['ID_USER']);
		$this->db->update('T_HAK_AKSES',$data);
	}	

	// Delete data user
	public function delete($data)
	{
		$this->db->where('ID_USER', $data['ID_USER']);
		$this->db->delete('T_HAK_AKSES',$data);
	}	

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */