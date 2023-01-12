<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'website/home_model',
			'website/service_model',
			'website/menu_model',
			'website/about_model',
			'website/department_model'
		)); 
	}

	public function index($id = null){
		$config = array();
        $config["base_url"] = base_url() . "services/index";
        $config["total_rows"] = $this->service_model->record_count();
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;

        //css styling
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo Previous';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'Next &raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['title'] = display('service');
		#-------------------------------#
		$data['setting'] = $this->home_model->setting(); 
        // redirect if website status is disabled
        if ($data['setting']->status == 0) 
            redirect(base_url('login'));
        $data['basics'] = $this->home_model->basic_setting();  
        // get banner slider
        $data['banner'] = $this->db->select("image")->from('ws_banner')->where('status', 1)->limit(3)->order_by('id', 'DESC')->get()->result();

        $data['languageList'] = $this->home_model->languageList(); 
        $data['section'] = $this->home_model->section('service');
        $data['about'] = $this->about_model->read();
        $data['deptsFooter'] = $this->department_model->read_footer();
        $data['parent_menu'] = $this->menu_model->get_parent_menu();
		$data['services'] = $this->service_model->read_website($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data['content'] = $this->load->view('website/service',$data,true);
		$this->load->view('website/index',$data);
	} 

	public function details($id = null)
	{
		$data['title'] = display('news');
		 #-----------Setting-------------# 
        $data['setting'] = $this->home_model->setting(); 
        // redirect if website status is disabled
        if ($data['setting']->status == 0) 
            redirect(base_url('login'));

       $data['basics'] = $this->home_model->basic_setting();  
       $data['languageList'] = $this->home_model->languageList(); 
       $data['parent_menu'] = $this->menu_model->get_parent_menu();
       $data['about'] = $this->about_model->read();
       $data['deptsFooter'] = $this->department_model->read_footer();
	   $data['service'] = $this->service_model->read_by_id($id);
		//get related news
       //$data['related_news'] = $this->news_model->read_related_news($data['news']->dept_id);

	   $data['content'] = $this->load->view('website/service_details',$data,true);
       $this->load->view('website/index', $data);
	} 


}

