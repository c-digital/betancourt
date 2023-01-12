<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {
 
	private $table = "ws_setting";
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
 
	public function read(){
		return $this->db->select("*")
			->from($this->table)
			->get()
			->result();
	} 

	public function read_by_id($id)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('id', $id)
			->get()
			->row();
	} 
	 
  	public function update($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update($this->table,$data); 
	} 

	// delete setting by id
	public function delete($id){
		return $this->db->where('id',$id)
			->delete($this->table); 
	} 

	// read common settings
	public function read_common(){
		return $this->db->select("*")
			->from('ws_basic')
			->get()
			->result();
	} 

	// read common settings by id
	public function read_common_by_id($id){
		return $this->db->select("*")
			->from('ws_basic')
			->where('id', $id)
			->get()
			->row();
	} 
	 
	// update common settings
  	public function update_common($data = []){
		return $this->db->where('id',$data['id'])
			->update('ws_basic',$data); 
	} 

	// all language list
	public function languageList(){ 
        if ($this->db->table_exists("language")) { 

                $fields = $this->db->field_data("language");

                $i = 1;
                foreach ($fields as $field)
                {  
                    if ($i++ > 2)
                    $result[$field->name] = ucfirst($field->name);
                }

                if (!empty($result)) return $result;
 

        } else {
            return false; 
        }
    }
}
