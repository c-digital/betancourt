<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial_model extends CI_Model {

	private $table = 'ws_testimonial';
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
		return $this->db->insert('ws_testimonial_lang', $data);
	}
 
	public function read()
	{
		return $this->db->select("*")
			->from($this->table)
			->order_by('id','desc')
			->get()
			->result();
	} 
 
	public function read_active()
	{
		return $this->db->select("lang.title, lang.author_name, lang.quotation, ws_testimonial.url")
			->from('ws_testimonial_lang as lang')
			->join($this->table, 'ws_testimonial.id=lang.tstml_id')
			->where('lang.language', (!empty($this->language)?$this->language:$this->defualt))
			->where('status', 1)
			->limit(1)
			->get()
			->result();
	} 

	public function read_lang()
	{
		return $this->db->select("ws_testimonial.author_name as author, ws_testimonial.image, ws_testimonial.url, lang.*")
			->from('ws_testimonial_lang as lang')
			->join($this->table, 'ws_testimonial.id=lang.tstml_id')
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
		return $this->db->select("*")
			->from('ws_testimonial_lang')
			->where('id',$id)
			->get()
			->row();
	}  
 
	public function update($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update($this->table, $data); 
	} 

	public function update_lang($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update('ws_testimonial_lang', $data); 
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
			->delete('ws_testimonial_lang');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}  

	public function read_testimonial_about_us()
	{
		return $this->db->select("lang.title, lang.author_name, lang.quotation, ws_testimonial.url, ws_testimonial.image")
			->from('ws_testimonial_lang as lang')
			->join($this->table, 'ws_testimonial.id=lang.tstml_id')
			->where('lang.language', (!empty($this->language)?$this->language:$this->defualt))
			->limit(6)
			->order_by('lang.id','desc')
			->get()
			->result();
	} 
	
 }
