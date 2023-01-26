<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller
{ 
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('isLogIn') == false) 
			redirect('login');
	}

	public function cash()
	{
		$data['module'] = 'Ventas';
		$data['title'] = 'Venta de contado';

		$select = "
			ba.admission_id,
			CONCAT_WS(' ', p.lastname, p.firstname) AS name,
			p.date_of_birth,
			p.picture,
			p.sex,
			p.address,
			p.email,
			p.mobile,
			p.blood_group,
			ba.admission_date,
			ba.discharge_date,
			CONCAT_WS(' ', u.lastname, u.firstname) AS doctor
		";

		$data['admission'] = $this->db->select($select)
			->from('bill_admission ba')
			->join('patient p', 'p.patient_id = ba.patient_id', 'left')
			->join('user u', 'u.user_id = ba.doctor_id', 'left')
			->get()
			->row();

		$data['content'] = $this->load->view('sales/cash', $data, true);
		return $this->load->view('layout/main_wrapper', $data);
	}
}
