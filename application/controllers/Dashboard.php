<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Dashboard extends CI_Controller {

	private $permisos;
	private $valid;

	public function __construct(){

		parent::__construct();

		if (!$this->session->userdata("login")) {

			redirect(base_url());

		}else{

			$this->valid = $this->valid_perfil->valid();
			$this->permisos = $this->backend_lib->control();
			$this->load->model('users_model');
		}

	}

	public function index()

	{	

		$control  = $this->permisos;
		$valid    = $this->valid;
		$opciones = array('opciones'   => $control["opciones"]);
		$id_user  = $this->session->userdata("id");
		$data     = array('user'  => $this->users_model->getUser($id_user),
						  'valid' => $valid);
		$this->load->view('dashboard/layouts/header');
		$this->load->view('dashboard/layouts/sidebar', $opciones);
		$this->load->view('dashboard/layouts/top_panel', $data);
		$this->load->view('dashboard/dashboard');
		$this->load->view('dashboard/layouts/footer');

	}

}

