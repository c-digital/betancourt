<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'website/home_model',
			'page_model',
			'website/menu_model',
			'website/about_model',
			'website/department_model'
		)); 
	}

	public function index($id = null)
	{
		$data['title'] = display('page');
		#-------------------------------#
		$data['setting'] = $this->home_model->setting(); 
        // redirect if website status is disabled
        if ($data['setting']->status == 0) 
            redirect(base_url('login'));
        $data['basics'] = $this->home_model->basic_setting();  
        // get banner slider
        $data['banner'] = $this->db->select("image")->from('ws_banner')->where('status', 1)->limit(3)->order_by('id', 'DESC')->get()->result();
        $data['languageList'] = $this->home_model->languageList(); 
        $data['about'] = $this->about_model->read();
        $data['deptsFooter'] = $this->department_model->read_footer();
        $data['parent_menu'] = $this->menu_model->get_parent_menu();
		$data['contents'] = $this->page_model->read_contents($id);

		$data['content'] = $this->load->view('website/page',$data,true);
		$this->load->view('website/index',$data);
	} 


}

