<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagos extends CI_Controller {
    private $permisos;
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}else{
			$this->permisos = $this->backend_lib->control();
			$this->load->model('users_model');
			$this->load->model('pagos_model');
		}
	}


	public function index($tipo)
	{
		$control  = $this->permisos;
		$opciones = array('opciones'   => $control["opciones"]);
		$permisos = array('permisos'   => $control["permisos"]);

		$id_user = $this->session->userdata("id");
		$data    = array('user' => $this->users_model->getUser($id_user));


		$denuncias = array('controlador'      => "pagos",
						   'tipo'             => $tipo,
	                       'control_permisos' => $permisos,);

		$this->load->view('dashboard/layouts/header');
		$this->load->view('dashboard/layouts/sidebar', $opciones);
		$this->load->view('dashboard/layouts/top_panel', $data);
		$this->load->view('dashboard/pagos/pagos', $denuncias);
		$this->load->view('dashboard/layouts/footer');
	}


	public function add($tipo, $id)
	{
		$control  = $this->permisos;
		$opciones = array('opciones'   => $control["opciones"]);
		$permisos = array('permisos'   => $control["permisos"]);

		$id_user = $this->session->userdata("id");
		$data    = array('user' => $this->users_model->getUser($id_user));


		$datos     = array('controlador'      => "pagos",
						   'tipo'             => $tipo,
						   'id'               => $id,
	                       'control_permisos' => $permisos,);

		$this->load->view('dashboard/layouts/header');
		$this->load->view('dashboard/layouts/sidebar', $opciones);
		$this->load->view('dashboard/layouts/top_panel', $data);
		$this->load->view('dashboard/pagos/add', $datos);
		$this->load->view('dashboard/layouts/footer');
	}

	public function store()
	{
		$codigo   = $this->input->get("codigo");
		$fecha    = $this->input->get("fecha");
    	$tipo     = $this->input->get("tipo");
    	$id       = $this->input->get("id");


    	$data = array(
    		'codigo'   => $codigo,
			'fecha'    => $fecha,
		);

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules('codigo', 'codigo', 'required');
    	$this->form_validation->set_rules('fecha', 'fecha', 'required');




		if ($this->form_validation->run()){

			$id_user = $this->session->userdata("id");



			$datos   = array('id_tipo_denuncia' => $tipo,
							 'id_denuncia'      => $id,
							 'codigo'           => $codigo,
				             'fecha'            => $fecha,
							 );



			if ($this->pagos_model->save($datos, $tipo,  $id)) {
        		$errors = array('success'     => true,
	                            'message'     => 'Datos registrados exitosamente');
           		echo  json_encode($errors);
        	}else{

        		$datos = array('success' => false,
		                       'message' => 'A ocurrudo un error');
			    echo  json_encode($datos);
        	}
		}else{
		    $campos = array('codigo'  => form_error("codigo", "<span class='help-block'>","</span>"),
		    			    'fecha'    => form_error("fecha", "<span class='help-block'>","</span>")
		                   );


	    	$datos = array('success' => false,

				           'valid'   => true,

				           'campos'  => $campos,);

			echo  json_encode($datos);

		}
	}


	public function view($tipo, $id)
	{
		$control  = $this->permisos;
		$opciones = array('opciones'   => $control["opciones"]);
		$permisos = array('permisos'   => $control["permisos"]);

		$id_user = $this->session->userdata("id");
		$data    = array('user' => $this->users_model->getUser($id_user));


		$datos     = array('controlador'      => "pagos",
			 			   'pago'             => $this->pagos_model->getpago($tipo, $id),
			 			   'tipo'             => $tipo,
						   'id'               => $id,
	                       'control_permisos' => $permisos,);

		$this->load->view('dashboard/layouts/header');
		$this->load->view('dashboard/layouts/sidebar', $opciones);
		$this->load->view('dashboard/layouts/top_panel', $data);
		$this->load->view('dashboard/pagos/view', $datos);
		$this->load->view('dashboard/layouts/footer');
	}

	public function success()
	{
		$tipo     = $this->input->get("tipo");
    	$id       = $this->input->get("id");

    	if ($this->pagos_model->sucsses($tipo, $id)) {
    		$errors = array('success'     => true,
	                        'message'     => 'Operacion Exitosa');
           		echo  json_encode($errors);
    	}else{
    		$datos = array('success' => false,
	                       'message' => 'A ocurrudo un error');
		    echo  json_encode($datos);
    	}
	}

}

/* End of file Pagos.php */
/* Location: ./application/controllers/operaciones/Pagos.php */