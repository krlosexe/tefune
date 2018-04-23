<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends CI_Controller {



	/**

	 * Index Page for this controller.

	 *

	 */

	public function index()

	{

		$this->load->view('home/layouts/header');

		$this->load->view('home/layouts/aside');

		$this->load->view('home/modals');

		$this->load->view('home/about');

		$this->load->view('home/blog');

		$this->load->view('home/estadisticas');

		$this->load->view('home/contacto');

		$this->load->view('home/layouts/footer');

	}



	public function store()

	{

		$nombre      = $this->input->post("name");

		$email       = $this->input->post("email");

		$pass1       = $this->input->post("pass1");

		$pass2       = $this->input->post("pass2");

		

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		$this->form_validation->set_rules('name',  'Nombre', 'required');

		$this->form_validation->set_rules('pass1', 'Contraseña', 'required');

		$this->form_validation->set_rules('pass2', 'Repita Contraseña', 'required');



		if ($this->form_validation->run()){

			if ($pass1 != $pass2) {

				$datos = array('success' => false,

		                       'message' => "Las contraseñas no coinciden");

				echo  json_encode($datos);

			}else{

				

				$datos = array('success' => true,

		                       'message' => $nombre);

			    echo  json_encode($datos);

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


	public function contact()
	{

		$name_con     = $this->input->get("name");
		$telefono_con = $this->input->get("telefono");
		$email_con    = $this->input->get("email");
		$asunto_con   = $this->input->get("asunto");
		$message_con  = $this->input->get("message");



		$data = array(
			'name_con'     => $name_con,
			'telefono_con' => $telefono_con,
			'email_con'    => $email_con,
			'asunto_con'   => $asunto_con,
			'message_con'  => $message_con,
		);

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules('name_con', 'nombre y apellido', 'required');
		$this->form_validation->set_rules('telefono_con',  'telefono', 'required');
		$this->form_validation->set_rules('email_con', 'email', 'required|valid_email');
		$this->form_validation->set_rules('asunto_con', 'asunto', 'required');
		$this->form_validation->set_rules('message_con', 'mensaje', 'required');


		if ($this->form_validation->run()){
			$config = Array(
                              'protocol' => 'smtp',
                              'smtp_host' => 'razor.inc.cl',
                              'smtp_port' => 465,
                              'smtp_user' => 'contacto@tefune.cl',
                              'smtp_pass' => 'Ad17urca*2355',
                              'crlf' => "\r\n",
                              'newline' => "\r\n"
                            );


			$this->load->library('email');

			$this->email->from('contacto@tefune.cl', 'tefune.cl');
	        $this->email->to("contacto@tefune.cl");
	                     //super importante, para poder envíar html en nuestros correos debemos ir a la carpeta 
	                     //system/libraries/Email.php y en la línea 42 modificar el valor, en vez de text debemos poner html
	        $this->email->subject("Contacto Tefune | ".$asunto_con);
	        $mensaje =   "<h2>Datos del Usuario</h2><br>
	                      <p><b>Nombre: </b>".$name_con."</p>
	                      <p><b>Telefono: </b>".$telefono_con."</p>
	                      <p><b>correo: </b>".$email_con."</p>
	                      <p><b>Motivo: </b>".$asunto_con."</p>
	                      <p><b>Mensaje: </b>".$message_con."</p>";
	        

	        $this->email->message($mensaje);

			if ($this->email->send()) {
				$datos = array('success' => true,
			                   'message' => "Su mensaje fue enviado correctamente");

				echo  json_encode($datos);
			}else{
				$datos = array('success' => false,
			                   'message' => "A ocurrido un error");

				echo  json_encode($datos);
			}
		}else{
			$campos = array('name_con' => form_error("name_con", "<span class='help-block'>","</span>"),
		    	'telefono_con' => form_error("telefono_con", "<span class='help-block'>","</span>"),
		        'email_con'    => form_error("email_con", "<span class='help-block'>","</span>"),
		        'asunto_con'   => form_error("asunto_con", "<span class='help-block'>","</span>"),
		        'message_con'  => form_error("message_con", "<span class='help-block'>","</span>"));


			$valid =  form_error("name_con", "<span>","</span><br><br>").
					  form_error("telefono_con", "<span>","</span><br><br>").
					  form_error("email_con", "<span>","</span><br><br>").
					  form_error("asunto_con", "<span>","</span><br><br>").
					  form_error("message_con", "<span>","</span><br><br>");


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
				           'message'  => $valid);

			echo  json_encode($datos);
		}




		
	}

}

