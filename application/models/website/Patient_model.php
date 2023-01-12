<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_model extends CI_Model {

	private $table = "patient";
 
	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 
 
	public function read($patient_id)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('patient_id',$patient_id)
			->get()
			->row();
	} 

	#-----------------------#
	// for acounts info
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
