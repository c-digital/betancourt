<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Visit_model extends CI_Model {

	private $table = 'pa_visit';

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 
	public function read()
	{
		return $this->db->select("pa_visit.*, CONCAT_WS(' ', user.firstname, user.lastname) as name")
			->from($this->table)
			->join('user', 'user.user_id=pa_visit.user_id', 'left')
			->order_by('pa_visit.visit_date','desc')
			->get()
			->result();
	}  

	// visit info get by doctor
	public function read_doctor()
	{
		return $this->db->select("pa_visit.*, CONCAT_WS(' ', user.firstname, user.lastname) as name")
			->from($this->table)
			->join('user', 'user.user_id=pa_visit.user_id', 'left')
			->where('pa_visit.user_id', $this->session->userdata('user_id'))
			->order_by('pa_visit.visit_date','desc')
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

 }
