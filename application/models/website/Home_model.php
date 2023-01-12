<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
		$this->language = $this->input->cookie('Lng', true);
		$this->defualt = $this->db->get('setting')->row()->language;
	}

	public function sections()
	{
		return $this->db->select('ws_section.name, lang.*')
					->from('ws_section_lang as lang')
					->join('ws_section', 'ws_section.id=lang.section_id', 'left')
					->where('lang.language', (!empty($this->language)?$this->language:$this->defualt))
					->get()->result();
	} 

	public function section($name)
	{
		return $this->db->select('lang.*')
					->from('ws_section_lang as lang')
					->join('ws_section', 'ws_section.id=lang.section_id', 'left')
					->where('lang.language', (!empty($this->language)?$this->language:$this->defualt))
					->where('ws_section.name', $name)
					->get()->row();
	}  

	public function sliders($id = null)
	{
		return $this->db->where('status',1)
            ->order_by('position','asc') 
            ->order_by('id','asc')
            ->get('ws_slider')
            ->result();
	} 

	public function get_sliders()
	{
		return $this->db->select('ws_slider.url, ws_slider.position, ws_slider.image, ws_slider.status, ws_slider.id, lang.*')
			    ->from('ws_slider_lang as lang')
			    ->join('ws_slider', 'ws_slider.id=lang.slider_id')
			    ->where('lang.language', (!empty($this->language)?$this->language:$this->defualt))
			    ->where('ws_slider.status',1)
				->order_by('ws_slider.position','asc')
	            ->get()
	            ->result();
	} 
 
	public function slider_details($id = null)
	{
		return $this->db->select("*") 
			->where('id',$id)
            ->get('ws_slider')
			->row();
	} 

	public function setting(){
		return $this->db->select("*")
			->from('ws_setting')
			->where('language', (!empty($this->language)?$this->language:$this->defualt))
			->limit(1)
			->get()
			->row();
	} 

	// get website basic settings
	public function basic_setting(){
		return $this->db->select("*")
			->from('ws_basic')
			->limit(1)
			->get()
			->row();
	} 

	public function doctors()
	{
		return $this->db->select('user.firstname, user.lastname, user.picture , department.name as department')
            ->from('user')
            ->join('department','department.dprt_id = user.department_id')
            ->where('user.status',1)
            ->where('user.user_role',2)
            ->get()
            ->result();
	}

	public function departments()
	{
		return $this->db->select('*')
            ->from('department')
            ->where('status',1)
            ->order_by('name','asc')
            ->get()
            ->result();
	}

	public function comments_details($id = null)
	{
		return $this->db->where('item_id',$id)
                ->order_by('date','desc')
                ->get('ws_comment')
                ->result();
	} 


	// language list for dropdown
	public function languageList(){ 
		$languages = $this->db->select("language")
				->from('ws_setting')
				->where('status', 1)
				->group_by('language')
				->get()
				->result();
        if (!empty($languages)) { 

                foreach ($languages as $lang)
                {  
               
                    $result[$lang->language] = ucfirst($lang->language);
                }

                if (!empty($result)) return $result;
 

        } else {
            return false; 
        }
    }

 
}

