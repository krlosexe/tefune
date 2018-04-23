<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitudes_model extends CI_Model {

	public function save($data)
	{
		$result = $this->db->insert('solicitud', $data);
		return $result;
	}

	public function getSolicitudes()
	{
		$rol_user    = $this->session->userdata("rol");
		$id_user     = $this->session->userdata("id");
		$this->db->select('solicitud.*, 
			              tipo_fune.fune as tipo_fune, 
			              type_document.nombre as tipo_ducumento');
		$this->db->join('tipo_fune', 'tipo_fune.id_fune = solicitud.id_tipo_fune');
		$this->db->join('type_document', 'type_document.id = solicitud.tipe_document');
		if ($rol_user == 3) {
			$this->db->where('id_users', $id_user);
		}
		$this->db->from('solicitud');
		$result = $this->db->get();
		return $result->result();
	}


	public function getsolicitud($id)
	{
		$this->db->select('solicitud.*,
			              users.identidad as identidad_user,
			              users.p_nombre,
			              users.p_apellido,
			              users.email,
			              users.celular');
		$this->db->join('users', 'users.id = solicitud.id_users');
		$this->db->where('solicitud.id', $id);
		$this->db->from('solicitud');
		$result = $this->db->get();
		return $result->row();
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$resultado = $this->db->delete('solicitud');
		return $resultado;
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('solicitud', $data);
	}



}

/* End of file Solicitudes_model.php */
/* Location: ./application/models/Solicitudes_model.php */