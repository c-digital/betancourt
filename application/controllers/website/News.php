<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'website/news_model',
			'website/department_model',
			'setting_model'
		)); 

		
		if ($this->session->userdata('isLogIn') == false) 
		redirect('login'); 
	}
  
	// get all news
	public function index(){
		$data['module'] = display("website");
		$data['title'] = display('news_list');
		#-------------------------------#
		$data['news'] = $this->news_model->read();
		$data['newsLang'] = $this->news_model->read_language_content();
		$data['content'] = $this->load->view('website/pages/news',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	public function create(){
		$data['module'] = display("website");
		$data['title'] = display('add_news');
		#-------------------------------# 
		$this->form_validation->set_rules('dept_id', display('department_name'),'required');
		$this->form_validation->set_rules('title', display('title'),'max_length[100]');
		$this->form_validation->set_rules('description', display('description'),'trim');
		#-------------------------------#
	
		//picture upload
		$picture = $this->fileupload->do_upload(
			'assets_web/img/blog/',
			'featured_image'
		); 
		//if picture is not uploaded
		if ($picture === false) {
			$this->session->set_flashdata('exception', display('invalid_featured_image'));
		}
		#-------------------------------# 
		$data['new'] = (object)$newsData = [
			'id' 			 => $this->input->post('id'),
			'dept_id' 		 => $this->input->post('dept_id'),
			'title' 		 => $this->input->post('title'),
			'featured_image' => (!empty($picture)?$picture:$this->input->post('old_image')),
			'create_date'    => date('Y-m-d', strtotime(($this->input->post('create_date',true) != null)? $this->input->post('create_date',true): date('Y-m-d'))),
			'create_by'      => $this->session->userdata('user_id'),
			'status'         => $this->input->post('status')
		];
		#-------------------------------#
		if ($this->form_validation->run() === true) {
			#if empty $id then insert data
			if (empty($newsData['id'])) {

				    if($this->permission->method('news','create')->access()){

		            }
		            else{
		           	    redirect('dashboard/home');
		            }


				if ($this->news_model->create($newsData)) {
					$nid = $this->db->insert_id();
					$langData = [
						'news_id' 		 => $nid,
						'language' 		 => $this->session->userdata('tableLang'),
						'title' 		 => $this->input->post('title'),
						'description'    => $this->input->post('description')
					];
					$this->news_model->create_language($langData);
					#set success message
					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/news/create');
			} else {

				    if($this->permission->method('news','update')->access()){

		            }
		            else{
		           	    redirect('dashboard/home');
		            }

				
				if ($this->news_model->update($newsData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/news/edit/'.$newsData['id']);
			}
		} else {
			$data['department_list'] = $this->department_model->department_list();
			$data['content'] = $this->load->view('website/pages/news_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	} 


	public function edit($id = null){
		$data['module'] = display("website");
		$data['title'] = display('news_edit');
		#-------------------------------#		
		$data['department_list'] = $this->department_model->department_list();
		$data['new'] = $this->news_model->read_by_id($id);
		$data['content'] = $this->load->view('website/pages/news_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}

	public function add_lang($id = null){
		$data['module'] = display("website");
		$data['title'] = display('add_news');
		#-------------------------------#
		$this->form_validation->set_rules('language', display('language'),'required|max_length[150]');
		$this->form_validation->set_rules('title', display('title'),'required|max_length[150]');
		$this->form_validation->set_rules('description', display('description'),'required|trim');
		#-------------------------------#
	
		$data['new'] = (object)$newsData = [
			'id' 			 => $this->input->post('id'),
			'news_id' 		 => $this->input->post('news_id'),
			'language' 		 => $this->input->post('language'),
			'title' 		 => $this->input->post('title'),
			'description'    => $this->input->post('description')
		];
		#-------------------------------#
		if ($this->form_validation->run() === true) {
			#if empty $id then insert data
			if (empty($newsData['id'])) {

				    if($this->permission->method('news','create')->access()){

		            }
		            else{
		           	    redirect('dashboard/home');
		            }

		         //check language exists
				$pos_res = $this->db->select('*')
							->from('ws_news_language')
							->where('news_id',$newsData['news_id'])
							->where('language', $newsData['language'])
							->get()
							->num_rows();
				if($pos_res > 0){
					#set exception message
					$this->session->set_flashdata('exception', display('language').' '.display('already_exists'));
					redirect('website/news/add_lang/'.$newsData['news_id']);
				}else{
					if ($this->news_model->create_language($newsData)) {
						#set success message
						$this->session->set_flashdata('message', display('save_successfully'));
					} else {
						#set exception message
						$this->session->set_flashdata('exception', display('please_try_again'));
					}
					redirect('website/news/add_lang/'.$newsData['news_id']);
				}
			} else {

			    if($this->permission->method('news','update')->access()){

	            }
	            else{
	           	    redirect('dashboard/home');
	            }

				if ($this->news_model->update_language($newsData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/news/edit_language/'.$newsData['id']);

			}
		} else {
			$data['languageList'] = $this->setting_model->languageList();
			$data['news'] = $this->news_model->read_by_id($id);
			$data['content'] = $this->load->view('website/pages/news_language_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}

	// edit news conten language
	public function edit_language($id = null) {
		$data['module'] = display("website");
		$data['title'] = display('news_edit');
		#-------------------------------#		
		$data['languageList'] = $this->setting_model->languageList();
		$data['new'] = $this->news_model->read_lang_content_by_id($id);
		$data['content'] = $this->load->view('website/pages/news_language_edit',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}
 

	public function delete($id = null) 
	{
		if ($this->news_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('website/news/');
	}

	public function delete_language($id = null) 
	{
		if ($this->news_model->delete_language($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('website/news/');
	}

	public function change_status() 
	{

		$this->form_validation->set_rules('id', display('id'), 'required|strip_tags|max_length[11]'); 
		$this->form_validation->set_rules('value',display('news'), 'required|strip_tags|max_length[11]');   
		#-------------------------------#		
		if ($this->form_validation->run() === true) {

			$id = $this->input->post('id', true);
			$value = $this->input->post('value', true);

			$this->db->set('status', $value)
					->where('id', $id)
					->update('ws_news');

			if ($this->db->affected_rows() > 0) {
				#set success message
				if ($value == 1) {
					$data['message'] = display('added_to_website_successfully');
				} else {
					$data['message'] = display('removed_form_website_successfully');
				}
			} else {
				#set exception message
				$data['exception'] = display('please_try_again');
			}

		} else {
			#set exception message
			$data['exception'] = validation_errors();
		}  
		echo json_encode($data);
	}



}
