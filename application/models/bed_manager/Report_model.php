<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

	public function read($data = null)
	{
		$start_date = date('Y-m-d',strtotime($data['start_date']));
		$end_date   = date('Y-m-d',strtotime($data['end_date']));  

		return $this->db->select("
				bm_bed_assign.assign_date,
				bm_bed_assign.status,
				bm_bed_assign.patient_id,
				bm_bed_assign.discharge_date,
				bm_bed.bed_number, 
				bm_bed.description,
				bm_room.room_name,  
				bm_room.limit, 
				bm_room.charge,
				CONCAT_WS(' ', firstname, lastname) as assign_by
			")
			->from('bm_bed_assign') 
			->join('user', 'user.user_id = bm_bed_assign.assign_by', 'left')
			->join('bm_bed', 'bm_bed.id = bm_bed_assign.bed_id', 'left')
			->join('bm_room', 'bm_room.id = bm_bed.room_id', 'left')
			->where("bm_bed_assign.assign_date BETWEEN '$start_date' AND '$end_date'",null,false) 
			//->where('bm_bed_assign.status', 1)
			->order_by('assign_date','desc')
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

}
