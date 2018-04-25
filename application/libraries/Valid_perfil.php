<?php 

	/**

	* COntrol de Permisos

	*/

	class Valid_perfil 
	{
		private $CI;
		function __construct()
		{
			$this-> CI = & get_instance();
		}

		public function valid()
		{
			$datos = $this->CI->valid_perfil_model->valid($this->CI->session->userdata("id"));
			if (($datos->id_identidad == 0) 
				|| ($datos->identidad == "") 
				|| ($datos->p_nombre == "")
				|| ($datos->s_nombre == "")
				|| ($datos->p_apellido == "")
				|| ($datos->s_apellido == "")
				|| ($datos->email == "")
				|| ($datos->telefono == "")
				|| ($datos->celular == "")
				|| ($datos->fecha_nac == "0000-00-00")
				|| ($datos->id_provincia == "")
				|| ($datos->id_comuna == "")
				|| ($datos->direccion == "")
			){
				return false;
			}else{
				return true;
			}
		}
	}

 ?>