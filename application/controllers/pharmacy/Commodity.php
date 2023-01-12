<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mercaderia extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        
        if ($this->session->userdata('isLogIn') == false) {
            redirect('login');
        }
	}

    public function form() {
        $data['title'] = 'Ingreso de mercadería';

        $query = $this->db->query("SELECT proveedor FROM mercaderia GROUP BY proveedor");
        $proveedores = $query->result();

        $data['content'] = $this->load->view('mercaderia/form', $data, true);

        $this->load->view('layout/main_wrapper', $data);
    }
}
