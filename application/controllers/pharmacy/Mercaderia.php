<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mercaderia extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        $this->load->model(array(
            'billing/bill_model'
        ));
        
        if ($this->session->userdata('isLogIn') == false) {
            redirect('login');
        }

        $this->db->query("SET sql_mode=''");
	}

    public function index()
    {
        $data['title'] = 'Listado de ingreso de mercadería';

        $where[] = 1;

        if ($_GET['fecha_entrada'] != '') {
            $fecha_entrada = $_GET['fecha_entrada'];
            $where[] = "fecha_entrada = '$fecha_entrada'";
        }

        if ($_GET['proveedor'] != '') {
            $proveedor = $_GET['proveedor'];
            $where[] = "proveedor = '$proveedor'";
        }

        if ($_GET['medicamento'] != '') {
            $medicamento = $_GET['medicamento'];
            $where[] = "nombre_producto = '$medicamento'";
        }

        $where = implode(' AND ', $where);

        $sql = "SELECT *, SUM(cantidad * precio_compra) AS total FROM mercaderia WHERE $where GROUP BY numero_factura";

        $data['mercaderias'] = $this->db
            ->query($sql)
            ->result();

        $data['proveedores'] = $this->db
            ->from('proveedores')
            ->get()
            ->result();

        $data['medicamentos'] = $this->db
            ->from('mercaderia')
            ->get()
            ->result();

        $data['content'] = $this->load->view('mercaderia/index', $data, true);

        $this->load->view('layout/main_wrapper', $data);
    }

    public function form() {
        $data['title'] = 'Ingreso de mercadería';

        $query = $this->db->query("SELECT nombre, nit FROM proveedores");
        $data['proveedores'] = $query->result();

        $query = $this->db->query("SELECT name FROM ha_medicine");
        $data['productos'] = $query->result();

        $query = $this->db->query("SELECT id, name FROM ha_category");
        $data['categorias'] = $query->result();

        $data['proveedores'] = $this->db
            ->from('proveedores')
            ->get()
            ->result();

        $data['content'] = $this->load->view('mercaderia/form', $data, true);

        $this->load->view('layout/main_wrapper', $data);
    }

    public function create()
    {
        $fecha_entrada = $_POST['fecha_entrada'];
        $fecha_factura = $_POST['fecha_factura'];
        $numero_factura = $_POST['numero_factura'];
        $proveedor = $_POST['proveedor'];
        $productos = $_POST['productos'];

        $mercaderia = $this->db->query("SELECT MAX(id_mercaderia) AS id_mercaderia FROM mercaderia");
        $mercaderia = $mercaderia->row();
        $id_mercaderia = $mercaderia->id_mercaderia + 1;

        foreach ($productos as $producto) {
            $codigo = $producto['codigo'];
            $nombre_producto = $producto['nombre_producto'];
            $lote = $producto['lote'];
            $cantidad = $producto['cantidad'];
            $precio_compra = $producto['precio_compra'];
            $fecha_vencimiento_producto = $producto['fecha_vencimiento_producto'];
            $usuario = $_SESSION['fullname'];

            $this->db->query("INSERT INTO mercaderia (id_mercaderia, fecha_entrada, fecha_factura, numero_factura, proveedor, codigo, nombre_producto, lote, cantidad, precio_compra, fecha_vencimiento_producto, usuario) VALUES ($id_mercaderia, DATE(NOW()), '$fecha_factura', '$numero_factura', '$proveedor', '$codigo', '$nombre_producto', '$lote', '$cantidad', '$precio_compra', '$fecha_vencimiento_producto', '$usuario')");

            $this->db->query("UPDATE ha_medicine SET quantity = quantity + $cantidad WHERE name = '$nombre_producto'");
        }

        $this->session->set_flashdata('success', 'Mercadería registrada satisfactoriamente');

        redirect("/pharmacy/mercaderia/view/$id_mercaderia");
    }

    public function view($numero_factura)
    {
        $data = [];

        $data['title'] = 'Ingreso de mercadería';

        $data['website'] = $this->bill_model->website();

        $query = $this->db->query("SELECT * FROM mercaderia WHERE numero_factura = '$numero_factura'");
        $data['mercaderia'] = $query->result();

        $data['content'] = $this->load->view('mercaderia/view', $data, true);

        $this->load->view('layout/main_wrapper', $data);
    }

    public function info()
    {
        $codigo = $_GET['codigo'];
        $medicine = $this->db->from('ha_medicine')->where('code', $codigo)->get()->row();
        echo json_encode(['id' => $medicine->id, 'name' => $medicine->name]);
    }
}
