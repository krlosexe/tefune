<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Users extends CI_Controller {

	private $permisos;
	public function __construct(){
		parent::__construct();
		//$this->permisos = $this->backend_lib->control();
		$this->load->model('users_model');
		$this->load->model('provincias_model');
	}

	public function index()
	{
		echo "string";
	}
	public function registro()

	{

		$nombre        = $this->input->get("name");

		$email         = $this->input->get("email");

		$pass1         = $this->input->get("pass1");

		$pass2         = $this->input->get("pass2");



		$data = array(

			'email' => $email,

		    'name'  => $nombre,

		    'pass1' => $pass1,

		    'pass2' => $pass2

		);



		$this->form_validation->set_data($data);



		$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]');

		$this->form_validation->set_rules('name',  'nombre de usuario', 'required|is_unique[users.loginUsers]');

		$this->form_validation->set_rules('pass1', 'contraseña', 'required');

		$this->form_validation->set_rules('pass2', 'repita Contraseña', 'required');



		if ($this->form_validation->run()){

			if ($pass1 != $pass2) {

				$datos = array('success' => false,

		                       'message' => "Las contraseñas no coinciden");

				echo  json_encode($datos);

			}else{

				$data = array('loginUsers' => $nombre,
						      'passUsers'  => sha1($pass1),
						      'email'      => $email,
						      'rol_id'     => 3);

				if ($this->users_model->save($data)){

					$datos = array('success' => true,

			                       'message' => "Registro exitiso ahora inicie sesion");

				    echo  json_encode($datos);

				}else{

					$datos = array('success' => false,

			                       'message' => "A oucurrido un error");

				    echo  json_encode($datos);

				}

			}

		}else{

			$valid =  form_error("email", "<span>","</span><br><br>").

					  form_error("name", "<span>","</span><br><br>").

					  form_error("pass1", "<span>","</span><br><br>").

					  form_error("pass2", "<span>","</span><br><br>");



		    $campos = array('email' => form_error("email", "<span class='help-block'>","</span>"),

		                    'name'  => form_error("name", "<span class='help-block'>","</span>"),

		                    'pass1' => form_error("pass1", "<span class='help-block'>","</span>"),

		                    'pass2' => form_error("pass2", "<span class='help-block'>","</span>"));

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

		                   'message' => $valid);

			echo  json_encode($datos);

		}

	}



public function registroUserAdmin()
	{
		$nombre      = $this->input->get("name");
		$email       = $this->input->get("email");
		$pass1       = $this->input->get("pass1");
		$pass2       = $this->input->get("pass2");
		$rol         = $this->input->get("rol");
		


		$data = array(
			'email' => $email,
			'name'  => $nombre,
			'pass1' => $pass1,
			'pass2' => $pass2,
			'rol'   => $rol
		);

		$this->form_validation->set_data($data);
		
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('name',  'nombre de usuario', 'required|is_unique[users.loginUsers]');
		$this->form_validation->set_rules('pass1', 'contraseña', 'required');
		$this->form_validation->set_rules('pass2', 'repita Contraseña', 'required');
		$this->form_validation->set_rules('rol', 'tipo de usuario', 'required');

		if ($this->form_validation->run()){
			if ($pass1 != $pass2) {
				$datos = array('success' => false,
		                       'message' => "Las contraseñas no coinciden");
				echo  json_encode($datos);
			}else{
				$data = array('loginUsers' => $nombre,
						      'passUsers'  => sha1($pass1),
						      'email'      => $email,
						      'rol_id'     => $rol);
				if ($this->users_model->save($data)){
					$datos = array('success' => true,
			                       'message' => "Registro exitiso");
				    echo  json_encode($datos);
				}else{
					$datos = array('success' => false,
			                       'message' => "A oucurrido un error");
				    echo  json_encode($datos);
				}
			}
		}else{

		    $campos = array('email' => form_error("email", "<span class='help-block'>","</span>"),
		                    'name'  => form_error("name", "<span class='help-block'>","</span>"),
		                    'pass1' => form_error("pass1", "<span class='help-block'>","</span>"),
		                    'pass2' => form_error("pass2", "<span class='help-block'>","</span>"),
		                    'rol' => form_error("rol", "<span class='help-block'>","</span>"));
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
				           'campos'  => $campos);
			echo  json_encode($datos);
		}
	}






	public function login()

	{

		$username = $this->input->get("user");

		$password = $this->input->get("password");



		$data = array(

			'user'      => $username,

		    'password'  => $password

		);



		$this->form_validation->set_data($data);

		$this->form_validation->set_rules('user', 'usuario', 'required');

		$this->form_validation->set_rules('password', 'contraseña', 'required');



		if ($this->form_validation->run()){

			$res      = $this->users_model->login($username, sha1($password));



			if (!$res) {

				$datos = array('success' => false,

	                           'message' => "Usuario o Contraseña incorrecto");

		   		 echo  json_encode($datos);

			}else{

				$data_login = array('id'        => $res->id,

				 					'name_user' => $res->loginUsers,

				 					'login'     => TRUE,
				 				    'rol'       => $res->rol_id);

				$this->session-> set_userdata($data_login);

				$datos = array('success' => true,

	                           'message' => "Bienvenido");

		   		 echo  json_encode($datos);

			}

		}else{

			$valid =  form_error("user", "<span>","</span><br><br>").

					  form_error("password", "<span>","</span><br><br>");



		    $campos = array('user' => form_error("user", "<span class='help-block'>","</span>"),

		                    'password' => form_error("password", "<span class='help-block'>","</span>"));

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

		                   'message' => $valid);

			echo  json_encode($datos);

		}

		

	}





	public function logouts()

	{

		$this->session->sess_destroy();

		redirect(base_url());

	}



	public function profile()

	{	
		//$control  = $this->permisos;
		//$opciones = array('opciones'   => $control["opciones"]);

		$id_user = $this->session->userdata("id");

		if (!$this->session->userdata("login")) {

			redirect(base_url());

		}

		$data = array('user'           => $this->users_model->getUser($id_user),

	                  'type_documents' => $this->users_model->typeDucument(),

	                  'provincias'     => $this->provincias_model->getProvincias(),

	                  'comunas'        => $this->provincias_model->getComunas());

		

		$this->load->view('dashboard/layouts/header');

		$this->load->view('dashboard/layouts/sidebar');

		$this->load->view('dashboard/layouts/top_panel', $data);

		$this->load->view('dashboard/users/profile', $data);

		$this->load->view('dashboard/layouts/footer');

	}	





	function uploadprofile($id_user = '') {

		$user      = $this->users_model->getUser($id_user);

		

		$name_file               =  $user->loginUsers;

        $mi_archivo              = 'files';

        $config['upload_path']   = "uploads/";

        $config['allowed_types'] = 'gif|jpg|png';

        $config['file_name']     = $name_file;

        $config['allowed_types'] = "*";

        $config['max_size']      = "50000";

        $config['max_width']     = "2000";

        $config['max_height']    = "2000";

        $config['overwrite']     = TRUE;



        $this->load->library('upload', $config);

        

        if (!$this->upload->do_upload($mi_archivo)) {

            //*** ocurrio un error

            $data['uploadError'] = $this->upload->display_errors();



            $errors = array('success' => false,

	                        'message' => $this->upload->display_errors());

            echo  json_encode($errors);

            return;

        }else{

        	$data = $this->upload->data();

        	$datos = array('fotos' => $data["file_name"]);

        	if ($this->users_model->update($id_user, $datos)) {

        		$errors = array('success' => true,

	                            'message' => 'Su imagen fue actualzida exitosamente');

           		echo  json_encode($errors);

        	}

        }

    }





    public function updatePerfilPersonales($id="")

    {

    	$name1         = $this->input->get("name1");

    	$name2         = $this->input->get("name2");

    	$lastname1     = $this->input->get("lastname1");

    	$lastname2     = $this->input->get("lastname2");

    	$type_document = $this->input->get("type_document");

    	$num_document  = $this->input->get("num_document");

    	$serie         = $this->input->get("serie");

    	$date_nac      = $this->input->get("date_nac");





    	$data = array(
			'name1'          => $name1,

			'name2'          => $name2,

			'lastname1'      => $lastname1,

			'lastname2'      => $lastname2,

			'type_document'  => $type_document,

			'num_document'   => $num_document,

			'serie'          => $serie,

		    'date_nac'       => $date_nac
		);



		$this->form_validation->set_data($data);

    	$this->form_validation->set_rules('name1', 'primer nombre', 'required');

		$this->form_validation->set_rules('name2', 'segundo nombre', 'required');

		$this->form_validation->set_rules('lastname1', 'primer apellido', 'required');

		$this->form_validation->set_rules('lastname2', 'segundo apellido', 'required');

		$this->form_validation->set_rules('type_document', 'tipo de documento', 'required');

		$this->form_validation->set_rules('num_document', 'numero de documento', 'required');

		if ($type_document == 2) {
			$this->form_validation->set_rules('serie', 'serie', 'required');
		}

		$this->form_validation->set_rules('date_nac', 'fecha de nacimiento', 'required');



		if ($this->form_validation->run()){

			if ($id != "") {
				$id_user = $id;
			}else{
				$id_user = $this->session->userdata("id");
			}



			$datos   = array('id_identidad' => $type_document,

							 'identidad'    => $num_document, 

							 'serie'        => $serie, 

				             'p_nombre'     => $name1,

							 's_nombre'     => $name2,

							 'p_apellido'   => $lastname1,

							 's_apellido'   => $lastname2,

							 'fecha_nac'     => $date_nac);



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

		    $campos = array('name1'         => form_error("name1", "<span class='help-block'>","</span>"),

		                    'name2'         => form_error("name2", "<span class='help-block'>","</span>"),

		                    'lastname1'     => form_error("lastname1", "<span class='help-block'>","</span>"),

		                    'lastname2'     => form_error("lastname2", "<span class='help-block'>","</span>"),

		                    'type_document' => form_error("type_document", "<span class='help-block'>","</span>"),

		                	'num_document'  => form_error("num_document", "<span class='help-block'>","</span>"),

		                	'serie'         => form_error("serie", "<span class='help-block'>","</span>"),

		                    'date_nac'      => form_error("date_nac", "<span class='help-block'>","</span>"));



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







    public function updatePerfilContacto($id = "")

    {

    	if ($id != "") {
			$id_user = $id;
		}else{
			$id_user = $this->session->userdata("id");
		}



    	$email         = $this->input->get("email");

    	$telefono_casa = $this->input->get("telefono_casa");

    	$phone         = $this->input->get("phone");



    	$data = array(

			'email'          => $email,

			'telefono_casa'  => $telefono_casa,

			'phone'          => $phone

		);



		$this->form_validation->set_data($data);



    	$userActual = $this->users_model->getUser($id_user);

		if ($email == $userActual->email) {

			$unique="";

		}else{

			$unique = "|is_unique[users.email]";

		}



    	$this->form_validation->set_rules('email', 'email', 'required|valid_email'.$unique);

		$this->form_validation->set_rules('telefono_casa', 'telefono de casa', 'required');

		$this->form_validation->set_rules('phone', 'telefono movil', 'required');



		if ($this->form_validation->run()){

			$datos   = array('email'      => $email,

							 'telefono'   => $telefono_casa, 

				             'celular'    => $phone);



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

		    $campos = array('email'          => form_error("email", "<span class='help-block'>","</span>"),

		                    'telefono_casa'  => form_error("telefono_casa", "<span class='help-block'>","</span>"),

		                    'phone'     	 => form_error("phone", "<span class='help-block'>","</span>"));



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









    public function updatePerfilLocation($id="")

    {

    	if ($id != "") {
			$id_user = $id;
		}else{
			$id_user = $this->session->userdata("id");
		}



    	$provincias = $this->input->get("provincias");

    	$comunas    = $this->input->get("comunas");

    	$direccion  = $this->input->get("direccion");





    	$data = array(

			'provincias' => $provincias,

			'comunas'    => $comunas,

			'direccion'  => $direccion

		);

		$this->form_validation->set_data($data);

    	$this->form_validation->set_rules('provincias', 'provincias', 'required');

		$this->form_validation->set_rules('comunas', 'comunas', 'required');

		$this->form_validation->set_rules('direccion', 'direccion', 'required');



		if ($this->form_validation->run()){

			$datos   = array('id_provincia' => $provincias,

							 'id_comuna'    => $comunas, 

				             'direccion'  => $direccion);



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

		    $campos = array('provincias' => form_error("provincias", "<span class='help-block'>","</span>"),

		                    'comunas'    => form_error("comunas", "<span class='help-block'>","</span>"),

		                    'direccion'  => form_error("direccion", "<span class='help-block'>","</span>"));



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











    public function getComunas()

    {

    	$id_provincia  = $this->input->get("id");

		$comunas       = $this->provincias_model->getComuna($id_provincia);

		

		$datos = array();

		foreach ($comunas as $value) {

			$datos["id"]     = $value->id_comuna;

			$datos["nombre"] = $value->comuna;

		}

		echo json_encode($comunas);

    }













    public function updatePass(){

    	$pass  = $this->input->get("pass");

    	$pass1 = $this->input->get("pass1");

    	$pass2 = $this->input->get("pass2");



    	$data = array(

			'pass'  => $pass,

			'pass1' => $pass1,

			'pass2' => $pass2

		);



		$this->form_validation->set_data($data);

    	$this->form_validation->set_rules('pass', 'contraseña actual', 'required');

		$this->form_validation->set_rules('pass1', 'nueva contraseña', 'required');

		$this->form_validation->set_rules('pass2', 'repita contraseña', 'required');



		if ($this->form_validation->run()) {



			$id_user = $this->session->userdata("id");

			$user    = $this->users_model->getUser($id_user);



			if ($user->passUsers != sha1($pass))  {

				$datos = array('success' => false,

		                       'message' => "La contraseña actual es incorrecta");

				echo  json_encode($datos);

			}else if ($pass1 != $pass2) {

				$datos = array('success' => false,

		                       'message' => "Las contraseñas no coinciden");

				echo  json_encode($datos);

			}else{

				$datos   = array('passUsers'  => sha1($pass1));



				if ($this->users_model->update($id_user, $datos)) {

        			$errors = array('success' => true,

	                                'message' => 'Contraseña Actualizada exitosamente');

	           		echo  json_encode($errors);

	        	}else{

	        		$datos = array('success' => false,

			                       'message' => 'A ocurrudo un error');

				    echo  json_encode($datos);

	        	}

			}

		}else{

			$campos = array('pass' => form_error("pass", "<span class='help-block'>","</span>"),

		                    'pass1'=> form_error("pass1", "<span class='help-block'>","</span>"),

		                    'pass2'=> form_error("pass2", "<span class='help-block'>","</span>"));



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

