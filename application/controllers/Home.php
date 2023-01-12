<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array( 
            'website/about_model',
            'website/home_model',
            'website/department_model',
            'website/testimonial_model',
            'website/appointment_instruction_model',
            'website/partner_model',
            'website/doctor_model',
            'website/news_model',
            'website/menu_model'
        ));  
    }  
  
    public function index()
    {
        $data['title'] = display('home'); 
        #-----------Setting-------------# 
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

       #--------get all home data---------#
       $data['languageList'] = $this->home_model->languageList(); 
       $data['parent_menu'] = $this->menu_model->get_parent_menu();
       $data['about'] = $this->about_model->read();
       $data['sliders'] = $this->home_model->get_sliders();
       $data['departments'] = $this->department_model->read();
       $data['deptsFooter'] = $this->department_model->read_footer();
       $data['sliderDepart'] = $this->department_model->read_home_slider();
       $data['department_list'] = $this->department_model->department_list();
       $data['testimonial'] = $this->testimonial_model->read_active();
       $data['instruction'] = $this->appointment_instruction_model->read_active_instuction();
       $data['partners'] = $this->partner_model->read_active();
       $data['doctors'] = $this->doctor_model->read_home();  
       $data['latest_news'] = $this->news_model->read_news();
       #-----------------------------------#

       $data['content'] = $this->load->view('website/includes/home',$data,true);
       $this->load->view('website/index', $data);
    }

    public function sub_menu($id=null){
      return $this->db->select("ws_menu.id, content.url, ws_menu.name, ws_menu.parent_id")
                      ->from('ws_page_content as content')
                      ->join('ws_menu', 'ws_menu.id=content.menu_id', 'left')
                      ->where('ws_menu.status', 1)
                      ->where('ws_menu.parent_id', $id)
                      ->order_by('ws_menu.position','asc')
                      ->get()
                      ->result();
    }


    public function chane_language(){
      $language = $this->input->post('userLang');
          $cookie = array(
              'name'   => 'Lng',
              'value'  => $language,
              'expire' => 31536000,
              'domain' => ''
          );
          $this->input->set_cookie($cookie);
    }

    public function deleteCookie(){
          delete_cookie('Lng');
    }


}
