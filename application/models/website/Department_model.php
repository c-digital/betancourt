<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Department_model extends CI_Model {

	private $table = 'department';
	public function __construct()
	{
		parent::__construct();
		$this->language = $this->input->cookie('Lng', true);
		$this->defualt = $this->db->get('setting')->row()->language;
	}
 
	public function read()
	{
		return $this->db->select("department.dprt_id,department.main_id, department.flaticon, department.image, lang.*") 
			->from('department_lang as lang')
			->join($this->table, 'department.dprt_id=lang.department_id', 'left')
			->where('lang.language', (!empty($this->language)?$this->language:$this->defualt))
			->where('lang.status', 1)
			->order_by('lang.name','asc')
			->get()
			->result();
	}  

	public function read_footer()
	{
		return $this->db->select("department.dprt_id,department.main_id, department.flaticon, department.image, lang.*") 
			->from('department_lang as lang')
			->join($this->table, 'department.dprt_id=lang.department_id', 'left')
			->where('lang.language', (!empty($this->language)?$this->language:$this->defualt))
			->where('lang.status', 1)
			->limit(7)
			->order_by('lang.name','asc')
			->get()
			->result();
	} 
 
	public function read_by_id($dprt_id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('dprt_id',$dprt_id)
			->get()
			->row();
	} 

	public function read_ws_by_id($dprt_id = null)
	{
		return $this->db->select("department.dprt_id,department.main_id, department.flaticon, department.image, lang.*")
			->from('department_lang as lang')
			->join($this->table, 'department.dprt_id=lang.department_id', 'left')
			->where('lang.language', (!empty($this->language)?$this->language:$this->defualt))
			->where('lang.department_id',$dprt_id)
			->get()
			->row();
	} 
 
	public function update($data = [])
	{
		return $this->db->where('dprt_id',$data['dprt_id'])
			->update($this->table,$data); 
	} 
 
	public function delete($dprt_id = null)
	{
		$this->db->where('dprt_id',$dprt_id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 

	public function department_list()
	{
		$result = $this->db->select("*")
			->from($this->table)
			->where('status',1)
			->get()
			->result();

		$list[''] = display('select_department');
		if (!empty($result)) {
			foreach ($result as $value) {
				$list[$value->dprt_id] = $value->name; 
			}
			return $list;
		} else {
			return false;
		}
	}

	public function read_home_slider()
	{
		return $this->db->select("*") 
			->from($this->table)
			->limit(4)
			->order_by('dprt_id','desc')
			->get()
			->result();
	} 

	public function related_department($id){
		$department = $this->db->select("*")
			->from($this->table)
			->where('dprt_id',$id)
			->get()
			->row();
	    $departments =$this->db->select("department.dprt_id,department.main_id, department.flaticon, department.image, lang.*")
			->from('department_lang as lang')
			->join($this->table, 'department.dprt_id=lang.department_id', 'left')
			->where('lang.language', (!empty($this->language)?$this->language:$this->defualt))
			->where('department.main_id',$department->main_id)
			->order_by('lang.name','asc')
			->get()
			->result();
		return $departments;
	}
	
 }
