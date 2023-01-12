<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 |----Departments for FrontEnd-------|
*/
class Departments extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'website/home_model',
			'website/department_model',
			'main_department_model',
			'website/menu_model', 
			'website/about_model'
		));

	}
 
	public function index()
	{
		$data['title'] = display('department_list');
		#-----------Setting-------------# 
        $data['setting'] = $this->home_model->setting(); 
        // redirect if website status is disabled
        if ($data['setting']->status == 0) 
            redirect(base_url('login'));
        
        $data['basics'] = $this->home_model->basic_setting();  
        $data['languageList'] = $this->home_model->languageList(); 
        // get banner slider
        $data['banner'] = $this->db->select("image")->from('ws_banner')->where('status', 1)->limit(3)->order_by('id', 'DESC')->get()->result();
        
        $data['section'] = $this->home_model->section('department');
        $data['about'] = $this->about_model->read();
        $data['deptsFooter'] = $this->department_model->read_footer();
        //get menu list dynamically
        $data['parent_menu'] = $this->menu_model->get_parent_menu();
        // get main department
        $data['mainDeparts'] = $this->main_department_model->read_all();
        // get all sub department
		$data['departments'] = $this->department_model->read();

		$data['content'] = $this->load->view('website/department',$data,true);
       $this->load->view('website/index', $data);
	} 

	public function details($id = null)
	{
		$data['title'] = display('departments');
		#-----------Setting-------------# 
        $data['setting'] = $this->home_model->setting(); 
        // redirect if website status is disabled
        if ($data['setting']->status == 0) 
            redirect(base_url('login'));
        
        $data['basics'] = $this->home_model->basic_setting();  
        $data['languageList'] = $this->home_model->languageList(); 
        $data['about'] = $this->about_model->read();
        $data['deptsFooter'] = $this->department_model->read_footer();
        //get menu list dynamically
        $data['parent_menu'] = $this->menu_model->get_parent_menu();
        // get department details
		$data['details'] = $this->department_model->read_ws_by_id($id);
		// get related departments
		$data['departments'] = $this->department_model->related_department($id);

		$data['content'] = $this->load->view('website/department_details',$data,true);
       $this->load->view('website/index', $data);
	} 

 	
}
