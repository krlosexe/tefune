<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Denuncias extends CI_Controller {

    private $permisos;

	public function __construct(){

		parent::__construct();

		if (!$this->session->userdata("login")) {

			redirect(base_url());

		}else{

			$this->permisos = $this->backend_lib->control();

			$this->load->model('users_model');

			$this->load->model('provincias_model');

			$this->load->model('denuncias_model');

			$this->load->model('evidencias_model');

		}

	}



	public function factura()

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);

		$permisos = array('permisos'   => $control["permisos"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user' => $this->users_model->getUser($id_user));





		$denuncias = array('denuncias'        => $this->denuncias_model->getDenuncias("td_facturas"),

	                       'control_permisos' => $permisos);



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/factura/list', $denuncias);

		$this->load->view('dashboard/layouts/footer');

	}









	

	public function factura_add()

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user'        => $this->users_model->getUser($id_user),

						 'controlador' => "factura",

					   	 );



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/factura/add');

		$this->load->view('dashboard/layouts/footer');

	}



	





	public function store_factura()

	{

		$no_factura            = $this->input->get("no_factura");

		$fecha_emision         = $this->input->get("fecha_emision");

    	$monto_impago          = $this->input->get("monto_impago");

    	$rut_empresa           = $this->input->get("rut_empresa");

    	$nombre_empresa        = $this->input->get("nombre_empresa");

    	$rut_representante     = $this->input->get("rut_representante");

    	$nombre_representante  = $this->input->get("nombre_representante");







    	$data = array(

    		'no_factura'           => $no_factura,

			'fecha_emision'        => $fecha_emision,

			'monto_impago'         => $monto_impago,

			'rut_empresa'          => $rut_empresa,

			'nombre_empresa'       => $nombre_empresa,

			'rut_representante'    => $rut_representante,

			'nombre_representante' => $nombre_representante

		);



		$this->form_validation->set_data($data);

		$this->form_validation->set_rules('no_factura', 'Numero de Factura', 'required');

    	$this->form_validation->set_rules('fecha_emision', 'Fecha de emision', 'required');

		$this->form_validation->set_rules('monto_impago', 'Monto impago', 'required');

		$this->form_validation->set_rules('rut_empresa', 'Rut de la empresa<', 'required');

		$this->form_validation->set_rules('nombre_empresa', 'Nombre de la empresa', 'required');

		$this->form_validation->set_rules('rut_representante', 'Rut del representante', 'required');

		$this->form_validation->set_rules('nombre_representante', 'Nombre del representante', 'required');









		if ($this->form_validation->run()){



			$id_user = $this->session->userdata("id");







			$datos   = array('id_users'             => $id_user,

				             'no_factura'           => $no_factura,

				             'fecha_emision'        => $fecha_emision,

							 'monto_impago'         => $monto_impago,

							 'rut_empresa'          => $rut_empresa, 

				             'nombre_empresa'       => $nombre_empresa,

							 'rut_representante'    => $rut_representante,

							 'nombre_representante' => $nombre_representante

							 );







			if ($this->denuncias_model->save_factura($datos)) {

				$id = $this->denuncias_model->lastID();

        		$errors = array('success'     => true,

        						'id_denuncia' => $id,

	                            'message'     => 'Datos registrados exitosamente');

           		echo  json_encode($errors);

        	}else{



        		$datos = array('success' => false,

		                       'message' => 'A ocurrudo un error');

			    echo  json_encode($datos);

        	}

		}else{

		    $campos = array('no_factura'            => form_error("no_factura", "<span class='help-block'>","</span>"),

		    			    'fecha_emision'         => form_error("fecha_emision", "<span class='help-block'>","</span>"),

		                    'monto_impago'          => form_error("monto_impago", "<span class='help-block'>","</span>"),

		                    'rut_empresa'           => form_error("rut_empresa", "<span class='help-block'>","</span>"),

		                    'nombre_empresa'        => form_error("nombre_empresa", "<span class='help-block'>","</span>"),

		                    'rut_representante'     => form_error("rut_representante", "<span class='help-block'>","</span>"),

		                	'nombre_representante'  => form_error("nombre_representante", "<span class='help-block'>","</span>")

		                   );





	    	$datos = array('success' => false,



				           'valid'   => true,



				           'campos'  => $campos,);



			echo  json_encode($datos);



		}

	}







	public function factura_view($id)

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user'           => $this->users_model->getUser($id_user),

			      	     'factura'        => $this->denuncias_model->getfactura($id),

			      	     'controlador'    => "factura",

 					   	 );



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/factura/view');

		$this->load->view('dashboard/layouts/footer');

	}









	public function cheque()

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);

		$permisos = array('permisos'   => $control["permisos"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user' => $this->users_model->getUser($id_user));





		$denuncias = array('denuncias'        => $this->denuncias_model->getDenuncias("td_cheques"),

	                       'control_permisos' => $permisos);



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/cheque/list', $denuncias);

		$this->load->view('dashboard/layouts/footer');

	}





	public function cheque_add()

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user'        => $this->users_model->getUser($id_user),

						 'controlador' => "cheque",

					   	 );



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/cheque/add');

		$this->load->view('dashboard/layouts/footer');

	}





	public function store_cheque()

	{

		$no_cheque      = $this->input->get("no_cheque");

		$fecha_protesto = $this->input->get("fecha_protesto");

    	$rut_girador    = $this->input->get("rut_girador");

    	$nombre         = $this->input->get("nombre");

    	$motivo         = $this->input->get("motivo");

    	$banco          = $this->input->get("banco");







    	$data = array(

    		'no_cheque'      => $no_cheque,

			'fecha_protesto' => $fecha_protesto,

			'rut_girador'    => $rut_girador,

			'nombre'         => $nombre,

			'motivo'         => $motivo,

			'banco'          => $banco

		);



		$this->form_validation->set_data($data);

		$this->form_validation->set_rules('no_cheque', 'Numero de cheque', 'required');

    	$this->form_validation->set_rules('fecha_protesto', 'Fecha de protesto', 'required');

		$this->form_validation->set_rules('rut_girador', 'rut girador', 'required');

		$this->form_validation->set_rules('nombre', 'nombre', 'required');

		$this->form_validation->set_rules('motivo', 'motivo', 'required');

		$this->form_validation->set_rules('banco', 'banco', 'required');

		









		if ($this->form_validation->run()){



			$id_user = $this->session->userdata("id");







			$datos   = array('id_users'       => $id_user,

				             'no_cheque'      => $no_cheque,

				             'fecha_protesto' => $fecha_protesto,

							 'rut_girador'    => $rut_girador,

							 'nombre'         => $nombre, 

				             'motivo'         => $motivo,

							 'banco'          => $banco

							 );







			if ($this->denuncias_model->save_cheque($datos)) {

				$id = $this->denuncias_model->lastID();

        		$errors = array('success'     => true,

        						'id_denuncia' => $id,

	                            'message'     => 'Datos registrados exitosamente');

           		echo  json_encode($errors);

        	}else{



        		$datos = array('success' => false,

		                       'message' => 'A ocurrudo un error');

			    echo  json_encode($datos);

        	}

		}else{

		    $campos = array('no_cheque'      => form_error("no_cheque", "<span class='help-block'>","</span>"),

		    			    'fecha_protesto' => form_error("fecha_protesto", "<span class='help-block'>","</span>"),

		                    'rut_girador'    => form_error("rut_girador", "<span class='help-block'>","</span>"),

		                    'nombre'         => form_error("nombre", "<span class='help-block'>","</span>"),

		                    'motivo'         => form_error("motivo", "<span class='help-block'>","</span>"),

		                    'banco'          => form_error("banco", "<span class='help-block'>","</span>")

		                   );





	    	$datos = array('success' => false,



				           'valid'   => true,



				           'campos'  => $campos,);



			echo  json_encode($datos);



		}

	}





	public function cheque_view($id)

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user'           => $this->users_model->getUser($id_user),

			      	     'cheque'         => $this->denuncias_model->getcheque($id),

			      	     'controlador'    => "cheque",

 					   	 );



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/cheque/view');

		$this->load->view('dashboard/layouts/footer');

	}







	public function letra()

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);

		$permisos = array('permisos'   => $control["permisos"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user' => $this->users_model->getUser($id_user));





		$denuncias = array('denuncias'        => $this->denuncias_model->getDenuncias("td_letras"),

			               'tipo_deudas'      => $this->denuncias_model->getipodeudas(),

	                       'control_permisos' => $permisos);



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/letra/list', $denuncias);

		$this->load->view('dashboard/layouts/footer');

	}







	public function letra_add()

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user'        => $this->users_model->getUser($id_user),

						 'controlador' => "letra"

					   	 );



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/letra/add');

		$this->load->view('dashboard/layouts/footer');

	}





	public function store_letra()

	{

		$no_letra          = $this->input->get("no_letra");

		$fecha_vencimiento = $this->input->get("fecha_vencimiento");

    	$rut_deudor        = $this->input->get("rut_deudor");

    	$nombre_deudor     = $this->input->get("nombre_deudor");

    	$monto             = $this->input->get("monto");

    	$notaria           = $this->input->get("notaria");

    	$tipo_deuda        = $this->input->get("tipo_deuda");







    	$data = array(

    		'no_letra'          => $no_letra,

			'fecha_vencimiento' => $fecha_vencimiento,

			'rut_deudor'        => $rut_deudor,

			'nombre_deudor'     => $nombre_deudor,

			'monto'             => $monto,

			'notaria'           => $notaria,

			'tipo_deuda'        => $tipo_deuda

		);



		$this->form_validation->set_data($data);

		$this->form_validation->set_rules('no_letra', 'Numero de letra', 'required');

    	$this->form_validation->set_rules('fecha_vencimiento', 'Fecha de vencimiento', 'required');

		$this->form_validation->set_rules('rut_deudor', 'rut deudor', 'required');

		$this->form_validation->set_rules('nombre_deudor', 'nombre deudor', 'required');

		$this->form_validation->set_rules('monto', 'monto', 'required');

		$this->form_validation->set_rules('notaria', 'notaria', 'required');

		$this->form_validation->set_rules('tipo_deuda', 'tipo de deuda', 'required');

		









		if ($this->form_validation->run()){



			$id_user = $this->session->userdata("id");







			$datos   = array('id_users'          => $id_user,

				             'no_letra'          => $no_letra,

				             'fecha_vencimiento' => $fecha_vencimiento,

							 'rut_deudor'        => $rut_deudor,

							 'nombre_deudor'     => $nombre_deudor, 

				             'monto'             => $monto,

							 'notaria'           => $notaria,

							 'tipo_deuda'        => $tipo_deuda



							 );







			if ($this->denuncias_model->save_letra($datos)) {

				$id = $this->denuncias_model->lastID();

        		$errors = array('success'     => true,

        						'id_denuncia' => $id,

	                            'message'     => 'Datos registrados exitosamente');

           		echo  json_encode($errors);

        	}else{



        		$datos = array('success' => false,

		                       'message' => 'A ocurrudo un error');

			    echo  json_encode($datos);

        	}

		}else{

		    $campos = array('no_letra'          => form_error("no_letra", "<span class='help-block'>","</span>"),

		    			    'fecha_vencimiento' => form_error("fecha_vencimiento", "<span class='help-block'>","</span>"),

		                    'rut_deudor'        => form_error("rut_deudor", "<span class='help-block'>","</span>"),

		                    'nombre_deudor'     => form_error("nombre_deudor", "<span class='help-block'>","</span>"),

		                    'monto'             => form_error("monto", "<span class='help-block'>","</span>"),

		                    'notaria'           => form_error("notaria", "<span class='help-block'>","</span>"),

		                    'tipo_deuda'        => form_error("tipo_deuda", "<span class='help-block'>","</span>")

		                   );





	    	$datos = array('success' => false,



				           'valid'   => true,



				           'campos'  => $campos,);



			echo  json_encode($datos);



		}

	}







	public function letra_view($id)

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user'           => $this->users_model->getUser($id_user),

			      	     'letra'          => $this->denuncias_model->getletra($id),

			      	     'controlador'    => "letra",

 					   	 );



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/letra/view');

		$this->load->view('dashboard/layouts/footer');

	}





	public function arriendos_habitacionales()

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);

		$permisos = array('permisos'   => $control["permisos"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user' => $this->users_model->getUser($id_user));





		$denuncias = array('denuncias'        => $this->denuncias_model->getDenuncias("td_arriendo_habitacional"),

			               'tipo_habitacional' => $this->denuncias_model->getipohabitacional(),

			 			   'tipo_contrato'     => $this->denuncias_model->getipocontrato(),

	                       'control_permisos'  => $permisos);



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/arriendo_habitacional/list', $denuncias);

		$this->load->view('dashboard/layouts/footer');

	}



	public function arriendo_habitacional_add()

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user'              => $this->users_model->getUser($id_user),

			 			 'tipo_habitacional' => $this->denuncias_model->getipohabitacional(),

			 			 'tipo_contrato'     => $this->denuncias_model->getipocontrato(),

						 'controlador'       => "arriendos_habitacionales"

					   	 );



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/arriendo_habitacional/add');

		$this->load->view('dashboard/layouts/footer');

	}



	public function store_arriendo_habitacional()

	{

		$id_tipo_habitacional = $this->input->get("id_tipo_habitacional");

		$monto_deuda          = $this->input->get("monto_deuda");

		$id_tipo_contrato     = $this->input->get("id_tipo_contrato");

    	$rut_deudor           = $this->input->get("rut_deudor");

    	$nombre_deudor        = $this->input->get("nombre_deudor");

    	$direccion_arriendo   = $this->input->get("direccion_arriendo");







    	$data = array(

    		'id_tipo_habitacional' => $id_tipo_habitacional,

    		'monto_deuda'          => $monto_deuda,

			'id_tipo_contrato'     => $id_tipo_contrato,

			'rut_deudor'           => $rut_deudor,

			'nombre_deudor'        => $nombre_deudor,

			'direccion_arriendo'   => $direccion_arriendo

		);



		$this->form_validation->set_data($data);

		$this->form_validation->set_rules('id_tipo_habitacional', 'Tipo habitacional', 'required');

		$this->form_validation->set_rules('monto_deuda', 'Monto deuda', 'required');

    	$this->form_validation->set_rules('id_tipo_contrato', 'tipo de contacto', 'required');

		$this->form_validation->set_rules('rut_deudor', 'rut deudor', 'required');

		$this->form_validation->set_rules('nombre_deudor', 'nombre deudor', 'required');

		$this->form_validation->set_rules('direccion_arriendo', 'direccion arriendo', 'required');

		









		if ($this->form_validation->run()){



			$id_user = $this->session->userdata("id");







			$datos   = array('id_users'             => $id_user,

				             'id_tipo_habitacional' => $id_tipo_habitacional,

				             'monto_deuda'          => $monto_deuda,

				             'id_tipo_contrato'     => $id_tipo_contrato,

							 'rut_deudor'           => $rut_deudor,

							 'nombre_deudor'        => $nombre_deudor, 

				             'direccion_arriendo'   => $direccion_arriendo



							 );







			if ($this->denuncias_model->save_arriendo_habitacional($datos)) {

				$id = $this->denuncias_model->lastID();

        		$errors = array('success'     => true,

        						'id_denuncia' => $id,

	                            'message'     => 'Datos registrados exitosamente');

           		echo  json_encode($errors);

        	}else{



        		$datos = array('success' => false,

		                       'message' => 'A ocurrudo un error');

			    echo  json_encode($datos);

        	}

		}else{

		    $campos = array('id_tipo_habitacional'    => form_error("id_tipo_habitacional", "<span class='help-block'>","</span>"),

		    		        'monto_deuda'             => form_error("monto_deuda", "<span class='help-block'>","</span>"),

		    			    'id_tipo_contrato'        => form_error("id_tipo_contrato", "<span class='help-block'>","</span>"),

		                    'rut_deudor'               => form_error("rut_deudor", "<span class='help-block'>","</span>"),

		                    'nombre_deudor'            => form_error("nombre_deudor", "<span class='help-block'>","</span>"),

		                    'direccion_arriendo'       => form_error("direccion_arriendo", "<span class='help-block'>","</span>")

		                   );





	    	$datos = array('success' => false,



				           'valid'   => true,



				           'campos'  => $campos,);



			echo  json_encode($datos);



		}

	}



	public function arriendo_habitacional_view($id)

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user'                  => $this->users_model->getUser($id_user),

			      	     'arriendo_habitacional' => $this->denuncias_model->getarriendohabitacional($id),

			      	     'tipo_habitacional'     => $this->denuncias_model->getipohabitacional(),

			 			 'tipo_contrato'         => $this->denuncias_model->getipocontrato(),

			      	     'controlador'           => "arriendos_habitacionales",

 					   	 );



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/arriendo_habitacional/view');

		$this->load->view('dashboard/layouts/footer');

	}







	public function arriendo_comercial()

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);

		$permisos = array('permisos'   => $control["permisos"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user' => $this->users_model->getUser($id_user));





		$denuncias = array('denuncias'        => $this->denuncias_model->getDenuncias("td_arriendo_comercial"),

			               'tipo_comercial'    => $this->denuncias_model->getipocomercial(),

			 			   'tipo_contrato'     => $this->denuncias_model->getipocontrato(),

	                       'control_permisos'  => $permisos);



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/arriendo_comercial/list', $denuncias);

		$this->load->view('dashboard/layouts/footer');

	}





	public function arriendo_comercial_add()

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user'              => $this->users_model->getUser($id_user),

			 			 'tipo_comercial'    => $this->denuncias_model->getipocomercial(),

			 			 'tipo_contrato'     => $this->denuncias_model->getipocontrato(),

						 'controlador'       => "arriendo_comercial"

					   	 );



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/arriendo_comercial/add');

		$this->load->view('dashboard/layouts/footer');

	}





	public function store_arriendo_comercial()

	{

		$id_tipo_comercial    = $this->input->get("id_tipo_comercial");

		$monto_deuda          = $this->input->get("monto_deuda");

		$id_tipo_contrato     = $this->input->get("id_tipo_contrato");

    	$rut_deudor           = $this->input->get("rut_deudor");

    	$nombre_deudor        = $this->input->get("nombre_deudor");

    	$direccion_arriendo   = $this->input->get("direccion_arriendo");







    	$data = array(

    		'id_tipo_comercial'    => $id_tipo_comercial,

    		'monto_deuda'          => $monto_deuda,

			'id_tipo_contrato'     => $id_tipo_contrato,

			'rut_deudor'           => $rut_deudor,

			'nombre_deudor'        => $nombre_deudor,

			'direccion_arriendo'   => $direccion_arriendo

		);



		$this->form_validation->set_data($data);

		$this->form_validation->set_rules('id_tipo_comercial', 'Tipo comercial', 'required');

		$this->form_validation->set_rules('monto_deuda', 'Monto deuda', 'required');

    	$this->form_validation->set_rules('id_tipo_contrato', 'tipo de contacto', 'required');

		$this->form_validation->set_rules('rut_deudor', 'rut deudor', 'required');

		$this->form_validation->set_rules('nombre_deudor', 'nombre deudor', 'required');

		$this->form_validation->set_rules('direccion_arriendo', 'direccion arriendo', 'required');

		









		if ($this->form_validation->run()){



			$id_user = $this->session->userdata("id");







			$datos   = array('id_users'             => $id_user,

				             'id_tipo_comercial'    => $id_tipo_comercial,

				             'monto_deuda'          => $monto_deuda,

				             'id_tipo_contrato'     => $id_tipo_contrato,

							 'rut_deudor'           => $rut_deudor,

							 'nombre_deudor'        => $nombre_deudor, 

				             'direccion_arriendo'   => $direccion_arriendo



							 );







			if ($this->denuncias_model->save_arriendo_comercial($datos)) {

				$id = $this->denuncias_model->lastID();

        		$errors = array('success'     => true,

        						'id_denuncia' => $id,

	                            'message'     => 'Datos registrados exitosamente');

           		echo  json_encode($errors);

        	}else{



        		$datos = array('success' => false,

		                       'message' => 'A ocurrudo un error');

			    echo  json_encode($datos);

        	}

		}else{

		    $campos = array('id_tipo_comercial'    => form_error("id_tipo_comercial", "<span class='help-block'>","</span>"),

		    		        'monto_deuda'             => form_error("monto_deuda", "<span class='help-block'>","</span>"),

		    			    'id_tipo_contrato'        => form_error("id_tipo_contrato", "<span class='help-block'>","</span>"),

		                    'rut_deudor'               => form_error("rut_deudor", "<span class='help-block'>","</span>"),

		                    'nombre_deudor'            => form_error("nombre_deudor", "<span class='help-block'>","</span>"),

		                    'direccion_arriendo'       => form_error("direccion_arriendo", "<span class='help-block'>","</span>")

		                   );





	    	$datos = array('success' => false,



				           'valid'   => true,



				           'campos'  => $campos,);



			echo  json_encode($datos);



		}

	}



	public function arriendo_comercial_view($id)

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user'                  => $this->users_model->getUser($id_user),

			      	     'arriendo_comercial'    => $this->denuncias_model->getarriendocomercial($id),

			      	     'tipo_comercial'     => $this->denuncias_model->getipocomercial(),

			 			 'tipo_contrato'         => $this->denuncias_model->getipocontrato(),

			      	     'controlador'           => "arriendo_comercial",

 					   	 );



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/arriendo_comercial/view');

		$this->load->view('dashboard/layouts/footer');

	}













	public function arriendo_vehiculo()

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);

		$permisos = array('permisos'   => $control["permisos"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user' => $this->users_model->getUser($id_user));





		$denuncias = array('denuncias'       => $this->denuncias_model->getDenuncias("td_arriendo_vehiculos"),

			              'tipo_vehiculo'    => $this->denuncias_model->getipovehiculo(),

			 			  'tipo_motivo'      => $this->denuncias_model->getipotipomotivo(),

	                      'control_permisos' => $permisos);



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/arriendo_vehiculo/list', $denuncias);

		$this->load->view('dashboard/layouts/footer');

	}







	public function arriendo_vehiculo_add()

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user'              => $this->users_model->getUser($id_user),

			 			 'tipo_vehiculo'     => $this->denuncias_model->getipovehiculo(),

			 			 'tipo_motivo'       => $this->denuncias_model->getipotipomotivo(),

						 'controlador'       => "arriendo_vehiculo"

					   	 );



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/arriendo_vehiculo/add');

		$this->load->view('dashboard/layouts/footer');

	}





	



	public function store_arriendo_vehiculo()

	{

		$id_tipo_vehiculo  = $this->input->get("id_tipo_vehiculo");

		$id_motivo         = $this->input->get("id_motivo");

		$marca             = $this->input->get("marca");

    	$ano               = $this->input->get("ano");

    	$caracteristicas   = $this->input->get("caracteristicas");

    	$monto_deuda       = $this->input->get("monto_deuda");

    	$patente           = $this->input->get("patente");







    	$data = array(

    		'id_tipo_vehiculo' => $id_tipo_vehiculo,

    		'id_motivo'        => $id_motivo,

			'marca'            => $marca,

			'ano'              => $ano,

			'caracteristicas'  => $caracteristicas,

			'monto_deuda'      => $monto_deuda,

			'patente'          => $patente

		);



		$this->form_validation->set_data($data);

		$this->form_validation->set_rules('id_tipo_vehiculo', 'Tipo vehiculo', 'required');

		$this->form_validation->set_rules('id_motivo', 'Tipo motivo', 'required');

    	$this->form_validation->set_rules('marca', 'marca', 'required');

		$this->form_validation->set_rules('ano', 'ano', 'required');

		$this->form_validation->set_rules('caracteristicas', 'caracteristicas', 'required');

		$this->form_validation->set_rules('monto_deuda', 'monto deuda', 'required');

		$this->form_validation->set_rules('patente', 'patente', 'required');

		









		if ($this->form_validation->run()){



			$id_user = $this->session->userdata("id");



			$datos   = array('id_users'           => $id_user,

				             'id_tipo_vehiculo'   => $id_tipo_vehiculo,

				             'id_motivo'          => $id_motivo,

				             'marca'              => $marca,

							 'ano'                => $ano,

							 'caracteristicas'    => $caracteristicas, 

				             'monto_deuda'        => $monto_deuda,

				             'patente'            => $patente

						);







			if ($this->denuncias_model->save_arriendo_vehiculo($datos)) {

				$id = $this->denuncias_model->lastID();

        		$errors = array('success'     => true,

        						'id_denuncia' => $id,

	                            'message'     => 'Datos registrados exitosamente');

           		echo  json_encode($errors);

        	}else{



        		$datos = array('success' => false,

		                       'message' => 'A ocurrudo un error');

			    echo  json_encode($datos);

        	}

		}else{

		    $campos = array('id_tipo_vehiculo'      => form_error("id_tipo_vehiculo", "<span class='help-block'>","</span>"),

		    		        'id_motivo'             => form_error("id_motivo", "<span class='help-block'>","</span>"),

		    			    'marca'                 => form_error("marca", "<span class='help-block'>","</span>"),

		                    'ano'                   => form_error("ano", "<span class='help-block'>","</span>"),

		                    'caracteristicas'       => form_error("caracteristicas", "<span class='help-block'>","</span>"),

		                    'monto_deuda'           => form_error("monto_deuda", "<span class='help-block'>","</span>"),

		                    'patente'               => form_error("patente", "<span class='help-block'>","</span>")

		                   );





	    	$datos = array('success' => false,



				           'valid'   => true,



				           'campos'  => $campos,);



			echo  json_encode($datos);



		}

	}







	public function arriendo_vehiculo_view($id)

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user'              => $this->users_model->getUser($id_user),

			      	     'arriendo_vehiculo' => $this->denuncias_model->getarriendovehiculo($id),

			      	     'tipo_vehiculo'     => $this->denuncias_model->getipovehiculo(),

			 			 'tipo_motivo'       => $this->denuncias_model->getipotipomotivo(),

			      	     'controlador'       => "arriendo_vehiculo",

 					   	 );



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/arriendo_vehiculo/view');

		$this->load->view('dashboard/layouts/footer');

	}











	public function arriendo_equipos()

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);

		$permisos = array('permisos'   => $control["permisos"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user' => $this->users_model->getUser($id_user));





		$denuncias = array('denuncias'       => $this->denuncias_model->getDenuncias("td_arriendo_equipos"),

			              'tipo_vehiculo'    => $this->denuncias_model->getipovehiculo(),

			 			  'tipo_motivo'      => $this->denuncias_model->getipotipomotivo(),

	                      'control_permisos' => $permisos);



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/arriendo_equipos/list', $denuncias);

		$this->load->view('dashboard/layouts/footer');

	}





	public function arriendo_equipos_add()

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user'              => $this->users_model->getUser($id_user),

			 			 'tipo_vehiculo'     => $this->denuncias_model->getipovehiculo(),

			 			 'tipo_motivo'       => $this->denuncias_model->getipotipomotivo(),

						 'controlador'       => "arriendo_equipos"

					   	 );



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/arriendo_equipos/add');

		$this->load->view('dashboard/layouts/footer');

	}







	public function store_arriendo_equipos()

	{

		$marca             = $this->input->get("marca");

    	$ano               = $this->input->get("ano");

    	$caracteristicas   = $this->input->get("caracteristicas");

    	$monto_deuda       = $this->input->get("monto_deuda");







    	$data = array(

			'marca'            => $marca,

			'ano'              => $ano,

			'caracteristicas'  => $caracteristicas,

			'monto_deuda'      => $monto_deuda

		);



		$this->form_validation->set_data($data);

    	$this->form_validation->set_rules('marca', 'marca', 'required');

		$this->form_validation->set_rules('ano', 'ano', 'required');

		$this->form_validation->set_rules('caracteristicas', 'caracteristicas', 'required');

		$this->form_validation->set_rules('monto_deuda', 'monto deuda', 'required');





		if ($this->form_validation->run()){



			$id_user = $this->session->userdata("id");



			$datos   = array('id_users'           => $id_user,

				             'marca'              => $marca,

							 'ano'                => $ano,

							 'caracteristicas'    => $caracteristicas, 

				             'monto_deuda'        => $monto_deuda

						);







			if ($this->denuncias_model->save_arriendo_equipos($datos)) {

				$id = $this->denuncias_model->lastID();

        		$errors = array('success'     => true,

        						'id_denuncia' => $id,

	                            'message'     => 'Datos registrados exitosamente');

           		echo  json_encode($errors);

        	}else{



        		$datos = array('success' => false,

		                       'message' => 'A ocurrudo un error');

			    echo  json_encode($datos);

        	}

		}else{ 

		    $campos = array('marca'           => form_error("marca", "<span class='help-block'>","</span>"),

		                    'ano'             => form_error("ano", "<span class='help-block'>","</span>"),

		                    'caracteristicas' => form_error("caracteristicas", "<span class='help-block'>","</span>"),

		                    'monto_deuda'     => form_error("monto_deuda", "<span class='help-block'>","</span>")

		                   );

	    	$datos = array('success' => false,

				           'valid'   => true,

				           'campos'  => $campos,);

			echo  json_encode($datos);

		}

	}







	public function arriendo_equipos_view($id)

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user'              => $this->users_model->getUser($id_user),

			      	     'arriendo_equipos'  => $this->denuncias_model->getarriendoequipo($id),

			      	     'tipo_vehiculo'     => $this->denuncias_model->getipovehiculo(),

			 			 'tipo_motivo'       => $this->denuncias_model->getipotipomotivo(),

			      	     'controlador'       => "arriendo_equipos",

 					   	 );



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/arriendo_equipos/view');

		$this->load->view('dashboard/layouts/footer');

	}









	public function creditos_automotrices()

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);

		$permisos = array('permisos'   => $control["permisos"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user' => $this->users_model->getUser($id_user));





		$denuncias = array('denuncias'       => $this->denuncias_model->getDenuncias("td_creditos_automotrices"),			

						  'tipo_deudas'      => $this->denuncias_model->getipodeudas(),

			              'tipo_vehiculo'    => $this->denuncias_model->getipovehiculo(),

			 			  'tipo_motivo'      => $this->denuncias_model->getipotipomotivo(),

	                      'control_permisos' => $permisos);



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/creditos_automotrices/list', $denuncias);

		$this->load->view('dashboard/layouts/footer');

	}





	public function creditos_automotrices_add()

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user'              => $this->users_model->getUser($id_user),

						 'tipo_deudas'       => $this->denuncias_model->getipodeudas(),

			 			 'tipo_vehiculo'     => $this->denuncias_model->getipovehiculo(),

			 			 'tipo_motivo'       => $this->denuncias_model->getipotipomotivo(),

						 'controlador'       => "creditos_automotrices"

					   	 );



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/creditos_automotrices/add');

		$this->load->view('dashboard/layouts/footer');

	}


	public function store_creditos_automotrices()

	{

		$id_tipo_dedua     = $this->input->get("id_tipo_dedua");
    	$id_tipo_vehiculo  = $this->input->get("id_tipo_vehiculo");
		$marca             = $this->input->get("marca");
    	$ano               = $this->input->get("ano");
    	$patente           = $this->input->get("patente");
    	$caracteristicas   = $this->input->get("caracteristicas");
    	$monto_deuda       = $this->input->get("monto_deuda");
    	$rut_deudor        = $this->input->get("rut_deudor");
    	$nombre_deudor     = $this->input->get("nombre_deudor");












    	$data = array(
    		'id_tipo_dedua'    => $id_tipo_dedua,
    		'id_tipo_vehiculo' => $id_tipo_vehiculo,
			'marca'            => $marca,
			'ano'              => $ano,
			'patente'          => $patente,
			'caracteristicas'  => $caracteristicas,
			'monto_deuda'      => $monto_deuda,
			'rut_deudor'       => $rut_deudor,
			'nombre_deudor'    => $nombre_deudor,

		);



		$this->form_validation->set_data($data);

    	$this->form_validation->set_rules('id_tipo_dedua', 'id_tipo_dedua', 'required');
    	$this->form_validation->set_rules('id_tipo_vehiculo', 'Tipo vehiculo', 'required');
    	$this->form_validation->set_rules('marca', 'marca', 'required');
		$this->form_validation->set_rules('ano', 'ano', 'required');
		$this->form_validation->set_rules('patente', 'patente', 'required');
		$this->form_validation->set_rules('caracteristicas', 'caracteristicas', 'required');
		$this->form_validation->set_rules('monto_deuda', 'monto deuda', 'required');
		$this->form_validation->set_rules('rut_deudor', 'rut deudor', 'required');
		$this->form_validation->set_rules('nombre_deudor', 'nombre deudor', 'required');





		if ($this->form_validation->run()){

			$id_user = $this->session->userdata("id");



			$datos   = array('id_users'           => $id_user,
							 'id_tipo_deuda'      => $id_tipo_dedua,
							 'id_tipo_vehiculos'  => $id_tipo_vehiculo,
				             'marca'              => $marca,
							 'ano'                => $ano,
							 'patente'            => $patente,
							 'caracteristicas'    => $caracteristicas, 
				             'monto_deuda'        => $monto_deuda,
							 'rut_deudor'         => $rut_deudor,
							 'nombre_deudor'      => $nombre_deudor,

						);







			if ($this->denuncias_model->save_creditos_automotrices($datos)) {

				$id = $this->denuncias_model->lastID();

        		$errors = array('success'     => true,

        						'id_denuncia' => $id,

	                            'message'     => 'Datos registrados exitosamente');

           		echo  json_encode($errors);

        	}else{



        		$datos = array('success' => false,

		                       'message' => 'A ocurrudo un error');

			    echo  json_encode($datos);

        	}

		}else{ 

		    $campos = array('id_tipo_dedua'         => form_error("id_tipo_dedua", "<span class='help-block'>","</span>"),
		    				'id_tipo_vehiculo'      => form_error("id_tipo_vehiculo", "<span class='help-block'>","</span>"),
		    				'marca'                 => form_error("marca", "<span class='help-block'>","</span>"),

		                    'ano'                   => form_error("ano", "<span class='help-block'>","</span>"),
		                    'patente'               => form_error("patente", "<span class='help-block'>","</span>"),
		                    'caracteristicas'       => form_error("caracteristicas", "<span class='help-block'>","</span>"),

		                    'monto_deuda'           => form_error("monto_deuda", "<span class='help-block'>","</span>"),

							'rut_deudor'            => form_error("rut_deudor", "<span class='help-block'>","</span>"),

		                    'nombre_deudor'         => form_error("nombre_deudor", "<span class='help-block'>","</span>"),

		                   );

	    	$datos = array('success' => false,

				           'valid'   => true,

				           'campos'  => $campos,);

			echo  json_encode($datos);

		}

	}



	public function creditos_automotrices_view($id)

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user'                   => $this->users_model->getUser($id_user),
						 'tipo_deudas'            => $this->denuncias_model->getipodeudas(),
			 			 'tipo_vehiculo'          => $this->denuncias_model->getipovehiculo(),
			 			 'tipo_motivo'            => $this->denuncias_model->getipotipomotivo(),
			 			 'creditos_automotrices'  => $this->denuncias_model->getcreditos_automotrices($id),
						 'controlador'            => "creditos_automotrices"

					   	 );



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/creditos_automotrices/view');

		$this->load->view('dashboard/layouts/footer');

	}




	public function creditos_laborales()

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);

		$permisos = array('permisos'   => $control["permisos"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user' => $this->users_model->getUser($id_user));





		$denuncias = array('denuncias'       => $this->denuncias_model->getDenuncias("td_incumplimiento_laborales"),			

						  'tipo_deudas'      => $this->denuncias_model->getipodeudas(),

			              'tipo_vehiculo'    => $this->denuncias_model->getipovehiculo(),

			 			  'tipo_motivo'      => $this->denuncias_model->getipotipomotivo(),

	                      'control_permisos' => $permisos);



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/creditos_laborales/list', $denuncias);

		$this->load->view('dashboard/layouts/footer');

	}


	public function creditos_laborales_add()

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user'              => $this->users_model->getUser($id_user),
						 'tipo_laborales'    => $this->denuncias_model->getipolaborales(),
						 'tipo_deudor'       => $this->denuncias_model->getipodeudor(),
						 'controlador'       => "creditos_laborales"

					   	 );



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/creditos_laborales/add');

		$this->load->view('dashboard/layouts/footer');

	}




	public function store_creditos_laborales()

	{

		$id_tipo_laborales     = $this->input->get("id_tipo_laborales");
    	$id_tipo_deudor        = $this->input->get("id_tipo_deudor");
		$rut_deudor            = $this->input->get("rut_deudor");
    	$nombre_deudor         = $this->input->get("nombre_deudor");
    	$rut_empresa           = $this->input->get("rut_empresa");
    	$nombre_empresa        = $this->input->get("nombre_empresa");
    	$rut_representante     = $this->input->get("rut_representante");
    	$nombre_representante  = $this->input->get("nombre_representante");


    	$data = array(
    		'id_tipo_laborales'    => $id_tipo_laborales,
    		'id_tipo_deudor'       => $id_tipo_deudor,
			'rut_deudor'           => $rut_deudor,
			'nombre_deudor'        => $nombre_deudor,
			'rut_empresa'          => $rut_empresa,
			'nombre_empresa'       => $nombre_empresa,
			'rut_representante'    => $rut_representante,
			'nombre_representante' => $nombre_representante

		);



		$this->form_validation->set_data($data);

    	$this->form_validation->set_rules('id_tipo_laborales', 'tipo  laborales', 'required');
    	$this->form_validation->set_rules('id_tipo_deudor', 'tipo  deudor', 'required');
    	$this->form_validation->set_rules('rut_deudor', 'rut deudor', 'required');
		$this->form_validation->set_rules('nombre_deudor', 'nombre deudor', 'required');
		$this->form_validation->set_rules('rut_empresa', 'rut empresa', 'required');
		$this->form_validation->set_rules('nombre_empresa', 'nombre empresa', 'required');
		$this->form_validation->set_rules('rut_representante', 'rut representante', 'required');
		$this->form_validation->set_rules('nombre_representante', 'nombre representante', 'required');



		if ($this->form_validation->run()){

			$id_user = $this->session->userdata("id");



			$datos   = array('id_users'             => $id_user,
							 'id_tipo_laborales'    => $id_tipo_laborales,
							 'id_tipo_deudor'       => $id_tipo_deudor,
				             'rut_deudor'           => $rut_deudor,
							 'nombre_deudor'        => $nombre_deudor,
							 'rut_empresa'          => $rut_empresa,
							 'nombre_empresa'       => $nombre_empresa, 
				             'rut_representante'    => $rut_representante,
							 'nombre_representante' => $nombre_representante

						);

			if ($this->denuncias_model->save_creditos_laborales($datos)) {

				$id = $this->denuncias_model->lastID();

        		$errors = array('success'     => true,

        						'id_denuncia' => $id,

	                            'message'     => 'Datos registrados exitosamente');

           		echo  json_encode($errors);

        	}else{



        		$datos = array('success' => false,

		                       'message' => 'A ocurrudo un error');

			    echo  json_encode($datos);

        	}

		}else{ 

		    $campos = array('id_tipo_laborales'         => form_error("id_tipo_laborales", "<span class='help-block'>","</span>"),
		    				'id_tipo_deudor'             => form_error("id_tipo_deudor", "<span class='help-block'>","</span>"),
		    				'rut_deudor'                 => form_error("rut_deudor", "<span class='help-block'>","</span>"),

		                    'nombre_deudor'              => form_error("nombre_deudor", "<span class='help-block'>","</span>"),
		                    'rut_empresa'                => form_error("rut_empresa", "<span class='help-block'>","</span>"),
		                    'nombre_empresa'             => form_error("nombre_empresa", "<span class='help-block'>","</span>"),

		                    'rut_representante'           => form_error("rut_representante", "<span class='help-block'>","</span>"),

							'nombre_representante'        => form_error("nombre_representante", "<span class='help-block'>","</span>"),

		                   );

	    	$datos = array('success' => false,

				           'valid'   => true,

				           'campos'  => $campos,);

			echo  json_encode($datos);

		}

	}


	public function creditos_laborales_view($id)

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user'               => $this->users_model->getUser($id_user),
						 'tipo_laborales'     => $this->denuncias_model->getipolaborales(),
						 'tipo_deudor'        => $this->denuncias_model->getipodeudor(),
			 			 'creditos_laborales' => $this->denuncias_model->getcreditoslaborales($id),
						 'controlador'        => "creditos_laborales"

					   	 );



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/creditos_laborales/view');

		$this->load->view('dashboard/layouts/footer');

	}



	public function incumplimiento_comerciales()
	{
		$control  = $this->permisos;
		$opciones = array('opciones'   => $control["opciones"]);
		$permisos = array('permisos'   => $control["permisos"]);

		$id_user = $this->session->userdata("id");
		$data    = array('user' => $this->users_model->getUser($id_user));





		$denuncias = array('denuncias'       => $this->denuncias_model->getDenuncias("td_incumplimiento_comerciales"),			

						  'tipo_deudas'      => $this->denuncias_model->getipodeudas(),

			              'tipo_vehiculo'    => $this->denuncias_model->getipovehiculo(),

			 			  'tipo_motivo'      => $this->denuncias_model->getipotipomotivo(),

	                      'control_permisos' => $permisos);



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/incumplimiento_comerciales/list', $denuncias);

		$this->load->view('dashboard/layouts/footer');

	}


	public function incumplimiento_comerciales_add()

	{
		$control  = $this->permisos;
		$opciones = array('opciones'   => $control["opciones"]);

		$id_user = $this->session->userdata("id");
		$data    = array('user'                => $this->users_model->getUser($id_user),
						 'tipo_incumplimiento' => $this->denuncias_model->getipoincumplimiento(),
						 'tipo_deudor'         => $this->denuncias_model->getipodeudor(),
						 'controlador'         => "incumplimiento_comerciales"

					   	 );

		$this->load->view('dashboard/layouts/header');
		$this->load->view('dashboard/layouts/sidebar', $opciones);
		$this->load->view('dashboard/layouts/top_panel', $data);
		$this->load->view('dashboard/denuncias/incumplimiento_comerciales/add');
		$this->load->view('dashboard/layouts/footer');
	}



	public function store_incumplimiento_comerciales()
	{
		$id_tipo_incumplimiento  = $this->input->get("id_tipo_incumplimiento");
    	$id_tipo_deudor          = $this->input->get("id_tipo_deudor");
		$motivo_deuda            = $this->input->get("motivo_deuda");
    	$rut_deudor              = $this->input->get("rut_deudor");
    	$nombre_deudor           = $this->input->get("nombre_deudor");
    	$rut_empresa             = $this->input->get("rut_empresa");
    	$nombre_empresa          = $this->input->get("nombre_empresa");
    	$rut_representante       = $this->input->get("rut_representante");
    	$nombre_representante    = $this->input->get("nombre_representante");


    	$data = array(
    		'id_tipo_incumplimiento' => $id_tipo_incumplimiento,
    		'id_tipo_deudor'         => $id_tipo_deudor,
			'motivo_deuda'           => $motivo_deuda,
			'rut_deudor'             => $rut_deudor,
			'nombre_deudor'          => $nombre_deudor,
			'rut_empresa'            => $rut_empresa,
			'nombre_empresa'         => $nombre_empresa,
			'rut_representante'      => $rut_representante,
			'nombre_representante'   => $nombre_representante
		);



		$this->form_validation->set_data($data);

    	$this->form_validation->set_rules('id_tipo_incumplimiento', 'tipo  incumplimiento', 'required');
    	$this->form_validation->set_rules('id_tipo_deudor', 'tipo  deudor', 'required');
    	$this->form_validation->set_rules('motivo_deuda', 'motivo deuda', 'required');
		$this->form_validation->set_rules('rut_deudor', 'rut deudor', 'required');
		$this->form_validation->set_rules('nombre_deudor', 'nombre deudor', 'required');
		$this->form_validation->set_rules('rut_empresa', 'rut empresa', 'required');
		$this->form_validation->set_rules('nombre_empresa', 'nombre empresa', 'required');
		$this->form_validation->set_rules('rut_representante', 'rut representante', 'required');
		$this->form_validation->set_rules('nombre_representante', 'nombre representante', 'required');


		if ($this->form_validation->run()){

			$id_user = $this->session->userdata("id");



			$datos   = array('id_users'               => $id_user,
							 'id_tipo_incumplimiento' => $id_tipo_incumplimiento,
							 'id_tipo_deudor'         => $id_tipo_deudor,
				             'motivo_deuda'           => $motivo_deuda,
							 'rut_deudor'             => $rut_deudor,
							 'nombre_deudor'          => $nombre_deudor,
							 'rut_empresa'            => $rut_empresa, 
				             'nombre_empresa'         => $nombre_empresa,
							 'rut_representante'      => $rut_representante,
							 'nombre_representante'   => $nombre_representante

						);

			if ($this->denuncias_model->save_incumplimiento_comerciales($datos)) {

				$id = $this->denuncias_model->lastID();

        		$errors = array('success'     => true,

        						'id_denuncia' => $id,

	                            'message'     => 'Datos registrados exitosamente');

           		echo  json_encode($errors);

        	}else{



        		$datos = array('success' => false,

		                       'message' => 'A ocurrudo un error');

			    echo  json_encode($datos);

        	}

		}else{ 

		    $campos = array('id_tipo_incumplimiento'      => form_error("id_tipo_incumplimiento", "<span class='help-block'>","</span>"),
		    				'id_tipo_deudor'              => form_error("id_tipo_deudor", "<span class='help-block'>","</span>"),
		    				'motivo_deuda'                => form_error("motivo_deuda", "<span class='help-block'>","</span>"),
		                    'rut_deudor'                  => form_error("rut_deudor", "<span class='help-block'>","</span>"),
		                    'nombre_deudor'                => form_error("nombre_deudor", "<span class='help-block'>","</span>"),
		                    'rut_empresa'                  => form_error("rut_empresa", "<span class='help-block'>","</span>"),
		                    'nombre_empresa'               => form_error("nombre_empresa", "<span class='help-block'>","</span>"),
							'rut_representante'            => form_error("rut_representante", "<span class='help-block'>","</span>"),
							'nombre_representante'         => form_error("nombre_representante", "<span class='help-block'>","</span>"),

		                   );

	    	$datos = array('success' => false,

				           'valid'   => true,

				           'campos'  => $campos,);

			echo  json_encode($datos);

		}

	}


	public function incumplimiento_comerciales_view($id)

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);



		$id_user = $this->session->userdata("id");

		$data    = array('user'                       => $this->users_model->getUser($id_user),
						 'tipo_incumplimiento'        => $this->denuncias_model->getipoincumplimiento(),
						 'tipo_deudor'                => $this->denuncias_model->getipodeudor(),
			 			 'incumplimiento_comerciales' => $this->denuncias_model->getincumplimiento_comerciales($id),
						 'controlador'                => "incumplimiento_comerciales"

					   	 );



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/incumplimiento_comerciales/view');

		$this->load->view('dashboard/layouts/footer');

	}


	public function upload($tipo, $id)

	{

		$control  = $this->permisos;

		$opciones = array('opciones'   => $control["opciones"]);





		if ($tipo == 1) {

			$controlador = "factura";

		}else if ($tipo == 2){

			$controlador = "cheque";

		}else if ($tipo == 3){

			$controlador = "letra";

		}else if ($tipo == 4){

			$controlador = "arriendos_habitacionales";

		}else if ($tipo == 5){

			$controlador = "arriendo_comercial";

		}else if ($tipo == 6){

			$controlador = "arriendo_vehiculo";

		}else if ($tipo == 7){

			$controlador = "arriendo_equipos";

		}else if ($tipo == 8){

			$controlador = "creditos_automotrices";

		}else if ($tipo == 9){

			$controlador = "creditos_laborales";

		}else if ($tipo == 10){

			$controlador = "incumplimiento_comerciales";

		}

		$id_user = $this->session->userdata("id");

		$data    = array('user' 		    => $this->users_model->getUser($id_user),

	                     'id'               => $id,

	                     'tipo'             => $tipo,

	                     'controlador'      => $controlador,

	                     'evidencias_pdf'   => $this->evidencias_model->getEvidenciasPdf($tipo, $id),

	                     'evidencias_fotos' => $this->evidencias_model->getEvidenciasFotos($tipo, $id));



		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar', $opciones);

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/denuncias/upload');

		$this->load->view('dashboard/layouts/footer');

	}



	public function uploadPdf($tipo, $id_fune)

	{

        $mi_archivo              = 'file';

        $config['upload_path']   = "uploads/evidencias";

        $config['allowed_types'] = 'pdf';

        //$config['file_name']     = $name_file;

       // $config['allowed_types'] = "*";

       // $config['encrypt_name']  = TRUE;

        // $config['max_size']      = "50000";

        // $config['max_width']     = "2000";

        // $config['max_height']    = "2000";

      //  $config['overwrite']     = TRUE;



        $this->load->library('upload', $config);

        

        if (!$this->upload->do_upload($mi_archivo)) {

            //*** ocurrio un error

            $data['uploadError'] = $this->upload->display_errors();

         

            $this->session->set_flashdata('error', $this->upload->display_errors());



           

           redirect(base_url()."operaciones/denuncias/upload/".$tipo."/".$id_fune);

            return;

        }else{

        	$data = $this->upload->data();

        	$datos = array('id_tipo_denuncia' => $tipo,

        				   'id_denuncia'      => $id_fune,

        				   'documento'        => $data["file_name"]);

        	if ($this->evidencias_model->save($datos)) {

        		$this->session->set_flashdata('valid', 'Su carga fue exitosa');

        	}else{

        		$this->session->set_flashdata('error', $this->upload->display_errors());

        	}

       		redirect(base_url()."operaciones/denuncias/upload/".$tipo."/".$id_fune);

       	}



	}



	public function uploadImage($tipo, $id_fune)

	{

		$mi_archivo              = 'foto';

        $config['upload_path']   = "uploads/evidencias";

        $config['allowed_types'] = 'gif|jpg|png';

        //$config['file_name']     = $name_file;

       // $config['allowed_types'] = "*";

       // $config['encrypt_name']  = TRUE;

        // $config['max_size']      = "50000";

        // $config['max_width']     = "2000";

        // $config['max_height']    = "2000";

      //  $config['overwrite']     = TRUE;



        $this->load->library('upload', $config);

        

        if (!$this->upload->do_upload($mi_archivo)) {

            //*** ocurrio un error

            $data['uploadError'] = $this->upload->display_errors();

         

            $this->session->set_flashdata('error', $this->upload->display_errors());



           

           redirect(base_url()."operaciones/denuncias/upload/".$tipo."/".$id_fune);

            return;

        }else{

        	$data = $this->upload->data();

        	$datos = array('id_tipo_denuncia' => $tipo,

        				   'id_denuncia'      => $id_fune,

        				   'foto'             => $data["file_name"]);

        	if ($this->evidencias_model->saveFoto($datos)) {

        		$this->session->set_flashdata('valid', 'Su carga fue exitosa');

        	}else{

        		$this->session->set_flashdata('error', $this->upload->display_errors());

        	}

       		redirect(base_url()."operaciones/denuncias/upload/".$tipo."/".$id_fune);

       	}

	}





}



/* End of file Denuncias.php */

/* Location: ./application/controllers/Denuncias.php */