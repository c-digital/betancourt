<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bill_model extends CI_Model {

	private $table = "bill";
 
	public function create($data = [])
	{	 
		return $this->db->insert($this->table, $data);
	}
 
	public function read($limit, $offset)
	{ 
		return $this->db->select("bi.*, ba.patient_id, CONCAT_WS(' ', pa.firstname, pa.lastname) AS patient_name")
		->from("bill as bi")
		->join("bill_admission AS ba", "ba.admission_id = bi.admission_id", "left")
		->join("patient AS pa", "pa.patient_id = ba.patient_id", "left")
		->limit($limit, $offset)
		->order_by('id','desc')
		->get()
		->result();
	}  

	public function complete_bill()
	{ 
		return $this->db->select("
			bill.bill_id,
			ad.*,
			pa.id AS pid,
			CONCAT_WS(' ', pa.firstname, pa.lastname) AS patient_name,
			CONCAT_WS(' ', dr.firstname, dr.lastname) AS doctor_name
		")
		->from("bill")
		->join("bill_admission AS ad", "ad.admission_id = bill.admission_id", "left")
		->join("patient AS pa", "pa.patient_id = ad.patient_id", "left")
		->join("user AS dr", "dr.user_id = ad.doctor_id", "left")
		->where('ad.isComplete',1)
		->where('bill.status',1)
		->order_by('bill.bill_date','desc')
		->get()
		->result();
	} 
    
	public function bill_by_id($bill_id = null)
	{ 
		return $this->db->select("
				bi.id AS id,
				bi.bill_id AS bill_id,
				bi.admission_id AS admission_id,
				bi.bill_date AS bill_date,
				bi.payment_method AS payment_method,
				bi.card_cheque_no AS card_cheque_no,
				bi.receipt_no AS receipt_no,
				bi.discount AS discount,
				bi.tax AS tax,
				bi.note AS note,
				bi.status AS status,
				bi.exam AS exam,

				ba.patient_id AS patient_id,
				ba.admission_date AS admission_date,
				ba.discharge_date AS discharge_date, 
				DATEDIFF(ba.discharge_date, ba.admission_date) as total_days,
				ba.patient_id AS doctor_id,
				ba.insurance_id AS insurance_id,
				ba.policy_no AS policy_no,

				CONCAT_WS(' ', pa.firstname, pa.lastname) AS patient_name,
				pa.address AS address,
				pa.date_of_birth AS date_of_birth,
				pa.sex AS sex,
				pa.picture AS picture,

				CONCAT_WS(' ', dr.firstname, dr.lastname) AS doctor_name,

				in.insurance_name AS insurance_name,

				bp.id as package_id,
				bp.name as package_name, 
				bp.services as services
			")
			->from("bill AS bi")
			->join("bill_admission AS ba", "ba.admission_id = bi.admission_id", "left")
			->join("patient AS pa", "pa.patient_id = ba.patient_id", "left")
			->join("user AS dr", "dr.user_id = ba.doctor_id", "left")
			->join("inc_insurance AS in", "in.id = ba.insurance_id", "left")
			->join("bill_package AS bp", "bp.id = ba.package_id", "left")
			->where("bi.bill_id", $bill_id)
			->get()
			->row();
	}  
 

	public function services_by_id($bill_id = null)
	{
		return $this->db->select("
				bill_details.*, 
				bill_service.id AS id, 
				bill_service.name AS name,
				CONCAT_WS(' ', user.firstname, user.lastname) AS professional,
				bill_details.professional_id
			")->from("bill_details")
			->join("bill_service", "bill_service.id = bill_details.service_id","left")
			->join("user", "user.user_id = bill_details.professional_id","left")
			->where("bill_details.bill_id", $bill_id)
			->get()
			->result();
	}


	public function update($data = [])
	{
		return $this->db->where('bill_id',$data['bill_id'])
			->update($this->table,$data); 
	} 
 
	public function delete($bill_id = null)
	{ 
		$this->db->where('bill_id',$bill_id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
 
 	public function medicine_bill($bill_id = null){
		return $this->db->select("m.*, hm.price, hm.name, CONCAT_WS(' ', user.firstname, user.lastname) as doctor")
				->from("medication m")
				->join('ha_medicine hm', 'hm.id=m.medicine_id', 'left')
				->join('user', 'user.user_id=m.prescribe_by', 'left')
				->where("m.bill_id",$bill_id)
				->get()->result();
	}

	public function advance_payment($bill_id = null){
		return $this->db->select("DATE(ba.date) AS date, ba.receipt_no, ba.amount")
			->from("bill AS b")
			->join("bill_advanced AS ba","ba.admission_id = b.admission_id")
			->where("b.bill_id", $bill_id)
			->get()
			->result();
	}

	public function bed_payment($patient_id = null, $bill_id){
		return $this->db->select("
			bdas.assign_date AS adate,
			bdas.discharge_date AS ddate,
			bm_room.charge,
			bm_bed.bed_number,
			DATEDIFF(bdas.discharge_date, bdas.assign_date) AS tdays
			")
			->from("bm_bed_assign as bdas")
			->join("bm_room","bm_room.id=bdas.room_id","left")
			->join("bm_bed","bm_bed.id=bdas.bed_id","left")
			->where("bdas.patient_id",$patient_id)
			->where("bdas.bill_id", $bill_id)
			->get()->result();
	}

	public function medicine_amount($patient_id = null, $bill_id){
		$query = $this->db->select("m.*, hm.price")
				->from("medication m")
				->join('ha_medicine hm', 'hm.id=m.medicine_id', 'left')
				->where("m.bill_id",$bill_id)
				->where("m.patient_id",$patient_id)
				->get()->result();
		$price = 0;
		foreach ($query as $key => $value) {
			$from = strtotime($value->from_date);
            $to = strtotime($value->to_date);
            $day = abs($to - $from);
            $totalDay = $day/86400 +1;
            $quantity = $totalDay*$value->per_day_intake;
            $price += $quantity*$value->price;
		}
		return $price;
	}


	public function website()
	{
		return $this->db->select('title, description, email, phone,logo')
			->from('setting')
			->get()
			->row();
	}
}
