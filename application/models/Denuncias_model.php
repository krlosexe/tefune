<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Denuncias_model extends CI_Model {



	public function save_factura($datos)

	{

		return $this->db->insert('td_facturas', $datos);

	}







	public function save_cheque($datos)

	{

		return $this->db->insert('td_cheques', $datos);

	}



	public function save_letra($datos)

	{

		return $this->db->insert('td_letras', $datos);

	}



	public function save_arriendo_habitacional($datos)

	{

		return $this->db->insert('td_arriendo_habitacional', $datos);

	}



	public function save_arriendo_comercial($datos)

	{

		return $this->db->insert('td_arriendo_comercial', $datos);

	}





	public function save_arriendo_vehiculo($datos)

	{

		return $this->db->insert('td_arriendo_vehiculos', $datos);

	}



	public function save_arriendo_equipos($datos)

	{

		return $this->db->insert('td_arriendo_equipos', $datos);

	}

	public function save_creditos_automotrices($datos)

	{

		return $this->db->insert('td_creditos_automotrices', $datos);

	}


	public function save_creditos_laborales($datos)

	{

		return $this->db->insert('td_creditos_laborales', $datos);

	}



	





	





	public function getDenuncias($tabla)

	{

		$rol_user    = $this->session->userdata("rol");

		$id_user     = $this->session->userdata("id");



		if ($rol_user == 3) {

			$this->db->where('id_users', $id_user);

		}

		$resultados = $this->db->get($tabla);

		return $resultados->result();

	}



	public function typeDenuncias()

	{

		$resultados = $this->db->get('tipo_fune');

		return $resultados->result();

	}





	public function getipodeudas()

	{

		$resultados = $this->db->get('tipo_deuda');

		return $resultados->result();

	}



	public function getipohabitacional()

	{

		$resultados = $this->db->get('tipo_habitacional');

		return $resultados->result();

	}

	public function getipocontrato()

	{

		$resultados = $this->db->get('tipo_contrato');

		return $resultados->result();

	}





	public function getipocomercial()

	{

		$resultados = $this->db->get('tipo_comercial');

		return $resultados->result();

	}





	public function getipovehiculo()

	{

		$resultados = $this->db->get('tipo_vehiculos');

		return $resultados->result();

	}





	public function getipotipomotivo()

	{

		$resultados = $this->db->get('tipo_motivo');

		return $resultados->result();

	}



	public function getipolaborales()

	{

		$resultados = $this->db->get('tipo_laborales');

		return $resultados->result();

	}


	public function getipodeudor()
	{
		$resultados = $this->db->get('tipo_deudor');

		return $resultados->result();
	}

	





	public function lastID()

	{

		return $this->db->insert_id();

	}



	public function getDenuncia($id)

	{

		$this->db->where('id', $id);

		$resultado = $this->db->get('funeado');

		return $resultado->row();

	}





	public function getfactura($id)

	{

		$this->db->where('id', $id);

		$resultado = $this->db->get('td_facturas');

		return $resultado->row();

	}



	public function getcheque($id)

	{

		$this->db->where('id', $id);

		$resultado = $this->db->get('td_cheques');

		return $resultado->row();

	}



	public function getletra($id)

	{

		$this->db->where('id', $id);

		$resultado = $this->db->get('td_letras');

		return $resultado->row();

	}





	public function getarriendohabitacional($id)

	{

		$this->db->where('id', $id);

		$resultado = $this->db->get('td_arriendo_habitacional');

		return $resultado->row();

	}



	public function getarriendocomercial($id)

	{

		$this->db->where('id', $id);

		$resultado = $this->db->get('td_arriendo_comercial');

		return $resultado->row();

	}



	public function getarriendovehiculo($id)

	{

		$this->db->where('id', $id);

		$resultado = $this->db->get('td_arriendo_vehiculos');

		return $resultado->row();

	}



	public function getarriendoequipo($id)

	{

		$this->db->where('id', $id);

		$resultado = $this->db->get('td_arriendo_equipos');

		return $resultado->row();

	}

	public function getcreditos_automotrices($id)

	{

		$this->db->where('id', $id);

		$resultado = $this->db->get('td_creditos_automotrices');

		return $resultado->row();

	}



	public function getcreditoslaborales($id)
	{
		$this->db->where('id', $id);

		$resultado = $this->db->get('td_creditos_laborales');

		return $resultado->row();
	}



	







}



/* End of file Denuncias_model.php */

/* Location: ./application/models/Denuncias_model.php */