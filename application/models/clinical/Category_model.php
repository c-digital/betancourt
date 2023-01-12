<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {
	protected $table = 'clinical_category';
	public function __construct(){
		parent::__construct();
	}

	/*
	 |-------------------------------------
	 | insert clinical category
	 |--------------------------------------
 	 */
	public function create($data = []){	 
		return $this->db->insert($this->table, $data);
	}

 	/*
	 |-------------------------------------
	 | get all clinical category list
	 |--------------------------------------
 	 */
	public function read(){
		return $this->db->select("*")
			->from($this->table) 
			->order_by('id','desc')
			->get()
			->result();
	} 

	// get category inf by id
	public function read_by_id($id){
		return $this->db->select("*")
			->from($this->table) 
			->where('id', $id)
			->get()
			->row();
	} 

	public function update($data = []){
		return $this->db->where('id',$data['id'])
			->update($this->table,$data); 
	} 
 
	public function delete($id = null){  
		$this->db->where('id',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 

	public function category_list(){
		$result = $this->db->select("*")
			->from($this->table)
			->where('status',1)
			->get()
			->result();

		$list[''] = display('select_option');
		if (!empty($result)) {
			foreach ($result as $value) {
				$list[$value->id] = $value->cat_name; 
			}
			return $list;
		} else {
			return false;
		}
	}

	// get all clinical history
	public function get_clinical_history(){
		$result = $this->db->select("*")->from($this->table)
						   ->order_by('position', 'ASC')
						   ->get()->result();

		$i=0;
		foreach($result as $row){
			$result[$i]->subitems = $this->get_all_subcat($row->id);
			$i++;
		}
		return $result;
	}

	// get all sub category by id
	public function get_all_subcat($id){
		 return $this->db->select("*")->from('clinical_sub_cat')
		 				 ->where('cat_id', $id)
						 ->get()->result();
	}
 

 }
