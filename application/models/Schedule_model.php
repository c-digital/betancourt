<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_model extends CI_Model {

	private $table = "schedule";
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
		return $this->db->select("schedule.*, user.firstname, user.lastname, department.name")
			->from($this->table)
			->join('user','user.user_id = schedule.doctor_id','left')
			->join('department','department.dprt_id = user.department_id','left')
			->order_by('schedule.schedule_id','desc')
			->get()
			->result();
	} 
  

	public function read_by_id($schedule_id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('schedule_id',$schedule_id)
			->get()
			->row();
	} 

	public function read_by_doctor_id($user_id = null) 
	{
		return $this->db->select("time_slot.id, time_slot.slot as name")
			->from($this->table)
			->join('time_slot','time_slot.id = schedule.slot_id','left')
			->where('doctor_id',$user_id)
			->group_by('time_slot.slot')
			->order_by('time_slot.slot', 'asc')
			->get()
			->result();
	} 

	public function schedule_by_slot_id($user_id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('doctor_id',$user_id)
			->get()
			->result();
	} 
 
 
	public function update($data = [])
	{
		return $this->db->where('schedule_id',$data['schedule_id'])
			->update($this->table,$data); 
	} 
 
	public function delete($schedule_id = null)
	{
		$this->db->where('schedule_id',$schedule_id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 

	/*
	 |----------Time Slot-----------
	*/
	public function create_slot($data = [])
	 {	 
		return $this->db->insert('time_slot',$data);
   	 }
 
	public function read_slot()
	{
		return $this->db->select("*")
			->from('time_slot')
			->order_by('slot', 'asc')
			->get()
			->result();
	} 


	public function read_slot_by_id($id = null)
	{
		return $this->db->select("*")
			->from('time_slot')
			->where('id',$id)
			->get()
			->row();
	} 
 
 
	public function update_slot($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update('time_slot',$data); 
	} 
 
	public function delete_slot($id = null)
	{
		$this->db->where('id',$id)
			->delete('time_slot');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 

	public function slot_list()
	{
		$result = $this->db->select("*")
			->from('time_slot')         
			->where('status',1)
			->get()
			->result();

		$list[''] = display('slot_list');
		if (!empty($result)) {
			foreach ($result as $value) {
				$list[$value->id] = $value->slot; 
			}
			return $list;
		} else {
			return false;
		}
	}

	public function get_schedule_by_dprt_id($id){
		return $this->db->select("user.department_id, user_lang.*")
			->from('user_lang')  
			->join('user', 'user.user_id=user_lang.user_id', 'left')       
			->where('user.status',1)
			->where('user.user_role',2)
			->where('user.department_id',$id)
			->where('user_lang.language', (!empty($this->language)?$this->language:$this->defualt))
			->get()
			->result();

	}
   

}
