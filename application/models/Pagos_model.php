<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagos_model extends CI_Model {

	public function save($data, $tipo, $id)
	{
		if ($tipo == 1) {
			$tabla = "td_facturas";
		}
		$this->db->where('id', $id);
		$object = array('estatus' => 2);
		$this->db->update($tabla, $object);

		return $this->db->insert('pagos', $data);
	}

	public function getpago($tipo, $id)
	{
		$this->db->where('id_tipo_denuncia', $tipo);
		$this->db->where('id_denuncia', $id);
		$result = $this->db->get('pagos');
		return $result->row();
	}

	public function sucsses($tipo, $id)
	{
		if ($tipo == 1) {
			$tabla = "td_facturas";
		}
		$this->db->where('id', $id);
		$object = array('estatus' => 1);
		return $this->db->update($tabla, $object);
	}

}

/* End of file Pagos_model.php */
/* Location: ./application/models/Pagos_model.php */