<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'website/about_model',
			'website/doctor_model',
			'website/home_model',
			'website/testimonial_model',
			'website/menu_model',
			'website/department_model'
		)); 
	}

	public function index()
	{ 
		$data['title'] = display('about');
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
        $data['languageList'] = $this->home_model->languageList();
        // get banner slider 
        $data['banner'] = $this->db->select("image")->from('ws_banner')->where('status', 1)->limit(3)->order_by('id', 'DESC')->get()->result();
        //get menu list dynamically
        $data['parent_menu'] = $this->menu_model->get_parent_menu();
        $data['deptsFooter'] = $this->department_model->read_footer();
		$data['about'] = $this->about_model->read();
		#--------doctor list--------#
		$data['doctors'] = $this->doctor_model->read_for_about_us();
		#--------nurse list--------#
		$data['nurses'] = $this->doctor_model->read_nurse_about_us();
		#--------get client testimonial list--------#
		$data['testimonials'] = $this->testimonial_model->read_testimonial_about_us();

		$data['content'] = $this->load->view('website/about',$data,true);
		$this->load->view('website/index',$data);
	} 


}

