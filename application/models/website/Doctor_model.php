<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
 |======FrontEnd Doctor Model====
*/
class Doctor_model extends CI_Model {

	private $table = "user";
	public function __construct()
	{
		parent::__construct();
		$this->language = $this->input->cookie('Lng', true);
		$this->defualt = $this->db->get('setting')->row()->language;
	}

	public function read_home()
	{
		return $this->db->select("user.*, department.name, lang.*")
			->from("user_lang as lang")
			->join('user','user.user_id = lang.user_id','left')
			->join('department','department.dprt_id = user.department_id','left')
			->group_start()
				->where('user.user_role',1)
				->or_where('user.user_role',2)
			->group_end()
			->where('user.status',1)
			->where('lang.language',(!empty($this->language)?$this->language:$this->defualt))
			->limit(3)
			->get()
			->result();
	} 
 
	public function read($limit, $start)
	{
		return $this->db->select("user.*, department.name, lang.*")
			->from("user_lang as lang")
			->join('user','user.user_id = lang.user_id','left')
			->join('department','department.dprt_id = user.department_id','left')
			->where('lang.language',(!empty($this->language)?$this->language:$this->defualt))
			->where('user.user_role',2)
			->where('user.status',1)
			->limit($limit, $start)
			->order_by('user.user_id','desc')
			->get()
			->result();
	} 
 
	public function read_by_id($user_id = null)
	{
		return $this->db->select("user.*, department.name, lang.*")
			->from("user_lang as lang")
			->join('user','user.user_id = lang.user_id','left')
			->join('department','department.dprt_id = user.department_id','left')
			->where('lang.language',(!empty($this->language)?$this->language:$this->defualt))
			->where('user.user_id',$user_id)
			->get()
			->row();
	} 

	public function read_languages($user_id = null)
	{
		return $this->db->select("*")
			->from('user_language')
			->where('user_id',$user_id)
			->get()
			->result();
	} 

	public function record_count() {
        return $this->db->select("*")
			->from("user_lang as lang")
			->join('user','user.user_id = lang.user_id','left')
			->where('lang.language',(!empty($this->language)?$this->language:$this->defualt))
			->where('user.user_role',2)
			->where('user.status',1)
			->count_all_results();
    }
  

	public function doctor_list()
	{
		$result = $this->db->select("*")
			->from($this->table)         
			->where('user_role',2)
			->where('status',1)
			->get()
			->result();

		$list[''] = display('select_doctor');
		if (!empty($result)) {
			foreach ($result as $value) {
				$list[$value->user_id] = $value->firstname.' '.$value->lastname; 
			}
			return $list;
		} else {
			return false;
		}
	}

	public function read_for_about_us(){
		return $this->db->select("user.*, department.name, lang.*")
			->from("user_lang as lang")
			->join('user','user.user_id = lang.user_id','left')
			->join('department','department.dprt_id = user.department_id','left')
			->where('lang.language',(!empty($this->language)?$this->language:$this->defualt))
			->where('user.user_role',2)
			->where('user.status',1)
			->limit(4)
			->order_by('user.user_id','desc')
			->get()
			->result();
	}

	public function read_nurse_about_us(){
		return $this->db->select("user.*, department.name, lang.*")
			->from("user_lang as lang")
			->join('user','user.user_id = lang.user_id','left')
			->join('department','department.dprt_id = user.department_id','left')
			->where('lang.language',(!empty($this->language)?$this->language:$this->defualt))
			->where('user.user_role',5)
			->where('user.status',1)
			->limit(6)
			->order_by('user.user_id','desc')
			->get()
			->result();
	}


}
