<?php

defined('BASEPATH') OR exit('No direct script access allowed');
 
class Caja extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
            'billing/bill_model'
        ));

		if ($this->session->userdata('isLogIn') == false) 
			redirect('login');
			
		$this->db->query("SET sql_mode=''");
	}
 
	public function index()
	{
		$data['module'] = display("billing"); 
		$data['title'] = 'Caja';
      
      	$cajero = $this->session->userdata('fullname');

		$where = [];

		if (isset($_GET['inicio']) && $_GET['inicio'] != '') {
			$inicio = $_GET['inicio'];
			$where[] =  "DATE(fecha) >= '$inicio'";
		}

		if (isset($_GET['fin']) && $_GET['fin'] != '') {
			$fin = $_GET['fin'];
			$where[] =  "DATE(fecha) <= '$fin'";
		}

		if (isset($_GET['tipo_movimiento']) && ($_GET['tipo_movimiento'] != '' && $_GET['tipo_movimiento'] != 'Todos')) {
			$tipo_movimiento = $_GET['tipo_movimiento'];
			$where[] =  "tipo_movimiento = '$tipo_movimiento'";
		}

		if (isset($_GET['metodo_pago']) && ($_GET['metodo_pago'] != '' && $_GET['metodo_pago'] != 'Todos')) {
			$metodo_pago = $_GET['metodo_pago'];
			$where[] =  "metodo_pago = '$metodo_pago'";
		}

		if (isset($_GET['cajero']) && ($_GET['cajero'] != '' && $_GET['cajero'] != 'Todos')) {
			$cajero_select = $_GET['cajero'];
			$where[] =  "cajero = '$cajero_select'";
		}

		if (count($where)) {
			$where = implode(' AND ', $where);
		} else {
			$where = "fecha > (SELECT fecha FROM caja WHERE estado = 'Caja cerrada' ORDER BY id DESC LIMIT 1) AND cajero = '$cajero'";
		}

		$data['movimientos'] = $this->db->query("SELECT * FROM caja WHERE $where")->result();

		$caja = $this->db->query("SELECT * FROM caja WHERE cajero = '$cajero' ORDER BY id DESC")->row();
		$data['estado'] = $caja->estado;
		$data['saldo'] = $caja->saldo;

		$data['entradas'] = $this->db->query("SELECT SUM(monto) AS entradas FROM caja WHERE tipo_movimiento = 'Entrada' AND fecha >= (SELECT fecha FROM caja WHERE estado = 'Caja cerrada' ORDER BY id DESC LIMIT 1) AND cajero = '$cajero'")->row()->entradas;

		$data['salidas'] = $this->db->query("SELECT SUM(monto) AS salidas FROM caja WHERE tipo_movimiento = 'Salida' AND fecha > (SELECT fecha FROM caja WHERE estado = 'Caja cerrada' ORDER BY id DESC LIMIT 1)  AND cajero = '$cajero'")->row()->salidas;

		$data['cajeros'] = $this->db->query("SELECT user_id AS id, CONCAT_WS(' ', firstname, lastname) AS nombre FROM user")->result();

		$data['content'] = $this->load->view('billing/caja/index', $data, true);
		$this->load->view('layout/main_wrapper', $data);
	}

	public function guardar()
	{		
		extract($_POST);

		$caja = $this->db->query("SELECT * FROM caja ORDER BY id DESC")->row();

		if ($tipo_movimiento == 'Entrada') {
			$saldo = (float) $caja->saldo + (float) $monto;
		}

		if ($tipo_movimiento == 'Salida') {
			$saldo = (float) $caja->saldo - (float) $monto;
		}

		$cajero = $this->session->userdata('fullname');

		$this->db->query("INSERT INTO caja (tipo_movimiento, fecha, monto, metodo_pago, concepto, saldo, estado, cajero) VALUES ('$tipo_movimiento', NOW(), '$monto', '$metodo_pago', '$concepto', '$saldo', 'Caja abierta', '$cajero')");

		$id = $this->db->insert_id();

		redirect("/billing/caja/uno/$id");
	}

	public function cierre()
	{
		$saldo = $this->db->query("SELECT * FROM caja ORDER BY id DESC LIMIT 1")->row()->saldo;

		$cajero = $this->session->userdata('fullname');

		$this->db->query("INSERT INTO caja (tipo_movimiento, fecha, monto, concepto, saldo, estado, cajero) VALUES ('Salida', NOW(), '$saldo', 'Cierre de caja', 0, 'Caja cerrada', '$cajero')");

		redirect('/billing/caja/todo');
	}

	public function todo()
	{
		$data['title'] = 'Cierre de caja';
        $data['website'] = $this->bill_model->website();
      
      	$cajero = $this->session->userdata('fullname');

        $data['movimientos'] = $this->db->query("SELECT * FROM caja WHERE concepto NOT LIKE '%cierre%' AND cajero = '$cajero' AND fecha > (SELECT fecha FROM caja WHERE estado = 'Caja cerrada' AND cajero = '$cajero' ORDER BY id DESC LIMIT 1, 1) ORDER BY id DESC")->result();

        $caja = $this->db->query("SELECT * FROM caja WHERE cajero = '$cajero' ORDER BY id DESC")->row();
		$data['estado'] = $caja->estado;
		$data['saldo'] = $caja->saldo;

		$data['entradas'] = $this->db->query("SELECT SUM(monto) AS entradas FROM caja WHERE cajero = '$cajero' AND tipo_movimiento = 'Entrada' AND fecha >= (SELECT fecha FROM caja WHERE estado = 'Caja cerrada' ORDER BY id DESC LIMIT 1 OFFSET 1)")->row()->entradas;

		$data['salidas'] = $this->db->query("SELECT SUM(monto) AS salidas FROM caja WHERE cajero = '$cajero' AND concepto NOT LIKE '%cierre%' AND tipo_movimiento = 'Salida' AND fecha > (SELECT fecha FROM caja WHERE estado = 'Caja cerrada' ORDER BY id DESC LIMIT 1 OFFSET 1)")->row()->salidas;

		$data['tipos'] = $this->db->query("SELECT metodo_pago, SUM(monto) AS total FROM caja WHERE cajero = '$cajero' AND tipo_movimiento = 'Entrada' AND fecha > (SELECT fecha FROM caja WHERE cajero = '$cajero' AND estado = 'Caja cerrada' ORDER BY id DESC LIMIT 1, 1) GROUP BY metodo_pago")->result();

		$data['content'] = $this->load->view('billing/caja/todo', $data, true);
        $this->load->view('layout/main_wrapper', $data);
	}

	public function uno($id)
	{
		$data['title'] = 'Recibo de caja';
        $data['website'] = $this->bill_model->website();

		$data['movimiento'] = $this->db->query("SELECT * FROM caja WHERE id = $id")->row();

		$data['content'] = $this->load->view('billing/caja/uno', $data, true);
        $this->load->view('layout/main_wrapper', $data);
	}

	public function apertura()
	{
		extract($_POST);

		$cajero = $this->session->userdata('fullname');

		$this->db->query("INSERT INTO caja (tipo_movimiento, fecha, monto, concepto, saldo, estado, metodo_pago, cajero) VALUES ('Entrada', NOW(), '$monto', 'Apertura de caja', '$monto', 'Caja abierta', 'Efectivo', '$cajero')");

		redirect('/billing/caja');
	}
}
