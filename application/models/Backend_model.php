<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {

	public function getID($link)
	{
		$this->db->like('link', $link);
		$resultado = $this->db->get('menus');
		return $resultado->row();
	}

	public function getPermisos($menu, $rol)
	{
		$this->db->where('menu_id', $menu);
		$this->db->where('rol_id', $rol);
		$resultado = $this->db->get('permisos');
		return $resultado->row();
	}

	public function getOpciones($rol)
	{
		$this->db->select('permisos.*, menus.nombre as menu_nombre');
		$this->db->join('menus', 'menus.id  = permisos.menu_id');
		$this->db->from('permisos');
		$this->db->where('rol_id', $rol);
		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function rowCount($tabla)
	{
		if ($tabla != "ventas") {
			$this->db->where('estado', 1);
		}
		$resultados = $this->db->get($tabla);
		return $resultados->num_rows();
	}

}

/* End of file backend_model.php */
/* Location: ./application/models/backend_model.php */