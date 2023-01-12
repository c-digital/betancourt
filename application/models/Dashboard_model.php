<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	private $table = "user";
 
	public function check_user($data = [])
	{
		return $this->db->select("*")
			->from($this->table)
			->where('email',$data['email'])
			->where('password',$data['password'])
			->where('status',1)
			->get()
			->result();
	}
   
	public function check_patient($data = [])
	{
		return $this->db->select("*")
			->from("patient")
			->where('email',$data['email'])
			->where('password',$data['password'])
			->where('status',1)
			->get()
			->result();
	}  

	public function resetPatientPass($data = []){
		$check = $this->db->select("*")->from("patient")->where('email',$data['email'])->get()->row();
		if($check > 0){
			$this->db->where('email',$data['email'])->update("patient", $data);
			return 1;
		}else{
			return 0;
		}
	}  

    public function check_role($role_id){
    	return $this->db->select('*')
    	       ->from('sec_role')
    	       ->where('id',$role_id)
    	       ->get()
    	       ->row();
    }

   //alhassan

   public function userPermissionadmin($id = null)
	{

		return $this->db->select("
			sub_module.directory, 
			role_permission.fk_module_id, 
			role_permission.create, 
			role_permission.read, 
			role_permission.update, 
			role_permission.delete
			")
			->from('role_permission')
			->join('sub_module', 'sub_module.id = role_permission.fk_module_id', 'full')
			->where('role_permission.role_id', $id)
			->where('sub_module.status', 1)
			->group_start()
				->where('create', 1)
				->or_where('read', 1)
				->or_where('update', 1)
				->or_where('delete', 1)
			->group_end()
			->get()
			->result();
	}

	public function userPermission($id = null){

		$userrole=$this->db->select('sec_userrole.*,sec_role.*')->from('sec_userrole')->join('sec_role','sec_userrole.roleid=sec_role.id')->where('sec_userrole.user_id',$id)->get()->result();


		$roleid = array();
		foreach ($userrole as $role) {
			$roleid[] =$role->roleid;
		}
	 //  print_r($roleid);exit;
	
		if(!empty($roleid)){
		 return $result =  $this->db->select("

					role_permission.fk_module_id, 
					sub_module.directory,
					IF(SUM(role_permission.create) >= 1,1,0) AS 'create', 
					IF(SUM(role_permission.read) >= 1,1,0) AS 'read', 
					IF(SUM(role_permission.update) >= 1,1,0) AS 'update', 
					IF(SUM(role_permission.delete) >= 1,1,0) AS 'delete'
				")
				->from('role_permission')
				->join('sub_module', 'sub_module.id = role_permission.fk_module_id', 'full')
				->where_in('role_permission.role_id',$roleid)
				->where('sub_module.status', 1)
				->group_by('role_permission.fk_module_id')
				->group_start()
					->where('create', 1)
					->or_where('read', 1)
					->or_where('update', 1)
					->or_where('delete', 1)
				->group_end()
				
				->get()
				->result();
			}else{

			return $this->db->select("
			sub_module.directory, 
			role_permission.fk_module_id, 
			role_permission.create, 
			role_permission.read, 
			role_permission.update, 
			role_permission.delete
			")
			->from('role_permission')
			->join('sub_module', 'sub_module.id = role_permission.fk_module_id', 0)
			->where('role_permission.role_id', 0)
			->where('sub_module.status', 1)
			->group_start()
				->where('create', 1)
				->or_where('read', 1)
				->or_where('update', 1)
				->or_where('delete', 1)
			->group_end()
			->get()
			->result();
			}
	}

	//alhassan

	public function read_by_id($user_id = null)
	{
		return $this->db->select("user.*, department.name AS department")
			->from('user')
			->join('department', 'department.dprt_id = user.department_id', 'left')
			->where('user.user_id',$user_id)
			->get()
			->row();
	} 

	public function profile($user_id = null)
	{
		return $this->db->select("*")
			->from("user") 
			->where('user_id', $user_id)
			->get()
			->row();
	}

	public function profile_languages($user_id = null)
	{
		return $this->db->select("*")
			->from("user_lang") 
			->where('user_id', $user_id)
			->get()
			->result();
	} 

	//read profile language by id
	public function read_plang_by_id($id = null)
	{
		return $this->db->select("*")
			->from("user_lang") 
			->where('id', $id)
			->get()
			->row();
	} 

	public function update_language($data = [])
	{
		return $this->db->where('id', $data['id'])
			            ->update("user_lang", $data);
	} 


	public function notify()
	{
		$appointment = $this->db->select('count(*) as total_app')
						->from('appointment')
						->where('create_date', date('Y-m-d'))
						->get()->row();
		$patient = $this->db->select('count(*) as total_patient')
						->from('patient')
						->where('create_date', date('Y-m-d'))
						->get()->row();
		$doctor = $this->db->select('count(*) as total_doctor')
						->from('user_log')
						->join('user', 'user.user_id=user_log.user_id', 'left')
						->where('user_log.date', date('Y-m-d'))
						->where('user_log.status', 1)
						->where('user.user_role', 2)
						->get()->row();
		$prescription = $this->db->select('count(*) as total_prescription')
						->from('pr_prescription')
						->where('date', date('Y-m-d'))
						->get()->row();
		$freeBed = $this->db->select('count(*) as total_freebed')
						->from('bm_bed')
						->where('status', 0)
						->get()->row();
		$discharged = $this->db->select('count(*) as total_discharged')
						->from('bill_admission')
						->where('discharge_date', date('Y-m-d'))
						->get()->row();
		return[$appointment,$patient,$doctor,$prescription,$freeBed,$discharged];
	}

	public function enquiry()
	{
		return $this->db->select('enquiry_id, name, email, enquiry')
			->from('enquiry')
			->limit(5)
			->order_by('checked','asc')
			->order_by('created_date','desc')
			->order_by('enquiry_id','desc')
			->get()
			->result();
	}

 
	public function update($data = [])
	{
		return $this->db->where('user_id',$data['user_id'])
			->update("user" ,$data); 
	} 


	public function chart_patient($year,$month1)
	{
        $result =  $this->db->query("
            SELECT COUNT(patient_id) AS patient
            FROM patient WHERE Year(create_date)='$year' AND Month(create_date)='$month1'           GROUP BY Year(create_date),Month(create_date)
        ")
        ->result(); 
        if(!empty($result)){
        	foreach ($result as $value) {
        		return $value->patient;
        	}
        	
        }else{
        	return 0;
        }
    }

    public function chart_appoint($year,$month1)
	{
        $result =  $this->db->query("
            SELECT COUNT(id) AS appoint
            FROM appointment WHERE Year(create_date)='$year' AND Month(create_date)='$month1'           GROUP BY Year(create_date),Month(create_date)
        ")
        ->result(); 
        if(!empty($result)){
        	foreach ($result as $value) {
        		return $value->appoint;
        	}
        	
        }else{
        	return 0;
        }
    }

    public function chart_prescription($year,$month1)
	{
        $result =  $this->db->query("
            SELECT COUNT(id) AS prescription
            FROM pr_prescription WHERE Year(date)='$year' AND Month(date)='$month1'           GROUP BY Year(date),Month(date)
        ")
        ->result(); 
        if(!empty($result)){
        	foreach ($result as $value) {
        		return $value->prescription;
        	}
        	
        }else{
        	return 0;
        }
    }

    //get today patient list
    public function today_patient()
	{
		return $this->db->select('*')
			->from('patient')
			->where('create_date', date('Y-m-d'))
			->order_by('id','desc')
			->get()
			->result();
	}

	// update user log
	public function log_update($user_log = []){
		return $this->db->where('user_id', $user_log['user_id'])
			 	 ->where('date', date('Y-m-d'))
			 	 ->update('user_log', $user_log);
	}

  
}
