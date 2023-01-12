<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'website/testimonial_model',
			'setting_model'
		)); 
 
		if ($this->session->userdata('isLogIn') == false) 
		redirect('login'); 
	}
 
	public function index(){
		$data['module'] = display("website");
		$data['title'] = display('testimonial_list');
		#-------------------------------#
		$data['testimonials'] = $this->testimonial_model->read();
		$data['languages'] = $this->testimonial_model->read_lang();
		$data['content'] = $this->load->view('website/pages/testimonial',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	public function create(){
		$data['module'] = display("website");
		$data['title'] = display('add_testimonial');
		#-------------------------------# 
		$this->form_validation->set_rules('author_name', display('author_name'),'required|trim|max_length[50]');
		$this->form_validation->set_rules('url',  display('url'), 'trim|required|prep_url');
		#-------------------------------#		
		//image upload
		$image = $this->fileupload->do_upload(
			'assets_web/img/testimonial/',
			'image'
		); 

		//if image is not uploaded
		if ($image === false) {
			$this->session->set_flashdata('exception', display('invalid_image'));
		} 
 
		#-------------------------------# 
		$data['testimonial'] = (object)$testData = [
			'id' 			 => $this->input->post('id'),
			'author_name'    => $this->input->post('author_name'),
			'url' 		     => $this->input->post('url'),
			'image'          => (!empty($image)?$image:$this->input->post('old_image')),
			'status' 		 => $this->input->post('status')
		];
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			if(empty($testData['image'])) {
				$this->session->set_flashdata('exception', display('image_is_required'));
				redirect('website/testimonials/create');
			}

			#if empty $id then insert data
			if (empty($testData['id'])) {
				
				   if($this->permission->method('testimonial','create')->access()){}
		            else{
		           	    redirect('dashboard/home');
		            }

				if ($this->testimonial_model->create($testData)) {
					#set success message
					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/testimonials/create');
			} 

			else {
				    if($this->permission->method('testimonial','update')->access()){}
		            else{
		           	    redirect('dashboard/home');
		            }

				if ($this->testimonial_model->update($testData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/testimonials/edit/'.$testData['id']);
			}
		} else {
			$data['content'] = $this->load->view('website/pages/testimonial_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	} 

	public function edit($id = null){
		$data['module'] = display("website");
		$data['title'] = display('testimonial_edit');
		#-------------------------------# 	
		$data['testimonial'] = $this->testimonial_model->read_by_id($id);
		$data['content'] = $this->load->view('website/pages/testimonial_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}

	public function delete($id = null){
		if ($this->testimonial_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('website/testimonials/');
	}

	public function create_language($id = null){
		$data['module'] = display("website");
		$data['title'] = display('add_testimonial');
		#-------------------------------# 
		$this->form_validation->set_rules('language', display('language'),'required');
		$this->form_validation->set_rules('title', display('title'),'required|max_length[100]');
		$this->form_validation->set_rules('quotation', display('quotation'),'required|trim');
		$this->form_validation->set_rules('author_name', display('author_name'),'trim|max_length[50]');
		#-------------------------------#		
		$data['testimonial'] = (object)$testData = [
			'id' 			 => $this->input->post('id'),
			'tstml_id' 		 => $this->input->post('tstml_id'),
			'language' 		 => $this->input->post('language'),
			'title' 		 => $this->input->post('title'),
			'quotation'      => $this->input->post('quotation'),
			'author_name'    => $this->input->post('author_name')
		];
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $id then insert data
			if (empty($testData['id'])) {
				
				   if($this->permission->method('testimonial','create')->access()){}
		            else{
		           	    redirect('dashboard/home');
		            }
		        //check language exists
				$pos_res = $this->db->select('*')
							->from('ws_testimonial_lang')
							->where('tstml_id',$testData['tstml_id'])
							->where('language', $testData['language'])
							->get()
							->num_rows();
				if($pos_res > 0){
					#set exception message
					$this->session->set_flashdata('exception', display('language').' '.display('already_exists'));
					redirect('website/testimonials/create_language/'.$testData['tstml_id']);
				}else{
					if ($this->testimonial_model->create_lang($testData)) {
						#set success message
						$this->session->set_flashdata('message', display('save_successfully'));
					} else {
						#set exception message
						$this->session->set_flashdata('exception', display('please_try_again'));
					}
					redirect('website/testimonials/create_language/'.$testData['tstml_id']);
				}
			} 

			else {
				    if($this->permission->method('testimonial','update')->access()){}
		            else{
		           	    redirect('dashboard/home');
		            }

				if ($this->testimonial_model->update_lang($testData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/testimonials/edit_lang/'.$testData['id']);
			}
		} else {
			$data['testimonial'] = $this->testimonial_model->read_by_id($id);
			$data['languageList'] = $this->setting_model->languageList();
			$data['content'] = $this->load->view('website/pages/testimonial_lang_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	} 

	public function edit_lang($id = null){
		$data['module'] = display("website");
		$data['title'] = display('testimonial_edit');
		#-------------------------------# 	
		$data['testimonial'] = $this->testimonial_model->read_lang_by_id($id);
		$data['languageList'] = $this->setting_model->languageList();
		$data['content'] = $this->load->view('website/pages/testimonial_lang_edit',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}

	public function delete_lang($id = null){
		if ($this->testimonial_model->delete_lang($id)) {
			#set success message
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('website/testimonials/');
	}

}

