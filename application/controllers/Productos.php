<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        
        if ($this->session->userdata('isLogIn') == false) {
            redirect('login');
        }
	}

    public function create() {
        extract($_POST);
        $this->db->query("INSERT INTO ha_medicine (name, category_id, description, quantity, price, manufactured_by, create_date, status) VALUES ('$nombre', '$categoria', '$descripcion', '0', '$precio', '$fabricado_por', DATE(NOW()), 1)");
    }
}
