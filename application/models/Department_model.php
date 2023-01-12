<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Department_model extends CI_Model {

	private $table = 'department';

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}

	public function create_lang($data = [])
	{	 
		return $this->db->insert('department_lang', $data);
	}
 
	public function read()
	{
		return $this->db->select("*") 
			->from($this->table)
			->order_by('dprt_id','desc')
			->get()
			->result();
	} 

	public function read_language()
	{
		return $this->db->select("department.name as dname, dlang.*") 
			->from('department_lang as dlang')
			->join($this->table, 'department.dprt_id=dlang.department_id', 'left')
			->order_by('department.name','asc')
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

	public function read_lang_by_id($id = null)
	{
		return $this->db->select("*")
			->from('department_lang')
			->where('id',$id)
			->get()
			->row();
	} 
 
	public function update($data = [])
	{
		return $this->db->where('dprt_id',$data['dprt_id'])
			->update($this->table,$data); 
	} 

	public function update_lang($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update('department_lang', $data); 
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

	public function delete_lang($id = null)
	{
		$this->db->where('id',$id)
			->delete('department_lang');

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

 }
