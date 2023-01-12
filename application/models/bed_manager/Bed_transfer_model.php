<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bed_transfer_model extends CI_Model {

	private $table = 'bm_bed_transfer';

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 
	public function read_transfer_bed()
	{ 
		return $this->db->select("
				bm_bed_transfer.*,
				bm_bed.bed_number as bed_name,
				bm_room.charge,
				CONCAT_WS(' ', firstname, lastname) as assign_by
			")
			->from($this->table)
			->join('user', 'user.user_id = bm_bed_transfer.assign_by', 'left')
			->join('bm_bed', 'bm_bed.id = bm_bed_transfer.to_bed_id', 'left')
			->join('bm_room', 'bm_room.id = bm_bed.room_id', 'left')
			->order_by('assign_date','desc')
			->get()
			->result();
	} 
 
	
 }
