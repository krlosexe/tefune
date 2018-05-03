<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Pagos_model extends CI_Model {



	public function save($data, $tipo, $id)

	{

		if ($tipo == 1) {

			$tabla = "td_facturas";

		}else if ($tipo == 2) {

			$tabla = "td_cheques";

		}else if ($tipo == 3) {

			$tabla = "td_letras";

		}else if ($tipo == 4) {

			$tabla = "td_arriendo_habitacional";

		}else if ($tipo == 5) {

			$tabla = "td_arriendo_comercial";

		}else if ($tipo == 6) {

			$tabla = "td_arriendo_vehiculos";

		}else if ($tipo == 7) {

			$tabla = "td_arriendo_equipos";

		}else if ($tipo == 8) {

			$tabla = "td_creditos_automotrices";

		}else if ($tipo == 9) {

			$tabla = "td_incumplimiento_laborales";

		}else if ($tipo == 10) {

			$tabla = "td_incumplimiento_comerciales";

		}else if ($tipo == 11) {

			$tabla = "td_estafadores";

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

		}else if ($tipo == 2) {

			$tabla = "td_cheques";

		}else if ($tipo == 3) {

			$tabla = "td_letras";

		}else if ($tipo == 4) {

			$tabla = "td_arriendo_habitacional";

		}else if ($tipo == 6) {

			$tabla = "td_arriendo_vehiculos";

		}else if ($tipo == 7) {

			$tabla = "td_arriendo_equipos";

		}else if ($tipo == 8) {

			$tabla = "td_creditos_automotrices";

		}else if ($tipo == 9) {

			$tabla = "td_incumplimiento_laborales";

		}else if ($tipo == 10) {

			$tabla = "td_incumplimiento_comerciales";

		}else if ($tipo == 11) {

			$tabla = "td_estafadores";

		}

		$this->db->where('id', $id);

		$object = array('estatus' => 1);

		return $this->db->update($tabla, $object);

	}



}



/* End of file Pagos_model.php */

/* Location: ./application/models/Pagos_model.php */