<?php

defined('BASEPATH') OR exit('No direct script access allowed');
 
class Professional extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('isLogIn') == false) 
			redirect('login');
	}
 
	public function index()
	{
		$data['module'] = display("billing"); 
		$data['title'] = 'Pagos a profesionales';

		$where = [];

		if (isset($_GET['inicio']) && $_GET['inicio'] != '') {
			$inicio = $_GET['inicio'];
			$where[] =  "DATE(date) >= '$inicio'";
		}

		if (isset($_GET['fin']) && $_GET['fin'] != '') {
			$fin = $_GET['fin'];
			$where[] =  "DATE(date) <= '$fin'";
		}

		if (isset($_GET['estado']) && ($_GET['estado'] != '' && $_GET['estado'] != 'Todos')) {
			if ($estado == 'Pendiente') {
				$where[] =  "status IS NULL";
			} else {
				$where[] =  "status IS NOT NULL";
			}
		}

		if (isset($_GET['profesional']) && ($_GET['profesional'] != '' && $_GET['profesional'] != 'Todos')) {
			$profesional = $_GET['profesional'];
			$where[] =  "professional_id = '$profesional'";
		}

		if (count($where)) {
			$where = implode(' AND ', $where);
		} else {
			$where = '1';
		}

		$sql = "
			SELECT
				d.id,
				s.name AS service_name,
				CONCAT_WS(' ', u.firstname, u.lastname) AS profesional_name,
				d.date,
				d.bill_id,
				d.quantity * (s.amount * (s.professional_commission / 100)) AS amount,
				d.status
			FROM
				bill_details d
					LEFT JOIN bill_service s ON d.service_id = s.id
					LEFT JOIN user u ON d.professional_id = u.user_id
			WHERE
				b.status = 1 AND
				d.professional_id IS NOT NULL AND
				$where
		";

		$data['pagos'] = $this->db->query($sql)->result();

		$data['profesionales'] = $this->db->query("SELECT user_id AS id, CONCAT_WS(' ', firstname, lastname) AS nombre FROM user")->result();

		$data['content'] = $this->load->view('billing/professional/index', $data, true);
		return $this->load->view('layout/main_wrapper', $data);
	}

	public function pagada($id)
	{
		$caja = $this->db->query("SELECT * FROM caja ORDER BY id DESC")->row();

		if ($caja->estado == 'Caja cerrada') {
			$this->session->set_flashdata('exception', 'No puede realizar operaciones de pago porque la caja está cerrada');
			return redirect('/billing/professional');
		}

		$sql = "
			SELECT
				bill_details.bill_id AS numero_factura,
				bill_details.amount AS monto,
				CONCAT_WS(' ', user.firstname, user.lastname) AS nombre_profesional
				bill_service.name AS nombre_profesional
			FROM
				bill_details
					INNER JOIN user ON bill_details.professional_id = user.user_id
					INNER JOIN bill_service ON bill_details.service_id = bill_service.id
			WHERE
				id = $id
		";

		$service = $this->db->query($sql)->row();

		$this->db->query("UPDATE bill_details SET status = 1 WHERE id = $id");

		$nombre_profesional = $service->nombre_profesional;
		$nombre_servicio = $service->nombre_servicio;
		$monto = $service->monto;
		$numero_factura = $service->numero_factura;
		$saldo = $caja->saldo - $monto;

		$concepto = "Pago de honorarios profesionales a $nombre_profesional. Servicio: $nombre_servicio. Factura: $numero_factura.";

		$this->db->query("
			INSERT INTO caja (
				tipo_movimiento, 
				fecha, 
				monto, 
				metodo_pago, 
				concepto, 
				saldo, 
				estado
			) VALUES (
				'Salida', 
				NOW(), 
				'$monto', 
				'Efectivo', 
				'$concepto', 
				'$saldo', 
				'Caja abierta'
			)
		");

		$id = $this->db->insert_id;

		return redirect("/billing/caja/uno/$id");
	}

	public function eliminar($id)
	{
		$this->db->query("DELETE FROM bill_details WHERE id = $id");
		return redirect("/billing/professional");
	}
}
