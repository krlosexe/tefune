<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	private $permisos;
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}else{
			$this->permisos = $this->backend_lib->control();
			$this->load->model('users_model');
			$this->load->model('provincias_model');
		}
	}
	public function index()
	{
		$control  = $this->permisos;
		$opciones = array('opciones'   => $control["opciones"]);
		$permisos = array('permisos'   => $control["permisos"]);

		$id_user = $this->session->userdata("id");
		$data = array('user'             => $this->users_model->getUser($id_user),
					  'users'            => $this->users_model->getUsers(),
					  'control_permisos' => $permisos);
		$this->load->view('dashboard/layouts/header');
		$this->load->view('dashboard/layouts/sidebar', $opciones);
		$this->load->view('dashboard/layouts/top_panel', $data);
		$this->load->view('dashboard/administrar/usuarios/list');
		$this->load->view('dashboard/layouts/footer');
	}

	public function add()
	{

		$control  = $this->permisos;
		$opciones = array('opciones'   => $control["opciones"]);

		$id_user = $this->session->userdata("id");
		$data = array('user'  => $this->users_model->getUser($id_user),
					  'roles' => $this->users_model->getRoles()
					  );
		$this->load->view('dashboard/layouts/header');
		$this->load->view('dashboard/layouts/sidebar', $opciones);
		$this->load->view('dashboard/layouts/top_panel', $data);
		$this->load->view('dashboard/administrar/usuarios/add');
		$this->load->view('dashboard/layouts/footer');
	}

	public function edit($id)
	{
		$control  = $this->permisos;
		$opciones = array('opciones'   => $control["opciones"]);

		$id_user = $this->session->userdata("id");
		$data = array('user'           => $this->users_model->getUser($id_user),
			          'user_edit'      => $this->users_model->getUser($id),
			          'provincias'     => $this->provincias_model->getProvincias(),
			          'comunas'        => $this->provincias_model->getComunas(),
			          'type_documents' => $this->users_model->typeDucument(),
					  'roles'          => $this->users_model->getRoles(),
					  'id'             => $id
					  );
		$this->load->view('dashboard/layouts/header');
		$this->load->view('dashboard/layouts/sidebar', $opciones);
		$this->load->view('dashboard/layouts/top_panel', $data);
		$this->load->view('dashboard/administrar/usuarios/edit');
		$this->load->view('dashboard/layouts/footer');
	}



	public function updatePerfilAcceso($id)
    {
		$id_user = $id;

    	$rol      = $this->input->get("rol");
    	$username = $this->input->get("username");

    	$userActual = $this->users_model->getUser($id_user);
		if ($username == $userActual->loginUsers) {
			$unique="";
		}else{
			$unique = "|is_unique[users.loginUsers]";
		}


    	$data = array(
			'rol'      => $rol,
			'username' => $username
		);
		$this->form_validation->set_data($data);
    	$this->form_validation->set_rules('rol', 'tipo de usuario', 'required');
		$this->form_validation->set_rules('username', 'nombre de usuario', 'required'.$unique);

		if ($this->form_validation->run()){
			$datos   = array('loginUsers' => $username,
							 'rol_id'     => $rol);

			if ($this->users_model->update($id_user, $datos)) {
        		$errors = array('success' => true,
	                            'message' => 'Datos Actualizados exitosamente');
           		echo  json_encode($errors);
        	}else{
        		$datos = array('success' => false,
		                       'message' => 'A ocurrudo un error');
			    echo  json_encode($datos);
        	}
		}else{
		    $campos = array('rol'      => form_error("rol", "<span class='help-block'>","</span>"),
		                    'username' => form_error("username", "<span class='help-block'>","</span>"));

		    $campo = 0;
		    $error = 0;
		    foreach ($campos as $key => $value) {
		    	if ($value != "") {
		    		$campo = $key;
		    		$error = $value;
		    		break;
		    	}
		    }
	    	$datos = array('success' => false,
				           'valid'   => true,
				           'campos'  => $campos,
		                   'message' => "");
			echo  json_encode($datos);
		}
    }
}

/* End of file Usuarios.php */
/* Location: ./application/controllers/administrar/Usuarios.php */