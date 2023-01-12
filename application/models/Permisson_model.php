<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Permisson_model extends CI_Model {

	public function create($data=[])
	{	 
		return $this->db->insert('sec_role',$data);
	}
	public function rolelist(){
		return $this->db->select("*")
		         ->from('sec_role')
		         ->get()
		         ->result();
	}
	public function rolelistedit($id){
		return $this->db->where('id', $id)
            ->from("sec_role")
            ->get()
            ->row();
	}  
	public function update($postData,$id){
		return $this->db->where('id',$id)->update('sec_role',$postData);
	}
	public function delete($id){
		return $this->db->where('id',$id)->delete('sec_role');
	}
	public function module_all_list(){
        return $this->db->select('*')
            ->from('module')
            ->get()
            ->result();
    }
    public function create_permission($data=[],$role_id){
     $this->db->where('role_id', $role_id)->delete('role_permission');
     return $this->db->insert_batch('role_permission', $data);
    }

    public function module(){
        return $modules = $this->db->select('*')->from('module')->get()->result();
    }

    public function permission_delete($role_id){
        return $this->db->where('role_id', $role_id)
            ->delete("role_permission");
    }
     public function create_permission_update($data = array()){
        $this->db->where('role_id', $data[0]['role_id'])->delete('role_permission');
        return $this->db->insert_batch('role_permission', $data);
    }
    public function user_list(){
      return $this->db->select("*")->from("user")->get()->result();
    }
    public function create_role($data=array()){

        return $this->db->insert('sec_userrole', $data);
    }
    public function delete_role($id){
    	return $this->db->where('id',$id)->delete('sec_userrole');
    }

    public function get_permission($user_role=null, $module=null){
        return $this->db->where(array('role_id'=>$user_role, 'fk_module_id'=>$module))
            ->from("role_permission")
            ->get()
            ->row();
    }
 
	
 }
