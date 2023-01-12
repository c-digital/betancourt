<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio_model extends CI_Model {

	private $table = "portfolio";
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
		return $this->db->select("portfolio.*,CONCAT_WS(' ', user.firstname, user.lastname) as dname")
			->from($this->table)
			->join('user','user.user_id = portfolio.user_id','left')
			->where('portfolio.language', $this->defualt)
			->order_by('dname','asc')
			->get()
			->result();
	} 

	public function read_all()
	{
		return $this->db->select("portfolio.*,CONCAT_WS(' ', user.firstname, user.lastname) as dname")
			->from($this->table)
			->join('user','user.user_id = portfolio.user_id','left')
			->where('portfolio.language !=', $this->defualt)
			->order_by('dname','asc')
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

	public function read_portfolio_by_doctor_id($user_id =null){
		return $this->db->select("*")
			->from($this->table)
			->where('language', (!empty($this->language)?$this->language:$this->defualt))
			->where('user_id',$user_id)
			->get()
			->result();
	}

	public function read_practicing_doctor_id($user_id =null){
		$result = $this->db->select("from_date, to_date")
			->from($this->table)
			->where('user_id',$user_id)
			->where('language', (!empty($this->language)?$this->language:$this->defualt))
			->get()
			->result();
		$years = 0;
		$i=0;
		foreach ($result as $value) {
			$datediff = abs(date('Y', strtotime($value->to_date)) - date('Y', strtotime($value->from_date))); 
            $year = intval($datediff);
            $years += $year;
            $i++;
		}
		return $years;
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

}
