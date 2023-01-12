<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'website/slider_model',
			'setting_model'
		)); 
 
		if ($this->session->userdata('isLogIn') == false) 
		redirect('login'); 
	}
 
	public function index(){
		$data['module'] = display("website");
		$data['title'] = display('slider');
		#-------------------------------#
		$data['sliders'] = $this->slider_model->read();
		$data['slideLang'] = $this->slider_model->read_lang();
		$data['content'] = $this->load->view('website/pages/slider',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	public function create(){
		$data['module'] = display("website");
		$data['title'] = display('add_slider');
		#-------------------------------# 
		$this->form_validation->set_rules('title', display('title'),'required|max_length[100]');
		$this->form_validation->set_rules('url',  display('url'), 'trim|required|prep_url');
		$this->form_validation->set_rules('position', display('slide_position'),'trim|numeric|max_length[2]');
		#-------------------------------#		
		//image upload
		$image = $this->fileupload->do_upload(
			'assets_web/img/slider/',
			'image'
		); 

		//if image is not uploaded 
		if ($image === false) {
			$this->session->set_flashdata('exception', display('invalid_image'));
		} 

		#-------------------------------# 
		$data['slider'] = (object)$secData = [
			'id' 			 => $this->input->post('id'),
			'title' 		 => $this->input->post('title'),
			'url' 		     => $this->input->post('url'),
			'image'          => (!empty($image)?$image:$this->input->post('old_image')),
			'position' 		 => $this->input->post('position'), 
			'status' 		 => $this->input->post('status')
		];
		#-------------------------------#
		if ($this->form_validation->run() === true) {
			if(empty($secData['image'])) {
				$this->session->set_flashdata('exception', display('image_is_required'));
				redirect('website/slider/create');
			}



			#if empty $id then insert data
			if (empty($secData['id'])) {
				
				   if($this->permission->method('slider','create')->access()){}
		            else{
		           	    redirect('dashboard/home');
		            }

				if ($this->slider_model->create($secData)) {
					$sid = $this->db->insert_id();
					$langData = [
						'slider_id' 	 => $sid,
						'language' 		 => $this->session->userdata('tableLang'),
						'title' 		 => $this->input->post('title'),
						'subtitle' 		 => $this->input->post('subtitle')
					];
					$this->slider_model->create_lang($langData);
					
					#set success message
					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/slider/create');
			} 

			else {
				    if($this->permission->method('slider','update')->access()){}
		            else{
		           	    redirect('dashboard/home');
		            }


				if ($this->slider_model->update($secData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/slider/edit/'.$secData['id']);
			}
		} else {
			$data['content'] = $this->load->view('website/pages/slider_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	} 

	public function edit($id = null){
		$data['module'] = display("website");
		$data['title'] = display('slider_edit');
		#-------------------------------# 	
		$data['slider'] = $this->slider_model->read_by_id($id);
		$data['content']= $this->load->view('website/pages/slider_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}

	public function delete($id = null) 
	{
		if ($this->slider_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('website/slider/');
	}

	public function create_language($id = null){
		$data['module'] = display("website");
		$data['title'] = display('add_slider');
		#-------------------------------# 
		$this->form_validation->set_rules('title', display('title'),'max_length[100]');
		$this->form_validation->set_rules('subtitle', display('subtitle'),'max_length[120]');
		$this->form_validation->set_rules('description', display('description'),'trim');
		#-------------------------------# 
		$data['slider'] = (object)$postData = [
			'id' 			 => $this->input->post('id'),
			'slider_id' 	 => $this->input->post('slider_id'),
			'language' 		 => $this->input->post('language'),
			'title' 		 => $this->input->post('title'),
			'subtitle' 		 => $this->input->post('subtitle'),
			'description'    => $this->input->post('description', false)
		];
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $id then insert data
			if (empty($postData['id'])) {
				
				   if($this->permission->method('slider','create')->access()){}
		            else{
		           	    redirect('dashboard/home');
		            }

		         //check language exists
				$pos_res = $this->db->select('*')
							->from('ws_slider_lang')
							->where('slider_id',$postData['slider_id'])
							->where('language', $postData['language'])
							->get()
							->num_rows();
				if($pos_res > 0){
					#set exception message
					$this->session->set_flashdata('exception', display('language').' '.display('already_exists'));
					redirect('website/slider/create_language/'.$postData['slider_id']);
				}else{
					if ($this->slider_model->create_lang($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('save_successfully'));
					} else {
						#set exception message
						$this->session->set_flashdata('exception', display('please_try_again'));
					}
					redirect('website/slider/create_language/'.$postData['slider_id']);
				}
			} 
			else {
				    if($this->permission->method('slider','update')->access()){}
		            else{
		           	    redirect('dashboard/home');
		            }


				if ($this->slider_model->update_lang($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/slider/edit_lang/'.$postData['id']);
			}
		} else {
			$data['slider'] = $this->slider_model->read_by_id($id);
			$data['languageList'] = $this->setting_model->languageList();
			$data['content'] = $this->load->view('website/pages/slider_lang_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}

	public function edit_lang($id = null){
		$data['module'] = display("website");
		$data['title'] = display('slider_edit');
		#-------------------------------# 	
		$data['slider'] = $this->slider_model->read_lang_by_id($id);
		$data['languageList'] = $this->setting_model->languageList();
		$data['content']= $this->load->view('website/pages/slider_lang_edit',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}

	public function delete_lang($id = null) 
	{
		if ($this->slider_model->delete_lang($id)) {
			#set success message
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('website/slider/');
	}

}

