<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Template_model extends CI_Model {

	private $table = 'ws_page_content';

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 
	public function read()
	{
		return $this->db->select("ws_page_content.*, ws_menu.name")
			->from($this->table)
			->join('ws_menu', 'ws_menu.id=ws_page_content.menu_id', 'left')
			->where('ws_menu.fixed', 0)
			->order_by('ws_menu.id','asc')
			->get()
			->result();
	} 

	public function read_news()
	{
		return $this->db->select("ws_news.*, department.name")
			->from($this->table)
			->join('department', 'department.dprt_id=ws_news.dept_id', 'left')
			->where('ws_news.status',1)
			->limit(3)
			->order_by('ws_news.id','desc')
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

	public function read_related_news($dept_id = null){
		return $this->db->select("ws_news.*, department.name")
			->from($this->table)
			->join('department', 'department.dprt_id=ws_news.dept_id', 'left')
			->where('ws_news.status',1)
			->where('ws_news.dept_id', $dept_id)
			->limit(3)
			->order_by('ws_news.id','desc')
			->get()
			->result();
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
	
 }
