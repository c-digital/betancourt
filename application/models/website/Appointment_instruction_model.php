<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment_instruction_model extends CI_Model { 

	public function __construct()
	{
		parent::__construct();
		$this->language = $this->input->cookie('Lng', true);
		$this->defualt = $this->db->get('setting')->row()->language;
	}

	private $table = 'ws_appoint_instruction';

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
  
	public function read()
	{
		return $this->db->select("*")
			->from($this->table)
			->order_by('id','asc')
			->get()
			->result();
	} 

	public function read_by_id($id)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('id',$id)
			->get()
			->row();
	} 

	public function read_active_instuction()
	{
		return $this->db->select("*")
			->from($this->table)
			->where('status',1)
			->where('language',(!empty($this->language)?$this->language:$this->defualt))
			->order_by('id', 'desc')
			->limit(1)
			->get()
			->row();
	} 

	public function update($data = []){
		return $this->db->where('id', $data['id'])
				 ->update($this->table, $data);
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
