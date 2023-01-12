<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment_model extends CI_Model {

	private $table = 'appointment';
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
		return $this->db->select("
				appointment.*, 
				user.firstname, 
				user.lastname,  
				department.name
			")
			->from($this->table)
			->join('user','user.user_id = appointment.doctor_id')
			->join('department','department.dprt_id = appointment.department_id')
			->where('user.user_id', $this->session->userdata('user_id'))
			->where('appointment.status', 1)
			->order_by('appointment.id','desc')
			->get()
			->result();
	} 

	public function tt(){
		return $this->db->select('department_assign.*,user.firstname,user.lastname')
                ->from('department_assign')
                ->join('user', 'user.user_id=department_assign.user_id', 'left')
                ->where('department_assign.department_id', 6)
                // ->where('user.user_role',2)
                // ->where('user.status',1)
                ->get()->result();
	}

	// for admin view
	public function read_admin()
	{
		return $this->db->select("
				appointment.*, 
				user.firstname, 
				user.lastname,  
				department.name
			")
			->from($this->table)
			->join('user','user.user_id = appointment.doctor_id')
			->join('department','department.dprt_id = appointment.department_id')
			->where('appointment.status', 1)
			->order_by('appointment.id','desc')
			->get()
			->result();
	} 
 
	public function read_by_id($appointment_id = null)
	{ 
		return $this->db->select("
				appointment.*, 
				appointment.appointment_id, 
				appointment.serial_no, 
				appointment.problem, 
				appointment.date, 
				usrLn.firstname, 
				usrLn.lastname,  
				user.picture,  
				usrLn.degree,  
				department.name as department,
				schedule.available_days,
				schedule.start_time,
				schedule.end_time,
				patient.firstname AS pfirstname,
				patient.lastname AS plastname,
				patient.date_of_birth,
				patient.sex,
				patient.mobile,
				patient.picture,
			")
			->from($this->table)
			->join('user','user.user_id = appointment.doctor_id','left')
			->join('user_lang as usrLn','usrLn.user_id = appointment.doctor_id')
			->join('department','department.dprt_id = appointment.department_id','left')
			->join('patient','patient.patient_id = appointment.patient_id')
			->join('schedule','schedule.schedule_id = appointment.schedule_id','left')
			->where('appointment.appointment_id',$appointment_id)
			->where('usrLn.language', (!empty($this->language)?$this->language:$this->defualt))
			->order_by('appointment.id','desc')
			->get()
			->row();
	}  
 
	public function delete($appointment_id = null)
	{
		$this->db->where('appointment_id',$appointment_id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 

	public function fetch_patient_data($query)
	{
		if($query != '')
		{
			$this->db->select('*');
			$this->db->from('patient');
			$this->db->like('firstname', $query);
			$this->db->or_like('mobile', $query);
			$this->db->or_like('patient_id', $query);
			$this->db->or_like('CONCAT(firstname, " ", lastname)', $query);
			$this->db->order_by('firstname', 'asc');
			$this->db->limit(2);
			return $this->db->get();
	    }
	}
 
	
 }
