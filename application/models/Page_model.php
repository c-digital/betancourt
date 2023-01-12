<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends CI_Model {

	private $table = 'ws_page_content';
	public function __construct()
	{
		parent::__construct();
		$this->language = $this->input->cookie('Lng', true);
		$this->defualt = $this->db->get('setting')->row()->language;
	}

	public function read_contents($id = null){
		return $this->db->select("ws_page_content.*, lang.title as menu")
			->from($this->table)
			->join('ws_menu', 'ws_menu.id=ws_page_content.menu_id', 'left')
			->join('ws_menu_lang as lang', 'lang.menu_id=ws_page_content.menu_id')
			->where('ws_menu.status', 1)
			->where('lang.language', (!empty($this->language)?$this->language:$this->defualt))
			->where('ws_page_content.id', $id)
			->get()
			->row();
	}
	
 }
