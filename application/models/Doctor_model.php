<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor_model extends CI_Model {

	private $table = "user";
	public function __construct()
	{
		parent::__construct();
		$this->language = $this->input->cookie('Lng', true);
		$this->defualt = $this->db->get('setting')->row()->language;
	}
 
	public function create($data = []){	 
		return $this->db->insert($this->table,$data);
	}

	public function create_lang($data = []){	 
		return $this->db->insert('user_lang',$data);
	}
 
	public function read()
	{
		return $this->db->select("user.*,department.name")
			->from("user")
			->join('department','department.dprt_id = user.department_id','left')
			->where('user.user_role',2)
			->order_by('user.user_id','desc')
			->get()
			->result();
	} 

	public function read_doctor_language()
	{
		return $this->db->select("user.firstname, user.lastname, department.name, lang.*")
			->from("user_lang as lang")
			->join('user','user.user_id = lang.user_id','left')
			->join('department','department.dprt_id = user.department_id','left')
			->where('user.user_role',2)
			->order_by('lang.user_id','asc')
			->get()
			->result();
	} 
 
	public function read_by_id($user_id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->group_start()
				->where('user_role',1)
				->or_where('user_role',2)
			->group_end()
			->where('user_id',$user_id)
			->get()
			->row();
	} 

	public function read_profile_by_id($user_id = null)
	{
		return $this->db->select("user.*, department.name, lang.*")
			->from("user_lang as lang")
			->join('user','user.user_id = lang.user_id','left')
			->join('department','department.dprt_id = user.department_id','left')
			->group_start()
				->where('user.user_role',1)
				->or_where('user.user_role',2)
			->group_end()
			->where('lang.language',(!empty($this->language)?$this->language:$this->defualt))
			->where('user.user_id',$user_id)
			->get()
			->row();
	} 

	public function read_lang_by_id($id = null)
	{
		return $this->db->select("*")
			->from('user_lang')
			->where('id',$id)
			->get()
			->row();
	} 
 
	public function update($data = [])
	{
		return $this->db->where('user_id',$data['user_id'])
			->update($this->table,$data); 
	} 

	public function update_lang($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update('user_lang',$data); 
	} 
 
	public function delete($user_id = null)
	{
		$this->db->where('user_id',$user_id)
			->group_start() 
			->where('user_role',2)
			->group_end()
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 

	public function delete_lang($id = null)
	{
		$this->db->where('id',$id)
			->delete('user_lang');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
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

	public function read_language()
	{
		return $this->db->select("user_language.*, CONCAT_WS(' ', user.firstname, user.lastname) as dname")
			->from("user_language")
			->join('user','user.user_id = user_language.user_id','left')
			->order_by('user_language.user_id', 'asc')
			->get()
			->result();
	} 

	public function delete_language($id = null)
	{
		$this->db->where('id',$id)
			->delete('user_language');

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 

	// Search doctor headcode
	public function headcode(){
	    $query=$this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='4' And HeadCode LIKE '5020201%'");
	    return $query->row();
    }
   
    // insert doctor coa info
    public function create_coa($data = [])
    {
        $this->db->insert('acc_coa',$data);
        return true;
    }


}
