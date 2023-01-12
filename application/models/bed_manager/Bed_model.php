<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bed_model extends CI_Model {

	private $table = 'bm_bed';

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 
	public function read()
	{
		return $this->db->select("
				bm_bed.*, bm_room.room_name
			")
			->from('bm_bed')
			->join('bm_room', 'bm_room.id = bm_bed.room_id', 'left')
			->order_by('bm_room.room_name','asc')
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

	public function bed_list()
	{
		$result = $this->db->select("*")
			->from($this->table)
			->where('status',0)
			->get()
			->result();

		$list[''] = display('select_bed');
		if (!empty($result)) {
			foreach ($result as $value) {
				$list[$value->id] = $value->bed_number; 
			}
			return $list;
		} else {
			return false;
		}
	}

	#================================
	# update bed when patient discharged
	#================================
	public function update_bed_status($bed_id, $status){
		$data['status'] = 1 - $status;
		return $this->db->where('id',$bed_id)
			->update($this->table,$data); 
	}
	
 }
