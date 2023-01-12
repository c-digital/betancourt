<?php defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {

	private $defualt;
	private $table = 'ws_news';
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

	// insert news language content
	public function create_language($data = [])
	{	 
		return $this->db->insert('ws_news_language',$data);
	} 
 
	public function read()
	{
		return $this->db->select("ws_news.*, department.name")
			->from($this->table)
			->join('department', 'department.dprt_id=ws_news.dept_id', 'left')
			->order_by('ws_news.id','desc')
			->get()
			->result();
	} 

	public function read_language_content(){
		return $this->db->select("ws_news.featured_image, ws_news.create_date, department.name, lang.*")
			->from('ws_news_language lang')
			->join($this->table, 'ws_news.id=lang.news_id', 'left')
			->join('department', 'department.dprt_id=ws_news.dept_id', 'left')
			->order_by('ws_news.title','ase')
			->get()
			->result();
	}

	public function read_news()
	{
		return $this->db->select("ws_news.id as nid, ws_news.create_date, ws_news.featured_image, department.name, lang.*")
			->from('ws_news_language lang')
			->join($this->table, 'ws_news.id=lang.news_id', 'left')
			->join('department', 'department.dprt_id=ws_news.dept_id', 'left')
			->where('ws_news.status',1)
			->where('lang.language', (!empty($this->language)?$this->language:$this->defualt))
			->limit(3)
			->order_by('ws_news.create_date','asc')
			->get()
			->result();
	} 
 
	public function read_by_id($id = null)
	{
		return $this->db->select("ws_news.*, department.name")
			->from($this->table)
			->join('department', 'department.dprt_id=ws_news.dept_id', 'left')
			->where('ws_news.id',$id)
			->get()
			->row();
	} 
 
 	// details view for website
	public function read_news_by_id($id = null)
	{
		return $this->db->select("ws_news.dept_id, ws_news.create_date, ws_news.featured_image, department.name, lang.*")
			->from('ws_news_language AS lang')
			->join('ws_news', 'ws_news.id=lang.news_id', 'left')
			->join('department', 'department.dprt_id=ws_news.dept_id', 'left')
			->where('lang.language', (!empty($this->language)?$this->language:$this->defualt))
			->where('lang.news_id',$id)
			->get()
			->row();
	} 

	// get language content by id
	public function read_lang_content_by_id($id = null)
	{
		return $this->db->select("ws_news.featured_image, lang.*")
			->from('ws_news_language lang')
			->join($this->table, 'ws_news.id=lang.news_id', 'left')
			->where('lang.id',$id)
			->get()
			->row();
	} 
	
	public function update($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update($this->table,$data); 
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

	public function update_language($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update('ws_news_language',$data); 
	} 
 
	public function delete_language($id = null)
	{
		$this->db->where('id',$id)
			->delete('ws_news_language');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}  

	public function read_related_news($dept_id = null){
		return $this->db->select("ws_news.id as nid, ws_news.create_date, ws_news.featured_image, department.name, lang.*")
			->from('ws_news_language lang')
			->join($this->table, 'ws_news.id=lang.news_id', 'left')
			->join('department', 'department.dprt_id=ws_news.dept_id', 'left')
			->where('ws_news.status',1)
			->where('lang.language', (!empty($this->language)?$this->language:$this->defualt))
			->where('ws_news.dept_id',$dept_id)
			->order_by('ws_news.create_date','asc')
			->get()
			->result();
	}
	
 }
