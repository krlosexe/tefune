<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evidencias extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}else{
			$this->load->model('evidencias_model');
		}
	}
	public function deletePdf($id)
	{
		$documento = $this->evidencias_model->getDocumento($id);
		$id_fune = $documento->id_funeado;
		if ($this->evidencias_model->deleteDocumento($id)) {
			// $this->load->helper('file');
			// delete_files(base_url()."uploads/evidencias/".$documento->documento);
			$this->session->set_flashdata('valid', "Documento Eliminado Exitosamente");
           	redirect(base_url()."denuncias/upload/".$id_fune);
		}
	}

	public function deleteImg($id)
	{
		$documento = $this->evidencias_model->getImg($id);
		$id_fune   = $documento->id_funeado;
		if ($this->evidencias_model->deleteImg($id)) {
			// $this->load->helper('file');
			// delete_files(base_url()."uploads/evidencias/".$documento->documento);
			$this->session->set_flashdata('valid', "Foto Eliminada Exitosamente");
           	redirect(base_url()."denuncias/upload/".$id_fune);
		}
	}

}

/* End of file Evidencias.php */
/* Location: ./application/controllers/Evidencias.php */