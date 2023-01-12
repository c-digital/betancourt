<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'website/section_model',
			'setting_model'
		)); 

		
		if ($this->session->userdata('isLogIn') == false) 
		redirect('login'); 
	}
 

	public function index(){
		$data['module'] = display("website");
		$data['title'] = display('section');
		#-------------------------------#
		$data['sections'] = $this->section_model->read();
		$data['languages'] = $this->section_model->read_lang();
		$data['content'] = $this->load->view('website/pages/section',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	public function create(){
		$data['module'] = display("website");
		$data['title'] = display('add_section');
		#-------------------------------# 
		if($this->input->post('id') == null) {
			$is_unique =  '|is_unique[ws_section.name]';
		} else {
			$is_unique =  '';
		}
		$this->form_validation->set_rules('name',display('section_name'), 'required'.$is_unique);
		#-------------------------------#
		$this->form_validation->set_rules('title', display('title'),'max_length[100]');
		$this->form_validation->set_rules('description', display('description'),'trim');
		#-------------------------------#
		$data['section_slag'] = array( 
			'' 	 		 => display('select_option'), 
			'about' 	 => display('about'), 
			'contact'    => display('contact'),
			'working_hours'=> display('working_hours'),   
			'department' => display('department'), 
			'doctor' 	 => display('doctor'),
			'timetable'  => display('timetable'),
			'news' 		 => display('news'),   
			'signin' 	 => display('sign_in'),   
			'signup' 	 => display('sign_up'),    
			'benefits' 	 => display('benefits'),
			'portfolio'  => display('portfolio'), 
			'team' 		 => display('our_team'), 
			'service' 	 => display('service'),  
		); 
		#-------------------------------#		
		
		$data['section'] = (object)$secData = [
			'id' 			 => $this->input->post('id'),
			'name' 			 => $this->input->post('name'),
			'title' 		 => $this->input->post('title'),
			'description'    => $this->input->post('description'),
		];
		#-------------------------------#
		if ($this->form_validation->run() === true) {
			#if empty $id then insert data
			if (empty($secData['id'])) {

				    if($this->permission->method('section','create')->access()){

		            }
		            else{
		           	    redirect('dashboard/home');
		            }


				if ($this->section_model->create($secData)) {
					#set success message
					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/section/create');
			} else {

				    if($this->permission->method('section','update')->access()){

		            }
		            else{
		           	    redirect('dashboard/home');
		            }

				
				if ($this->section_model->update($secData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/section/edit/'.$secData['id']);
			}
		} else {
			$data['content'] = $this->load->view('website/pages/section_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	} 

	public function create_language($id = null){
		$data['module'] = display("website");
		$data['title'] = display('add_section');
		#-------------------------------# 
		$this->form_validation->set_rules('language', display('language'),'required');
		$this->form_validation->set_rules('title', display('title'),'required|max_length[100]');
		$this->form_validation->set_rules('description', display('description'),'required|trim|max_length[200]');
		#-------------------------------#		
		
		$data['section'] = (object)$secData = [
			'id' 			 => $this->input->post('id'),
			'language' 	     => $this->input->post('language'),
			'section_id' 	 => $this->input->post('section_id'),
			'title' 		 => $this->input->post('title'),
			'description'    => $this->input->post('description'),
		];
		#-------------------------------#
		if ($this->form_validation->run() === true) {
			#if empty $id then insert data
			if (empty($secData['id'])) {

				    if($this->permission->method('section','create')->access()){

		            }
		            else{
		           	    redirect('dashboard/home');
		            }

		        //check language exists
				$pos_res = $this->db->select('*')
							->from('ws_section_lang')
							->where('section_id',$secData['section_id'])
							->where('language', $secData['language'])
							->get()
							->num_rows();
				if($pos_res > 0){
					#set exception message
					$this->session->set_flashdata('exception', display('language').' '.display('already_exists'));
					redirect('website/section/create_language/'.$secData['section_id']);
				}else{
					if ($this->section_model->create_lang($secData)) {
					#set success message
					$this->session->set_flashdata('message', display('save_successfully'));
					} else {
						#set exception message
						$this->session->set_flashdata('exception', display('please_try_again'));
					}
					redirect('website/section/create_language/'.$secData['section_id']);
				}
			} else {

				    if($this->permission->method('section','update')->access()){

		            }
		            else{
		           	    redirect('dashboard/home');
		            }

				
				if ($this->section_model->update_lang($secData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/section/edit_lang/'.$secData['id']);
			}
		} else {
			$data['section'] = $this->section_model->read_by_id($id);
			$data['languageList'] = $this->setting_model->languageList();
			$data['content'] = $this->load->view('website/pages/section_lang_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	} 

	public function edit_lang($id = null){
		$data['module'] = display("website");
		$data['title'] = display('section_edit');
		#-------------------------------# 	
		$data['section'] = $this->section_model->read_lang_by_id($id);
		$data['languageList'] = $this->setting_model->languageList();
		$data['content'] = $this->load->view('website/pages/section_lang_edit',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}


	public function edit($id = null) {
		$data['module'] = display("website");
		$data['title'] = display('section_edit');
		#-------------------------------#
		$data['section_slag'] = array( 
			'' 	 		 => display('select_option'), 
			'about' 	 => display('about'), 
			'appointment'=> display('appointment'), 
			'blog' 		 => display('blog'),  
			'department' => display('department'), 
			'doctor' 	 => display('doctor'),   
			'service' 	 => display('service'),  
		);
		#-------------------------------#		
		$data['section'] = $this->section_model->read_by_id($id);
		$data['content'] = $this->load->view('website/pages/section_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}
 

	public function delete($id = null) 
	{
		if ($this->section_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('website/section/');
	}



}
