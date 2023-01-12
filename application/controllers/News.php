<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'website/home_model',
			'website/news_model',
			'website/department_model',
			'website/menu_model',
			'website/about_model',
			'website/department_model'
		));  
	}
  

	public function details($id = null){
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
	   $data['news'] = $this->news_model->read_news_by_id($id);
		//get related news
	   if(!empty($data['news']->dept_id)){
	   		$data['related_news'] = $this->news_model->read_related_news();
	   }

	   $data['content'] = $this->load->view('website/news_details',$data,true);
       $this->load->view('website/index', $data);
	} 

}
