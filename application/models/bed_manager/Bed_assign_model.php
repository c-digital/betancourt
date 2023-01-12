<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bed_assign_model extends CI_Model {

	private $table = 'bm_bed_assign';

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
   
	public function read()
	{
		return $this->db->select("
				bm_bed_assign.*, 
				bm_bed.bed_number as bed_name,
				bm_room.charge,
				CONCAT_WS(' ', user.firstname, user.lastname) as assign_by,
				patient.id AS pid,
				CONCAT_WS(' ', patient.firstname, patient.lastname) as patient_name
			")
			->from('bm_bed_assign')
			->join('user', 'user.user_id = bm_bed_assign.assign_by', 'left')
			->join('bm_bed', 'bm_bed.id = bm_bed_assign.bed_id', 'left')
			->join('patient', 'patient.patient_id = bm_bed_assign.patient_id', 'left')
			->join('bm_room', 'bm_room.id = bm_bed.room_id', 'left')
			->group_by(array('bm_bed_assign.serial','bm_bed_assign.patient_id'))
			->order_by('bm_bed_assign.assign_date','desc')
			->get()
			->result();
	} 
 
	public function read_by_serial($serial = null)
	{
		return $this->db->select("
				bm_bed_assign.*, 
				bm_bed.bed_number as bed_name,
				CONCAT_WS(' ', firstname, lastname) as assign_by
			")
			->from('bm_bed_assign')
			->join('user', 'user.user_id = bm_bed_assign.assign_by', 'left')
			->join('bm_bed', 'bm_bed.id = bm_bed_assign.bed_id', 'left')
			->where('bm_bed_assign.serial',$serial)
			->group_by(array('serial','patient_id'))
			->order_by('assign_date','asc')
			->get()
			->row();
	} 

	public function read_bed_assign_by_serial($serial = null){
		return $this->db->select("*")
			->from('bm_bed_assign')
			->where('serial',$serial)
			->get()
			->row();
	} 

	public function read_bed_assign_by_pid($pid = null){
		return $this->db->select("*")
			->from('bm_bed_assign')
			->where('patient_id',$pid)
			->get()
			->row();
	} 
  
	public function update($data = []){ 
		return $this->db->where('id',$data['id'])
			->update($this->table,$data); 
	} 

	public function update_assign_data($data = []){
		return $this->db->where('serial',$data['serial'])
			->update($this->table,$data); 
	}
 
	public function delete($serial = null)
	{
		$this->db->where('serial',$serial)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 

	// discharged bed assign
	public function bed_discharge($data = []){
		return $this->db->where('serial',$data['serial'])
			->update($this->table,$data); 
	}

	// discharged bed assign by pid
	public function bed_discharge_by_pid($data = []){
		return $this->db->where('patient_id',$data['patient_id'])
			->update($this->table,$data); 
	}
 
 }
