<?php 

	/**

	* COntrol de Permisos

	*/

	class Backend_lib 

	{

		private $CI;

		function __construct()

		{

			$this-> CI = & get_instance();

		}



		public function control()

		{

			if (!$this->CI->session->userdata("login")) {

				redirect(base_url());

			}

			if ($this->CI->uri->segment(2)) {

			$url = $this->CI->uri->segment(1)."/".$this->CI->uri->segment(2);

			//	$url = $this->CI->uri->segment(1);

			}else if ($this->CI->uri->segment(2)){



			}else{

				$url = $this->CI->uri->segment(1);

			}




			$infomenu = $this->CI->backend_model->getID($url);

		    $permisos = $this->CI->backend_model->getPermisos($infomenu->id, $this->CI->session->userdata("rol"));

		    $opciones = $this->CI->backend_model->getOpciones($this->CI->session->userdata("rol"));

		  

			if ($permisos->read == 0) {

				redirect(base_url()."dashboard");

			}else{

				$control = array("permisos" => $permisos, "opciones" => $opciones);

				return $control;

			}

		}

	}

 ?>