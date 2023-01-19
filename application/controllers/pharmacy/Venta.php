<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Venta extends CI_Controller
{
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

	public function listado()
	{
		$data['module'] = 'Farmacia';
        $data['title'] = 'Listado de ventas';

        $where = "1";

        if (isset($_GET['patient_id']) && $_GET['patient_id'] != '') {
        	$patient_id = $_GET['patient_id'];
        	$where = "cliente = '$patient_id'";
        }

        $sql = "
        	SELECT
        		v.id,
        		CONCAT_WS(' ', p.firstname, p.lastname) AS cliente,
        		v.fecha,
        		v.productos,
        		v.descuento
        	FROM
        		ventas_farmacia v
        			INNER JOIN patient p ON v.cliente = p.patient_id
        	WHERE
        		$where
        	ORDER BY v.id DESC
        ";

        $data['ventas'] = $this->db->query($sql)->result();

        $data['content'] = $this->load->view('venta/listado', $data, true);
        $this->load->view('layout/main_wrapper', $data);
	}

	public function index()
	{
		$data['module'] = 'Farmacia';
        $data['title'] = 'Punto de venta';

        $cajero = $this->session->userdata('fullname');

        $data['estado'] = $this->db->query("SELECT * FROM caja WHERE cajero = '$cajero' ORDER BY id DESC LIMIT 1")->row()->estado;

        $sql = "
        	SELECT
        		patient_id AS id_cliente,
        		CONCAT_WS(' ', firstname, lastname) AS nombre
        	FROM
        		patient
        	ORDER BY CONCAT_WS(' ', firstname, lastname) ASC
        ";

        $data['clientes'] = $this->db->query($sql)->result();

        $data['content'] = $this->load->view('venta/index', $data, true);
        $this->load->view('layout/main_wrapper', $data);
	}

	public function guardar()
	{
		$cajero = $this->session->userdata('fullname');

        $estado = $this->db->query("SELECT * FROM caja WHERE cajero = '$cajero' ORDER BY id DESC LIMIT 1")->row()->estado;

        if ($estado == 'Caja cerrada') {
        	return redirect("/pharmacy/venta");
        }

		extract($_POST);

		$monto = 0;

		foreach (json_decode($_POST['productos']) as $item) {
			$precio = (float) $item->precio;
			$cantidad = (float) $item->cantidad;

			$monto = $monto + ($precio * $cantidad);
		}

		$caja = $this->db->query("SELECT * FROM caja ORDER BY id DESC")->row();

		$saldo = (float) $caja->saldo + (float) $monto;

		$cajero = $this->session->userdata('fullname');

		foreach ($pagos as $metodo => $valor) {
			if ($valor != 0) {
				$this->db->query("INSERT INTO caja (tipo_movimiento, fecha, monto, metodo_pago, concepto, saldo, estado, cajero) VALUES ('Entrada', NOW(), '$valor', '$metodo', 'Venta en Farmacia', '$saldo', 'Caja abierta', '$cajero')");
			}
		}

		$pagos = json_encode($pagos);
		$this->db->query("INSERT INTO ventas_farmacia (cliente, productos, descuento, fecha, pagos) VALUES ('$cliente', '$productos', '$descuento', NOW(), '$pagos')");

		$id = $this->db->insert_id();

		return redirect("/pharmacy/venta/factura/$id");
	}

	public function buscar()
	{
		$name = $_GET['name'];

		$sql = "
			SELECT
				id,
				name AS nombre,
				description AS descripcion,
				price AS precio,
				SUM(quantity) AS stock
			FROM
				ha_medicine
			WHERE
				name LIKE '%$name%'
			GROUP BY
				name
			ORDER BY name
		";

		$data = $this->db->query($sql)->result();

		$result = '';

		foreach ($data as $item) {
			$id = $item->id;
			$nombre = $item->nombre;
			$descripcion = $item->descripcion;
			$precio = $item->precio;
			$stock = $item->stock;

			$agregarAlCarrito = "agregarAlCarrito('$id', '$nombre', '$precio', '$stock')";

			$result = "
				$result
				<tr>
                    <td>$id</td>
                    <td><a style=\"color: black\" href=\"\" data-descripcion=\"$descripcion\" data-toggle=\"modal\" data-target=\"#mostrarDescripcion\">$nombre</a></td>
                    <td>$precio</td>
                    <td>$stock</td>
                    <td>
                    	<button type=\"button\" onclick=\"$agregarAlCarrito\" class=\"btn btn-primary btn-sm\">
							<i class=\"fa fa-plus\"></i>
						</button>
                    </td>
                </tr>
			";
		}

		echo $result;
	}

	public function factura($id)
	{
		$data['module'] = 'Farmacia';
		$data['title'] = 'Punto de venta';

		$data['website'] = $this->bill_model->website();

		$sql = "
			SELECT
				v.id AS numero_factura,
				v.fecha,
				CONCAT_WS(' ', p.firstname, p.lastname) AS cliente,
				v.productos AS detalles,
				v.pagos AS pagos,
				v.descuento
			FROM
				ventas_farmacia v
					LEFT JOIN patient p ON v.cliente = p.patient_id
			WHERE
				v.id = $id
		";

		$data['venta'] = $this->db->query($sql)->row();

		$data['content'] = $this->load->view('venta/factura', $data, true);
        return $this->load->view('layout/main_wrapper', $data);
	}
}
