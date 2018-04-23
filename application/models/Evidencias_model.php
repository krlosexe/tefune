<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Evidencias_model extends CI_Model {



	public function save($data)

	{
		return $this->db->insert('documentos', $data);
	}



	public function getEvidenciasPdf($tipo, $id)

	{	
		$this->db->where('id_denuncia', $id);
		$this->db->where('id_tipo_denuncia', $tipo);
		$resultados = $this->db->get('documentos');

		return $resultados->result();
	}



	public function saveFoto($data)

	{
		return $this->db->insert('fotos', $data);
	}



	public function getEvidenciasFotos($tipo, $id)

	{	$this->db->where('id_denuncia', $id);
		$this->db->where('id_tipo_denuncia', $tipo);
		$resultados = $this->db->get('fotos');

		return $resultados->result();

	}





	public function getDocumento($id)
	{
		$this->db->where('id', $id);
		$resultados = $this->db->get('documentos');
		return $resultados->row();
	}



	public function deleteDocumento($id)
	{
		$this->db->where('id', $id);
		$resultado = $this->db->delete('documentos');
		return $resultado;

	}



	public function getImg($id)

	{

		$this->db->where('id', $id);
		$resultados = $this->db->get('fotos');
		return $resultados->row();

	}



	public function deleteImg($id)

	{
		$this->db->where('id', $id);
		$resultado = $this->db->delete('fotos');
		return $resultado;

	}

}



/* End of file Evidencias_model.php */

/* Location: ./application/models/Evidencias_model.php */