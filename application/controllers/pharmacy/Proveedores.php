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

    public function index()
    {
        $data['title'] = 'Farmacia';
        $data['module'] = 'Proveedores';

        $data['proveedores'] = $this->db->query("SELECT * FROM proveedores")->result();

        $data['content'] = $this->load->view('proveedores/index', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function agregar()
    {
        $data['title'] = 'Farmacia';
        $data['module'] = 'Proveedores';

        $data['content'] = $this->load->view('proveedores/agregar', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function guardar()
    {
        extract($_POST);

        $sql = "INSERT INTO proveedores (nombre, nit, telefono, email, direccion) VALUES ('$nombre', '$nit', '$telefono', '$email', '$direccion')";
        $this->db->query($sql);

        $this->session->set_flashdata('success', 'Proveedor creado satisfactoriamente');
        return $this->redirect('/pharmacy/proveedores');
    }

    public function editar($id)
    {
        $data['title'] = 'Farmacia';
        $data['module'] = 'Proveedores';

        $data['proveedor'] = $this->db->query("SELECT * FROM proveedores WHERE id = $id")->row();

        $data['content'] = $this->load->view('proveedores/editar', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function actualizar()
    {
        extract($_POST);

        $sql = "UPDATE proveedores SET nombre = '$nombre', nit = '$nit', telefono = '$telefono', email = '$email', direccion = '$direccion' WHERE id = $id";
        $this->db->query($sql);

        $this->session->set_flashdata('success', 'Proveedor editado satisfactoriamente');
        return $this->redirect('/pharmacy/proveedores');
    }

    public function eliminar()
    {
        extract($_POST);

        $sql = "DELETE FROM proveedores WHERE id = $id";
        $this->db->query($sql);

        $this->session->set_flashdata('success', 'Proveedor eliminado satisfactoriamente');
        return $this->redirect('/pharmacy/proveedores');
    }
}

