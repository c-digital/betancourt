<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Medication_model extends CI_Model {

	private $table = 'medication';

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	} 
 
 	// read all medication 
	public function read()
	{
		return $this->db->select("
				medication.*, 
				ha_medicine.name,
				patient.id AS pid,
				CONCAT(' ', patient.firstname, patient.lastname) AS patient,
				CONCAT(' ', user.firstname, user.lastname) AS doctor
			")
			->from($this->table)
			->join('patient', 'patient.patient_id=medication.patient_id', 'left')
			->join('ha_medicine', 'ha_medicine.id=medication.medicine_id', 'left')
			->join('user', 'user.user_id=medication.prescribe_by', 'left')
			->order_by('medication.from_date','desc')
			->get()
			->result();
	}  

	// read medication by doctor
	public function read_doctor()
	{
		return $this->db->select("
				medication.*, 
				ha_medicine.name,
				patient.id AS pid,
				CONCAT(' ', patient.firstname, patient.lastname) AS patient,
				CONCAT(' ', user.firstname, user.lastname) AS doctor
			")
			->from($this->table)
			->join('patient', 'patient.patient_id=medication.patient_id', 'left')
			->join('user', 'user.user_id=medication.prescribe_by', 'left')
			->join('ha_medicine', 'ha_medicine.id=medication.medicine_id', 'left')
			->where('medication.prescribe_by', $this->session->userdata('user_id'))
			->order_by('medication.from_date','desc')
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
