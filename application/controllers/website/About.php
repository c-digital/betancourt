<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'website/about_model',
			'setting_model'
		)); 
 
		if ($this->session->userdata('isLogIn') == false) 
		redirect('login'); 
	}
 
	public function index(){
		$data['module'] = display("website");
		$data['title'] = display('about');
		#-------------------------------#
		$data['abouts'] = $this->about_model->read_all();
		$data['content'] = $this->load->view('website/pages/about',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	public function create(){
		$data['module'] = display("website");
		$data['title'] = display('about');
		#-------------------------------# 
		$this->form_validation->set_rules('language', display('language'),'required');
		$this->form_validation->set_rules('title', display('title'),'max_length[100]');
		$this->form_validation->set_rules('author_name', display('author_name'),'max_length[30]');
		$this->form_validation->set_rules('description', display('description'),'trim|max_length[500]');
		$this->form_validation->set_rules('quotation', display('quotation'),'trim|max_length[100]');
		#-------------------------------#		
		//image upload
		$image = $this->fileupload->do_upload(
			'assets_web/img/',
			'image'
		); 

		//if image is not uploaded
		if ($image === false) {
			$this->session->set_flashdata('exception', display('invalid_image'));
		} 

		//signature upload
		$signature = $this->fileupload->do_upload(
			'assets_web/img/',
			'signature'
		); 

		//if signature is not uploaded
		if ($signature === false) {
			$this->session->set_flashdata('exception', display('signature').' '.display('invalid_image'));
		} 

		#-------------------------------# 
		$data['about'] = (object)$secData = [
			'id' 			 => $this->input->post('id'),
			'language' 		 => $this->input->post('language'),
			'title' 		 => $this->input->post('title'),
			'author_name' 		 => $this->input->post('author_name'),
			'description'    => $this->input->post('description', true),
			'quotation' 		 => $this->input->post('quotation'), 
			'image' => (!empty($image)?$image:$this->input->post('old_image')),
			'signature' => (!empty($signature)?$signature:$this->input->post('old_signature')),
			'status' 			 => $this->input->post('status'),
		];
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			if(empty($secData['image'])) {
				$this->session->set_flashdata('exception', display('image_is_required'));
				redirect('website/slider/create');
			}

			// if empty signature
			if(empty($secData['signature'])) {
				$this->session->set_flashdata('exception', display('image_is_required'));
				redirect('website/slider/create');
			}


			#if empty $id then insert data
			if (empty($secData['id'])) {
				
				   if($this->permission->method('about','create')->access()){}
		            else{
		           	    redirect('dashboard/home');
		            }

				if ($this->about_model->create($secData)) {
					#set success message
					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/about/create');
			} 

			else {
				    if($this->permission->method('about','update')->access()){}
		            else{
		           	    redirect('dashboard/home');
		            }


				if ($this->about_model->update($secData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/about/edit/'.$secData['id']);
			}
		} else {
			$data['languageList'] = $this->setting_model->languageList();
			$data['content'] = $this->load->view('website/pages/about_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	} 

	public function edit($id = null){
		$data['module'] = display("website");
		$data['title'] = display('about_edit');
		#-------------------------------# 	
		$data['languageList'] = $this->setting_model->languageList();
		$data['about'] = $this->about_model->read_by_id($id);
		$data['content'] = $this->load->view('website/pages/about_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}

	public function add_lang($id = null){
		$data['module'] = display("website");
		$data['title'] = display('about');
		#-------------------------------# 	
		$data['languageList'] = $this->setting_model->languageList();
		$data['about'] = $this->about_model->read_by_id($id);
		$data['content'] = $this->load->view('website/pages/about_language_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}

	public function delete($id = null){
		if ($this->about_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('website/slider/');
	}

}

