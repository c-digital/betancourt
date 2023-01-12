<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
   

	public function index(){
		$data = array(
			array(
				'phrase' => 'closed_day',
			    'english' => 'Closed day'
			),
			array(
				'phrase' => 'open_day',
			    'english' => 'Open day'
			)
		);
		$this->db->insert('language', $data);
	} 

}
