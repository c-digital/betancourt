<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 |----Doctors for FrontEnd-------|
*/
class Doctors extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'website/about_model',
            'website/home_model',
			'website/doctor_model',
			'website/appointment_instruction_model',
			'website/department_model',
			'portfolio_model',
			'schedule_model',
			'website/menu_model',
			'website/department_model'
		));
	}

	public function index(){
		$config = array();
        $config["base_url"] = base_url() . "doctors/index";
        $config["total_rows"] = $this->doctor_model->record_count();
        $config["per_page"] = 9;
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

		$data['title'] = display('doctor_list');
		#-------------------------------#
		$data['setting'] = $this->home_model->setting(); 
        // redirect if website status is disabled
        if ($data['setting']->status == 0) 
            redirect(base_url('login'));
        $data['basics'] = $this->home_model->basic_setting();  
        #-----------Section-------------# 
        $data['section'] = $this->home_model->section('doctor');
         // get banner slider
        $data['banner'] = $this->db->select("image")->from('ws_banner')->where('status', 1)->limit(3)->order_by('id', 'DESC')->get()->result();
        $data['languageList'] = $this->home_model->languageList(); 
        $data['about'] = $this->about_model->read();
        $data['deptsFooter'] = $this->department_model->read_footer();
        $data['parent_menu'] = $this->menu_model->get_parent_menu();
        $data['doctors'] = $this->doctor_model->read($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['content'] = $this->load->view('website/doctor_list',$data,true);
		$this->load->view('website/index', $data);
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

        #--------------------------------#
        $data['languageList'] = $this->home_model->languageList(); 
         // get banner slider
        $data['banner'] = $this->db->select("image")->from('ws_banner')->where('status', 1)->limit(1)->order_by('id', 'DESC')->get()->result();

        $data['parent_menu'] = $this->menu_model->get_parent_menu();
        $data['deptsFooter'] = $this->department_model->read_footer();
        $data['about'] = $this->about_model->read();
		$data['doctor'] = $this->doctor_model->read_by_id($user_id);
		$data['instruction'] = $this->appointment_instruction_model->read_active_instuction();
		$data['portfolio'] = $this->portfolio_model->read_portfolio_by_doctor_id($user_id);
		$data['practicing'] = $this->portfolio_model->read_practicing_doctor_id($user_id);
		$data['languages'] = $this->doctor_model->read_languages($user_id);
		$data['slots'] = $this->schedule_model->read_by_doctor_id($user_id); 
		$data['schedules'] = $this->schedule_model->schedule_by_slot_id($user_id); 
        
        $data['content'] = $this->load->view('website/doctor_details',$data,true);
		$this->load->view('website/index', $data);
	}

	public function timetable(){
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
        //---------all data--------//
        $data['languageList'] = $this->home_model->languageList(); 
        $data['about'] = $this->about_model->read();
        $data['deptsFooter'] = $this->department_model->read_footer();
        $data['parent_menu'] = $this->menu_model->get_parent_menu();
        $data['departments'] = $this->department_model->read();
        //print_r($data['departments']);
        // die();
		$data['content'] = $this->load->view('website/doctors_timetable',$data,true);
		$this->load->view('website/index', $data);
	}

	public function get_schedule_result(){
		 $id = $this->input->post('did');
		 $records = $this->schedule_model->get_schedule_by_dprt_id($id); 

		 $i = 0;
		foreach ($records as $doctor) {
			$records[$i]->schedules = $this->get_schedule($doctor->user_id);
			$i++;
		}
		
        if(isset($id) and !empty($id)){
            
            $output = '';
            if(!empty($records)){
	            foreach($records as $row){
	            	if(!empty($row->schedules)){
		            	foreach ($row->schedules as $schedule) {
		            		if($id==$row->department_id){
				             $output .= '<div class="col-sm-6 col-md-4 col-lg-4">
					                         <div class="box-widget">
				                                <div class="box-text">
				                                    <div class="event-container">
				                                       <b><a class="event_header" href="'.base_url('doctors/profile/'.$row->user_id).'">'.$row->firstname.' '.$row->lastname.'</a></b>
	                                                    <div class="before_hour_text">'.$row->designation.'</div>
				                                        
				                                        <div class="hours_container"><span>'.date('H:i', strtotime($schedule->start_time)).' - '.date('H:i', strtotime($schedule->end_time)).'</span></div>
				                                        <b><a class="event_header">'.$schedule->available_days.'</a></b>
				                                    </div>
				                                </div>
				                              </div>
				                          </div>';
				                      }
			                      }
		                      echo $output;
		                  }
	            		 
	                  }
                   }else{
                   	 $output = '';
                	echo $output = '<center>'.display('no_schedule_available').'</center>';
        		}    
	            
            }
        }

	public function get_schedule($doctor_id = null){
		$records = $this->db->select("*")
                      ->from('schedule')
                      ->where('doctor_id', $doctor_id)
                      ->get()
                      ->result();
         
		return $records;
	}


}
