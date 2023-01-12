<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

	private $table = "user";
	public function __construct()
	{
		parent::__construct();
		$this->language = $this->input->cookie('Lng', true);
		$this->defualt = $this->db->get('setting')->row()->language;
	}
 
	public function create($data = [])
	{	 
		$this->db->insert($this->table,$data);
		$insert_id = $this->db->insert_id();
        return  $insert_id;
	}
	public function create_role($data = []){
		return $this->db->insert('sec_userrole',$data);
	}

	public function create_lang($data = [])
	{	 
		return $this->db->insert('user_lang',$data);
	}
  
	public function read($user_type)
	{
		return $this->db->select("*, CONCAT_WS(' ', firstname, lastname) AS fullname ")
			->from($this->table) 
			->where('user_role', $user_type)
			->order_by('user_id','desc')
			->get()
			->result();
	} 
	public function employees_list(){
		$this->db->select('*');    
        $this->db->from('user');
        return $query = $this->db->get()->result();
	}

	public function employees_lang(){
		return $this->db->select("user_lang.*, CONCAT_WS(' ', user.firstname, user.lastname) as fullname")   
              ->from('user_lang')
              ->join('user', 'user.user_id=user_lang.user_id', 'left')
              ->order_by('user_lang.user_id', 'asc')
              ->get()->result();
	}

	public function role_list(){
		$this->db->select('sec_userrole.*,sec_role.type');    
        $this->db->from('sec_userrole');
        $this->db->join('sec_role', 'sec_userrole.roleid = sec_role.id');
        $this->db->join('user', 'sec_userrole.user_id = user.user_id');
        return $query = $this->db->get()->result();
	}
	public function user_roles(){
		return $this->db->select("*")
			->from('sec_role')
			->get()
			->result();
	}
	public function role_type($user_id){
		$this->db->select('sec_userrole.*,sec_role.type');    
        $this->db->from('sec_userrole');
        $this->db->join('sec_role', 'sec_userrole.roleid = sec_role.id');
        $this->db->join('user', 'sec_userrole.user_id = user.user_id');
        $this->db->where('sec_userrole.user_id',$user_id);
        return $query = $this->db->get()->result();
	}
 
	public function read_by_id($user_id = null)
	{
		$this->db->select('*');    
        $this->db->from('user');
        $this->db->join('sec_userrole', 'user.user_id = sec_userrole.user_id','left');
        $this->db->join('sec_role', 'sec_userrole.roleid = sec_role.id','left');
        $this->db->where('user.user_id',$user_id);
        return $query = $this->db->get()->row();
	} 

	public function read_profile_by_id($user_id = null)
	{
		$this->db->select('user_lang.*, user_lang.firstname as fname, user_lang.lastname as lname, user.*');    
        $this->db->from('user_lang');
        $this->db->join('user', 'user.user_id = user_lang.user_id','left');
        $this->db->where('user.user_id',$user_id);
        $this->db->where('user_lang.language',(!empty($this->language)?$this->language:$this->defualt));
        return $query = $this->db->get()->row();
	} 

	public function read_user_by_id($user_id = null)
	{
		$this->db->select('*');    
        $this->db->from('user');
        $this->db->where('user_id',$user_id);
        return $query = $this->db->get()->row();
	} 

	public function read_lang_by_id($id = null)
	{
		$this->db->select('*');    
        $this->db->from('user_lang');
        $this->db->where('id',$id);
        return $query = $this->db->get()->row();
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
 
	public function delete($user_id = null){
		$this->db->where('user_id',$user_id) 			
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

	// Search Employee headcode
	public function headcode(){
	    $query=$this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='4' And HeadCode LIKE '5020201%'");
	    return $query->row();
    }
   
    // insert employee coa info
    public function create_coa($data = [])
    {
        $this->db->insert('acc_coa',$data);
        return true;
    }

  
}
