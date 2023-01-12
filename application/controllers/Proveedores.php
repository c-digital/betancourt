<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        
        if ($this->session->userdata('isLogIn') == false) {
            redirect('login');
        }
	}

    public function create() {
        extract($_POST);
        $this->db->query("INSERT INTO proveedores (nombre, nit, telefono, email, direccion) VALUES ('$nombre', '$nit', '$telefono', '$email', '$direccion')");
    }
}
