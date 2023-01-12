<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Masivo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        $this->load->model(array(
            'billing/bill_model'
        ));

        if ($this->session->userdata('isLogIn') == false) {
            redirect('login');
        }
	}

    public function index()
    {
        $data['title'] = 'Mover masivo';
        $data['productos'] = $this->db->query("SELECT id, name FROM ha_medicine")->result();
        $data['almacenes'] = $this->db->query("SELECT id, nombre FROM almacenes")->result();
        $data['content'] = $this->load->view('masivo/index', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function store()
    {
        $data['website'] = $this->bill_model->website();
        $data['title'] = 'Mover masivo';

        foreach ($_POST['productos'] as $producto) {
            $nombre = $producto['producto'];
            $almacen = $producto['almacen'];
            $cantidad = $producto['cantidad'];

            $medicine = $this->db->query("SELECT * FROM ha_medicine WHERE name = '$nombre'")->row();

            $name = $medicine->name;
            $category_id = $medicine->category_id;
            $descripcion = $medicine->description;
            $price = $medicine->price;
            $manufactured_by = $medicine->manufactured_by;
            $create_date = $medicine->create_date;
            $status = 1;

            $almacen = $this->db->query("SELECT * FROM almacenes WHERE nombre = '$almacen'")->row();
            $id_almacen = $almacen->id;

            $this->db->query("INSERT INTO almacenes_productos (id_almacen, name, category_id, description, quantity, price, manufactured_by, create_date, status) VALUES ('$id_almacen', '$name', '$category_id', '$descripcion', '$cantidad', '$price', '$manufactured_by', '$create_date', '$status')");

            $this->db->query("UPDATE ha_medicine SET quantity = quantity - $cantidad WHERE name = '$nombre'");
        }

        $data['productos'] = $_POST['productos'];
        $data['content'] = $this->load->view('masivo/view', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }
}

