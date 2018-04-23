<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitar_datos extends CI_Controller {
	private $permisos;
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}else{
			$this->permisos = $this->backend_lib->control();
			$this->load->model('users_model');
			$this->load->model('denuncias_model');
			$this->load->model('solicitudes_model');
		}
	}

	public function index()
	{
		$id_user  = $this->session->userdata("id");

		$control  = $this->permisos;
		$opciones = array('opciones'   => $control["opciones"]);
		$permisos = array('permisos'   => $control["permisos"]);

		$data     = array('user'             => $this->users_model->getUser($id_user),
			              'solicitudes'      => $this->solicitudes_model->getSolicitudes(),
	                      'control_permisos' => $permisos);

	
		$this->load->view('dashboard/layouts/header');
		$this->load->view('dashboard/layouts/sidebar', $opciones);
		$this->load->view('dashboard/layouts/top_panel', $data);
		$this->load->view('dashboard/solicitudes/list');
		$this->load->view('dashboard/layouts/footer');
	}
	public function add()
	{
		$id_user  = $this->session->userdata("id");

		$control  = $this->permisos;
		$opciones = array('opciones'   => $control["opciones"]);
		$permisos = array('permisos'   => $control["permisos"]);

		$data     = array('user'             => $this->users_model->getUser($id_user),
			              'type_denuncia'    => $this->denuncias_model->typeDenuncias(),
			              'type_documents'   => $this->users_model->typeDucument(),
	                      'control_permisos' => $permisos);

	
		$this->load->view('dashboard/layouts/header');
		$this->load->view('dashboard/layouts/sidebar', $opciones);
		$this->load->view('dashboard/layouts/top_panel', $data);
		$this->load->view('dashboard/solicitudes/solicitar_datos');
		$this->load->view('dashboard/layouts/footer');
	}


	public function store()
	{
		$id_user        = $this->session->userdata("id");
		$tipo           = $this->input->get("tipo");
		$type_document  = $this->input->get("type_document");
		$identidad      = $this->input->get("identidad");

		$data = array(
			'tipo'          => $tipo,
			'type_document' => $type_document,
			'identidad'     => $identidad
		);

		$this->form_validation->set_data($data);
    	$this->form_validation->set_rules('tipo', 'tipo de deinuncia', 'required');
		$this->form_validation->set_rules('type_document', 'tipo de documento', 'required');
		$this->form_validation->set_rules('identidad', 'n° de identidad', 'required');

		if ($this->form_validation->run()){
			$data = array('id_users'      => $id_user,
				          'id_tipo_fune'  => $tipo,
			              'tipe_document' => $type_document,
			              'identidad'     => $identidad,
			              'estatus'       => 0);

				if ($this->solicitudes_model->save($data)) {
	        		$errors = array('success' => true,
		                            'message' => 'Registro exitoso');
	           		echo  json_encode($errors);
	        	}else{
	        		$datos = array('success' => false,
			                       'message' => 'A ocurrudo un error');
				    echo  json_encode($datos);
	        	}
		}else{
			$campos = array('tipo'          => form_error("tipo", "<span class='help-block'>","</span>"),
	                        'type_document' => form_error("type_document", "<span class='help-block'>","</span>"),
	                  	    'identidad'     => form_error("identidad", "<span class='help-block'>","</span>"));

				 $datos = array('success' => false,
					            'valid'   => true,
					            'campos'  => $campos);
				 echo  json_encode($datos);
		}
	}



	public function view($id)
	{
		$id_user  = $this->session->userdata("id");

		$control  = $this->permisos;
		$opciones = array('opciones'   => $control["opciones"]);
		$permisos = array('permisos'   => $control["permisos"]);

		$data     = array('user'             => $this->users_model->getUser($id_user),
			              'type_denuncia'    => $this->denuncias_model->typeDenuncias(),
			              'type_documents'   => $this->users_model->typeDucument(),
			              'solicitud'        => $this->solicitudes_model->getsolicitud($id),
	                      'control_permisos' => $permisos);

	
		$this->load->view('dashboard/layouts/header');
		$this->load->view('dashboard/layouts/sidebar', $opciones);
		$this->load->view('dashboard/layouts/top_panel', $data);
		$this->load->view('dashboard/solicitudes/view');
		$this->load->view('dashboard/layouts/footer');
	}

	public function delete($id)
	{
		if ($this->solicitudes_model->delete($id)) {
			// $this->load->helper('file');
			// delete_files(base_url()."uploads/evidencias/".$documento->documento);
			$errors = array('success' => true,
	                        'message' => 'Solicitid Eliminada exitosamente');
           	echo  json_encode($errors);
		}else{
			$errors = array('success' => false,
	                        'message' => 'A ocurrido un error');
           	echo  json_encode($errors);
		}
	}

	public function revision($id, $status)
	{
		$data = array('estatus' => $status);
		if ($this->solicitudes_model->update($id, $data)) {
    		$errors = array('success' => true,
                            'message' => 'Operacion exitosa');
       		echo  json_encode($errors);
    	}else{
    		$datos = array('success' => false,
	                       'message' => 'A ocurrudo un error');
		    echo  json_encode($datos);
    	}
	}

}

/* End of file Solicitar_datos.php */
/* Location: ./application/controllers/solicitudes/Solicitar_datos.php */