<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carga extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('provincias_model');
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
            //echo $errors;
            return;
        }else{
        	$data = $this->upload->data();
        	$datos = array('fotos' => $data["file_name"]);
        	if ($this->users_model->update($id_user, $datos)) {
        		$errors = array('success' => true,
	                            'message' => 'Su imagen fue actualzida exitosamente');
           		echo  json_encode($errors);
        		//echo $errors;
        	}
        }
    }

}

/* End of file Carga.php */
/* Location: ./application/controllers/Carga.php */