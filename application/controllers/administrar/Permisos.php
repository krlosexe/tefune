<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permisos extends CI_Controller {
	private $permisos;
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}else{
			$this->permisos = $this->backend_lib->control();
			$this->load->model('users_model');
		}
	}
	public function index()
	{
		$control = $this->permisos;
		$opciones = array('opciones'   => $control["opciones"]);
		$permisos = array('permisos'   => $control["permisos"]);

		$id_user = $this->session->userdata("id");
		$data = array('user'     => $this->users_model->getUser($id_user),
					  'permisos' => $this->users_model->getPermisos(),
					  'control_permisos' => $permisos);
		$this->load->view('dashboard/layouts/header');
		$this->load->view('dashboard/layouts/sidebar', $opciones);
		$this->load->view('dashboard/layouts/top_panel', $data);
		$this->load->view('dashboard/administrar/permisos/list');
		$this->load->view('dashboard/layouts/footer');
	}

	public function add()
	{

		$control = $this->permisos;
		$opciones = array('opciones'   => $control["opciones"]);


		$id_user = $this->session->userdata("id");
		$data = array('user'  => $this->users_model->getUser($id_user),
					  'roles' => $this->users_model->getRoles(),
					  'menus' => $this->users_model->getMenus()
					  );
		$this->load->view('dashboard/layouts/header');
		$this->load->view('dashboard/layouts/sidebar', $opciones);
		$this->load->view('dashboard/layouts/top_panel', $data);
		$this->load->view('dashboard/administrar/permisos/add');
		$this->load->view('dashboard/layouts/footer');
	}


	public function store()
	{
		$rol     = $this->input->get("rol");
		$menu    = $this->input->get("menus");
		$insert  = $this->input->get("read");
		$read 	 = $this->input->get("insert");
		$update  = $this->input->get("update");
		$delete  = $this->input->get("delete");

		$data = array(
			'rol'     => $rol,
			'menus'   => $menu,
			'insert'  => $insert,
			'read'    => $read,
			'update'  => $update,
			'delete'  => $delete
		);
		$this->form_validation->set_data($data);
    	$this->form_validation->set_rules('rol', 'tipo de usuario', 'required');
		$this->form_validation->set_rules('menus', 'menu', 'required');
		$this->form_validation->set_rules('insert', 'insertar', 'required');
		$this->form_validation->set_rules('read', 'leer', 'required');
		$this->form_validation->set_rules('update', 'actualizar', 'required');
		$this->form_validation->set_rules('delete', 'borrar', 'required');

		
		if ($this->users_model->valid_permiso($rol, $menu)) {
			$errors = array('success' => false,
		                    'message' => 'Ya existe Registro');
	        echo  json_encode($errors);
		}else{
			if ($this->form_validation->run()){
				$data = array('menu_id' => $menu,
				              'rol_id'  => $rol,
				              'read'    => $insert,
				              'insert'  => $read,
				              'update'  => $update,
				              'delete'  => $delete);

				if ($this->users_model->insert_permisos($data)) {
	        		$errors = array('success' => true,
		                            'message' => 'Registro exitoso');
	           		echo  json_encode($errors);
	        	}else{
	        		$datos = array('success' => false,
			                       'message' => 'A ocurrudo un error');
				    echo  json_encode($datos);
	        	}
			}else{
				 $campos = array('rol'    => form_error("rol", "<span class='help-block'>","</span>"),
			                     'menus'   => form_error("menus", "<span class='help-block'>","</span>"),
			                  	 'insert' => form_error("insert", "<span class='help-block'>","</span>"),
			               		 'read'   => form_error("read", "<span class='help-block'>","</span>"),
			            	     'update' => form_error("update", "<span class='help-block'>","</span>"),
			         			 'delete' => form_error("delete", "<span class='help-block'>","</span>"));

				 $datos = array('success' => false,
					            'valid'   => true,
					            'campos'  => $campos);
				 echo  json_encode($datos);
			}
		}

	}


	public function edit($id)
	{

		$control  = $this->permisos;
		$opciones = array('opciones'   => $control["opciones"]);


		$id_user = $this->session->userdata("id");
		$data = array('user'    => $this->users_model->getUser($id_user),
					  'roles'   => $this->users_model->getRoles(),
					  'menus'   => $this->users_model->getMenus(),
					  'permiso' => $this->users_model->getPermiso($id),
					  'id'      => $id
					  );
		$this->load->view('dashboard/layouts/header');
		$this->load->view('dashboard/layouts/sidebar', $opciones);
		$this->load->view('dashboard/layouts/top_panel', $data);
		$this->load->view('dashboard/administrar/permisos/edit');
		$this->load->view('dashboard/layouts/footer');
	}



	public function update($id)
	{
		$insert  = $this->input->get("read");
		$read 	 = $this->input->get("insert");
		$update  = $this->input->get("update");
		$delete  = $this->input->get("delete");

		$data = array(
			'insert'  => $insert,
			'read'    => $read,
			'update'  => $update,
			'delete'  => $delete
		);
		$this->form_validation->set_data($data);
    	
		$this->form_validation->set_rules('insert', 'insertar', 'required');
		$this->form_validation->set_rules('read', 'leer', 'required');
		$this->form_validation->set_rules('update', 'actualizar', 'required');
		$this->form_validation->set_rules('delete', 'borrar', 'required');

		
		
		if ($this->form_validation->run()){
			$data = array('read'    => $insert,
			              'insert'  => $read,
			              'update'  => $update,
			              'delete'  => $delete);

			if ($this->users_model->update_permiso($id, $data)) {
        		$errors = array('success' => true,
	                            'message' => 'Datos actualizados exitosamente');
           		echo  json_encode($errors);
        	}else{
        		$datos = array('success' => false,
		                       'message' => 'A ocurrudo un error');
			    echo  json_encode($datos);
        	}
		}else{
			 $campos = array('insert' => form_error("insert", "<span class='help-block'>","</span>"),
		               		 'read'   => form_error("read", "<span class='help-block'>","</span>"),
		            	     'update' => form_error("update", "<span class='help-block'>","</span>"),
		         			 'delete' => form_error("delete", "<span class='help-block'>","</span>"));

			 $datos = array('success' => false,
				            'valid'   => true,
				            'campos'  => $campos);
			 echo  json_encode($datos);
		}

	}

	public function delete($id)
	{
		if ($this->users_model->delete_permiso($id)) {
			// $this->load->helper('file');
			// delete_files(base_url()."uploads/evidencias/".$documento->documento);
			$errors = array('success' => true,
	                        'message' => 'Permiso Eliminado exitosamente');
           	echo  json_encode($errors);
		}else{
			$errors = array('success' => false,
	                        'message' => 'A ocurrido un error');
           	echo  json_encode($errors);
		}
	}
}

/* End of file Permisos.php */
/* Location: ./application/controllers/administrar/Permisos.php */