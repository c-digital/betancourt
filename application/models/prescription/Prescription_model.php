<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Prescription_model extends CI_Model {

	protected $table = 'pr_prescription';
	public function __construct()
	{
		parent::__construct();
		$this->language = $this->input->cookie('Lng', true);
		$this->defualt = $this->db->get('setting')->row()->language;
	}

	public function create($data = [])
	{	 
		return $this->db->insert($this->table, $data);
	}
 
	public function read()
	{
		return $this->db->select("pr_prescription.*, CONCAT_WS(' ', user.firstname, user.lastname) AS doctor_name")
			->from('pr_prescription') 
			->join('user', 'user.user_id = pr_prescription.doctor_id', 'left')
			->order_by('id','desc')
			->get()
			->result();
	} 
 
	public function single_view($id = null)
	{		
		return $this->db->select("
				pr.*, 
				CONCAT_WS(' ', pe.firstname, pe.lastname) AS patient_name,  
				pe.sex,
				pe.date_of_birth,
				CONCAT_WS(' ', drln.firstname, drln.lastname) AS doctor_name,  
				drln.designation,
				drln.address,
				drln.specialist,
				dp.name as department_name,
				in.insurance_name
			")
			->from('pr_prescription AS pr') 
			->join('patient AS pe', 'pe.patient_id = pr.patient_id', 'left') 
			->join('inc_insurance AS in', 'in.id = pr.insurance_id', 'left') 
			->join('user AS dr', 'dr.user_id = pr.doctor_id', 'left') 
			->join('user_lang AS drln', 'drln.user_id = pr.doctor_id', 'left') 
			->join('department AS dp', 'dp.dprt_id = dr.department_id', 'left')
			->where('pr.id', $id) 
			->where('drln.language',(!empty($this->language)?$this->language:$this->defualt)) 
			->get()
			->row();
	} 


	public function website()
	{
		return $this->db->select('title, description, email, phone')
			->from('setting')
			->get()
			->row();
	}
}
