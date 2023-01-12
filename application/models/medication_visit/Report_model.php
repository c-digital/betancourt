<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

	public function read($data = null)
	{
		$start_date = date('Y-m-d',strtotime($data['start_date']));
		$end_date   = date('Y-m-d',strtotime($data['end_date']));  

		return $this->db->select("medication.*, ha_medicine.name as mname, CONCAT_WS(' ', firstname, lastname) as assign_by, 
			")
			->from('medication') 
			->join('user', 'user.user_id = medication.prescribe_by', 'left')
			->join('ha_medicine', 'ha_medicine.id = medication.medicine_id', 'left')
			->where("medication.from_date BETWEEN '$start_date' AND '$end_date'",null,false) 
			->order_by('medication.from_date','desc')
			->get() 
			->result();
	}

	public function visit_report($data = null)
	{
		$start_date = date('Y-m-d',strtotime($data['start_date']));
		$end_date   = date('Y-m-d',strtotime($data['end_date']));  

		return $this->db->select("pa_visit.*, CONCAT_WS(' ', firstname, lastname) as name
			")
			->from('pa_visit') 
			->join('user', 'user.user_id = pa_visit.user_id', 'left')
			->where("pa_visit.visit_date BETWEEN '$start_date' AND '$end_date'",null,false) 
			->order_by('pa_visit.visit_date','desc')
			->get() 
			->result();
	}
 

	public function details($data = null)
	{ 
		$assign_date = date('Y-m-d',strtotime($data['assign_date']));  

		return $this->db->select("
				bm_bed_assign.*,
				COUNT(bm_bed_assign.bed_id) as allocated, 
				bm_bed.bed_number as bed_name,
				bm_room.charge, 
				bm_bed.description as bed_description,
				CONCAT_WS(' ', firstname, lastname) as assign_by
			")
			->from('bm_bed_assign')
			->join('user', 'user.user_id = bm_bed_assign.assign_by', 'left')
			->join('bm_bed', 'bm_bed.id = bm_bed_assign.bed_id', 'left')
			->join('bm_room', 'bm_room.id = bm_bed.room_id', 'left')
			->where('bm_bed_assign.assign_date',$data['assign_date'])
			->where('bm_bed_assign.bed_id',$data['bed_id'])
			->where('bm_bed_assign.status', 1)
			->group_by(array('serial'))
			->order_by('discharge_date','asc') 
			->get()
			->result();
	}  

  public function fetch_data($query)
	{
		if($query != '')
		{
			$this->db->select('medication.*');
			$this->db->from('medication');
			$this->db->like('medication.patient_id', $query);
			$this->db->or_like('Patient.mobile', $query);
			$this->db->or_like('medication.other_instruction', $query);
			$this->db->or_like('Patient.firstname', $query);
			$this->db->or_like('Patient.lastname', $query);
			$this->db->join('Patient', 'Patient.patient_id = medication.patient_id', 'left');
			$this->db->order_by('medication.from_date', 'DESC');
			return $this->db->get();
	    }
	}

}
