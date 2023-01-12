<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_model extends CI_Model {

	private $table = "patient";
 
	public function create($data = []){	 
		return $this->db->insert($this->table,$data);
	}
  
	public function read()
	{
		return $this->db->select("*")
			->from($this->table)
			->order_by('id','desc')
			->get()
			->result();
	} 

	// search patient
	public function search_patient($searchText){
		return $this->db->select("*")
				->from($this->table)
				->like('firstname', $searchText)
				->or_like('lastname', $searchText)
				->or_like('patient_id', $searchText)
				->or_like('CONCAT(firstname, " ", lastname)', $searchText)
				->get()
				->result();
	}
 
	public function read_by_id($id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('id',$id)
			->get()
			->row();
	} 

	public function getExistPatient($email){
		return $this->db->select("*")
			->from($this->table)
			->where('email',$email)
			->get()
			->row();
	} 
 
	public function update($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update($this->table,$data); 
	} 
 
	public function delete($id = null)
	{
		$this->db->where('id',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 

	public function headcode(){
	    $query=$this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='4' And HeadCode LIKE '1020302%'");
	    return $query->row();
    }
    
     public function create_coa($data = [])
    {
        $this->db->insert('acc_coa',$data);
        return true;
    }
  
}
