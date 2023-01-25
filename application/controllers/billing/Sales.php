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

		$data['content'] = $this->load->view('sales/cash', $data, true);
		return $this->load->view('layout/main_wrapper', $data);
	}
}
