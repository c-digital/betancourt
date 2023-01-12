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
