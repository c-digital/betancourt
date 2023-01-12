<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->language = $this->input->cookie('Lng', true);
		$this->defualt = $this->db->get('setting')->row()->language;
	}

	private $table = 'ws_menu';

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}

	public function create_lang($data = [])
	{	 
		return $this->db->insert('ws_menu_lang',$data);
	}
  
	public function read()
	{
		return $this->db->select("*")
			->from($this->table)
			->order_by('id','asc')
			->get()
			->result();
	} 

	public function read_language()
	{
		return $this->db->select("lang.*, ws_menu.name")
			->from('ws_menu_lang as lang')
			->join($this->table, 'ws_menu.id=lang.menu_id', 'left')
			->order_by('lang.id','asc')
			->get()
			->result();
	} 

	public function get_parent_menu(){
		$categories = $this->db->select("content.id as content_id, ws_menu.id as id, content.url, ws_menu.name,lang.title")
			->from('ws_page_content as content')
			->join($this->table, 'ws_menu.id=content.menu_id', 'left')
			->join('ws_menu_lang as lang', 'lang.menu_id=content.menu_id')
			->where('ws_menu.status', 1)
			->where('ws_menu.parent_id', 0)
			->where('lang.language', (!empty($this->language)?$this->language:$this->defualt))
			->order_by('ws_menu.position','asc')
			->get()
			->result();
		$i = 0;
		foreach ($categories as $parent) {
			$categories[$i]->sub = $this->sub_menu($parent->id);
			$i++;
		}
		return $categories;
	}

	public function sub_menu($id = null){
		$categories = $this->db->select("content.id as content_id, ws_menu.id, content.url, ws_menu.name, lang.title , ws_menu.parent_id")
                      ->from('ws_page_content as content')
                      ->join('ws_menu', 'ws_menu.id=content.menu_id', 'left')
                      ->join('ws_menu_lang as lang', 'lang.menu_id=content.menu_id')
                      ->where('ws_menu.status', 1)
                      ->where('ws_menu.parent_id', $id)
                      ->where('lang.language', (!empty($this->language)?$this->language:$this->defualt))
                      ->order_by('ws_menu.position','asc')
                      ->get()
                      ->result();
         $i = 0;
		foreach ($categories as $parent) {
			$categories[$i]->sub = $this->sub_menu($parent->id);
			$i++;
		}
		return $categories;

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
		return $this->db->select("lang.*, ws_menu.name")
			->from('ws_menu_lang as lang')
			->join($this->table, 'ws_menu.id=lang.menu_id', 'left')
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
			->update('ws_menu_lang',$data); 
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
			->delete('ws_menu_lang');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}  

	public function menu_list()
	{
		$result = $this->db->select("*")
			->from($this->table)
			->get()
			->result();

		$list[''] = display('select_menu');
		if (!empty($result)) {
			foreach ($result as $value) {
				$list[$value->id] = $value->name; 
			}
			return $list;
		} else {
			return false;
		}
	}

	public function template_menu_list()
	{
		$result = $this->db->select("*")
			->from($this->table)
			->where('fixed', 0)
			->get()
			->result();

		$list[''] = display('select_menu');
		if (!empty($result)) {
			foreach ($result as $value) {
				$list[$value->id] = $value->name; 
			}
			return $list;
		} else {
			return false;
		}
	}
	
 }
