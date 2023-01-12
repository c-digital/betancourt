<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 |----Nurses for FrontEnd-------|
*/
class Nurses extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'website/about_model',
            'website/home_model',
			'website/doctor_model',
			'website/department_model',
			'portfolio_model',
			'website/menu_model',
			'website/department_model'
		));
	}

	public function profile($user_id = null) 
	{ 		 
		$data['title'] = display('doctor_profile');
		#-------------------------------#
		$data['setting'] = $this->home_model->setting(); 
        // redirect if website status is disabled
        if ($data['setting']->status == 0) 
            redirect(base_url('login'));  
        $data['basics'] = $this->home_model->basic_setting();  
         #-----------Section-------------# 
        $sections = $this->home_model->sections();
        $dataSection = array();
        if(!empty($sections)):
            foreach ($sections as $section) {
                $dataSection[$section->name] = array(
                    'name'            => $section->name,
                    'title'           => $section->title,
                    'description'     => $section->description
                );
            }
        endif; 
        $data['section'] = $dataSection;
         // get banner slider
        $data['banner'] = $this->db->select("image")->from('ws_banner')->where('status', 1)->limit(3)->order_by('id', 'DESC')->get()->result();
        #--------------------------------#
        $data['languageList'] = $this->home_model->languageList(); 
        $data['parent_menu'] = $this->menu_model->get_parent_menu();
        $data['deptsFooter'] = $this->department_model->read_footer();
        $data['about'] = $this->about_model->read();
		$data['doctor'] = $this->doctor_model->read_by_id($user_id);
		$data['portfolio'] = $this->portfolio_model->read_portfolio_by_doctor_id($user_id);
		$data['practicing'] = $this->portfolio_model->read_practicing_doctor_id($user_id);
		$data['languages'] = $this->doctor_model->read_languages($user_id);
        
        $data['content'] = $this->load->view('website/nurse_details',$data,true);
		$this->load->view('website/index', $data);
	}


}
