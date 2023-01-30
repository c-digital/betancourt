<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Almacenes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        if ($this->session->userdata('isLogIn') == false) {
            redirect('login');
        }
        
        $this->db->query("SET sql_mode=''");
	}

    public function index()
    {
        $data['title'] = 'Almacenes';
        $data['almacenes'] = $this->db->query("SELECT almacenes.id, almacenes.nombre FROM almacenes")->result();
        $data['content'] = $this->load->view('almacenes/index', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function get_stock($id){
        $this->db->select("*")
                ->from('almacenes_productos')
                ->where('id',$id)
                ->get()
                ->row();

        echo json_encode($stock);
    }

    public function create()
    {
        $data['title'] = 'Almacenes';
        $data['content'] = $this->load->view('almacenes/create', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function store()
    {
        $nombre = $_POST['name'];
        $this->db->query("INSERT INTO almacenes (nombre) VALUES ('$nombre')");
        redirect('/pharmacy/almacenes');
    }

    public function deleteProduct($id)
    {
        $producto = $this->db->from('almacenes_productos')
            ->where('id', $id)
            ->get()
            ->row();

        $id_almacen = $producto->id_almacen;

        return redirect("/pharmacy/almacenes/ver/$id_almacen?delete=$id");
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM almacenes WHERE id = $id");
        redirect('/pharmacy/almacenes');
    }

    public function ver($id)
    {
        if (isset($_GET['delete'])) {
            $id_delete = $_GET['id'];

            $this->db->from('almacenes_productos')
                ->where('id', $id_delete)
                ->delete();

            return redirect("/pharmacy/almacenes/ver/$id");
        }

        $almacen = $this->db->query("SELECT * FROM almacenes WHERE id = $id")->row();
        $data['title'] = $almacen->nombre;

        $data['productos'] = $this->db->query("SELECT almacenes_productos.id, almacenes_productos.name, (SELECT ha_category.name FROM ha_category WHERE ha_category.id = almacenes_productos.category_id) AS category, SUM(almacenes_productos.quantity) AS quantity, almacenes_productos.price, almacenes_productos.manufactured_by, almacenes_productos.status FROM almacenes_productos WHERE id_almacen = $id GROUP BY name")->result();

        $data['almacenes'] = $this->db->query("SELECT id, nombre FROM almacenes")->result();

        $data['content'] = $this->load->view('almacenes/ver', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function mover()
    {
        $id = $_POST['id_mover'];
        $id_almacen = $_POST['id_almacen'];
        $quantity = $_POST['cantidad'];

        $tabla = (isset($_POST['almacen_central'])) ? 'ha_medicine' : 'almacenes_productos';

        $medicine = $this->db->query("SELECT * FROM $tabla WHERE id = $id")->row();

        $name = $medicine->name;
        $category_id = $medicine->category_id;
        $descripcion = $medicine->description;
        $price = $medicine->price;
        $manufactured_by = $medicine->manufactured_by;
        $create_date = $medicine->create_date;
        $status = 1;

        $this->db->query("INSERT INTO almacenes_productos (id_almacen, name, category_id, description, quantity, price, manufactured_by, create_date, status) VALUES ('$id_almacen', '$name', '$category_id', '$description', '$quantity', '$price', '$manufactured_by', '$create_date', '$status')");

        if ($medicine->quantity == $quantity && $tabla != 'ha_medicine') {
            $this->db->query("DELETE FROM $tabla WHERE id = $id");
        } else {
            $this->db->query("UPDATE $tabla SET quantity = quantity - $quantity WHERE id = $id");
        }

        redirect("/pharmacy/almacenes/ver/$id_almacen");
    }

    public function editar($id)
    {
        $data['title'] = 'Editar almacén';

        $data['almacen'] = $this->db->query("SELECT * FROM almacenes WHERE id = $id")->row();

        $data['content'] = $this->load->view('almacenes/editar', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function update()
    {
        extract($_POST);
        $this->db->query("UPDATE almacenes SET nombre = '$name' WHERE id = $id");
        redirect('/pharmacy/almacenes');
    }
}

