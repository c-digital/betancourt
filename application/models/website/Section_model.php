<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Section_model extends CI_Model {

	private $table = 'ws_section';
	public function __construct()
	{
		parent::__construct();
		$this->language = $this->input->cookie('Lng', true);
		$this->defualt = $this->db->get('setting')->row()->language;
	}

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}

	public function create_lang($data = [])
	{	 
		return $this->db->insert('ws_section_lang',$data);
	}
 
	public function read()
	{
		return $this->db->select("*")
			->from($this->table)
			->order_by('name','asc')
			->get()
			->result();
	} 

	public function read_lang()
	{
		return $this->db->select("ws_section.name, lang.*")
			->from('ws_section_lang as lang')
			->join($this->table, 'ws_section.id=lang.section_id', 'left')
			->order_by('ws_section.name','asc')
			->get()
			->result();
	} 
 
	public function read_by_id($id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('id',$id)
			->get()
			->row();
	} 

	public function read_lang_by_id($id = null)
	{
		return $this->db->select("ws_section.name, lang.*")
			->from('ws_section_lang as lang')
			->join($this->table, 'ws_section.id=lang.section_id', 'left')
			->where('lang.id',$id)
			->get()
			->row();
	} 
 
	public function update($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update($this->table,$data); 
	} 

	public function update_lang($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update('ws_section_lang',$data); 
	} 
 
	public function delete($id = null)
	{
		$this->db->where('id',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 

	public function delete_lang($id = null)
	{
		$this->db->where('id',$id)
			->delete('ws_section_lang');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	
 }
