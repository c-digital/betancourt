<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model {

	private $table = 'message';
	private $_replies = 'patient_message_replies';
	private $_message = 'patient_messages';

	public function create($data = [])
	{	 
		return $this->db->insert($this->_message,$data);
	}

	public function add_replies($data = []){	 
		return $this->db->insert($this->_replies,$data);
	}

	public function inbox($userId, $type){
		if($type=='patient'){
			return $this->db->select("$this->_message.*, 
				CONCAT_WS(' ', user.firstname, user.lastname) as sender_name")
				->from($this->_message)
				->join("user", "user.user_id = $this->_message.sender_id")
				->where("$this->_message.receiver_id", $userId)
				->order_by("$this->_message.id","desc")
				->get()
				->result();
		}else{
			return $this->db->select("$this->_message.*, 
				CONCAT_WS(' ', patient.firstname, patient.lastname) as sender_name")
				->from($this->_message)
				->join("patient", "patient.patient_id = $this->_message.sender_id")
				->where("$this->_message.receiver_id", $userId)
				->order_by("$this->_message.id","desc")
				->get()
				->result();
		}
	} 
 
	public function sent($userId, $type){
		if($type=='patient'){
			return $this->db->select("$this->_message.*, 
				CONCAT_WS(' ', user.firstname, user.lastname) as receiver_name")
				->from($this->_message)
				->join("user", "user.user_id = $this->_message.receiver_id")
				->where("$this->_message.sender_id", $userId)
				->where("$this->_message.type", "patient")
				->order_by("$this->_message.id","desc")
				->get()
				->result();
		}else{
			return $this->db->select("$this->_message.*, 
				CONCAT_WS(' ', patient.firstname, patient.lastname) as receiver_name")
				->from($this->_message)
				->join("patient", "patient.patient_id = $this->_message.receiver_id")
				->where("$this->_message.sender_id", $userId)
				->where("$this->_message.type", "user")
				->order_by("$this->_message.id","desc")
				->get()
				->result();
		}
	} 
 
	public function inbox_information($id = null, $sender_id = null, $receiver_id = null){

		return $this->db->select("message.*, 
				CONCAT_WS(' ', user.firstname, user.lastname) as sender_name")
			->from("message")
			->join('user', 'user.user_id = message.sender_id')
			->where('message.receiver_id', $receiver_id)
			->where('message.id', $id)
			->where_not_in('message.receiver_status', 2)
			->order_by('message.id','desc')
			->order_by('message.receiver_status','asc')
			->get()
			->row();
	} 
 
	public function sent_information($id = null, $type = null){
		if($type=='patient'){
			$query = $this->db->select("$this->_message.*, 
				CONCAT_WS(' ', patient.firstname, patient.lastname) as receiver_name,  patient.picture, patient.email")
					->from($this->_message)
					->join("patient", "patient.patient_id = $this->_message.sender_id")
					->where("$this->_message.id", $id)
					->get()
					->row();
			$query->allreplies = $this->getAllReplies($id);
		}else{
			$query = $this->db->select("$this->_message.*, 
				CONCAT_WS(' ', user.firstname, user.lastname) as receiver_name, user.picture, user.email")
					->from($this->_message)
					->join("user", "user.user_id = $this->_message.receiver_id")
					->where("$this->_message.id", $id)
					->get()
					->row();
			$query->allreplies = $this->getAllReplies($id);
		}
		return $query;
	} 

	public function getAllReplies($id){
		$result = $this->db->select('*')->where('message_id',$id)
			->get($this->_replies)->result(); 
		$i=0;
		foreach ($result as $key => $value) {
			if($value->sender_type==1){
				$result[$i]->info = $this->db->select("CONCAT_WS(' ', firstname, lastname) as fullname, picture")->where('user_id', $value->sender_id)->get('user')->row();
			}else{
				$result[$i]->info = $this->db->select("CONCAT_WS(' ', firstname, lastname) as fullname, picture")->where('patient_id', $value->sender_id)->get('patient')->row();
			}
			$i++;
		}
		return $result;
	} 
 
	public function update($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update($this->table,$data); 
	} 
 
	public function delete($id = null, $condition = null)
	{
		$this->db->where('id',$id)
			->set($condition, 2)
			->update($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 


	public function user_list()
	{
		$result = $this->db->select("user_id, CONCAT_WS(' ',firstname, lastname) AS fullname ")
			->from("user")
			->where('status',1)
			->order_by('fullname', 'asc')
			->get()
			->result();

		$list[''] = display('select_user');
		if (!empty($result)) {
			foreach ($result as $value) {
				$list[$value->user_id] = $value->fullname; 
			}
			return $list;
		} else {
			return false;
		}
	}


	
}


