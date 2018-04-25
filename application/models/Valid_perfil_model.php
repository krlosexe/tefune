<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Valid_perfil_model extends CI_Model {

	public function valid($id_user)
	{
		$this->db->where('id', $id_user);
		$result = $this->db->get('users');
		return $result->row();
	}
}

/* End of file valid_perfil.php */
/* Location: ./application/models/valid_perfil.php */