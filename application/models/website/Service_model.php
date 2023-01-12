<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends CI_Model {

	private $table = 'ws_service';
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
  
	public function read()
	{
		return $this->db->select("*")
			->from($this->table)
			->where('is_parent', 0)
			->order_by('position','asc')
			->get()
			->result();
	} 

	public function read_language()
	{
		return $this->db->select("*")
			->from($this->table)
			->where('is_parent !=', 0)
			->order_by('is_parent','asc')
			->get()
			->result();
	} 

	public function read_website($limit, $start)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('status', 1)
			->where('language', (!empty($this->language)?$this->language:$this->defualt))
			->limit($limit, $start)
			->order_by('position','asc')
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

	public function record_count() {
        return $this->db->select("*")
			->from($this->table)
			->where('status',1)
			->where('language', (!empty($this->language)?$this->language:$this->defualt))
			->count_all_results();
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
	
 }
