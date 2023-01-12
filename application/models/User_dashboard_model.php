<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_dashboard_model extends CI_Model {

	private $table = "user";

	public function notify($user_id)
	{
		$appointment = $this->db->select('count(*) as total_app')
						->from('appointment')
						->where('create_date', date('Y-m-d'))
						->where('doctor_id', $user_id)
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
						->where('doctor_id', $user_id)
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

	// doctor appointment count
    public function chart_appoint($year,$month1,$user_id)
	{
        $result =  $this->db->query("
            SELECT COUNT(id) AS appoint
            FROM appointment WHERE Year(create_date)='$year' AND Month(create_date)='$month1' AND doctor_id='$user_id' GROUP BY Year(create_date),Month(create_date)
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

    // doctor prescription count
    public function chart_prescription($year,$month1,$user_id)
	{
        $result =  $this->db->query("
            SELECT COUNT(id) AS prescription
            FROM pr_prescription WHERE Year(date)='$year' AND Month(date)='$month1' AND doctor_id='$user_id' GROUP BY Year(date),Month(date)
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
  
}
